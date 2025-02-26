(function (a, b) {
	var b = b || {};
	b[a] = function (a, c) {
		this.options = jQuery.extend({
			controllerOnly: false
		}, this.options);
		b.call(this, a, c)
	};
	b[a].prototype = new b;
	b[a].prototype.constructor = b[a];
	b[a].prototype.construct = function () {
		b.prototype.construct.call(this);
		if (this.options.controllerOnly) {
			this.display.addClass("controller-only")
		}
	};
	b[a].prototype.getDisplay = function () {
		if (this.context.children().length == 0) {
			this.context = this.context.attr({
				id: this.options.id + "-player",
				"class": "minplayer-" + a + "-media"
			}).wrap(jQuery(document.createElement("div")).attr({
				"class": "minplayer-" + a + "-display ui-widget-content"
			})).parent(".minplayer-" + a + "-display").wrap(jQuery(document.createElement("div")).attr({
				"class": "minplayer-" + a
			})).parent(".minplayer-" + a).prepend('        <div class="minplayer-' + a + '-logo"></div>        <div class="minplayer-' + a + '-error"></div>').wrap(jQuery(document.createElement("div")).attr({
				id: this.options.id,
				"class": "html5playerer-" + a + " player-ui"
			})).parent(".html5playerer-" + a);
			this.options.build = true
		}
		return this.context
	};
	b[a].prototype.getElements = function () {
		var c = b.prototype.getElements.call(this);
		this.display.width(this.options.width);
		this.display.height(this.options.height);
		var d = jQuery(".minplayer-" + a, this.display);
		if (this.options.playlistOnly) {
			d.remove();
			d = null
		}
		return jQuery.extend(c, {
			player: this.display,
			minplayer: d,
			display: jQuery(".minplayer-" + a + "-display", this.display),
			media: jQuery(".minplayer-" + a + "-media", this.display),
			error: jQuery(".minplayer-" + a + "-error", this.display),
			logo: jQuery(".minplayer-" + a + "-logo", this.display)
		})
		
	}
})("default", html5playerer);
(function (a, b) {
	var b = b || {};
	b.controller = b.controller || {};
	b.controller[a] = function (a, b) {
		minplayer.controller.call(this, a, b)
	};
	b.controller[a].prototype = new minplayer.controller;
	b.controller[a].prototype.constructor = b.controller[a];
	b.controller[a].prototype.construct = function () {
		minplayer.controller.prototype.construct.call(this);
		if (!this.options.controllerOnly) {
			this.get("player", function (a) {
				this.get("media", function (b) {
					if (!b.hasController()) {
						minplayer.showThenHide(this.display, 5e3, function (b) {
							var c = b ? "addClass" : "removeClass";
							a.display[c]("with-controller")
						})
					} else {
						a.display.addClass("with-controller")
					}
				})
			})
		}
	};
	b.controller[a].prototype.getDisplay = function () {
		if (this.options.build) {
			jQuery(".minplayer-" + a, this.context).prepend('      <div class="minplayer-' + a + '-controls ui-widget-header">        <div class="minplayer-' + a + '-controls-left">          <a class="minplayer-' + a + "-play minplayer-" + a + '-button ui-state-default ui-corner-all" title="Play">            <span class="ui-icon ui-icon-play"></span>          </a>          <a class="minplayer-' + a + "-pause minplayer-" + a + '-button ui-state-default ui-corner-all" title="Pause">            <span class="ui-icon ui-icon-pause"></span>          </a>        </div>        <div class="minplayer-' + a + '-controls-right">          <div class="minplayer-' + a + '-timer">00:00</div>          <div class="minplayer-' + a + '-fullscreen ui-widget-content">            <div class="minplayer-' + a + '-fullscreen-inner ui-state-default"></div>          </div>          <div class="minplayer-' + a + '-volume">            <div class="minplayer-' + a + '-volume-slider"></div>            <a class="minplayer-' + a + "-volume-mute minplayer-" + a + '-button ui-state-default ui-corner-all" title="Mute">              <span class="ui-icon ui-icon-volume-on"></span>            </a>            <a class="minplayer-' + a + "-volume-unmute minplayer-" + a + '-button ui-state-default ui-corner-all" title="Unmute">              <span class="ui-icon ui-icon-volume-off"></span>            </a>          </div>        </div>        <div class="minplayer-' + a + '-controls-mid">          <div class="minplayer-' + a + '-seek">            <div class="minplayer-' + a + '-progress ui-state-default"></div>          </div>        </div>      </div>')
		}
		this.context.addClass("with-controller");
		return jQuery(".minplayer-" + a + "-controls", this.context)
	};
	b.controller[a].prototype.getElements = function () {
		var b = minplayer.controller.prototype.getElements.call(this);
		var c = jQuery(".minplayer-" + a + "-timer", this.display);
		return jQuery.extend(b, {
			play: jQuery(".minplayer-" + a + "-play", this.display),
			pause: jQuery(".minplayer-" + a + "-pause", this.display),
			fullscreen: jQuery(".minplayer-" + a + "-fullscreen", this.display),
			seek: jQuery(".minplayer-" + a + "-seek", this.display),
			progress: jQuery(".minplayer-" + a + "-progress", this.display),
			volume: jQuery(".minplayer-" + a + "-volume-slider", this.display),
			mute: jQuery(".minplayer-" + a + "-volume-mute", this.display),
			timer: c,
			duration: c
		})
	}
})("default", html5playerer);
(function (a, b) {
	var b = b || {};
	b.pager = b.pager || {};
	b.pager[a] = function (a, c) {
		b.pager.call(this, a, c)
	};
	b.pager[a].prototype = new b.pager;
	b.pager[a].prototype.constructor = b.pager[a];
	b.pager[a].prototype.getDisplay = function () {
		if (this.options.build) {
			this.context.append('    <div class="html5playerer-' + a + '-playlist-pager ui-widget-header">   <div style="float:right; padding:7px;"><a href="https://twitter.com/HTML5MP3Player" target="_blank" title="Twitter"><img src="http://html5mp3player.googlecode.com/svn/trunk/images/twitter.png" border="0" width="20"></a>&nbsp;<a href="https://www.facebook.com/Html5Mp3Player" target="_blank" title="Facebook"><img src="http://html5mp3player.googlecode.com/svn/trunk/images/facebook.png" border="0" width="20"></a>&nbsp;<a href="http://html5plus.svnlabs.com/shop/html5-video-player-with-playlist/" target="_blank" title="HTML5 Video Player with Playlist"><img src="http://html5mp3player.googlecode.com/svn/trunk/images/link-icon.png" border="0" width="20"></a></div>     <div class="html5playerer-' + a + '-playlist-pager-left">          <a href="#" class="html5playerer-' + a + "-playlist-pager-link html5playerer-" + a + "-playlist-pager-prevpage minplayer-" + a + '-button ui-state-default ui-corner-all">            <span class="ui-icon ui-icon-circle-triangle-w"></span>          </a>        </div>        <div class="html5playerer-' + a + '-playlist-pager-right">          <a href="#" class="html5playerer-' + a + "-playlist-pager-link html5playerer-" + a + "-playlist-pager-nextpage minplayer-" + a + '-button ui-state-default ui-corner-all">            <span class="ui-icon ui-icon-circle-triangle-e"></span>          </a>        </div>      </div>')
		}
		return jQuery(".html5playerer-" + a + "-playlist-pager", this.context)
	};
	b.pager[a].prototype.getElements = function () {
		var c = b.pager.prototype.getElements.call(this);
		return jQuery.extend(c, {
			prevPage: jQuery(".html5playerer-" + a + "-playlist-pager-prevpage", this.display),
			nextPage: jQuery(".html5playerer-" + a + "-playlist-pager-nextpage", this.display)
		})
	}
})("default", html5playerer);
(function (a, b) {
	var b = b || {};
	b.playLoader = b.playLoader || {};
	b.playLoader[a] = function (a, b) {
		minplayer.playLoader.call(this, a, b)
	};
	b.playLoader[a].prototype = new minplayer.playLoader;
	b.playLoader[a].prototype.constructor = b.playLoader[a];
	b.playLoader[a].prototype.getDisplay = function () {
		if (this.options.build) {
			jQuery(".minplayer-" + a + "", this.context).prepend('      <div class="minplayer-' + a + '-loader-wrapper">        <div class="minplayer-' + a + '-big-play ui-state-default"><span></span></div>        <div class="minplayer-' + a + '-loader"> </div>        <div class="minplayer-' + a + '-preview ui-widget-content"></div>      </div>')
		}
		return jQuery(".minplayer-" + a + " .minplayer-" + a + "-loader-wrapper", this.context)
	};
	b.playLoader[a].prototype.getElements = function () {
		var b = minplayer.playLoader.prototype.getElements.call(this);
		return jQuery.extend(b, {
			busy: jQuery(".minplayer-" + a + "-loader", this.display),
			bigPlay: jQuery(".minplayer-" + a + "-big-play", this.display),
			preview: jQuery(".minplayer-" + a + "-preview", this.display)
		})
	}
})("default", html5playerer);
(function (a, b) {
	var b = b || {};
	b.playlist = b.playlist || {};
	b.playlist[a] = function (a, c) {
		b.playlist.call(this, a, c)
	};
	b.playlist[a].prototype = new b.playlist;
	b.playlist[a].prototype.constructor = b.playlist[a];
	b.playlist[a].prototype.construct = function () {
		this.options = jQuery.extend({
			showPlaylist: true
		}, this.options);
		b.playlist.prototype.construct.call(this);
		minplayer.showThenHide(this.elements.hideShow);
		this.get("player", function (a) {
			var b = this.options.vertical ? "width" : "height";
			var c = this.options.vertical ? "right" : "bottom";
			var d = this.options.vertical ? "marginRight" : "marginBottom";
			this.hideShow = function (e, f) {
				var g = {},
					h = {};
				var i = this.display[b]();
				g[c] = e ? i : 0;
				if (f) {
					a.elements.minplayer.animate(g, "fast")
				} else {
					a.elements.minplayer.css(g)
				}
				h[d] = e ? 0 : -i;
				if (f) {
					this.display.animate(h, "fast", function () {
						a.resize()
					})
				} else {
					this.display.css(h)
				}
			};
			if (this.elements.hideShow) {
				this.elements.hideShow.bind("click", function (a) {
					return function (b) {
						b.preventDefault();
						var c = jQuery("span", a.elements.hideShow);
						var d = a.options.vertical ? "e" : "s";
						var e = a.options.vertical ? "w" : "n";
						var f = c.hasClass("ui-icon-triangle-1-" + e);
						var g = f ? "ui-icon-triangle-1-" + e : "ui-icon-triangle-1-" + d;
						var h = f ? "ui-icon-triangle-1-" + d : "ui-icon-triangle-1-" + e;
						jQuery("span", a.elements.hideShow).removeClass(g).addClass(h);
						a.hideShow(f, true)
					}
				}(this))
			}
			if (a.elements.minplayer) {
				if (this.options.showPlaylist) {
					if (this.options.vertical) {
						a.elements.minplayer.css("right", this.display.width() + "px")
					} else {
						a.elements.minplayer.css("bottom", this.display.height() + "px")
					}
				} else {
					this.hideShow(false)
				}
			}
		})
	};
	b.playlist[a].prototype.getDisplay = function () {
		if (this.options.build) {
			this.context.append('      <div class="html5playerer-' + a + '-playlist">        <div class="html5playerer-' + a + '-hide-show-playlist ui-state-default">          <span class="ui-icon"></span>        </div>        <div class="minplayer-' + a + '-loader-wrapper">          <div class="minplayer-' + a + '-loader"></div>        </div>        <div class="html5playerer-' + a + '-playlist-scroll ui-widget-content">          <div class="html5playerer-' + a + '-playlist-list"></div>      </div>      </div>')
		}
		return jQuery(".html5playerer-" + a + "-playlist", this.context)
	};
	b.playlist[a].prototype.getElements = function () {
		var c = b.playlist.prototype.getElements.call(this);
		var d = this.options.vertical ? "playlist-vertical" : "playlist-horizontal";
		d += this.options.playlistOnly ? " playlist-only" : "";
		var e = this.options.showPlaylist;
		var f = this.options.vertical ? e ? "e" : "w" : e ? "s" : "n";
		var g = this.options.vertical ? "ui-corner-left" : "ui-corner-top";
		if (this.options.disablePlaylist || !this.options.playlist) {
			this.display.remove()
		}
		this.display.addClass(d);
		var h = jQuery(".html5playerer-" + a + "-hide-show-playlist", this.display);
		h.addClass(g);
		if (this.options.playlistOnly) {
			h.hide();
			h = null
		}
		jQuery("span", h).addClass("ui-icon-triangle-1-" + f);
		return jQuery.extend(c, {
			playlist_busy: jQuery(".minplayer-" + a + "-loader-wrapper", this.display),
			list: jQuery(".html5playerer-" + a + "-playlist-list", this.display),
			scroll: jQuery(".html5playerer-" + a + "-playlist-scroll", this.display),
			hideShow: h
		})
	}
})("default", html5playerer);
(function (a, b) {
	var b = b || {};
	b.teaser = b.teaser || {};
	b.teaser[a] = function (a, c) {
		b.teaser.call(this, a, c)
	};
	b.teaser[a].prototype = new b.teaser;
	b.teaser[a].prototype.constructor = b.teaser[a];
	b.teaser[a].prototype.construct = function () {
		minplayer.display.prototype.construct.call(this);
		this.display.bind("mouseenter", function (a) {
			return function () {
				a.addClass("ui-state-hover")
			}
		}(this.elements.info)).bind("mouseleave", function (a) {
			return function () {
				a.removeClass("ui-state-hover")
			}
		}(this.elements.info))
	};
	b.teaser[a].prototype.getDisplay = function () {
		this.context.append('    <div class="html5playerer-' + a + '-teaser ui-widget-content">      <div class="html5playerer-' + a + '-teaser-image"></div>      <div class="html5playerer-' + a + '-teaser-info ui-state-default">        <div class="html5playerer-' + a + '-teaser-title">Sample Title</div>      </div>    </div>');
		var b = jQuery(".html5playerer-" + a + "-teaser", this.context);
		return b.eq(b.length - 1)
	};
	b.teaser[a].prototype.select = function (a) {
		if (a) {
			this.elements.info.addClass("ui-state-active")
		} else {
			this.elements.info.removeClass("ui-state-active")
		}
	};
	b.teaser[a].prototype.getElements = function () {
		var c = b.teaser.prototype.getElements.call(this);
		return jQuery.extend(c, {
			info: jQuery(".html5playerer-" + a + "-teaser-info", this.display),
			title: jQuery(".html5playerer-" + a + "-teaser-title", this.display),
			image: jQuery(".html5playerer-" + a + "-teaser-image", this.display)
		})
	}
})("default", html5playerer)