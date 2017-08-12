<?php if (!defined('THINK_PATH')) exit();?><!-- 调用头部文件 -->
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo ($articleInfo["title"]); ?>-<?php echo ($SiteInfo["title"]); ?></title>
    <meta name = "keywords" content="<?php echo ($SiteInfo["keywords"]); ?>" >
    <meta name = "description" content="<?php echo ($SiteInfo["description"]); ?>" >
    <link href="/Public/Default/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/Default/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/Public/Default/css/animate.css" rel="stylesheet">
    <link href="/Public/Default/css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header" style="text-align:center;">
                        <div class="dropdown profile-element"> <span>
                        <a href="/index.php">
                            <img alt="<?php echo ($SiteInfo["name"]); ?>" class="img-circle" src="<?php echo ($SiteInfo["logo"]); ?>" width="80px;"  height="80px;" />
                        </a>
                        </span>
                        <span class="clear"> <span class="block m-t-xs" style = "color:#fff;"> <strong class="font-bold"><?php echo ($SiteInfo["name"]); ?></strong>
                        </span> <span class="text-muted text-xs block"><?php echo ($SiteInfo["set_content"]); ?></span> </span>
                    </div>
                    <div class="logo-element">
                        <?php echo ($SiteInfo["name"]); ?>
                    </div>
                </li>
                <?php if(is_array($fenleiListone)): foreach($fenleiListone as $key=>$vo): ?><li>
                    <a href="#" ><i class="fa fa-bar-chart-o"></i> <span class="nav-label"><?php echo ($vo["name"]); ?></span><span class="fa arrow"></span></a>
                    <ul style="height: 0px;" aria-expanded="false" class="nav nav-second-level collapse">
                        <?php if(is_array($fenleiListtwo)): foreach($fenleiListtwo as $key=>$vs): if($vo["id"] == $vs['fid']): ?><li><a href="<?php echo U('Category/index',array('id'=>$vs['id']));?>"  is_active = "active_<?php echo ($vs["id"]); ?>"><?php echo ($vs["name"]); ?></a></li><?php endif; endforeach; endif; ?>
                    </ul>
                </li><?php endforeach; endif; ?>
                <li>
                    <a href="<?php echo U('Index/yaoqingma');?>" is_active = "active_003"><i class="fa fa-globe"></i> <span class="nav-label" style = "color:#ED5565;">邀请码与友链</span></a>
                </li>
                    </ul>

                </div>
            </nav>
            <div id="page-wrapper" class="gray-bg" style="overflow: hidden;">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                            <form role="search" class="navbar-form-custom" action="<?php echo U('Index/serch');?>" method="post">
                                <div class="form-group">
                                    <input type="text" placeholder="搜索框在这里......" class="form-control" name="keywords" id="top-search" required>
                                </div>
                            </form>
                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <span class="m-r-sm text-muted welcome-message">欢迎来到<?php echo ($SiteInfo["name"]); ?>，有你代码，有你的风格！</span>
                            </li>
                        <?php if($_SESSION['muser']!= ''): ?><li class="dropdown">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="javascript:void(0)">
                                    <i class="fa fa-envelope"></i>  <span class="label label-warning">家</span>
                                </a>
                                <ul class="dropdown-menu dropdown-messages">
                                    <li>
                                        <div class="dropdown-messages-box">
                                            <div class="media-body">
                                                <strong><a href="<?php echo U('User/index');?>">进入会员中心</a></strong>. <br>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="dropdown-messages-box">
                                            <div class="media-body ">
                                                <strong><a href="<?php echo U('User/logout');?>">退出登陆</a></strong>. <br>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="text-center link-block">
                                                <i class="fa fa-envelope"></i> <strong>里程密和你在一起</strong>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        <li>欢迎你，<?php echo (session('muser')); ?></li>
                        <?php else: ?>
                            <li>
                                <a data-toggle="modal" href="#myModal6">注册</a>
                            </li>
                            <li>
                                <a data-toggle="modal" href="#modal-form">登陆</a>
                            </li><?php endif; ?>
                        </ul>

                    </nav>
                </div>
                <!-- 登陆在这里开始 -->
                <div style="display: none;" class="modal inmodal fade in" id="modal-form" tabindex="-1" role="dialog" aria-hidden="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">登陆中心</h4>
                            </div>
                            <div class="modal-body">

                                <form class="form-horizontal" action="<?php echo U('User/login');?>" method="post">
                                    <p>没有账号可不要乱登陆哦</p>
                                    <div class="form-group"><label class="col-lg-2 control-label">账号</label>

                                        <div class="col-lg-10"><input placeholder="请输入账号" class="form-control" type="text" name = "username" required>
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">密码</label>

                                        <div class="col-lg-10"><input placeholder="请输入密码" class="form-control" type="password" name = "password" required></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-5 col-lg-7">
                                            <button class="btn btn-sm btn-white" type="submit">点击登陆</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- 登陆结束 -->


                <!-- 注册开始 -->
                <div style="display: none;" class="modal inmodal fade in" id="myModal6" tabindex="-1" role="dialog" aria-hidden="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">注册中心</h4>
                            </div>
                            <div class="modal-body">

                                <form class="form-horizontal" action="<?php echo U('User/reg');?>" method="post">
                                    <p>欢迎加入.</p>
                                    <div class="form-group"><label class="col-lg-2 control-label">账号</label>

                                        <div class="col-lg-10"><input placeholder="请输入账号" class="form-control" type="text" required name = "username">
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">密码</label>

                                        <div class="col-lg-10"><input placeholder="请输入密码" class="form-control" type="password" required name = "password"></div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">重复密码</label>

                                        <div class="col-lg-10"><input placeholder="请重复输入密码" class="form-control" type="password" required name = "repassword"></div>
                                    </div>
                                     <div class="form-group"><label class="col-lg-2 control-label" >昵称</label>

                                        <div class="col-lg-10"><input placeholder="请输入昵称" class="form-control" type="text" required name = "truename">
                                        </div>
                                    </div>
                                    <?php if($SiteInfo["userstatus"] == 1): ?><div class="form-group"><label class="col-lg-2 control-label" >邀请码</label>

                                        <div class="col-lg-10"><input placeholder="请输入邀请码" class="form-control" type="text" required name = "code">
                                        </div>
                                    </div><?php endif; ?>
                                    <div class="form-group">
                                        <div class="col-lg-offset-5 col-lg-7">
                                            <button class="btn btn-sm btn-white" type="submit">点击注册</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- 注册结束 -->

<style>
    #beijing img{
        max-width: 100%;
    }
    #beijing p{
        font-size: 14px;
    }
    #pinglun .well{
        margin-top: 0px;
        background-color: #fff;
    }
    #pinglun .feed-element{
        padding-bottom: 0px;
    }
    #pinglun .btn-xs{
        margin-left: 5px;
    }
</style>
<!-- 本页导航栏开始 -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo ($articleInfo["title"]); ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="/index.php">首页</a>
            </li>
            <li>
                <a href="<?php echo U('Category/index',array('id'=>$fenleiInfo['id']));?>"><?php echo ($fenleiInfo["name"]); ?></a>
            </li>
            <li class="active">
                <strong><?php echo ($articleInfo["title"]); ?></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>

<!-- 本页导航栏结束 -->

<!-- 正文开始 -->
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12" style="padding:0px;">
            <div class="col-lg-9">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="text-center article-title" style="margin:20px 0px 20px">
                            <span class="text-muted">
                                <h1>
                                    <?php echo ($articleInfo["title"]); ?>
                                </h1>
                            </span>
                        </div>
                        <div style="margin-bottom:50px;">
                            <?php if($articleInfo["viewtumb"] == 0): ?><img src="<?php echo ($articleInfo["pic"]); ?>" alt="" style="width:100%"><?php endif; ?>
                        </div>
                    <div id = "beijing">
    <?php
 $article_id = 'article_'.$articleInfo['id']; if($articleInfo['articlepassword'] != '' && $_SESSION[$article_id] != $articleInfo['articlepassword']){ ?>
    <form class="form-horizontal" action="<?php echo U('Article/enarticlepassword',array('id'=>$articleInfo['id']));?>" method="post">
        <div class="form-group">
            <label class="col-sm-2 control-label">请输入文章密码：</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" require></div>
            </div>
            <div class="mail-body text-center tooltip-demo">
                <button class="btn btn-sm btn-primary" id="adds" type="submit">发送</button>
            </div>
        </form>
        <?php
 }else{ ?>
    <p style="font-size:14px;" class="text2" >
        <?php echo ($articleInfo["content"]); ?>
    </p>
    <?php if($articleInfo["file"] == true): ?><div class="mail-box">
      <div class="mail-body">
        <div class="panel panel-info">
            <div class="panel-heading">
            附件下载
            </div>
            <div class="panel-body">
                    <div class="col-sm-12"><a href="<?php echo ($articleInfo["file"]); ?>">点击下载</a></div>
            </div>
        </div>
      </div>
    </div><?php endif; ?>
    <?php
} ?>
</div>
<hr>
<div class="row">

    <div class="col-md-12">
        <h1>回复列表</h1>
        <div id="pinglun">

        </div>
        <center>
            <button type="button" class="btn btn-w-m btn-warning"  id = "more" onclick="replay()">加载更多评论</button>
        </center>
    </div>
    <hr>
</div>
<?php
if(($articleInfo['articlepassword'] != '' && $_SESSION[$article_id] == $articleInfo['articlepassword']) || ($articleInfo['articlepassword'] == '')){ ?>
<hr>
<div class="row" id = "huifus">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-info-circle"></i>回复操作
            </div>
            <div class="panel-body">
                <form action="<?php echo U('Article/replay',array('id'=>$articleInfo['id']));?>" method="post" class="form-horizontal">
                    <div class="form-group"><label class="col-sm-2 control-label">楼层</label>
                        <div class="col-sm-10" >
                            <input type="text" value = "顶楼" disabled="" class="form-control" id = "replay">
                        </div>
                    </div>
                    <input type="hidden" value = "" name = "replay" id = "huifuyincang">
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">昵称</label>
                        <div class="col-sm-10"><input class="form-control" type="text" placeholder = "请填写昵称" name = "name" required <?php if($_SESSION['mid']!= ''): ?>value ="<?php echo (session('muser')); ?>"<?php endif; ?>></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label" >邮箱</label>
                        <div class="col-sm-10"><input class="form-control" type="email" placeholder = "请填写邮箱" name = "email" required <?php if($_SESSION['mid']!= ''): ?>value ="<?php echo (session('memail')); ?>"<?php endif; ?>></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label" >内容</label>
                        <div class="col-sm-10">
                            <textarea name="content" class="form-control" cols="30" rows="5" placeholder = "请填写内容" required style="width:100%;"></textarea>
                        </div>
                    </div>
                    <!--<center>-->
                        <!--<div id="embed-captcha"></div>-->
                        <!--<p id="wait" class="show">正在加载验证码......</p>-->
                        <!--<p id="notice" class="hide">请先拖动验证码到相应位置</p>-->
                    <!--</center>-->
                    <center><button type="submit" class="btn btn-w-m btn-warning" style="margin-top:10px;" id="popup-submit">提交回复</button></center>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
} ?>
</div>
</div>
</div>
<div class="col-lg-3">
    <div class="widget-head-color-box navy-bg p-lg text-center" style="margin-top:0px;">
        <div class="m-b-md">
            <h2 class="font-bold no-margins">
                <?php echo ($userInfo["truename"]); ?>
            </h2>
            <small>注册会员</small>
        </div>
        <img src="<?php echo ($userInfo["pic"]); ?>" class="img-circle circle-border m-b-md" alt="profile" height="150px;">
    </div>
    <div class="widget-text-box">
        <p><span class="label label-success"  style="font-size:12px;">发布时间：<?php echo (date('Y-m-d H:i:s',$articleInfo["ctime"])); ?></span></p>
        <p><span class="label label-success"  style="font-size:12px;">修改时间：<?php echo (date('Y-m-d H:i:s',$articleInfo["edittime"])); ?></span></p>
        <p><span class="label label-success"  style="font-size:12px;">查看次数：<?php echo ($articleInfo["view"]); ?></span></p>
        <p><span class="label label-success"  style="font-size:12px;">评论次数：<?php echo ($articleInfo["comment"]); ?></span></p>
    </div>
    <div class="widget lazur-bg p-xl text-left" style="padding-left:5px;padding-right:5px;">
        <center><h2>TA的最新文章</h2></center>
        <ul class="todo-list m-t ui-sortable" style="color:#000;">
            <?php if(is_array($zuixin)): foreach($zuixin as $key=>$vo): ?><li>
                    <span class="m-l-xs"><a href="<?php echo U('Article/index',array('id'=>$vo['id']));?>"><?php echo (msubstr($vo["title"],0,10,'utf-8',true)); ?></a></span>
                </li><?php endforeach; endif; ?>
        </ul>
    </div>
    <div class="widget red-bg p-lg text-center" style="padding:10px;margin-bottom:50px;padding-left: 5px;">
        <div class="m-b-md" style="margin-bottom:15px;">
            <div><i class="fa fa-bell fa-4x"></i></div>
            <button type="button" class="btn btn-w-m btn-info share" style="margin-top:15px;" id = "luandian">别点我</button>
            <div id="socialShare"></div>
        </div>
    </div>


</div>
</div>
</div>
</div>
<!-- 正文结束 -->

<!-- 调用脚部文件 -->
      <a href="#0" class="cd-top">↑</a>
        <div class="footer" style="z-index:9999;">
            <div class="pull-right">
               <!--<a href="<?php echo U('Admin/Index/index');?>" target="_blank">后台登陆</a>&nbsp;&nbsp;<strong>如果你使用本站程序</strong> 请保留友情链接.-->
            </div>
            <div>
                <strong>Copyright</strong> <a href="http://www.itapers.com/">itapers</a> &copy; 2014-2016
                管理员邮箱：<a href = "mailto:<?php echo ($SiteInfo["admin_email"]); ?>"><?php echo ($SiteInfo["admin_email"]); ?></a>&nbsp; &nbsp;统计：<?php echo ($SiteInfo["statistics"]); ?>&nbsp; &nbsp;ICP备案：<?php echo ($SiteInfo["icp"]); ?>
            </div>
        </div>
        </div>
        </div>

    <script src="/Public/Default/js/jquery-2.1.1.js"></script>
    <script src="/Public/Default/js/jquery-ui-1.10.4.min.js"></script>
    <script src="/Public/Default/js/bootstrap.min.js"></script>
    <!-- 手风琴菜单 -->
    <script src="/Public/Default/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <!-- 滚动条 -->
    <script src="/Public/Default/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- 导航菜单 -->
    <script src="/Public/Default/js/inspinia.js"></script>
    <!-- 进度条 -->
    <script src="/Public/Default/js/plugins/pace/pace.min.js"></script>

    <script>
        var s_url= "active_<?php echo ($is_active); ?>";
        var now_url = '';
        for(var i = 0;i<$("#side-menu li").length;i++){
            now_url=$("#side-menu li a").eq(i).attr("is_active");
            if(now_url == s_url){
                $("#side-menu a").eq(i).parent().addClass("active");
                $("#side-menu a").eq(i).parent().parent().parent().addClass("active");
                $("#side-menu a").eq(i).parent().parent().addClass("in");
            }else{
                $("#side-menu a").eq(i).parent().removeClass("active");
            }
        }
        </script>
        <!-- 返回顶部 -->
        <script>
                jQuery(document).ready(function($){
    // browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
        //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
        offset_opacity = 1200,
        //duration of the top scrolling animation (in ms)
        scroll_top_duration = 700,
        //grab the "back to top" link
        $back_to_top = $('.cd-top');

    //hide or show the "back to top" link
    $(window).scroll(function(){
        ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if( $(this).scrollTop() > offset_opacity ) {
            $back_to_top.addClass('cd-fade-out');
        }
    });

    //smooth scroll to top
    $back_to_top.on('click', function(event){
        event.preventDefault();
        $('body,html').animate({
            scrollTop: 0 ,
            }, scroll_top_duration
        );
    });

});
        </script>
</body>

</html>

<script>
    function huifuss(a){
        $("#replay").val("回复"+a);
        $("#huifuyincang").val(a);
    }
    var num = 0; //当前加载的条数
    var id = <?php echo ($_GET['id']); ?>;//当前文章ID
    var userid = <?php echo ($userInfo["id"]); ?>;//文章所属用户ID
    var pic = '';//定义图片
    var tm = '';//定义时间
    var shenfen = '';//定义身份
    var jjj ='';//定义全局ajax返回数据变量
    var str = '';//定义HTML字符串变量
    function replay(){
        $.ajax({
         type: "POST",
         url: "<?php echo U('Article/get_replay');?>",
         data: "id="+id+"&num="+num,
         success: function(msg){
           if(msg == 5){
            $("#more").html('没有更多内容了');
        }else{
            str = '';
            jjj = eval(msg);
            console.log(jjj)
            for (var i in jjj)
            {
                if(jjj[i].replay == 0) replay_str(jjj[i])
            }
            $("#pinglun").append(str);
            num = num+10;
        }
    }
});
    }
    replay();

    function replay_str(ddd){
        if(ddd.uid == userid) shenfen = '<a class="btn btn-xs btn-danger">楼主</a>';
                tm = new Date(parseInt(ddd.ctime) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ");
                ddd.pic ==null ? pic = '/Public/Uploads/default.png' :  pic =ddd.pic;
        str += '<div class="feed-element"><a class="pull-left"><img alt="'+ddd.name+'" class="img-circle" src="'+pic+'"></a><div class="media-body"><div class="well" style = "font-size:14px;"><span class = "label label-info" style = "font-size:12px;">'+ddd.name+"</span><div class='pull-right'></div><small class='pull-right'>"+tm+'</small><a class="btn btn-xs btn-warning" href = "#huifus"onclick="huifuss('+ddd.id+')">回复</a>'+shenfen+'<br/><br>'+ddd.content+'</div>';
        if(ddd.son != undefined){
            for(var s = 0;s<ddd.son.length;s++){
                replay_str(jjj[ddd.son[s]]);
            }
        }
        str += '</div></div>';
    }
</script>
<!-- 回复验证码 -->
<!--<script src="http://static.geetest.com/static/tools/gt.js"></script>-->
<script>
    var handlerEmbed = function (captchaObj) {
        $("#popup-submit").click(function (e) {
            var validate = captchaObj.getValidate();
            if (!validate) {
                $("#notice")[0].className = "show";
                setTimeout(function () {
                    $("#notice")[0].className = "hide";
                }, 2000);
                e.preventDefault();
            }
        });
        captchaObj.appendTo("#embed-captcha");
        captchaObj.onReady(function () {
            $("#wait")[0].className = "hide";
        });
    };
    $.ajax({
        url: "<?php echo U('Base/EchoMyVerify',array('t'=>$randtime));?>", // 加随机数防止缓存
        type: "get",
        dataType: "json",
        success: function (data) {
//            initGeetest({
//                gt: data.gt,
//                challenge: data.challenge,
//                product: "embed", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
//                offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
//            }, handlerEmbed);
        }
    });
</script>
<link rel="stylesheet" href="/Public/Default/Share/css/share.css" type="text/css" />
<script src="/Public/Default/Share/js/share.js"></script>
<script>
    $(function() {
        $("#socialShare").socialShare({
            content: '<?php echo (msubstr(strip_tags($vo["content"]),0,160,'utf-8',true)); ?>',
            url:'http://<?php echo $_SERVER["SERVER_NAME"];?>/index.php?m=home&c=article&a=index&id=8',
            titile:'<?php echo ($articleInfo["title"]); ?>-<?php echo ($SiteInfo["title"]); ?>',
            pic:'<?php echo ($articleInfo["pic"]); ?>'
        });

    });
    $("#shareQQ").on("click",function(){
        $(this).socialShare("tQQ");
    })
    $("#luandian").click(function(){
        $('body').html("<center><h1 style = 'color:#fff;'>都TM告诉你不要乱点了，不相信我是吧，看你现在怎么办</h1><a href = '#' onclick = 'javascript:history.go(-1)' style = 'color:#2f4050;'>返回</a></center>");
    })
</script>