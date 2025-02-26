<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="ambikly-account-wrapper">
    <div class="ambikly-account-container">
        <div class="ambikly-account-sidebar">
            <ul class="ambikly-account-tabs">
				<?php

				$account_tabs = ambikly_get_account_endpoints();

				foreach ( $account_tabs as $endpoint => $title ) {
					$papge_permalink = add_query_arg( array(
						'page_type' => $endpoint,
					), get_permalink() );
					?>
                    <li class="ambikly-tab-item <?php echo $endpoint == $current_endpoint ? 'active' : ''; ?>"
                        data-tab="profile">
                        <a href="<?php echo esc_url( $papge_permalink ) ?>"><?php echo esc_html( $title ) ?></a>
                    </li>
				<?php } ?>
            </ul>
        </div>

        <div class="ambikly-account-content">
			<?php
			do_action( 'ambikly_account_content_' . trim( $current_endpoint ) );
			?>
        </div>
    </div>
</div>