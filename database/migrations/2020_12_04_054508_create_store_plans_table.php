<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id')->nullable()->comment('Relation with stores table');
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->unsignedBigInteger('recurring_application_charge_id')->nullable();
            $table->unsignedBigInteger('api_client_id')->nullable();
            $table->decimal('price', 8, 2)->default('0.00');
            $table->string('status',20)->collation('utf8mb4_unicode_ci')->nullable();
            $table->text('confirmation_url')->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('billing_on',100)->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('created_on',100)->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('activated_on',100)->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('cancelled_on',100)->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('trial_days',255)->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('trial_ends_on',255)->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('decorated_return_url',255)->collation('utf8mb4_unicode_ci')->nullable();
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
        Schema::dropIfExists('store_plans');
    }
}
