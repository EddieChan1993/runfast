<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:54:"/var/www/card/app/admin/view/setting/plugins_home.html";i:1502609789;s:48:"/var/www/card/app/admin/view/public/content.html";i:1502609787;s:48:"/var/www/card/app/admin/view/public/head_in.html";i:1502609787;s:46:"/var/www/card/app/admin/view/public/alert.html";i:1502609787;}*/ ?>
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
                    <h2><span class="fa fa-arrow-circle-o-left"></span>插件库</h2>
                </div>
            <!-- END CONTENT FRAME TOP -->

            <div class="content-frame-body content-frame-body-left">
                
<div class="row animated fadeIn">
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-default tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">插件列表
                        <button class="btn btn-success btn-rounded btn-sm"><?php echo $widgetsNums; ?></button>
                    </a></li>
                    <li><a href="#tab-second" role="tab" data-toggle="tab">添加插件模块</a></li>
                </ul>
                <div class="panel-body tab-content">
                    <div class="tab-pane active" id="tab-first">
                        <?php if(is_array($widget) || $widget instanceof \think\Collection || $widget instanceof \think\Paginator): $i = 0; $__LIST__ = $widget;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <div class="col-md-12">
                            <div class="widget widget-<?php echo $v['wid_color']; ?> widget-item-icon">
                                <div title="<?php echo $v['wid_name']; ?>【编辑】" data-url="<?php echo url('admin/Setting/edit_plugins_page',['wid_id'=>$v['wid_id']]); ?>" onclick="edit_row(this)"  class="widget-item-left">
                                    <span class="<?php echo $v['wid_icon']; ?>"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo $v['wid_name']; ?>|<?php echo $v['wid_key']; ?></div>
                                    <?php $_599114544bdd1=get_param_arr($v['wid_params']); if(is_array($_599114544bdd1) || $_599114544bdd1 instanceof \think\Collection || $_599114544bdd1 instanceof \think\Paginator): if( count($_599114544bdd1)==0 ) : echo "" ;else: foreach($_599114544bdd1 as $key=>$k): ?>
                                    <div class="widget-subtitle"><?php echo $k; ?></div>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                                <div class="widget-controls">
                                    <a href="javascript:void();" data-url="<?php echo url('admin/Setting/del_plugins_think',['wid_id'=>$v['wid_id']]); ?>" onclick="del_wid(this)" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="删除模块"><span class="fa fa-times"></span></a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <div class="tab-pane" id="tab-second">
                        <form id="add_form" action="<?php echo url('admin/Setting/add_plugins_think'); ?>" method="post" class="form-horizontal">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">插件名称</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input name="wid_name" type="text" class="form-control"/>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">插件关键词</label>
                                            <div class="col-md-8">
                                                <input name="wid_key" type="text" class="form-control"/>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">参数</label>
                                            <div class="col-md-8">
                                                    <textarea name="wid_params" rows="3" class="form-control"></textarea>
                                                <span class="help-block">例:appid:xxxxxxx|key:xxxxxxx</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">模块图标</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input name="wid_icon" type="text" class="form-control"/>
                                                </div>
                                                <span class="help-block">例:'fa fa-github-alt'</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">模块颜色</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input name="wid_color" type="text" class="form-control"/>
                                                </div>
                                                <span class="help-block">例:'success,primary...'</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-info pull-right">保存添加<span class="fa fa-floppy-o fa-right"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function del_wid(dom) {
        layer.confirm('是否删除该条数据？', {
            btn: ['确认', '取消'],//按钮
            icon: 2
        }, function (index) {
            $.post($(dom).attr('data-url'), function (res) {
                destory();
                if (res.code) {
                    m_success(res.msg);
                    $(dom).parents(".widget").fadeOut(400, function () {
                        $(dom).remove();
                        $(this).remove();
                    });
                } else {
                    m_error(res.msg);
                }
                layer.close(index);

            })
        }, function () {
            m_warning('您已取消该操作');
        });
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