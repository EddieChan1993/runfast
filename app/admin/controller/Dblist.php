<?php
namespace app\admin\controller;

use think\Db;

/**
 * 数据库备份
 */
class Dblist extends Base
{
    //表单显示，及其已备份数据库文件显示
    function home_page()
    {
        //数据库备份文件
        $sqlFile = config('db_path');
        $sqlFile = list_file($sqlFile);
        //数据库列表
        $list = Db::query('SHOW TABLE STATUS FROM ' . config('database.database'));
        $list = array_map('array_change_key_case', $list);
        //过滤非本项目前缀的表
        foreach ($list as $k => $v) {
            if (stripos($v['name'], strtolower(config('database.prefix'))) !== 0) {
                unset($list[$k]);
            }
        }
        $sqlMap = [
            'sql_list' => $list,
            'sql_file' => $sqlFile?my_sort($sqlFile,'ctime',SORT_DESC):''
        ];
        return view('home_page', $sqlMap);
    }

    /*
    * 单表数据备份
    */
    public function export_more()
    {
        $tables = $_POST;
        $TxtFileName = config('db_path'). 'all_tables_' . date('YmdHis', time()) . ".sql";//创建文章
        if (($TxtRes = fopen($TxtFileName, "w+")) === FALSE) {
            $this->error("创建可写文件：" . $TxtFileName . "失败");
            exit();
        }

        foreach ($tables['tables'] as $k) {
        $table = $k;
            if ($table) {
                if (stripos($table, config('database.prefix')) == 0) {
                    //含前缀的表,去除表前缀
                    $table = str_replace(config('database.prefix'), "", $table);
                }
                if (!db_is_valid_table_name($table)) {
                    $this->error("不存在表" . ' ' . $table);
                }
                $contnt = db_get_insert_sqls($table)."\n";//备份内容

                $StrConents = $contnt;// 写进文件的内容

                if (!fwrite($TxtRes, $StrConents)) { //将信息写入文件
                    $this->error("尝试向文件" . $TxtFileName . "写入" . $StrConents . "失败！");
                    fclose($TxtRes);
                    exit();
                }
            } else {
                $this->error('未指定需备份的表');
            }
        }
            $this->success('全表备份成功');
        fclose($TxtRes); //关闭指针
    }

        /*
         * 单表数据备份
         */
    public function export_one()
    {
        $table = input('table_name');
        $TxtFileName =config('db_path'). $table.'_'.date('YmdHis',time()).".sql";//创建文章

        if($table){
            if(stripos($table,config('database.prefix'))==0){
                //含前缀的表,去除表前缀
                $table=str_replace(config('database.prefix'),"",$table);
            }
            if (!db_is_valid_table_name($table)) {
                $this->error("不存在表" . ' ' . $table);
            }

            $contnt=db_get_insert_sqls($table);//备份内容
            if( ($TxtRes=fopen ($TxtFileName,"w+")) === FALSE){
                $this->error("创建可写文件：" . $TxtFileName . "失败");
                exit();
            }
            $StrConents = $contnt;// 写进文件的内容

            if(!fwrite ($TxtRes,$StrConents)){ //将信息写入文件
                $this->error("尝试向文件" . $TxtFileName . "写入" . $StrConents . "失败！");
                fclose($TxtRes);
                exit();
            }
                $this->success(input('table_name') . '备份成功');
            fclose ($TxtRes); //关闭指针
        }else{
            $this->error('未指定需备份的表');
        }
    }

    /*
	 * 数据还原
	 */
    public function restore($start = 0)
    {
        //读取备份配置
        $config = array(
            'path'     => realpath(config('db_path')) . DS,
            'part'     => config('db_part'),
            'compress' => config('db_compress'),
            'level'    => config('db_level'),
        );
        $path[1]  = realpath(config('db_path')) . DS . input('fileName');
        //创建备份文件
        $db = new \Database($path,$config);
        $start = $db->import($start);

        if(false === $start){
            $this->error('还原数据出错！');
        } elseif(0 === $start) { //下一卷
            $this->success('还原完成！');
        }else {
            if($start[1]){
                $this->restore($start[0]);
            } else {
                $data['gz'] = 1;
                $this->restore($start[0]);
            }
        }
    }

    /**
     * 删除备份文件
     */
    public function del()
    {
        $path = realpath(config('db_path')) . DS . input('fileName');
        array_map("unlink", glob($path));
        if (!count(glob($path))) {
            $this->success('备份文件删除成功！');
        } else {
            $this->error('备份文件删除失败！');
        }
    }

    /**
     * 备份文件下载
     */
    function download()
    {
        $path = realpath(config('db_path')) . DS . input('fileName');
        $file=fopen($path,"r");
        header("Content-Type: application/octet-stream");
        header("Accept-Ranges: bytes");
        header("Accept-Length: ".filesize($path));

        header("Content-Disposition: attachment; filename=".basename($path));
        echo fread($file,filesize($path));
        fclose($file);
    }
}