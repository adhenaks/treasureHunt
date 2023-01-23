<?php
namespace App\Validations;

class UserRules{
    public function  validateUser(string $str,string $fields, array $data, ?string &$error = null): bool
    {

        $user = db_connect()->table('login')->where('uname',$data['username'])->get()->getRow();
        if(!$user)
        {
            $error = "Username not found!!!";
            return false;
        }
        if($data['pass']!=$user['password'])
        {
            $error = "Incorrect password!";
            return false;
        }
        return true;
    }
}


?>