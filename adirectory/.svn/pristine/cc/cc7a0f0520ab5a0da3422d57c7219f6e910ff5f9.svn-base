<?php

namespace ADQS_Directory\Frontend;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

/**
 * Api handlers class
 * Since 2,0
 */
class Shortcode
{

	/**
	 * Method __construct
	 *
	 * @return void
	 */
	public function __construct()
	{
		add_shortcode('adqs_listings', array($this, 'render_listing_shortcode'));
		add_shortcode('adqs_taxonomies', array($this, 'render_all_listing_categories'));
		add_shortcode('adqs_search', array($this, 'render_search_bar'));
		add_shortcode('adqs_social_share', array($this, 'render_social_share'));
		add_shortcode('adqs_dashboard', array($this, 'frontend_dashbaord'));
		add_shortcode('adqs_agents', array($this, 'render_all_agents'));
		//User login and registration
		add_shortcode('adqs_user_log_regi', array($this, 'user_log_regi'));
	}


	/**
	 * Method render_all_agents
	 *
	 * @param $atts
	 *
	 * @return string
	 */
	public function render_all_agents($atts)
	{

		extract(shortcode_atts([
			'post_type'  => 'adqs_directory',
			'per_page'  => 8,

		], $atts));

		$per_page = absint($per_page);

		wp_enqueue_style('adqs_all_agents');


		ob_start();

		adqs_get_template_part(
			'content',
			'agents',
			compact('post_type', 'per_page')
		);

		return ob_get_clean();
	}




	/**
	 * Method user_log_regi
	 *
	 * @param $atts
	 * @param $content
	 *
	 * @return string
	 */
	public function user_log_regi($atts, $content = null)
	{
		$adqs_admin_settings = get_option('adqs_admin_settings', []);
		$registration_terms_text = $adqs_admin_settings['terms_condition_text'] ?? '';
		if (is_user_logged_in()) {
			ob_start();
			$loginPage = adqs_get_permalink_by_key('adqs_user_dashboard');
			if (!empty($loginPage)) :


?>
				<script>
					if (window.location.href !== '<?php echo esc_url($loginPage); ?>') {
						window.location.href = '<?php echo esc_url($loginPage); ?>';
					}
				</script>
		<?php
			endif;
			return ob_get_clean();
		}

		wp_enqueue_style('adqs-user-log-regi');
		wp_enqueue_script('adqs-user-log-regi');

		wp_enqueue_script(
			'google-recaptcha',
			'https://www.google.com/recaptcha/api.js',
			[],
			null,
			true
		);

		ob_start();



		?>



		<div class="adqs-log-regi-tabs">
			<?php if (!empty(get_option('users_can_register'))) :  ?>
				<nav>
					<ul class="adqs-log-regi-tabs-navigation">
						<li><a href="#" data-content="login" class="selected"><?php echo esc_html__('Sign In', 'adirectory'); ?></a>
						</li>

						<li><a href="#" data-content="signup"><?php echo esc_html__('Sign Up', 'adirectory'); ?></a></li>

					</ul>
				</nav>
			<?php else: ?>
				<h3><?php echo esc_html__('Sign In', 'adirectory'); ?></h3>
			<?php endif; ?>
			<ul class="adqs-log-regi-tabs-content">
				<?php do_action("adqs_regi_login_error"); ?>

				<li data-content="login" class="selected">
					<?php adqs_get_template_part('users/login'); ?>
				</li>
				<?php if (!empty(get_option('users_can_register'))) :  ?>
					<li data-content="signup">

						<?php adqs_get_template_part('users/registration', '', compact('registration_terms_text')); ?>

					</li>
				<?php endif; ?>
				<li data-content="forget">

					<?php adqs_get_template_part('users/forget'); ?>

				</li>
			</ul>
		</div> <!-- end adqs-log-regi-tabs -->

		<?php return ob_get_clean();
	}



	/**
	 * Method frontend_dashbaord
	 *
	 * @return string
	 */
	public function frontend_dashbaord()
	{

		if (!is_user_logged_in()) {
			ob_start();
			$loginPage = adqs_get_permalink_by_key('adqs_login_regi');
			if (!empty($loginPage)) :
		?>
				<script>
					if (window.location.href !== '<?php echo esc_url($loginPage); ?>') {
						window.location.href = '<?php echo esc_url($loginPage); ?>';
					}
				</script>
			<?php
			endif;
			return ob_get_clean();
		}

		wp_enqueue_script('qs-frontdashdeps');
		wp_enqueue_style('qs-frontdash-css');
		wp_enqueue_style('qs-frontdash-tailwind');
		wp_enqueue_style('adqs-toast');




		return "<div id='user_dashboard' class='user_dashboard'></div>";
	}



	/**
	 * Method render_all_listing_categories
	 *
	 * @param $atts
	 *
	 * @return string
	 */
	public function render_all_listing_categories($atts)
	{

		extract(shortcode_atts([
			'tax_name'  => 'adqs_category',
			'per_page'  => 10,
			'ajax_filter'  => empty(adqs_get_setting_option('ajax_filters')) ? 'false' : 'true',
			'top_bar_show'  => 'true',
			'pagination_type'  => 'pagination',
			'terms'  => '',
			'order'  => 'DESC',
			'orderby'  => 'count',
			'carousel_settings'  => '',
			'uniq_id'  => '',
			'from_addon'  => 'false',
			'column_basis'  => '',
			'column_gap'  => '',

		], $atts));

		global $wp;

		$ajax_filter =  ('true' === $ajax_filter) ? true : false;

		if ($ajax_filter) {
			wp_enqueue_script('adqs_ajax_search');
			wp_localize_script(
				'adqs_ajax_search',
				'qsAjxFilter',
				array(
					'ajaxurl'  => admin_url('admin-ajax.php'),
					'security' => wp_create_nonce('adqs_ajax_filter'),
				)
			);
		}


		$top_bar_show = ('true' === $top_bar_show) ? true : false;
		$from_addon = ('true' === $from_addon) ? true : false;

		$terms = adqs_covertTerm_slug_to_id($terms, $tax_name);

		wp_enqueue_style('adqs_taxonomy_archive');

		$uniqId = !empty($uniq_id) ? $uniq_id : uniqid();
		$isSlick = false;
		if ($pagination_type === 'carousel') {
			$carousel_settings = apply_filters("adqs_taxonomy_carousel_settings", $carousel_settings, $tax_name);

			if (empty($from_addon)) {
				wp_enqueue_style('slick');
				wp_enqueue_style('slick-init');
				wp_enqueue_script('slick');
				wp_enqueue_script('slick-init');
			}
			$isSlick = true;
		}

		$active_type = $_GET['directory_type'] ?? '';


		$per_page = (int) $per_page;

		$args = [
			'taxonomy'   => $tax_name,
			'hide_empty' => true,
			'number'  => $per_page,
			'order'      => $order,
			'orderby'    => $orderby,
		];

		if (!empty($terms)) {
			$args['include'] = array_map('absint', explode(',', $terms));
		}

		$all_listing_type = adqs_get_directory_types();
		$allTermsIds = [];
		if (!empty($active_type)) {
			$directory_type_id = !empty($active_type)
				? get_term_by('slug', $active_type, 'adqs_listing_types')->term_id
				: 0;

			$alT = [
				'taxonomy'   => $tax_name,
				'hide_empty' => true,
			];
			$alT['include'] = $terms;
			$getTerms = get_terms($alT);



			foreach ($getTerms as $single_term) {
				$directory_belongs = get_term_meta($single_term->term_id, 'listing_types', true) ?: [];
				if (in_array($directory_type_id, $directory_belongs)) {
					$allTermsIds[] = $single_term->term_id;
				}
			}
		} elseif (!empty($terms)) {
			$allTermsIds = explode(',', $terms);
		}

		$allTermsIds = array_unique(array_filter($allTermsIds));


		$pagination_args = [];
		if (($pagination_type === 'pagination') && $per_page > 0) {
			$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args['offset'] = ($page - 1) * $per_page;


			// Pagination
			$totalArgs = [
				'taxonomy'   => $tax_name,
				'hide_empty' => true,
			];

			$totalArgs['include'] = !empty($allTermsIds) ? $allTermsIds : (!empty($active_type) ? [9999999999999] : []);
			$total_terms = wp_count_terms($totalArgs);

			$pagination_args = array(
				'base'      => str_replace(999999999, '%#%', get_pagenum_link(999999999, false)),
				'format'    => '?paged=%#%',
				'current'   =>  $page,
				'total'     => ceil($total_terms / $per_page),
				'show_all'     => false,
				'type'         => 'list',
				'prev_next'    => true,
				'prev_text' => '<i class="fas fa-angle-left"></i>',
				'next_text' => '<i class="fas fa-angle-right"></i>',
			);
		}
		$args['include'] = !empty($allTermsIds) ? $allTermsIds : (!empty($active_type) ? [9999999999999] : []);

		$get_category_terms = get_terms($args);
		$template_slug = ($tax_name === 'adqs_location') ? 'taxonomy-locations' : 'taxonomy';

		ob_start();

		if (empty($from_addon)):
			?>
			<style>
				<?php if (($pagination_type !== 'carousel')): ?>.select-tax-<?php echo esc_attr($uniqId);

																			?>.qsd-select-category-grid-item {
					gap: <?php echo esc_attr($column_gap);
							?> !important;

				}

				.select-tax-<?php echo esc_attr($uniqId);

							?>.qsd-select-category-grid-item .qsd-tax-grid-single {
					-webkit-flex-basis: <?php echo esc_attr($column_basis);
										?> !important;
					flex-basis: <?php echo esc_attr($column_basis);
								?> !important;
				}

				<?php endif;

				if ($pagination_type === 'carousel'): ?>.select-tax-<?php echo esc_attr($uniqId); ?>.qsd-select-category-grid-item .qsd-tax-grid-single {
					margin-left: 10px;
					margin-right: 10px;
				}

				<?php endif; ?>
			</style>
		<?php endif;



		if ($ajax_filter):
			$isSlick = ($pagination_type === 'carousel') ? true : false;
		?>
			<div class="qsd-tax-ajax" data-base-url="<?php echo esc_url(adqs_get_base_page_url(home_url($wp->request))); ?>"
				data-per-page="<?php echo esc_attr($per_page); ?>" data-pagination-type="<?php echo esc_attr($pagination_type); ?>"
				data-tax-name="<?php echo esc_attr($tax_name); ?>" data-order="<?php echo esc_attr($order); ?>"
				data-orderby="<?php echo esc_attr($orderby); ?>" data-terms="<?php echo esc_attr($terms ?? ''); ?>"
				data-ajax-filter="<?php echo esc_attr($ajax_filter); ?>" <?php if ($isSlick): ?>
				data-carousel-settings="<?php echo esc_attr($carousel_settings); ?>" <?php endif; ?>>
			<?php
		endif;
		adqs_get_template_part(
			'content',
			$template_slug,
			compact(
				'all_listing_type',
				'get_category_terms',
				'tax_name',
				'active_type',
				'per_page',
				'pagination_args',
				'top_bar_show',
				'pagination_type',
				'carousel_settings',
				'uniqId',
				'ajax_filter',
			)
		);
		if ($ajax_filter):
			?>
			</div>
		<?php
		endif;
		return ob_get_clean();
	}

	/**
	 * Method render_listing_shortcode
	 *
	 * @param $atts
	 * @param $content
	 *
	 * @return string
	 */
	public function render_listing_shortcode($atts, $content = null)
	{
		wp_enqueue_style('adqs_single_grid');

		wp_enqueue_script('img_svg_inline');
		wp_enqueue_script('grid-page-script');

		extract(shortcode_atts([
			'filter_show'  => 'true',
			'ajax_filter'  => empty(adqs_get_setting_option('ajax_filters')) ? 'false' : 'true',
			'filter_layout'  => adqs_get_setting_option('filterLayoutPosition') === 'sidebar' ? 'sidebar' : 'top',
			'top_bar_show'  => 'true',
			'pagination_type'  => 'pagination',
			'reset_filter'  => 'true',
			'has_map_view'  => 'true',
			'per_page'  => '',
			'directory_type'  => '',
			'category'  => '',
			'location'  => '',
			'tags'  => '',
			'rating'  => '',
			'display_listings'  => '',
			'short_by'  => '',
			'from_addon'  => 'false',
			'view_type'  => '',
			'carousel_settings'  => '',
			'grid_columns'  => 3,
			'grid_columns_gap'  => '',
			'list_columns'  => 2,
			'list_columns_gap'  => '',
			'uniq_id'  => '',
			'post__not_in'  => '',
		], $atts));


		global $wp;

		$from_addon = ('true' === $from_addon) ? true : false;
		// get all list page id
		if (empty($from_addon)) {
			$alllistingspage_option_key = 'adqs_all_listings_page';
			$get_alllistingspage_id = absint(get_option($alllistingspage_option_key, 0));
			if ($get_alllistingspage_id !== get_the_ID()) {
				update_option($alllistingspage_option_key, get_the_ID());
			}
		}

		$uniqId = !empty($uniq_id) ? $uniq_id : uniqid();
		if ($pagination_type === 'carousel') {
			$carousel_settings = apply_filters("adqs_listing_carousel_settings", $carousel_settings);

			if (empty($from_addon)) {
				wp_enqueue_style('slick');
				wp_enqueue_style('slick-init');
				wp_enqueue_script('slick');
				wp_enqueue_script('slick-init');
			}
		}




		$filter_show = ('true' === $filter_show) ? true : false;
		$top_bar_show = ('true' === $top_bar_show) ? true : false;
		$reset_filter = ('true' === $reset_filter) ? true : false;
		$has_map_view = ('true' === $has_map_view) ? true : false;

		$ajax_filter = ('true' === $ajax_filter) ? true : false;
		$filter_layout = !$filter_show ? 'top' : $filter_layout;

		$paged = !empty(adqs_post_paged()) ? adqs_post_paged() : 1;
		$setting_per_page = !empty(AD()->Helper->get_setting('listing_per_page')) ? intval(AD()->Helper->get_setting('listing_per_page')) : 6;

		$per_page = $per_page ? (int) $per_page : $setting_per_page;

		$queryArgs = [
			'post_type' => 'adqs_directory',
			'posts_per_page' => $per_page,
		];
		if ($pagination_type === 'pagination') {
			$queryArgs['paged'] =  $paged;
		}


		if (!empty($directory_type)) {
			$queryArgs['directory_type'] = $directory_type;
		}
		if (!empty($category)) {
			$queryArgs['category'] = $category;
		}
		if (!empty($location)) {
			$queryArgs['location'] = $location;
		}
		if (!empty($tags)) {
			$queryArgs['tags'] = adqs_covertTerm_slug_to_id($tags);
		}
		if (!empty($rating)) {
			$queryArgs['rating'] = $rating;
		}
		if (!empty($display_listings)) {
			$queryArgs['display_listings'] = $display_listings;
		}

		$setQueryArgs = adqs_listing_query_filter_args($queryArgs);


		/**
		 *  Short By
		 */
		if (!empty(adqs_listing_query_sort_by($short_by))) {
			$setQueryArgs = array_merge($setQueryArgs, adqs_listing_query_sort_by($short_by));
		}

		if (!empty($post__not_in)) {
			$post__not_in = array_map(function ($id) {
				return absint($id);
			}, explode(',', $post__not_in));
			$setQueryArgs['post__not_in'] = $post__not_in;
		}

		if (isset($_GET['view_type'])) {
			$view_type = $_GET['view_type'];
		}

		$setQueryArgs['post_status'] = 'publish';
		$listings_query = new \WP_Query($setQueryArgs);

		$custom_directory = !empty($directory_type) ? explode(',', $directory_type) : [];
		$isSlick = ($pagination_type === 'carousel') ? true : false;
		$one_dir = '';
		if ($ajax_filter && !empty($custom_directory ?? []) && count($custom_directory) === 1) {
			$one_dir = $custom_directory[0] ?? '';
		}

		static $ad_id = 1;

		ob_start();


		do_action('adqs_before_main_content');

		if (empty($from_addon)):
		?>
			<style>
				<?php if ($pagination_type !== 'carousel'): ?>#adqs_layoutType_<?php echo esc_attr($ad_id) . ' '; ?>.qsd-prodcut-grid-list-main {
					-ms-grid-columns: (1fr)[<?php echo esc_attr($grid_columns);
											?>] !important;
					-webkit-grid-template-columns: repeat(<?php echo esc_attr($grid_columns); ?>, 1fr) !important;
					-moz-grid-template-columns: repeat(<?php echo esc_attr($grid_columns); ?>, 1fr) !important;
					-o-grid-template-columns: repeat(<?php echo esc_attr($grid_columns); ?>, 1fr) !important;
					grid-template-columns: repeat(<?php echo esc_attr($grid_columns); ?>, 1fr) !important;
					gap: <?php echo esc_attr($grid_columns_gap);
							?> !important;
				}

				#adqs_layoutType_<?php echo esc_attr($ad_id) . ' '; ?>.qsd-prodcut-grid-list-main.list-view {
					-ms-grid-columns: (1fr)[<?php echo esc_attr($list_columns);
											?>] !important;
					-webkit-grid-template-columns: repeat(<?php echo esc_attr($list_columns); ?>, 1fr) !important;
					-moz-grid-template-columns: repeat(<?php echo esc_attr($list_columns); ?>, 1fr) !important;
					-o-grid-template-columns: repeat(<?php echo esc_attr($list_columns); ?>, 1fr) !important;
					grid-template-columns: repeat(<?php echo esc_attr($list_columns); ?>, 1fr) !important;
					gap: <?php echo esc_attr($list_columns_gap);
							?> !important;
				}

				<?php endif;

				if ($pagination_type === 'carousel'): ?>.grid-list-<?php echo esc_attr($uniqId); ?>.qsd-prodcut-grid-list-main .adqs-slick-item-col {
					margin-left: 10px;
					margin-right: 10px;
				}

				<?php endif; ?>
			</style>
		<?php endif;



		if ($filter_show && empty(adqs_get_setting_option('excludeSearch')) && ($filter_layout === 'top')) {
			adqs_get_template_part('grid/advanced', 'top-filter', compact('ajax_filter', 'per_page', 'paged'));
		}

		?>


		<section class="qsd-prodcut-grid-with-side-bar-main adqs_layoutType<?php echo esc_attr($filter_layout); ?>"
			id="adqs_layoutType_<?php echo esc_attr($ad_id); ?>" data-ad-fragment="adqs_layoutType_<?php echo esc_attr($ad_id); ?>">
			<div
				class="<?php echo is_singular('adqs_directory') ? esc_attr('container') : esc_attr('adqs-admin-container'); ?>">
				<div
					class="qsd-prodcut-grid-with-side-bar-main-item <?php !empty($view_type) ?  esc_attr($view_type . '-view') : ''; ?>">
					<?php
					if ($filter_show && empty(adqs_get_setting_option('excludeSearch')) && ($filter_layout === 'sidebar')) {
						adqs_get_template_part('grid/advanced', 'top-filter', compact('ajax_filter', 'per_page', 'paged', 'filter_layout'));
					}

					?>
					<div class="qsd-prodcut-grid-right">
						<?php
						if ($top_bar_show) {
							adqs_get_template_part('grid/header-top', 'bar', compact('listings_query', 'has_map_view', 'reset_filter', 'per_page', 'custom_directory', 'view_type', 'ajax_filter', 'filter_layout'));
						}
						if ($has_map_view && ($view_type === 'map')):
							adqs_get_template_part('grid/map', 'view');
						else:
						?>
							<div class="qsd-dl-wrapper">
								<?php if ($ajax_filter): ?>
									<div class="qsd-dl-ajax-content"
										data-base-url="<?php echo esc_url(adqs_get_base_page_url(home_url($wp->request))); ?>"
										data-per-page="<?php echo esc_attr($per_page); ?>"
										data-filter-layout="<?php echo esc_attr($filter_layout); ?>"
										data-dir-type="<?php echo esc_attr($one_dir); ?>"
										data-category="<?php echo esc_attr($category); ?>"
										data-location="<?php echo esc_attr($location); ?>"
										data-tags="<?php echo esc_attr($tags); ?>"
										data-rating="<?php echo esc_attr($rating); ?>"
										data-display-listings="<?php echo esc_attr($display_listings); ?>"
										data-view-type="<?php echo esc_attr($view_type); ?>"
										data-short-by="<?php echo esc_attr($short_by); ?>"
										data-pagination-type="<?php echo esc_attr($pagination_type); ?>" <?php if ($isSlick): ?>
										data-carousel-settings="<?php echo esc_attr($carousel_settings); ?>" <?php endif; ?>>
									<?php endif; ?>
									<?php
									adqs_get_template_part('grid/gridlist', 'view', compact('listings_query', 'pagination_type', 'view_type', 'carousel_settings', 'uniqId', 'ajax_filter', 'custom_directory', 'per_page', 'filter_layout'));

									if ($ajax_filter):
									?>
									</div>
									<div class="qsd-loader-overly"></div>
									<div class="qsd-loader-spinner"></div>
								<?php endif; ?>

							</div>
						<?php
							do_action('adqs_after_listings');
						endif;
						?>
					</div>
				</div>
			</div>
		</section>
	<?php
		do_action('adqs_after_main_content');
		$ad_id++;
		return ob_get_clean();
	}

	/**
	 * Method render_search_bar
	 *
	 * @param $atts
	 * @param $content
	 *
	 * @return string
	 */
	public function render_search_bar($atts, $content = null)
	{


		wp_enqueue_script('img_svg_inline');

		extract(shortcode_atts([
			'from_addon'  => 'false',
			'search_page_url'  => '',
			'new_tab'  => 'true',
		], $atts));

		$from_addon = (bool) $from_addon;
		$new_tab = (bool) $new_tab;


		ob_start();

		do_action('adqs_before_main_content');

		adqs_get_template_part('global/search', 'bar', compact('search_page_url', 'new_tab'));

		do_action('adqs_after_main_content');
		return ob_get_clean();
	}



	/**
	 * Method render_social_share
	 *
	 * @param $atts
	 * @param $content
	 *
	 * @return string
	 */
	public function render_social_share($atts, $content = null)
	{
		// Get current page URL
		$sb_url = urlencode(get_permalink());

		// Get current page title
		$sb_title = get_the_title();

		// Get Post Thumbnail for Pinterest
		$sb_thumb = get_the_post_thumbnail_url();

		// Construct sharing URLs without using any script
		$facebookURL  = 'https://www.facebook.com/sharer/sharer.php?u=' . $sb_url;
		$twitterURL   = 'https://twitter.com/intent/tweet?text=' . $sb_title . '&url=' . $sb_url . '&via=adqs_listing';
		$pinterestURL = add_query_arg(['description' => $sb_title, 'url' => $sb_url, 'media' => $sb_thumb], 'https://pinterest.com/pin/create/button');
		$linkedinURL  = 'https://www.linkedin.com/sharing/share-offsite/?url=' . $sb_url;
		$whatsappURL  = 'https://api.whatsapp.com/send?text=' . $sb_title . ' ' . $sb_url;
		$redditURL    = 'https://www.reddit.com/submit?url=' . $sb_url . '&title=' . $sb_title;
		$telegramURL  = 'https://t.me/share/url?url=' . $sb_url . '&text=' . $sb_title;

		ob_start();
	?>
		<span class="listing-grid-details-btn qsd-socialShare">
			<img src="<?php echo esc_url(ADQS_DIRECTORY_ASSETS_URL); ?>/frontend/img/share.svg" alt="img">
			<span class="qsd-text"><?php echo esc_html__('Share Now', 'adirectory'); ?></span>
			<div class="qsd-socialShare-btn">
				<a class="qsd-ssb-facebook" href="<?php echo esc_url($facebookURL); ?>" target="_blank" rel="nofollow"><?php echo esc_html__('Facebook', 'adirectory'); ?></a>
				<a class="qsd-ssb-twitter" href="<?php echo esc_url($twitterURL); ?>" target="_blank" rel="nofollow"><?php echo esc_html__('Twitter', 'adirectory'); ?></a>
				<a class="qsd-ssb-pinterest" href="<?php echo esc_url($pinterestURL); ?>" target="_blank" rel="nofollow"><?php echo esc_html__('Pinterest', 'adirectory'); ?></a>
				<a class="qsd-ssb-linkedin" href="<?php echo esc_url($linkedinURL); ?>" target="_blank" rel="nofollow"><?php echo esc_html__('LinkedIn', 'adirectory'); ?></a>
				<a class="qsd-ssb-whatsapp" href="<?php echo esc_url($whatsappURL); ?>" target="_blank" rel="nofollow"><?php echo esc_html__('WhatsApp', 'adirectory'); ?></a>
				<a class="qsd-ssb-reddit" href="<?php echo esc_url($redditURL); ?>" target="_blank" rel="nofollow"><?php echo esc_html__('Reddit', 'adirectory'); ?></a>
				<a class="qsd-ssb-telegram" href="<?php echo esc_url($telegramURL); ?>" target="_blank" rel="nofollow"><?php echo esc_html__('Telegram', 'adirectory'); ?></a>
			</div>
		</span>
<?php
		return ob_get_clean();
	}
}
