<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:55:"/eddftp/card/app/admin/view/player/round_info_page.html";i:1503039368;s:47:"/eddftp/card/app/admin/view/public/head_in.html";i:1502609788;s:45:"/eddftp/card/app/admin/view/public/alert.html";i:1502609788;}*/ ?>
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
<div class="animated fadeIn col-md-9">
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>局数</th>
                    <th>第一个出完牌的玩家</th>
                    <th>本局压的牌</th>
                    <th>本局开始时间</th>
                    <th>本局结束时间</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($round_info) || $round_info instanceof \think\Collection || $round_info instanceof \think\Paginator): $i = 0; $__LIST__ = $round_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr class="del_tr">
                    <td><?php echo $v['round_id']; ?></td>
                    <td><strong><?php echo get_player($v['card_over_player_id'],'name'); ?></strong></td>
                    <td><strong><?php echo get_card_info($v['press_card']); ?></strong></td>
                    <td><?php echo tranTime($v['round_start']); ?></td>
                    <td><?php echo tranTime($v['round_edd']); ?></td>
                    <td>
                        <button data-url="<?php echo url('admin/player/round_info',['round_id'=>$v['round_id'],'room_id'=>$v['room_id']]); ?>" title="查看<?php echo str_pad($v['room_id'],6,'0',STR_PAD_LEFT); ?>房间,第<?php echo $v['round_id']; ?>局详情" onClick="show_round(this);" class="btn btn-default btn-rounded btn-sm" ><span class="fa fa-search-plus"></span></button>
                        <button data-url="<?php echo url('admin/player/del_room_round',['relate_id'=>$v['relate_id']]); ?>" onClick="delete_row(this);" class="btn btn-danger btn-rounded btn-sm" ><span class="fa fa-trash-o"></span></button>
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
    function show_round(dom) {
        parent.layer.open({
            title:$(dom).attr('title'),
            type: 2,
            offset: '40px',
            closeBtn: 0,
            area:'869px',
            shadeClose: true,
            content: $(dom).attr('data-url'),
            success: function(layero, index) {
                parent.layer.iframeAuto(index);
            }
        });
    }
</script>
</body>
</html>