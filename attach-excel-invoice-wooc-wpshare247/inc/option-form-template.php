<?php 
$WPSHARE247_CLASS_Aeiwooc = WPSHARE247_CLASS_Aeiwooc;
$is_pro = $WPSHARE247_CLASS_Aeiwooc::is_pro();
?>
<div id="wle-libs-admin" class="wrap wle-options">
    <div id="poststuff" class="basic-admin wle-options-area">
        <div class="postbox-container">
            <div class="meta-box-sortables ui-sortable">
                <div class="postbox remove-border">
                    <div id="welcome-panel_bk">
                        <div class="welcome-panel-content">
                            <h2 class="hndle ui-sortable-handle fsz-tt"><?php _e("Configure to send an attached excel invoice file", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></h2>
                            <div class="content">
                                <div class="inside">
                                	<?php $lang_code = get_locale(); ?>
                                    <form method="post" action="options.php" class="form-theme-options">
                                        <?php settings_fields( $WPSHARE247_CLASS_Aeiwooc::FIELDS_GROUP ); ?>
                                        <?php do_settings_sections( $WPSHARE247_CLASS_Aeiwooc::FIELDS_GROUP ); ?>
                                        <div class="in-form">
                                        	<?php 
											if(!$WPSHARE247_CLASS_Aeiwooc::is_woocommerce_active()){
												 _e("Only works when the Woocommerce plugin is activated", WPSHARE247_AEIWOOC_TEXTDOMAIN);
											}else{
												if(!$WPSHARE247_CLASS_Aeiwooc::is_pro()){
													require_once WPSHARE247_AEIWOOC_PLUGIN_INC_DIR . '/tabs/message.php'; 
												}
												?>
												<nav id="WPSHARE247_AEIWOOC_tab" class="nav-tab-wrapper woo-nav-tab-wrapper is_AEIWOOC_tab">
													<a href="#tab_pro_general" class="nav-tab nav-tab-active"><?php _e("General", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></a>
													<a href="#tab_pro_setting" class="nav-tab"><?php _e("Pro setting", WPSHARE247_AEIWOOC_TEXTDOMAIN); ?></a>
												</nav>
												<?php 
												require_once WPSHARE247_AEIWOOC_PLUGIN_INC_DIR . '/tabs/tab_pro_setting.php';
												require_once WPSHARE247_AEIWOOC_PLUGIN_INC_DIR . '/tabs/tab_pro_general.php'; 
												?>
												
												<?php submit_button(); ?>
                                            <?php 
											}
											?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>