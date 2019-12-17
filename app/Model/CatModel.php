<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CatModel extends Model
{
    protected $table = 'cat';
    protected $primaryKey="cat_id";
    public $timestamps = false;
    protected $guarded = [];
}
