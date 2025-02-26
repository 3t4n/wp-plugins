<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

global $wpdb;

// template part $args
extract($args);
global $wp;

$querystring = $_SERVER['QUERY_STRING'] ?? [];
parse_str($querystring, $output);


$all_listing_type = adqs_get_directory_types();
$meta_key = 'adqs_directory_type'; // Replace with your custom meta key
$active_type = $_REQUEST['directory_type'] ?? ''; // Assuming it's passed via request
$meta_value = get_term_by('slug', $active_type, 'adqs_listing_types')->term_id ?? 0;

$agSortBy = $_REQUEST['ag_sort_by'] ?? '';
$agVerify = $_REQUEST['ag_verify'] ?? '';

$filter_args = [
	'meta_key'   => 'adqs_directory_type',
	'meta_value' => $meta_value,
	'post_type'  => $post_type,
];

$filter_datas = adgqs_agents_filter($filter_args);


$current_page = isset($_REQUEST['adqs_page']) ? absint($_REQUEST['adqs_page']) : 1;

// Pagination settings
$offset = ($current_page - 1) * $per_page;

// Use WP_User_Query to get authors
$args = [

	'number'   => $per_page,
	'offset'   => $offset,
	'orderby'  => 'ad_listing_count',
	'order'    => 'DESC',
	'fields'   => 'ID',

];

if (!empty($agVerify)) {
	$args['meta_query'] = [
		[
			'key'     => '_ad_user_verify_status',
			'value'   => '1',
			'compare' => '=',
		],
	];
}

switch ($agSortBy) {
	case 'name_a_z':
		$args['orderby'] = 'display_name';
		$args['order'] = 'ASC';
		break;
	case 'name_z_a':
		$args['orderby'] = 'display_name';
		$args['order'] = 'DESC';
		break;
	case 'rating':
		$args['meta_key'] = 'adqs_agent_rating';
		$args['orderby'] = 'meta_value_num';
		$args['order'] = 'DESC';
		break;
	case 'review_count':
		$args['meta_key'] = 'adqs_agent_review';
		$args['orderby'] = 'meta_value_num';
		$args['order'] = 'DESC';
		break;
}


if (!empty($filter_datas)) {
	$args['include'] = $filter_datas;
}

// Query users
$user_query = new WP_User_Query($args);
$authors = $user_query->get_results();
$total_authors = $user_query->get_total();

// Display authors if available
if (!empty($authors)) :
	$authors = map_deep($authors, 'absint');
	do_action('adqs_before_main_content');
?>

	<div class="adqs-agents-area" id="adqs-agent-all" data-ad-fragment='adqs-agent-all'>
		<div class="adqs-admin-container">
			<div class="adqs-directory-type-agent">
				<div class="qsd-prodcut-grid-right-top-ber-left">
					<?php
					if (!empty($all_listing_type) && (count($all_listing_type) > 1)) : ?>
						<ul class="qsd-catagory-list-btn">
							<li><a href="<?php echo esc_url(adqs_get_base_page_url(home_url($wp->request))); ?>"
									class="<?php echo empty($active_type) ? esc_attr('active') : '' ?>"><?php echo esc_html__('All', 'adirectory'); ?></a>
							</li>
							<?php
							$item_count = 1;
							foreach ($all_listing_type as $listing_type) :
								if ($item_count == apply_filters('adqs_agent_dirlist_dropdown', 4)) {
									echo '<li class="has-next-all"><span>+</span><ul>';
								}
							?>
								<li><a href="<?php echo esc_url(add_query_arg('directory_type', $listing_type->slug,  adqs_get_base_page_url(home_url($wp->request)))); ?>"
										class="<?php echo ($listing_type->slug === $active_type) ? esc_attr('active') : '' ?>">

										<?php
										$dir_type_icon = get_term_meta($listing_type->term_id, 'adqs_term_icon', true);
										$dir_type_img = get_term_meta($listing_type->term_id, 'adqs_term_img', true);
										?>
										<?php
										if (!empty($dir_type_img)): ?>
											<img style="width: 15px;" class="adqs-dir-img" src="<?php echo esc_url($dir_type_img); ?>" alt="#">
											<?php else :
											if ($dir_type_icon):
											?>
												<i class="<?php echo esc_attr($dir_type_icon); ?>"></i>
										<?php
											endif;
										endif;
										?>
										<?php echo esc_html($listing_type->name); ?></a>
								</li>
							<?php
								// Close the inner <ul> tag at the end of the loop if it was opened
								if ($item_count == count($all_listing_type)) {
									echo '</ul></li>';
								}
								$item_count++;
							endforeach; ?>
						</ul>
						<?php else:
						if (!empty($total_authors)) :
							$start = ($current_page - 1) * $per_page + 1;
							$end = min($start + $per_page - 1, $total_authors);
						?>
							<div class="qsd-listing-summary">
								<p>
									<?php
									echo sprintf(
										esc_html__('Showing %1$s-%2$s of %3$s results', 'adirectory'),
										esc_html($start),
										esc_html($end),
										esc_html($total_authors)
									);
									?>
								</p>
							</div>
						<?php endif; ?>
					<?php endif; ?>
				</div>
				<div class="qsd-prodcut-grid-right-top-ber-right">

					<div class="most-relevant-item">
						<p class="most-relevant-txt"><?php echo esc_html__('Sort By', 'adirectory'); ?>:</p>
						<?php
						$allSortBy = apply_filters('adqs_agents_sort_by', [
							'name_a_z' => esc_html__('Name (A-Z)', 'adirectory'),
							'name_z_a' => esc_html__('Name (Z-A)', 'adirectory'),
							'listing_count' => esc_html__('Listing Count', 'adirectory'),
							'rating' => esc_html__('Ratings', 'adirectory'),
							'review_count' => esc_html__('Review Count', 'adirectory'),
						]);
						if (!empty($allSortBy)) :
						?>
							<div class="qsd-form-item">
								<select id="adqs_ag_allSortBy" class='qsd-form-select' onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
									<?php


									foreach ($allSortBy as $sortVal => $sortText) :

									?>
										<option value="<?php echo esc_url(add_query_arg(array_merge($output, array('ag_sort_by' => $sortVal)), home_url($wp->request))); ?>" <?php selected($agSortBy, $sortVal); ?>>
											<?php echo esc_html($sortText); ?>
										</option>
									<?php

									endforeach; ?>
								</select>
							</div>
						<?php endif; ?>
					</div>
					<ul class="qsd-grid-list-btn-main">
						<li>

							<a href="<?php echo esc_url(adqs_get_base_page_url(home_url($wp->request))); ?>"
								class="qsd-grid-list-btn qsd-reset-btn">
								<span>
									<svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M22 11.0364C22.0038 13.4995 21.1808 15.8927 19.6628 17.8325C18.1447 19.7723 16.0196 21.1465 13.6277 21.7349C11.2359 22.3233 8.71574 22.0919 6.47103 21.0778C4.22633 20.0636 2.38696 18.3254 1.24758 16.1416C0.108203 13.9578 -0.265246 11.4548 0.18706 9.03347C0.639365 6.61219 1.89125 4.41277 3.74217 2.78757C5.59308 1.16236 7.93592 0.205405 10.3954 0.0700101C12.8548 -0.0653851 15.2885 0.628611 17.3067 2.04082L17.1722 1.64971C17.0685 1.33366 17.0946 0.989353 17.2447 0.692525C17.3948 0.395697 17.6567 0.170666 17.9728 0.066937C18.2888 -0.0367921 18.6331 -0.0107226 18.93 0.139411C19.2268 0.289544 19.4518 0.551443 19.5555 0.867492L20.7778 4.53416C20.8384 4.71796 20.8545 4.91353 20.8247 5.10477C20.795 5.29601 20.7202 5.47745 20.6067 5.63416C20.4883 5.80077 20.3301 5.93506 20.1465 6.02474C19.9629 6.11441 19.7597 6.15662 19.5555 6.14749H15.8889C15.5647 6.14749 15.2539 6.01872 15.0246 5.78951C14.7954 5.5603 14.6667 5.24942 14.6667 4.92527C14.6711 4.66657 14.7575 4.41594 14.9134 4.20948C15.0694 4.00302 15.2868 3.85137 15.5344 3.77638C13.9267 2.77151 12.0306 2.32917 10.1442 2.51883C8.25768 2.70849 6.48765 3.51941 5.11208 4.82423C3.7365 6.12904 2.83331 7.85381 2.54438 9.72765C2.25544 11.6015 2.59712 13.5182 3.51576 15.1768C4.43439 16.8353 5.87793 18.1418 7.61965 18.8909C9.36136 19.64 11.3026 19.7894 13.1384 19.3155C14.9742 18.8416 16.6006 17.7713 17.7621 16.2728C18.9236 14.7743 19.5545 12.9324 19.5555 11.0364C19.5555 10.7122 19.6843 10.4013 19.9135 10.1721C20.1427 9.94292 20.4536 9.81415 20.7778 9.81415C21.1019 9.81415 21.4128 9.94292 21.642 10.1721C21.8712 10.4013 22 10.7122 22 11.0364Z" />
									</svg>


								</span>
							</a>
						</li>
						<?php if (in_array('ad-agent-verification/ad-agent-verification.php', get_option('active_plugins') ?? [])): ?>
							<li>

								<a href="<?php echo add_query_arg(array_merge($output, array('ag_verify' => 'yes')), home_url($wp->request)); ?>"
									class="qsd-grid-list-btn qsd-reset-btn">
									<span>
										<img class="img-svg" src="<?php echo esc_attr(ADQS_DIRECTORY_ASSETS_URL . '/frontend/img/author-verify-batch.svg'); ?>" alt="<?php echo esc_attr__('author verify', 'ad-agent-verification'); ?>">

									</span>
								</a>
							</li>
						<?php endif; ?>

					</ul>
				</div>
			</div>

			<div class="adqs-agent-all">
				<?php
				foreach ($authors as $author_id) :
					$author_posts_url = adqs_listing_author_url($author_id, $post_type);
					$author = get_user_by('id', $author_id);
					$Helper = AD()->Helper;
					$review_ratings = $Helper->get_author_ratings($author_id);
					$review_count = $Helper->get_author_review_count($author_id);

				?>
					<div class="adqs-agent-wrapper">
						<div class="wrapper-img">
							<?php echo get_avatar($author_id, 300); ?>

							<a href="<?php echo esc_url($author_posts_url); ?>" class="img-overlay"></a>

							<?php
							$author_socials = [
								'adqs_facebook_profile' => 'fa-facebook',
								'adqs_twitter_profile'  => 'fa-twitter',
								'adqs_instagram_profile' => 'fa-instagram',
								'adqs_linked_profile'   => 'fa-linkedin',
							];
							$author_socials = array_filter($author_socials, function ($key) use ($author_id) {
								return get_user_meta($author_id, $key, true) ? true : false;
							}, ARRAY_FILTER_USE_KEY);
							if (!empty($author_socials)) :
							?>
								<div class="social-icons">
									<?php
									foreach ($author_socials as $key_name => $icon) :
										if (get_user_meta($author_id, $key_name, true)) :
									?>
											<a class="adqs-icon" href="<?php echo esc_url(get_user_meta($author_id, $key_name, true)); ?>" target="_blank">
												<span><i class="fa-brands <?php echo esc_attr($icon); ?>"></i></span>
											</a>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
						<div class="wrapper-content">
							<h6 class="wrapper-title"><a href="<?php echo esc_url($author_posts_url); ?>"><?php echo esc_html($author->display_name); ?></a><?php do_action('adqs_after_author', $author_id); ?></h6>

							<ul class="adqs-profile-reviews-item">


								<li><span class="adqs-primary-color"><?php echo esc_html(count_user_posts($author_id, 'adqs_directory')); ?></span> <?php echo esc_html__('Listing', 'adirectory'); ?></li>

								<?php if (!empty($review_ratings)) : ?>
									<li><span><i class="fa-solid fa-star"></i></span><span><?php echo esc_html($review_ratings); ?></span> <?php echo esc_html("( {$review_count} )"); ?></li>
								<?php endif; ?>
							</ul>
							<?php if (!empty(get_user_meta($author_id, 'adqs_address_info', true))) : ?>
								<div class="adqs-profile-reviews-location">
									<span><svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M7 15C9.53125 15 13.75 10.3486 13.75 6.66667C13.75 2.98477 10.7279 0 7 0C3.27208 0 0.25 2.98477 0.25 6.66667C0.25 10.3486 4.46875 15 7 15ZM7 9C8.24264 9 9.25 7.99264 9.25 6.75C9.25 5.50736 8.24264 4.5 7 4.5C5.75736 4.5 4.75 5.50736 4.75 6.75C4.75 7.99264 5.75736 9 7 9Z" fill="#2B69FA" />
										</svg>
									</span>
									<?php echo esc_html(get_user_meta($author_id, 'adqs_address_info', true)); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php
				endforeach;
				?>
			</div>
			<?php
			// Add pagination
			$total_pages = ceil($total_authors / $per_page);
			if ($total_pages > 1) :
			?>
				<ul class="page-numbers">
					<?php if ($current_page > 1) : ?>
						<li><a class="prev page-numbers" href="<?php echo esc_url(adqs_get_current_page_url(['adqs_page' => ($current_page - 1)])); ?>"><i class="fa-solid fa-angle-left"></i></a></li>
					<?php endif; ?>

					<?php for ($i = 1; $i <= $total_pages; $i++) : ?>
						<li>
							<?php if ($i == $current_page) : ?>
								<span aria-current="page" class="page-numbers current"><?php echo $i; ?></span>
							<?php else : ?>
								<a class="page-numbers" href="<?php echo esc_url(adqs_get_current_page_url(['adqs_page' => $i])); ?>"><?php echo $i; ?></a>
							<?php endif; ?>
						</li>
					<?php endfor; ?>

					<?php if ($current_page < $total_pages) : ?>
						<li><a class="next page-numbers" href="<?php echo esc_url(adqs_get_current_page_url(['adqs_page' => ($current_page + 1)])); ?>"><i class="fa-solid fa-angle-right"></i></a></li>
					<?php endif; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
<?php
	do_action('adqs_after_main_content');
endif;
