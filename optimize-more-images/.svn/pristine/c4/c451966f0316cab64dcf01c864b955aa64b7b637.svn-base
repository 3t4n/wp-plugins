<?php
$views = array(
		"lazyload" => __('Lazyload'),
		"preload" => __('Preload'),
		"cdn" => __('CDN'),
		"extras" => __('Extra')
    );
?>

<div class="opm_img-plugin-wrapper">

    <div class="opm_img_header">
                <h1 class="opm_img_page_title"><?php echo esc_html(OPM_IMG_NAME); ?> <?php echo esc_html(OPM_IMG_PLUGIN_NAME); ?><span>v.<?php echo esc_html(OPM_IMG_VERSION); ?></span></h1>
            </div>
    <div class="opm_img_wrapper opm_img_wrapper">
        <div class="opm_img_messages">
            <?php do_action("opm_img_messages");?>
            <span></span>
        </div>
    	
    	<div class="opm_img-navigation navigation flex">
    	    
                <ul class="nav">
                    <?php
                    foreach($views as $slug => $view):
                    ?>
                    <li>
                        <a href="#tab-<?php echo esc_html( $slug ) ?>" data-tab="tab-<?php echo esc_html( $slug ) ?>" id="opm_img_tab-<?php echo esc_html( $slug ) ?>"<?php esc_html( $slug ) == 'lazyload' ? ' class="current"' : ''?>><?php _e($view, 'opm_img'); ?></a>
                    </li>
                    <?php
                    endforeach;
                    ?>
                    <?php do_action("opm_img_after_menu_tab"); ?>
                </ul>
                
                <ul class="mt-auto small-padding">
                    <li><a href="#tab-import-settings" data-tab="tab-import-settings" id="opm_img_tab_import-settings"><?php _e('Import Settings')?></a></li>
                    <li><a href="<?php echo esc_url(admin_url('admin.php?page=optimize-more=opm_img&opm_img-action=export')) ?>" class="opm_img-ignore"><?php _e('Export Settings') ?></a></li>
                    <li><a href="<?php echo esc_url(admin_url('admin.php?page=optimize-more=opm_img&opm_img-action=reset')) ?>" class="opm_img-ignore reset-confirm"><?php _e('Reset Plugin')?></a></li>
                </ul>
                
        </div>
    	
        <form method="post" enctype="multipart/form-data" class="opm_img-form" action="<?php echo opm_img()->admin_url(); ?>" >
            <?php wp_nonce_field('opm_img-settings-action', 'opm_img-settings_nonce'); ?>
            
            <div class="opm_img_content">
                <?php
                
                do_action("opm_img_before_body");
                
                foreach ($views as $slug => $view) :
                    print '<section class="tab-'. esc_html( $slug ) .'" id="'. esc_html( $slug ) .'">';
                    opm_img()->admin_view( 'parts/' . esc_html( $slug ));
                    print '</section>';
                endforeach;
                
                do_action("opm_img_after_body");
                ?>
            </div>
    		
    	<div class="opm_img-save-settings">
                    <input type="submit" value="<?php _e('Save Changes', 'opm_img') ?>" class="button button-primary button-large" name="opm_img-settings" />
        </div>
        </form>
        
        <div class="opm_img_sidebar">
            <?php opm_img()->admin_view('parts/partials/sidebar'); ?>
        </div>
        
    </div>

</div>
<?php
wp_enqueue_media();
