<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomitmenTable extends Migration
{
    public function up()
    {
        Schema::create('komitmen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('deskripsi');
            $table->integer('tahun');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
