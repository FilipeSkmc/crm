<?php

namespace App\Models;

use App\Builders\QueryBuilder;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function newEloquentBuilder($query): QueryBuilder
    {
        return new QueryBuilder($query);
    }

    public static function getFillableFields()
    {
        return (new static)->getFillable();
    }

    public static function getTableName(): string
    {
        return (new static)->getTable();
    }
}
