<?php

namespace App\Enums;

enum ServiceProviderStatusEnum: int
{
    case INACTIVE = 0;
    case ACTIVE = 1;
    case UNDER_MAINTENANCE = 2;

    public function label(): int
    {
        return match ($this) {
            self::INACTIVE => 0,
            self::ACTIVE => 1,
            self::UNDER_MAINTENANCE => 2,
        };
    }
}
