<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ScrumDashboard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table projects
         */
        Schema::create('projects', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->text('description');
            $table->dateTime('created_at')->nullable()->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();
        });

        /**
         * Table documents
         */
        Schema::create('documents', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('url');
            $table->dateTime('last_time_opened')->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();
        });

        /**
         * Table boards
         */
        Schema::create('boards', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();
        });

        /**
         * Table cards
         */
        Schema::create('cards', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title');
            $table->text('description');
            $table->dateTime('deadline');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();
        });

        /**
         * Table boards_cards
         */
        Schema::create('boards_cards', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();
        });

        /**
         * Table reports
         */
        Schema::create('reports', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->text('description');
            $table->text('main_text');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();
        });

        /**
         * Table users
         */
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('password')->nullable();
            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();
        });

        /**
         * Table projects_documents
         */
        Schema::create('projects_documents', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();
        });

        /**
         * Table projects_users
         */
        Schema::create('projects_users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();
        });

        /**
         * Table projects_reports
         */
        Schema::create('projects_reports', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();
        });


        /*
        |--------------------------------------------------------------------------
        | Foreign keys
        |--------------------------------------------------------------------------
        */

        /**
         * Foreign keys projects
         */
        Schema::table('projects', function (Blueprint $table) {
            $table->after('description', function ($table) {
              $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            });
        });

        /**
         * Foreign keys documents
         */
        Schema::table('documents', function (Blueprint $table) {
            $table->after('url', function ($table) {
                $table->foreignId("author_id")->constrained('users');
                $table->foreignId("last_user_opened")->nullable()->constrained('users')->onDelete('cascade');
            });
        });

        /**
         * Foreign keys boards
         */
        Schema::table('boards', function (Blueprint $table) {
            $table->after('id', function ($table) {
                $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            });
        });

        /**
         * Foreign keys boards_cards
         */
        Schema::table('boards_cards', function (Blueprint $table) {
            $table->after('id', function ($table) {
                $table->foreignId('board_id')->constrained('boards')->onDelete('cascade');
                $table->foreignId('card_id')->constrained('cards')->onDelete('cascade');
            });
        });

        /**
         * Foreign keys projects_documents
         */
        Schema::table('projects_documents', function (Blueprint $table) {
            $table->after('id', function ($table) {
                $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
                $table->foreignId('document_id')->constrained('documents')->onDelete('cascade');
            });
        });

        /**
         * Foreign keys projects_users
         */
        Schema::table('projects_users', function (Blueprint $table) {
            $table->after('id', function ($table) {
                $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            });
        });

        /**
         * Foreign keys projects_reports
         */
        Schema::table('projects_reports', function (Blueprint $table) {
            $table->after('id', function ($table) {
                $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
                $table->foreignId('report_id')->constrained('reports')->onDelete('cascade');
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
        Schema::table('documents', function(Blueprint $table) {
            $table->dropForeign('author_id');
            $table->dropForeign("last_user_opened");
        });

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

        Schema::table('projects_documents', function(Blueprint $table) {
            $table->dropForeign('project_id');
            $table->dropForeign('document_id');
        });

        Schema::table('projects_users', function(Blueprint $table) {
            $table->dropForeign('project_id');
            $table->dropForeign('user_id');
        });

        Schema::table('projects_reports', function(Blueprint $table) {
            $table->dropForeign('project_id');
            $table->dropForeign('report_id');
        });

        Schema::drop('projects');

        Schema::drop('documents');

        Schema::drop('boards');
        Schema::drop('cards');
        Schema::drop('boards_cards');

        Schema::drop('reports');

        Schema::drop('users');
        Schema::drop('projects_documents');
        Schema::drop('projects_users');
        Schema::drop('projects_reports');
    }
}
