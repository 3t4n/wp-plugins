<?php
/**
 * Provides the admin area view for the plugin
 *
 * @link       http://www.morpc.org/program-service/air-quality-program/
 * @since      1.0.0
 *
 * @package    Aqi_Widget
 * @subpackage Aqi_Widget/admin/partials
 */
?>

<div id="aqi-wrapper">
    <div id="icon-themes" class="icon32"></div>

    <?php settings_errors(); ?>

    <h1>Air Quality Widget</h1>
    <h2>
        Provided by the Mid-Ohio Regional Planning Commission (MORPC) &amp;
        the U.S. EPA AirNow program.
    </h2>
    <h4>
        See the "How to Configure the Widget" section below. All fields on this form
        are required to properly configure the widget.
    </h4>

    <hr>
    <div class="aqi_configuration">
        <form id="frmAQI" name="frmAQI" method="post" action="options.php">
        <?php
            settings_fields( 'aqi-widget' );

            do_settings_sections( 'aqi-widget' );

            submit_button();
        ?>
    </form>
    </div>
    <hr>

    <div class="info_container">
        <h1>How to Configure the Widget</h1>
        <h3>AirNow Settings</h3>
        <b>AirNow API Key:</b> The air quality widget uses the AirNow API (application programming interface) to
        get its data for the AQI (Air Quality Index). The first step in getting things set up is to obtain an
        API key from AirNow. Follow these instructions:

        <ol>
            <li>
                Go to
                <a href="https://docs.airnowapi.org/account/request/" target="_blank">
                    https://docs.airnowapi.org/account/request/
                </a> and fill out the form. Once submitted, you will receive your API key at the email
                address used to sign up. Follow the instructions in the email to activate your account.
            </li>
            <li>
                Copy the key into the AirNow API Key field above.
            </li>
        </ol>

        <b>Reporting Area Zip Code:</b> The air quality agency responsible for a reporting
        area assigns one or more zip codes to be associated with that area.
        Enter a zip code for your reporting area in this field.

        <h3>Widget Settings</h3>
        <b>Show Forecast:</b> Displays the five-day forecast provided by the reporting agency.
        Used by both the compact and full-page widget.
        <br><br>
        <b>Show Legend:</b> Used only by the full-page widget. The legend gives an explanation
        of the Category and AQI numerical values and what they mean.
        <br><br>
        <b>Theme:</b> The light theme uses dark text and is meant to be used when the
        website's background is a light color. The dark theme uses white text and is
        meant to be used when the website's background is a dark color.

        <hr>

        <h1>How to Use the Widget</h1>
        The widget is displayed on your website by use of a
        <a href="https://en.support.wordpress.com/shortcodes/" target="_blank">
            WordPress shortcode.
        </a>

        There are two types of widgets available:
        <ul>
            <li type="disc">
                <b>Compact:</b> This widget type is best displayed in the header, footer,
                or on the sidebar. However, it can be used right within the main page. It
                can be configured to display the forecast when clicking the &#9432; icon.
                <br><br>
                Place the following shortcode where you want the compact widget to appear:
                <br>
                <pre>[aqi-widget type="compact"]</pre>
            </li>

            <li type="disc">
                <b>Full-Page:</b> This widget type provides a lot more information than the
                compact version. Configuration settings to show the forecast and the legend are above.
                <br><br>
                Place the following shortcode where you want the full-page widget to appear:
                <br>
                <pre>[aqi-widget type="page"]</pre>
            </li>
        </ul>

        <hr>
        <?= AQI_WIDGET_NAME ?> v<?= AQI_WIDGET_VERSION ?>
    </div>
</div>
