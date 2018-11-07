<?php

/**
 * 
 */

namespace app\index\model;
use think\Model;

class GoodsImg extends Model{
    protected $pk = "goods_id";
    protected $table = "goods_img";
    
    public  function getImagesById($id){
        $ret = $this->find($id);
        if(empty($ret))return;
        $data['big_img'] = $ret['big_img'];
        $data['cover_img'] = $ret['cover_img'];
        $data['tb_img'] = explode(",", $ret['thumbnail_img']);
        return $data;
        
    }

}
