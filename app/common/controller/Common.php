<?php
namespace app\common\controller;

use think\Controller;
use think\Db;
use think\Session;

class Common extends Controller
{
    function is_login()
    {
        if (session('SUID')) {
            $users = get_users(open_secret(session('SUID')));
            if ($users) {
                $user_map = [
                    'id'=>$users['id'],
                    'last_login_time'=>$users['last_login_time'],
                    'last_login_ip' => $users['last_login_ip'],
                ];
                $token_login = data_signature($user_map);
                if (session('TOKEN_LOGIN') == $token_login) {
                    cookie('UID', set_secret($users['id']),604800);//再次计时
                    return true;
                }
            }
        }else{
            if (cookie('UID')) {
                $users=get_users(open_secret(cookie('UID')));
                if ($users && $users['user_status'] != 0) {
                    cookie('UID', set_secret($users['id']),604800);//再次计时
                    return true;
                }
            }
        }
    }


//    public function _empty()
//    {
//        $this->error(lang('没有找到该页面404'));
//    }
}