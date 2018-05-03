<?php
namespace app\admin\controller;
use think\Image;

/**
 * 文件上传
 */
class Upload extends Base
{
    //单文件上传
    function show_upload_sigle()
    {
        $map = [
            'dom' => input('dom'),
            'path' => input('path'),
            'type' => input('type'),
        ];
        return view('upload_sigle',$map);
    }

    //单文件上传逻辑
    function upload_sigle()
    {
        if (empty($_FILES)) {
            $this->error('请先上传图片');
        }

        $Url = 'admin/'.input('path').'/';//上传缩略图
        $file_url=upload_sigle('files', $Url);
        if ($file_url) {
            $thumbUrl = config('view_replace_str.__UPLOAD__') .'/'.$Url .strtr($file_url, "\\", "/") ;
            //文件压缩
            if (input('is_zip')) {
                //是否压缩
                $image=Image::open('./'.$thumbUrl);
                $image->thumb(config('img_px'), config('img_px'))->save('./'.$thumbUrl);
            }
            add_img_db($thumbUrl);

            $this->success($thumbUrl);
        }else{
            $this->error('文件上传失败');
        }
    }

    //删除单文件
    function del_sigle_file()
    {
        del_img_db(input('file_path'));
        $path = '.'.input('file_path');
        array_map("unlink", glob($path));
        if (!count(glob($path))) {
            $this->success(config('view_replace_str.__UPLOAD__').'/admin/common/upload.svg');
        } else {
            $this->error('文件删除失败！');
        }
    }

    //多文件上传
    function show_upload_more()
    {
        return view('upload_more',['dom'=>input('dom')]);
    }

    //多文件上传逻辑
    function upload_more()
    {
        echo 123;
//        return view('upload_more');
    }
}