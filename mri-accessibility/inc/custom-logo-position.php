<?php
    $org_custom_logo_position = get_option('org_custom_logo_position');
    if($org_custom_logo_position) :
        $org_logo_top    = get_option('org_logo_top');
        $org_logo_right  = get_option('org_logo_right');
        $org_logo_left   = get_option('org_logo_left');
        $org_logo_bottom = get_option('org_logo_bottom');
?>
    <style media="screen" type="text/css">
        body #wp_access_helper_container button.aicon_link {
            <?php if($org_logo_top): ?>top:<?php echo $org_logo_top; ?>px !important;<?php endif; ?>
            <?php if($org_logo_right): ?>right:<?php echo $org_logo_right; ?>px !important;<?php endif; ?>
            <?php if($org_logo_left): ?>left:<?php echo $org_logo_left; ?>px !important;<?php endif; ?>
            <?php if($org_logo_bottom): ?>bottom:<?php echo $org_logo_bottom; ?>px !important;<?php endif; ?>
        }
    </style>
<?php endif; ?>
