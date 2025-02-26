<?php
/**
 * Install demos page
 *
 * @package azeen_core
 * @category Core
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
class FWP_Install_Demos {

	/**
	 * Start things up
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_page' ), 999 );
	}

	/**
	 * Add sub menu page for the custom CSS input
	 *
	 * @since 1.0.0
	 */
	public function add_page() {

		$title = esc_html__( 'Install Demos', 'azeen-core' );

		add_submenu_page(
			'themes.php',
			esc_html__( 'Install Demos', 'azeen-core' ),
			$title,
			'manage_options',
			'azeen-panel-install-demos',
			array( $this, 'create_admin_page' )
		);
	}

	/**
	 * Settings page output
	 *
	 * @since 1.0.0
	 */
	public function create_admin_page() {

		// Theme branding
		$brand = 'azeen'; ?>

		<div class="fwp-demo-wrap wrap">

			<h2><?php echo esc_attr( $brand ); ?> - <?php esc_attr_e( 'Install Demos', 'azeen-core' ); ?></h2>
      <p>
        <?php esc_html_e( 'Thank you for using our theme. You can import our demo sites or set up the website from scratch.', 'azeen-core' ) ?>
      </p>
			<div class="theme-browser rendered">

				<?php
				// Vars
				$demos = AzeenWP_Demos::get_demos_data();
				$categories = AzeenWP_Demos::get_demo_all_categories( $demos ); ?>

				<?php if ( ! empty( $categories ) ) : ?>
					<div class="fwp-header-bar">
						<nav class="fwp-navigation">
							<ul>
								<li class="active"><a href="#all" class="fwp-navigation-link"><?php esc_html_e( 'All', 'azeen-core' ); ?></a></li>
								<?php foreach ( $categories as $key => $name ) : ?>
									<li><a href="#<?php echo esc_attr( $key ); ?>" class="fwp-navigation-link"><?php echo esc_html( $name ); ?></a></li>
								<?php endforeach; ?>
							</ul>
						</nav>
						<div clas="fwp-search">
							<input type="text" class="fwp-search-input" name="fwp-search" value="" placeholder="<?php esc_html_e( 'Search demos...', 'azeen-core' ); ?>">
						</div>
					</div>
				<?php endif; ?>

				<div class="themes wp-clearfix">

					<?php
					// Loop through all demos
					foreach ( $demos as $demo => $key ) {

						// Vars
						$item_categories = AzeenWP_Demos::get_demo_item_categories( $key );
            $title = str_replace( 'demo', '', $demo );
            $title = str_replace( '-', ' ', $title );
            $pro = $key['required_plugins'];
            ?>

						<div class="theme-wrap" data-categories="<?php echo esc_attr( $item_categories ); ?>" data-name="<?php echo esc_attr( strtolower( $demo ) ); ?>">

							<div class="theme fwp-open-popup" data-demo-id="<?php echo esc_attr( $demo ); ?>">

								<div class="theme-screenshot">
									<img src="https://azeendemos.com/wp-content/uploads/demos/<?php echo esc_attr( $demo ); ?>.jpg" />

									<div class="demo-import-loader preview-all preview-all-<?php echo esc_attr( $demo ); ?>"></div>

									<div class="demo-import-loader preview-icon preview-<?php echo esc_attr( $demo ); ?>"><i class="custom-loader"></i></div>
                  <?php	if ( isset($pro['premium']) && $pro['premium'] != '' )  { ?>
                    <div class="pro-badge">
  									   <?php esc_html_e( 'PRO', 'azeen-core' ); ?>
  									</div>
                  <?php	} ?>
								</div>

								<div class="theme-id-container">

									<h2 class="theme-name" id="<?php echo esc_attr( $demo ); ?>"><span><?php echo ucwords( $title ); ?></span></h2>

									<div class="theme-actions">
										<a class="button button-primary" href="https://azeendemos.com/<?php echo esc_attr( $demo ); ?>" target="_blank"><?php _e( 'Live Preview', 'azeen-core' ); ?></a>
									</div>

								</div>

							</div>

						</div>

					<?php } ?>

				</div>

			</div>

		</div>

	<?php }
}
new FWP_Install_Demos();
