( function () {
	tinymce.PluginManager.add( 'joomsport_achv_shortcodes_button', function( editor, url ) {
		var ed = tinymce.activeEditor;
		editor.addButton( 'joomsport_achv_shortcodes_button', {
			title: 'Joomsport Achievements',
			text: false,
			icon: false,
			type: 'menubutton',
			menu: [
				
				{
					text: 'Player',
					onclick : function() {
                                            // triggers the thickbox
                                            var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                            W = W - 80;
                                            H = H - 84;
                                            tb_show( 'Player', 'admin-ajax.php?action=joomsport_achv_player_shortcode&width=' + W + '&height=' + H );

					}
				},
                {
					text: 'Calendar',
					onclick : function() {
                                            // triggers the thickbox
                                            var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                            W = W - 80;
                                            H = H - 84;
                                            tb_show( 'Calendar', 'admin-ajax.php?action=joomsport_achv_calendar_shortcode&width=' + W + '&height=' + H );
                                        }
				},
                {
					text: 'Stage',
					onclick : function() {
                                            // triggers the thickbox
                                            var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                            W = W - 80;
                                            H = H - 84;
                                            tb_show( 'Stage', 'admin-ajax.php?action=joomsport_achv_stage_shortcode&width=' + W + '&height=' + H);
                                        }
				},
                {
					text: 'Season',
					onclick : function() {
                                            // triggers the thickbox
                                            var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                            W = W - 80;
                                            H = H - 84;
                                            tb_show( 'Season', 'admin-ajax.php?action=joomsport_achv_season_shortcode&width=' + W + '&height=' + H );
                                        }
				}
				
			]
		});
	});
        
})();
