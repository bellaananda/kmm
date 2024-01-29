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
        Schema::create('staff_records', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('detail_id')->unsigned();
            $table->foreign('detail_id')->references('id')->on('transaction_details')->onDelete('cascade');
            $table->date('date')->default(today());
            $table->time('start_time')->default(now());
            $table->time('end_time')->default(now());
            $table->enum('status', ['waiting', 'on progress', 'done', 'canceled'])->default('waiting');
            $table->text('description')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_records');
    }
};
