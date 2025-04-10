<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question');
            $table->string('type');
            $table->boolean('is_required')->default(0);
            $table->integer('parent')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
