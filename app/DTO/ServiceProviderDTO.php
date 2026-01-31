<?php

namespace App\DTO;

use App\Enums\ServiceProviderStatusEnum;
use App\Enums\ServiceTypeEnum;

class ServiceProviderDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public ServiceTypeEnum $serviceType,
        public ServiceProviderStatusEnum $status,
        public ?string $url,
        public ?string $apiKey
    ){}

    public static function fromArray(array $data): ServiceProviderDTO
    {
        return new self(
            name: $data['name'],
            email: $data['email'],
            serviceType: $data['service_type'],
            status: $data['status'],
            url: $data['url'],
            apiKey: $data['api_key']
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'service_type' => $this->serviceType,
            'status' => $this->status,
            'url' => $this->url,
            'apiKey' => $this->apiKey,
        ];
    }
}
