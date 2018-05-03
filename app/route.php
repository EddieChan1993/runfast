<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
header("Access-Control-Allow-Origin:*");
use think\Route;
Route::get('get_time','@home/Home/get_time');
Route::post('news_show', '@home/Home/home_page');//首页新闻
Route::post('table_card_pic', '@home/Home/table_card_pic');//桌布和卡片壁纸
Route::get('connect', '@home/Home/connect');//联系我们
Route::post('save_radio', '@home/Home/save_radio');
Route::post('joined_room', '@home/Home/joined_room');//加入过的房间
Route::post('one_room_round', '@home/Home/one_room_round');//

Route::post('goods_show', '@home/Goods/home_page');//商品列表
Route::post('recharge_think', '@home/Goods/recharge_think');//商品列表
Route::post('recharge_list', '@home/Goods/recharge_list');//砖石充值列表

Route::post('player_info', '@home/Player/get_player_info');//玩家信息
Route::post('invite_page', '@home/Player/invite_page');//邀请码输入界面
Route::post('invite_think', '@home/Player/invite_think');//邀请绑定逻辑

Route::post('room_page', '@home/Room/room_page');//显示房间
Route::post('add_room_think', '@home/Room/add_room_think');//创建房间
Route::post('del_room', '@home/Room/del_room');//删除房间
Route::post('join_room', '@home/Room/join_room');//加入房间
Route::post('get_room', '@home/Room/get_room');//获取某个房间用作分享
Route::post('alert_agree', '@home/Room/alert_agree');//删除房间弹窗显示


Route::post('start_game', '@home/Game/start_game');//开始游戏
Route::post('inner_room', '@home/Game/inner_room');//进入游戏界面
Route::post('connect', '@home/Game/connect');//连接游戏
Route::post('prepare', '@home/Game/prepare');//游戏准备

Route::post('send_card', '@home/GameThink/send_card');//打牌规则
Route::post('pass_pin_next', '@home/GameThink/pass_pin_next');//过的消息推送

Route::post('tip_card', '@home/GameThink/tipCard');//过的消息推送

/*************************************************/
Route::post('last_round_score', '@home/Extra/getLastRoundScore');//获取最后一轮的分数
