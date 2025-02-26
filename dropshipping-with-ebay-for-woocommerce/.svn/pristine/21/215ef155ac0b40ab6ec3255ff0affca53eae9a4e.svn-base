<?php
$e2wl_shipping_html = '<div id="e2wl_to_country">' .
woocommerce_form_field('e2wl_to_country_field', array(
    'type' => 'select',
    'class' => array('chzn-drop'),
    'label' => __('Ship my order(s) to: ', 'dropshipping-with-ebay-for-woocommerce'),
    'placeholder' => __('Select a Country', 'dropshipping-with-ebay-for-woocommerce'),
    'options' => $countries,
    'default' => $default_country,
    'return' => true,
)
) .
    '</div>';
$e2wl_shipping_html = str_replace(array("\r", "\n"), '', $e2wl_shipping_html);
?>
<div class="e2wl_shipping">
</div>
<script id="e2wl_country_selector_html" type="text/html">
<?php echo $e2wl_shipping_html; ?>
</script>
<script>
jQuery(document).ready(function($){
window.e2wl_shipping_api.init_in_cart( $('#e2wl_country_selector_html').html());
});
</script>
