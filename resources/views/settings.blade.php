<html>
<head>
    <title>Lottery</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0" />
    <meta name="format-detection" content="telephone=no" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .container { margin-top:20px;}
    </style>
</head>

<body>
<div id="app">
    <div class="container">
        <div class="message_box">
            @if (Session::has('error'))
            <!-- will be used to show any messages -->
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('lottery.store_setting') }}">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <input type="hidden" name="id" value="1">
                            <input type="hidden" name="can_take_person" value="{{ $settings->can_take_persons }}">
                            <div class="form-group">
                                <label for="winners_count" class="col-md-3 control-label">奖项名称：</label>
                                <div class="col-md-6">
                                    <input id="prize_grade" type="text" class="form-control" name="prize_grade" value="{{ !empty($settings) ? $settings->prize_grade : '' }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="winners_count" class="col-md-3 control-label">中奖人数：</label>
                                <div class="col-md-6">
                                    <input id="winners_count" type="number" class="form-control" name="winners_count" value="{{ !empty($settings) ? $settings->winners_count : 0 }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="winners_count" class="col-md-3 control-label"></label>
                                <div class="col-md-6">
                                    <input type="checkbox" name="allow_winners" {{ (!empty($settings) && $settings->allow_winners == 1) ? 'checked' : '' }} value="1" style="width: 30px; height: 30px; float: left;"><label for="allow_winners" style="position:relative; top:7px;">允许中奖人参与</label>
                                </div>
                                <div style="clear: both;"></div>
                            </div>
                            <div class="form-group">
                                <label for="winners_count" class="col-md-3 control-label"></label>
                                <div class="col-md-6">
                                    <input type="checkbox" name="allow_win" {{ (!empty($settings) && $settings->allow_win == 1) ? '' : 'checked' }} value="0" style="width: 30px; height: 30px; float: left;"><label for="allow_winners" style="position:relative; top:7px;">排除部分人员</label>
                                </div>
                                <div style="clear: both;"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8" style="text-align: center; float:none; margin: 0 auto;">
                                    <button type="submit" class="btn btn-primary" style="width: 100%; height:50px;">
                                        提交
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if(!empty($settings))
                    <div class="panel-body" style="border-top: 1px solid #ccc;">
                        <div class="form-group" style="margin-top:15px;">
                            <label class="col-md-3 control-label">奖项名称：{{ $settings->prize_grade }}</label>
                            <div style="clear: left;"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">中奖人数：{{ $settings->winners_count }}</label>
                            <div style="clear: left;"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">参加人数：{{ $settings->can_take_persons }}</label>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">排除人员：<font color="red">{{ $settings->allow_win ? '未排除' : '已排除' }}</font></label>
                        </div>
                    </div>
                    <div class="panel-body" style="border-top: 1px solid #ccc;">
                        <form class="form-horizontal" method="POST" action="{{ route('lottery.set_start') }}">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <input type="hidden" name="id" value="1">
                            <input type="hidden" name="prize_grade" value="{{ $settings->prize_grade }}">
                            <div class="form-group" style="margin-top:15px;">
                                <div class="col-md-8" style="text-align: center; float:none; margin: 0 auto;">
                                    @if($settings && $settings->lottery_status == 1)
                                        <button type="submit" class="btn btn-primary" disabled style="width: 100%; height:50px;">
                                            已开始
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-primary" style="width: 100%; height:50px;">
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
                                <div class="col-md-8" style="text-align: center; float:none; margin: 0 auto;">
                                    @if($settings && $settings->lottery_status == 0)
                                        <button type="submit" class="btn btn-primary" disabled style="width: 100%; height:50px;">
                                            已结束
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-primary" style="width: 100%; height:50px;">
                                            结束
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>


