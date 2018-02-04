<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/3 0003
 * Time: 上午 11:29
 */
namespace app\manager\model;
use think\Model;
class User extends Model{
    public static function getfind($map){
        return Db('user')->where('del',0)->where($map)->find();
    }
    public static function saves($id,$data){
        return Db('user')->strict(false)->where('id',$id)->update($data);
    }
}