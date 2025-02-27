<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists('EsoFeatureCustomPalette') ) {

    final class EsoFeatureCustomPalette {

        public static function add_script() {
            // global $echelon_so;
            $palette = json_encode(array_values(EsoHelpers::get_palette_colors()));
            ?>
            <?php if ( wp_script_is( 'wp-color-picker', 'enqueued' ) ) : ?>
                <script type="text/javascript">
                (function($) {
                    $(document).ready(function() {
                        $.wp.wpColorPicker.prototype.options = {
                            width: 240,
                            mode: 'hsv',
                            palettes: <?php echo $palette; ?>,
                            hide: true
                        };
                    });
                })(jQuery)
                </script>
            <?php endif; ?>
            <?php
        }

    }

}
