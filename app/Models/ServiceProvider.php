<?php

namespace App\Models;

use App\Enums\ServiceProviderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ServiceProviderFactory;

class ServiceProvider extends Model
{
    /** @use HasFactory<ServiceProviderFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'service_type',
        'url',
        'api_key',
        'status',
    ];

    public $timestamps = true;

    protected $casts = [
        'service_type' => ServiceProviderStatusEnum::class,
        'status' => ServiceProviderStatusEnum::class,
        'deleted_at' => 'datetime',
    ];
}
