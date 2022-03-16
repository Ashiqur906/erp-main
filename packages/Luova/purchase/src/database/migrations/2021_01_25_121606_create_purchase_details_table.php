<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_id'); 
            $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete ('cascade');
            $table->unsignedBigInteger('product_id'); 
            $table->foreign('product_id')->references('id')->on('products');
            $table->double('qty', 10, 2);
            $table->double('rate', 10, 2);
            $table->double('total', 10, 2);
           
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
        Schema::dropIfExists('purchase_details');
    }

    //php artisan migrate:refresh --path=/packages/Luova/purchase/src/database/migrations/2021_01_25_121606_create_purchase_details_table.php
}
