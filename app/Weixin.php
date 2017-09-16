<?php
/**
 * Created by PhpStorm.
 * User: x1
 * Date: 17/9/3
 * Time: 13:40
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * 微信登陆
 * Class Weixin
 * @package App
 * @property int $id
 * @property int user_id
 * @property string open_id
 * @property string union_id
 * @property string user_info
 * @property string $created_at
 * @property /App/User $user
 */
class Weixin extends Model
{

    protected $fillable = [
        'user_id', 'open_id', 'union_id', 'user_info',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @param $open_id
     * @param $union_id
     * @return Weixin
     */
    static function findByWeixinId($open_id, $union_id) {
        return Weixin::query()->where('open_id', '=', $open_id)->first();
    }

    static function getWeixinUserInfo($code) {
        return json_decode('
{
    "openid": "openo6_bmasdasdsad6_2sgVt7hMZOPfL",
    "nickname": "苍井空",
    "sex": "1",
    "province": "北京",
    "country": "北京",
    "headimgurl": "http://wx.qlogo.cn/mmopen/g3MonUZtNHkdmzicIlibx6iaFqAc56vxLSUfpb6n5WKSYVY0ChQKkiaJSgQ1dZuTOgvLLrhJbERQQ4eMsv84eavHiaiceqxibJxCfHe/46",
    "privilege": [],
    "unionid": "o6_bmasdasdsad6_2sgVt7hMZOPfL"
}
        ', true);
    }

    static function login($code) {
        $weixin_info = self::getWeixinUserInfo($code);
        $open_id = $weixin_info['openid'];
        $union_id = isset($weixin_info['unionid']) && $weixin_info['unionid'] ?
            $weixin_info['unionid'] : null;
        $name = $weixin_info['nickname'];
        $head_img_url = $weixin_info['headimgurl'];
        $weixinUser = self::findByWeixinId($open_id, $union_id);
//        dd($weixinUser);
        $user = null;
        if ($weixinUser) {
            $user = $weixinUser->user;
        } else {
            //TODO:注册
            $email = substr(md5($open_id), 0, 16);
            $user = User::create([
                'name' => $name,
                'email' => $email . "@weixin.com",
                'password' => bcrypt(""),   //TODO:空密码是否可行
            ]);

            $weixin = self::create([
                'user_id' => $user->id,
                'open_id' => $open_id,
                'union_id' => $union_id,
                'user_info' => json_encode($weixin_info),
            ]);
        }
        $token = $user->createToken('app')->accessToken;
        return [
            'user_id' => $user->id,
            'head_img_url' => $head_img_url,
            'access_token' => $token,
            'name' => $user->name,
        ];
    }

}