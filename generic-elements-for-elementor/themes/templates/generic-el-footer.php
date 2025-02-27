<?php

/**
 * The elementor way of footer file
 *
 * @package generic-elements
 * @since 1.0.3
 */

?>
        <?php do_action('generic_el_footer'); ?>
        <?php if ( get_option('generic_gsap_enable_option') == '1' ): ?>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php wp_footer(); ?>
</body>
</html>