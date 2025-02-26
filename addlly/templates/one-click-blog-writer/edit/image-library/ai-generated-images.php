<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<div id="ai_generated_images" class="tabsData" data-id="<?php echo absint($id); ?>" data-type="<?php echo esc_attr($active_tab); ?>">
    <div class="topButtonBlock d-flex align-items-center gap-3 justify-content-between">
        <div class="leftBtns d-flex flex-wrap gap-3 align-items-center">
            <div class="genButton d-flex gap-3 align-items-center">
                
                <div class="dropdown versionHistory">
                    <div class="drop">
                        <button>
                            <span><?php esc_html_e('Version history', 'addlly'); ?></span>
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                            </svg>
                        </button>
                        <ul class="dropdown-menu_ bg-white d-none">
                        </ul>
                    </div>
                </div>
                
                <button type="button" class="blogButton border-0 re-generate-btn d-none" data-id="<?php echo absint($id); ?>" data-type="<?php echo esc_attr($active_tab); ?>">
                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                         stroke-linejoin="round" class="fs-6" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <polyline points="23 4 23 10 17 10"></polyline>
                        <polyline points="1 20 1 14 7 14"></polyline>
                        <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                    </svg>
                    <span><?php esc_html_e('Re-Generate', 'addlly'); ?> </span>
                </button>

                <button disabled type="button" class="blogButton border-0 generate-btn" data-id="<?php echo absint($id); ?>" data-type="<?php echo esc_attr($active_tab); ?>">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"></path></svg>
                    <span><?php esc_html_e('Generate Images', 'addlly'); ?> </span>
                </button>
                
                <div class="infoIconSvg" data-bs-toggle="tooltip" title="<?php esc_html_e('You can re-generate only 3 times', 'addlly'); ?>" data-placement="bottom">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" type="button"
                         class="text-decoration-none outline-0 me-2 fs-5" height="1em"
                         width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="selectIamgesB d-flex align-items-center gap-3">
            <p data-tooltip-id="addlly-tooltip" data-tooltip-content="<?php esc_html_e('This feature is currently in development; generations are free, with a maximum of three regenerations allowed, and some issues may occur.', 'addlly'); ?>" data-tooltip-place="bottom-end">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="fs-4"
                     height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="fill: rgb(0, 57, 255);">
                    <path
                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z">
                    </path>
                </svg>
            </p>
        </div>
    </div>
    <div class="aiGeneratedImagesCards">
    </div>  
</div>