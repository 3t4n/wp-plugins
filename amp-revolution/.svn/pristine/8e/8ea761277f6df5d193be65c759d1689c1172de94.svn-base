<div class ="logoHeader">
<div class="logoAmp">
    <a href="<?php echo esc_url( $this->get( 'home_url' ) ); ?>">
        <amp-img src="<?php echo ARSCP_AMP_Revolution::get()->options->get_option_data('logo' , 'personalizator', ''); ?>" width="<?php echo ARSCP_AMP_Revolution::get()->options->get_option_data('logoWidth' , 'personalizator', ''); ?>" height="<?php echo ARSCP_AMP_Revolution::get()->options->get_option_data('logoHeight' , 'personalizator', ''); ?>" class="site-icon"></amp-img>
    </a>
</div>
</div>
<header id="#top" class="amp-wp-header">
    <div>
		<?php
		if( has_nav_menu( 'amp-header' ) ) {
			echo '<nav class="nav-header"><div class="mobile-open">&#9776; MENU </div>';
			wp_nav_menu( array( 'theme_location' => 'amp-header', 'container' => 'ul', 'depth' => 1 ) );
			echo '</nav>';
		}else{
			echo 'No Menu Selected';
		}
		?>
    </div>
</header>

<?php if( ARSCP_AMP_Revolution::get()->options->get_option_data('useAnalytics','integrator','off') == 'on'){

    require ARSCP_AMP_Revolution::get()->plugin_path . 'views/FrontEnd/analyticsCode.php';
    } ?>
