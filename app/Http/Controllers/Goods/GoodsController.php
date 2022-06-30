<?php
namespace App\Http\Controllers\Goods;

use App\Http\Controllers\Controller;
use App\Models\Goods\Goods;

class GoodsController extends Controller
{
    public function create()
    {
        return view('www.goods.create');
    }
    public function index()
    {
        $goods = Goods::select('goods_no','goods_nm','goods_cont','com_id','reg_dm','upd_dm')->get();
        return view('www.goods.index',compact('goods'));
    }
}
