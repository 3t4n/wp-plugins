<?php
function iati_install_codes() {
    global $wpdb;

    // Check if iati codes are installed
    $iati_count_entries         = $wpdb->get_var( "SELECT COUNT(*) FROM `".$wpdb->prefix."iati_codes`" );

    // If table is empty, insert iati codes
    if( $iati_count_entries == 0 ) {
		$wpdb->query( "INSERT INTO `".$wpdb->prefix."iati_codes` (`code`, `category`, `name`, `description`, `status`, `type`) VALUES
			('10', NULL, 'Government', NULL, 'active', 'organisation_type'),
			('11', NULL, 'Local Government', 'Any local (sub national) government organisation in either donor or recipient country.', 'active', 'organisation_type'),
			('15', NULL, 'Other Public Sector', NULL, 'active', 'organisation_type'),
			('21', NULL, 'International NGO', NULL, 'active', 'organisation_type'),
			('22', NULL, 'National NGO', NULL, 'active', 'organisation_type'),
			('23', NULL, 'Regional NGO', NULL, 'active', 'organisation_type'),
			('24', NULL, 'Partner Country based NGO', 'Local and National NGO / CSO based in aid/assistance recipient country', 'active', 'organisation_type'),
			('30', NULL, 'Public Private Partnership', NULL, 'active', 'organisation_type'),
			('40', NULL, 'Multilateral', NULL, 'active', 'organisation_type'),
			('60', NULL, 'Foundation', NULL, 'active', 'organisation_type'),
			('70', NULL, 'Private Sector', NULL, 'active', 'organisation_type'),
			('71', NULL, 'Private Sector in Provider Country', 'Is in provider / donor country.', 'active', 'organisation_type'),
			('72', NULL, 'Private Sector in Aid Recipient Country', 'Is in aid recipient country.', 'active', 'organisation_type'),
			('73', NULL, 'Private Sector in Third Country', 'Is not in either a donor or aid recipient country.', 'active', 'organisation_type'),
			('80', NULL, 'Academic, Training and Research', NULL, 'active', 'organisation_type'),
			('90', NULL, 'Other', NULL, 'active', 'organisation_type'),
			('1', NULL, 'Pipeline/identification', 'The activity is being scoped or planned', 'active', 'activity_status'),
			('2', NULL, 'Implementation', 'The activity is currently being implemented', 'active', 'activity_status'),
			('3', NULL, 'Finalisation', 'Physical activity is complete or the final disbursement has been made, but the activity remains open pending financial sign off or M&E', 'active', 'activity_status'),
			('4', NULL, 'Closed', 'Physical activity is complete or the final disbursement has been made.', 'active', 'activity_status'),
			('5', NULL, 'Cancelled', 'The activity has been cancelled', 'active', 'activity_status'),
			('6', NULL, 'Suspended', 'The activity has been temporarily suspended', 'active', 'activity_status'),
			('1', NULL, 'Original', 'The original budget allocated to the activity', 'active', 'budget_type'),
			('2', NULL, 'Revised', 'The updated budget for an activity', 'active', 'budget_type'),
			('1', NULL, 'Funding', 'The government or organisation which provides funds to the activity.', 'active', 'organisation_role'),
			('2', NULL, 'Accountable', 'An organisation responsible for oversight of the activity and its outcomes', 'active', 'organisation_role'),
			('3', NULL, 'Extending', 'An organisation that manages the budget and direction of an activity on behalf of the funding organisation', 'active', 'organisation_role'),
			('4', NULL, 'Implementing', 'The organisation that physically carries out the activity or intervention.', 'active', 'organisation_role'),
			('88', NULL, 'States Ex-Yugoslavia unspecified', NULL, 'active', 'region'),
			('89', NULL, 'Europe, regional', NULL, 'active', 'region'),
			('189', NULL, 'North of Sahara, regional', NULL, 'active', 'region'),
			('289', NULL, 'South of Sahara, regional', NULL, 'active', 'region'),
			('298', NULL, 'Africa, regional', NULL, 'active', 'region'),
			('380', NULL, 'West Indies, regional', NULL, 'active', 'region'),
			('389', NULL, 'North & Central America, regional', NULL, 'active', 'region'),
			('489', NULL, 'South America, regional', NULL, 'active', 'region'),
			('498', NULL, 'America, regional', NULL, 'active', 'region'),
			('589', NULL, 'Middle East, regional', NULL, 'active', 'region'),
			('619', NULL, 'Central Asia, regional', NULL, 'active', 'region'),
			('679', NULL, 'South Asia, regional', NULL, 'active', 'region'),
			('689', NULL, 'South & Central Asia, regional', NULL, 'active', 'region'),
			('789', NULL, 'Far East Asia, regional', NULL, 'active', 'region'),
			('798', NULL, 'Asia, regional', NULL, 'active', 'region'),
			('889', NULL, 'Oceania, regional', NULL, 'active', 'region'),
			('998', NULL, 'Developing countries, unspecified', NULL, 'active', 'region'),
			('10', NULL, 'ODA', 'Official Development Assistance', 'active', 'flow_type'),
			('20', NULL, 'OOF', 'Other Official Flows', 'withdrawn', 'flow_type'),
			('21', NULL, 'Non-export credit OOF', 'Other Official Flows, excl. export credits', 'active', 'flow_type'),
			('22', NULL, 'Officially supported export credits', 'Officially supported export credits. Covers both official direct export credits and private export credits under official guarantee or insurance', 'active', 'flow_type'),
			('30', NULL, 'Private Development Finance', 'Financing by civil society organisations (NGOs, philantropic foundations, etc.)', 'active', 'flow_type'),
			('35', NULL, 'Private Market', 'Private long-term (i.e. over one-year maturity) capital transactions made by residents of DAC countries', 'withdrawn', 'flow_type'),
			('36', NULL, 'Private Foreign Direct Investment', 'Private Foreign Direct Investment', 'active', 'flow_type'),
			('37', NULL, 'Other Private flows at market terms', 'Private long-term (i.e. over one-year maturity) capital transactions made by residents of DAC countries', 'active', 'flow_type'),
			('40', NULL, 'Non flow', 'e.g. GNI, ODA%GNI, Population etc', 'active', 'flow_type'),
			('50', NULL, 'Other flows', 'e.g. non-ODA component of peacebuilding operations', 'active', 'flow_type'),
			('1', NULL, 'Bilateral', NULL, 'active', 'collaboration_type'),
			('2', NULL, 'Multilateral (inflows)', NULL, 'active', 'collaboration_type'),
			('4', NULL, 'Multilateral outflows', NULL, 'active', 'collaboration_type'),
			('6', NULL, 'Private Sector Outflows', NULL, 'active', 'collaboration_type'),
			('8', NULL, 'Bilateral, triangular co-operation.', 'Activities where one or more bilateral providers of development co-operation or international organisations support South-South co-operation, joining forces with developing countries to facilitate a sharing of knowledge and experience among all partners involved. (Activities that only involve bilateral providers or multilateral agencies without a South-South co-operation element (e.g. joint programming, pooled funding or delegated co-operation) should not be assigned bi_multi 8.)', 'active', 'collaboration_type'),
			('A01', 'A', 'General budget support', 'Unearmarked contributions to the government budget including funding to support the implementation of macroeconomic reforms (structural adjustment programmes, poverty reduction strategies). Budget support is a method of financing a recipient country’s budget through a transfer of resources from an external financing agency to the recipient government’s national treasury. The funds thus transferred are managed in accordance with the recipient’s budgetary procedures. Funds transferred to the national treasury for financing programmes or projects managed according to different budgetary procedures from those of the recipient country, with the intention of earmarking the resources for specific uses, are therefore excluded.', 'active', 'aid_type'),
			('A02', 'A', 'Sector budget support', 'Sector budget support, like general budget support, is a financial contribution to a recipient government’s budget. However, in sector budget support, the dialogue between donors and partner governments focuses on sector-specific concerns, rather than on overall policy and budget priorities.', 'active', 'aid_type'),
			('B02', 'B', 'Core contributions to multilateral institutions', 'These funds are classified as multilateral ODA (all other categories fall under bilateral ODA). The recipient multilateral institution pools contributions so that they lose their identity and become an integral part of its financial assets. See Annex 2 of the DAC Directives for a comprehensive list of agencies core contributions to which may be reported under B02 (Section I. Multilateral institutions).', 'active', 'aid_type'),
			('B04', 'B', 'Basket funds/pooled funding', 'The donor contributes funds to an autonomous account, managed jointly with other donors and/or the recipient. The account will have specific purposes, modes of disbursement and accountability mechanisms, and a limited time frame. Basket funds are characterised by common project documents, common funding contracts and common reporting/audit procedures with all donors. Donors’ contributions to funds managed autonomously by international organisations are recorded under B03.', 'active', 'aid_type'),
			('C01', 'C', 'Project-type interventions', 'A project is a set of inputs, activities and outputs, agreed with the partner country*, to reach specific objectives/outcomes within a defined time frame, with a defined budget and a defined geographical area. Projects can vary significantly in terms of objectives, complexity, amounts involved and duration. There are smaller projects that might involve modest financial resources and last only a few months, whereas large projects might involve more significant amounts, entail successive phases and last for many years. A large project with a number of different components is sometimes referred to as a programme, but should nevertheless be recorded here. Feasibility studies, appraisals and evaluations are included (whether designed as part of projects/programmes or dedicated funding arrangements). Academic studies, research and development, trainings, scholarships, and other technical assistance activities not directly linked to development projects/programmes should instead be recorded under D02. Aid channelled through NGOs or multilaterals is also recorded here. This includes payments for NGOs and multilaterals to implement donors’ projects and programmes, and funding of specified NGOs projects. By contrast, core funding of NGOs and multilaterals as well as contributions to specific-purpose funds are recorded under B.* In the cases of equity investments, humanitarian aid or aid channelled through NGOs, projects are recorded here even if there was no direct agreement between the donor and the partner country.', 'active', 'aid_type'),
			('D01', 'D', 'Donor country personnel', 'Experts, consultants, teachers, academics, researchers, volunteers and contributions to public and private bodies for sending experts to developing countries.', 'active', 'aid_type'),
			('D02', 'D', 'Other technical assistance', 'Provision, outside projects as described in category C01, of technical assistance in recipient countries (excluding technical assistance performed by donor experts reported under D01, and scholarships/training in donor country reported under E01). This includes training and research; language training; south-south studies; research studies; collaborative research between donor and recipient universities and organisations); local scholarships; development-oriented social and cultural programmes. This category also covers ad hoc contributions such as conferences, seminars and workshops, exchange visits, publications, etc.', 'active', 'aid_type'),
			('E01', 'E', 'Scholarships/training in donor country', 'Financial aid awards for individual students and contributions to trainees.', 'active', 'aid_type'),
			('E02', 'E', 'Imputed student costs', 'Indirect (“imputed”) costs of tuition in donor countries.', 'active', 'aid_type'),
			('F01', 'F', 'Debt relief', 'Groups all actions relating to debt (forgiveness, conversions, swaps, buy-backs, rescheduling, refinancing).', 'active', 'aid_type'),
			('G01', 'G', 'Administrative costs not included elsewhere', 'Administrative costs of development assistance programmes not already included under other ODA items as an integral part of the costs of delivering or implementing the aid provided. This category covers situation analyses and auditing activities.As regards the salaries component of administrative costs, it relates to in-house agency staff and contractors only; costs associated with donor experts/consultants are to be reported under category C or D01.', 'active', 'aid_type'),
			('H01', 'H', 'Development awareness', 'Funding of activities designed to increase public support, i.e. awareness in the donor country of development co-operation efforts, needs and issues.', 'active', 'aid_type'),
			('H02', 'H', 'Refugees/asylum seekers in donor countries', 'Costs incurred in donor countries for basic assistance to asylum seekers and refugees from developing countries, up to 12 months, when costs cannot be disaggregated. See section II.6 and Annex 17.', 'active', 'aid_type'),
			('H03', 'H', 'Asylum-seekers ultimately accepted', 'Costs incurred in donor countries for basic assistance to asylum seekers, when these are ultimately accepted. This category includes only costs incurred prior to recognition.', 'active', 'aid_type'),
			('H04', 'H', 'Asylum-seekers ultimately rejected', 'Costs incurred in donor countries for basic assistance to asylum seekers, when these are ultimately rejected. This category includes only costs incurred prior to rejection. Members may base their reporting on the first instance rejection, where a final decision on status is anticipated to occur after a 12-month period, and this facilitates the establishment of a conservative estimate. For further guidance on how to proceed with calculating costs related to rejected asylum seekers, see Clarification 5, third bullet in section II.6 of the Reporting Directives.', 'active', 'aid_type'),
			('H05', 'H', 'Recognised refugees', 'Costs incurred in donor countries for basic assistance to refugees with a recognised status. This category only includes costs after recognition (or after date of entry into a country through a resettlement programme).', 'active', 'aid_type'),
			('1', NULL, 'Gender Equality', NULL, 'active', 'policy_marker'),
			('2', NULL, 'Aid to Environment', NULL, 'active', 'policy_marker'),
			('3', NULL, 'Participatory Development/Good Governance', NULL, 'active', 'policy_marker'),
			('4', NULL, 'Trade Development', NULL, 'active', 'policy_marker'),
			('10', NULL, 'Disaster Risk Reduction(DRR)', NULL, 'active', 'policy_marker'),
			('11', NULL, 'Disability', NULL, 'active', 'policy_marker'),
			('12', NULL, 'Nutrition', NULL, 'active', 'policy_marker'),
			('1', NULL, 'Planned start', 'The date on which the activity is planned to start, for example the date of the first planned disbursement or when physical activity starts.', 'active', 'activity_date_type'),
			('2', NULL, 'Actual start', 'The actual date the activity starts, for example the date of the first disbursement or when physical activity starts.', 'active', 'activity_date_type'),
			('3', NULL, 'Planned End', 'The date on which the activity is planned to end, for example the date of the last planned disbursement or when physical activity is complete.', 'active', 'activity_date_type'),
			('4', NULL, 'Actual end', 'The actual date the activity ends, for example the date of the last disbursement or when physical activity is complete.', 'active', 'activity_date_type'),
			('1', '', 'Global', 'The activity scope is global', 'active', 'activity_scope'),
			('2', '', 'Regional', 'The activity scope is a supranational region', 'active', 'activity_scope'),
			('3', '', 'Multi-national', 'The activity scope covers multiple countries, that don\'t constitute a region', 'active', 'activity_scope'),
			('4', '', 'National', 'The activity scope covers one country', 'active', 'activity_scope'),
			('5', '', 'Sub-national: Multi-first-level administrative areas', 'The activity scope covers more than one first-level subnational administrative areas (e.g. counties, provinces, states)', 'active', 'activity_scope'),
			('6', '', 'Sub-national: Single first-level administrative area', 'The activity scope covers one first-level subnational administrative area (e.g. country, province, state)', 'active', 'activity_scope'),
			('7', '', 'Sub-national: Single second-level administrative area', 'The activity scope covers one second-level subnational administrative area (e.g. municipality or district)', 'active', 'activity_scope'),
			('8', '', 'Single location', 'The activity scope covers one single location (e.g. town, village, farm)', 'active', 'activity_scope'),
			('0', '', 'not targeted', 'The score \"not targeted\" means that the activity was examined but found not to target the policy objective.', 'active', 'policy_significance'),
			('1', '', 'significant objective', 'Significant (secondary) policy objectives are those which, although important, were not the prime motivation for undertaking the activity.', 'active', 'policy_significance'),
			('2', '', 'principal objective', 'Principal (primary) policy objectives are those which can be identified as being fundamental in the design and impact of the activity and which are an explicit objective of the activity. They may be selected by answering the question \"Would the activity have been undertaken without this objective?\"', 'active', 'policy_significance'),
			('3', '', 'principal objective AND in support of an action programme', 'For desertification-related aid only', 'active', 'policy_significance'),
			('4', '', 'Explicit primary objective', '', 'active', 'policy_significance'),
			('1', '', 'OECD DAC CRS', 'The policy marker is an OECD DAC CRS policy marker, Reported in columns 20-23, 28-31 and 54 of CRS++ reporting format.', 'active', 'policy_marker_vocabulary'),
			('99', '', 'Reporting Organisation', 'The policy marker is one that is defined and tracked by the reporting organisation', 'active', 'policy_marker_vocabulary')" 
		);
	}
}

function iati_get_data( $string, $show_one = true ){
    if( !is_string( $string ) ) {
        return $string;
    }

    // Decode the json string and create an array
    $array           = json_decode( $string, true );

    // Decoded string is non an array
    if( !is_array( $array ) ) {
        return $string;
    }

    // Count the number of elements in the array
    $num_rows       = sizeof( $array );
    
    // If array contains only one elemnt, return only that element
    if( $num_rows == 1 && $show_one == true ) {
        return $array[0];
    }

    // Return entire array
    return $array;
}

function iati_column_exists( $column ) {
    if( is_null( $column ) OR empty( $column ) OR $column == 'null' ) {
        return false;
    }
    
    return true;
}

// Get functions
function iati_get_code( $code, $type ) {
	global $wpdb;
	
	$code				= esc_sql( $code );
	$type				= esc_sql( $type );

    $iati_code          = $wpdb->get_row( "SELECT * FROM `".$wpdb->prefix."iati_codes` WHERE code='".$code."' AND type='".$type."'", ARRAY_A );

    return $iati_code['name'];
}

// Non get functions
function iati_code( $code, $type ){
    echo iati_get_code( $code, $type );
}

// Activity progression percentage
function iati_activity_progression( $activity_date ) {
    // Activity date must be an array
    $activity_date      = is_array( $activity_date ) ? $activity_date : json_decode( $activity_date, true );

    $planned_start_date         = '';
    $actual_start_date          = '';
    $planned_end_date           = '';
    $actual_end_date            = '';

    foreach( $activity_date as $date ){
        if( $date['@type']      == 1 ) {
            $planned_start_date .= isset( $date['@iso-date'] ) ? $date['@iso-date'] : '';
        }

        if( $date['@type']      == 2 ) {
            $actual_start_date  .= isset( $date['@iso-date'] ) ? $date['@iso-date'] : '';
        }

        if( $date['@type']      == 3 ) {
            $planned_end_date   .= isset( $date['@iso-date'] ) ? $date['@iso-date'] : '';
        }

        if( $date['@type']      == 4 ) {
            $actual_end_date    .= isset( $date['@iso-date'] ) ? $date['@iso-date'] : '';
        }
    }

    // Start date is the actual start date, or it is the planned start date.
    $start_date                 = empty( $actual_start_date ) ? $planned_start_date : $actual_start_date;
    
    // End date is the actual end date, or it is the planned end date.
    $end_date                   = empty( $actual_end_date ) ? $planned_end_date : $actual_end_date;

    $start_timestamp            = strtotime( $start_date );
    $end_timestamp              = strtotime( $end_date );

    $duration_timestamp         = absint( $end_timestamp) - absint( $start_timestamp );
    $covered_timestamp          = time() - absint( $start_timestamp );

    round( $covered_timestamp / ( 60 * 60 * 24 ) );

    $progression                = round( ( $covered_timestamp * 100 ) / $duration_timestamp, 2 );
    return $progression;
}

function iati_progress_bar( $percentage, $echo=true ) {
    $progression = '
        <div class="precentage" style="padding-left: '.( $percentage - 3 ).'%">'.$percentage.'%</div>
            <div class="iati-progress-bar-container">
            <div class="iati-progress-bar" style="width:'.$percentage.'%">&nbsp;</div>
		</div>';
	
	if( !$echo ) {
		return $progression;
	}

	echo $progression;
}