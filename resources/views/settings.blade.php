<html>
<head>
    <title>Lottery</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0" />
    <meta name="format-detection" content="telephone=no" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .container { margin-top:50px;}
    </style>
</head>

<body>
<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('lottery.store_setting') }}">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <input type="hidden" name="id" value="1">
                            <div class="form-group">
                                <label for="winners_count" class="col-md-3 control-label">中奖人数：</label>
                                <div class="col-md-6">
                                    <input id="winners_count" type="number" class="form-control" name="winners_count" value="{{ !empty($settings) ? $settings->winners_count : 0 }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8" style="text-align: center;">
                                    <button type="submit" class="btn btn-primary" style="width: 60%; height:50px;">
                                        提交
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-body" style="border-top: 1px solid #ccc;">
                        <form class="form-horizontal" method="POST" action="{{ route('lottery.set_start') }}">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <input type="hidden" name="id" value="1">
                            <div class="form-group">
                                <div class="col-md-8" style="text-align: center;">
                                    @if($settings && $settings->lottery_status == 1)
                                        <button type="submit" class="btn btn-primary" disabled style="width: 60%; height:50px;">
                                            已开始
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-primary" style="width: 60%; height:50px;">
                                            开始
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('lottery.set_stop') }}">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <input type="hidden" name="id" value="1">
                            <div class="form-group">
                                <div class="col-md-8" style="text-align: center;">
                                    @if($settings && $settings->lottery_status == 0)
                                        <button type="submit" class="btn btn-primary" disabled style="width: 60%; height:50px;">
                                            已结束
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-primary" style="width: 60%; height:50px;">
                                            结束
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>


