
	var AwsVideo	=	(function(){
		
		var source	= {};
		
		// Private method
		this.privateMethod	=	function(){
			
			console.log('setSource');
		}
		
		return function( options ){
			
			this.players	=	options.players;
			
			// Public method
			this.setup = function(){
				
				this.setDefaultSource();
				
				for(var i in source){
					
					source[i].init.call(this);
				}
			}
			
			this.setSource	=	function( newSource ){
				
				source[newSource.name]	=	newSource.value;
			}
			
			this.getSource	=	function(name){
				
				return source[name];
			}
			
			this.setup();
		};
		
	})();
	
	AwsVideo.prototype	=	{
		Sources: [],
		getPlayer: function(name){
			
			for(var i in this.players){
				
				if(this.players[i].playerID == name)
					return this.players[i];
			}
		},
		play: function(name){
			
			var player	=	this.getPlayer(name);
			
			if(typeof player != 'undefined')
					player.play();
			
		},
		stop: function(name){
			
			var player	=	this.getPlayer(name);
			
			if(typeof player != 'undefined')
					player.stop();
		},
		setDefaultSource: function(){
			
			for(var i in this.Sources){
				
				this.setSource( this.Sources[i] );
			}
		}
	};
	
	// Youtube
	AwsVideo.prototype.Sources.push({
		name: 'youtube',
		value: {		
			init: function(){
				
				var players	=	this.players;
				
				var tag = document.createElement('script');
				var firstScriptTag = document.getElementsByTagName('script')[0];
			
					tag.src = "https://www.youtube.com/iframe_api";
					firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
					
					
					jQuery(document).on('onYouTubeIframeAPIReady', function(){
						
						$.each(players, function(index, player){
							
							if(player.name == 'youtube'){
								
								var element		=	player.element,
									playerID	=	'youtube_'+index;
								
								element.html($('<div id="'+playerID+'"/>'));
								element.data('playerid', playerID);
								
								players[index].playerID	=	playerID;
								
								players[index].player	=	new YT.Player(playerID, {
									height: '100%',
									width: '100%',
									videoId: player.video,
									events: {
										'onReady': onPlayerReady,
										'onStateChange': onPlayerStateChange
									}
								});
								
								players[index].play	=	function(){
									
									this.player.playVideo();
								}
								
								players[index].stop	=	function(){
									
									this.player.stopVideo();
								}
								
							}
							
						});

					});
					
					jQuery(document).on('onPlayerReady', function(){
					
						$.each(players, function(index, player){
							
							if(player.name == 'youtube' && player.auto){
								players[index].player.playVideo();
							}
						});
						
					});
				
			}
		}
	});
	
	// Vimeo
	AwsVideo.prototype.Sources.push({
		name: 'vimeo',
		value: {

			init: function(){
				
				var players	=	this.players;
				var tag = document.createElement('script');
				var firstScriptTag = document.getElementsByTagName('script')[0];

					tag.src = "//f.vimeocdn.com/js/froogaloop2.min.js";
					firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
					
					
					$.each(players, function(index, player){
						
						if(player.name == 'vimeo'){
							
							var iframe		=	$('<iframe/>'),
								element		=	player.element,
								playerID	=	'vimeo_'+index;
								
								iframe.attr('src', '//player.vimeo.com/video/'+player.video+'?api=1&player_id='+playerID);
								iframe.attr('width', 630).attr('height', 354).attr('frameborder', 0);
								iframe.attr('id', playerID);
								
								element.html(iframe);
								element.data('playerid', playerID);
								
								
								iframe.load(function(){
									
									players[index].playerID	=	playerID;
									
									players[index].player	=	$f(iframe[0]);
									
									players[index].play	=	function(){
										
										this.player.api('play');
									}
									
									players[index].stop	=	function(){
										
										this.player.api('pause');
									}
									
									if(player.auto)
										players[index].player.api('play');
									
								});
						}
						
					});

			}

		}
	});
	
	// Hosting
	AwsVideo.prototype.Sources.push({
		name: 'hosting',
		value: {
			init: function(){
				var players	=	this.players;
				var tag = document.createElement('script');
				var firstScriptTag = document.getElementsByTagName('script')[0];

					tag.src = "./js/videojs/video.js";
					firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
					
					$(tag).load(function(){
						$.each(players, function(index, player){
						
							if(player.name == 'hosting'){
								
								var options	=	$.extend({width: 630, height: 354, auto: false, preload: 'auto'}, player);
								var video	=	$('<video class="video-js vjs-default-skin vjs-big-play-centered" controls/>');
								var element	=	$('#'+player.playerId);
								
								
								$.each(player.video, function(index, data){
									
									var source	=	$('<source />');
									
									source.attr('src', data.src);
									source.attr('type', data.type);
									
									video.append(source);
								});
								
								video.attr('id', 'vjs_'+player.playerId);
								video.attr('width', options.width);
								video.attr('height', options.height);
								video.attr('preload', options.auto);
								
								
							
								element.html(video);
							
								videojs('vjs_'+player.playerId, {}, function(){
									
									var videojsPlayer	=	this;
									
									if(player.auto)
										this.play();
									
									players[index].play	=	function(){
										
										videojsPlayer.play();
									}
									
									players[index].stop	=	function(){
										
										videojsPlayer.pause();
									}
									
								});
							}
						});
					});	
					
					
			}
		}
	});
		
function onYouTubeIframeAPIReady() {
	
	jQuery(document).trigger(jQuery.Event('onYouTubeIframeAPIReady'));
}

function onPlayerReady(event) {
  
  jQuery(document).trigger(jQuery.Event('onPlayerReady'));
}

function onPlayerStateChange(event) {
	
}
function stopVideo() {

}