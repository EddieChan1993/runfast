<?php
namespace app\admin\controller;
use think\Db;

/**
 * 充值记录
 */
class Pay extends Base
{
    function home_page()
    {
        $payNums = Db::name('pay_log')->count();
        $pages = new \Page($payNums);
        $payList = Db::name('pay_log')
            ->epage()
            ->order('pay_date desc')
            ->select();

        $map = [
            'payNums'=>$payNums,
            'pages'=>$pages->showPages(3),
            'payList'=>$payList
        ];
        return view('home_page',$map);
    }

    function del_think()
    {
        $player_id=get_order(input('pay_id'), 'player_id');
        $diamond_nums=get_order(input('pay_id'), 'diamond_nums');
        if (Db::name('pay_log')->delete(input('pay_id'))) {
            save_player_diamond($player_id, $diamond_nums, 'dec');
            $this->success('该笔充值记录删除成功');
        }else{
            $this->error('该笔充值记录删除失败');
        }
    }
}