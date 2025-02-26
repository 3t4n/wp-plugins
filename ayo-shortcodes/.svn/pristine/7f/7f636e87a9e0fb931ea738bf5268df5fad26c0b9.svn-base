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
						tinyMCE.activeEditor.selection.setContent( '[ayo_tweets screen_name="" tweets="3" hide_replies="true"]' );
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