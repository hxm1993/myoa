<?php
/**
 * Created by PhpStorm.
 * User: nankangkang
 * Date: 2017/11/13
 * Time: 17:31
 */
function sexCheck($sex) {
    if($sex != '男' && $sex != '女') {
        return false;
    }
}

function birthdayCheck($date) {
    $birthArr = explode("-", $date);
    if($birthArr[0] < 1949 || $birthArr[0] > date('Y')) {
        return false;
    }
    if($birthArr[1] < 1 || $birthArr[1] > 12) {
        return false;
    }
    if($birthArr[2] < 1 || $birthArr[2] > 31) {
        return false;
    }

}

function getSessionId() {
    return session('id');
}

function getCtime() {
    return date('Y-m-d H-i-s',time());
}