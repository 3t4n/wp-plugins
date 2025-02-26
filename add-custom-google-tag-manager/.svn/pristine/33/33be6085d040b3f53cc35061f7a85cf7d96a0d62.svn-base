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

if (empty($data['tag-manager-is-widget-active'])) return;
?>
var noscriptElm = document.createElement('noscript');
var iFrameElm = document.createElement('iframe');
iFrameElm.src="https://www.googletagmanager.com/ns.html?id=<?php echo $data['tag-manager-custom-id']; ?>";
iFrameElm.height="0";
iFrameElm.width="0";
iFrameElm.style="display:none;visibility:hidden";
var myBody = document.getElementsByTagName('body')[0];
    noscriptElm.appendChild(iFrameElm);
    myBody.insertBefore(noscriptElm, myBody.firstChild);
    
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?php echo $data['tag-manager-custom-id']; ?>');

    