<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'participants';
    protected $allowedFields = ['p1', 'p2', 'phone','id'];
    protected $beforeInsert = ['beforeInsert'];

    protected function beforeInsert(array $data){
        $pass=$this->passHash($data['data']['phone']);
        db_connect()->query("INSERT INTO `login`(`uname`,`pass`) VALUES('user".$data['data']['phone']."','$pass')");
        $user=db_connect()->table('login')->select('id')->where('uname','user'.$data['data']['phone'])->get()->getRow();
        $data['data']['id']=$user->id;
        return $data;
    }
    

    protected function passHash($pass){
        $pass=password_hash($pass,PASSWORD_DEFAULT);
        return $pass;
    }
}
?>