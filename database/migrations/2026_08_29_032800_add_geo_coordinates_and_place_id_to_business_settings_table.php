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
        Schema::table('business_settings', function (Blueprint $table) {
            $table->string('latitude')->nullable()->default('-7.3226066')->after('address');
            $table->string('longitude')->nullable()->default('108.3780388')->after('latitude');
            $table->string('google_place_id')->nullable()->default('0x8b96d290aad1c3ab:0x25e81025801d51c9')->after('google_maps_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('business_settings', function (Blueprint $table) {
            $table->dropColumn(['latitude', 'longitude', 'google_place_id']);
        });
    }
};
