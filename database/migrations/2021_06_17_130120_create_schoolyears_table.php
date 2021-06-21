<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolyearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schoolyears', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->foreignId('id_creator');
            $table->boolean('selected');
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->timestamp('closed_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schoolyears');
    }
}
