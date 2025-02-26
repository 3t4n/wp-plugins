<?php
$html ='';
$html .='
<div class="enba-wrapper enba-'.$enba_layout.' '.$enba_position.'" data-enba-behavior="'.$enba_behavior.'" data-enba-scrollh="'.$enba_scrollH.'" data-enba-position="'.$enba_position.'">
<div class="enba-content-area">
    <div class="enba-info '.$enba_width.'">
        <h3 class="enba-title"><a href="' . esc_url( $link ) . '">' .$event_title. '</a></h3>';
        if($enba_show_date=='yes'){	
            $start_date = enba_event_schedule($enba_event_ID,$enba_date_format);		
            $html .='<span class="enba-date">'.$start_date.'</span>';
        }        
        $html .= $venue_html .
    '</div>';
    if($enba_show_timer =='yes'){       
        $html .='<div class="enba-countdown">'.$countdown_html.'</div>';
    }
$html .='</div>
<div class="enba-close-button"><i class="enba-icon-cancel"></i></div>
</div>
<div class="enba-show-button"><i></i></div>';