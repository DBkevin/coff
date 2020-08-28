<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCafesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cafes', function (Blueprint $table) {
            $table->id();
            $table->string("name")->comment("店名");
            $table->text("address")->comment("店铺地址");
            $table->string("city")->comment("城市名称");
            $table->string("state")->comment("省/区");
            $table->string("zip")->comment("邮编");
            $table->decimal('latitude', 11, 8)->comment("店铺维度");
            $table->decimal('longitude', 11, 8)->comment("店铺经度");
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
        Schema::dropIfExists('cafes');
    }
}
