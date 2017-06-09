/**
 * Created by ASUS-PC on 2015/7/30.
 */
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});
    function setTab(name,cursel,n){
        for(i=1;i<=n;i++){
            var menu=document.getElementById(name+i);
            var con=document.getElementById("con_"+name+"_"+i);
            menu.className=i==cursel?"hover":"";
            con.style.display=i==cursel?"block":"none";
        }
    }
$(document).ready(function(){

    //设计一段比较流行的滑动样式
    $('#drop_zone_home').hover(function(){
        $(this).children('p').stop().animate({top:'0px'},200);
    },function(){
        $(this).children('p').stop().animate({top:'-25px'},200);
    });


    //要想实现拖拽，首页需要阻止浏览器默认行为，一个四个事件。
    $(document).on({
        dragleave:function(e){		//拖离
            e.preventDefault();
            $('.dashboard_target_box').removeClass('over');
        },
        drop:function(e){			//拖后放
            e.preventDefault();
        },
        dragenter:function(e){		//拖进
            e.preventDefault();
            $('.dashboard_target_box').addClass('over');
        },
        dragover:function(e){		//拖来拖去
            e.preventDefault();
            $('.dashboard_target_box').addClass('over');
        }
    });

    //================上传的实现
    var box = document.getElementById('target_box'); //获得到框体

    box.addEventListener("drop",function(e){

        e.preventDefault(); //取消默认浏览器拖拽效果

        var fileList = e.dataTransfer.files; //获取文件对象
        //fileList.length 用来获取文件的长度（其实是获得文件数量）

        //检测是否是拖拽文件到页面的操作
        if(fileList.length == 0){
            $('.dashboard_target_box').removeClass('over');
            return;
        }
        //检测文件是不是图片
        if(fileList[0].type.indexOf('image') === -1){
            $('.dashboard_target_box').removeClass('over');
            return;
        }

        //var img = window.webkitURL.createObjectURL(fileList[0]);
        //拖拉图片到浏览器，可以实现预览功能

        xhr = new XMLHttpRequest();
        xhr.open("post", "test.php", true);
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

        var fd = new FormData();
        fd.append('ff', fileList[0]);

        xhr.send(fd);


    },false);

});
