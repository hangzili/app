<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PermiModel extends Model
{
    protected $table = 'permi';
	protected $primaryKey = 'p_id';
	public $timestamps = false;
	protected $guarded = [];
}
