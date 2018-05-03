<?php
namespace app\admin\controller;

use think\cache\driver\Memcache;
use think\Db;
use think\Validate;

class Setting extends Base
{
    function home_page()
    {

        $sites=Db::name('options')->find(6);//网站配置信息
        $showSites = json_decode($sites['option_value']);
        $showSites->is_close=$sites['is_close'];
        $showSites=object2array($showSites);

        $showSites['rank1'] = Db::name('rank')->find(1);//rank1
        $showSites['rank2'] = Db::name('rank')->find(2);//rank2

        return view('home_page',$showSites);
    }

    //存储网站配置信息
    function save_sites()
    {
        $option_value = $_POST['option_value'];

        if (!input('?is_close')) {
            $is_close = input('is_close')?input('is_close'):0;
        }else{
            $is_close = input('is_close');
        }

        $saveSitesMap = [
            'option_id'=>6,
            'option_value' => json_encode($option_value),
            'is_close'=>$is_close
        ];
        if (Db::name('options')->update($saveSitesMap)) {
            $login_pic =ROOT_PATH.$option_value['login_pic'];
            $mem = new Memcache();
            $mem->set('login_pic', base64EncodeImage($login_pic));
            $this->success('网站信息编辑成功');
        }else{
            $this->error('网站信息未做任何修改');
        }
    }

    //存储完整seo
    function save_seo()
    {
        $saveSeoMap = [
            'option_id'=>7,
            'option_value' => json_encode($_POST['option_value'])
        ];

        if (Db::name('options')->update($saveSeoMap)) {
            $this->success('网站Seo编辑成功');
        }else{
            $this->error('网站信息未做任何修改');
        }
    }

    //代理返利返利等级编辑
    function edit_rank()
    {
        $validate = new Validate([
            ['rank_name','require|unique:rank','代理名称必填|代理名称必须唯一'],
            ['percent','require|number|>=:0|<=:100','返利百分比必填|返利百分比必须为整数|返利百分比必须大于0|返利百分比最大不能超过100'],
            ['self_account','require|number|>=:0|<=:100','自己充值折扣必填|自己充值折扣必须为整数|自己充值折扣比必须大于0|自己充值折扣最大不能超过100'],
            ['child_account','require|number|>=:0|<=:100','下线充值折扣必填|下线充值折扣必须为整数|下线充值折扣必须大于0|下线充值折扣最大不能超过100']
        ]);

        if (!$validate->check($_POST)) {
            $this->error($validate->getError());
        }

        if (Db::name('rank')->update($_POST)) {
            $this->success('当前代理编辑成功');
        } else {
            $this->error('当前代理未做任何修改');
        }
    }
    /*========================================================插件库====================================================*/
    //插件页面
    function plugins_home()
    {
        $widgetsNums = Db::name('widgets')->count();
        $widgets=Db::name('widgets')
            ->order('wid_date desc')
            ->select();
        $map = [
            'widget' => $widgets,
            'widgetsNums'=>$widgetsNums
        ];
        return view('plugins_home',$map);
    }

    //添加插件
    function add_plugins_think()
    {
        $addData = $_POST;
        $addData['wid_admin'] = open_secret(cookie('UID'));
        $addData['wid_date'] =time();
        if (Db::name('widgets')->insert($addData)) {
            $this->success('插件添加成功');
        }else{
            $this->error('插件添加失败');
        }
    }

    //删除插件
    function del_plugins_think()
    {
        if (Db::name('widgets')->delete(input('wid_id'))) {
            $this->success('插件删除成功');
        }else{
            $this->error('插件删除失败');
        }
    }

    function edit_plugins_page()
    {
        $plugins = Db::name('widgets')->find(input('wid_id'));
        return view('plugins_edit_page', $plugins);
    }
    //插件编辑
    function edit_plugins_think()
    {
        if (Db::name('widgets')->update($_POST)) {
            $this->success('该插件编辑成功');
        }else{
            $this->error('该插件编辑失败');
        }
    }

    /*========================================================游戏界面设置====================================================*/
    function show_pic_setting()
    {

        $sites=Db::name('game_pic')->find(1);//网站配置信息
        $showSites = json_decode($sites['option_value']);
        $showSites=object2array($showSites);
        return view('show_pic_setting',$showSites);
    }

    //修改游戏图片
    //将图片转为base64存入
    function edit_pic_game()
    {
        $option_value = $_POST['option_value'];
        $card_pic = ROOT_PATH . $option_value['card_pic'];
//        $table_pic = ROOT_PATH . $option_value['table_pic'];

        $saveSitesMap = [
            'game_pic_id'=>1,
            'option_value' => json_encode($option_value),
        ];

        if (Db::name('game_pic')->update($saveSitesMap)) {
            $mem = new Memcache();
            $mem->set('card_pic', base64EncodeImage($card_pic));
//            $mem->set('table_pic', base64EncodeImage($table_pic));
            $this->success('网站信息编辑成功');
        }else{
            $this->error('网站信息未做任何修改');
        }
    }
}