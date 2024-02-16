<?php

namespace App\Models;

use App\Enums\Source;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lead extends BaseModel
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'leads';

    protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'source',
        'phone',
        'email',
        'address',
        'city',
        'uf',
        'cep',
        'description',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'company' => 'string',
        'source' => Source::class,
        'phone' => 'string',
        'email' => 'string',
        'address' => 'string',
        'city' => 'string',
        'uf' => 'string',
        'cep' => 'string',
        'description' => 'string',
        'status' => Status::class,
    ];
}
