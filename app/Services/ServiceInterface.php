<?php

namespace App\Services;

use App\Http\Requests\AbstractRequest;
use Illuminate\Http\Request;

interface ServiceInterface
{
  public function index(Request $request): array;

  public function show(): array;

  public function find(Request $request, int $id): AbstractService;

  public function store(AbstractRequest $request);

  public function update(AbstractRequest $request);

  public function delete();
}
