<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function Member(){
        return $this->belongsTo('App\Models\admin\Member','user_id');
    }
    public function childrenComments() {
        return $this->hasMany('App\Models\admin\Comment','comment_id');
    }
    public function childrenBlogs() {
        return $this->hasMany('App\Models\admin\Comment','blog_id');
    }
    public function parentBlog() {
        return $this->belongsTo('App\Models\admin\Blog','blog_id');
    }
    public function parentComment() {
        return $this->belongsTo('App\Models\admin\Comment','comment_id');
    }
}
