<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:55:"/var/www/card.com/app/admin/view/profile/home_page.html";i:1502609788;s:52:"/var/www/card.com/app/admin/view/public/content.html";i:1502609788;s:52:"/var/www/card.com/app/admin/view/public/head_in.html";i:1502609788;s:50:"/var/www/card.com/app/admin/view/public/alert.html";i:1502609788;}*/ ?>
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
                    <h2><span class="fa fa-arrow-circle-o-left"></span>下线返利记录</h2>
                </div>
            <!-- END CONTENT FRAME TOP -->

            <div class="content-frame-body content-frame-body-left">
                
<div class="animated fadeIn col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">下线返利列表</h3>
            <ul class="panel-controls">
                <label class="label label-info"><?php echo $profileNums; ?></label>
            </ul>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>返利ID</th>
                    <th>获利代理</th>
                    <th>代理当前余额</th>
                    <th>返利金额</th>
                    <th>返利时间</th>
                    <th>返利玩家姓名</th>
                    <th>玩家充值金额</th>
                    <th>该笔返利比例%</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($profileList) || $profileList instanceof \think\Collection || $profileList instanceof \think\Paginator): $i = 0; $__LIST__ = $profileList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr class="del_tr">
                    <td><strong><?php echo $v['profile_id']; ?></strong></td>
                    <td><span class="label label-warning"><?php echo get_agency($v['user_id'],'user_login'); ?></span></td>
                    <td><strong><?php echo get_money($v['user_id']); ?></strong></td>
                    <td><strong><?php echo $v['money']; ?></strong></td>
                    <td><?php echo tranTime($v['date']); ?></td>
                    <td><span class="label label-info"><?php echo get_player($v['from_player_id'],'name'); ?></span></td>
                    <td><strong><?php echo get_order($v['pay_log_id'],'pay_money'); ?></strong></td>
                    <td><strong><?php echo $v['percent']*100; ?>%</strong></td>
                    <td>
                        <button data-url="<?php echo url('admin/profile/del_think',['profile_id'=>$v['profile_id']]); ?>" onClick="delete_row(this);" class="btn btn-danger btn-rounded btn-sm" ><span class="fa fa-trash-o"></span></button>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
           <?php echo $pages; ?>
        </div>
    </div>
</div>
<script type="text/javascript">

</script>

            </div>
            <!-- START CONTENT FRAME BODY -->

            <!-- END CONTENT FRAME BODY -->
        <!-- END CONTENT FRAME -->
    </div>
</div>

</body>
</html>