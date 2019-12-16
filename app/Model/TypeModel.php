<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TypeModel extends Model
{
    protected $table = 'type';
	protected $primaryKey = 't_id';
	public $timestamps = false;
	protected $guarded = [];
}
