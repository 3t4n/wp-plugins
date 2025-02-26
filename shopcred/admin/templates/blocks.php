<?php
/**
 * Admin Dashboard Blocks
 *
 * @package ShopCred
 */
?>

<div id="elements" class="spc-dashboard-tab">
    <div class="spc-row">
        <div class="spc-full-width">
            <div class="spc-element-filter">
                <div class="spc-element-filter-btn">
                    <ul>
                        <li>
                            <a href="" class="spc-element-enable"><?php echo __('Enable All', 'shopcred') ?></a>
                        </li>
                        <li>
                            <a href="" class="spc-element-disable"><?php echo __('Disable All', 'shopcred') ?></a>
                        </li>
                    </ul>
                </div>
                <div class="spc-element-filter-text">
                    <div class="exed-element-filter-dropdown">
                        <span class="exed-element-filter-dropdown-shape">
                            <svg width="18" height="9" viewBox="0 0 18 9" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.5 8a.5.5 0 010 1h-7a.5.5 0 010-1h7zm3-4a.5.5 0 010 1h-13a.5.5 0 010-1h13zm2-4a.5.5 0 010 1H.5a.5.5 0 010-1h17z" fill="#D4D9E6" fillRule="evenodd"/>
                            </svg>
                        </span>
                        <select id="exed-element-filter-dropdown-option">
                            <option value="all"><?php echo __('All Blocks', 'shopcred') ?></option>
                            <option value="free"><?php echo __('Free', 'shopcred') ?></option>
                        </select>
                    </div>
                    <div class="spc-element-filter-search">
                        <input id="spc-element-filter-search-input" type="text" placeholder="<?php echo __('Search Block', 'shopcred') ?>">
                        <div class="spc-element-filter-search-icon">
                            <svg width="19" height="19" viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.075 3.075a7.5 7.5 0 0110.95 10.241l3.9 3.902a.5.5 0 01-.707.707l-3.9-3.901A7.5 7.5 0 013.074 3.075zm.707.707a6.5 6.5 0 109.193 9.193 6.5 6.5 0 00-9.193-9.193z" fill="#46D39A" fillRule="nonzero"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="spc-dashboard-checkbox-container">
                <?php ksort( ShopCred_Manager::$default_widgets ); ?>
                <?php foreach( ShopCred_Manager::$default_widgets as $key => $widget ) : ?>
                
                    <?php if ( isset( $key ) ) : ?>
                        <div class="spc-dashboard-checkbox <?php echo esc_attr( $widget['tags'] ); ?><?php echo ( $widget['is_pro'] ) ? ' inactive' : ' active'; ?>" 
                        data-tag="<?php echo esc_attr( $widget['tags'] ); ?>">
                            <?php if( true === $widget['is_pro'] ) { ?>
                                <div class="spc-dashboard-item-label">
                                    <span class="spc-el-label"><?php echo esc_html( $widget['tags'] ); ?></span>
                                </div>
                            <?php } ?>
                            <div class="spc-dashboard-checkbox-text">
                                <p class="spc-el-title"><?php echo esc_html( $widget['title'] ); ?></p>
                            </div>
                            <div class="spc-dashboard-checkbox-label">
                                <input class="spc-dashboard-input" type="checkbox" <?php echo ( $widget['is_pro'] ) ? 'disabled="disabled"' : ''; ?> 
                                id="<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( $key ); ?>" 
                                <?php ( $widget['is_pro'] ? '' : checked( 1, $this->get_dashboard_settings[$key], true ) ); ?>>
                                <label for="<?php echo esc_attr( $key ); ?>"></label>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div><!--./checkbox-container-->
        </div>
        
    </div>
</div>