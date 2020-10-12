<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplierId');
            $table->string('farmName');
            $table->string('phoneNo');
            $table->string('name');
            $table->string('nic');
            $table->string('email');
            $table->string('accountNo');
            $table->string('farmRegNo')->nullable();
            $table->string('address');
            $table->string('homeTown');
            $table->string('location')->nullable();
            $table->integer('rating')->nullable();
            $table->binary('image')->nullable();
            $table->string('supplier_description')->nullable();

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
        Schema::dropIfExists('suppliers');
    }
}
