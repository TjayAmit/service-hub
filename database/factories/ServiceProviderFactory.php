<?php

namespace Database\Factories;

use App\Enums\ServiceProviderStatusEnum;
use App\Enums\ServiceTypeEnum;
use App\Models\ServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ServiceProvider>
 */
class ServiceProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'url' => $this->faker->url(),
            'api_key' => $this->faker->uuid(),
            'service_type' => $this->faker->randomElement(ServiceTypeEnum::cases())->value,
            'status' => $this->faker->randomElement(ServiceProviderStatusEnum::cases())->value
        ];
    }
}
