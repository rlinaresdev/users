<?php
namespace Malla\User\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Recovery extends Model {

  protected $table = "users_recovery";

  protected $fillable = [
    "email",
		"token",
		"created_at",
		"updated_at"
  ];

  //public $timestamps = false;

  //protected $dateFormat = 'U';
}
