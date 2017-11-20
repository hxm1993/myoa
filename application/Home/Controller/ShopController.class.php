<?php
/**
 * Created by PhpStorm.
 * User: nankangkang
 * Date: 2017/11/6
 * Time: 17:02
 */
namespace Home\Controller;
use Think\Controller;
class ShopController extends Controller{
    public function show() {
        $this->display();
    }
    public function add() {
        echo "添加商品页";
    }
}