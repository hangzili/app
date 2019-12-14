<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $table = 'car';
	protected $primaryKey="car_id";
	public $timestamps = false;
	protected $guarded = [];
}
