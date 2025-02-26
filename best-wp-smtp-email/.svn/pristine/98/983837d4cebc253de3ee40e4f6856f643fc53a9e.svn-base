<?php
/**
 * Code for Admin Options
 *
 * @since      1.0
 * @package    Best WP SMTP Email
 * @author     Tinypixi
 */

add_action( 'admin_menu', 'bwpse_setup_options_page' );
function bwpse_setup_options_page() {
    $page_title = __( 'Best WP SMTP Email', 'bwpse' );
    $menu_title = __( 'Best WP SMTP', 'bwpse' );
    $capability = 'manage_options';
    $menu_slug = 'bwpse_options';
    $function = 'bwpse_options_page_display';
    $icon_url = '';
    $position = 24;

    global $mailman_options_page;
    $mailman_options_page = add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
}

function bwpse_options_page_display() {
    if ( !current_user_can( 'manage_options' ) ) {
        wp_die( 'Unauthorized user' );
    }

?>
	<div class="tp_wrap">
		<div class="container">

			<div class="row">
                <div class="col-lg-12">
                    <div class="jumbotron">
                        <h1 class="display-3"><?php _e( 'Best WP SMTP Email', 'bwpse' ); ?></h1>
                        <p class="lead"><?php _e( 'The best SMTP plugin in WordPress history!', 'bwpse' ); ?></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <ul class="nav nav-tabs" id="myTab">
                        <li class="nav-item">
                            <a class="nav-link show active" data-toggle="tab" href="#settings"><?php _e( 'Settings', 'bwpse' ); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#testemail"><?php _e( 'Test Email', 'bwpse' ); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#usage"><?php _e( 'Usage Guide', 'bwpse' ); ?></a>
                        </li>
                    </ul>

                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade show active" id="settings">
                            <form class="postman" method="post">
                                <h1><?php _e( 'SMTP details', 'bwpse' ); ?></h1>
                                <fieldset>
                                    <div class="form-group">
                                        <?php
                                            if ( isset( $_POST['bwpse_host'] ) ) {
                                                update_option( 'bwpse_host', $_POST['bwpse_host'] );
                                            }
                                        ?>
                                        <label for="bwpse_host"><?php _e( 'SMTP Host', 'bwpse' ); ?></label>
                                        <input type="text" name="bwpse_host" id="bwpse_host" placeholder="e.g. 127.0.0.1" class="form-control" value="<?php echo get_option( 'bwpse_host' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <?php
                                            if ( isset( $_POST['bwpse_port'] ) ) {
                                                update_option( 'bwpse_port', $_POST['bwpse_port'] );
                                            }
                                        ?>
                                        <label for="bwpse_port"><?php _e( 'SMTP Port', 'bwpse' ); ?></label>
                                        <input type="number" name="bwpse_port" id="bwpse_port" placeholder="e.g. 1025" class="form-control" value="<?php echo get_option( 'bwpse_port' ); ?>">
                                    </div>
                                </fieldset>
                                <fieldset id="smtp_auth">
                                    <label><?php _e( 'SMTP Authentication', 'bwpse' ); ?></label>
                                    <div class="form-group">
                                        <?php
                                            if ( isset( $_POST['bwpse_auth'] ) ) {
                                                update_option( 'bwpse_auth', $_POST['bwpse_auth'] );
                                            }
                                        ?>
                                        <div class="form-check">
                                            <label class="form-check-label" for="bwpse_auth_0">
                                                <input type="radio" id="bwpse_auth_0" name="bwpse_auth" class="form-check-input" value="0" <?php echo checked( 1, get_option( 'bwpse_auth' ) ? get_option( 'bwpse_auth' ) : 1, false ); ?> >
                                                <?php _e( 'Off', 'bwpse' ); ?>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label" for="bwpse_auth_1">
                                                <input type="radio" id="bwpse_auth_1" name="bwpse_auth" class="form-check-input" value="1" <?php echo checked( 1, get_option( 'bwpse_auth' ) ? get_option( 'bwpse_auth' ) : 0, false ); ?> >
                                                <?php _e( 'On', 'bwpse' ); ?>
                                            </label>
                                        </div>  
                                    </div>
                                </fieldset>
                                <style>
                                    #auth-fields {
                                        <?php
                                            if ( get_option( 'bwpse_auth' ) == 1 ) {
                                                ?>
                                                    display: block;
                                                <?php
                                            } else {
                                                ?>
                                                    display: none;
                                                <?php
                                            }
                                        ?>
                                    } 
                                </style>
                                <fieldset id="auth-fields">
                                    <div class="form-group">
                                        <?php
                                            if ( isset( $_POST['bwpse_username'] ) ) {
                                                update_option( 'bwpse_username', $_POST['bwpse_username'] );
                                            }
                                        ?>
                                        <label for="bwpse_username"><?php _e( 'SMTP Username', 'bwpse' ); ?></label>
                                        <input type="text" name="bwpse_username" id="bwpse_username" placeholder="e.g. johndoe" class="form-control" value="<?php echo get_option( 'bwpse_username' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <?php
                                            if ( isset( $_POST['bwpse_password'] ) ) {
                                                update_option( 'bwpse_password', $_POST['bwpse_password'] );
                                            }
                                        ?>
                                        <label for="bwpse_password"><?php _e( 'SMTP Password', 'bwpse' ); ?></label>
                                        <input type="password" name="bwpse_password" id="bwpse_password" class="form-control" value="<?php echo get_option( 'bwpse_password' ); ?>">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <label><?php _e( 'SMTP Encryption', 'bwpse' ); ?></label>
                                    <div class="form-group">
                                        <?php
                                            if ( isset( $_POST['bwpse_encrypt'] ) ) {
                                                update_option( 'bwpse_encrypt', $_POST['bwpse_encrypt'] );
                                            }
                                        ?>
                                        <div class="form-check">
                                            <label class="form-check-label" for="bwpse_encrypt_0">
                                                <input type="radio" id="bwpse_encrypt_0" name="bwpse_encrypt" class="form-check-input" value="0" <?php echo checked( 1, get_option( 'bwpse_encrypt' ) ? get_option( 'bwpse_encrypt' ) : 1, false ); ?> >
                                                <?php _e( 'None', 'bwpse' ); ?>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label" for="bwpse_encrypt_ssl">
                                                <input type="radio" id="bwpse_encrypt_ssl" name="bwpse_encrypt" class="form-check-input" value="ssl" <?php echo checked( 'ssl', get_option( 'bwpse_encrypt' ) ? get_option( 'bwpse_encrypt' ) : 0, false ); ?> >
                                                <?php _e( 'SSL', 'bwpse' ); ?>
                                            </label>
                                        </div>  
                                        <div class="form-check">
                                            <label class="form-check-label" for="bwpse_encrypt_tls">
                                                <input type="radio" id="bwpse_encrypt_tls" name="bwpse_encrypt" class="form-check-input" value="tls" <?php echo checked( 'tls', get_option( 'bwpse_encrypt' ) ? get_option( 'bwpse_encrypt' ) : 0, false ); ?> >
                                                <?php _e( 'TLS', 'bwpse' ); ?>
                                            </label>
                                        </div>  
                                    </div>
                                </fieldset>
                                <fieldset id="smtp_override_defaults">
                                    <label><?php _e( 'Override defaults?', 'bwpse' ); ?></label>
                                    <div class="form-group">
                                        <?php
                                            if ( isset( $_POST['bwpse_override_defaults'] ) ) {
                                                update_option( 'bwpse_override_defaults', $_POST['bwpse_override_defaults'] );
                                            }
                                        ?>
                                        <div class="form-check">
                                            <label class="form-check-label" for="bwpse_override_defaults_0">
                                                <input type="radio" id="bwpse_override_defaults_0" name="bwpse_override_defaults" class="form-check-input" value="0" <?php echo checked( 1, get_option( 'bwpse_override_defaults' ) ? get_option( 'bwpse_override_defaults' ) : 1, false ); ?> >
                                                <?php _e( 'No', 'bwpse' ); ?>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label" for="bwpse_override_defaults_1">
                                                <input type="radio" id="bwpse_override_defaults_1" name="bwpse_override_defaults" class="form-check-input" value="1" <?php echo checked( 1, get_option( 'bwpse_override_defaults' ) ? get_option( 'bwpse_override_defaults' ) : 0, false ); ?> >
                                                <?php _e( 'Yes', 'bwpse' ); ?>
                                            </label>
                                        </div>  
                                    </div>
                                </fieldset>
                                <style>
                                    #override_defaults_fields {
                                        <?php
                                            if ( get_option( 'bwpse_override_defaults' ) == 1 ) {
                                                ?>
                                                    display: block;
                                                <?php
                                            } else {
                                                ?>
                                                    display: none;
                                                <?php
                                            }
                                        ?>
                                    } 
                                </style>
                                <fieldset id="override_defaults_fields">
                                    <div class="form-group">
                                        <?php
                                            if ( isset( $_POST['bwpse_from_email'] ) ) {
                                                update_option( 'bwpse_from_email', $_POST['bwpse_from_email'] );
                                            }
                                        ?>
                                        <label for="bwpse_from_email"><?php _e( 'From E-mail', 'bwpse' ); ?></label>
                                        <input type="email" name="bwpse_from_email" id="bwpse_from_email" placeholder="e.g. johndoe@gmail.com" class="form-control" value="<?php echo get_option( 'bwpse_from_email' ); ?>">
                                        <small class="form-text text-muted"><?php _e( 'Leave empty to use default.', 'bwpse' ); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <?php
                                            if ( isset( $_POST['bwpse_from_name'] ) ) {
                                                update_option( 'bwpse_from_name', $_POST['bwpse_from_name'] );
                                            }
                                        ?>
                                        <label for="bwpse_from_name"><?php _e( 'From Name', 'bwpse' ); ?></label>
                                        <input type="text" name="bwpse_from_name" id="bwpse_from_name" placeholder="e.g. John Doe" class="form-control" value="<?php echo get_option( 'bwpse_from_name' ); ?>">
                                        <small class="form-text text-muted"><?php _e( 'Leave empty to use default.', 'bwpse' ); ?></small>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <input type="hidden" name="action" value="update" />
                                    <?php wp_nonce_field('smtp_credentials_update_action'); ?>
                                    <button type="submit" class="btn btn-primary"><?php _e( 'Save Changes', 'bwpse' ); ?></button>
                                </fieldset>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="testemail">
                            <h1><?php _e( 'Test SMTP Connection', 'bwpse' ); ?></h1>
                            <form method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <?php
                                            if ( isset( $_POST['bwpse_test_email'] ) ) {
                                                update_option( 'bwpse_test_email', $_POST['bwpse_test_email'] );
                                            }
                                        ?>
                                        <label for="bwpse_test_email"><?php _e( 'E-mail Address', 'bwpse' ); ?></label>
                                        <input type="text" name="bwpse_test_email" id="bwpse_test_email" placeholder="e.g. john.doe@gmail.com" class="form-control" value="<?php echo get_option( 'bwpse_test_email' ); ?>">
                                        <small class="form-text text-muted"><?php _e( 'Enter the e-mail address you want to send the test email to.', 'bwpse' ); ?></small>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <input type="hidden" name="action" value="update" />
                                    <?php
                                        $to      = $_POST['bwpse_test_email'];
                                        $subject = __( 'Mailman Test Email', 'bwpse' );
                                        $message = __( 'Yaay! Mailman SMTP is working!', 'bwpse' );

                                        if ( isset( $_POST['bwpse_test_email_submit'] ) ) {
                                            wp_mail( $to, $subject, $message );
                                        }
                                    ?>
                                    <?php wp_nonce_field('smtp_credentials_update_action'); ?>
                                    <input type="submit" name="bwpse_test_email_submit" class="btn btn-primary" value="<?php _e( 'Send test email', 'bwpse' ); ?>" />
                                </fieldset>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="usage">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>Configuration</h2>
                                    <h6>Configurating this plugin is very simple. Simply copy the SMTP Host, Port, Username and Password from your SMTP Provider and paste in the plugin settings input fields.</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>Details</h2>
                                    <h4>SMTP Host</h4>
                                    <h6>SMTP Host should look like a URL or an IP address. This is where your SMTP Server is located at. Simply copy your SMTP Host value from your provider and paste in the SMTP Host input field in this plugin settings panel.</h6>
                                    <h4>SMTP Port</h4>
                                    <h6>SMTP Port should look like a number. This is what your SMTP Server communicates through. Simply copy your SMTP Port value from your provider and paste in the SMTP Port input field in this plugin settings panel.</h6>
                                    <h4>SMTP Authentication</h4>
                                    <h6>If your SMTP Provider gives you Username and Password for SMTP, then select "Yes" for SMTP Authentication settings in this plugin. If you select "Yes", you will get options to enter your SMTP Username and Password. Copy from your SMTP Provider and paste the Username and Password in the respective fields in this plugins settings page.</h6>
                                    <h4>SMTP Encryption</h4>
                                    <h6>If your SMTP Provider specifically mention to use any specific encryption method like SSL or TLS, select None. But if they instruct you to use specific encryption method, select that in this plugin settings page.</h6>
                                    <h4>Override Defaults</h4>
                                    <h6>While sending your emails through SMTP, if you want to change the Sender Email address and Sender Name, then select "Yes" for this option. You will then get input fields for entering your Sender Name and Sender Email. Enter your desired Name and Email and Save.</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>

<?php }