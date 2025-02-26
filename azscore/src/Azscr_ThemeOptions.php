<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Azscr_ThemeOptions
{
    private $regular = '400';
    private $bold = '600';
    private static $instance = null;
    public $options;

    public static function get_instance() {

        if (null == self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;

    }

    private function __construct() {

        // Add the page to the admin menu
        add_action('admin_menu', array(&$this, 'add_page'));

        // Register page options
        add_action('admin_init', array(&$this, 'register_page_options'));

        // Register javascript
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_js'));

        // Get registered option
        $this->options = get_option('azscr_settings_options');

    }
    public function add_page() {
        add_options_page('Theme Options', 'AZScore', 'manage_options', __FILE__, array($this, 'display_page'));
    }

    public function display_page() {
    ?>
    <div class="wrap">

        <h2>AZScore Theme Options</h2>
        <form method="post" action="options.php">
        <?php
            submit_button();
            settings_fields(__FILE__);
            do_settings_sections(__FILE__);
            submit_button();
        ?>
        </form>
    <h2>Notes</h2>
    <ul>
        <li>How to use the plugin?
            <blockquote>
                * Employ the: [azscore] shortcode wherever you wish to showcase live scores<br/>
                * You have the option to configure additional attributes:<br/>
                <blockquote>
                    * For the period: today, live, tomorrow, yesterday. For example [azscore period="live"]<br/>
                    * For different leagues. For example [azscore league-is="Premier League" country-is="England"]<br/>
                    * You can't use the 'period' attribute together with the 'league-is'/'country-is' attributes<br/>
                    * The full list of leagues and countries is provided below in the "List of tournaments and categories"<br/>
                </blockquote>
            </blockquote>
        </li>
        <li>When you select "Author Credit Link" as "Off," it implies:
            <blockquote>
                * You won't be providing a link back to the author's website<br/>
                * Color and font customizations will adhere to default settings<br/>
                * AZScore will operate within an iframe sized at 100% x 5000px<br/>
            </blockquote>
        </li>
        <li>When you choose "Author Credit Link" as "On," it signifies:
            <blockquote>
                * You will include a link back to the author's website<br/>
                * Color and font customizations will reflect your preferences<br/>
                * AZScore will function without the use of an iframe<br/>
            </blockquote>
        </li>
    </ul>
    <h3>List of tournaments and categories</h3>
    <ul style="padding-left: 10px; list-style: inside;">
        <li>AFC - Champions League: [azscore league-is="Champions League" country-is="AFC"]</li>
        <li>AFC - Nations Cup: [azscore league-is="Nations Cup" country-is="AFC"]</li>
        <li>AFC - Cup: [azscore league-is="Cup" country-is="AFC"]</li>
        <li>AFC - Arabian Champions League: [azscore league-is="Arabian Champions League" country-is="AFC"]</li>
        <li>AFC - Asian Cup: [azscore league-is="Asian Cup" country-is="AFC"]</li>
        <li>AFC - South Asian Championship: [azscore league-is="South Asian Championship" country-is="AFC"]</li>
        <li>Albania - Cup: [azscore league-is="Cup" country-is="Albania"]</li>
        <li>Albania - League 1: [azscore league-is="League 1" country-is="Albania"]</li>
        <li>Albania - Super Cup: [azscore league-is="Super Cup" country-is="Albania"]</li>
        <li>Albania - League 2: [azscore league-is="League 2" country-is="Albania"]</li>
        <li>Algeria - League 1: [azscore league-is="League 1" country-is="Algeria"]</li>
        <li>Algeria - CUP: [azscore league-is="CUP" country-is="Algeria"]</li>
        <li>Algeria - League 2: [azscore league-is="League 2" country-is="Algeria"]</li>
        <li>Argentina - CUP: [azscore league-is="CUP" country-is="Argentina"]</li>
        <li>Argentina - League 1: [azscore league-is="League 1" country-is="Argentina"]</li>
        <li>Argentina - Verano Cup: [azscore league-is="Verano Cup" country-is="Argentina"]</li>
        <li>Argentina - League 2: [azscore league-is="League 2" country-is="Argentina"]</li>
        <li>Argentina - Copa de la Superliga: [azscore league-is="Copa de la Superliga" country-is="Argentina"]</li>
        <li>Armenia - League 1: [azscore league-is="League 1" country-is="Armenia"]</li>
        <li>Armenia - Cup: [azscore league-is="Cup" country-is="Armenia"]</li>
        <li>Armenia - League 2: [azscore league-is="League 2" country-is="Armenia"]</li>
        <li>Australia - League 1: [azscore league-is="League 1" country-is="Australia"]</li>
        <li>Australia - FFA Cup Qualifiers: [azscore league-is="FFA Cup Qualifiers" country-is="Australia"]</li>
        <li>Australia - Brisbane Capital League 1: [azscore league-is="Brisbane Capital League 1" country-is="Australia"]</li>
        <li>Australia - Brisbane Premier League: [azscore league-is="Brisbane Premier League" country-is="Australia"]</li>
        <li>Austria - CUP: [azscore league-is="CUP" country-is="Austria"]</li>
        <li>Austria - League 2: [azscore league-is="League 2" country-is="Austria"]</li>
        <li>Austria - Bundesliga: [azscore league-is="Bundesliga" country-is="Austria"]</li>
        <li>Azerbaijan - Premier League: [azscore league-is="Premier League" country-is="Azerbaijan"]</li>
        <li>Azerbaijan - CUP: [azscore league-is="CUP" country-is="Azerbaijan"]</li>
        <li>Azerbaijan - First League: [azscore league-is="First League" country-is="Azerbaijan"]</li>
        <li>Belarus - Premier League: [azscore league-is="Premier League" country-is="Belarus"]</li>
        <li>Belarus - Cup: [azscore league-is="Cup" country-is="Belarus"]</li>
        <li>Belarus - First League: [azscore league-is="First League" country-is="Belarus"]</li>
        <li>Belarus - Premier League: [azscore league-is="Premier League" country-is="Belarus"]</li>
        <li>Belarus - Premier League: [azscore league-is="Premier League" country-is="Belarus"]</li>
        <li>Belgium - Jupiler: [azscore league-is="Jupiler" country-is="Belgium"]</li>
        <li>Belgium - League 2: [azscore league-is="League 2" country-is="Belgium"]</li>
        <li>Belgium - Super CUP: [azscore league-is="Super CUP" country-is="Belgium"]</li>
        <li>Belgium - CUP: [azscore league-is="CUP" country-is="Belgium"]</li>
        <li>Bolivia - League 1: [azscore league-is="League 1" country-is="Bolivia"]</li>
        <li>Bosnia Herzegovina - Premier League: [azscore league-is="Premier League" country-is="Bosnia Herzegovina"]</li>
        <li>Bosnia Herzegovina - Cup: [azscore league-is="Cup" country-is="Bosnia Herzegovina"]</li>
        <li>Brazil - Brasileirao Serie B: [azscore league-is="Brasileirao Serie B" country-is="Brazil"]</li>
        <li>Brazil - Pernambucano: [azscore league-is="Pernambucano" country-is="Brazil"]</li>
        <li>Brazil - CUP: [azscore league-is="CUP" country-is="Brazil"]</li>
        <li>Brazil - Potiguar: [azscore league-is="Potiguar" country-is="Brazil"]</li>
        <li>Brazil - Verde Cup: [azscore league-is="Verde Cup" country-is="Brazil"]</li>
        <li>Brazil - Piauiense 1: [azscore league-is="Piauiense 1" country-is="Brazil"]</li>
        <li>Brazil - Roraimense: [azscore league-is="Roraimense" country-is="Brazil"]</li>
        <li>Brazil - Tocantinense: [azscore league-is="Tocantinense" country-is="Brazil"]</li>
        <li>Brazil - Campeonato Paulista: [azscore league-is="Campeonato Paulista" country-is="Brazil"]</li>
        <li>Brazil - Brasileiro Serie C: [azscore league-is="Brasileiro Serie C" country-is="Brazil"]</li>
        <li>Brazil - Campeonato Carioca: [azscore league-is="Campeonato Carioca" country-is="Brazil"]</li>
        <li>Brazil - Catarinense 1: [azscore league-is="Catarinense 1" country-is="Brazil"]</li>
        <li>Brazil - Brasileirao Serie D: [azscore league-is="Brasileirao Serie D" country-is="Brazil"]</li>
        <li>Brazil - Gaucho 1: [azscore league-is="Gaucho 1" country-is="Brazil"]</li>
        <li>Brazil - Capixaba: [azscore league-is="Capixaba" country-is="Brazil"]</li>
        <li>Brazil - Copa do Nordeste: [azscore league-is="Copa do Nordeste" country-is="Brazil"]</li>
        <li>Brazil - Brasileirao Serie A: [azscore league-is="Brasileirao Serie A" country-is="Brazil"]</li>
        <li>Bulgaria - CUP: [azscore league-is="CUP" country-is="Bulgaria"]</li>
        <li>Bulgaria - League 1: [azscore league-is="League 1" country-is="Bulgaria"]</li>
        <li>CAF - African Nations Championship: [azscore league-is="African Nations Championship" country-is="CAF"]</li>
        <li>CAF - African Nations Championship Qualification: [azscore league-is="African Nations Championship Qualification" country-is="CAF"]</li>
        <li>CAF - Champions League: [azscore league-is="Champions League" country-is="CAF"]</li>
        <li>CAF - Confederation Cup: [azscore league-is="Confederation Cup" country-is="CAF"]</li>
        <li>CAF - COSAFA Cup: [azscore league-is="COSAFA Cup" country-is="CAF"]</li>
        <li>Cameroon - League 1: [azscore league-is="League 1" country-is="Cameroon"]</li>
        <li>Chile - Segunda Division: [azscore league-is="Segunda Division" country-is="Chile"]</li>
        <li>Chile - Primera A: [azscore league-is="Primera A" country-is="Chile"]</li>
        <li>Chile - Primera B: [azscore league-is="Primera B" country-is="Chile"]</li>
        <li>Chile - Cup: [azscore league-is="Cup" country-is="Chile"]</li>
        <li>China - League 2: [azscore league-is="League 2" country-is="China"]</li>
        <li>China - Super League: [azscore league-is="Super League" country-is="China"]</li>
        <li>China - First League: [azscore league-is="First League" country-is="China"]</li>
        <li>China - FA Cup: [azscore league-is="FA Cup" country-is="China"]</li>
        <li>Colombia - Cup: [azscore league-is="Cup" country-is="Colombia"]</li>
        <li>Colombia - Super Cup: [azscore league-is="Super Cup" country-is="Colombia"]</li>
        <li>Colombia - Primera B: [azscore league-is="Primera B" country-is="Colombia"]</li>
        <li>Colombia - Primera A: [azscore league-is="Primera A" country-is="Colombia"]</li>
        <li>CONMEBOL - Copa Sudamericana: [azscore league-is="Copa Sudamericana" country-is="CONMEBOL"]</li>
        <li>CONMEBOL - Copa Libertadores U20: [azscore league-is="Copa Libertadores U20" country-is="CONMEBOL"]</li>
        <li>CONMEBOL - Libertadores: [azscore league-is="Libertadores" country-is="CONMEBOL"]</li>
        <li>CONMEBOL - Copa America: [azscore league-is="Copa America" country-is="CONMEBOL"]</li>
        <li>CONMEBOL - Recopa Sudamericana: [azscore league-is="Recopa Sudamericana" country-is="CONMEBOL"]</li>
        <li>Croatia - League 1: [azscore league-is="League 1" country-is="Croatia"]</li>
        <li>Croatia - League 2: [azscore league-is="League 2" country-is="Croatia"]</li>
        <li>Croatia - CUP: [azscore league-is="CUP" country-is="Croatia"]</li>
        <li>Cyprus - CUP: [azscore league-is="CUP" country-is="Cyprus"]</li>
        <li>Cyprus - League 2: [azscore league-is="League 2" country-is="Cyprus"]</li>
        <li>Cyprus - League 1: [azscore league-is="League 1" country-is="Cyprus"]</li>
        <li>Czech Rep. - League 1: [azscore league-is="League 1" country-is="Czech Rep."]</li>
        <li>Czech Rep. - League 2: [azscore league-is="League 2" country-is="Czech Rep."]</li>
        <li>Czech Rep. - CUP: [azscore league-is="CUP" country-is="Czech Rep."]</li>
        <li>Denmark - Superliga: [azscore league-is="Superliga" country-is="Denmark"]</li>
        <li>Denmark - League 2 - West: [azscore league-is="League 2 - West" country-is="Denmark"]</li>
        <li>Denmark - 1st Division: [azscore league-is="1st Division" country-is="Denmark"]</li>
        <li>Denmark - League 3: [azscore league-is="League 3" country-is="Denmark"]</li>
        <li>Denmark - League 4: [azscore league-is="League 4" country-is="Denmark"]</li>
        <li>Denmark - CUP: [azscore league-is="CUP" country-is="Denmark"]</li>
        <li>Denmark - League 2 - East: [azscore league-is="League 2 - East" country-is="Denmark"]</li>
        <li>Ecuador - League 1: [azscore league-is="League 1" country-is="Ecuador"]</li>
        <li>Ecuador - League 2: [azscore league-is="League 2" country-is="Ecuador"]</li>
        <li>Ecuador - Cup: [azscore league-is="Cup" country-is="Ecuador"]</li>
        <li>Egypt - League 1: [azscore league-is="League 1" country-is="Egypt"]</li>
        <li>Egypt - League 2: [azscore league-is="League 2" country-is="Egypt"]</li>
        <li>Egypt - League Cup: [azscore league-is="League Cup" country-is="Egypt"]</li>
        <li>El Salvador - League 1: [azscore league-is="League 1" country-is="El Salvador"]</li>
        <li>England - Premier League: [azscore league-is="Premier League" country-is="England"]</li>
        <li>England - Under 21: [azscore league-is="Under 21" country-is="England"]</li>
        <li>England - League 1: [azscore league-is="League 1" country-is="England"]</li>
        <li>England - Northern Division 1: [azscore league-is="Northern Division 1" country-is="England"]</li>
        <li>England - National League South: [azscore league-is="National League South" country-is="England"]</li>
        <li>England - National League North: [azscore league-is="National League North" country-is="England"]</li>
        <li>England - Championship: [azscore league-is="Championship" country-is="England"]</li>
        <li>England - Isthmian League: [azscore league-is="Isthmian League" country-is="England"]</li>
        <li>England - Northern Premier League: [azscore league-is="Northern Premier League" country-is="England"]</li>
        <li>England - Football League Trophy: [azscore league-is="Football League Trophy" country-is="England"]</li>
        <li>England - FA Community Shield: [azscore league-is="FA Community Shield" country-is="England"]</li>
        <li>England - League Cup: [azscore league-is="League Cup" country-is="England"]</li>
        <li>England - Southern Division 1: [azscore league-is="Southern Division 1" country-is="England"]</li>
        <li>England - Conference: [azscore league-is="Conference" country-is="England"]</li>
        <li>England - FA Thropy: [azscore league-is="FA Thropy" country-is="England"]</li>
        <li>England - League 2: [azscore league-is="League 2" country-is="England"]</li>
        <li>England - FA CUP: [azscore league-is="FA CUP" country-is="England"]</li>
        <li>England - Southern Premier League: [azscore league-is="Southern Premier League" country-is="England"]</li>
        <li>England - Southern League Central Division: [azscore league-is="Southern League Central Division" country-is="England"]</li>
        <li>Estonia - League 1: [azscore league-is="League 1" country-is="Estonia"]</li>
        <li>Estonia - Cup: [azscore league-is="Cup" country-is="Estonia"]</li>
        <li>Estonia - League 2: [azscore league-is="League 2" country-is="Estonia"]</li>
        <li>FIFA - World Cup Qualification - Europe: [azscore league-is="World Cup Qualification - Europe" country-is="FIFA"]</li>
        <li>FIFA - World Cup Qualification - Central America: [azscore league-is="World Cup Qualification - Central America" country-is="FIFA"]</li>
        <li>FIFA - World Cup Qualification - South America: [azscore league-is="World Cup Qualification - South America" country-is="FIFA"]</li>
        <li>FIFA - World Cup Qualification - Oceania: [azscore league-is="World Cup Qualification - Oceania" country-is="FIFA"]</li>
        <li>FIFA - Confederations Cup: [azscore league-is="Confederations Cup" country-is="FIFA"]</li>
        <li>FIFA - Under 20: [azscore league-is="Under 20" country-is="FIFA"]</li>
        <li>FIFA - World Cup Qualification - Africa: [azscore league-is="World Cup Qualification - Africa" country-is="FIFA"]</li>
        <li>FIFA - Women's World Cup: [azscore league-is="Women's World Cup" country-is="FIFA"]</li>
        <li>FIFA - World Cup Qualification - Asia: [azscore league-is="World Cup Qualification - Asia" country-is="FIFA"]</li>
        <li>FIFA - World Cup: [azscore league-is="World Cup" country-is="FIFA"]</li>
        <li>Finland - League 3 - North: [azscore league-is="League 3 - North" country-is="Finland"]</li>
        <li>Finland - Kakkonen Group B: [azscore league-is="Kakkonen Group B" country-is="Finland"]</li>
        <li>Finland - CUP: [azscore league-is="CUP" country-is="Finland"]</li>
        <li>Finland - League 3 - West: [azscore league-is="League 3 - West" country-is="Finland"]</li>
        <li>Finland - League 3 - South: [azscore league-is="League 3 - South" country-is="Finland"]</li>
        <li>Finland - League Cup: [azscore league-is="League Cup" country-is="Finland"]</li>
        <li>Finland - League 3 - East: [azscore league-is="League 3 - East" country-is="Finland"]</li>
        <li>Finland - Kakkonen Group A: [azscore league-is="Kakkonen Group A" country-is="Finland"]</li>
        <li>Finland - Kakkonen Group C: [azscore league-is="Kakkonen Group C" country-is="Finland"]</li>
        <li>Finland - Ykkönen: [azscore league-is="Ykkönen" country-is="Finland"]</li>
        <li>Finland - Veikkausliiga: [azscore league-is="Veikkausliiga" country-is="Finland"]</li>
        <li>France - Ligue 1: [azscore league-is="Ligue 1" country-is="France"]</li>
        <li>France - Ligue 2: [azscore league-is="Ligue 2" country-is="France"]</li>
        <li>France - CFA - Group A: [azscore league-is="CFA - Group A" country-is="France"]</li>
        <li>France - Super CUP: [azscore league-is="Super CUP" country-is="France"]</li>
        <li>France - Ligue Cup: [azscore league-is="Ligue Cup" country-is="France"]</li>
        <li>France - CFA - Group D: [azscore league-is="CFA - Group D" country-is="France"]</li>
        <li>France - CFA - Group C: [azscore league-is="CFA - Group C" country-is="France"]</li>
        <li>France - CFA - Group B: [azscore league-is="CFA - Group B" country-is="France"]</li>
        <li>France - CUP: [azscore league-is="CUP" country-is="France"]</li>
        <li>France - League 3: [azscore league-is="League 3" country-is="France"]</li>
        <li>France - National 3: [azscore league-is="National 3" country-is="France"]</li>
        <li>Georgia - League 1: [azscore league-is="League 1" country-is="Georgia"]</li>
        <li>Georgia - Pirveli Liga: [azscore league-is="Pirveli Liga" country-is="Georgia"]</li>
        <li>Georgia - Super Cup: [azscore league-is="Super Cup" country-is="Georgia"]</li>
        <li>Georgia - Cup: [azscore league-is="Cup" country-is="Georgia"]</li>
        <li>Germany - Bundesliga: [azscore league-is="Bundesliga" country-is="Germany"]</li>
        <li>Germany - Regionalliga South: [azscore league-is="Regionalliga South" country-is="Germany"]</li>
        <li>Germany - CUP: [azscore league-is="CUP" country-is="Germany"]</li>
        <li>Germany - Regionalliga North-East: [azscore league-is="Regionalliga North-East" country-is="Germany"]</li>
        <li>Germany - Bundesliga II: [azscore league-is="Bundesliga II" country-is="Germany"]</li>
        <li>Germany - Regionalliga North: [azscore league-is="Regionalliga North" country-is="Germany"]</li>
        <li>Germany - Regionalliga Bayern: [azscore league-is="Regionalliga Bayern" country-is="Germany"]</li>
        <li>Germany - Super Cup: [azscore league-is="Super Cup" country-is="Germany"]</li>
        <li>Germany - Regionalliga West: [azscore league-is="Regionalliga West" country-is="Germany"]</li>
        <li>Germany - League 5 OberLiga: [azscore league-is="League 5 OberLiga" country-is="Germany"]</li>
        <li>Germany - League 3: [azscore league-is="League 3" country-is="Germany"]</li>
        <li>Greece - League 2: [azscore league-is="League 2" country-is="Greece"]</li>
        <li>Greece - Super League: [azscore league-is="Super League" country-is="Greece"]</li>
        <li>Greece - CUP: [azscore league-is="CUP" country-is="Greece"]</li>
        <li>Holland - Super CUP: [azscore league-is="Super CUP" country-is="Holland"]</li>
        <li>Holland - League 2: [azscore league-is="League 2" country-is="Holland"]</li>
        <li>Holland - Eredivisie: [azscore league-is="Eredivisie" country-is="Holland"]</li>
        <li>Holland - Amstel CUP: [azscore league-is="Amstel CUP" country-is="Holland"]</li>
        <li>Holland - League 3: [azscore league-is="League 3" country-is="Holland"]</li>
        <li>Hungary - League Cup: [azscore league-is="League Cup" country-is="Hungary"]</li>
        <li>Hungary - CUP: [azscore league-is="CUP" country-is="Hungary"]</li>
        <li>Hungary - Nemzeti Bajnokság I: [azscore league-is="Nemzeti Bajnokság I" country-is="Hungary"]</li>
        <li>Hungary - Nemzeti Bajnokság II: [azscore league-is="Nemzeti Bajnokság II" country-is="Hungary"]</li>
        <li>Hungary - Super Cup: [azscore league-is="Super Cup" country-is="Hungary"]</li>
        <li>Iceland - Premier League: [azscore league-is="Premier League" country-is="Iceland"]</li>
        <li>Iceland - League 2: [azscore league-is="League 2" country-is="Iceland"]</li>
        <li>Iceland - League 4: [azscore league-is="League 4" country-is="Iceland"]</li>
        <li>Iceland - League Cup 2: [azscore league-is="League Cup 2" country-is="Iceland"]</li>
        <li>Iceland - Super Cup: [azscore league-is="Super Cup" country-is="Iceland"]</li>
        <li>Iceland - League 1: [azscore league-is="League 1" country-is="Iceland"]</li>
        <li>Iceland - CUP: [azscore league-is="CUP" country-is="Iceland"]</li>
        <li>Iceland - League 3: [azscore league-is="League 3" country-is="Iceland"]</li>
        <li>Iceland - League Cup: [azscore league-is="League Cup" country-is="Iceland"]</li>
        <li>Indonesia - Liga 1: [azscore league-is="Liga 1" country-is="Indonesia"]</li>
        <li>Iran - Azadegan League: [azscore league-is="Azadegan League" country-is="Iran"]</li>
        <li>Iran - Premier League: [azscore league-is="Premier League" country-is="Iran"]</li>
        <li>Iran - Super Cup: [azscore league-is="Super Cup" country-is="Iran"]</li>
        <li>Iran - Cup: [azscore league-is="Cup" country-is="Iran"]</li>
        <li>Ireland - First Division: [azscore league-is="First Division" country-is="Ireland"]</li>
        <li>Ireland - League Cup: [azscore league-is="League Cup" country-is="Ireland"]</li>
        <li>Ireland - Super Cup: [azscore league-is="Super Cup" country-is="Ireland"]</li>
        <li>Ireland - FAI CUP: [azscore league-is="FAI CUP" country-is="Ireland"]</li>
        <li>Ireland - Premier Division: [azscore league-is="Premier Division" country-is="Ireland"]</li>
        <li>Israel - League 2: [azscore league-is="League 2" country-is="Israel"]</li>
        <li>Israel - League 1: [azscore league-is="League 1" country-is="Israel"]</li>
        <li>Israel - League 3: [azscore league-is="League 3" country-is="Israel"]</li>
        <li>Israel - CUP: [azscore league-is="CUP" country-is="Israel"]</li>
        <li>Israel - League 4: [azscore league-is="League 4" country-is="Israel"]</li>
        <li>Italy - Serie A: [azscore league-is="Serie A" country-is="Italy"]</li>
        <li>Italy - Lega Pro C1-B: [azscore league-is="Lega Pro C1-B" country-is="Italy"]</li>
        <li>Italy - Lega Pro C2-A: [azscore league-is="Lega Pro C2-A" country-is="Italy"]</li>
        <li>Italy - TIM Cup: [azscore league-is="TIM Cup" country-is="Italy"]</li>
        <li>Italy - Lega Pro C1-C: [azscore league-is="Lega Pro C1-C" country-is="Italy"]</li>
        <li>Italy - Lega Pro C2-C: [azscore league-is="Lega Pro C2-C" country-is="Italy"]</li>
        <li>Italy - Super CUP: [azscore league-is="Super CUP" country-is="Italy"]</li>
        <li>Italy - Lega Pro C2-B: [azscore league-is="Lega Pro C2-B" country-is="Italy"]</li>
        <li>Italy - Coppa Italia Lega Pro: [azscore league-is="Coppa Italia Lega Pro" country-is="Italy"]</li>
        <li>Italy - Serie B: [azscore league-is="Serie B" country-is="Italy"]</li>
        <li>Italy - CUP: [azscore league-is="CUP" country-is="Italy"]</li>
        <li>Italy - Lega Pro C1-A: [azscore league-is="Lega Pro C1-A" country-is="Italy"]</li>
        <li>Italy - C Play Off and Out: [azscore league-is="C Play Off and Out" country-is="Italy"]</li>
        <li>Italy - Serie D Cup: [azscore league-is="Serie D Cup" country-is="Italy"]</li>
        <li>Japan - League CUP: [azscore league-is="League CUP" country-is="Japan"]</li>
        <li>Japan - J-League 3: [azscore league-is="J-League 3" country-is="Japan"]</li>
        <li>Japan - Super Cup: [azscore league-is="Super Cup" country-is="Japan"]</li>
        <li>Japan - Emperor Cup: [azscore league-is="Emperor Cup" country-is="Japan"]</li>
        <li>Japan - J-League: [azscore league-is="J-League" country-is="Japan"]</li>
        <li>Japan - J-League2: [azscore league-is="J-League2" country-is="Japan"]</li>
        <li>Kenya - Premier League (KPL): [azscore league-is="Premier League (KPL)" country-is="Kenya"]</li>
        <li>Korea Rep. - FA Cup: [azscore league-is="FA Cup" country-is="Korea Rep."]</li>
        <li>Korea Rep. - FA Cup: [azscore league-is="FA Cup" country-is="Korea Rep."]</li>
        <li>Korea Rep. - League 2: [azscore league-is="League 2" country-is="Korea Rep."]</li>
        <li>Korea Rep. - League 1: [azscore league-is="League 1" country-is="Korea Rep."]</li>
        <li>Korea Rep. - League 3: [azscore league-is="League 3" country-is="Korea Rep."]</li>
        <li>Latvia - CUP: [azscore league-is="CUP" country-is="Latvia"]</li>
        <li>Latvia - League 1: [azscore league-is="League 1" country-is="Latvia"]</li>
        <li>Latvia - League 2: [azscore league-is="League 2" country-is="Latvia"]</li>
        <li>Lithuania - 1 Lyga: [azscore league-is="1 Lyga" country-is="Lithuania"]</li>
        <li>Lithuania - The A League: [azscore league-is="The A League" country-is="Lithuania"]</li>
        <li>Lithuania - Super Cup: [azscore league-is="Super Cup" country-is="Lithuania"]</li>
        <li>Macedonia - CUP: [azscore league-is="CUP" country-is="Macedonia"]</li>
        <li>Macedonia - Super Cup: [azscore league-is="Super Cup" country-is="Macedonia"]</li>
        <li>Macedonia - First League: [azscore league-is="First League" country-is="Macedonia"]</li>
        <li>Malta - League 1: [azscore league-is="League 1" country-is="Malta"]</li>
        <li>Malta - League 2: [azscore league-is="League 2" country-is="Malta"]</li>
        <li>Mexico - Cup: [azscore league-is="Cup" country-is="Mexico"]</li>
        <li>Mexico - League 1: [azscore league-is="League 1" country-is="Mexico"]</li>
        <li>Mexico - League 2: [azscore league-is="League 2" country-is="Mexico"]</li>
        <li>Mexico - League 3: [azscore league-is="League 3" country-is="Mexico"]</li>
        <li>Morocco - League 1: [azscore league-is="League 1" country-is="Morocco"]</li>
        <li>Morocco - League 2: [azscore league-is="League 2" country-is="Morocco"]</li>
        <li>Morocco - Cup: [azscore league-is="Cup" country-is="Morocco"]</li>
        <li>N. Ireland - League 1: [azscore league-is="League 1" country-is="N. Ireland"]</li>
        <li>N. Ireland - IFA Championship: [azscore league-is="IFA Championship" country-is="N. Ireland"]</li>
        <li>N. Ireland - Cup: [azscore league-is="Cup" country-is="N. Ireland"]</li>
        <li>Nigeria - League 1: [azscore league-is="League 1" country-is="Nigeria"]</li>
        <li>North & Central America - Central American Cup: [azscore league-is="Central American Cup" country-is="North & Central America"]</li>
        <li>North & Central America - CACGs: [azscore league-is="CACGs" country-is="North & Central America"]</li>
        <li>North & Central America - Champions League: [azscore league-is="Champions League" country-is="North & Central America"]</li>
        <li>North & Central America - Centroamericana: [azscore league-is="Centroamericana" country-is="North & Central America"]</li>
        <li>North & Central America - Gold Cup: [azscore league-is="Gold Cup" country-is="North & Central America"]</li>
        <li>North & Central America - Nations League: [azscore league-is="Nations League" country-is="North & Central America"]</li>
        <li>North & Central America - Leagues Cup: [azscore league-is="Leagues Cup" country-is="North & Central America"]</li>
        <li>Norway - League 2 - D: [azscore league-is="League 2 - D" country-is="Norway"]</li>
        <li>Norway - Tippeligaen: [azscore league-is="Tippeligaen" country-is="Norway"]</li>
        <li>Norway - Cup: [azscore league-is="Cup" country-is="Norway"]</li>
        <li>Norway - League 1: [azscore league-is="League 1" country-is="Norway"]</li>
        <li>Norway - League 3 - D: [azscore league-is="League 3 - D" country-is="Norway"]</li>
        <li>Norway - League 2: [azscore league-is="League 2" country-is="Norway"]</li>
        <li>Norway - League 2 - C: [azscore league-is="League 2 - C" country-is="Norway"]</li>
        <li>Norway - NM CUP: [azscore league-is="NM CUP" country-is="Norway"]</li>
        <li>Norway - League 2 - A: [azscore league-is="League 2 - A" country-is="Norway"]</li>
        <li>Norway - League 3 - A: [azscore league-is="League 3 - A" country-is="Norway"]</li>
        <li>Norway - League 2 - B: [azscore league-is="League 2 - B" country-is="Norway"]</li>
        <li>Norway - League 2 - A: [azscore league-is="League 2 - A" country-is="Norway"]</li>
        <li>Norway - League 3 - C: [azscore league-is="League 3 - C" country-is="Norway"]</li>
        <li>Norway - League 2 - B: [azscore league-is="League 2 - B" country-is="Norway"]</li>
        <li>Norway - League 3 - B: [azscore league-is="League 3 - B" country-is="Norway"]</li>
        <li>Paraguay - League 2: [azscore league-is="League 2" country-is="Paraguay"]</li>
        <li>Paraguay - League 1: [azscore league-is="League 1" country-is="Paraguay"]</li>
        <li>Paraguay - Cup: [azscore league-is="Cup" country-is="Paraguay"]</li>
        <li>Peru - League 2: [azscore league-is="League 2" country-is="Peru"]</li>
        <li>Peru - Cup: [azscore league-is="Cup" country-is="Peru"]</li>
        <li>Peru - League 1: [azscore league-is="League 1" country-is="Peru"]</li>
        <li>Poland - League 2: [azscore league-is="League 2" country-is="Poland"]</li>
        <li>Poland - League 3: [azscore league-is="League 3" country-is="Poland"]</li>
        <li>Poland - League 1: [azscore league-is="League 1" country-is="Poland"]</li>
        <li>Poland - CUP: [azscore league-is="CUP" country-is="Poland"]</li>
        <li>Poland - League 4: [azscore league-is="League 4" country-is="Poland"]</li>
        <li>Portugal - Primeira Liga: [azscore league-is="Primeira Liga" country-is="Portugal"]</li>
        <li>Portugal - League CUP: [azscore league-is="League CUP" country-is="Portugal"]</li>
        <li>Portugal - CUP: [azscore league-is="CUP" country-is="Portugal"]</li>
        <li>Portugal - Super CUP: [azscore league-is="Super CUP" country-is="Portugal"]</li>
        <li>Portugal - League 2: [azscore league-is="League 2" country-is="Portugal"]</li>
        <li>Portugal - League 3 Play Off: [azscore league-is="League 3 Play Off" country-is="Portugal"]</li>
        <li>Qatar - Stars Cup: [azscore league-is="Stars Cup" country-is="Qatar"]</li>
        <li>Qatar - League 1: [azscore league-is="League 1" country-is="Qatar"]</li>
        <li>Romania - Liga 1: [azscore league-is="Liga 1" country-is="Romania"]</li>
        <li>Romania - League 2 A: [azscore league-is="League 2 A" country-is="Romania"]</li>
        <li>Romania - Liga 2: [azscore league-is="Liga 2" country-is="Romania"]</li>
        <li>Romania - CUP: [azscore league-is="CUP" country-is="Romania"]</li>
        <li>Romania - Liga 3: [azscore league-is="Liga 3" country-is="Romania"]</li>
        <li>Romania - Cup: [azscore league-is="Cup" country-is="Romania"]</li>
        <li>Romania - League 2 B: [azscore league-is="League 2 B" country-is="Romania"]</li>
        <li>Romania - Super Cup: [azscore league-is="Super Cup" country-is="Romania"]</li>
        <li>Romania - League Cup: [azscore league-is="League Cup" country-is="Romania"]</li>
        <li>Russia - Reserve League: [azscore league-is="Reserve League" country-is="Russia"]</li>
        <li>Russia - League 2: [azscore league-is="League 2" country-is="Russia"]</li>
        <li>Russia - League 1: [azscore league-is="League 1" country-is="Russia"]</li>
        <li>Russia - Youth League: [azscore league-is="Youth League" country-is="Russia"]</li>
        <li>Russia - CUP: [azscore league-is="CUP" country-is="Russia"]</li>
        <li>Russia - Super Cup: [azscore league-is="Super Cup" country-is="Russia"]</li>
        <li>Saudi Arabia - Pro League: [azscore league-is="Pro League" country-is="Saudi Arabia"]</li>
        <li>Scotland - Premier League: [azscore league-is="Premier League" country-is="Scotland"]</li>
        <li>Scotland - League 3: [azscore league-is="League 3" country-is="Scotland"]</li>
        <li>Scotland - League 2: [azscore league-is="League 2" country-is="Scotland"]</li>
        <li>Scotland - Championship: [azscore league-is="Championship" country-is="Scotland"]</li>
        <li>Scotland - FA CUP: [azscore league-is="FA CUP" country-is="Scotland"]</li>
        <li>Scotland - Challenge Cup: [azscore league-is="Challenge Cup" country-is="Scotland"]</li>
        <li>Scotland - League Cup: [azscore league-is="League Cup" country-is="Scotland"]</li>
        <li>Scotland - League 1: [azscore league-is="League 1" country-is="Scotland"]</li>
        <li>Serbia - Prva Liga: [azscore league-is="Prva Liga" country-is="Serbia"]</li>
        <li>Serbia - SuperLiga: [azscore league-is="SuperLiga" country-is="Serbia"]</li>
        <li>Serbia - CUP: [azscore league-is="CUP" country-is="Serbia"]</li>
        <li>Slovakia - League 2: [azscore league-is="League 2" country-is="Slovakia"]</li>
        <li>Slovakia - League 1: [azscore league-is="League 1" country-is="Slovakia"]</li>
        <li>Slovakia - Super Cup: [azscore league-is="Super Cup" country-is="Slovakia"]</li>
        <li>Slovakia - CUP: [azscore league-is="CUP" country-is="Slovakia"]</li>
        <li>Slovakia - League 3 West: [azscore league-is="League 3 West" country-is="Slovakia"]</li>
        <li>Slovenia - CUP: [azscore league-is="CUP" country-is="Slovenia"]</li>
        <li>Slovenia - League 1: [azscore league-is="League 1" country-is="Slovenia"]</li>
        <li>Slovenia - League 2: [azscore league-is="League 2" country-is="Slovenia"]</li>
        <li>Slovenia - Super CUP: [azscore league-is="Super CUP" country-is="Slovenia"]</li>
        <li>South Africa - Premier Division: [azscore league-is="Premier Division" country-is="South Africa"]</li>
        <li>Spain - La Liga: [azscore league-is="La Liga" country-is="Spain"]</li>
        <li>Spain - Segunda B, Group 2: [azscore league-is="Segunda B, Group 2" country-is="Spain"]</li>
        <li>Spain - Segunda B, Group 4: [azscore league-is="Segunda B, Group 4" country-is="Spain"]</li>
        <li>Spain - Federation Cup: [azscore league-is="Federation Cup" country-is="Spain"]</li>
        <li>Spain - League 4 - Tercera Division: [azscore league-is="League 4 - Tercera Division" country-is="Spain"]</li>
        <li>Spain - Segunda Liga: [azscore league-is="Segunda Liga" country-is="Spain"]</li>
        <li>Spain - Segunda B, Group 3: [azscore league-is="Segunda B, Group 3" country-is="Spain"]</li>
        <li>Spain - CUP: [azscore league-is="CUP" country-is="Spain"]</li>
        <li>Spain - Super CUP: [azscore league-is="Super CUP" country-is="Spain"]</li>
        <li>Spain - Segunda B, Group 1: [azscore league-is="Segunda B, Group 1" country-is="Spain"]</li>
        <li>Sweden - CUP: [azscore league-is="CUP" country-is="Sweden"]</li>
        <li>Sweden - Allsvenskan: [azscore league-is="Allsvenskan" country-is="Sweden"]</li>
        <li>Sweden - Division 1 Norra: [azscore league-is="Division 1 Norra" country-is="Sweden"]</li>
        <li>Sweden - Superettan: [azscore league-is="Superettan" country-is="Sweden"]</li>
        <li>Sweden - Division 1 Södra: [azscore league-is="Division 1 Södra" country-is="Sweden"]</li>
        <li>Switzerland - League 2: [azscore league-is="League 2" country-is="Switzerland"]</li>
        <li>Switzerland - CUP: [azscore league-is="CUP" country-is="Switzerland"]</li>
        <li>Switzerland - Premier League: [azscore league-is="Premier League" country-is="Switzerland"]</li>
        <li>Switzerland - Promotion League: [azscore league-is="Promotion League" country-is="Switzerland"]</li>
        <li>Syria - Cup: [azscore league-is="Cup" country-is="Syria"]</li>
        <li>Syria - League 1: [azscore league-is="League 1" country-is="Syria"]</li>
        <li>Tunisia - League 1: [azscore league-is="League 1" country-is="Tunisia"]</li>
        <li>Tunisia - Cup: [azscore league-is="Cup" country-is="Tunisia"]</li>
        <li>Tunisia - League 2: [azscore league-is="League 2" country-is="Tunisia"]</li>
        <li>Turkey - Cappadocia Cup: [azscore league-is="Cappadocia Cup" country-is="Turkey"]</li>
        <li>Turkey - League B Group 1: [azscore league-is="League B Group 1" country-is="Turkey"]</li>
        <li>Turkey - Third League - Play offs: [azscore league-is="Third League - Play offs" country-is="Turkey"]</li>
        <li>Turkey - Third League Group 2: [azscore league-is="Third League Group 2" country-is="Turkey"]</li>
        <li>Turkey - League B Group 5: [azscore league-is="League B Group 5" country-is="Turkey"]</li>
        <li>Turkey - Second League: [azscore league-is="Second League" country-is="Turkey"]</li>
        <li>Turkey - A2 League Playoffs: [azscore league-is="A2 League Playoffs" country-is="Turkey"]</li>
        <li>Turkey - A2 League 1: [azscore league-is="A2 League 1" country-is="Turkey"]</li>
        <li>Turkey - Third League Group 1: [azscore league-is="Third League Group 1" country-is="Turkey"]</li>
        <li>Turkey - League B Group 4: [azscore league-is="League B Group 4" country-is="Turkey"]</li>
        <li>Turkey - 2. Lig Beyaz Group: [azscore league-is="2. Lig Beyaz Group" country-is="Turkey"]</li>
        <li>Turkey - Third League Playoffs: [azscore league-is="Third League Playoffs" country-is="Turkey"]</li>
        <li>Turkey - Second League Red: [azscore league-is="Second League Red" country-is="Turkey"]</li>
        <li>Turkey - CUP: [azscore league-is="CUP" country-is="Turkey"]</li>
        <li>Turkey - A2 League 4: [azscore league-is="A2 League 4" country-is="Turkey"]</li>
        <li>Turkey - Super League: [azscore league-is="Super League" country-is="Turkey"]</li>
        <li>Turkey - Second League Playoffs: [azscore league-is="Second League Playoffs" country-is="Turkey"]</li>
        <li>Turkey - League B Group 3: [azscore league-is="League B Group 3" country-is="Turkey"]</li>
        <li>Turkey - TFF 2. Lig - Play offs: [azscore league-is="TFF 2. Lig - Play offs" country-is="Turkey"]</li>
        <li>Turkey - Under 18: [azscore league-is="Under 18" country-is="Turkey"]</li>
        <li>Turkey - 2. Lig Red Group: [azscore league-is="2. Lig Red Group" country-is="Turkey"]</li>
        <li>Turkey - A2 League 3: [azscore league-is="A2 League 3" country-is="Turkey"]</li>
        <li>Turkey - Second League White: [azscore league-is="Second League White" country-is="Turkey"]</li>
        <li>Turkey - SporToto Cup: [azscore league-is="SporToto Cup" country-is="Turkey"]</li>
        <li>Turkey - League B Group 2: [azscore league-is="League B Group 2" country-is="Turkey"]</li>
        <li>Turkey - Third League Group 3: [azscore league-is="Third League Group 3" country-is="Turkey"]</li>
        <li>Turkey - Super Cup: [azscore league-is="Super Cup" country-is="Turkey"]</li>
        <li>Turkey - Second League Promote: [azscore league-is="Second League Promote" country-is="Turkey"]</li>
        <li>Turkey - A2 League 2: [azscore league-is="A2 League 2" country-is="Turkey"]</li>
        <li>UEFA - Europa Conference League: [azscore league-is="Europa Conference League" country-is="UEFA"]</li>
        <li>UEFA - Women Under 17: [azscore league-is="Women Under 17" country-is="UEFA"]</li>
        <li>UEFA - Euro: [azscore league-is="Euro" country-is="UEFA"]</li>
        <li>UEFA - Under 19: [azscore league-is="Under 19" country-is="UEFA"]</li>
        <li>UEFA - Youth League: [azscore league-is="Youth League" country-is="UEFA"]</li>
        <li>UEFA - Super CUP: [azscore league-is="Super CUP" country-is="UEFA"]</li>
        <li>UEFA - U21 Championship: [azscore league-is="U21 Championship" country-is="UEFA"]</li>
        <li>UEFA - Under 21 Qualification: [azscore league-is="Under 21 Qualification" country-is="UEFA"]</li>
        <li>UEFA - Nations League: [azscore league-is="Nations League" country-is="UEFA"]</li>
        <li>UEFA - Under 17: [azscore league-is="Under 17" country-is="UEFA"]</li>
        <li>UEFA - Nations League: [azscore league-is="Nations League" country-is="UEFA"]</li>
        <li>UEFA - Champions League: [azscore league-is="Champions League" country-is="UEFA"]</li>
        <li>UEFA - Europa League: [azscore league-is="Europa League" country-is="UEFA"]</li>
        <li>Uganda - Premier League: [azscore league-is="Premier League" country-is="Uganda"]</li>
        <li>Ukraine - League 2: [azscore league-is="League 2" country-is="Ukraine"]</li>
        <li>Ukraine - CUP: [azscore league-is="CUP" country-is="Ukraine"]</li>
        <li>Ukraine - League 1: [azscore league-is="League 1" country-is="Ukraine"]</li>
        <li>Ukraine - Super Cup: [azscore league-is="Super Cup" country-is="Ukraine"]</li>
        <li>Uruguay - Cup: [azscore league-is="Cup" country-is="Uruguay"]</li>
        <li>Uruguay - First Division: [azscore league-is="First Division" country-is="Uruguay"]</li>
        <li>Uruguay - Second Division: [azscore league-is="Second Division" country-is="Uruguay"]</li>
        <li>USA - CUP: [azscore league-is="CUP" country-is="USA"]</li>
        <li>USA - USL Championship: [azscore league-is="USL Championship" country-is="USA"]</li>
        <li>USA - National Premier Soccer League: [azscore league-is="National Premier Soccer League" country-is="USA"]</li>
        <li>USA - USL League Two: [azscore league-is="USL League Two" country-is="USA"]</li>
        <li>USA - MLS: [azscore league-is="MLS" country-is="USA"]</li>
        <li>USA - National independent Football League: [azscore league-is="National independent Football League" country-is="USA"]</li>
        <li>Venezuela - League 1: [azscore league-is="League 1" country-is="Venezuela"]</li>
        <li>Venezuela - League 2: [azscore league-is="League 2" country-is="Venezuela"]</li>
        <li>Wales - CUP: [azscore league-is="CUP" country-is="Wales"]</li>
        <li>Wales - Premier Leagues: [azscore league-is="Premier Leagues" country-is="Wales"]</li>
        <li>Wales - League 1: [azscore league-is="League 1" country-is="Wales"]</li>
        <li>World - Audi Cup: [azscore league-is="Audi Cup" country-is="World"]</li>
        <li>World - Club Friendlies: [azscore league-is="Club Friendlies" country-is="World"]</li>
        <li>World - Olympics Men: [azscore league-is="Olympics Men" country-is="World"]</li>
        <li>World - Champions Cup: [azscore league-is="Champions Cup" country-is="World"]</li>
        <li>World - WAFF U23 Championship: [azscore league-is="WAFF U23 Championship" country-is="World"]</li>
        <li>World - Copa Euroamericana: [azscore league-is="Copa Euroamericana" country-is="World"]</li>
        <li>World - Arab Cup: [azscore league-is="Arab Cup" country-is="World"]</li>
        <li>World - Friendly: [azscore league-is="Friendly" country-is="World"]</li>
        <li>World - Emirates Cup: [azscore league-is="Emirates Cup" country-is="World"]</li>
    </ul>
    </div> <!-- /wrap -->
    <?php
    }

    public function register_page_options() {
        $black = '#212B36';
        $gray = '#6A7B8B';
        $lightGray = '#E4E8EC';
        $white = '#FFFFFF';
        $cultured = '#F6FAF4';
        $salem = '#1B883F';
        $ghostWhite = '#F9FAFB';
        $lava = '#D70C17';

        $regular = $this->regular;
        $bold = $this->bold;

        // Add Section for option fields
        add_settings_section('azscr_section', 'General Settings', array($this, 'display_section'), __FILE__);
        add_settings_field('azscr_lang', 'Language', array($this, 'lang_settings_field'), __FILE__, 'azscr_section');
        add_settings_field('azscr_clink', 'Author credit link', array($this, 'c_link_settings_field'), __FILE__, 'azscr_section');
        add_settings_field('azscr_main_font', 'Main font', array($this, 'main_font_settings_field'), __FILE__, 'azscr_section');
        add_settings_field('azscr_your_word', '', array($this, 'your_word_cb'), __FILE__, 'azscr_section');

        add_settings_section('azscr_section_comp_row', 'Competition Row', array($this, 'display_section'), __FILE__);
        add_settings_field('azscr_com_row_tr_leagueHeader_bg', 'Background color', array($this, 'azcolorcb'), __FILE__, 'azscr_section_comp_row', array('o_name' => 'tr_leagueHeader_bg', 'def_color' => $ghostWhite));
        add_settings_field('azscr_com_row_color_category', 'Category name color', array($this, 'azcolorcb'), __FILE__, 'azscr_section_comp_row', array('o_name' => 'color_category', 'def_color' => $gray));
        add_settings_field('azscr_com_row_fs_category', 'Font size category name', array($this, 'fsRadioBtn'), __FILE__, 'azscr_section_comp_row', array('o_name' => 'fs_category'));
        add_settings_field('azscr_com_row_fw_category', 'Font weight category name', array($this, 'fwRadioBtn'), __FILE__, 'azscr_section_comp_row', array('o_name' => 'fw_category', 'def' => $regular));
        add_settings_field('azscr_com_row_color_leagues', 'League name color', array($this, 'azcolorcb'), __FILE__, 'azscr_section_comp_row', array('o_name' => 'color_leagues', 'def_color' => $black));
        add_settings_field('azscr_com_row_fs_league', 'Font size league name', array($this, 'fsRadioBtn'), __FILE__, 'azscr_section_comp_row', array('o_name' => 'fs_league'));
        add_settings_field('azscr_com_row_fw_leagues', 'Font weight league name', array($this, 'fwRadioBtn'), __FILE__, 'azscr_section_comp_row', array('o_name' => 'fw_leagues', 'def' =>  $regular));
        add_settings_field('azscr_com_row_color_date', 'Date name color', array($this, 'azcolorcb'), __FILE__, 'azscr_section_comp_row', array('o_name' => 'color_date', 'def_color' => $black));
        add_settings_field('azscr_com_row_fw_date', 'Font weight date', array($this, 'fwRadioBtn'), __FILE__, 'azscr_section_comp_row', array('o_name' => 'fw_date', 'def' =>  $regular));

        add_settings_section('azscr_section_date_row', 'Single Date Row', array($this, 'display_section'), __FILE__);
        add_settings_field('azscr_date_row_tr_leagueHeaderDate_bg', 'Background color', array($this, 'azcolorcb'), __FILE__, 'azscr_section_date_row', array('o_name' => 'tr_leagueHeaderDate_bg', 'def_color' => $ghostWhite));
        add_settings_field('azscr_date_row_color_date_single', 'Date name color', array($this, 'azcolorcb'), __FILE__, 'azscr_section_date_row', array('o_name' => 'color_date_single', 'def_color' => $black));
        add_settings_field('azscr_date_row_fw_date_single', 'Font weight date', array($this, 'fwRadioBtn'), __FILE__, 'azscr_section_date_row', array('o_name' => 'fw_date_single', 'def' =>  $regular));

        add_settings_section('azscr_section_match_row', 'Match Row', array($this, 'display_section'), __FILE__);
        add_settings_field('azscr_match_row_bg_match_row', 'Background color', array($this, 'azcolorcb'), __FILE__, 'azscr_section_match_row', array('o_name' => 'bg_match_row', 'def_color' => $white));
        add_settings_field('azscr_match_row_color_border_match_row', 'Dividers line color', array($this, 'azcolorcb'), __FILE__, 'azscr_section_match_row', array('o_name' => 'color_border_match_row', 'def_color' => $lightGray));
        add_settings_field('azscr_match_row_hover_match_row', 'Line color on hover', array($this, 'azcolorcb'), __FILE__, 'azscr_section_match_row', array('o_name' => 'hover_match_row', 'def_color' => $cultured));
        add_settings_field('azscr_match_row_color_team_name_row', 'Team name color', array($this, 'azcolorcb'), __FILE__, 'azscr_section_match_row', array('o_name' => 'color_team_name_row', 'def_color' => $black));
        add_settings_field('azscr_match_row_fw_team_name_row', 'Font weight team name', array($this, 'fwRadioBtn'), __FILE__, 'azscr_section_match_row', array('o_name' => 'fw_team_name_row', 'def' =>  $regular));
        add_settings_field('azscr_match_row_color_match_status', 'Match status color', array($this, 'azcolorcb'), __FILE__, 'azscr_section_match_row', array('o_name' => 'color_match_status', 'def_color' => $salem));
        add_settings_field('azscr_match_row_fw_match_status_row', 'Font weight match status row', array($this, 'fwRadioBtn'), __FILE__, 'azscr_section_match_row', array('o_name' => 'fw_match_status_row', 'def' => $bold));
        add_settings_field('azscr_match_row_color_live_status_row', 'Live match status color', array($this, 'azcolorcb'), __FILE__, 'azscr_section_match_row', array('o_name' => 'color_live_status_row', 'def_color' => $lava));
        add_settings_field('azscr_match_row_fw_match_status', 'Match status live weight', array($this, 'fwRadioBtn'), __FILE__, 'azscr_section_match_row', array('o_name' => 'fw_match_status', 'def' => $bold));
        add_settings_field('azscr_match_row_color_command_goal', 'Scored team font color', array($this, 'azcolorcb'), __FILE__, 'azscr_section_match_row', array('o_name' => 'color_command_goal', 'def_color' => $salem));
        add_settings_field('azscr_match_row_color_match_time', 'Match time and score color', array($this, 'azcolorcb'), __FILE__, 'azscr_section_match_row', array('o_name' => 'color_match_time', 'def_color' => $gray));
        add_settings_field('azscr_match_row_fw_match_time', 'Match time font weight', array($this, 'fwRadioBtn'), __FILE__, 'azscr_section_match_row', array('o_name' => 'fw_match_time', 'def' => $bold));

        add_settings_section('azscr_section_incidents', 'Incidents (goal scorers,cards etc.)', array($this, 'display_section'), __FILE__);
        add_settings_field('azscr_inc_bg_incident_row', 'Background color', array($this, 'azcolorcb'), __FILE__, 'azscr_section_incidents', array('o_name' => 'bg_incident_row', 'def_color' => $ghostWhite));
        add_settings_field('azscr_inc_color_border_incident_row', 'Dividers line color', array($this, 'azcolorcb'), __FILE__, 'azscr_section_incidents', array('o_name' => 'color_border_incident_row', 'def_color' => $lightGray));
        add_settings_field('azscr_inc_color_incident_text', 'Font Color match incidents', array($this, 'azcolorcb'), __FILE__, 'azscr_section_incidents', array('o_name' => 'color_incident_text', 'def_color' => $black));
        add_settings_field('azscr_inc_fw_incident_text', 'Font Weight match incidents', array($this, 'fwRadioBtn'), __FILE__, 'azscr_section_incidents', array('o_name' => 'fw_incident_text', 'def' => $regular));
        add_settings_field('azscr_inc_color_incident_minutes', 'Font Color match minutes', array($this, 'azcolorcb'), __FILE__, 'azscr_section_incidents', array('o_name' => 'color_incident_minutes', 'def_color' => $black));
        add_settings_field('azscr_inc_fw_incident_minutes', 'Font Weight match  minutes', array($this, 'fwRadioBtn'), __FILE__, 'azscr_section_incidents', array('o_name' => 'fw_incident_minutes', 'def' => $regular));

        // Register Settings
        register_setting(__FILE__, 'azscr_settings_options', array($this, 'validate_options'));
    }

    public function enqueue_admin_js() {

        // Make sure to add the wp-color-picker dependecy to js file
        wp_enqueue_script('azscr_custom_js', plugins_url('js/jquery.custom.js', __FILE__), array('jquery', 'wp-color-picker'), '', true);

        // Css rules for Color Picker
        wp_enqueue_style('wp-color-picker');
    }

    public function validate_options($fields) {
        $valid_fields = array();
        //language
        $lang_is = trim($fields['lang']);
        $lang_is_ok = array('en', 'de', 'pt', 'nl', 'tr', 'it', 'fr', 'ro');

        if (!in_array($lang_is, $lang_is_ok)) {
            $lang_is = 'en';
        }

        $valid_fields['lang'] = strip_tags(stripslashes($lang_is));
        $valid_fields['your_word_num'] = rand(0, 9);

        //author link
        $c_link = trim($fields['c_link']);
        $valid_fields['c_link'] = strip_tags(stripslashes($c_link));

        $other_fields = array(
            'main_font',
            'fs_category',
            'fs_league',
            'fw_category',
            'fw_leagues',
            'fw_date',
            'fw_date_single',
            'fw_team_name_row',
            'fw_match_status',
            'fw_match_status_row',
            'fw_match_time',
            'fw_incident_text',
            'fw_incident_minutes'
        );
        foreach($other_fields as $f) {
            $f_is = trim($fields[$f]);
            $valid_fields[$f] = strip_tags(stripslashes($f_is));

        }

        $color_fields=array(
            'tr_leagueHeader_bg',
            'color_category',
            'color_leagues',
            'color_date',
            'tr_leagueHeaderDate_bg',
            'color_date_single',
            'bg_match_row',
            'color_border_match_row',
            'hover_match_row',
            'color_team_name_row',
            'color_match_status',
            'color_live_status_row',
            'color_command_goal',
            'color_match_time',
            'bg_incident_row',
            'color_border_incident_row',
            'color_incident_text',
            'color_incident_minutes'
        );

        foreach($color_fields as $color_f) {
            $clr_is = trim($fields[$color_f]);
            $clr_is = strip_tags(stripslashes($clr_is));
            if(FALSE === $this->check_color($clr_is)) {
                add_settings_error('azscr_settings_options', 'azscr_bg_error', "Insert a valid color instead {$clr_is}", 'error'); // $setting, $code, $message, $type

                $valid_fields[$color_f] = isset($this->options[$color_f]) ? $this->options[$color_f] : '';
            } else {
                $valid_fields[$color_f] = $clr_is;
            }

        }

        return apply_filters('validate_options', $valid_fields, $fields);

    }

    /**
     * Function that will check if value is a valid HEX color.
     */
    public function check_color($value) {
        if (preg_match('/^#[a-f0-9]{6}$/i', $value)) { // if user insert a HEX color with #
            return true;
        }

        return false;
    }

    /**
     * Callback function for settings section
     */
    public function display_section() { /* Leave blank */ }

    public function your_word_cb() {
        echo '<input type="hidden" name="azscr_settings_options[your_word_num]" value="" />';
    }

    public function c_link_settings_field() {
        $val = isset($this->options['c_link']) ? $this->options['c_link'] : 'off';

        $selected_one=array('on' => '', 'off' => '');
        $selected_one[$val] = 'selected="selected"';
        echo "
        <div>
        <select name='azscr_settings_options[c_link]'>
            <option value='off' ".esc_html($selected_one['off']).">Off</option>
            <option value='on' ".esc_html($selected_one['on']).">On</option>
        </select>
        </div>
        <div>
            <small>
                Please set it to 'ON' to utilize your color preferences, or leave it 'OFF' for default colors.
            </small>
        </div>
        <div>
            <small>
                Need more detailed information? Please refer to the 'Notes' at the bottom of the page.
            </small>
        </div>
        ";
    }

    public function main_font_settings_field() {
        $val = isset($this->options['main_font']) ? $this->options['main_font'] : 'Roboto';

        if (!$val) {
            $val = 'Roboto';
        }

        $selected_one = array(
            'Roboto' => '',
            'Arial' => '',
            'Inter' => '',
            'Helvetica' => '',
            'Lato' => '',
            '"Noto Sans"' => '',
            'Rubik' => ''
        );
        $selected_one[$val] = 'selected="selected"';
        echo "
        <select name='azscr_settings_options[main_font]'>
            <option value='Roboto' ".esc_html($selected_one['Roboto']).">Roboto</option>
            <option value='Arial' ".esc_html($selected_one['Arial']).">Arial</option>
            <option value='Inter' ".esc_html($selected_one['Inter']).">Inter</option>
            <option value='Helvetica' ".esc_html($selected_one['Helvetica']).">Helvetica</option>
            <option value='Lato' ".esc_html($selected_one['Lato']).">Lato</option>
            <option value='\"Noto Sans\"' ".esc_html($selected_one['"Noto Sans"']).">Noto Sans</option>
            <option value='Rubik' ".esc_html($selected_one['Rubik']).">Rubik</option>
        </select>
        ";
    }

    public function lang_settings_field() {
        $lang_is_ok = array('en', 'de', 'pt', 'nl', 'tr', 'it', 'fr', 'ro');
        $locale = substr(get_locale(),0,2);
        $val = isset($this->options['lang']) ? $this->options['lang'] : 'en';
        $selected_one = array(
            'en' => '',
            'de' => '',
            'nl' => '',
            'pt' => '',
            'tr' => '',
            'it' => '',
            'fr' => '',
            'ro' => ''
        );

        if (!$val) {
            $val = in_array($locale, $lang_is_ok) ? $locale : 'en';
        }

        $selected_one[$val] = 'selected="selected"';

        echo "
        <select name='azscr_settings_options[lang]'>
                <option value='en' ".esc_html($selected_one['en']).">English</option>
                <option value='de' ".esc_html($selected_one['de']).">Deutsch</option>
                <option value='nl' ".esc_html($selected_one['nl']).">Nederlands</option>
                <option value='pt' ".esc_html($selected_one['pt']).">Português</option>
                <option value='tr' ".esc_html($selected_one['tr']).">Türkçe</option>
                <option value='it' ".esc_html($selected_one['it']).">İtaliano</option>
                <option value='fr' ".esc_html($selected_one['fr']).">Français</option>
                <option value='ro' ".esc_html($selected_one['ro']).">Română</option>
        </select>
        ";
    }

    public function azcolorcb(array $args) {
        $val = isset($this->options[$args['o_name']]) ? $this->options[$args['o_name']] : $args['def_color'];
        if (!$val) {
            $val = $args['def_color'];
        }

        echo "
        <input type='text' name='azscr_settings_options[".esc_attr($args['o_name'])."]' value='".esc_attr($val)."' class='cpa-color-picker'/>
        ";
    }

    public function fsRadioBtn(array $args) {
        $def = '14px';
        $val = isset($this->options[$args['o_name']]) ? $this->options[$args['o_name']] : $def;
        if (!$val) {
            $val = $def;
        }
        $checked = array(
            '10px' => '',
            '12px' => '',
            '14px' => '',
        );
        $checked[$val] = 'checked';
        echo "
        <label>
            <input type='radio' name='azscr_settings_options[".esc_attr($args['o_name'])."]' value='10px'  ".esc_attr($checked['10px'])."/>
            10px
        </label>
        <label>
            <input type='radio' name='azscr_settings_options[".esc_attr($args['o_name'])."]' value='12px'  ".esc_attr($checked['12px'])."/>
            12px
        </label>
        <label>
            <input type='radio' name='azscr_settings_options[".esc_attr($args['o_name'])."]' value='14px'  ".esc_attr($checked['14px'])."/>
            14px
        </label>
        ";
    }

    public function fwRadioBtn(array $args) {
        $regular = $this->regular;
        $bold = $this->bold;

        $val = isset($this->options[$args['o_name']]) ? $this->options[$args['o_name']] : $args['def'];
        if (!$val) {
            $val = $args['def'];
        }

        $checked = array_combine(array($regular, $bold), array('', ''));
        $checked[$val] = 'checked';

        echo "
        <label>
            <input type='radio' name='azscr_settings_options[".esc_attr($args['o_name'])."]' value='".esc_attr($regular)."'  ".esc_attr($checked[$regular])."/>
            Regular
        </label>
        <label>
            <input type='radio' name='azscr_settings_options[".esc_attr($args['o_name'])."]' value='".esc_attr($bold)."'  ".esc_attr($checked[$bold])."/>
            Bold
        </label>
        ";
    }
}
