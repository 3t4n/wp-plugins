<?php
/*******************************************************************************
    Wordpress IDX and Contact Manager Plugin
    Copyright (C) 2010-2011 StormRETS, Inc.

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*******************************************************************************/

    error_reporting(-1);

    // Include Wordpress
    //
    if (!function_exists('add_action')) {
        @require_once("../../../wp-config.php");
    }
    
    // Get the Variables from the POST data
    //
    $top = $_POST['top'];
    $left = $_POST['left'];
    $bottom = $_POST['bottom'];
    $right = $_POST['right'];
    
    // Initialize the Agent Storm request object
    //
    $as = new AgentStormRequest(AgentStormSettingCache::get('as_hostname'), AgentStormSettingCache::get('as_apikey'));
    $as_idx = new AgentStormIDX();
    
    // Setup the filters
    //
    $filters = array(
        'Longitude' => "$left:$right",
        'Latitude' => "$bottom:$top",
        'limit' => 100,
        'sort' => 'random'
    );
    
    // Get the Results
    //
    $result = $as->getProperties($filters);
    
    // Process the Result and send to the requester
    //
    $data = array();
    if (is_array($result->Properties)) {
        foreach ($result->Properties as $property) {
            $data[] = array(
                'Id' => $property->Id,
                'FullAddress' => $property->FullAddress,
                'City' => $property->City,
                'State' => $property->State,
                'Country' => $property->Country,
                'Zip' => $property->Zip,
				'Bedrooms' => ($property->Bedrooms) ? $property->Bedrooms : 'n/a',
				'Bathrooms' => $property->FullBaths,
				'Description' => $property->Remarks,
                'Latitude' => $property->Latitude,
                'Longitude' => $property->Longitude,
                'Photo' => (isset($property->Photos[0]->Url)) ? $property->Photos[0]->Url : '',
				'Url' => $as_idx->getPropertyPermalink($property)
            );
        }
    }
    
    // Format a container object to store the Properties and Count fields
    //
    $container = new stdClass();
    $container->ElapsedTime = $result->ElapsedTime;
    $container->TotalCount = $result->TotalCount;
    $container->Count = $result->Count;
    $container->Properties = $data;
    
    // 
    //
    echo json_encode($container);
    
