<?php
use think\cache\driver\Memcache;
use think\Db;
/**
 * 当前用户id
 * @return mixed|string
 */
function user_id()
{

    $userKey = Db::name('users')
        ->where('id', open_secret(cookie('UID')))
        ->value('id');
    return $userKey ? $userKey : '';
}

/**
 * 获取管理员角色
 * @param $user_id
 * @return mixed
 */
function get_role($user_id)
{
    $name=Db::name('users')
        ->alias('u')
        ->where('ra.user_id',$user_id)
        ->join('role_user ra', 'ra.user_id=u.id')
        ->join('role r', 'r.id=ra.role_id')
        ->value('name');
    return $name;
}

function del_role_log($user_id, $role_id)
{
    $map = [
        'user_id'=>$user_id,
        'role_id'=>$role_id
    ];

    $role_user_id=Db::name('role_user')->where($map)->value('role_user_id');
    if ($role_user_id) {
        Db::name('role_user')->delete($role_user_id);
    }
    return 'ok';
}

/**
 * 添加图片日志
 * @param $path
 */
function add_img_db($path)
{
    $map = [
        'upload_date'=>time(),
        'img_size' => getFileSize(filesize('.'.$path)),
        'ip'=>request()->ip(),
        'user_id' => open_secret(cookie('UID')),
        'img_path'=>$path
    ];
    Db::name('imgs')->insert($map);
}
function del_img_db($path)
{
    $img_id=Db::name('imgs')
        ->where('img_path', $path)
        ->value('img_id');
    Db::name('imgs')->delete($img_id);
}
/**
 * 是否禁用
 * @param $type
 */
function is_stop($type)
{
    if ($type == 0) {
        return '<span class="label label-danger">非正常</span>';
    } elseif ($type == 1) {
        return '<span class="label label-success">正常</span>';
    }
}

/**
 * 菜单类型
 * @param $type
 * @return string
 */
function menu_type($name,$type)
{
    if ($type == 0) {
        return '<span class="label label-default">'.$name.'</span>';
    } elseif ($type == 1) {
        return '<span class="label label-warning">'.$name.'</span>';
    }
}

/**
 * select框是否选中
 * @param $select_id
 * @param $id
 * @return string
 */
function is_selected($select_id, $id)
{
    return $select_id == $id ? 'selected' : '';
}

/**
 * checked是否选中
 * @param $is_ok
 * @return string
 */
function is_checked($is_ok)
{
    return $is_ok ? 'checked' : '';
}

/**
 * 默认头像
 * @param $img
 */
function is_img($img)
{
    return $img ? $img : config('view_replace_str.__UPLOAD__') . '/admin/common/upload.svg';
}

/**
 * 获取文章分类名称
 * @param $posts_id文章id
 * @return false|PDOStatement|string|\think\Collection
 */
function get_terms($posts_id)
{
    $terms=Db::name('terms')
        ->alias('t')
        ->where('object_id',$posts_id)
        ->join('term_relationships r', 'r.term_id=t.term_id')
        ->select();
    return $terms;
}

/**
 * 判断文章所属类型
 * @param $posts_id
 * @param $term_id
 * @return string
 */
function post_term($posts_id,$term_id)
{
    $map = [
        'object_id'=>$posts_id,
        'term_id'=>$term_id
    ];
    $terms=Db::name('term_relationships')

        ->where($map)
        ->select();
    if (!empty($terms)) {
        return 'selected';
    }else{
        return '';
    }
}
/**
 * 获取插件参数
 * @param $param
 * @return array
 */
function get_param_arr($param)
{
    $arr=explode('|', $param);
    return $arr;
}


function rm_cache_menu()
{
    $mem = new Memcache();
    $mem->rm('menu');
}

/**
 * 获取菜单导航
 * @param $menu_id
 * @param $parend_id
 * @return string
 */
function get_menu_nav($menu_id,$parend_id)
{
    $parend_nav=Db::name('menu')
        ->where('id',$parend_id)
        ->value('nav_list');
    $nav = '';
    if (!empty($parend_nav)) {
        $nav .=$parend_nav.'-';
    }
    $nav .=$menu_id;
    return $nav;
}

/**
 * 获取末尾菜单id
 * @param $nav_list
 * @return array
 */
function get_nav($nav_list)
{
    return explode('-', $nav_list);
}

/**
 * 获取管理员对应角色nav_list
 * @param $user_id
 * @return mixed
 */
function get_role_nav($user_id)
{
    $name=Db::name('users')
        ->alias('u')
        ->where('ra.user_id',$user_id)
        ->join('role_user ra', 'ra.user_id=u.id')
        ->join('role r', 'r.id=ra.role_id')
        ->value('r.nav_list');
    $name = explode('-', $name);
    return $name;
}

/**
 * 获取指定菜单控制器等
 * @param $menu_id
 * @return array|false|PDOStatement|string|\think\Model
 */
function get_menu($menu_id)
{
    $menu=Db::name('menu')
        ->field('module,controller,method')
        ->find($menu_id);
    return $menu;
}

/**
 * 对应角色权限nav_list
 * @return string
 */
function menu_nav_list()
{
    $user_id=open_secret(cookie('UID'));
    $name=Db::name('users')
        ->alias('u')
        ->where('ra.user_id',$user_id)
        ->join('role_user ra', 'ra.user_id=u.id')
        ->join('role r', 'r.id=ra.role_id')
        ->value('r.nav_list');
    $name = explode('-', $name);
    $menu_in = implode(',', $name);
    return $menu_in;
}
/*==========================================================extra=====================================================*/
/**
 * 代理等级
 * @param $user_rank
 * @return string
 */
function get_rank($user_rank)
{
    if ($user_rank==1) {
        return '<span class="label label-info">一级代理</span>';
    } elseif ($user_rank == 2) {
        return '<span class="label label-warning">二级代理</span>';
    }else{
        return '';
    }
}

/**
 * 提现申请处理
 * @param $draw_type
 * @return string
 */
function draw_type_encode($draw_type){
    if ($draw_type == 0) {
        return '未处理';
    } elseif ($draw_type == 1) {
        return '未通过';
    } elseif ($draw_type == 2) {
        return '已通过';
    }
}

/**
 * 提现申请反编译
 * @param $draw_name
 * @return int
 */
function draw_type_decode($draw_name)
{
    if ($draw_name == '未通过') {
        return 1;
    } elseif ($draw_name == '已通过') {
        return 2;
    }
}

/**
 * 性别
 * @param $sex
 * @return string
 */
function is_sex($sex)
{
    switch ($sex) {
        case 0:return '保密';
            break;
        case 1:
            return '女';
            break;
        case 2:
            return '男';
            break;
    }
}

/**
 * 上级名称
 * @param $user_id
 * @param $player_id
 * @return mixed|string
 */
function up_agency($user_id,$player_id)
{
    $name=get_agency($user_id, 'user_login');
    if (empty($name)) {
        $map = [
            'player_id'=>$player_id
        ];
        $users = Db::name('users')->where($map)->find();
        if ($users) {
            $name = "<span class='label label-success'>代理【" . $users['user_login'] . "】玩家</span>";
        }else{
            $name = '<span class="label label-default">暂无</span>';
        }
    }else{
        $name = "<span class='label label-warning'>$name</span>";
    }

    return $name;
}

/**
 * 获取房间类型
 * @param $room_type
 * @return string
 */
function get_room_type($room_type)
{
    switch ($room_type) {
        case 0:
            return '黑桃5上庄';
            break;
        case 1:
            return '霸王庄';
            break;
        case 2:
            return '随机庄(压牌)';
            break;
        case 3:
            return'霸王庄(压牌)';
            break;
        default:
            return '错误规则';
            break;
    }
}

/**
 * 获取登录壁纸
 * @return mixed
 */
function get_bg()
{
    $mem = new Memcache();
    return $mem->get('login_pic');
}

/**
 * 某人所创房间数
 * @param $player_id
 * @return int|string
 */
function all_room($player_id)
{
    return Db::name('room')
        ->where('room_owner', $player_id)
        ->count();
}