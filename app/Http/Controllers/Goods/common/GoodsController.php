<?php
namespace App\Http\Controllers\Goods\common;

use App\Http\Controllers\Controller;
use App\Models\Goods\Goods;
use Illuminate\Support\Facades\Validator;

class GoodsController extends Controller
{
    /**
     * 상품 등록 API
     */
    public static function goodsStore($request,$version)
    {
        $validator = Validator::make($request->all(),[
            'goods_nm'=>'required|max:100',
            'goods_cont'=>'required',
            'com_id'=>'required|max:20'
        ]);
        if($validator->fails()){
            $result['msg']  = '값이 부족합니다.';
            $result['version'] = $version;
            $result['code'] = '400';
            return response()->json($result, 400);
        }
        $db_result = Goods::insert([
            'goods_nm' => $request->goods_nm,
            'goods_cont' => $request->goods_cont,
            'com_id' => $request->com_id,
        ]);
        if(!$db_result) {
            $result['msg'] = '상품등록 실패 했습니다.';
            $result['version'] = $version;
            $result['code'] = '400';
            return response()->json($result, 400);
        }

        $result['msg']  = '상품등록 성공 했습니다.';
        $result['version'] = $version;
        $result['code'] = '200';
        return response()->json($result);
    }

    /**
     * 상품 조회 API
     */
    public static function goodsShow($no,$version)
    {
        $no = (int) $no;
        if(!isset($no)){
            $result['msg']  = '입력값이 부족합니다';
            $result['version'] = $version;
            $result['code'] = '400';
            return response()->json($result, 400);
        }

        $goods = Goods::where('goods_no',$no)
            ->select('goods_no','goods_nm','goods_cont','com_id','reg_dm','upd_dm')
            ->first();

        if($goods === null){
            $result['msg']  = '상품이 없습니다.';
            $result['version'] = $version;
            $result['code'] = '400';
            return response()->json($result, 400);
        }

        $result['msg'] = '상품이 조회 되었습니다.';
        $result['version'] = $version;
        $result['code'] = '200';

        $result['goods_no'] = $goods->goods_no;
        $result['goods_nm'] = $goods->goods_nm;
        $result['goods_cont'] = $goods->goods_cont;
        $result['com_id'] = $goods->com_id;
        $result['reg_dm'] = $goods->reg_dm;
        $result['upd_dm'] = $goods->upd_dm;

        return response()->json($result);
    }
}
