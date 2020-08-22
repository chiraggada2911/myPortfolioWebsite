<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('title_bg_name')->nullable();
            $table->string('title');
            $table->string('custom_title')->nullable();
            $table->text('desc')->nullable();
            $table->string('email_title')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_title')->nullable();
            $table->string('phone')->nullable();
            $table->string('address_title')->nullable();
            $table->text('address')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
