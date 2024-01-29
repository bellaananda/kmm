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
        Schema::create('financial_records', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('restock_id')->unsigned()->nullable();
            $table->foreign('restock_id')->references('id')->on('restocks')->onDelete('cascade');
            $table->bigInteger('header_id')->unsigned()->nullable();
            $table->foreign('header_id')->references('id')->on('transaction_headers')->onDelete('cascade');
            $table->decimal('initial_amount')->nullable()->default(null);
            $table->decimal('final_amount')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_records');
    }
};
