<?php
// Count total forms
$count        = $this->countModules();
$count_active = $this->countModules( 'publish' );

// available bulk actions
$bulk_actions = $this->bulk_actions();

$this->template( 'dashboard/widgets/widget-popup' );



?>

<?php if ( $count > 0 ) { ?>

    <!-- START: Bulk actions and pagination -->
    <div class="aliexpress-listings-pagination">

        <div class="aliexpress-pagination-mobile aliexpress-pagination-wrap">
            <span class="aliexpress-pagination-results">
                            <?php /* translators: ... */ echo esc_html( sprintf( _n( '%s result', '%s results', $count, Auto_Aliexpress::DOMAIN ), $count ) ); ?>
                        </span>
            <?php $this->pagination(); ?>
        </div>

        <div class="aliexpress-pagination-desktop aliexpress-box">
            <div class="aliexpress-box-search">

                <form method="post" name="aliexpress-bulk-action-form" class="aliexpress-search-left">

                    <input type="hidden" id="auto-aliexpress-nonce" name="auto_aliexpress_nonce" value="<?php echo wp_create_nonce( 'auto-aliexpress-campaign-request' );?>">
                    <input type="hidden" name="_wp_http_referer" value="<?php admin_url( 'admin.php?page=auto-aliexpress-campaign' ); ?>">
                    <input type="hidden" name="ids" id="aliexpress-select-campaigns-ids" value="">

                    <label for="aliexpress-check-all-campaigns" class="aliexpress-checkbox">
                        <input type="checkbox" id="aliexpress-check-all-campaigns">
                        <span aria-hidden="true"></span>
                        <span class="aliexpress-screen-reader-text"><?php esc_html_e( 'Select all', Auto_Aliexpress::DOMAIN ); ?></span>
                    </label>

                    <div class="aliexpress-select-wrapper">
                        <select name="auto_aliexpress_bulk_action" id="bulk-action-selector-top">
                            <option value=""><?php esc_html_e( 'Bulk Action', Auto_Aliexpress::DOMAIN ); ?></option>
                            <?php foreach ( $bulk_actions as $val => $label ) : ?>
                                <option value="<?php echo esc_attr( $val ); ?>"><?php echo esc_html( $label ); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button class="aliexpress-button aliexpress-bulk-action-button"><?php esc_html_e( 'Apply', Auto_Aliexpress::DOMAIN ); ?></button>

                </form>

                <div class="aliexpress-search-right">

                    <div class="aliexpress-pagination-wrap">
                        <span class="aliexpress-pagination-results">
                            <?php /* translators: ... */ echo esc_html( sprintf( _n( '%s result', '%s results', $count, Auto_Aliexpress::DOMAIN ), $count ) ); ?>
                        </span>
                        <?php $this->pagination(); ?>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- END: Bulk actions and pagination -->

    <div class="aliexpress-accordion aliexpress-accordion-block" id="aliexpress-modules-list">

        <?php
        foreach ( $this->getModules() as $module ) {
        ?>
            <div class="aliexpress-accordion-item">
                <div class="aliexpress-accordion-item-header">

                    <div class="aliexpress-accordion-item-title aliexpress-trim-title">
                        <label for="wpf-module-<?php echo esc_attr( $module['id'] ); ?>" class="aliexpress-checkbox aliexpress-accordion-item-action">
                            <input type="checkbox" id="wpf-module-<?php echo esc_attr( $module['id'] ); ?>" class="aliexpress-check-single-campaign" value="<?php echo esc_html( $module['id'] ); ?>">
                            <span aria-hidden="true"></span>
                            <span class="aliexpress-screen-reader-text"><?php esc_html_e( 'Select this form', Auto_Aliexpress::DOMAIN ); ?></span>
                        </label>
                        <span class="aliexpress-trim-text">
                            <?php echo auto_aliexpress_get_campaign_name( $module['id'] ); ?>
                        </span>
                        <?php
                        if ( 'publish' === $module['status'] ) {
                            echo '<span class="aliexpress-tag aliexpress-tag-blue">' . esc_html__( 'Published', Auto_Aliexpress::DOMAIN ) . '</span>';
                        }
                        ?>

                        <?php
                        if ( 'draft' === $module['status'] ) {
                            echo '<span class="aliexpress-tag">' . esc_html__( 'Draft', Auto_Aliexpress::DOMAIN ) . '</span>';
                        }
                        ?>
                    </div>

                    <div class="aliexpress-accordion-item-date">
                        <strong><?php esc_html_e( 'Last Run', Auto_Aliexpress::DOMAIN ); ?></strong>
                        <?php esc_html_e( $module['last_run_time'] ); ?>
                    </div>

                    <div class="aliexpress-accordion-col-auto">

                        <a href="<?php echo admin_url( 'admin.php?page=auto-aliexpress-campaign-wizard&id=' . $module['id'].'&source='.$module['type'] ); ?>"
                           class="aliexpress-button aliexpress-button-ghost aliexpress-accordion-item-action aliexpress-desktop-visible">
                            <ion-icon name="pencil" class="aliexpress-icon-pencil"></ion-icon>
                            <?php esc_html_e( 'Edit', Auto_Aliexpress::DOMAIN ); ?>
                        </a>

                        <div class="aliexpress-dropdown aliexpress-accordion-item-action">
                            <button class="aliexpress-button-icon aliexpress-dropdown-anchor">
                                <ion-icon name="settings"></ion-icon>
                            </button>
                            <ul class="aliexpress-dropdown-list">

                                <li>
                                    <form method="post">
                                        <input type="hidden" name="auto_aliexpress_single_action" value="update-status">
                                        <input type="hidden" name="id" value="<?php echo esc_attr( $module['id'] ); ?>">
                                        <?php
                                        if ( 'publish' === $module['status'] ) {
                                            ?>
                                            <input type="hidden" name="status" value="draft">
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if ( 'draft' === $module['status'] ) {
                                            ?>
                                            <input type="hidden" name="status" value="publish">
                                            <?php
                                        }
                                        ?>
                                        <input type="hidden" id="auto_aliexpress_nonce" name="auto_aliexpress_nonce" value="<?php echo wp_create_nonce('auto-aliexpress-campaign-request'); ?>">
                                        <button type="submit">
                                            <ion-icon class="aliexpress-icon-cloud" name="cloud"></ion-icon>
                                            <?php
                                            if ( 'publish' === $module['status'] ) {
                                                echo esc_html__( 'Unpublish', Auto_Aliexpress::DOMAIN );
                                            }
                                            ?>

                                            <?php
                                            if ( 'draft' === $module['status'] ) {
                                                echo esc_html__( 'Publish', Auto_Aliexpress::DOMAIN );
                                            }
                                            ?>
                                        </button>
                                    </form>
                                </li>

                                <li>
                                    <a href="#delete-popup" class="open-popup-delete" data-effect="mfp-zoom-in">
                                    <button
                                        class="aliexpress-option-red aliexpress-delete-action"
                                        data-campaign-id="<?php echo esc_attr( $module['id'] ); ?>">
                                        <ion-icon class="aliexpress-icon-trash" name="trash"></ion-icon> <?php esc_html_e( 'Delete', Auto_Aliexpress::DOMAIN ); ?>
                                    </button>
                                    </a>
                                </li>

                            </ul>
                        </div>

                        <button class="aliexpress-button-icon aliexpress-accordion-open-indicator" aria-label="<?php esc_html_e( 'Open item', Auto_Aliexpress::DOMAIN ); ?>">
                            <ion-icon name="chevron-down"></ion-icon>
                        </button>


                    </div>

                </div>
                <div class="aliexpress-accordion-item-body aliexpress-campaign-detail-hide">
                    <ul class="aliexpress-accordion-item-data">
                        <li data-col="large">
                            <strong><?php esc_html_e( 'Last Run', Auto_Aliexpress::DOMAIN ); ?></strong>
                            <?php esc_html_e( $module['last_run_time'] ); ?>
                        </li>
                        <li data-col="large">
                            <strong><?php esc_html_e( 'Type', Auto_Aliexpress::DOMAIN ); ?></strong>
                            <?php esc_html_e( $module['type'] ); ?>
                        </li>
                        <li data-col="large">
                            <strong><?php esc_html_e( 'Keywords', Auto_Aliexpress::DOMAIN ); ?></strong>
                            <?php esc_html_e( $module['keywords'] ); ?>
                        </li>
                    </ul>
                </div>

            </div>

        <?php

        }

        ?>

    </div>

    <!-- Delete Popup -->

    <div id="delete-popup" class="white-popup mfp-with-anim mfp-hide">

        <div class="aliexpress-box" role="document">

            <div class="aliexpress-box-header">

                <h3 class="aliexpress-box-title" id="dialogTitle"><?php esc_html_e( 'Delete Form', Auto_Aliexpress::DOMAIN ); ?></h3>

            </div>

            <div id="2031" class="wpmudev-section--popup">

                <div class="aliexpress-box-body">
                    <span class="aliexpress-description"><?php esc_html_e( 'Are you sure you wish to permanently delete this campaign?', Auto_Aliexpress::DOMAIN ); ?></span>
                </div>

                <div class="aliexpress-box-footer">
                    <button type="button" class="aliexpress-button aliexpress-button-ghost aliexpress-close-popup" data-a11y-dialog-hide=""><?php esc_html_e( 'Cancel', Auto_Aliexpress::DOMAIN ); ?></button>
                    <form method="post" class="delete-action">
                        <input type="hidden" name="auto_aliexpress_single_action" value="delete">
                        <input type="hidden" class="aliexpress-delete-id" name="id" value="">
                        <input type="hidden" id="auto_aliexpress_nonce" name="auto_aliexpress_nonce" value="<?php echo wp_create_nonce('auto-aliexpress-campaign-request'); ?>">
                        <input type="hidden" name="_wp_http_referer" value="<?php admin_url( 'admin.php?page=auto-aliexpress-campaign' ); ?>">
                        <button type="submit" class="aliexpress-button aliexpress-button-ghost aliexpress-button-red">
                            <ion-icon class="aliexpress-icon-trash" name="trash"></ion-icon>
                            <?php esc_html_e( 'Delete', Auto_Aliexpress::DOMAIN ); ?>
                        </button>
                    </form>
                </div>

            </div></div>

    </div>

<?php } else { ?>
    <div class="aliexpress-box aliexpress-message aliexpress-message-lg">

        <img src="<?php echo esc_url(AUTO_ALIEXPRESS_URL.'/assets/images/aliexpress.png'); ?>" class="aliexpress-image aliexpress-image-center" aria-hidden="true" alt="<?php esc_attr_e( 'Auto Aliexpress', Auto_Aliexpress::DOMAIN ); ?>">

        <div class="aliexpress-message-content">

            <p><?php esc_html_e( 'Create a campaign to generate WordPress posts automatically from Aliexpress.', Auto_Aliexpress::DOMAIN ); ?></p>

            <p>
                <a href="<?php echo admin_url( 'admin.php?page=auto-aliexpress-welcome' );?>">
                    <button class="aliexpress-button aliexpress-button-blue" data-modal="custom_forms">
                  <i class="aliexpress-icon-plus" aria-hidden="true"></i> <?php esc_html_e( 'Create', Auto_Aliexpress::DOMAIN ); ?>
               </button>
                </a>
            </p>


        </div>

    </div>

<?php } ?>
