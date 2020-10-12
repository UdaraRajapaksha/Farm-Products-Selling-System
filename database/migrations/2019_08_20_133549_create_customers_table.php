<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customerId');

            $table->string('companyname');
            $table->string('name');
            $table->string('nic');
            $table->string('phoneNo');
            $table->string('email');
            $table->string('regNo')->nullable();
            //$table->string('accountNo');
            $table->string('address');
            $table->string('homeTown');
            $table->binary('image')->nullable();

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
}
