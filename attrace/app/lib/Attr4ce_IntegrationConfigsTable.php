<?php


/*************************** LOAD THE BASE CLASS *******************************
 *******************************************************************************
 * The WP_List_Table class isn't automatically available to plugins, so we need
 * to check if it's available and load it if necessary. In this tutorial, we are
 * going to use the WP_List_Table class directly from WordPress core.
 *
 * IMPORTANT:
 * Please note that the WP_List_Table class technically isn't an official API,
 * and it could change at some point in the distant future. Should that happen,
 * I will update this plugin with the most current techniques for your reference
 * immediately.
 *
 * If you are really worried about future compatibility, you can make a copy of
 * the WP_List_Table class (file path is shown just below) to use and distribute
 * with your plugins. If you do that, just remember to change the name of the
 * class to avoid conflicts with core.
 *
 * Since I will be keeping this tutorial up-to-date for the foreseeable future,
 * I am going to work with the copy of the class provided in WordPress core.
 */

use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Controller\IntegrationConfigController;
use Attrace\Connector\API\Model\ConfigModel;
use Attrace\Connector\API\Model\IntegrationConfigModel;
use Attrace\Connector\Protocol\Integrations\RedirectUrl;
use Attrace\Connector\Protocol\Integrations\RootActionConfig;
use Attrace\Connector\Util\NetUtil;
use Attrace\Connector\Util\Network;

if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}


/************************** CREATE A PACKAGE CLASS *****************************
 *******************************************************************************
 * Create a new list table package that extends the core WP_List_Table class.
 * WP_List_Table contains most of the framework for generating the table, but we
 * need to define and override some methods so that our data can be displayed
 * exactly the way we need it to be.
 *
 * To display this example on a page, you will first need to instantiate the class,
 * then call $yourInstance->prepare_items() to handle any data manipulation, then
 * finally call $yourInstance->display() to render the table to the page.
 *
 * Our theme for this list table is going to be movies.
 */
class Attr4ce_IntegrationConfigsTable extends WP_List_Table
{

    const HASH_LENGTH = 12;
    const URL_LENGTH  = 80;
    const VERIFY_TEXT = 'Check on explorer';

    private static $explorer_url;
    /** @var IntegrationConfigModel[] */
    private static $integrationConfigs;

    private static $settings;


    /** ************************************************************************
     * REQUIRED. Set up a constructor that references the parent constructor. We
     * use the parent reference to set some default configs.
     ***************************************************************************/
    function __construct()
    {
        global $status, $page;

        self::$integrationConfigs = IntegrationConfigController::getInstance()->getAll();


        //Set parent defaults
        parent::__construct(array(
            'singular' => 'Integration config', //singular name of the listed records
            'plural'   => 'Integration configs', //plural name of the listed records
            'ajax'     => false //should this table support ajax?
        ));
    }


    static function getExplorerUrl($network)
    {
        return $network == 'testnet' ? 'https://explorer.testnet.attrace.com/' : 'https://explorer.attrace.com/';
    }


    /** ************************************************************************
     * Recommended. This method is called when the parent class can't find a method
     * specifically build for a given column. Generally, it's recommended to include
     * one method for each column you want to render, keeping your package class
     * neat and organized. For example, if the class needs to process a column
     * named 'campaign_id', it would first see if a method named $this->column_title()
     * exists - if it does, that method will be used. If it doesn't, this one will
     * be used. Generally, you should try to use custom column methods as much as
     * possible.
     *
     * Since we have defined a column_title() method later on, this method doesn't
     * need to concern itself with any column with a name of 'campaign_id'. Instead, it
     * needs to handle everything else.
     *
     * For more detailed insight into how columns are handled, take a look at
     * WP_List_Table::single_row_columns()
     *
     * @param array $item A singular item (one full row's worth of data)
     * @param array $column_name The name/slug of the column to be processed
     * @return string Text or HTML to be placed inside the column <td>
     **************************************************************************/
    function column_default($item, $column_name)
    {
        switch ($column_name) {
            default:
                return print_r($item, true); //Show the whole array for troubleshooting purposes
        }
    }


    /** ************************************************************************
     * Recommended. This is a custom column method and is responsible for what
     * is rendered in any column with a name/slug of 'title'. Every time the class
     * needs to render a column, it first looks for a method named
     * column_{$column_title} - if it exists, that method is run. If it doesn't
     * exist, column_default() is called instead.
     *
     * This example also illustrates how to implement rollover actions. Actions
     * should be an associative array formatted as 'slug'=>'link html' - and you
     * will need to generate the URLs yourself. You could even ensure the links
     *
     *
     * @param IntegrationConfigModel $item A singular item (one full row's worth of data)
     * @return string Text to be placed inside the column <td> (movie title only)
     **************************************************************************@see WP_List_Table::::single_row_columns()
     */

    ////CUSTOM DISPLAY FUNCTIONS
    function column_label(IntegrationConfigModel $item)
    {


        //Build row actions
        $actions = array(
            'delete' => sprintf('<a href="?page=%s&action=%s&integration-config=%s">Delete</a>', 'attrace-integration-configs', 'delete', $item->getUniqueKey()),
        );

        //Return the title contents
        return sprintf('%1$s %2$s',
            /*$1%s*/ $item->getProtocolIntegrationConfig()->getName(),
            /*$3%s*/ $this->row_actions($actions)
        );
    }

    function column_type(IntegrationConfigModel $item)
    {
        return ucfirst($item->getProtocolIntegrationConfig()->getRole());
    }

    function column_account(IntegrationConfigModel $item)
    {
        return substr($item->getProtocolIntegrationConfig()->getOperationalKey(), 0, self::HASH_LENGTH) . '...';
    }

    function column_roots(IntegrationConfigModel $item)
    {
        $label = [];
        foreach ($item->getProtocolIntegrationConfig()->getRootActionConfigs() as /** @var RootActionConfig $config */ $rootActionConfig) {
            $redirectUrls = $rootActionConfig->getRedirectUrls();
            /** @var RedirectUrl $redirectUrl */
            foreach ($redirectUrls as $redirectUrl) {
                $label[] = sprintf('<div class="urlRow"><a href="%s" target="_blank">%s</a></div>', $redirectUrl->getUrl(), substr($redirectUrl->getUrl(), 0, self::URL_LENGTH));
            }
        }

        //Return the title contents
        return implode('<br/>', $label);
    }


    function column_agreement(IntegrationConfigModel $item)
    {
        $actions = array(
            'explorer' => $this->link_div(self::getExplorerUrl(Network::getNetwork()) . 'agreements/' . $item->getProtocolIntegrationConfig()->getAgreement(), self::VERIFY_TEXT),
        );
        try {
            $confirmedSpan = $item->getAgreement()->allPartiesConfirmed() ? '<span class="dashicons dashicons-yes" style="color: green"></span>' : '<span class="dashicons dashicons-no" style="color: red"></span>';
        } catch (\Attrace\Connector\Exceptions\AttraceException $e) {
            $confirmedSpan = '<span class="dashicons dashicons-editor-help" style="color: grey"></span>';
        }
        return sprintf('<div title="%s">%s %s</div>' . $this->row_actions($actions), $item->getProtocolIntegrationConfig()->getAgreement(), $confirmedSpan, substr($item->getProtocolIntegrationConfig()->getAgreement(), 0, self::HASH_LENGTH) . '...');
    }


    function column_shortcode(IntegrationConfigModel $item)
    {
        if ($item->getProtocolIntegrationConfig()->getRole() == 'advertiser') {
            return "n/a";
        }

        $return = "";
        foreach ($item->getProtocolIntegrationConfig()->getRootActionConfigs() as /** @var RootActionConfig $config */ $rootActionConfig) {
            $redirectUrls = $rootActionConfig->getRedirectUrls();
            /** @var RedirectUrl $redirectUrl */
            foreach ($redirectUrls as $redirectUrl) {
                $return .= sprintf("<div class=\"shortCodeInput\"><input type=text value='[attr_link id=\"%s\" text=\"Text Link\"]' size='20' onclick=\"this.select()\" readonly></div>", $redirectUrl->getAliasId());
            }
        }

        return $return;
    }

    function column_clickout(IntegrationConfigModel $item)
    {
        if ($item->getProtocolIntegrationConfig()->getRole() == 'advertiser') {
            return "n/a";
        }

        $slug   = ConfigController::getInstance()->get(ConfigModel::CLICKOUT_PATH);
        $return = "";
        foreach ($item->getProtocolIntegrationConfig()->getRootActionConfigs() as /** @var RootActionConfig $config */ $rootActionConfig) {
            $redirectUrls = $rootActionConfig->getRedirectUrls();
            /** @var RedirectUrl $redirectUrl */
            foreach ($redirectUrls as $redirectUrl) {
                $return .= $this->getClickoutColumn($slug, $redirectUrl->getAliasId());
            }
        }
        return $return;
    }


    function column_targets($item)
    {
        $label = [];
        foreach ($item['targets'] as $target) {
            $label[] = sprintf('<a href="%s" target="_blank">%s</a>', $target['siteurl'], $target['siteurl']);
        }


        //Return the title contents
        return implode('<br/>', $label);
    }

    private function link_div($link, $text)
    {
        return "<div style='vertical-align:center'><a href='" . esc_url($link) . "' title='Test click out' target='_blank'>" . $text . " <span class=\"dashicons dashicons-external\"></span></a></div>";
    }


    /** ************************************************************************
     * REQUIRED if displaying checkboxes or using bulk actions! The 'cb' column
     * is given special treatment when columns are processed. It ALWAYS needs to
     * have it's own method.
     *
     * @param array $item A singular item (one full row's worth of data)
     * @return string Text to be placed inside the column <td> (movie title only)
     **************************************************************************@see WP_List_Table::::single_row_columns()
     */
    function column_cb($item)
    {

        /** @var  IntegrationConfigModel $integrationConfig */
        $integrationConfig = $item;
        return sprintf(
            '<input type="checkbox" name="%1$s[]" value="%2$s" />',
            /*$1%s*/ $this->_args['singular'],  //Let's simply repurpose the table's singular label ("movie")
            /*$2%s*/ $integrationConfig->getProtocolIntegrationConfig()->getAgreement() //The value of the checkbox should be the record's id
        );
    }


    /** ************************************************************************
     * REQUIRED! This method dictates the table's columns and titles. This should
     * return an array where the key is the column slug (and class) and the value
     * is the column's title text. If you need a checkbox for bulk actions, refer
     * to the $columns array below.
     *
     * The 'cb' column is treated differently than the rest. If including a checkbox
     * column in your table you must create a column_cb() method. If you don't need
     * bulk actions or checkboxes, simply leave the 'cb' entry out of your array.
     *
     * @return array An associative array containing column information: 'slugs'=>'Visible Titles'
     **************************************************************************@see WP_List_Table::::single_row_columns()
     */
    function get_columns()
    {
        $columns = array(
            'cb'        => '<input type="checkbox" />', //Render a checkbox instead of text
            'label'     => 'Name',
            'agreement' => 'Agreement',
            'type'      => 'Type',
            'account'   => 'Account',
            'roots'     => 'Actions',
            'shortcode' => 'Shortcode',
            'clickout'  => 'Click-out URL'
        );
        return $columns;
    }


    /** ************************************************************************
     * Optional. If you want one or more columns to be sortable (ASC/DESC toggle),
     * you will need to register it here. This should return an array where the
     * key is the column that needs to be sortable, and the value is db column to
     * sort by. Often, the key and value will be the same, but this is not always
     * the case (as the value is a column name from the database, not the list table).
     *
     * This method merely defines which columns should be sortable and makes them
     * clickable - it does not handle the actual sorting. You still need to detect
     * the ORDERBY and ORDER querystring variables within prepare_items() and sort
     * your data accordingly (usually by modifying your query).
     *
     * @return array An associative array containing all the columns that should be sortable: 'slugs'=>array('data_values',bool)
     **************************************************************************/
    function get_sortable_columns()
    {
        $sortable_columns = array(
            'label'     => array('label', false),
            'account'   => array('account', false),
            'agreement' => array('agreement', false),
            'type'      => array('type', false),

        );
        return $sortable_columns;
    }


    /** ************************************************************************
     * Optional. If you need to include bulk actions in your list table, this is
     * the place to define them. Bulk actions are an associative array in the format
     * 'slug'=>'Visible Title'
     *
     * If this method returns an empty value, no bulk action will be rendered. If
     * you specify any bulk actions, the bulk actions box will be rendered with
     * the table automatically on display().
     *
     * Also note that list tables are not automatically wrapped in <form> elements,
     * so you will need to create those manually in order for bulk actions to function.
     *
     * @return array An associative array containing all the bulk actions: 'slugs'=>'Visible Titles'
     **************************************************************************/
    function get_bulk_actions()
    {
        $actions = array(
            'delete' => 'Delete'
        );
        return $actions;
    }


    /** ************************************************************************
     * Optional. You can handle your bulk actions anywhere or anyhow you prefer.
     * For this example package, we will handle it in the class to keep things
     * clean and organized.
     *
     * @see $this->prepare_items()
     **************************************************************************/
    function process_bulk_action()
    {

        //Detect when a bulk action is being triggered...
        if ('delete' === $this->current_action()) {

            if (!isset($_REQUEST['integration-config'])) { //input checked
                return;
            }
            $id = sanitize_text_field($_REQUEST['integration-config']); //input checked
            IntegrationConfigController::getInstance()->delete($id);
            self::$integrationConfigs = IntegrationConfigController::getInstance()->getAll();
        }

    }


    /** ************************************************************************
     * REQUIRED! This is where you prepare your data for display. This method will
     * usually be used to query the database, sort and filter the data, and generally
     * get it ready to be displayed. At a minimum, we should set $this->items and
     * $this->set_pagination_args(), although the following properties and methods
     * are frequently interacted with here...
     *
     * @global WPDB $wpdb
     * @uses $this->_column_headers
     * @uses $this->items
     * @uses $this->get_columns()
     * @uses $this->get_sortable_columns()
     * @uses $this->get_pagenum()
     * @uses $this->set_pagination_args()
     **************************************************************************/
    function prepare_items()
    {

        /**
         * First, lets decide how many records per page to show
         */
        $per_page = 10;


        /**
         * REQUIRED. Now we need to define our column headers. This includes a complete
         * array of columns to be displayed (slugs & titles), a list of columns
         * to keep hidden, and a list of columns that are sortable. Each of these
         * can be defined in another method (as we've done here) before being
         * used to build the value for our _column_headers property.
         */
        $columns  = $this->get_columns();
        $hidden   = array();
        $sortable = $this->get_sortable_columns();


        /**
         * REQUIRED. Finally, we build an array to be used by the class for column
         * headers. The $this->_column_headers property takes an array which contains
         * 3 other arrays. One for all columns, one for hidden columns, and one
         * for sortable columns.
         */
        $this->_column_headers = array($columns, $hidden, $sortable);


        /**
         * Optional. You can handle your bulk actions however you see fit. In this
         * case, we'll handle them within our package just to keep things clean.
         */
        $this->process_bulk_action();


        /**
         * Instead of querying a database, we're going to fetch the example data
         * property we created for use in this plugin. This makes this example
         * package slightly different than one you might build on your own. In
         * this example, we'll be using array manipulation to sort and paginate
         * our data. In a real-world implementation, you will probably want to
         * use sort and pagination data to build a custom query instead, as you'll
         * be able to use your precisely-queried data immediately.
         */
        $data = array_values(array_values(self::$integrationConfigs));


        /**
         * This checks for sorting input and sorts the data in our array accordingly.
         *
         * In a real-world situation involving a database, you would probably want
         * to handle sorting by passing the 'orderby' and 'order' values directly
         * to a custom query. The returned data will be pre-sorted, and this array
         * sorting technique would be unnecessary.
         * @param IntegrationConfigModel $a
         * @param IntegrationConfigModel $b
         * @return int|lt
         */
        function usort_reorder(IntegrationConfigModel $a, IntegrationConfigModel $b)
        {
            $orderby = (!empty($_REQUEST['orderby'])) ? sanitize_sql_orderby($_REQUEST['orderby']) : 'Name';   //input checked
            $order   = (!empty($_REQUEST['order'])) ? sanitize_sql_orderby($_REQUEST['order']) : 'asc';        //input checked


            $result = strcmp($a->toArray()[$orderby], $b->toArray()[$orderby]); //Determine sort order
            return ($order === 'asc') ? $result : -$result;                     //Send final sort direction to usort
        }

        usort($data, 'usort_reorder');


        /***********************************************************************
         * ---------------------------------------------------------------------
         * vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
         *
         * In a real-world situation, this is where you would place your query.
         *
         * For information on making queries in WordPress, see this Codex entry:
         * http://codex.wordpress.org/Class_Reference/wpdb
         *
         * ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
         * ---------------------------------------------------------------------
         **********************************************************************/


        /**
         * REQUIRED for pagination. Let's figure out what page the user is currently
         * looking at. We'll need this later, so you should always include it in
         * your own package classes.
         */
        $current_page = $this->get_pagenum();

        /**
         * REQUIRED for pagination. Let's check how many items are in our data array.
         * In real-world use, this would be the total number of items in your database,
         * without filtering. We'll need this later, so you should always include it
         * in your own package classes.
         */
        $total_items = count($data);


        /**
         * The WP_List_Table class does not handle pagination for us, so we need
         * to ensure that the data is trimmed to only the current page. We can use
         * array_slice() to
         */
        $data = array_slice($data, (($current_page - 1) * $per_page), $per_page);


        /**
         * REQUIRED. Now we can add our *sorted* data to the items property, where
         * it can be used by the rest of the class.
         */
        $this->items = $data;


        /**
         * REQUIRED. We also have to register our pagination options & calculations.
         */
        $this->set_pagination_args(array(
            'total_items' => $total_items,                  //WE have to calculate the total number of items
            'per_page'    => $per_page,                     //WE have to determine how many items to show on a page
            'total_pages' => ceil($total_items / $per_page)   //WE have to calculate the total number of pages
        ));
    }

    /**
     * @param $slug
     * @param $hash
     * @param $return
     * @return string
     */
    private function getClickoutColumn($slug, $hash)
    {
        $link = sprintf('%s/%s/%s', NetUtil::getDomainUrl(false), $slug, $hash);
        if (ConfigController::getInstance()->get(ConfigModel::PROFILING_LEVEL) == ConfigModel::PROFILING_LEVEL_ALL) {
            $actions = array(
                'clickout' => $this->link_div($link . '?debug=true', 'DEBUG this click-out'),
            );

        } else {
            $actions = array(
                'clickout' => $this->link_div($link, 'Test this click-out'),
            );
        }
        return "<input type=text value='" . esc_url($link) . "' size='20' onclick=\"this.select()\" dir=\"rtl\" readonly>" . $this->row_actions($actions);
    }


}
