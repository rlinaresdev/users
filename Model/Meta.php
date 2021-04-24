<?php
namespace Malla\User\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Meta extends Model {

  protected $table = "users_meta";

  protected $fillable = [
    "user_id",
		"type",
		"key",
		"value"
  ];

  public $timestamps = false;

  //protected $dateFormat = 'U';
}
