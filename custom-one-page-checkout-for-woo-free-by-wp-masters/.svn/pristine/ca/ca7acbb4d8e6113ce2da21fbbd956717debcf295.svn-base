<?php wp_head();

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

$checkout = WC()->checkout();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
return;
}

$settings = unserialize(get_option('wpm_modern_checkout'));

// Get Styles Settings
$links_color = isset($settings['links']) ? $settings['links'] : '#7aa941';
$links_hover_color = isset($settings['links_hover']) ? $settings['links_hover'] : '#669331';
$sidebar_background = isset($settings['sidebar_background']) ? $settings['sidebar_background'] : '#eee';
$sidebar_fonts = isset($settings['sidebar_fonts']) ? $settings['sidebar_fonts'] : '#000';
$border_color = isset($settings['border_color']) ? $settings['border_color'] : '#7e9e57';
$input_border = isset($settings['input_border']) ? $settings['input_border'] : '#d9d9d9';
$input_border_hover = isset($settings['input_border_hover']) ? $settings['input_border_hover'] : '#7aa941';

?>

<style>
    .total-line th, .total-line td, .sidebar .order-summary__emphasis, .sidebar h2, .sidebar .heading-2, .sidebar .payment-due__price, .sidebar .payment-due-label__total {
        color: <?php echo esc_html($sidebar_fonts); ?> !important;
    }
    .order-summary-toggle__icon, .order-summary-toggle__dropdown {
        fill: <?php echo esc_html($links_color); ?> !important;
    }
    .breadcrumb__item span, .order-summary-toggle:hover .order-summary-toggle__text, .order-summary-toggle:focus .order-summary-toggle__text, .order-summary-toggle__text {
        color: <?php echo esc_html($links_color); ?> !important;
    }
    .input-checkbox:focus,.input-radio:focus{
        border-color: <?php echo esc_html($links_color); ?>;
    }
    .input-checkbox:checked,.input-radio:checked{
        border-color: <?php echo esc_html($links_color); ?>;
    }
    .input-checkbox:checked:hover,.input-radio:checked:hover{
        border-color: <?php echo esc_html($links_color); ?>;
    }
    .field__input:focus,.field__input-wrapper--flag-focus .field__input{
        border-color: <?php echo esc_html($links_color); ?>;
        box-shadow: 0 0 0 1px <?php echo esc_html($links_color); ?>;
    }
    .btn,.sp-modal-toggle{
        background-color: <?php echo esc_html($links_color); ?>;
    }
    a,.link{
        color: <?php echo esc_html($links_color); ?>;
    }
    .btn:hover, .sp-modal-toggle:hover {
        background-color: <?php echo esc_html($links_hover_color); ?>;
        border: 1px solid <?php echo esc_html($links_hover_color); ?>;
    }
    a:hover, .link:hover {
        color: <?php echo esc_html($links_hover_color); ?>;
    }
    .breadcrumb__item span:hover {
        color: <?php echo esc_html($links_hover_color); ?>;
    }
    input[type="radio"]:checked, input[type=reset], input[type="checkbox"]:checked, input[type="checkbox"]:hover:checked, input[type="checkbox"]:focus:checked, input[type=range]::-webkit-slider-thumb {
        border-color: <?php echo esc_html($links_hover_color); ?>;
        background-color: <?php echo esc_html($links_hover_color); ?>;
    }
    .product-thumbnail__quantity {
        background-color: <?php echo esc_html($links_color); ?>;
    }
    .sidebar::after {
        background: <?php echo esc_html($sidebar_background); ?>;
    }
    .sidebar .total-line-table__tbody+.total-line-table__tbody .total-line:first-child th::before, .sidebar .total-line-table__tbody+.total-line-table__tbody .total-line:first-child td::before, .sidebar .total-line-table__tbody+.total-line-table__footer .total-line:first-child th::before, .sidebar .total-line-table__tbody+.total-line-table__footer .total-line:first-child td::before {
        background-color: <?php echo esc_html($border_color); ?>;
    }
    .order-summary__section~.order-summary__section {
        border-top: 1px solid <?php echo esc_html($border_color); ?>;
    }
    .main__footer {
        border-top: 1px solid <?php echo esc_html($input_border); ?>;
    }
    .woocommerce-billing-fields p input, .select2-container .select2-selection--single, .main .field__input {
        border: 1px solid <?php echo esc_html($input_border); ?>;
    }
    input:focus, input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="reset"]:focus, input[type="search"]:focus, textarea:focus {
        border-color: <?php echo esc_html($input_border_hover); ?> !important;
    }
    .select2-container--open .select2-selection--single {
        border-color: <?php echo esc_html($input_border_hover); ?> !important;
    }
</style>
<div class="mobile-banner">
    <div class="banner" data-header="">
        <div class="wrap">
	        <?php if(isset($settings['logo_checkout']) && !empty($settings['logo_checkout']) && $settings['logo_checkout'] != 0) : ?>
                <a class="logo logo--left" href="/"><img alt="" class="logo__image logo__image--medium" src="<?php echo esc_attr(wp_get_attachment_url($settings['logo_checkout'])); ?>"></a>
	        <?php endif; ?>
        </div>
    </div>
</div>
<aside role="complementary">
    <button class="order-summary-toggle shown-if-js order-summary-toggle--show" aria-expanded="false" aria-controls="order-summary" data-drawer-toggle="[data-order-summary]">
    <span class="wrap">
      <span class="order-summary-toggle__inner">
        <span class="order-summary-toggle__icon-wrapper">
          <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__icon">
            <path d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z"></path>
          </svg>
        </span>
        <span class="order-summary-toggle__text order-summary-toggle__text--show">
          <span>Show order summary</span>
          <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="#000"><path d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z"></path></svg>
        </span>
        <span class="order-summary-toggle__text order-summary-toggle__text--hide">
          <span>Hide order summary</span>
          <svg width="11" height="7" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="#000"><path d="M6.138.876L5.642.438l-.496.438L.504 4.972l.992 1.124L6.138 2l-.496.436 3.862 3.408.992-1.122L6.138.876z"></path></svg>
        </span>
        <dl class="order-summary-toggle__total-recap total-recap">
          <dt class="visually-hidden"><span>Sale price</span></dt>
          <dd>
            <span class="order-summary__emphasis total-recap__final-price skeleton-while-loading"><?php wc_cart_totals_order_total_html(); ?></span>
            </dd>
        </dl>
  </span></span></button>
</aside>
<div class="content" data-content="">
    <div class="wrap">
        <div class="main" role="main">
        <div class="main__header">
            <?php if(isset($settings['logo_checkout']) && !empty($settings['logo_checkout']) && $settings['logo_checkout'] != 0) : ?>
                <a class="logo logo--left" href="/"><img alt="" class="logo__image logo__image--medium" src="<?php echo esc_attr(wp_get_attachment_url($settings['logo_checkout'])); ?>"></a>
            <?php endif; ?>
            <h1 class="visually-hidden">
                Information
            </h1>
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb " role="list">
                    <li class="breadcrumb__item one change-first-page breadcrumb__item--current">
                        <span class="breadcrumb__text">Information</span>
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="breadcrumb__item two change-two-page">
                        <span class="breadcrumb__text">Shipping</span>
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="breadcrumb__item three change-three-page">
                        <span class="breadcrumb__text">Payment</span>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="main__content">
            <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
                <div class="step" id="contact_information">
                    <div class="step__sections">
                        <div class="section section--contact-information">
                            <div class="section__header">
                                <div class="layout-flex layout-flex--tight-vertical layout-flex--loose-horizontal layout-flex--wrap">
                                    <h2 class="section__title layout-flex__item layout-flex__item--stretch" id="main-header" tabindex="-1">
                                        Contact information
                                    </h2>
                                    <p class="layout-flex__item">
                                        <span aria-hidden="true">Already have an account?</span>
                                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
                                            <span class="visually-hidden">Already have an account?</span>
                                            Log in
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="section__content" data-section="customer-information" data-shopify-pay-validate-on-load="false">
                                <div class="fieldset">
                                    <div data-shopify-pay-email-flow="false" class="field field--required">
                                        <div class="field__input-wrapper"><label class="field__label field__label--visible" for="checkout_email">Email</label>
                                            <input placeholder="Email" class="field__input" size="30" type="email" id="checkout_email">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
                        <div class="section section--shipping-address" data-shipping-address="">
                            <div class="section__header">
                                <h2 class="section__title" id="section-delivery-title">
                                    Billing address
                                </h2>
                            </div>
                            <div class="section__content" id="customer_details">
                                <div class="fieldset">
                                    <?php do_action( 'woocommerce_checkout_billing' ); ?>
	                                <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                                    <div class="field field--show-floating-label bottom-padding-more">
                                        <div class="checkbox-wrapper">
                                            <div class="checkbox__input">
                                                <?php
                                                    if(is_user_logged_in()) {
                                                        $same_billing = get_user_meta(get_current_user_id(), 'billing-same-as-shipping', true);
                                                    }
                                                ?>
                                                <input class="input-checkbox" name="billing-same-as-shipping" id="billing-same-as-shipping" type="checkbox" <?php if(isset($same_billing) && $same_billing == 'true') { echo esc_attr('checked'); }?>>
                                            </div>
                                            <label class="checkbox__label" for="billing-same-as-shipping">
                                                Set Shipping address same as Billing
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
                    </div>
                    <div class="step__footer">
                        <button name="button" type="button" id="continue_button" class="step__footer__continue-btn btn change-two-page" aria-busy="false">
                            <span class="btn__content" data-continue-button-content="true">Continue to shipping</span>
                        </button>
                    </div>
                    <p id="smsbump-consent-message" style="margin-top: 1em; color: rgb(105, 105, 105); font-size: 12px;">By checking this box I consent to receive recurring automated marketing by text message through an automatic telephone dialing system. Consent is not a condition to purchase. Message and Data rate apply. Opt-Out by texting STOP. <a href="/privacy-policy/">View Privacy Policy</a></p>
                </div>
                <div class="step" id="shipping_method" style="display: none">
                    <div class="step__sections">
                            <div class="section">
                                <div class="content-box">
                                    <div role="table" class="content-box__row content-box__row--tight-spacing-vertical">
                                        <div role="row" class="review-block">
                                            <div class="review-block__inner">
                                                <div role="rowheader" class="review-block__label">
                                                    Contact
                                                </div>
                                                <div role="cell" class="review-block__content">
                                                    <bdo dir="ltr" id="email-method"></bdo>
                                                </div>
                                            </div>
                                            <div role="cell" class="review-block__link">
                                                <a class="link--small change-first-page">
                                                    <span>Change</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div role="row" class="review-block">
                                            <div class="review-block__inner">
                                                <div class="review-block__label">Ship to</div>
                                                <div role="cell" class="review-block__content">
                                                    <address class="address address--tight" id="total-address"></address>
                                                </div>
                                            </div>
                                            <div role="cell" class="review-block__link">
                                                <a class="link--small change-first-page">
                                                    <span>Change</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section section--shipping-method">
                                <div class="section__header">
                                    <h2 class="section__title" id="main-header" tabindex="-1">
                                        Shipping method
                                    </h2>
                                </div>
                                <div class="section__content">
                                    <fieldset class="content-box">
                                        <div id="select-method-shipping"></div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    <div class="step__footer two-element">
                        <a class="step__footer__previous-link change-first-page">
                            <i class="fas fa-angle-left"></i> <span class="step__footer__previous-link-content">Return to information</span>
                        </a>
                        <button name="button" type="button" id="continue_button" class="step__footer__continue-btn btn change-three-page" aria-busy="false">
                            <span class="btn__content" data-continue-button-content="true">Continue to payment</span>
                        </button>
                    </div>
                </div>
                <div class="step" id="select_payment_method" style="display: none">
                    <div class="step__sections">
                        <div class="section">
                            <div class="content-box">
                                <div role="table" class="content-box__row content-box__row--tight-spacing-vertical">
                                    <div role="row" class="review-block">
                                        <div class="review-block__inner">
                                            <div role="rowheader" class="review-block__label">
                                                Contact
                                            </div>
                                            <div role="cell" class="review-block__content">
                                                <bdo dir="ltr" id="email-method-2"></bdo>
                                            </div>
                                        </div>
                                        <div role="cell" class="review-block__link">
                                            <a class="link--small change-first-page">
                                                <span>Change</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div role="row" class="review-block">
                                        <div class="review-block__inner">
                                            <div class="review-block__label">Ship to</div>
                                            <div role="cell" class="review-block__content">
                                                <address class="address address--tight" id="total-address-2"></address>
                                            </div>
                                        </div>
                                        <div role="cell" class="review-block__link">
                                            <a class="link--small change-first-page">
                                                <span>Change</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div role="row" class="review-block">
                                        <div class="review-block__inner">
                                            <div class="review-block__label">Method</div>
                                            <div role="cell" class="review-block__content" id="selected-payment-method">

                                            </div>
                                        </div>
                                        <div role="cell" class="review-block__link">
                                            <a class="link--small change-two-page">
                                                <span>Change</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section section--billing-address">
                            <div class="section__header">
                                <h2 class="section__title">Shipping address</h2>
                                <p class="section__text">
                                    Select the address that matches your Shipping details.
                                </p>
                            </div>
                            <div class="section__content">
                                <fieldset class="content-box">
                                    <legend class="visually-hidden">Choose a billing address</legend>

                                    <div class="radio-wrapper content-box__row" data-same-billing-address="">
                                        <div class="radio__input">
                                            <input class="input-radio" data-backup="different_billing_address_false" type="radio" value="false" checked="checked" name="different_billing_address" id="checkout_different_billing_address_false">
                                        </div>

                                        <label class="radio__label content-box__emphasis" for="checkout_different_billing_address_false">
                                            Same as billing address
                                        </label>            </div>

                                    <div class="radio-wrapper content-box__row" data-different-billing-address="">
                                        <div class="radio__input">
                                            <input class="input-radio" data-backup="different_billing_address_true" aria-controls="section--billing-address__different" type="radio" value="true" name="different_billing_address" id="checkout_different_billing_address_true">
                                        </div>
                                        <label class="radio__label content-box__emphasis" for="checkout_different_billing_address_true">
                                            Use a different shipping address
                                        </label>            </div>

                                    <div class="radio-group__row content-box__row content-box__row--secondary" id="section--billing-address__different">
                                        <div class="fieldset">
                                            <div class="address-fields" id="shipping-fields-here"></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="section section--payment-method">
                            <div class="section__header">
                                <h2 class="section__title" id="main-header" tabindex="-1">
                                    Payment
                                </h2>
                                <p class="section__text">
                                    All transactions are secure and encrypted.
                                </p>
                            </div>
                            <div class="section__content">
                                <div class="hidden notice notice--error default-background" id="card-fields__processing-error" data-banner="true" role="alert" tabindex="-1" aria-atomic="true" aria-live="polite">
                                    <svg class="icon-svg icon-svg--size-24 notice__icon" aria-hidden="true" focusable="false">
                                        <use xlink:href="#error"></use>
                                    </svg>
                                    <div class="notice__content">
                                        <p class="notice__text">There was a problem processing the payment. Try refreshing this page or check your internet connection.</p>
                                    </div>
                                </div>
                                <div data-payment-subform="required">
                                    <fieldset class="content-box">
                                        <?php woocommerce_checkout_payment(); ?>
                                    </fieldset>
                                </div>
                                <div data-payment-subform="gift_cards" class="hidden">
                                    <input value="free" disabled="disabled" autocomplete="off" size="30" type="hidden" name="checkout[payment_gateway]">
                                    <div class="content-box blank-slate">
                                        <div class="content-box__row">
                                            <i class="blank-slate__icon icon icon--free-tag"></i>
                                            <p>Your order is covered by your gift cards.</p>
                                        </div>
                                    </div>
                                </div>
                                <div data-payment-subform="free" class="hidden"></div>
                            </div>
                        </div>
                        <div class="step__footer two-element">
                            <a class="step__footer__previous-link change-two-page">
                                <i class="fas fa-angle-left"></i> <span class="step__footer__previous-link-content">Return to shipping</span>
                            </a>
                            <button name="button" type="submit" id="continue_button" class="step__footer__continue-btn btn">
                                <span class="btn__content">Place Order</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php if(isset($settings['footer_anchor'][0]) && $settings['footer_anchor'][0] != '') { ?>
            <div class="main__footer">
                <ul class="policy-list" role="list">
                    <?php foreach($settings['footer_anchor'] as $item => $link_name) { ?>
                        <li class="policy-list__item ">
                            <a href="<?php echo esc_attr($settings['footer_link'][$item]); ?>"><?php echo esc_html($link_name); ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
    </div>

    <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
        <div class="sidebar" role="complementary">
            <div class="sidebar__content">
                <div id="order_review" class="woocommerce-checkout-review-order">
                    <div id="order-summary" class="order-summary order-summary--is-collapsed" data-order-summary="">
                    <h2 class="visually-hidden-if-js">Order summary</h2>
                    <div class="order-summary__sections">
                        <div class="order-summary__section order-summary__section--product-list">
                            <div class="order-summary__section__content">
                                <?php woocommerce_order_review(); ?>
                            </div>
                        </div>
                        <div class="order-summary__section order-summary__section--discount" data-reduction-form="update">
                            <h3 class="visually-hidden">Gift card or discount code</h3>
                            <form class="edit_checkout animate-floating-labels checkout_coupon woocommerce-form-coupon" method="post">
                                <div class="fieldset">
                                    <div class="field">
                                        <div class="field__input-btn-wrapper">
                                            <div class="field__input-wrapper"><label class="field__label field__label--visible" for="checkout_reduction_code">Gift card or discount code</label>
                                                <input placeholder="Gift card or discount code" class="field__input" name="coupon_code" id="coupon_code" >
                                            </div>
                                            <button name="apply_coupon" value="Apply coupon" class="field__input-btn btn btn--disabled">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="order-summary__section order-summary__section--total-lines" data-order-summary-section="payment-lines">
                            <table class="total-line-table total-checkout-data">
                                <caption class="visually-hidden">Cost summary</caption>
                                <thead>
                                <tr>
                                    <th scope="col"><span class="visually-hidden">Description</span></th>
                                    <th scope="col"><span class="visually-hidden">Price</span></th>
                                </tr>
                                </thead>
                                <tbody class="total-line-table__tbody">
                                <tr class="cart-subtotal total-line">
                                    <th><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
                                    <td><?php wc_cart_totals_subtotal_html(); ?></td>
                                </tr>

                                <tr class="fee total-line">
                                    <th>Shipping</th>
                                    <td><?php echo get_woocommerce_currency_symbol().WC()->cart->shipping_total; ?></td>
                                </tr>

                                <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                                    <tr class="total-line cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                                        <th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
                                        <td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
                                    </tr>
                                <?php endforeach; ?>

                                <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
                                    <tr class="fee total-line">
                                        <th><?php echo esc_html( $fee->name ); ?></th>
                                        <td><?php wc_cart_totals_fee_html( $fee ); ?></td>
                                    </tr>
                                <?php endforeach; ?>

                                <?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
                                    <?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
                                        <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
                                            <tr class=total-line "tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                                                <th><?php echo esc_html( $tax->label ); ?></th>
                                                <td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr class="tax-total total-line">
                                            <th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
                                            <td><?php wc_cart_totals_taxes_total_html(); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endif; ?>
                                </tbody>
                                <tfoot class="total-line-table__footer">
                                    <?php do_action( 'woocommerce_review_order_before_order_total' ); ?>
                                        <tr class="total-line order-total">
                                            <th class="total-line__name payment-due-label" scope="row">
                                                <span class="payment-due-label__total"><?php esc_html_e( 'Total', 'woocommerce' ); ?></span>
                                            </th>
                                            <td class="total-line__price payment-due">
                                                <span class="payment-due__price skeleton-while-loading--lg"><?php wc_cart_totals_order_total_html(); ?></span>
                                            </td>
                                        </tr>
                                    <?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
    </div>
</div>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

<?php wp_footer(); ?>
