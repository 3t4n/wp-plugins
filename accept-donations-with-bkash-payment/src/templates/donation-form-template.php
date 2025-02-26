<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>

<div class="bkash-donation-form-container">
    <h2>Donation Form</h2>
    <p>Make your contribution to support the cause. Select a donation amount or enter a custom amount below.</p>
    <form id="bkash-donation-form">
        <div class="donation-amount-options">
            <label>
                <input type="radio" name="donation_amount" value="100" />
                100 ৳
            </label>
            <label>
                <input type="radio" name="donation_amount" value="1000" />
                1000 ৳
            </label>
            <label>
                <input type="radio" name="donation_amount" value="5000" />
                5000 ৳
            </label>
            <label>
                <input type="radio" name="donation_amount" value="10000" />
                10000 ৳
            </label>
            <label>
                <input type="radio" name="donation_amount" value="50000" />
                50000 ৳
            </label>
            <label>
                <input type="radio" name="donation_amount" value="other" />
                Other
            </label>
        </div>
        <div id="custom-amount-container" style="display: none;">
            <label for="custom_amount">Enter Custom Amount (৳):</label>
            <input type="number" id="custom_amount" name="custom_amount" min="1" />
        </div>
        <input type="hidden" name="donation_nonce" id="donation_nonce" value="<?php echo esc_attr(wp_create_nonce('adbkp_process_donation_nonce')); ?>" />
        <button type="submit">Donate with bKash</button>
        <div id="donation-result"></div>
    </form>
</div>
