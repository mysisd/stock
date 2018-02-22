<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/22 0022
 * Time: 下午 1:50
 */

namespace app\manager\controller;
use think\Controller;
use app\common\helper\Verify;
use think\Db;

class Trade extends Controller{
    public function trade(){
        $row=Db('trading_account')->select();
        $this->assign('data',$row);
        echo $this->fetch();
    }
    public function create(){
        echo $this->fetch();
    }
    public function List(){

    }
    public function ChangeStatus(){

    }


}