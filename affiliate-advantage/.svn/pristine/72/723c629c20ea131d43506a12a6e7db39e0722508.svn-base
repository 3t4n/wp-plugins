<?php settings_errors(); ?>

<div class="wrap">

    <nav class="nav-tab-wrapper">
        <a href="/wp-admin/edit.php?post_type=<?php echo esc_attr( \Level_Wp\Affiliate_Advantage\Plugin::get_instance()->cpt ) ?>&page=settings" class="nav-tab <?php if( $tab == 'settings' ) : ?>nav-tab-active<?php endif; ?>">Link Settings</a>
<!--        <a href="/wp-admin/edit.php?post_type=--><?php //echo \Level_Wp\Affiliate_Advantage\Plugin::get_instance()->cpt ?><!--&page=settings&tab=tools" class="nav-tab --><?php //if( $tab =='tools' ):?><!--nav-tab-active--><?php //endif; ?><!--">Tools</a>-->
        <a href="/wp-admin/edit.php?post_type=<?php echo esc_attr( \Level_Wp\Affiliate_Advantage\Plugin::get_instance()->cpt ) ?>&page=settings&tab=guide" class="nav-tab <?php if( $tab =='guide' ):?>nav-tab-active<?php endif; ?>">User Guide</a>
    </nav>

    <div class="tab-content">
		<?php switch($tab) :
			case 'settings': ?>
                    <form action="options.php" method="post">
                        <?php
                        settings_fields( 'links' );
                        do_settings_sections( 'links' );
                        submit_button( 'Save Settings' );
                        ?>
                    </form>
				<?php break;
			case 'guide':
                \Level_Wp\Affiliate_Advantage\Helpers\View::render( 'pages.guide' );
				break;
            case 'tools':
                \Level_Wp\Affiliate_Advantage\Helpers\View::render( 'settings.tools' );
				break;
		endswitch; ?>
    </div>



</div>
