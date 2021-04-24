<?php
namespace Malla\User\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Kernel {

	public function providers() {
		return [
      \Malla\User\Providers\UserServiceProvider::class,
		];
	}

	public function alias() {
		return [
		];
	}

	public function handler($app) {
	}
}
