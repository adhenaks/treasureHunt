<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function login()
    {
        if (!session()->get('isLoggedIn')) {
            $data = [
                'title' => 'Login'
            ];

            if ($this->request->getMethod() == 'post') {
                helper('form');
                $rules = [
                    'username' => [
                        'rules' => 'required|regex_match[/[A-Za-z0-9]/]',
                        'label' => 'Username',
                        'errors' => [
                            'regex_match' => 'Please enter a valid phone number'
                        ],
                    ],
                    'password' => [
                        'rules' => 'required|validateUser[email,password]',
                        'label' => 'Password'
                    ],
                ];

                if (!$this->validate($rules))
                    $data['validation'] = $this->validator;
                else {
                    $user = db_connect()->table('login')->where('uname', $this->request->getVar('username'))->get()->getRow();
                    $udata = [
                        'username' => $user->uname,
                        'type' => $user->type,
                        'isLoggedIn' => true,
                    ];
                    session()->set($udata);
                    if ($user->type == 'admin') {
                        return redirect()->to('admin/');
                    } else {
                        return redirect()->to('user/');
                    }
                }
            }
            return view('pages/login', $data);
        } else {
            if (session()->get('type') == 'admin') {
                return redirect()->to('admin/');
            } else {
                return redirect()->to('user/');
            }
        }
    }

    public function register()
    {
        if (session()->get('isLoggedIn')) {
            if (session()->get('type') == 'admin') {

                $data = [
                    'title' => 'Register User'
                ];
                if ($this->request->getMethod() == 'post') {
                    helper('form');
                    $rules = [
                        'user1' => [
                            'rules' => 'required',
                            'label' => 'Participant 1'
                        ],
                        'user2' => [
                            'rules' => 'required',
                            'label' => 'Participant 2'
                        ],
                        'phone' => [
                            'rules' => 'required|regex_match[/^[6-9]{1}[0-9]{9}/]',
                            'label' => 'Phone Number',
                            'errors' => [
                                'regex_match' => 'Please enter a valid phone number'
                            ],
                        ],
                    ];

                    if (!$this->validate($rules))
                        $data['validation'] = $this->validator;
                    else {
                        // echo $this->request->getVar('phone');
                        // exit;
                        $model = new UserModel();
                        $userData = [
                            'p1' => $this->request->getVar('user1'),
                            'p2' => $this->request->getVar('user2'),
                            'phone' => $this->request->getVar('phone'),
                        ];
                        $model->save($userData);
                        $session = session();
                        $session->setFlashdata('regSuccess', true);
                    }
                }
                return view('pages/register', $data);
            }
        }
        return redirect()->to('/');
    }

    public function admin()
    {
        if (session()->get('isLoggedIn')) {
            if (session()->get('type') == 'admin') {
                $users=db_connect()->query("SELECT `uname`,`p1`,`p2` FROM `login` JOIN `participants` ON `login`.`id`=`participants`.`id`")->getResultArray();
                $data = [
                    'title' => 'Admin Panel',
                    'userDetails'=> $users,
                ];
                return view('pages/admin', $data);
            }
        }
        return redirect()->to('/');
    }
    public function user()
    {
        if (session()->get('isLoggedIn')) {
            if (session()->get('type') == 'user') {
                $users=db_connect()->query("SELECT `id`,`p1`,`p2`,`level` FROM `participants` WHERE `id`=(SELECT `id` FROM `login` WHERE `uname`='".session()->get('username')."')")->getRowArray();
                $data = [
                    'title' => 'Admin Panel',
                    'userDetails'=> $users,
                ];
                return view('pages/user', $data);
            }
        }
        return redirect()->to('/');
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
