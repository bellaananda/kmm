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
        Schema::create('autorepair_shops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('phone_number')->nullable()->default(null);
            $table->text('details')->nullable()->default(null);
            $table->text('logo')->nullable()->default(null);
            $table->text('image')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autorepair_shops');
    }
};
