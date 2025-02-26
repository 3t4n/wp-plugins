<?php

/**
 * Provide a admin area view for the Shortcode Builder plugin
 *
*/

class ALPRT_class_testibuilder {


	function __construct(){
         $this->alprt_get_shortcode_filter();
	}
	function alprt_get_shortcode_filter()
	{
		add_action( 'wp_ajax_get_testimonial', array($this,'alprt_add_ajax_editor') );
        add_action( 'wp_ajax_nopriv_get_testimonial', array($this,'alprt_add_ajax_editor') );
		add_filter( 'mce_external_plugins', array($this,'alprt_enqueue_plugin_scripts'),7 );
		add_filter( 'mce_buttons', array($this,'alprt_register_buttons_editor'),8 );
		

	}
	function alprt_enqueue_plugin_scripts($plugin_array)
	{
	    //enqueue TinyMCE plugin script with its ID.
	    $plugin_array["testi_button_plugin"] =  plugin_dir_url(__FILE__) . "../js/alpharage-testimonials-admin.js";
	    return $plugin_array;
	}

	

	function alprt_register_buttons_editor($buttons)
	{
	    //register buttons with their id.
	    array_push($buttons, "testimonial");
	    return $buttons;
	}
	function alprt_add_ajax_editor()
	{
	?>
		<link rel="stylesheet" type="text/css" href="<?php echo  plugins_url('../css/shortcode.css', __FILE__); ?>">
		<script type="text/javascript" src ="<?php echo  plugins_url('../js/custom.js', __FILE__); ?>"></script>
		<div id="ht-holder">
			<label>
			  <?php  esc_html_e('ORDER','alpharage-testimonials');?>
			</label>
			<select id="alpha-testi-order" class="alpha-testi-order alpha-input">
				<option value="ASC"><?php  esc_html_e('ASC','alpharage-testimonials');?></option>
				<option value="DESC"><?php  esc_html_e('DESC','alpharage-testimonials');?></option>
			</select>
		</div>
		<div id="ht-holder">
			<label>
				<?php  esc_html_e('Total Posts','alpharage-testimonials');?>
		    </label>
			<input type="number" id="alpha-testi-number" class="alpha-testi-number alpha-input" value='-1'/>
		</div>
		<div id="ht-holder">
			<label>
				<?php  esc_html_e('Category','alpharage-testimonials');?>
			</label>
			<select id="alpha-testi-category" class="alpha-testi-category alpha-input">
				<?php
				
				$pad_counts   = 0;      // 1 for yes, 0 for no
				$hierarchical = 1;      // 1 for yes, 0 for no  
				$title        = '';  
				$empty        = 0;

				$args = array(
					 'taxonomy'     => 'alprt-testicat',
					 'pad_counts'   => $pad_counts,
					 'hierarchical' => $hierarchical,
					 'title_li'     => $title,
					 'hide_empty'   => $empty
				);  //if (in_array($key->category_parent, $catarray))
				
				$all_categories = get_categories( $args );
				echo '<option value="0">ALL Categories</option>';
				foreach ($all_categories as $cat)
				{
					echo '<option value="'.$cat->term_id.'">'.$cat->name.'</option>';
				}
				?>
			</select>
		</div>
		<div id="ht-holder">
			<label>
		    	<?php  esc_html_e('Testimonial Page Style','alpharage-testimonials');?>
		    </label>
		    <select id="alpha-testi-style" class="alpha-testi-style alpha-input" >
				<option value="style1"><?php  esc_html_e('Page Style 1','alpharage-testimonials');?></option>
				<option value="style2"><?php  esc_html_e('Page Style 2','alpharage-testimonials');?></option>
				<option value="style3"><?php  esc_html_e('Page Style 3','alpharage-testimonials');?></option>
				<option value="style4"><?php  esc_html_e('Page Style 4','alpharage-testimonials');?></option>
				<option value="style5"><?php  esc_html_e('Page Style 5','alpharage-testimonials');?></option>
				<option value="style6"><?php  esc_html_e('Page Style 6','alpharage-testimonials');?></option>
			</select>
		</div>
		<div id="ht-holder">
			<label>
				<?php  esc_html_e('Background Image','alpharage-testimonials');?>
	 		</label>
	 		<button id="testibgimg" ><?php  esc_html_e('Choose Image','alpharage-testimonials');?></button>
	 		 <p id="testibgurl"> </p> 
	 		<!--<input type="file"   class="testibgimg alpha-input" />-->
	 	</div>
		<div id="ht-holder">
			<label>
				<?php  esc_html_e('Background Color','alpharage-testimonials');?>
			</label>
			<input type="color" id="alpha-testibgcolor" class="testibgcolor alpha-color"  value="#f5f5f6" />
		</div>
		<div id="ht-holder">
    		<label>
    			<?php  esc_html_e('Text Color','alpharage-testimonials');?>
		    </label>
			<input type="color" id="alpha-testiforcolor" class="testiforcolor alpha-color" value="#a5a5a5" />
    	</div>
    	<div id="ht-holder">
    		<label>
    			<?php  esc_html_e('Border Color','alpharage-testimonials');?>
			</label>
			<input type="color" id="alpha-testibordcolor"  class="testibordcolor alpha-color" value="#e1e1e4" />
	    </div>
		<button class="subtesti"><?php  esc_html_e('Save','alpharage-testimonials');?></button>
	<?php	die();
	}
}	

new ALPRT_class_testibuilder();




?>