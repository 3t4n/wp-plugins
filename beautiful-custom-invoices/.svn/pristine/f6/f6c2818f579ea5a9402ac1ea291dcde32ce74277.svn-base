<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    BCI
 * @subpackage BCI/admin/partials
 */

$frontUrl = plugins_url('beautiful-custom-invoices') . '/serverless-invoices/dist';
$parts = parse_url($frontUrl);

$data = [
    'api_url' => rest_url() . 'wp/v2/',
    'front_url' => $parts['path'],
    'nonce' => wp_create_nonce('wp_rest')
];
?>

<iframe src="<?php echo esc_url($data['front_url']) ?>"
        frameborder="0"
        class="wordpress-invoices-plugin-iframe"
        name='<?php echo esc_attr(json_encode($data)) ?>'
>
</iframe>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
