<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>基本信息-<?php echo ($SiteInfo["title"]); ?></title>
    <!-- load stylesheets -->
    <link rel="stylesheet" href="/Public/Default/user/font-awesome-4.6.3/css/font-awesome.min.css">            <!-- Font awesome -->
    <link rel="stylesheet" href="/Public/Default/user/css/bootstrap.min.css">                                  <!-- Bootstrap style -->
    <link rel="stylesheet" href="/Public/Default/user/css/hero-slider-style.css">                              <!-- Hero slider style (https://codyhouse.co/gem/hero-slider/) -->
    <link rel="stylesheet" href="/Public/Default/user/css/magnific-popup.css">                                 <!-- Magnific popup style (http://dimsemenov.com/plugins/magnific-popup/) -->

    <link rel="stylesheet" href="/Public/Default/user/css/templatemo-style.css">                               <!-- Templatemo style -->
</head>

    <body>

        <!-- Content -->
        <div class="cd-hero">

            <!-- Navigation -->
            <div class="cd-slider-nav">
                <nav class="navbar">

                    <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#tmNavbar">
                        &#9776;
                    </button>
                    <div class="collapse navbar-toggleable-sm text-xs-center text-uppercase tm-navbar" id="tmNavbar">
                        <ul class="nav navbar-nav" id = "barsss">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo U('User/index');?>" data-no="1">会员中心 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo U('User/addArticle');?>" data-no="2">写篇文章</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo U('User/myArticle');?>" data-no="3">我的文章</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo U('User/liuyan');?>" data-no="4">我的留言</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo U('User/userInfo');?>" data-no="5">基本信息</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo U('User/detail');?>" data-no="6">主页信息</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo U('User/gonggao');?>" data-no="7">管理公告</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

            <ul class="cd-hero-slider">  <!-- autoplay -->

<link href="/Public/Default/css/style.css" rel="stylesheet">
<!-- 调用头部文件 -->
<link href=" /Public/Default/shearphoto_common/css/ShearPhoto.css" rel="stylesheet" type="text/css" media="all"><!--CSS文件，有点废话-->

<!-- 正文开始 -->
<li class="selected" id = "liselected5">


    <div class="cd-full-width">
        <div class="container-fluid js-tm-page-content tm-page-1" data-page-no="1">

            <div class="row">

                <div class="col-xs-12">
                    <div class="tm-bg-white-translucent text-xs-left tm-textbox diannao">

                        <div class="mail-box" style="padding:10px;">
                            <div class="form-group">
                                <label>邮箱：</label>
                                <input  class="form-control required" type="text" disabled="" value = "<?php echo ($userInfo["email"]); ?>">
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
                            <center><h1>修改头像</h1></center>

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
                    </div>
                </div>

            </div> <!-- .cd-full-width -->

        </li>
        <!-- 正文结束 -->

        <!-- 调用脚部文件 -->
                    </ul> <!-- .cd-hero-slider -->

            <footer class="tm-footer">

                <div class="tm-social-icons-container">
                    <!--<a href="/index.php" class="tm-social-link">里</a>-->
                    <a href="/index.php" class="tm-social-link">个</a>
                    <a href="/index.php" class="tm-social-link">人</a>
                    <a href="/index.php" class="tm-social-link">博</a>
                    <a href="/index.php" class="tm-social-link">客</a>
                </div>

                <p class="tm-copyright-text">Copyright &copy; <?php echo ($SiteInfo["title"]); ?> <?php echo ($SiteInfo["statistics"]); ?> </p>

            </footer>

        </div> <!-- .cd-hero -->


        <!-- Preloader, https://ihatetomatoes.net/create-custom-preloading-screen/ -->
        <div id="loader-wrapper">

            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>

        </div>

        <!-- load JS files -->
        <script src="/Public/Default/user/js/jquery-1.11.3.min.js"></script>         <!-- jQuery (https://jquery.com/download/) -->
        <script src="/Public/Default/user/js/tether.min.js"></script> <!-- Tether for Bootstrap (http://stackoverflow.com/questions/34567939/how-to-fix-the-error-error-bootstrap-tooltips-require-tether-http-github-h) -->
        <script src="/Public/Default/user/js/bootstrap.min.js"></script>             <!-- Bootstrap js (v4-alpha.getbootstrap.com/) -->
        <script src="/Public/Default/user/js/hero-slider-main.js"></script>          <!-- Hero slider (https://codyhouse.co/gem/hero-slider/) -->
        <script src="/Public/Default/user/js/jquery.magnific-popup.min.js"></script> <!-- Magnific popup (http://dimsemenov.com/plugins/magnific-popup/) -->

        <script>

            function adjustHeightOfPage(pageNo) {

                // Get the page height
                var totalPageHeight = 15 + $('.cd-slider-nav').height()
                                        + $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .js-tm-page-content").height() + 160
                                        + $('.tm-footer').height();

                // Adjust layout based on page height and window height
                if(totalPageHeight > $(window).height())
                {
                    $('.cd-hero-slider').addClass('small-screen');
                    $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", totalPageHeight + "px");
                }
                else
                {
                    $('.cd-hero-slider').removeClass('small-screen');
                    $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", "100%");
                }

            }

            /*
                Everything is loaded including images.
            */
            $(window).load(function(){

                adjustHeightOfPage(1); // Adjust page height

                /* Gallery pop up
                -----------------------------------------*/
                $('.tm-img-gallery').magnificPopup({
                    delegate: 'a', // child items selector, by clicking on it popup will open
                    type: 'image',
                    gallery:{enabled:true}
                });

                /* Collapse menu after click
                -----------------------------------------*/
                $('#tmNavbar a').click(function(){
                    $('#tmNavbar').collapse('hide');

                    adjustHeightOfPage($(this).data("no")); // Adjust page height
                });

                /* Browser resized
                -----------------------------------------*/
                $( window ).resize(function() {
                    var currentPageNo = $(".cd-hero-slider li.selected .js-tm-page-content").data("page-no");
                    adjustHeightOfPage( currentPageNo );
                });

                // Remove preloader
                // https://ihatetomatoes.net/create-custom-preloading-screen/
                $('body').addClass('loaded');

            });
            var active = "<?php echo ($active_name); ?>";
            var now_url = '';
            for (var i = 0; i < $("#barsss li").length; i++) {
                now_url = $("#barsss li a").eq(i).attr("data-no")
                if( now_url== active){
                    $("#barsss li a").eq(i).parent().addClass("selected");
                }
            }
        </script>

</body>
</html>

<script  type="text/javascript" src=" /Public/Default/shearphoto_common/js/ShearPhoto.js" ></script><!--ShearPhoto的核心文件 截取，拖拽，HTML5切图，数据交互等都是由这个文件处理，全部由明哥先生汗水交织而成-->
<script  type="text/javascript"  src=" /Public/Default/shearphoto_common/js/webcam_ShearPhoto.js" ></script> <!--在线拍照那个FLASH的接口，非技术性文件-->
<script  type="text/javascript"  src=" /Public/Default/shearphoto_common/js/alloyimage.js" ></script>   <!--图片特效处理,他只负责特效，其他功能与这个文件完全无关，这个JS从腾讯AI文件  如你不要特效的话，顺带删除这个文件，在hendle.js设置关闭特效-->
<script  type="text/javascript"  src=" /Public/Default/shearphoto_common/js/handle.js" ></script>