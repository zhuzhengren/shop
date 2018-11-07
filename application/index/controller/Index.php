<?php
namespace app\index\controller;

use app\index\model\Goods as GoodsModel;
use app\index\model\GoodsImg as ImgModel;
use app\index\model\User as UserModel;
use app\index\model\Comment as CommentModel;

use app\index\common\Conf;
use app\index\common\Base;


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
            $this->error("错误","index/index");
        }
        
        $goods_id = $param['id'];
        $data = GoodsModel::find($goods_id);
        
        //获取图片
        $imgModel = new ImgModel();
        $imgs = $imgModel->getImagesById($goods_id);
        
        //获取评论
        $comms = CommentModel::where('goods_id',$goods_id)->select();
        
        foreach($comms as $k=>$v){
            $user_id = $v['user_id'];
            unset($comms[$k]['user_id']);
            $comms[$k]['user_info'] = UserModel::find($user_id);
        }
        $this->view->assign("comms",$comms);
        $this->view->assign('imgs',$imgs);
        $this->view->assign('data',$data);
        $this->view->assign("bannerMsg", Conf::$bannerMsg['BANNER1']);
        $this->view->assign("breadMsg", Conf::$breadCrumb['SINGLE']);
        return $this->fetch();
    }
}
