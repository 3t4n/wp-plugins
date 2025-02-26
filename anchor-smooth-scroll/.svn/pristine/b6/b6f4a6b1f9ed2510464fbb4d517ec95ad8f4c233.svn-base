<?php

if ( ! defined('WPINC')) {
    die;
}

use  SmoothScroll\Admin\Settings;

?>
<table class="form-table">
    <tbody>
    <tr>
        <th scope="row"><?php _e('Offset','anchor-smooth-scroll') ?></th>
        <td>
            <input type="text"  name="<?=Settings::OPTIONS?>[offset]" value="<?php echo esc_attr( $offset ) ?>" />
            <span>px</span>
            <p class="description" id="menu-height-description"><?php _e('Offset scroll-to position by x amount of pixels (positive or negative) or by selector (e.g. #navigation-menu)','anchor-smooth-scroll') ?></p>
        </td>
    </tr>
    <tr>
        <th scope="row"><?php _e('Scroll duration','anchor-smooth-scroll') ?></th>
        <td>
            <input type="number" min="0" step="1" name="<?=Settings::OPTIONS?>[scroll_duration]" value="<?php echo esc_attr( $scroll_duration ) ?>" />
            <span><?php _e('milliseconds','anchor-smooth-scroll') ?></span>
            <p class="description" id="menu-height-description"><?php _e('Scroll animation duration (i.e. scrolling speed) in milliseconds (1000 milliseconds equal 1 second)','anchor-smooth-scroll') ?></p>
        </td>
    </tr>
    <tr>
        <th scope="row"><?php _e('Add your own anchor links','anchor-smooth-scroll') ?></th>
        <td>
            <input type="text" name="<?=Settings::OPTIONS?>[custom_anchor_selector]" value="<?php echo esc_attr( $custom_anchor_selector ) ?>" />
            <p class="description">
                <?php _e('Css selector (e.g. ".my-custom-anchor" or ".my-anchor, .btn:not(.btn-popup)" without quotes)','anchor-smooth-scroll') ?>
            </p>
        </td>
    </tr>
    <tr>
        <th scope="row"><?php _e('Theme Conflict settings','anchor-smooth-scroll') ?></th>
        <td>
            <p>


                <label>
                    <input name="<?php echo Settings::OPTIONS; ?>[disable_theme_scroll]" type="radio" value="disableThemeMenuAnchors" <?php checked('disableThemeMenuAnchors', $disable_theme_scroll); ?>>
                    <?php
                    _e('Prevent other scripts from handling anchors (if possible)', 'anchor-smooth-scroll');
                    ?>
                </label>
                <br>
                <label>
                    <input name="<?php echo Settings::OPTIONS; ?>[disable_theme_scroll]" type="radio"
                           value="none" <?php checked('none', $disable_theme_scroll); ?>>
                    <?php
                    _e('None', 'anchor-smooth-scroll');
                    ?>
                </label>
                    <p class="description" >
                        <?php _e('Plugin will not detach events from menu links','anchor-smooth-scroll') ?>
                    </p>

                <label>
                    <input name="<?php echo Settings::OPTIONS; ?>[disable_theme_scroll]" type="radio" value="onlyReload" <?php checked('onlyReload', $disable_theme_scroll); ?>>
                    <?php
                    _e('Only on load', 'anchor-smooth-scroll');
                    ?>
                </label>
                    <p class="description" >
                        <?php _e('Plugin will work only for opened URL with anchor (e.g. https://site.com/#contacts). Anchors itself will keep default theme behaviour','anchor-smooth-scroll') ?>
                    </p>

            </p>
        </td>
    </tr>


    <tr>
        <th scope="row"><?php _e('Remove menu anchor item highlight','anchor-smooth-scroll') ?></th>

        <td>
            <label>
                <input type="checkbox" name="<?php echo Settings::OPTIONS; ?>[remove_anchor_highlight]" value="1" <?php checked(true, $remove_anchor_highlight); ?>>
                <?php
                _e('Remove', 'anchor-smooth-scroll');
                ?>
            </label>
            <p class="description">
                <?php _e('WP by default marking all anchors in menu on current page as active. This option is disabling that. Literally it removes "current-menu-item" and "current_page_item" html classes from anchor menu items.','anchor-smooth-scroll') ?>
            </p>
        </td>
    </tr>

    </tbody>
</table>
