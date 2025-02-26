<?php

/*
Plugin Name: WordPress Employment Application Plugin by 100Hires ATS
Plugin URI: https://100hires.com
Description: Free WordPress plugin to automatically show your job postings on your WordPress site
Version: 1.0
Author: 100hires
Author URI: https://100hires.com
License: GPLv2 or later
*/
require_once "settings/init.php";

class HiresMain
{
    public function __construct()
    {
        add_shortcode("100hires", array($this, "hiresShortcode"));
    }

    public function hiresShortcode()
    {
        if ($companyCode = get_option("hires_company_code")) {
            ob_start();
            ?>
            <iframe id="iframe-container-1"
                    width="100%"
                    frameborder="0"
                    scrolling="no"
                    height="600"
                    src="https://100hires.com/c/<?php echo esc_attr($companyCode); ?>/?iframe=true">
            </iframe><?php

            return ob_get_clean();
        }

        return "";
    }
}

new HiresMain();

