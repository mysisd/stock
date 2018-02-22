<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/22 0022
 * Time: 下午 2:25
 */

namespace app\manager\controller;
use think\Controller;

class Role extends Controller{
    public function SysRole(){
        echo $this->fetch();
    }
    public function GetList(){

    }
    public function Create(){
        echo $this->fetch();
    }


}