<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToQuestionsTable extends Migration
{
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->unsignedBigInteger('komitmen_id')->nullable();
            $table->foreign('komitmen_id', 'komitmen_fk_10525513')->references('id')->on('komitmen');
        });
    }
}
