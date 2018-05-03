/**
 * Created by EVE on 2017/6/28.
 */
/**
 * Created by Administrator on 2017/4/14 0014.
 */
$('#login_in_form').ajaxForm({
    beforeSubmit: showRequest,
    success: showResponse
});

function showRequest() {
    m_loading('用户验证中...',{
        time:-1
    })
}

function showResponse(res) {
    destory();
    if(res.code==1) {
        m_loading(res.msg,{
            time:500
        },function () {
            window.location.href = res.url;
        })
    }else{
        $('#embed-captcha').empty();
        // validate();
        LUOCAPTCHA.reset();
        m_error(res.msg,{
            time:1500
        });
    }
}
var handlerEmbed = function (captchaObj) {
    $("#embed-submit").click(function (e) {
        var validate = captchaObj.getValidate();
        if (!validate) {
            var data = "请先完成验证";
            m_warning(data);
            e.preventDefault();
        }
    });
    // 将验证码加到id为captcha的元素里，同时会有三个input的值：geetest_challenge, geetest_validate, geetest_seccode
    captchaObj.appendTo("#embed-captcha");
    captchaObj.onReady(function () {
        $("#wait")[0].className = "hide";
    });
    // 更多接口参考：http://www.geetest.com/install/sections/idx-client-sdk.html
};
// validate();
function validate() {
    $.ajax({
        // 获取id，challenge，success（是否启用failback）
        url: "../../addons/gt3-php-sdk-master/web/StartCaptchaServlet.php?t=" + (new Date()).getTime(), // 加随机数防止缓存
        type: "get",
        dataType: "json",
        success: function (data) {
            // 使用initGeetest接口
            // 参数1：配置参数
            // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
            initGeetest({
                gt: data.gt,
                challenge: data.challenge,
                new_captcha: data.new_captcha,
                product: "popup", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
                offline: !data.success,// 表示用户后台检测极验服务器是否宕机，一般不需要关注
                // 更多配置参数请参见：http://www.geetest.com/install/sections/idx-client-sdk.html#config
                width: '100%'
            }, handlerEmbed);
        }
    });
}