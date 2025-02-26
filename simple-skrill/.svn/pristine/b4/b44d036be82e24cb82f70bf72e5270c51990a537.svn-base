<?php
/*
  Plugin Name: Simple Skrill
  Plugin URI: http://www.wpsalad.com/
  Description: Add a Moneybookers / Skrill buy now button easily in any post or page using shortcode
  Version: 1.0
  Author: WP Salad
  Author URI: http://www.wpsalad.com/
 */
?>
<?php
add_shortcode('skrill', 'ws_simple_skrill');

function ws_simple_skrill($att, $content = null) {
    extract(shortcode_atts(array(
                "merchant" => '',
                "language" => 'FR',
                "amount" => '10',
                "currency" => 'GBP',
                "description" => '',
                "text" => '',
                "confirmation" => '',
                "button" => 'Pay Now',
                    ), $att));

    $merchant = "{$merchant}";
    $language = "{$language}";
    $amount = "{$amount}";
    $currency = "{$currency}";
    $description = "{$description}";
    $text = "{$text}";
    $confirmation = "{$confirmation}";
    $button = "{$button}";
    ?>
    <form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
        <input type="hidden" name="pay_to_email" value="<?php echo $merchant; ?>">
        <input type="hidden" name="language" value="<?php echo $language; ?>">
        <input type="hidden" name="amount" value="<?php echo $amount; ?>">
        <input type="hidden" name="currency" value="<?php echo $currency; ?>">
        <input type="hidden" name="detail1_description" value="<?php echo $description; ?>">
        <input type="hidden" name="detail1_text" value="<?php echo $text; ?>">
        <input type="hidden" name="confirmation_note" value="<?php echo $confirmation; ?>">
        <input type="submit" value="<?php echo $button; ?>">
    </form>
    <?php
}
?>