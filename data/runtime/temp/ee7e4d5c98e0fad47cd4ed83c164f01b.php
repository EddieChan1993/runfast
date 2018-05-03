<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"C:\Users\Administrator\Desktop\alphacms/app/admin\view\cases\edit_page.html";i:1500016951;s:74:"C:\Users\Administrator\Desktop\alphacms/app/admin\view\Public\head_in.html";i:1499053602;s:72:"C:\Users\Administrator\Desktop\alphacms/app/admin\view\Public\alert.html";i:1498813495;}*/ ?>
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
    <form id="edit_form" method="post" action="<?php echo url('admin/cases/edit_think'); ?>" class="form-horizontal" role="form">
        <input type="hidden" value="<?php echo $case_id; ?>" name="case_id">
            <div class="panel-body">
                <div class="row">
                    <div class="form-group">
                        <label class="col-xs-3 control-label">缩略图</label>
                        <div class="col-xs-7">
                            <div class="gallery">
                                <a class="gallery-item"  href="javascript:void('')" title="Space picture 2" data-gallery>
                                    <div class="image" >
                                        <input hidden name="case_img" value="<?php echo $case_img; ?>" type="text" id="inp">
                                        <img src="<?php echo is_img($case_img); ?>" alt="Space picture 2"/>
                                        <ul class="gallery-item-controls">
                                            <li onclick="upload_single('inp','case')"><i class="fa fa-cloud-upload"></i></li>
                                            <li onclick="del_pic('inp')"><i class="fa fa-times"></i></li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">案例名称</label>
                        <div class="col-xs-7">
                            <input type="text"  name="case_name" class="form-control" value="<?php echo $case_name; ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">案例链接</label>
                        <div class="col-xs-7">
                            <input type="text" name="case_link" class="form-control" value="<?php echo $case_link; ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">开发结束时间</label>
                        <div class="col-xs-7">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                <input type="text" name="case_date" class="form-control datepicker" value="<?php echo date('Y-m-d',$case_date); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3  control-label">是否显示案例</label>
                        <div class="col-xs-7">
                            <label class="switch">
                                <input name="case_status" type="checkbox" checked value="1"/>
                                <span></span>
                            </label>
                            <span class="help-block">默认显示</span>
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