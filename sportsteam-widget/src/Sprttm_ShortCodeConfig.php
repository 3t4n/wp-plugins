<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
require_once('shortcode.php');

/**
 * Main Class
 */
class Sprttm_ShortCodeConfig
{
    /*--------------------------------------------*
     * Attributes
     *--------------------------------------------*/
    /** Refers to a single instance of this class. */
    private static $instance = null;

    /* Saved options */
    public $options;

    /*--------------------------------------------*
     * Constructor
     *--------------------------------------------*/
    /**
     * Creates or returns an instance of this class.
     *
     * @return  AzscoreThemeOptions A single instance of this class.
     */
    public static function getInstance() {

        if (null == self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;

    } // end getInstance;

    /**
     * Initializes the plugin by setting localization, filters, and administration functions.
     */
    private function __construct() {

        // Add the page to the admin menu
        add_action('admin_menu', array(&$this, 'addPage'));

        // Register page options
        add_action('admin_init', array(&$this, 'registerPageOptions'));

        // Get registered option
        $this->options = get_option('sportsteam_settings_options');

        add_action( 'wp_enqueue_scripts', array($this, 'initService') );

    }

    /**
     * Function that will add service javascript file.
     */
    public function initService() {
        $cfg = require('cfg.php');
        $domainCfg = sprttm_getDomainCfgForLivescoreService();
        $url = $domainCfg['base'];
        $ver = $cfg['ver'];
        $t = time();
        $t = $t - $t%(12*60*60);

        wp_enqueue_script('sportsteam_livescore_service', "{$url}/777plugin{$ver}/js/data.js?t={$t}");
    }

    /*--------------------------------------------*
     * Functions
     *--------------------------------------------*/

    /**
     * Function that will add the options page under Setting Menu.
     */
    public function addPage() {
        add_submenu_page('edit.php?post_type=sportsteams', esc_html__('Livescore', 'sportsteam-widget'), 'Livescore <span class="awaiting-mod">New!</span>', 'manage_categories', __FILE__, array($this, 'displayPage'));
    }

    /**
     * Function that will display the options page.
     */
    public function displayPage() {
    ?>
    <div class='wrap'>
		<h1><?php esc_html_e('Livescore Config', 'sportsteam-widget'); ?></h1>
		<div id="poststuff" class="metabox-holder">
			<div class="widget">
                <form method="post" action="options.php">
                <?php
                    submit_button();
                    settings_fields(__FILE__);
                    do_settings_sections(__FILE__);
                ?>
                </form>
                <div>
                    <small>
                        When you activate the 'Enabled' option, it signifies:<br/>
                        <blockquote>
                            * Enabling the plugin to work on your website using a shortcode [livescore] <br/>
                            * Activating the display of a link to the author's website.
                        </blockquote>
                        On the other hand, if you choose the 'Disabled' setting, it conveys:<br/>
                        <blockquote>
                            * Deactivating the plugin's functionality on your website [livescore] <br/>
                            * Disabling the display of a link to the author's website.
                        </blockquote>
                    </small>
                </div>
                <br/>
                <br/>
                <h3>Plugin Usage Notes</h3>
                <ul>
                    <li>How to use the plugin?
                        <blockquote>
                            * Select the 'Enabled' option in the “Activation of shortcode” settings<br/>
                            * Utilize the: [livescore] shortcode wherever you desire to display today's real-time scores<br/>
                            * You can customize additional parameters:<br/>
                            <blockquote>
                                * Specify the time period: live, tomorrow, yesterday. For instance [livescore path=/live]<br/>
                                * Filter by various leagues. For instance [livescore path=/football/tournaments/england/premier-league]<br/>
                                * The comprehensive list of leagues and countries is available in the “List of tournaments” section below.<br/>
                            </blockquote>
                        </blockquote>
                    </li>
                </ul>
                <h3>List of tournaments</h3>
                <ul style="padding-left: 10px; list-style: inside;">
                    <li> AFC - Champions League: [livescore path=/football/tournaments/asia/afc-champions-league] </li>
                    <li> AFC - Asian Cup: [livescore path=/football/tournaments/asia/afc-asian-cup] </li>
                    <li> AFC - South Asian Championship: [livescore path=/football/tournaments/asia/saff-championship] </li>
                    <li> Albania - League 1: [livescore path=/tournaments/albania/kategoria-superiore] </li>
                    <li> Albania - Super Cup: [livescore path=/football/tournaments/albania/supercup] </li>
                    <li> Algeria - League 1: [livescore path=/football/tournaments/algeria/ligue-1-2] </li>
                    <li> Algeria - CUP: [livescore path=/football/tournaments/algeria/algerian-cup] </li>
                    <li> Argentina - CUP: [livescore path=/football/tournaments/argentina/copa-argentina] </li>
                    <li> Argentina - League 1: [livescore path=/football/tournaments/argentina/superliga] </li>
                    <li> Armenia - League 1: [livescore path=/football/tournaments/armenia/premier-league-9] </li>
                    <li> Armenia - Cup: [livescore path=/football/tournaments/armenia/armenian-cup] </li>
                    <li> Australia - League 1: [livescore path=/football/tournaments/australia/a-league] </li>
                    <li> Australia - Brisbane Premier League: [livescore path=/football/tournaments/australia/brisbane-premier-league] </li>
                    <li> Austria - CUP: [livescore path=/football/tournaments/austria/ofb-cup] </li>
                    <li> Austria - Bundesliga: [livescore path=/football/tournaments/austria/bundesliga] </li>
                    <li> Azerbaijan - Premier League: [livescore path=/football/tournaments/azerbaijan/premier-league-11] </li>
                    <li> Azerbaijan - CUP: [livescore path=/football/tournaments/azerbaijan/azerbaijan-cup] </li>
                    <li> Azerbaijan - First League: [livescore path=/football/tournaments/azerbaijan/first-division-2] </li>
                    <li> Belarus - Premier League: [livescore path=/football/tournaments/belarus/vysshaya-liga] </li>
                    <li> Belarus - Cup: [livescore path=/football/tournaments/belarus/belarus-cup] </li>
                    <li> Belarus - First League: [livescore path=/football/tournaments/belarus/pervaya-liga] </li>
                    <li> Belgium - Jupiler: [livescore path=/football/tournaments/belgium/first-division-a] </li>
                    <li> Belgium - League 2: [livescore path=/football/tournaments/belgium/first-division-b] </li>
                    <li> Belgium - Super CUP: [livescore path=/football/tournaments/belgium/super-cup-13] </li>
                    <li> Belgium - CUP: [livescore path=/football/tournaments/belgium/beker-van-belgie] </li>
                    <li> Bosnia Herzegovina - Premier League: [livescore path=/football/tournaments/bosnia-herzegovina/premier-league-3] </li>
                    <li> Bosnia Herzegovina - Cup: [livescore path=/football/tournaments/bosnia-herzegovina/bosnia-herzegovina-cup] </li>
                    <li> Brazil - Brasileirao Serie B: [livescore path=/football/tournaments/brazil/brasileiro-serie-b] </li>
                    <li> Brazil - CUP: [livescore path=/football/tournaments/brazil/copa-do-brasil] </li>
                    <li> Brazil - Brasileiro Serie C: [livescore path=/football/tournaments/brazil/brasileiro-serie-c] </li>
                    <li> Brazil - Brasileirao Serie D: [livescore path=/football/tournaments/brazil/brasileiro-serie-d] </li>
                    <li> Brazil - Brasileirao Serie A: [livescore path=/football/tournaments/brazil/brasileiro-serie-a] </li>
                    <li> Bulgaria - CUP: [livescore path=/football/tournaments/bulgaria/bulgarian-cup] </li>
                    <li> Bulgaria - League 1: [livescore path=/football/tournaments/bulgaria/first-professional-league] </li>
                    <li> CAF - African Nations Championship: [livescore path=/football/tournaments/africa/africa-cup-of-nations] </li>
                    <li> CAF - African Nations Championship Qualification: [livescore path=/football/tournaments/africa/africa-cup-of-nations-q] </li>
                    <li> CAF - Champions League: [livescore path=/football/tournaments/africa/caf-champions-league] </li>
                    <li> CAF - Confederation Cup: [livescore path=/football/tournaments/africa/caf-confederations-cup] </li>
                    <li> CAF - COSAFA Cup: [livescore path=/football/tournaments/africa/cosafa-cup] </li>
                    <li> Cameroon - League 1: [livescore path=/football/tournaments/cameroon/elite-one] </li>
                    <li> Chile - Segunda Division: [livescore path=/football/tournaments/chile/chile-segunda] </li>
                    <li> Chile - Primera A: [livescore path=/football/tournaments/chile/primera-division-9] </li>
                    <li> Chile - Primera B: [livescore path=/football/tournaments/chile/primera-b] </li>
                    <li> Chile - Cup: [livescore path=/football/tournaments/chile/copa-chile] </li>
                    <li> China - League 2: [livescore path=/football/tournaments/china/china-league-2] </li>
                    <li> China - Super League: [livescore path=/football/tournaments/china/chinese-super-league] </li>
                    <li> China - First League: [livescore path=/football/tournaments/china/china-league-2] </li>
                    <li> China - FA Cup: [livescore path=/football/tournaments/china/fa-cup-2] </li>
                    <li> Colombia - Cup: [livescore path=/football/tournaments/colombia/copa-colombia] </li>
                    <li> Colombia - Primera B: [livescore path=/football/tournaments/colombia/primera-b-2] </li>
                    <li> Colombia - Primera A: [livescore path=/football/tournaments/colombia/primera-a-clausura] </li>
                    <li> CONMEBOL - Copa Sudamericana: [livescore path=/football/tournaments/south-america/copa-sudamericana] </li>
                    <li> CONMEBOL - Copa Libertadores U20: [livescore path=/football/tournaments/south-america/u20-copa-libertadores] </li>
                    <li> CONMEBOL - Libertadores: [livescore path=/football/tournaments/south-america/copa-libertadores] </li>
                    <li> CONMEBOL - Copa America: [livescore path=/football/tournaments/south-america/copa-america] </li>
                    <li> CONMEBOL - Recopa Sudamericana: [livescore path=/football/tournaments/south-america/recopa-sudamericana] </li>
                    <li> Croatia - League 1: [livescore path=/football/tournaments/croatia/1-hnl] </li>
                    <li> Croatia - League 2: [livescore path=/football/tournaments/croatia/2-hnl] </li>
                    <li> Croatia - CUP: [livescore path=/football/tournaments/croatia/croatian-cup] </li>
                    <li> Cyprus - CUP: [livescore path=/football/tournaments/cyprus/cyprus-cup] </li>
                    <li> Cyprus - League 2: [livescore path=/football/tournaments/cyprus/2nd-division-1] </li>
                    <li> Cyprus - League 1: [livescore path=/football/tournaments/cyprus/1st-division-2] </li>
                    <li> Czech Rep. - League 1: [livescore path=/football/tournaments/czech-republic/1-liga] </li>
                    <li> Czech Rep. - League 2: [livescore path=/football/tournaments/czech-republic/fnl] </li>
                    <li> Czech Rep. - CUP: [livescore path=/football/tournaments/czech-republic/cup] </li>
                    <li> Denmark - Superliga: [livescore path=/football/tournaments/denmark/superligaen] </li>
                    <li> Denmark - 1st Division: [livescore path=/football/tournaments/denmark/1st-division-1] </li>
                    <li> Denmark - League 3: [livescore path=/football/tournaments/denmark/denmark-championship-3rd-division] </li>
                    <li> Denmark - CUP: [livescore path=/football/tournaments/denmark/dbu-pokalen] </li>
                    <li> Ecuador - League 1: [livescore path=/football/tournaments/ecuador/serie-a-1] </li>
                    <li> Ecuador - League 2: [livescore path=/football/tournaments/ecuador/serie-b-1] </li>
                    <li> Ecuador - Cup: [livescore path=/football/tournaments/ecuador/copa-ecuador] </li>
                    <li> Egypt - League 1: [livescore path=/football/tournaments/egypt/premier-league-12] </li>
                    <li> Egypt - League 2: [livescore path=/football/tournaments/egypt/egypt-second-division] </li>
                    <li> Egypt - League Cup: [livescore path=/football/tournaments/egypt/egypt-league-cup] </li>
                    <li> El Salvador - League 1: [livescore path=/football/tournaments/el-salvador/primera-division-apertura-1] </li>
                    <li> England - Premier League: [livescore path=/football/tournaments/england/premier-league] </li>
                    <li> England - League 1: [livescore path=/football/tournaments/england/league-one] </li>
                    <li> England - Championship: [livescore path=/football/tournaments/england/championship] </li>
                    <li> England - FA Community Shield: [livescore path=/football/tournaments/england/community-shield] </li>
                    <li> England - League Cup: [livescore path=/football/tournaments/england/efl-cup] </li>
                    <li> England - League 2: [livescore path=/football/tournaments/england/league-two] </li>
                    <li> England - FA CUP: [livescore path=/football/tournaments/england/fa-cup] </li>
                    <li> Estonia - League 1: [livescore path=/football/tournaments/estonia/premium-liiga] </li>
                    <li> Estonia - Cup: [livescore path=/football/tournaments/estonia/cup-3] </li>
                    <li> Estonia - League 2: [livescore path=/football/tournaments/estonia/esiliiga] </li>
                    <li> FIFA - World Cup Qualification - Europe: [livescore path=/football/tournaments/europe/wc-qualification-uefa] </li>
                    <li> FIFA - World Cup Qualification - Central America: [livescore path=/football/tournaments/north-central-america/wc-qual-concacaf] </li>
                    <li> FIFA - World Cup Qualification - South America: [livescore path=/football/tournaments/south-america/wc-qual-conmebol] </li>
                    <li> FIFA - World Cup Qualification - Oceania: [livescore path=/football/tournaments/australia-oceania/wc-qualification-ofc] </li>
                    <li> FIFA - Confederations Cup: [livescore path=/football/tournaments/world/confederations-cup] </li>
                    <li> FIFA - Under 20: [livescore path=/football/tournaments/world/u20-world-cup] </li>
                    <li> FIFA - World Cup Qualification - Africa: [livescore path=/football/tournaments/africa/wc-qualification-caf] </li>
                    <li> FIFA - Women's World Cup: [livescore path=/football/tournaments/world/world-cup-women] </li>
                    <li> FIFA - World Cup Qualification - Asia: [livescore path=/football/tournaments/asia/wc-qualification-afc] </li>
                    <li> FIFA - World Cup: [livescore path=/football/tournaments/world/world-cup] </li>
                    <li> Finland - CUP: [livescore path=/football/tournaments/finland/suomen-cup] </li>
                    <li> Finland - League Cup: [livescore path=/football/tournaments/finland/liigacup] </li>
                    <li> Finland - Veikkausliiga: [livescore path=/football/tournaments/finland/veikkausliiga] </li>
                    <li> France - Ligue 1: [livescore path=/football/tournaments/france/ligue-1] </li>
                    <li> France - Ligue 2: [livescore path=/football/tournaments/france/ligue-2] </li>
                    <li> France - Super CUP: [livescore path=/football/tournaments/france/coupe-de-france] </li>
                    <li> France - Ligue Cup: [livescore path=/football/tournaments/france/coupe-de-la-ligue] </li>
                    <li> Georgia - League 1: [livescore path=/football/tournaments/georgia/national-league-1] </li>
                    <li> Georgia - Pirveli Liga: [livescore path=/football/tournaments/georgia/national-league-2] </li>
                    <li> Georgia - Super Cup: [livescore path=/football/tournaments/georgia/super-cup-15] </li>
                    <li> Georgia - Cup: [livescore path=/football/tournaments/georgia/cup-2] </li>
                    <li> Germany - Bundesliga: [livescore path=/football/tournaments/germany/bundesliga-1] </li>
                    <li> Germany - CUP: [livescore path=/football/tournaments/germany/dfb-pokal] </li>
                    <li> Germany - Bundesliga II: [livescore path=/football/tournaments/germany/2nd-bundesliga] </li>
                    <li> Germany - Super Cup: [livescore path=/football/tournaments/germany/super-cup-25] </li>
                    <li> Greece - League 2: [livescore path=/football/tournaments/greece/football-league] </li>
                    <li> Greece - Super League: [livescore path=/football/tournaments/greece/super-league] </li>
                    <li> Greece - CUP: [livescore path=/football/tournaments/greece/greece-cup-6] </li>
                    <li> Holland - Super CUP: [livescore path=/football/tournaments/netherlands/johan-cruijff-schaal] </li>
                    <li> Holland - League 2: [livescore path=/football/tournaments/netherlands/eerste-divisie] </li>
                    <li> Holland - Eredivisie: [livescore path=/football/tournaments/netherlands/eredivisie] </li>
                    <li> Holland - Amstel CUP: [livescore path=/football/tournaments/netherlands/knvb-beker] </li>
                    <li> Hungary - CUP: [livescore path=/football/tournaments/hungary/magyar-kupa] </li>
                    <li> Hungary - Nemzeti Bajnokság I: [livescore path=/football/tournaments/hungary/nb-i] </li>
                    <li> Hungary - Nemzeti Bajnokság II: [livescore path=/football/tournaments/hungary/nb-ii] </li>
                    <li> Iceland - Premier League: [livescore path=/football/tournaments/iceland/urvalsdeild] </li>
                    <li> Iceland - League 2: [livescore path=/football/tournaments/iceland/2-deild] </li>
                    <li> Iceland - Super Cup: [livescore path=/football/tournaments/iceland/super-cup-18] </li>
                    <li> Iceland - League 1: [livescore path=/football/tournaments/iceland/1st-deild-1] </li>
                    <li> Iceland - CUP: [livescore path=/football/tournaments/iceland/cup-1] </li>
                    <li> Indonesia - Liga 1: [livescore path=/football/tournaments/indonesia/liga-1] </li>
                    <li> Iran - Azadegan League: [livescore path=/football/tournaments/iran/azadegan-league] </li>
                    <li> Iran - Premier League: [livescore path=/football/tournaments/iran/pro-league] </li>
                    <li> Iran - Cup: [livescore path=/football/tournaments/iran/hazfi-cup] </li>
                    <li> Ireland - First Division: [livescore path=/football/tournaments/ireland/first-division] </li>
                    <li> Ireland - League Cup: [livescore path=/football/tournaments/ireland/league-cup] </li>
                    <li> Ireland - Super Cup: [livescore path=/football/tournaments/ireland/fai-presidents-cup] </li>
                    <li> Ireland - FAI CUP: [livescore path=/football/tournaments/ireland/fai-cup] </li>
                    <li> Ireland - Premier Division: [livescore path=/football/tournaments/ireland/premier-division] </li>
                    <li> Israel - League 1: [livescore path=/football/tournaments/israel/premier-league-4] </li>
                    <li> Israel - CUP: [livescore path=/football/tournaments/israel/israel-cup] </li>
                    <li> Italy - Serie A: [livescore path=/football/tournaments/italy/serie-a] </li>
                    <li> Italy - TIM Cup: [livescore path=/football/tournaments/italy/coppa-italia] </li>
                    <li> Italy - Super CUP: [livescore path=/football/tournaments/italy/super-cup-1] </li>
                    <li> Japan - J-League 3: [livescore path=/football/tournaments/japan/j-league-3-4] </li>
                    <li> Japan - Super Cup: [livescore path=/football/tournaments/japan/super-cup-5] </li>
                    <li> Japan - Emperor Cup: [livescore path=/football/tournaments/japan/emperor-cup] </li>
                    <li> Japan - J-League: [livescore path=/football/tournaments/japan/j-league-3] </li>
                    <li> Japan - J-League2: [livescore path=/football/tournaments/japan/j-league-2] </li>
                    <li> Kenya - Premier League (KPL): [livescore path=/football/tournaments/kenya/premier-league-17] </li>
                    <li> Korea Rep. - FA Cup: [livescore path=/football/tournaments/republic-of-korea/fa-cup-1] </li>
                    <li> Korea Rep. - League 2: [livescore path=/football/tournaments/republic-of-korea/k-league-2] </li>
                    <li> Korea Rep. - League 1: [livescore path=/football/tournaments/republic-of-korea/k-league-1] </li>
                    <li> Korea Rep. - League 3: [livescore path=/football/tournaments/republic-of-korea/national-league-4] </li>
                    <li> Latvia - CUP: [livescore path=/football/tournaments/latvia/latvia-cup] </li>
                    <li> Latvia - League 1: [livescore path=/football/tournaments/latvia/virsliga] </li>
                    <li> Latvia - League 2: [livescore path=/football/tournaments/latvia/1-liga-1] </li>
                    <li> Lithuania - 1 Lyga: [livescore path=/football/tournaments/lithuania/1-lyga] </li>
                    <li> Lithuania - The A League: [livescore path=/football/tournaments/lithuania/a-lyga] </li>
                    <li> Lithuania - Super Cup: [livescore path=/football/tournaments/lithuania/super-cup-31] </li>
                    <li> Macedonia - CUP: [livescore path=/football/tournaments/north-macedonia/macedonia-cup] </li>
                    <li> Macedonia - Super Cup: [livescore path=/football/tournaments/north-macedonia/super-cup-24] </li>
                    <li> Macedonia - First League: [livescore path=/football/tournaments/north-macedonia/1-mfl] </li>
                    <li> Malta - League 1: [livescore path=/football/tournaments/malta/premier-league-7] </li>
                    <li> Malta - League 2: [livescore path=/football/tournaments/malta/first-division-1] </li>
                    <li> Mexico - League 1: [livescore path=/football/tournaments/mexico/primera-division-apertura-3] </li>
                    <li> Mexico - League 2: [livescore path=/football/tournaments/mexico/liga-de-ascenso-apertura] </li>
                    <li> Morocco - League 1: [livescore path=/football/tournaments/morocco/botola] </li>
                    <li> Morocco - League 2: [livescore path=/football/tournaments/morocco/botola-2] </li>
                    <li> Morocco - Cup: [livescore path=/football/tournaments/morocco/morocco-cup] </li>
                    <li> N. Ireland - League 1: [livescore path=/football/tournaments/northern-ireland/jjb-sports-premiership] </li>
                    <li> N. Ireland - IFA Championship: [livescore path=/football/tournaments/northern-ireland/ifa-championship] </li>
                    <li> N. Ireland - Cup: [livescore path=/football/tournaments/northern-ireland/irish-cup] </li>
                    <li> Nigeria - League 1: [livescore path=/football/tournaments/nigeria/premier-league-22] </li>
                    <li> North & Central America - Champions League: [livescore path=/football/tournaments/north-central-america/concacaf-cl] </li>
                    <li> North & Central America - Gold Cup: [livescore path=/football/tournaments/north-central-america/gold-cup] </li>
                    <li> North & Central America - Nations League: [livescore path=/football/tournaments/north-central-america/concacaf-nations-league-a] </li>
                    <li> North & Central America - Leagues Cup: [livescore path=/football/tournaments/north-central-america/leagues-cup] </li>
                    <li> Norway - League 2 - D: [livescore path=/football/tournaments/norway/2nd-division-group-4] </li>
                    <li> Norway - Tippeligaen: [livescore path=/football/tournaments/norway/eliteserien] </li>
                    <li> Norway - League 1: [livescore path=/football/tournaments/norway/1st-division] </li>
                    <li> Norway - League 3 - D: [livescore path=/football/tournaments/norway/3rd-division-group-4] </li>
                    <li> Norway - League 2 - C: [livescore path=/football/tournaments/norway/2nd-division-group-3] </li>
                    <li> Norway - NM CUP: [livescore path=/football/tournaments/norway/nm-cup] </li>
                    <li> Norway - League 2 - A: [livescore path=/football/tournaments/norway/2nd-division-group-1] </li>
                    <li> Norway - League 3 - A: [livescore path=/football/tournaments/norway/3rd-division-group-1] </li>
                    <li> Norway - League 2 - B: [livescore path=/football/tournaments/norway/2nd-division-group-2] </li>
                    <li> Norway - League 3 - C: [livescore path=/football/tournaments/norway/3rd-division-group-3] </li>
                    <li> Norway - League 3 - B: [livescore path=/football/tournaments/norway/3rd-division-group-2] </li>
                    <li> Paraguay - League 2: [livescore path=/football/tournaments/paraguay/segunda-division] </li>
                    <li> Paraguay - League 1: [livescore path=/football/tournaments/paraguay/primera-division-clausura-1] </li>
                    <li> Paraguay - Cup: [livescore path=/football/tournaments/paraguay/copa-paraguay] </li>
                    <li> Peru - League 2: [livescore path=/football/tournaments/peru/segunda-division-2] </li>
                    <li> Peru - Cup: [livescore path=/football/tournaments/peru/peru-cup] </li>
                    <li> Peru - League 1: [livescore path=/football/tournaments/peru/primera-division-4] </li>
                    <li> Poland - League 2: [livescore path=/football/tournaments/poland/i-liga] </li>
                    <li> Poland - League 3: [livescore path=/football/tournaments/poland/ii-liga] </li>
                    <li> Poland - League 1: [livescore path=/football/tournaments/poland/ekstraklasa] </li>
                    <li> Poland - CUP: [livescore path=/football/tournaments/poland/puchar-polski] </li>
                    <li> Portugal - Primeira Liga: [livescore path=/football/tournaments/portugal/primeira-liga] </li>
                    <li> Portugal - League CUP: [livescore path=/football/tournaments/portugal/league-cup-3] </li>
                    <li> Portugal - CUP: [livescore path=/football/tournaments/portugal/taca-de-portugal] </li>
                    <li> Portugal - Super CUP: [livescore path=/football/tournaments/portugal/super-cup-2] </li>
                    <li> Portugal - League 2: [livescore path=/football/tournaments/portugal/segunda-liga] </li>
                    <li> Qatar - Stars Cup: [livescore path=/football/tournaments/qatar/stars-cup] </li>
                    <li> Qatar - League 1: [livescore path=/football/tournaments/qatar/stars-league] </li>
                    <li> Romania - Liga 1: [livescore path=/football/tournaments/romania/liga-i] </li>
                    <li> Romania - Liga 2: [livescore path=/football/tournaments/romania/liga-2] </li>
                    <li> Romania - Liga 3: [livescore path=/football/tournaments/romania/romania-liga-3] </li>
                    <li> Romania - Cup: [livescore path=/football/tournaments/romania/romania-cup] </li>
                    <li> Romania - Super Cup: [livescore path=/football/tournaments/romania/super-cup-12] </li>
                    <li> Russia - League 2: [livescore path=/football/tournaments/russia/football-national-league] </li>
                    <li> Russia - League 1: [livescore path=/football/tournaments/russia/premier-league-5] </li>
                    <li> Russia - CUP: [livescore path=/football/tournaments/russia/russian-cup] </li>
                    <li> Russia - Super Cup: [livescore path=/football/tournaments/russia/super-cup-4] </li>
                    <li> Saudi Arabia - Pro League: [livescore path=/football/tournaments/saudi-arabia/saudi-prof-league] </li>
                    <li> Scotland - Premier League: [livescore path=/football/tournaments/scotland/premiership] </li>
                    <li> Scotland - League 2: [livescore path=/football/tournaments/scotland/league-two-1] </li>
                    <li> Scotland - Championship: [livescore path=/football/tournaments/scotland/championship-1] </li>
                    <li> Scotland - FA CUP: [livescore path=/football/tournaments/scotland/scottish-cup] </li>
                    <li> Scotland - Challenge Cup: [livescore path=/football/tournaments/scotland/challenge-cup] </li>
                    <li> Scotland - League Cup: [livescore path=/football/tournaments/scotland/league-cup-1] </li>
                    <li> Scotland - League 1: [livescore path=/football/tournaments/scotland/league-one-1] </li>
                    <li> Serbia - Prva Liga: [livescore path=/football/tournaments/serbia/prva-liga] </li>
                    <li> Serbia - SuperLiga: [livescore path=/football/tournaments/serbia/superliga-1] </li>
                    <li> Serbia - CUP: [livescore path=/football/tournaments/serbia/serbia-cup] </li>
                    <li> Slovakia - League 2: [livescore path=/football/tournaments/slovakia/2-liga] </li>
                    <li> Slovakia - League 1: [livescore path=/football/tournaments/slovakia/superliga-2] </li>
                    <li> Slovakia - CUP: [livescore path=/football/tournaments/slovakia/slovensky-pohar] </li>
                    <li> Slovenia - CUP: [livescore path=/football/tournaments/slovenia/slovenia-cup] </li>
                    <li> Slovenia - League 1: [livescore path=/football/tournaments/slovenia/prvaliga] </li>
                    <li> Slovenia - League 2: [livescore path=/football/tournaments/slovenia/2nd-liga] </li>
                    <li> South Africa - Premier Division: [livescore path=/football/tournaments/south-africa/premier-soccer-league] </li>
                    <li> Spain - La Liga: [livescore path=/football/tournaments/spain/laliga] </li>
                    <li> Spain - Federation Cup: [livescore path=/football/tournaments/spain/copa-federacion] </li>
                    <li> Spain - CUP: [livescore path=/football/tournaments/spain/copa-del-rey] </li>
                    <li> Spain - Super CUP: [livescore path=/football/tournaments/spain/super-cup] </li>
                    <li> Sweden - CUP: [livescore path=/football/tournaments/sweden/svenska-cup] </li>
                    <li> Sweden - Allsvenskan: [livescore path=/football/tournaments/sweden/allsvenskan] </li>
                    <li> Sweden - Division 1 Norra: [livescore path=/football/tournaments/sweden/div-1-norra] </li>
                    <li> Sweden - Superettan: [livescore path=/football/tournaments/sweden/superettan] </li>
                    <li> Sweden - Division 1 Södra: [livescore path=/football/tournaments/sweden/div-1-sodra] </li>
                    <li> Switzerland - League 2: [livescore path=/football/tournaments/switzerland/challenge-league] </li>
                    <li> Switzerland - CUP: [livescore path=/football/tournaments/switzerland/schweizer-cup] </li>
                    <li> Switzerland - Premier League: [livescore path=/football/tournaments/switzerland/super-league-1] </li>
                    <li> Switzerland - Promotion League: [livescore path=/football/tournaments/switzerland/promotion-league] </li>
                    <li> Syria - Cup: [livescore path=/football/tournaments/syrian-arab-republic/syrian-cup] </li>
                    <li> Syria - League 1: [livescore path=/football/tournaments/syrian-arab-republic/premier-league-3523] </li>
                    <li> Tunisia - League 1: [livescore path=/football/tournaments/tunisia/ligue-1-3] </li>
                    <li> Tunisia - Cup: [livescore path=/football/tournaments/tunisia/tunisian-cup] </li>
                    <li> Tunisia - League 2: [livescore path=/football/tournaments/tunisia/ligue-2-4] </li>
                    <li> Turkey - Cappadocia Cup: [livescore path=/football/tournaments/turkey/cappadocia-cup] </li>
                    <li> Turkey - Second League Red: [livescore path=/football/tournaments/turkey/1-lig] </li>
                    <li> Turkey - CUP: [livescore path=/football/tournaments/turkey/turkiye-kupasi] </li>
                    <li> Turkey - Super League: [livescore path=/football/tournaments/turkey/super-lig] </li>
                    <li> UEFA - Europa Conference League: [livescore path=/football/tournaments/europe/uefa-europa-conference-league] </li>
                    <li> UEFA - Women Under 17: [livescore path=/football/tournaments/europe/u17-euro-ch-ship-w] </li>
                    <li> UEFA - Euro: [livescore path=/football/tournaments/europe/european-championship] </li>
                    <li> UEFA - Under 19: [livescore path=/football/tournaments/europe/u19-european-ch-ship] </li>
                    <li> UEFA - Youth League: [livescore path=/football/tournaments/europe/uefa-youth-league-1] </li>
                    <li> UEFA - Super CUP: [livescore path=/football/tournaments/europe/uefa-super-cup] </li>
                    <li> UEFA - U21 Championship: [livescore path=/football/tournaments/europe/u21-european-ch-ship] </li>
                    <li> UEFA - Under 21 Qualification: [livescore path=/football/tournaments/europe/u21-euro-qualification] </li>
                    <li> UEFA - Nations League: [livescore path=/football/tournaments/europe/uefa-nations-league] </li>
                    <li> UEFA - Under 17: [livescore path=/football/tournaments/europe/u17-european-ch-ship] </li>
                    <li> UEFA - Nations League: [livescore path=/football/tournaments/europe/uefa-nations-league] </li>
                    <li> UEFA - Champions League: [livescore path=/football/tournaments/europe/uefa-champions-league] </li>
                    <li> UEFA - Europa League: [livescore path=/football/tournaments/europe/uefa-europa-league] </li>
                    <li> Uganda - Premier League: [livescore path=/football/tournaments/uganda/premier-league-27] </li>
                    <li> Ukraine - League 2: [livescore path=/football/tournaments/ukraine/persha-liga] </li>
                    <li> Ukraine - CUP: [livescore path=/football/tournaments/ukraine/ukraine-cup] </li>
                    <li> Ukraine - League 1: [livescore path=/football/tournaments/ukraine/premier-league-2] </li>
                    <li> Ukraine - Super Cup: [livescore path=/football/tournaments/ukraine/super-cup-11] </li>
                    <li> Uruguay - Cup: [livescore path=/football/tournaments/uruguay/copa-uruguay] </li>
                    <li> Uruguay - First Division: [livescore path=/football/tournaments/uruguay/primera-division-2] </li>
                    <li> Uruguay - Second Division: [livescore path=/football/tournaments/uruguay/segunda-division-1] </li>
                    <li> USA - CUP: [livescore path=/football/tournaments/usa/us-open-cup] </li>
                    <li> USA - USL Championship: [livescore path=/football/tournaments/usa/usl-championship] </li>
                    <li> USA - National Premier Soccer League: [livescore path=/football/tournaments/usa/national-premier-soccer-league] </li>
                    <li> USA - USL League Two: [livescore path=/football/tournaments/usa/usl-league-two] </li>
                    <li> USA - MLS: [livescore path=/football/tournaments/usa/major-league-soccer] </li>
                    <li> Venezuela - League 1: [livescore path=/football/tournaments/venezuela/primera-division-1] </li>
                    <li> Venezuela - League 2: [livescore path=/football/tournaments/venezuela/venezuela-segunda-division] </li>
                    <li> Wales - CUP: [livescore path=/football/tournaments/wales/faw-welsh-cup] </li>
                    <li> Wales - Premier Leagues: [livescore path=/football/tournaments/wales/premier-league-1] </li>
                    <li> World - Audi Cup: [livescore path=/football/tournaments/world/audi-cup] </li>
                    <li> World - Club Friendlies: [livescore path=/football/tournaments/world/club-friendly-games] </li>
                    <li> World - Olympics Men: [livescore path=/football/tournaments/world/olympic-games] </li>
                    <li> World - Champions Cup: [livescore path=/football/tournaments/world/int-champions-cup] </li>
                    <li> World - WAFF U23 Championship: [livescore path=/football/tournaments/asia/u23-waff-championship] </li>
                    <li> World - Friendly: [livescore path=/football/tournaments/world/int-friendly-games] </li>
                    <li> World - Emirates Cup: [livescore path=/football/tournaments/world/emirates-cup] </li>
                </ul>
			</div>
		</div>
	</div>
    <?php
    }

    /**
     * Function that will register admin page options.
     */
    public function registerPageOptions() {
        // Add Section for option fields
        add_settings_section('sportsteam_section', 'Settings', array($this, 'displaySection'), __FILE__);
        add_settings_field('sportsteam_your_word', '', array($this, 'textNumber'), __FILE__, 'sportsteam_section');
        add_settings_field('sportsteam_sportsteam_lang', 'Default language', array($this, 'langSettingsField'), __FILE__, 'sportsteam_section');
        add_settings_field('sportsteam_sportsteam_clink', 'Activation of shortcode', array($this, 'isLinkInsertSettingsField'), __FILE__, 'sportsteam_section');

        // Register Settings
        register_setting(__FILE__, 'sportsteam_settings_options', array($this, 'validateOptions'));
    }

    /**
     * Function that will validate all fields.
     */
    public function validateOptions($fields) {
        $valid_fields = array();
        // language
        $lang_is = trim($fields['sportsteam_lang']);
        $lang_is_ok = array('en'); //, 'pt', 'it'); //, 'de', 'nl', 'tr', 'fr', 'ro');

        if (!in_array($lang_is, $lang_is_ok)) {
            $lang_is = 'en';
        }

        $valid_fields['sportsteam_lang'] = strip_tags(stripslashes($lang_is));
        $valid_fields['sportsteam_your_word_num'] = rand(0, 9);

        //author link
        $c_link = trim($fields['sportsteam_is_link_insert']);
        $valid_fields['sportsteam_is_link_insert'] = strip_tags(stripslashes($c_link));

        return apply_filters('validateOptions', $valid_fields, $fields);
    }

    /**
     * Callback function for settings section
     */
    public function displaySection() { /* Leave blank */ }

    public function textNumber() {
        echo '<input type="hidden" name="sportsteam_settings_options[sportsteam_your_word_num]" value="" />';
    }

    public function isLinkInsertSettingsField() {
        $val = isset($this->options['sportsteam_is_link_insert']) ? $this->options['sportsteam_is_link_insert'] : 'off';

        $selected_one=array('on' => '', 'off' => '');
        $selected_one[$val] = 'selected="selected"';
        echo "
        <div>
            <select name='sportsteam_settings_options[sportsteam_is_link_insert]'>
                <option value='off' ". esc_html($selected_one['off']) .">Disabled</option>
                <option value='on' ". esc_html($selected_one['on']) .">Enabled</option>
            </select>
        </div>
        ";
    }

    public function langSettingsField() {
        $lang_is_ok = array('en'); //, 'pt', 'it'); //, 'de', 'nl', 'tr', 'fr', 'ro');
        $locale = substr(get_locale(),0,2);
        $val = isset($this->options['sportsteam_lang']) ? $this->options['sportsteam_lang'] : 'en';
        $selected_one = array(
            'en' => '',
            // 'pt' => '',
            // 'it' => '',
            // 'de' => '',
            // 'nl' => '',
            // 'tr' => '',
            // 'fr' => '',
            // 'ro' => ''
        );

        if (!$val) {
            $val = in_array($locale, $lang_is_ok) ? $locale : 'en';
        }

        $selected_one[$val] = 'selected="selected"';

        echo "
        <div><select name='sportsteam_settings_options[sportsteam_lang]'>
            <option value='en' ".esc_html($selected_one['en']).">English</option>
        </select></div>
        <div>
            <small>
                Other languages will be added soon.
            </small>
        </div>
        ";
                // <option value="pt" ".esc_html($selected_one['pt']).">Português</option>
                // <option value="it" ".esc_html($selected_one['it']).">İtaliano</option>
                // <option value="de" ".esc_html($selected_one['de']).">Deutsch</option>
                // <option value="nl" ".esc_html($selected_one['nl']).">Nederlands</option>
                // <option value="tr" ".esc_html($selected_one['tr']).">Türkçe</option>
                // <option value="fr" ".esc_html($selected_one['fr']).">Français</option>
                // <option value="ro" ".esc_html($selected_one['ro']).">Română</option>
    }
}
