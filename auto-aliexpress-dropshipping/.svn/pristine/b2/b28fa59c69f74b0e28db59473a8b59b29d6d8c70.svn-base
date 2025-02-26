<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/**
 * Return total forms
 *
 * $param  $status
 * @since 1.0.0
 *
 * @return int
 */
function auto_aliexpress_total_forms( $status = '' ) {
	$modules = array(
		auto_aliexpress_cforms_total( $status )
	);

	return array_sum( $modules );
}

/**
 * Return total custom form records
 *
 * @param string $status
 * @since 1.0.0
 *
 * @return int
 */
function auto_aliexpress_cforms_total( $status = '' ) {
	return Auto_Aliexpress_Custom_Form_Model::model()->count_all( $status );
}

/**
 * Central per page for form view
 *
 * @since 1.0.0
 * @return int
 */
function auto_aliexpress_form_view_per_page( $type = 'listings' ) {

	if ( 'entries' === $type ) {
		$per_page = get_option( 'auto_aliexpress_pagination_entries', 10 );
	} else {
		$per_page = get_option( 'auto_aliexpress_pagination_listings', 10 );
	}

	// force at least 1 data per page
	if ( $per_page < 1 ) {
		$per_page = 1;
	}
	return apply_filters( 'auto_aliexpress_form_per_page', $per_page, $type );
}

/**
 * Central per page for form view
 *
 * @since 1.0.0
 * @return string
 */
function auto_aliexpress_get_campaign_name($id){

	$model = AUTO_ALIEXPRESS_Custom_Form_Model::model()->load( $id );

	$settings = $model->settings;

    // Return Campaign Name
	if ( ! empty( $settings['aliexpress_campaign_name'] ) ) {
		return $settings['aliexpress_campaign_name'];
	}
}

/**
 * Return campaigns last run time
 *
 * @since 1.0.0
 *
 * @return string
 */
function auto_aliexpress_campaigns_last_run( ) {
    $campaigns_last_run = array();

    // Run campaigns job here
    $models = Auto_Aliexpress_Custom_Form_Model::model()->get_all_models();

    $campaigns = $models['models'];

    foreach($campaigns as $key=>$model){
        $settings = $model->settings;
        if(isset($settings['last_run_time'])){
            $campaigns_last_run[] = $settings['last_run_time'];
        }
    }

    if(!empty($campaigns_last_run)){
        $last_run = max($campaigns_last_run);
        $return = date("F j, Y, g:i a", $last_run);
    }else{
        $return = 'Never';
    }



    return $return;
}

/**
 * Display category and it's child
 * @param $cat
 * @param $child_categories
 * @param $campaign_category
 */

function auto_aliexpress_display_category($category, &$child_categories, $campaign_category){

	echo  '<option class="post_category" ';
    auto_aliexpress_category_selected($campaign_category,$category->cat_ID);
    echo  ' value="'.esc_attr($category->cat_ID).'">'.esc_html($category->cat_name).'</option>';

	$catChilds = array();

	if(isset($child_categories[$category->cat_ID]))
		$catChilds = $child_categories[$category->cat_ID];

	if(count($catChilds) > 0){
		foreach ($catChilds as $childCat){
            auto_aliexpress_display_category($childCat, $child_categories, $campaign_category);
		}
	}

}

function auto_aliexpress_category_selected($src,$val){

    if (in_array($val, $src)) {
        echo ' selected="selected" ';
    }

}

/**
 * Display tag and it's child
 * @param $tag
 * @param $campaign_tag
 */

function auto_aliexpress_display_tag($tag, $campaign_tag){
    echo  '<option class="post_tag" ';
    auto_aliexpress_category_selected($campaign_tag, $tag->term_id);
    echo  ' value="'.esc_attr($tag->term_id).'">'.esc_html($tag->name).'</option>';

}

/**
 * Handle all pagination
 *
 * @since 1.0
 *
 * @param int $total - the total records
 * @param string $type - The type of page (listings or entries)
 *
 * @return string
 */
function auto_aliexpress_list_pagination( $total, $type = 'listings' ) {
	$pagenum     = isset( $_REQUEST['paged'] ) ? absint( $_REQUEST['paged'] ) : 0; // phpcs:ignore
	$page_number = max( 1, $pagenum );
	$per_page    = 10;
	if ( $total > $per_page ) {
		$removable_query_args = wp_removable_query_args();

		$current_url   = set_url_scheme( 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
		$current_url   = remove_query_arg( $removable_query_args, $current_url );
		$current       = $page_number + 1;
		$total_pages   = ceil( $total / $per_page );
		$total_pages   = absint( $total_pages );
		$disable_first = false;
		$disable_last  = false;
		$disable_prev  = false;
		$disable_next  = false;
		$mid_size      = 2;
		$end_size      = 1;
		$show_skip     = false;

		if ( $total_pages > 10 ) {
			$show_skip = true;
		}

		if ( $total_pages >= 4 ) {
			$disable_prev = true;
			$disable_next = true;
		}

		if ( 1 === $page_number ) {
			$disable_first = true;
		}

		if ( $page_number === $total_pages ) {
			$disable_last = true;

		}

		?>
		<ul class="aliexpress-pagination">

			<?php if ( ! $disable_first ) : ?>
				<?php
				$prev_url  = esc_url( add_query_arg( 'paged', min( $total_pages, $page_number - 1 ), $current_url ) );
				$first_url = esc_url( add_query_arg( 'paged', min( 1, $total_pages ), $current_url ) );
				?>
				<?php if ( $show_skip ) : ?>
					<li class="wpmudev-pagination--prev">
						<a href="<?php echo esc_attr( $first_url ); ?>"><i class="aliexpress-icon-arrow-skip-start" aria-hidden="true"></i></a>
					</li>
				<?php endif; ?>
				<?php if ( $disable_prev ) : ?>
					<li class="wpmudev-pagination--prev">
						<a href="<?php echo esc_attr( $prev_url ); ?>"><i class="aliexpress-icon-chevron-left" aria-hidden="true"></i></a>
					</li>
				<?php endif; ?>
			<?php endif; ?>
			<?php
			$dots = false;
			for ( $i = 1; $i <= $total_pages; $i ++ ) :
				$class = ( $page_number === $i ) ? 'aliexpress-active' : '';
				$url   = esc_url( add_query_arg( 'paged', ( $i ), $current_url ) );
				if ( ( $i <= $end_size || ( $current && $i >= $current - $mid_size && $i <= $current + $mid_size ) || $i > $total_pages - $end_size ) ) {
					?>
					<li class="<?php echo esc_attr( $class ); ?>"><a href="<?php echo esc_attr( $url ); ?>" class="<?php echo esc_attr( $class ); ?>"><?php echo esc_html( $i ); ?></a></li>
					<?php
					$dots = true;
				} elseif ( $dots ) {
					?>
					<li class="aliexpress-pagination-dots"><span><?php esc_html_e( '&hellip;' ); ?></span></li>
					<?php
					$dots = false;
				}

				?>

			<?php endfor; ?>

			<?php if ( ! $disable_last ) : ?>
				<?php
				$next_url = esc_url( add_query_arg( 'paged', min( $total_pages, $page_number + 1 ), $current_url ) );
				$last_url = esc_url( add_query_arg( 'paged', max( $total_pages, $page_number - 1 ), $current_url ) );
				?>
				<?php if ( $disable_next ) : ?>
					<li class="wpmudev-pagination--next">
						<a href="<?php echo esc_attr( $next_url ); ?>"><i class="aliexpress-icon-chevron-right" aria-hidden="true"></i></a>
					</li>
				<?php endif; ?>
				<?php if ( $show_skip ) : ?>
					<li class="wpmudev-pagination--next">
						<a href="<?php echo esc_attr( $last_url ); ?>"><i class="aliexpress-icon-arrow-skip-end" aria-hidden="true"></i></a>
					</li>
				<?php endif; ?>
			<?php endif; ?>
		</ul>
		<?php
	}
}

