<?php
namespace ArtistPress\Administration\Settings;

/**
 * Exit if accessed directly
 */	
if (!defined('ABSPATH')) {
	exit;
}

class Upgrade extends Settings
{
    public static function getSectionDescription()
    {
        \ob_start();

        echo '<p>Currently ArtistPress Pro and ArtistPress Community are being developed.</p><p>You can stay informed about progress and release dates on the <a href="https://www.facebook.com/ArtistPressPlugin" target="_blank">ArtistPress Facebook Page</a> or on the <a href="https://www.facebook.com/LetTimDesignIt" target="_blank">Let Tim Design It Facebook Page</a>.</p>';
        
        print \apply_filters(__METHOD__, \ob_get_clean());
    }

    public function getSectionFields()
    {
        return \apply_filters(__METHOD__, []);
    }
}
