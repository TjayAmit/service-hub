<?php

namespace App\Enums;

enum ServiceTypeEnum: string
{
    case LAUNDRY = "Laundry";
    case WATER_REFILLING = "Water-Refilling";
    case DENTAL = "Dental";

    public function labels(): string
    {
        return match($this) {
            self::LAUNDRY => "Laundry",
            self::WATER_REFILLING => "Water-Refilling",
            self::DENTAL => "Dental",
        };
    }
}

