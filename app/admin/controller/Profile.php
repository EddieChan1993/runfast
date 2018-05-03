<?php
namespace app\admin\controller;
use think\Db;

/**
 * 返利记录
 */
class Profile extends Base
{
    function home_page()
    {
        $profileNums = Db::name('profile')->count();
        $page = new \Page($profileNums);
        $profileList = Db::name('profile')
            ->epage()
            ->order('date desc')
            ->select();

        $map = [
            'pages'=>$page->showPages(3),
            'profileList'=>$profileList,
            'profileNums'=>$profileNums
        ];
        return view('home_page',$map);
    }

    function del_think()
    {
        if (Db::name('profile')->delete(input('profile_id'))) {
            $this->success('该笔返利记录删除成功');
        }else{
            $this->error('该笔返利记录删除失败');
        }
    }
}