<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players_roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('role_id');
            $table->foreign('player_id')->references('id')->on('players');
            $table->foreign('role_id')->references('id')->on('roles');
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
        Schema::dropIfExists('players_roles');
    }
}
