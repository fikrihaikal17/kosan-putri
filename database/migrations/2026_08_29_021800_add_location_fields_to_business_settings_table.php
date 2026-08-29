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
            $table->string('city_district')->nullable()->default('Kab. Ciamis')->after('address');
            $table->text('location_landmark')->nullable()->after('city_district');
            $table->string('parking_info')->nullable()->default('Tersedia garasi motor di dalam area kos khusus bagi penghuni.')->after('location_landmark');
            $table->text('survey_policy_note')->nullable()->after('parking_info');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('business_settings', function (Blueprint $table) {
            $table->dropColumn(['city_district', 'location_landmark', 'parking_info', 'survey_policy_note']);
        });
    }
};
