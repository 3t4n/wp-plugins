<?php
/*
 * misc.php
 * Created on Sep 30, 2011 - By swifty
 *
 */

/* Start Compatability */
/* These are functions which wouldn't normally work anymore as the plugin is now OO */

/**
 *
 * Adds the Javascipt to be displayed inline
 * @param array $posttypes
 * @since 1.0
 * @deprecated
 */
function add_inline_javascript($posttypes = array('post')){
    global $ajaxf;
    $ajaxf->add_inline_javascript($posttypes);
}

/**
 *
 * Displays the pageination section
 * @param int $totalPosts
 * @param int $postPerPage
 * @since 1.1
 * @deprecated
 */
function af_pageination($totalPosts,$postPerPage){
    global $ajaxf;
    $ajaxf->pageination($totalPosts, $postPerPage);
}

/**
 *
 * Creates the section with the loop of all the posts
 * @param array $pt
 * @param array $filters
 * @param int $postPerPage
 * @param array $paginationDisplay
 * @param bool $useQO
 * @since 1.0
 * @deprecated
 */
function create_filtered_section($pt = array("post"), $filters = array(), $postPerPage=15, $paginationDisplay = array('top','bottom'), $useQO = true){
    global $ajaxf;
    $ajaxf->create_filtered_section($pt, $filters, $postPerPage, $paginationDisplay, $useQO);
}

/**
 *
 * Creates the progress bar
 * @since 1.1
 * @deprecated
 */
function create_prog_bar(){
    global $ajaxf;
    $ajaxf->create_prog_bar();
}

/**
 *
 * Creates the filter navigation
 * @param array $taxs
 * @param array $posttypes
 * @param int $showCount
 * @param int $showTitles
 * @since 1.0
 * @deprecated
 */
function create_filter_nav($taxs = array('category'), $posttypes= array('post'), $showCount = 1, $showTitles = 1){
    global $ajaxf;
    $ajaxf->create_filter_nav($taxs, $posttypes, $showCount, $showTitles);
}

/**
 *
 * The main functions that brings everything together if using the shortcode
 * @param array $atts
 * @since 1.1
 * @deprecated
 */
function ajax_filter($atts = array()){
    global $ajaxf;
    $ajaxf->ajax_filter($atts);
}
/* End Compatability */