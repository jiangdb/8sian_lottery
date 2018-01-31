<html>
<head>
    <title>Lottery</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0" />
    <meta name="format-detection" content="telephone=no" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .container { margin-top:20px;}
        #tab {border-collapse: collapse; border:none; width:100%;}
        #tab td {width:50%; border:1px #ccc solid; height:32px; text-align: center;}
        #tab tr.header td{background-color: #cccccc;}
    </style>
</head>

<body>
<div id="app">
    <div class="container">
        <div class="row">
            @foreach($winners as $key => $item)
                <div class="col-md-11 center-block" style="float: none;">
                    <div style="width:100%; height:32px; line-height:32px; text-align: center; font-size: 16px; font-weight: bold;">{{ $key }}</div>
                    <div class="panel panel-default" style="margin-bottom:12px;">
                        <div class="panel-body">
                            <table cellspacing="0" cellpadding="0" id="tab">
                                <tr class="header">
                                    <td>名称</td>
                                    <td>头像</td>
                                </tr>
                                @foreach($item as $user)
                                    <tr>
                                        <td>{{ $user->lottery_users->name }}</td>
                                        <td><img src="{{ $user->lottery_users->avatar }}" style="width:30px; height:30px; border-radius: 30px;"></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>