<?php
namespace app\admin\controller;
use think\Db;

/**
 * 图库管理
 */
class Imgs extends Base
{
    function home_page()
    {
        $imgNums=Db::name('imgs')->count();
        $pages = new \Page($imgNums);
        $imgList = Db::name('imgs')
            ->order('upload_date desc')
            ->epage()
            ->select();

        $map = [
            'imgList'=>$imgList,
            'pages' => $pages->showPages(3),
            'imgNums'=>$imgNums
        ];
        return view('home_page',$map);
    }

    function del_think()
    {
        $img_path=Db::name('imgs')->where('img_id', input('img_id'))->value('img_path');
        Db::name('imgs')->delete(input('img_id'));
        $path = '.'.$img_path;
        array_map("unlink", glob($path));

        if (!count(glob($path))) {
            $this->success('该文件删除成功');
        } else {
            $this->error('该文件删除失败！');
        }
    }
}