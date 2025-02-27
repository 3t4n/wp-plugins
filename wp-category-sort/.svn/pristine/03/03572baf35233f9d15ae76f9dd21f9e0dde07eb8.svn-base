<?php 


function wpCatSort_saveAjax()
        {
            global $wpdb; 
            $taxonomy = stripslashes($_POST['taxonomy']);
            $data = stripslashes($_POST['order']);


            $unserialised_data = unserialize($data);
            if (is_array($unserialised_data))
            foreach($unserialised_data as $key => $values ) 
                {

                    $items = explode("&", $values);
                    unset($item);
                    foreach ($items as $item_key => $item_)
                        {
                            $items[$item_key] = trim(str_replace("item[]=", "",$item_));
                        }
                    
                    if (is_array($items) && count($items) > 0)
                    foreach( $items as $item_key => $term_id ) 
                        {
                            $wpdb->update( $wpdb->terms, array('term_order' => ($item_key + 1)), array('term_id' => $term_id) );
                        } 
                }
                
            do_action('wpCatSortAction/update-order');
                
            die();
        }