 <?php
    /**
     * this file is included to manage affiliate manager admin dashboard content page
     *
     * @since    1.0.0
     */	
  ?>

<input type="hidden" id="ciwcamp-active-data" value="<?php esc_attr_e(get_option('ciwcamp-active-tab'),'ciwcamp-affliate-manager' ); ?>">
<div class="ciwcamp-admin-dashboard">
  <header>
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar ciwcamp-primary-color">
      <div class="container-fluid" style="">
        <a class="navbar-brand waves-effect" href="" target="_blank">
          <strong class="text-white font-weight-bold"><?php esc_html_e( 'Affiliate Manager Prime for Woocommerce Lite ','ciwcamp-affliate-manager' ); ?></strong>
        </a>
        <div class="d-flex justify-content-center">
          <a href="http://docs.codexinfra.com/docs/woocommerce-affiliate-manager-prime/overview/"  class="ciwcamp_btn_navbar btn-sm" title="<?php esc_attr_e('Documentation','ciwcamp-affliate-manager' ); ?>">
          <span class="dashicons dashicons-format-aside text-blue"></span>
          <a href="https://newaccount1607855618258.freshdesk.com/support/tickets/new"  class="ciwcamp_btn_navbar btn-sm" title="<?php esc_attr_e('Support','ciwcamp-affliate-manager' ); ?>">
          <span class="dashicons dashicons-sos text-blue"></span>
          <a href="http://ci-demo.codexinfra.com/woocommerce-affiliate-manager-prime/wcamp/my-account/"  class="ciwcamp_btn_navbar btn-sm" title="<?php esc_attr_e('Live Preview','ciwcamp-affliate-manager' );?> ">
          <span class="dashicons dashicons-video-alt text-blue"></span></a>
          <a href="#"  class="ciwcamp_btn_navbar btn-sm ciwcamp-pro-icon-btn" title="<?php esc_attr_e('Logout','ciwcamp-affliate-manager' ); ?>">
          <img class="ciwcamp-pro-icon" src = "<?php  echo esc_attr(CIWCAMP_PLUGIN_URL.'/admin/image/crowns.svg'); ?>" ></a>
          <a href="<?php  esc_attr_e(wp_logout_url(wp_login_url()),'ciwcamp-affliate-manager' ); ?>"  class="ciwcamp_btn_navbar btn-sm" title="<?php esc_attr_e('Logout','ciwcamp-affliate-manager' ); ?>">
          <span class="dashicons dashicons-migrate text-blue"></span></a>
        </div>
      </div>
    </nav>
  </header>
  <div class="row no-gutters">
    <div class="col-3 col-md-3">
      <div class="sidebar-fixed position-fixed ml-n4">
        <div class="list-group list-group-flush ciwcamp-mt mt-4 " >
        <ul class="nav nav-tabs">
					<li>
            <a href="ciwcamp-dashboard" data-toggle="tab" class="list-group-item waves-effect ciwcamp-menu-btn" id="ciwcamp-dashboard-btn">
            <span class="dashicons dashicons-dashboard"></span><?php esc_html_e( ' Dashboard','ciwcamp-affliate-manager' ); ?>
            </a>
          </li>
          <li>
            <a href="ciwcamp-affiliates" data-toggle="tab" class="list-group-item list-group-item-action waves-effect ciwcamp-menu-btn" id="ciwcamp-affiliates-btn">
            <span class="dashicons dashicons-buddicons-buddypress-logo"></span><?php esc_html_e( ' Affiliates','ciwcamp-affliate-manager' ); ?></a>
          </li>

          <li>
            <a href="ciwcamp-withdraw" data-toggle="tab" class="list-group-item list-group-item-action waves-effect ciwcamp-menu-btn" id="ciwcamp-withdraw-btn">
            <span class="dashicons dashicons-editor-paste-word"></span><?php esc_html_e( ' Withdraw','ciwcamp-affliate-manager ' ); ?></a>
          </li>

          <li>
            <a href="ciwcamp-sales" data-toggle="tab" class="list-group-item list-group-item-action waves-effect ciwcamp-menu-btn" id="ciwcamp-sales-btn">
            <span class="dashicons dashicons-chart-area"></span><?php esc_html_e( ' Sales','ciwcamp-affliate-manager' ); ?></a>
          </li>

          <li>
            <a href="ciwcamp-commission" data-toggle="tab" class="list-group-item list-group-item-action waves-effect ciwcamp-menu-btn" id="ciwcamp-commission-btn">
            <span class="dashicons dashicons-money-alt"></span> <?php esc_html_e( 'Commissions','ciwcamp-affliate-manager' ); ?></a>
          </li>
      
          <li>
            <a href="ciwcamp-payments" data-toggle="tab" class="list-group-item list-group-item-action waves-effect ciwcamp-menu-btn" id="ciwcamp-payments-btn">
            <span class="dashicons dashicons-money"></span> <?php esc_html_e( ' Payment','ciwcamp-affliate-manager' ); ?></a>
          </li>

          <li>
            <a href="ciwcamp-settings" data-toggle="tab" class="list-group-item list-group-item-action waves-effect ciwcamp-menu-btn" id="ciwcamp-settings-btn">
            <span class="dashicons dashicons-admin-generic"></span> <?php esc_html_e( ' Settings','ciwcamp-affliate-manager' ); ?></a>
         </li>

         <li>
            <a href="ciwcamp-pro" data-toggle="tab" class="list-group-item list-group-item-action waves-effect ciwcamp-menu-btn" id="ciwcamp-pro-btn">
            <img class="ciwcamp-pro-icon mr-1" src = "<?php echo esc_attr(CIWCAMP_PLUGIN_URL.'/admin/image/crowns.svg'); ?>" ><?php esc_html_e( ' Pro Version','ciwcamp-affliate-manager' ); ?></a>
         </li>

        </ul>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-8" id="ciwcamp-admin-page">

      <div id="ciwcamp-dashboard" class="tab-pane ciwcamp-hide-description">
        <?php include_once CIWCAMP_PLUGIN_DIR.'admin/partials/ciwcamp-affiliate-dashboard.php'; ?>
      </div>

      <div id="ciwcamp-affiliates" class="tab-pane ciwcamp-hide-description">
        <?php include_once CIWCAMP_PLUGIN_DIR.'admin/partials/ciwcamp-affiliates.php'; ?>
      </div>

      <div id="ciwcamp-withdraw" class="tab-pane ciwcamp-hide-description">
        <?php include_once CIWCAMP_PLUGIN_DIR.'admin/partials/ciwcamp-affiliates-withdraw.php'; ?>
      </div>

      <div id="ciwcamp-sales" class="tab-pane ciwcamp-hide-description">
        <?php include_once CIWCAMP_PLUGIN_DIR.'admin/partials/ciwcamp-affiliates-sales.php'; ?>
      </div>

      <div id="ciwcamp-commission" class="tab-pane ciwcamp-hide-description">
        <?php include_once CIWCAMP_PLUGIN_DIR.'admin/partials/ciwcamp-comman-commission.php'; ?>
      </div>

      <div id="ciwcamp-payments" class="tab-pane ciwcamp-hide-description">
        <?php include_once CIWCAMP_PLUGIN_DIR.'admin/partials/ciwcamp-payments.php'; ?>
      </div>

      <div id="ciwcamp-settings" class="tab-pane ciwcamp-hide-description">
        <?php include_once CIWCAMP_PLUGIN_DIR.'admin/partials/ciwcamp-affiliates-settings.php'; ?>
      </div>

      <div id="ciwcamp-pro" class="tab-pane ciwcamp-hide-description">
        <?php include_once CIWCAMP_PLUGIN_DIR.'admin/partials/ciwcamp-pro.php'; ?>
      </div>

      <div id="ciwcamp-affiliate-details" class="tab-pane ciwcamp-hide-description">
        <?php include_once CIWCAMP_PLUGIN_DIR.'admin/partials/ciwcamp-affiliates-details.php'; ?>
      0.</div>
    </div>
  </div>
</div>
