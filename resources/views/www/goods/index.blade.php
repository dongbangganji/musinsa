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
    <style>
        .table_style{
            width: 100%;
        }
        .table_style th,.table_style td {
            text-align: center;
            border: #e0e0e0 solid 1px;
        }

    </style>
</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div>
        <div>버전 :
            <select id="var">
                <option value="v1" selected>v1</option>
                <option value="v2">v2</option>
                <option value="v3">v3</option>
            </select>

            <table class="table_style">
                <tr>
                    <th>번호<th>
                    <th>상품명</th>
                    <th>상품설명</th>
                    <th>업체 아이디</th>
                    <th>등록일/수정일</th>
                    <th></th>
                </tr>
            @foreach($goods as $value)
                <tr>
                    <td>{{$value->goods_no}}</td>
                    <td>{{$value->goods_nm}}</td>
                    <td>{{$value->goods_cont}}</td>
                    <td>{{$value->com_id}}</td>
                    <td>{{$value->com_id}}</td>
                    <td>{{$value->reg_dm}}<br>{{$value->upd_dm}}</td>
                    <td><input type="button" class="goods_info_submit" data-no="{{$value->goods_no}}" value="조회"></td>
                </tr>
            @endforeach
            </table>
        </div>
    </div>
</div>
<script>
    $(document).on('click','.goods_info_submit',function (){
        var $var = $('#var').val() ? '/'+$('#var').val() : '';
        $.ajax({
            url: '/api'+$var+'/goods/'+$(this).data('no'),
            type: 'GET',
            headers: {
                // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                // 'X-MUSINSA-CLIENT-ID': 'key', //TODO id와 key 노출 되지 않게 curl로 보내야 합니다.
                // 'X-MUSINSA-CLIENT-KEY': '66eI7LyT7J6E'
            },
            success: function(data){
                alert('msg: '+data.msg+
                    '\nversion: '+data.version+
                    '\ncode: '+data.code+
                    '\ncom_id: '+data.com_id+
                    '\ngoods_cont: '+data.goods_cont+
                    '\ngoods_nm: '+data.goods_nm+
                    '\ngoods_no: '+data.goods_no+
                    '\nreg_dm: '+data.reg_dm+
                    '\nupd_dm: '+data.upd_dm
                )
            }
        });
    })

</script>
</body>
</html>
