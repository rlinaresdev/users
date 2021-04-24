<?php
namespace Malla\User\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Malla\User\Model\Info;
use Malla\User\Model\Meta;
use Malla\User\Model\Group;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Model;

class Store extends Model {

  protected $table = "users";

  protected $fillable = [
    "id",
		"public_name",
		"user",
		"email",
		"password",
		"avatar",
		"type",
		"activated",
		"created_at",
		"updated_at"
  ];

  protected $hidden = [
      'password', 'remember_token',
  ];

  /*
  * SETTINGS */
  public function setPasswordAttribute($value) {
      $value = trim($value);
      $value = bcrypt($value);

      $this->attributes['password'] = $value;
  }

  /*
  * RELATIONS */
  public function info() {
  	return $this->hasOne(Info::class, "user_id");
  }

  public function meta() {
  	return $this->hasMany(UserMeta::class, "user_id");
  }

  public function guard( $guard ) {
      return \Guard\Facade\Agent::current($guard);
  }

  public function groups() {
  	return $this->belongsToMany(Group::class, "users_groups_pivots", "user_id", "group_id")->withPivot(
          "view", "insert", "update", "delete", "ui", "dash", "path"
      );
  }

  /*
  * USER INFO */
  public function addInfo($data) {
    $this->info()->create($data); return $this;
  }

  /*
  * USER GROUP */
  public function getGroup( $slug ) {
    if( ($data = (new Group)->where("slug", $slug))->count() > 0 ) {
      return $data->first();
    }
  }
  public function attachToGroup( $group, $args=[] ) {
    if( !empty( ($group = $this->getGroup($group)) ) ) {
      $this->groups()->attach($group->id, $args);
    }

    return $this;
  }

  public function detashToGroup( $slug ) {
    if( !empty( ($group = $this->getGroup($group)) ) ) {
      $this->groups()->detach($group->id);
    }

    return $this;
  }



  //public $timestamps = false;

  //protected $dateFormat = 'U';
}
