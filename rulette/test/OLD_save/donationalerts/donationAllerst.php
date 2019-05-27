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
			</script>