<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected  $fillable = ['title','content','type'];
protected $table = 'reports';
}
