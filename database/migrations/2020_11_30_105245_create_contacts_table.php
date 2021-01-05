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
            $table->foreignId('account_id')->constrained();
            $table->foreignId('lead_source_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('salutation',5)->nullable();
            $table->string('first_name',100)->nullable();
            $table->string('last_name',100)->nullable();
            $table->string('title',100)->nullable();
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
            $table->softDeletes();
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
