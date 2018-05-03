<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:54:"/var/www/card.com/app/admin/view/login/login_page.html";i:1502957082;s:50:"/var/www/card.com/app/admin/view/public/alert.html";i:1502609788;}*/ ?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
    <!-- META SECTION -->
    <title><?php echo get_options('site_name'); ?>|后台登录</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->
    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="__ADMIN__/css/theme-default.css"/>
    <!-- EOF CSS INCLUDE -->
    <!--<script src="http://static.geetest.com/static/tools/gt.js"></script>-->
    <script src="//captcha.luosimao.com/static/js/api.js"></script>
    <link rel="stylesheet" href="__ADMIN__/plugins/message_alert/css/m_css.css">
    <script src="__ADMIN__/plugins/message_alert/js/m_js.js"></script>
    <script type="text/javascript" src="__ADMIN__/js/jquery-2.2.4.min.js"></script>
    <script src="__ADMIN__/plugins/ajax-form/ajax-form.js"></script>
    <style>
        .login-container{
            background: url(<?php echo get_options('login_pic'); ?>);
            background-size: cover;
        }
        .login-container .login-box .login-logo {
            background: url(<?php echo get_options('site_logo'); ?>) top center no-repeat;
             background-size: 130px;

        }
        .login-container .login-box .login-body{
            background: #334163
        }
    </style>
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
<div class="login-container">

    <div class="login-box animated bounceInDown">
        <div  class="login-logo animated bounceIn"></div>
        <div  class="login-body ">
            <div class="login-title animated fadeIn"><strong>欢迎使用</strong>, 请登录</div>
            <form id="login_in_form" action="<?php echo url('admin/Login/login_in'); ?>" class="form-horizontal" method="post">
                <div class="form-group">
                    <div class="col-md-12">
                        <input name="username" type="text" class="form-control" placeholder="用户名"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input name="password" type="password" class="form-control" placeholder="密码"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="l-captcha" data-width='100%' data-site-key="<?php echo plugins_value('lsm_verify','site_key'); ?>"></div>
                        <!--<div id="embed-captcha"></div>-->
                        <!--<p id="wait" class="show">正在加载验证码......</p>-->
                        <!--<p id="notice" class="hide">请先完成验证</p>-->

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button id="embed-submit" class="btn btn-info btn-block">登陆</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="login-footer">
            <div class="pull-left">
            </div>
            <div class="pull-right animated bounceIn">
                &copy; 2017_<?php echo get_options('site_name'); ?>
            </div>
        </div>
    </div>
</div>
<script src="__PUBLIC__/admin/controller/login.js"></script>
</body>
</html>






