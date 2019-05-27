<?php $URL='https://donatepay.ru' ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Последние транзакции</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="QKZUOkSzmJomtVc3ibvuV05GsZbQVwOYRsnDr55n">

   
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
<script src="<?php echo $URL ?>/vendor/jquery/jquery-1.11.1.min.js"></script>
<script src="<?php echo $URL ?>/vendor/plugins/xeditable/js/bootstrap-editable.min.js"></script>
<script src="<?php echo $URL ?>/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>
<script src="<?php echo $URL ?>/vendor/plugins/pnotify/pnotify.js"></script>
<script src="<?php echo $URL ?>/vendor/plugins/timeago/jquery.timeago.js"></script>
  <script src="<?php echo $URL ?>/vendor/plugins/timeago/jquery.timeago.ru.js"></script>
<script src="<?php echo $URL ?>/assets/js/utility/utility.js"></script>
<script src="<?php echo $URL ?>/assets/js/main.js"></script>
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
