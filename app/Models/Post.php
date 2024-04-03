<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;



    public function getUser() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getCategory(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
