window.onload = function()
{var a = document.getElementsByTagName("iframe");for(i=0;i<a.length;i++){var b = a[i].getAttribute("src");if(b !== null){if(b.indexOf("youtube") != -1 && b.indexOf("origin") == -1){a[i].setAttribute("src", b+'&origin=https://'+document.location.host+'')}}}};

var gtmYTPlayers = [];
	
    // OPTIONAL: Enable JSAPI if it's not already on the URL
    // note: this will cause the YouTube player to "flash" on the page when reloading to enable the JS API
    for (var e = document.getElementsByTagName("iframe"), x = e.length; x--;)
        if (/youtube.com\/embed/.test(e[x].src))
            if (e[x].src.indexOf('enablejsapi=') === -1)
                e[x].src += (e[x].src.indexOf('?') === -1 ? '?' : '&') + 'enablejsapi=1';
		
	/**
	 * Attaches listener once the YouTube API is loaded	
	**/
    function onYouTubeIframeAPIReady() {
        for (var e = document.getElementsByTagName("iframe"), x = e.length; x--;) {
            if (/youtube.com\/embed/.test(e[x].src)) {
                gtmYTPlayers.push(new YT.Player(e[x], {
                    events: {
                        onStateChange: onPlayerStateChange,
                        onError: onPlayerError
                    }
                }));
                YT.gtmLastAction = "p";
            }
        }
    }

	/**
	 * Listen for play/pause. Other states such as rewind and end could also be added
     * Also report % played every second
	 * @param e - event
	**/
    function onPlayerStateChange(e) {
        e["data"] == YT.PlayerState.PLAYING && setTimeout(onPlayerPercent, 1000, e["target"]);
        var video_data = e.target["getVideoData"](),
            label = video_data.video_id + ':' + video_data.title;
        if (e["data"] == YT.PlayerState.PLAYING && YT.gtmLastAction == "p") {
            dataLayer.push({
                event: 'youtube',
                event_category: 'youtube',
				event_action: 'play',
                event_label: label
            });
gtag('event', 'youtube');

            YT.gtmLastAction = "";
        }
        if (e["data"] == YT.PlayerState.PAUSED) {
            dataLayer.push({
                event: 'youtube',
                event_category: 'youtube',
				event_action: 'pause',
                event_label: label
            });
gtag('event', 'youtube');
            YT.gtmLastAction = "p";
        }
    }

	/**
	 * Catch all to report errors through the GTM data layer. once the error is exposed to GTM, it can be tracked in UA as an event!
	 * Refer to https://developers.google.com/youtube/js_api_reference#Events onError
	 * @param: e (event)
	**/
    
    function onPlayerError(e) {
        dataLayer.push({
            event: 'error',
			eventCategory: 'youtube',
			eventAction: 'play',
            eventLabel: 'youtube: ' + e
        })
    }

	/**
	 * Report the % played if it matches 0%, 25%, 50%, 75%, 90% or completed
	 * @param: e (event)
	**/
    function onPlayerPercent(e) {
        if (e["getPlayerState"]() == YT.PlayerState.PLAYING) {
            //var t = e["getDuration"]() - e["getCurrentTime"]() <= 1.5 ? 1 : (Math.floor(e["getCurrentTime"]() / e["getDuration"]() * 4) / 4).toFixed(2);
            
            // Set the played duration to every tenth because we'll need to also capture 90% played.
            var t = e["getDuration"]() - e["getCurrentTime"]() <= 1.5 ? 1 : (Math.floor(e["getCurrentTime"]() / e["getDuration"]() * 10) / 10).toFixed(2);
            
            if (parseFloat(t) < 0.25) {
                t = 0.00;
            }
            else if (parseFloat(t) < 0.5){
                t = 0.25;
            }
            else if (parseFloat(t) < 0.75){
                t = 0.50;
            }
            else if (parseFloat(t) < 0.9){
                t = 0.75;
            }
            else if (parseFloat(t) < 1){
                t = 0.90;
            }
            // duration t needs to be fixed to 2 decimal places
            t = t.toFixed(2);
            
            if (!e["lastP"] || t > e["lastP"]) {
                var video_data = e["getVideoData"](),
                    label = video_data.video_id + ':' + video_data.title;
                e["lastP"] = t;
                dataLayer.push({
                    event: "youtube",
                    event_category: 'youtube',
                    event_action: t * 100 + "%",
                    eventLabel: label
                })
gtag('event', 'youtube');
            }
            e["lastP"] != 1 && setTimeout(onPlayerPercent, 1000, e);
        }
    }
	
	/**
	 * Add unload event listener
	**/
	window.addEventListener('beforeunload', function(e){
		for (var i = 0; i < gtmYTPlayers.length; i++){
			if (gtmYTPlayers[i].getPlayerState() === 1) { // playing
				var video_data = gtmYTPlayers[i]['getVideoData'](),
				label = video_data.video_id + ':' + video_data.title;
				
				dataLayer.push({
					event: 'youtube',
					event_category: 'youtube',
					event_action: 'exit',
					event_label: label
				});
gtag('event', 'youtube');
			}
		}
	})
    
	// load the Youtube JS api and get going
    var j = document.createElement("script"),
        f = document.getElementsByTagName("script")[0];
    j.src = "//www.youtube.com/iframe_api";
    j.async = true;
    f.parentNode.insertBefore(j, f);
