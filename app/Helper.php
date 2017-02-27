<?php
/**
 * Created by PhpStorm.
 * User: x1
 * Date: 17/2/27
 * Time: 15:38
 */

namespace App;


class Helper
{
    static function coverUpYunUrl($url) {
        $find = "upyun.com/";
        $start = strpos($url, $find);
        if ($start) {
            $url = substr($url, $start + strlen($find));
        }
        return $url;
    }
}