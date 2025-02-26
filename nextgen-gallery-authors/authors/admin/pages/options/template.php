<?php 
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); } 
/**
 * template for options page
 *
 *  
 */
?>
<div class="wrap">
<?php screen_icon( 'nggauthors' ); ?>
	<h2><?php _e( 'NextGEN Gallery Authors', 'nggauthors' ) ?></h2>
<?php do_action('nggauthors_after_title', $this->nggauthors_options) ?>
    <div id="poststuff">
        <div class="postbox">
            <h3 class="hndle"><span><?php _e(' <span style="color:#ff0000">[ A T T E N T I O N ] NextGEN Gallery core modification required!</span>', 'nggauthors'); ?></span></h3>
            <div class="inside">
                <?php _e('<p>To use this plugin, you need to make a simple change to a NextGEN Gallery file(tested with version 1.8.3).<br />This will be necessary until the change will not be integrated (I have already sent the request to Alex Rabe).</p>To make the change, follow the instructions:<br /><br /><ol><li>Open the following file: <code>/wp-content/plugins/nextgen-gallery/<strong>nggfunctions.php</strong></code>;</li><li>The changes affect the function <strong>nggCreateAlbum</strong>, go to row <strong>580</strong>, just before the<br /><code>-----------------------<br />// check for page navigation<br />if ($maxElement > 0) {<br />------------------------</code></li><li>Enter the following filter:<br /><code>-----------------------<br /><strong>$galleries = apply_filters(\'ngg_album_galleries_before_paging\', $galleries, $album)</strong><br />------------------------</code>;</li><li>To check if you have done correctly, <a href="/wp-content/plugins/nextgen-gallery-authors/authors/admin/images/ngg-new-filter.png" target="_blank"><strong>check this screenshot</strong></a>;</li><li>That\'s it :), <a href="admin.php?page=nggauthors&action=authors-remove-notice"><strong>Click here to remove the notice at the top</strong></a> if it is still visible.</li></ol></p>', 'nggauthors'); 
				?>
            </div>
        </div>    
        <div class="postbox">
            <h3 class="hndle"><span><?php _e('About NextGEN Gallery Authors', 'nggauthors'); ?></span></h3>
            <div class="inside">
                <?php _e('<p>This plugin, born as an add-on for the n.1 Wordpress Gallery Plugin <a href="http://wordpress.org/extend/plugins/nextgen-gallery/" target="_blank">NextGEN Gallery</a> (by <a href="http://alexrabe.de" target="_blank">Alex Rabe</a>), is developed by me (<a href="http://www.cantarano.com" target="_blank">check my website</a>), but it is only with your help that i can improve it, fix bugs, add some enhancements, etc...</p><p><strong>If you need to report bugs / errors / suggestions or any plugin related questions</strong>, you can leave me a message <a href="http://wordpress.org/tags/nextgen-gallery-authors?forum_id=10" target="_blank">in the plugin forum</a>.</p><p style="font-size:20px;margin-top:20px">Enjoy the web ;)</p>', 'nggauthors'); ?>
            </div>
        </div>
    </div>    
</div>