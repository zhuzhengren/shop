<?php
namespace app\index\controller;

use app\index\model\Goods as GoodsModel;
use app\index\common\Conf;
use app\index\common\Base;

use app\index\model\Goods;
use think\facade\Request;

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
        $param = Request::param();
        if(!isset($param["id"])){
            $this->error("錯誤","index/index");
        }
        $goods_id = $param['id'];
        $data = GoodsModel::find($goods_id);
        
        $this->view->assign('data',$data);
        $this->view->assign("bannerMsg", Conf::$bannerMsg['BANNER1']);
        $this->view->assign("breadMsg", Conf::$breadCrumb['SINGLE']);
        return $this->fetch();
    }
}
