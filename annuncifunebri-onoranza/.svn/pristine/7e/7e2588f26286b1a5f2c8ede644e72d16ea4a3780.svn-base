<?php if (!defined('ABSPATH')) exit; ?>
<?php $ofc = false; ?>

<?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_custom-css.php') ?>

<?php $response = wp_remote_get(ANNFU_SITE_API . '/v2/annunci' . annfu_query_annunci(), ['sslverify' => false, 'timeout' => ANNFU_REMOTE_TIMEOUT]); ?>
<?php $r = json_decode(wp_remote_retrieve_body($response), true); ?>

<?php $template = get_annfu_template(); ?>
<?php if (file_exists(ANNFU_PLUGIN_PATH . 'templates/' . $template . '/_annunci.php')): ?>
    <?php include_once(ANNFU_PLUGIN_PATH . 'templates/' . $template . '/_annunci.php') ?>
<?php else: ?>
    <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_annunci.php') ?>
<?php endif; ?>
