<?php

/**
 *Plugin Name: Artemis Stellenanzeigen
 *Description: Holt offene Stellenanzeigen über Artemis und gibt sie aus.
 *Version: 1.2.0
 * Author:            AVEO Solutions GmbH 
 * Author URI:        https://www.aveo-solutions.com/
 * Text Domain: artemis-stellenanzeigen
 **/

defined('ABSPATH') or die('No script kiddies please!');

require_once 'artemis-paginator.php';
include 'artemis-stellenanzeigen-options.php';

//Link to settings-page
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'ASA_salcode_add_plugin_page_settings_link');
function ASA_salcode_add_plugin_page_settings_link($links)
{
    $links[] = '<a href="' .
        admin_url('options-general.php?page=artemis-wp-plugin') .
        '">' . __('Settings') . '</a>';
    return $links;
}

function ASA_is_valid_plz($zip_code)
{
    if (empty($zip_code)) {
        return false;
    }
    if (strlen(trim($zip_code)) > 5) {
        return false;
    }
    if (!preg_match('/^\\d{1,5}$/', $zip_code)) {
        return false;
    }
    return true;
}

$queryClass = new ASA_StellenQuery();
$queryClass->initializeFromQueryParams();

add_shortcode('artemis-stellenanzeigen', array($queryClass, 'ASA_getStellenangeboteFromQuery'));
add_shortcode('stellenanzeigen', array($queryClass, 'ASA_getStellenangeboteFromQuery'));

class ASA_StellenQuery
{
    private $_suchText = null;
    private $_suchOrt = null;
    private $_radius = 50;
    private $_page = 1;
    private $_perPage = 10;
    private $_totalResults = 0;
    private $_joblist_anchor_name = ''; // Vorbereitend, falls es mal ein Anchor geben soll
    private $options = array();

    function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'ASA_register_my_styles'));
        $this->options = get_option('plugin_options');
        $this->initializeDefaultValues();
    }

    private function initializeDefaultValues()
    {
        // Setze Standard-Werte aus den Plugin-Optionen
        if (isset($this->options['default_perPage'])) {
            $this->_perPage = intval($this->options['default_perPage']);
        }
    }

    public function initializeFromQueryParams()
    {
        if (empty($_GET)) {
            return;
        }

        // SuchText: Übernehme wenn gesetzt
        if (isset($_GET['suchText'])) {
            $this->_suchText = sanitize_text_field($_GET['suchText']);
        }

        // SuchOrt: Übernehme wenn gesetzt und valid
        if (isset($_GET['suchOrt']) && ASA_is_valid_plz($_GET['suchOrt'])) {
            $this->_suchOrt = sanitize_text_field($_GET['suchOrt']);
        }

        // Radius: Übernehme wenn numeric, sonst Standard
        if (isset($_GET['radius']) && is_numeric($_GET['radius'])) {
            $this->_radius = intval(sanitize_text_field($_GET['radius']));
        }

        // PerPage: Übernehme wenn numeric, sonst Standard
        if (isset($_GET['limit']) && is_numeric($_GET['limit'])) {
            $this->_perPage = intval(sanitize_text_field($_GET['limit']));
        }

        // Page: Übernehme wenn numeric, sonst Standard
        if (isset($_GET['stellenpage']) && is_numeric($_GET['stellenpage'])) {
            $this->_page = intval(sanitize_text_field($_GET['stellenpage']));
        }


        // Bei Suche zurück auf Seite 1
        if (isset($_GET['submit_btn'])) {
            $this->_page = 1;
        }
    }

    function ASA_getStellenangeboteFromQuery($atts)
    {
        $urlParam = "";

        if (isset($atts['url']))
            $urlParam = esc_url_raw($atts['url']);
        else if (isset($this->options['url_string']))
            $urlParam = esc_url_raw($this->options['url_string']);

        $requestParams = '?suchText=' . $this->_suchText .
            '&suchOrt=' . $this->_suchOrt .
            '&radius=' . $this->_radius .
            '&page=' . $this->_page .
            '&perPage=' . $this->_perPage;

        if (!empty($urlParam)) {
            try {
                $response = wp_remote_get($urlParam . $requestParams);
                $json = wp_remote_retrieve_body($response);
                $objects = json_decode($json);

                if (is_null($objects)) {
                    echo '<div class="job__page"><div class="job__error-message">Es konnte keine Verbindung zur Datenbank hergestellt werden.</div></div>';
                } else {
                    return $this->ASA_buildMarkup($objects);
                }
            } catch (Exception $e) {
                echo 'Exception abgefangen: ',  $e->getMessage(), "\n";
            }
        } else {
            echo '<div class="job__page"><div class="job__error-message">Es konnte keine Verbindung zur Datenbank hergestellt werden.</div></div>';
        }
    }

    function ASA_buildMarkup($objects)
    {
        $options = array(
            '10' => '10km',
            '20' => '20km',
            '50' => '50km',
            '100' => '100km',
        );

        $Paginator = new ASA_Paginator($this->_joblist_anchor_name, $this->_perPage, $objects->totalResults, $this->_page, $this->_suchText, $this->_suchOrt, $this->_radius);

        $html = '<div class="job__page" id="joblist_anchor">';

        if ($this->options['show_suchleiste'] == true) {
            $formAction = $this->_joblist_anchor_name ? '#' . $this->_joblist_anchor_name : '';

            $html .= "<form method='get' action='" . esc_attr($formAction) . "'>";
            $html .= "<div class='job__suchleiste'>";
            $html .= "<input class='job__such-element job__such-element--text' type='text' name='suchText' placeholder='Was' value='" . esc_attr($this->_suchText) . "'>";
            $html .= "<input class='job__such-element  job__such-element--ort' type='text' name='suchOrt' placeholder='Plz' maxlength='5' value='" . esc_attr($this->_suchOrt) . "'>";
            $html .= "<input type='hidden' name='stellenpage' value='" . esc_attr($this->_page) . "'>";
            $html .= "<input type='hidden' name='limit' value='" . esc_attr($this->_perPage) . "'>";
            $html .= "<select class='job__such-element job__such-element--radius' name='radius'>";

            foreach ($options as $value => $display) {
                if ($value == $this->_radius) {
                    $html .= '<option value="' . esc_attr($value) . '" selected>' . $display . '</option>';
                } else {
                    $html .= '<option value="' . esc_attr($value) . '">' . $display . '</option>';
                }
            }

            $html .= "</select>";
            $html .= "<button class='job__button job__button--suche' type='submit' value='Suche' name='submit_btn'>Suche</button>";
            $html .= "</div>";
            $html .= "<div class='job__suchleiste-reset'>";
            $html .= "<a class='job__suchleiste-reset-link' href='?stellenpage=1&suchText=&suchOrt=&radius=50'>Suche zurücksetzen <i class='fa fa-times job__suchleiste-reset-icon' aria-hidden='true'></i></a>";
            $html .= "</div>";
            $html .= "</form>";
        }

        $html .= '<div class="job__page-heading"><h3>Jobangebote (' . $objects->totalResults . ')</h3></div>';
        $html .= '<div>';

        if (count($objects->results) > 0) {
            $target = $this->options['open_in_actual_tab'] == true ? '_self' : '_blank';
            $showLogo = $this->options['show_logo'];

            foreach ($objects->results as $singleObj) {
                $html .= '<div class="job">';
                $html .= '<div class="job__header">';

                if ($showLogo == true) {
                    $html .= '<div class="job__logo"><img src="' . $singleObj->logo . '" /></div>';
                }

                $html .= '<div class="job__heading">';
                $html .= '<a class="job__heading-bewerben-link" href="' . esc_url($singleObj->bewerbenUrl) . '" target="' . $target . '">' . $singleObj->name . '</a>';
                $html .= '<div class="job__location">' . $singleObj->arbeitsort_plz . ' ' . $singleObj->arbeitsort . '</div>';
                $html .= '</div>';
                $html .= '<div class="job__date"><i class="far fa-calendar-alt"></i> ' . date('d.m.Y', strtotime($singleObj->datum)) . '</div>';
                $html .= '</div>';
                $html .= '<div class="job__content">';

                if ($this->options['show_kurzbeschreibung'] == true) {
                    $html .= '<div class="job__description">' . $singleObj->beschreibung . '</div>';
                }

                $html .= '</div>';
                $html .= '<div class="job__bewerben-link-wrapper">';
                $html .= '<a class="job__bewerben-link" href="' . esc_url($singleObj->bewerbenUrl) . '" target="' . $target . '">';
                $html .= '<button class="job__button job__button--details">Details</button></a></div>';
                $html .= '</div>';
            }
        } else {
            $html .= '<div class="job__error-message">';
            $html .= $this->options['no_results_string'];
            $html .= '</div>';
        }

        $html .= "</div>";

        if ($objects->totalResults > $this->_perPage) {
            $html .= "<div class='job__paging-container'>";
            $html .= $Paginator->ASA_createLinks(5, 'job__paging');
            $html .= "</div>";
        }

        $html .= "</div>";

        return $html;
    }

    function ASA_register_my_styles()
    {
        wp_enqueue_style('style1', plugins_url('css/artemis-stellenanzeigen.css', __FILE__));
        if (isset($this->options['css_string'])) {
            $customCss = $this->options['css_string'];
            wp_add_inline_style('style1', $customCss);
        }
    }
}
