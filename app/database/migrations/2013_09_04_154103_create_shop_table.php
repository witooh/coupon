<?php

use Illuminate\Database\Migrations\Migration;

class CreateShopTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop',
            function ($table) {
                $table->increments('id');
                $table->string('shop_name', 100);
                $table->string('owner_username', 50);
                $table->string('owner_password', 72);

                $table->index('shop_name');
                $table->index('owner_username');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop');
    }

}