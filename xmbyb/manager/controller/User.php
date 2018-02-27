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
    public function Creates(){
       $DeptID=input('DeptID');
       $StationID=input('StationID');
       $rolediv=input('rolediv');
       $User_Name=input('User_Name');
       $User_Pwd=input('User_Pwd');
       $RealName=input('RealName');
       $Email=input('Email');
       $UserCer=input('UserCer');
       $UserPhone=input('UserPhone');
       $StopTrade=input('StopTrade');
       $EntrustNum=input('EntrustNum');
       $data['DeptID']=$DeptID;
       $data['StationID']=$StationID;
       $data['rolediv']=$rolediv;
       $data['User_Name']=$User_Name;
       $data['User_Pwd']=$User_Pwd;
       $data['RealName']=$RealName;
       $data['Email']=$Email;
       $data['UserCer']=$UserCer;
       $data['UserPhone']=$UserPhone;
       $data['StopTrade']=$StopTrade;
       $data['EntrustNum']=$EntrustNum;
       $data['del']=0;
       $row=Db('user_management')->strict(false)->insert($data);
       if($row){
           $arr['res']='success';
       }else{
           $arr['res']='error';
       }
       return json($arr);

    }
    public function CheckUserLimit(){

    }
    public function UserInfoCheck(){

    }
    public function GetStaionByDept(){}


}