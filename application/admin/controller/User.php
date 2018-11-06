<?php

namespace app\admin\controller;
use think\Controller;


class User extends Controller{
    public function Login(){
       // return "login";
        $this->view->assign('title', '管理员登陆');
        return $this->view->fetch('login');
    }
}
