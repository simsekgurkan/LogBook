<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    public function getPosts(){
        return $this->hasMany(Post::class,'category_id');
    }
    public function postCount(){
        return $this->hasMany(Post::class,'category_id','id')->Where('status','1')->count();
    }
}



