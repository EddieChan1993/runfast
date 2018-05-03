<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:48:"/var/www/card/app/admin/view/role/edit_page.html";i:1502609788;s:48:"/var/www/card/app/admin/view/public/head_in.html";i:1502609787;s:46:"/var/www/card/app/admin/view/public/alert.html";i:1502609787;}*/ ?>
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

    <link rel="stylesheet" type="text/css" href="__ADMIN__/plugins/check-tree/checktree.css" />
    <script type="text/javascript" src="__ADMIN__/plugins/check-tree/tree.js"></script>
</head>
<body>
<div class="panel panel-default">
    <form id="edit_form" action="<?php echo url('admin/Role/edit_think'); ?>" method="post" class="form-horizontal">
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-5">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label class="col-xs-3 control-label">角色名称</label>
                        <div class="col-xs-9">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" value="<?php echo $name; ?>" name="name" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">该角色首页</label>
                        <div class="col-xs-9">
                            <select name="nav_list" class="form-control select">
                                <?php if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <option <?php echo is_selected($nav_list,$v['nav_list']); ?> value="<?php echo $v['nav_list']; ?>"><?php echo $v['lefthtml']; ?><?php echo $v['name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">备注</label>
                        <div class="col-xs-9 col-xs-12">
                            <textarea class="form-control" name="remark" rows="5"><?php echo $remark; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3  control-label">是否通过</label>
                        <div class="col-xs-9">
                            <label class="switch">
                                <input type="checkbox" name="status" <?php echo is_checked($status); ?> value="1"/>
                                <span class="help-block"></span>
                            </label>
                            <span class="help-block">默认正常</span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-5">
                    <div class="form-group">
                        <div class="col-md-3">
                            <div class="btn-group">
                                <a id="zk" class="btn btn-info">展开</a>
                                <a id="gb" class="btn btn-default">全选</a>
                            </div>
                        </div>
                        <div class="col-xs-9">
                            <ul id="tree-checkmenu" class="checktree showtime" style="display:block">
                                <?php if(is_array($menuList) || $menuList instanceof \think\Collection || $menuList instanceof \think\Paginator): if( count($menuList)==0 ) : echo "" ;else: foreach($menuList as $k=>$v): ?>
                                <li id="show-explorer<?php echo $k; ?>" class="plus">
                                    <i id="bjgl" class="plus"></i>
                                    <input <?php if(in_array(($v['id']), is_array($rules)?$rules:explode(',',$rules))): ?>checked<?php endif; ?> id="check-explorer<?php echo $k; ?>" name="rules[]" value="<?php echo $v['id']; ?>" type="checkbox" /><?php echo $v['name']; ?>
                                    <ul id="tree-explorer<?php echo $k; ?>" class="showtime">
                                        <?php if(is_array($v['child']) || $v['child'] instanceof \think\Collection || $v['child'] instanceof \think\Paginator): if( count($v['child'])==0 ) : echo "" ;else: foreach($v['child'] as $k1=>$v1): ?>
                                        <li id="show-iemac<?php echo $k; ?><?php echo $k1; ?>">
                                            <i id="bjgl" class="plus"></i>
                                            <input <?php if(in_array(($v1['id']), is_array($rules)?$rules:explode(',',$rules))): ?>checked<?php endif; ?> id="check-iemac<?php echo $k; ?><?php echo $k1; ?>" name="rules[]" value="<?php echo $v1['id']; ?>" type="checkbox" /><?php echo $v1['name']; ?>
                                            <ul id="tree-iemac<?php echo $k; ?><?php echo $k1; ?>" class="showtime">
                                                <?php if(is_array($v1['child']) || $v1['child'] instanceof \think\Collection || $v1['child'] instanceof \think\Paginator): if( count($v1['child'])==0 ) : echo "" ;else: foreach($v1['child'] as $k2=>$v2): ?>
                                                <li>
                                                    <i id="bjgl" class="plus"></i>
                                                    <input <?php if(in_array(($v2['id']), is_array($rules)?$rules:explode(',',$rules))): ?>checked<?php endif; ?>  name="rules[]" value="<?php echo $v2['id']; ?>" type="checkbox" /><?php echo $v2['name']; ?>
                                                    <ul class="showtime">
                                                        <?php if(is_array($v2['child']) || $v2['child'] instanceof \think\Collection || $v2['child'] instanceof \think\Paginator): if( count($v2['child'])==0 ) : echo "" ;else: foreach($v2['child'] as $k3=>$v3): ?>
                                                        <i id="bjgl" class="plus"></i>
                                                        <li><input <?php if(in_array(($v3['id']), is_array($rules)?$rules:explode(',',$rules))): ?>checked<?php endif; ?>  name="rules[]" value="<?php echo $v3['id']; ?>" type="checkbox" /><?php echo $v3['name']; ?></li>
                                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </ul>
                                                </li>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </ul>
                                        </li>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </ul>
                                </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
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