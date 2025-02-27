<?php
    
    $plugin_version = $this->version;
    
    // Arguments to query all posts with the 'gizzmo_post' meta key
    $args = array(
        'meta_key'   => 'gizzmo_post',
        'meta_value' => true,
        'post_type'  => 'post',
        'post_status' => array('draft', 'publish', 'pending', 'future', 'private') // Include any status you want to consider
    );

    // Query the posts
    $gizzmo_posts = new WP_Query($args);

    // Initialize an array to hold the post info
    $post_info_array = array();

    if ($gizzmo_posts->have_posts()) {
        while ($gizzmo_posts->have_posts()) {
            $gizzmo_posts->the_post();
            $post_id = get_the_ID();
            $post_status = get_post_status($post_id);
            
            


            $post_link = '';
            $post_edit_link = '';
            if ($post_status === 'publish') {
                $post_status = 'Published';
                $post_link = get_permalink($post_id); // Get the permalink for the published post
            } 
            else
            {
                #get post preview link
                $post_link = get_permalink($post_id);
                $post_edit_link = admin_url('post.php?post=' . $post_id . '&action=edit');
            }
            #elseif ($post_status === 'draft') {
            #    $post_status = 'in progress';
            #} elseif ($post_status === 'pending') {
            #    $post_status = 'pending';
            #} elseif ($post_status === 'future') {
            #    $post_status = 'scheduled';
            #} elseif ($post_status === 'private') {
            #    $post_status = 'private';
            #}



            // Add the post_id-post_status string to the array
            $post_info_array[] = $post_id . '^' . ucfirst($post_status) . '^' . $post_link . '^' . $post_edit_link;
        }
        wp_reset_postdata();
    }

    // Convert the array into a comma-separated string
    $post_info_string = implode(',', $post_info_array);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gizzmo Posts</title>
    <link href="<?php echo plugin_dir_url( __FILE__ ) . 'css/app.css'; ?>" rel="stylesheet">
    <link href="<?php echo plugin_dir_url( __FILE__ ) . 'css/work_area.css'; ?>" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="gizzmo_header">
        <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/gizzmo_logo.svg'; ?>" alt="Gizzmo Logo" class="gizzmo_logo">
        <div class="header-links">
            <input type="hidden" id="plugin_version" value="<?php echo $plugin_version; ?>" />
            <span id="countown24timer" title="For the next 24 hours, you’ll enjoy Free access to all premium features and tools. Explore everything Gizzmo.ai has to offer before returning to the Free plan. Upgrade anytime to keep these powerful features!" style="color: #646970;border: 1px solid #ffb02e;border-radius: 3px;padding: 5px;padding-left: 20px;padding-right: 20px;display:none"></span>
            <span style="font-size: 12px;color: #646970;"><?php echo sprintf( esc_html__('V. %s', 'gizzmo-ai'), esc_html( $plugin_version ) ); ?></span>
            <span style="font-size: 12px;color: #646970;">TOKEN: <span id="token" style="color:#5a10b9;text-decoration:underline;cursor:pointer"></span></span>
            <div class="pro-link">
                <a target="_blank" href="https://gizzmo.ai/" id="package_name" style="color: #5a10b9;border: 1px solid #5a10b9;border-radius: 3px;padding: 5px;padding-left: 20px;padding-right: 20px;">Free</a>
                <div id="paid_packages_submenu" class="submenu">
                    <p><?php echo esc_attr__("Package: ", 'gizzmo-ai'); ?><span id="pkg_name" style="color:#5a10b9"><?php echo esc_attr__("Free", 'gizzmo-ai'); ?></span></p>
                    <p><?php echo esc_attr__("Credits: ", 'gizzmo-ai'); ?><span id="total_credits" style="color:#5a10b9"><?php echo esc_attr__("0", 'gizzmo-ai'); ?></span></p>
                    <p><?php echo esc_attr__("Credits Used: ", 'gizzmo-ai'); ?><span id="credits_used" style="color:#5a10b9"><?php echo esc_attr__("0", 'gizzmo-ai'); ?></span></p>
                    <p><?php echo esc_attr__("Credits Left: ", 'gizzmo-ai'); ?><span id="credits_left" style="color:#5a10b9"><?php echo esc_attr__("0", 'gizzmo-ai'); ?></span></p>
                    <p><?php echo esc_attr__("Days Left: ", 'gizzmo-ai'); ?><span id="days_left" style="color:#5a10b9"><?php echo esc_attr__("0", 'gizzmo-ai'); ?></span></p>
                    <p><?php echo esc_attr__("Auto Renew: ", 'gizzmo-ai'); ?><span id="rrenew_date" style="color:#5a10b9"><?php echo esc_attr__("0", 'gizzmo-ai'); ?></span></p>
                    <a href="https://app.gizzmo.ai?p=login&upgrade=true" target="_blank" style="color: #ffffff;border: 1px solid #5a10b9;border-radius: 3px;padding: 5px;padding-left: 20px;padding-right: 20px;text-align: center;background-color: #5a10b9;"><?php echo esc_attr__("Upgrade", 'gizzmo-ai'); ?></a>
                </div>
            </div>
            <a id="upgrade_package" href="https://app.gizzmo.ai?p=login&upgrade=true" target="_blank" style="color: #ffffff;border: 1px solid #5a10b9;border-radius: 3px;padding: 4px;padding-left: 20px;padding-right: 20px;margin-top: -1px;background-color: #5a10b9;"><?php echo esc_attr__("UPGRADE", 'gizzmo-ai'); ?></a>
            <a href="https://gizzmo.helpscoutdocs.com/" target="_blank"><?php echo esc_attr__("Support", 'gizzmo-ai'); ?></a>
            <a href="https://www.facebook.com/share/g/1VXacs5iVBauo2TM/" target="_blank"><?php echo esc_attr__("Facebook Group", 'gizzmo-ai'); ?></a>
            <a href="https://app.gizzmo.ai/?p=login" target="_blank"><?php echo esc_attr__("Your Account", 'gizzmo-ai'); ?></a>
        </div>
    </header>
    <div class="gizzmo_creation_container">
        <div class="products_wrapper two-fourth" style="max-width: 700px !important;">

            <div class="tabset">
                <!-- Tab 1 -->
                <input type="radio" name="tabset" id="tab1" aria-controls="posts_in_progress" checked>
                <label for="tab1"><?php echo esc_attr__("Posts", 'gizzmo-ai'); ?></label>
                <!-- Tab 2 -->
                <input type="radio" name="tabset" id="tab2" aria-controls="archived_posts">
                <label for="tab2"><?php echo esc_attr__("Posts Archive", 'gizzmo-ai'); ?></label>
                
                
                <div class="tab-panels" style="min-width: 585px;">
                    <section id="posts_in_progress" class="tab-panel">
                        <div id="posts"></div>
                        <div id="promotion-div-posts_in_progress" class="promotion-div" style="display:none">
                            <h2><?php echo esc_attr__("No Posts Found", 'gizzmo-ai'); ?></h2>
                        </div>
                    </section>
                    <section id="archived_posts" class="tab-panel">
                        <div id="posts_published"></div>
                        <div id="promotion-div-posts_published" class="promotion-div" style="display:none">
                        <h2><?php echo esc_attr__("No Archived Posts Found", 'gizzmo-ai'); ?></h2>
                        </div>
                    
                    </section>
                </div>
            
            </div>
        </div>
        <div class="two-fourths">
             
        </div>
    </div>

    <input type="hidden" id="wp_gizzmo_posts" name="post_info" value="<?php echo esc_attr($post_info_string); ?>">

    <input type="hidden" id="main_account_id" name="main_account_id" value="">
    <input type="hidden" id="main_property_id" name="main_property_id" value="">
    <input type="hidden" id="main_package_name" name="main_package_name" value="">
                                    
    <div id="forms_wrapper">
        <form id="save_content_as_draft_form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
            <input type="hidden" name="action" value="save_content_as_draft_form">
            <input type="hidden" name="gizzmo_nonce" value="<?php echo wp_create_nonce('gizzmo_nonce_action'); ?>">
            <input type="hidden" id="form_task_id" name="form_task_id" value="">
            <input type="hidden" name="save_content_as_draft_submitted" value="yes">
        </form>
     </div>

 

    <!-- Delete Confirmation Modal -->
    <div id="deleteConfirmationModal" class="modal">
        <div class="modal-content" style="max-width: 350px;">
            <span class="close" onclick="closeModal('deleteConfirmationModal')">&times;</span>
            <p><?php echo esc_attr__("Are you sure you want to delete this affiliate tag?", 'gizzmo-ai'); ?></p><br>
            <button type="button" class="modal-button" onclick="confirmDelete()"><?php echo esc_attr__("Yes, Delete", 'gizzmo-ai'); ?></button>
            <button type="button" class="modal-button cancel" onclick="closeModal('deleteConfirmationModal')"><?php echo esc_attr__("Cancel", 'gizzmo-ai'); ?></button>
        </div>
    </div>

    <!-- Login/Sign Up Modal -->
    <div id="authModal" class="modal">
        <div class="modal-content" style="display: flex">
            <div class="left_side" style="width:50%">
            <div class="pop-promotion-container">
                <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/gizzmo_logo.svg'; ?>" alt="Gizzmo Logo">
                <p><?php echo esc_attr__("Supercharge Your Website with Gizzmo's Captivating, Conversion-Driven Commerce Articles", 'gizzmo-ai'); ?></p>
                <ul class="links">
                    <li><a href="https://gizzmo.ai" target="_blank"><?php echo esc_attr__("Gizzmo.ai", 'gizzmo-ai'); ?></a></li>
                    <li><a href="https://gizzmo.helpscoutdocs.com/" target="_blank"><?php echo esc_attr__("Support", 'gizzmo-ai'); ?></a></li>
                    <li><a href="https://gizzmo.ai/pricing" target="_blank"><?php echo esc_attr__("Pricing", 'gizzmo-ai'); ?></a></li>
                </ul>
            </div>    
            </div>
            <div class="right_side"  style="width:50%">
                <div class="tab-header" style="display:none">
                    <button id="loginTabButton" style="width: 50%;border: 0.5px solid #5a10b9; display:none" class="active" onclick="showTab('loginTab')"><?php echo esc_attr__("Login", 'gizzmo-ai'); ?></button>
                    <button id="signupTabButton" style="width: 100%;border: 0.5px solid #5a10b9;" onclick="showTab('signupTab')"><?php echo esc_attr__("Sign Up", 'gizzmo-ai'); ?></button>
                </div>
                <div id="loginTab" class="tab" style="display:none">
                    <form id="loginForm">
                        <label for="loginEmail"><?php echo esc_attr__("Email:", 'gizzmo-ai'); ?></label>
                        <input type="email" id="loginEmail" name="loginEmail" required>
                        <label for="loginPassword"><?php echo esc_attr__("Password:", 'gizzmo-ai'); ?></label>
                        <input type="password" id="loginPassword" name="loginPassword" required>
                        <button type="button" class="modal-button" onclick="login()"><?php echo esc_attr__("Login", 'gizzmo-ai'); ?></button>
                    </form>
                </div>
                <div id="signupTab" class="tab active">
                    <form id="signupForm">
                        <label for="signupName"><?php echo esc_attr__("Full Name: ", 'gizzmo-ai'); ?><span id="name_empty" style="color:red; display:none"><?php echo esc_attr__("Write your Full Name", 'gizzmo-ai'); ?></span></label>
                        <input type="text" id="signupName" name="signupName" required>
                        <label for="signupEmail"><?php echo esc_attr__("Email: ", 'gizzmo-ai'); ?><span id="email_invalid" style="color:red; display:none"><?php echo esc_attr__("Your Email is invalid", 'gizzmo-ai'); ?></span><span id="email_empty" style="color:red; display:none"><?php echo esc_attr__("Write your Email", 'gizzmo-ai'); ?></span><span id="email_exists" style="color:red; display:none"><?php echo esc_attr__("Email is already associated with a different domain", 'gizzmo-ai'); ?> </span></span></label>
                        <input type="email" id="signupEmail" name="signupEmail" required>
                        <label for="signupPassword"><?php echo esc_attr__("Password: ", 'gizzmo-ai'); ?><span id="password_length" style="color:red; display:none"><?php echo esc_attr__("password is too short, 6 characters minimum", 'gizzmo-ai'); ?></span><span id="password_mismatch_1" style="color:red; display:none"><?php echo esc_attr__("Passwords does not match", 'gizzmo-ai'); ?></span></label>
                        <input type="password" placeholder="6 characters password minimum" id="signupPassword" name="signupPassword" required>
                        <label for="signupVerifyPassword"><?php echo esc_attr__("Verify Password: ", 'gizzmo-ai'); ?><span id="password_mismatch_2" style="color:red; display:none"><?php echo esc_attr__("Passwords does not match", 'gizzmo-ai'); ?></span></label>
                        <input type="password"  placeholder="6 characters password minimum" id="signupVerifyPassword" name="signupVerifyPassword" required>
                        <!-- New checkbox for marketing consent -->
                        <label for="marketing_consent" style="font-weight: normal;">
                            <input type="checkbox" id="marketing_consent" name="marketing_consent" checked>
                            <?php echo esc_attr__("I would like to receive email updates and marketing materials from Gizzmo.", 'gizzmo-ai'); ?>
                        </label>

                        <button type="button" class="modal-button" onclick="signup()"><?php echo esc_attr__("Sign Up", 'gizzmo-ai'); ?></button>
                    </form>
                </div>
                <div id="forgotTab" class="tab">
                    <form id="forgotForm">
                        <label for="forgotEmail"><?php echo esc_attr__("Write Your Email, if email is registered, you will receive a Password Reminder:", 'gizzmo-ai'); ?></label>
                        <span id="remainder_email_invalid" style="color:red; display:none"><?php echo esc_attr__("Your Email is invalid", 'gizzmo-ai'); ?></span><span id="remainder_email_empty" style="color:red; display:none"><?php echo esc_attr__("Write your Email", 'gizzmo-ai'); ?></span>
                        <input type="email" placeholder="Write Your Email" id="forgotEmail" name="forgotEmail" required>
                        <button type="button" class="modal-button" onclick="forgot_email()"><?php echo esc_attr__("Send Password Reminder", 'gizzmo-ai'); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Out of credits Modal -->
    <input type="hidden" id="available_c" name="available_c" value="">
    <div id="outofcredits_Modal" class="modal">
        <div class="modal-content" style="display: flex">
            <span class="close" onclick="closeModal('outofcredits_Modal')">&times;</span>
            <div class="left_side" style="width:50%">
            <div class="pop-promotion-container">
                <img style="margin-bottom: 9px !important;"  src="<?php echo plugin_dir_url( __FILE__ ) . 'images/gizzmo_logo.svg'; ?>" alt="Gizzmo Logo">
                <p style="color: #5a10b9;"><?php echo esc_attr__("Your credits for this month have run out!", 'gizzmo-ai'); ?></p>
                <p style="font-size:14px; font-weight:normal"><?php echo esc_attr__("Upgrade your package now to get more credits and continue creating high-quality, conversion-focused articles. Don't let your content creation pause—upgrade today!", 'gizzmo-ai'); ?></p>
                <a id="upgrade_package" href="https://app.gizzmo.ai?p=login&upgrade=true" target="_blank" style="cursor:pointer;color: #ffffff;border: 1px solid #5a10b9;border-radius: 3px;padding: 4px;padding-left: 50px;padding-right: 50px;top: 9px;position:relative;background-color: #5a10b9;"><?php echo esc_attr__("UPGRADE", 'gizzmo-ai'); ?></a>
            </div>     
            </div>
            <div class="right_side"  style="width:50%">
                <a href="https://app.gizzmo.ai?p=login&upgrade=true" style="cursor:pointer;color: inherit;text-decoration: inherit;" target="_blank">
                    <div style="width:100%;height: 200px;background-size: cover;background-image:url('https://gizzmo.ai/wp-content/uploads/2023/06/How-to-write-a-product-review-by-midjourney.png');background-position: center;" >
                    </div>
                </a>
            </div>
        </div>
    </div>
     
    <!-- Loading Modal -->
    <div id="loading_Modal" class="modal">
        <div class="modal-content" style="display: flex;width: 60px;border-radius: 60px;height: 60px;">
            <div class="left_side" style="width:100%">
                <div class="pop-promotion-container" style="padding: 0px;">
                    <div id="main_spinner_loader" >
                        <svg style="width: 100px;height: 100px;display: inline;" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                            <path fill="#5a10b9" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                            <animateTransform 
                                attributeName="transform" 
                                attributeType="XML" 
                                type="rotate"
                                dur="1s" 
                                from="0 50 50"
                                to="360 50 50" 
                                repeatCount="indefinite" />
                        </path>
                        </svg>
                    </div>
                </div>    
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>
  
    <script src="<?php echo plugin_dir_url( __FILE__ ) . 'js/g_gizzmo.js'; ?>"></script>
    <script src="<?php echo plugin_dir_url( __FILE__ ) . 'js/g_gizzmo_addons.js'; ?>"></script>


    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        tippy('[x-tooltip]', {
          content(reference) {
            const id = reference.getAttribute('x-tooltip').split("'")[1];
            const template = document.querySelector(id);
            return template.innerHTML;
          },
          allowHTML: true,
          interactive: true
        });
      });
    </script>
    
</body>
</html>
