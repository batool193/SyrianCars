<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained();
            $table->foreignId('model_id')->constrained();
            $table->foreignId('color_id')->constrained();
            $table->foreignId('gear_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->foreignId('fuel_id')->constrained();
            $table->smallInteger('production_year')->check('production_year >= 1990 AND production_year<= 2025');
            $table->smallInteger('engine_power');
            $table->enum('condition', ['new', 'used'])->default('used');
            $table->integer('mileage');
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->string('plate_number', 15)->unique();
            $table->boolean('is_available')->default(true);
            $table->timestamps();
                    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
