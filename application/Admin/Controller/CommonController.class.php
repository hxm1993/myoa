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
        if(!session('?name')) {
            $this->error('您尚未登录，请去登录页面！',U('Login/login'),3);
        }
    }
}