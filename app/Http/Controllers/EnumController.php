<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\File;

class EnumController extends Controller
{
    public function index(): JsonResponse
    {
        $enums = [];

        $directory = app_path('Enums');

        if (File::isDirectory($directory)) {
            $files = File::files($directory);

            foreach ($files as $file) {
                $fileName = str_replace('.php', '', $file->getFilename());

                $className = "App\Enums\\" . $fileName;

                if (enum_exists($className)) {
                    $enums[strtolower($fileName)] = $className::all();
                }
            }
        }

        return $this->sendResponse($enums);
    }
}
