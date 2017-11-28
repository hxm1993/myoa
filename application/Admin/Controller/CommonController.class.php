<?php
/**
 * Created by PhpStorm.
 * User: nankangkang
 * Date: 2017/11/16
 * Time: 18:24
 */
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{
    public function _initialize() {
//        $path = __ACTION__;
//        $allPath = session('allowPath');
//        $path = substr($path,1);
//        $path = explode("/",$path);
//        $newPath = "";
//        foreach($path as $v) {
//            $newPath .= $v."-";
//        }
//        $newPath = substr($newPath,0,strlen($newPath) - 1);
//        if(!in_array($newPath,$allPath)) {
//            $this->redirect('Login/login', "", 2, '您没有权限访问该页面，请重新登录！');
//        }


        if(!session('?name')) {
            $this->error('您尚未登录，请去登录页面！',U('Login/login'),3);
        }
    }
}