<?php
namespace FinerThings\Domain\Categories\Data;

use FinerThings\Domain\Articles\Data\Article;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
    protected $guarded = ['id'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
