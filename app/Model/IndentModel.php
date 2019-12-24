<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class IndentModel extends Model
{
    protected $table = 'indent';
    protected $primaryKey="indent_id";
    public $timestamps = false;
    protected $guarded = [];
}
