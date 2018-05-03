<?php
namespace app\admin\controller;
use think\Db;
use think\Validate;

/**
 * 角色管理
 */
class Role extends Base
{
    //角色界面
    function home_page()
    {
        $role_nums = Db::name('role')
            ->count();
        $pageObject = new \Page($role_nums);
        $role_list=Db::name('role')
            ->order('create_time desc')
            ->epage()
            ->select();


        $role_map = [
            'role_nums'=>$role_nums,
            'role_list'=>$role_list,
            'pages'=>$pageObject->showPages(3),
        ];
        return view('home_page',$role_map);
    }

    //角色添加
    function add_think()
    {
        $validate = new Validate([
            ['name','require|unique:role','角色名称必填|角色名称重复'],
        ]);
        if (!$validate->check($_POST)) {
            $this->error($validate->getError());
        }
        $add_map = $_POST;
        $add_map['create_time'] = time();
        if (Db::name('role')->insert($add_map)) {
            $this->success('角色添加成功');
        }else{
            $this->error('角色添加失败');
        }
    }

    //删除角色
    function del_think()
    {
        if (Db::name('role')->delete(input('id'))) {
            $this->success('已经成功删除该角色');
        }else{
            $this->error('删除该角色失败');
        }
    }

    //角色编辑页面
    function edit_page()
    {
        $menuArr = Db::name('menu')->order('id desc')->select();//权限tree
        $menuList = get_tree_array($menuArr,'parentid');//获取树状结构数组
        $menuList= my_sort($menuList,'listorder',SORT_DESC);

        $role=Db::name('role')->find(input('id'));
        $role['menuList'] = $menuList;
        //菜单
        $menu_list = Db::name('menu')->where('type',0)->select();
        $menu_list = menu_left($menu_list, 'id', 'parentid');
        $role['menus'] = $menu_list;
        return view('edit_page', $role);
    }

    //角色编辑逻辑
    function edit_think()
    {
        $validate = new Validate([
            ['name','require|unique:role','角色名称必填|角色名称重复'],
            ['rules','require','权限规则尚未分配'],
        ]);

        if (!$validate->check($_POST)) {
            $this->error($validate->getError());
        }

        $map = $_POST;
        $map['update_time'] = time();
        $map['rules'] = implode(',', $_POST['rules']);

        if (!input('?status')) {
            $map['status'] = input('status')?input('status'):0;
        }

        if (Db::name('role')->update($map)) {
            $this->success('该角色修改成功');
        }else{
            $this->error('该角色未做任何修改');
        }
    }
}