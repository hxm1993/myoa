<?php
/**
 * Created by PhpStorm.
 * User: nankangkang
 * Date: 2017/11/7
 * Time: 18:01
 */
namespace Admin\Controller;
//use Admin\Model;
//use Think\Controller;
class DeptController extends CommonController{
//    public function test() {
//        $test = new \Admin\Tools\Shop();
//        $test->add();
//    }
    public function index() {
        $dept = D(Dept);
        $arr = $dept->select();
        $arr = getDeptTree($arr);
        $this->assign('arr',$arr);
        $this->display();
    }

    public function add() {
        $dept = D(Dept);
        $arr = $dept->select();
        $this->assign('arr',$arr);
        $this->display();
    }

    public function addOk() {
        $dept = D(Dept);
        $data = $dept->create();
        dump($data);
        exit;




        $name = I('post.name');
        $pid = I('post.pid');
        $level = I('post.level');
        $sort = I('post.sort');
        $remark = I('post.remark');
        $arr = array(
            dept_name => $name,
            dept_pid => $pid,
            dept_level => $level,
            dept_sort => $sort,
            dept_remark => $remark,
            dept_ctime => date('yyy-mm-dd',time())
        );
        $dept = D(Dept);
        if($dept->add($arr)) {
            $this->success("添加部门成功","index",3);
        }else {
            $this->error("添加部门失败",'add',3);
        }
    }

    public function getData() {
        $dept = D(Dept);
        $data = $dept->group('dept_pid')->field('dept_pid,count(*)')->select();
        echo $dept->getLastSql();
        dump($data);
    }

    public function Del() {
//        echo i('get.id');
        $id = I('get.id');
        $dept = D(Dept);
        if($dept->delete($id)) {
            $this->success("删除成功！",U('index'),3);
        }else {
            $this->success("删除失败！",U('index'),3);

        }
    }

    public function Edit() {
        $id=I('get.id');
        $dept = D('Dept');
        $info = $dept->find($id);

        $arr = $dept->select();
        $this->assign('arr',$arr);
        $this->assign('info',$info);
        $this->display();

    }

    public function Modify() {
        $arr = array(
            'dept_id' => I('post.id'),
            'dept_name' => I('post.name'),
            'dept_pid' => I('post.pid'),
            'dept_level' => I('post.level'),
            'dept_sort' => I('post.sort'),
            'dept_remark' => I('post.remark')
        );

        $dept = D('Dept');
        if($dept->save($arr)) {
            $this->success("修改成功！",U('index'),3);
        }else{
            $this->success("修改失败！",U('index'),3);
        }

    }
}