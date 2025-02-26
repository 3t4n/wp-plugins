<?php 
// mt_toplevel_page() displays the page content for the custom Test Toplevel menu

function atg_front_view() { ?>




<div class="cd-testimonials-wrapper cd-container">
	<ul class="cd-testimonials">
	<?php 

global $wpdb;
$rows = $wpdb->get_results( "SELECT * FROM wp_testimonial ");


foreach($rows as $row){ ?>




		<li>
			<p><?php echo $row->detail;?></p>
			<div class="cd-author">
			
				<ul class="cd-author-info">
					
					<li><?php echo $row->name;?></li>
				</ul>
			</div>
		</li>
		<?php } ?>

	</ul> <!-- cd-testimonials -->

	
</div> <!-- cd-testimonials-wrapper -->

<?php } ?>


<?php 

add_action('wp_print_scripts', 'atg_register_scripts');
add_action('wp_print_styles', 'atg_register_styles');


function atg_register_scripts() {
    
		
        // register
        wp_register_script('atg_nivo-script', plugins_url('js/jquery.flexslider-min.js', __FILE__), array( 'jquery' ));
        wp_register_script('atg_script', plugins_url('js/main.js', __FILE__));
       
        // enqueue
        wp_enqueue_script('atg_nivo-script');
        wp_enqueue_script('atg_script');
		
    
}
 
function atg_register_styles() {
    // register
    wp_register_style('atg_styles', plugins_url('css/form.css', __FILE__));
    wp_register_style('atg_styles_theme', plugins_url('css/style.css', __FILE__));
 
    // enqueue
    wp_enqueue_style('atg_styles');
    wp_enqueue_style('atg_styles_theme');
}
?>
