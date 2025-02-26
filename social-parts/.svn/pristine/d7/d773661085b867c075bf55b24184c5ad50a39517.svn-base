<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 * @package    social-parts
 * @subpackage social-parts/admin/partials
 */
?>
<div class="wrap">
    <h1> <?php echo SOCIAL_PARTS_PLUGIN_NAME ?> </h1>
</div>
<?php if ( $social_parts_domain_id ): ?>
    <header id="social-parts-header">
        <ul class="features-tabs">
            <li class="tab-link " data-tab="tab-1">
                    <span>
                        <a href="<?php echo SOCIAL_PARTS_URL ?>client/sites">
                            Sites
                        </a>
                    </span>
            </li>
            <li class="tab-link " data-tab="tab-2">
                    <span>
                        <a href="<?php echo SOCIAL_PARTS_URL ?>client/statistics">
                            Statistics
                        </a>
                    </span>
            </li>
            <li class="tab-link " data-tab="tab-3">
                    <span>
                        <a href="<?php echo SOCIAL_PARTS_URL ?>client/settings">
                            Account settings
                        </a>
                    </span>
            </li>
            <li class="tab-link " data-tab="tab-3">
                    <span>
                        <a href="<?php echo SOCIAL_PARTS_URL ?>client/subscription">
                            Subscription
                        </a>
                    </span>
            </li>
            <li class="tab-link" data-tab="tab-3"><span><a
                            href="<?php echo SOCIAL_PARTS_URL ?>">Library</a></span>
            </li>
            <li class="tab-link" data-tab="tab-3"><span><a
                            href="<?php echo SOCIAL_PARTS_URL ?>">Help</a></span>
            </li>
        </ul>
    </header>
<?php endif ?>

<div id="social-parts-admin-body">
    <div class="social-parts-admin-section is-boxed form-body">
        <div class="body-wrap">
			<?php if ( $social_parts_domain_id ): ?>
                <section id="success-block" class="form-block">
                    <div class="form-title">
                        <a href="<?php echo SOCIAL_PARTS_URL ?>"
                           class="logo logo-header"><img
                                    class="social-parts-header-logo"
                                    src="<?php echo plugins_url( 'social-parts/admin/images/full-logo.png' ); ?>"
                                    alt="Social Parts"></a>
                    </div>
                    <p class="modal-disc">Plugin is installed</p>
                    <div class="form_wrapper">
                        <div class="form-row">
                            <a href="<?php echo SOCIAL_PARTS_URL ?>admin/domain/<?php echo $social_parts_domain_id ?>">
                                <button class="button button-primary button-block">
                                    Manage
                                </button>
                            </a>
                        </div>
                    </div>
                </section>
			<?php endif ?>
            <section id="social-parts-login-block"
                     class="form-block" <?php if ( $social_parts_domain_id )
				echo 'style="display:none"' ?>>
                <div class="form-title">
                    <a href="<?php echo SOCIAL_PARTS_URL ?>"
                       class="logo logo-header"><img
                                class="social-parts-header-logo"
                                src="<?php echo plugins_url( 'social-parts/admin/images/full-logo.png' ); ?>"
                                alt="Social Parts"></a>
                </div>
                <p class="modal-disc">Enter Your Information to Log In</p>
                <div class="form_wrapper">
                    <form method="POST" action="#" accept-charset="UTF-8"
                          id="social-parts-login-form"
                          novalidate="novalidate">
                        <div class="form-row">
                            <label for="email">Email:</label>
                            <input id="email" class="input validate valid"
                                   type="text" placeholder="youremail@mail.com"
                                   name="email" aria-invalid="false">
                        </div>
                        <div class="form-row">
                            <div id="social-parts-errors">

                            </div>
                        </div>
                        <div class="form-row">
                            <label for="password">Password:</label>
                            <input id="password" class="input validate valid"
                                   name="password" type="password" value=""
                                   aria-invalid="false">
                        </div>
                    </form>
                    <div class="form-row links">
                        <a href="<?php echo SOCIAL_PARTS_URL ?>password/reset"
                           id="forgotPass">Forgot your password?</a>
                    </div>
                    <div class="form-row">
                        <button id="social-parts-login"
                                class="button button-primary button-block">Log
                            In
                        </button>
                    </div>
                    <div class="form-row">
                        <div>Don't have a SocialParts account? <a
                                    id="register-link"
                                    href="<?php echo SOCIAL_PARTS_URL ?>register">Sign
                                up
                                now!</a></div>
                    </div>
                    <div class="form-row">
                        <div class="alt-auth">
                            <div>OR</div>
                            <div style="padding-top:20px;padding-bottom: 20px">
                                Authorize with
                            </div>
                            <div class="alt-auth_links">
                                <a id="auth-google"
                                   href="<?php echo SOCIAL_PARTS_URL ?>auth/outer/google?redirectTo=<?php echo $social_parts_redirect_url ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                         viewBox="0 0 48 48" version="1.1"
                                         width="20px" height="20px">
                                        <g id="surface1">
                                            <path style=" fill:#FFC107;"
                                                  d="M 43.609375 20.082031 L 42 20.082031 L 42 20 L 24 20 L 24 28 L 35.304688 28 C 33.652344 32.65625 29.222656 36 24 36 C 17.371094 36 12 30.628906 12 24 C 12 17.371094 17.371094 12 24 12 C 27.058594 12 29.84375 13.152344 31.960938 15.039063 L 37.617188 9.382813 C 34.046875 6.054688 29.269531 4 24 4 C 12.953125 4 4 12.953125 4 24 C 4 35.046875 12.953125 44 24 44 C 35.046875 44 44 35.046875 44 24 C 44 22.660156 43.863281 21.351563 43.609375 20.082031 Z "></path>
                                            <path style=" fill:#FF3D00;"
                                                  d="M 6.304688 14.691406 L 12.878906 19.511719 C 14.65625 15.109375 18.960938 12 24 12 C 27.058594 12 29.84375 13.152344 31.960938 15.039063 L 37.617188 9.382813 C 34.046875 6.054688 29.269531 4 24 4 C 16.316406 4 9.65625 8.335938 6.304688 14.691406 Z "></path>
                                            <path style=" fill:#4CAF50;"
                                                  d="M 24 44 C 29.164063 44 33.859375 42.023438 37.410156 38.808594 L 31.21875 33.570313 C 29.210938 35.089844 26.714844 36 24 36 C 18.796875 36 14.382813 32.683594 12.71875 28.054688 L 6.195313 33.078125 C 9.503906 39.554688 16.226563 44 24 44 Z "></path>
                                            <path style=" fill:#1976D2;"
                                                  d="M 43.609375 20.082031 L 42 20.082031 L 42 20 L 24 20 L 24 28 L 35.304688 28 C 34.511719 30.238281 33.070313 32.164063 31.214844 33.570313 C 31.21875 33.570313 31.21875 33.570313 31.21875 33.570313 L 37.410156 38.808594 C 36.972656 39.203125 44 34 44 24 C 44 22.660156 43.863281 21.351563 43.609375 20.082031 Z "></path>
                                        </g>
                                    </svg>
                                </a>
                                <a id="auth-facebook"
                                   href="<?php echo SOCIAL_PARTS_URL ?>auth/outer/facebook?redirectTo=<?php echo $social_parts_redirect_url ?>">
                                    <svg width="16" height="16"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.023 16L6 9H3V6h3V4c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V6H13l-1 3H9.28v7H6.023z"
                                              fill="#3b5998"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script>
    var social_parts_domain_id = <?php echo $social_parts_domain_id ?>;
    const social_parts_api_url = "<?php echo SOCIAL_PARTS_API_URL ?>";
</script>