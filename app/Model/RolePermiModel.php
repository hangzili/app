<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RolePermiModel extends Model
{
    protected $table = 'role_permi';
	protected $primaryKey = 'r_p_id';
	public $timestamps = false;
	protected $guarded = [];
}
