<?php
/**
 * Created by PhpStorm.
 * User: nankangkang
 * Date: 2017/11/13
 * Time: 13:54
 */
namespace Admin\Controller;
//use Think\Controller;
class UserController extends CommonController{
    public function index() {
        $model = D('User');
        $pageSize = C('PAGESIZE');
        $data = $model->page(I('get.p'),$pageSize)->select();
        $this->assign('list',$data);

        //得到总的记录数
        $count = $model->count();
        //使用tp Page实现分页
        $page = new \Think\Page($count,1);
        $show = $page->show();
        $this->assign('show',$show);

        //使用ajax实现分页
        $this->assign('count',$count);
        $this->assign('pageSize',$pageSize);
        $this->display();
    }

    public function add() {
        $this->display();
    }

    public function addOk(){
        $model = D('User');
        //create方法的第二个参数可以指定创建数据的操作状态，默认情况下是自动判断是写入(1)还是更新操作(2)。
        $data = $model->create('',1);
        if(!$data) {
            dump($model->getError());
        }else {
            if($model->add($data)) {
                $this->success("添加职员成功!",U('index'),3);
            }else {
                $this->error("添加职员失败!",U('index'),3);
            }
        }
    }

    //使用ajax获取每页的内容
    public function getContent() {
        $model = D(User);
        $pageSize = C('PAGESIZE');
        $data = $model->page(I("get.currentPage"),$pageSize)->select();
        $this->assign('list',$data);
        //$this->display();
        //或者：$fetch()
        $showmsg = $this->fetch();
        echo $showmsg;
    }

    public function charts() {
        $sql = "select d.dept_name,count(*) as num from oa_user as u join oa_dept as d on u.user_dept = d.dept_id group by u.user_dept";
        $model = D();
        $data = $model->query($sql);
        $str = "";
        foreach($data as $val) {
            $str .= "['".$val['dept_name']."',".$val['num']."],";
        }
        $this->assign("str",$str);
        $this->display();
    }
}