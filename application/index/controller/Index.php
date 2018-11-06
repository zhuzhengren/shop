<?php
namespace app\index\controller;

class Index extends \think\Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function about()
    {
        return $this->fetch();
    }
    
    public function products(){
        return $this->fetch();
    }
}
