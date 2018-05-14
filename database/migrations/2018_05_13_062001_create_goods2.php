<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoods2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                ->references('id')
                ->on('category')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('subcategory2_id')->unsigned()->nullable();
            $table->foreign('subcategory2_id')
                ->references('id')
                ->on('subcategory2')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('subcategory3_id')->unsigned()->nullable();
            $table->foreign('subcategory3_id')
                ->references('id')
                ->on('subcategory3')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('vendor_code')->unique();
            $table->string('title');
            $table->decimal('price',8,2);

            $table->string('announce')->nullable();
            $table->string('features')->nullable();
            $table->string('description')->nullable();
            $table->decimal('weight',8,2)->nullable();
            $table->decimal('volume',8,2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('goods');
    }
}
