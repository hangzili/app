<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImgModel extends Model
{
    protected $table = 'imge';
	protected $primaryKey = 'img_id';
	public $timestamps = false;
	protected $guarded = [];
}
