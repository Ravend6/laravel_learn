<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'body',
        'published_at',
    ];

    protected $dates = ['published_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date); // 2012-12-22 10:22:02
        // $this->attributes['published_at'] = Carbon::parse($date); // 2012-12-22 0:0:0
    }

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopePublisheda($query, $eq)
    {
        $query->where('published_at', $eq , Carbon::now());
    }

    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->toArray();
    }

    public function bodyToHtml()
    {
        return Markdown::convertToHtml($this->body);
    }
}
