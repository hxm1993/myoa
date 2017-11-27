<?php
/**
 * Created by PhpStorm.
 * User: nankangkang
 * Date: 2017/11/7
 * Time: 17:24
 */
namespace Admin\Controller;
//use Think\Controller;
class MainController extends CommonController {
    public function index() {
        //根据当前用户id查找对应信息
        $uid = session('id');
        $user = D('User');
        $userInfo = $user->find($uid);
        //根据当前用户的user_role，找到oa_role中对应的role的信息
        $role = D('Role');
        $roleInfo= $role->find($userInfo['user_role']);
        $roleIds = $roleInfo['role_ids'];
        //根据role_ids找到对应的节点
        $node = D('Node');
        $nodeInfoA = $node->where("node_level = 0 and node_show = 1 and node_id in ($roleIds)")->select();
//        echo $node->getLastSql();
        $nodeInfoB = $node->where("node_level = 1 and node_show = 1 and node_id in ($roleIds)")->select();
//        dump($nodeInfoA);
//        dump($nodeInfoB);
        $this->assign('nodeInfoA',$nodeInfoA);
        $this->assign('nodeInfoB',$nodeInfoB);


        $this->display();
    }
}