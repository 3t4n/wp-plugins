<?php
if( !function_exists('_add_my_quicktags') ){
    function _add_my_quicktags()
    { ?>
        <script type="text/javascript">
        /* Add custom Quicktag buttons to the editor Wordpress ver. 3.3 and above only
         *
         * Params for this are:
         * - Button HTML ID (required)
         * - Button display, value="" attribute (required)
         * - Opening Tag (required)
         * - Closing Tag (required)
         * - Access key, accesskey="" attribute for the button (optional)
         * - Title, title="" attribute (optional)
         * - Priority/position on bar, 1-9 = first, 11-19 = second, 21-29 = third, etc. (optional)
         */
        QTags.addButton( 'h1_title', 'h1', '<h1>', '</h1>' );
        QTags.addButton( 'h2_title', 'h2', '<h2>', '</h2>' );
        QTags.addButton( 'h3_title', 'h3', '<h3>', '</h3>' );
        QTags.addButton( 'h4_title', 'h4', '<h4>', '</h4>' );
        QTags.addButton( 'h5_title', 'h5', '<h5>', '</h5>' );
        QTags.addButton( 'h6_title', 'h6', '<h6>', '</h6>' );
        QTags.addButton( 'pre_code', 'pre', '<pre>', '</pre>' );
        QTags.addButton( 'blockquote', '[quote]', '[quote style="center"]', '[/quote]' );
        QTags.addButton( 'button', '[button]', '[button url="#" target="_blank" style="blue" size="small"]', '[/button]' );
        QTags.addButton( 'alert', '[alert]', '[alert style="white"]', '[/alert]' );
        QTags.addButton( 'align', '[align]', '[alignleft]', '[/alignleft]' );
        QTags.addButton( 'twocolumn', '[two_column]', '[one_two]', '[/one_two]' );
        QTags.addButton( 'twocolumnlast', '[two_column_last]', '[one_two_last]', '[/one_two_last]' );
        QTags.addButton( 'threecolumn', '[three_column]', '[one_three]', '[/one_three]' );
        QTags.addButton( 'threecolumnlast', '[three_column_last]', '[one_three_last]', '[/one_three_last]' );
        QTags.addButton( 'fourcolumn', '[four_column]', '[one_four]', '[/one_four]' );
        QTags.addButton( 'fourcolumnlast', '[four_column_last]', '[one_four_last]', '[/one_four_last]' );
        QTags.addButton( 'toggle', '[toggle]', '[toggle title="Title"]', '[/toggle]' );
        QTags.addButton( 'tab', '[tab]', '[tabs]', '[/tabs]' );
        QTags.addButton( 'tab_title', '[tab_title]', '[tab title="Tab 1"]', '[/tab]' );
        QTags.addButton( 'letter', '[letter]', '[letter style="circle"]', '[/letter]' );
        </script>
    <?php }
    // We can attach it to 'admin_print_footer_scripts' (for admin-only) or 'wp_footer' (for front-end only)
    add_action('admin_print_footer_scripts',  '_add_my_quicktags');
}
?>