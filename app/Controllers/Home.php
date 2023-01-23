<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function login()
    {
        $data=[
            'title'=>'Login'
        ];

        if($this->request->getMethod()=='post'){
            helper('form');
            $rules = [
                'username'=>[
                    'rules'=>'required',
                    'label' => 'Username'
                ],
                'password'=>[
                    'rules'=>'required|validateUser[email,password]',
                    'label'=>'Password'
                ],
            ];

            if(! $this->validate($rules))
            $data['validation'] = $this->validator;

        }
        return view('pages/login',$data);
    }
}
