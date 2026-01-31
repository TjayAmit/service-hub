<?php

use App\Dto\ServiceProviderDto;
use App\Enums\ServiceProviderStatusEnum;
use App\Enums\ServiceTypeEnum;

it('create a service provider dto correctly', function () {
    $serviceProvider = [
        'name' => 'testApi',
        'email' => 'testapi@gmail.com',
        'service_type' => ServiceTypeEnum::LAUNDRY,
        'status' => ServiceProviderStatusEnum::ACTIVE,
        'id' => 1,
        'url' => null,
        'api_key' => null
    ];

    $dto = ServiceProviderDto::fromArray($serviceProvider);

    expect($dto->name)->toBe('testApi')
        ->and($dto->email)->toBe('testapi@gmail.com')
        ->and($dto->serviceType)->toBe(ServiceTypeEnum::LAUNDRY)
        ->and($dto->status)->toBe(ServiceProviderStatusEnum::ACTIVE)
        ->and($dto->url)->toBeNull()
        ->and($dto->apiKey)->toBeNull()
        ->and($dto->id)->toBe(1);
});

it('can be converted back into an array', function () {
    $serviceProvider = [
        'name' => 'testApi',
        'email' => 'testapi@gmail.com',
        'service_type' => ServiceTypeEnum::LAUNDRY->value,
        'status' => ServiceProviderStatusEnum::ACTIVE->value,
        'id' => 1,
        'url' => null,
        'api_key' => null
    ];
    $dto = ServiceProviderDto::fromArray($serviceProvider);

    expect($dto->toArray())->toBe($serviceProvider);
});

it('throws error for missing field', function () {
   $serviceProvider = [
       'names' => 'testApi',
       'email' => 'testapi@gmail.com',
       'service_type' => ServiceTypeEnum::LAUNDRY->value,
       'status' => ServiceProviderStatusEnum::ACTIVE->value,
       'id' => 1,
       'url' => null,
       'api_key' => null
   ];

   expect(fn() => ServiceProviderDto::fromArray($serviceProvider))
       ->toThrow(InvalidArgumentException::class, 'The field name is required');
});

it('throws a value error for invalid enum type', function () {
    $serviceProvider = [
        'name' => 'testApi',
        'email' => 'testapi@gmail.com',
        'service_type' => 'NOT_AN_ENUM_OBJECT',
        'status' => ServiceProviderStatusEnum::ACTIVE,
        'id' => 1,
        'url' => null,
        'api_key' => null
    ];

    expect(fn() => ServiceProviderDto::fromArray($serviceProvider))
        ->toThrow(ValueError::class);
});

it('throws invalid arguments for invalid email', function () {
    $serviceProvider = [
        'name' => 'testApi',
        'email' => 'testapigmail.com',
        'service_type' => 'NOT_AN_ENUM_OBJECT',
        'status' => ServiceProviderStatusEnum::ACTIVE,
        'id' => 1,
        'url' => null,
        'api_key' => null
    ];

    expect(fn() => ServiceProviderDto::fromArray($serviceProvider))
        ->toThrow(InvalidArgumentException::class, 'Invalid email');
});
