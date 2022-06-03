<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('membres', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->integer('cni')->nullable()->unique();
            $table->string('matricule')->nullable()->unique();
            $table->string('lieu_naissance')->nullable();
            $table->date('date_naissance');
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('sexe')->nullable();
            $table->string('situation_matrimoniale')->nullable();
            $table->string('structure_id')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membres');
    }
}
