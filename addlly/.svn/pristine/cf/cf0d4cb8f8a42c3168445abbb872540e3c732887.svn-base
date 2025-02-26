<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<div class="addlly_wp_welcome_area">
    <div class="leftPart addlly_wp_left_area"> 
        <div class="logo">
            <img src="<?php echo esc_url(ADDLLY_URL); ?>/assets/images/w-logo.png" alt="Addlly Logo">
        </div>
        <p><strong><?php esc_html_e("Thanks for installing the Addlly AI plug in.", "addlly"); ?></strong></p>
        <p><strong><?php esc_html_e("To start creating blogs that top search rankings", "addlly"); ?></strong>, <?php esc_html_e("log in using your Addlly AI account.", "addlly"); ?></p>
        <p><strong><?php esc_html_e("Follow these steps after logging in for a seamless experience:", "addlly"); ?></strong></p>
        <ul>      
            <li><span class="nmbr">01</span><strong><?php esc_html_e("Discover Topics:", "addlly"); ?></strong> <?php esc_html_e("Immediately after login, you can start by getting personalized, geo-targeted blog topic suggestions that are optimized for high search rankings.", "addlly"); ?></li>
            <li><span class="nmbr">02</span><strong><?php esc_html_e("Generate Content with One-Click:", "addlly"); ?></strong> <?php esc_html_e("Choose a topic from the suggestions, or use your own to let our Gen AI automatically craft a detailed, SEO-optimized blog post—no input needed beyond your selection.", "addlly"); ?></li>
            <li><span class="nmbr">03</span><strong><?php esc_html_e("Edit and Publish Effortlessly:", "addlly"); ?></strong> <?php esc_html_e("Review and tweak your blog in the WordPress editor. When you’re satisfied, publish it with a single click, complete with all SEO enhancements like meta titles and descriptions.", "addlly"); ?></li>
            <li><span class="nmbr">04</span><strong><?php esc_html_e("Amplify Your Reach:", "addlly"); ?></strong> <?php esc_html_e("Utilize our built-in tools to create compelling social media posts directly linked to your new blog, enhancing visibility and engagement across platforms.", "addlly"); ?></li>
        </ul>
        <p><strong><?php esc_html_e("First Time Here?", "addlly"); ?></strong> <?php esc_html_e("Simply create an account using your work email to begin your journey to content excellence with Addlly AI.", "addlly"); ?></p>
    </div>
    <div class="rightPart maingenrateBlock addlly_wp_signin">
        <div class="innerFields">
            <div class="form-heading">
                <h4><?php esc_html_e("Welcome Back!", "addlly"); ?></h4>
                <span><?php esc_html_e("Sign in to continue", "addlly"); ?></span>
            </div>
            <form id="addlly-login-form" class="w-100" method="post" action="<?php echo esc_url(admin_url('admin.php?page=addlly')); ?>">
                <?php wp_nonce_field('addlly_nonce', 'login_form'); ?>
                <div class="genrateFields">
                    <div class="m-0 row">
                        <div class=" p-0 col-xl-12">
                            <div class="fields">
                                <label class="color-light-text p-0"><?php esc_html_e("Username / Email", "addlly"); ?> <sup>*</sup></label>
                                <div class="inputField">
                                    <input type="text" name="username" placeholder="Enter username / email">
                                    <div data-lastpass-icon-root="" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div>
                                </div>
                                <div class="invalid"></div>
                            </div>
                        </div>
                        <div class="p-0 mt-3 col-xl-12">
                            <div class="fields">
                                <label class="color-light-text p-0"><?php esc_html_e("Password", "addlly"); ?> <sup>*</sup></label>
                                <div class="inputField passField">
                                    <input type="password" name="password" placeholder="Enter password">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" color="#50506A" type="button" height="16" width="16" xmlns="http://www.w3.org/2000/svg" style="color: rgb(80, 80, 106);">
                                    <path d="M942.2 486.2C847.4 286.5 704.1 186 512 186c-192.2 0-335.4 100.5-430.2 300.3a60.3 60.3 0 0 0 0 51.5C176.6 737.5 319.9 838 512 838c192.2 0 335.4-100.5 430.2-300.3 7.7-16.2 7.7-35 0-51.5zM512 766c-161.3 0-279.4-81.8-362.7-254C232.6 339.8 350.7 258 512 258c161.3 0 279.4 81.8 362.7 254C791.5 684.2 673.4 766 512 766zm-4-430c-97.2 0-176 78.8-176 176s78.8 176 176 176 176-78.8 176-176-78.8-176-176-176zm0 288c-61.9 0-112-50.1-112-112s50.1-112 112-112 112 50.1 112 112-50.1 112-112 112z"></path>
                                    </svg>
                                    <div data-lastpass-icon-root="" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div>
                                </div>
                                <div class="invalid"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-4">
                    <a type="button" class="forgotBtn text-align-leftd-block mt-3 " href="https://staging.addlly.ai/forgot-password" target="_blank">Forgot Password ?</a>
                </div>
                <div class="authenticate-button d-flex align-items-center">
                    <button type="submit" disabled="" class="w-100 justify-content-center align-items-center">
                        <?php esc_html_e("Sign In", "addlly"); ?>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"></path>
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"></path>
                        </svg>
                    </button>
                </div>
                <div class="registerLink"><span><?php esc_html_e("Don't have an account?", "addlly"); ?> <a type="button" href="https://staging.addlly.ai/signup-wordpress" target="_blank"><?php esc_html_e("Register", "addlly"); ?></a> <?php esc_html_e("for free", "addlly"); ?></span></div>
            </form>
            <div class="registerLink mt-3"><span><?php esc_html_e("Facing an issue? Reach out to our", "addlly"); ?> <a type="button" href="https://app.addlly.ai/support" target="_blank"><?php esc_html_e("support!", "addlly"); ?></a></span></div>
        </div>
        <div class="privacy-policy"><span><?php esc_html_e("By using addlly.ai you agree to the", "addlly"); ?></span><span><?php esc_html_e("Terms", "addlly"); ?> <span class="endSign">&amp;</span> <?php esc_html_e("Privacy Policy", "addlly"); ?></span></div>
    </div>
</div>
<div id="addlly_loader">
    <img src="<?php echo esc_url(ADDLLY_URL); ?>/assets/images/addlly-primary-loader.gif" alt="Loader">
</div>   
