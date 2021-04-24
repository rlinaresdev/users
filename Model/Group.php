<?php
namespace Malla\User\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

  protected $table = "users_groups";

  protected $fillable = [
    "parent",
		"slug",
		"group",
		"activated",
		"created_at",
		"updated_at"
  ];

  public function users() {
  	return $this->belongsToMany(Store::class, "users_groups_pivots", "group_id", "user_id")->withPivot(
          "view", "insert", "update", "delete", "ui", "dash", "path"
      );
  }


  //public $timestamps = false;

  //protected $dateFormat = 'U';
}
