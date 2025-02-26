<?php namespace BulkPriceEditor\EditorPage;

use Automattic\WooCommerce\Admin\PageController;
use BulkPriceEditor\Actions\SchedulePriceUpdatesAction;
use BulkPriceEditor\Core\ServiceContainerTrait;
use BulkPriceEditor\EditorPage\Notifications\PriceUpdatedSuccessfullyNotification;
use BulkPriceEditor\EditorPage\Services\LookupService;
use BulkPriceEditor\EditorPage\Widgets\PriceModifiers\PriceModifiersWidget;
use BulkPriceEditor\EditorPage\Widgets\ProductsList;
use BulkPriceEditor\BulkPriceEditorPlugin;

class PriceEditorPage {
	
	use ServiceContainerTrait;
	
	const PAGE_SLUG = 'bulk-price-editor';
	
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'registerPage' ) );
		
		add_filter( 'woocommerce_screen_ids', function ( $ids ) {
			$ids[] = 'woocommerce_page_' . self::PAGE_SLUG;
			
			return $ids;
		} );
		
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueueAssets' ) );
		
		add_action( 'init', function () {
			$this->getContainer()->initService( LookupService::class );
		} );
	}
	
	public function enqueueAssets( $screen ) {
		
		if ( $screen !== 'woocommerce_page_' . self::PAGE_SLUG ) {
			return;
		}
		
		wp_enqueue_style( 'bulk-price-editor-page-css',
			$this->getContainer()->getFileManager()->locateAsset( 'admin/bulk-price-editor.css' ), array(),
			BulkPriceEditorPlugin::VERSION );
		
		wp_enqueue_script( 'bulk-price-editor-page-js',
			$this->getContainer()->getFileManager()->locateAsset( 'admin/bulk-price-editor.js' ),
			array( 'jquery-blockui', 'jquery' ), BulkPriceEditorPlugin::VERSION, true );
	}
	
	public function registerPage() {
		
		if ( class_exists( '\Automattic\WooCommerce\Admin\PageController' ) ) {
			PageController::get_instance()->connect_page( array(
				'id'        => self::PAGE_SLUG,
				'title'     => array( 'Bulk Price Editor' ),
				'screen_id' => self::PAGE_SLUG,
			) );
		}
		
		add_submenu_page( 'woocommerce', __( 'Bulk Price Editor', 'bulk-price-editor-for-woocommerce' ),
			__( 'Bulk Price Editor', 'bulk-price-editor-for-woocommerce' ), 'manage_options', self::PAGE_SLUG,
			array( $this, 'render' ) );
	}
	
	public function render() {
		
		?>
		<div id="bulk-price-editor-page">

			<div class="bulk-price-editor-header">
				<div class="bulk-price-editor-header__title">
					Bulk Price Editor
				</div>
			</div>

			<div class="bulk-price-editor">
				<div class="bulk-price-editor__inner">
					
					<?php PriceUpdatedSuccessfullyNotification::render(); ?>
					
					<?php if ( SchedulePriceUpdatesAction::isRunning() ): ?>
						<?php $this->renderLoadingState(); ?>
					<?php else: ?>
						<div class="bulk-price-editor-widgets">
							<?php
								( new Widgets\ProductFilters\ProductFiltersWidget() )->display();
								( new PriceModifiersWidget() )->display();
								( new ProductsList\ProductsListWidget() )->display();
							?>
						</div>
					<?php endif; ?>

				</div>
			</div>
		</div>
		
		<?php
	}
	
	public function renderLoadingState() {
		
		$progress   = SchedulePriceUpdatesAction::getProgressData();
		$percentage = round( $progress['processed'] / $progress['total'] * 100 );
		?>

		<div id="bulk-price-editor-update-in-progress"
			 class="bulk-price-editor-update-in-progress"
			 data-get-progress-url="<?php echo esc_attr( SchedulePriceUpdatesAction::getProgressURL() ) ?>">
			<div class="bulk-price-editor-update-in-progress__inner">
				<div class="bulk-price-editor-update-in-progress__title">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200">
						<circle fill="#333333" stroke="#333333" stroke-width="15" r="15" cx="40" cy="100">
							<animate attributeName="opacity" calcMode="spline" dur="2" values="1;0;1;"
									 keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.4"></animate>
						</circle>
						<circle fill="#333333" stroke="#333333" stroke-width="15" r="15" cx="100" cy="100">
							<animate attributeName="opacity" calcMode="spline" dur="2" values="1;0;1;"
									 keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.2"></animate>
						</circle>
						<circle fill="#333333" stroke="#333333" stroke-width="15" r="15" cx="160" cy="100">
							<animate attributeName="opacity" calcMode="spline" dur="2" values="1;0;1;"
									 keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="0"></animate>
						</circle>
					</svg>
					Prices are being updated
				</div>

				<div class="bulk-price-editor-update-in-progress__progress">
					<div class="bulk-price-editor-update-in-progress__info">
						<div>
							<span class="bulk-price-editor-update-in-progress__current">
								<?php echo esc_html( $progress['processed'] ) ?>
							</span>
							<span class="bulk-price-editor-update-in-progress__separator">/</span>
							<span class="bulk-price-editor-update-in-progress__total">
								<?php echo esc_html( $progress['total'] ) ?>
							</span>
						</div>
						<div>
							
							<span class="bulk-price-editor-update-in-progress__percentage">
								<?php echo esc_html( $percentage ) ?>%
							</span>

						</div>
					</div>
					<div class="bulk-price-editor-progress-bar">
						<div class="bulk-price-editor-progress-bar__inner"
							 style="width: <?php echo esc_attr( $percentage ) ?>%"></div>
					</div>
				</div>

				<div class="bulk-price-editor-update-in-progress__description">
					<?php
						esc_html_e( 'This may take a while depending on the number of products being updated.',
							'bulk-price-editor-for-woocommerce' );
					?>
					<br>
					<?php
						esc_html_e( 'The page will refresh automatically when the process is complete.',
							'bulk-price-editor-for-woocommerce' );
					?>
				</div>
			</div>


			<div class="bulk-price-editor-update-in-progress__footer">
				
				<?php
					$viewQueueURL = add_query_arg( array(
						'page'   => 'wc-status',
						'tab'    => 'action-scheduler',
						'status' => 'pending',
						'group'  => 'bulk-price-editor__prices',
					), admin_url( 'admin.php' ) );
					
					$stopUpdatingURL = add_query_arg( array(
						'action'   => SchedulePriceUpdatesAction::STOP_UPDATING_ACTION_NAME,
						'_wpnonce' => wp_create_nonce( SchedulePriceUpdatesAction::STOP_UPDATING_ACTION_NAME ),
					), admin_url( 'admin-post.php' ) );
					
					$stopUpdatingConfirmationMessage = esc_attr( __( 'Are you sure you want to stop updating prices?',
						'bulk-price-editor-for-woocommerce' ) );
				?>

				<div class="bulk-price-editor-update-in-progress__actions">
					<a href="<?php echo esc_attr( $viewQueueURL ) ?>"
					   target="_blank"
					   class="bulk-price-editor-button bulk-price-editor-button--secondary"
					   style="margin-right:10px ">
						<?php esc_html_e( 'View queue', 'bulk-price-editor-for-woocommerce' ) ?>
					</a>

					<a href="<?php echo esc_attr( $stopUpdatingURL ); ?>"
					   onclick="return confirm('<?php echo esc_attr( $stopUpdatingConfirmationMessage ) ?>')"
					   class="bulk-price-editor-button bulk-price-editor-button--primary">
						<?php esc_html_e( 'Stop updating', 'bulk-price-editor-for-woocommerce' ) ?>
					</a>
				</div>
			</div>

		</div>
		
		
		<?php
	}
}