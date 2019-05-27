
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Последние транзакции</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="/vendor/plugins/animate/animate.min.css">
    <link rel='stylesheet' type='text/css' href='https://donatepay.ru/assets/skin/default_skin/css/theme.css?v=1528109232'>
    <link rel="stylesheet" type="text/css" href="/assets/fonts/zocial/zocial.css">
    <link rel="stylesheet" href="/vendor/donate/css/emoji.css"/>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <meta name="csrf-token" content="QKZUOkSzmJomtVc3ibvuV05GsZbQVwOYRsnDr55n">

    <style>
        .transaction {
            border-left: 3px solid #494949;
            -moz-hyphens: auto;
            -webkit-hyphens: auto;
            -ms-hyphens: auto;
        }

        .media-heading {
            -moz-hyphens: none;
            -webkit-hyphens: none;
            -ms-hyphens: none;
        }

        .transaction:nth-child(2n) {
            border-color: #7A7A7A;
            background-color: #2E2B30;
        }

        .scroller::-webkit-scrollbar {
            width: 0;
        }

        .type {
            text-align: right;
            position: relative;
            margin-top: -20px;
            color: red;
            font-size: 10px;
        }
    </style>
</head>

<body>
<div id="main">
    <div class="panel mn">
        <div class="panel-heading"
             style="background: #1c1c1c; font-size: 20px; position: fixed; top: 0; right: 0; left: 0; z-index: 1;">
            <span class="panel-icon"><i class="fa fa-table"></i></span>
          <span class="panel-title">DonatePay.ru - Последнее</span>
        </div>
        <div style="height: 39px;"></div>
        <div class="panel-body pn">
            <div class="text-center" id="onLoad">
                <img src="/images/logo.png" class="p25" style="max-width: 100%; z-index: 2;">
            </div>
            <div id="container" style="overflow-y: auto; overflow-x: hidden; display: block;">
                <!-- Транзакции -->
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    #stop-btn {
        position: fixed;
        color: white;
        top: 10px;
        z-index: 100;
        font-size: 13px;
        right: 5px;
        border-radius: 170px;
        background-color: #e43a3a;
        text-align: center;
        cursor: pointer;
        padding: 5px 10px;
    }

    #stop-help {
        position: fixed;
        opacity: 0;
        top: 50px;
        right: 15px;
        font-size: 13px;
        line-height: 15px;
        padding: 7px;
        background: rgba(0, 0, 0, .7);
        width: 234px;
        transition: 1.5s;
        z-index: -10;
    }

    .repeat {
        display: block;
        margin-top: 5px;
        border-radius: 20px;
        font-size: 10px;
        background: #f6bb42;
        color: black;
    }

    button:active, button:focus {
        outline: none !important;
    }

    #player-wrapper {
        position: fixed;
        bottom: 0;
    }

    #player-wrapper {
        display: none;
    }

    #player {
        z-index: 10;
    }

    #player-control {
        z-index: 20;
        position: absolute;
        top: 0;
        left: 0;
    }

    #play-btn,
    #show-btn,
    #next-btn {
        width: 50px;
        height: 50px;
        position: absolute;
        color: orangered;
        font-size: 50px;
        top: CALC(50% - 25px);
        cursor: pointer;
    }

    #play-btn {
        left: CALC(50% - 25px);
    }

    #show-btn {
        left: CALC(50% - 125px);
    }

    #next-btn {
        left: CALC(50% + 75px);
    }

    #player-title,
    #player-duration {
        color: white;
        text-shadow: 1px 1px 0 black, 2px 2px 0 black;
        font-size: 15px;
    }

    #player-duration {
        position: absolute;
        bottom: 10px;
        left: 10px;
    }

    #volumewrapper {
        position: absolute;
        bottom: 10px;
        right: 10px;
        text-shadow: 1px 1px 0 white;
        width: 140px;
    }

    #volume-indicator {
        display: inline-block;
        color: #000;
        width: 70%;
    }
</style>
<div id="stop-btn">Отменить текущее оповещение</div>
<div id="player-wrapper">
    <div id="player-control">
        <div id="control-wrapper">
            <div id="player-title"></div>
            <div id="player-duration"></div>
            <div id="volumewrapper">
                <i class="fa fa-volume-up"></i>
                <div id="volume-indicator"></div>
            </div>
          <div id="show-btn" data-type="" data-toggle="tooltip" title="Скрыть/показать видео на медиа виджете">
                <i class="fa fa-eye"></i>
            </div>
            <div id="play-btn"><i class="fa fa-play"></i></div>
            <div id="next-btn"><i class="fa fa-forward"></i></div>
        </div>
    </div>
    <div id="player"></div>
</div>

<script src="/vendor/jquery/jquery-1.11.1.min.js"></script>
<script src="/vendor/plugins/xeditable/js/bootstrap-editable.min.js"></script>
<script src="/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>
<script src="/vendor/plugins/pnotify/pnotify.js"></script>
<script src="/vendor/plugins/timeago/jquery.timeago.js"></script>
  <script src="/vendor/plugins/timeago/jquery.timeago.ru.js"></script>
<script src="/assets/js/utility/utility.js"></script>
<script src="/assets/js/main.js"></script>
<script type="text/javascript">
    /**
     * @property  {Object} mediaWidgetSettings
     */
    window.mediaWidgetSettings = {
        widgetId:    '839482',
        widgetToken: 'ddefc0864b4c0e45df53b34235b20bcb5c25a8b904c999a27c74e4a77a406cdf',
        userId:      '292168',
        socketHost:  'https://centrifugo.donatepay.ru:43002'
    };

    var token = 'ddefc0864b4c0e45df53b34235b20bcb5c25a8b904c999a27c74e4a77a406cdf';
    var url = 'widget.donatepay.ru:3000';

    function getUrl() {
        return 'widget.donatepay.ru:3000';
    }

    function isAdmin() {
        return false;
    }

    function CSRFToken() {
        return 'QKZUOkSzmJomtVc3ibvuV05GsZbQVwOYRsnDr55n';
    }

    function getToken() {
        return 'ddefc0864b4c0e45df53b34235b20bcb5c25a8b904c999a27c74e4a77a406cdf';
    }

    function getWidgetToken() {
        return 'ddefc0864b4c0e45df53b34235b20bcb5c25a8b904c999a27c74e4a77a406cdf';
    }

    function csrfToken() {
        return 'QKZUOkSzmJomtVc3ibvuV05GsZbQVwOYRsnDr55n';
    }

    function getSocketHost() {
        return 'https://centrifugo.donatepay.ru:43002';
    }

    function getUserId() {
        return '292168';
    }

    function getWidgetId() {
        return 839482;
    }

    function getSettings() {
        return '{"url":"https:\/\/donatepay.ru\/widgets\/lastTransactions\/ajax"}';
    }
</script>
<script src='https://donatepay.ru/assets/build/js/transactionModal.js?v=1557841080' type="text/javascript"></script>
</body>
</html>
