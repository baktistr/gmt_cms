<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id');
            $table->string('idareal_old');
            $table->string('no_certificate');
            $table->string('luas');
            $table->string('sk_hak');
            $table->string('end');
            $table->string('loker');
            $table->string('bundel');
            $table->string('page');
            $table->string('status');
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
        Schema::dropIfExists('area_certificates');
    }
}
