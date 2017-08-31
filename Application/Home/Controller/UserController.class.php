<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends BaseController {
    public function index(){
        if($_SESSION['muser']==null || $_SESSION['muser']== ''){
            $this->error("非法操作",U('Index/index'));
        }
        $this->assign("active_name","1");
        $this->display();
    }

    public function reg(){
        $m=M("user");
        $code = I('post.code');
        $email = I('post.email');
        $password = I('post.password');
        $name = I('post.truename');
        $codem = M("code");
        if($this->SiteInfo['userstatus'] ==1){
            $codeCheck = $codem->where("code = '{$code}' AND status = 0")->find();
        }else{
            $codeCheck = 1;
        }
        if($codeCheck>0){
            $emailCheck = $m->where("email = '{$email}'")->find();
            $nameCheck = $m->where("truename = '{$name}'")->find();
            if($emailCheck || $email == '' || $password == '' || $nameCheck){
                $this->error("邮箱，昵称不正确或者已经注册！");
            }else{
                $data = $m->create();
                unset($data['code']);
                $data['ip']=$_SERVER["REMOTE_ADDR"];
                $data['ctime']=time();
                $data['password']=md5($password);
                $data['lasttime']=time();
                $data['status']=0;
                $result = $m->add($data);
                if($result>0){
                    if($this->SiteInfo['userstatus'] ==1){
                        $codeData['status'] =1;
                        $codeData['user']=$email;
                        $codem->where("code = '{$code}'")->save($codeData);
                    }
                    $users = M("userinfo");
                    $usersdata['uid']=$result;
                    $usersdata['pic']='default.png';
                    $users->add($usersdata);
                    // 用户是否收到邮件
                    if(!$this->email_set['reg_set_user']){
                        $m = M('email_type');
                        $info= $m->find(1);
                        $this->MySmtp($email,$info['reg_user_title'],$info['reg_user_content']);
                    }
                    // 管理员是否收到邮件
                    if(!$this->email_set['reg_set_admin']){
                        $m = M('email_type');
                        $info= $m->find(1);
                        $info['reg_admin_content'] = $info['reg_admin_content']."<br/>用户邮箱：{$email}<br/>用户昵称：{$name}<br/>注册IP：{$data['ip']}";
                        $this->MySmtp($this->admin_email,$info['reg_admin_title'],$info['reg_admin_content']);
                    }
                    $this->success("注册成功，回去登陆");
                }else{
                    $this->error("注册失败，我也不知道为什么");
                }
            }
        }else{
            $this->error("邀请码不正确！");
        }
    }


    public function login(){
        $email = I('post.username');
        $password = md5($_POST['password']);
        $m=M("user");
        $result = $m->where("username = '{$email}' AND password = '{$password}'  AND status = 0")->find();
        if($result>0){
            $this->success("登陆成功！");
            $_SESSION['muser']=$result['truename'];
            $_SESSION['memail']=$result['email'];
            $_SESSION['mid']=$result['id'];
            $_SESSION['mlasttime']=$result['lasttime'];
            $m->where("id = {$result['id']}")->setField('lasttime',time());
            $_SESSION['mlastip']=$result['ip'];
            $m->where("id = {$result['id']}")->setField('ip',$_SERVER["REMOTE_ADDR"]);
        }else{
            $this->error("登陆失败！");
        }
    }

    public function logout(){
        $_SESSION['muser']=null;
        $_SESSION['memail']=null;
        $_SESSION['mid']=null;
        $this->success("退出成功！");
    }

    public function addArticle(){
        if($_SESSION['muser']==null || $_SESSION['muser']== ''){
            $this->error("非法操作",U('Index/index'));
        }else{
            $m=M("category");
            $arr = $m->where("fid != 0")->select();
            $this->assign("arr",$arr);
            $this->display();
        }

    }

    public function doAddArticle(){
        if($_SESSION['muser']==null || $_SESSION['muser']== ''){
            $this->error("非法操作",U('Index/index'));
        }else{
            $m=M("article");
            $data = $m->create();
            $data['uid']= $_SESSION['mid'];
            $data['ctime']=time();
            $data['edittime']=time();
            $data['view']=1;
            if($this->SiteInfo['articlesatus'] ==1){
                $data['status']=1;
            }else{
                $data['status']=0;
            }
            $data['content'] = $_POST['content'];

            /**
             * 查询分类类型
             */
            $res = M('category')->where(array('id'=>$data['fid']))->find();
            $data['type'] = $res['type'];


            $result = $m->add($data);
            if($result>0){
                if(!$this->email_set['send_article_set']){
                    $m = M('email_type');
                    $info= $m->find(1);
                    $url = "http://".$_SERVER['SERVER_NAME'].__MODULE__."/Article/index/id/".$result;
                    $info['send_article_content'] = $info['send_article_content']."<br/>发表文章标题：<a href = '".$url."' target = '_blank'>{$_POST['title']}</a>";
                    $this->MySmtp($this->admin_email,$info['send_article_title'],$info['send_article_content']);
                }
                $this->success("发布成功！");
            }else{
                $this->error("发布失败！");
            }
        }
    }

        public function updateArticle(){
            $id = I('get.id');
            if(empty($id)){
                $this->error("非法操作");
            }else{
                $m =M("article");
                $uid = $_SESSION['mid'];
                $m = M("article");
                $articleInfo = $m->find($id);
                if($articleInfo == null || $articleInfo['uid'] != $uid){
                    $this->error("再见了！");
                }else{
                    $m=M("fenlei");
                    $arr = $m->where("fid != 0")->select();
                    $this->assign("arr2",$arr);
                    $this->assign("arr",$articleInfo);
                    $this->display();
                }
            }
        }

        public function doUpdateArticle(){
            $id = I('get.id');
            $uid = $_SESSION['mid'];
            $m = M("article");
            $articleInfo = $m->find($id);
            if(empty($id) || $articleInfo == null || $articleInfo['uid'] != $uid){
                $this->error("坐飞机了");
            }else{
                $data = $m->create();
                $data['edittime']=time();
                if($fidInfo['type']==2 && $_FILES['mp3']['name'] != ''){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     20971520 ;// 设置附件上传大小
                $upload->exts      =     array('mp3', 'wam', 'wma', 'aac','mod','cd');// 设置附件上传类型
                $upload->rootPath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传文件
                $info   =   $upload->uploadOne($_FILES['mp3']);
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{
                    $data['mp3']=$info['savepath'].$info['savename'];
                }
            }elseif($fidInfo['type']==2 && $_FILES['mp3']['name'] == ''){
                unset($data['mp3']);
            }
            if($_FILES['pic']['name'] != ''){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传文件
                $info   =   $upload->uploadOne($_FILES['pic']);
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{// 上传成功
                    $data['pic']=$info['savepath'].$info['savename'];
                }
            }else{
                unset($data['pic']);
            }
            $data['content'] = $_POST['content'];
            $result = $m->where("id = {$id}")->save($data);
            if($result == false){
                $this->error("更新失败！");
            }else{
                $this->success("更新成功！");
            }
            }
        }

        public function userInfo(){
            if($_SESSION['muser']==null || $_SESSION['muser']== ''){
                $this->error("非法操作",U('Index/index'));
            }
            $m=M("user");
            $userid = $_SESSION['mid'];
            $userInfo = $m->where("id={$userid}")->find();
            $this->assign("userInfo",$userInfo);
            $mm =M("userinfo");
            $userPic = $mm->where("uid={$userid}")->find();
            $this->assign("userPic",$userPic['pic']);
            $this->display();
        }

        public function changePass(){
            if($_SESSION['muser']==null || $_SESSION['muser']== ''){
                $this->error("非法操作",U('Index/index'));
            }
            $one = $_POST['passone'];
            $two = $_POST['passtwo'];
            if($one != $two || $one == '' || $two == ''){
                $this->error("对不起，两次密码不一致");
            }else{
                $m=M("user");
                $id = $_SESSION['mid'];
                $pass = md5($one);
                $result = $m->where("id={$id}")->setField('password',$pass);
                if($result>0){
                    $this->success("修改成功!");
                }else{
                    $this->error("修改失败！");
                }
            }
        }

        public function detail(){
            if($_SESSION['muser']==null || $_SESSION['muser']== ''){
                $this->error("非法操作",U('Index/index'));
            }
            $id = $_SESSION['mid'];
            $m = M("userinfo");
            $arr = $m->where("uid = {$id}")->find();
            $this->assign("arr",$arr);
            $this->display();
        }


        public function saveDetail(){
            if($_SESSION['muser']==null || $_SESSION['muser']== ''){
                $this->error("非法操作",U('Index/index'));
            }
            $id = $_SESSION['mid'];
            $m=M("userinfo");
            $result=$m->where("uid = {$id}")->save($m->create());
            if($result>0){
                $this->success("更新成功！");
            }else{
                $this->error("更新失败！");
            }
        }


        public function liuyan(){
            if($_SESSION['muser']==null || $_SESSION['muser']== ''){
                $this->error("非法操作",U('Index/index'));
            }
            $id = $_SESSION['mid'];
            $m=M("blogliuyan");
            $arr = $m->where("uid = {$id}")->select();
            $this->assign("arr",$arr);
            $this->display();
        }

        public function gonggao(){
            if($_SESSION['muser']==null || $_SESSION['muser']== ''){
                $this->error("非法操作",U('Index/index'));
            }
            $m = M("gonggao");
            $arr = $m->select();
            $this->assign("arr",$arr);
            $this->display();
        }

        public function myArticle(){
            if($_SESSION['muser']==null || $_SESSION['muser']== ''){
                $this->error("非法操作",U('Index/index'));
            }
            $uid = $_SESSION['mid'];
            $m = M("article");
            $map['uid'] = $uid;
            $map['status'] = 0;
            if(IS_POST){
                $keywords = I("post.keywords");
                $map['title'] = array("like","%{$keywords}%");
            }
            $count      = $m->where($map)->count();//
            $Page       = new \Think\Page($count,10);//
            $show       = $Page->show();//
            $articleList = $m->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('page',$show);// 赋值分页输出
            $this->assign("articleList",$articleList);
            $this->assign("active_name","3");
            $this->display();
        }


        public function delArticle(){
            if($_SESSION['muser']==null || $_SESSION['muser']== ''){
                $this->error("非法操作",U('Index/index'));
            }
            $uid = $_SESSION['mid'];
            $id = I('get.id');
            $m = M("article");
            $articleInfo= $m->where("id = {$id}")->find();
            if($articleInfo['uid'] != $uid){
                $this->error("非法操作",U('Index/index'));
            }else{
                $result = $m->where("id = {$id}")->setField('status',1);
                if($result>0){
                    $this->success("删除成功！");
                }else{
                    $this->error("删除失败！");
                }
            }
        }


        /*富文本编辑器上传方法*/
        public function doUploadPic(){
            if($_SESSION['muser']==null || $_SESSION['muser']== ''){
                $this->error("非法操作",U('Index/index'));
            }
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
                // 上传文件
                $info   =   $upload->upload();
                if(!$info) {// 上传错误提示错误信息
                    $data['success'] = false;
                    $data['msg'] = $upload->getError();
                    $data['file_path'] = '';
                    $this->ajaxReturn($data);
                }else{// 上传成功
                    $data['success'] = true;
                    $data['msg'] = '上传成功么么哒';
                    $data['file_path'] = __ROOT__.'/Public/Uploads/'.$info['upload_file']['savepath'].$info['upload_file']['savename'];
                    $this->ajaxReturn($data);
                }
        }
        /*富文本编辑器上传方法*/
        public function pic_upload(){
            if($_SESSION['muser']==null || $_SESSION['muser']== ''){
                $this->error("非法操作",U('Index/index'));
            }
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
            // 上传文件
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $data['success'] = false;
                $data['msg'] = $upload->getError();
                $data['file_path'] = '';
                $this->ajaxReturn($data);
            }else{// 上传成功
                $data['success'] = true;
                $data['msg'] = '上传成功么么哒';
                $data['name'] = $info['mypic0']['savename'];
                $data['size'] = round($info['mypic0']['size']/1024,2);
                $data['file_path'] = __ROOT__.'/Public/Uploads/'.$info['mypic0']['savepath'].$info['mypic0']['savename'];
                $this->ajaxReturn($data);
            }
        }
        /*音乐文件上传方法*/
        public function music_upload(){
            if($_SESSION['muser']==null || $_SESSION['muser']== ''){
                $this->error("非法操作",U('Index/index'));
            }
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('mp3', 'wam', 'wma', 'aac','mod','cd');// 设置附件上传类型
                $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
                // 上传文件
                $info   =   $upload->upload();
                if(!$info) {// 上传错误提示错误信息
                    $data['success'] = false;
                    $data['msg'] = $upload->getError();
                    $data['file_path'] = '';
                    $this->ajaxReturn($data);
                }else{// 上传成功
                    $data['success'] = true;
                    $data['name'] = $info['mypic']['savename'];
                    $data['msg'] = '上传成功么么哒';
                    $data['size'] = round($info['mypic']['size']/1024,2);
                    $data['file_path'] = __ROOT__.'/Public/Uploads/'.$info['mypic']['savepath'].$info['mypic']['savename'];
                    $this->ajaxReturn($data);
                }
        }

        /*附件文件上传方法*/
        public function file_upload(){
            if($_SESSION['muser']==null || $_SESSION['muser']== ''){
                $this->error("非法操作",U('Index/index'));
            }
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('rar', 'zip', 'doc', 'pdf');// 设置附件上传类型
                $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
                // 上传文件
                $info   =   $upload->upload();
                if(!$info) {// 上传错误提示错误信息
                    $data['success'] = false;
                    $data['msg'] = $upload->getError();
                    $data['file_path'] = '';
                    $this->ajaxReturn($data);
                }else{// 上传成功
                    $data['success'] = true;
                    $data['name'] = $info['mypic11']['savename'];
                    $data['msg'] = '上传成功么么哒';
                    $data['size'] = round($info['mypic11']['size']/1024,2);
                    $data['file_path'] = __ROOT__.'/Public/Uploads/'.$info['mypic11']['savepath'].$info['mypic11']['savename'];
                    $this->ajaxReturn($data);
                }
        }

        /*视频文件上传方法*/
        public function video_upload(){
            if($_SESSION['muser']==null || $_SESSION['muser']== ''){
                $this->error("非法操作",U('Index/index'));
            }
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('mp4', 'avi', 'wmv', 'mov','flv','3gp','navi','mkv');// 设置附件上传类型
                $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
                // 上传文件
                $info   =   $upload->upload();
                if(!$info) {// 上传错误提示错误信息
                    $data['success'] = false;
                    $data['msg'] = $upload->getError();
                    $data['file_path'] = '';
                    $this->ajaxReturn($data);
                }else{// 上传成功
                    $data['success'] = true;
                    $data['name'] = $info['mypic22']['savename'];
                    $data['msg'] = '上传成功么么哒';
                    $data['size'] = round($info['mypic22']['size']/1024,2);
                    $data['file_path'] = __ROOT__.'/Public/Uploads/'.$info['mypic22']['savepath'].$info['mypic22']['savename'];
                    $this->ajaxReturn($data);
                }
        }










        }
