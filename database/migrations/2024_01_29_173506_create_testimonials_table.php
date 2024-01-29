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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('autorepair_shops')->onDelete('cascade');
            $table->string('name');
            $table->string('vehicle_type')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->text('image')->nullable()->default(null);
            $table->boolean('is_shown_anonymously')->default(false);
            $table->boolean('is_shown')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
