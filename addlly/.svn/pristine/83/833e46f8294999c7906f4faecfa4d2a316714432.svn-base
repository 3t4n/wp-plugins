<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<div id="ai_brand_images" class="tabsData d-none" data-id="<?php echo absint($id); ?>" data-type="<?php echo esc_attr($active_tab); ?>">
    <div class="uploadImageB">
        <div class="d-flex header flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div class="d-flex tabsClick">
                <button data-bs-target="uploadComputer" class="active"><?php esc_html_e('Create', 'addlly'); ?></button>
                <button data-bs-target="renderImages" class=""><?php esc_html_e('Renderings', 'addlly'); ?><span class="total-images-circle"><span class="total-images">00</span></span></button>
                <button data-bs-target="galleryImages" class=""><?php esc_html_e('Gallery', 'addlly'); ?><span class="total-images-circle"><span class="total-images">00</span></span></button>
            </div>
        </div>
        <div id="uploadComputer" class="aiBrandImagesCards uploadTabsData brandchooseFile ai model pe-2 overflow-auto" style="height: calc(-275px + 100vh);">
            <form id="uploadForm" method="post" enctype="multipart/form-data">
                <div class="d-flex gap-3 flex-wrap genrateButton_ adddUploadedImages">
                    <?php $rand_id = wp_rand(12345, 11111); ?>
                    <div id="chooseCard-<?php echo esc_attr($rand_id); ?>" class="brandAi-filUploader chooseCard">
                        <label class="sc-aXZVg kGRXWn w-100">
                            <div class="file-holder">
                                <input accept=".jpg,.png,.jpeg" type="file" name="files[]" data-id="<?php echo esc_attr($rand_id); ?>">
                            </div>
                            <div class="fileUploadBlock position-relative ">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="uploadIcon" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.5 14.5V11h1v3.5a.5.5 0 0 1-1 0z"></path>
                                </svg>
                                <h4 class="form-label"><strong><?php esc_html_e('Choose a file', 'addlly'); ?></strong> <?php esc_html_e('or drag it here', 'addlly'); ?></h4>
                                <p class="m-0 image-types"><?php esc_html_e('Supported formats: jpg, jpeg, png; maximum file size: 5MB.', 'addlly'); ?></p>
                            </div>
                        </label>
                    </div>
                    <div class="image-preview-content chooseCard position-relative d-flex justify-content-center"></div>
                    <div class="genrateButton_ text-center d-flex justify-content-center align-items-center">
                        <button class="blogButton border-0" disabled=""><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"></path>
                            </svg><span><?php esc_html_e('Confirm &amp; Generate', 'addlly'); ?></span></button>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="infoIconSvg" data-bs-toggle="tooltip" title="Generate AI images based on uploaded image" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path>
                        </svg>
                    </div>
                </div>
            </form>
        </div>
        <div id="renderImages" class="aiBrandImagesCards d-none">
            <div class="fieldSetText position-relative">
                <p class="d-flex align-items-center gap-2 m-0 px-3">
                    <img src="<?php echo esc_url(ADDLLY_URL); ?>/assets/images/star-icon.svg" alt="glitterStar"> <?php esc_html_e('Generated Ai Brand Images', 'addlly'); ?>
                </p>
            </div>
        </div>
        <div id="galleryImages" class="aiBrandImagesCards d-none">
            <div class="fieldSetText position-relative">
                <p class="d-flex align-items-center gap-2 m-0 px-3">
                    <img src="<?php echo esc_url(ADDLLY_URL); ?>/assets/images/star-icon.svg" alt="glitterStar"> <?php esc_html_e('Generated Images', 'addlly'); ?>
                </p>
            </div>
        </div>
    </div>
</div>