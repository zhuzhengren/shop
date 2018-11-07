<?php
namespace app\index\controller;

class Index extends \think\Controller
{
    public function index()
    {
        $this->view->assign("bannerMsg", Conf::$bannerMsg['BANNER']);
        return $this->fetch();
    }

    public function about()
    {
        $this->view->assign("bannerMsg", Conf::$bannerMsg['BANNER1']);
        $this->view->assign("breadMsg", Conf::$breadCrumb['ABOUTUS']);
        return $this->fetch();
    }
    
    public function products(){
        $this->view->assign("bannerMsg", Conf::$bannerMsg['BANNER1']);
        $this->view->assign("breadMsg", Conf::$breadCrumb['PRODUCTS']);
        return $this->fetch();
    }
    
    public function single(){
        $this->view->assign("bannerMsg", Conf::$bannerMsg['BANNER1']);
        $this->view->assign("breadMsg", Conf::$breadCrumb['SINGLE']);
        return $this->fetch();
    }
}
