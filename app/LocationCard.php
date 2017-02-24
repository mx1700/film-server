<?php
/**
 * Created by PhpStorm.
 * User: x1
 * Date: 17/2/24
 * Time: 16:44
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LocationCard
 * @package App
 * @property int $id
 * @property int $film_id
 * @property string $start_time
 * @property string $card
 * @property string $created_at
 * @property string $updated_at
 */
class LocationCard extends Model
{
    protected $fillable = [
        'film_id', 'start_time', 'card'
    ];

    protected $hidden = ['card', 'created_at', 'updated_at'];

    protected $appends = ['card_url'];

    public function film()
    {
        return $this->belongsTo('App\Film');
    }

    public function getCardUrlAttribute()
    {
        $base = \Config::get('url.static_base');
        return $base . $this->card;
    }
}