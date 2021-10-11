<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Boards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('project_id')->constrained('projects');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();
        });

        Schema::create('cards', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title');
            $table->text('description');
            $table->dateTime('deadline');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();
        });

        Schema::create('boards_cards', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('board_id')->constrained('boards');
            $table->foreignId('card_id')->constrained('cards');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('boards', function(Blueprint $table) {
            $table->dropForeign('project_id');
        });

        Schema::table('cards', function(Blueprint $table) {
            $table->dropForeign('user_id');
        });

        Schema::table('boards_cards', function(Blueprint $table) {
            $table->dropForeign('board_id');
            $table->dropForeign('card_id');
        });

        Schema::drop('boards');
        Schema::drop('cards');
        Schema::drop('boards_cards');
    }
}
