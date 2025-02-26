<?php

if ( ! defined( 'ABSPATH' ) ) exit;

include( 'numbered-pagination-form.php' );

class NUM_PAG_main {

public function __construct(){

add_action('admin_enqueue_scripts', array( $this, 'enqueue_numbered_pagination_color_picker' ));

add_action('admin_menu', array( $this, 'numbered_pagination_add_admin_menu' ));

add_action('wp_enqueue_scripts', array( $this, 'numbered_pagination_style' ));

add_action('wp_head', array( $this, 'numbered_pagination_add_css' ));	

add_shortcode( 'numbered-pagination', array( $this, 'numbered_pagination_function' )); 

add_action('init', array( $this, 'numbered_pagination_reg_settings'));

register_activation_hook( __FILE__, array( $this, 'numbered_pagination_reg_settings' ));

}

function enqueue_numbered_pagination_color_picker(){
	
	wp_enqueue_style('wp-color-picker');
	wp_enqueue_script('numbered-pagination-color-picker', NUM_PAG_URL . 'js/cf.js', array('wp-color-picker'), false, true);
	
}


function numbered_pagination_style(){
	 
	wp_enqueue_style('numbered_pagination_style', NUM_PAG_URL . 'style.css');
}


function numbered_pagination_reg_settings(){
	
	
	$settings = array(
	
	'previous_text' => '&lsaquo;',
	'next_text' => '&rsaquo;',
	'default_range' => 4,	
	'prev_next' => 1,
	'show_all' => 0,
	'align' => 'center',
	'font_size' => 16,
	'color' => '#eaeaea',
	'current_color' => '#3f3f3f',
	'text_color' => '#3f3f3f',
	'current_text_color' => '#ffffff',
	'hover_color' => '#3f3f3f',
	'hover_text_color' => '#ffffff',
	);   
    add_option('numbered_pagination_settings', $settings );

}


function numbered_pagination_add_admin_menu() { 

    add_submenu_page( 'options-general.php', 'Pagination', 'Pagination', 'manage_options', 'numbered-pagination', array( $this, 'numbered_pagination_options_form'));

}


function numbered_pagination_options_form() {


	
	if ( !empty( $_POST ) && check_admin_referer('numbered_pagination_nonce_action', 'numbered_pagination_nonce_field') ) {
	
	
	if(!empty( sanitize_text_field($_POST['previous_text'] ))) { $pt = sanitize_text_field($_POST['previous_text']);} else { $pt = '&lsaquo;';} 
	if(!empty( sanitize_text_field($_POST['next_text']))) { $nt = sanitize_text_field($_POST['next_text']); } else { $nt = '&rsaquo;';}
    $dr = sanitize_text_field( intval($_POST['default_range']) ); if ($dr == 0){$dr = 0;}
		
	if(!empty( $_POST['prev_next'])) { $pn = sanitize_text_field($_POST['prev_next']); } else { $pn = '';}
	if(!empty( $_POST['show_all'])) { $sa = sanitize_text_field($_POST['show_all']); } else { $sa = '';}
	
	if(!empty( sanitize_text_field($_POST['align']))) { $align = sanitize_text_field($_POST['align']); } else { $align = 'center';}
	$fs = sanitize_text_field( intval($_POST['font_size']) ); if ($fs == 0){$fs = 16;}

	
	if(!empty( sanitize_text_field($_POST['color']))) { $color = sanitize_text_field($_POST['color']); } else { $color = '';}
	if(!empty( sanitize_text_field($_POST['current_color']))) { $current_color = sanitize_text_field($_POST['current_color']); } else { $current_color = '';}

	if(!empty( sanitize_text_field($_POST['text_color']))) { $text_color = sanitize_text_field($_POST['text_color']); } else { $text_color = '';}
	if(!empty( sanitize_text_field($_POST['current_text_color']))) { $current_text_color = sanitize_text_field($_POST['current_text_color']); } else { $current_text_color = '';}
	if(!empty( sanitize_text_field($_POST['hover_color']))) { $hover_color = sanitize_text_field($_POST['hover_color']); } else { $hover_color = '';}
	if(!empty( sanitize_text_field($_POST['hover_text_color']))) { $hover_text_color = sanitize_text_field($_POST['hover_text_color']); } else { $hover_text_color = '';}
   
				
	$values = array(
	
	'previous_text' => $pt,
	'next_text' => $nt,
	'default_range' => $dr,
    'prev_next' => $pn, 
    'show_all' => $sa,
	'align' => $align,
	'font_size' => $fs,
	'color' => $color,
	'current_color' => $current_color,
	'text_color' => $text_color,
	'current_text_color' => $current_text_color,
	'hover_color' => $hover_color,
	'hover_text_color' => $hover_text_color,
		
	);   
	

	if (isset($_POST['submit'])){
	
	update_option('numbered_pagination_settings', $values);
	
	$message = '<div id="message" class="updated notice is-dismissible"><p><strong>'.__('Settings saved.', 'numbered-pagination').'</strong></p></div>';
	echo '<div class="wrap">'.$message.'</div>';
	}
	
    } 

	numbered_pagination_form();
 
}


function numbered_pagination_function() {

  global $wp_query;
  global $paged;
 
 $options = get_option('numbered_pagination_settings');
 
    if ($wp_query -> max_num_pages <= 1)
   return;
 
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
  
                                
  $max_pages = $wp_query -> max_num_pages; 

  if(!empty($options['show_all'])){
	  
  $range = $max_pages;
  
  }

  else {$range = $options['default_range'];}
  



  $x = range(1, $range);
  
  $pt = $options['previous_text'];
  $nt = $options['next_text'];
  $next_page = $paged + 1;

  
  echo '<div class="pagination-container">';
  
  if($options['default_range'] == 0){
	  
	  if($paged > 1){
		  
  echo '<a href="'.get_pagenum_link($paged - 1).'" class="pagination-text">'.$pt.'</a>';
	  }
	  
      if($next_page <= $max_pages) {
		  
  echo '<a href="'.get_pagenum_link($next_page).'" class="pagination-text">'.$nt.'</a>';
	  }
  
  
	  
  } else {
  
  if($paged > 1 && !empty($options['prev_next'])){
	  
  echo '<a href="'.get_pagenum_link($paged - 1).'" class="pagination-text">'.$pt.'</a>';
  
  }
			
  foreach (array_reverse($x) as $a){
	  
	  $i = $paged - $a; 
	  
	  if($i > 0){
		  
    echo '<a href="'.get_pagenum_link($i).'" class="pagination-text">'.$i.'</a>';
	
	  }
      
  }
  
    echo '<span>'.$paged.'</span>';

	
	foreach ($x as $a){

		if(++$paged <= $max_pages){

	echo '<a href="'.get_pagenum_link($paged).'" class="pagination-text">'.$paged.'</a>';
        
		}
	}
	
	if($next_page <= $max_pages && !empty($options['prev_next'])) {
		
	echo '<a href="'.get_pagenum_link($next_page).'" class="pagination-text">'.$nt.'</a>';
	
	}
  
  }
  
  echo '</div>';
	

 	
}


function numbered_pagination_add_css() {
	
	$options = get_option('numbered_pagination_settings');
	
	
	?>
	
	<style>
	
	.pagination-text {
		
		font-size: <?php echo $options['font_size'] . 'px'; ?>;
		color: <?php echo $options['text_color']; ?>;
		background-color: <?php echo $options['color']; ?>;	
	}
	
	.pagination-container span {
		
		font-size: <?php echo $options['font_size'] . 'px'; ?>;
		color: <?php echo $options['current_text_color']; ?>;
		background-color: <?php echo $options['current_color']; ?>;
	}
	
	.pagination-text:hover {
		
		font-size: <?php echo $options['font_size'] . 'px'; ?>;
		color: <?php echo $options['hover_text_color']; ?>;
		background-color: <?php echo $options['hover_color']; ?>;
	}
	
	.pagination-container {
		
		text-align: <?php echo $options['align']; ?>;
		
	}
	
	</style>

	<?php
}

}
