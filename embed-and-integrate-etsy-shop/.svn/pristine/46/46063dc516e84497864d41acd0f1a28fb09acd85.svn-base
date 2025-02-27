<?php

/**
 * Provide a admin area view for the plugin.
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @see       Etsy360
 * @since      1.0.0
 */
if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

$logo_url = plugin_dir_url(__DIR__).'imgs/logo.png';

?>

<div class="ee-wrap wrap">
    <div class="ee-body">

        <header class="ee-Header">
            <div class="ee-Header-logo">
                <img src="<?php echo esc_html($logo_url); ?>"
                    width="120" alt="Logo" class="ee-Header-logo-desktop">
            </div>
            <div class="ee-Header-nav">
                <a href="#welcome" id="ee-welcome" class="ee-menuItem isActive">
                    <div class="ee-menuItem-title">Welcome</div>
                    <div class="ee-menuItem-description">Getting Started</div>
                </a>
                <!-- <a href="#settings" id="etsy360-nav-connect" class="ee-menuItem">
                <div class="ee-menuItem-title">Styles</div>
                <div class="ee-menuItem-description">Branding and Settings</div>
            </a> -->
            </div>
        </header>

        <section class="ee-Content isNotFull">
            <form action="options.php" method="POST" id="etsy_embed_options">
                <input type="hidden" name="action" value="update">
                <div id="connect" class="ee-Page" style="">
                    <div class="ee-sectionHeader">
                        <h2 class="ee-title1 ee-icon-home">Welcome</h2>
                    </div>

                    <div class="ee-Page-row">

                        <div class="ee-fieldsContainer">
                            <div class="ee-fieldsContainer-description">
                                Thank you so much for installing and welcome to the installation of Etsy Embed by
                                Embed360!
                            </div>
                        </div>


                        <div class="ee-Page-col">
                            <div class="ee-optionHeader">
                                <h3 class="ee-title2">Getting Started</h3>
                            </div>
                            <div class="ee-fieldsContainer">
                                <div class="ee-fieldsContainer-description">
                                    First, start by creating your new account by clicking the "Create Account" button.
                                    You'll be asked to log in with your Etsy Account on the next screen.
                                </div>
                            </div>

                            <div class="ee-field ee-field-account">
                                <a href="https://embed360.io/login" target="_blank"
                                    class="ee-button ee-button--icon ee-button--small">Create
                                    Account</a>
                            </div>
                        </div>

                        <div class="ee-optionHeader">
                            <h3 class="ee-title2">User Token</h3>
                        </div>
                        <div class="ee-fieldsContainer">
                            <div class="ee-fieldsContainer-description">
                                Next, enter your user token provided under your <a target="_blank" href="https://embed360.io/account">account page</a> and click the "save token" button.
                            </div>
                        </div>
                        <div class="ee-fieldsContainer-fieldset">
                            <div class="ee-field">
                                <!-- <div class="ee-field-description-label">
                                    User token</div> -->
                                <!-- <div class="ee-field-description">
                                    Enter the user token provided from your Embed360.io portal</div> -->
                                <div id="ee-cnames-list">
                                    <div class="ee-text">
                                        <input type="text" id="user_token" name="etsy_embed_settings[user_token][0]"
                                            value="<?php echo esc_html(get_option('user_token')); ?>" placeholder="e.g. ert2444qsda44tfadd2344dadd" class="">
                                        <div class="ee-field-description ee-field-description-helper">
                                            
                                            <!-- <a href="#">here.</a> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="ee-field ee-field-account">
                                    <a href="#" id="validate-token-button" target="_blank"
                                        class="ee-button ee-button--icon ee-button--small">Save Token</a>
                                </div>

                            </div>

                        </div>

                        <div class="ee-optionHeader">
                            <h3 class="ee-title2">Installation Video</h3>
                        </div>

                        <div class="ee-fieldsContainer">
                            <div class="ee-fieldsContainer-description">
                                Use the below video to complete the installation. <strong>Step 1</strong>
                                has already been completed
                                so you'll move onto <strong>Steps 2</strong>. The video will use the instructions located <a
                                    target="_blank" href="https://embed360.io/setup/#step2">here</a> .
                            </div>
                        </div>

                        <div class="ee-field ee-field-account">
                            <div class="videoWrapper">
                                <iframe src="https://www.youtube.com/embed/5lFQiK5Oh90?start=182"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </section>

    </div>

</div>