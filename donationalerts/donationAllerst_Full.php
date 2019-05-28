
<!DOCTYPE html>
<html class="" lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Виджет оповещений - DonationAlerts</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png?v=2">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png?v=2">
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png?v=2">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png?v=2">
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png?v=2">
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png?v=2">
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png?v=2">
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png?v=2">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png?v=2">
        <link rel="icon" type="image/png" href="/favicon-32x32.png?v=2" sizes="32x32">
        <link rel="icon" type="image/png" href="/android-chrome-192x192.png?v=2" sizes="192x192">
        <link rel="icon" type="image/png" href="/favicon-96x96.png?v=2" sizes="96x96">
        <link rel="icon" type="image/png" href="/favicon-16x16.png?v=2" sizes="16x16">
        <link rel="manifest" href="/manifest.json?v=2">
        <link rel="mask-icon" href="/safari-pinned-tab.svg?v=2" color="#5bbad5">
        <link rel="shortcut icon" href="/favicon.ico?v=2">
        <meta name="msapplication-TileColor" content="#fb8c2b">
        <meta name="msapplication-TileImage" content="/mstile-144x144.png?v=2">
        <meta name="theme-color" content="#ffffff">

        <!-- Le styles -->
                    <link href="/css/widget_base.css?v=411" media="screen" rel="stylesheet" type="text/css">
<link href="/css/animate.css?v=411" media="screen" rel="stylesheet" type="text/css">        
        <!-- Scripts -->
        <!--[if lt IE 9]><script type="text/javascript" src="/js/html5shiv.js?v=411"></script><![endif]-->
<!--[if lt IE 9]><script type="text/javascript" src="/js/respond.min.js?v=411"></script><![endif]-->
<script type="text/javascript" src="/js/jquery.min.js?v=411"></script>
<script type="text/javascript" src="/js/languages.js?v=411"></script>
<script type="text/javascript" src="/js/primary.js?v=411"></script>
<script type="text/javascript" src="/js/widget.js?v=411"></script>
<script type="text/javascript" src="/js/jquery.lettering-0.6.1.min.js?v=411"></script>
<script type="text/javascript" src="/js/jquery.browser.min.js?v=411"></script>
<script type="text/javascript" src="/js/bootstrap.min.js?v=411"></script>        <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300&subset=latin,cyrillic-ext,cyrillic,latin-ext' rel='stylesheet' type='text/css'>

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-30021773-2', 'auto');
          ga('send', 'pageview');
        </script>

        <script type="text/javascript">
            api_config = {
                twitch: {
                    client_id: '4l56ta1x0mptop7rbd5nsspbwxzxz7b'
                }
            }
            document_language = 'en_US';
            alert_8_billing_system_types = [];
        </script>
    </head>
    <body class="">
        <div class="wrapper ">
            <script src="/js/soundmanager2-jsmin.js"></script>
<script type="text/javascript">
	function debug(text) {
					if (text == '+' || text == '.') return false;
			$('#debug').append('<div>'+htmlEntities(text)+'</div>');
			}
			da_debug = false;
	</script>
<div id="debug" style="color:white; background:rgba(0, 0, 0, 0.9); position:absolute; z-index:99999;"></div>
<div class="container" >
	<div class="valign-fix" align="center">
		<div class="alert-container">
			<div id="poll-alert"></div>
			<div id="donation-alert"></div>
		</div>
	</div>
</div>
<script>

	var host_da = 'https://www.donationalerts.com';
	var is_beta_user = 1;
	var is_mobile_da = false;
	var alerts_array = {
		'1': [],
'4': [],
'6': [],
'8': [],
'9': [],
'3': [],
'2': [],
'5': [],
	};
	var group_id = 1;
	var alerts_id_to_show = {
		'1': [],
'4': [],
'6': [],
'8': [],
'9': [],
'3': [],
'2': [],
'5': [],
	};
	var shown_alerts = {
		'1': [],
'4': [],
'6': [],
'8': [],
'9': [],
'3': [],
'2': [],
'5': [],
	};
	var isXsplit = false;
	var tts_mins = $.parseJSON('{"BYN":0,"EUR":0,"KZT":0,"RUB":0,"UAH":0,"USD":0,"BRL":0}');

	if (isLocalStorageSupported() === true) {
		var alerting_alert_types = [];
		for (var i = 1; i <= 6; i++) {
			var is_group_alerting = localStorage.getItem('group_id_'+i+'_alerting');
			if (is_group_alerting == null || is_group_alerting == 'false') {

			}else{
				alerting_alert_types.push(parseInt(is_group_alerting));
			}
		}

		if (localStorage.getItem('group_id_'+group_id+'_alerting') == null) localStorage.setItem('group_id_'+group_id+'_alerting', false);

		$.each(alerts_array, function(alert_type, alerts_to_display) {
			if (alerting_alert_types.indexOf(parseInt(alert_type)) == -1) {
				localStorage.setItem('is_alerting_'+alert_type, false);
			}else{
				localStorage.setItem('is_alerting_'+alert_type, true);
			}
		});

		if (da_debug) debug('Alerting alert types: '+JSON.stringify(alerting_alert_types));

			}

	function handleGeneralWidgetSettings(settings){
		user_general_widget_settings = $.parseJSON(settings);
		if(typeof user_general_widget_settings['_additional'] !== 'undefined'){
			if(typeof user_general_widget_settings['_additional'].reload !== 'undefined'){
				if (user_general_widget_settings['_additional'].reload == 1) {
					location.reload();
				}
			}
		}
		if (user_general_widget_settings.black_list_words != null) {
			bad_words_es = escapeRegExp(user_general_widget_settings.black_list_words);
			bad_words = bad_words_es.split(' ');
		};
	}

	window.onbeforeunload = function() {
		if (isLocalStorageSupported() === true) {
			var alerting_alert_type = localStorage.getItem('group_id_'+group_id+'_alerting');
			if (alerting_alert_type != 'false' && alerting_alert_type != null) {
				localStorage.setItem('is_alerting_'+alerting_alert_type, false);
			}
			localStorage.removeItem('group_id_'+group_id+'_alerting');
		}
	};

	handleGeneralWidgetSettings('{\"main_currency\":\"RUB\",\"remove_links\":\"0\",\"black_list_words\":null,\"allow_emotes\":\"1\"}');

	function initWidget(settings){
		alerts_widget_settings = settings;

		available_variation_ids = [];
		available_alert_types_ids = [];
		$.each(alerts_widget_settings.variations, function(index, value) {
			alerts_widget_settings.variations[index].additional_data = $.parseJSON(value.additional_data);
			available_variation_ids.push(value.entity_id);

			var conditions = $.parseJSON(value.variation_conditions);
			$.each(conditions, function(j, condition) {
				if (condition.mode == 'alert_type') {
					available_alert_types_ids.push(parseInt(condition.value));
					return false;
				}
			});
		});

		if (da_debug) debug('available_alert_types_ids: '+JSON.stringify(available_alert_types_ids));

		settings = alerts_widget_settings.variations[0];

		if (window.opener != null) {
			$('body').css('background', settings.background_color);
		};

		if (typeof sound != 'undefined') {
			sound.donation.destruct();
		};
		sound = {
			'donation': soundManager.createSound({
							url: '//static.donationalerts.ru/uploads/'+settings.sound,
							onfinish: function() {
								try {
									this.setPosition(0);
									console.log('ended');
									if (tts_started == 0) {
										if (settings.tts_is_enabled == 1) {
											if (settings.tts_scenario == 'after_sound') {
												ttsStart(current_message);
											};
										};
									};
								}catch(err) {
									error = 'onended error: '+err.message;
								}
							},
							onstop: function() {
								try {
									this.setPosition(0);
									console.log('pause');
									if (tts_started == 0) {
										if (settings.tts_is_enabled == 1) {
											if (settings.tts_scenario == 'after_sound') {
												ttsStart(current_message);
											};
										};
									};
								}catch(err) {
									error = 'onpause error: '+err.message;
								}
							}
						})
		};

		display_duration = settings.display_duration * 1000;
		tts_volume = settings.tts_volume;

		header_text_style = $.parseJSON((settings.header_text ? settings.header_text : '{}'));
		message_text_style = $.parseJSON((settings.message_text ? settings.message_text : '{}'));

		window.settings = settings;

		initAlertsWidget();

		if (typeof dPoll != 'undefined') {
			dPoll.destroy();
		}
		dPoll = new pollWidget('.alert-container #poll-alert', '{\"standalone\":false}');

	}

	var audio = document.createElement("audio");
	var isMP3Supported = (typeof audio.canPlayType === "function" && audio.canPlayType("audio/mpeg") !== "");
	var isAudioSupported = document.createElement('audio').canPlayType;

	if (isAudioSupported) {

		token = 'MQzB22rSfvimkCMN0M08';
		a_settings = $.parseJSON('{\"variations\":[{\"entity_id\":\"7298167\",\"user_id\":\"2578614\",\"group_id\":\"1\",\"window_coor_x\":\"0\",\"window_coor_y\":\"0\",\"background_color\":\"#00FF00\",\"volume\":\"50\",\"display_pattern\":\"image_top__text_bottom\",\"sound\":\"sounds\\/2\\/point.mp3\",\"image\":\"images\\/2\\/zombie.gif\",\"message_background\":\"rgba(0, 0, 0, 0)\",\"is_temporary_disabled\":\"0\",\"color_1\":\"#FB8C2B\",\"color_2\":\"#FFFFFF\",\"display_duration\":\"8.50\",\"font_size_1\":\"60\",\"font_size_2\":\"25\",\"header_text\":\"{\\\"font_style\\\":{\\\"font-family\\\":\\\"\\\\\\\"Roboto Condensed\\\\\\\"\\\",\\\"font-size\\\":\\\"60px\\\",\\\"color\\\":\\\"rgb(251, 140, 43)\\\",\\\"font-weight\\\":\\\"bold\\\",\\\"font-style\\\":\\\"normal\\\",\\\"text-decoration\\\":\\\"none\\\",\\\"text-transform\\\":\\\"none\\\",\\\"text-shadow\\\":\\\"1px\\\",\\\"text-shadow_color\\\":\\\"rgb(0, 0, 0)\\\",\\\"letter-spacing\\\":\\\"0px\\\",\\\"word-spacing\\\":\\\"0px\\\",\\\"text-align\\\":\\\"center\\\",\\\"vertical-align\\\":\\\"middle\\\",\\\"background-color\\\":\\\"rgba(255, 255, 255, 0)\\\",\\\"border-radius\\\":\\\"0px\\\"},\\\"font_animation\\\":{\\\"text-animation\\\":\\\"tada\\\",\\\"text-animation-mode\\\":\\\"letters\\\"}}\",\"message_text\":\"{\\\"font_style\\\":{\\\"font-family\\\":\\\"\\\\\\\"Roboto Condensed\\\\\\\"\\\",\\\"font-size\\\":\\\"25px\\\",\\\"color\\\":\\\"rgb(255, 255, 255)\\\",\\\"font-weight\\\":\\\"normal\\\",\\\"font-style\\\":\\\"normal\\\",\\\"text-decoration\\\":\\\"none\\\",\\\"text-transform\\\":\\\"none\\\",\\\"text-shadow\\\":\\\"1px\\\",\\\"text-shadow_color\\\":\\\"rgb(0, 0, 0)\\\",\\\"letter-spacing\\\":\\\"0px\\\",\\\"word-spacing\\\":\\\"0px\\\",\\\"text-align\\\":\\\"center\\\",\\\"vertical-align\\\":\\\"middle\\\",\\\"background-color\\\":\\\"rgba(223, 255, 0, 0)\\\",\\\"border-radius\\\":\\\"0px\\\"},\\\"font_animation\\\":{\\\"text-animation\\\":\\\"none\\\",\\\"text-animation-mode\\\":\\\"letters\\\"}}\",\"tts_is_enabled\":\"0\",\"tts_language\":\"en_US\",\"tts_scenario\":\"after_sound\",\"tts_volume\":\"50\",\"tts_amount_min\":\"0.00\",\"tts_voice\":\"female_1\",\"tts_rate\":\"medium\",\"variation_conditions\":\"[{ \\\"mode\\\":\\\"alert_type\\\", \\\"value\\\":\\\"1\\\" }, { \\\"mode\\\":\\\"random\\\", \\\"value\\\":\\\"3\\\" }]\",\"name\":null,\"is_active\":\"1\",\"is_deleted\":\"0\",\"position\":\"0\",\"additional_data\":null,\"header_template\":\"{username} - {amount}!\",\"message_template\":null},{\"entity_id\":\"7298168\",\"user_id\":\"2578614\",\"group_id\":\"2\",\"window_coor_x\":\"0\",\"window_coor_y\":\"0\",\"background_color\":\"#00FF00\",\"volume\":\"50\",\"display_pattern\":\"image_top__text_bottom\",\"sound\":\"\",\"image\":\"\",\"message_background\":\"rgba(0, 0, 0, 0)\",\"is_temporary_disabled\":\"0\",\"color_1\":\"#FB8C2B\",\"color_2\":\"#FFFFFF\",\"display_duration\":\"3.00\",\"font_size_1\":\"60\",\"font_size_2\":\"25\",\"header_text\":\"{\\\"font_style\\\":{\\\"font-family\\\":\\\"\\\\\\\"Roboto Condensed\\\\\\\"\\\",\\\"font-size\\\":\\\"60px\\\",\\\"color\\\":\\\"rgb(251, 140, 43)\\\",\\\"font-weight\\\":\\\"bold\\\",\\\"font-style\\\":\\\"normal\\\",\\\"text-decoration\\\":\\\"none\\\",\\\"text-transform\\\":\\\"none\\\",\\\"text-shadow\\\":\\\"1px\\\",\\\"text-shadow_color\\\":\\\"rgb(0, 0, 0)\\\",\\\"letter-spacing\\\":\\\"0px\\\",\\\"word-spacing\\\":\\\"0px\\\",\\\"text-align\\\":\\\"center\\\",\\\"vertical-align\\\":\\\"middle\\\",\\\"background-color\\\":\\\"rgba(255, 255, 255, 0)\\\",\\\"border-radius\\\":\\\"0px\\\"},\\\"font_animation\\\":{\\\"text-animation\\\":\\\"tada\\\",\\\"text-animation-mode\\\":\\\"letters\\\"}}\",\"message_text\":\"{\\\"font_style\\\":{\\\"font-family\\\":\\\"\\\\\\\"Roboto Condensed\\\\\\\"\\\",\\\"font-size\\\":\\\"25px\\\",\\\"color\\\":\\\"rgb(255, 255, 255)\\\",\\\"font-weight\\\":\\\"normal\\\",\\\"font-style\\\":\\\"normal\\\",\\\"text-decoration\\\":\\\"none\\\",\\\"text-transform\\\":\\\"none\\\",\\\"text-shadow\\\":\\\"1px\\\",\\\"text-shadow_color\\\":\\\"rgb(0, 0, 0)\\\",\\\"letter-spacing\\\":\\\"0px\\\",\\\"word-spacing\\\":\\\"0px\\\",\\\"text-align\\\":\\\"center\\\",\\\"vertical-align\\\":\\\"middle\\\",\\\"background-color\\\":\\\"rgba(223, 255, 0, 0)\\\",\\\"border-radius\\\":\\\"0px\\\"},\\\"font_animation\\\":{\\\"text-animation\\\":\\\"none\\\",\\\"text-animation-mode\\\":\\\"letters\\\"}}\",\"tts_is_enabled\":\"0\",\"tts_language\":\"en_US\",\"tts_scenario\":\"after_sound\",\"tts_volume\":\"50\",\"tts_amount_min\":\"0.00\",\"tts_voice\":\"female_1\",\"tts_rate\":\"medium\",\"variation_conditions\":\"[{\\\"mode\\\":\\\"alert_type\\\",\\\"value\\\":6},{\\\"mode\\\":\\\"random\\\",\\\"value\\\":3}]\",\"name\":\"\\u0411\\u0435\\u0441\\u043f\\u043b\\u0430\\u0442\\u043d\\u044b\\u0435 \\u043f\\u043e\\u0434\\u043f\\u0438\\u0441\\u0447\\u0438\\u043a\\u0438 Twitch\",\"is_active\":\"1\",\"is_deleted\":\"0\",\"position\":\"0\",\"additional_data\":null,\"header_template\":\"{username} \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u0447\\u0442\\u043e \\u043f\\u043e\\u0434\\u043f\\u0438\\u0441\\u0430\\u043b\\u0441\\u044f!\",\"message_template\":null},{\"entity_id\":\"7298169\",\"user_id\":\"2578614\",\"group_id\":\"2\",\"window_coor_x\":\"0\",\"window_coor_y\":\"0\",\"background_color\":\"#00FF00\",\"volume\":\"50\",\"display_pattern\":\"image_top__text_bottom\",\"sound\":\"sounds\\/2\\/point_2.mp3\",\"image\":\"images\\/2\\/star.gif\",\"message_background\":\"rgba(0, 0, 0, 0)\",\"is_temporary_disabled\":\"0\",\"color_1\":\"#FB8C2B\",\"color_2\":\"#FFFFFF\",\"display_duration\":\"8.50\",\"font_size_1\":\"60\",\"font_size_2\":\"25\",\"header_text\":\"{\\\"font_style\\\":{\\\"font-family\\\":\\\"\\\\\\\"Roboto Condensed\\\\\\\"\\\",\\\"font-size\\\":\\\"60px\\\",\\\"color\\\":\\\"rgb(251, 140, 43)\\\",\\\"font-weight\\\":\\\"bold\\\",\\\"font-style\\\":\\\"normal\\\",\\\"text-decoration\\\":\\\"none\\\",\\\"text-transform\\\":\\\"none\\\",\\\"text-shadow\\\":\\\"1px\\\",\\\"text-shadow_color\\\":\\\"rgb(0, 0, 0)\\\",\\\"letter-spacing\\\":\\\"0px\\\",\\\"word-spacing\\\":\\\"0px\\\",\\\"text-align\\\":\\\"center\\\",\\\"vertical-align\\\":\\\"middle\\\",\\\"background-color\\\":\\\"rgba(255, 255, 255, 0)\\\",\\\"border-radius\\\":\\\"0px\\\"},\\\"font_animation\\\":{\\\"text-animation\\\":\\\"tada\\\",\\\"text-animation-mode\\\":\\\"letters\\\"}}\",\"message_text\":\"{\\\"font_style\\\":{\\\"font-family\\\":\\\"\\\\\\\"Roboto Condensed\\\\\\\"\\\",\\\"font-size\\\":\\\"25px\\\",\\\"color\\\":\\\"rgb(255, 255, 255)\\\",\\\"font-weight\\\":\\\"normal\\\",\\\"font-style\\\":\\\"normal\\\",\\\"text-decoration\\\":\\\"none\\\",\\\"text-transform\\\":\\\"none\\\",\\\"text-shadow\\\":\\\"1px\\\",\\\"text-shadow_color\\\":\\\"rgb(0, 0, 0)\\\",\\\"letter-spacing\\\":\\\"0px\\\",\\\"word-spacing\\\":\\\"0px\\\",\\\"text-align\\\":\\\"center\\\",\\\"vertical-align\\\":\\\"middle\\\",\\\"background-color\\\":\\\"rgba(223, 255, 0, 0)\\\",\\\"border-radius\\\":\\\"0px\\\"},\\\"font_animation\\\":{\\\"text-animation\\\":\\\"none\\\",\\\"text-animation-mode\\\":\\\"letters\\\"}}\",\"tts_is_enabled\":\"0\",\"tts_language\":\"en_US\",\"tts_scenario\":\"after_sound\",\"tts_volume\":\"50\",\"tts_amount_min\":\"0.00\",\"tts_voice\":\"female_1\",\"tts_rate\":\"medium\",\"variation_conditions\":\"[{\\\"mode\\\":\\\"alert_type\\\",\\\"value\\\":4},{\\\"mode\\\":\\\"random\\\",\\\"value\\\":3}]\",\"name\":\"\\u041f\\u043b\\u0430\\u0442\\u043d\\u044b\\u0435 \\u043f\\u043e\\u0434\\u043f\\u0438\\u0441\\u0447\\u0438\\u043a\\u0438 Twitch\",\"is_active\":\"1\",\"is_deleted\":\"0\",\"position\":\"0\",\"additional_data\":null,\"header_template\":\"{username} \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u0447\\u0442\\u043e \\u043f\\u043e\\u0434\\u043f\\u0438\\u0441\\u0430\\u043b\\u0441\\u044f!\",\"message_template\":null},{\"entity_id\":\"7298170\",\"user_id\":\"2578614\",\"group_id\":\"2\",\"window_coor_x\":\"0\",\"window_coor_y\":\"0\",\"background_color\":\"#00FF00\",\"volume\":\"50\",\"display_pattern\":\"image_top__text_bottom\",\"sound\":\"sounds\\/2\\/point_2.mp3\",\"image\":\"images\\/2\\/star.gif\",\"message_background\":\"rgba(0, 0, 0, 0)\",\"is_temporary_disabled\":\"0\",\"color_1\":\"#FB8C2B\",\"color_2\":\"#FFFFFF\",\"display_duration\":\"8.50\",\"font_size_1\":\"60\",\"font_size_2\":\"25\",\"header_text\":\"{\\\"font_style\\\":{\\\"font-family\\\":\\\"\\\\\\\"Roboto Condensed\\\\\\\"\\\",\\\"font-size\\\":\\\"60px\\\",\\\"color\\\":\\\"rgb(251, 140, 43)\\\",\\\"font-weight\\\":\\\"bold\\\",\\\"font-style\\\":\\\"normal\\\",\\\"text-decoration\\\":\\\"none\\\",\\\"text-transform\\\":\\\"none\\\",\\\"text-shadow\\\":\\\"1px\\\",\\\"text-shadow_color\\\":\\\"rgb(0, 0, 0)\\\",\\\"letter-spacing\\\":\\\"0px\\\",\\\"word-spacing\\\":\\\"0px\\\",\\\"text-align\\\":\\\"center\\\",\\\"vertical-align\\\":\\\"middle\\\",\\\"background-color\\\":\\\"rgba(255, 255, 255, 0)\\\",\\\"border-radius\\\":\\\"0px\\\"},\\\"font_animation\\\":{\\\"text-animation\\\":\\\"tada\\\",\\\"text-animation-mode\\\":\\\"letters\\\"}}\",\"message_text\":\"{\\\"font_style\\\":{\\\"font-family\\\":\\\"\\\\\\\"Roboto Condensed\\\\\\\"\\\",\\\"font-size\\\":\\\"25px\\\",\\\"color\\\":\\\"rgb(255, 255, 255)\\\",\\\"font-weight\\\":\\\"normal\\\",\\\"font-style\\\":\\\"normal\\\",\\\"text-decoration\\\":\\\"none\\\",\\\"text-transform\\\":\\\"none\\\",\\\"text-shadow\\\":\\\"1px\\\",\\\"text-shadow_color\\\":\\\"rgb(0, 0, 0)\\\",\\\"letter-spacing\\\":\\\"0px\\\",\\\"word-spacing\\\":\\\"0px\\\",\\\"text-align\\\":\\\"center\\\",\\\"vertical-align\\\":\\\"middle\\\",\\\"background-color\\\":\\\"rgba(223, 255, 0, 0)\\\",\\\"border-radius\\\":\\\"0px\\\"},\\\"font_animation\\\":{\\\"text-animation\\\":\\\"none\\\",\\\"text-animation-mode\\\":\\\"letters\\\"}}\",\"tts_is_enabled\":\"0\",\"tts_language\":\"en_US\",\"tts_scenario\":\"after_sound\",\"tts_volume\":\"50\",\"tts_amount_min\":\"0.00\",\"tts_voice\":\"female_1\",\"tts_rate\":\"medium\",\"variation_conditions\":\"[{\\\"mode\\\":\\\"alert_type\\\",\\\"value\\\":4},{\\\"mode\\\":\\\"months_in_a_row\\\",\\\"value\\\":2}]\",\"name\":\"\\u041f\\u043b\\u0430\\u0442\\u043d\\u044b\\u0435 \\u043f\\u043e\\u0434\\u043f\\u0438\\u0441\\u043a\\u0438 Twitch - \\u043e\\u0442 2 \\u043c\\u0435\\u0441\\u044f\\u0446\\u0435\\u0432\",\"is_active\":\"1\",\"is_deleted\":\"0\",\"position\":\"0\",\"additional_data\":null,\"header_template\":\"{username} \\u043f\\u043e\\u0434\\u043f\\u0438\\u0441\\u0430\\u043b\\u0441\\u044f {months} \\u043f\\u043e\\u0434\\u0440\\u044f\\u0434!\",\"message_template\":null}]}');

		// console.log(alerts_widget_settings);
		// console.log(settings);

		// settings = alerts_widget_settings.variations[0];

		uploads_base_part = '//static.donationalerts.ru/uploads/';

		window.is_alerting = false;
		window.is_speaking = false;

		var audioFormats = {
			'mp3': {
				'type': ['audio/mpeg; codecs="mp3"', 'audio/mpeg', 'audio/mp3', 'audio/MPA', 'audio/mpa-robust'],
				'required': false
			},
			'mp4': {
				'related': ['aac','m4a'], // additional formats under the MP4 container
				'type': ['audio/mp4; codecs="mp4a.40.2"', 'audio/aac', 'audio/x-m4a', 'audio/MP4A-LATM', 'audio/mpeg4-generic'],
				'required': false
			},
			'ogg': {
				'type': ['audio/ogg; codecs=vorbis'],
				'required': false
			},
			'wav': {
				'type': ['audio/wav; codecs="1"', 'audio/wav', 'audio/wave', 'audio/x-wav'],
				'required': false
			}
		}

		$.each(a_settings.variations, function(index, variation) {
			var conditions = $.parseJSON(variation.variation_conditions);
			var alert_type_id = $.each(conditions, function(j, condition) {
				if (condition.mode == 'alert_type') {
					return parseInt(condition.value);
					return false;
				}
			});
			if (group_id == parseInt(variation.group_id) && variation.sound != '' && variation.sound != null) {
				if ($.inArray(alert_type_id, [4, 6, 7]) != -1) {
					if (is_beta_user == 1) {
						audioFormats[variation.sound.split('.').pop()]['required'] = true;
					}
				}else{
					var audio_format = variation.sound.split('.').pop().toLowerCase();
					if (audio_format in audioFormats) {
						audioFormats[audio_format]['required'] = true;
					}
				}
			}
		});

		soundManager.audioFormats = audioFormats;
		soundManager.preferFlash = false;
		soundManager.useHTML5Audio = true;

		soundManager.setup({
			url: '/js/',
			onready: function() {
				// debug('READY');
				initWidget(a_settings);
				scanForAlerts();
				updateData();
				startDataReceiving();
			},
			ontimeout: function(status) {
				// debug('TIMEOUT '+JSON.stringify(status));
				initWidget(a_settings);
				scanForAlerts();
				updateData();
				startDataReceiving();
			}
		});

		setTimeout(function(){
			updateStreamData();
		}, 60000);

	}else{
		$('.container').html('<div style="color:white;background:black;"><h1>Ваш браузер устарел</h1><p>Мы поддерживаем только современные технологии для обеспечения широких возможностей и максимальной производительности виджета.</p><p>Если Вы используете CLR Browser Source Plugin, то Вам нужно обновить плагин до версии от 10 сентября 2014 года.</p></div>');
	};

</script>
<script src="/js/socket.io-2.0.1.js" id="socketIo"></script>
<script>
	function initWsConnection() {
		if (!isInIframe()) {
			socket = io('wss://socket.donationalerts.ru:443', {
				reconnection: true,
				reconnectionDelayMax: 5000,
				reconnectionDelay: 1000,
			});
		}else{
			socket = null;
		}
	}
	initWsConnection();

	if (socket !== null) {
		socket.on('connect', function(msg){
			console.log('WS: connected');
			socket.emit('add-user', { token: token, type: 'alert_widget' });
			if (da_debug) debug('Connected to WS server');
		});

		socket.on('connect_error', function(msg){
			console.log('WS: connection_error');
			if (da_debug) debug('Could not connect to WS server');
		});

		socket.on('connect_timeout', function(msg){
			console.log('WS: connection_timeout');
          if (da_debug) debug('Connection to WS server is timed out');
		});

		socket.on('reconnect', function(msg){
			console.log('WS: reconnected');
			if (da_debug) debug('Reconnected to WS server');
		});

		socket.on('donation', function(msg){
			if (da_debug) debug('Received new message');
			new_donation = $.parseJSON(msg);
			console.log(new_donation);
			if ($.grep(alerts_array[String(new_donation.alert_type)], function(e){ return e.id == String(new_donation.id); }).length == 0) {
				alerts_array[String(new_donation.alert_type)].push(new_donation);
				if (da_debug) debug('Added message to the queue');
				if (da_debug) debug('Queue items count of type '+new_donation.alert_type+': '+alerts_array[String(new_donation.alert_type)].length);
			};
			if (dPoll.poll_is_available == true && dPoll.is_displaying == true) {
				dPoll.getData(false, true);
			}
		});

		socket.on('update-alert_widget', function(msg){
			alert_data = $.parseJSON(msg);
			console.log(alert_data);
			if(typeof alert_data['_additional'] !== 'undefined'){
				if(typeof alert_data['_additional'].reload !== 'undefined'){
					if (alert_data['_additional'].reload == 1) {
						location.reload();
					}
				}
			}
			initWidget(alert_data);
			updateData();
		});

		socket.on('update-user_general_widget_settings', function(msg){
			handleGeneralWidgetSettings(msg);
		});

		socket.on('alert-show', function(msg){
			var msg = $.parseJSON(msg);
			if (msg.action == 'skip') {
				skipCurrentAlert(msg.alert_id, msg.alert_type);
			}
		})
	}

					tPS = new TwitchPubSub({
			oauth: 'irywp7drj1vv7wy9cezlpb1zgq1f7i',
			channel_id: '65742731',
		});
		tFollowers = new TwitchFollowers({
			channel_id: '65742731',
		});
		tFollowers.getFollowers();
			</script>        </div>
            </body>
</html>