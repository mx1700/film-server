<?php
/**
 * Created by PhpStorm.
 * User: x1
 * Date: 17/9/16
 * Time: 15:43
 */

namespace App;
use Illuminate\Database\Eloquent\Model;


/**
 * 弹幕
 * Class Barrage
 * @package App
 * @property int $id
 * @property int $event_id
 * @property int $user_id
 * @property int $time
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
class Barrage extends Model
{
    protected $fillable = [
        'event_id', 'time' ,'user_id', 'content'
    ];

    protected $hidden = ['created_at', 'updated_at'];
}