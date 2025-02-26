<script>
    document.addEventListener('DOMContentLoaded', function() {
        var hiddenInput = document.getElementById('achat-enable-hidden');
        var checkbox = document.getElementById('enable_chat');

        // Function to toggle the value of the hidden input based on the checkbox state
        function toggleHiddenInputValue() {
            hiddenInput.value = checkbox.checked ? 1 : 0;
        }

        // Toggle the value initially
        toggleHiddenInputValue();

        // Add event listener to the checkbox for change event
        checkbox.addEventListener('change', function() {
            toggleHiddenInputValue();
        });


        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
            panel.style.display = "none";
            } else {
            panel.style.display = "block";
            }
        });
        }
  

    });

</script>
<?php
    if (
        isset($_POST['auchat_settings_page_nonce']) &&
        wp_verify_nonce($_POST['auchat_settings_page_nonce'], 'auchat_settings_page_action')
    ) {
        // Sanitize and save the values
        // if (isset($_POST['enable_chat'])) {
        //     // If checked, update the option with the checkbox value
        //     update_option('enable_chat_feature', 1);
        // } else {
        //     // If unchecked, update the option with a default value (e.g., 0 or false)
        //     update_option('enable_chat_feature', 1);
        // }
        
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['achat-enable'])) {
                $enable_chats = isset($_POST['achat-enable']) && $_POST['achat-enable'] == 1 ? 1 : 0;
                
               
                // Update option
                update_option('enable_chat_feature', $enable_chats);
                update_option('ch_brnd_name_option', sanitize_text_field($_POST['brand-name']));
                update_option('achat_brand_color', sanitize_text_field($_POST['achat_brand_color']));
                update_option('achat_seondary_color', sanitize_text_field($_POST['achat_seondary_color']));
                update_option('achat_text_color', sanitize_text_field($_POST['achat_text_color']));
                        // Handle file upload
             if (isset($_POST['icon-file'])) {
                update_option('ac_icon_image_option', esc_url_raw($_POST['icon-file']));
            }
   
                // wp_redirect(admin_url('admin.php?page=custom-media-upload&status=success'));
                // exit;
            }

            add_action('admin_init', 'create_image_box');
            function create_image_box() {
            add_meta_box( 'meta-box-id', 'Image Field', 'display_image_box', 'post', 'normal', 'high' );
            }
            function display_image_box() {
                global $post;
                 $image_id = get_post_meta($post->ID,'xxxx_image', true);
                echo 'Upload an image: <input type="file" name="xxxx_image" id="xxxx_image" />';}
    }
?>

<?php 
    $upload_image       =  PCHBASE_URL . 'assets/images/avatar.png' ;
    $upload_remove_x    = PCHBASE_URL . 'assets/images/x_black.png';
    $chat_icon_one      = PCHBASE_URL . 'assets/images/chat-icon-1.png';
    $chat_icon_two      = PCHBASE_URL . 'assets/images/chat-icon-2.png';
    $chat_icon_three    = PCHBASE_URL . 'assets/images/chat-icon-3.png';
    $chat_icon_four     = PCHBASE_URL . 'assets/images/chat-icon-4.png';
    $chat_icon_five     = PCHBASE_URL . 'assets/images/chat-icon-5.png';
    $chat_icon_six      = PCHBASE_URL . 'assets/images/chat-icon-6.png';
    $chat_icon_seven    = PCHBASE_URL . 'assets/images/chat-icon-7.png';
    $chat_icon_eight    = PCHBASE_URL . 'assets/images/chat-icon-8.png';
    $chat_icon_nine     = PCHBASE_URL . 'assets/images/chat-icon-9.png';
    $chat_icon_ten      = PCHBASE_URL . 'assets/images/chat-icon-10.png';
    $chat_icon_eleven   = PCHBASE_URL . 'assets/images/chat-icon-11.png';
    $chat_icon_twelve   = PCHBASE_URL . 'assets/images/chat-icon-12.png';
    $chat_icon_thirteen = PCHBASE_URL . 'assets/images/chat-icon-13.png';
    $chat_icon_fourteen  = PCHBASE_URL . 'assets/images/chat-icon-14.png';


?>
<div class="ac-main-wrapper" >
    <h3 class="border-bottom section-padding">Settings</h3>

  <form method="post" action="" enctype="multipart/form-data">
   <?php wp_nonce_field('auchat_settings_page_action', 'auchat_settings_page_nonce'); ?>


    <!-- AUTO CHAT NEW SETTINGS PAGE -->

    <div class="flex-layout primary-bg">
        <div class="autochat-activation">
            <h4>Activate Autochat</h4>
            <p>By activating Autochat, a chatbox will appear on your websites</p>
        </div>
        <div class="ac-input-area">
            <label class="switch">
                <input type="hidden" name="achat-enable" id="achat-enable-hidden" value="1">
                <input id="enable_chat" type="checkbox" name="enable_chat_feature" <?php echo get_option('enable_chat_feature') == 1 ? 'checked' : ''; ?> class="achat-form-toggle-input">
                <span class="slider round"></span>
            </label>
        </div>
    </div>
    <p class="section-header section-padding">General</p>
    <div class="flex-layout primary-bg">
        <div class="login-area">
            <h4>Log in required</h4>
            <p>Single shared standard for the web content accessibility that means the needs of individual</p>
        </div>
        <div class="ac-input-area">
            <label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
            </label>
        </div>
    </div>
    <p class="section-header section-padding">Widget Personalization</p>
    <div class="settings-area primary-bg">
        <div class="flex-layout border-bottom">
            <div class="title-area">
                <h4>Title</h4>
                <p>Widget title appears on the header</p>
            </div>
            <div class="ac-input-area">
                <input class="achat-inp" type="text" name="brand-name" placeholder="Chat with us" value="<?php echo get_option('ch_brnd_name_option'); ?>">
            </div>
        </div>
    
        <div class="flex-layout border-bottom">
            <div class="brand-icon">
                <h4>Brand Icon</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, eos!</p>
                <input type="checkbox" id="check"> <label for="check">Take from the Website</label>
            </div>
            <div class="ac-input-area file-type-layout">
       
                <div class="file-type">
                     
                    <input type="hidden" name="icon-file" id="icon-file" value="<?php echo esc_url(get_option('ac_icon_image_option')); ?>">
                    <img id="icon-file-preview" class="upload-image" src="<?php echo esc_url(get_option('ac_icon_image_option')); ?>" alt="Upload Image">
                    <button id="upload_image_button" type="button" class="button">Upload Image</button>
                </div>

                <button class="remove-button">
                    Remove <span class="remove-icon"><img src="<?php echo esc_url($upload_remove_x); ?>" alt=""></span>
                </button>
            </div>
        </div>
 
            <!-- <div class="bubble-type-area border-bottom">
                <div class="flex-layout">
                    <h4>Bubble Type</h4>
                    <div class="ac-input-area">
                        <div class="select-box">
                            <select name="bubbleType" id="bubbleType">
                                <option value="">Select an option</option>
                                <option value="text_icon">Text & Icon</option>
                                <option value="text">Text</option>
                                <option value="icon">Icon</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex-layout basic-margin" id="bubbleTextArea">
                    <p>Bubble text</p>
                    <div class="ac-input-area">
                        <input type="text" placeholder="placeholder text">
                    </div>
                </div>
                <div class="flex-layout basic-margin" id="bubbleIconArea">
                    <p>Bubble icon</p>
                    <div class="ac-input-area">
                        <div class="ac-icon-select-box" id="icon-selector">
                            <div class="selected">
                                
                                <span>Select an icon</span>
                            </div>
                            <div class="options">
                                <div data-value="chat-icon-1" data-icon="<?php echo esc_url($chat_icon_one); ?>">
                                    <img src="<?php echo esc_url($chat_icon_one); ?>" alt="Chat Icon 1"> 
                                </div>
                                <div data-value="chat-icon-2" data-icon="<?php echo esc_url($chat_icon_two); ?>">
                                    <img src="<?php echo esc_url($chat_icon_two); ?>" alt="Chat Icon 2"> 
                                </div>
                                <div data-value="chat-icon-3" data-icon="<?php echo esc_url($chat_icon_three); ?>">
                                    <img src="<?php echo esc_url($chat_icon_three); ?>" alt="Chat Icon 3"> 
                                </div>
                                <div data-value="chat-icon-4" data-icon="<?php echo esc_url($chat_icon_four); ?>">
                                    <img src="<?php echo esc_url($chat_icon_four); ?>" alt="Chat Icon 4"> 
                                </div>
                                <div data-value="chat-icon-5" data-icon="<?php echo esc_url($chat_icon_five); ?>">
                                    <img src="<?php echo esc_url($chat_icon_five); ?>" alt="Chat Icon 5"> 
                                </div>
                                <div data-value="chat-icon-6" data-icon="<?php echo esc_url($chat_icon_six); ?>">
                                    <img src="<?php echo esc_url($chat_icon_six); ?>" alt="Chat Icon 6"> 
                                </div>
                                <div data-value="chat-icon-7" data-icon="<?php echo esc_url($chat_icon_seven); ?>">
                                    <img src="<?php echo esc_url($chat_icon_seven); ?>" alt="Chat Icon 7"> 
                                </div>
                                <div data-value="chat-icon-8" data-icon="<?php echo esc_url($chat_icon_eight); ?>">
                                    <img src="<?php echo esc_url($chat_icon_eight); ?>" alt="Chat Icon 8"> 
                                </div>
                                <div data-value="chat-icon-9" data-icon="<?php echo esc_url($chat_icon_nine); ?>">
                                    <img src="<?php echo esc_url($chat_icon_nine); ?>"alt="Chat Icon 9"> 
                                </div>
                                <div data-value="chat-icon-10" data-icon="<?php echo esc_url($chat_icon_ten); ?>">
                                    <img src="<?php echo esc_url($chat_icon_ten); ?>" alt="Chat Icon 10"> 
                                </div>
                                <div data-value="chat-icon-11" data-icon="<?php echo esc_url($chat_icon_eleven); ?>">
                                    <img src="<?php echo esc_url($chat_icon_eleven); ?>" alt="Chat Icon 11"> 
                                </div>
                                <div data-value="chat-icon-12" data-icon="<?php echo esc_url($chat_icon_twelve); ?>">
                                    <img src="<?php echo esc_url($chat_icon_twelve); ?>" alt="Chat Icon 12"> 
                                </div>
                                <div data-value="chat-icon-13" data-icon="<?php echo esc_url($chat_icon_thirteen); ?>">
                                    <img src="<?php echo esc_url($chat_icon_thirteen); ?>" alt="Chat Icon 13"> 
                                </div>
                                <div data-value="chat-icon-14" data-icon="<?php echo esc_url($chat_icon_fourteen); ?>">
                                    <img src="<?php echo esc_url($chat_icon_fourteen); ?>" alt="Chat Icon 14"> 
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            
            
            <!-- <div class="flex-layout border-bottom">
                <div class="position-area">
                    <h4>Position</h4>
                </div>
                <div class="ac-input-area">
                   <div class="select-box">
                    <select name="" id="">
                        <option value="">Right</option>
                        <option value="">Left</option>
                        <option value="">Center</option>
                       </select>
                   </div>
                </div>
            </div> -->

            <!-- <div class="">
                <div class="widget-text-area border-bottom">
                    <h4>Widget Text</h4>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                    <textarea name="" id="" placeholder="placeholder text"></textarea>
                </div>
            </div>
            <div class="ac-theme-area light-theme">
                <div class="flex-layout">
                    <div class="theme">
                        <h4>Theme</h4>
                    </div>
                    <div class="ac-input-area">
                        <div class="select-box">
                            <select id="theme-selector">
                                <option value="light">Light</option>
                                <option value="dark">Dark</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>  -->
            <div class="colors-area">
                <h4>Colors</h4>
                <div class="flex-layout">
                    <div class="single-color">
                        <p>Brand Color</p>
                        <input type="text" name="achat_brand_color" value="<?php echo esc_attr( get_option('achat_brand_color') ); ?>" class="my-color-field" />
                    </div>
                    <div class="single-color">
                        <p>Secondary Color</p>
                        <input type="text" name="achat_seondary_color" value="<?php echo esc_attr( get_option('achat_seondary_color') ); ?>" class="my-color-field" />
                    </div>
                    <div class="single-color">
                        <p>Text Color</p>
                        <input type="text" name="achat_text_color" value="<?php echo esc_attr( get_option('achat_text_color') ); ?>" class="my-color-field" />
                    </div>
                </div>
            </div>
        </div>
        <!-- AUTO CHAT NEW SETTINGS PAGE -->

            <div class="final-submit-btn">
                <input type="submit" class="button-save" value="Save Changes" />
            </div>
        </form>

    </div>
    <?php


