<?php
if (!defined('ABSPATH')) {
  exit; /* Exit if accessed directly */
}

/**
 * Removing plugin options
*/
delete_option('dpffm_handle');
delete_option('dpffm_subtitle');
delete_option('dpffm_hideimage');
delete_option('dpffm_view');
delete_option('dpffm_gridview');
delete_option('dpffm_titletag');
delete_option('dpffm_readmore');
delete_option('dpffm_numposts');
delete_option('upload_image');
delete_option('dpffm_dateformat');