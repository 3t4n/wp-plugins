<?php

if (!defined('ABSPATH')) exit;

if (!function_exists('amJL_event_structure')){
    function amJL_event_structure(){
        global $post;

        //--- get data from Forms ---//
        $event_name = get_post_meta($post->ID, 'EventName', true);
        $start_date = get_post_meta($post->ID, 'StartDate', true);
        $end_date = get_post_meta($post->ID, 'EndDate', true);
        $eventAttendanceMode = get_post_meta($post->ID, 'eventAttendanceMode', true);
        $eventStatus = get_post_meta($post->ID, 'eventStatus', true);
        $locName = get_post_meta($post->ID, 'locName', true);
        $locAdress = get_post_meta($post->ID, 'locAddress', true);
        $image = array();
        $description = get_post_meta($post->ID, 'EventDescription', true);
        $offers = array();
        //----------//

        //--- check required property ---//
        if(!$event_name || !$start_date || !$locName || !$locName) return;
        //----------//

        //--- base setting ---//
        $event_list = array(
            'context'   => 'https://schema.org',
            '@type'     => 'Event',
            'name'      => esc_html($event_name),
            'startDate' => esc_html($start_date)
        );
        //----------//

        if ($end_date){
            $event_list += array(
                'endDate' => esc_htnl($end_date)
            );
        }

        if ($eventAttendanceMode){
            $event_list += array(
                'eventAttendanceMode' => esc_html($eventAttendanceMode)
            );
        }

        if ($eventStatus){
            $event_list += array(
                'eventStatus' => esc_html($eventStatus)
            );
        }

        $event_list += array(
            'location' => array(
                '@type' => 'Place',
                'name'  => esc_html($locName),
                'address'   => array(
                    '@type' => 'PostalAddress',
                    'name'  => esc_html($locAdress)
                )
            )
        );

        if(count($image) > 0){
            foreach ($image as $img){
                if(amJL_check_url_existence($img)) $event_list['image'][] = $img;
            }
        }

        if ($description){
            $event_list += array(
                'description' => esc_html($description)
            );
        }

        //--- event ticket ---//
        $event_list += array(
            'offers' => array(
                '@type' => 'Offer',
                'url' => esc_url($EventURL),
                'price' => esc_html($EventPrice),
                'priceCurrency' => $PriceCurrency,
                'availability'  => $EventAvailability,
                'validFrom'     => esc_html($EventFromDate)
            )
        );
        //----------//

        //--- event organizer ---//
        $event_list += array(
            'organizer' => array(
                '@type' => 'Organization',
                'name'  => esc_html($EventOrgName),
                'url'   => esc_url($EventOrgURL)    
            )
        );
        //----------//

        $event_check = (int)get_option('event_check');
        if ($event_check === 1){
            echo "<!-- Event -->\n";
            echo "script type='application/ld+json>\n";
            echo wp_json_encode($event_list);
            echo "\n</script>\n";
        }

    }
}

add_action('wp_head', 'amJL_event_structure');