<?php

namespace App\Models;

use App\Enums\ServiceProviderStatusEnum;
use App\Enums\ServiceTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ServiceProviderFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceProvider extends Model
{
    /** @use HasFactory<ServiceProviderFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'url',
        'api_key',
        'status',
        'service_type'
    ];

    public $timestamps = true;

    protected $casts = [
        'service_type' => ServiceTypeEnum::class,
        'status' => ServiceProviderStatusEnum::class
    ];
}
