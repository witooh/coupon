<?php

use Illuminate\Database\Migrations\Migration;

class CreateUseCouponTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('use_coupon',
            function ($table) {
                $table->increments('id');
                $table->integer('coupon_id');
                $table->string('action', 10);
                $table->dateTime('action_time');
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
        Schema::dropIfExists('use_coupon');
    }

}