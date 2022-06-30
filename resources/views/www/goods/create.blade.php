@php
//TODO 라이브 배포시 삭제 해야 되는 코드 입니다. 테스트용
    $ip = $_SERVER['REMOTE_ADDR'];
    if($ip === "127.0.0.1"){
        $goods_nm = "상품명".rand();
        $goods_cont = "무신사 많이 파세요".rand();
        $com_id = "carry".rand();
    }
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <script type="text/javascript" src="/js/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="/css/musinsa.css">
</head>
<body class="antialiased">
<div>
@include('www.menu.head')
<div class="list_body">
    <div>
        <label>버전 : </label>
        <select id="var">
            <option value="v1" selected>v1</option>
            <option value="v2">v2</option>
            <option value="v3">v3</option>
        </select>
    </div>
    <div><label>상품명 : </label><input type="text" maxlength="100" id="goods_nm" value="{{$goods_nm}}"></div>
    <div><label>상품설명 : </label><input type="text" id="goods_cont" value="{{$goods_cont}}"></div>
    <div><label>업체아이디 : </label><input type="text" maxlength="20" id="com_id" value="{{$com_id}}"></div>
    <div class="bottom_button_list"><input type="button" id="goods_submit" class="w-btn-outline w-btn-red-outline" value="전송"></div>
</div>
</div>
<script>
    $(document).on('click','#goods_submit',function (){
        var $var = $('#var').val() ? '/'+$('#var').val() : '';
        $.ajax({
            url: '/api'+$var+'/goods',
            type: 'POST',
            // headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                // 'X-MUSINSA-CLIENT-ID': 'key', //TODO id와 key 노출 되지 않게 curl로 보내야 합니다.
                // 'X-MUSINSA-CLIENT-KEY': '66eI7LyT7J6E'
            // },
            data: {
                "goods_nm":$('#goods_nm').val(),
                "goods_cont":$('#goods_cont').val(),
                "com_id":$('#com_id').val(),
            },
            success: function(data){
                alert('msg:'+data.msg+'\nversion:'+data.version+'\ncode:'+data.code)
            }
        });
    })

</script>
</body>
</html>
