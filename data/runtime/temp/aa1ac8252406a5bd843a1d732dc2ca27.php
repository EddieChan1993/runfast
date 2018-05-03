<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"D:\code\alipay_tp5.0\alphacms-v1.7/app/admin\view\upload\upload_sigle.html";i:1500393631;s:69:"D:\code\alipay_tp5.0\alphacms-v1.7/app/admin\view\Public\head_in.html";i:1499053602;s:67:"D:\code\alipay_tp5.0\alphacms-v1.7/app/admin\view\Public\alert.html";i:1498813495;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Page form example - Fileuploader</title>
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

    <!-- styles -->
    <link href="__ADMIN__/plugins/edd-upload-sdk/src/jquery.fileuploader.css" media="all" rel="stylesheet">
    <link href="__ADMIN__/plugins/edd-upload-sdk/examples/single_file/css/jquery.fileuploader-theme-thumbnails.css" media="all" rel="stylesheet">
    <!-- js -->
    <script src="__ADMIN__/plugins/edd-upload-sdk/src/jquery.fileuploader.min.js" type="text/javascript"></script>
    <script src="__ADMIN__/plugins/edd-upload-sdk/examples/single_file/js/custom.js" type="text/javascript"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            line-height: normal;
            color: #47525d;
            background-color: #fff;

            margin: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        form {
            padding: 15px;
            background: #f5f6fA;
        }

        label {
            font-weight: bold;
            display: block;
        }

        input[type="text"],
        input[type="email"] {
            padding: 6px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<form action="<?php echo url('admin/upload/upload_sigle'); ?>" method="post" enctype="multipart/form-res">
    <input type="text" value="<?php echo $path; ?>" hidden name="path">
    <input type="file" name="files">
    <div class="col-xs-3">
        <label title="是否压缩(默认是),压缩比:<?php echo \think\Config::get('img_px'); ?>px <?php echo \think\Config::get('img_px'); ?>px" class="switch">
            <input name="is_zip" type="checkbox" checked value="true"/>
            <span></span>
        </label>
    </div>
    <div class="col-xs-9">
        <button class="btn btn-info btn-block" type="submit">上传</button>
    </div>
</form>
<script src="__ADMIN__/plugins/edd-upload-sdk/ajaxForm.js" crossorigin="anonymous"></script>
<script type="text/javascript">
    var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
    var type = "<?php echo $type; ?>";//文件类型
    var src = '';

    $('form').ajaxForm({
        beforeSubmit: showRequest,
        success:showResponse2
    });
    function showRequest() {
        m_loading('图片上传中,请稍后...',{
            time:-1
        })
    }
    function showResponse2(res) {
        destory();
        if (res.code) {
            m_success('图片上传成功^_^', {
                time: 500,
            },function () {
                parent.$('#<?php echo $dom; ?>').val(res.msg);
                if(type=='file') {
                    //如果是文档
                    src = '__UPLOAD__/admin/common/file.png';
                }else{
                    //如果是图片
                    src = res.msg;
                }
                parent.$('#<?php echo $dom; ?>').siblings('img').attr('src', src);
                parent.layer.close(index);
            })
        } else {
            m_error(res.msg);
        }
    }
</script>
</body>
</html>