<?php
namespace Malla\User\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Info extends Model {

  protected $table = "users_info";

  protected $fillable = [
    "user_id",
		"firstname",
		"lastname",
		"birthday",
		"gender",
		"place_birth",
		"book",
		"folio",
		"no_acta",
		"year",
		"nationality",
		"passport",
		"current_address",
		"street",
		"no",
		"sector",
		"home_phone",
		"cellphone",
		"office_phone",
		"blood_type",
		"allergic_to",
		"medical_note",
		"civil_status",
		"ocupation",
		"profession",
		"academic_live",
		"work_place",
		"live_with",
		"created_at",
		"updated_at"
  ];
}
