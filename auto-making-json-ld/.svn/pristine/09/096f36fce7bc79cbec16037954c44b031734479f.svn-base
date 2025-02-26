<?php

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
            echo json_encode($event_list, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
            echo "\n</script>\n";
        }

    }
}

add_action('wp_head', 'amJL_event_structure');

?>


<html>
  <head>
    <title>The Adventures of Kira and Morrison</title>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Event",
      **"name": "The Adventures of Kira and Morrison",
      **"startDate": "2025-07-21T19:00-05:00",
      "endDate": "2025-07-21T23:00-05:00",
      "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
      "eventStatus": "https://schema.org/EventScheduled",
      **"location": {
        "@type": "Place",
        "name": "Snickerpark Stadium",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "100 West Snickerpark Dr",
          "addressLocality": "Snickertown",
          "postalCode": "19019",
          "addressRegion": "PA",
          "addressCountry": "US"
        }
      },
      "image": [
        "https://example.com/photos/1x1/photo.jpg",
        "https://example.com/photos/4x3/photo.jpg",
        "https://example.com/photos/16x9/photo.jpg"
       ],
      "description": "The Adventures of Kira and Morrison is coming to Snickertown in a can't miss performance.",
      "offers": {
        "@type": "Offer",
        "url": "https://www.example.com/event_offer/12345_202403180430",
        "price": "30",
        "priceCurrency": "USD",
        "availability": "https://schema.org/InStock",
        "validFrom": "2024-05-21T12:00"
      },
      "performer": {
        "@type": "PerformingGroup",
        "name": "Kira and Morrison"
      },
      "organizer": {
        "@type": "Organization",
        "name": "Kira and Morrison Music",
        "url": "https://kiraandmorrisonmusic.com"
      }
    }
    </script>
  </head>
  <body>
  </body>
</html>