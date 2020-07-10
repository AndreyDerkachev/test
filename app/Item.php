<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Item extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'item_tag_link');
    }

    /**
     * Возвращает товары которые принадлежат тегу
     *
     * @param $tagQuery
     * @param int $tag ID тега
     */
    public function scopeFilterTagsIn(&$tagQuery, int $tag)
    {
        $tagQuery->orWhereHas('tags', function ($query) use ($tag) {
            $query->where('id', '=', $tag);
        });
    }

    /**
     * Возвращает товары которые не принадлежат тегу
     *
     * @param $tagQuery
     * @param int $tag ID тега
     */
    public function scopeFilterTagsOut(&$tagQuery, int $tag)
    {
        $tagQuery->whereDoesntHave('tags', function ($query) use ($tag) {
            $query->where('id', '=', $tag);
        });
    }
}
