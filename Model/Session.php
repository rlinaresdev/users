<?php
namespace Malla\User\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Session extends Model {

  protected $table = "users_session";

  protected $fillable = [
    "id",
		'user_id',
		"ip_address",
		"payload",
		"guard",
		"agent",
		"state",
		"created_at",
		"updated_at"
  ];

  //public $timestamps = false;

  //protected $dateFormat = 'U';
}
