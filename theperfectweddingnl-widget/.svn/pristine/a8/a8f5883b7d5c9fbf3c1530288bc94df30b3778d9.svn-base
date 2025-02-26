<?php

/**
 * Class tpwRatings fetches the ratings from API and calls the template to display the widget
 *
 * @author Weblab.nl - Maarten Kooiker
 */
class tpwRatings {

    /**
     * The company identifier
     *
     * @var int
     */
    private $companyId;

    /**
     * Variable holding track of the cached data to generate the widget from
     *
     * @var tpwCache
     */
    private $cacheManager;

    /**
     * Constructor - init the cache manager and reads the companyId from App Config
     */
    public function __construct() {
        $this->cacheManager = new tpwCache();
        $this->companyId = tpwHelpers::getCompanyIdFromKey();
    }

    /**
     * Query the TPW API service in order to get the ratings data
     *
     * @return array|bool|mixed             The decoded api response
     */
    private function getCompanyRatings() {
        // try returning data from cache
        $cachedData = $this->cacheManager->readFromCache();
        if ($cachedData) {
            return $cachedData;
        }

        // read data from API
        $variant = get_option('tpw_variant', 'light');
        $apiUrl = sprintf(tpwConfig::API_URL, $this->companyId, $variant);

        // get the data from the api
        $apiResponse = tpwHelpers::curlGet($apiUrl);

        // if there is no response from the api, return false
        if (!$apiResponse) {
            return false;
        }

        // try to decode API response
        $decodedApiResponse = json_decode($apiResponse);

        // if we can not decode the API response return false
        if (!$decodedApiResponse) {
            return false;
        }

        // write fetched data to cache
        $this->cacheManager->writeCache($apiResponse);

        // return the decoded api response
        return $decodedApiResponse;
    }

    /**
     * Call the method to render the company ratings and render the widget frontend template
     *
     * @return string           The rating widget content
     */
    public function renderRatings() {
        // fetch company ratings
        $ratingsData = $this->getCompanyRatings();

        // if failed fetching company ratings return false
        if ( !$ratingsData ) {
            return false;
        }

        // extract the average rating and the ratingsCount
        $companyName = $ratingsData->name;
        $averageRating = $ratingsData->average_rating;
        $ratingsCount = $ratingsData->rating_count;
        $widgetCode = $ratingsData->widget_code;
        $snippetCode = $ratingsData->rich_snippet_code;
        
        //call and display the frontend template
        include('tpwWidgetFrontendTemplate.php');
    }

}
