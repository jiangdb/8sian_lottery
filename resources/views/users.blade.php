<html>
<head>
    <title>Lottery</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0" />
    <meta name="format-detection" content="telephone=no" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .container { margin-top:20px;}
        .list_ul {width:100%; padding:0; list-style: none;}
        .list_ul li {width:100%; min-height:32px;}
        .list_ul li label {margin-top:5px;}
        .list_ul li span.txt {padding-left:5px; position: relative;}
    </style>
</head>

<body>
<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-md-11 center-block" style="float: none;">
                @foreach($users as $item)
                    <div class="panel panel-default" style="margin-bottom:12px;">
                        <div class="panel-body">
                            <ul class="list_ul">
                                <li><label>编号：</label><span class="txt">{{$item->id}}</span></li>
                                <li>
                                    <label>名称：</label>
                                    <span class="txt">{{$item->name}}</span>
                                    <span class="txt" style="float:right;"><img src="{{$item->avatar}}" style="width:30px; height:30px; border-radius: 30px;"></span>
                                </li>
                                <li><label>是否参加：</label><span class="txt"><input type="checkbox" data="{{ $item->id }}" onclick="chk(this);" {{ $item->allow_lottery == 1 ? 'checked' : '' }} style="width:20px; height:20px; position: absolute; left:0px; top:-6px;"></span></li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.bootcss.com/zepto/1.2.0/zepto.min.js"></script>
<script>
    function chk(obj) {
        var id = $(obj).attr('data');
        var allow_lottery = $(obj).prop('checked') == true ? 1 : 0;
        $.post("{{ route('user.set_user_allow_lottery') }}", {_token : '{{csrf_token()}}', 'id' : id, 'allow_lottery' : allow_lottery}, function(res){
            if (res == 'succ') {
                alert('设置成功!');
            } else {
                alert('设置失败!');
            }
        });
    }
</script>
</html>