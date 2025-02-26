<?php if (!defined('FW')) die( 'Forbidden' );

$atts['column'] = trim($atts['column']);
if ( $atts['column'] != '2'  && $atts['column'] != '3' ) $atts['column'] = '1';
?>
<div id="owl-quote-namaste" class="owl-carousel carousel owl row owl-pagination-<?php echo esc_attr($atts['pagination']); ?> owl-navigation-<?php echo esc_attr($atts['navigation']); ?>">
	<?php foreach ($atts['quotes'] as $key => $quote) : ?>
	<div class="quote-item">
		<div class="quote-content"><?php echo wp_kses_post($quote['quote_content']); ?></div>
		<?php if ( $quote['quote_image'] != '' ) { ?>
		<div class="quote-image">
        	<div class="quote-author-image" style="background-image: url('<?php echo esc_url($quote['quote_image']['url']); ?>');"></div>
        </div>
		<?php } ?>
		<?php  if ( $quote['quote_author'] != '' ) { ?>
		<div class="quote-author">
            <p><?php echo esc_html($quote['quote_author']); ?></p>
            <p class="quote-author-position"><?php echo esc_html($quote['quote_author_position']); ?></p>
		</div>
		<?php } ?>
	</div>				
	<?php endforeach; ?>
</div>

<script type="text/javascript"> 
	jQuery(document).ready(function($){
		$(document).ready(function() {
	
		  var owl = $("#owl-quote-namaste");
	
		  owl.owlCarousel({
			  
		  navigation : true, // Show next and prev buttons
		  navigationText : ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
		  pagination : true,
	 
		  slideSpeed : 1500,
		  paginationSpeed : 1500,
		  
		  items : <?php echo esc_attr($atts['column']); ?>, 
		  itemsDesktop : [5000,<?php echo esc_attr($atts['column']); ?>], 
		  itemsDesktop : [1599,<?php echo esc_attr($atts['column']); ?>], 
		  itemsDesktopSmall : [900,1], 
		  itemsTablet: [600,1], 
		  itemsMobile : [400,1],
		  <?php if ( $atts['delay'] != 'false' && $atts['delay'] != '') { ?> 			  
		  autoPlay : <?php echo esc_attr($atts['delay']); ?>000,
		  <?php } else { ?>
		  autoPlay : false,
		  <?php } ?>		
		  });
		});
	 });
</script>
