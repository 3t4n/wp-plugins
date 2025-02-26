<?php

class PrayerTimePrinter
{
    private $prayerLocal = array(
        "fajr" => "Fajr",
        "sunrise" => "Sunrise",
        "zuhr" => "Zuhr",
        "asr" => "Asr",
        "maghrib" => "Maghrib",
        "isha" => "Isha"
    );

    private $numbersLocal = array(
        0 => '0',
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9'
    );

    /** @var string */
    private $title;
    /** @var string */
    private $theme;
    /** @var string */
    private $localPrayerNames;
    /** @var string */
    private $localNumbers;
    /** @var string */
    private $layout;
    /** @var string */
    private $method;
        /** @var string */
    private $location;

    public function __construct()
    {
        $this->localPrayerNames = $this->getLocalPrayerNames();
        $this->localNumbers = $this->getLocalNumbers();
    }

    /**
     * Set the value of Title
     *
     * @param mixed title
     *
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $value
     */
    public function setTheme($value)
    {
        $this->theme = $value;
    }

    /**
     * @param string $value
     */
    public function setLayout($value)
    {
        $this->layout = $value;
    }

    /**
     * Set the value of Method
     *
     * @param mixed method
     *
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * Set the value of Location
     *
     * @param mixed location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getLocalPrayerNames()
    {
        $prayers_local = get_option('p_t_a_prayersLocal');
        return empty($prayers_local) ? $this->prayerLocal : $prayers_local;
    }

    public function getLocalNumbers()
    {
        $numbers_local = get_option('p_t_a_numbersLocal');
        return empty($numbers_local) ? $this->numbersLocal : $numbers_local;
    }

    /**
     * @param  array  $attr
     * @return string
     */
    public function print($attr=array())
    {
        if (! empty($attr)) {
            $this->setAttributes($attr);
        }

        $response = $this->getAPIResponse();

        if( is_array($response) ) {
            $header = $response['headers']; // array of http header lines
            $body = json_decode($response['body']); // use the content

            if ($body->status_error) {
                echo "<h4 class='red'>". $body->status_error->invalid_query ."</h4>";
            } elseif ( $this->layout == 'horizontal') {
                echo $this->printHorizontalTime($body);
            } else {
                echo $this->printVerticalTime($body);
            }

        } else {
            echo "<h4 class='red'>Connection Timeout, please contact <a href='mailto:mmrs151@gmail.com'>The Developer</a></h4>";
        }
    }

    /**
     * @param array $array [description]
     */
    private function setAttributes(array $array)
    {
        if (isset($array['title'])) {
            $this->setTitle($array['title']);
        }

        if (isset($array['theme'])) {
            $this->setTheme($array['theme']);
        }

        if (isset($array['layout'])) {
            $this->setLayout($array['layout']);
        }

        if (isset($array['location'])) {
            $this->setLocation($array['location']);
        }

        if (isset($array['method'])) {
            $this->setMethod($array['method']);
        }


    }

    /**
     * @param  string $responseBody
     * @return string
     */
    private function printHorizontalTime($responseBody)
    {
        $times = $responseBody->items[0];
        if (! empty($this->title)) {
            $th = "<tr><th colspan='7' class='widgetTitle'>". $this->title ."</th></tr>";
        }
        $table = "";
        $table .=
        "
        <table class='timetable " .$this->theme. "'>
        ". $th ."
         <tr><th colspan='7' class='title'>
                 " .current_time(get_option('date_format')). "
            </th>
         </tr>
         <tr>
         ";
        foreach ($this->localPrayerNames as $key => $value) {
            $table .= "<th>" . $value . "</th>";
        }

        $table .= "
         </tr>
         <tr>
            <td> " .$this->getIntlTime($times->fajr). "</td>
            <td> " .$this->getIntlTime($times->shurooq). "</td>
            <td> " .$this->getIntlTime($times->dhuhr). "</td>
            <td> " .$this->getIntlTime($times->asr). "</td>
            <td> " .$this->getIntlTime($times->maghrib). "</td>
            <td> " .$this->getIntlTime($times->isha). "</td>
         </tr>
         <tr><td colspan='6'>".$this->getGoogleMap($responseBody)."</td></tr>
        </table>
        ";

        return $table;
    }

    /**
     * @param  string $responseBody
     * @return string
     */
    private function printVerticalTime($responseBody)
    {
        $times = $responseBody->items[0];
        if (! empty($this->title)) {
            $th = "<tr><th colspan='2' class='widgetTitle'>". $this->title ."</th></tr>";
        }

        $table = "";
        $table .=
        "
        <table class='timetable " .$this->theme. "'>
         $th
         <tr><th colspan='2' class='title'>". current_time(get_option('date_format')) ." </th></tr>
         <tr><th> " .$this->localPrayerNames['fajr']. "</th><td> " .$this->getIntlTime($times->fajr). "</td></tr>
         <tr><th> " .$this->localPrayerNames['sunrise']. " </th><td> " .$this->getIntlTime($times->shurooq). "</td></tr>
         <tr><th> " .$this->localPrayerNames['zuhr']. " </th><td> " .$this->getIntlTime($times->dhuhr). "</td></tr>
         <tr><th> " .$this->localPrayerNames['asr']. " </th><td> " .$this->getIntlTime($times->asr). "</td></tr>
         <tr><th> " .$this->localPrayerNames['maghrib']. " </th><td> " .$this->getIntlTime($times->maghrib). "</td></tr>
         <tr><th> " .$this->localPrayerNames['isha']. " </th><td> " .$this->getIntlTime($times->isha). "</td></tr>
         <tr><td colspan='2' class='title'>
                 ". $this->getGoogleMap($responseBody) ."
              </td>
         </tr>
         </table>
        ";
        return $table;
    }

    /**
     * @param  string $apiTime
     * @return string
     */
    private function getIntlTime($apiTime)
    {
        $wpTime = $this->formatTime($apiTime, get_option('time_format'));

        $result = str_split($wpTime);
        $intlDate = '';
        foreach ($result as $number) {
            $intlDate .= $this->localNumbers[$number];
            if (empty($this->localNumbers[$number]) && $number !== '0') {
                $intlDate .= $number;
            }
        }

        return $intlDate;
    }

    /**
     * @param array $responseBody
     *
     * @return string
     */
    private function getGoogleMap($responseBody)
    {
        return "<a href='https://www.google.co.uk/maps/place/"
               .$responseBody->city. " ".$responseBody->country."' target='_new'>"
               .$responseBody->city.", ".$responseBody->country."</a>";
    }

    /**
     * @param  string $dateTime
     * @param  string $format
     * @return string
     */
    protected function formatTime($dateTime, $format=null)
    {
        $phpDate = strtotime($dateTime);
        $date =  date(get_option('date_format'), $phpDate);
        if ($format) {
            $date = date($format, $phpDate);
        }

        return $date;
    }

    /**
     * @param  string $method
     * @param  string $location
     * @return string
     */
    private function getAPIResponse()
    {
        $url = "http://muslimsalat.com";
        if (! empty($this->location)) {
            $url .= "/$this->location/daily.json?key=777a6497421fd5e13e5642bf7358fdda";
        } else {
            $url .= "/daily.json?key=777a6497421fd5e13e5642bf7358fdda";
        }
        if (! empty($this->method)) {
            $url .= "&method=$this->method";
        }

        $response = wp_remote_get($url, array( 'timeout' => 13));

        return $response;
    }
}
