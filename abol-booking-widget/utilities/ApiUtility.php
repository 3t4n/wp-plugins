<?php

/**
 * Utility Class for communicating with the external seating API.
 */
class ApiUtility
{
    protected $apiUrl;

    function __construct($apiUrl)
    {
        $this->setApiUrl($apiUrl);
    }

    /**
     * Perform a GET Request to the API
     *
     * @return array
     */
    function get()
    {
        // Load the relevant data models we'll be using
        require_once __DIR__ . '/../models/Event.php';
        require_once __DIR__ . '/../models/Performance.php';

        // Initialise a CURL Object and perform a request
        $curl = curl_init($this->getApiUrl());

        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Accept:application/json, Content-Type:application/json']);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($curl);

        // Nothing was returned, Chuck the toys out of the pram
        if(!$response)
        {
            throw new Exception('No active events');
        }

        curl_close($curl);

        // Parse the JSON Response, Create new data model instances as required
        // and populate with the data we got back.
        $response = json_decode($response, true);

        if(isset($response[0]['data']['events'][0]))
        {
            $eventData = $response[0]['data']['events'][0];

            if($eventData['bkev_bookopen'] == "0") {
                $eventData['bkev_bookopen'] = false;
            } else {
                $eventData['bkev_bookopen'] = true;
            }

            $event = new AbolSeatingWidget__Model_Event();
            $event->setName($eventData['bkev_longname']);
            $event->setStrapline($eventData['bkev_strapline']);
            $event->setVenue($eventData['bkev_venue']);
            $event->setBookingOpen($eventData['bkev_bookopen']);

            $performances = $response[0]['data']['events'][0]['performances'];

            $showings = [];
            foreach($performances as $showing)
            {
                $performance = new AbolSeatingWidget__Model_Performance();
                $performance->hydrate($showing);

                $showings[] = $performance;
            }

            $event->setPerformances($showings);
        }
        else
        {
            $event = new AbolSeatingWidget__Model_Event();
            $event->setPerformances([]);
        }

        return ['event' => $event, 'booking_page' => $response[0]['data']['booking_page']];
    }

    function getApiUrl()
    {
        return $this->apiUrl;
    }

    function setApiUrl($apiUrl)
    {
        $this->apiUrl = $apiUrl;
        return $this;
    }
}