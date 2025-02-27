<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Cdsfw_Current_Date_Menu {

    /**
     * The single instance of the class.
     */
    protected static $instance;

    /**
     * Constructor.
     * Adds filters to execute shortcodes in necessary places.
     *
     * @since 1.0
     */
    private function __construct() {
        add_action( 'admin_menu', array( $this, 'cdsfw_current_date_menu_page' ) );
    }

    /**
     * Callback function to add top-level menu page.
     *
     * @since 1.0
     */
    public function cdsfw_current_date_menu_page() {
        add_menu_page(
            'Current Date Shortcode',  // Page title
            'Current Date Shortcode',  // Menu title
            'manage_options',     // Capability required to access the page
            'current-date-settings', // Menu slug
            array( $this, 'cdsfw_current_date_settings_page_callback' ), // Callback function to render the page
            'dashicons-calendar-alt' // Icon URL or Dashicons class name
        );

        // Add a submenu item
        add_submenu_page(
            'current-date-settings',   // Parent slug
            'Documentation',           // Page title
            'Documentation',           // Menu title
            'manage_options',          // Capability required to access the page
            'current-date-doc',        // Menu slug
            array( $this, 'cdsfw_current_date_doc_page_callback' ) // Callback function to render the page
        );
    }

/**
 * Callback function to render the menu page content.
 *
 * @since 1.0
 */
public function cdsfw_current_date_settings_page_callback() {
    ?>
    <div class="wrap">
        <h2><?php echo esc_html( __( 'Premade Layout', 'current-date' ) ); ?></h2>
        <div class="cdsfw_card_container">
            <?php
            // Array of date formats
            $date_formats = array(
                'l, F jS, Y',          // Monday, March 15th, 2024
                'D, M j, Y',           // Mon, Mar 15, 2024
                'F j, Y',              // March 15, 2024
                'j F Y',               // 15 March 2024
                'M j, Y',              // Mar 15, 2024
                'j M Y',               // 15 Mar 2024
                'Y-M-d',               // 2024-Mar-15
                'd F Y',               // 15 March 2024
                'M j',                 // Mar 15
                'F jS',                // March 15th
                'jS M Y',              // 15th Mar 2024
                'jS F Y',              // 15th March 2024
                'l, M jS, Y',          // Monday, Mar 15th, 2024
                'D, j M Y',            // Mon, 15 Mar 2024
                'l, j F Y',            // Monday, 15 March 2024
                'D, M j Y',            // Mon, Mar 15 2024
                'd/m/Y',               // 15/03/2024
                'j.n.Y',               // 15.3.2024
                'Y.m.d',               // 2024.03.15
                'd-m-Y',               // 15-03-2024
                'Y-m-d',               // 2024-03-15
                'Y/m/d',               // 2024/03/15
                'm/d/Y',              // 03/15/2024
            );

            // Loop through each date format and create a card for it
            foreach ($date_formats as $format) {
                ?>
                <div class="card">
                    <div class="card-body">
                        <p class="card-text"><?php echo date($format); ?></p>
                        <p class="shortcode">[current-date format='<?php echo $format; ?>']</p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}




    /**
     * Callback function to render the submenu page content.
     *
     * @since 1.0
     */
    public function cdsfw_current_date_doc_page_callback() {
        ?>
        <div class="wrap about-wrap">

            <h1><?php echo esc_html__( 'Current Date Shortcode', 'current-date' ); ?></h1>

            <div class="col">
                <h3><?php esc_html_e( "Let's Get Started", 'current-date' ); ?></h3>
                <p class="about-text">
                    To display the current date on your posts or pages, simply insert the shortcode <strong>[current-date]</strong> where you want it to appear. If you wish to customize the display to include the month or year, you can modify the shortcode like this: <strong>[current-date format='F, Y']</strong>. <br><br>The shortcode utilizes PHP's date function, allowing you to specify any format you desire. This means you have the flexibility to choose the date format that best suits your needs.
                </p>
            </div>

            <div class="col">
                <p class="cdsfw_text">Explore the available date formats and choose the ones that best suit your requirements.</p>
                <table class="cdsfw_table">
                    <thead>
                    <tr>
                        <th>Format</th>
                        <th>Description</th>
                        <th>Returned values</th>
                    </tr>

                    </thead>

                    <tbody class="tbody">

                    <tr>
                        <td style="text-align: center;"><em class="emphasis">Day</em></td>
                        <td>---</td>
                        <td>---</td>
                    </tr>

                    <tr>
                        <td><em>d</em></td>
                        <td>The day of the month, with leading zeros if required (01 to 31)</td>
                        <td><em>01</em> to <em>31</em></td>
                    </tr>

                    <tr>
                        <td><em>D</em></td>
                        <td>Abbreviated day of the week, 3 characters, from Mon to Sun.</td>
                        <td><em>Mon</em> through <em>Sun</em></td>
                    </tr>

                    <tr>
                        <td><em>j</em></td>
                        <td>Day of the month, numerical representation from 1 to 31, without leading zeros.</td>
                        <td><em>1</em> to <em>31</em></td>
                    </tr>

                    <tr>
                        <td><em>l</em> (lowercase &#039;L&#039;)</td>
                        <td>A full textual representation of the day of the week, ranging from Sunday to Saturday.</td>
                        <td><em>Sunday</em> through <em>Saturday</em></td>
                    </tr>

                    <tr>
                        <td><em>N</em></td>
                        <td>ISO-8601 numeric representation of the day of the week: 1 for Monday through 7 for Sunday.</td>
                        <td><em>1</em> (for Monday) through <em>7</em> (for Sunday)</td>
                    </tr>

                    <tr>
                        <td><em>S</em></td>
                        <td>English ordinal suffix for the day of the month, 2 characters: 'st', 'nd', 'rd', or 'th'. Compatible with 'j'.</td>
                        <td>
                            <em>st</em>, <em>nd</em>, <em>rd</em> or
                            <em>th</em>.  Works well with <em>j</em>
                        </td>
                    </tr>

                    <tr>
                        <td><em>w</em></td>
                        <td>Numeric representation of the day of the week: 0 for Sunday through 6 for Saturday.</td>
                        <td><em>0</em> (for Sunday) through <em>6</em> (for Saturday)</td>
                    </tr>

                    <tr>
                        <td><em>z</em></td>
                        <td>The day of the year, starting from 0, ranging from 0 through 365.</td>
                        <td><em>0</em> through <em>365</em></td>
                    </tr>

                    <tr>
                        <td style="text-align: center;"><em class="emphasis">Week</em></td>
                        <td>---</td>
                        <td>---</td>
                    </tr>

                    <tr>
                        <td><em>W</em></td>
                        <td>ISO-8601 week number of the year, with weeks starting on Monday. Example: 42 (indicating the 42nd week of the year)</td>
                        <td>Example: <em>42</em> (the 42nd week in the year)</td>
                    </tr>

                    <tr>
                        <td style="text-align: center;"><em class="emphasis">Month</em></td>
                        <td>---</td>
                        <td>---</td>
                    </tr>

                    <tr>
                        <td><em>F</em></td>
                        <td>A full textual representation of a month, ranging from January through December.</td>
                        <td><em>January</em> through <em>December</em></td>
                    </tr>

                    <tr>
                        <td><em>m</em></td>
                        <td>Numeric representation of a month, with leading zeros, ranging from 01 through 12.</td>
                        <td><em>01</em> through <em>12</em></td>
                    </tr>

                    <tr>
                        <td><em>M</em></td>
                        <td>A short textual representation of a month, three letters, ranging from Jan through Dec.</td>
                        <td><em>Jan</em> through <em>Dec</em></td>
                    </tr>

                    <tr>
                        <td><em>n</em></td>
                        <td>Numeric representation of a month, without leading zeros, ranging from 1 through 12.</td>
                        <td><em>1</em> through <em>12</em></td>
                    </tr>

                    <tr>
                        <td><em>t</em></td>
                        <td>Number of days in the given month, ranging from 28 through 31.</td>
                        <td><em>28</em> through <em>31</em></td>
                    </tr>

                    <tr>
                        <td style="text-align: center;"><em class="emphasis">Year</em></td>
                        <td>---</td>
                        <td>---</td>
                    </tr>

                    <tr>
                        <td><em>L</em></td>
                        <td>Indicator of whether it's a leap year: 1 if it is a leap year, 0 otherwise.</td>
                        <td><em>1</em> if it is a leap year, <em>0</em> otherwise.</td>
                    </tr>

                    <tr>
                        <td><em>o</em></td>
                        <td>ISO-8601 week-numbering year. This shares the same value as the standard year (Y), unless the ISO week number (W) belongs to the previous or next year, in which case that year is used instead. Examples: 1999 or 2003.</td>
                        <td>Examples: <em>1999</em> or <em>2003</em></td>
                    </tr>

                    <tr>
                        <td><em>Y</em></td>
                        <td>A full numeric representation of a year, consisting of 4 digits. Examples: 1999 or 2003.</td>
                        <td>Examples: <em>1999</em> or <em>2003</em></td>
                    </tr>

                    <tr>
                        <td><em>y</em></td>
                        <td>A two-digit representation of a year. Examples: 99 or 03.</td>
                        <td>Examples: <em>99</em> or <em>03</em></td>
                    </tr>

                    <tr>
                        <td style="text-align: center;"><em class="emphasis">Time</em></td>
                        <td>---</td>
                        <td>---</td>
                    </tr>

                    <tr>
                        <td><em>a</em></td>
                        <td>Lowercase Ante meridiem and Post meridiem: am or pm</td>
                        <td><em>am</em> or <em>pm</em></td>
                    </tr>

                    <tr>
                        <td><em>A</em></td>
                        <td>Uppercase Ante meridiem and Post meridiem: AM or PM</td>
                        <td><em>AM</em> or <em>PM</em></td>
                    </tr>

                    <tr>
                        <td><em>B</em></td>
                        <td>Swatch Internet time: 000 through 999</td>
                        <td><em>000</em> through <em>999</em></td>
                    </tr>

                    <tr>
                        <td><em>g</em></td>
                        <td>12-hour format of an hour without leading zeros, ranging from 1 through 12</td>
                        <td><em>1</em> through <em>12</em></td>
                    </tr>

                    <tr>
                        <td><em>G</em></td>
                        <td>24-hour format of an hour without leading zeros, ranging from 0 through 23</td>
                        <td><em>0</em> through <em>23</em></td>
                    </tr>

                    <tr>
                        <td><em>h</em></td>
                        <td>12-hour format of an hour with leading zeros, ranging from 01 through 12</td>
                        <td><em>01</em> through <em>12</em></td>
                    </tr>

                    <tr>
                        <td><em>H</em></td>
                        <td>24-hour format of an hour with leading zeros, ranging from 00 through 23</td>
                        <td><em>00</em> through <em>23</em></td>
                    </tr>

                    <tr>
                        <td><em>i</em></td>
                        <td>Minutes with leading zeros: 00 to 59</td>
                        <td><em>00</em> to <em>59</em></td>
                    </tr>

                    <tr>
                        <td><em>s</em></td>
                        <td>Seconds, with leading zeros: 00 through 59</td>
                        <td><em>00</em> through <em>59</em></td>
                    </tr>

                    <tr>
                        <td><em>u</em></td>
                        <td>Microseconds (PHP 5.2.2+): date() generates 000000; DateTime::format() supports microseconds if initialized with them.</td>
                        <td>Example: <em>654321</em></td>
                    </tr>

                    <tr>
                        <td><em>v</em></td>
                        <td>Timezone identifier (introduced in PHP 5.1.0): Examples such as UTC, GMT, Atlantic/Azores.
                        </td>
                        <td>Example: <em>654</em></td>
                    </tr>

                    </tbody>

                </table>
            </div>

        </div>


        <?php
    }

    /**
     * Returns an instance of the class.
     *
     * @since 1.0
     */
    public static function get_instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}

// Initialize the menu
Cdsfw_Current_Date_Menu::get_instance();
