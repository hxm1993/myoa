<?php
/**
 * Created by PhpStorm.
 * User: nankangkang
 * Date: 2017/11/19
 * Time: 15:11
 */
namespace Admin\Model;
use \Think\Model;
class DocModel extends Model{
    protected $pk = 'doc_id';
    protected $fields = array(
        'doc_id','doc_title','doc_content','doc_author','doc_ctime','doc_file'
    );
    protected $_map = array(
        'title' => 'doc_title',
        'content' => 'doc_content'
    );
    protected $_validate        =   array(
        array('doc_title','require',"标题不能为空！",1,'regex',3),
        array('doc_content','require',"内容不能为空！",1,'regex',3)
    );
    protected $_auto            =   array(
        array('doc_author','getSessionId',3,'function'),
        array('doc_ctime','getCtime',3,'function')
    );
}