<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('store_url',255);
            $table->unsignedBigInteger('shop_id')->nullable()->comment('From shopify');
            $table->string('shop_owner',100)->nullable();
            $table->string('store_name',50)->nullable();
            $table->string('money_in_emails_format',50)->nullable();
            $table->string('money_with_currency_in_emails_format',50)->nullable();
            $table->string('province',50);
            $table->text('access_token');
            $table->string('email',255)->nullable();
            $table->string('country_name',50)->nullable();
            $table->string('customer_email',100)->nullable();
            $table->string('currency',50)->nullable();
            $table->integer('minimum_qty')->nullable();
            $table->text('address')->nullable();
            $table->string('phone',40)->nullable();
            $table->string('city',100)->nullable();
            $table->string('zip',40)->nullable();
            $table->string('reference_url')->nullable();
            $table->string('iana_timezone',50)->nullable();
            $table->tinyInteger('status')->default(1)->comment('0 For inactive,1 for active');
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
        Schema::dropIfExists('stores');
    }
}
