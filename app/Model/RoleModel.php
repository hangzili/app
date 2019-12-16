<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $table = 'role';
	protected $primaryKey = 'r_id';
	public $timestamps = false;
	protected $guarded = [];
}
