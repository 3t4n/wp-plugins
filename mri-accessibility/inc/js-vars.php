<?php
    $role_links_setup = get_option('org_role_links_setup');
    $remove_link_titles = get_option('org_remove_link_titles');
    $header_element_selector = get_option('org_header_element_selector');
    $sidebar_element_selector = get_option('org_sidebar_element_selector');
    $footer_element_selector = get_option('org_footer_element_selector');
    $main_element_selector = get_option('org_main_element_selector');
    $nav_element_selector = get_option('org_nav_element_selector');
    $lights_off_selector = get_option('org_lights_selector');
    $orgi = isset($_GET['orgi']) ? sanitize_text_field(base64_decode($_GET['orgi'])) : '';
    $orgl = isset($_GET['orgl']) ? sanitize_text_field(base64_decode($_GET['orgl'])) : '';
?>

<script type="text/javascript">
    <?php if($role_links_setup): ?>var roleLink = 1;<?php endif; ?>
    <?php if($remove_link_titles): ?>var removeLinkTitles = 1;<?php endif; ?>
    <?php if($header_element_selector):?>var headerElementSelector = '<?php echo $header_element_selector; ?>';<?php endif; ?>
    <?php if($sidebar_element_selector):?>var sidebarElementSelector = '<?php echo $sidebar_element_selector; ?>';<?php endif; ?>
    <?php if($footer_element_selector):?>var footerElementSelector = '<?php echo $footer_element_selector; ?>';<?php endif; ?>
    <?php if($main_element_selector):?>var mainElementSelector = '<?php echo $main_element_selector; ?>';<?php endif; ?>
    <?php if($nav_element_selector):?>var navElementSelector = '<?php echo $nav_element_selector; ?>';<?php endif; ?>
    <?php if($orgi): ?>var org_target_src = '<?php echo $orgi; ?>';<?php endif; ?>
    <?php if($orgl): ?>var org_target_link = '<?php echo $orgl; ?>';<?php endif; ?>
    <?php if($lights_off_selector): ?>var org_lights_off_selector = '<?php echo $lights_off_selector; ?>';<?php endif; ?>
</script>
