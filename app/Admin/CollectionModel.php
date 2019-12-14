<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class CollectionModel extends Model
{
    protected $table = 'collection';
	protected $primaryKey="colle_id";
	public $timestamps = false;
	protected $guarded = [];
}
