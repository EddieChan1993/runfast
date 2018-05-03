<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:85:"C:\Users\Administrator\Desktop\alphacms/app/admin\view\setting\plugins_edit_page.html";i:1501483893;s:74:"C:\Users\Administrator\Desktop\alphacms/app/admin\view\Public\head_in.html";i:1499053602;s:72:"C:\Users\Administrator\Desktop\alphacms/app/admin\view\Public\alert.html";i:1498813495;}*/ ?>
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
<form id="edit_form" action="<?php echo url('admin/Setting/edit_plugins_think'); ?>" method="post" class="form-horizontal">
    <input name="wid_id" type="hidden" value="<?php echo $wid_id; ?>">
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label class="col-xs-2 control-label">插件名称</label>
                    <div class="col-xs-8">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            <input name="wid_name" value="<?php echo $wid_name; ?>" type="text" class="form-control"/>
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">插件关键词</label>
                    <div class="col-xs-8">
                        <input name="wid_key" value="<?php echo $wid_key; ?>" type="text" class="form-control"/>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">参数</label>
                    <div class="col-xs-8">
                            <textarea name="wid_params"  class="form-control" rows="3"><?php echo $wid_params; ?></textarea>
                        <span class="help-block">例:appid:xxxxxxx|key:xxxxxxx</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">模块图标</label>
                    <div class="col-xs-8">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            <input name="wid_icon" value="<?php echo $wid_icon; ?>" type="text" class="form-control"/>
                        </div>
                        <span class="help-block">例:'fa fa-github-alt'</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">模块颜色</label>
                    <div class="col-xs-8">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            <input name="wid_color" value="<?php echo $wid_color; ?>" type="text" class="form-control"/>
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
</body>
</html>