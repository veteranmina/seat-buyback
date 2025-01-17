<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatBuybackMarketConfigTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyback_market_config', function (Blueprint $table) {
            $table->integer('typeId')->primary();
            $table->string('typeName');
            $table->tinyInteger('marketOperationType');
            $table->integer('groupId');
            $table->string('groupName');
            $table->integer('percentage');
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
        Schema::dropIfExists('buyback_market_config');
    }
}