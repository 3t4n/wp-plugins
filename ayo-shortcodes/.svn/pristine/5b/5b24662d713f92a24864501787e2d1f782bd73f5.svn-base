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