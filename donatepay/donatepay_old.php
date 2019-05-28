
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AlertBox</title>
    <link rel="stylesheet" type="text/css" href="/vendor/widgets/text-animations.css?v=4">
    <link rel="stylesheet" type="text/css" href="/vendor/widgets/animate.min.css">
    <link rel="stylesheet" href="/vendor/donate/css/emoji.css"/>
    <link href="https://vjs.zencdn.net/7.0.5/video-js.css" rel="stylesheet">
    <link href="/assets/build/css/notification/alertbox.css?id=41619e3c7939402cc956" rel="stylesheet">
    <style>
        #title-wrapper, #message-wrapper {
            text-align: center;
        }

        #title-wrapper, #message-wrapper, #image-wrapper {
            position: absolute;
        }

        #image-wrapper {
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }

        body {
            overflow: hidden;
        }
    </style>
</head>
<body>
<div id="widget">

</div>
<canvas id="myChart" style="position: absolute;"></canvas>

</body>
<script src="/node_modules/jquery/dist/jquery.js"></script>
<script src="/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>
<script src="//cdn.jsdelivr.net/sockjs/1.1/sockjs.min.js" type="text/javascript"></script>
<script src="/node_modules/centrifuge/centrifuge.js" type="text/javascript"></script>
<script src="/vendor/plugins/jwebaudio/jwebaudio.min.js"></script>
<script src="/vendor/widgets/transaction/smiles.js?v=1"></script>
<script src='https://widget.donatepay.ru/assets/build/js/site.js?v=1553694435' type="text/javascript"></script>
<script src="https://www.youtube.com/iframe_api" type="text/javascript"></script>
<script src="/node_modules/chart.js/dist/Chart.min.js"></script>
<script src="https://vjs.zencdn.net/7.0.5/video.js"></script>

<script>
    function getUserId() {
        return parseInt('292168');
    }

    function csrf() {
        return 'C5RzQbaZy4A9DoccuwExr9yOKR3t8w4uCog0mbXg';
    }
</script>

<script src='https://widget.donatepay.ru/assets/build/js/alertbox.js?v=1554976409' type="text/javascript"></script>

<script type="text/javascript">
    $(function () {
        /** Init AlertBox */
        AlertBox.setConfig(
            'getWidgetSettingsURL',
            'https://widget.donatepay.ru/alert-box/all-settings/ddefc0864b4c0e45df53b34235b20bcb5c25a8b904c999a27c74e4a77a406cdf');
        AlertBox.setConfig('getVotersURL', 'https://widget.donatepay.ru/voters/ddefc0864b4c0e45df53b34235b20bcb5c25a8b904c999a27c74e4a77a406cdf');
        AlertBox.setConfig('wrapper', document.getElementById('widget'));
        AlertBox.setConfig('token', 'ddefc0864b4c0e45df53b34235b20bcb5c25a8b904c999a27c74e4a77a406cdf');
        AlertBox.setConfig('csrf', 'C5RzQbaZy4A9DoccuwExr9yOKR3t8w4uCog0mbXg');
        AlertBox.setConfig('preloadQueue', []);
        AlertBox.userSettings = {"voiceSum":25,"antiSpam":{"active":false,"blackList":""},"widgetsToken":"ddefc0864b4c0e45df53b34235b20bcb5c25a8b904c999a27c74e4a77a406cdf","premium":{"allowPremium":"1","premiumImageType":"1"}};

        SocketClass.setConfig('host', 'https://centrifugo.donatepay.ru:43002');
        SocketClass.setConfig('userID', '292168');
        SocketClass.setConfig('userWidgetToken', 'ddefc0864b4c0e45df53b34235b20bcb5c25a8b904c999a27c74e4a77a406cdf');
        SocketClass.setConfig('csrfToken', 'C5RzQbaZy4A9DoccuwExr9yOKR3t8w4uCog0mbXg');

        /** Follower widget */
        Followers.setConfig('addFollowerURL', 'https://widget.donatepay.ru/notification/events');
        Followers.setConfig('getSettingsURL', 'https://widget.donatepay.ru/widgets/follower/settings');
        Followers.setConfig('csrfToken', 'C5RzQbaZy4A9DoccuwExr9yOKR3t8w4uCog0mbXg');

        Followers.youtube.setConfig('token', '');
        Followers.youtube.setConfig('tokenUpdateURL', 'https://widget.donatepay.ru/followers/updateAccessToken/youtube');

        Followers.twitch.setConfig('accountID', '65742731');
        Followers.twitch.setConfig('clientID', 'ttfs0ziyvrbyhajmp5oyx19lt08drw2');
        Followers.twitch.setConfig('accessToken', 'zfx0ihx8ekxystekfm2x3zsosduowj');

        AlertBox.start();
    });
</script>
</html>
