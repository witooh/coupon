<?php

use Illuminate\Database\Migrations\Migration;

class CreateCouponTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('coupon',
            function ($table) {
                $table->increments('id');
                $table->integer('shop_id');
                $table->string('coupon_name', 100);
                $table->date('active_date');
                $table->date('expire_date');

                $table->index('shop_id');
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
		Schema::dropIfExists('coupon');
	}

}