<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_invoice')->nullable();
            $table->date('invoice_date')->nullable();
            $table->unsignedBigInteger('party_ac');
            $table->foreign('party_ac')->references('id')->on('accounts');
            $table->unsignedBigInteger('purchase_ledger');
            $table->foreign('purchase_ledger')->references('id')->on('accounts');
            $table->date('date');
            $table->double('total', 10, 2);
            $table->double('discount', 10, 2)->nullable();
            $table->double('vat', 10, 2)->nullable();
            $table->double('round_of', 10, 2)->nullable();
            $table->double('grand_total', 10, 2);
     
            // Hasan Defaul coulmns 
            $table->string('remarks')->nullable();
            $table->integer('sort_by')->nullable();
            $table->enum('is_active', ['Yes', 'No'])->default('Yes');
            $table->unsignedBigInteger('create_by')->nullable();
            $table->unsignedBigInteger('modified_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('create_by')->references('id')->on('users');
            $table->foreign('modified_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
