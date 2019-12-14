<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class SearchModel extends Model
{
    protected $table = 'search';
	protected $primaryKey="search_id";
	public $timestamps = false;
	protected $guarded = [];
}
