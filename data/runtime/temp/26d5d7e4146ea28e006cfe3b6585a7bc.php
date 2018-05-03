<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"C:\Users\Administrator\Desktop\runfast/app/admin\view\posts\edit_page_posts.html";i:1501489612;s:73:"C:\Users\Administrator\Desktop\runfast/app/admin\view\Public\head_in.html";i:1499053602;s:71:"C:\Users\Administrator\Desktop\runfast/app/admin\view\Public\alert.html";i:1498813495;}*/ ?>
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
    <script type="text/javascript" src="__ADMIN__/js/plugins/summernote/summernote.js"></script>
</head>
<body>
<div class="panel panel-default">
    <form id="edit_form" action="<?php echo url('admin/Posts/edit_think_posts'); ?>" method="post" class="form-horizontal">
        <div class="panel-body">
            <div class="row">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="col-xs-11">
                    <!--<div class="form-group">-->
                        <!--<label class="col-xs-2 control-label">缩略图</label>-->
                        <!--<div class="col-xs-3">-->
                            <!--<div class="gallery">-->
                                <!--<a class="gallery-item"  href="javascript:void('')" title="Space picture 2" data-gallery>-->
                                    <!--<div class="image" >-->
                                        <!--<input name="smeta[thumb]" value="<?php echo getAttr($smeta,'thumb'); ?>" hidden type="text" id="inp">-->
                                        <!--<img src="<?php echo is_img(getAttr($smeta,'thumb')); ?>" alt="Space picture 2"/>-->
                                        <!--<ul class="gallery-item-controls">-->
                                            <!--<li onclick="upload_single('inp','posts')"><i class="fa fa-cloud-upload"></i></li>-->
                                            <!--<li onclick="del_pic('inp')"><i class="fa fa-times"></i></li>-->
                                        <!--</ul>-->
                                    <!--</div>-->
                                <!--</a>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>-->
                    <div class="form-group">
                        <label class="col-xs-2 control-label">上级</label>
                        <div class="col-xs-10">
                            <select multiple name="smeta[term_relation][]" class="form-control select">
                                <?php if(is_array($termsList) || $termsList instanceof \think\Collection || $termsList instanceof \think\Paginator): $i = 0; $__LIST__ = $termsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <option <?php echo post_term($id,$v['term_id']); ?> value="<?php echo $v['term_id']; ?>"><?php echo $v['lefthtml']; ?><?php echo $v['name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">文章标题</label>
                        <div class="col-xs-10">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" value="<?php echo $post_title; ?>" name="post_title" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">文章内容</label>
                        <div class="col-xs-10 col-xs-12">
                            <textarea class="form-control" name="post_excerpt" rows="5"><?php echo $post_excerpt; ?></textarea>
                        </div>
                    </div>
                    <!--<div class="form-group">-->
                        <!--<label class="col-xs-2 control-label"></label>-->
                        <!--<div class="col-xs-10 col-xs-12">-->
                            <!--<textarea name="post_content" class="summernote"><?php echo $post_content; ?></textarea>-->
                        <!--</div>-->
                    <!--</div>-->
                    <div class="form-group">
                        <label class="col-xs-2  control-label">是否通过</label>
                        <div class="col-xs-10">
                            <label class="switch">
                                <input type="checkbox" name="post_status" <?php echo is_checked($post_status); ?> value="1"/>
                                <span class="help-block"></span>
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
</body>
</html>