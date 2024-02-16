<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Services\LeadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LeadController extends AbstractController
{
    protected $serviceClass = LeadService::class;

    public function index(Request $request): JsonResponse
    {
        return $this->sendResponse(
            $this->service->index($request)
        );
    }

    public function show(Request $request, int $id): JsonResponse
    {
        return $this->sendResponse(
            $this->service->find($request, $id)->show()
        );
    }

    public function store(StoreLeadRequest $request): JsonResponse
    {
        return $this->sendResponse(
            $this->service->store($request)
        );
    }

    public function update(StoreLeadRequest $request, int $id): JsonResponse
    {
        return $this->sendResponse(
            $this->service->find($request, $id)->update($request)
        );
    }

    public function destroy(int $id): JsonResponse
    {
        return $this->sendResponse(
            $this->service->find($id)->delete()
        );
    }
}
