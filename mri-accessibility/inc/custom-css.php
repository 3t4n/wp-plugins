<?php
$org_hide_on_mobile = get_option('org_hide_on_mobile');
$org_custom_css     = get_option('org_custom_css');
if( $org_hide_on_mobile || $org_custom_css ): ?><style><?php endif; ?>
    <?php if( $org_hide_on_mobile ) : ?>
        @media only screen and (max-width: 480px) {div#wp_access_helper_container {display: none;}}
    <?php endif;
    if( $org_custom_css ) {
        echo $org_custom_css;
    } ?>
<?php if($org_hide_on_mobile || $org_custom_css): ?></style><?php endif; ?>
