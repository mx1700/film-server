<?php
/**
 * Created by PhpStorm.
 * User: x1
 * Date: 17/2/18
 * Time: 23:42
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Film
 * @package App
 * @property int $id
 * @property string $name
 * @property string $cover
 * @property string $background_image
 * @property string $introduction
 * @property int $runtime
 * @property string $tips
 * @property string $type
 * @property string $releaseDate
 * @property string $sort
 * @property string $created_at
 * @property string $updated_at
 */
class Film extends Model
{
    protected $fillable = [
        'name', 'cover', 'background_image', 'introduction', 'runtime', 'tips', 'type', 'releaseDate', 'sort'
    ];

    protected $appends = ['cover_url', 'background_image_url'];

    protected $hidden = ['cover', 'background_image', 'created_at', 'updated_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->sort = 0;
    }

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

    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function locationCards()
    {
        return $this->hasMany('App\LocationCard');
    }
}