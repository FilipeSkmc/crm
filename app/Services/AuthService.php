<?php

namespace App\Services;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthService
{
  /**
   * Realizando o Login
   */
  public function login(Request $request): array
  {
    if (Auth::attempt($request->only(["email", "password"]))) {
      $token = $request->user()->createToken("user-token");
      return [
        'token' => $token->plainTextToken,
        'user' => $request->user()
      ];
    }

    throw new HttpResponseException(response()->json([
      'success' => false,
      'messages' => ["Não Autorizado!"],
      'data' => []
    ]), 401);
  }

  /**
   * Checando se está autenticado
   */
  public function checkAuth(): bool
  {
    return true;
  }

  /**
   * Realizando o Logout
   */
  public function logout(Request $request): RedirectResponse
  {
    $request->user()->currentAccessToken()->delete();

    return redirect('/');
  }
}
