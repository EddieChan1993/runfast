<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:64:"C:\code_edd\201706\alphacms/app/admin\view\dblist\home_page.html";i:1499411446;s:62:"C:\code_edd\201706\alphacms/app/admin\view\Public\content.html";i:1499229828;s:62:"C:\code_edd\201706\alphacms/app/admin\view\Public\head_in.html";i:1499053602;s:60:"C:\code_edd\201706\alphacms/app/admin\view\Public\alert.html";i:1498813495;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo \think\Config::get('title'); ?></title>
    <link rel="icon" href="__UPLOAD__/admin/common/logo.png" type="image/x-icon" />
<link rel="stylesheet" type="text/css" id="theme" href="__ADMIN__/css/theme-default-in.css"/>
<!-- EOF CSS INCLUDE -->

<!-- START PLUGINS -->
<script type="text/javascript" src="__ADMIN__/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="__ADMIN__/js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="__ADMIN__/js/plugins/bootstrap/bootstrap.min.js"></script>
<!-- END PLUGINS -->

<!-- THIS PAGE PLUGINS -->
<script type='text/javascript' src='__ADMIN__/js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="__ADMIN__/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

<script type="text/javascript" src="__ADMIN__/js/plugins/bootstrap/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="__ADMIN__/js/plugins/bootstrap/bootstrap-file-input.js"></script>
<script type="text/javascript" src="__ADMIN__/js/plugins/bootstrap/bootstrap-select.js"></script>
<script type="text/javascript" src="__ADMIN__/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="__ADMIN__/js/plugins/datatables/jquery.dataTables.min.js"></script>

<!-- END THIS PAGE PLUGINS -->
<script type="text/javascript" src="__ADMIN__/js/plugins.js"></script>
<script type="text/javascript" src="__ADMIN__/js/actions.js"></script>


<link rel="stylesheet" href="__ADMIN__/plugins/message_alert/css/m_css.css">
<script src="__ADMIN__/plugins/message_alert/js/m_js.js"></script>
<script src="__ADMIN__/plugins/layer-v3.0.1/layer/layer.js"></script>
<script src="__ADMIN__/plugins/ajax-form/ajax-form.js"></script>

<!--MY-->
<script src="__PUBLIC__/admin/controller/upload.js"></script>
<script src="__PUBLIC__/admin/controller/controller.js"></script>
<!--前台框架自带的弹出层-->
<div class="message-box animated fadeIn message-box-info" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span><strong>退出</strong> ?</div>
            <div class="mb-content">
                <p>你确定要退出?</p>
                <p>如果你想继续操作后台请按‘否’. 按‘是’则回到登录页面.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="<?php echo url('admin/Index/login_out'); ?>" class="btn btn-success btn-lg">是</a>
                    <button class="btn btn-default btn-lg mb-control-close">否</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--自定义弹出提示-->
<div class="m_tip">
    <div>
        <img class="m_icon m_normal" src="__ADMIN__/plugins/message_alert/img/tip.svg">
        <img class="m_icon m_error" src="__ADMIN__/plugins/message_alert/img/error.svg">
        <img class="m_icon m_success" src="__ADMIN__/plugins/message_alert/img/success.svg">
        <img class="m_icon m_warning" src="__ADMIN__/plugins/message_alert/img/warning.svg">
        <img class="m_icon m_loading" src="__ADMIN__/plugins/message_alert/img/loading.svg">
        <span>提示内容</span>
    </div>
    <img class="m_icon m_close" src="__ADMIN__/plugins/message_alert/img/close.svg" onclick=close_tip(this)>
</div>

</head>
<body>
<!--前台框架自带的弹出层-->
<div class="message-box animated fadeIn message-box-info" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span><strong>退出</strong> ?</div>
            <div class="mb-content">
                <p>你确定要退出?</p>
                <p>如果你想继续操作后台请按‘否’. 按‘是’则回到登录页面.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="<?php echo url('admin/Index/login_out'); ?>" class="btn btn-success btn-lg">是</a>
                    <button class="btn btn-default btn-lg mb-control-close">否</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--自定义弹出提示-->
<div class="m_tip">
    <div>
        <img class="m_icon m_normal" src="__ADMIN__/plugins/message_alert/img/tip.svg">
        <img class="m_icon m_error" src="__ADMIN__/plugins/message_alert/img/error.svg">
        <img class="m_icon m_success" src="__ADMIN__/plugins/message_alert/img/success.svg">
        <img class="m_icon m_warning" src="__ADMIN__/plugins/message_alert/img/warning.svg">
        <img class="m_icon m_loading" src="__ADMIN__/plugins/message_alert/img/loading.svg">
        <span>提示内容</span>
    </div>
    <img class="m_icon m_close" src="__ADMIN__/plugins/message_alert/img/close.svg" onclick=close_tip(this)>
</div>
<div class="page-container">
    <div class="page-content">
        <!-- START BREADCRUMB -->
       <!-- <ul class="breadcrumb push-down-0">
            <li><a href="#">Home</a></li>
            <li><a href="#">Layouts</a></li>
            <li class="active">Frame Right Column</li>
        </ul>-->
        <!-- END BREADCRUMB -->

        <!-- START CONTENT FRAME -->

            <!-- START CONTENT FRAME TOP -->
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span>数据库备份</h2>
                </div>
            <!-- END CONTENT FRAME TOP -->

            <div class="content-frame-body content-frame-body-left">
                
<div class="row animated fadeIn">
    <div class="row">
        <div class="col-md-8">
            <form id="export_more" method="post" action="<?php echo url('admin/Dblist/export_more'); ?>">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">数据库列表</h3>
                    <ul class="panel-controls">
                        <li><button type="submit" class="btn btn-info">选中表备份</button></li>
                    </ul>
                </div>
                <div class="panel-body tab-content">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th></th>
                                <th>table名</th>
                                <th>备注</th>
                                <th>创建时间</th>
                                <th>更新时间</th>
                                <th>字符集</th>
                                <th>引擎</th>
                                <th>单表备份</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($sql_list) || $sql_list instanceof \think\Collection || $sql_list instanceof \think\Paginator): $i = 0; $__LIST__ = $sql_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <td>
                                    <label class="check"><input type="checkbox" name="tables[]" class="icheckbox" value="<?php echo $v['name']; ?>" checked="checked"/></label>
                                </td>
                                <td><?php echo $v['name']; ?></td>
                                <td><?php echo $v['comment']; ?></td>
                                <td><?php echo $v['create_time']; ?></td>
                                <td><?php echo $v['update_time']; ?></td>
                                <td><?php echo $v['collation']; ?></td>
                                <td><?php echo $v['engine']; ?></td>
                                <td>
                                    <a data-url="<?php echo url('admin/Dblist/export_one',['table_name'=>$v['name']]); ?>" onclick="copy_sql(this)" class="btn btn-warning btn-xs">备份</a>
                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </form>
    </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">现有备份文件</h3>
                </div>
                <div class="panel-body tab-content">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>文件名</th>
                                <th>大小</th>
                                <th>备份时间</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($sql_file) || $sql_file instanceof \think\Collection || $sql_file instanceof \think\Paginator): $i = 0; $__LIST__ = $sql_file;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <tr class="del_tr">
                                <td><?php echo $v['filename']; ?></td>
                                <td><?php echo getFileSize($v['size']); ?></td>
                                <td><?php echo tranTime($v['ctime']); ?></td>
                                <td>
                                    <a title="下载该sql文件" href="<?php echo url('admin/Dblist/download',['fileName'=>$v['filename']]); ?>"  class="btn btn-default btn-rounded btn-sm" ><span class="fa fa-cloud-download"></span></a>
                                    <button title="执行该sql文件" data-url="<?php echo url('admin/Dblist/restore',['fileName'=>$v['filename']]); ?>" onClick="copy_sql(this);" class="btn btn-info btn-rounded btn-sm" ><span class="fa fa-retweet"></span></button>
                                    <button data-url="<?php echo url('admin/Dblist/del',['fileName'=>$v['filename']]); ?>" onClick="delete_row(this);" class="btn btn-danger btn-rounded btn-sm" ><span class="fa fa-trash-o"></span></button>
                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    //还原数据
    function restore(dom) {
        $.get($(dom).attr('data-url'),function (data) {
            if(data.code==1) {
                success2(data);
            }else{
                error(data)
            }
        })
    }
    //单个数据表的备份
    function copy_sql(dom) {
        $.ajax({
            type:'POST',
            url:$(dom).attr('data-url'),
            dataType:'JSON',
            beforeSend:function () {
                m_loading('请求响应中,请稍等^_^',{
                    time:-1
                });
            },
            success:function (res) {
                destory();
                if(res.code) {
                    m_success(res.msg,{
                        time:800
                    },function () {
                        window.location.href = res.url;
                    });

                }else{
                    m_error(res.msg);
                }
            }
        })
    }

    //导出多份数据库
    $('#export_more').ajaxForm({
        beforeSubmit: showRequest,
        success: showResponse
    });

    function showRequest() {
        m_loading('数据备份中,请稍等^_^',{
            time:-1
        });
    }

    function showResponse(res) {
        destory();
        if(res.code) {
            m_success(res.msg,{
                time:500
            },function () {
                window.location.href = res.url;
            });
        }else{
            m_error(res.msg);
        }
    }
</script>

            </div>
            <!-- START CONTENT FRAME BODY -->

            <!-- END CONTENT FRAME BODY -->
        <!-- END CONTENT FRAME -->
    </div>
</div>

</body>
</html>