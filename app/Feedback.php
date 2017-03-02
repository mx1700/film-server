<?php
/**
 * Created by PhpStorm.
 * User: x1
 * Date: 17/3/2
 * Time: 20:25
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'user_id', 'platform', 'content'
    ];
}