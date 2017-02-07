<?php

namespace App\Http\Controllers\Auth;

use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showForm()
    {
        return view('auth.change_password');
    }

    public function changePassword(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = Auth::user();
        $user->password = Hash::make($request->get('password'));
        $user->save();
        $request->session()->flash('message', '密码修改成功!');
        return redirect()->route('change-password');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        Validator::extend('password', function($attribute, $value, $parameters, $validator) {
            $user = Auth::user();
            return Hash::check($value, $user->password);
        });
        $message = [
            'password' => '旧密码不正确',
            'min' => '密码不能少于 6 个字符',
            'required' => '不能为空',
            'confirmed' => '确认密码不正确'
        ];
        return Validator::make($data, [
            'old_password' => 'required|min:6|password',
            'password' => 'required|min:6|confirmed',
        ], $message);
    }
}
