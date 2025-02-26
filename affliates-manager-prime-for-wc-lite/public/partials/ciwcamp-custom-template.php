<?php

    /**
     *  this file is included for custom template
     *
      * @since    1.0.0
    */	
 $ciwcamp_user_meta = get_user_meta(get_current_user_id(), "ciwcamp_affiliate_registration", true);
  if (is_user_logged_in()) 
  {
    if ($ciwcamp_user_meta == "Enable" || current_user_can( 'manage_options' )) 
    {
    ?>
    <head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php wp_head(); ?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php esc_html_e( 'Affiliate Dashboard','ciwcamp-affliate-manager' ); ?></title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
		</head>
  	<body class="">     
  		<div class="container-for-admin">
      
        <header>
         
          <nav class="navbar fixed-top navbar-expand-lg special-color-dark scrolling-navbar">
            <div class="container-fluid">
              <div class="navbar-wrapper">
                <a class="navbar-brand" href="javascript:;"><?php esc_html_e( 'Welcome to Affiliate Dashboard','ciwcamp-affliate-manager' ); ?></a>
              </div>
              <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only"><?php esc_html_e( 'Welcome to Affiliate Dashboard','ciwcamp-affliate-manager' ); ?>Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end">
                
                <ul class="navbar-nav ciwcamp-header">
                  <li class="nav-item dropdown ciwcamp-nav">
                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="material-icons"><?php echo esc_html( 'person'); ?></i>
                      <p class="d-lg-none d-md-block">
                      <?php esc_html_e( 'Account','ciwcamp-affliate-manager' ); ?>
                      </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                      <a class="dropdown-item" href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>" ><?php esc_html_e( 'My Account','ciwcamp-affliate-manager' ); ?></a>
                      <a class="dropdown-item" href="<?php echo esc_url(get_permalink( woocommerce_get_page_id( 'shop' ) )); ?>"><?php esc_html_e( 'Shop Page','ciwcamp-affliate-manager' ); ?></a>
                      <a class="dropdown-item" href="<?php echo esc_url(wc_get_cart_url()); ?>"><?php esc_html_e( 'Cart','ciwcamp-affliate-manager' ); ?></a>
                      <a class="dropdown-item" href="<?php echo esc_url(wc_get_checkout_url()); ?>"><?php esc_html_e( 'Checkout','ciwcamp-affliate-manager' ); ?></a>
                      <a class="dropdown-item" href="<?php echo esc_url(wp_logout_url(wp_login_url())); ?>"><?php esc_html_e( 'Logout','ciwcamp-affliate-manager' ); ?></a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
         

         
          <div class="sidebar-fixed position-fixed teal darken-3">
            <a class="logo-wrapper waves-effect text-center">
              <?php $ciwcamp_affiliate_id = get_current_user_id(); ?>
              <img class="mx-5" src="<?php echo esc_attr(get_avatar_url($ciwcamp_affiliate_id)); ?>" />
              <h3 class="text-white text-center"><?php esc_html_e(get_user_meta($ciwcamp_affiliate_id)['first_name'][0],'ciwcamp-affliate-manager');  ?></h3>
            </a>
            <div class="list-group list-group-flush mt-n4">
              <a href="#ciwcamp-dashboard" class="list-group-item list-group-item-action waves-effect" id="ciwcamp-dashboard-btn">
                <i class="fa fa-pie-chart mr-3"></i><?php esc_html_e( 'Dashboard','ciwcamp-affliate-manager' ); ?>
              </a>

              <a href="#ciwcamp-links" class="list-group-item list-group-item-action waves-effect" id="ciwcamp-links-btn">
                <i class="fa fa-link mr-3"></i></i><?php esc_html_e( 'Links','ciwcamp-affliate-manager' ); ?></a>

              <a href="#ciwcamp-sales" class="list-group-item list-group-item-action waves-effect" id="ciwcamp-sales-btn">
                <i class="fa fa-shopping-cart mr-3"></i><?php esc_html_e( 'Sales','ciwcamp-affliate-manager' ); ?></a>

              <a href="#ciwcamp-earnings" class="list-group-item list-group-item-action waves-effect" id="ciwcamp-earnings-btn">
              <i class="fa fa-money mr-3" aria-hidden="true"></i><?php esc_html_e( 'Earnings','ciwcamp-affliate-manager' ); ?></a>

              <a href="#ciwcamp-withdraw" class="list-group-item list-group-item-action waves-effect" id="ciwcamp-withdraw-btn">
                <i class="fa fa-credit-card mr-3"></i><?php esc_html_e( 'Withdraw','ciwcamp-affliate-manager' ); ?></a>

              <a href="#ciwcamp-profile" class="list-group-item list-group-item-action waves-effect" id="ciwcamp-profile-btn">
                <i class="fa fa-user mr-3"></i><?php esc_html_e( 'Profile','ciwcamp-affliate-manager' ); ?></a>
                
              <a href="<?php echo  esc_attr(esc_url(home_url('/'))); ?>" class="list-group-item list-group-item-action waves-effect">
              <i class="fa fa-home mr-3"></i> <?php esc_html_e( 'Home Page','ciwcamp-affliate-manager' ); ?></a>
            </div>
          </div>
          
        </header>
        
        <main class="pt-5 mx-lg-5">
          <div class="container-fluid mt-5">
            <div id="ciwcamp-dashboard" class="ciwcamp-affiliate-desc">
              <?php include_once CIWCAMP_PLUGIN_DIR.'public/partials/ciwcamp-affiliate-dashboard.php'; ?>
            </div>
            
            <div id="ciwcamp-links" class="ciwcamp-affiliate-desc">
              <?php include_once CIWCAMP_PLUGIN_DIR.'public/partials/ciwcamp-affiliate-links.php'; ?>
            </div>

            <div id="ciwcamp-sales" class="ciwcamp-affiliate-desc">
              <?php include_once CIWCAMP_PLUGIN_DIR.'public/partials/ciwcamp-affiliate-sales.php'; ?>
            </div>

            <div id="ciwcamp-earnings" class="ciwcamp-affiliate-desc">
              <?php include_once CIWCAMP_PLUGIN_DIR.'public/partials/ciwcamp-affiliate-earnings.php'; ?>
            </div>
            
            <div id="ciwcamp-withdraw" class="ciwcamp-affiliate-desc">
              <?php include_once CIWCAMP_PLUGIN_DIR.'public/partials/ciwcamp-affiliate-withdraw.php'; ?>
            </div>

            <div id="ciwcamp-profile" class="ciwcamp-affiliate-desc">
              <?php include_once CIWCAMP_PLUGIN_DIR.'public/partials/ciwcamp-affiliate-profile.php'; ?>
            </div>
          </div>
        </main>
      </div>
    </body>
    
    <footer>
      <?php wp_footer(); 
      $ciwcamp_affiliate_action_reasons = get_user_meta(get_current_user_id(), "ciwcamp_affiliate_action_reasons", true);
    }
    else if($ciwcamp_user_meta == "1")
    {  
      $ciwcamp_affiliate_pending_msz =   get_option("ciwcamp_affiliate_pending_msz");
      if($ciwcamp_affiliate_pending_msz)
      {
        esc_html_e($ciwcamp_affiliate_pending_msz);
        ?>
        <h4><a class='btn btn-primary' href="<?php esc_url_e(home_url()); ?>"><?php esc_html_e( 'Back to Home Page','ciwcamp-affliate-manager' ); ?></a></h4>
        <?php 
      }
      else
      {
        esc_html_e('Your request is under process');
        ?>
        <h4><a class='btn btn-primary' href="<?php esc_url_e(home_url()); ?>"><?php esc_html_e( 'Back to Home Page','ciwcamp-affliate-manager' ); ?></a></h4>
        <?php 
      }
    }
    else if($ciwcamp_user_meta == "Reject")
    {
      $ciwcamp_affiliate_pending_msz =   get_option("ciwcamp_affiliate_action_reasons");
      if($ciwcamp_affiliate_action_reasons)
      {
        esc_html_e($ciwcamp_affiliate_action_reasons);
        ?>
        <h4><a class='btn btn-primary' href="<?php esc_url_e(home_url()); ?>"><?php esc_html_e( 'Back to Home Page','ciwcamp-affliate-manager' ); ?></a></h4>
        <?php 
      }
      else if($ciwcamp_affiliate_pending_msz)
      {
        esc_html_e($ciwcamp_affiliate_pending_msz);
        ?>
        <h4><a class='btn btn-primary' href="<?php esc_url_e(home_url()); ?>"><?php esc_html_e( 'Back to Home Page','ciwcamp-affliate-manager' ); ?></a></h4>
        <?php
      }
      else
      {
        esc_html_e('Your affiliate request has been rejected');
      }
    }
    else if($ciwcamp_user_meta == "Disable")
    {
      $ciwcamp_affiliate_disable_msz =   get_option("ciwcamp_affiliate_disable_msz");
      if($ciwcamp_affiliate_action_reasons)
      {
        esc_html_e($ciwcamp_affiliate_action_reasons);
        ?>
        <h4><a class='btn btn-primary' href="<?php esc_url_e(home_url()); ?>"><?php esc_html_e( 'Back to Home Page','ciwcamp-affliate-manager' ); ?></a></h4>
        <?php 
      }
      else if($ciwcamp_affiliate_disable_msz)
      {
        esc_html_e($ciwcamp_affiliate_disable_msz);
        ?>
        <h4><a class='btn btn-primary' href="<?php eesc_url_e(home_url()); ?>"><?php esc_html_e( 'Back to Home Page','ciwcamp-affliate-manager' ); ?></a></h4>
        <?php
      }
      else
      {
        esc_html_e('Your affiliate account has been disabled');
      }
    }
    else if($ciwcamp_user_meta == "Banned")
    {
      $ciwcamp_affiliate_ban_msz =   get_option("ciwcamp_affiliate_ban_msz");
      if($ciwcamp_affiliate_action_reasons)
      {
        esc_url_e($ciwcamp_affiliate_action_reasons);
        ?>
        <h4><a class='btn btn-primary' href="<?php esc_url_e(home_url()); ?>"><?php esc_html_e( 'Back to Home Page','ciwcamp-affliate-manager' ); ?></a></h4>
        <?php 
      }
      else if($ciwcamp_affiliate_ban_msz)
      {
        esc_url_e($ciwcamp_affiliate_ban_msz);
        ?>
        <h4><a class='btn btn-primary' href="<?php esc_url_e(home_url()); ?>"><?php esc_html_e( 'Back to Home Page','ciwcamp-affliate-manager' ); ?></a></h4>
        <?php
      }
      else
      {
        esc_html_e('Your affiliate account has been banned','ciwcamp-affliate-manager');
      }
    }
    else
    {
      ?>
      <!DOCTYPE html>
      <html lang="en">
        <head>
          <?php wp_head(); ?>
        </head>
        <body class="ciwcamp_store_setup_body">
          <?php
          esc_html_e('Somthing is wrong! Please contact to admin','ciwcamp-affliate-manager');
          
          ?>
        <h4><a class='btn btn-primary' href="<?php esc_url_e(home_url()); ?>"><?php esc_html_e( 'Back to Home Page','ciwcamp-affliate-manager' ); ?></a></h4>
        <?php
          while (have_posts()) :
              the_post();
              the_content();
          endwhile;  
          ?>
        </body>
      </html>
      <footer>
        <?php wp_footer();
    }
  } 
  else 
  {
    $ciwcamp_link = get_permalink(get_option('woocommerce_myaccount_page_id'));
    header("Location:" . $ciwcamp_link);
  } 
  ?>
  </footer>
