<?php
add_action( 'init', 'update_meta_value' );

function update_meta_value() {
    global $bpsfw_comman;

    // Handle "panding_to_approve" action
    if ( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'panding_to_approve' ) {
        $nonce = $_REQUEST['nonce'];
        if ( ! wp_verify_nonce( $nonce, 'approve_deny_action' ) ) {
            wp_die( 'Security check failed. Invalid nonce.' );
        }
        $user_detail = get_userdata( sanitize_text_field( $_REQUEST['user'] ) );
        $admin_email = get_option( 'admin_email' );
        $name = $user_detail->display_name;
        $email = $admin_email;
        $message = $bpsfw_comman['bpsfw_approve_email_message'];
        $to = $user_detail->user_email;
        $subject = $bpsfw_comman['bpsfw_approve_email_subject'];
        $headers = 'welcome message';

        if ( $bpsfw_comman['bpsfw_account_approve_email'] == 'yes' ) {
            wp_mail( $to, $subject, $message, $headers );
        }

        if ( $bpsfw_comman['bpsfw_admin_email'] == 'yes' ) {
            $admin_subject = $bpsfw_comman['bpsfw_admin_approve_email_subject'];
            $admin_message = str_replace( "{customer_name}", $name, $bpsfw_comman['bpsfw_admin_approve_email_message'] );
            wp_mail( $admin_email, $admin_subject, $admin_message, $headers );
        }

        update_user_meta( sanitize_text_field( $_REQUEST['user'] ), 'approval_confirmation', 'confirm_approve' );
        wp_redirect( admin_url( '/users.php?page=panding-new-users' ) );
        exit();
    }

    // Handle "denied_to_approve" action
    if ( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'denied_to_approve' ) {
        $nonce = $_REQUEST['nonce'];
        if ( ! wp_verify_nonce( $nonce, 'approve_deny_action' ) ) {
            wp_die( 'Security check failed. Invalid nonce.' );
        }
        $user_detail = get_userdata( sanitize_text_field( $_REQUEST['user'] ) );
        $admin_email = get_option( 'admin_email' );
        $name = $user_detail->display_name;
        $email = $admin_email;
        $message = $bpsfw_comman['bpsfw_approve_email_message'];
        $to = $user_detail->user_email;
        $subject = $bpsfw_comman['bpsfw_approve_email_subject'];
        $headers = 'welcome message';

        if ( $bpsfw_comman['bpsfw_account_approve_email'] == 'yes' ) {
            wp_mail( $to, $subject, $message, $headers );
        }

        if ( $bpsfw_comman['bpsfw_admin_email'] == 'yes' ) {
            $admin_subject = $bpsfw_comman['bpsfw_admin_approve_email_subject'];
            $admin_message = str_replace( "{customer_name}", $name, $bpsfw_comman['bpsfw_admin_approve_email_message'] );
            wp_mail( $admin_email, $admin_subject, $admin_message, $headers );
        }

        update_user_meta( sanitize_text_field( $_REQUEST['user'] ), 'approval_confirmation', 'confirm_approve' );
        wp_redirect( admin_url( '/users.php?page=denied-new-users' ) );
        exit();
    }

    // Handle "approve_to_denied" action
    if ( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'approve_to_denied' ) {
        $nonce = $_REQUEST['nonce'];
        if ( ! wp_verify_nonce( $nonce, 'approve_deny_action' ) ) {
            wp_die( 'Security check failed. Invalid nonce.' );
        }
        $user_detail = get_userdata( sanitize_text_field( $_REQUEST['user'] ) );
        $admin_email = get_option( 'admin_email' );
        $name = $user_detail->display_name;
        $email = $admin_email;
        $message = $bpsfw_comman['bpsfw_reject_email_message'];
        $to = $user_detail->user_email;
        $subject = $bpsfw_comman['bpsfw_reject_email_subject'];
        $headers = 'reject message';

        if ( $bpsfw_comman['bpsfw_account_disale_email'] == 'yes' ) {
            wp_mail( $to, $subject, $message, $headers );
        }

        if ( $bpsfw_comman['bpsfw_admin_email'] == 'yes' ) {
            $admin_subject = $bpsfw_comman['bpsfw_admin_reject_email_subject'];
            $admin_message = str_replace( "{customer_name}", $name, $bpsfw_comman['bpsfw_admin_reject_email_message'] );
            wp_mail( $admin_email, $admin_subject, $admin_message, $headers );
        }

        update_user_meta( sanitize_text_field( $_REQUEST['user'] ), 'approval_confirmation', 'denied_user' );
        wp_redirect( admin_url( '/users.php?page=approve-new-users' ) );
        exit();
    }

    // Handle "panding_to_denied" action
    if ( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'panding_to_denied' ) {
        $nonce = $_REQUEST['nonce'];
        if ( ! wp_verify_nonce( $nonce, 'approve_deny_action' ) ) {
            wp_die( 'Security check failed. Invalid nonce.' );
        }
        $user_detail = get_userdata( sanitize_text_field( $_REQUEST['user'] ) );
        $admin_email = get_option( 'admin_email' );
        $name = $user_detail->display_name;
        $email = $admin_email;
        $message = $bpsfw_comman['bpsfw_reject_email_message'];
        $to = $user_detail->user_email;
        $subject = $bpsfw_comman['bpsfw_reject_email_subject'];
        $headers = 'reject message';

        if ( $bpsfw_comman['bpsfw_account_disale_email'] == 'yes' ) {
            wp_mail( $to, $subject, $message, $headers );
        }

        if ( $bpsfw_comman['bpsfw_admin_email'] == 'yes' ) {
            $admin_subject = $bpsfw_comman['bpsfw_admin_reject_email_subject'];
            $admin_message = str_replace( "{customer_name}", $name, $bpsfw_comman['bpsfw_admin_reject_email_message'] );
            wp_mail( $admin_email, $admin_subject, $admin_message, $headers );
        }

        update_user_meta( sanitize_text_field( $_REQUEST['user'] ), 'approval_confirmation', 'denied_user' );
        wp_redirect( admin_url( '/users.php?page=panding-new-users' ) );
        exit();
    }
}
?>
