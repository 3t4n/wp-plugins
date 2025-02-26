<?php
/*
Plugin Name: WP HTML MarkItUp
Plugin URI: http://www.online-source.net
Description: Transform your standard textarea to a textarea full with possibilitys
Author: Laurens ten Ham (MrXHellboy) | Jquery MarkItUp editor brought by http://markitup.jaysalvat.com
Version: 1.0.1
Author URI: http://online-source.net
*/

function MarkItUpFilesHeader()
{
    ?>
    <script type="text/javascript" src="<?php echo WP_PLUGIN_URL ?>/<?php echo basename(dirname(__FILE__)); ?>/MarkItUpFiles/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="<?php echo WP_PLUGIN_URL ?>/<?php echo basename(dirname(__FILE__)); ?>/MarkItUpFiles/jquery.markitup.js"></script>
    <script type="text/javascript" src="<?php echo WP_PLUGIN_URL ?>/<?php echo basename(dirname(__FILE__)); ?>/MarkItUpFiles/html_set.js"></script>
    
    <link rel="stylesheet" type="text/css" href="<?php echo WP_PLUGIN_URL ?>/<?php echo basename(dirname(__FILE__)); ?>/MarkItUpFiles/skin_simple_style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo WP_PLUGIN_URL ?>/<?php echo basename(dirname(__FILE__)); ?>/MarkItUpFiles/set_html_style.css" />  
    <?php
}

add_action('wp_head', 'MarkItUpFilesHeader');

function MarkItUpFilesFooter()
{
	?>
    <script type="text/javascript">
    <!--
    $(document).ready(function()	{
	$('textarea').markItUp(mySettings);
	});
    -->
    </script>
	<?php
}
add_action('wp_footer', 'MarkItUpFilesFooter');
?>