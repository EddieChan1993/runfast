<?php
namespace app\admin\controller;
use think\Db;

/**
 * 提现申请，个人的，总的
 */
class Draws extends Base
{
    /*=================================================个人的申请===========================================================*/
    function self_draw_page()
    {
        $user_id = open_secret(cookie('UID'));
        $users=Db::name('users')
            ->field('id,user_login,childs_nums,user_rank,player_id')
            ->find($user_id);
        $map['nums'] = Db::name('draw')
            ->where('user_id',$user_id)
            ->count();

        $pages = new \Page($map['nums']);
        $map['pages'] = $pages->showPages(3);
        $map['selfDrawsList'] = Db::name('draw')
            ->epage()
            ->where('user_id',$user_id)
            ->order('draw_date desc')
            ->select();

        $data = array_merge($users, $map);
        return view("self_draw_page",$data);
    }


    function add_draw_think()
    {
        $map = [
            'user_id'=>input('pk'),
            'draw_money'=>input('value'),
            'draw_date'=>time()
        ];
        if (get_money(input('pk')) < input('value')) {
            $this->error('您的余额不足');
        }
        if (Db::name('draw')->insert($map)) {
            $this->success(input('value').'元提现申请提交成功,我们将很快为您处理');
        }else{
            $this->error('提现申请提交失败');
        }
    }
    /*=================================================所有的申请===========================================================*/
    function all_draw_page()
    {
        $allDrawNums = Db::name('draw')->count();
        $pages = new \Page($allDrawNums);
        $allDrawList = Db::name('draw')
            ->epage()
            ->order('draw_date desc')
            ->select();
        $map = [
            'pages'=>$pages->showPages(3),
            'allDrawList'=>$allDrawList,
            'allDrawNums'=>$allDrawNums
        ];
        return view('all_draw_page',$map);
    }

    function edit_all_think()
    {
        $map['draw_id'] = input('pk');
        $map['draw_type']=draw_type_decode(input('value'));

        if (Db::name('draw')->update($map)) {
            $this->success('该笔提现申请状态已经修改为【' . input('value') . '】');
        }else{
            $this->error('该笔提现申请未做任何修改');
        }
    }

    function del_all_think()
    {
        if (Db::name('draw')->delete(input('draw_id'))) {
            $this->success('该笔提现申请删除成功');
        }else{
            $this->error('该笔提现申请删除失败');
        }
    }
}