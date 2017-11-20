<?php
/**
 * Created by PhpStorm.
 * User: nankangkang
 * Date: 2017/11/9
 * Time: 9:15
 */
//$data = array(
//    array('id'=>'1','name'=>'人事部','pid'=>0,'level'=>'0'),
//    array('id'=>'2','name'=>'市场部','pid'=>0,'level'=>'0'),
//    array('id'=>'3','name'=>'技术部','pid'=>0,'level'=>'0'),
//    array('id'=>'4','name'=>'财务部','pid'=>0,'level'=>'0'),
//    array('id'=>'5','name'=>'开发部','pid'=>3,'level'=>'1'),
//    array('id'=>'6','name'=>'测试部','pid'=>3,'level'=>'1'),
//    array('id'=>'7','name'=>'java','pid'=>5,'level'=>'2'),
//    array('id'=>'8','name'=>'php','pid'=>5,'level'=>'2'),
//    array('id'=>'9','name'=>'白盒测试','pid'=>6,'level'=>'2'),
//    array('id'=>'10','name'=>'黑盒测试','pid'=>6,'level'=>'2')
//);

function getDeptTree($data,$pid = 0) {
    static $arr=[];
        foreach($data as $v) {
            if($pid == $v[dept_pid]) {
                $arr[] = $v;
                getDeptTree($data,$v[dept_id]);
            }
        }
    return $arr;
}
//$test = getDeptTree($data);
//var_dump($test);