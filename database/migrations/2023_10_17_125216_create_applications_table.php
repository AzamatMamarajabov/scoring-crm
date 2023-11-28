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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('worker_id');
            $table->foreignId('costumer_id');
            $table->json('products');
            $table->string('sum');
            $table->string('month');
            $table->string('percentage');
            $table->string('payment_date');
            $table->string('first_payment')->default(0);
            $table->string('status')->default('new');
            $table->text('comment')->nullable();
            $table->string('confirm')->nullable();
            $table->string('contract')->nullable();
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
        Schema::dropIfExists('applications');
    }
};
