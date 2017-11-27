<?php
/**
 * Created by PhpStorm.
 * User: nankangkang
 * Date: 2017/11/13
 * Time: 13:55
 */
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
    protected $pk = 'user_id';
    protected $fields = array(
        'user_id','user_name','user_nickname','user_password','user_dept','user_sex','user_birthday','user_tel','user_email','user_ctime'
    );
    protected $_map = array(
        'name' => 'user_name',
        'nickname' => 'user_nickname',
        'password' => 'user_password',
        'dept' => 'user_dept',
        'sex' => 'user_sex',
        'birthday' => 'user_birthday',
        'tel' => 'user_tel',
        'email' => 'user_email'
    );
    // 自动验证定义
    protected $_validate =   array(
        array('user_name','name','用户名必须是4-12位字母数字下划组合',1,'regex',3),
        array('user_nickname','require','昵称不能为空',1,'regex',3),
        array('user_password','password','密码必须是6-12位字母数字下划组合',1,'regex',3),
        array('re-password','user_password','两次密码不同',1,'confirm',3),
        array('user_sex','sexCheck','性别不正确',1,'function',3),
        array('user_birthday','birthdayCheck','生日不正确',1,'function',3),
        array('user_tel','tel','手机号码格式不正确',1,'regex',3),
        array('user_email','email','邮箱不正确',1,'regex',3)
    );
    // 自动完成定义
    protected $_auto =   array(
        array('user_ctime','getTime',3,'callback'),
        array('user_password','md5',3,'callback'),
    );

    function getTime() {
        return date('Y-m-d',time());
    }

    function md5($data) {
        return md5($data);
    }

    public function loginCheck($name,$psw) {
        if(empty($name) || empty($psw)) {
            return false;
        }

        $info = $this->where("user_name = '$name'")->find();
        if(empty($info)) {
            return false;
        }else {
            if(md5($psw ) === $info['user_password']) {
                session('name',$name);
                session('id',$info['user_id']);
                session('dept',$info['user_dept']);
                session('nickname',$info['user_nickname']);

//                //根据当前用户的user_role，找到oa_role中对应的role的信息
//                $role = D('Role');
//                $roleInfo= $role->find($info['user_role']);
//                $roleIds = $roleInfo['role_ids'];
//                //根据role_ids找到对应的节点
//                $node = D('Node');
//                $nodeInfo = $node->select($roleIds);
//                dump($node);


//                session('')
                return true;
            }else {
                return false;
            }
        }
    }
}