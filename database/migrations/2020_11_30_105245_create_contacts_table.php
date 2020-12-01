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
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('lead_source_id');
            $table->string('owner',100)->nullable();
            $table->string('salutation',5)->nullable();
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('title',100);
            $table->string('email')->unique()->nullable();
            $table->string('department',100)->nullable();
            $table->string('phone',100)->nullable();
            $table->string('home_phone',100)->nullable();
            $table->string('other_phone',100)->nullable();
            $table->string('fax',100)->nullable();
            $table->string('mobile',100)->nullable();
            $table->string('date_of_birth',100)->nullable();
            $table->string('assistant',100)->nullable();
            $table->string('assistant_phone',100)->nullable();
            $table->timestamps();

            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->foreign('lead_source_id')->references('id')->on('lead_sources')->onDelete('cascade');
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
