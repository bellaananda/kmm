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
        Schema::create('transaction_headers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('transaction_date')->default(today());
            $table->date('entry_date')->default(today());
            $table->date('exit_date')->default(today());
            $table->date('estimated_date')->default(today());
            $table->string('owner_name')->nullable();
            $table->string('owner_phone')->nullable();
            $table->text('owner_address')->nullable()->default(null);
            $table->string('plate_number')->nullable()->default(null);
            $table->string('vehicle_type')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->enum('status', ['waiting', 'on progress', 'done', 'canceled'])->default('waiting');
            $table->integer('additional_fee')->nullable()->default(0);
            $table->decimal('total_price')->nullable()->default(0);
            $table->decimal('down_payment')->nullable()->default(0);
            $table->date('down_payment_date')->nullable()->default(today());
            $table->decimal('final_payment')->nullable()->default(0);
            $table->date('final_payment_date')->nullable()->default(today());
            $table->text('proof_of_payment')->nullable()->default(null);
            $table->string('payment_method')->nullable()->default(null);
            $table->boolean('is_fully_paid')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_headers');
    }
};
