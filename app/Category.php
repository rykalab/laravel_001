<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'body', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
