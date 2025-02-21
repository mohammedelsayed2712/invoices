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
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_number', );
            $table->date('invoice_Date')->nullable();
            $table->date('due_date')->nullable();
            $table->unsignedBigInteger('section_id');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->string('product');
            $table->decimal('amount_collection', 8);
            $table->decimal('amount_commission', 8);
            $table->decimal('discount', 8);
            $table->decimal('value_vat', 8);
            $table->string('rate_vat', 999);
            $table->decimal('total', 8);
            $table->string('status')->default('active');
            $table->integer('value_status');
            $table->text('note')->nullable();
            $table->date('payment_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
