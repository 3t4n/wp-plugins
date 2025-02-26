<?php

/**
 * Takes the availability percentage from the seating API Response
 * and determine which threshold it fits into.
 *
 * Then retrieve the text defined in the user options for that bracket
 * and display it, Along with a sensible default as a fallback.
 *
 * @param int $availability - Availability percentage returned from API
 * @return array
 */
function abolSeatingWidget__getAvailability($availability)
{
    $thresholds = array(
        'very-high' => array(
            'min' => 100,
            'max' => 76,
            'string' => ($option = get_option('available-seats')['abol_section_available-seating-input-0']) ? $option : "Good Availability"
        ),
        'high' => array(
            'min' => 75,
            'max' => 50,
            'string' => ($option = get_option('available-seats')['abol_section_available-seating-input-1']) ? $option : "Fair Availability"
        ),
        'med' => array(
            'min' => 49,
            'max' => 25,
            'string' => ($option = get_option('available-seats')['abol_section_available-seating-input-2']) ? $option : "Book Soon!"
        ),
        'low' => array(
            'min' => 24,
            'max' => 1,
            'string' => ($option = get_option('available-seats')['abol_section_available-seating-input-3']) ? $option : "Last Few Seats Remaining"
        ),
        'none' => array(
            'min' => 0,
            'max' => 0,
            'string' => ($option = get_option('available-seats')['abol_section_available-seating-input-4']) ? $option : "Fully Booked"
        )
    );

    $class = null;
    foreach($thresholds as $key => $val)
    {
        if(in_array($availability, range($val['min'], $val['max'])))
            $class = ['class' => $key, 'data' => $val];
    }

    return $class;
}
