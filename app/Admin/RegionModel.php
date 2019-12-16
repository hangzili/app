<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class RegionModel extends Model
{
    protected $table = 'region';
	protected $primaryKey="id";
	public $timestamps = false;
	protected $guarded = [];
}
