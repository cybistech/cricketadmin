<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $fillable = ['title','status','author','slug','meta_description','meta_tags','excerpt','content','news_categories_id','tags','image','user_id'];
}
