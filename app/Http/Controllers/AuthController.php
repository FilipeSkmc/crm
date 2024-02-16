<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new AuthService();
    }

    public function login(Request $request): JsonResponse
    {
        return $this->sendResponse(
            $this->service->login($request)
        );
    }

    public function checkAuth(): JsonResponse
    {
        return $this->sendResponse(
            $this->service->checkAuth()
        );
    }

    public function logout(Request $request): RedirectResponse
    {
        return $this->service->logout($request);
    }
}
