<?php
namespace Malla\User\Providers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Translation\Translator;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {

	public function boot(Kernel $HTTP, Translator $LANG) {
	}

	public function register() {

		$this->app["config"]->set("auth.guards.admin.driver", "session");
		$this->app["config"]->set("auth.guards.admin.provider", "admin");
		$this->app["config"]->set("auth.providers.admin.driver", "eloquent");
		$this->app["config"]->set("auth.providers.admin.model", \Malla\User\Model\Store::class);

	}

	public function getGrammars($locale="es") {

		if( $this->app["files"]->exists(__VENDORPATH__."App/Http/Langs/$locale.php") ) {
			return $this->app["files"]->getRequire(__VENDORPATH__."App/Http/Langs/$locale.php");
		}

		return NULL;
	}
}
