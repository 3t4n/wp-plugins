<?php
$authors = get_users();
?>
<div id="post" class="aliexpress-box-tab" data-nav="post" >

    <div class="aliexpress-box-header">
        <h2 class="aliexpress-box-title"><?php esc_html_e( 'Post Status, Type & Author', Auto_Aliexpress::DOMAIN ); ?></h2>
    </div>


    <div class="aliexpress-box-body">
        <div class="aliexpress-box-settings-row">
            <div class="aliexpress-box-settings-col-1">
                <span class="aliexpress-settings-label"><?php esc_html_e( 'Post Status', Auto_Aliexpress::DOMAIN ); ?></span>
            </div>
            <div class="aliexpress-box-settings-col-2">
                <div class="post-select-container">
                    <span class="post-dropdown-handle" aria-hidden="true">
                        <ion-icon name="chevron-down" class="aliexpress-icon-down"></ion-icon>
                    </span>
                    <div class="post-select-list-container">
                        <button type="button" class="post-list-value" id="aliexpress-post-status" value="publish">
                            <?php
                            if(isset($settings['aliexpress_post_status'])){
                                echo esc_html($settings['aliexpress_post_status']);
                            }else{
                                esc_html_e( 'publish', Auto_Aliexpress::DOMAIN );
                            }
                            ?>
                        </button>
                        <ul tabindex="-1" role="listbox" class="post-list-results aliexpress-sidenav-hide-md" >
                            <li><?php esc_html_e( 'publish', Auto_Aliexpress::DOMAIN ); ?></li>
                            <li><?php esc_html_e( 'draft', Auto_Aliexpress::DOMAIN ); ?></li>
                            <li><?php esc_html_e( 'private', Auto_Aliexpress::DOMAIN ); ?></li>
                            <li><?php esc_html_e( 'pending', Auto_Aliexpress::DOMAIN ); ?></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="aliexpress-box-settings-row">
            <div class="aliexpress-box-settings-col-1">
                <span class="aliexpress-settings-label"><?php esc_html_e( 'Post Type', Auto_Aliexpress::DOMAIN ); ?></span>
            </div>
            <div class="aliexpress-box-settings-col-2">
                <div class="type-select-container">
                    <span class="type-dropdown-handle" aria-hidden="true">
                        <ion-icon name="chevron-down" class="aliexpress-icon-down"></ion-icon>
                    </span>
                    <div class="type-select-list-container">
                        <button type="button" class="type-list-value" id="aliexpress-post-type" value="post">
                            <?php
                            if(isset($settings['aliexpress_post_type'])){
                                echo esc_html($settings['aliexpress_post_type']);
                            }else{
                                esc_html_e( 'post', Auto_Aliexpress::DOMAIN );
                            }
                            ?>
                        </button>
                        <ul tabindex="-1" role="listbox" class="type-list-results aliexpress-sidenav-hide-md" >
                            <li><?php esc_html_e( 'post', Auto_Aliexpress::DOMAIN ); ?></li>
                            <li><?php esc_html_e( 'page', Auto_Aliexpress::DOMAIN ); ?></li>
                            <li><?php esc_html_e( 'attachment', Auto_Aliexpress::DOMAIN ); ?></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="aliexpress-box-settings-row">
            <div class="aliexpress-box-settings-col-1">
                <span class="aliexpress-settings-label"><?php esc_html_e( 'Post Author', Auto_Aliexpress::DOMAIN ); ?></span>
            </div>
            <div class="aliexpress-box-settings-col-2">
                <div class="author-select-container">
                    <span class="author-dropdown-handle" aria-hidden="true">
                        <ion-icon name="chevron-down" class="aliexpress-icon-down"></ion-icon>
                    </span>
                    <div class="author-select-list-container">
                        <button type="button" class="author-list-value" id="aliexpress-post-author" value="<?php esc_html_e( $authors[0]->data->user_login ); ?>">
                            <?php
                            if(isset($settings['aliexpress_post_author'])){
                                echo esc_html($settings['aliexpress_post_author']);
                            }else{
                                esc_html_e( $authors[0]->data->user_login );
                            }
                            ?>
                        </button>
                        <ul class="author-list-results aliexpress-sidenav-hide-md" >
                            <?php foreach ( $authors as $key => $value ) : ?>
                                <li><?php esc_html_e( $value->data->user_login ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>


