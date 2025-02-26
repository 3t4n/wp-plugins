<?php

namespace DavidWenner\ATestimonialBuilder;

use DavidWenner\ATestimonialBuilder\ATBS_Assets;
use DavidWenner\ATestimonialBuilder\ATBS_Functions;
use DavidWenner\ATestimonialBuilder\ATBS_Handlers;
use DavidWenner\ATestimonialBuilder\ATBS_Menus;
use DavidWenner\ATestimonialBuilder\ATBS_FlashMessages;
use DavidWenner\ATestimonialBuilder\ATBS_Shortcodes;

/**
 * Description of ATBS_Main
 *
 * @author dareks
 */
class ATBS_Main {

    public function __construct()
    {
        new ATBS_Menus();
        new ATBS_Handlers();
        new ATBS_Functions();
        new ATBS_Assets();
        new ATBS_FlashMessages();
        new ATBS_Shortcodes();
    }
}
