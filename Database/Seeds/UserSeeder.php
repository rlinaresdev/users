<?php
namespace Malla\User\Database\Seeds;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Malla\User\Model\Group;
use Malla\User\Model\Store;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {

	public function run() {

		$user = new Store;
		$group = new Group;

		$group->create(["slug" => "admin", "group" => "users.group.admin"]);
		$group->create(["slug" => "web", "group" => "users.group.web"]);

		$user->create([
			"fullname" 		=> "App Malla",
			"public_name" => "Malla",
			"user"				=> "admin",
			"email"				=> "admin@malla.lc",
			"password"		=> "admin",
		])->addInfo([
			"firstname" => "Malla",
			"lastname" 	=> "Web"
		])
		->attachToGroup("admin", ["insert" => 1, "dash" => 1])
		->attachToGroup("web", ["insert" => 1, "update" => 1, "delete" => 1]);
	}
}
