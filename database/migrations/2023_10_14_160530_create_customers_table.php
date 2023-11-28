<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('customers', function (Blueprint $table) {
        $table->id();
        $table->string('phone');
        $table->string('passport_surname');
        $table->string('costumer_father_name')->nullable('1');
        $table->string('costumer_name');
        $table->string('customSelect');
        $table->string('costumer_birthday');
        $table->string('passport_number');
        $table->string('jshshir');
        $table->string('citizenship');
        $table->string('region');
        $table->string('register_address');
        $table->string('birthplace');
        $table->string('given_by_whom');
        $table->string('date_of_issue');
        $table->string('validity_period');
        $table->json('customer_card_info');
        $table->string('passport_front_image');
        $table->string('passport_back_image');
        $table->string('passport_customer_image');
        $table->string('other_file')->nullable('1');
        $table->string('marital_status');
        $table->string('cos_language');
        $table->string('field_of_activity');
        $table->string('customer_position');
        $table->string('other_about');
        $table->json('other_contact_info');
        $table->string('limit');
        $table->string('limit_status')->default('start');
        $table->string('store_id');
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
        Schema::dropIfExists('customers');
    }
};


