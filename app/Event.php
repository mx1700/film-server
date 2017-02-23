<?php
/**
 * Created by PhpStorm.
 * User: x1
 * Date: 17/2/20
 * Time: 17:42
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 * @package App
 * @property int $id
 * @property int $film_id
 * @property int $type
 * @property string $time
 * @property string $resources
 * @property string $created_at
 * @property string $updated_at
 */
class Event extends Model
{
    static $VIDEO_EVENT = 1;
    static $IMAGE_EVENT = 2;
    static $WEB_PAGE_EVENT = 3;

    protected $fillable = [
        'film_id', 'type', 'time', 'resources'
    ];

    protected $hidden = ['resources'];

    protected $appends = ['resources_url'];

    public function film()
    {
        return $this->belongsTo('App\Film');
    }

    public function getResourcesUrlAttribute()
    {
        $base = \Config::get('url.static_base');
        return $base . $this->resources;
    }
}