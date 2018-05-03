<?php
namespace app\admin\controller;

class Error extends Base
{
    function index()
    {
        $this->error(lang('非法访问503'));
    }
}