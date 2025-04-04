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
        Schema::create('seo_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('seo_id')->nullable();
            $table->foreign('seo_id')->references('id')->on('seos')->onDelete('cascade');
            $table->string('model_type')->nullable();
            $table->string('image_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_images');
    }
};
