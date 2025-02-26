<?php
$functions_dir = realpath( __DIR__ . '/../../config/functions.php' );
include $functions_dir;

$dir = find_wordpress_abspath();
if (!$dir) return;
define('ABSPATH', $dir.'/');

define( 'SHORTINIT', true );
include_once( ABSPATH. 'wp-load.php' );
$tag_manager = get_option('tag-manager-add-custom-tag-manager');
if (!$tag_manager) return;

$data = array();

foreach ($myInstallationData as $option => $v){
    $data[$option] = get_option($option);
}

if (empty($data['tag-manager-is-widget-active']) || empty($data['tag-manager-add-custom-script']) ||empty($data['tag-manager-custom-script-element'])) return;
?>
jQuery(document).ready(function($){
    $('<?php echo $data['tag-manager-custom-script-element']; ?>').prepend('<?php echo addslashes($data['tag-manager-add-custom-script']); ?>');
});