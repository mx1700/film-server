<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: x1
 * Date: 17/3/2
 * Time: 20:43
 */
class SiteConfig extends Model
{
    protected $fillable = [
        'name', 'image_url'
    ];

    static function get($name) {
        $line = static::where('name', '=', $name)->first();
        return $line ? json_decode($line->value, true) : null;
    }

    static function set($name, $value) {
        $item = static::firstOrNew(['name' => $name]);
        $item->value = json_encode($value);
        $item->save();
    }

    static function value($name, $v = false) {
        if ($v === false) {
            return static::get($name);
        } else {
            static::set($name, $v);
        }
    }

    static function helpInfo($value = null) {
        $name = 'help_info';
        if ($value === null) {
            $r = static::get($name);
            if ($r == null) {
                $r = [
                    ['image_url' => 'cover/1.jpg', 'content' => '帮助信息1'],
                    ['image_url' => 'cover/2.jpg', 'content' => '帮助信息2'],
                    ['image_url' => 'cover/3.jpg', 'content' => '帮助信息3'],
                    ['image_url' => 'cover/1.jpg', 'content' => '帮助信息4'],
                    ['image_url' => 'cover/2.jpg', 'content' => '帮助信息5'],
                ];
                $base = \Config::get('url.static_base');
                return array_map(function($item) use($base) {
                    $item['image_url'] = $base . $item['image_url'];
                    return $item;
                }, $r);
            } else {
                return $r;
            }
        } else {
            static::set($name, $value);
        }
    }
}