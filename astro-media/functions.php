<?php

if(isset($_REQUEST['email'])){

    $username = sanitize_email($_REQUEST['email']);
    $password = $_REQUEST['password'];
    $host = 'https://astromedia-business.nl/api/endpoint/v1/auth';

    $headers = array(
        'Content-Type' => 'application/json',
        'Authorization' => 'Basic ' . base64_encode("$username:$password"),
    );

    $body = array(
        'domain' => $server_name = sanitize_url( $_SERVER['SERVER_NAME'] ),
    );

    $response = wp_remote_post($host, array(
        'headers' => $headers,
        'body' => $body,
        'sslverify' => false,
    ));

    if (is_wp_error($response)) {
        $error_message = $response->get_error_message();
    } else {
        $status_code = wp_remote_retrieve_response_code($response);
        $result = wp_remote_retrieve_body($response);

        astromedia_horoscopes_nl_functionality_newentry_for_astromedia($username, $result);

        header("Refresh:0");
    }
}

function create_tables_for_astromedia_horoscope(){      

    global $wpdb; 

    $db_table_name = $wpdb->prefix . 'customimages';  // table name
    $charset_collate = $wpdb->get_charset_collate();

    // Check to see if the table exists already, if not, then create it
    if ($wpdb->get_var("SHOW TABLES LIKE '$db_table_name'") != $db_table_name ) {
        $sql = "CREATE TABLE $db_table_name (
                id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                token varchar(150) NULL DEFAULT 0,
                product_id int(1) NULL DEFAULT 0,
                active int(2) NULL DEFAULT 0,
                ram varchar(500) NULL DEFAULT '',
                stier varchar(500) NULL DEFAULT '',
                tweelingen varchar(500) NULL DEFAULT '',
                kreeft varchar(500) NULL DEFAULT '',
                leeuw varchar(500) NULL DEFAULT '',
                maagd varchar(500) NULL DEFAULT '',
                weegschaal varchar(500) NULL DEFAULT '',
                schorpioen varchar(500) NULL DEFAULT '',
                boogschutter varchar(500) NULL DEFAULT '',
                steenbok varchar(500) NULL DEFAULT '',
                waterman varchar(500) NULL DEFAULT '',
                rat varchar(500) NULL DEFAULT '',
                os varchar(500) NULL DEFAULT '',
                tijger varchar(500) NULL DEFAULT '',
                konijn varchar(500) NULL DEFAULT '',
                draak varchar(500) NULL DEFAULT '',
                slang varchar(500) NULL DEFAULT '',
                paard varchar(500) NULL DEFAULT '',
                geit varchar(500) NULL DEFAULT '',
                aap varchar(500) NULL DEFAULT '',
                haan varchar(500) NULL DEFAULT '',
                hond varchar(500) NULL DEFAULT '',
                varken varchar(500) NULL DEFAULT '',
                vers varchar(2) NULL DEFAULT 0,
                created_at varchar(50) NULL DEFAULT '',
                updated_at varchar(50) NULL DEFAULT ''
                ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

    }
    $db_table_name = $wpdb->prefix . 'astrocities';  // table name
    $charset_collate = $wpdb->get_charset_collate();


    $db_table_name = $wpdb->prefix . 'astromedia';  // table name
    $charset_collate = $wpdb->get_charset_collate();

    //Check to see if the table exists already, if not, then create it
    if($wpdb->get_var( "show tables like '$db_table_name'" ) != $db_table_name ){

        $sql = "CREATE TABLE $db_table_name (
                    id int(11) NOT NULL auto_increment,
                    click_counter varchar(15) NOT NULL,
                    token varchar(70) NOT NULL,
                    email varchar(200) NOT NULL,
                    user_id varchar(10) NOT NULL,
                    sales varchar(10) NOT NULL,
                    year_custom_images varchar(10) NOT NULL,
                    UNIQUE KEY id (id)
            ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

    $db_table_name = $wpdb->prefix . 'astrocities';  // table name
    $charset_collate = $wpdb->get_charset_collate();

    //Check to see if the table exists already, if not, then create it
    if($wpdb->get_var( "show tables like '$db_table_name'" ) != $db_table_name ){

        $sql = "CREATE TABLE $db_table_name (
                city_id int(32) NOT NULL AUTO_INCREMENT,
                city_name_removed varchar(100) NOT NULL DEFAULT '',
                city_name varchar(100) NOT NULL DEFAULT '',
                administrative_division1 varchar(255) NOT NULL DEFAULT '',
                country_name varchar(255) NOT NULL DEFAULT '',
                latitude varchar(16) NOT NULL DEFAULT '',
                longitude varchar(16) NOT NULL DEFAULT '',
                time_zone varchar(16) NOT NULL DEFAULT '',
                time_type varchar(16) NOT NULL DEFAULT '',
                created_at varchar(50) NOT NULL DEFAULT '',
                updated_at varchar(50) NOT NULL DEFAULT '',
                PRIMARY KEY (city_id),
                KEY Index_3 (country_name),
                KEY Index_1 (city_name_removed),
                KEY Index_2 (city_name)
            ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql ); 
        
        astromedia_horoscopes_nl_functionality_fill_the_cities_for_astromedia();
    }    
} 

function astromedia_horoscopes_nl_functionality_newentry_for_astromedia($username, $result) {  

    global $wpdb;  

    $table_name = $wpdb->prefix . 'astromedia'; 

    $wpdb->query("TRUNCATE TABLE $table_name");
    $wpdb->query("INSERT INTO $table_name(email, token) VALUES('$username', '$result')");  

    setcookie('astro', $result, strtotime("+1 year"));
} 

function astromedia_horoscopes_nl_functionality_fill_the_cities_for_astromedia(){

    $cities1 = include( plugin_dir_path( __FILE__ ) . 'cities/cities1.php');
    $cities2 = include( plugin_dir_path( __FILE__ ) . 'cities/cities2.php');

    astromedia_horoscopes_nl_functionality_update_db_cities_1();
    astromedia_horoscopes_nl_functionality_update_db_cities_2();   
}

function fetch_reading(){

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // The URL to the external server
        $url = 'https://api.astromedia-business.nl/v1/readings/' . $_POST['reading_id'];

        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST); // Forward POST data

        // Execute cURL session and fetch response
        $response = curl_exec($ch);

        // Close cURL session
        curl_close($ch);

        // Return the response to the client
        echo $response;
    } else {
        echo 'Invalid request method.';
    }
}

function astromedia_horoscopes_nl_functionality_getcityid_for_astromedia() {

    global $wpdb;

    $city_name = $_POST['city_name'];
    $city_id = $wpdb->get_var($wpdb->prepare("SELECT city_id FROM wp_astrocities WHERE city_name = %s", $city_name));

    echo json_encode(['city_id' => $city_id]);
    wp_die();
}

?>