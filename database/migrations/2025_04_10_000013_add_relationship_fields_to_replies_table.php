<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRepliesTable extends Migration
{
    public function up()
    {
        Schema::table('replies', function (Blueprint $table) {
            $table->unsignedBigInteger('komitmen_id')->nullable();
            $table->foreign('komitmen_id', 'komitmen_fk_10527964')->references('id')->on('komitmen');
        });
    }
}
