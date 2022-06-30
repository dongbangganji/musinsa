<?php
namespace App\Http\Controllers\Goods\v3;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Goods\common\GoodsController as GoodsControllerCommon;

class GoodsController extends Controller
{
    public string $version = "v3";

    /**
     * 상품 등록 API
     */
    public function store(Request $request)
    {
        return GoodsControllerCommon::goodsStore($request,$this->version);
    }

    /**
     * 상품 조회 API
     */
    public function show($no)
    {
        return GoodsControllerCommon::goodsShow($no,$this->version);

    }
}
