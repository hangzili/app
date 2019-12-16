<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AttrModel extends Model
{
    protected $table = 'attr';
	protected $primaryKey = 'a_id';
	public $timestamps = false;
	protected $guarded = [];
}
