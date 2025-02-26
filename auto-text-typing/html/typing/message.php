<?php
$melibuPluginTypingPadding = get_option('padding');
$melibuPluginTypingPaddingOut = 0;
if (isset($melibuPluginTypingPadding) && !empty($melibuPluginTypingPadding)) {
    $melibuPluginTypingPaddingOut = $melibuPluginTypingPadding;
}
$melibuPluginTypingBorderRadius = get_option('border-radius');
$melibuPluginTypingBorderRadiusOut = 0;
if (isset($melibuPluginTypingBorderRadius) && !empty($melibuPluginTypingBorderRadius)) {
    $melibuPluginTypingBorderRadiusOut = $melibuPluginTypingBorderRadius;
}
$melibuPluginTypingBorderWidth = get_option('border-width');
$melibuPluginTypingBorderWidthOut = 0;
if (isset($melibuPluginTypingBorderWidth) && !empty($melibuPluginTypingBorderWidth)) {
    $melibuPluginTypingBorderWidthOut = $melibuPluginTypingBorderWidth;
}
?>
<form method="post" action="options.php">
    <?php settings_fields('melibu-plugin-typing-group'); ?>

    <p><?php _e('Background Color', 'auto-text-typing'); ?></p>
    <input class="melibu-plugin-typing-color-bgc" name="background-color" type="text" value="<?php echo get_option('background-color'); ?>" data-default-color="#ffffff" />

    <p><?php _e('Text Color & Border Color', 'auto-text-typing'); ?></p>
    <input class="melibu-plugin-typing-color-txt" name="text-color" type="text" value="<?php echo get_option('text-color'); ?>" data-default-color="#000000" />

    <div class="melibu-plugin-typing-colorpicker-txt"></div>
    <div class="melibu-plugin-typing-colorpicker-bgc"></div>

    <p>
        <label><?php _e('Padding', 'auto-text-typing'); ?></label>
        <input type="range" value="<?php echo $melibuPluginTypingPaddingOut; ?>" name="padding" min="0" class="melibu-plugin-typing-padding"> 
        <input type="text" class="melibu-plugin-typing-padding-out" value="<?php echo get_option('padding'); ?>"><br />
    </p>
    <p>
        <label><?php _e('Border Radius', 'auto-text-typing'); ?></label>
        <input type="range" value="<?php echo $melibuPluginTypingBorderRadiusOut; ?>" name="border-radius" min="0" class="melibu-plugin-typing-border-radius"> 
        <input type="text" class="melibu-plugin-typing-border-radius-out" value="<?php echo get_option('border-radius'); ?>"><br />
    </p>
    <p>
        <label><?php _e('Border Width', 'auto-text-typing'); ?></label>
        <input type="range" value="<?php echo $melibuPluginTypingBorderWidthOut; ?>" name="border-width" min="0" class="melibu-plugin-typing-border-width"> 
        <input type="text" class="melibu-plugin-typing-border-width-out" value="<?php echo get_option('border-width'); ?>">
    </p>
    <label><?php _e('Border Style', 'auto-text-typing'); ?></label>
    <select name="border-style" class="melibu-plugin-typing-border-style">
        <option>
            none
        </option>
        <option>
            dotted
        </option>
        <option>
            dotted solid
        </option>
        <option>
            dotted double
        </option>
        <option>
            dotted dashed
        </option>
        <option>
            dashed
        </option>
        <option>
            dashed solid
        </option>
        <option>
            dashed double
        </option>
        <option>
            dashed dotted
        </option>
        <option>
            dashed groove
        </option>
        <option>
            solid
        </option>
        <option>
            solid dashed
        </option>
        <option>
            solid double
        </option>
        <option>
            solid dotted
        </option>
        <option>
            solid groove
        </option>
        <option>
            double
        </option>
        <option>
            double solid
        </option>
        <option>
            double dashed
        </option>
        <option>
            double dotted
        </option>
        <option>
            double groove
        </option>
        <option>
            groove
        </option>
        <option>
            ridge
        </option>
        <option>
            inset
        </option>
        <option>
            outset
        </option>
    </select>
    <p>
        <label><?php _e('Description', 'auto-text-typing'); ?></label>
        <textarea name="message" 
                  class="melibu_textarea"><?php echo get_option('message'); ?></textarea>

    </p>
    <p>
        <label><?php _e('Copyright', 'auto-text-typing'); ?></label>
        <input type="checkbox" value="1" name="copyright" <?php echo (get_option('copyright') != 0 ? 'checked="checked"' : ''); ?> class="melibu-plugin-typing-border-width"> 
    </p>
    <?php _e('You can use these HTML tags', 'auto-text-typing'); ?>: <code>p, ul, li, a, h1,h2,h3,h4,h5,h6, small, code</code> 
    <?php _e('if you use another pass that is shot out your theme / website', 'auto-text-typing'); ?>
    <p>
        <input type="submit" 
               value="<?php _e('Save', 'auto-text-typing'); ?>" 
               class="button-primary" />
    </p>
    <?php wp_nonce_field('melibu-plugin-typing-nonce-action', 'melibu-plugin-typing-nonce'); ?>
</form>
