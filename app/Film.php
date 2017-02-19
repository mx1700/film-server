<?php
/**
 * Created by PhpStorm.
 * User: x1
 * Date: 17/2/18
 * Time: 23:42
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'name', 'cover', 'background_image', 'introduction', 'runtime'
    ];

    protected $appends = ['cover_url', 'background_image_url'];

    protected $hidden = ['cover', 'background_image'];

    public function getCoverUrlAttribute()
    {
        $base = \Config::get('url.static_base');
        return $base . $this->cover;
    }

    public function getBackgroundImageUrlAttribute()
    {
        $base = \Config::get('url.static_base');
        return $base . $this->background_image;
    }
}