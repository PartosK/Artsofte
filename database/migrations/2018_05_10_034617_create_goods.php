<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoods extends Migration
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
            $table->string('category')->nullable();
            $table->string('subcategory2')->nullable();
            $table->string('subcategory3')->nullable();
            $table->string('vendor_code')->nullable();
            $table->string('title')->nullable();
            $table->string('announce')->nullable();
            $table->string('features')->nullable();
            $table->string('description')->nullable();
            $table->string('weight')->nullable();
            $table->string('volume')->nullable();
            $table->string('price')->nullable();

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
        Schema::dropIfExists('goods');
    }
}
