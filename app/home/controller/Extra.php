<?php
/**
 * Created by PhpStorm.
 * User: EVE
 * Date: 2018/1/27
 * Time: 22:12
 */

namespace app\home\controller;

use think\Db;
use think\Exception;
use think\Validate;

/**
 * 额外请求
 */
class Extra extends Base
{
    //获取最后一局的详细分数记录
    function getLastRoundScore()
    {
        $validate = new Validate([
            ['room_id', 'require', '无效的参数'],
//            ['round_id', 'require', '无效的参数'],
        ]);

        try {
            if (!$validate->check($_POST)) {
                throw new Exception($validate->getError());
            }
            $map = [
                'room_id' => input('room_id'),
                'round_id' => 10
            ];
            $round_detal=Db::name('round')
                ->where($map)
                ->field('score,player_id')
                ->select();

            if (empty($round_detal)) {
                throw new Exception("没有查到该房间的得分报表");
            }
            $playerIdArr = array_column($round_detal, 'player_id');
            $playersInfo = Db::name('player')
                ->where('player_id', 'in', $playerIdArr)
                ->field('player_id,name,avatar')
                ->select();
            $playerIdKey = array_column($playersInfo,'player_id');
            $palyerArr = array_combine($playerIdKey, $playersInfo);
            foreach ($round_detal as $k => $v) {
                $data[$k]['score'] = $v['score'];
                $data[$k]['avatar'] = $palyerArr[$v['player_id']]['avatar'];
                $data[$k]['name'] = $palyerArr[$v['player_id']]['name'];
            }
            echo edd_success($data);
        } catch (\Exception $e) {
            echo edd_error($e->getMessage());
        }
    }
}