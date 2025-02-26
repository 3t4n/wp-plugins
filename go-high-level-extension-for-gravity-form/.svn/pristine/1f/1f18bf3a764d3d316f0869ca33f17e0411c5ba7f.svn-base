<?php
    $default_tab = null;
    $tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;
?>

<div class="wrap ghlfreemain-con">
    <div class="ghlfree-header">
        <!-- ghlfreelogo -->
        <div class="ghlfreelogo">
            <img src="<?php echo esc_url(plugin_dir_url(__DIR__).'/uploads/logo.png'); ?>"
                alt="GHLCONNECT-ghlfreelogo" />

        </div>

        <h1>Go high level (GHL) extension for Gravity Forms - Free</h1>
    </div>
    <div class="ghlfree-container">
        <div class="ghlfree-content">
            <div class="ghlfree-tabs">
                <!-- Here are our tabs -->
                <nav class="nav-tab-wrapper-vertical">
                    <a href="?page=ghl_for_gf" class="nav-tab <?php if($tab===null):?>nav-tab-active<?php endif; ?>">Our
                        Products</a>
                    <a href="?page=ghl_for_gf&tab=pro"
                        class="nav-tab <?php if($tab==='pro'):?>nav-tab-active<?php endif; ?>">Upgrade to PRO</a>
                    <a href="?page=ghl_for_gf&tab=cwghl"
                        class="nav-tab <?php if($tab==='cwghl'):?>nav-tab-active<?php endif; ?>">Connect
                        With
                        GHL</a>
                    <a href="?page=ghl_for_gf&tab=settings"
                        class="nav-tab <?php if($tab==='settings'):?>nav-tab-active<?php endif; ?>">Settings</a>
                    <a href="?page=ghl_for_gf&tab=global-settings"
                        class="nav-tab <?php if($tab==='global-settings'):?>nav-tab-active<?php endif; ?>">Global
                        Settings</a>
                    <a href="?page=ghl_for_gf&tab=help"
                        class="nav-tab <?php if($tab==='help'):?>nav-tab-active<?php endif; ?>">Help/Support</a>

                </nav>
            </div>
            <div class="ghlfreetab-content">
                <?php switch($tab) :
          case 'pro':
            
            if( file_exists( plugin_dir_path(__FILE__) . 'ghl-gf-extension-upgrade-to-premium.php' ) ) {
                require_once( plugin_dir_path(__FILE__) . 'ghl-gf-extension-upgrade-to-premium.php' );
            }
            break;  
          case 'settings':
            if( file_exists( plugin_dir_path(__FILE__).'ghl-gf-extension-global-tag.php' ) ) {
                require_once( plugin_dir_path(__FILE__).'ghl-gf-extension-global-tag.php' );
            }
            break;

            case 'global-settings':
                if( file_exists( plugin_dir_path(__FILE__).'ghl-gf-extension-global-settings.php' ) ) {
                    require_once( plugin_dir_path(__FILE__).'ghl-gf-extension-global-settings.php' );
                }
                break;

            case 'help':
                if( file_exists( plugin_dir_path(__FILE__).'ghl-gf-extension-help.php' ) ) {
                    require_once( plugin_dir_path(__FILE__).'ghl-gf-extension-help.php' );
                }
                break;
            case 'cwghl': 
                if( file_exists( plugin_dir_path(__FILE__).'ghl-gf-extension-connect-with-ghl.php' ) ) {
                            require_once( plugin_dir_path(__FILE__).'ghl-gf-extension-connect-with-ghl.php' );
                }
                break;
          default:
             if( file_exists( plugin_dir_path(__FILE__).'ghl-gf-extension-our-products.php' ) ) {
                    require_once( plugin_dir_path(__FILE__).'ghl-gf-extension-our-products.php' );
                }
            break;
        endswitch; ?>
            </div>
        </div>
    </div>
</div>