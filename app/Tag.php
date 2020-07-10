<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function items()
    {
        return $this->belongsToMany(Item::class,'item_tag_link');
    }
}
