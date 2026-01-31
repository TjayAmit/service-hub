<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\{
    ServiceTypeEnum,
    ServiceProviderStatusEnum
};

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('service_providers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('url')->unique();
            $table->string('api_key')->unique();
            $table->enum('service_type', ServiceTypeEnum::cases())->default(ServiceTypeEnum::LAUNDRY);
            $table->enum('status', ServiceProviderStatusEnum::cases())->default(ServiceProviderStatusEnum::ACTIVE);
            $table->timestamps();

            $table->index('service_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_providers');
    }
};
