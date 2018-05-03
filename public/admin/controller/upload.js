/**
 * Created by Administrator on 2017/6/30.
 */
function getRootPath(){
    //获取当前网址，如： http://localhost:8083/uimcardprj/share/meun.jsp
    var curWwwPath=window.document.location.href;
    //获取主机地址之后的目录，如： uimcardprj/share/meun.jsp
    var pathName=window.document.location.pathname;
    var pos=curWwwPath.indexOf(pathName);
    //获取主机地址，如： http://localhost:8083
    var localhostPaht=curWwwPath.substring(0,pos);
    //获取带"/"的项目名，如：/uimcardprj
    // var projectName=pathName.substring(0,pathName.substr(1).indexOf('/')+1);
    return(localhostPaht);
}
var domain, img_url,url;
//山川单个图片
function upload_single(dom,path,type) {
    type=type||'img';
    domain = getRootPath();
    url = domain + '/admin/Upload/show_upload_sigle/dom/'+dom+'/type/'+type+'/path/'+path+'.html';

    layer.open({
        title:'单文件上传',
        type: 2,
        closeBtn: 0,
        shadeClose: true,
        area: '480px',
        content: url,
        success: function(layero, index) {
            layer.iframeAuto(index);
        }
    });
}

//删除图片或者文件
function del_pic(dom) {
    domain = getRootPath();
    img_url = $('#' + dom).val();
    if(img_url!='') {
        url = domain + '/admin/Upload/del_sigle_file.html';
        $.post(url,{
            file_path: img_url
        },function (res) {
            if(res.code) {
                m_success('删除图片成功',{
                    time:500
                },function () {
                    $('#' + dom).val('');
                    $('#' + dom).siblings('img').attr('src', res.msg);
                })
            }else{
                m_error(res.msg);
            }
        })
    }else{
        m_warning('尚未上传任何图片');
    }
}

