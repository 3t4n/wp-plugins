(function() {	
	tinymce.create( 'tinymce.plugins.AyoShortcodesButton', {
		init : function(ed, url){
			tinymce.plugins.AyoShortcodesButton.theurl = url;
		},
		createControl : function(btn, e) {
			if ( btn == "ayo_shortcode_list" ) {

				var a = this;

				var btn = e.createSplitButton( 'shortcode_list', {
					image: tinymce.plugins.AyoShortcodesButton.theurl +"/shortcodes.png",
					icons: false,
	            });

	            btn.onRenderMenu.add(function (c, b) {
	            	a.render( b, "Alert", "alert" );
					a.render( b, "Button", "button" );
					a.render( b, "Code", "code" );
					a.render( b, "Columns", "columns" );
					a.render( b, "Email", "email" );
					a.render( b, "Google Maps", "google_maps" );
					a.render( b, "Latest Tweet", "latest_tweet" );
					a.render( b, "Notes", "notes" );
					a.render( b, "Pricing Table", "pricing_table" );
					a.render( b, "Progress", "progress" );
					a.render( b, "Testimonial", "testimonial" );
					a.render( b, "Tooltip", "tooltip" );
				});
	            
	          return btn;
			}

			return null;

		},

		render : function(ed, title, id) {
			ed.add({
				title: title,
				onclick: function () {
					
					// Selected content
					var ayoGetContent = tinyMCE.activeEditor.selection.getContent();

					// Alert
					if( id == "alert" ) {
						tinyMCE.activeEditor.selection.setContent( '[ayo_alert type="info" close="true" column="full-width"]<br />'+ ayoGetContent +'<br />[/ayo_alert]' );
					}

					// Button
					if( id == "button" ) {
						tinyMCE.activeEditor.selection.setContent( '[ayo_button url="#" background="red" color="white" size="14" target="self" rounded="false"]'+ ayoGetContent +'[/ayo_button]' );
					}

					// Columns
					if( id == "columns" ) {
						tinyMCE.activeEditor.selection.setContent( '[ayo_columns column="one-half" position="first"]<br />'+ ayoGetContent +'<br />[/ayo_columns]', {format : 'raw'} );
					}

					// Email
					if( id == "email" ) {
						tinyMCE.activeEditor.selection.setContent( '[ayo_email mailto="false"]'+ ayoGetContent +'[/ayo_email]' );
					}

					// Columns
					if( id == "google_maps" ) {
						tinyMCE.activeEditor.selection.setContent( '[ayo_gmaps title="Our Headquarter" address="New York, USA" height="300px" column="one-half" position="first"]<br />'+ ayoGetContent +'<br />[/ayo_gmaps]' );
					}

					// Latest tweets
					if( id == "latest_tweet" ) {
						tinyMCE.activeEditor.selection.setContent( '[ayo_tweets id="ayothemes" num="3" column="one-third" position="first"]' );
					}

					// Notes
					if( id == "notes" ) {
						tinyMCE.activeEditor.selection.setContent( '[ayo_notes style="orange" column="one-half" position="first"]<br />'+ ayoGetContent +'<br />[/ayo_notes]' );
					}

					// Code
					if( id == "code" ) {
						tinyMCE.activeEditor.selection.setContent( '[ayo_code column="full-width"]<br />'+ ayoGetContent +'<br />[/ayo_code]' );
					}

					// Pricing Table
					if( id == "pricing_table" ) {
						tinyMCE.activeEditor.selection.setContent( '[ayo_pricing plan="Basic" price="$19.99" per="per Month" background="#444" color="white" column="one-third" position="first"]<br />'+ ayoGetContent +'<br />[/ayo_pricing]' );
					}

					// Skillbar
					if( id == "progress" ) {
						tinyMCE.activeEditor.selection.setContent( '[ayo_progress title="WordPress" percentage="89" background="#21759b" color="white"]' );
					}

					// Testimonial
					if( id == "testimonial" ) {
						tinyMCE.activeEditor.selection.setContent( '[ayo_testimonial name="AyoThemes" email="support@ayothemes.com" company="AyoThemes" url="http://ayothemes.com" column="one-third" position="first"]<br />'+ ayoGetContent +'<br />[/ayo_testimonial]' );
					}

					// Testimonial
					if( id == "tooltip" ) {
						tinyMCE.activeEditor.selection.setContent( '[ayo_tooltip title="Your nice tooltip goes here"]'+ ayoGetContent +'[/ayo_tooltip]' );
					}
					
					return false;
				}
			})
		}
	
	});
	tinymce.PluginManager.add( "ayo_shortcode_list", tinymce.plugins.AyoShortcodesButton );
})();

(function() {
	tinymce.create('tinymce.plugins.ayo_icon_selector', {
		
		init : function( ed, url ) {},

		createControl : function(n, cm) {
			if( n=='ayo_icon_selector' ){
                var ayoicon = cm.createListBox( 'ayo_icon_selector', {
                     title : 'Icons',
                     onselect : function(v) { 
                        	tinyMCE.activeEditor.selection.setContent('[ayo_icon icon="' + v + '" color="gray" size="16"]');
                     }
                });
 
				// @todo Find a better way to add this one
				ayoicon.add( "adjust", "adjust" );
				ayoicon.add( "align-center", "align-center" );
				ayoicon.add( "align-justify", "align-justify" );
				ayoicon.add( "align-left", "align-left" );
				ayoicon.add( "align-right", "align-right" );
				ayoicon.add( "ambulance", "ambulance" );
				ayoicon.add( "angle-down", "angle-down" );
				ayoicon.add( "angle-left", "angle-left" );
				ayoicon.add( "angle-right", "angle-right" );
				ayoicon.add( "angle-up", "angle-up" );
				ayoicon.add( "arrow-down", "arrow-down" );
				ayoicon.add( "arrow-left", "arrow-left" );
				ayoicon.add( "arrow-right", "arrow-right" );
				ayoicon.add( "arrow-up", "arrow-up" );
				ayoicon.add( "asterisk", "asterisk" );
				ayoicon.add( "backward", "backward" );
				ayoicon.add( "ban-circle", "ban-circle" );
				ayoicon.add( "bar-chart", "bar-chart" );
				ayoicon.add( "barcode", "barcode" );
				ayoicon.add( "beaker", "beaker" );
				ayoicon.add( "beer", "beer" );
				ayoicon.add( "bell", "bell" );
				ayoicon.add( "bell-alt", "bell-alt" );
				ayoicon.add( "bold", "bold" );
				ayoicon.add( "bolt", "bolt" );
				ayoicon.add( "book", "book" );
				ayoicon.add( "bookmark", "bookmark" );
				ayoicon.add( "bookmark-empty", "bookmark-empty" );
				ayoicon.add( "briefcase", "briefcase" );
				ayoicon.add( "building", "building" );
				ayoicon.add( "bullhorn", "bullhorn" );
				ayoicon.add( "calendar", "calendar" );
				ayoicon.add( "camera", "camera" );
				ayoicon.add( "camera-retro", "camera-retro" );
				ayoicon.add( "caret-down", "caret-down" );
				ayoicon.add( "caret-left", "caret-left" );
				ayoicon.add( "caret-right", "caret-right" );
				ayoicon.add( "caret-up", "caret-up" );
				ayoicon.add( "certificate", "certificate" );
				ayoicon.add( "check", "check" );
				ayoicon.add( "check-empty", "check-empty" );
				ayoicon.add( "chevron-down", "chevron-down" );
				ayoicon.add( "chevron-left", "chevron-left" );
				ayoicon.add( "chevron-right", "chevron-right" );
				ayoicon.add( "chevron-up", "chevron-up" );
				ayoicon.add( "circle", "circle" );
				ayoicon.add( "circle-arrow-down", "circle-arrow-down" );
				ayoicon.add( "circle-arrow-left", "circle-arrow-left" );
				ayoicon.add( "circle-arrow-right", "circle-arrow-right" );
				ayoicon.add( "circle-arrow-up", "circle-arrow-up" );
				ayoicon.add( "circle-blank", "circle-blank" );
				ayoicon.add( "cloud", "cloud" );
				ayoicon.add( "cloud-download", "cloud-download" );
				ayoicon.add( "cloud-upload", "cloud-upload" );
				ayoicon.add( "coffee", "coffee" );
				ayoicon.add( "cog", "cog" );
				ayoicon.add( "cogs", "cogs" );
				ayoicon.add( "columns", "columns" );
				ayoicon.add( "comment", "comment" );
				ayoicon.add( "comment-alt", "comment-alt" );
				ayoicon.add( "comments", "comments" );
				ayoicon.add( "comments-alt", "comments-alt" );
				ayoicon.add( "copy", "copy" );
				ayoicon.add( "credit-card", "credit-card" );
				ayoicon.add( "cut", "cut" );
				ayoicon.add( "dashboard", "dashboard" );
				ayoicon.add( "desktop", "desktop" );
				ayoicon.add( "double-angle-down", "double-angle-down" );
				ayoicon.add( "double-angle-left", "double-angle-left" );
				ayoicon.add( "double-angle-right", "double-angle-right" );
				ayoicon.add( "double-angle-up", "double-angle-up" );
				ayoicon.add( "download", "download" );
				ayoicon.add( "download-alt", "download-alt" );
				ayoicon.add( "edit", "edit" );
				ayoicon.add( "eject", "eject" );
				ayoicon.add( "envelope", "envelope" );
				ayoicon.add( "envelope-alt", "envelope-alt" );
				ayoicon.add( "exchange", "exchange" );
				ayoicon.add( "exclamation-sign", "exclamation-sign" );
				ayoicon.add( "external-link", "external-link" );
				ayoicon.add( "eye-close", "eye-close" );
				ayoicon.add( "eye-open", "eye-open" );
				ayoicon.add( "facebook", "facebook" );
				ayoicon.add( "facebook-sign", "facebook-sign" );
				ayoicon.add( "facetime-video", "facetime-video" );
				ayoicon.add( "fast-backward", "fast-backward" );
				ayoicon.add( "fast-forward", "fast-forward" );
				ayoicon.add( "fighter-jet", "fighter-jet" );
				ayoicon.add( "file", "file" );
				ayoicon.add( "file-alt", "file-alt" );
				ayoicon.add( "film", "film" );
				ayoicon.add( "filter", "filter" );
				ayoicon.add( "fire", "fire" );
				ayoicon.add( "flag", "flag" );
				ayoicon.add( "folder-close", "folder-close" );
				ayoicon.add( "folder-close-alt", "folder-close-alt" );
				ayoicon.add( "folder-open", "folder-open" );
				ayoicon.add( "folder-open-alt", "folder-open-alt" );
				ayoicon.add( "font", "font" );
				ayoicon.add( "food", "food" );
				ayoicon.add( "forward", "forward" );
				ayoicon.add( "fullscreen", "fullscreen" );
				ayoicon.add( "gift", "gift" );
				ayoicon.add( "github", "github" );
				ayoicon.add( "github-alt", "github-alt" );
				ayoicon.add( "github-sign", "github-sign" );
				ayoicon.add( "glass", "glass" );
				ayoicon.add( "globe", "globe" );
				ayoicon.add( "google-plus", "google-plus" );
				ayoicon.add( "google-plus-sign", "google-plus-sign" );
				ayoicon.add( "group", "group" );
				ayoicon.add( "h-sign", "h-sign" );
				ayoicon.add( "hand-down", "hand-down" );
				ayoicon.add( "hand-left", "hand-left" );
				ayoicon.add( "hand-right", "hand-right" );
				ayoicon.add( "hand-up", "hand-up" );
				ayoicon.add( "hdd", "hdd" );
				ayoicon.add( "headphones", "headphones" );
				ayoicon.add( "heart", "heart" );
				ayoicon.add( "heart-empty", "heart-empty" );
				ayoicon.add( "home", "home" );
				ayoicon.add( "hospital", "hospital" );
				ayoicon.add( "inbox", "inbox" );
				ayoicon.add( "indent-left", "indent-left" );
				ayoicon.add( "indent-right", "indent-right" );
				ayoicon.add( "info-sign", "info-sign" );
				ayoicon.add( "italic", "italic" );
				ayoicon.add( "key", "key" );
				ayoicon.add( "laptop", "laptop" );
				ayoicon.add( "leaf", "leaf" );
				ayoicon.add( "legal", "legal" );
				ayoicon.add( "lemon", "lemon" );
				ayoicon.add( "lightbulb", "lightbulb" );
				ayoicon.add( "link", "link" );
				ayoicon.add( "linkedin", "linkedin" );
				ayoicon.add( "linkedin-sign", "linkedin-sign" );
				ayoicon.add( "list", "list" );
				ayoicon.add( "list-alt", "list-alt" );
				ayoicon.add( "list-ol", "list-ol" );
				ayoicon.add( "list-ul", "list-ul" );
				ayoicon.add( "lock", "lock" );
				ayoicon.add( "magic", "magic" );
				ayoicon.add( "magnet", "magnet" );
				ayoicon.add( "map-marker", "map-marker" );
				ayoicon.add( "medkit", "medkit" );
				ayoicon.add( "minus", "minus" );
				ayoicon.add( "minus-sign", "minus-sign" );
				ayoicon.add( "mobile-phone", "mobile-phone" );
				ayoicon.add( "money", "money" );
				ayoicon.add( "move", "move" );
				ayoicon.add( "music", "music" );
				ayoicon.add( "off", "off" );
				ayoicon.add( "ok", "ok" );
				ayoicon.add( "ok-circle", "ok-circle" );
				ayoicon.add( "ok-sign", "ok-sign" );
				ayoicon.add( "paper-clip", "paper-clip" );
				ayoicon.add( "paste", "paste" );
				ayoicon.add( "pause", "pause" );
				ayoicon.add( "pencil", "pencil" );
				ayoicon.add( "phone", "phone" );
				ayoicon.add( "phone-sign", "phone-sign" );
				ayoicon.add( "picture", "picture" );
				ayoicon.add( "pinterest", "pinterest" );
				ayoicon.add( "pinterest-sign", "pinterest-sign" );
				ayoicon.add( "plane", "plane" );
				ayoicon.add( "play", "play" );
				ayoicon.add( "play-circle", "play-circle" );
				ayoicon.add( "plus", "plus" );
				ayoicon.add( "plus-sign", "plus-sign" );
				ayoicon.add( "plus-sign-alt", "plus-sign-alt" );
				ayoicon.add( "print", "print" );
				ayoicon.add( "pushpin", "pushpin" );
				ayoicon.add( "qrcode", "qrcode" );
				ayoicon.add( "question-sign", "question-sign" );
				ayoicon.add( "quote-left", "quote-left" );
				ayoicon.add( "quote-right", "quote-right" );
				ayoicon.add( "random", "random" );
				ayoicon.add( "refresh", "refresh" );
				ayoicon.add( "remove", "remove" );
				ayoicon.add( "remove-circle", "remove-circle" );
				ayoicon.add( "remove-sign", "remove-sign" );
				ayoicon.add( "reorder", "reorder" );
				ayoicon.add( "repeat", "repeat" );
				ayoicon.add( "reply", "reply" );
				ayoicon.add( "resize-full", "resize-full" );
				ayoicon.add( "resize-horizontal", "resize-horizontal" );
				ayoicon.add( "resize-small", "resize-small" );
				ayoicon.add( "resize-vertical", "resize-vertical" );
				ayoicon.add( "retweet", "retweet" );
				ayoicon.add( "road", "road" );
				ayoicon.add( "rss", "rss" );
				ayoicon.add( "save", "save" );
				ayoicon.add( "screenshot", "screenshot" );
				ayoicon.add( "search", "search" );
				ayoicon.add( "share", "share" );
				ayoicon.add( "share-alt", "share-alt" );
				ayoicon.add( "shopping-cart", "shopping-cart" );
				ayoicon.add( "sign-blank", "sign-blank" );
				ayoicon.add( "signal", "signal" );
				ayoicon.add( "signin", "signin" );
				ayoicon.add( "signout", "signout" );
				ayoicon.add( "sitemap", "sitemap" );
				ayoicon.add( "sort", "sort" );
				ayoicon.add( "sort-down", "sort-down" );
				ayoicon.add( "sort-up", "sort-up" );
				ayoicon.add( "spinner", "spinner" );
				ayoicon.add( "star", "star" );
				ayoicon.add( "star-empty", "star-empty" );
				ayoicon.add( "star-half", "star-half" );
				ayoicon.add( "step-backward", "step-backward" );
				ayoicon.add( "step-forward", "step-forward" );
				ayoicon.add( "stethoscope", "stethoscope" );
				ayoicon.add( "stop", "stop" );
				ayoicon.add( "strikethrough", "strikethrough" );
				ayoicon.add( "suitcase", "suitcase" );
				ayoicon.add( "table", "table" );
				ayoicon.add( "tablet", "tablet" );
				ayoicon.add( "tag", "tag" );
				ayoicon.add( "tags", "tags" );
				ayoicon.add( "tasks", "tasks" );
				ayoicon.add( "text-height", "text-height" );
				ayoicon.add( "text-width", "text-width" );
				ayoicon.add( "th", "th" );
				ayoicon.add( "th-large", "th-large" );
				ayoicon.add( "th-list", "th-list" );
				ayoicon.add( "thumbs-down", "thumbs-down" );
				ayoicon.add( "thumbs-up", "thumbs-up" );
				ayoicon.add( "time", "time" );
				ayoicon.add( "tint", "tint" );
				ayoicon.add( "trash", "trash" );
				ayoicon.add( "trophy", "trophy" );
				ayoicon.add( "truck", "truck" );
				ayoicon.add( "twitter", "twitter" );
				ayoicon.add( "twitter-sign", "twitter-sign" );
				ayoicon.add( "umbrella", "umbrella" );
				ayoicon.add( "underline", "underline" );
				ayoicon.add( "undo", "undo" );
				ayoicon.add( "unlock", "unlock" );
				ayoicon.add( "upload", "upload" );
				ayoicon.add( "upload-alt", "upload-alt" );
				ayoicon.add( "user", "user" );
				ayoicon.add( "user-md", "user-md" );
				ayoicon.add( "volume-down", "volume-down" );
				ayoicon.add( "volume-off", "volume-off" );
				ayoicon.add( "volume-up", "volume-up" );
				ayoicon.add( "warning-sign", "warning-sign" );
				ayoicon.add( "wrench", "wrench" );
				ayoicon.add( "zoom-in", "zoom-in" );
				ayoicon.add( "zoom-out", "zoom-out" );
 
                return ayoicon;
             } // Or maybe this is the only way
 
             return null;
		},
 
	});

	tinymce.PluginManager.add( 'ayo_icon_selector', tinymce.plugins.ayo_icon_selector );
})();

(function() {
	tinymce.create('tinymce.plugins.ayo_social_selector', {
		
		init : function( ed, url ) {},

		createControl : function(n, cm) {
			if( n=='ayo_social_selector' ){
                var ayosocial = cm.createListBox( 'ayo_social_selector', {
                     title : 'Socials',
                     onselect : function(v) { 
                        	tinyMCE.activeEditor.selection.setContent('[ayo_social profile="' + v + '" url="#"]');
                     }
                });
 
				// @todo Find a better way to add this one
				ayosocial.add( "behance", "behance" );
				ayosocial.add( "bitbucket", "bitbucket" );
				ayosocial.add( "blogger", "blogger" );
				ayosocial.add( "delicious", "delicious" );
				ayosocial.add( "deviantart", "deviantart" );
				ayosocial.add( "digg", "digg" );
				ayosocial.add( "dribbble", "dribbble" );
				ayosocial.add( "facebook", "facebook" );
				ayosocial.add( "fivehundredpx", "fivehundredpx" );
				ayosocial.add( "forrst", "forrst" );
				ayosocial.add( "foursquare", "foursquare" );
				ayosocial.add( "github", "github" );
				ayosocial.add( "googleplus", "googleplus" );
				ayosocial.add( "instagram", "instagram" );
				ayosocial.add( "klout", "klout" );
				ayosocial.add( "lastfm", "lastfm" );
				ayosocial.add( "linkedin", "linkedin" );
				ayosocial.add( "myspace", "myspace" );
				ayosocial.add( "ninetyninedesigns", "ninetyninedesigns" );
				ayosocial.add( "pinterest", "pinterest" );
				ayosocial.add( "reddit", "reddit" );
				ayosocial.add( "rss", "rss" );
				ayosocial.add( "skype", "skype" );
				ayosocial.add( "soundcloud", "soundcloud" );
				ayosocial.add( "stumbleupon", "stumbleupon" );
				ayosocial.add( "tumblr", "tumblr" );
				ayosocial.add( "twitter", "twitter" );
				ayosocial.add( "vimeo", "vimeo" );
				ayosocial.add( "windows", "windows" );
				ayosocial.add( "wordpress", "wordpress" );
				ayosocial.add( "xing", "xing" );
				ayosocial.add( "youtube", "youtube" );
 
                return ayosocial;
             } // Or maybe this is the only way
 
             return null;
		},
 
	});

	tinymce.PluginManager.add( 'ayo_social_selector', tinymce.plugins.ayo_social_selector );
})();