<?php
/**************************************************************************
FoxyPress provides a complete shopping cart and inventory management tool 
for use with FoxyCart's e-commerce solution.
Copyright (C) 2008-2014 WebMovement, LLC - View License Information - FoxyPress.php
**************************************************************************/

$root = dirname(dirname(dirname(dirname(__FILE__))));
require_once($root.'/wp-config.php');
require_once($root.'/wp-includes/wp-db.php');

if(!class_exists('WP_List_Table')){
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Foxypress_customer_management extends WP_List_Table 
{
    
    function __construct(){
        global $status, $page;
                
        //Set parent defaults
        parent::__construct( array(
            'singular'  => 'customer',
            'plural'    => 'customers',
            'ajax'      => false
        ) );
    }

    function foxypress_FixGetVar($variable, $default = 'management')
    {
        $value = $default;
        if(isset($_GET[$variable]))
        {
            $value = trim($_GET[$variable]);
            if(get_magic_quotes_gpc())
            {
                $value = stripslashes($value);
            }
            $value = mysql_real_escape_string($value);
        }
        return $value;
    }

    function foxypress_FixPostVar($variable, $default = '')
    {
        $value = $default;
        if(isset($_POST[$variable]))
        {
            $value = trim($_POST[$variable]);
            $value = mysql_real_escape_string($value);
        }
        return $value;
    }

    // Page Default
    function column_default($item, $column_name)
    {
        switch($column_name){
            case 'test':
            default:
                return print_r($item,true);
        }
    }
    
    /** ************************************************************************
     * Main page customer management columns
     * 
     * @see WP_List_Table::::single_row_columns()
     * @param array $item A singular item (one full row's worth of data)
     * @return string Text to be placed inside the column <td>
     **************************************************************************/
    function column_management_customer($item)
    {

        //Build row actions
        $actions = array(
            'view_customer' => sprintf('<a href="?post_type=' . FOXYPRESS_CUSTOM_POST_TYPE . '&page=%s&mode=%s&customer_id=%s">' . __('View Details', 'foxypress') . '</a>',filter($_REQUEST['page']),'view_customer',$item->id)
        );
        
        //Return the title contents
        return sprintf('%1$s <span style="color:silver">(id:%2$s)</span>%3$s',
            /*$1%s*/ $item->user_nicename,
            /*$2%s*/ $item->customer_id,
            /*$3%s*/ $this->row_actions($actions)
        );
    }

    function column_management_first_name($item)
    {
        return sprintf('%1$s', $item->first_name
        );
    }

    function column_management_last_name($item)
    {
        return sprintf('%1$s',
            /*$1%s*/ $item->last_name
        );
    }
    
    function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="%1$s[]" value="%2$s" />',
            /*$1%s*/ $this->_args['singular'],
            /*$2%s*/ $item->id
        );
    } 

    /** ************************************************************************
     * 
     * 
     **************************************************************************/
    function get_columns($mode)
    {
        $columns = array(
            'management_customer_id'          => __('Customer', 'foxypress'),
            'management_first_name'         => __('First Name', 'foxypress'),
            'management_last_name'          => __('Last Name', 'foxypress'),
            'management_address'             => __('Address', 'foxypress'),
            'management_phone_number'             => __('Phone Number', 'foxypress'),
            'management_email_address'             => __('Email Address', 'foxypress'),
        );

        return $columns;
    }
    
    function get_sortable_columns($mode)
    {
        $sortable_columns = array(
            'management_customer_id'          => array('management_customer_id',false),     //true means its already sorted
            'management_first_name'         => array('management_first_name',false),
            'management_last_name'          => array('management_last_name',true),
            'management_address'             => array('management_address',false),
            'management_phone_number'   => array('management_phone_number',false),
            'management_email_address' => array('management_email_address', false)
        );
        
        return $sortable_columns;
    }
  
    
    function prepare_items($mode, $order_by = '', $order = '')
    {
        //How many items per page
        $per_page = 20;
        
        $columns = $this->get_columns($mode);
        $sortable = $this->get_sortable_columns($mode);
        
        //$this->_column_headers = array($columns, $hidden, $sortable);

        /*if ($mode === 'management')
        {*/
            if (!$order) {
                $sort_order = 'ASC';
            } else {
                $sort_order = strtoupper($order);
            }

            if ($order_by === 'management_customer_id')
            {
                $sort_by = 'customer_id ' . $sort_order;
            }
            else if ($order_by === 'management_first_name')
            {
                $sort_by = 'customer_first_name ' . $sort_order;
            }
            else if ($order_by === 'management_address')
            {
                $sort_by = 'customer_last_name ' . $sort_order;
            }
            else if ($order_by === 'management_phone_number')
            {
                $sort_by = 'customer_phone ' . $sort_order;
            }
            else if ($order_by === 'management_email_address')
            {
                $sort_by = 'customer_email ' . $sort_order;
            }
            else
            {
                $sort_by = 'customer_last_name ASC';
            }

            $data = getAllCustomers();
            $customersData = $data->customers->customer;
        //}
        
        $current_page = $this->get_pagenum();
        
        $total_items = $data->statistics->total_customers;
        
        $data = array_slice($customersData,(($current_page-1)*$per_page),$per_page);
        
        $this->items = $data;
        
        $this->set_pagination_args( array(
            'total_items' => $total_items,                  //WE have to calculate the total number of items
            'per_page'    => $per_page,                     //WE have to determine how many items to show on a page
            'total_pages' => ceil($total_items/$per_page)   //WE have to calculate the total number of pages
        ));
    }

    function getCustomer($id)
    {
        if(!is_numeric($id))
            break;

        $remoteDomain = get_option('foxycart_remote_domain');
        if($remoteDomain){
        	$foxyStoreURL = get_option('foxycart_storeurl');
        }else{
        	$foxyStoreURL = get_option('foxycart_storeurl') . ".foxycart.com";
        }
        $foxyAPIURL = "https://" . $foxyStoreURL . "/api";
        $foxyData = array();
        $foxyData["api_token"] = get_option('foxycart_apikey');
        $foxyData["api_action"] = "customer_get";
        $foxyData['customer_id'] = $id;
         
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $foxyAPIURL);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $foxyData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);

        $response = trim(curl_exec($ch));
         

        if ($response == false)
        {
          return null;
        }
        else
        {
            $foxyXMLResponse = simplexml_load_string($response, NULL, LIBXML_NOCDATA);
            var_dump($foxyXMLResponse);

            $customer = array(
                        'first_name' => $foxyXMLResponse['first_name']
                        );
            return $customer;
        }
    }

	function getAllCustomers()
	{
		$remoteDomain = get_option('foxycart_remote_domain');
		if($remoteDomain){
			$foxyStoreURL = get_option('foxycart_storeurl');
		}else{
			$foxyStoreURL = get_option('foxycart_storeurl') . ".foxycart.com";
		}
		$foxyAPIURL = "https://" . $foxyStoreURL . "/api";
		$foxyData = array();
		$foxyData["api_token"] = get_option('foxycart_apikey');
		$foxyData["api_action"] = "customer_list";

        if(isset($_POST['clear_filter']))
        {
            //do nothing special..
        }
        else if(isset($_POST['filter_term']) && isset($_POST['filter']))
        {
            $selected_filter = $_POST['filter'];
            $foxyData[$selected_filter . '_filter'] = '*' . $_POST['filter_term'] . '*';
        }
         
		 
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $foxyAPIURL);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $foxyData);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_TIMEOUT, 15);
		// If you get SSL errors, you can uncomment the following, or ask your host to add the appropriate CA bundle
		// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = trim(curl_exec($ch));
		 

		if ($response == false)
		{
		  return null;
		}
		else
		{
            $customers = array();
		  $foxyXMLResponse = simplexml_load_string($response, NULL, LIBXML_NOCDATA);
         // var_dump($foxyXMLResponse);
          foreach ($foxyXMLResponse->customers->customer as $customer) 
          {
            $customer = array('customer_id' => $customer->customer_id,
                            'first_name' => $customer->customer_first_name,
                            'last_name' => $customer->customer_last_name,
                            'address1' => $customer->customer_address1,
                            'address2' => $customer->customer_address2,
                            'city' => $customer->customer_city,
                            'state' => $customer->customer_state,
                            'postal_code' => $customer->customer_postal_code,
                            'phone_number' => $customer->customer_phone,
                            'email_address' => $customer->customer_email
                            );
            array_push($customers, $customer);
            }
        array_push($customers, array('message' => $foxyXMLResponse->messages->message));
          return $customers;
		}
	}
}

function customer_management_page_load() {

    global $wpdb;

    //Create an instance of our package class for customers...
    $fp_customer = new Foxypress_customer_management();
    $mode         = foxypress_FixGetVar('mode');
    $order_by     = foxypress_FixGetVar('orderby');
    $order        = foxypress_FixGetVar('order');
    if($order != "ASC" || $order != "DESC"){
    	$order = "ASC";
    }    

    if ($mode === 'management' || $mode == ''){ 

	//	$fp_customer->prepare_items($mode, $order_by, $order);
		

		$customer_updated = foxypress_FixGetVar('customer_updated');
		if ($customer_updated === 'true') { ?>
			<div class="updated" id="message">
				<p><strong><?php _e('Customer Updated!', 'foxypress'); ?></strong></p>
			</div>
		<?php } 
        if(!$mode || $mode != 'view_customer') { ?>

        <div class="wrap">
            <h3><?php _e('FoxyPress Customer Management', 'foxypress'); ?></h3>

             <form method="post" id="filter_list">
                <input type="text" placeholder="Filter term" name="filter_term" id="filter_term" value="<?php echo (isset($_POST['filter_term'])) ? $_POST['filter_term'] : '' ?>">
                <input type="radio" name="filter" value="customer_id" <?php echo (isset($_POST['filter']) && $_POST['filter'] == 'customer_id') ? 'checked' : '' ?> ><span>ID</span>
                <input type="radio" name="filter" value="customer_email" <?php echo (isset($_POST['filter']) && $_POST['filter'] == 'customer_email') ? 'checked' : '' ?>><span>Email</span>
                <input type="radio" name="filter" value="customer_first_name" <?php echo (isset($_POST['filter']) && $_POST['filter'] == 'customer_first_name') ? 'checked' : '' ?> ><span>First Name</span>
                <input type="radio" name="filter" value="customer_last_name" <?php echo (isset($_POST['filter']) && $_POST['filter'] == 'customer_last_name') ? 'checked' : '' ?> ><span>Last Name</span>

                <input class="button button-primary" type="submit" name="filter_list_submit" id="filter_list_submit" value="Filter List By...">
                <p><input class="button" type="submit" name="clear_filter" id="clear_filter" value="Clear Filter"></p>                
            </form>

            <hr>
            
            <table class="widefat page fixed">
                <thead>
                    <tr>
                        <th class="manage-column" scope="col">Customer ID</th>
                        <th class="manage-column" scope="col">Customer Name</th>
                        <th class="manage-column" scope="col">Street Address</th>
                        <th class="manage-column" scope="col">Phone Number</th>
                        <th class="manage-column" scope="col">Email Address</th>
                        <?php
                            $customers = $fp_customer->getAllCustomers();
                            if(!empty($customers)):
                                    $i = 0;
                                    foreach($customers as $customer) :
                                        $i++; 
                                        if($i < count($customers))
                                            echo ('<tr>
                                                <td>' . $customer['customer_id'] . '<br><a href="' . get_admin_url() . 'edit.php?post_type=' . FOXYPRESS_CUSTOM_POST_TYPE . '&page=order-management&cid=' . $customer['customer_id'] . '">View Order History</a></td>
                                                <td>' . $customer['first_name'] . ' ' . $customer['last_name'] . '</td>
                                                <td>' . $customer['address1'] . '<br>' . $customer['address2'] . '<br>' . $customer['city'] . ',' . $customer['state'] . ' ' . $customer['postal_code'] . '</td>
                                                <td>' . $customer['phone_number'] . '</td>
                                                <td>' . $customer['email_address'] . '</td>
                                                </tr>');
                                    endforeach;
                            endif;
                        ?>
                    </tr>
                </thead>
            </table>
            <?php 
                if($customers[count($customers)-1]['message'] != '')
                    echo '<p class="message">' . $customers[count($customers)-1]['message'] . '</p>';
            ?>
        </div>			
    <?php } else if ($mode === 'view_customer') {
		$item = $_GET['customer_id'];

		if(empty($item)){
			$destination_url = get_admin_url() . sprintf('edit.php?post_type=' . FOXYPRESS_CUSTOM_POST_TYPE . '&page=%s&action=error',filter($_REQUEST['page']),'customer-management');
			echo 'Invalid Customer ID...';
			echo '<script type="text/javascript">window.location.href = \'' . $destination_url . '\'</script>';
		}
		
    ?>
		<div class="wrap">
            
            <div id="icon-users" class="icon32"><br/></div>
            <h2><?php _e('FoxyPress Customer Details', 'foxypress'); ?></h2>

           

            <?php
                if(isset($_GET['customer_id']))
                    $customer = $fp_customer->getCustomer($_GET['customer_id']);

                if($customer == null)
                    echo '<p>No such customer</p>';
                else {
                    var_dump($customer);
            ?>
			<form id="customer_list" method="POST">

                <p><label for="customer_id">Customer ID:</label>
                <input type="text" name="customer_id" id="customer_id" value="" disabled></p>
                
               <p><label for="first_name">First Name:</label>
                <input type="text" name="first_name" value="<?php echo $customer['first_name']; ?>"></p>

                <p><label for="last_name">Last Name:</label>
                <input type="text" name="last_name"></p>
			
			  <p class="submit"><input type="submit" value="<?php _e('Save Customer', 'foxypress'); ?>" class="button-primary" id="customer_save_submit" name="customer_save_submit"></p>
			</form>
            <?php } ?>
		</div>
	<?php }
    } 
   
}