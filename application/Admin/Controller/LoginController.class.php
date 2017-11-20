<?php
/**
 * Created by PhpStorm.
 * User: nankangkang
 * Date: 2017/11/7
 * Time: 16:57
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Think;

class LoginController extends Controller{
    public function login() {
        $this->display();
    }

    public function verify() {
        $arr = array(
            'length'    =>  4,               // 验证码位数
            'bg'        =>  array(0, 251, 0),  // 背景颜色
            'useCurve'  =>  false,            // 是否画混淆曲线
            'useNoise'  =>  false,            // 是否添加杂点
            'fontttf'   =>  '1.ttf',              // 验证码字体，不设置随机获取
        );
        $verify = new \Think\Verify($arr);
        $verify->myEntry();
    }

    public function loginCheck() {
        $username = I('post.username');
        $password = I('post.password');
        $yzm = I('post.yzm');
        $model = D('User');

        $verify = new \Think\Verify();
        if(!$verify->check($yzm)) {
            $this->error("验证码错误！",U('login'),3);
        }

        if($model->loginCheck($username,$password)) {
            $this->success("登录成功！",U('Main/index'),3);
        }else {
            $this->error("用户名或密码错误！",U('login'),3);
        }
    }

    public function loginOut() {
        echo 'aaa';
    }
}