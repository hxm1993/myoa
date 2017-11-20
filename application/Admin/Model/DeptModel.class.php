<?php
/**
 * Created by PhpStorm.
 * User: nankangkang
 * Date: 2017/11/7
 * Time: 18:02
 */
namespace Admin\Model;
use Think\Model;
class DeptModel extends Model{
    //字段映射 在Controller中使用create方法（接收表单的所有数据）时，如果view中的表单项的名字和数据库表中的字段名字如果不一致，
    //会得不到数据，所以需要做字段映射
    protected $_map = array(
        //表单项name => 数据表中字段的名字
        'name' => 'dept_name',
        'pid' => 'dept_pid',
        'level' => 'dept_level',
        'sort' => 'dept_sort',
        'remark' => 'dept_remark'
    );
}