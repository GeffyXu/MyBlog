<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta charset="utf-8">
    <title>I♡Fangling</title>
    <meta name="keywords" content="个人博客模板,博客模板" />
    <meta name="description" content="寻梦主题的个人博客模板，优雅、稳重、大气,低调。" />
    <link href="/pblog/Public/css/base.css" rel="stylesheet">
    <link href="/pblog/Public/css/guestbook.css" rel="stylesheet">
    <link href="/pblog/Public/css/index.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/pblog/Public/js/modernizr.js"></script>
    <script src="/pblog/Public/js/guestbook.js"></script>
    <script src="/pblog/Public/js/jquery-1.4.min.js"></script>
    <![endif]-->
</head>

<!---body--->
<body>
<!---->
<header>
    <div id="logo"><a href="<?php echo U('L_RNA_scaffolder_1');?>"></a></div>
    <nav class="topnav" id="topnav"><a href="<?php echo U('L_RNA_scaffolder_1');?>"><span>首页</span><span class="en">Protal</span></a><a href="<?php echo U('about');?>"><span>关于我</span><span class="en">Me</span></a><a href="<?php echo U('her');?>"><span>关于她</span><span class="en">Her</span></a><a href="<?php echo U('enjoy');?>"><span>音影诗书</span><span class="en">Enjoy</span></a><a href="<?php echo U('share');?>"><span>资源分享</span><span class="en">Share</span></a><a href="<?php echo U('friends');?>"><span>嗨青春啊</span><span class="en">Friends</span></a><a href="<?php echo U('guestbook');?>"><span>留言版</span><span class="en">Gustbook</span></a><span>&nbsp;&nbsp;&nbsp;</span>
        <span><a href="<?php echo ($logpage); ?>" id="logon"><?php echo ($log); ?></a><?php echo ($or); ?><a href="<?php echo ($regpage); ?>"  id="logon"><?php echo ($reg); ?></a></span>
    </nav>
    </nav>
</header>

<div id="contentMain">
    <div id="contextBg">
        <div class="contextBgItem contextBgItemRight">
            <h3 class="CbiTitle"> 留言板 </h3>
            <div id="Demo" style="text-align:center;">
                <div class="Main">
                    <form action="<?php echo U('Index/comment');?>" method="post">
                    <div class="Input_Box">
                        <textarea class="Input_text" name="content"></textarea>
                        <div class="faceDiv"> </div>
                        <div class="Input_Foot"> <a class="imgBtn" href="javascript:void(0);"></a><button class="postBtn" type="submit">留言</button> </div>
                    </div>
                    </form>
                </div>
            </div>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$liuyan): $mod = ($i % 2 );++$i;?><div class="guestbook" style="background-color:rgba(255,255,255,0.5);">
           <ul>
               <li id="id" ><?php echo ($liuyan["id"]); ?>楼&nbsp;&nbsp;</li>
               <li id="name" style="background: url('/pblog/Public/images/guestbook/user.png') no-repeat; padding-left:20px;"><?php echo ($liuyan["user"]); ?>&nbsp;&nbsp;</li>

               <li id="address" style="background: url('/pblog/Public/images/guestbook/local.png') no-repeat; padding-left:20px;"><?php echo ($liuyan["address"]); ?>&nbsp;&nbsp; </li>
               <a class="z" id="<?php echo ($liuyan["id"]); ?>" href="javascript:void(0);"><li id="zan" style="background: url('/pblog/Public/images/guestbook/zan.png') no-repeat; padding-left:20px;"><?php echo ($liuyan["zan"]); ?></li></a>
               <br/>
               <br/>
               <p id="liuyan"><?php echo ($liuyan["content"]); ?></p>
               <li id="time" class="time" style="background: url('/pblog/Public/images/guestbook/time.png') no-repeat; padding-left:20px;"><?php echo ($liuyan["time"]); ?></li>
           </ul>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
               <p class="pagepage"><?php echo ($page); ?></p>
        </div>

        <div class="contextBgItem contextBgItemLeft">
            <h3 class="CbiTitle"> 演示列表 </h3>
            <li class="currentDemo"> <a href="http://www.pengyaou.com/LegendsZ/Images/FileImage/WaterFlow.html">Jq自适应瀑布流</a> </li>
            <li> <a href="http://www.pengyaou.com/LegendsZ/eg/Control.html">Jq精美滑动条,进度条插件</a> </li>
            <li> <a href="http://www.pengyaou.com/LegendsZ/Images/FileImage/Tags.html">原生JavascriptTab选项卡</a> </li>
            <li> <a href="http://www.pengyaou.com/LegendsZ/Images/FileImage/index.html">Jquery多种图片轮滚特效</a> </li>
            <li> <a href="http://www.pengyaou.com/LegendsZ/eg/universe">CSS3太阳系行星运动模拟</a> </li>
            <li> <a href="http://www.pengyaou.com/LegendsZ/eg/glass/">Jquery放大镜效果</a> </li>
            <li> <a href="http://www.pengyaou.com/LegendsZ/Images/FileImage/rh.html">CSS3日食效果</a> </li>
            <li> <a href="http://www.pengyaou.com/LegendsZ/eg/3DImgC/">Jquery3D幻灯片轮换</a> </li>
            <h3 class="CbiTitle"> 本站热门 </h3>
            <li> <a href="http://www.pengyaou.com/LegendsZ/Images/FileImage/Calendar.html">HTML精美日历插件</a> </li>
            <li> <a href="http://www.pengyaou.com/LegendsZ/eg/MessageBox.html">Jq模态非模态弹出对话框</a> </li>
            <li> <a href="http://www.pengyaou.com/LegendsZ/Images/FileImage/css3button.html">CSS3精美按钮</a> </li>
            <li> <a href="http://www.pengyaou.com/LegendsZ/Images/FileImage/ShowBox.html">HTML弹出对话框</a> </li>
            <li> <a href="http://www.pengyaou.com/LegendsZ/Images/FileImage/3D.html">CSS3立方体柜子</a> </li>
            <li> <a href="http://www.pengyaou.com/LegendsZ/Images/FileImage/CSS33D.html">CSS3正方体图片轮换</a> </li>
            <li> <a href="http://www.pengyaou.com/LegendsZ/Images/FileImage/BlackProgress.html">Jquery进度条插件</a> </li>
            <li> <a href="http://www.pengyaou.com/LegendsZ/Images/FileImage/Slider.html">纯Javascript页面分割Slider</a> </li>
        </div>
    </div>

    </div>
</div>
<!---->
</body>

<!---js--->
<script src="/pblog/Public/js/jquery-1.4.min.js"></script>
<script src="/pblog/Public/js/guestbook.js"></script>
<script type="text/javascript">

        $(".z").click(function(){
        var Oa=$(this);
        var id=Oa.attr('id');//获取id属性
            var vl=Oa.find("li").text();
        vl=parseInt(vl)+1;
        $.post('<?php echo U("zan");?>',{id:id},function(data){
            if(data.status==1){
                Oa.find("li").text(vl);//页面元素加1
            }else{
                alert('点赞太频繁，请休息一下？');
            }
        },'json');
    });

    $(document).ready(function(e) {
        ImgIputHandler.Init();
    });
    var ImgIputHandler={
        facePath:[
            {faceName:"微笑",facePath:"微笑.gif"},
            {faceName:"撇嘴",facePath:"撇嘴.gif"},
            {faceName:"色",facePath:"色.gif"},
            {faceName:"发呆",facePath:"发呆.gif"},
            {faceName:"得意",facePath:"得意.gif"},
            {faceName:"流泪",facePath:"流泪.gif"},
            {faceName:"害羞",facePath:"害羞.gif"},
            {faceName:"闭嘴",facePath:"闭嘴.gif"},
            {faceName:"大哭",facePath:"大哭.gif"},
            {faceName:"尴尬",facePath:"尴尬.gif"},
            {faceName:"发怒",facePath:"发怒.gif"},
            {faceName:"调皮",facePath:"调皮.gif"},
            {faceName:"龇牙",facePath:"龇牙.gif"},
            {faceName:"惊讶",facePath:"惊讶.gif"},
            {faceName:"难过",facePath:"难过.gif"},
            {faceName:"酷",facePath:"酷.gif"},
            {faceName:"冷汗",facePath:"冷汗.gif"},
            {faceName:"抓狂",facePath:"抓狂.gif"},
            {faceName:"吐",facePath:"吐.gif"},
            {faceName:"偷笑",facePath:"偷笑.gif"},
            {faceName:"可爱",facePath:"可爱.gif"},
            {faceName:"白眼",facePath:"白眼.gif"},
            {faceName:"傲慢",facePath:"傲慢.gif"},
            {faceName:"饥饿",facePath:"饥饿.gif"},
            {faceName:"困",facePath:"困.gif"},
            {faceName:"惊恐",facePath:"惊恐.gif"},
            {faceName:"流汗",facePath:"流汗.gif"},
            {faceName:"憨笑",facePath:"憨笑.gif"},
            {faceName:"大兵",facePath:"大兵.gif"},
            {faceName:"奋斗",facePath:"奋斗.gif"},
            {faceName:"咒骂",facePath:"咒骂.gif"},
            {faceName:"疑问",facePath:"疑问.gif"},
            {faceName:"嘘",facePath:"嘘.gif"},
            {faceName:"晕",facePath:"晕.gif"},
            {faceName:"折磨",facePath:"折磨.gif"},
            {faceName:"衰",facePath:"衰.gif"},
            {faceName:"骷髅",facePath:"骷髅.gif"},
            {faceName:"敲打",facePath:"敲打.gif"},
            {faceName:"再见",facePath:"再见.gif"},
            {faceName:"擦汗",facePath:"擦汗.gif"},

            {faceName:"抠鼻",facePath:"抠鼻.gif"},
            {faceName:"鼓掌",facePath:"鼓掌.gif"},
            {faceName:"糗大了",facePath:"糗大了.gif"},
            {faceName:"坏笑",facePath:"坏笑.gif"},
            {faceName:"左哼哼",facePath:"左哼哼.gif"},
            {faceName:"右哼哼",facePath:"右哼哼.gif"},
            {faceName:"哈欠",facePath:"哈欠.gif"},
            {faceName:"鄙视",facePath:"鄙视.gif"},
            {faceName:"委屈",facePath:"委屈.gif"},
            {faceName:"快哭了",facePath:"快哭了.gif"},
            {faceName:"阴险",facePath:"阴险.gif"},
            {faceName:"亲亲",facePath:"亲亲.gif"},
            {faceName:"吓",facePath:"吓.gif"},
            {faceName:"可怜",facePath:"可怜.gif"},
            {faceName:"菜刀",facePath:"菜刀.gif"},
            {faceName:"西瓜",facePath:"西瓜.gif"},
            {faceName:"啤酒",facePath:"啤酒.gif"},
            {faceName:"篮球",facePath:"篮球.gif"},
            {faceName:"乒乓",facePath:"乒乓.gif"},
            {faceName:"拥抱",facePath:"拥抱.gif"},
            {faceName:"握手",facePath:"握手.gif"},
            {faceName:"得意地笑",facePath:"得意地笑.gif"},
            {faceName:"听音乐",facePath:"听音乐.gif"}
        ]
        ,
        Init:function(){
            var isShowImg=false;
            $(".Input_text").focusout(function(){
                $(this).parent().css("border-color", "#cccccc");
                $(this).parent().css("box-shadow", "none");
                $(this).parent().css("-moz-box-shadow", "none");
                $(this).parent().css("-webkit-box-shadow", "none");
            });
            $(".Input_text").focus(function(){
                $(this).parent().css("border-color", "rgba(19,105,172,.75)");
                $(this).parent().css("box-shadow", "0 0 3px rgba(19,105,192,.5)");
                $(this).parent().css("-moz-box-shadow", "0 0 3px rgba(241,39,232,.5)");
                $(this).parent().css("-webkit-box-shadow", "0 0 3px rgba(19,105,252,3)");
            });
            $(".imgBtn").click(function(){
                if(isShowImg==false){
                    isShowImg=true;
                    $(this).parent().prev().animate({marginTop:"-125px"},300);
                    if($(".faceDiv").children().length==0){
                        for(var i=0;i<ImgIputHandler.facePath.length;i++){
                            $(".faceDiv").append("<img title=\""+ImgIputHandler.facePath[i].faceName+"\" src=\"/pblog/Public/images/guestbook/face/"+ImgIputHandler.facePath[i].facePath+"\" />");
                        }
                        $(".faceDiv>img").click(function(){

                            isShowImg=false;
                            $(this).parent().animate({marginTop:"0px"},300);
                            ImgIputHandler.insertAtCursor($(".Input_text")[0],"["+$(this).attr("title")+"]");
                        });
                    }
                }else{
                    isShowImg=false;
                    $(this).parent().prev().animate({marginTop:"0px"},300);
                }
            });
        },
        insertAtCursor:function(myField, myValue) {
            if (document.selection) {
                myField.focus();
                sel = document.selection.createRange();
                sel.text = myValue;
                sel.select();
            } else if (myField.selectionStart || myField.selectionStart == "0") {
                var startPos = myField.selectionStart;
                var endPos = myField.selectionEnd;
                var restoreTop = myField.scrollTop;
                myField.value = myField.value.substring(0, startPos) + myValue + myField.value.substring(endPos, myField.value.length);
                if (restoreTop > 0) {
                    myField.scrollTop = restoreTop;
                }
                myField.focus();
                myField.selectionStart = startPos + myValue.length;
                myField.selectionEnd = startPos + myValue.length;
            } else {
                myField.value += myValue;
                myField.focus();
            }
        }
    }
</script>

</html>