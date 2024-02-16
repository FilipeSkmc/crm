<?php

namespace App\Operations;

use App\Exceptions\HttpException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Validation
{
    public static function verify(Request $request, array $rules)
    {
        $validator = Validator::make(
            $request->all(),
            $rules,
        );

        if ($validator->fails()) {
            throw new HttpException('Erro de validação', $validator->errors()->toArray(), 422);
        }
    }
}
