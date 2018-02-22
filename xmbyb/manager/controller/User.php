<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/22 0022
 * Time: 下午 2:04
 */

namespace app\manager\controller;
use think\Controller;

class User extends Controller{
    public function SysUser(){
        echo $this->fetch();
    }
    public function Create(){
        echo $this->fetch();
    }
    public function CheckUserLimit(){

    }

}