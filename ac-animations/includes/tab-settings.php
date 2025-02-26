<?php

function acanimations_tab_settings() {
    ?>
    <h2>Configure the Animations</h2>
    <p class="description">
        Define which elements would need to be animated on load and on scroll.
        <br>All public pages will be animated.
    </p>
    <form method="post" action="options.php">
        <?php
        settings_fields('acanimations_settings_group');
        do_settings_sections('acanimations_settings_group');

        $optionLocations = get_option('acanimations_load_location');
        // add space, for correct search of ' p' or ' a'
        $optionElements = ' ' . get_option('acanimations_elements'); // contains long list of selectors: h1, img, p
        $optionNavigation = get_option('acanimations_navigation');
        $animation_style = get_option('acanimations_style');

        $license = get_option('acanimations_license_key');
        $is_valid = acanimations_is_license_valid($license);
        ?>
        <table class="form-table">
            <!-- Elements to animate -->
            <!-- New field: Animation Style -->
            <tr valign="top">
                <th scope="row">Animation Style</th>
                <td>
                    <select name="acanimations_style">
                        <option value="slide_up" <?php selected($animation_style, 'slide_up'); ?>>Slide Up</option>
                        <option value="slide_down" <?php selected($animation_style, 'slide_down'); ?>>Slide Down</option>
                        <option value="slide_left" <?php selected($animation_style, 'slide_left'); ?>>Slide Left</option>
                        <option value="slide_right" <?php selected($animation_style, 'slide_right'); ?>>Slide Right</option>
                        <option value="zoomIn" <?php selected($animation_style, 'zoomIn'); ?>>Zoom In</option>
                        <option value="zoomOut" <?php selected($animation_style, 'zoomOut'); ?>>Zoom Out</option>
                        <option value="rotateX" <?php selected($animation_style, 'rotateX'); ?>>Rotate X</option>
                        <option value="rotateY" <?php selected($animation_style, 'rotateY'); ?>>Rotate Y</option>
                        <option value="fadeIn" <?php selected($animation_style, 'fadeIn'); ?>>Fade In</option>
                    </select>
                    <p class="description">
                        Choose the perfect animation style to transform your website elements. Each style is thoughtfully crafted to enhance your site’s flow, draw user attention, and encourage deeper engagement — while maintaining a sleek, professional look. Rest assured, all animations are designed to avoid being distracting or annoying, keeping your user experience seamless.
                    </p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    Animate Elements
                    <?php
                    if ($is_valid) :?>
                    <br><button class="check-all" type="button" onclick="acanimationsToggleAll()">Select All</button>
                    <?php endif;
                    ?>
                </th>
                <?php if (!$is_valid) : ?>
                <td>
                    <label>
                        <input type="radio" name="acanimations_elements" value="h1, h2, img" <?php echo esc_attr(acanimations_get_checked_if_contains($optionElements, 'h1, h2, img')); ?>>
                        Main Headings & Images (h1, h2, img)
                    </label>
                    <label>
                        <input type="radio" name="acanimations_elements" value="h3, h4, h5, h6, img" <?php echo esc_attr(acanimations_get_checked_if_contains($optionElements, 'h3, h4, h5, h6, img')); ?>>
                        Subheadings & Images (h3-h6, img)
                    </label>
                    <label>
                        <input type="radio" name="acanimations_elements" value="p, img" <?php echo esc_attr(acanimations_get_checked_if_contains($optionElements, 'p, img')); ?>>
                        Text & Images (p, img)
                    </label>
                    <label>
                        <input type="radio" name="acanimations_elements" value="button, input, select, textarea, label" <?php echo esc_attr(acanimations_get_checked_if_contains($optionElements, 'button, input, select, textarea, label')); ?>>
                        Forms (button, input, select, textarea, label)
                    </label>
                    <label>
                        <input disabled type="radio" name="acanimations_elements" value="forms" <?php echo esc_attr(acanimations_get_checked_if_contains($optionElements, 'forms')); ?>>
                        Links (a) [Requires License]
                    </label>
                    <label>
                        <input disabled type="radio" name="acanimations_elements" value="other" <?php echo esc_attr(acanimations_get_checked_if_contains($optionElements, 'other')); ?>>
                        Other text (li, span, label, strong, etc.) [Requires License]
                    </label>
                    <label>
                        <input disabled type="radio" name="acanimations_elements" value="other" <?php echo esc_attr(acanimations_get_checked_if_contains($optionElements, 'other')); ?>>
                        Video, Canvas [Requires License]
                    </label>
                    <p class="description">Choose which elements would be animated. You can combine and customize Elements with a License.</p>
                </td>

                <?php else : ?>
                <td>
                    <label>
                        <input type="checkbox" name="ac_elem_checkbox" value="h1, h2, h3, h4, h5, h6" <?php echo esc_attr(acanimations_get_checked_if_contains($optionElements, 'h1, h2, h3, h4, h5, h6')); ?>>
                        Headers (h1, h2, h3, h4, h5, h6)
                    </label>
                    <label>
                        <input type="checkbox" name="ac_elem_checkbox" value="img, svg" <?php echo esc_attr(acanimations_get_checked_if_contains($optionElements, 'img, svg')); ?>>
                        Images (img, svg)
                    </label>
                    <label>
                        <input type="checkbox" name="ac_elem_checkbox" value="p" <?php echo esc_attr(acanimations_get_checked_if_contains($optionElements, ' p')); ?>>
                        Paragraphs (p)
                    </label>
                    <label>
                        <input type="checkbox" name="ac_elem_checkbox" value="button" <?php echo esc_attr(acanimations_get_checked_if_contains($optionElements, 'button')); ?>>
                        Buttons (button)
                    </label>
                    <label>
                        <input type="checkbox" name="ac_elem_checkbox" value="a" <?php echo esc_attr(acanimations_get_checked_if_contains($optionElements, ' a')); ?>>
                        Links (a)
                    </label>
                    <label>
                        <input type="checkbox" name="ac_elem_checkbox" value="input, select, textarea" <?php echo esc_attr(acanimations_get_checked_if_contains($optionElements, 'input, select, textarea')); ?>>
                        Form elements (input, select, textarea)
                    </label>
                    <label>
                        <input type="checkbox" name="ac_elem_checkbox" value="li" <?php echo esc_attr(acanimations_get_checked_if_contains($optionElements, ' li')); ?>>
                        List items (li)
                    </label>
                    <label>
                        <input type="checkbox" name="ac_elem_checkbox" value="label" <?php echo esc_attr(acanimations_get_checked_if_contains($optionElements, 'label')); ?>>
                        Labels (label)
                    </label>
                    <label>
                        <input type="checkbox" name="ac_elem_checkbox" value="blockquote" <?php echo esc_attr(acanimations_get_checked_if_contains($optionElements, 'blockquote')); ?>>
                        Blockquotes (blockquote)
                    </label>
                    <label>
                        <input type="checkbox" name="ac_elem_checkbox" value="strong, em, b, i" <?php echo esc_attr(acanimations_get_checked_if_contains($optionElements, 'strong, em, b, i')); ?>>
                        Italic, Bold (strong, em, b, i)
                    </label>
                    <label>
                        <input type="checkbox" name="ac_elem_checkbox" value="span" <?php echo esc_attr(acanimations_get_checked_if_contains($optionElements, 'span')); ?>>
                        Spans (span)
                    </label>
                    <label>
                        <input type="checkbox" name="ac_elem_checkbox" value="canvas" <?php echo esc_attr(acanimations_get_checked_if_contains($optionElements, 'canvas')); ?>>
                        Canvas
                    </label>
                    <label>
                        <input type="checkbox" name="ac_elem_checkbox" value="video" <?php echo esc_attr(acanimations_get_checked_if_contains($optionElements, 'video')); ?>>
                        Video
                    </label>
                    <p class="description">
                        Define which elements would be animated. You can select multiple Elements or type your own selectors below.
                        <br>You can also specify `div` elements with specific classes (like `div.animate-me`), ids (like `div#custom-id`) or any other <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_selectors" target="_blank">CSS selector</a>.
                    </p>
                    <label>
                        <textarea class="acanimations-elements" name="acanimations_elements"><?php echo esc_textarea($optionElements);?></textarea>
                    </label>
                    <p class="description">
                        If you typed your own Elements Selector, make sure to check if it's working correctly. See dev tools Console for more info.
                    </p>
                </td>
                <?php endif;?>
            </tr>

            <!-- Page navigation -->
            <tr valign="top">
                <th scope="row">Page Navigation</th>
                <td>
                    <label><input type="radio" name="acanimations_navigation" value="loading" <?php checked($optionNavigation, 'loading'); ?>> Loading animation</label>
                    <label><input type="radio" name="acanimations_navigation" value="none" <?php checked($optionNavigation, 'none'); ?>> Do nothing</label>
                    <p class="description">Give your users smooth loading animations during website navigation. Helps keep user's attention, while he waits for the next page to load.
                        <br>Loader colors are automatically calculated based on page text.
                    </p>
                </td>
            </tr>

            <!-- Load script location -->
            <tr valign="top">
                <th scope="row">Load Script in</th>
                <td>
                    <label>
                        <input type="radio" name="acanimations_load_location" value="head" <?php checked($optionLocations, 'head'); ?>>
                        Head (with `defer`)
                    </label>
                    <label>
                        <input type="radio" name="acanimations_load_location" value="body" <?php checked($optionLocations, 'body'); ?>>
                        End of Body (with `async`)
                    </label>
                    <p class="description">
                        When Head is selected, script will be loaded with `defer` attribute, meaning load asyncroniously and execute once the parsing complete.
                        <br>When End of Body is selected, script will be loaded with `async` attribute, meaning load asyncroniously and execute immediately.
                        <br>Both options won't slow your page load. Some websites might have other scripts which can slow down page parsing or add elements later.
                    </p>
                </td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>

    <?php
}
