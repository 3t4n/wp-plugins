<?php global $oThis; ?>
<div class="wrap">
    <h2><?php echo $appLabel; ?> - Converter</h2>
    <?php
    if (!isset($_GET['post_id'])) {
        echo "You cannot access directly to this page, it must be called from a record to be converted";
    } else {
        $post_id = $_GET['post_id'];
        $action_name = $_GET['action_name'];
        $post_type = $_GET['post-type'];
        $f = $oThis->default_fields[$action_name];
        //  var_dump($oThis->default_fields);
        echo "<h3>" . $f['help'] . "</h3>";

        $do_convert = false;
        if (isset($_GET['sub_action']) and $_GET['sub_action'] == 'do_convert') {
            echo "<p>The record has been converted into the following records. </p>";
            $do_convert = true;
        } else {
            echo "<form action='' method='get'><p>The record will be converted into the following records. Do you agree? <input type='submit' value='Convert' /></p>";
            echo "<input type='hidden' name='action_name' value='" . $action_name . "'/>";
            echo "<input type='hidden' name='page' value='" . $_GET['page'] . "'/>";
            echo "<input type='hidden' name='post-type' value='" . $post_type . "'/>";
            echo "<input type='hidden' name='post_id' value='" . $post_id . "'/>";
            echo "<input type='hidden' name='action-type' value='convert'/>";
            echo "<input type='hidden' name='sub_action' value='do_convert'/>";
            echo "</form>";
        }

        $post = get_post($post_id);
        foreach ($f['field_config']['post_type_targets'] as $target) { ///LOOP THE CONVERT CONFIG OBJECT FOR EACH TARGET = NEW POSTS TO CREATE FRO THE INITIAL POST, WITH DIFFERENT POST TYPES
            //$target_name=$target[0];
            $target_name = $target['target_name'];

            //var_dump($oThis->post_types);
            $module = $oThis->post_types[$target_name];
            if ($oThis->post_types[$target_name] == null) {
                switch($target_name){
                    case 'ff_accounts':
                        echo "<h4>Sorry but the Accounts modules is not existing in this installation.</h4>";
                        break;
                    default:
                        echo "<h4>Sorry but the Contacts modules is not existing in this installation.</h4>";
                        break;
                }

            } else {
                // var_dump($target_name);
                // var_dump($module);
                if ($do_convert) {
                    if (isset($target['target_transform']) and $target['target_transform'] == true) {
                        ///CASE: WE TRANSFORM THE OLD POST TO ANOTHER POST TYPE
                        $newpost = $post;
                        $newpost->post_type = $target_name;
                        wp_update_post($newpost);
                        echo '<div class="apm_one_third"><h3>Convert: A new ' . $module['singular_name'] . ' has been created by transforming the old post, with the following values:</h3>';
                    } else {
                        //CASE: WE CREATE NEW POST(S) WITH NEW POST TYPES, THE INITIAL POST WILL BE DELETED
                        echo '<div class="apm_one_third"><h3>Convert: A new ' . $module['singular_name'] . ' has been created with the following values:</h3>';
                        $newpost_id = wp_insert_post(array('post_title' => __('Auto Draft'), 'post_type' => $target_name, 'post_status' => 'publish'));
                        $newpost = get_post($newpost_id);
                    }

                    //handle the childs conversion to the new post/migrated post.
                    if (isset($target['target_childs'])) {
                        foreach ($target['target_childs'] as $submodule_key => $submodule_infos) {
                            $query = "
							        SELECT      *
							        FROM $wpdb->posts
								LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
								WHERE   $wpdb->posts.post_type = '" . $submodule_infos['module'] . "'
								AND $wpdb->postmeta.meta_key='" . $submodule_infos['original_field'] . $meta_marker . "'
								AND $wpdb->postmeta.meta_value='$post_id'
							";
                            $metaspost_list = $wpdb->get_results($query);
                            if (!empty($metaspost_list)) {
                                foreach ($metaspost_list as $metaspost) {
                                    delete_post_meta($metaspost->ID, $submodule_infos['original_field'] . $meta_marker, $post_id);
                                    add_post_meta($metaspost->ID, $submodule_infos['migrate_to_field'] . $meta_marker, $post_id, true);
                                }
                            }
                        }
                    }
                } else {// else not if($do_convert)
                    echo '<div class="apm_one_third"><h3>Convert: create a new ' . $module['singular_name'] . ' with the following values:</h3>';
                }
                echo "<ul>";

                foreach ($target['target_fields'] as $fieldobj) {  ///START LOOP ALL THE FIELDS OF THE OBJECT TO CONVERT INTO ONE OR MORE POSTS
                    if (is_array($fieldobj)) {
                        $fieldname = $fieldobj['source_fieldname'];
                    } else {
                        $fieldname = $fieldobj;
                    }

                    $field = $oThis->default_fields[$fieldname]; //GET THE CONFIG DEFINITION OF THIS FIELD

                    $field_type = 'textfield';
                    $field_label = $field['label'];
                    if ($field_label == '') {
                        $field_label = $field['hidden_label'];
                    }

                    $field_label = $oThis->get_currency($field_label);
                    // $field_label=str_replace('{{currency}}',  $apm_settings['configs']['default_currency'], $field_label);

                    if (is_array($fieldobj)) {
                        $field_label.=" </br>=>";

                        if ($fieldobj['target_fieldname'] == 'post_title') {
                            $field_label.=" Title ";
                        } else {
                            $subfield = $oThis->default_fields[$fieldobj['target_fieldname']];
                            $field_label.=$subfield['label'];
                        }
                    }

                    if (isset($field['field_type'])) {
                        $field_type = $field['field_type'];
                    }

                    $val = $oThis->get_field_value($field_type, $fieldname, $post);
                    if ($val == '') {
                        $val = '-None-';
                    }
                    if ($fieldname == 'post_title') {
                        $field_label = 'Title';
                        $val = $post->post_title;

                        if ($do_convert) {
                            $newpost->post_title = $val;
                            wp_update_post($newpost);
                            $val = sprintf('<a href="%s"  >%s</a>', esc_url(add_query_arg(array('action' => 'edit', 'post' => $newpost->ID), 'post.php')), $val);
                        } else {
                            $val = sprintf('<a href="%s"  >%s</a>', esc_url(add_query_arg(array('action' => 'edit', 'post' => $post->ID), 'post.php')), $val);
                        }
                    }


                    $val_meta = get_post_meta($post_id, $fieldname . $meta_marker, true);
                    $newfieldname = $fieldname;
                    if (is_array($fieldobj)) {
                        if ($fieldobj['target_fieldname'] == 'post_title') {
                            if ($val == '-None-') {
                                $val = $post->post_title;
                            }
                            if ($do_convert) {
                                $newpost->post_title = $val;
                                wp_update_post($newpost);
                                $val = sprintf('<a href="%s"  >%s</a>', esc_url(add_query_arg(array('action' => 'edit', 'post' => $newpost->ID), 'post.php')), $val);
                            }
                        } else {//find_by_name
                            $newfieldname = $fieldobj['target_fieldname'];
                            if (isset($fieldobj['find_mode'])) {
                                switch ($fieldobj['find_mode']) {
                                    case 'find_id':
                                        $val_meta = get_post_meta($post_id, $fieldname . $meta_marker, true);
                                        break;
                                    case 'find_parent_by_name':
                                        $val_meta = get_post_meta($post_id, $fieldname . $meta_marker, true);
                                        $query = "
									        SELECT      *
									        FROM        $wpdb->posts
									        WHERE       $wpdb->posts.post_title LIKE '$val_meta'
									        AND         $wpdb->posts.post_status = 'publish'
									        ORDER BY    $wpdb->posts.post_title
									";
                                        $posts_list = $wpdb->get_results($query);
                                        $val_meta = $posts_list[0]->ID;

                                        break;
                                    default:

                                        $val_meta = get_post_meta($post_id, $fieldname . $meta_marker, true);
                                        break;
                                }
                            } else {
                                $val_meta = get_post_meta($post_id, $fieldname . $meta_marker, true);
                            }
                        }
                    }
                    if ($do_convert) {
                        update_post_meta($newpost->ID, $newfieldname . $meta_marker, $val_meta);
                    }

                    if ($val == '-None-') {
                        $val = '<span class="apm_none_style">-None-</span>';
                    }
                    echo "<li>";
                    echo '<label class="apm_label_convert">' . $field_label . '</label>: ' . $val . '<br clear="all"/>';
                    echo "</li>";
                }
                echo "</ul>";
                echo '</div>';
            }
        }
        if (isset($f['field_config']['do_trash_original']) and $do_convert == true and $f['field_config']['do_trash_original'] == true) {
            $post->post_status = 'trash';
            wp_update_post($post); //
            echo "<div>The original record has been trashed !</div>";
        }
        ?>

        <br clear="all"/></div>
    <?php
}
?>

<?php





