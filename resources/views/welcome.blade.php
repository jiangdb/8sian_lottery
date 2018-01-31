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
        }
        .lotterybox{
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="lotterybox"></div>

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
    <link rel="stylesheet" href="/css/lottery.css" />

    <!-- ROCK ON -->
    <script>
      $.lottery({
        el: '.lotterybox',
        api: '/sample-data.json',
        once: true,
        title: "name",
        subtitle: "company",
        // desc: "title",
        timeout: 5,
        speed: 100
      });
    </script>

</body>

</html>