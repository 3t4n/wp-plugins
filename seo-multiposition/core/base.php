<?php

function rs_add_unlock_status()
{
	add_option('seo_multi_position_unlock_status',0,'','no');
}

function rs_activated()
{
	global $wpdb;

	//creo variabile per il file di backup
	$bkp_file = '';

	//imposto una variabile che indica che il file non è stato trovato
	$bkp_found = false;

	//cerco se esiste la directory di backup
	if ( file_exists( dirname( dirname( __DIR__ ) ) . "/bkp" ) )
	{
		//prendo tutti i file nella directory
		$bkp_files = scandir( dirname( dirname( __DIR__ ) ) . '/bkp' );

		if ( count( $bkp_files ) > 2 )
		{
			//elimino dai file la directory attuale '.' e la directory genitore '..'
			array_splice( $bkp_files, 0, 2 );

			if ( count( $bkp_files ) == 1 )
			{
				$bkp_file = $bkp_files[0];
				//indico che il file è stato trovato
				$bkp_found = true;
			}
			else
			{
				//bonifico i nomi dei file togliendo il trattino
				for ( $i = 0; $i < count( $bkp_files ); $i ++ )
				{
					$bkp_files[ $i ] = str_replace( array( "-", ".txt" ), "", $bkp_files[ $i ] );
				}

				//trovo il file più recente
				$bkp_file = max( $bkp_files );
				$bkp_file = substr( $bkp_file, 0, 4 ) . '-' . substr( $bkp_file, 4, 2 ) . '-' . substr( $bkp_file, 6, 2 ) . '-' . substr( $bkp_file, 8, 2 ) . '-' . substr( $bkp_file, 10, 2 ) . '-' . substr( $bkp_file, 12, 2 ) . '.txt';
				//Indico che il file è stato trovato
				$bkp_found = true;
			}

		}

	}

	$pref                           = $wpdb->prefix;
	$your_table_name                = $pref . 'seo_multi_position';
	$your_table_name_list           = $pref . 'seo_multi_position_list';
	$your_table_name_list_attr      = $pref . 'seo_multi_position_list_attr';
	$your_table_name_list_municipal = $pref . 'seo_multi_position_list_municipal';
	$your_table_name_list_brand     = $pref . 'seo_multi_position_list_brand';
	$your_table_name_list_utility   = $pref . 'seo_multi_position_list_utility';
	$your_table_name_unlock_code    = $pref . 'seo_multi_position_unlock_code';

	// create the ECPT metabox database table
	if ( $wpdb->get_var( "show tables like '$your_table_name'" ) != $your_table_name )
	{
		$sql = "
				CREATE TABLE {$your_table_name} ( id mediumint(9) NOT NULL PRIMARY KEY AUTO_INCREMENT, page_id mediumint(9) NOT NULL, sub_page mediumint(9) NOT NULL, province VARCHAR(125), municipal VARCHAR(125), brand VARCHAR(125), utility VARCHAR(125) );
				CREATE TABLE {$your_table_name_list} ( id mediumint(9) NOT NULL PRIMARY KEY AUTO_INCREMENT, title VARCHAR(125) );
				CREATE TABLE {$your_table_name_list_attr} ( id mediumint(9) NOT NULL PRIMARY KEY AUTO_INCREMENT, title VARCHAR(125), id_list mediumint(9) );
				CREATE TABLE {$your_table_name_list_municipal} ( id mediumint(9) NOT NULL PRIMARY KEY AUTO_INCREMENT, title VARCHAR(125), province VARCHAR(125) NOT NULL, nation VARCHAR(125) NOT NULL );
				CREATE TABLE {$your_table_name_list_brand} ( id mediumint(9) NOT NULL PRIMARY KEY AUTO_INCREMENT, title VARCHAR(125) );
				CREATE TABLE {$your_table_name_list_utility} ( id mediumint(9) NOT NULL PRIMARY KEY AUTO_INCREMENT, title VARCHAR(125) );
                CREATE TABLE {$your_table_name_unlock_code} ( code mediumint(9) NOT NULL PRIMARY KEY );
			);";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

		//controllo se è stato trovato un file di backup
		if ( $bkp_found )
		{
			//apro il file di backup
			$input_filepath = dirname( dirname( __DIR__ ) ) . "/bkp//" . $bkp_file;
			$input_handle   = fopen( $input_filepath, 'r' );

			//per ogni riga prendo i valori
			while ( ( $bkp_row = fgets( $input_handle ) ) != false )
			{
				$bkp_id  = strstr( $bkp_row, ',', true );
				$bkp_row = substr_replace( $bkp_row, '', 0, ( strlen( $bkp_id ) + 1 ) );

				$bkp_page_id = strstr( $bkp_row, ',', true );
				$bkp_row     = substr_replace( $bkp_row, '', 0, ( strlen( $bkp_page_id ) + 1 ) );

				$bkp_sub_page = strstr( $bkp_row, ',', true );
				$bkp_row      = substr_replace( $bkp_row, '', 0, ( strlen( $bkp_sub_page ) + 1 ) );

				$bkp_province = strstr( $bkp_row, ',', true );
				if ( $bkp_province == '' )
				{
					$bkp_province = null;
				}

				$bkp_row = substr_replace( $bkp_row, '', 0, ( strlen( $bkp_province ) + 1 ) );

				$bkp_municipal = strstr( $bkp_row, ',', true );
				if ( $bkp_municipal == '' )
				{
					$bkp_municipal = null;
				}

				$bkp_row = substr_replace( $bkp_row, '', 0, ( strlen( $bkp_municipal ) + 1 ) );

				$bkp_brand = strstr( $bkp_row, ',', true );
				if ( $bkp_brand == '' )
				{
					$bkp_brand = null;
				}

				$bkp_row = substr_replace( $bkp_row, '', 0, ( strlen( $bkp_brand ) + 1 ) );

				$bkp_utility = strstr( $bkp_row, ',', true );
				if ( $bkp_utility == '' )
				{
					$bkp_utility = null;
				}

				$bkp_row = substr_replace( $bkp_row, '', 0, ( strlen( $bkp_utility ) + 1 ) );

				//controllo se esiste il post per quella riga
				$row_found = $wpdb->query( "SELECT * FROM " . $wpdb->prefix . "posts" . " WHERE ID = " . $bkp_sub_page . ";" );

				if ( $row_found == 1 )
				{
					//creo un array con i valori
					$insert_row = array(
						'id'        => $bkp_id,
						'page_id'   => $bkp_page_id,
						'sub_page'  => $bkp_sub_page,
						'province'  => $bkp_province,
						'municipal' => $bkp_municipal,
						'brand'     => $bkp_brand,
						'utility'   => $bkp_utility
					);

					$insert_format = array(
						'%d',
						'%d',
						'%d',
						'%s',
						'%s',
						'%s',
						'%s',
					);

					$wpdb->insert( $wpdb->prefix . "seo_multi_position", $insert_row, $insert_format );
				}

			}

			// Chiudo il file di backup
			fclose( $input_handle );

		}

	}

}

function rs_deactivate()
{
	global $wpdb;
	/**
	* @deactivated_plugin
	*/
}

function rs_uninstall()
{
	global $wpdb;

	delete_option('seo_multi_position_unlock_status');
	$your_table_name = $wpdb->prefix . 'seo_multi_position';
	$your_table_name_list = $wpdb->prefix . 'seo_multi_position_list';
	$your_table_name_list_attr = $wpdb->prefix . 'seo_multi_position_list_attr';
	$your_table_name_list_municipal = $wpdb->prefix . 'seo_multi_position_list_municipal';
	$your_table_name_list_brand = $wpdb->prefix . 'seo_multi_position_list_brand';
	$your_table_name_list_utility = $wpdb->prefix . 'seo_multi_position_list_utility';
    $your_table_name_unlock_code = $wpdb->prefix . 'seo_multi_position_unlock_code';

    // Build your query
    $Export_Query = $wpdb->get_results("SELECT * FROM {$your_table_name}");

    // Prepare our txt download
    mkdir(dirname(dirname( __DIR__)).'/bkp');

    $filedate = date("Y-m-d-H-i-s");
    $output_filename =  $filedate . ".txt";
    $output_filepath = dirname(dirname( __DIR__)) . "/bkp//" . $output_filename;
    $output_handle = fopen($output_filepath , 'w' );

    // Parse results
    foreach ($Export_Query as $Result)
    {
		  $leadArray = (array) $Result; // Cast the Object to an array
		  // Add row to file
		  fputcsv( $output_handle, $leadArray );
      fwrite( $output_handle, PHP_EOL);
		}

    // Close output file stream
    fclose( $output_handle );

    $sql = "DROP TABLE ". $your_table_name . ", ".$your_table_name_list . ", ".$your_table_name_list_attr . ", ".$your_table_name_list_brand . ", ".$your_table_name_list_utility.", ". $your_table_name_list_municipal.", ".$your_table_name_unlock_code.";" ;
	$wpdb->query($sql);
}


function rs_action_row($actions, $post){
    global $wpdb;

	$dupl = $wpdb->query("SELECT * FROM {$wpdb->prefix}seo_multi_position WHERE page_id='{$post->ID}'");

	if ($post->post_type =="page" && $post->post_status == "draft" && $dupl != 0)
    {
    	$actions['vis_figli'] = '<a href="' . admin_url('edit.php') . '?origin=mps&post_type=page&post_id=' . $post->ID .'">MultiPositionSEO - Pagine Derivate </a>';
        $actions['trash'] = substr_replace($actions['trash'], 'onclick="smp_delete_confirm(event);" ', 3, 0);
    }
    return $actions;
}



function rs_check_delete($ID)
{
	global $wpdb;

	if(get_post_meta($ID, '_duplicate', true))
	{
		$dupl = $wpdb->query("SELECT * FROM {$wpdb->prefix}seo_multi_position WHERE page_id='{$ID}'");
		if($dupl != 0)
		{
			$ids = get_option('dupl_trash', '');
			if($ids != '')
			{
				if(is_array($ids))
				{
					$ids[] = $ID;
				}
				else
				{
					$ids = array($ids, $ID);
				}

			}
			else
			{
				$ids = $ID;
			}
			update_option('dupl_trash', $ids);
		}
	}

}
add_action('trash_page', 'rs_check_delete');

function rs_trash_admin_notice()
{
	$dupl_trash = get_option('dupl_trash', '');

	if($dupl_trash != '')
	{
		?>
		<div class="notice notice-warning is-dismissible">
			<p>
				<?php
				if(is_array($dupl_trash))
				{
					$str = '';

					foreach($dupl_trash as $dupl)
					{
						$dupl_title = substr(get_the_title($dupl), 0, 20) . (strlen(get_the_title($dupl)) > 20 ? ' ...' : '');

						$str .= " '{$dupl_title}', ";
					}
					echo "ATTENZIONE: Esistono delle pagine duplicate con MultiPosition SEO collegate alle pagine {$str} che sono state appena cancellate";
				}
				else
				{
					$dupl_title = substr(get_the_title($dupl_trash), 0, 20) . (strlen(get_the_title($dupl_trash)) > 20 ? ' ...' : '');

					echo "ATTENZIONE: Esistono delle pagine duplicate con MultiPosition SEO collegate alla pagina '{$dupl_title}' che è appena stata cancellata";
				}
				?>
			</p>
		</div>
		<?php
		delete_option('dupl_trash');
	}

}
add_action('admin_notices', 'rs_trash_admin_notice');


function custom_query_list_on_side_wp_admin(){
	global $wpdb, $wp_query;
	if ( is_admin() && isset($_GET['origin']) && $_GET['origin'] == 'mps')
  {
    $wp_query->set('meta_key', '_wp_seo_mp_parent');
    $wp_query->set('meta_value', $_GET['post_id']);
  }
	return $wp_query;

}


function rs_upgrade_function( $upgrader_object, $options )
{
	global $wpdb;
    $smp_plugin_path_name = plugin_basename( __FILE__ );

    if ($options['action'] == 'update' && $options['type'] == 'plugin' )
    {
	    foreach ( $options['plugins'] as $plugin )
	    {
		    if ( $plugin == $smp_plugin_path_name )
		    {
			    $altquery = "ALTER TABLE " . $wpdb->prefix . 'seo_multi_position' . " CHANGE COLUMN word province VARCHAR(125), ADD COLUMN( municipal VARCHAR(125), brand VARCHAR(125), utility VARCHAR(125) ) ;";
			    $wpdb->query( $altquery );
			    $lmquery = "CREATE TABLE " . $wpdb->prefix . 'seo_multi_position_list_municipal' . " ( id mediumint(9) NOT NULL PRIMARY KEY AUTO_INCREMENT, title VARCHAR(125), province VARCHAR(125) NOT NULL, nation VARCHAR(125) NOT NULL );";
			    $wpdb->query( $lmquery );
			    $lbquery = "CREATE TABLE " . $wpdb->prefix . 'seo_multi_position_list_brand' . " ( id mediumint(9) NOT NULL PRIMARY KEY AUTO_INCREMENT, title VARCHAR(125) );";
			    $wpdb->query( $lbquery );
			    $luquery = "CREATE TABLE " . $wpdb->prefix . 'seo_multi_position_list_utility' . " ( id mediumint(9) NOT NULL PRIMARY KEY AUTO_INCREMENT, title VARCHAR(125) ); ";
			    $wpdb->query( $luquery );
			    $ucquery = "CREATE TABLE " . $wpdb->prefix . 'seo_multi_position_unlock_code' . " ( code mediumint(9) NOT NULL PRIMARY KEY ); ";
			    $wpdb->query( $ucquery );
		    }
	    }
    }
}
?>
