<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/3 0003
 * Time: 上午 9:40
 */

namespace app\manager\controller;
use think\Controller;
use think\Rsa;
use app\common\helper\Verify;
use app\manager\model\User as UserModel;
class Index  extends Controller{
    public function index(){
        echo $this->fetch();
    }
    public function verify()
    {
        Verify::verify();
    }
    public function register(){

            echo $this->fetch();

    }
    public function login(){
        session(null);
        if(!empty($_POST['phone']) && !empty($_POST['password'])){
            $_POST['phone']    = Rsa::privDecrypt($_POST['phone']);
            $_POST['password'] = Rsa::privDecrypt($_POST['password']);

            $map['account'] = $_POST['phone'];
            $phone_user   = UserModel::getfind($map);
            if(!empty($phone_user)){
                if($phone_user['password'] == sha1($_POST['password'])){
                    $data['login_time'] =date("Y-m-d H:i:s",time());
                    UserModel::saves($phone_user['id'],$data);
                    session('key'   , $phone_user['account']);
                    session('account'   , $phone_user['account']);
                    session('uniqid'     , $phone_user['uniqid']);
                    $arr['res'] = 'success';
                }else{
                    $arr['res'] = 'error';
                }
            }else{
                $arr['res']     = null;
            }
            return json($arr);
        }else{
            echo $this->fetch();
        }

    }
    public function registers(){

        $arr = array();

        $privDecrypt['phone']    = Rsa::privDecrypt(input('phone'));
        $privDecrypt['password'] = Rsa::privDecrypt(input('password'));

        $_POST['phone']    = $privDecrypt['phone'];
        $_POST['password'] = $privDecrypt['password'];

        $map['account'] = $_POST['phone'];
        $phone = UserModel::getfind($map);
        $code=Verify::check(input('code'));
        if(!empty($phone)){
            $arr['ret'] = 'repeat';
        }elseif($code){
            $_SESSION = array();
            session(null);
            $data['belong']   = 'xmyttz';
            $data['uniqid']   = sha1(uniqid());
            $data['account'] = $_POST['phone'];
            $data['password'] = sha1($_POST['password']);
            $data['reg_time'] = date("Y-m-d H:i:s",time());
            $row = Db('user')->strict(false)->insert($data);
            if($row){
                session('account', $data['account']);
                session('face'    , null);
                session('uniqid'  , $data['uniqid']);
                $arr['ret'] = 'success';
            }
        }else{
            $arr['ret'] = 'error';
        }

        return json($arr);

    }
   public  function  api51_curl($host,$path,$method,$appcode,$query){

       $headers = array();
       array_push($headers, "Authorization:APPCODE " . $appcode);
       $querys = $query;
       $bodys = "";
       $url = $host . $path . "?" . $querys;
       $curl = curl_init();
       curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
       curl_setopt($curl, CURLOPT_URL, $url);
       curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($curl, CURLOPT_FAILONERROR, false);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_HEADER, false);
       if (1 == strpos("$".$host, "https://"))
       {
           curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
           curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
       }
      $json=curl_exec($curl);
       $json=json_decode($json, true);
       $arr=array_keys($json['data']['sort']);
     for($i=1;$i<count($arr);$i++){
         $data=array();
         $res=$arr[$i];
         $row['sort']=$res;
         $data=array_combine($json['data']['sort']['fields'],$json['data']['sort']["$res"]);
         $data['sort']=$res;

        Db('stock')->strict(false)->insert($data);

     }

   }
    public function ceshi(){
        $host = "https://stock.api51.cn";
        $path = "/sort";
        $method = "GET";
        $appcode = "f7a39b2b7c2a4fb7b1b6117b9a4022f1 ";
        $querys = "data_count=100&en_hq_type_code=SS.ESA&fields=fields&sort_field_name=px_change_rate&sort_type=0&start_pos=start_pos";
        dump($this->api51_curl($host,$path,$method,$appcode,$querys));
    }
    public function TradeAccount(){
        echo $this->fetch();
    }
    public function SysUser(){
        echo $this->fetch();
    }
    public function SysRole(){
        echo $this->fetch();
    }
    public function SysDeptment(){
        echo $this->fetch();
    }
    public function SysStation(){
        echo $this->fetch();
    }
    public function index1(){
        echo $this->fetch();
    }
    public function Create(){
        echo $this->fetch();
    }


}