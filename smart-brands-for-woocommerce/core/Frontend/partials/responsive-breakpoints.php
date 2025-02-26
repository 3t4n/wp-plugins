<?php
/**
 * The Responsive Breakpoints for the brand in different devices.
 *
 * @link       https://shapedplugin.com
 * @since      1.0.0
 *
 * @package    smart_brands_for_wc
 * @subpackage smart_brands_for_wc/Frontend/partials
 * @author     ShapedPlugin<support@shapedplugin.com>
 */

/* Grid layout Column. */
$custom_css .= '
@media only screen and (min-width: 320px) {
    .sp-smart-brands-row .spf-smart-brands-col-xs-1 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-xs-2 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-xs-3 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 33.22222222%;
        flex: 0 0 33.22222222%;
        max-width: 33.22222222%;
    }
    .sp-smart-brands-row .spf-smart-brands-col-xs-4 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 25%;
        flex: 0 0 25%;
        max-width: 25%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-xs-5 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 20%;
        flex: 0 0 20%;
        max-width: 20%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-xs-6 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 16.6667%;
        flex: 0 0 16.6667%;
        max-width: 16.6667%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-xs-7 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 14.28571428%;
        flex: 0 0 14.28571428%;
        max-width: 14.28571428%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-xs-8 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 12.5%;
        flex: 0 0 12.5%;
        max-width: 12.5%;
    }
}

@media only screen and (min-width: 600px) {
    .sp-smart-brands-row .spf-smart-brands-col-sm-1 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-sm-2 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-sm-3 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 33.333%;
        flex: 0 0 33.333%;
        max-width: 33.333%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-sm-4 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 25%;
        flex: 0 0 25%;
        max-width: 25%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-sm-5 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 20%;
        flex: 0 0 20%;
        max-width: 20%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-sm-6 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 16.6667%;
        flex: 0 0 16.6667%;
        max-width: 16.6667%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-sm-7 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 14.28571428%;
        flex: 0 0 14.28571428%;
        max-width: 14.28571428%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-sm-8 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 12.5%;
        flex: 0 0 12.5%;
        max-width: 12.5%;
    }
}

@media only screen and (min-width: 768px) {
    .sp-smart-brands-row .spf-smart-brands-col-md-1 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-md-2 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-md-2-half {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 70%;
        flex: 0 0 70%;
        max-width: 70%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-md-3 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 33.22222222%;
        flex: 0 0 33.22222222%;
        max-width: 33.22222222%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-md-4 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 25%;
        flex: 0 0 25%;
        max-width: 25%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-md-5 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 20%;
        flex: 0 0 20%;
        max-width: 20%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-md-6 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 16.6667%;
        flex: 0 0 16.6667%;
        max-width: 16.6667%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-md-7 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 14.28571428%;
        flex: 0 0 14.28571428%;
        max-width: 14.28571428%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-md-8 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 12.5%;
        flex: 0 0 12.5%;
        max-width: 12.5%;
    }
}

@media only screen and (min-width: 992px) {
    .sp-smart-brands-row .spf-smart-brands-col-lg-1 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-lg-2 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-lg-3 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 33.22222222%;
        flex: 0 0 33.22222222%;
        max-width: 33.22222222%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-lg-4 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 25%;
        flex: 0 0 25%;
        max-width: 25%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-lg-5 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 20%;
        flex: 0 0 20%;
        max-width: 20%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-lg-6 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 16.6667%;
        flex: 0 0 16.6667%;
        max-width: 16.6667%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-lg-7 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 14.28571428%;
        flex: 0 0 14.28571428%;
        max-width: 14.28571428%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-lg-8 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 12.5%;
        flex: 0 0 12.5%;
        max-width: 12.5%;
    }
}

@media only screen and (min-width: 1200px) {
    .sp-smart-brands-row .spf-smart-brands-col-xl-1 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-xl-2 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-xl-3 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 33.22222222%;
        flex: 0 0 33.22222222%;
        max-width: 33.22222222%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-xl-4 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 25%;
        flex: 0 0 25%;
        max-width: 25%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-xl-5 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 20%;
        flex: 0 0 20%;
        max-width: 20%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-xl-6 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 16.6667%;
        flex: 0 0 16.6667%;
        max-width: 16.6667%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-xl-7 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 14.28571428%;
        flex: 0 0 14.28571428%;
        max-width: 14.28571428%;
    }

    .sp-smart-brands-row .spf-smart-brands-col-xl-8 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 12.5%;
        flex: 0 0 12.5%;
        max-width: 12.5%;
    }
}';
