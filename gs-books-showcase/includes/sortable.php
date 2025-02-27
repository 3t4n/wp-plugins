<?php

namespace GS_BOOKS;

use function GS_BOOKS_PRO\is_pro_valid;

defined( 'ABSPATH' ) || exit;

class Sortable {

	public $is_pro = false;

	public function __construct() {
		$this->is_pro = is_pro_active() && is_pro_valid();
		add_action( 'admin_menu', array( $this, 'gs_books_enable_sort' ), 40 );
		add_action( 'admin_enqueue_scripts', array( $this, 'sort_scripts' ) );
	}

	/**
	 * Add Sort menu
	 */
	function gs_books_enable_sort() {
		add_submenu_page(
			'edit.php?post_type=gs_bookshowcase',
			'Sort Posts',
			'Sort Order',
			'edit_posts',
			'sort_gs_bookshowcase',
			array( $this, 'dhf_sort' ),
			30
		);
	}

	public function dhf_sort() {

		$object_type = isset( $_GET['object_type'] ) ? $_GET['object_type'] : 'gs_book';

		?>
		<div class="gs-plugins--sort-page">
			<div class="gs-plugins--sort-links">
				<a class="<?php echo $object_type === 'gs_book' ? 'gs-sort-active' : ''; ?>" href="<?php echo esc_url( $this->get_url_with_object_type( 'gs_book' ) ); ?>"><?php echo esc_html( 'Book Showcase', 'gsbookshowcase' ); ?></a>
				<a class="<?php echo $object_type === 'gs_book_group' ? 'gs-sort-active' : ''; ?>" href="<?php echo esc_url( $this->get_url_with_object_type( 'gs_book_group' ) ); ?>"><?php echo esc_html( 'Groups', 'gsbookshowcase' ); ?></a>
				<a class="<?php echo $object_type === 'gs_book_filters' ? 'gs-sort-active' : ''; ?>" href="<?php echo esc_url( $this->get_url_with_object_type( 'gs_book_filters' ) ); ?>"><?php echo esc_html( 'Book Filters', 'gsbookshowcase' ); ?></a>
			</div>

			<div class="gs-plugins--sort-content">				
				<?php if ( $object_type === 'gs_book' ) : ?>
					<?php $this->sort_book(); ?>
				<?php elseif ( $object_type === 'gs_book_filters' ) : ?>
					<?php $this->sort_book_filters(); ?>
				<?php else : ?>
					<?php $this->sort_book_taxonomies(); ?>
				<?php endif; ?>
			</div>

		</div>

		<?php
	}

	public function print_pro_message() {
		if ( ! $this->is_pro ) : ?>
			<div class="gs-book-disable--term-pages">
				<div class="gs-book-disable--term-inner">
					<div class="gs-book-disable--term-message"><a href="https://www.gsplugins.com/product/gs-books-showcase/#pricing">Upgrade to PRO</a></div>
				</div>
			</div>
		<?php endif;
	}

	public function sort_book() {

		$sortable = new \WP_Query( 'post_type=gs_bookshowcase&posts_per_page=-1&orderby=menu_order&order=ASC' );

		$this->print_pro_message();

		?>

		<div class="gs-book--sort-wrap sort--wrap-active <?php if ( ! $this->is_pro ) echo esc_attr( 'is_pro_active' ); ?>">
			<div style="display: flex; width: 100%; max-width: 1280px; gap: 40px;">
				<div class="gsbook-sort--left-area" style="flex: 1 0 auto; width: 670px;">

					<h3>
						<?php esc_html_e( 'Step 1: Drag & Drop to rearrange Members', 'gsbookshowcase' ); ?>
						<img src="<?php bloginfo( 'url' ); ?>/wp-admin/images/loading.gif" id="loading-animation" />
					</h3>

					<?php if ( $sortable->have_posts() ) : ?>

						<ul id="sortable-list" class="ui-sortable">

								<?php

								while ( $sortable->have_posts() ) :

									$sortable->the_post();

									$term_obj_list = get_the_terms( get_the_ID(), 'bookshowcase_group' );

									$terms_string = '';

									if ( is_array( $term_obj_list ) || is_object( $term_obj_list ) ) {
										$terms_string = join( '</span><span>', wp_list_pluck( $term_obj_list, 'name' ) );
									}

									if ( ! empty( $terms_string ) ) {
										$terms_string = '<span>' . $terms_string . '</span>';
									}

									?>

							<li id="<?php the_id(); ?>">
								<div class="sortable-content sortable-icon"><i class="fas fa-arrows-alt" aria-hidden="true"></i></div>
								<div class="sortable-content sortable-thumbnail"><span><?php Helpers::gs_book_thumbnail( true, 'thumbnail' ); ?></span></div>
								<div class="sortable-content sortable-title"><?php the_title(); ?></div>
								<div class="sortable-content sortable-group"><?php echo wp_kses_post( $terms_string ); ?></div>
							</li>

							<?php endwhile; ?>

						</ul>

					<?php else : ?>

						<div class="notice notice-warning" style="margin-top: 30px;">
							<h3><?php _e( 'No book Member Found!', 'gsbookshowcase' ); ?></h3>
							<p style="font-size: 14px;"><?php _e( 'We didn\'t find any book member.</br>Please add some book members to sort them.', 'gsbookshowcase' ); ?></p>
							<a href="<?php echo admin_url( 'post-new.php?post_type=gs_book' ); ?>" style="margin-top: 10px; margin-bottom: 20px;" class="button button-primary button-large"><?php _e( 'Add Member', 'gsbookshowcase' ); ?></a>
						</div>

					<?php endif; ?>

				</div>

				<div class="gsbook-sort--right-area">
				
					<h3><?php esc_html_e( 'Step 2: Query Settings for Book Showcase', 'gsbookshowcase' ); ?></h3>

					<div style="background: #fff; border-radius: 6px; padding: 30px; box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.12); font-size: 1.3em; line-height: 1.6; margin-top: 30px">
					
						<ol style="list-style: numeric; padding-left: 20px; margin: 0">
							<li>Create or Edit a Shortcode From <strong>GS Book Showcase > Shortcode</strong>.</li>
							<li>Then proceed to the 3rd tab labeled <strong>Query Settings</strong>.</li>
							<li>Set <strong>Order by</strong> to <strong>Custom Order</strong>.</li>
							<li>Set <strong>Order</strong> to <strong>ASC</strong>.</li>
						</ol>
			
						<ul style="list-style: circle; padding-left: 20px; margin-top: 20px">
							<li>Follow <a href="https://docs.gsplugins.com/gs-book-members/manage-gs-book-member/sort-order/" target="_blank">Documentation</a> to learn more.</li>
							<li><a href="https://www.gsplugins.com/contact/" target="_blank">Contact us</a> for support.</li>
						</ul>

					</div>

				</div>

			</div>
		</div>

		<?php
	}

	public function sort_book_filters() {

		$filters = self::get_book_filters();

		$this->print_pro_message();

		?>

		<div class="gs-book--sort-wrap sort--wrap-active <?php if ( ! $this->is_pro ) echo esc_attr( 'is_pro_active' ); ?>">
			<div style="display: flex; width: 100%; max-width: 1280px; gap: 40px; flex-wrap: wrap;">
				<div class="gsbook-sort--left-area" style="flex: 1 0 auto; width: 570px;">

					<h3><?php esc_html_e( 'Filter Orders', 'gsbookshowcase' ); ?><img src="<?php bloginfo( 'url' ); ?>/wp-admin/images/loading.gif" id="loading-animation" /></h3>

					<?php if ( ! empty( $filters ) ) : ?>

						<ul id="sortable-list" style="max-width: 600px;">
							<?php foreach ( $filters as $filter => $filter_title ) : ?>
								<li id="<?php echo esc_attr( $filter ); ?>">
									<div class="sortable-content sortable-icon"><i class="fas fa-arrows-alt" aria-hidden="true"></i></div>
									<div class="sortable-content sortable-title"><?php echo esc_html( $filter_title ); ?></div>
								</li>
							<?php endforeach; ?>
						</ul>

					<?php endif; ?>
				</div>
			</div>
		</div>
		
		<?php
	}

	public function sort_book_taxonomies() {

		$this->print_pro_message();

		?>
	
		<div class="gs-book--sort-wrap sort--wrap-active <?php if ( ! $this->is_pro ) echo esc_attr( 'is_pro_active' ); ?>">
			<div style="display: flex; width: 100%; max-width: 1280px; gap: 40px; flex-wrap: wrap;">
				<div class="gsbook-sort--left-area" style="flex: 1 0 auto; width: 570px;">

					<h3><?php esc_html_e( 'Step 1: Drag & Drop to rearrange Categories', 'gsbookshowcase' ); ?><img src="<?php bloginfo( 'url' ); ?>/wp-admin/images/loading.gif" id="loading-animation" /></h3>

					<?php

					$terms = get_terms( 'bookshowcase_group' );

					usort($terms, function ($a, $b) {
						return $a->term_order - $b->term_order;
					});

					if ( ! empty( $terms ) ) :
						?>

						<ul id="sortable-list" style="max-width: 600px;">
							<?php foreach ( $terms as $term ) : ?>
								<li id="<?php echo esc_attr( $term->term_id ); ?>">
									<div class="sortable-content sortable-icon"><i class="fas fa-arrows-alt" aria-hidden="true"></i></div>
									<div class="sortable-content sortable-title"><?php echo esc_html( $term->name ); ?></div>
									<div class="sortable-content sortable-group"><span><?php echo absint( $term->count ) . ' ' . 'Books'; ?></span></div>
								</li>
							<?php endforeach; ?>
						</ul>

					<?php else : ?>
						<div class="notice notice-warning" style="margin-top: 30px;">
							<h3><?php _e( 'No book Member Found!', 'gsbookshowcase' ); ?></h3>
							<p style="font-size: 14px;"><?php _e( 'We didn\'t find any book member.</br>Please add some book members to sort them.', 'gsbookshowcase' ); ?></p>
							<a href="<?php echo admin_url( 'post-new.php?post_type=gs_book' ); ?>" style="margin-top: 10px; margin-bottom: 20px;" class="button button-primary button-large"><?php _e( 'Add Member', 'gsbookshowcase' ); ?></a>
						</div>
					<?php endif; ?>

				</div>

				<div class="gsbook-sort--right-area">
					
					<h3><?php esc_html_e( 'Step 2: Query Settings for Groups', 'gsbookshowcase' ); ?></h3>

					<div style="background: #fff; border-radius: 6px; padding: 30px; box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.12); font-size: 1.3em; line-height: 1.6; margin-top: 30px">
						
						<ol style="list-style: numeric; padding-left: 20px; margin: 0">
							<li>Create or Edit a Shortcode From <strong>GS book > book Shortcode</strong>.</li>
							<li>Then proceed to the 3rd tab labeled <strong>Query Settings</strong>.</li>
							<li>Set <strong>Group Order by</strong> to <strong>Custom Order</strong>.</li>
							<li>Set <strong>Group Order</strong> to <strong>ASC</strong>.</li>
						</ol>
	
						<ul style="list-style: circle; padding-left: 20px; margin-top: 20px">
							<li>Follow <a href="https://docs.gsplugins.com/gs-book-members/manage-gs-book-member/sort-order/#reordering-groups-categories" target="_blank">Documentation</a> to learn more.</li>
							<li><a href="https://www.gsplugins.com/contact/" target="_blank">Contact us</a> for support.</li>
						</ul>

					</div>

				</div>

			</div>
		</div>

		<?php
	}

	public static function get_filter_strings() {
		$filters = array(
			'search_by_name'       => 'Search by Name',
			'search_by_isbn'       => 'Search by ISBN',
			'search_by_asin'       => 'Search by ASIN',
			'filter_by_categories' => 'Filter by Categories',
			'filter_by_tags'       => 'Filter by Tags',
			'filter_by_authors'    => 'Filter by Authors',
			'filter_by_genres'     => 'Filter by Genres',
			'filter_by_series'     => 'Filter by Series',
			'filter_by_languages'  => 'Filter by Languages',
			'filter_by_publishers' => 'Filter by Publishers',
			'filter_by_countries'  => 'Filter by Countries',
		);

		return $filters;
	} 

	public static function get_book_filters() {

		$defaults = array(
			'search_by_name',
			'search_by_isbn',
			'search_by_asin',
			'filter_by_categories',
			'filter_by_tags',
			'filter_by_authors',
			'filter_by_genres',
			'filter_by_series',
			'filter_by_languages',
			'filter_by_publishers',
			'filter_by_countries'
		);

		$saved = get_option( 'gs_book_filters_order', $defaults );
		$filter_strings = self::get_filter_strings();
		return array_merge(array_flip($saved), $filter_strings);
	}

	public function get_url_with_object_type( $object = 'gs_book' ) {
		return add_query_arg( 'object_type', $object, $this->get_full_url() );
	}

	public function get_full_url() {
		// Get the protocol
		$protocol = ( ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443 ) ? 'https://' : 'http://';

		// Get the host
		$host = $_SERVER['HTTP_HOST'];

		// Get the request URI
		$uri = $_SERVER['REQUEST_URI'];

		// Combine them to get the full URL
		$full_url = $protocol . $host . $uri;

		return $full_url;
	}

	public function sort_scripts( $hook ) {

		if ( $hook === 'gs_bookshowcase_page_sort_gs_bookshowcase' ) {

			wp_enqueue_style( 'gsbooksshortcss', GS_BOOKS_PLUGIN_URI . '/assets/admin/css/sort.min.css', array(), GS_BOOKS_VERSION );
			wp_enqueue_script( 'jquery-ui-sortable' );
			wp_enqueue_script( 'gsbooksshortjs', GS_BOOKS_PLUGIN_URI . '/assets/admin/js/sort.min.js', array(), GS_BOOKS_VERSION, true );

			wp_localize_script( 'gsbooksshortjs', '_gsbook_sort_data', [
				'is_pro' => $this->is_pro
			]);

			do_action( 'gsbook_sort_scripts' );

		}

	}

}