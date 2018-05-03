<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:77:"C:\Users\Administrator\Desktop\alphacms/app/admin\view\setting\home_page.html";i:1500392568;s:74:"C:\Users\Administrator\Desktop\alphacms/app/admin\view\Public\content.html";i:1499229828;s:74:"C:\Users\Administrator\Desktop\alphacms/app/admin\view\Public\head_in.html";i:1499053602;s:72:"C:\Users\Administrator\Desktop\alphacms/app/admin\view\Public\alert.html";i:1498813495;}*/ ?>
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
                    <h2><span class="fa fa-arrow-circle-o-left"></span>站点配置</h2>
                </div>
            <!-- END CONTENT FRAME TOP -->

            <div class="content-frame-body content-frame-body-left">
                
<div class="row animated fadeIn">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">站点管理
                    </a></li>
                    <li><a href="#tab-second" role="tab" data-toggle="tab">SEO设置</a></li>
                </ul>
                <div class="panel-body tab-content">
                    <div class="tab-pane active" id="tab-first">
                        <form id="add_form1" action="<?php echo url('admin/Setting/save_sites'); ?>" method="post" class="form-horizontal">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">LOGO</label>
                                            <div class="col-md-9">
                                                <div class="gallery">
                                                    <a class="gallery-item"  href="javascript:void('')" title="Space picture 2" data-gallery>
                                                        <div class="image" >
                                                            <input hidden value="<?php echo $site_logo; ?>" name="option_value[site_logo]" type="text" id="inp">
                                                            <img src="<?php echo is_img($site_logo); ?>" alt="Space picture 2"/>
                                                            <ul class="gallery-item-controls">
                                                                <li onclick="upload_single('inp','logo')"><i class="fa fa-cloud-upload"></i></li>
                                                                <li onclick="del_pic('inp')"><i class="fa fa-times"></i></li>
                                                            </ul>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">站点名称</label>
                                            <div class="col-md-9">
                                                <input name="option_value[site_name]" value="<?php echo (isset($site_name) && ($site_name !== '')?$site_name:''); ?>" type="text" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">站点地址</label>
                                            <div class="col-md-9">
                                                <input name="option_value[site_addr]" value="<?php echo (isset($site_addr) && ($site_addr !== '')?$site_addr:''); ?>" type="text" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">邮政编码</label>
                                            <div class="col-md-9">
                                                <input name="option_value[site_admin_email]" value="<?php echo (isset($site_admin_email) && ($site_admin_email !== '')?$site_admin_email:''); ?>" type="text" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">电话联系方式</label>
                                            <div class="col-md-9">
                                                <input name="option_value[tel]" value="<?php echo (isset($tel) && ($tel !== '')?$tel:''); ?>" type="text" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">ICP备案号</label>
                                            <div class="col-md-9">
                                                <input name="option_value[icp]" value="<?php echo (isset($icp) && ($icp !== '')?$icp:''); ?>" type="text" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">版权信息</label>
                                            <div class="col-md-9">
                                                <textarea name="option_value[site_copyright]" class="form-control" rows="5"><?php echo (isset($site_copyright) && ($site_copyright !== '')?$site_copyright:''); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3  control-label">网站开启状态(默认开启)</label>
                                            <div class="col-md-9">
                                                <label class="switch">
                                                    <input name="is_close" <?php echo is_checked($is_close); ?> type="checkbox" value="1"/>
                                                    <span></span>
                                                </label>
                                                <span class="help-block">默认正常</span>
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
                    <div class="tab-pane" id="tab-second">
                        <form id="add_form2" action="<?php echo url('admin/Setting/save_seo'); ?>" method="post" class="form-horizontal">
                            <div class="panel-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">SEO标题</label>
                                        <div class="col-md-9">
                                            <input type="text" value="<?php echo (isset($seo_title) && ($seo_title !== '')?$seo_title:''); ?>" name="option_value[seo_title]" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">SEO关键字</label>
                                        <div class="col-md-9">
                                            <input name="option_value[seo_key]"
                                                   placeholder="添加关键词,以便被快速找到" value="<?php echo (isset($seo_key) && ($seo_key !== '')?$seo_key:''); ?>"
                                                   class="tagsinput" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">SEO描述</label>
                                        <div class="col-md-9">
                                            <textarea name="option_value[seo_remark]" class="form-control" rows="5"><?php echo (isset($seo_remark) && ($seo_remark !== '')?$seo_remark:''); ?></textarea>
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
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#add_form1').ajaxForm({
        beforeSubmit: showRequest,
        success: showResponse
    });
    $('#add_form2').ajaxForm({
        beforeSubmit: showRequest,
        success: showResponse
    });

    function showRequest() {
        m_loading('数据上传中,请稍等^_^',{
            time:-1
        });
    }

    function showResponse(res) {
        destory();
        if(res.code) {
            m_success(res.msg);
        }else{
            m_error(res.msg);
        }
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