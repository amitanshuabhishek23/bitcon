<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppPublishThemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_publish_theme', function (Blueprint $table) {
            $table->integer('id',true);
            $table->unsignedBigInteger('store_id')->nullable()->comment('Relation with stores table');
            $table->unsignedBigInteger('theme_id')->nullable();
            $table->string('shop',70)->nullable();
            $table->string('theme_name',70)->nullable();            
            $table->tinyInteger('status_front')->default(1)->comment('0 for disable, 1 for enable');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
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
        Schema::dropIfExists('app_publish_theme');
    }
}
