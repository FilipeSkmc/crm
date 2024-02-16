<?php

namespace App\Enums;

use App\Traits\EnumMethod;

enum Status: int
{
    use EnumMethod;

    case OPEN_NOT_CONTACTED = 1;
    case WORKING_CONTACTED = 2;
    case CLOSED_CONVERTED = 3;
    case CLOSED_NOT_CONVERTED = 4;

    public function name(): mixed
    {
        return match ($this) {
            self::OPEN_NOT_CONTACTED => 'Aberto - Não contactado',
            self::WORKING_CONTACTED => 'Trabalhando Contato',
            self::CLOSED_CONVERTED => 'Fechado - Convertido',
            self::CLOSED_NOT_CONVERTED => 'Fechado - Não Convertido',
        };
    }
}
