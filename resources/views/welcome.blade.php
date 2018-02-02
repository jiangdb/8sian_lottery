<html>
<head>
    <title>Lottery</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0" />
    <meta name="format-detection" content="telephone=no" />
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

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('8fe8f50d614f0c8eccc6', {
        cluster: 'ap1',
        encrypted: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
        alert(data.message);
        });
    </script>
    <link rel="stylesheet" href="/css/lottery.css" />

    <!-- ROCK ON -->
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
      $(document).ready(function(){
        //checkStart();
      });
      var checkStart = function(){
        var started = false;
        setInterval(function(){
            $.ajax({
                type: "GET",
                url: "{{ route('lottery.check_start') }}",
                dataType: 'json',
                success: function(data){
                    if (data.status == 0) {
                        if(started) {
                            lottery.stop(data.winners);
                            started = false;
                        }
                    } else {
                        if (!started) {
                            lottery.start(data.count);
                            started = true;
                        }
                    }
                    if (data.users_count != lottery.getUsers().length) {
                        location.reload();
                    }
                }
                })
            },30000);
        }
    </script>

</body>

</html>
