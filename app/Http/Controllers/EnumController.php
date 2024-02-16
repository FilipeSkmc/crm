<?php

namespace App\Http\Controllers;

use App\Enums\Source;
use App\Enums\Status;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EnumController extends Controller
{
    public function index(): JsonResponse
    {
        $enums = [];
        $enums['lead-status'] = Status::all();
        $enums['lead-source'] = Source::all();

        return $this->sendResponse($enums);
    }
}
