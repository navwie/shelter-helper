<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BaseMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // шо если изменить

        Schema::create('User', function(Blueprint $table){
           $table->id()->autoIncrement();
           $table->string('Name');
           $table->string('Surname');
           $table->string('Email');
           $table->string('Phone');
           $table->string('Password');
           $table->boolean('Role');
           $table->dateTime('created_at')->nullable()->useCurrent();
           $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();
        });

        Schema::create('Shelter', function(Blueprint $table){
            $table->id()->autoIncrement();
            $table->string('Name');
            $table->string('Address');
            $table->string('Phone');
            $table->string('Email');
            $table->dateTime('created_at')->nullable()->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();
        });
        Schema::create('Animal', function(Blueprint $table){
            $table->id()->autoIncrement();
            $table->string('Name');
            $table->integer('Age');
            $table->string('Sex');
            $table->string('Img_URL');
            $table->string('Type');
            $table->double('Weight');
            $table->dateTime('created_at')->nullable()->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();
        });
        Schema::create('Announcement', function(Blueprint $table){
            $table->id()->autoIncrement();
            $table->string('Topic');
            $table->text('Description');
            $table->dateTime('created_at')->nullable()->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();
        });

        Schema::table('Shelter', function (Blueprint $table){
            $table->after('id', function ($table){
                $table->foreignId('ID_user')->constrained('User')->onDelete('cascade');
            });
        });
        Schema::table('Animal', function (Blueprint $table){
            $table->after('id', function ($table){
                $table->foreignId('ID_shelter')->constrained('Shelter')->onDelete('cascade');
            });
        });
        Schema::table('Announcement', function (Blueprint $table){
            $table->after('id', function ($table){
                $table->foreignId('ID_shelter')->constrained('Shelter')->onDelete('cascade');
            });
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

            Schema::dropIfExists('User');
            Schema::dropIfExists('Shelter');
            Schema::dropIfExists('Admin');
            Schema::dropIfExists('Announcement');
    }
}
