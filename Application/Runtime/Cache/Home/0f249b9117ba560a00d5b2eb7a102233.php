<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<title>基本信息-<?php echo ($SiteInfo["title"]); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="/Public/Default/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/Public/Default/js/jquery-2.1.1.js"></script>
<!-- Custom Theme files -->
<link href="/Public/Default/user/css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="/Public/Default/user/js/move-top.js"></script>
<script type="text/javascript" src="/Public/Default/user/js/easing.js"></script>
<script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                });
            });
</script>
</head>
<body>
    <!-- container -->
        <!-- header -->
        <div id="home" class="single_header">
            <div class="container">
                <!-- -->
                <div class="nav-icon">
                     <a href="#" class="right_bt" id="activator"><span> </span> </a>
                </div>
                 <div class="box" id="box">
                     <div class="box_content">
                        <div class="box_content_center">
                            <div class="form_content">
                                <div class="menu_box_list">
                                    <ul>
                                        <li><a href="<?php echo U('User/index');?>">主页</a></li>
                                        <li><a href="/index.php" style="color:#1ab394;">返回网站</a></li>
                                        <div class="clear"> </div>
                                    </ul>
                                </div>
                                <a class="boxclose" id="boxclose"> <span> </span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- script-for-box -->
                 <script type="text/javascript">
                    var $ = jQuery.noConflict();
                        $(function() {
                            $('#activator').click(function(){
                                $('#box').animate({'top':'0px'},500);
                            });
                            $('#boxclose').click(function(){
                            $('#box').animate({'top':'-700px'},500);
                            });
                        });
                        $(document).ready(function(){
                        //Hide (Collapse) the toggle containers on load
                        $(".toggle_container").hide();
                        //Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
                        $(".trigger").click(function(){
                            $(this).toggleClass("active").next().slideToggle("slow");
                                return false; //Prevent the browser jump to the link anchor
                        });

                    });
                </script>
            </div>
        </div>

<style>
      .cropit-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 250px;
        height: 250px;
      }

      .cropit-preview-image-container {
        cursor: move;
      }

      .image-size-label {
        margin-top: 10px;
      }
    </style>
<!-- 调用头部文件 -->
<!-- 正文开始 -->
                <div class="container">
                    <center><h1>基本信息</h1></center>
                        <div class="mail-box" style="padding:10px;background: #fff;color: #666;">
                            <div class="form-group">
                                <label>账号</label>
                                <input  class="form-control required" type="text" disabled="" value = "<?php echo ($userInfo["username"]); ?>">
                            </div>
                            <div class="form-group">
                                <label>注册时间</label>
                                <input  class="form-control required" type="text" disabled="" value = "<?php echo (date('Y-m-d H:i:s',$userInfo["ctime"])); ?>">
                            </div>
                            <div class="form-group">
                                <label>上次登录时间</label>
                                <input  class="form-control required" type="text" disabled="" value = "<?php echo (date('Y-m-d H:i:s',session('mlasttime'))); ?>">
                            </div>
                            <div class="form-group">
                                <label>上次登录IP</label>
                                <input  class="form-control required" type="text" disabled="" value = "<?php echo (session('mlastip')); ?>">
                            </div>
                            <div class="form-group">
                                <label>账户状态</label>
                                <input  class="form-control required" type="text" disabled="" <?php if($userInfo["status"] == 0): ?>value = "启用"<?php else: ?>value = "禁用"<?php endif; ?>>
                            </div>
                            <div class="form-group">
                                <label>我的昵称</label>
                                <input  class="form-control required" type="text" disabled="" value = "<?php echo ($userInfo["truename"]); ?>">
                            </div>
                                <div class="ibox-content">
                    <center><h1>修改头像</h1></center>
                        <div class="form-group">
                            <div class="image-editor">
                              <input type="file" class="cropit-image-input">
                              <div class="cropit-preview"></div>
                              <div class="image-size-label">
                                放大缩小
                              </div>
                              <input type="range" class="cropit-image-zoom-input" style="width: auto;">
                              <button class="rotate-ccw">左侧旋转</button>
                              <button class="rotate-cw">右侧旋转</button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary export">确认修改</button>
                </div>
                                <hr>
                                <center><h1>修改密码</h1></center>
                                <form action="<?php echo U('User/changePass');?>" method="post">
                                    <div class="form-group">
                                        <label>输入密码</label>
                                        <input  class="form-control required" type="password" name = "passone">
                                    </div>
                                    <div class="form-group">
                                        <label>重复密码</label>
                                        <input  class="form-control required" type="password" name = "passtwo">
                                    </div>
                                    <button type="submit" class="btn btn-primary">确认修改</button>
                                </form>
                            </div>
                        </div>
        <!-- 正文结束 -->

        <!-- 调用脚部文件 -->
<!-- footer -->
        <div class="container">
        <div class="footer">
                <div class="footer-left">
                    <p>Copyright &copy; <?php echo ($SiteInfo["title"]); ?> <?php echo ($SiteInfo["statistics"]); ?></p>
                </div>
                <div class="footer-right">
                    <ul>
                        <li><a href="http://www.lcm.wang/">里程密开源博客系统</a></li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <script type="text/javascript">
                                    $(document).ready(function() {
                                        /*
                                        var defaults = {
                                            containerID: 'toTop', // fading element id
                                            containerHoverID: 'toTopHover', // fading element hover id
                                            scrollSpeed: 1200,
                                            easingType: 'linear'
                                        };
                                        */

                                        $().UItoTop({ easingType: 'easeOutQuart' });

                                    });
                                </script>
                                    <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
        </div>
        <!-- /footer -->
    <!-- /container -->
</body>
</html>

    <script type="text/javascript" src="/Public/Default/pic_cut/js/jquery.cropit.js"></script>
    <script type="text/javascript">
        $(function() {
        $('.image-editor').cropit();

        $('.rotate-cw').click(function() {
          $('.image-editor').cropit('rotateCW');
        });
        $('.rotate-ccw').click(function() {
          $('.image-editor').cropit('rotateCCW');
        });

        $('.export').click(function() {
          var imageData = $('.image-editor').cropit('export');
          $.ajax({
           type: "POST",
           url: "<?php echo U('User/changePic');?>",
           data:{
                data:imageData
           },
           success: function(msg){
             if(msg =='1'){
                alert('修改成功')
             }else{
                alert('修改失败')
             }
           }
        });
          // window.open(imageData);
        });
      });
    </script>