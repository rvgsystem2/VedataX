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
        Schema::create('home_page_media', function (Blueprint $table) {
            $table->id();
            $table->string('hero_bg')->nullable();
            $table->string('location_1')->nullable();
            $table->string('location_2')->nullable();
            $table->string('location_3')->nullable();
            $table->string('location_4')->nullable();
            $table->string('about_image')->nullable();
            $table->string('final_cat_bg')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_media');
    }
};
