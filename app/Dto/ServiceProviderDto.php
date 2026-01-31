<?php

namespace App\Dto;

use App\Enums\ServiceProviderStatusEnum;
use App\Enums\ServiceTypeEnum;

class ServiceProviderDto
{
    public function __construct(
        public string $name,
        public string $email,
        public ServiceTypeEnum $serviceType,
        public ServiceProviderStatusEnum $status,
        public ?int $id,
        public ?string $url,
        public ?string $apiKey
    ){}

    public static function fromArray(array $data): ServiceProviderDto
    {
        return new self(
            name: $data['name'],
            email: $data['email'],
            serviceType: $data['service_type'],
            status: $data['status'],
            id: $data['id'],
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
            'id' => $this->id,
            'url' => $this->url,
            'apiKey' => $this->apiKey,
        ];
    }
}
