<html>
<head>
    <title>Lottery</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0" />
    <meta name="format-detection" content="telephone=no" />
    <link rel="stylesheet" href="/css/lottery.css" />
    <style>
        body {
            padding: 0;
            margin: 0;
            background: #000;
        }
        .lotterybox{
            height: 100%;
        }
    </style>
</head>

<body>

    <div class="lotterybox">
        <div class="header"><img src="/img/header.jpg"></div>
    </div>

    <!-- Zepto or jQuery -->
    <script src="https://cdn.bootcss.com/zepto/1.2.0/zepto.min.js"></script>
<!--
    <link rel="stylesheet" href="./dist/lottery.min.css" />
    <script src="./dist/lottery.compact.min.js.1"></script>
-->
    <!-- <script src="./dist/lottery.compact.min.js"></script> -->
    <script src="/js/confetti.js"></script>
    <script src="/js/move.min.js"></script>
    <script src="/js/material-avatar.js"></script>
    <script src="/js/lottery.js"></script>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script>
        var lottery = $.lottery({
            el: '.lotterybox',
            api: "{{ route('lottery.users') }}",
            once: true,
            title: "name",
            subtitle: "company",
            // desc: "title",
            speed: 100,
            user: "{{ Auth::user()->id }}",
        });

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('8fe8f50d614f0c8eccc6', {
        cluster: 'ap1',
        encrypted: true
        });

        var started = false;
        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            console.log(data);
            var res = JSON.parse(data.message);
            if (res.status == 0) {
                if(started) {
                    lottery.stop(res.winners);
                    started = false;
                }
            } else {
                if (!started) {
                    lottery.start(res.count);
                    started = true;
                }
            }
        });
        var checkStart = function(){
        setInterval(function(){
            $.ajax({
                type: "GET",
                url: "{{ route('lottery.check_start') }}",
                dataType: 'json',
                success: function(data){
                    if (data.users_count != lottery.getUsers().length) {
                        location.reload();
                    }
                }
                })
            },1000);
        }
        $(document).ready(function(){
            checkStart();
        });
    </script>

</body>

</html>
