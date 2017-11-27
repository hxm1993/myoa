<?php
/**
 * Created by PhpStorm.
 * User: nankangkang
 * Date: 2017/11/27
 * Time: 14:54
 */
namespace Admin\Controller;
class RoleController extends CommonController {
    public function index() {
        $model = D('Role');
        $roleList = $model->select();
        $this->assign('roleList',$roleList);
        $this->display();
    }
    public function distribute() {
        $model = D('Node');
        $nodeList = $model->select();
//        $id = I("get.id");
//        $this->assign('rid',$id);
        $this->assign('nodeList',$nodeList);
        $this->display();
    }
    public function distributeOk() {
        $ids = I('get.ids');
        $rid = I('get.rid');

        $model = D('Role');
        $node = D('Node');
        $nodes = $node->select($ids);
        $str = "";
        foreach($nodes as $val) {
            if($val['node_path'] != 'null') {
                $str .= $val['node_path'] . ",";
            }
        }
        $str = substr($str,0,strlen($str) -1);
        echo $str;
        $arr = array(
            role_id => $rid,
            role_ids => $ids,
            role_paths => $str
        );
//        dump($arr);
//        exit;
        if($model->save($arr)) {
            $this->success("权限分配成功",U('index'),3);
        }else {
            $this->success("权限分配失败",U('index'),3);
        }

    }
}