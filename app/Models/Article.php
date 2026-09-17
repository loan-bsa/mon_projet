<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    public $timestamps = false;

    protected $fillable = ['nom', 'description', 'prix'];

    public function categories()
    {
        return $this->belongsToMany(Categorie::class, 'article_categorie', 'article_id', 'categorie_id');
    }
}
