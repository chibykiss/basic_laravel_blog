<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "admin_id",
        "title",
        "content",
        "category",
        "tags",
        "post_pic",
    ];

    //define relationship
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
