<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:59:"/var/www/card.com/app/admin/view/alldata/all_data_page.html";i:1503979202;s:52:"/var/www/card.com/app/admin/view/public/content.html";i:1502609788;s:52:"/var/www/card.com/app/admin/view/public/head_in.html";i:1502609788;s:50:"/var/www/card.com/app/admin/view/public/alert.html";i:1502609788;}*/ ?>
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
                    <h2><span class="fa fa-arrow-circle-o-left"></span>数据统计</h2>
                </div>
            <!-- END CONTENT FRAME TOP -->

            <div class="content-frame-body content-frame-body-left">
                
    <div class="col-md-2">
        <!-- START WIDGET MESSAGES -->
        <div class="widget widget-danger widget-item-icon">
            <div class="widget-item-left">
                <span class="fa fa-users"></span>
            </div>
            <div class="widget-data">
                <div class="widget-int num-count"><?php echo $all_player; ?></div>
                <div class="widget-title">总玩家人数</div>
                <!--<div class="widget-subtitle">In your mailbox</div>-->
            </div>
        </div>
        <!-- END WIDGET MESSAGES -->
    </div>
    <div class="col-md-2">
        <!-- START WIDGET MESSAGES -->
        <div class="widget widget-default widget-item-icon">
            <div class="widget-item-left">
                <span class="fa fa-user"></span>
            </div>
            <div class="widget-data">
                <div id="online_player" class="widget-int num-count">加载中...</div>
                <div class="widget-title">在线人数</div>
                <div class="widget-subtitle"></div>
            </div>
        </div>
        <!-- END WIDGET MESSAGES -->
    </div>
    <div class="col-md-2">
        <!-- START WIDGET MESSAGES -->
        <div class="widget widget-primary widget-item-icon">
            <div class="widget-item-left">
                <span class="fa fa-home"></span>
            </div>
            <div class="widget-data">
                <div class="widget-int num-count"><?php echo $today_room_nums; ?></div>
                <div class="widget-title">当日房间数量</div>
                <!--<div class="widget-subtitle">In your mailbox</div>-->
            </div>
        </div>
        <!-- END WIDGET MESSAGES -->
    </div>
    <div class="col-md-2">
        <!-- START WIDGET MESSAGES -->
        <div class="widget widget-info widget-item-icon">
            <div class="widget-item-left">
                <span class="fa fa-usd"></span>
            </div>
            <div class="widget-data">
                <div class="widget-int num-count"><?php echo $now_week_pay; ?></div>
                <div class="widget-title">本周充值金额</div>
                <div class="widget-subtitle"></div>
            </div>
        </div>
        <!-- END WIDGET MESSAGES -->
    </div>
    <div class="col-md-2">
        <!-- START WIDGET MESSAGES -->
        <div class="widget widget-success widget-item-icon">
            <div class="widget-item-left">
                <span class="fa fa-envelope"></span>
            </div>
            <div class="widget-data">
                <div class="widget-int num-count"><?php echo $now_week_draw; ?></div>
                <div class="widget-title">本周提现金额</div>
                <div class="widget-subtitle"></div>
            </div>
        </div>
        <!-- END WIDGET MESSAGES -->
    </div>
    <div class="col-md-2">
        <!-- START WIDGET MESSAGES -->
        <div class="widget widget-warning widget-item-icon">
            <div class="widget-item-left">
                <span class="fa fa-money"></span>
            </div>
            <div class="widget-data">
                <div class="widget-int num-count"><?php echo $now_week_profile; ?></div>
                <div class="widget-title">平台总盈利</div>
                <div class="widget-subtitle"></div>
            </div>
        </div>
        <!-- END WIDGET MESSAGES -->
    </div>
<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading ui-draggable-handle">
            <div class="panel-title-box">
                <h3>每周房间数统计</h3>
                <span></span>
            </div>
            <ul class="panel-controls" style="margin-top: 2px;">
                <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
            </ul>
        </div>
        <div  class="panel-body padding-0">
            <div class="chart-holder" id="room" style="height: 320px;"></div>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading ui-draggable-handle">
            <div class="panel-title-box">
                <h3>每月提现</h3>
                <span></span>
            </div>
            <ul class="panel-controls" style="margin-top: 2px;">
                <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
            </ul>
        </div>
        <div class="panel-body padding-0">
            <div class="chart-holder" id="draw" style="height: 320px;"></div>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading ui-draggable-handle">
            <div class="panel-title-box">
                <h3>每月充值</h3>
                <span></span>
            </div>
            <ul class="panel-controls" style="margin-top: 2px;">
                <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
            </ul>
        </div>
        <div class="panel-body padding-0">
            <div class="chart-holder" id="pay" style="height: 320px;"></div>
        </div>
    </div>
</div>
<script type="text/javascript" src="__ADMIN__/js/plugins/morris/raphael-min.js"></script>
<script type="text/javascript" src="__ADMIN__/js/plugins/morris/morris.min.js"></script>
<script type="text/javascript">

    $.post('<?php echo url("admin/Alldata/data_chat"); ?>', function (res) {
        console.log(res);
        var per_week_room_nums = res.per_week_room_nums;
        console.log(per_week_room_nums);
        var per_month_draw = res.per_month_draw;
        var per_month_pay = res.per_month_pay;
        Morris.Line({
            element: 'draw',
            data: per_month_draw,
            xkey: 'month',
            ykeys: ['draw_money'],
            labels: ['Event'],
            resize: true,
            hideHover: true,
            xLabels: 'month',
            gridTextSize: '10px',
            lineColors: ['#33414E'],
            gridLineColor: '#E5E5E5'
        });

        Morris.Line({
            element: 'pay',
            data: per_month_pay,
            xkey: 'month',
            ykeys: ['pay_money'],
            labels: ['充值金额'],
            resize: true,
            hideHover: true,
            xLabels: 'month',
            gridTextSize: '10px',
            lineColors: ['#3FBAE4'],
            gridLineColor: '#E5E5E5'
        });

        Morris.Bar({
            element: 'room',
            data: per_week_room_nums,
            xkey: 'week',
            ykeys: ['room_nums'],
            labels: ['房间个数'],
            barColors: ['#3FBAE4'],
            gridTextSize: '10px',
            xLabels: 'week',
            hideHover: true,
            resize: true,
            gridLineColor: '#E5E5E5'
        });
    }, 'json');

    var name;
    var ws = new WebSocket('ws://card.dcwen.top:8282');
    ws.onopen = function () {
        name = 'admin';
    };
    ws.onmessage = function (e) {
        console.log(e);
        var data;
        var type;
        if (isJSON(e.data)) {
            data = JSON.parse(e.data);
            type = data.type;
        }

        switch (type) {
            case 'init':
                $.post('<?php echo url("admin/alldata/connect"); ?>', {
                    name: name,
                    client_id: data.client_id
                }, function (res) {
                    $('#online_player').html(res);
                })
                break;
            case 'change_online':
                $('#online_player').html(data.online_nums);
        }
    };

    function isJSON(str) {
        if (typeof str == 'string') {
            try {
                JSON.parse(str);
                return true;
            } catch(e) {
                console.log(e);
                return false;
            }
        }
        console.log('It is not a string!')
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