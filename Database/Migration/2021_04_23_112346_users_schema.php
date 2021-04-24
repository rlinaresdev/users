<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersSchema extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

      Schema::create('users', function (Blueprint $table) {
        $table->bigIncrements('id');

        $table->string("type", 30)->default("local");

        $table->string("fullname")->default("Owner");
        $table->string("public_name")->default("Owner");

        $table->string("user", 30)->unique();
        $table->string("email", 100)->unique();
        $table->string("cellphone", 20)->nullable();
        $table->string("rnc", 30)->nullable();
        $table->string("password", 80);
        $table->boolean("recovery")->default(0);
        $table->string("avatar", 200)->default(":avatar_path/user.png");

        $table->char("activated", 1)->default(0);

        $table->rememberToken();

        $table->timestamps();

        $table->engine = 'InnoDB';
      });

      Schema::create('users_info', function (Blueprint $table) {
        $table->bigIncrements('id');

        $table->bigInteger('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');

        $table->string("firstname", 30)->nullable();
        $table->string("lastname", 30)->nullable();
        $table->string("another_email", 100)->nullable();
        $table->date("birthday")->nullable();
        $table->string("gender", 40)->nullable();

        $table->string("book", 60)->nullable();
        $table->string("folio", 60)->nullable();
        $table->integer("no_acta")->nullable();
        $table->string("year", 12)->nullable();

        $table->string("place_birth", 60)->nullable();
        $table->string("nationality", 255)->nullable();
        $table->string("city", 225)->nullable();
        $table->string("passport", 30)->nullable();
        $table->string("current_address", 255)->nullable();
        $table->string("street", 255)->nullable();
        $table->string("no", 12)->nullable();
        $table->string("sector", 255)->nullable();
        $table->string("cellphone", 20)->nullable();
        $table->string("home_phone", 20)->nullable();
        $table->string("office_phone", 20)->nullable();
        $table->string("blood_type", 255)->nullable();
        $table->text("allergic_to")->nullable();
        $table->text("medical_note")->nullable();
        $table->string("civil_status", 50)->nullable();
        $table->string("ocupation", 255)->nullable();
        $table->string("profession", 255)->nullable();
        $table->string("work_place", 255)->nullable();

        $table->string("academic_live", 255)->nullable();
        $table->string("live_with", 255)->nullable();

        $table->timestamps();

        $table->engine = 'InnoDB';
      });

      Schema::create('users_meta', function (Blueprint $table) {
        $table->bigInteger('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');

        $table->string("type", 30)->default("info");

        $table->string('key', 255);
        $table->text('value')->nullable();

        $table->boolean('activated')->default(1);

        $table->engine = 'InnoDB';
      });

      Schema::create('users_recovery', function (Blueprint $table) {

        $table->string('email', 130)->index();
        $table->string('token', 100);

        $table->timestamps();

        $table->engine = 'InnoDB';
      });

      Schema::create('users_session', function (Blueprint $table) {
        $table->bigIncrements('id');

        $table->bigInteger('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');

        $table->string("payload", 75);

        $table->string("guard", 30)->default("web");

        $table->string("ip_address", 45)->nullable();
        $table->text("agent")->nullable();

        $table->char("activated", 1)->default(1);

        $table->timestamps();

        $table->engine = 'InnoDB';
      });

      Schema::create('users_groups', function (Blueprint $table) {
        $table->increments('id');

        $table->integer("parent")->default(0);
        $table->string("slug", 100);
        $table->text("group")->nullable();

        $table->boolean("activated")->default(1);

        $table->timestamps();

        $table->engine = 'InnoDB';
      });

      Schema::create('users_groups_pivots', function (Blueprint $table) {
        $table->bigIncrements('id');

        $table->bigInteger('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');

        $table->integer('group_id')->unsigned();
        $table->foreign('group_id')->references('id')->on('users_groups')->onDelete('CASCADE')->onUpdate('CASCADE');

        $table->boolean("view")->default(1);

        $table->boolean("insert")->default(0);
        $table->boolean("update")->default(0);
        $table->boolean("delete")->default(0);

        $table->boolean("ui")->default(0);

        $table->boolean("dash")->default(0);

        $table->string("path", 200)->default("/");

        $table->engine = 'InnoDB';
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
      Schema::dropIfExists('users_groups_pivots');
      Schema::dropIfExists('users_groups');
      Schema::dropIfExists('users_session');
      Schema::dropIfExists('users_recovery');
      Schema::dropIfExists('users_meta');
      Schema::dropIfExists('users_info');
      Schema::dropIfExists('users');
    }
}
