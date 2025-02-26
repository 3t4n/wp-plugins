<?php
/**
 * Timeline Callback
 */

 function timeline_callback($attributes){
    $handle = $attributes['id'];
    $atgb_css = '';
    /**
     * Normal CSS
     */

    // zindex
    if(isset($attributes['zIndex'])){
        $atgb_css .= '.wp-block-atlb-timeline-block.'.$handle.'{';
            $atgb_css .= 'z-index: '.$attributes['zIndex'].';';
        $atgb_css .= '}';
    }

    // content
    $atgb_css .= '.wp-block-atlb-timeline-block.'.$handle.' .timeline__content{';
        $atgb_css .= 'border-radius: '.$attributes['contentBorderRadius'].'px;';
        if($attributes['contentBorderStyle'] != 'none'){
            $atgb_css .= 'border-color: '.$attributes['contentBorderColor'].';';
            $atgb_css .= 'border-style: '.$attributes['contentBorderStyle'].';';
            if( $attributes['enableLinkedBorder']){
                $atgb_css .= 'border-width: '.$attributes['contentBorderLinkedWidth'].'px;';
            }else {
                $atgb_css .= 'border-width: '.$attributes['contentBorderTopWidth'].'px' . ' ' . $attributes['contentBorderRightWidth'].'px' . ' ' . $attributes['contentBorderBottomWidth'].'px' . ' ' . $attributes['contentBorderLeftWidth'].'px;';
            }
        }
        if($attributes['contentBg']){
            $atgb_css .= 'background-color: '.$attributes['contentBg'].';';
        }
    $atgb_css .= '}';

    // marker icon 
    $atgb_css .= '.wp-block-atlb-timeline-block.'.$handle.' .timeline__marker i{';
        $atgb_css .= 'border-radius: '.$attributes['markerBorderRadius'].'px;';
        if($attributes['markerBorderStyle'] !== 'none'){
            $atgb_css .= 'border-color: '.$attributes['markerBorderColor'].';';
            $atgb_css .= 'border-style: '.$attributes['markerBorderStyle'].';';
            $atgb_css .= 'border-width: '.$attributes['markerBorderWidth'].'px;';
        }
        $atgb_css .= 'color: '.$attributes['markerColor'].';';
        if($attributes['markerBg']){
            $atgb_css .= 'background: '.$attributes['markerBg'].';';
        }
    $atgb_css .= '}';

    // connector 
    $atgb_css .= '.wp-block-atlb-timeline-block.'.$handle.' .timeline__bar{';
        $atgb_css .= 'background: '.$attributes['connectorColor'].';';
        $atgb_css .= 'width: '.$attributes['connectorThickness'].'px;';
        $atgb_css .= 'margin-left: -'.($attributes['connectorThickness']/2).'px;';
    $atgb_css .= '}';

    // date name
    $atgb_css .= '.wp-block-atlb-timeline-block.'.$handle.' .time__date_content{';
        $atgb_css .= 'border-radius: '.$attributes['dateNameBorderRadius'].'px;';
        if($attributes['dateNameBorderStyle'] != 'none'){
            $atgb_css .= 'border-color: '.$attributes['dateNameBorderColor'].';';
            $atgb_css .= 'border-style: '.$attributes['dateNameBorderStyle'].';';
            if( $attributes['enableDateNameLinkedBorder']){
                $atgb_css .= 'border-width: '.$attributes['dateNameBorderLinkedWidth'].'px;';
            }else {
                $atgb_css .= 'border-width: '.$attributes['dateNameBorderTopWidth'].'px' . ' ' . $attributes['dateNameBorderRightWidth'].'px' . ' ' . $attributes['dateNameBorderBottomWidth'].'px' . ' ' . $attributes['dateNameBorderLeftWidth'].'px;';
            }
        }
        if( $attributes['enableDateDlinkedPadding']){
            $atgb_css .= 'padding: '.$attributes['dateDlinkedPadding'].'px;';
        }else {
            $atgb_css .= 'padding: '.$attributes['dateDtopPadding'].'px' . ' ' . $attributes['dateDrightPadding'].'px' . ' ' . $attributes['dateDbottomPadding'].'px' . ' ' . $attributes['dateDleftPadding'].'px;';
        }
        if($attributes['dateNameBg']){
            $atgb_css .= 'background-color: '.$attributes['dateNameBg'].';';
        }
        if($attributes['dateNameColor']){
            $atgb_css .= 'color: '.$attributes['dateNameColor'].';';
        }
    $atgb_css .= '}';

    /**
     * Desktop View
     */

    $atgb_css .= '@media only screen and (min-width: 1025px) {';
        // row gap
        $atgb_css .= '.wp-block-atlb-timeline-block.'.$handle.'{';
            $atgb_css .= 'row-gap: '.$attributes['deskVerticalSpacing'].'px;';
        $atgb_css .= '}';

        // Content Padding
        $atgb_css .= '.wp-block-atlb-timeline-block.'.$handle.' .timeline__content{';
            if($attributes['enableContentDlinkedPadding']){
                $atgb_css .= 'padding: '.$attributes['contentDlinkedPadding'].'px;';
            }else {
                $atgb_css .= 'padding-top: '.$attributes['contentDtopPadding'].'px;';
                $atgb_css .= 'padding-right: '.$attributes['contentDrightPadding'].'px;';
                $atgb_css .= 'padding-bottom: '.$attributes['contentDbottomPadding'].'px;';
                $atgb_css .= 'padding-left: '.$attributes['contentDleftPadding'].'px;';
            }
        $atgb_css .= '}';

        // marker icon 
        $atgb_css .= '.wp-block-atlb-timeline-block.'.$handle.' .timeline__marker i{';
            $atgb_css .= 'font-size: '.$attributes['deskMarkerSize'].'px;';
            $atgb_css .= 'width: '.$attributes['deskMarkerContainerSize'].'px;';
            $atgb_css .= 'height: '.$attributes['deskMarkerContainerSize'].'px;';
            $atgb_css .= 'line-height: '.$attributes['deskMarkerContainerSize'].'px;';
        $atgb_css .= '}';

        if($attributes['deskLayout'] === 'desk_left_layout'){
            $atgb_css .= '.wp-block-atlb-timeline-block.'.$handle.'.'.$attributes['deskLayout'].' .timeline__marker i{';
                $atgb_css .= 'margin-left: -'.($attributes['deskMarkerContainerSize']/2).'px;';
                $atgb_css .= 'margin-top: -'.($attributes['deskMarkerContainerSize']/2).'px;';
            $atgb_css .= '}';
        }

        if($attributes['deskLayout'] === 'desk_right_layout'){
            $atgb_css .= '.wp-block-atlb-timeline-block.'.$handle.'.'.$attributes['deskLayout'].' .timeline__marker i{';
                $atgb_css .= 'margin-right: -'.($attributes['deskMarkerContainerSize']/2).'px;';
                $atgb_css .= 'margin-top: -'.($attributes['deskMarkerContainerSize']/2).'px;';
            $atgb_css .= '}';
        }

    $atgb_css .= '}';

    /**
     * Tablet View
     */
    
    $atgb_css .= '@media only screen and (min-width: 768px) and (max-width: 1024px) {';
        $atgb_css .= '.wp-block-atlb-timeline-block.'.$handle.'{';
            $atgb_css .= 'row-gap: '.$attributes['tabVerticalSpacing'].'px;';
        $atgb_css .= '}';

        // Content Padding
        $atgb_css .= '.wp-block-atlb-timeline-block.'.$handle.' .timeline__content{';
            if($attributes['enableContentTlinkedPadding']){
                $atgb_css .= 'padding: '.$attributes['contentTlinkedPadding'].'px;';
            }else {
                $atgb_css .= 'padding-top: '.$attributes['contentTtopPadding'].'px;';
                $atgb_css .= 'padding-right: '.$attributes['contentTrightPadding'].'px;';
                $atgb_css .= 'padding-bottom: '.$attributes['contentTbottomPadding'].'px;';
                $atgb_css .= 'padding-left: '.$attributes['contentTleftPadding'].'px;';
            }
        $atgb_css .= '}';

        // marker icon
        $atgb_css .= '.wp-block-atlb-timeline-block.'.$handle.' .timeline__marker i{';
            $atgb_css .= 'font-size: '.$attributes['tabMarkerSize'].'px;';
            $atgb_css .= 'width: '.$attributes['tabMarkerContainerSize'].'px;';
            $atgb_css .= 'height: '.$attributes['tabMarkerContainerSize'].'px;';
            $atgb_css .= 'line-height: '.$attributes['tabMarkerContainerSize'].'px;';
        $atgb_css .= '}';

        if($attributes['tabLayout'] === 'tab_left_layout'){
            $atgb_css .= '.wp-block-atlb-timeline-block.'.$handle.'.'.$attributes['tabLayout'].' .timeline__marker i{';
                $atgb_css .= 'margin-left: -'.($attributes['tabMarkerContainerSize']/2).'px;';
                $atgb_css .= 'margin-top: -'.($attributes['tabMarkerContainerSize']/2).'px;';
            $atgb_css .= '}';
        }

        if($attributes['tabLayout'] === 'tab_right_layout'){
            $atgb_css .= '.wp-block-atlb-timeline-block.'.$handle.'.'.$attributes['tabLayout'].' .timeline__marker i{';
                $atgb_css .= 'margin-right: -'.($attributes['tabMarkerContainerSize']/2).'px;';
                $atgb_css .= 'margin-top: -'.($attributes['tabMarkerContainerSize']/2).'px;';
            $atgb_css .= '}';
        }

    $atgb_css .= '}';

    /** 
     * Mobile View
     */

    $atgb_css .= '@media only screen and (max-width: 767px) {';
        $atgb_css .= '.wp-block-atlb-timeline-block.'.$handle.'{';
            $atgb_css .= 'row-gap: '.$attributes['mobVerticalSpacing'].'px;';
        $atgb_css .= '}';

        // Content Padding
        $atgb_css .= '.wp-block-atlb-timeline-block.'.$handle.' .timeline__content{';
            if($attributes['enableContentMlinkedPadding']){
                $atgb_css .= 'padding: '.$attributes['contentMlinkedPadding'].'px;';
            }else {
                $atgb_css .= 'padding-top: '.$attributes['contentMtopPadding'].'px;';
                $atgb_css .= 'padding-right: '.$attributes['contentMrightPadding'].'px;';
                $atgb_css .= 'padding-bottom: '.$attributes['contentMbottomPadding'].'px;';
                $atgb_css .= 'padding-left: '.$attributes['contentMleftPadding'].'px;';
            }
        $atgb_css .= '}';

        // marker icon
        $atgb_css .= '.wp-block-atlb-timeline-block.'.$handle.' .timeline__marker i{';
            $atgb_css .= 'font-size: '.$attributes['mobMarkerSize'].'px;';
            $atgb_css .= 'width: '.$attributes['mobMarkerContainerSize'].'px;';
            $atgb_css .= 'height: '.$attributes['mobMarkerContainerSize'].'px;';
            $atgb_css .= 'line-height: '.$attributes['mobMarkerContainerSize'].'px;';
        $atgb_css .= '}';

        if($attributes['mobLayout'] === 'mob_left_layout'){
            $atgb_css .= '.wp-block-atlb-timeline-block.'.$handle.'.'.$attributes['mobLayout'].' .timeline__marker i{';
                $atgb_css .= 'margin-left: -'.($attributes['mobMarkerContainerSize']/2).'px;';
                $atgb_css .= 'margin-top: -'.($attributes['mobMarkerContainerSize']/2).'px;';
            $atgb_css .= '}';
        }

        if($attributes['mobLayout'] === 'mob_right_layout'){
            $atgb_css .= '.wp-block-atlb-timeline-block.'.$handle.'.'.$attributes['mobLayout'].' .timeline__marker i{';
                $atgb_css .= 'margin-right: -'.($attributes['mobMarkerContainerSize']/2).'px;';
                $atgb_css .= 'margin-top: -'.($attributes['mobMarkerContainerSize']/2).'px;';
            $atgb_css .= '}';
        }

    $atgb_css .= '}';

    return $atgb_css;
 }