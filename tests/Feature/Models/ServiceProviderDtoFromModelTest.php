<?php

use App\Dto\ServiceProviderDto;
use App\Enums\ServiceTypeEnum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\ServiceProvider;

uses(RefreshDatabase::class);

it ('create a service provider dto correctly from eloquent model', function () {
    $model = ServiceProvider::factory()->create([
        'name' => 'ELaundry',
        'service_type' => ServiceTypeEnum::LAUNDRY
    ]);

    $dto = ServiceProviderDto::fromModel($model);

    expect($dto->name)->toBe('ELaundry')
        ->and($dto->serviceType)->toBe(ServiceTypeEnum::LAUNDRY)
        ->and($dto->id)->toBe($model->id);
});
