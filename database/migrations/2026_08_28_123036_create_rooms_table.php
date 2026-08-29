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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 12, 2)->nullable();
            $table->string('price_label')->default('Hubungi untuk informasi harga');
            $table->unsignedSmallInteger('capacity')->default(2);
            $table->string('bathroom_type')->default('Kamar Mandi Dalam');
            $table->boolean('wifi')->default(true);
            $table->boolean('electricity_included')->default(true);
            $table->boolean('water_included')->default(true);
            $table->string('availability_status')->default('Hubungi untuk ketersediaan');
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
