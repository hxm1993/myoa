<?php
/**
 * Created by PhpStorm.
 * User: nankangkang
 * Date: 2017/11/27
 * Time: 14:00
 */
namespace Admin\Controller;
class NodeController extends CommonController {
    public function index() {
        $model = D('Node');
        $nodeList = $model->select();
        $this->assign('nodeList',$nodeList);
        $this->display();
    }
    public function add(){
        $model = D('Node');
        $nodes = $model->select();
        $this->assign('nodes',$nodes);
        $this->display();
    }
    public function addOk(){
        $model = D('Node');
        $data = $model->create("",1);
        dump($data);
//        exit;
        if($model->add($data)) {
            $this->error("节点添加成功","U('index')",3);
        }else {
            $this->error("节点添加失败","U('add')",3);
        }
    }
}