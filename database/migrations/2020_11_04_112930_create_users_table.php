<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('email',255);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',255);
            $table->string('store_name',255)->nullable();
            $table->string('store_url',255)->nullable();
            $table->unsignedBigInteger('shop_u_id')->nullable()->comment('From shopify shop id');
            $table->unsignedBigInteger('store_id')->nullable()->comment('Relation with stores table');
            $table->tinyInteger('status')->default(0)->comment('0 for disable, 1 for enable');
            $table->string('app_theme',20)->default('dark');
            $table->tinyInteger('current_step')->default(1);
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
