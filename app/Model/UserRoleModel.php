<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserRoleModel extends Model
{
    protected $table = 'user_role';
	protected $primaryKey = 'u_r_id';
	public $timestamps = false;
	protected $guarded = [];
}
