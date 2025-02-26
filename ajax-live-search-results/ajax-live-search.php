<?php /*
   Plugin Name: Ajax Live Search
   Plugin URI: 
   description: Add an AJAX Search suggestion to your site with a simple shortcode.
   Version: 1.0.0
   Author: Toast Websites
   Author URI: https://www.toastwebsites.co.uk/
   */ ?>
<?php include dirname(__FILE__). '/ajax-functions.php'; ?>
<?php include dirname(__FILE__). '/results-css.php'; ?>
<?php include dirname(__FILE__). '/backend.php'; ?>
<?php function toast_sta_settings_link( $links ) {
	$links[] = '<a href="' .
		admin_url( 'options-general.php?page=ajax_live_search' ) .
		'">' . __('Settings') . '</a>';
	return $links;
} ?>
<?php add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'toast_sta_settings_link'); ?>
<?php function get_search_results() { ?>

<script>
jQuery(window).ready(function(){

jQuery('.als-search').on('keyup', function(){
var searchForm = jQuery(this);
    jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        data: { action: 'suggested_search_results', keyword: jQuery(this).val() },
        success: function(suggested_search_results){
        jQuery(searchForm).siblings('.als-search-results').find('.results-box').html(suggested_search_results);
        }
    });
    
})

//ITEM HOVERS
var timer = '';
jQuery('body').on('mouseover', '.search-result', function(e){

timer = setTimeout(function(){

showInFeature();

}, 150)

var itemHoveredID = jQuery(this).attr('data-post-id');

function showInFeature(){

jQuery('.als-featured-item').css({'padding': 50});

jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        data: { action: 'item_hovered', id: itemHoveredID },
        success: function(item_hovered){
        jQuery('.als-featured-item').html(item_hovered);
        }
    });
}

}); 

jQuery('body').on('mouseout', '.search-result', function(e){

clearTimeout(timer);

})


//HIDE HOVER CONTENT IF ON SMALL SCREEN
var alsSearchAreaWidth = jQuery('.als-search-results').width();
if(alsSearchAreaWidth < 768){
jQuery('.als-search-results .results-box').width(alsSearchAreaWidth);
jQuery('.als-search-results .als-featured-item').hide();

}



})

</script>

<?php } ?>
<?php add_action( 'wp_footer', 'get_search_results' ); ?>