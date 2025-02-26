<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }

    /**
     * Template for the email form
     * 
     * @since   1.0.0
     * @author  Dennis Weijer
     */

     // Get all the signatures
     $args = array(
        'post_type' => 'ece_signatures',
        'posts_per_page' => -1
     );
     $posts = new WP_Query( $args );
?>

<div class="ece-form">
    <div class="form-field form-field-wide">
        <label for=""><?php esc_html_e( "Customer Email:", "e-customer-emails" ); ?> <span style="color: red">*</span></label><br>
        <input type="email" disabled="disabled" value="<?php echo esc_attr( sanitize_email( $billing_email ) ); ?>">
    </div>
    <br />
    <div class="form-field form-field-wide">
        <label for=""><?php esc_html_e( "Email Subject:", "e-customer-emails" ); ?> <span style="color: red">*</span></label><br>
        <input type="text" id="ece-subject" minlength="10" maxlength="75">
    </div>
    <br />
    <div class="form-field form-field-wide">
        <label for="">CC:</label><br>
        <input type="text" id="ece-cc" placeholder="<?php esc_html_e( "Leave blank if you don't want to add a CC", "e-customer-emails" ); ?>">
    </div>
    <br />
    <div class="form-field form-field-wide">
        <label for="">BCC:</label><br>
        <input type="text" id="ece-bcc" placeholder="<?php esc_html_e( "Leave blank if you don't want to add a BCC", "e-customer-emails" ); ?>">
    </div>
    <br />
    <div class="form-field form-field-wide">
        <label for=""><?php esc_html_e( "Insert Signature:", "e-customer-emails" ); ?></label><br>
        <!-- Loop through the signatures -->
        <select name="" id="ece-signature-select">
            <option value="">-- <?php esc_html_e( "Select a signature", "e-customer-emails" ); ?> --</option>
            <?php if ( $posts->have_posts() ): ?>
                <?php while ( $posts->have_posts() ): $posts->the_post(); ?>
                    <option value="<?php esc_attr( the_ID() ); ?>"><?php esc_html( the_title() ); ?></option>
                <?php endwhile; ?>
            <?php wp_reset_postdata(); endif; ?>
        </select>
        <a href="" class="ece_insert_signature_button button button-secondary"><?php esc_html_e( "Insert", "e-customer-emails" ); ?></a>
        <span class="ece-spinner-signature spinner"></span>
        <p class="ece-signature-success" style="color: green;"></p>
        <ul class="ece-signature-error" style="color: red;"></p>
    </div>
    <br />
    <div class="form-field form-field-wide">
        <label for=""><?php esc_html_e( "Message:", "e-customer-emails" ); ?> <span style="color: red">*</span></label><br><br>
        <?php wp_editor( '', 'ece-message', [ 'wpautop' => false ] ); ?>
        <br />
        <?php
            ob_start();
            include( plugin_dir_path( __FILE__ ) . 'ece-variables.php' );
            echo ob_get_clean();
        ?>
    </div>
    <br />
</div>

<div style="overflow: auto;">
    <div id="publishing-action">
        <a class="ece_send_email_button button button-primary" data-nonce="<?php echo esc_attr( $nonce ); ?>" data-post_id="<?php echo esc_attr( $PostID ); ?>" href="<?php echo esc_attr( $link ); ?>"><?php esc_html_e( "Send email", "e-customer-emails" ); ?></a>
        <span class="ece-spinner spinner"></span>
    </div>
</div>
<p id="ece-response-text-success" style="color: green;"></p>
<ul id="ece-response-text-error" style="color: red;"></ul>