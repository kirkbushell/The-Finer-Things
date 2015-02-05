<?php
namespace FinerThings\Domain\Articles\Data;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $table = 'users';

    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')->orderBy('published_at', 'DESC');
    }
}
