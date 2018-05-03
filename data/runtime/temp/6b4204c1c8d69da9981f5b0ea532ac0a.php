<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"C:\Users\Administrator\Desktop\runfast/app/home\view\game\page.html";i:1501760768;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>阿斯顿</title>
</head>
<body>
<script type="text/javascript" src="__ADMIN__/js/plugins/jquery/jquery.min.js"></script>
<script>

    var ws = new WebSocket("ws://card.oumaikeji.com:8282");
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



    // 服务端主动推送消息时会触发这里的onmessage
    ws.onmessage = function(e){
        // json数据转换成js对象
        var data;
        var type;
        if(isJSON(e.data)){
            data = JSON.parse(e.data);
            type=data.type;
        }
        console.log(e);
        switch(type){
            // Events.php中返回的init类型的消息，将client_id发给后台进行uid绑定
            //当前客户初始化绑定
            case 'init':
                $.post('<?php echo url("home/Game/connect"); ?>',{
                    room_id:25,
                    client_id:data.client_id,
                    cid:"nyFVd",//KbEBh,nyFVd
                    type:"inner",
                },function(ret){
                },'json');
                break;
            case 'msg' :
                console.log(data);
                break;
        }
    };


</script>
</body>
</html>