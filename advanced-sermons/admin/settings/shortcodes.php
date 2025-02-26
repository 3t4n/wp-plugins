<?php


// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


// Shortcode page content

add_action('asp_settings_content', 'asp_render_shortcodes_page');
function asp_render_shortcodes_page()
{
    global $asp_active_tab;
    if ('shortcodes' != $asp_active_tab) {
        return;
    }
    ?>

    <h3><?php _e('Shortcode Settings', 'advanced-sermons'); ?></h3>
    <p class="asp-settings-desc"><?php _e('Shortcodes allows users to perform certain actions as well as display predefined items
        within WordPress pages and posts. The Advanced Sermon shortcodes are alternative methods used to display sermons
        and series on your website.', 'advanced-sermons'); ?></p>

    <form action="options.php" method="post">

        <?php
        settings_fields('asp-shortcode-settings');
        do_settings_sections('asp-shortcode-settings');
        ?>

        <!-- Shortcode option section -->

        <div class="asp-inner-wrapper">

            <div class="asp-form-message"><?php settings_errors('asp-notices'); ?></div>

            <table class="form-table">
                <tbody>


                <tr class="asp-title-holder">
                    <td>
                        <h2 class="asp-inner-title"><?php _e('Archive Shortcode', 'advanced-sermons'); ?></h2>
                    </td>
                </tr>

                <tr class="asp-pro-version asp-shortcode-table">
                    <th>
                        <input class="asp-shortcode-holder" type="text" value="[asp-archive]" id="aspArchive"
                               readonly="readonly">
                        <div class="asp-shortcode-tooltip">
                            <button id="aspArchive" type="button" onclick="aspCopyToClipboard('aspArchive')"
                                    onmouseout="aspClipboardOut()"><span class="asp-shortcode-tooltip-text"
                                                                         id="aspArchiveTip"><?php _e('Copy to clipboard', 'advanced-sermons'); ?></span><?php _e('Copy', 'advanced-sermons'); ?>
                            </button>
                        </div>
                    </th>
                    <td class="asp-shortcode-parameters" style="padding-bottom: 20px;">
                        <p style="font-size: 17px!important;"><strong><?php _e('Shortcode Description',
                                    'advanced-sermons') ?></strong></p>

                        <p style="margin-top: 10px; margin-bottom: 10px;"><?php _e('Shortcode can be only used once per page and within one column.', 'advanced-sermons'); ?></p>

                        <p style="font-size: 17px!important;"><strong><?php _e('Parameters', 'advanced-sermons'); ?></strong></p>
                        <ul>
                            <li><code style="margin-top: 0px!important;">[asp-archive filter="true"]</code>
                                <p><?php _e("'true' - Archive will have a filter.", 'advanced-sermons'); ?></p>
                                <p><?php _e("'false' - Archive will not have a filter.", 'advanced-sermons'); ?></p>
                            </li>
                        </ul>
                    </td>

                </tr>


                <tr class="asp-title-holder">
                    <td>
                        <h2 class="asp-inner-title"><?php _e('Sermons Shortcode', 'advanced-sermons'); ?></h2>
                    </td>
                </tr>

                <tr class="asp-pro-version asp-shortcode-table">
                    <th>
                        <input class="asp-shortcode-holder" type="text" value="[asp-sermons]" id="aspSermons"
                               readonly="readonly">
                        <div class="asp-shortcode-tooltip">
                            <button id="aspSermons" type="button" onclick="aspCopyToClipboard('aspSermons')"
                                    onmouseout="aspClipboardOut()"><span class="asp-shortcode-tooltip-text"
                                                                         id="aspSermonsTip"><?php _e('Copy to clipboard', 'advanced-sermons'); ?></span><?php _e('Copy', 'advanced-sermons'); ?>
                            </button>
                        </div>
                    </th>
                    <td class="asp-shortcode-parameters" style="padding-bottom: 20px;">
                        <p style="font-size: 17px!important;"><strong><?php _e('Example Shortcode', 'advanced-sermons'); ?></strong></p>
                        <p style="margin-top: -11px; margin-bottom: 10px;"><code>[asp-sermons style="grid-view"
                                order="DESC" post="3" speaker="john-smith"]</code></p>
                        <p style="font-size: 17px!important;"><strong><?php _e('Parameters', 'advanced-sermons'); ?></strong></p>
                        <ul>
                            <li><code style="margin-top: 0px!important;">[asp-sermons style="grid-view"]</code>
                                <p><?php _e("'grid-view' - Display sermons in a grid view.", 'advanced-sermons'); ?></p>
                                <p><?php _e("'list-view' - Display sermons in a list view.", 'advanced-sermons'); ?></p>
                            </li>
                            <li><code>[asp-sermons order="DESC"]</code>
                                <p><?php _e("'DESC' - Ascending order from newest to oldest.", 'advanced-sermons'); ?></p>
                                <p><?php _e("'ASC' - Ascending order from oldest to newest.", 'advanced-sermons'); ?></p>
                            </li>
                            <li><code>[asp-sermons orderby="date"]</code>
                                <p><?php _e("'date' - Order by date.", 'advanced-sermons'); ?></p>
                                <p><?php _e("'title' - Order by title.", 'advanced-sermons'); ?></p>
                                <p><?php _e("'rand' - Random Order.", 'advanced-sermons'); ?></p>
                                <p><?php _e("'modified' - Order by last modified date.", 'advanced-sermons'); ?></p>
                            </li>
                            <li><code>[asp-sermons post="3"]</code>
                                <p><?php _e("'int' - Number of sermons to show. Use -1 to show all. Default 3.", 'advanced-sermons'); ?></p>
                            </li>
                            <li><code>[asp-sermons series="the-journey"]</code>
                                <p><?php _e("'series-slug' - Enter a series slug to display only that series. Separate with a
                                    comma to display multiple series.<br>I.e: the-journey,stronger", 'advanced-sermons'); ?></p>
                            </li>
                            <li><code>[asp-sermons speaker="john-smith"]</code>
                                <p><?php _e("'speaker-slug' - Enter a speakers slug to display sermons only by that specific
                                    speaker. Seperate with a comma to display multiple speakers.<br>I.e:
                                    john-smith,george-krenz", 'advanced-sermons'); ?></p>
                            </li>
                            <li><code>[asp-sermons topic="the-good-life"]</code>
                                <p><?php _e("'topic-slug' - Enter a topic slug to display only that topic. Seperate with a comma
                                    to display multiple topics.<br>I.e: the-good-life,addiction", 'advanced-sermons'); ?></p>
                            </li>
                            <li><code>[asp-sermons carousel="true"]</code>
                                <p><?php _e("Display sermons in a carousel. Only works with grid view layout.", 'advanced-sermons'); ?></p>
                            </li>
                            <li><code>[asp-sermons columns="3"]</code>
                                <p><?php _e("Carousel will display 1-4 columns in a slide. Default: 3. Max: 4.", 'advanced-sermons'); ?></p>
                            </li>
                        </ul>
                    </td>
                </tr>

                <tr class="asp-title-holder">
                    <td>
                        <h2 class="asp-inner-title"><?php _e('Series Shortcode', 'advanced-sermons'); ?></h2>
                    </td>
                </tr>

                <tr class="asp-pro-version asp-shortcode-table">
                    <th>
                        <input class="asp-shortcode-holder" type="text" value="[asp-series]" id="aspSeries"
                               readonly="readonly">
                        <div class="asp-shortcode-tooltip">
                            <button id="aspSeries" type="button" onclick="aspCopyToClipboard('aspSeries')"
                                    onmouseout="aspClipboardOut()"><span class="asp-shortcode-tooltip-text"
                                                                         id="aspSeriesTip"><?php _e('Copy to clipboard', 'advanced-sermons'); ?></span><?php _e('Copy', 'advanced-sermons'); ?>
                            </button>
                        </div>
                    </th>
                    <td class="asp-shortcode-parameters" style="padding-bottom: 20px;">
                        <p style="font-size: 17px!important;"><strong><?php _e("Example Shortcode", 'advanced-sermons'); ?></strong></p>
                        <p style="margin-top: -11px; margin-bottom: 10px;"><code>[asp-series order="DESC"
                                number="3"]</code></p>
                        <p style="font-size: 17px!important;"><strong><?php _e("Parameters", 'advanced-sermons'); ?></strong></p>
                        <ul>
                            <li><code style="margin-top: 0px!important;">[asp-series order="ASC" pagination="load-more"]</code>
                                <p><?php _e("'DESC' - Descending order. Use if you are using term_id ordering. Default.", 'advanced-sermons'); ?></p>
                                <p><?php _e("'ASC' - Ascending order. Use if you are using drag and drop ordering.", 'advanced-sermons'); ?></p>
                            </li>
                            <li><code>[asp-series number="3"]</code>
                                <p><?php _e("'int' - Number of series to show. Use 0 or \"\" to show all. Default 3.", 'advanced-sermons'); ?></p>
                            </li>
                            <li><code>[asp-series pagination="numeric"]</code>
                                <p><?php _e("'numeric' - Enables numeric pagination. If enabled, 'number' parameter indicates how many series will be per page.", 'advanced-sermons'); ?></p>
                                <p><?php _e("'load-more' - Enables load more button. If enabled, 'number' parameter indicates how many series will be per page.", 'advanced-sermons'); ?></p>
                                <p><?php _e("'infinity' - Enables infinity scroll. If enabled, 'number' parameter indicates how many series will be per page.", 'advanced-sermons'); ?></p>
                            </li>
                        </ul>
                    </td>
                </tr>

                <tr class="asp-title-holder">
                    <td>
                        <h2 class="asp-inner-title"><?php _e('Speakers Shortcode', 'advanced-sermons'); ?></h2>
                    </td>
                </tr>

                <tr class="asp-pro-version asp-shortcode-table">
                    <th>
                        <input class="asp-shortcode-holder" type="text" value="[asp-speakers]" id="aspSpeakers"
                               readonly="readonly">
                        <div class="asp-shortcode-tooltip">
                            <button id="aspSpeakers" type="button" onclick="aspCopyToClipboard('aspSpeakers')"
                                    onmouseout="aspClipboardOut()"><span class="asp-shortcode-tooltip-text"
                                                                         id="aspSpeakersTip"><?php _e('Copy to clipboard', 'advanced-sermons'); ?></span><?php _e('Copy', 'advanced-sermons'); ?>
                            </button>
                        </div>
                    </th>
                    <td class="asp-shortcode-parameters" style="padding-bottom: 20px;">
                        <p style="font-size: 17px!important;"><strong><?php _e("Example Shortcode", 'advanced-sermons'); ?></strong></p>
                        <p style="margin-top: -11px; margin-bottom: 10px;"><code>[asp-speakers order="DESC"
                                number="4"]</code></p>
                        <p style="font-size: 17px!important;"><strong><?php _e("Parameters", 'advanced-sermons'); ?></strong></p>
                        <ul>
                            <li><code style="margin-top: 0px!important;">[asp-speakers orderby="term_id"]</code>
                                <p><?php _e("'term_id' - Order speakers by creation of speaker.", 'advanced-sermons'); ?></p>
                                <p><?php _e("'name' - Order speakers alphabetically.", 'advanced-sermons'); ?></p>
                            </li>
                            <li><code>[asp-speakers order="DESC"]</code>
                                <p><?php _e("'DESC' - Ascending order from newest to oldest.", 'advanced-sermons'); ?></p>
                                <p><?php _e("'ASC' - Ascending order from oldest to newest.", 'advanced-sermons'); ?></p>
                            </li>
                            <li><code>[asp-speakers number="4"]</code>
                                <p><?php _e("'int' - Number of speakers to show. Use 0 or \"\" to show all. Default 0.", 'advanced-sermons'); ?></p>
                            </li>
                        </ul>
                    </td>
                </tr>

                <tr class="asp-title-holder">
                    <td>
                        <h2 class="asp-inner-title"><?php _e('Widgets Shortcode', 'advanced-sermons'); ?></h2>
                    </td>
                </tr>

                <tr class="asp-pro-version asp-shortcode-table">
                    <th>
                        <input class="asp-shortcode-holder" type="text" value="[asp-widgets]" id="aspWidgets"
                               readonly="readonly">
                        <div class="asp-shortcode-tooltip">
                            <button id="aspWidgets" type="button" onclick="aspCopyToClipboard('aspWidgets')"
                                    onmouseout="aspClipboardOut()"><span class="asp-shortcode-tooltip-text"
                                                                         id="aspWidgetsTip"><?php _e('Copy to clipboard', 'advanced-sermons'); ?></span><?php _e('Copy', 'advanced-sermons'); ?>
                            </button>
                        </div>
                    </th>
                    <td class="asp-shortcode-parameters" style="padding-bottom: 20px;">
                        <p style="font-size: 17px!important;"><strong><?php _e("Shortcode Options", 'advanced-sermons'); ?></strong></p>
                        <ul>
                            <li><code style="margin-top: 0px!important;">[asp-widgets style="sermon-list"]</code>
                                <p><?php _e("Display most recent sermons in a beautiful sidebar list format.", 'advanced-sermons'); ?></p>
                            </li>
                            <li><code>[asp-widgets style="series-list"]</code>
                                <p><?php _e("Display the 5 most recent series in a beautiful sidebar list format.", 'advanced-sermons'); ?></p>
                            </li>
                            <li><code>[asp-widgets style="speaker-list"]</code>
                                <p><?php _e("Display the 5 most recent speakers in a beautiful sidebar list format.", 'advanced-sermons'); ?></p>
                            </li>
                        </ul>

                    </td>
                </tr>


                </tbody>
            </table>
        </div>
    </form>
<?php }
