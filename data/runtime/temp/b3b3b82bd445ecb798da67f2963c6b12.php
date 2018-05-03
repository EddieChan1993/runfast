<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:48:"/var/www/card/app/admin/view/menu/home_page.html";i:1502609784;s:48:"/var/www/card/app/admin/view/public/content.html";i:1502609787;s:48:"/var/www/card/app/admin/view/public/head_in.html";i:1502609787;s:46:"/var/www/card/app/admin/view/public/alert.html";i:1502609787;}*/ ?>
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
                    <h2><span class="fa fa-arrow-circle-o-left"></span>后台菜单管理</h2>
                </div>
            <!-- END CONTENT FRAME TOP -->

            <div class="content-frame-body content-frame-body-left">
                
<div class="row animated fadeIn">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="<?php echo !empty($menuChild)?$menuChild:'active'; ?>"><a href="#tab-first" role="tab" data-toggle="tab">菜单列表
                        <button class="btn btn-success btn-rounded btn-sm"><?php echo $menu_nums; ?></button>
                    </a></li>
                    <li class="<?php if(!empty($menuChild)) echo 'active'; ?>"><a href="#tab-second" role="tab" data-toggle="tab">菜单添加</a></li>
                </ul>
                <div class="panel-body tab-content">
                    <div class="tab-pane <?php echo !empty($menuChild)?$menuChild:'active'; ?>" id="tab-first">
                        <table  class="demo1 table datatable table-hover">
                            <thead>
                            <tr>
                                <th>菜单名称</th>
                                <th>功能结构</th>
                                <!--<th>类型</th>-->
                                <th>状态</th>
                                <th>图标</th>
                                <th>排序</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $i = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <tr class="del_tr">
                                <td><?php echo $v['lefthtml']; ?><?php echo menu_type($v['name'],$v['type']); ?></td>
                                <td>@<?php echo $v['module']; ?>/<?php echo $v['controller']; ?>/<?php echo $v['method']; ?></td>
                                <td><?php echo is_stop($v['status']); ?></td>
                                <td><i class="<?php echo $v['icon']; ?>"></i></td>
                                <td><input onchange="change_order(this)" style="width: 70px" type="number" class="order_change form-control" data-url="<?php echo url('admin/menu/update_order'); ?>" pk-id="<?php echo $v['id']; ?>" value="<?php echo $v['listorder']; ?>"></td>
                                <td>
                                    <a href="<?php echo url('admin/Menu/home_page',['menu_id'=>$v['id']]); ?>" class="btn btn-primary btn-rounded btn-sm"><span class="fa fa-plus"></span></a>
                                    <a title="<?php echo $v['name']; ?>【编辑】" data-url="<?php echo url('admin/Menu/edit_page',['menu_id'=>$v['id']]); ?>" onclick="edit_row(this)" class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></a>
                                    <button onClick="delete_row(this);" data-url="<?php echo url('admin/menu/del_think',['id'=>$v['id']]); ?>" class="btn btn-danger btn-rounded btn-sm" ><span class="fa fa-trash-o"></span></button>
                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane <?php if(!empty($menuChild)) echo 'active'; ?>" id="tab-second">
                        <form id="add_form" action="<?php echo url('admin/menu/add_think'); ?>" method="post" class="form-horizontal">
                            <div class="alert alert-info" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>温馨提醒!</strong> 如果添加菜单没有控制器、方法,统一填写<span class="label label-default">default</span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">父级菜单</label>
                                            <div class="col-md-9">
                                                <select name="parentid" class="form-control select">
                                                    <option  value="">作为父级</option>
                                                    <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $i = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if(!(empty($menuChild) || (($menuChild instanceof \think\Collection || $menuChild instanceof \think\Paginator ) && $menuChild->isEmpty()))): ?>
                                                        <option <?php echo is_selected($menuChild,$v['id']); ?> value="<?php echo $v['id']; ?>"><?php echo $v['lefthtml']; ?><?php echo $v['name']; ?></option>
                                                     <?php else: ?>
                                                         <option  value="<?php echo $v['id']; ?>"><?php echo $v['lefthtml']; ?><?php echo $v['name']; ?></option>
                                                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">菜单名称</label>
                                            <div class="col-md-9">
                                                <input name="name" type="text" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">@模块/控制器/方法</label>
                                            <div class="col-md-3">
                                               <input name="module" type="text" value="admin" class="form-control"/>
                                            </div>
                                            <div class="col-md-3">
                                                <select name="controller" class="form-control select">
                                                    <option  value="Default">Default</option>
                                                    <?php if(is_array($controller) || $controller instanceof \think\Collection || $controller instanceof \think\Paginator): $i = 0; $__LIST__ = $controller;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                                    <option value="<?php echo basename($v['filename'],'.php'); ?>"><?php echo basename($v['filename'],'.php'); ?></option>
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <input name="method" type="text" value="" class="form-control"/>
                                                <span class="help-block">默认填default</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3 control-label">菜单徽标</div>
                                            <div class="col-md-9">
                                                <input name="icon" type="text" class="form-control"/>
                                                <span class="help-block">格式:fa fa-users</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">备注</label>
                                            <div class="col-md-9 col-xs-12">
                                                <textarea name="remark" class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">菜单类型</label>
                                            <div class="col-md-9">
                                                <select name="type" class="form-control select">
                                                    <option value="0">菜单</option>
                                                    <option value="1">权限认证</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3  control-label">菜单状态</label>
                                            <div class="col-md-9">
                                                <label class="switch">
                                                    <input name="status" type="checkbox" checked value="1"/>
                                                    <span></span>
                                                </label>
                                                <span class="help-block">默认正常</span>
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
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.demo1').dataTable({
        order:[]
    });
    function change_order(dom) {
        $.post($(dom).attr('data-url'),{
            id:$(dom).attr('pk-id'),
            listorder:$(dom).val()
        },function (res) {
            destory();
            if(res.code){
                m_success(res.msg)
            }else{
                m_error(res.msg)
            }
        })
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