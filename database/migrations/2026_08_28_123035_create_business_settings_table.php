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
        Schema::create('business_settings', function (Blueprint $table) {
            $table->id();
            $table->string('business_name')->default('Kost Putri Ibu Idah');
            $table->string('short_name')->default('Kost Ibu Idah');
            $table->text('tagline')->nullable();
            $table->text('description')->nullable();
            $table->text('about_text')->nullable();
            $table->string('trust_line')->nullable();
            $table->unsignedSmallInteger('max_occupants')->default(2);
            $table->string('whatsapp_number')->default('[NOMOR WHATSAPP]');
            $table->string('whatsapp_formatted')->default('[NOMOR WHATSAPP]');
            $table->string('address', 500)->default('[ALAMAT LENGKAP]');
            $table->string('google_maps_url', 500)->default('#lokasi');
            $table->text('google_maps_embed_url')->nullable();
            $table->string('gate_closing_time')->default('22.00 WIB');
            $table->string('logo_path')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('og_image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_settings');
    }
};
