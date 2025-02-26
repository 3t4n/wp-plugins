<?php

add_action( 'wp_enqueue_scripts', 'my_enqueue' );
function my_enqueue() {
	//echo "hello"; exit();
	//wp_register_script( 'theAJAX-script', plugins_url('/mp3_plugin/js/my_ajax.js'), array( 'jquery' ) );
	wp_register_script( 'folder_mesonary_js', plugins_url("mesonary/mesonary.js",__FILE__ ) );
	wp_register_script( 'folder_mesonary', plugins_url("mesonary/mesonary-js.js",__FILE__ ) );
	wp_register_style( 'my_style', plugins_url("style.css",__FILE__ ) );
	
	wp_enqueue_script( 'jquery');
	wp_enqueue_style( 'my_style');
	wp_enqueue_script( 'folder_mesonary');
	wp_enqueue_script( 'folder_mesonary_js');
}

?>



<?php



function foobar_func( $atts ){

$a = shortcode_atts( array( 'folder' => '' , 'width' => '250'), $atts );
$rec = '';?>

<div id="mesonary_container" class="js-masonry"  data-masonry-options='{ "columnWidth": 0, "itemSelector": ".m_item" }' >
<?php 



function fs_get_wp_config_path()
{
    $base = dirname(__FILE__);
    $path = false;

    if (@file_exists(dirname()))
    {
        $path = dirname(dirname(dirname($base)));
    }
    else
    if (@file_exists(dirname(dirname(dirname($base)))))
    {
        $path = dirname(dirname(dirname($base)));
    }
    else
    $path = false;

    if ($path != false)
    {
        $path = str_replace("\\", "/", $path);
    }
    return $path;
}

$dir_path = fs_get_wp_config_path().'/'. $a['folder'];
$dir_path = str_replace('\\', '/', $dir_path);
$http_path = get_site_url().'/'. $a['folder'];
//echo $http_path;
$handle = opendir($dir_path);

while($file = readdir($handle)){
            if($file !== '.' && $file !== '..'){
                if($a['folder'] != ''){$ret.= '<div class="m_item"><img width="'.$a['width'].'" src="'.$http_path.'/'. $file.'" border="0" /></div>';}
				else{echo 'Please written correct path :)';}
            }
        }

return $ret;
}

add_shortcode( 'folder', 'foobar_func' );


?>