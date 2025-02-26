<?php 
	require_once('../../../../wp-load.php');
	require_once('../../../../wp-admin/includes/admin.php');
	do_action('admin_init');
 
	if ( ! is_user_logged_in() )
		die('You must be logged in to access this script.');
 
	$args = array(
		'showposts' => -1,
		'post_type' => 'tip'
	);
	$all_posts = get_posts( $args );
	foreach( $all_posts  as $single_post ){
		$out .= "
		{text: '".$single_post->post_title."', onclick : function() {
                            tinymce.execCommand('mceInsertContent', false, '[single_tip id=\"".$single_post->ID."\"]');
                        }},
						";
	}
?>
(function() {

            tinymce.PluginManager.add( 'ubl_location', function( editor, url ) {
     
                editor.addButton( 'shortcodes', {
                    type: 'listbox',
                    text: 'Tips               ',
                    icon: false,
					id:'ssdd',
                    onselect: function(e) {
                    }, 
                    values: [                     
                        <?php echo $out; ?>
                    ]
         
                });
         
          });
         

 
})();
