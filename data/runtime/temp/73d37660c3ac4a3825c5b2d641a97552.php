<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:71:"C:\Users\Administrator\Desktop\alphacms/app/admin\view\public\base.html";i:1501056918;s:75:"C:\Users\Administrator\Desktop\alphacms/app/admin\view\Public\head_out.html";i:1500022398;s:72:"C:\Users\Administrator\Desktop\alphacms/app/admin\view\Public\alert.html";i:1498813495;s:74:"C:\Users\Administrator\Desktop\alphacms/app/admin\view\Public\sidebar.html";i:1500691818;s:70:"C:\Users\Administrator\Desktop\alphacms/app/admin\view\Public\nav.html";i:1500615683;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META SECTION -->
    <title><?php echo get_options('site_name'); ?>|后台管理系统</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="<?php echo get_options('site_logo'); ?>__UPLOAD__/admin/common/logo.png" type="image/x-icon" />
<!-- END META SECTION -->
<!-- CSS INCLUDE -->
<link rel="stylesheet" type="text/css" id="theme" href="__ADMIN__/css/theme-default.css"/>
<link rel="stylesheet" href="__ADMIN__/plugins/message_alert/css/m_css.css">
<script src="__ADMIN__/plugins/message_alert/js/m_js.js"></script>
<!-- EOF CSS INCLUDE -->
<script type="text/javascript" src="__ADMIN__/js/plugins/jquery/jquery.min.js"></script>
<script src="__ADMIN__/plugins/layer-v3.0.1/layer/layer.js"></script>
<script src="__PUBLIC__/admin/controller/silder.js"></script>
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

     <style type="text/css">
         html, body{
             overflow: hidden;
        }
    </style>
</head>
<body>
<!-- START PAGE CONTAINER -->
<div class="animated fadeIn page-container page-navigation-top-fixed">
    <!-- START PAGE SIDEBAR -->
    <div class="page-sidebar mCustomScrollbar _mCS_1 mCS-autoHide mCS_no_scrollbar page-sidebar-fixed scroll">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation x-navigation-custom">
        <li class="xn-logo">
            <a href="#"><?php echo \think\Config::get('title'); ?></a>
            <a href="#" class="x-navigation-control"></a>
        </li>

        <li class="xn-profile">
            <div class="profile">
                    <img style="border-radius: 4px" width="200px" height="150px" src="<?php echo is_img($self['avatar']); ?>" alt="John Doe"/>
                <div class="profile-data">
                    <div class="profile-data-name"><?php echo $self['user_login']; ?></div>
                    <div style="margin-bottom: 3px" class="profile-data-title"><span class="label label-info"><?php echo $role_name; ?></span></div>
                    <div class="profile-data-title"><?php echo $self['user_email']; ?></div>
                </div>
            </div>
        </li>
        <?php if(is_array($menuAuth) || $menuAuth instanceof \think\Collection || $menuAuth instanceof \think\Paginator): if( count($menuAuth)==0 ) : echo "" ;else: foreach($menuAuth as $key=>$v): if(empty($v['child']) || (($v['child'] instanceof \think\Collection || $v['child'] instanceof \think\Paginator ) && $v['child']->isEmpty())): ?>
                <li  class="active_li">
                    <a href="#" data-url="<?php echo url($v['module'].'/'.$v['controller'].'/'.$v['method']); ?>" onclick="turn_url(this)"><span class="<?php echo $v['icon']; ?>"></span> <span class="xn-text"><?php echo $v['name']; ?></span></a>
                </li>
            <?php else: ?>
                <li class="xn-openable">
                    <a href="#"><span class="<?php echo $v['icon']; ?>"></span> <span class="xn-text"><?php echo $v['name']; ?></span></a>
                    <ul>
                        <?php if(is_array($v['child']) || $v['child'] instanceof \think\Collection || $v['child'] instanceof \think\Paginator): if( count($v['child'])==0 ) : echo "" ;else: foreach($v['child'] as $key=>$v1): if(empty($v1['child']) || (($v1['child'] instanceof \think\Collection || $v1['child'] instanceof \think\Paginator ) && $v1['child']->isEmpty())): ?>
                            <li class="active_li"><a href="#" data-url="<?php echo url($v1['module'].'/'.$v1['controller'].'/'.$v1['method']); ?>" onclick="turn_url(this)"><span class="<?php echo $v1['icon']; ?>"></span><?php echo $v1['name']; ?></a></li>
                           <?php else: ?>
                             <li><a href="#"><span class="<?php echo $v1['icon']; ?>"></span><?php echo $v1['name']; ?></a>
                                <ul>
                                    <?php if(is_array($v1['child']) || $v1['child'] instanceof \think\Collection || $v1['child'] instanceof \think\Paginator): if( count($v1['child'])==0 ) : echo "" ;else: foreach($v1['child'] as $key=>$v2): ?>
                                    <li  class="active_li"><a href="#" data-url="<?php echo url($v['module'].'/'.$v['controller'].'/'.$v['method']); ?>" onclick="turn_url(this)"><span class="<?php echo $v2['icon']; ?>"></span><?php echo $v2['name']; ?></a></li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                             </li>
                         <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <!-- END X-NAVIGATION -->
</div>
<script src="__PUBLIC__/admin/controller/silder.js"></script>
<script type="text/javascript">

</script>
    <!-- END PAGE SIDEBAR -->

    <!-- PAGE CONTENT -->
    <div class="page-content">
        <!-- START X-NAVIGATION VERTICAL -->
        <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
    <!-- TOGGLE NAVIGATION -->
    <li class="xn-icon-button">
        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
    </li>
    <!-- END TOGGLE NAVIGATION -->
    <!-- SEARCH -->
    <li class="xn-search">
        <form role="form">
            <input type="text" name="search" placeholder="Search..."/>
        </form>
    </li>
    <!-- END SEARCH -->
    <!-- SIGN OUT -->
    <li class="xn-icon-button pull-right">
        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
    </li>
    <!-- END SIGN OUT -->
    <!-- MESSAGES -->
    <li class="xn-icon-button pull-right">
        <a href="#" title="<?php echo $self['user_login']; ?>【编辑】" data-url="<?php echo url('admin/Admin/edit_page',['id'=>$self['id']]); ?>" onclick="edit_row(this)"><span class="fa fa-user"></span></a>
        <div class="informer informer-danger"><?php echo $self['user_hits']; ?></div>
    </li>
    <!--&lt;!&ndash; END MESSAGES &ndash;&gt;-->
    <!--&lt;!&ndash; TASKS &ndash;&gt;-->
    <!--<li class="xn-icon-button pull-right">-->
    <!--<a href="#"><span class="fa fa-tasks"></span></a>-->
    <!--<div class="informer informer-warning">3</div>-->
    <!--<div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">-->
    <!--<div class="panel-heading">-->
    <!--<h3 class="panel-title"><span class="fa fa-tasks"></span> Tasks</h3>-->
    <!--<div class="pull-right">-->
    <!--<span class="label label-warning">3 active</span>-->
    <!--</div>-->
    <!--</div>-->
    <!--<div class="panel-body list-group scroll" style="height: 200px;">-->
    <!--<a class="list-group-item" href="#">-->
    <!--<strong>Phasellus augue arcu, elementum</strong>-->
    <!--<div class="progress progress-small progress-striped active">-->
    <!--<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>-->
    <!--</div>-->
    <!--<small class="text-muted">John Doe, 25 Sep 2014 / 50%</small>-->
    <!--</a>-->

    <!--</div>-->
    <!--<div class="panel-footer text-center">-->
    <!--<a href="pages-tasks.html">Show all tasks</a>-->
    <!--</div>-->
    <!--</div>-->
    <!--</li>-->
    <!-- END TASKS -->
</ul>

        <!-- END X-NAVIGATION VERTICAL -->
        <iframe id="frame" width="100%" height="99%" src="<?php echo $url; ?>" frameborder="0"></iframe>
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
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
<!-- END MESSAGE BOX-->

<!-- START PRELOADS -->
<!--<audio id="audio-alert" src="__ADMIN__/audio/alert.mp3" preload="auto"></audio>-->
<!--<audio id="audio-fail" src="__ADMIN__/audio/fail.mp3" preload="auto"></audio>-->
<!-- END PRELOADS -->

<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="__ADMIN__/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="__ADMIN__/js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="__ADMIN__/js/plugins/bootstrap/bootstrap.min.js"></script>
<!-- END PLUGINS -->

<!-- THIS PAGE PLUGINS -->
<script type='text/javascript' src='__ADMIN__/js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="__ADMIN__/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
<!-- END PAGE PLUGINS -->

<!-- START TEMPLATE -->
<script type="text/javascript" src="__ADMIN__/js/plugins.js"></script>
<script type="text/javascript" src="__ADMIN__/js/actions.js"></script>
<!-- END TEMPLATE -->
<!-- END SCRIPTS -->
<script type="text/javascript">
    $.getJSON("<?php echo url('admin/Index/get_php_ext'); ?>",function (res) {
        if(res.code) {
            m_success(res.msg);
        }else{
            m_error(res.msg,{
                time:-1
            })
        }
    })
</script>
</body>
</html>






