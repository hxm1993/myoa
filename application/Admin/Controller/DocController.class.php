<?php
/**
 * Created by PhpStorm.
 * User: nankangkang
 * Date: 2017/11/19
 * Time: 15:10
 */
namespace Admin\Controller;
class DocController extends CommonController{
    public function index() {
        $docModel = D('Doc');
        $list = $docModel->select();
        $this->assign("list",$list);
//        dump($list);

        $this->display();
    }

    public function download() {
        $id = I('get.id');
        $docModel = D('Doc');
        $data = $docModel->find($id);
        $path = $data['doc_file'];



        header("Content-type: application/octet-stream");
        header('Content-Disposition: attachment; filename="' . basename($path) . '"');
        header("Content-Length: ". filesize($path));
        readfile($path);
    }


    public function add() {
        $this->display();
    }

    public function addOk() {
        $config = array(
            'maxSize'       =>  1024*1024*10, //上传的文件大小限制 (0-不做限制)
            'exts'          =>  array('doc','docx','txt','rar','jpg','png'), //允许上传的文件后缀
            'rootPath'      =>  './Uploads/', //保存根路径
        );

        $upload = new \Think\Upload($config);
        $res = $upload->upload();
        if(!$res) {
            echo $upload->getError();
            $path = 'kong';
        }else {
            $path = './Upload/'.$res['file']['savepath'].$res['file']['savename'];
        }


        //获取页面传来的数据
//        $data['title'] = i('post.title');
//        $data['content'] = i('post.content');
        $docModel = D('Doc');
        $data = $docModel->create('',1);
        $data['doc_file'] = $path;
        if($docModel->add($data)) {
            $this->success('添加公文成功！',U('index'),3);
        }else {
            $this->error('添加公文失败！',U('add'),3);
        }
    }

    public function upImage() {
        $config = array(
            'maxSize'       =>  1024*1024*10, //上传的文件大小限制 (0-不做限制)
            'exts'          =>  array('gif','jpg','png'), //允许上传的文件后缀
            'rootPath'      =>  './Uploads/images', //保存根路径
        );

        $upload = new \Think\Upload($config);
        $res = $upload->upload();
        if(!res) {
            echo $upload->getError();
        }else {
            dump($res);
        }
    }

    public function getContent() {
        $id = I('post.id');
        $docModel = D('Doc');
        $data = $docModel->find($id);
        $data['doc_content'] = htmlspecialchars_decode($data['doc_content']);
        echo json_encode($data);
    }
}