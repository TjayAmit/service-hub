<?php

namespace App\Dto;

use App\Enums\ServiceProviderStatusEnum;
use App\Enums\ServiceTypeEnum;

readonly class ServiceProviderDto
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
        foreach(['name', 'email', 'service_type', 'status'] as $field){
            if (!isset($data[$field])) {
                throw new \InvalidArgumentException("The field $field is required");
            }
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Invalid email");
        }

        return new self(
            name: trim($data['name']),
            email: strtolower(trim($data['email'])),
            serviceType: $data['service_type'] instanceof ServiceTypeEnum ?
                $data['service_type']: ServiceTypeEnum::from($data['service_type']),
            status: $data['status'] instanceof ServiceProviderStatusEnum ?
                $data['status']: ServiceProviderStatusEnum::from($data['status']),
            id: $data['id'] ?? null,
            url: $data['url'] ?? null,
            apiKey: $data['api_key'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'service_type' => $this->serviceType->value,
            'status' => $this->status->value,
            'id' => $this->id,
            'url' => $this->url,
            'api_key' => $this->apiKey,
        ];
    }
}
