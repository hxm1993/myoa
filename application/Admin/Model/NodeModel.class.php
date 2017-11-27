<?php
/**
 * Created by PhpStorm.
 * User: nankangkang
 * Date: 2017/11/27
 * Time: 14:12
 */
namespace Admin\Model;
use Think\Model;
class NodeModel extends Model {
    protected $pk               =   'node_id';
    protected $fields           =   array(
        'node_id','node_name','node_title','node_pid','node_modul','node_controller','node_action',
        'node_path','node_level','node_sort','node_show'
    );
    protected $_map             =   array(
        'name' => 'node_name',
        'title' => 'node_title',
        'pid' => 'node_pid',
        'modul' => 'node_modul',
        'controller' => 'node_controller',
        'action' => 'node_action',
        'path' => 'node_path',
        'level' => 'node_level',
        'sort' => 'node_sort',
        'show' => 'node_show'
    );  // 字段映射定义
}