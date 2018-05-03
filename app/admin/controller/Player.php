<?php
namespace app\admin\controller;
use think\cache\driver\Memcache;
use think\Db;

/**
 * 玩家管理
 */
class Player extends Base
{
    /*===============================================玩家管理界面=======================================================*/
    function player_home_page()
    {
        $playersNums = Db::name('player')->count();
        $pages = new \Page($playersNums);
        $playersList = Db::name('player')
            ->order('player_id desc')
            ->select();
        $map = [
            'playersNums'=>$playersNums,
            'playersList'=>$playersList,
            'pages'=>$pages->showPages(3)
        ];
        return view('player_home_page',$map);
    }

    //删除玩家
    function del_player_think()
    {
        if (Db::name('player')->delete(input('player_id'))) {
            $this->success('该玩家已经成功删除');
        }else{
            $this->error('该玩家删除失败');
        }
    }

    /*=====================================================房间展示=====================================================*/
    //当前玩家房间展示
    function room_home_page()
    {
        $roomNums = Db::name('room')
            ->where('room_owner', input('room_owner'))
            ->count();
        $page = new \Page($roomNums);
        $room=Db::name('room')
            ->where('room_owner',input('room_owner'))
            ->order('room_date desc')
            ->epage()
            ->select();

        $map = [
            'room' => $room,
            'pages' => $page->showPages(3),
            'roomNums' => $roomNums
        ];
        return view('room_home_page',$map);
    }
    //删除房间
    function del_room()
    {
        if (Db::name('room')->delete(input('room_id'))) {
            $mem = new Memcache();
            $mem->clear(input('room_id') . 'tag');
            $this->success('该房间已经成功删除');
        }else{
            $this->error('该房间删除失败');
        }
    }

    /*==============================================每个房间所有的局数情况================================================*/
    //当前房间所有局
    function rounds()
    {
        $room_id = input('room_id');
        $map = [
            'room_id'=>$room_id
        ];
        $roundInfoNums = Db::name('room_round')->where($map)->count();
        $page = new \Page($roundInfoNums);
        $roundInfo = Db::name('room_round')
            ->where($map)
            ->order('round_start desc')
            ->epage()
            ->select();
        $roundInfoData = [
            'round_info'=>$roundInfo,
            'pages'=>$page->showPages(3)
        ];
        return view('round_info_page', $roundInfoData);
    }
    //删除该局
    function del_room_round()
    {
        if (Db::name('room')->delete(input('relate_id'))) {
            $this->success('该局已经成功删除');
        }else{
            $this->error('该局删除失败');
        }
    }

    //某局详情
    function round_info()
    {
        $round_id = input('round_id');
        $room_id = input('room_id');
        $map = [
            'round_id'=>$round_id,
            'room_id' =>$room_id,
        ];

        $round_detal=Db::name('round')
            ->where($map)
            ->select();

        $player_log = Db::name('player_log')
            ->where($map)
            ->select();
        $map = [
            'round_detail'=>$round_detal,
            'player_log'=>$player_log
        ];

        return view('round_detail_page', $map);
    }

    /*===================================================所有房间=======================================================*/
    function show_all_room()
    {
        $roomNums = Db::name('room')
        ->count();
        $page = new \Page($roomNums);
        $room=Db::name('room')
            ->order('room_date desc')
            ->epage()
            ->select();

        $map = [
            'room' => $room,
            'pages' => $page->showPages(3),
            'roomNums' => $roomNums
        ];
        return view('all_room_page',$map);
    }
}