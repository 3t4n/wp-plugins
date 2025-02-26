<?php
$project_budget                 = iati_get_data( $iati_data[0]['budget'], false );
$project_result                 = iati_get_data( $iati_data[0]['result'] );
$project_sector                 = iati_get_data( $iati_data[0]['sector'] );
$project_dataset                = $iati_data[0]['dataset'];
$project_version                = $iati_data[0]['version'];
$project_location               = iati_get_data( $iati_data[0]['location'] );
$project_lang                   = $iati_data[0]['lang'];
$project_hierarchy              = $iati_data[0]['hierarchy'];
$project_xsi                    = $iati_data[0]['xsi'];
$project_idx                    = $iati_data[0]['idx'];
$project_description            = iati_get_data( $iati_data[0]['description'] );
$project_transaction            = iati_get_data( $iati_data[0]['transaction'], false );
$project_slug                   = $iati_data[0]['slug'];
$project_contact_info           = iati_get_data( $iati_data[0]['contact_info'] );
$project_activity_date          = iati_get_data( $iati_data[0]['activity_date'] );
$project_policy_marker          = iati_get_data( $iati_data[0]['policy_marker'] );
$project_identifier             = $iati_data[0]['iati_identifier'];
$project_title                  = iati_get_data( $iati_data[0]['title'] );
$project_default_aid_type       = $iati_data[0]['default_aid_type'];
$project_other_identifier       = iati_get_data( $iati_data[0]['other_identifier'] );
$project_recipient_region       = iati_get_data( $iati_data[0]['recipient_region'] );
$project_related_activity       = iati_get_data( $iati_data[0]['related_activity'] );
$project_default_currency       = $iati_data[0]['default_currency'];
$project_participating_org      = iati_get_data( $iati_data[0]['participating_org'] );
$project_recipient_country      = iati_get_data( $iati_data[0]['recipient_country'] );
$project_reporting_org_ref      = $iati_data[0]['reporting_org_ref'];
$project_reporting_org_type     = $iati_data[0]['reporting_org_type'];
$project_generated_time         = $iati_data[0]['generated_datetime'];
$project_activity_status        = $iati_data[0]['activity_status'];
$project_last_updated_time      = $iati_data[0]['last_updated_datetime'];
$project_default_flow_type      = $iati_data[0]['default_flow_type'];
$project_collaboration_type     = iati_get_data( $iati_data[0]['collaboration_type'] );
$project_reporting_org          = iati_get_data( $iati_data[0]['reporting_org'] );
$project_capital_spend          = $iati_data[0]['capital_spend'];
$project_default_tied_status    = $iati_data[0]['default_tied_status'];
$project_default_finance_type   = $iati_data[0]['default_finance_type'];
$project_loan_status            = $iati_data[0]['loan_status_currency'];
$project_country_budget_items   = $iati_data[0]['country_budget_items'];
$project_budget_item            = iati_get_data( $iati_data[0]['budget_item'] );

$percentage                     = iati_activity_progression( $project_activity_date );
iati_progress_bar( $percentage );
?>

<div class="iati-row">
    <div class="iati-col main-col">

        <h3><span class="dashicons dashicons-category"></span> <?php esc_html_e( $project_title[''], 'iatiproject' ); ?></h3>
        <p class=""><?php esc_html_e( $project_description['/narrative'][0][''], 'iatiproject' ); ?></p>

        <div class="content-row">
            <?php
            foreach ($project_activity_date as $date ) {
                ?>
                <div class="content-col-inline">
                    <div class="item-label"><?php esc_html_e( iati_code( $date['@type'], 'activity_date_type' ), 'iatiproject' ); ?></div>
                    <div class="item-text"><?php echo esc_html( $date['@iso-date'] ); ?></div>
                </div>
                <?php
            }
            ?>
        </div>
        
        <div class="content-row">
            <div class="content-col-inline">
                <div class="item-label"><?php esc_html_e( 'IATI Identifier', 'iatiproject' ); ?></div>
                <div class="item-text"><?php echo $project_identifier ?></div>
            </div>

            <div class="content-col-inline">
                <div class="item-label"><?php esc_html_e( 'Sector', 'iatiproject' ); ?></div>
                <div class="item-text"><?php esc_html_e( $project_sector['/narrative'][0][''], 'iatiproject' ); ?></div>
            </div>

            <div class="content-col-inline">
                <div class="item-label"><?php esc_html_e( 'Activity status', 'iatiproject' ); ?></div>
                <div class="item-text">
                    <?php esc_html_e( iati_code( $project_activity_status, 'activity_status' ), 'iatiproject' ); ?>
                </div>
            </div>
        </div>

        <div class="content-row">
            <div class="content-col-inline">
                <div class="item-label"><?php esc_html_e( 'Reporting organisation', 'iatiproject' ); ?></div>
                <div class="item-text"><?php esc_html_e( $project_reporting_org[''], 'iatiproject' ); ?></div>
            </div>

            <div class="content-col-inline">
                <div class="item-label"><?php esc_html_e( 'Identifier', 'iatiproject' ); ?></div>
                <div class="item-text"><?php esc_html_e( $project_reporting_org_ref, 'iatiproject' ); ?></div>
            </div>

            <div class="content-col-inline">
                <div class="item-label"><?php esc_html_e( 'Organisation type', 'iatiproject' ); ?></div>
                <div class="item-text"><?php esc_html_e( iati_code( $project_reporting_org_type, 'organisation_type' ), 'iatiproject' ); ?></div>
            </div>
        </div>

        <?php
        if( iati_column_exists( $iati_data[0]['recipient_region'] ) ) {
            ?>
            <div class="content-row">
                <div class="content-col-inline">
                    <div class="item-label"><?php esc_html_e( 'Code', 'iatiproject' ); ?></div>
                    <div class="item-text"><?php esc_html_e( $project_recipient_region['@code'], 'iatiproject' ); ?></div>
                </div>

                <div class="content-col-inline">
                    <div class="item-label"><?php esc_html_e( 'Region', 'iatiproject' ); ?></div>
                    <div class="item-text"><?php esc_html_e( iati_code( $project_recipient_region['@code'], 'region' ), 'iatiproject' ); ?></div>
                </div>
            </div>
            <?php 
        }
        ?>
        
        <?php
        if( iati_column_exists( $iati_data[0]['recipient_country'] ) ) {
            ?>
            <div class="content-row">
                <div class="content-col-inline">
                    <div class="item-label"><?php esc_html_e( 'Recipient country', 'iatiproject' ); ?></div>
                    <div class="item-text"><?php esc_html_e( $project_recipient_country['/narrative'][0][''], 'iatiproject' ); ?></div>
                </div>

                <div class="content-col-inline">
                    <div class="item-label"><?php esc_html_e( 'Location', 'iatiproject' ); ?></div>
                    <div class="item-text"><?php esc_html_e( $project_location['@ref'], 'iatiproject' ); ?></div>
                </div>

                <div class="content-col-inline">
                    <div class="item-label"><?php esc_html_e( 'Position', 'iatiproject' ); ?></div>
                    <div class="item-text"><?php esc_html_e( $project_location['/point/pos'], 'iatiproject' ); ?></div>
                </div>
            </div>
            <?php
        }
        ?>

        <?php
        if( iati_column_exists( $iati_data[0]['budget'] ) ) {
            ?>
            <div class="content-row">
                <div class="content-col-block" style="padding: 15px;">
                    <div class="item-label"><?php esc_html_e( 'Budget', 'iatiproject' ); ?></div>
                </div>
                <div class="content-col-block">
                    <table width="100%">
                        <thead>
                            <tr>
                                <th>Start</th>
                                <th>End</th>
                                <th>Type</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach( $project_budget as $budget ) {
                            ?>
                            <tr>
                                <td><?php esc_html_e( $budget['/period-start@iso-date'], 'iatiproject' ); ?></td>
                                <td><?php esc_html_e( $budget['/period-end@iso-date'], 'iatiproject' ); ?></td>
                                <td><?php esc_html_e( iati_code( $budget['@type'], 'budget_type' ), 'iatiproject' ); ?></td>
                                <td>
                                    <?php esc_html_e( $budget['/value'], 'iatiproject' ); ?>
                                    <?php esc_html_e( $budget['/value@currency'], 'iatiproject' ); ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>    
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
        }
        ?>
        
        <?php
        if( iati_column_exists( $iati_data[0]['transaction'] ) ) {
            ?>
            <div class="content-row">
                <div class="content-col-block" style="padding: 15px;">
                    <div class="item-label"><?php esc_html_e( 'Transaction', 'iatiproject' ); ?></div>
                </div>
                <div class="content-col-block">
                    <table width="100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach( $project_transaction as $transaction ) {
                            ?>
                            <tr>
                                <td><?php esc_html_e( $transaction['/value@value-date'], 'iatiproject' ); ?></td>
                                <td><?php esc_html_e( $transaction['/description/narrative'][0][''], 'iatiproject' ); ?></td>
                                <td>
                                    <?php esc_html_e( $transaction['/value'], 'iatiproject' ); ?>
                                    <?php esc_html_e( $transaction['/value@currency'], 'iatiproject' ); ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>    
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
        }
        ?>

        <div class="content-row">
            <div class="content-col-block" style="padding: 15px;">
                <div class="item-label"><?php esc_html_e( 'Participating organisations', 'iatiproject' ); ?></div>
            </div>
            <div class="content-col-block">
                <table width="100%">
                    <thead>
                        <tr>
                            <th>Organisation</th>
                            <th>Role</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach( $project_participating_org as $org ) {
                        ?>
                        <tr>
                            <td><?php esc_html_e( $org['/narrative'][0][''], 'iatiproject' ); ?></td>
                            <td><?php esc_html_e( iati_code( $org['@role'], 'organisation_role' ), 'iatiproject' ); ?></td>
                            <td><?php esc_html_e( iati_code( $org['@type'], 'organisation_type' ), 'iatiproject' ); ?></td>
                        </tr>
                        <?php
                    }
                    ?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="iati-col side-col">
        <div class="sticky-col">
            
            <div class="sticky-box">
                <h3><span class="dashicons dashicons-update"></span> <?php esc_html_e( 'Update project data', 'iatiproject' ); ?></h3>
                <p>
                    <?php esc_html_e( 'Make sure you have provided the identifier of your project. This will be helpful to update the data from d-portal.', 'iatiproject' ); ?>
                </p>
                <p>
                    <form method="post" action="admin-post.php">
                        <input type="hidden" name="action" value="iati_fetch_project_data">
                        <?php wp_nonce_field( 'fetch_data_verify' ); ?>
                        <input type="text" name="project-id" size=22 value="<?php echo $project_opts['project_id']; ?>" />
                        <input type="submit" class="button button-primary" value="Update project data" />
                    </form>
                </p>
            </div>

            <div class="sticky-box">
                <h3><span class="dashicons dashicons-info"></span> <?php esc_html_e( 'About IATA Project Data', 'iatiproject' ); ?></h3>
                <p>
                    <?php _e( 'This plugin retrieves information about a specific IATI project from <a href="https://d-portal.org" target="_blank">d-portal.org</a> website and stores it in a database. The information stored will be updated as soon as d-portal updates the data on their own platform.', 'iatiproject' ); ?>
                </p>
            </div>

            <div class="sticky-social-box">
                <h3><span class="dashicons dashicons-share-alt"></span> <?php esc_html_e( 'Follow me on social media', 'iatiproject' ); ?></h3>
                <div class="social-media-list">
                    <a href="https://facebook.com/iamfotso" target="_blank" class="social-media-box">
                        <span class="dashicons dashicons-facebook"></span>
                        <p>iamfotso</p>
                    </a><a href="https://twitter.com/iamfotso" target="_blank" class="social-media-box">
                        <span class="dashicons dashicons-twitter"></span>
                        <p>iamfotso</p>
                    </a><a href="http://www.iamfotso.cm" target="_blank" class="social-media-box">
                        <span class="dashicons dashicons-wordpress-alt"></span>
                        <p>iamfotso.cm</p>
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</div>