<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table = 'articles';


    protected $fillable = ['published_at','title', 'body','user_id'];

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


    /**
     *
     */
    public function user()
    {

        return $this->belongsTo('App\User');
    }

    public function tage()
    {
        return $this->belongsToMany('App\Tag');
    }

}
