<?php
function iati_project_data(){
    global $wpdb;
    $iati_project_opts              = get_option( 'iati_project_opts' );

    $iati_data                      = $wpdb->get_results( "SELECT * FROM `" . $wpdb->prefix . "iati_project_data` WHERE iati_identifier='" . $iati_project_opts['project_id'] . "'", ARRAY_A );
    
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
    $iati_progress_bar              = iati_progress_bar( $percentage, false );
    
    $iati_project_html  = $iati_progress_bar . '
    <div class="iati-row">
        <div class="iati-col main-col">
    
            <h2>' . esc_html__( $project_title[''], 'iatiproject' ) .'</h2>
            <p>' . esc_html__( $project_description['/narrative'][0][''], 'iatiproject' ) .'</p>
    
            <div class="content-row">';
            
            foreach ($project_activity_date as $date ) {
                $iati_project_html .= '
                <div class="content-col-inline">
                    <div class="item-label">'. esc_html__( iati_get_code( $date['@type'], 'activity_date_type' ), 'iatiproject' ) .'</div>
                        <div class="item-text">'. esc_html( $date['@iso-date'] ) .'</div>
                    </div>';
                }
            $iati_project_html .= '
            </div>
            
            <div class="content-row">
                <div class="content-col-inline">
                    <div class="item-label">'. esc_html__( 'IATI Identifier', 'iatiproject' ) .'</div>
                    <div class="item-text">'. $project_identifier .'</div>
                </div>
    
                <div class="content-col-inline">
                    <div class="item-label">'. esc_html__( 'Sector', 'iatiproject' ) .'</div>
                    <div class="item-text">'. esc_html__( $project_sector['/narrative'][0][''], 'iatiproject' ).'</div>
                </div>
    
                <div class="content-col-inline">
                    <div class="item-label">'. esc_html__( 'Activity status', 'iatiproject' ) .'</div>
                    <div class="item-text">'
                        .esc_html__( iati_get_code( $project_activity_status, 'activity_status' ), 'iatiproject' ) .'
                    </div>
                </div>
            </div>
    
            <div class="content-row">
                <div class="content-col-inline">
                    <div class="item-label">'. esc_html__( 'Reporting organisation', 'iatiproject' ).'</div>
                    <div class="item-text">'. esc_html__( $project_reporting_org[''], 'iatiproject' ) .'</div>
                </div>
    
                <div class="content-col-inline">
                    <div class="item-label">'. esc_html__( 'Identifier', 'iatiproject' ) .'</div>
                    <div class="item-text">'. esc_html__( $project_reporting_org_ref, 'iatiproject' ) .'</div>
                </div>
    
                <div class="content-col-inline">
                    <div class="item-label">'. esc_html__( 'Organisation type', 'iatiproject' ). '</div>
                    <div class="item-text">'. esc_html__( iati_get_code( $project_reporting_org_type, 'organisation_type' ), 'iatiproject' ) .'</div>
                </div>
            </div>';
    
            if( iati_column_exists( $iati_data[0]['recipient_region'] ) ) {
                $iati_project_html .= '
                <div class="content-row">
                    <div class="content-col-inline">
                        <div class="item-label">'. esc_html__( 'Code', 'iatiproject' ) .'</div>
                        <div class="item-text">'. esc_html__( $project_recipient_region['@code'], 'iatiproject' ).'</div>
                    </div>
    
                    <div class="content-col-inline">
                        <div class="item-label">'. esc_html__( 'Region', 'iatiproject' ) .'</div>
                        <div class="item-text">'. esc_html__( iati_get_code( $project_recipient_region['@code'], 'region' ), 'iatiproject' ) .'</div>
                    </div>
                </div>';
            }

            if( iati_column_exists( $iati_data[0]['recipient_country'] ) ) {
                $iati_project_html .= '
                <div class="content-row">
                    <div class="content-col-inline">
                        <div class="item-label">'. esc_html__( 'Recipient country', 'iatiproject' ) .'</div>
                        <div class="item-text">'. esc_html__( $project_recipient_country['/narrative'][0][''], 'iatiproject' ) .'</div>
                    </div>
    
                    <div class="content-col-inline">
                        <div class="item-label">'. esc_html__( 'Location', 'iatiproject' ) .'</div>
                        <div class="item-text">'. esc_html__( $project_location['@ref'], 'iatiproject' ) .'</div>
                    </div>
    
                    <div class="content-col-inline">
                        <div class="item-label">'. esc_html__( 'Position', 'iatiproject' ) .'</div>
                        <div class="item-text">'. esc_html__( $project_location['/point/pos'], 'iatiproject' ) .'</div>
                    </div>
                </div>';
            }

            if( iati_column_exists( $iati_data[0]['budget'] ) ) {
                $iati_project_html .= '
                <div class="content-row">
                    <div class="content-col-block" style="padding: 15px;">
                        <div class="item-label">'. esc_html__( 'Budget', 'iatiproject' ) .'</div>
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
                            <tbody>';
            
                            foreach( $project_budget as $budget ) {
                                $iati_project_html .= '
                                <tr>
                                    <td>'. esc_html__( $budget['/period-start@iso-date'], 'iatiproject' ) .'</td>
                                    <td>'. esc_html__( $budget['/period-end@iso-date'], 'iatiproject' ) .'</td>
                                    <td>'. esc_html__( iati_get_code( $budget['@type'], 'budget_type' ), 'iatiproject' ) .'</td>
                                    <td>
                                        '.esc_html__( $budget['/value'], 'iatiproject' ).'
                                        '.esc_html__( $budget['/value@currency'], 'iatiproject' ).'
                                    </td>
                                </tr>';
                            }
                            
                            $iati_project_html .= '</tbody>
                        </table>
                    </div>
                </div>';
            }

            if( iati_column_exists( $iati_data[0]['transaction'] ) ) {
                $iati_project_html .= '
                <div class="content-row">
                    <div class="content-col-block" style="padding: 15px;">
                        <div class="item-label">'. esc_html__( 'Transaction', 'iatiproject' ) .'</div>
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
                            <tbody>';

                            foreach( $project_transaction as $transaction ) {
                                $iati_project_html .= '
                                <tr>
                                    <td>'. esc_html__( $transaction['/value@value-date'], 'iatiproject' ) .'</td>
                                    <td>'. esc_html__( $transaction['/description/narrative'][0][''], 'iatiproject' ) .'</td>
                                    <td>
                                        '. esc_html__( $transaction['/value'], 'iatiproject' ) .'
                                        '. esc_html__( $transaction['/value@currency'], 'iatiproject' ) .'
                                    </td>
                                </tr>';
                            }
                            
                            $iati_project_html .= '</tbody>
                        </table>
                    </div>
                </div>';
            }
            
            $iati_project_html .= '
            <div class="content-row">
                <div class="content-col-block" style="padding: 15px;">
                    <div class="item-label">'. esc_html__( 'Participating organisations', 'iatiproject' ) .'</div>
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
                        <tbody>';
                        
                        foreach( $project_participating_org as $org ) {
                            $iati_project_html .= '
                            <tr>
                                <td>'. esc_html__( $org['/narrative'][0][''], 'iatiproject' ) .'</td>
                                <td>'. esc_html__( iati_get_code( $org['@role'], 'organisation_role' ), 'iatiproject' ) .'</td>
                                <td>'. esc_html__( iati_get_code( $org['@type'], 'organisation_type' ), 'iatiproject' ) .'</td>
                            </tr>';
                        
                        }
                        
                        $iati_project_html .= '</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>';

    return $iati_project_html;
}