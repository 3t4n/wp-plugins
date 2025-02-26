<?php
$status = isset( $settings['status'] ) ? sanitize_text_field( $settings['status'] ) : 'draft';
?>
<div id="auto-aliexpress-builder-status" class="aliexpress-box aliexpress-box-sticky">
    <div class="aliexpress-box-status">
        <div class="aliexpress-status">
            <div class="aliexpress-status-module">
                <?php esc_html_e( 'Status', Auto_Aliexpress::DOMAIN ); ?>
                    <?php
                    if( $status === 'draft'){
                        ?>
                    <span class="aliexpress-tag aliexpress-tag-draft">
                        <?php esc_html_e( 'draft', Auto_Aliexpress::DOMAIN ); ?>
                    </span>
                    <?php
                    }else if($status === 'publish'){
                        ?>
                    <span class="aliexpress-tag aliexpress-tag-published">
                       <?php esc_html_e( 'published', Auto_Aliexpress::DOMAIN ); ?>
                    </span>
                    <?php
                    }
                    ?>
            </div>
            <div class="aliexpress-status-changes">

            </div>
        </div>
        <div class="aliexpress-actions">
            <button id="aliexpress-campaign-save" class="aliexpress-button" type="button">
                <span class="aliexpress-loading-text">
                    <ion-icon name="reload-circle"></ion-icon>
                    <span class="button-text campaign-save-text">
                        <?php
                        if($status === 'publish'){
                            echo esc_html( 'unpublish', Auto_Aliexpress::DOMAIN );
                        }else{
                            echo esc_html( 'save draft', Auto_Aliexpress::DOMAIN );
                        }
                        ?>
                    </span>
                </span>
            </button>
            <button id="aliexpress-campaign-publish" class="aliexpress-button aliexpress-button-blue" type="button">
                <span class="aliexpress-loading-text">
                    <ion-icon name="save"></ion-icon>
                    <span class="button-text campaign-publish-text">
                        <?php
                        if($status === 'publish'){
                            echo esc_html( 'update', Auto_Aliexpress::DOMAIN );
                        }else{
                            echo esc_html( 'publish', Auto_Aliexpress::DOMAIN );
                        }
                        ?>
                    </span>
                </span>
            </button>
        </div>
    </div>
</div>
