<?php 
header( 'Content-Type: text/javascript' );
global $wpdb;

if( !isset( $oshtml5 ) ) 
	$oshtml5 = new osHTML5TinyMCE(); 

$shortcodes = $wpdb->get_results( $wpdb->prepare( "SELECT ID, post_title FROM {$wpdb->posts} WHERE post_type = 'os-html5' AND post_status = 'publish' ORDER BY ID DESC", 1 ),ARRAY_A );

		
if( empty( $shortcodes ) )
	wp_die;
?>
(function() {
	tinymce.PluginManager.add( '<?php echo $oshtml5->button_name; ?>', function( editor, url ) {
		editor.addButton( '<?php echo $oshtml5->button_name; ?>', {
			title: 'Insert OS HTML5 Shortcodes',
			type: 'menubutton',
			icon: 'icon oshtml5-icon',
			menu: [
				<?php foreach ( $shortcodes as $shortcodeObj ) { ?>            
				{
					text: '<?php echo esc_attr( $shortcodeObj['post_title'] ); ?>',
					value: '[oshtml5 id="<?php echo esc_attr ( $shortcodeObj['ID'] ); ?>"]',
					onclick: function() {
						editor.insertContent( this.value() );
					}
				},
				<?php } ?>           		
		   		]
		});
	});
})();