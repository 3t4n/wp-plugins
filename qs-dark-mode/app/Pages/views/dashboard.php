
<div class="qs-dark-mode-dashboard-container wrap">

    <div id="qs-dark-mode-adpage-tabs" class="qs-dark-mode-adpage-tabs">

        <div class="qs-dark-mode-nav-wrapper">
          
        <ul>
               
               <li class="qs-dark-mode-component">
                   <a href="#qs-dark-mode-adpage-tabs-2">
                       <div class="icon"><img src="<?php echo esc_url(QS_DARK_MODE_IMG.'/dashboard/dark-icon-1.svg'); ?>" alt=""></div>
                       <h3><?php echo esc_html__('General','qs-dark-mode'); ?></h3>
                       <span><?php echo esc_html__('primary settings','qs-dark-mode'); ?></span>
                   </a>
               </li>
               <li class="qs-dark-mode-modules">
                   <a href="#qs-dark-mode-adpage-tabs-4">
                       <div class="icon"><img src="<?php echo esc_url(QS_DARK_MODE_IMG.'/dashboard/dark-icon-2.svg'); ?>" alt=""></div>
                       <h3><?php echo esc_html__('Switch','qs-dark-mode'); ?></h3>
                       <span><?php echo esc_html__('Control button style','qs-dark-mode'); ?></span>
                   </a>
               </li> 
               
                <li class="qs-dark-mode-preset">
                   <a href="#qs-dark-mode-adpage-tabs-5">
                       <div class="icon"><img src="<?php echo esc_url(QS_DARK_MODE_IMG.'/dashboard/dark-icon-3.svg'); ?>" alt=""></div>
                       <h3><?php echo esc_html__('Preset','qs-dark-mode'); ?></h3>
                       <span><?php echo esc_html__('theme color','qs-dark-mode'); ?></span>
                   </a>
               </li>
               <li class="qs-dark-mode-custom-element">
                   <a href="#qs-dark-mode-adpage-tabs-6">
                       <div class="icon"><img src="<?php echo esc_url(QS_DARK_MODE_IMG.'/dashboard/dark-icon-4.svg'); ?>" alt=""></div>
                       <h3><?php echo esc_html__('Element','qs-dark-mode'); ?></h3>
                       <span><?php echo esc_html__('exclude include','qs-dark-mode'); ?></span>
                   </a>
               </li>

               <li class="qs-dark-mode-image-element">
                   <a href="#qs-dark-mode-adpage-tabs-9">
                       <div class="icon"><img src="<?php echo esc_url(QS_DARK_MODE_IMG.'/dashboard/dark-icon-4.svg'); ?>" alt=""></div>
                       <h3><?php echo esc_html__('Images','qs-dark-mode'); ?></h3>
                       <span><?php echo esc_html__('Image Swap','qs-dark-mode'); ?></span>
                   </a>
               </li>

               <li class="qs-dark-mode-custom-element">
                   <a href="#qs-dark-mode-adpage-tabs-7">
                       <div class="icon"><img src="<?php echo esc_url(QS_DARK_MODE_IMG.'/dashboard/dark-icon-5.svg'); ?>" alt=""></div>
                       <h3><?php echo esc_html__('Css','qs-dark-mode'); ?></h3>
                       <span><?php echo esc_html__('use custom css','qs-dark-mode'); ?></span>
                   </a>
               </li>
               <li class="qs-dark-mode-custom-element">
                   <a href="#qs-dark-mode-adpage-tabs-8">
                       <div class="icon"><img src="<?php echo esc_url(QS_DARK_MODE_IMG.'/dashboard/dark-icon-6.svg'); ?>" alt=""></div>
                       <h3><?php echo esc_html__('Advanced ','qs-dark-mode'); ?></h3>
                       <span><?php echo esc_html__('Optional settings','qs-dark-mode'); ?></span>
                   </a>
               </li>
             
           </ul>
            
            <?php
                $installed_plugins = array_keys( get_plugins() );
              
                if ( in_array('qs-dark-mode-pro/qs-dark-mode-pro.php',$installed_plugins) || in_array('qs-dark-mode-pro-bundle/qs-dark-mode-pro-bundle.php',$installed_plugins) ) { ?>

                <?php }else{ ?>
                <div class="qs-dark-mode-go-pro-btn">
                    <a target="_blank" href="<?php echo esc_url(QS_DARK_MODE_DEMO_URL); ?>">
                        <i class="dashicons dashicons-awards"></i>
                        <h3><?php echo esc_html__('Go Pro','qs-dark-mode'); ?></h3>
                    </a>
                </div>
            <?php } ?>
        </div>
     

        <div id="qs-dark-mode-adpage-tabs-2" class="qs-dark-mode-adpage-tab-content qs-dark-mode-components components">
            <form id="qs-dark-mode-admin-component-form" class="qs-dark-mode-gen-options-action quomodo-component-data" action="<?php echo admin_url('admin-post.php') ?>" method="post">
                <div class="quomodo-container-wrapper">
                    <div class="quomodo-row-wrapper">
                        <div class="qs-dark-mode-component-form-wrapper components">
                            <div class="qs-dark-mode-components-topbar">
                                <div class="qs-dark-mode-title">
                                    <h3 class="title">
                                        <div class="icon">
                                            <img src="<?php echo esc_url(QS_DARK_MODE_IMG.'/dashboard/dark-icon-1.svg'); ?>" alt="">
                                        </div>
                                        <?php echo esc_html__( 'General Settings','qs-dark-mode' ) ?>
                                        
                                    </h3>
                                </div>
                                <div class="qs-dark-mode-savechanges">
                                 
                                    <div class="qs-dark-mode-admin-button">
                                        <button type="submit" class="qs-dark-mode-component-submit button qs-dark-mode-submit-btn">
                                            <i class="dashicons dashicons-yes"></i>
                                            <?php echo esc_html__('Save Change','qs-dark-mode'); ?>
                                         </button>
                                    </div>

                                </div>
                            </div>
                        
                                <?php $general_settings = $this->generel_dm_options(); ?>

                                <?php if( is_array( $general_settings ) ): ?>
                                    <?php foreach($general_settings as $item_key => $item): ?>

                                        
                                        <div id="qs-<?php echo $item_key; ?>" class="qs-dark-mode-block-row qs-dark-mode-component-row">
                                            <div class="qs-dark-mode-col qs-dark-mode-block-col-lg-6 qs-dark-mode-block-col-md-8">
                                                
                                                <?php if( $item['type'] == 'text' ): ?>
                                                    <div class="qs-dark-mode-switch-wrapper">
                                                        <div class="qs-dark-mode-option-header qs-dark-mode-text-option-container-<?php echo $item_key ?>">
                                                            <h3 class="qs-dark-mode-option-heading"> <?php echo esc_html( $item[ 'lavel' ] ); ?> </h3>
                                                        </div>
                                                        <div class="qs-dark-mode-text-wrapper qs-dark-mode-advanced-option-container-<?php echo $item_key ?>">
                                                            <div class="qs-dark-mode-text-inner-wrapper"> 
                                                                <input type="text" name="qsf_dark_mode_general_options[<?php echo esc_attr( $item_key ); ?>]" class="qs-dark-mode-text-option" value="<?php echo trim(esc_html(isset($item['value']) && $item['value'] !=''?$item['value']:'')); ?>" />
                                                                <?php if(isset($item['help'])): ?>
                                                                    <p><?php echo esc_html($item['help']); ?></p>
                                                                <?php endif; ?>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                <div class="quomodo_switch_common qs-dark-mode-common <?php echo esc_attr($item['is_pro']?'qs-dark-mode-pro qs-dark-mode-dash-modal-open-btn':''); ?>">
                                                    <div class="quomodo_sm_switch">
                                                        <a href="<?php echo esc_url($item['demo_link']); ?>" class="qs-dark-mode-data-tooltip"><?php echo esc_html__('View Demo','qs-dark-mode'); ?></a>
                                                        <strong><?php echo esc_html($item['lavel']); ?>
                                                            <?php if($item['is_pro']): ?>
                                                                <span> <?php echo esc_html__( 'PRO', 'qs-dark-mode' ) ?> </span>
                                                            <?php endif; ?>    
                                                        </strong>
                                                        <input <?php echo esc_attr($item['is_pro']?'readonly disabled':''); ?> <?php echo esc_attr($item['default']==1?'checked':''); ?> name="qsf_dark_mode_general_options[<?php echo esc_attr($item_key); ?>]" class="quomodo_switch <?php echo esc_attr($item_key); ?>" id="quomodo-dark-mode-gen-option-<?php echo esc_attr($item_key); ?>" type="checkbox">
                                                        <label for="quomodo-dark-mode-gen-option-<?php echo esc_attr($item_key); ?>"></label>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                <?php endif; ?>

                            
                        </div>
                        <input type="hidden" name="action" value="qs_dark_mode_general_option">
                        <?php echo wp_nonce_field('qs_dark_mode_general_option', '_qs_dark_mode_general_option'); ?>
                    </div>
                    <div class="qs-dark-mode-shortcode-area">
                      <input id="qs-dark-mode-shortcode-content" type="text" value='[qs-dark-mode]'>
                      <a href="javascript:void(0)" class="qs-shortcode-copy-button"> <?php echo esc_html__('Copy','qs-dark-mode'); ?> </a>     
                    </div>
                 
                </div> <!-- container end -->
            </form>
        </div>
        <div id="qs-dark-mode-adpage-tabs-4" class="qs-dark-mode-adpage-tab-content qs-dark-mode-swicth qs-dm-swicth">
            <form class="qs-dark-mode-switch-action quomodo-switch-settings-data" action="<?php echo admin_url('admin-post.php') ?>" method="post">
                <div class="quomodo-container-wrapper">
                    <div class="quomodo-row-wrapper">
                        <div class="qs-dark-mode-modules-form-wrapper qs-dark-mode-swicth-style">
                            <div class="qs-dark-mode-components-topbar">
                                <div class="qs-dark-mode-title">
                                    <h3 class="title">
                                        <div class="icon">
                                            <img src="<?php echo esc_url(QS_DARK_MODE_IMG.'/dashboard/dark-icon-2.svg'); ?>" alt="">
                                        </div>
                                        <?php echo esc_html__( 'Switch Style', 'qs-dark-mode' ) ?> 
                                    </h3>
                                </div>
                                <div class="qs-dark-mode-savechanges">
                               
                                    <div class="qs-dark-mode-admin-button">
                                        <button type="submit" class="qs-dark-mode-component-submit button qs-dark-mode-submit-btn">
                                            <i class="dashicons dashicons-yes"></i>
                                            <?php echo esc_html__('Save Change','qs-dark-mode'); ?>
                                         </button>
                                    </div>

                                </div>
                            </div>
                            
                            <?php include_once('option-part/switch.php'); ?> 
                            
                        </div>
                        <input type="hidden" name="action" value="qs_dark_mode_switch_style_options">
                        <?php echo wp_nonce_field('qs_dark_mode_switch_style', '_qs_dark_mode_switch_style_options'); ?>
                    </div>
                </div> <!-- container end -->
            </form>
        </div>
        <div id="qs-dark-mode-adpage-tabs-5" class="qs-dark-mode-adpage-tab-content qs-dark-mode-swicth qs-dm-preset">
            <form class="qs-dark-mode-switch-action quomodo-switch-settings-data" action="<?php echo admin_url('admin-post.php') ?>" method="post">
                <div class="quomodo-container-wrapper">
                    <div class="quomodo-row-wrapper">
                        <div class="qs-dark-mode-modules-form-wrapper qs-dark-mode-preset-style">
                            <div class="qs-dark-mode-components-topbar">
                                <div class="qs-dark-mode-title">
                                    <h3 class="title">
                                        <div class="icon">
                                            <img src="<?php echo esc_url(QS_DARK_MODE_IMG.'/dashboard/dark-icon-3.svg'); ?>" alt="">
                                        </div>
                                        <?php echo esc_html__( 'Theme Preset Color', 'qs-dark-mode' ) ?> 
                                    </h3>
                                </div>
                                <div class="qs-dark-mode-savechanges">
                               
                                    <div class="qs-dark-mode-admin-button">
                                        <button type="submit" class="qs-dark-mode-component-submit button qs-dark-mode-submit-btn">
                                            <i class="dashicons dashicons-yes"></i>
                                            <?php echo esc_html__('Save Change','qs-dark-mode'); ?>
                                         </button>
                                    </div>

                                </div>
                            </div>
                            
                            <?php include_once('option-part/color-preset.php'); ?> 
                            
                        </div>
                        <input type="hidden" name="action" value="qs_dark_mode_theme_preset_options">
                        <?php echo wp_nonce_field('qs_dark_mode_theme_preset', '_qs_dark_mode_theme_preset_options'); ?>
                    </div>
                </div> <!-- container end -->
            </form>
        </div>

        <div id="qs-dark-mode-adpage-tabs-6" class="qs-dark-mode-adpage-tab-content qs-dark-mode-swicth qs-dm-custom-selector">
            <form class="qs-dark-mode-switch-action quomodo-switch-settings-data" action="<?php echo admin_url('admin-post.php') ?>" method="post">
                <div class="quomodo-container-wrapper">
                    <div class="quomodo-row-wrapper">
                        <div class="qs-dark-mode-modules-form-wrapper qs-dark-mode-preset-style">
                            <div class="qs-dark-mode-components-topbar">
                                <div class="qs-dark-mode-title">
                                    <h3 class="title">
                                        <div class="icon">
                                            <img src="<?php echo esc_url(QS_DARK_MODE_IMG.'/dashboard/dark-icon-4.svg'); ?>" alt="">
                                        </div>
                                        <?php echo esc_html__( 'Elements Include', 'qs-dark-mode' ) ?> 
                                    </h3>
                                </div>
                                <div class="qs-dark-mode-savechanges">
                               
                                    <div class="qs-dark-mode-admin-button">
                                        <button type="submit" class="qs-dark-mode-component-submit button qs-dark-mode-submit-btn">
                                            <i class="dashicons dashicons-yes"></i>
                                            <?php echo esc_html__('Save Change','qs-dark-mode'); ?>
                                         </button>
                                    </div>

                                </div>
                            </div>
                            
                            <?php include_once('option-part/custom-element.php'); ?> 
                            
                        </div>
                        <input type="hidden" name="action" value="qs_dark_mode_custom_element_options">
                        <?php echo wp_nonce_field('qs_dark_mode_custom_element_option', '_qs_dark_mode_custom_element_options'); ?>
                    </div>
                </div> <!-- container end -->
            </form>
        </div>
        <div id="qs-dark-mode-adpage-tabs-7" class="qs-dark-mode-adpage-tab-content qs-dark-mode-swicth qs-dm-custom-selector">
            <form class="qs-dark-mode-switch-action quomodo-switch-settings-data" action="<?php echo esc_url(admin_url('admin-post.php')) ?>" method="post">
                <div class="quomodo-container-wrapper">
                    <div class="quomodo-row-wrapper">
                        <div class="qs-dark-mode-modules-form-wrapper qs-dark-mode-custom-css">
                            <div class="qs-dark-mode-components-topbar">
                                <div class="qs-dark-mode-title">
                                    <h3 class="title">
                                        <div class="icon">
                                            <img src="<?php echo esc_url(QS_DARK_MODE_IMG.'/dashboard/dark-icon-5.svg'); ?>" alt="">
                                        </div>
                                        <?php echo esc_html__( 'Custom css', 'qs-dark-mode' ) ?> 
                                    </h3>
                                </div>
                                <div class="qs-dark-mode-savechanges">
                               
                                    <div class="qs-dark-mode-admin-button">
                                        <button type="submit" class="qs-dark-mode-component-submit button qs-dark-mode-submit-btn">
                                            <i class="dashicons dashicons-yes"></i>
                                            <?php echo esc_html__('Save Change','qs-dark-mode'); ?>
                                         </button>
                                    </div>

                                </div>
                            </div>
                            
                            <?php include_once('option-part/custom-css.php'); ?> 
                            
                        </div>
                        <input type="hidden" name="action" value="qs_dark_mode_custom_css_options">
                        <?php echo wp_nonce_field('qs_dark_mode_custom_css_option', '_qs_dark_mode_custom_css_options'); ?>
                    </div>
                </div> <!-- container end -->
            </form>
        </div>
        <div id="qs-dark-mode-adpage-tabs-8" class="qs-dark-mode-adpage-tab-content qs-dark-mode-advanced-settings qs-dm-advanced-settings">
            <form class="qs-dark-mode-advanced-action quomodo-advanced-settings-data" action="<?php echo admin_url('admin-post.php') ?>" method="post">
                <div class="quomodo-container-wrapper">
                    <div class="quomodo-row-wrapper">
                        <div class="qs-dark-mode-modules-form-wrapper qs-dark-mode-advanced-settings">
                            <div class="qs-dark-mode-components-topbar">
                                <div class="qs-dark-mode-title">
                                    <h3 class="title">
                                        <div class="icon">
                                            <img src="<?php echo esc_url(QS_DARK_MODE_IMG.'/dashboard/dark-icon-6.svg'); ?>" alt="">
                                        </div>
                                        <?php echo esc_html__( 'Advanced Settings', 'qs-dark-mode' ) ?> 
                                    </h3>
                                </div>
                                <div class="qs-dark-mode-savechanges">
                               
                                    <div class="qs-dark-mode-admin-button">
                                        <button type="submit" class="qs-dark-mode-component-submit button qs-dark-mode-submit-btn">
                                            <i class="dashicons dashicons-yes"></i>
                                            <?php echo esc_html__('Save Change','qs-dark-mode'); ?>
                                         </button>
                                    </div>

                                </div>
                            </div>
                            
                            <?php include_once('option-part/advanced.php'); ?> 
                            
                        </div>
                        <input type="hidden" name="action" value="qs_dark_mode_advanced_options">
                        <?php echo wp_nonce_field('qs_dark_mode_advanced_option', '_qs_dark_mode_advanced_options'); ?>
                    </div>
                </div> <!-- container end -->
            </form>
        </div>

        <div id="qs-dark-mode-adpage-tabs-9" class="qs-dark-mode-adpage-tab-content qs-dark-mode-image-swaps qs-dm-image-swap-gen">
            <form class="qs-dark-mode-advanced-action quomodo-advanced-settings-data" action="<?php echo admin_url('admin-post.php') ?>" method="post">
                <div class="quomodo-container-wrapper">
                    <div class="quomodo-row-wrapper">
                        <div class="qs-dark-mode-modules-form-wrapper qs-dark-mode-advanced-settings">
                            <div class="qs-dark-mode-components-topbar">
                                <div class="qs-dark-mode-title">
                                    <h3 class="title">
                                        <div class="icon">
                                            <img src="<?php echo esc_url(QS_DARK_MODE_IMG.'/dashboard/dark-icon-6.svg'); ?>" alt="">
                                        </div>
                                        <?php echo esc_html__( 'Image Swap Settings', 'qs-dark-mode' ) ?> 
                                    </h3>
                                </div>
                                <div class="qs-dark-mode-savechanges">
                               
                                    <div class="qs-dark-mode-admin-button">
                                        <button type="submit" class="qs-dark-mode-component-submit button qs-dark-mode-submit-btn">
                                            <i class="dashicons dashicons-yes"></i>
                                            <?php echo esc_html__('Save Change','qs-dark-mode'); ?>
                                         </button>
                                    </div>

                                </div>
                            </div>
                            
                            <?php include_once('option-part/images.php'); ?> 
                            
                        </div>
                        <input type="hidden" name="action" value="qs_dark_mode_swap_images_options">
                        <?php echo wp_nonce_field('qsf_dark_mode_swap_images_options', '_qsf_dark_mode_swap_images_options'); ?>
                    </div>
                </div> <!-- container end -->
            </form>
        </div>
       
    </div>

</div>

<div id="qs-dark-mode-modal-body" class="qs-dark-mode-modal">
    <div class="qs-dark-mode-modal-content">
        <div class="qs-dark-mode-modal-body">
            <span class="close qs-dark-mode-modal-close">&times;</span>
            <div class="qs-dark-mode-content">
                <a class="qs-dark-mode-modal-link" href="<?php echo esc_url(QS_DARK_MODE_DEMO_URL); ?>"> <?php echo esc_html__('GO PRO','qs-dark-mode'); ?> </a>
                <img class="qs-dark-mode-modal-img" src="<?php echo esc_url(QS_DARK_MODE_IMG.'/main_logo.svg'); ?>" alt="<?php echo esc_attr__('GO PRO','qs-dark-mode'); ?>">
                <div class="qs-dark-mode-modal-text">
                    <p> <?php echo esc_html__( 'To get this feature please purchase the PRO version.
VALUE you will get with the Pro', 'qs-dark-mode' ); ?> </p>
                    <ul>
                        <li><a href="<?php echo esc_url(QS_DARK_MODE_DEMO_URL); ?>"><?php echo esc_html__( 'Schedule Dark mode', 'qs-dark-mode' ); ?></a></li>
                        <li><a href="<?php echo esc_url(QS_DARK_MODE_DEMO_URL); ?>"><?php echo esc_html__( 'More Switch Design', 'qs-dark-mode' ); ?></a></li>
                        <li><a href="<?php echo esc_url(QS_DARK_MODE_DEMO_URL); ?>"><?php echo esc_html__( 'Custom Switch Color', 'qs-dark-mode' ); ?></a></li>
                        <li><a href="<?php echo esc_url(QS_DARK_MODE_DEMO_URL); ?>"><?php echo esc_html__( 'More Theme Color Presets', 'qs-dark-mode' ); ?></a></li>
                        <li><a href="<?php echo esc_url(QS_DARK_MODE_DEMO_URL); ?>"><?php echo esc_html__( 'Custom Theme Color', 'qs-dark-mode' ); ?></a></li>
                        <li><a href="<?php echo esc_url(QS_DARK_MODE_DEMO_URL); ?>"><?php echo esc_html__( 'Exclude Dark Mode in Specific Page', 'qs-dark-mode' ); ?></a></li>
                        <li><a href="<?php echo esc_url(QS_DARK_MODE_DEMO_URL); ?>"><?php echo esc_html__( 'Exclude Custom css in Specific Page', 'qs-dark-mode' ); ?></a></li>
                        <li><a href="<?php echo esc_url(QS_DARK_MODE_DEMO_URL); ?>"><?php echo esc_html__( 'DashBoard Color Scheme', 'qs-dark-mode' ); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


