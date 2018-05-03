<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"D:\code\alipay_tp5.0\alphacms-v1.7/app/admin\view\menu\edit_page.html";i:1500392874;s:69:"D:\code\alipay_tp5.0\alphacms-v1.7/app/admin\view\Public\head_in.html";i:1499053602;s:67:"D:\code\alipay_tp5.0\alphacms-v1.7/app/admin\view\Public\alert.html";i:1498813495;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
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
<div class="panel panel-default">
    <form id="edit_form" method="post" action="<?php echo url('admin/Menu/edit_think'); ?>" class="form-horizontal" role="form">
        <input type="hidden" value="<?php echo $id; ?>" name="id">
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-11">
                    <div class="form-group">
                        <label class="col-xs-3 control-label">父级菜单</label>
                        <div class="col-xs-9">
                            <select name="parentid" class="form-control select">
                                <option  value="">作为父级</option>
                                <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $i = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <option <?php echo is_selected($parentid,$v['id']); ?> value="<?php echo $v['id']; ?>"><?php echo $v['lefthtml']; ?><?php echo $v['name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">菜单名称</label>
                        <div class="col-xs-9">
                            <input name="name" value="<?php echo $name; ?>" type="text" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">@模块/控制器/方法</label>
                        <div class="col-xs-3">
                            <input name="module" type="text" value="admin" class="form-control"/>
                        </div>
                        <div class="col-xs-3">
                            <select name="controller" class="form-control select">
                                <option <?php echo is_selected($controller,'Default'); ?> value="Default">Default</option>
                                <?php if(is_array($cont) || $cont instanceof \think\Collection || $cont instanceof \think\Paginator): $i = 0; $__LIST__ = $cont;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <option <?php echo is_selected($controller,basename($v['filename'],'.php')); ?> value="<?php echo basename($v['filename'],'.php'); ?>"><?php echo basename($v['filename'],'.php'); ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <input value="<?php echo $method; ?>" name="method" type="text" value="" class="form-control"/>
                            <span class="help-block">默认填default</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-3 control-label">菜单徽标</div>
                        <div class="col-xs-9">
                            <input value="<?php echo $icon; ?>" name="icon" type="text" class="form-control"/>
                            <span class="help-block">格式:fa fa-users</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">备注</label>
                        <div class="col-xs-9 col-xs-12">
                            <textarea name="remark" class="form-control" rows="5"><?php echo $remark; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">菜单类型</label>
                        <div class="col-xs-9">
                            <select name="type" class="form-control select">
                                <option <?php echo is_selected($type,0); ?> value="0">菜单</option>
                                <option <?php echo is_selected($type,1); ?> value="1">权限认证</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3  control-label">菜单状态</label>
                        <div class="col-xs-9">
                            <label class="switch">
                                <input name="status" type="checkbox" <?php echo is_checked($status); ?> value="1"/>
                                <span></span>
                            </label>
                            <span class="help-block">默认正常</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-info pull-right">保存修改<span class="fa fa-floppy-o fa-right"></span></button>
        </div>
    </form>
</div>
</body>
</html>