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
                {
                    $data['validation'] = $this->validator;
                }
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
                            'rules' => 'required|regex_match[/^[6-9]{1}[0-9]{9}/]|is_unique[participants.phone]',
                            'label' => 'Phone Number',
                            'errors' => [
                                'regex_match' => 'Please enter a valid phone number',
                                'is_unique' => 'Phone number already exists in database.',
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
                if ($this->request->getMethod() == 'post') {
                    db_connect()->query("UPDATE `participants` SET `level`=1 WHERE `level`=0");
                    date_default_timezone_set('Asia/Kolkata');
                    $date = date('H:i:s');
                    db_connect()->query("UPDATE `level_timings` SET `start`='$date'");
                }
                $users = db_connect()->query("SELECT `uname`,`p1`,`p2`,`level`,`l1`,`l2`,`l3`,`l4`,`l5`,`start` FROM `level_timings` JOIN `login` ON `level_timings`.`id`=`login`.`id` JOIN `participants` ON `login`.`id`=`participants`.`id`")->getResultArray();
                $data = [
                    'title' => 'Admin Panel',
                    'userDetails' => $users,
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
                $user = db_connect()->query("SELECT `id`,`p1`,`p2`,`level` FROM `participants` WHERE `id`=(SELECT `id` FROM `login` WHERE `uname`='" . session()->get('username') . "')")->getRowArray();
                $data = [
                    'title' => 'Welcome',
                    'userDetails' => $user,
                ];
                helper('form');
                switch ($user['level']) {
                    case '1':
                        if ($this->request->getMethod() == 'post' && isset($_POST['key'])) {
                            $rules = [
                                'key' => [
                                    'rules' => 'required|in_list[pay-per-click]',
                                    'label' => 'Keyword',
                                    'errors' => [
                                        'in_list' => 'Wrong answer!!!'
                                    ],
                                ],
                            ];

                            if (!$this->validate($rules))
                                $data['validation'] = $this->validator;
                            else {
                                date_default_timezone_set('Asia/Kolkata');
                                $date = date('H:i:s');
                                db_connect()->query("UPDATE `level_timings` SET `l1`= '$date' WHERE `id` =(SELECT `id` FROM `login` WHERE `uname`='" . session()->get('username') . "')");
                                db_connect()->query("UPDATE `participants` SET `level`= `level`+1 WHERE `id` =(SELECT `id` FROM `login` WHERE `uname`='" . session()->get('username') . "')");
                                return redirect()->to('/user');
                            }
                        }
                        return view('pages/user/round1', $data);
                        break;
                    case '2':
                        if ($this->request->getMethod() == 'post' && isset($_POST['key'])) {
                            $rules = [
                                'key' => [
                                    'rules' => 'required|in_list[scavenger]',
                                    'label' => 'Keyword',
                                    'errors' => [
                                        'in_list' => 'Wrong answer!!!'
                                    ],
                                ],
                            ];

                            if (!$this->validate($rules))
                                $data['validation'] = $this->validator;
                            else {
                                date_default_timezone_set('Asia/Kolkata');
                                $date = date('H:i:s');
                                db_connect()->query("UPDATE `level_timings` SET `l2`= '$date' WHERE `id` =(SELECT `id` FROM `login` WHERE `uname`='" . session()->get('username') . "')");
                                db_connect()->query("UPDATE `participants` SET `level`= `level`+1 WHERE `id` =(SELECT `id` FROM `login` WHERE `uname`='" . session()->get('username') . "')");
                                return redirect()->to('/user');
                            }
                        }
                        return view('pages/user/round2', $data);
                        break;
                    case '3':
                        if ($this->request->getMethod() == 'post' && isset($_POST['key'])) {
                            $rules = [
                                'key' => [
                                    'rules' => 'required|in_list[water]',
                                    'label' => 'Keyword',
                                    'errors' => [
                                        'in_list' => 'Wrong answer!!!'
                                    ],
                                ],
                            ];

                            if (!$this->validate($rules))
                                $data['validation'] = $this->validator;
                            else {
                                date_default_timezone_set('Asia/Kolkata');
                                $date = date('H:i:s');
                                db_connect()->query("UPDATE `level_timings` SET `l3`= '$date' WHERE `id` =(SELECT `id` FROM `login` WHERE `uname`='" . session()->get('username') . "')");
                                db_connect()->query("UPDATE `participants` SET `level`= `level`+1 WHERE `id` =(SELECT `id` FROM `login` WHERE `uname`='" . session()->get('username') . "')");
                                return redirect()->to('/user');
                            }
                        }
                        return view('pages/user/round3', $data);
                        break;

                    case '4':
                        if ($this->request->getMethod() == 'post' && isset($_POST['key'])) {
                            $rules = [
                                'key' => [
                                    'rules' => 'required|in_list[suspicious]',
                                    'label' => 'Keyword',
                                    'errors' => [
                                        'in_list' => 'Wrong answer!!!'
                                    ],
                                ],
                            ];

                            if (!$this->validate($rules))
                                $data['validation'] = $this->validator;
                            else {
                                date_default_timezone_set('Asia/Kolkata');
                                $date = date('H:i:s');
                                db_connect()->query("UPDATE `level_timings` SET `l4`= '$date' WHERE `id` =(SELECT `id` FROM `login` WHERE `uname`='" . session()->get('username') . "')");
                                db_connect()->query("UPDATE `participants` SET `level`= `level`+1 WHERE `id` =(SELECT `id` FROM `login` WHERE `uname`='" . session()->get('username') . "')");
                                return redirect()->to('/user');
                            }
                        }
                        return view('pages/user/round4', $data);
                        break;
                    case '5':
                        if ($this->request->getMethod() == 'post' && isset($_POST['key'])) {
                            $rules = [
                                'key' => [
                                    'rules' => 'required|in_list[jurassic park]',
                                    'label' => 'Keyword',
                                    'errors' => [
                                        'in_list' => 'Wrong answer!!!'
                                    ],
                                ],
                            ];

                            if (!$this->validate($rules))
                                $data['validation'] = $this->validator;
                            else {
                                date_default_timezone_set('Asia/Kolkata');
                                $date = date('H:i:s');
                                db_connect()->query("UPDATE `level_timings` SET `l5`= '$date' WHERE `id` =(SELECT `id` FROM `login` WHERE `uname`='" . session()->get('username') . "')");
                                db_connect()->query("UPDATE `participants` SET `level`= `level`+1 WHERE `id` =(SELECT `id` FROM `login` WHERE `uname`='" . session()->get('username') . "')");
                                return redirect()->to('/user');
                            }
                        }
                        return view('pages/user/round5', $data);
                        break;
                    case '6':

                        $ids = db_connect()->query("SELECT `id`,`l5` FROM `level_timings` WHERE `l5` IS NOT NULL ORDER BY `l5`")->getResultArray();
                        $userid = db_connect()->query("SELECT `id` FROM `login` WHERE `uname`='" . session()->get('username') . "'")->getRowArray();
                        $i = 1;
                        foreach ($ids as $id) {
                            if ($id['id'] != $userid['id'] )
                                $i++;
                            else
                                break;
                        }
                        $data['pos'] = $i;
                        return view('pages/user/finished', $data);
                        break;

                    default:
                        return view('pages/user/default', $data);
                }
            }
        }
        return redirect()->to('/');
    }

    public function getKey()
    {
        if ($this->request->getMethod() == 'get' && isset($_GET['q'])) {
            if ($_GET['q'] == "37")
                return "Key: scavenger";
            else
                return "Wrong Answer!!! Try again";
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
