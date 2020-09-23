<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('code');

            $table->foreignId('product_id')->nullable();
            $table->foreign('product_id')
                ->on('products')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('category_id')->nullable();
            $table->foreign('category_id')
                ->on('categories')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('qty');
            $table->integer('subtotal');
            
            $table->string('name');
            $table->string('address');
            $table->integer('postal_code');
            $table->enum('kurir',['TIKI','JNE','POS']);
            $table->enum('payment',['0','1']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
