<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_title',255)->nullable();
            $table->decimal('plan_price', 10, 2)->default('0.00');
            $table->text('plan_description')->nullable();
            $table->integer('plan_trial')->default(0);
            $table->string('plan_env',20)->default('true');
            $table->tinyInteger('status')->default(1)->comment('0 For Inactive, 1 for Active');
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
        Schema::dropIfExists('price_plans');
    }
}
