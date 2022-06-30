<?php

namespace App\Models\Goods;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $connection = 'mysql';

    protected $table = 'goods';
    protected $primaryKey = 'goods_no';
//    public $timestamps = false;

    protected $fillable = [
        'goods_no',   //상품번호
        'goods_nm',   //상품명
        'goods_cont', //상품설명
        'com_id',     //업체 아이디
        'reg_dm',     //상품정보 최초등록일시
        'upd_dm',     //상품정보 수정일시
    ];
}
