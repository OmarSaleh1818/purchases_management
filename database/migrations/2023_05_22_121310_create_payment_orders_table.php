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
        Schema::create('payment_orders', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('company_id');
            $table->string('benefit_name');
            $table->integer('price');
            $table->string('currency_type');
            $table->string('just');
            $table->string('bank_name');
            $table->bigInteger('check_number');
            $table->bigInteger('iban_number');
            $table->string('project_name');
            $table->integer('project_number');
            $table->string('financial_provision');
            $table->integer('number_financial');
            $table->string('purchase_name');
            $table->integer('status_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_orders');
    }
};
