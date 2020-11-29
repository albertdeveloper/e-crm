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
            $table->unsignedBigInteger('lead_source_id')->nullable();
            $table->unsignedBigInteger('lead_status_id')->nullable();
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
            $table->foreign('lead_source_id')->references('id')->on('lead_sources')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('lead_status_id')->references('id')->on('lead_statuses')->onUpdate('cascade')->onDelete('cascade');
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
