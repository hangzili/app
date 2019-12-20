<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ColleModel extends Model
{
    protected $table = 'collection';
    protected $primaryKey="co_id";
    public $timestamps = false;
    protected $guarded = [];
}
