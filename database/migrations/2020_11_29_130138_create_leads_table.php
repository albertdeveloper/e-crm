<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('lead_source_id')->constrained();
            $table->foreignId('lead_status_id')->constrained();
            $table->string('owner',100)->nullable();
            $table->string('company',100)->nullable();
            $table->string('salutation',5)->nullable();
            $table->string('first_name',100)->nullable();
            $table->string('last_name',100)->nullable();
            $table->string('title',100)->nullable();
            $table->string('email',100)->unqiue()->nullable();
            $table->string('phone',100)->nullable();
            $table->string('fax',100)->nullable();
            $table->string('mobile',100)->nullable();
            $table->string('website',100)->nullable();
            $table->string('industry',100)->nullable();
            $table->tinyInteger('no_employee')->nullable();
            $table->string('street',100)->nullable();
            $table->string('city',100)->nullable();
            $table->string('state',100)->nullable();
            $table->string('zip_code',50)->nullable();
            $table->string('country',100)->nullable();

            $table->timestamps();
            $table->softDeletes();
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
