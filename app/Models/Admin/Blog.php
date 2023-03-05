<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function User(){
        return $this->belongsTo('App\Models\admin\Member');
    }
    public function Category(){
        return $this->belongsTo('App\Models\admin\Category');
    }
}
