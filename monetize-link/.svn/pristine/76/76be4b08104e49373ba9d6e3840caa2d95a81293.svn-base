<?php
namespace MonetizeLinkPlugin;

class MLP_Popup extends MLP_Base
{
	public function __construct()
	{
		add_action( 'admin_footer', array( $this, 'init' ) );
	}

	public function init()
	{
		?>
		<div class="takeads-popup">
			<div class="takeads-popup-content">
				<div class="takeads-popup-text"><p><?php _e( 'MonetizeLink integration script will be deleted from your website', 'monetize-link' ); ?></p></div>
				<div class="takeads-popup-buttons">
					<div class="takeads-btn takeads-btn-el" data-action="cancel">
						<?php _e( 'No, cancel', 'monetize-link' ); ?>
                    </div>
					<div class="takeads-btn takeads-btn-el" data-action="delete">
						<?php _e( 'Yes, delete', 'monetize-link' ); ?>
                    </div>
				</div>
			</div>
		</div>
		<?php
	}
}