<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class PageModel extends Model
{
    protected $table = 'page';
	protected $primaryKey="page_id";
	public $timestamps = false;
	protected $guarded = [];
}
