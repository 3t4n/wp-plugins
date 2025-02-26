<?php
/**
 * ArtistPress Shortcodes.
 *
 * @package     ArtistPress/views/shortcodes
 * @version     1.0.0
 * @author      LTDI Studios
 *
 */

function artistpress_show_list_shortcode($atts) {

    $showListSettings       = get_option('artistpress_show_list_settings');

    //$showListDisplay      = sanitize_text_field($showListSettings['show_list_display']);
    $showDisplayArtistName  = sanitize_text_field($showListSettings['display_show_artist']);
    $showDisplayVenueName   = sanitize_text_field($showListSettings['display_show_venue']);
    $showDisplayTicketBut   = sanitize_text_field($showListSettings['display_ticket_button']);
    $showTicketButLabel     = sanitize_text_field($showListSettings['show_ticket_button_label']);
    $showDisplayInfoBut     = sanitize_text_field($showListSettings['display_info_button']);
    $showInfoButLabel       = sanitize_text_field($showListSettings['show_info_button_label']);
    $showListUseStyles      = sanitize_text_field($showListSettings['show_list_use_stylesheet']);
    $showListUseShortcode   = sanitize_text_field($showListSettings['show_list_use_shortcode']);


    if ($showListUseStyles == 'yes') {
        wp_enqueue_style('show-styles');
    }

    extract(
        shortcode_atts(
            array('order' => 'artist'),
            $atts,
            'artistpress-show-list'
        )
    );

    sanitize_text_field($order);

    if ($order == 'venue') {
        $showListDisplay = 'show_venue';
    } elseif ($order == 'date') {
        $showListDisplay = 'show_date';
    } elseif ($order == 'artist') {
        $showListDisplay = 'show_artist';
    }
    
    $current_meta_value = null;

    $shortcodeContent = '<section id="showlist" class="showList">';

    $args = array(
        'post_type' => 'show',
        'meta_key'  => 'artistpress_' . $showListDisplay,
        'orderby'   => 'meta_value',
        'order'     => 'ASC',
    );

    //the query
    $shows = new WP_Query($args);

    if ($shows->have_posts()) {
        while ($shows->have_posts()) {
            $shows->the_post();

            // Cache the variables that are set by query
            $showID = get_the_ID();
            $show_meta_data = get_post_custom($showID);
            $showDate = esc_html(get_post_meta($showID, 'artistpress_show_date', true));
            $showTicketWeb = esc_html(get_post_meta($showID, 'artistpress_ticket_url', true));

            if ($showTicketWeb != NULL) {
                $showTicketWeb = trim($showTicketWeb, '/');
                if (!preg_match('#^http(s)?://#', $showTicketWeb)) {
                    $showTicketWeb = 'http://' . $showTicketWeb;
                }
            }

            $artistID           = unserialize($show_meta_data['artistpress_show_artist'][0]);
            $venueID            = unserialize($show_meta_data['artistpress_show_venue'][0]);
            $artistID           = $artistID[0];
            $venueID            = $venueID[0];
            $artistName         = esc_html(get_the_title($artistID));
            $artistPermalink    = get_the_permalink($artistID);
            $venueName          = esc_html(get_the_title($venueID));
            $venuePermalink     = get_the_permalink($venueID);
            $venueStreet        = esc_html(get_post_meta($venueID, 'artistpress_venue_address', true));
            $venueCity          = esc_html(get_post_meta($venueID, 'artistpress_venue_city', true));
            $venueState         = esc_html(get_post_meta($venueID, 'artistpress_venue_state', true));
            $venuePostal        = esc_html(get_post_meta($venueID, 'artistpress_venue_postal_code', true));
            $venueCountry       = esc_html(get_post_meta($venueID, 'artistpress_venue_country', true));
            $venueWebsite       = esc_html(get_post_meta($venueID, 'artistpress_venue_website', true));
            $venuePhone         = esc_html(get_post_meta($venueID, 'artistpress_venue_telephone', true));
            $venueAddress       = $venueStreet . '<br>' . $venueCity . ', ' . $venueState . ' ' . $venuePostal;

            if ($showListDisplay == 'show_date') {
                if ($showDate != $current_meta_value) {
                    $shortcodeContent .= '<h3>' . $showDate . '</h3>';
                }
            } elseif ($showListDisplay == 'show_venue') {
                if ($venueName != $current_meta_value) {
                    $shortcodeContent .= '<h3>' . $venueName . '</h3>';
                }
            } elseif ($showListDisplay == 'show_artist') {
                if ($artistName != $current_meta_value) {
                    $shortcodeContent .= '<h3>' . $artistName . '</h3>';
                }
            }
            /**
             * Here is wher I made the change.  It was:
             * $shortcodeContent .= '<article id="show-<?php echo $showID;?>" class="show">';
             *
             * It is not corrected below
             */
            $shortcodeContent .= '<article id="show-'. $showID .'" class="show">';

            if ($showListDisplay == 'show_date') {
                if ($showDate != $current_meta_value) {
                    $shortcodeContent .= '<div class="showHeader">';
                    if ($showDisplayArtistName == 'yes') {
                         $shortcodeContent .= '<div class="artist">Artist</div>';
                    }
                    if ($showDisplayVenueName == 'yes') {
                        $shortcodeContent .= '<div class="venue">Venue</div>';
                    }
                    $shortcodeContent .= '<div class="city">City</div>';
                    $shortcodeContent .= '</div>';
                }

            } elseif ($showListDisplay == 'show_venue') {
                if ($venueName != $current_meta_value) {
                    $shortcodeContent .= '<div class="showHeader">';
                    $shortcodeContent .= '<div class="date">Date</div>';
                    if ($showDisplayArtistName == 'yes') {
                        $shortcodeContent .= '<div class="artist">Artist</div>';
                    }
                    $shortcodeContent .= '<div class="city">City</div>';
                    $shortcodeContent .= '</div>';
                }
            } elseif ($showListDisplay == 'show_artist') {
                if ($artistName != $current_meta_value) {
                    $shortcodeContent .= '<div class="showHeader">';
                    $shortcodeContent .= '<div class="date">Date</div>';
                    if ($showDisplayVenueName == 'yes') {
                        $shortcodeContent .= '<div class="venue">Venue</div>';
                    }
                    $shortcodeContent .= '<div class="city">City</div>';
                    $shortcodeContent .= '</div>';
                }
            }


            $shortcodeContent .= '<div class="showBody">';
            
            if ($showListDisplay == 'show_date') {
                if ($showDisplayArtistName == 'yes') {
                    $shortcodeContent .= '<div class="artist">' .$artistName . '</div>';
                }
                if ($showDisplayVenueName == 'yes') {
                    $shortcodeContent .= '<div class="venue">' . $venueName . '</div>';
                }
                $shortcodeContent .= '<div class="city">' . $venueCity . ', ' . $venueState . '</div>';
            } elseif ($showListDisplay == 'show_venue') {
                $shortcodeContent .= '<div class="date">' . $showDate . '</div>';
                if ($showDisplayArtistName == 'yes') {
                    $shortcodeContent .= '<div class="artist">' .$artistName . '</div>';
                }
                $shortcodeContent .= '<div class="city">' . $venueCity . ', ' . $venueState . '</div>';
            } elseif ($showListDisplay == 'show_artist') {
                $shortcodeContent .= '<div class="date">' . $showDate . '</div>';
                if ($showDisplayVenueName == 'yes') {
                    $shortcodeContent .= '<div class="venue">' . $venueName . '</div>';
                }
                $shortcodeContent .= '<div class="city">' . $venueCity . ', ' . $venueState . '</div>';
            }
            
            if ($showDisplayInfoBut == 'yes') {
                $shortcodeContent .= '<div class="info">';
                if ($showInfoButLabel) {
                    $shortcodeContent .= '<a class="button" href="'. get_the_permalink() .'">'. $showInfoButLabel .'</a>';
                } else {
                    $shortcodeContent .= '<a class="button" href="'. get_the_permalink() .'">Additional Info</a>';
                }
                $shortcodeContent .= '</div>';
            }

            if ($showDisplayTicketBut == 'yes') {
                if ($showTicketWeb != NULL) {
                    $shortcodeContent .= '<div class="tickets">';
                    if ($showTicketButLabel) {
                        $shortcodeContent .= '<a target="_blank" class="button"" href="'. $showTicketWeb .'">'. $showTicketButLabel  .'</a>';
                    } else {
                        $shortcodeContent .= '<a target="_blank" class="button"" href="'. $showTicketWeb .'">Get Tickets</a>';
                    }
                    $shortcodeContent .= '</div>';
                }
            }

            $shortcodeContent .= '</div>';

            if ($showListDisplay == 'show_date') {
                $current_meta_value = $showDate;
            } elseif ($showListDisplay == 'show_venue') {
                $current_meta_value = $venueName;
            } elseif ($showListDisplay == 'show_artist') {
                $current_meta_value = $artistName;
            }


            $shortcodeContent .= '</article>';
        }
    } else {
        $shortcodeContent .= '<p>Sorry, No Shows Have Been Scheduled.</p>';
    }

    $shortcodeContent .= '</section>';

    return $shortcodeContent;
}
