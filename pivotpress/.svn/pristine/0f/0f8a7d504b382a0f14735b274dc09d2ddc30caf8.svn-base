<?php

class pivotal {

    // Public properties
    var $token;
    var $project;


    // ---------
    // getStories
    // -----
    // Get a list of stories from a project
    public function getStories($project_id) {

        // Make the fields safe
        $project_id = escapeshellcmd($project_id);

        // Request the stories
        $cmd = "curl -H \"X-TrackerToken: {$this->token}\" "
            . "-X GET "
            . "https://www.pivotaltracker.com/services/v5/projects/$project_id/stories";

        $json = shell_exec($cmd);

        // Return an object
        $stories = json_decode($json);

        return $stories;
    }

    // ---------
    // getLabels
    // -----
    // Get a list of labels from a project
    public function getLabels($project_id) {

        // Make the fields safe
        $project_id = escapeshellcmd($project_id);

        // Request the stories
        $cmd = "curl -H \"X-TrackerToken: {$this->token}\" "
            . "-X GET "
            . "https://www.pivotaltracker.com/services/v5/projects/$project_id/labels";

        $json = shell_exec($cmd);

        // Return an object
        $labels = json_decode($json);

        return $labels;

    }

    // ----------
    // getProject
    // -----
    //Get the title of the project
//    public function getProjectTitle($project_id) {
//
//
//        // Request the projects
//        $cmd = "curl -H \"X-TrackerToken: {$this->token}\" "
//            . "-X GET "
//            . "https://www.pivotaltracker.com/services/v5/projects/$project_id";
//        $xml = shell_exec($cmd);
//        $obj = json_decode($xml);
//        return $obj[0];
//
//    }



}