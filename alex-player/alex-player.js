/* Alex Player v1.40, Author: Alex Zhyrytovskyi, 2019-2024. URL: http://alex.player.x10.name/ */
(window.jQuery || mediaUI)(function() {	
	var $ = /*window.jQuery || */mediaUI;
	var ui = mediaUI;
	var instances = {};
	var instancesRendered = {};
	
	function trim(str) {
		return String(str || '').trim();
	}
	
	function getInstance(data, api) {
		var url = data['file'] || data['stream'];
		
		if (!instances.hasOwnProperty(url)) {
			var instance = mediaEngine({
				'api': api
			});
			instances[url] = instance;
			return instance;
		}
		
		return instances[url];
	}
	
	function tryRender(player, data) {
		var url = data['file'] || data['stream'];
		if (!url || instancesRendered.hasOwnProperty(url))
			return;

		if (data['file'])
			player.renderFile(url);
		else
			player.renderStream(url, data['title']);
		
		instancesRendered[url] = true;
	}

	$(document).findAll('.wp-alex-media-player').each(function() {
		var $owner = $(this);
		var data = JSON.parse($owner.attr('data-json'));
		var player = getInstance(data, data['api']);

		var options = {
			'player': player
		};
		
		if (data.hasOwnProperty('mode'))
			options['mode'] = data['mode'];
		
		if (data.hasOwnProperty('style'))
			options['style'] = data['style'];

		if (data.hasOwnProperty('color'))
			options['lineColor'] = data['color'];

		if (data.hasOwnProperty('max_width')) // !Deprecated
			options['width'] = data['max_width'];
		
		if (data.hasOwnProperty('width'))
			options['width'] = data['width'];

		if (data.hasOwnProperty('vis_type'))
			options['visType'] = data['vis_type'];
		
		if (data.hasOwnProperty('equalizer_color'))
			options['equalizerColor'] = data['equalizer_color'];
		
		if (data.hasOwnProperty('looped'))
			player.setLooped(data['looped']);
		
		if (data.hasOwnProperty('show_video'))
			options['showVideo'] = data['show_video'];
		
		if (data.hasOwnProperty('spectrum')) {
			var parts = String(data['spectrum']).split(' ');
			if (parts.length == 2) {
				options['spectrumEnabled'] = true;
				options['spectrumColor'] = parts[0];
				options['spectrumHeight'] = parts[1];
			}
			else if (parts.length == 1) {
				options['spectrumEnabled'] = true;
				options['spectrumColor'] = parts[0];
			}
		}
		
		if (data.hasOwnProperty('hide_play_button'))
			options['hidePlayButton'] = data['hide_play_button'];
		
		if (data.hasOwnProperty('autoplay')) // !Experimental
			player.setAutoplay(data['autoplay']);
		
		if (data.hasOwnProperty('looped'))
			player.setLooped(data['looped']);
		
		if (data.hasOwnProperty('cookie_name'))
			options['cookieName'] = data['cookie_name'];

		if (data.hasOwnProperty('position'))
			options['position'] = data['position'];

		if (data.hasOwnProperty('radio_station')) {
			var stationList = [];
			$owner.findAll('.wp-alex-radio-station').each(function() {
				var item = JSON.parse($(this).attr('data-json'));
				var station = {};
				station['name'] = item['name'];
				station['url'] = item['url'];
				if (item['type'] == 'icecast') {
					station['type'] = 'icecast';
					station['icecasturl'] = item['icecasturl'];
					station['interval'] = item['interval'];
				}
				stationList.push(station);
			});

			if (ui.toInt(data['radio_station']) > 0)
				player.renderRadio(data['radio_station'], stationList, true);
			else
				player.renderRadio(0, stationList, true);
		}
		else {
			tryRender(player, data);
		}

		var $playlist = $('<div>');
		$playlist.insertAfter($owner);
		$playlist.UIMediaPlayer(options);
		$owner.hide();
	});

	$(document).findAll('.wp-alex-wavesurfer').each(function() {
		var $this = $(this);
		var data = JSON.parse($this.attr('data-json'));
		var player = getInstance(data, data['api']);

		var options = {
			'player': player
		};

		if (data.hasOwnProperty('color'))
			options['mainColor'] = data['color'];

		if (data.hasOwnProperty('color2'))
			options['secondaryColor'] = data['color2'];
		
		if (data.hasOwnProperty('cached'))
			options['cachedWave'] = data['cached'];
		
		if (data.hasOwnProperty('autoplay')) // !Experimental
			player.setAutoplay(data['autoplay']);
		
		if (data.hasOwnProperty('looped'))
			player.setLooped(data['looped']);
		
		if (data.hasOwnProperty('selection_enabled'))
			options['selectionEnabled'] = data['selection_enabled'];
		
		if (data.hasOwnProperty('selection_color'))
			options['selectionColor'] = data['selection_color'];

		if (data.hasOwnProperty('selection_download'))
			options['selectionDownloadEnabled'] = data['selection_download'];

		if (data.hasOwnProperty('channels'))
			options['channels'] = data['channels'];
		
		if (data.hasOwnProperty('hide_play_button'))
			options['hidePlayButton'] = data['hide_play_button'];

		$this.UIWaveSurfer(options);
		tryRender(player, data);
	});

	$(document).findAll('.wp-alex-waveform').each(function() {
		var $this = $(this);
		var data = JSON.parse($this.attr('data-json'));
		var options = {};
		
		if (data.hasOwnProperty('file'))
			options['player'] = getInstance(data);

		if (data.hasOwnProperty('color'))
			options['color'] = data['color'];

		if (data.hasOwnProperty('opacity'))
			options['opacity'] = data['opacity'];

		if (data.hasOwnProperty('height'))
			options['height'] = data['height'];

		var owner = data['owner'];
		if (owner) {
			options['ghostMode'] = true;
			options['ghostTop'] = data['owner_top'];
			$(owner).UIWaveform(options);
		}
		else
			$this.UIWaveform(options);
	});

	$(document).findAll('.wp-alex-play-button').each(function() {
		var $this = $(this);
		var data = JSON.parse($this.attr('data-json'));
		var player = getInstance(data);
		var options = {
			'player': player
		};
		
		if (data.hasOwnProperty('size')) {
			var size = trim(data['size']).split(' ');
			options['size'] = size[0];
			if (size.length > 1)
				options['outerSize'] = size[1];
		}
		
		if (data.hasOwnProperty('color')) {
			var colorParts = trim(data['color']).split(' ');
			options['color'] = colorParts[0];
			if (colorParts.length > 1)
				options['hoverColor'] = colorParts[1];
			if (colorParts.length > 2)
				options['hoverDuration'] = colorParts[2];
		}
		
		if (data.hasOwnProperty('id'))
			options['id'] = data['id'];
		
		if (data.hasOwnProperty('autoplay')) // !Experimental
			player.setAutoplay(data['autoplay']);
		
		if (data.hasOwnProperty('looped'))
			player.setLooped(data['looped']);
		
		var owner = data['owner'];
		if (owner)
			$(owner).UIPlayButton(options);
		else
			$this.UIPlayButton(options);

		tryRender(player, data);
	});

	$(document).findAll('.wp-alex-circular-spectrum').each(function() {
		var data = JSON.parse($(this).attr('data-json'));
		
		var size = trim(data['size']).split(' ');
		if (size.length != 2)
			return;
		
		var bars = trim(data['bars']).split(' ');
		if (bars.length != 5)
			return;
		
		var options = {
			'innerSize': size[0],
			'outerSize': size[1],
			'barCount': bars[0],
			'barSize': bars[1],
			'barColor': bars[2],
			'barSpeed': bars[3],
			'multiplier': bars[4]
		};
		
		if (data.hasOwnProperty('peaks')) {
			var peaks = trim(data['peaks']).split(' ');
			if (peaks.length == 2) {
				options['showPeaks'] = true;
				options['peakColor'] = peaks[0];
				options['peakSpeed'] = peaks[1];
			}
		}
		
		if (data.hasOwnProperty('opacity'))
			options['opacity'] = data['opacity'];
		
		var ownerSelector = data['owner'];
		$(ownerSelector).UICircularSpectrum(options);
	});

	$(document).findAll('.wp-alex-equalizer').each(function() {
		var data = JSON.parse($(this).attr('data-json'));
		var player = getInstance(data);

		var options = {
			'player': player
		};
		
		if (data.hasOwnProperty('color'))
			options['color'] = data['color'];
		
		if (data.hasOwnProperty('cookie_name'))
			options['cookieName'] = data['cookie_name'];
		
		$(this).UIEqualizer(options);
	});

	$(document).findAll('.wp-alex-playlist').each(function() {
		var $owner = $(this);
		var data = JSON.parse($owner.attr('data-json'));
		var player = mediaEngine.instances[0];

		var options = {
			'player': player
		};

		var items = [];
		$owner.findAll('.wp-alex-playlist-item').each(function() {
			var item = JSON.parse($(this).attr('data-json'));
			items.push({
				'title': item['title'],
				'url': item['url']
			});
		});
		options['items'] = items;

		var $playlist = $('<div>');
		$playlist.insertAfter($owner);
		$playlist.UIPlaylist(options);
		$owner.hide();
	});
});