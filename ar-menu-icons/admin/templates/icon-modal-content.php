<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="col-left">
    <div class="inner-wrapper">
        <form action="" onsubmit="return false" id="armicn_settings_form">
            <div class="icon-source-wrapper">
                <select id="armicn_source_select" name="icon_source" data-menu_item_id="">
                    <option value="dashicon">Dashicons</option>
                    <option value="fontawesome">Fontawesome</option>
                    <option value="themify">Themify</option>
                    <option value="elegant">Elegant</option>
                    <option value="fontello">Fontello</option>
                    <option value="generic">Generic</option>
                    <option value="foundation">Foundation</option>
                    <option value="elusive">Elusive</option>
                    <option value="themify">Themify</option>
                    <option value="custom">Custom</option>
                </select>
                <select id="armicn_variation_select" name="armicn_variation" style="display:none">
                    <option value="solid">Solid</option>
                    <option value="regular">Regular</option>
                    <option value="brands">Brand</option>
                </select>
                <input type="search" name="armicon_search_icon" class="armicon_search_icon" id="armicon_search_icon" placeholder="Search here">
                <input type="hidden" name="icon" value="" class="saved-icon">
            </div>
            
            
            <div class="tabs">
                
                    <div class="icon-tab-contents-wrapper">
                        <div class="icon-tab-content active">
                            <div class="armicn_icons-selection-wrapper">
                               
                            </div>
                        </div>
                    </div>
                
            </div>
            
        </form>
    </div>
</div>

<div class="col-right">
    <div class="inner-wrapper">
        <h3><?php esc_html_e('Settings & Styles', 'ar-menu-icons'); ?></h3>
        <form action="" onsubmit="return false" id="armicn_items_css">
            <div class="armicn-option-inputs">
                <ul class="armicn-option-input-list">
                    <li>
                        <div class="option-label"><?php esc_html_e('Color:', 'ar-menu-icons'); ?></div>
                        <div class="option-inputs">
                            <label>
                                <div class="color-selector">
                                    <input type="wpcolor" name="icon_color" value="">
                                </div>
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="option-label"><?php esc_html_e('Size:', 'ar-menu-icons'); ?></div>
                        <div class="option-inputs">
                            <label>
                                <input type="text" name="icon_font_size" value="" placeholder="14px">
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="option-label"><?php esc_html_e('Spacing:', 'ar-menu-icons'); ?></div>
                        <div class="option-inputs">
                            <div class="multi-inputs">
                                <label>
                                    <span><?php esc_html_e('Left', 'ar-menu-icons'); ?></span>
                                    <input type="text" name="icon_margin_left" value="" placeholder="4px">
                                </label>
                                <label>
                                    <span><?php esc_html_e('Right', 'ar-menu-icons'); ?></span>
                                    <input type="text" name="icon_margin_right" value="" placeholder="4px">
                                </label>
                                <label>
                                    <span><?php esc_html_e('Top', 'ar-menu-icons'); ?></span>
                                    <input type="text" name="icon_margin_top" value="" placeholder="4px">
                                </label>
                                <label>
                                    <span><?php esc_html_e('Bottom', 'ar-menu-icons'); ?></span>
                                    <input type="text" name="icon_margin_bottom" value="" placeholder="4px">
                                </label>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="option-label"><?php esc_html_e('Position:', 'ar-menu-icons'); ?></div>
                        <div class="option-inputs">
                            <label>
                                <select name="icon_position" id="icon_position_select">
                                    <option value=""><?php esc_html_e('Default', 'ar-menu-icons'); ?></option>
                                    <option value="left"><?php esc_html_e('Left', 'ar-menu-icons'); ?></option>
                                    <option value="right"><?php esc_html_e('Right', 'ar-menu-icons'); ?></option>
                                </select>
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
        </form>
    </div>
</div>
