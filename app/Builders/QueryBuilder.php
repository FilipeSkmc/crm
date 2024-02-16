<?php

namespace App\Builders;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class QueryBuilder extends Builder
{
    private Request $request;
    private string $nameModel = '';
    private array $filterable_columns = [];

    public function builderQuery(Request $request, string $nameModel): self
    {
        $this->request = $request;
        $this->nameModel = $nameModel;
        $this->filterable_columns = defined("$nameModel::fillterable_columns") ? $nameModel::filterable_columns : [];

        $this->applySelect();

        return $this;
    }

    private function applySelect()
    {
        return $this->when(
            $this->request->filled('select'),
            function (Builder $builder) {
                $builder->addSelect(array_map(fn ($column) => $this->nameModel::getTableName() . '.' . $column, $this->request->select));
            }
        );
    }
}
