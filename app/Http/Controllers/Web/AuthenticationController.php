<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthenticationController extends Controller
{
    //
    
    public function getSocialRedirect($account){
        try {
           return  Socialite::driver($account)->redirect();
        } catch (\InvalidArgumentException $e) {
            //throw $th;
            return redirect('/login');
        }
    }
    public function getSocialCallback($account){
        //从三方回调中获取用户信息
        $socialUser=Socialite::driver($account)->user();
        //在本地user表中查询该用户来判断是否已存在
        $user=User::where('provider_id','=',$socialUser->id)
            ->where('provider','=',$account)
            ->first();
        if($user==null){
            //用户不存在
            $newUser=new User();
            $newUser->name=$socialUser->getNickName();
            $newUser->email=$socialUser->getEmail()==''?'':$socialUser->getEmail();
            $newUser->avatar=$socialUser->getAvatar();
            $newUser->password='';
            $newUser->provider=$account;
            $newUser->provider_id=$socialUser->getId();
            $newUser->save();
            $user=$newUser;
        }
        //手动登陆该用户
        Auth::login($user);
        //登陆成功之后返回到首页
        return redirect('/');
    }
}
