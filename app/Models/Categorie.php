<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';
    public $timestamps = false;

    protected $fillable = ['nom'];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_categorie', 'categorie_id', 'article_id');
    }
}
