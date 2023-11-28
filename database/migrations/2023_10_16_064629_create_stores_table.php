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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name');
            $table->string('name_gl')->nullable();
            $table->string('phone');
            $table->string('phone2')->nullable();
            $table->string('telegram')->nullable();
            $table->string('website')->nullable();
            $table->string('inn')->nullable();
            $table->string('okonx')->nullable();
            $table->string('oked')->nullable();
            $table->string('kks')->nullable();
            $table->string('account_number')->nullable();
            $table->string('director')->nullable();
            $table->string('accountant')->nullable();
            $table->string('logotip')->nullable();
            $table->string('slogan')->nullable();
            $table->string('slogan_mini')->nullable();
            $table->string('address');
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
};
