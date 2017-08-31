<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>发布文章-<?php echo ($SiteInfo["title"]); ?></title>
  <link href="/Public/Default/css/bootstrap.min.css" rel="stylesheet">
  <link href="/Public/Default/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="/Public/Default/simditor/styles/simditor.css">
  <link rel="stylesheet" href="/Public/Default/simditor/styles/simditor-markdown.css">
</head>
<style type="text/css">
.btn,.btn0,.btn1,.btn2{position: relative;overflow: hidden;margin-right: 4px;display:inline-block;*display:inline;padding:4px 10px 4px;font-size:14px;line-height:18px;*line-height:20px;color:#fff;text-align:center;vertical-align:middle;cursor:pointer;background-color:#5bb75b;border:1px solid #cccccc;border-color:#e6e6e6 #e6e6e6 #bfbfbf;border-bottom-color:#b3b3b3;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;}
.btn input,.btn0 input,.btn1 input,.btn2 input{position: absolute;top: 0; right: 0;margin: 0;border: solid transparent;opacity: 0;filter:alpha(opacity=0); cursor: pointer;}
.progress,.progress0,.progress1,.progress2 { position:relative; margin-left:100px; margin-top:-24px; width:200px;padding: 1px; border-radius:3px; display:none}
.bar,.bar1,.bar2,.bar0{background-color: green; display:block; width:0%; height:20px; border-radius: 3px; }
.percent,.percent0,.percent1,.percent2 { position:absolute; height:20px; display:inline-block; top:3px; left:2%; color:#fff }
.files,.files0,.files1,.files2{height:22px; line-height:22px; margin:10px 0}
.delimg,.delimg0,.delimg1,.delimg2{margin-left:20px; color:#090; cursor:pointer}

</style>
<body style="background:url(/Public/Default/user/img/bg-02.jpg)">

  <center><h1><a href="<?php echo U('User/index');?>"  style="color: #fff;">返回会员中心</a></h1></center>
      <form class="form-horizontal" action="<?php echo U('User/doAddArticle');?>" method="post" enctype="multipart/form-data">
        <div class="row" style="margin-top: 100px;">
          <div class="col-lg-1"></div>
          <div class="col-lg-6">
            <div class="mail-box">
              <div class="mail-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">标题：</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" require id="title"></div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <div class="row">
                        <label class="col-sm-2 control-label">查看文章密码：</label>
                        <div class="col-md-4">
                          <input class="form-control" type="text" placeholder="没有密码留空即可" name="articlepassword">
                        </div>
                        <label class="col-sm-2 control-label">封面是否显示：</label>
                        <div class="col-md-4">
                          <select name="viewtumb" id="" class="form-control">
                            <option value="0" selected="true">是</option>
                            <option value="1">否</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">分类：</label>
                    <div class="col-sm-10">
                      <select name="fid" id="" require id="fidss" class="form-control" onchange="change(this)">
                        <?php if(is_array($arr)): foreach($arr as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" type="<?php echo ($vo["type"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                      </select>
                    </div>
                  </div>
                  <!--<div class="form-group">-->
                    <!--<label class="col-sm-2 control-label">图片：</label>-->
                    <!--<div class="col-sm-10">-->
                      <!--<input type="file" value="" name="pic" accept="image/*"></div>-->
                    <!--</div>-->
                      <div class="clearfix"></div>
                      <div class="form-group" style="margin-top: 10px;">
                        <div class="col-sm-12">
                          <textarea id="editor" placeholder="这里输入内容" autofocus = "true" name="content"></textarea>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                    <div class="mail-box">
                        <div class="mail-body">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    封面图片
                                </div>
                                <div class="panel-body">
                                    <p>支持类型：jpg, gif, png, jpeg（可以手动添加URL地址）</p>
                                    <div class="btn0">
                                        <span>添加图片</span>
                                        <input id="fileupload0" type="file" name="mypic0">
                                    </div>
                                    <div class="files0"></div>
                                    <div class="form-group">
                                        <!--<label class="col-sm-2 control-label"></label>-->
                                        <div class="col-sm-12">
                                            <input class="form-control" name="pic" id = "article_pic"  type="text"></div>
                                    </div>
                                    <div class="progress0">
                                        <span class="bar0"></span><span class="percent0">0%</span >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                <div class="mail-box">
                  <div class="mail-body">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                        音乐文件(需要当前主题支持音乐文章 30M以内)
                        </div>
                        <div class="panel-body">
                            <p>支持类型：mp3, wam, wma, aac,mod,cd（可以手动添加URL地址）</p>
                            <div class="btn">
                                  <span>添加音乐</span>
                                  <input id="fileupload" type="file" name="mypic">
                              </div>
                              <div class="files"></div>
                              <div class="form-group">
                            <!--<label class="col-sm-2 control-label">地址：</label>-->
                            <div class="col-sm-12">
                              <input class="form-control" name="mp3" id = "article_mp3"  type="text"></div>
                            </div>
                              <div class="progress">
                              <span class="bar"></span><span class="percent">0%</span >
                          </div>
                        </div>
                    </div>
                  </div>
                </div>


                <div class="mail-box">
                  <div class="mail-body">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                        附件文件(需要当前主题支持附件 30M以内)
                        </div>
                        <div class="panel-body">
                            <p>支持类型：rar, zip, doc, pdf（可以手动添加URL地址）</p>
                            <div class="btn1">
                                  <span>添加附件</span>
                                  <input id="fileupload1" type="file" name="mypic11">
                              </div>
                              <div class="files1"></div>
                              <div class="form-group">
                            <!--<label class="col-sm-2 control-label">地址：</label>-->
                            <div class="col-sm-12">
                              <input class="form-control" name="file"  type="text" id = "article_file"></div>
                            </div>
                              <div class="progress1">
                              <span class="bar1"></span><span class="percent1">0%</span >
                          </div>
                        </div>
                    </div>
                  </div>
                </div>


                <div class="mail-box">
                  <div class="mail-body">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                        视频文件(需要当前主题支持附件 30M以内)
                        </div>
                        <div class="panel-body">
                            <p>支持类型：mp4, avi, wmv, mov,flv,3gp,navi,mkv（可以手动添加URL地址）</p>
                            <div class="btn2">
                                  <span>添加附件</span>
                                  <input id="fileupload2" type="file" name="mypic22">
                              </div>
                              <div class="files2"></div>
                              <div class="form-group">
                            <!--<label class="col-sm-2 control-label">地址：</label>-->
                            <div class="col-sm-12">
                              <input class="form-control" name="video"  type="text" id = "article_video"></div>
                            </div>
                              <div class="progress2">
                              <span class="bar2"></span><span class="percent2">0%</span >
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-1"></div>
              </div>
              <div class="mail-body text-center tooltip-demo">
                        <button class="btn btn-primary btn-lg" id="adds" type="submit" style="width: 100px;height: 50px;">发布</button>
                      </div>
                  </form>




        <!-- 正文结束 -->

        <!-- 调用脚部文件 -->
      </body>
      </html>

      <script src="/Public/Default/user/js/jquery-1.11.3.min.js"></script>
      <script type="text/javascript" src="/Public/Default/simditor/scripts/module.js"></script>
      <script type="text/javascript" src="/Public/Default/simditor/scripts/uploader.js"></script>
      <script type="text/javascript" src="/Public/Default/simditor/scripts/hotkeys.js"></script>
      <script type="text/javascript" src="/Public/Default/simditor/scripts/simditor.js"></script>
      <script type="text/javascript" src="/Public/Default/simditor/scripts/marked.js"></script>
      <script type="text/javascript" src="/Public/Default/simditor/scripts/to-markdown.js"></script>
      <script type="text/javascript" src="/Public/Default/simditor/scripts/simditor-markdown.js"></script>

      <script type="text/javascript" src="/Public/Default/webuploader/jquery.form.js"></script>

      <script>
        var editor = new Simditor({
          textarea: $('#editor'),
          upload:{
            url: "<?php echo U('User/doUploadPic');?>",
            params: null,
            fileKey: 'upload_file',
            connectionCount: 3,
            leaveConfirm: '正在上传文件，如果离开上传会自动取消'
          },
          markdown: false,
          toolbar: [
          'title',
          'bold',
          'italic',
          'underline',
          'strikethrough',
          'fontScale',
          'color',
          'ol',
          'ul',
          'blockquote',
          'code',
          'table',
          'link',
          'image',
          'hr',
          'alignment',
          'markdown'
          ]
        });
      </script>
<script type="text/javascript">
    $(function () {
        var bar = $('.bar0');
        var percent = $('.percent0');
        var progress = $(".progress");
        var files = $(".files0");
        var btn = $(".btn0 span");
        var file_input = $("#article_pic");
        $("#fileupload0").wrap("<form id='myupload0' action='<?php echo U('User/pic_upload');?>' method='post' enctype='multipart/form-data'></form>");
        $("#fileupload0").change(function(){
            $("#myupload0").ajaxSubmit({
                dataType:  'json',
                beforeSend: function() {
                    var percentVal = '0%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                    btn.html("上传中...");
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                },
                success: function(data) {
                    if(data.success){
                        files.html("<b>"+data.name+"("+data.size+"k)</b>");
                        file_input.val(data.file_path);
                        btn.html("添加附件");
                    }else{
                        btn.html(data.msg+"点击重新上传");
                        bar.width('0');
                        files.html(xhr.responseText);
                    }

                },
                error:function(xhr){
                    btn.html("上传失败");
                    bar.width('0')
                }
            });
        });

    });
</script>
<script type="text/javascript">
$(function () {
  var bar = $('.bar');
  var percent = $('.percent');
  var progress = $(".progress");
  var files = $(".files");
  var btn = $(".btn span");
   var file_input = $("#article_mp3");
  $("#fileupload").wrap("<form id='myupload' action='<?php echo U('User/music_upload');?>' method='post' enctype='multipart/form-data'></form>");
    $("#fileupload").change(function(){
    $("#myupload").ajaxSubmit({
      dataType:  'json',
      beforeSend: function() {
            var percentVal = '0%';
            bar.width(percentVal);
            percent.html(percentVal);
        btn.html("上传中...");
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
      success: function(data) {
        if(data.success){
          files.html("<b>"+data.name+"("+data.size+"k)</b>");
          file_input.val(data.file_path);
          btn.html("添加附件");
        }else{
          btn.html(data.msg+"点击重新上传");
          bar.width('0');
          files.html(xhr.responseText);
        }

      },
      error:function(xhr){
        btn.html("上传失败");
        bar.width('0')
      }
    });
  });

});
</script>
<script type="text/javascript">
$(function () {
  var bar = $('.bar1');
  var percent = $('.percent1');
  var progress = $(".progress1");
  var files = $(".files1");
  var btn = $(".btn1 span");
  var file_input = $("#article_file");
  $("#fileupload1").wrap("<form id='myupload1' action='<?php echo U('User/file_upload');?>' method='post' enctype='multipart/form-data'></form>");
    $("#fileupload1").change(function(){
    $("#myupload1").ajaxSubmit({
      dataType:  'json',
      beforeSend: function() {
            var percentVal = '0%';
            bar.width(percentVal);
            percent.html(percentVal);
        btn.html("上传中...");
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
      success: function(data) {
        if(data.success){
          files.html("<b>"+data.name+"("+data.size+"k)</b>");
          file_input.val(data.file_path)
          btn.html("添加附件");
        }else{
          btn.html(data.msg+"点击重新上传");
          bar.width('0');
        }
      },
      error:function(xhr){
        btn.html("上传失败");
        bar.width('0')
        files.html(xhr.responseText);
      }
    });
  });

});
</script>
<script type="text/javascript">
$(function () {
  var bar = $('.bar2');
  var percent = $('.percent2');
  var progress = $(".progress2");
  var files = $(".files2");
  var btn = $(".btn2 span");
  var file_input = $("#article_video");
  $("#fileupload2").wrap("<form id='myupload2' action='<?php echo U('User/video_upload');?>' method='post' enctype='multipart/form-data'></form>");
    $("#fileupload2").change(function(){
    $("#myupload2").ajaxSubmit({
      dataType:  'json',
      beforeSend: function() {
            var percentVal = '0%';
            bar.width(percentVal);
            percent.html(percentVal);
        btn.html("上传中...");
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
      success: function(data) {
        if(data.success){
          files.html("<b>"+data.name+"("+data.size+"k)</b>");
          file_input.val(data.file_path)
          btn.html("添加附件");
        }else{
          btn.html(data.msg+"点击重新上传");
          bar.width('0');
        }
      },
      error:function(xhr){
        btn.html("上传失败");
        bar.width('0')
        files.html(xhr.responseText);
      }
    });
  });

});
</script>