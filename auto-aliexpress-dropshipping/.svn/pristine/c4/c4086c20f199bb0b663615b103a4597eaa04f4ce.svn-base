<?php
$source = isset( $_GET['source'] ) ? sanitize_text_field( $_GET['source'] ) : 'dashboard';
$id = isset( $_GET['id'] ) ? sanitize_text_field( $_GET['id'] ) : '';
// Campaign Settings
$settings = array();
if(!empty($id)){
    $model    = $this->get_single_model( $id );
    $settings = $model->settings;
    $settings['status'] = $model->status;
}
?>
<div class="aliexpress-row-with-sidenav">

    <div class="aliexpress-sidenav">

        <div class="aliexpress-mobile-select">
            <span class="aliexpress-select-content"><?php esc_html_e( 'General', Auto_Aliexpress::DOMAIN ); ?></span>
            <ion-icon name="chevron-down" class="aliexpress-icon-down"></ion-icon>
        </div>

        <ul class="aliexpress-vertical-tabs aliexpress-sidenav-hide-md">

            <li class="aliexpress-vertical-tab">
                <a href="#" data-nav="dashboard"><?php esc_html_e( 'General', Auto_Aliexpress::DOMAIN ); ?></a>
            </li>

            <li class="aliexpress-vertical-tab">
                <a href="#" data-nav="schedule"><?php esc_html_e( 'Schedule', Auto_Aliexpress::DOMAIN ); ?></a>
            </li>

            <li class="aliexpress-vertical-tab">
                <a href="#" data-nav="post"><?php esc_html_e( 'Post Status', Auto_Aliexpress::DOMAIN ); ?></a>
            </li>

            <li class="aliexpress-vertical-tab">
                <a href="#" data-nav="category"><?php esc_html_e( 'Categories & Tags', Auto_Aliexpress::DOMAIN ); ?></a>
            </li>

        </ul>

        <div class="aliexpress-sidenav-settings">
          <a href="#run-campaign-popup" class="open-popup-campaign" data-effect="mfp-zoom-in">
            <button id="aliexpress-run-button" class="aliexpress-button aliexpress-sidenav-hide-md" accesskey="p">
                <?php esc_html_e( 'Run Campaign', Auto_Aliexpress::DOMAIN ); ?>
            </button>
          </a>
      </div>

    </div>

    <form class="aliexpress-campaign-form" method="post" name="aliexpress-campaign-form" action="">

    <div class="aliexpress-box-tabs">
        <?php $this->template( 'campaigns/wizard/sections/tab-save',  $settings); ?>
        <?php $this->template( 'campaigns/wizard/sections/tab-schedule',  $settings); ?>
        <?php $this->template( 'campaigns/wizard/sections/tab-dashboard', $settings); ?>
        <?php $this->template( 'campaigns/wizard/sections/tab-post', $settings); ?>
        <?php $this->template( 'campaigns/wizard/sections/tab-category', $settings); ?>
    </div>
        <input type="hidden" name="aliexpress_selected_source" value="<?php echo esc_html($source); ?>">
        <input type="hidden" name="campaign_id" value="<?php echo esc_html($id); ?>">
    </form>
</div>

<div id="run-campaign-popup" class="white-popup mfp-with-anim mfp-hide">

		<div class="aliexpress-box-header aliexpress-block-content-center">
			<h3 class="aliexpress-box-title type-title"><?php esc_html_e( 'Campaign Console', Auto_Aliexpress::DOMAIN ); ?></h3>
		</div>

        <div class="aliexpress-box-body aliexpress-campaign-popup-body">
        </div>

        <div class="aliexpress-box-footer aliexpress-box-footer-center">
          <button type="button" class="aliexpress-button aliexpress-run-campaign-button">
              <span class="aliexpress-loading-text"><?php esc_html_e( 'Run', Auto_Aliexpress::DOMAIN ); ?></span>
          </button>
        </div>

		<img src="<?php echo esc_url(AUTO_ALIEXPRESS_URL.'/assets/images/aliexpress.png'); ?>" class="aliexpress-image aliexpress-image-center" aria-hidden="true" alt="<?php esc_attr_e( 'Auto Aliexpress', Auto_Aliexpress::DOMAIN ); ?>">
</div>
