/**
 * Created by Administrator on 2017/3/12.
 */
$(document).ready(function(){

    $("#zk").click(function() {
        console.log(1);
        if ($(this).text() == "展开") {
            $("#tree-checkmenu").children().find("ul").show();
            $(this).text("收起");
        }else{
            $("#tree-checkmenu").children().find("ul").hide();
            $(this).text("展开");
        }
    })
    $("#gb").click(function() {
        if ($(this).text() == "全选") {
            $("#tree-checkmenu").children().find("input").prop('checked', true);
            $(this).text("取消");
        }else{
            $("#tree-checkmenu").children().find("input").prop('checked', false);
            $(this).text("全选");
        }
    })
    $(".showtime li i").click(function () {
        if ($(this).next().next("ul").is(":hidden")) {
            $(this).next().next("ul").show();
            $(this).addClass("minus").removeClass("plus");
            return false;
        } else {
            $(this).next().next("ul").hide();
            $(this).addClass("plus").removeClass("minus");
            //不用toggle()的原因是为了在收缩菜单的时候同时也将该菜单的下级菜单以后的所有元素都隐藏

            $(this).next().next("ul").children("li").find("ul").fadeOut("normal");
            $(this).next().next("ul").children("li").find("i").addClass("plus").removeClass("minus");
            return false;
        }
    });
    $('input:checkbox').click(function() {
        if($(this).prop('checked') == true){
            console.log($(this).parent("li").children().find("input").prop('checked', true));
            $(this).parent("li").children().find("input").prop('checked', true);
            $(this).parent().parent().parent().children("input").prop('checked', true);
            $(this).parent().parent().parent().parent().parent().children("input").prop('checked', true);
            $(this).parent().parent().parent().parent().parent().parent().parent().children("input").prop('checked', true);
        }else{
            $(this).parent("li").find("input").prop('checked', false);
            return true;

        }
    });
})