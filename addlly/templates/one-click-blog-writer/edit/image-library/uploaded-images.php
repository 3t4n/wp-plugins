<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<div id="uploaded_images" class="tabsData d-none" data-id="<?php echo absint($id); ?>" data-type="<?php echo esc_attr($active_tab); ?>">
    <div class="uploadImageB">
        <div class="d-flex header flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div class="d-flex tabsClick ">
                <button data-bs-target="uploadComputer" class="active"><?php esc_html_e('Upload from computer', 'addlly'); ?></button>
                <button data-bs-target="galleryImages" class=""><?php esc_html_e('Gallery', 'addlly'); ?><span class="total-images-circle"><span class="total-images">00</span></span></button>
            </div>
            <div class="selectIamgesB d-flex align-items-center">
                <button type="button" class="blogButton border-0" disabled>
                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" class="fs-5" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                    </svg>
                    <span><?php esc_html_e('Upload Images', 'addlly'); ?></span>
                </button>
            </div>
        </div>
        <div id="uploadComputer" class="uploadTabsData brandchooseFile ai model pe-2 overflow-auto" style="height: calc(-275px + 100vh);">
            <form id="uploadForm" method="post" enctype="multipart/form-data">
                <div class="d-flex gap-3 flex-wrap genrateButton_">
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
                </div>
            </form>
        </div>
        <div id="galleryImages" class="uploadTabsData genrateImagesCards d-flex flex-wrap d-none">
            
        </div>
    </div>
</div>