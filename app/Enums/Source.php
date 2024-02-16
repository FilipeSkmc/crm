<?php

namespace App\Enums;

use App\Traits\EnumMethod;

enum Source: int
{
    use EnumMethod;

    case SITE = 1;
    case SOCIAL_MEDIA = 2;
    case TELEVISION = 3;
    case OTHER = 4;

    public function name(): mixed
    {
        return match ($this) {
            self::SITE => 'Site',
            self::SOCIAL_MEDIA => 'Rede Social',
            self::TELEVISION => 'Televisão',
            self::OTHER => 'Outro',
        };
    }
}
