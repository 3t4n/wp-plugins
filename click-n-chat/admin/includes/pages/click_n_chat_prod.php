<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_prod() {
	$nonce = 'activate-app';
	?>
     <div class="tab-content p-5 m-3">
		<a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <img width="40px" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL .'assets/images/cncsicon.png'); ?>" />&nbsp;<span class="fs-4"><b>Click n Chat</b></span>
		</a>
		<form id="userForm" method="post" enctype="multipart/form-data">
        	<?php wp_nonce_field($nonce, '_wpnonce'); ?>
            <input type="hidden" name="action" value="activ893046">
            <table class="form-table">
                <tr>
                    <th><label for="purchase_code"><?php _e('Purchase Code:', 'click-n-chat-activation'); ?></label></th>
                    <td><input type="text" id="purchase_code" name="purchase_code" class="regular-text" value="<?php echo esc_attr(get_option('purchase_code')); ?>" placeholder="Codecanyon Purchase Code" required></td>
                </tr>
            </table>
            <div style="width:100%">
                <input type="submit" name="submit" id="submit" class="w-100 btn btn-outline-primary" value="Activate">
            </div>
        </form>
		<p>
            <ol>
                <li>
                    <p><strong>Log in to Your Account</strong>: Go to the CodeCanyon website and log in to your account.</p><div class="mb-2"></div>
                </li>
                <li>
                    <p><strong>Go to Downloads</strong>: Once logged in, navigate to your profile and click on the "Downloads" section. This is usually found in the dropdown menu under your profile picture.</p><div class="mb-2"></div>
                </li>
                <li>
                    <p><strong>Find Your Purchase</strong>: In the Downloads section, you will see a list of all the items you have purchased. Locate the item for which you need the purchase code.</p><div class="mb-2"></div>
                </li>
                <li>
                    <p><strong>View Purchase Code</strong>: Next to the item, there should be a button or link labeled "License Certificate" or "Download." Click on it, and it will provide you with a PDF file that contains your purchase code along with other details about your purchase.</p><div class="mb-2"></div>
                </li>
                <li>
                    <p><strong>Copy the Purchase Code</strong>: Open the PDF file, and you will find your purchase code listed there.</p><div class="mb-2"></div>
                </li>
            </ol>
        </p>
    </div>
	<?php
}