<?php
namespace Malla\User;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use \Artisan;
use Malla\User\Database\UserSchema;

class Info {

	public function app() {
		return [
			"type"			   => "library",
			"slug"			   => "user",
			"kernel"		   => Malla\User\Kernel::class,
			"info"			   => Malla\User\Info::class,
			"token"			   => NULL,
			"activated" 	 => 1,
		];
	}

	public function info() {
		return [
			"name"			    => "Users",
			"author"		    => "Ing. Ramón A Linares Febles",
			"email"			    => "rlinares4381@gmail.com",
			"license"		    => "MIT",
			"support"		    => "http://www.iipec.net",
			"version"		    => "V-1.0",
			"description" 	=> "Librería de usuarios V-1.0",
		];
	}

	public function meta() {
		return [
		];
	}

  public function migrator() {
		return str_replace(base_path(), NULL, realpath(__DIR__."/Database/Migration")."/").'/';
	}

  public function install( $app ) {
		Artisan::call('migrate', ["--path"=> $this->migrator()]);
		Artisan::call("db:seed", ['class' => \Malla\User\Database\Seeds\UserSeeder::class]);
  }

  public function uninstall() {
		Artisan::call('migrate:reset', ["--path"=> $this->migrator()]);
  }

	public function handler( $core ) {
		$core->create($this->app())->addInfo($this->info());
	}
}
