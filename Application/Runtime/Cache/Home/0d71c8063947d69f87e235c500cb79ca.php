<?php if (!defined('THINK_PATH')) exit();?><!-- 调用头部文件 -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>会员中心-<?php echo ($SiteInfo["title"]); ?></title>
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

<link href="/Public/Default/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/Default/css/style.css" rel="stylesheet">
<!-- 正文开始 -->
<li class="selected" id = "liselected3">


    <div class="cd-full-width">
        <div class="container-fluid js-tm-page-content tm-page-1" data-page-no="1">

            <div class="row">

                <div class="col-xs-12">
                <div class="tm-bg-white-translucent text-xs-left tm-textbox" >
                        <center>
                            <form method="post" action="">
                                <div class="form-group has-success"><label class="col-sm-2 control-label">搜索文章</label>
                                    <div class="col-sm-6"><input class="form-control" required="" name="keywords" type="text"></div>
                                    <div class="col-sm-4">
                                        <button type="submit" class="pull-xs-right tm-submit-btn">搜索</button>
                                    </div>
                                </div>
                                <br>
                            </form>
                        </center>

                        <div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>序号</th>
                                        <th>标题</th>
                                        <th>浏览</th>
                                        <th>密码</th>
                                        <th>时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(is_array($articleList)): foreach($articleList as $k=>$vo): ?><tr>
                                            <td><?php echo ($k+1); ?></td>
                                            <td><?php echo (msubstr($vo["title"],0,20,'utf-8',true)); ?></td>
                                            <td><?php echo ($vo["view"]); ?></td>
                                            <td><?php echo ($vo["articlepassword"]); ?></td>
                                            <td><?php echo (date( "Y-m-d",$vo["ctime"])); ?></td>
                                            <td><a href="<?php echo U('Article/index',array('id'=>$vo['id']));?>"><button type="button" class="btn btn-primary btn-xs">查看</button></a>
                                               <a href="<?php echo U('User/updateArticle',array('id'=>$vo['id']));?>"><button type="button" class="btn btn-primary btn-xs">修改</button></a>
                                               <a href="<?php echo U('User/delArticle',array('id'=>$vo['id']));?>" onclick="return queren()"><button type="button" class="btn btn-danger btn-xs">删除</button></a>
                                           </td>
                                       </tr><?php endforeach; endif; ?>
                               </tbody>
                           </table>
                       </div>
                       <?php echo ($page); ?>
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

<script>
    function queren(){
        if(confirm("确认删除？")){
            return true;
        }else{
            return false;
        }
    }

</script>