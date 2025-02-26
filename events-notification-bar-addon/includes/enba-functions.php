<?php
    // on plugin activation redirect to the setting page
    function enba_plugin_redirect() {
        if (get_option('enba_do_activation_redirect', false)) {
            delete_option('enba_do_activation_redirect');
            exit( wp_redirect( admin_url( 'admin.php?page=event_notification_bar' ) ) );

        }
    }

    function enba_get_option($option, $section, $default = ''){
        $options = get_option($section);
        if (isset($options[$option])) {
            return $options[$option];
        }
        return $default;
    }

    function enba_dynamic_styles($enba_layout, $enba_bg_color, $enba_text_color, $enba_font_size, $enba_content_width){        
        $dynamic_styles = "";
        $dynamic_styles .= "
        .enba-wrapper{
            background-color: $enba_bg_color;
            color : $enba_text_color;
            display: none;
            opacity: 0;
        }
        .enba-content-area {
            max-width: $enba_content_width;
        }
        .enba-wrapper h3.enba-title a{
            color : $enba_text_color;
            font-size :$enba_font_size;
        }
        .enba-show-button{
            color : $enba_text_color;
            background-color: $enba_bg_color;
        }
        "; 
           
        return $enba_dy_styles = "<style type='text/css'>".$dynamic_styles."</style>";        
    }

    function enba_get_countdown_output( $enba_event_ID,$event_title){	
        $countdown_output='';
        $hourformat =	enba_generate_countdown_html();
        		
		// Get the event start date and end date.
        $startdate = tribe_get_start_date( $enba_event_ID, false, Tribe__Date_Utils::DBDATETIMEFORMAT );
		$enddate = tribe_get_end_date( $enba_event_ID, false, Tribe__Date_Utils::DBDATETIMEFORMAT );
		$start_date_formated= tribe_get_start_date($enba_event_ID, false, 'd F Y' );

		// Get the number of seconds remaining 
		$seconds = strtotime( $startdate ) - current_time( 'timestamp' );
		$endseconds =  current_time( 'timestamp' ) - strtotime( $enddate );	
				
		$countdown_output .='			
        <div class="enba-timer-wrapper">
            <div class="enba-date-timer">';
            if ( $seconds > 0 ) {				
            $countdown_output .=enba_generate_countdown_output( $seconds, $hourformat, $enba_event_ID );				
            }
            $countdown_output .='
            </div>
        </div>';
        return $countdown_output;
	}
		
	function enba_generate_countdown_output( $seconds, $hourformat, $enba_event_ID){		
        $timer_output = '';
        if ( $enba_event_ID ) {
            $timer_output .= '<div class="enba-countdown-timer">
                <span class="enba-seconds-section">' . $seconds . '</span>
                <span class="enba-countdown-format">' . $hourformat . '</span>
            </div>';        
        }
        return $timer_output;
	}
		
    function enba_generate_countdown_html(){
        $enba_html='';            
        $enba_html .='				
        <div class="enba-countdown-timer">        
            <div class="enba-section enba-days-section">
                <span class="enba-amount">DD</span>
                <span class="enba-word">'.__( 'days','enba').'</span>
            </div>
            <div class="enba-section enba-hours-section">
                <span class="enba-amount">HH</span>
                <span class="enba-word">'.__( 'hours','enba').'</span>
            </div>
            <div class="enba-section enba-minutes-section">
                <span class="enba-amount">MM</span>
                <span class="enba-word">'.__( 'min','enba').'</span>
            </div>
            <div class="enba-section enba-seconds-section">
                <span class="enba-amount">SS</span>
                <span class="enba-word">'.__( 'sec','enba').'</span>
            </div>
        </div>';
        return $enba_html; 
    }
            
    // grab events time for later use
    function enba_tribe_event_time($post_id, $display = true ) {
        $event =$post_id;
        if ( tribe_event_is_all_day( $event ) ) { // all day event
            if ( $display ) {
                _e( 'All day', 'the-events-calendar' );
            }
            else {
                return __( 'All day', 'the-events-calendar' );
            }
        }
        elseif ( tribe_event_is_multiday( $event ) ) { // multi-date event
            $enba_start_date= tribe_get_start_date(  $event, false, false );
            $enba_end_date = tribe_get_end_date(  $event, false, false );
            if ( $display ) {
                printf( __( '%s - %s', 'ect' ), $enba_start_date, $enba_end_date );
            }
            else {
                return sprintf( __( '%s - %s', 'ect' ), $enba_start_date, $enba_end_date );
            }
        }
        else {
            $time_format = get_option( 'time_format' );
            $enba_start_date= tribe_get_start_date( $event, false, $time_format );
            $enba_end_date = tribe_get_end_date( $event, false, $time_format );
            if ( $enba_start_date!== $enba_end_date ) {
                if ( $display ) {
                    printf( __( '%s - %s', 'ect' ), $enba_start_date, $enba_end_date );
                }
                else {
                    return sprintf( __( '%s - %s', 'ect' ), $enba_start_date, $enba_end_date );
                }
            }
            else {
                if ( $display ){
                    printf( '%s', $enba_start_date);
                }
                else {
                    return sprintf( '%s', $enba_start_date);
                }
            }
        }
    }

    // generate events dates html
    function enba_event_schedule($event_id,$enba_date_format){
        /*Date Format START*/        
        $enba_ev_time=enba_tribe_event_time($event_id,false);
        $enba_event_schedule='';

        // $enba_ev_time=$this->ect_tribe_event_time($event_id,false);
        if($enba_date_format=="DM") {
            $enba_event_schedule='<div class="enba-date"  itemprop="startDate" content="'.tribe_get_start_date($event_id, false, 'Y-m-dTg:i').'"><i class="enba-icon-calendar"></i> ';
            if (!tribe_event_is_multiday( $event_id ) ) {
                $enba_event_schedule.='<span class="enba-ev-day">'.tribe_get_start_date($event_id, false, 'd' ).'</span>
                <span class="enba-ev-mo">'.tribe_get_start_date($event_id, false, 'M' ).'</span>
                </div>';
            }
            else {
                $enba_event_schedule.='<span class="enba-ev-day">'.tribe_get_start_date($event_id, false, 'd' ).'</span>
                <span class="enba-ev-mo">'.tribe_get_start_date($event_id, false, 'M' ).'</span>
                <span class="enba-ev-blank"> - </span>
                <span class="enba-ev-day">'.tribe_get_end_date($event_id, false, 'd' ).'</span>
                <span class="enba-ev-mo">'.tribe_get_end_date($event_id, false, 'M' ).'</span>
                </div>';
            }
            $enba_event_schedule.='<meta itemprop="endDate" content="'.tribe_get_end_date($event_id, false, 'Y-m-dTg:i').'">';
        }
        else if($enba_date_format=="MD") {
            $enba_event_schedule='<div class="enba-date" itemprop="startDate" content="'.tribe_get_start_date($event_id, false, 'Y-m-dTg:i').'"><i class="enba-icon-calendar"></i> ';
            if (!tribe_event_is_multiday( $event_id ) ) {
                $enba_event_schedule.='<span class="enba-ev-mo">'.tribe_get_start_date($event_id, false, 'M' ).'</span>
                <span class="enba-ev-day">'.tribe_get_start_date($event_id, false, 'd' ).'</span>
                </div>';
            }
            else{
                $enba_event_schedule.='<span class="enba-ev-mo">'.tribe_get_start_date($event_id, false, 'M' ).'</span>
                <span class="enba-ev-day">'.tribe_get_start_date($event_id, false, 'd' ).'</span>
                <span class="enba-ev-blank"> - </span>
                <span class="enba-ev-mo">'.tribe_get_end_date($event_id, false, 'M' ).'</span>
                <span class="enba-ev-day">'.tribe_get_end_date($event_id, false, 'd' ).'</span>
                </div>';
            }
            $enba_event_schedule.='<meta itemprop="endDate" content="'.tribe_get_end_date($event_id, false, 'Y-m-dTg:i').'">';
        }
        else if($enba_date_format=="FD") {
            $enba_event_schedule='<div class="enba-date" itemprop="startDate" content="'.tribe_get_start_date($event_id, false, 'Y-m-dTg:i').'"><i class="enba-icon-calendar"></i> ';
            if (!tribe_event_is_multiday( $event_id ) ) {
                $enba_event_schedule.='<span class="enba-ev-mo">'.tribe_get_start_date($event_id, false, 'F' ).'</span>
                <span class="enba-ev-day">'.tribe_get_start_date($event_id, false, 'd' ).'</span>
                </div>';
            }
            else{
                $enba_event_schedule.='<span class="enba-ev-mo">'.tribe_get_start_date($event_id, false, 'F' ).'</span>
                <span class="enba-ev-day">'.tribe_get_start_date($event_id, false, 'd' ).'</span>
                <span class="enba-ev-blank"> - </span>
                <span class="enba-ev-mo">'.tribe_get_end_date($event_id, false, 'F' ).'</span>
                <span class="enba-ev-day">'.tribe_get_end_date($event_id, false, 'd' ).'</span>
                </div>';
            }
            $enba_event_schedule.='<meta itemprop="endDate" content="'.tribe_get_end_date($event_id, false, 'Y-m-dTg:i').'">';
        }
        else if($enba_date_format=="DF") {
            $enba_event_schedule='<div class="enba-date" itemprop="startDate" content="'.tribe_get_start_date($event_id, false, 'Y-m-dTg:i').'"><i class="enba-icon-calendar"></i> ';
            if (!tribe_event_is_multiday( $event_id ) ) {
                $enba_event_schedule.='<span class="enba-ev-day">'.tribe_get_start_date($event_id, false, 'd' ).'</span>
                <span class="enba-ev-mo">'.tribe_get_start_date($event_id, false, 'F' ).'</span>
                </div>';
            }
            else{
                $enba_event_schedule.='<span class="enba-ev-day">'.tribe_get_start_date($event_id, false, 'd' ).'</span>
                <span class="enba-ev-mo">'.tribe_get_start_date($event_id, false, 'F' ).'</span>
                <span class="enba-ev-blank"> - </span>
                <span class="enba-ev-day">'.tribe_get_end_date($event_id, false, 'd' ).'</span>
                <span class="enba-ev-mo">'.tribe_get_end_date($event_id, false, 'F' ).'</span>
                </div>';
            }
            $enba_event_schedule.='<meta itemprop="endDate" content="'.tribe_get_end_date($event_id, false, 'Y-m-dTg:i').'">';
        }
        else if($enba_date_format=="FD,Y") {
            $enba_event_schedule='<div class="enba-date"  itemprop="startDate" content="'.tribe_get_start_date($event_id, false, 'Y-m-dTg:i').'"><i class="enba-icon-calendar"></i> ';
            if (!tribe_event_is_multiday( $event_id ) ) {
                $enba_event_schedule.='<span class="enba-ev-mo">'.tribe_get_start_date($event_id, false, 'F' ).'</span>
                <span class="enba-ev-day">'.tribe_get_start_date($event_id, false, 'd' ).', </span>
                <span class="enba-ev-yr">'.tribe_get_start_date($event_id, false, 'Y' ).'</span>
                </div>';
            }
            else{
                $enba_event_schedule.='<span class="enba-ev-mo">'.tribe_get_start_date($event_id, false, 'F' ).'</span>
                <span class="enba-ev-day">'.tribe_get_start_date($event_id, false, 'd' ).', </span>
                <span class="enba-ev-yr">'.tribe_get_start_date($event_id, false, 'Y' ).'</span>
                <span class="enba-ev-blank"> - </span>
                <span class="enba-ev-mo">'.tribe_get_end_date($event_id, false, 'F' ).'</span>
                <span class="enba-ev-day">'.tribe_get_end_date($event_id, false, 'd' ).', </span>
                <span class="enba-ev-yr">'.tribe_get_end_date($event_id, false, 'Y' ).'</span>
                </div>';
            }
            $enba_event_schedule.='<meta itemprop="endDate" content="'.tribe_get_end_date($event_id, false, 'Y-m-dTg:i').'">';
        }
        else if($enba_date_format=="MD,Y") {
            $enba_event_schedule='<div class="enba-date"  itemprop="startDate" content="'.tribe_get_start_date($event_id, false, 'Y-m-dTg:i').'"><i class="enba-icon-calendar"></i> ';
            if (!tribe_event_is_multiday( $event_id ) ) {
                $enba_event_schedule.='<span class="enba-ev-mo">'.tribe_get_start_date($event_id, false, 'M' ).'</span>
                <span class="enba-ev-day">'.tribe_get_start_date($event_id, false, 'd' ).', </span>
                <span class="enba-ev-yr">'.tribe_get_start_date($event_id, false, 'Y' ).'</span>
                </div>';
            }
            else{
                $enba_event_schedule.='<span class="enba-ev-mo">'.tribe_get_start_date($event_id, false, 'M' ).'</span>
                <span class="enba-ev-day">'.tribe_get_start_date($event_id, false, 'd' ).', </span>
                <span class="enba-ev-yr">'.tribe_get_start_date($event_id, false, 'Y' ).'</span>
                <span class="enba-ev-blank"> - </span>
                <span class="enba-ev-mo">'.tribe_get_end_date($event_id, false, 'M' ).'</span>
                <span class="enba-ev-day">'.tribe_get_end_date($event_id, false, 'd' ).', </span>
                <span class="enba-ev-yr">'.tribe_get_end_date($event_id, false, 'Y' ).'</span>
                </div>';
            }
            $enba_event_schedule.='<meta itemprop="endDate" content="'.tribe_get_end_date($event_id, false, 'Y-m-dTg:i').'">';
        }
        else if($enba_date_format=="MD,YT") {
            $enba_event_schedule='<div class="enba-date" itemprop="startDate" content="'.tribe_get_start_date($event_id, false, 'Y-m-dTg:i').'"><i class="enba-icon-calendar"></i> ';
            if (!tribe_event_is_multiday( $event_id ) ) {
                $enba_event_schedule.='<span class="enba-ev-mo">'.tribe_get_start_date($event_id, false, 'M' ).'</span>
                <span class="enba-ev-day">'.tribe_get_start_date($event_id, false, 'd' ).', </span>
                <span class="enba-ev-yr">'.tribe_get_start_date($event_id, false, 'Y' ).'</span>
                <span class="enba-ev-time"><span class="enba-icon"><i class="enba-icon-clock" aria-hidden="true"></i></span> '.$enba_ev_time.'</span>
                </div>';
            }
            else {
                $enba_event_schedule.='<span class="enba-ev-mo">'.tribe_get_start_date($event_id, false, 'M' ).'</span>
                <span class="enba-ev-day">'.tribe_get_start_date($event_id, false, 'd' ).', </span>
                <span class="enba-ev-yr">'.tribe_get_start_date($event_id, false, 'Y' ).'</span>
                <span class="enba-ev-time">('.tribe_get_start_date($event_id, false, 'g:i A' ).')</span>
                <span class="enba-ev-blank"> - </span>
                <span class="enba-ev-mo">'.tribe_get_end_date($event_id, false, 'M' ).'</span>
                <span class="enba-ev-day">'.tribe_get_end_date($event_id, false, 'd' ).', </span>
                <span class="enba-ev-yr">'.tribe_get_end_date($event_id, false, 'Y' ).'</span>
                <span class="enba-ev-time">('.tribe_get_end_date($event_id, false, 'g:i A' ).')</span>
                </div>';
            }		
            $enba_event_schedule.='<meta itemprop="endDate" content="'.tribe_get_end_date($event_id, false, 'Y-m-dTg:i').'">';
        }
        else if($enba_date_format=="full") {
            $enba_event_schedule='<div class="enba-date" itemprop="startDate" content="'.tribe_get_start_date($event_id, false, 'Y-m-dTg:i').'"><i class="enba-icon-calendar"></i> ';								
            if (!tribe_event_is_multiday( $event_id ) ) {
                $enba_event_schedule.='<span class="enba-ev-day">'.tribe_get_start_date($event_id, false, 'd' ).'</span>
                <span class="enba-ev-mo">'.tribe_get_start_date($event_id, false, 'F' ).'</span>
                <span class="enba-ev-yr">'.tribe_get_start_date($event_id, false, 'Y' ).'</span>
                <span class="enba-ev-time">
                <span class="enba-icon"><i class="enba-icon-clock" aria-hidden="true"></i></span> '.$enba_ev_time.'</span>
                </div>';
            }
            else{
                $enba_event_schedule.='<span class="enba-ev-day">'.tribe_get_start_date($event_id, false, 'd' ).'</span>
                <span class="enba-ev-mo">'.tribe_get_start_date($event_id, false, 'F' ).'</span>
                <span class="enba-ev-yr">'.tribe_get_start_date($event_id, false, 'Y' ).'</span>
                <span class="enba-ev-time">('.tribe_get_start_date($event_id, false, 'g:i A' ).')</span>
                <span class="enba-ev-blank"> - </span>
                <span class="enba-ev-day">'.tribe_get_end_date($event_id, false, 'd' ).'</span>
                <span class="enba-ev-mo">'.tribe_get_end_date($event_id, false, 'F' ).'</span>
                <span class="enba-ev-yr">'.tribe_get_end_date($event_id, false, 'Y' ).'</span>
                <span class="enba-ev-time">('.tribe_get_end_date($event_id, false, 'g:i A' ).')</span>
                </div>';
            }														
            $enba_event_schedule.='<meta itemprop="endDate" content="'.tribe_get_end_date($event_id, false, 'Y-m-dTg:i').'">';
        }
        else if($enba_date_format=="dFY"){
            $enba_event_schedule='<div class="enba-date" itemprop="startDate" content="'.tribe_get_start_date($event_id, false, 'Y-m-dTg:i').'"><i class="enba-icon-calendar"></i> ';								
            if (!tribe_event_is_multiday( $event_id ) ) {
                $enba_event_schedule.='<span class="enba-ev-day">'.tribe_get_start_date($event_id, false, 'd' ).'</span>
                <span class="enba-ev-mo">'.tribe_get_start_date($event_id, false, 'F' ).'</span>
                <span class="enba-ev-yr">'.tribe_get_start_date($event_id, false, 'Y' ).'</span>
                </div>';
            }
            else {
                $enba_event_schedule.='<span class="enba-ev-day">'.tribe_get_start_date($event_id, false, 'd' ).'</span>
                <span class="enba-ev-mo">'.tribe_get_start_date($event_id, false, 'F' ).'</span>
                <span class="enba-ev-yr">'.tribe_get_start_date($event_id, false, 'Y' ).'</span>
                <span class="enba-ev-blank"> - </span>
                <span class="enba-ev-day">'.tribe_get_end_date($event_id, false, 'd' ).'</span>
                <span class="enba-ev-mo">'.tribe_get_end_date($event_id, false, 'F' ).'</span>
                <span class="enba-ev-yr">'.tribe_get_end_date($event_id, false, 'Y' ).'</span>
                </div>';
            }		
            $enba_event_schedule.='<meta itemprop="endDate" content="'.tribe_get_end_date($event_id, false, 'Y-m-dTg:i').'">';
        }
        else if($enba_date_format=='dMY') {
            $enba_event_schedule='<div class="enba-date" itemprop="startDate" content="'.tribe_get_start_date($event_id, false, 'Y-m-dTg:i').'"><i class="enba-icon-calendar"></i> ';								
            if (!tribe_event_is_multiday( $event_id ) ) {
                $enba_event_schedule.='<span class="enba-ev-day">'.tribe_get_start_date($event_id, false, 'd' ).'</span>
                <span class="enba-ev-mo">'.tribe_get_start_date($event_id, false, 'M' ).'</span>
                <span class="enba-ev-yr">'.tribe_get_start_date($event_id, false, 'Y' ).'</span>
                </div>';
            }
            else{
                $enba_event_schedule.='<span class="enba-ev-day">'.tribe_get_start_date($event_id, false, 'd' ).'</span>
                <span class="enba-ev-mo">'.tribe_get_start_date($event_id, false, 'M' ).'</span>
                <span class="enba-ev-yr">'.tribe_get_start_date($event_id, false, 'Y' ).'</span>
                <span class="enba-ev-blank"> - </span>
                <span class="enba-ev-day">'.tribe_get_end_date($event_id, false, 'd' ).'</span>
                <span class="enba-ev-mo">'.tribe_get_end_date($event_id, false, 'M' ).'</span>
                <span class="enba-ev-yr">'.tribe_get_end_date($event_id, false, 'Y' ).'</span>
                </div>';
            }
            $enba_event_schedule.='<meta itemprop="endDate" content="'.tribe_get_end_date($event_id, false, 'Y-m-dTg:i').'">';
        }
        else{
            $enba_event_schedule = '<div class="enba-date"><i class="enba-icon-calendar"></i> '.tribe_events_event_schedule_details($event_id).'</div>';
        }
        /*Date Format END*/
        return $enba_event_schedule;
    }


