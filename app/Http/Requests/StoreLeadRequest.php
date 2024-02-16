<?php

namespace App\Http\Requests;

use App\Enums\Source;
use App\Enums\Status;
use Illuminate\Validation\Rules\Enum;

class StoreLeadRequest extends AbstractRequest
{
  public function rules(): array
  {
    return [
      'first_name' => ['required', 'string', 'min:1', 'max:60'],
      'last_name' => ['required', 'string', 'min:1', 'max:150'],
      'company' => ['string', 'max:60', 'nullable'],
      'source' => ['required', 'integer', new Enum(Source::class)],
      'phone' => ['required', 'string', 'max:15'],
      'email' => ['required', 'string', 'max:150'],
      'address' => ['string', 'max:150', 'nullable'],
      'city' => ['string', 'max:150', 'nullable'],
      'uf' => ['string', 'max:2', 'nullable'],
      'cep' => ['string', 'max:9', 'nullable'],
      'description' => ['string', 'max:255', 'nullable'],
      'status' => ['required', 'integer', new Enum(Status::class)],
    ];
  }
}
