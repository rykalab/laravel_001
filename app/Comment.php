<?php

namespace App;

use App\Comment;
use App\Article;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['author', 'content', 'article_id'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

}
