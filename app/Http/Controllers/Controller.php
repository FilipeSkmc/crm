<?php

namespace App\Http\Controllers;

use App\Exceptions\HttpException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function sendResponse(mixed $data): JsonResponse
    {
        $response = [
            'success' => true,
            'errors' => [],
            'data'    => $data
        ];

        return response()->json($response);
    }

    public function sendError(mixed $th)
    {
        $msg = 'Não foi possível realizar a operação!';
        $code = 500;
        $errors = [];

        if ($th instanceof HttpException) {
            $msg = $th->getMessage();
            $code = $th->getCode();
            $errors = $th->getErrors();
        }

        return response()->json([
            'message' => $msg,
            'errors' => $errors
        ], $code);
    }
}
