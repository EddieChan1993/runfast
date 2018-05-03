<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\cache\driver\Memcache;
use think\Db;
use think\Log;
use think\Response;

/**
 * 数据签名，是否登录的判断用
 *用于存储签名session和cookie
 * @param array $data 被认证的数据
 * @return string 签名
 */
function data_signature($data = [])
{
    if (!is_array($data)) {
        $data = (array)$data;
    }
    ksort($data);
    $code = http_build_query($data);
    $sign = sha1($code);
    return $sign;
}

/**
 * 所有用到密码的不可逆加密方式
 * @author rainfer <81818832@qq.com>
 * @param string $password
 * @param string $password_salt
 * @return string
 */
function encrypt_password($password, $password_salt)
{
    return md5(md5($password) . md5($password_salt));
}

/**
 * 随机字符,用于生成password_salt用
 * @param int $length 长度
 * @param string $type 类型
 * @param int $convert 转换大小写 1大写 0小写
 * @return string
 */
function random($length = 10, $type = 'letter', $convert = 0)
{
    $config = array(
        'number' => '1234567890',
        'letter' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
        'string' => 'abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ23456789',
        'all' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'
    );

    if (!isset($config[$type])) $type = 'letter';
    $string = $config[$type];

    $code = '';
    $strlen = strlen($string) - 1;
    for ($i = 0; $i < $length; $i++) {
        $code .= $string{mt_rand(0, $strlen)};
    }
    if (!empty($convert)) {
        $code = ($convert > 0) ? strtoupper($code) : strtolower($code);
    }
    return $code;
}

/**
 * 获取惟一订单号
 * @return string
 */
function sp_get_order_sn()
{
    return date('Ymd') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
}

/**
 * 加密函数
 * @param string $txt 需加密的字符串
 * @param string $key 加密密钥，默认读取data_auth_key配置
 * @return string 加密后的字符串
 */
function set_secret($txt, $key = null)
{
    empty($key) && $key = config('data_auth_key');
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-=_";
    $nh = rand(0, 64);
    $ch = $chars[$nh];
    $mdKey = md5($key . $ch);
    $mdKey = substr($mdKey, $nh % 8, $nh % 8 + 7);
    $txt = base64_encode($txt);
    $tmp = '';
    $k = 0;
    for ($i = 0; $i < strlen($txt); $i++) {
        $k = $k == strlen($mdKey) ? 0 : $k;
        $j = ($nh + strpos($chars, $txt [$i]) + ord($mdKey[$k++])) % 64;
        $tmp .= $chars[$j];
    }
    return $ch . $tmp;
}

/**
 * 解密函数
 * @param string $txt 待解密的字符串
 * @param string $key 解密密钥，默认读取data_auth_key配置
 * @return string 解密后的字符串
 */
function open_secret($txt, $key = null)
{
    empty($key) && $key = config('data_auth_key');
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-=_";
    $ch = $txt[0];
    $nh = strpos($chars, $ch);
    $mdKey = md5($key . $ch);
    $mdKey = substr($mdKey, $nh % 8, $nh % 8 + 7);
    $txt = substr($txt, 1);
    $tmp = '';
    $k = 0;
    for ($i = 0; $i < strlen($txt); $i++) {
        $k = $k == strlen($mdKey) ? 0 : $k;
        $j = strpos($chars, $txt[$i]) - $nh - ord($mdKey[$k++]);
        while ($j < 0) {
            $j += 64;
        }
        $tmp .= $chars[$j];
    }
    return base64_decode($tmp);
}

/**
 * 返回按层级加前缀的菜单数组
 * @author  rainfer
 * @param array|mixed $menu 待处理菜单数组
 * @param string $id_field 主键id字段名
 * @param string $pid_field 父级字段名
 * @param string $lefthtml 前缀
 * @param int $pid 父级id
 * @param int $lvl 当前lv
 * @param int $leftpin 左侧距离
 * @return array
 */
function menu_left($menu, $id_field = 'id', $pid_field = 'pid', $lefthtml = '─ ', $pid = 0, $lvl = 0, $leftpin = 0)
{
    $arr = array();
    foreach ($menu as $v) {
        if ($v[$pid_field] == $pid) {
            $v['lvl'] = $lvl + 1;
            $v['leftpin'] = $leftpin;
            $v['lefthtml'] = '├' . str_repeat($lefthtml, $lvl);
            $arr[] = $v;
            $arr = array_merge($arr, menu_left($menu, $id_field, $pid_field, $lefthtml, $v[$id_field], $lvl + 1, $leftpin + 20));
        }
    }
    return $arr;
}


/**
 * 截取文字
 * @author rainfer <81818832@qq.com>
 *
 * @param string $text
 * @param int $length
 * @return string
 */
function subtext($text, $length)
{
    if (mb_strlen($text, 'utf8') > $length)
        return mb_substr($text, 0, $length, 'utf8') . '...';
    return $text;
}

/**
 *获取html文本里的img
 * @param string $content
 * @return array
 */
function sp_getcontent_imgs($content)
{
    import("phpQuery");
    \phpQuery::newDocumentHTML($content);
    $pq = pq();
    $imgs = $pq->find("img");
    $imgs_data = array();
    if ($imgs->length()) {
        foreach ($imgs as $img) {
            $img = pq($img);
            $im['src'] = $img->attr("src");
            $im['title'] = $img->attr("title");
            $im['alt'] = $img->attr("alt");
            $imgs_data[] = $im;
        }
    }
    \phpQuery::$documents = null;
    return $imgs_data;
}


/**
 * 去除字符串中的指定字符
 * @param string $str 待处理字符串
 * @param string $chars 需去掉的特殊字符
 * @return string
 */
function sp_strip_chars($str, $chars = '?<*.>\'\"')
{
    return preg_replace('/[' . $chars . ']/is', '', $str);
}

/**
 * 列出本地目录的文件
 * @author rainfer <81818832@qq.com>
 * @param string $path
 * @param string $pattern
 * @return array
 */
function list_file($path, $pattern = '*')
{
    if (strpos($pattern, '|') !== false) {
        $patterns = explode('|', $pattern);
    } else {
        $patterns [0] = $pattern;
    }
    $i = 0;
    $dir = array();
    if (is_dir($path)) {
        $path = rtrim($path, '/') . '/';
    }
    foreach ($patterns as $pattern) {
        $list = glob($path . $pattern);
        if ($list !== false) {
            foreach ($list as $file) {
                $dir [$i] ['filename'] = basename($file);
                $dir [$i] ['path'] = dirname($file);
                $dir [$i] ['pathname'] = realpath($file);
                $dir [$i] ['owner'] = fileowner($file);
                $dir [$i] ['perms'] = substr(base_convert(fileperms($file), 10, 8), -4);
                $dir [$i] ['atime'] = fileatime($file);
                $dir [$i] ['ctime'] = filectime($file);
                $dir [$i] ['mtime'] = filemtime($file);
                $dir [$i] ['size'] = filesize($file);
                $dir [$i] ['type'] = filetype($file);
                $dir [$i] ['ext'] = is_file($file) ? strtolower(substr(strrchr(basename($file), '.'), 1)) : '';
                $dir [$i] ['isDir'] = is_dir($file);
                $dir [$i] ['isFile'] = is_file($file);
                $dir [$i] ['isLink'] = is_link($file);
                $dir [$i] ['isReadable'] = is_readable($file);
                $dir [$i] ['isWritable'] = is_writable($file);
                $i++;
            }
        }
    }
    $cmp_func = create_function('$a,$b', '
		if( ($a["isDir"] && $b["isDir"]) || (!$a["isDir"] && !$b["isDir"]) ){
			return  $a["filename"]>$b["filename"]?1:-1;
		}else{
			if($a["isDir"]){
				return -1;
			}else if($b["isDir"]){
				return 1;
			}
			if($a["filename"]  ==  $b["filename"])  return  0;
			return  $a["filename"]>$b["filename"]?-1:1;
		}
		');
    usort($dir, $cmp_func);
    return $dir;
}

/**
 * ajax数据返回，规范格式
 * @param array $data 返回的数据，默认空数组
 * @param string $msg 信息，一般用于错误信息提示
 * @param int $code 错误码，0-未出现错误|其他出现错误
 * @param array $extend 扩展数据
 * @return string
 */
function ajax_return($data = [], $msg = "", $code = 0, $extend = [])
{
    $msg = empty($msg) ? '失败' : $msg;
    $ret = ["code" => $code, "msg" => $msg, "data" => $data];
    $ret = array_merge($ret, $extend);
    return Response::create($ret, 'json');
}

/**
 * 功能：获取时间差
 * @param int $time
 * @return string 时间差值
 */
function tranTime($time, $format = '1')
{
    if (!empty($time)) {
        $rtime = date("Y-m-d H:i:s", $time);
        $rtime2 = date("Y-m-d", $time);
        $htime = date("H:i", $time);

        $time = time() - $time;
        if ($time < 60) {
            $str = '刚刚';
        } elseif ($time < 60 * 60) {
            $min = floor($time / 60);
            $str = $min . '分钟前';
        } elseif ($time < 60 * 60 * 24) {
            $h = floor($time / (60 * 60));
            $str = $h . '小时前 ' . $htime;
        } elseif ($time < 60 * 60 * 24 * 3) {
            $d = floor($time / (60 * 60 * 24));
            if ($d == 1)
                $str = '昨天 ' . $htime;
            else
                $str = '前天 ' . $htime;
        } else {
            switch ($format) {
                case 1:
                    $str = $rtime;
                    break;
                default:
                    $str = $rtime2;
                    break;
            }
        }
    } else {
        $str = '暂无记录';
    }
    return $str;
}

/**
 * 获取树状结构数组
 */
function get_tree_array($data,$parent_name)
{

    $tree = new \Tree();
    $tree->init($data, ['parentid' =>$parent_name]);
    $menuList = $tree->get_arraylist($data);

    return $menuList;

}

/**
 * 获取选中id的下级树状图
 * @param $data
 * @param $parent_id
 * @param string $parent_name
 * @param string $id_name
 */
function get_child_tree($parent_id,$parent_name='parent_id',$id_name='client_id')
{
    $data=Db::name('client')->select();
    $tree=new \Tree();
    $config = [
        'id'=>$id_name,
        'parentid' => $parent_name
    ];
    $tree->init($data,$config);
    $menuList = get_childs($parent_id);
    $menuList = $tree->get_arraylist($menuList,$parent_id);
    return $menuList;
}

/**
 * 获取孩子节点
 * @param $data所有数据
 * @param $parent_id父id
 * @param $parent_name父字段名
 * @param $id_name表单id
 */
function get_childs($parent_id,$parent_name='parent_id',$id_name='client_id')
{
    $data=Db::name('client')->select();
    $tree=new Tree();
    $config = [
        'id'=>$id_name,
        'parentid' => $parent_name
    ];
    $tree->init($data,$config);
    $menuList = $tree->get_childs($data, $parent_id);

    return $menuList;
}


/**
 * excel导入（my）
 * $pathSave = config('view_replace_str.__UPLOAD__') . 'admin/order/';
 * $data=import_excel_csv($pathSave, 'import');
 * @param $savePathHead
 * @param $fileData
 * @return mixed
 */
function import_excel_csv($savePathHead, $fileData)
{
    $orderSavePathHead = '.' . $savePathHead;
    // 判断文件是什么格式
    $file = $fileData;
    $info = $file->move($orderSavePathHead);

    if ($info) {
        $pathInfo = pathinfo($info->getSaveName());

        $savePath = $orderSavePathHead . $info->getSaveName();
        $map['savePath'] = $savePath;//文件保存路径

        $type = strtolower($pathInfo["extension"]);
        $type = $type === 'csv' ? $type : 'Excel5';
        ini_set('max_execution_time', '0');
        Vendor('phpexcel.PHPExcel');
        // 判断使用哪种格式
        $objReader = \PHPExcel_IOFactory::createReader($type);
        $objPHPExcel = $objReader->load($savePath);
        $sheet = $objPHPExcel->getSheet(0);
        // 取得总行数
        $highestRow = $sheet->getHighestRow();
        // 取得总列数
        $highestColumn = $sheet->getHighestColumn();
        //循环读取excel文件,读取一条,插入一条
        $data = array();
        //从第一行开始读取数据
        for ($j = 2; $j <= $highestRow; $j++) {
            //从A列读取数据
            for ($k = 'A'; $k <= $highestColumn; $k++) {
                // 读取单元格
                $data[$j][] = $objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue();
            }
        }

        $map['excelArr'] = $data;
    }

    return $map;
}

/**
 * 数组转为对象
 * @param $array
 * @return StdClass
 */
function array2object($array)
{
    if (is_array($array)) {
        $obj = new StdClass();
        foreach ($array as $key => $val) {
            $obj->$key = $val;
        }
    } else {
        $obj = $array;
    }
    return $obj;
}

/**
 * 对象转为数组
 * @param $object
 * @return mixed
 */
function object2array($object)
{
    if (is_object($object)) {
        $array = (array)$object;
    } else {
        $array = $object;
    }
    return $array;
}


/**
 *获取json字符串中的参数值
 * @param $json 参与转换的json
 * @param $key 需要获取的key的值
 * @return mixed key的值
 */
function getAttr($json,$key)
{
    $arr= json_decode($json);
    if (!empty($arr->$key)) {
        return $arr ->$key;
    }else{
        return false;
    }
}

/**
 * @param $arrays
 * @param $sort_key
 * @param int $sort_order
 * @param int $sort_type
 * @return array
 * boolSORT_ASC - 默认，按升序排列。(A-Z)
 * SORT_DESC - 按降序排列。(Z-A)
 * 随后可以指定排序的类型：
 * SORT_REGULAR - 默认。将每一项按常规顺序排列。
 * SORT_NUMERIC - 将每一项按数字顺序排列。
 * SORT_STRING - 将每一项按字母顺序排列
 */

function my_sort($arrays, $sort_key, $sort_order = SORT_ASC, $sort_type = SORT_NUMERIC)
{
    if (is_array($arrays)) {
        foreach ($arrays as $array) {
            if (is_array($array)) {
                $key_arrays[] = $array[$sort_key];
            } else {
                return false;
            }
        }
    } else {
        return false;
    }
    array_multisort($key_arrays, $sort_order, $sort_type, $arrays);

    return $arrays;
}

/**
 * 去掉指定key
 * @param $data
 * @param $key
 * @return mixed
 */
function array_remove($data, $key){
    if(!array_key_exists($key, $data)){
        return $data;
    }
    $keys = array_keys($data);
    $index = array_search($key, $keys);
    if($index !== FALSE){
        array_splice($data, $index, 1);
    }
    return $data;

}

/**
 *把用户输入的文本转义（主要针对特殊符号和emoji表情）
 */
function userTextEncode($str){
    if(!is_string($str))return $str;
    if(!$str || $str=='undefined')return '';

    $text = json_encode($str); //暴露出unicode
    $text = preg_replace_callback("/(\\\u[ed][0-9a-f]{3})/i",function($str){
        return addslashes($str[0]);
    },$text); //将emoji的unicode留下，其他不动，这里的正则比原答案增加了d，因为我发现我很多emoji实际上是\ud开头的，反而暂时没发现有\ue开头。
    return json_decode($text);
}
/**
解码上面的转义
 */
function userTextDecode($str){
    $text = json_encode($str); //暴露出unicode
    $text = preg_replace_callback('/\\\\\\\\/i',function($str){
        return '\\';
    },$text); //将两条斜杠变成一条，其他不动
    return json_decode($text);
}


/**
 * 上传多图片
 * @param $name 文件名
 * @param $pathName 文件路径
 * @return string
 */
function upload_more($name, $pathName)
{
    $files = request()->file($name);
    foreach ($files as $k=>$file) {
        if ($k <= 3) {
            $info = $file->move(ROOT_PATH . 'data' . DS . 'upload/'.$pathName);
            if ($info) {
                $imgJson[$k] =$info->getSaveName();
            }else{
                echo $file->getError();
            }
        }
    }

    return json_encode($imgJson);
}

/**
 * 单图上传
 * @param $name
 * @param $pathName
 * @return string
 */
function upload_sigle($name, $pathName)
{
    $file=request()->file($name);
    $info = $file->move(ROOT_PATH . 'data' . DS . 'upload/'.$pathName);

    if ($info) {
        $drivePath= $info->getSaveName();
    }else{
        $drivePath = '';
    }
    return $drivePath;
}

/**
 * curl的post和get请求
 * @param $url（请求地址）
 * @param string $type(请求类型，post，get，默认为get)
 * @param string $res（返回json格式）
 * @param string $arr（传入参数）
 * @return mixed
 */
function http_curl($url, $type = 'get', $res = 'json', $arr = '')
{
    //1.初始化curl
    $ch = curl_init();
    //2.设置curl的参数
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    if ($type == 'post') {
        curl_setopt($ch, CURLOPT_POST, 1);//不自动输出要开启
        curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
    }
    //有些api接口需要证书，如果需要就开启
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在
    //3.采集
    $output = curl_exec($ch);
    //4.关闭
    curl_close($ch);
    if ($res == 'json') {
        return json_decode($output, true);
    }else{
        return $output;
    }
}

/**
 * 返回不含前缀的数据库表数组
 *
 * @author rainfer <81818832@qq.com>
 * @param bool
 * @return array
 */
function db_get_tables($prefix=false)
{
    $db_prefix =config('database.prefix');
    $list  = Db::query('SHOW TABLE STATUS FROM '.config('database.database'));
    $list  = array_map('array_change_key_case', $list);
    $tables = array();
    foreach($list as $k=>$v){
        if(empty($prefix)){
            if(stripos($v['name'],strtolower(config('database.prefix')))===0){
                $tables [] = strtolower(substr($v['name'], strlen($db_prefix)));
            }
        }else{
            $tables [] = strtolower($v['name']);
        }

    }
    return $tables;
}
/**
 * 返回数据表的sql
 *
 * @author rainfer <81818832@qq.com>
 *
 * @param $table : 不含前缀的表名
 * @return string
 */
function db_get_insert_sqls($table)
{
    $db_prefix =config('database.prefix');
    $db_prefix_re = preg_quote($db_prefix);
    $db_prefix_holder = db_get_db_prefix_holder();
    $export_sqls = array();
    $export_sqls [] = "DROP TABLE IF EXISTS $db_prefix_holder$table";
    switch (config('database.type')) {
        case 'mysql' :
            if (!($d = Db::query("SHOW CREATE TABLE $db_prefix$table"))) {
                $this->error("'SHOW CREATE TABLE $table' Error!");
            }
            $table_create_sql = $d [0] ['Create Table'];
            $table_create_sql = preg_replace('/' . $db_prefix_re . '/', $db_prefix_holder, $table_create_sql);
            $export_sqls [] = $table_create_sql;
            $data_rows = Db::query("SELECT * FROM $db_prefix$table");
            $data_values = array();
            foreach ($data_rows as &$v) {
                foreach ($v as &$vv) {
                    //TODO mysql_real_escape_string替换方法
                    //$vv = "'" . @mysql_real_escape_string($vv) . "'";
                    $vv = "'" . addslashes(str_replace(array("\r","\n"),array('\r','\n'),$vv)) . "'";
                }
                $data_values [] = '(' . join(',', $v) . ')';
            }
            if (count($data_values) > 0) {
                $export_sqls [] = "INSERT INTO `$db_prefix_holder$table` VALUES \n" . join(",\n", $data_values);
            }
            break;
    }
    return join(";\n", $export_sqls) . ";";
}
/**
 * 检测当前数据库中是否含指定表
 *
 * @author rainfer <81818832@qq.com>
 *
 * @param $table : 不含前缀的数据表名
 * @return bool
 */
function db_is_valid_table_name($table)
{
    return in_array($table, db_get_tables());
}
/**
 * 不检测表前缀,恢复数据库
 *
 * @author rainfer <81818832@qq.com>
 *
 * @param $file
 * @param $prefix
 */
function db_restore_file($file,$prefix='')
{
    $prefix=$prefix?:db_get_db_prefix_holder();
    $db_prefix=config('database.prefix');
    $sqls = file_get_contents($file);
    $sqls = str_replace($prefix, $db_prefix, $sqls);
    $sqlarr = explode(";\n", $sqls);
    foreach ($sqlarr as &$sql) {
        Db::execute($sql);
    }
}
/**
 * 返回表前缀替代符
 * @author rainfer <81818832@qq.com>
 *
 * @return string
 */
function db_get_db_prefix_holder()
{
//    return '<--db-prefix-->';
    return config('database.prefix');
}
/**
 * 强制下载
 * @author rainfer <81818832@qq.com>
 *
 * @param string $filename
 * @param string $content
 */
function force_download_content($filename, $content)
{
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Transfer-Encoding: binary");
    header("Content-Disposition: attachment; filename=$filename");
    echo $content;
    exit ();
}
//写日志
function write_log($content='',$log_file_name)
{
    if ($log_file_name) {
        if (!empty($content)) {
            $content = '内容:'. $content;
            $content.=' 时间:'.date('Ymd H:i:s', time());
            $content.=' 操作员:'.get_users(open_secret(cookie('UID')))['user_login'];
            $content.=' 操作ip:'.request()->ip()."\n";

            $TxtFileName = config('log_path'). $log_file_name . ".txt";//创建文章
            $TxtRes = fopen($TxtFileName, "a");
            fwrite($TxtRes,$content);
        }
    }else{
        lang('日志文件名不能为空');
    }
}

/**
 * 转换文件大小
 * @param $size filesize($filePath)
 * @return string
 */
function getFileSize($size){
    $dw="Byte";

    if($size >= pow(2, 40)){
        $size=round($size/pow(2, 40), 3);
        $dw="TB";
    }else if($size >= pow(2, 30)){
        $size=round($size/pow(2, 30), 3);
        $dw="GB";
    }else if($size >= pow(2, 20)){
        $size=round($size/pow(2, 20), 3);
        $dw="MB";
    }else if($size >= pow(2, 10)){
        $size=round($size/pow(2, 10), 3);
        $dw="KB";
    }else {
        $dw="Bytes";
    }
    return $size.$dw;

}

/**
 * 短信接口
 * @param $tel
 * @param $msg
 * @return array|string
 */
function send_sms($tel,$msg)
{
    $map = [
        'api_key' => plugins_value('msn', 'api_key'),
        'use_ssl' => FALSE
    ];
    $sign = plugins_value('msn', 'sign');
    if (empty($sign)) {
        return '该插件尚未添加';
    }
    $sms = new Sms($map);

    //send 单发接口，签名需在后台报备
    $res = $sms->send($tel, $msg.'【'.$sign.'】');
    if( $res ){
        if( isset( $res['error'] ) &&  $res['error'] == 0 ){
            return 'success';
        }else{
            return 'failed,code:'.$res['error'].',msg:'.$res['msg'];
        }
    }else{
        return $sms->last_error();
    }
}
/**
 * 获取指定插件某个参数值
 * @param $wid_key
 * @param $wid_name
 * @return string
 */
function plugins_value($wid_key,$wid_name)
{
    $widgets = Db::name('widgets')
        ->where('wid_key',$wid_key)
        ->value('wid_params');

    $params_arr = explode('|', $widgets);
    foreach ($params_arr as $k=>$v){
        $chids_arr=explode(':',$v);
        foreach ($chids_arr as $k) {
            if ($k == $wid_name) {
                return  $chids_arr[1];
            }
        }
    }

    return '未找到';
}

/**
 * 错误提示
 * @param $msg
 * @return string
 */
function edd_error($msg)
{
    $map = [
        'error'=>1,
        'msg'=>$msg
    ];

    return json_encode($map);
}

/**
 * 成功提示
 * @param $msg
 * @return string
 */
function edd_success($msg)
{
    $map = [
        'error'=>0,
        'msg'=>$msg
    ];

    return json_encode($map);
}

/**
 * 获取邀请码
 */
function createCode($user_id) {
    static $source_string = 'E5FCDG3HQA4B1NOPIJ2RSTUV67MWX89KLYZ';
    $num = $user_id;
    $code = '';
    while ( $num > 0) {
        $mod = $num % 35;
        $num = ($num - $mod) / 35;
        $code = $source_string[$mod].$code;
    }
    if(empty($code[3]))
        $code = str_pad($code,4,'0',STR_PAD_LEFT);
    return $code;
}

/**
 * 解除邀请码
 * @param $code
 * @return bool|int
 */
function decode($code) {
    static $source_string = 'E5FCDG3HQA4B1NOPIJ2RSTUV67MWX89KLYZ';
    if (strrpos($code, '0') !== false)
        $code = substr($code, strrpos($code, '0')+1);
    $len = strlen($code);
    $code = strrev($code);
    $num = 0;
    for ($i=0; $i < $len; $i++) {
        $num += strpos($source_string, $code[$i]) * pow(35, $i);
    }
    return $num;
}

/**
 * 将图片转为base64
 * @param $image_file
 * @return string
 */
function base64EncodeImage ($image_file) {
    $base64_image = '';
    $image_info = getimagesize($image_file);
    $image_data = fread(fopen($image_file, 'r'), filesize($image_file));
    $base64_image = 'data:' . $image_info['mime'] . ';base64,' . chunk_split(base64_encode($image_data));
    return $base64_image;
}
/*==========================================================extra=====================================================*/
/**
 * 获取对应分类文章一篇
 * @param $terms
 * @return false|PDOStatement|string|\think\Collection
 */
function get_news($terms)
{
    $mem = new Memcache();
    if ($mem->has($terms)) {
        $postsList = $mem->get($terms);
    }else{
        $map = [
            'post_status'=>1,//审核通过
            't.name'=>$terms
        ];
        $postsList=$postsList = Db::name('posts')
            ->alias('p')
            ->where($map)
            ->join('term_relationships tr','tr.object_id=p.id')
            ->join('terms t','t.term_id=tr.term_id')
            ->order('id desc')
            ->limit(1)
            ->value('p.post_excerpt');
        $mem->set($terms, $postsList);
    }
    return $postsList;
}

/**
 * 清除文章缓存
 */
function rm_news()
{
    $mem = new Memcache();
    $mem->tag('news', ['首页最新资讯', '首页新闻滚动条']);
    $mem->clear('news');
}

/**
 * 砖石
 */
function goods_list()
{
    $goodsArr = [
        ['goods_id'=>1,'diamond'=>6,'money'=>6],
        ['goods_id'=>2,'diamond'=>18,'money'=>18],
        ['goods_id'=>3,'diamond'=>30,'money'=>30],
        ['goods_id'=>4,'diamond'=>68,'money'=>68],
        ['goods_id'=>5,'diamond'=>128,'money'=>128],
        ['goods_id'=>6,'diamond'=>328,'money'=>328],
    ];

    return $goodsArr;
}

/**
 * 局数价位
 * @param $round_id
 * @return array|mixed
 */
function room_charge($round_id)
{
    $roondRound = [
        ['round_id'=>1,'round_times'=>10,'diamond'=>3],
        ['round_id'=>2,'round_times'=>20,'diamond'=>6],
        ['round_id'=>3,'round_times'=>30,'diamond'=>9],
    ];
    $round = [];
    foreach ($roondRound as $k=>$v){
        if ($v['round_id'] == $round_id) {
            $round = $roondRound[$k];
            break;
        }
    }

    return $round;
}

/**
 * 获取商品详情
 * @param $goods_id
 * @param $key
 * @return string
 */
function get_goods($goods_id, $key)
{
    $goodsArr = [
        ['goods_id'=>1,'diamond'=>6,'money'=>6],
        ['goods_id'=>2,'diamond'=>18,'money'=>18],
        ['goods_id'=>3,'diamond'=>30,'money'=>30],
        ['goods_id'=>4,'diamond'=>68,'money'=>68],
        ['goods_id'=>5,'diamond'=>128,'money'=>128],
        ['goods_id'=>6,'diamond'=>328,'money'=>328],
    ];
    $goodsKey = '';
    foreach($goodsArr as $k=>$v){
        if ($v['goods_id'] == $goods_id) {
            $goodsKey=$v[$key];
            break;
        }
    }

    return $goodsKey;
}

/**
 * 代理当前余额
 *
 */
function get_money($user_id)
{
    //返利的
    $getProfile = Db::name('profile')
        ->where('user_id',$user_id)
        ->sum('money');

    $drawMap = [
        'user_id'=>$user_id,
//        'draw_type'=>2
    ];

    //提现的
    $drawMoney = Db::name('draw')
        ->where($drawMap)
        ->sum('draw_money');

    $ca = $getProfile - $drawMoney;
    return $ca?$ca:0;
}

/**
 * 玩家当前砖石数量
 * @param $player_id
 * @return float|int
 */
function player_diamond($player_id)
{
    //充值的钻石
    $payDiamond = Db::name('pay_log')
        ->where('player_id', $player_id)
        ->sum('diamond_nums');

    //创房间用去的
    $roomDiamond = Db::name('room')
        ->where('room_owner', $player_id)
        ->sum('room_charge');

    $ca = $payDiamond - $roomDiamond;

    return $ca ? $ca : 0;
}

//代理总的返利金额
function get_profile($user_id)
{
    $getProfile = Db::name('profile')
        ->where('user_id',$user_id)
        ->sum('money');

    return $getProfile?$getProfile:0;
}
/**
 * 获取代理信息
 * @param $user_id
 * @param $key
 * @return mixed
 */
function get_agency($user_id, $key)
{
    $map = [
        'u.id' => $user_id,
        'r.id' => 2
    ];
    return Db::name('users')
        ->alias('u')
        ->join('role_user ru','ru.user_id=u.id')
        ->join('role r','r.id=ru.role_id')
        ->where($map)
        ->value($key);
}

/**
 * 获取玩家信息
 * @param $player_id
 * @param $key
 */
function get_player($player_id, $key)
{
    $playerKey= Db::name('player')
        ->where('player_id', $player_id)
        ->value($key);
    return empty($playerKey)&&$playerKey!=0 ? '' : $playerKey;
}

/**
 * 获取代理百分比
 * @param $rank_id
 * @param $key
 * @return mixed
 */
function agency_percent($rank_id, $key)
{
    return Db::name('rank')->where('rank_id', $rank_id)->value($key);
}

/**
 * 父亲下线+1
 * @param $user_id
 * @param $type inc/dec
 */
function save_child($user_id,$type)
{
    if ($type == 'inc') {
        Db::name('users')->where('id', $user_id)->setInc('childs_nums');
    } elseif ($type == 'dec') {
        Db::name('users')->where('id', $user_id)->setDec('childs_nums');
    }
}

/**
 * 商品折扣
 */
function account($cid)
{
    $account = 0;//加送比例
    $users_id = get_player($cid, 'users_id');
    if (empty($users_id)) {
        //没有代理,判断是否本身是代理
        $user_rank=Db::name('users')
            ->where('player_id', $cid)
            ->value('user_rank');
        if (!empty($user_rank)) {
            //是代理
            $account = agency_percent($user_rank, 'self_account')*0.01;
        }
    }else{
        $rank_id=get_agency($users_id, 'user_rank');//下线充钱折扣价
        $account=agency_percent($rank_id, 'child_account')*0.01;
    }

    return $account;
}

/**
 *上级获利百分比
 * @param $cid
 * @return int|mixed
 */
function profile_percent($cid,$money,$pay_log_id)
{
    $users_id = get_player($cid, 'users_id');
    $users=Db::name('users')->getByPlayerId($cid);


    if (!empty($users_id)) {
        //有上级
        $user=get_users($users_id);
        if (empty($user)) {
            return '上级不存在';
        }else{
            $rank_id=get_agency($users_id, 'user_rank');
            $account=agency_percent($rank_id, 'percent')*0.01;

            $map = [
                'money' => $money*$account,
                'from_player_id' => $cid,
                'date' => time(),
                'user_id' =>$users_id,
                'percent'=>$account,
                'pay_log_id'=>$pay_log_id
            ];

            Db::name('profile')->insert($map);
        }
    } elseif (!empty($users)) {
        //如果是代理
        $users_id = $users['id'];
        $rank_id=get_agency($users_id, 'user_rank');
        $account=agency_percent($rank_id, 'percent')*0.01;

        $map = [
            'money' => $money*$account,
            'from_player_id' => $cid,
            'date' => time(),
            'user_id' =>$users_id,
            'percent'=>$account,
            'pay_log_id'=>$pay_log_id
        ];

        Db::name('profile')->insert($map);
    }
}
/**
 * 改变玩家砖石数量
 * @param $player_id
 * @param $nums
 * @param $type inc/dec
 */
function save_player_diamond($player_id, $nums, $type)
{
    if ($type == 'inc') {
        Db::name('player')
            ->where('player_id', $player_id)
            ->setInc('diamond',$nums);
    }elseif ($type=='dec'){
        Db::name('player')
            ->where('player_id', $player_id)
            ->setDec('diamond',$nums);
    }
}

/**
 * 获取该订单
 * @param $pay_id
 * @param $key
 * @return mixed|string
 */
function get_order($pay_id,$key)
{
    $payKey = Db::name('pay_log')
        ->where('pay_id', $pay_id)
        ->value($key);

    return $payKey ? $payKey : '该订单不存在';
}

//向客户端发送
function send_client($msg,$type)
{
    $mess = ['type'=>$type];
    $mess = array_merge($msg, $mess);
    return json_encode($mess);
}

/**
 * 获取玩家信息
 * @param $player_id
 * @return array|false|mixed|PDOStatement|string|\think\Model
 */
function get_player_info($player_id)
{
    $mem = new Memcache();
    if ($mem->has($player_id)) {
        $player=$mem->get($player_id);//获取该玩家信息
    }else{
        $player=Db::name('player')
            ->field('avatar,name,sex,diamond,player_id')
            ->find($player_id);

        $mem->set($player_id, $player);
    }
    return $player;
}

/**
 * 获取房间信息
 * @param $room_id
 * @return string
 */
function get_home_info($room_id)
{
    $mem = new Memcache();
    $room_info = $room_id . 'room_info';
    if ($mem->has($room_info)) {
        $room = $mem->get($room_info);
    } else {
         $room = Db::name('room')
            ->find($room_id);
        $mem->set($room_info, $room);
    }

    return $room;
}

/**
 * 获取牌当前发出来的牌
 * @param $cards
 * @param string $key
 * @return mixed
 */
function get_card($card_arr_id)
{
    return object2array(json_decode($card_arr_id));
}

/**
 * 获取发出后目前的手牌
 * @param $nowCard 当前手牌
 * @param $my_send_card 发出的牌
 * @return array 目前的手牌
 */
function rm_card_arr($nowCard,$my_send_card)
{
    return array_merge(array_diff($nowCard, $my_send_card));
}


/**
 *获取该玩家的分数
 * @param $room_id
 * @param $player_id
 * @return mixed
 */
function all_score($room_id,$player_id)
{
    $mem = new Memcache();
    $all_score_key = 'all_score_key' . $room_id . 'player_id' .$player_id;//总的分数
    if ($mem->has($all_score_key)) {
        $mem->get($all_score_key);
    }else{
        $mem->set($all_score_key,0);
    }
    return $mem->get($all_score_key);
}

/**
 * 软删除某个房间
 * @param $room_id
 */
function del_room($room_id)
{
    $map = [
        'room_id'=>$room_id,
        'del_time'=>time()
    ];

    $dd= Db::name('room')->update($map);
    return $dd;
}

function join_player($room_id)
{
    $map = [
        'room_id' => $room_id
    ];
    $roundInfo = Db::name('room_round')
        ->where($map)
        ->find();

    return get_players($roundInfo['all_player']);
}
/**
 * 获取每轮所压牌的详情
 */
function get_card_info($card_json_id)
{
    $cardArr=json_decode($card_json_id);
    if (!empty($cardArr)) {
        $cardArr=Card::find_card_arr($cardArr);
        $cardNameArr = array_column($cardArr, 'card');
        return implode(',',$cardNameArr);
    }
}

/**
 * 获取所有玩家详情
 */
function get_players($player_json_id)
{
    $player_arr=json_decode($player_json_id);
    $map = [
        'player_id'=>['in',$player_arr]
    ];

    $players = Db::name('player')->where($map)->column('name');
    return implode(',', $players);
}

/**
 * 某房间已经完成局数
 * @param $room_id
 * @return int|string
 */
function complete_round($room_id)
{
    $map = [
        'room_id'=>$room_id
    ];
    $roundInfoNums = Db::name('room_round')->where($map)->count();
    return $roundInfoNums;
}


/**
 * 获取站点配置信息
 * @param $name
 * @return mixed
 */
function get_options($name)
{
    $option_value=Db::name('options')->where('option_id',6)->value('option_value');
    return getAttr($option_value, $name);
}

/**
 * 获取站点配置信息
 * @param $name
 * @return mixed
 */
function get_game_pic($name)
{
    $option_value=Db::name('game_pic')->where('game_pic_id',1)->value('option_value');
    return getAttr($option_value, $name);
}

/**
 * 获取用户信息
 * @param $user_id
 * @return array|false|PDOStatement|string|\think\Model
 */
function get_users($user_id)
{
    $user=Db::name('users')->find($user_id);
    return $user;
}

/**
 * 改变在线人数
 * @param $type
 * @return int
 */
function change_online_memcache($type)
{
    $mem = new Memcache();
    $onlinePeople = 'onlinePeople';
    if ($mem->has($onlinePeople)) {
        if ($type == 'dec') {
            if ($mem->get($onlinePeople) > 0) {
                $mem->dec($onlinePeople, 1);
            }
        } elseif ($type == 'inc') {
            $mem->inc($onlinePeople, 1);
        }
    }else{
        if ($type == 'dec') {
            $mem->set($onlinePeople, 0);
        } elseif ($type == 'inc') {
            $mem->set($onlinePeople, 1);
        }
    }
    return $mem->get($onlinePeople);
}