<?php
namespace App\Validations;

class UserRules{
    public function  validateUser(string $str,string $fields, array $data, ?string &$error = null): bool
    {

        $user = db_connect()->table('login')->where('uname',esc($data['username']))->get()->getRow();
        if(!$user)
        {
            $error = "Username not found!!!";
            return false;
        }
        if($user->status==1)
        {
            $error = "User already logged in!";
            return false;
        }
        if(!password_verify(esc($data['password']),$user->pass))
        {
            $error = "Incorrect password!";
            return false;
        }
        return true;
    }
}


?>