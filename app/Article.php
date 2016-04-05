<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table = 'articles';


    public function scopePublished($query)
    {
        $query->where('published_at','<=', Carbon::now() );
    }
    public function scopeUnPublished($query)
    {
        $query->where('published_at','>', Carbon::now() );
    }

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }
}
