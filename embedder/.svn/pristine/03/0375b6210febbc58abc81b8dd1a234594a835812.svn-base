<?php
/*  Copyright 2010  Michael J. Walker  (email : mike@moztools.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
    
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (is_admin()) {

    define('EMB_DEFAULT_GROUP', 'Default');
    add_filter('plugin_row_meta', 'emb_add_plugin_links', 10, 4);
    include_once 'emb-admin-manage.php';

    // Only add this action if we're on the index management page.
    // Avoids function getting called unnecessarily.
    if ($_GET['page'] == 'embed-admin') {

        wp_deregister_script('jquery');
        wp_deregister_script('jquery-ui');
        wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js', false);
        wp_register_script('jquery-ui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js', array('jquery'));
        wp_register_script('emb-admin', EMB_PLUGIN_URL.'/emb-admin.js', array('jquery', 'jquery-ui'));
        wp_enqueue_script('emb-admin');

        wp_register_style('emb-admin', EMB_PLUGIN_URL.'/emb-admin.css');
        wp_enqueue_style('emb-admin');

        add_action('init', 'emb_process_requests');
    }
    include_once 'emb-admin-ajax.php';
}


/**
 * Add the Embeds link to plugin page.
 */
function emb_add_plugin_links($meta, $file, $data, $context) {
    if ($file == EMB_PLUGIN_FILE) {
        $link = '<a href="'.EMB_PAGENAME.'">'.__("Manage Embeds").'</a>';
        $meta['embeds'] = $link;
    }
    return $meta;
}

/**
 * Add the manage embeds admin page to the admin menu, and if there
 * was a problem installing this version of Embedder, then hook into
 * the admin_notices action to display the error message.
 */
function emb_add_admin_page() {
    add_options_page('Manage Embeds', 'Embeds', 8, 'embed-admin', 'emb_display_admin_page');
    $error = get_option('emb_plugin_error');
    if (!empty($error)) {
        add_action('admin_notices', 'emb_admin_notices');
    }
}

/**
 * Set up all the available options as keys to an associative array with the values being
 * the description of what each option does.
 *
 * @param $keys if true, create an array of the keys (option names) only
 * @return array of options
 */
function emb_get_options($keys = false) {
    $options = array('before-single-post-content' => 'Before the content of a single post on a page',
                     'after-single-post-content' => 'After the content of a single post on a page',
                     'before-multi-post-content' => 'Before the content of all posts on pages with multiple posts (e.g. the Home Page)', 
                     'after-multi-post-content' => 'After the content of all posts on pages with multiple posts (e.g. the Home Page)',
                     'before-page-content' => 'Before the content of a page with no posts on it', 
                     'after-page-content' => 'After the content of a page with no posts on it',
                     'wrap' => 'Wrap the HTML in a div or span (for extra CSS styling or scripting)',
                     'disabled' => 'Disable the embed so that it doesn\'t appear anywhere in the blog',
                     'allow-in-comments' => 'Allow the embed in comments <i>(Note: Anyone who can add a comment to your blog will be able to use it.)</i>',
    			     'user-function' => 'Call a user-specified function before the embed is used');
    if ($keys) {
        $options = array_keys($options);
    }
    return $options;
}

/**
 * Called when the plugin is activated. Create an empty embed table in the WordPress
 * database, if one does not already exist.  If we are upgrading then we create a
 * wp_emb_upgrade table first and then, if the table is successfully upgraded then
 * we rename it to wp_emb_embeds.  This prevents data loss if something goes badly wrong
 * during the upgrade.
 */
function emb_plugin_activate() {
    global $wpdb;
    emb_trace("fn:emb_plugin_activate : start");
    include_once(ABSPATH.'/wp-admin/includes/upgrade.php');

    $sql = "CREATE TABLE ".EMB_TABLE." ( embed varchar(64) NOT NULL, emgroup varchar(64), description text, value text, options text, data text";
    $sql .= ", PRIMARY KEY(embed)) DEFAULT CHARACTER SET utf8";

    // Create the table
    $created = maybe_create_table(EMB_TABLE, $sql);

    // Adjust the length of the embed field, if necessary.
    $info = $wpdb->get_results("SHOW COLUMNS IN ".EMB_TABLE." LIKE 'embed'");
    if (!empty($info[0]) && $info[0]->Field == 'embed' && $info[0]->Type != 'varchar(64)') {
        $wpdb->query("ALTER TABLE ".EMB_TABLE." MODIFY embed VARCHAR(64)");
    }

    // Add the emgroup column, if necessary.
    $info = $wpdb->get_results("SHOW COLUMNS IN ".EMB_TABLE." LIKE 'emgroup'");
    if (empty($info)) {
        $wpdb->query("ALTER TABLE ".EMB_TABLE." ADD emgroup VARCHAR(64) AFTER embed");
    }
    // Change the default character set for the table to UTF8, if necessary.
    $info = $wpdb->get_results("SHOW TABLE STATUS IN ".DB_NAME." LIKE '".EMB_TABLE."'");
    if (strncmp($info[0]->Collation, 'utf8', 4) != 0) {
        $wpdb->query("ALTER TABLE ".EMB_TABLE." CONVERT TO CHARACTER SET utf8");
    }
    update_option("emb_plugin_version", EMB_PLUGIN_VERSION);
}

/**
 * Called when the plugin is deactivated.  Currently does nothing.
 */
function emb_plugin_deactivate() {
    emb_trace("fn:emb_plugin_deactivate : start");
    emb_trace("fn:emb_plugin_deactivate : end");
}

/**
 * Called when the plugin is uninstalled.  Removes the database table
 * and all the Embedder options.
 */
function emb_plugin_uninstall() {
    require_once(ABSPATH.'wp-admin/includes/plugin.php');
    emb_trace("fn:emb_plugin_uninstall : start");
    global $wpdb;
    deactivate_plugins(EMB_PLUGIN_FILE);
    delete_option('emb_plugin_version');
    delete_option('emb_plugin_error');
    delete_option('emb_sort_index_table');
    delete_option('emb_groups');
    delete_option('emb_new_parser');
    $wpdb->query("DROP TABLE IF EXISTS ".EMB_TABLE);
    emb_trace("fn:emb_plugin_uninstall : end");
}

/**
 * Detect the wp_emb_embeds table to make sure it is present.
 *
 * @return true if the table is found in the blog's database
 */
function emb_is_table_present() {
    global $wpdb;
    return $wpdb->query("DESCRIBE ".EMB_TABLE);
}

/**
 * Check for the first compatible level of the database.
 * Currently we just check to see if the emgroup column
 * is present.
 *
 * @return true if this is a compatible version of the database
 */
function emb_is_compatible_version() {
    global $wpdb;
    return $wpdb->query("DESCRIBE ".EMB_TABLE." emgroup");
}

/**
 * Process the action requested by the user, then redirect to the main indexes admin page.
 * If no action is specified, then skip all processing.
 */
function emb_process_requests() {

    emb_trace('POST keys = '.implode('|', array_keys($_POST)));
    emb_trace('POST vals = '.implode('|', $_POST));
    emb_trace(' GET keys = '.implode('|', array_keys($_GET)));
    emb_trace(' GET vals = '.implode('|', $_GET));

    emb_trace('--- init --------------------------------------------');
    emb_trace('fn:emb_process_requests : start');
    global $emb_req;

    $req = new emb_request();

    emb_trace('fn:emb_process_requests : action = '.$req->action);
    if (!empty($req->action) && ($req->action == 'embed-add-entry' || $req->action == 'embed-update-entry' || $req->action == 'embed-rename-entry'
    || $req->action == 'embed-import-entry' || $req->action == 'embed-copy-entry' || $req->action == 'embed-delete-entry' || $req->action == 'cancel'
    || $req->action == 'embed-enable-entry' || $req->action == 'embed-disable-entry' || $req->action == 'embed-uninstall-plugin'
    || $req->action == 'embed-sort-entries' || $req->action == 'group-expand' || $req->action == 'group-delete' || $req->action == 'group-show-all' || $req->action == 'group-hide-all'
    || $req->action == 'group-add' || $req->action == 'group-rename' || $req->action == 'group-disable' || $req->action == 'group-enable'
                               
    )) {
        $msgno = 0;
        if ($req->action == 'embed-update-entry' || $req->action == 'embed-add-entry'
        || $req->action == 'embed-rename-entry' || $req->action == 'embed-copy-entry'
        || $req->action == 'group-add' || $req->action == 'group-rename'
        ) {

            // Collect the parameters from the POST data returned from the user.
            $req->set_vars_from_post();

            if (empty($req->error_field)) {
                emb_trace("fn:emb_process_requests : no errors found");
                $req->prepare_data();
            }

        } else if ($req->action == 'embed-delete-entry' || $req->action == 'embed-enable-entry' || $req->action == 'group-expand'
        || $req->action == 'embed-disable-entry' || $req->action == 'embed-sort-entries'
        || $req->action == 'group-delete' || $req->action == 'group-disable' || $req->action == 'group-enable') {
            // Collect the parameters from the GET data returned from the user and
            // fill the rest in from the database entry for the index.
            $req->set_vars_from_get();
        } else if ($req->action == 'embed-import-entry') {
            $msgno = $req->validate_imports($_POST['import']);
        }

        if (empty($req->error_field)) {

            global $wpdb;
            $wpdb->show_errors();

            if ($req->action == 'embed-update-entry') {
                 
                // Update the settings for the index being edited.
                emb_trace("fn:emb_process_requests : updating embed : ".$req->embed." group : ".$req->emgroup." value: ".$req->value." options: ".$req->options." data: ".$req->data);

                $query = "UPDATE ".EMB_TABLE." SET emgroup = '$req->emgroup', value = '$req->value', description = '$req->description', options = '$req->options', data = '$req->data' "
                ."WHERE embed = '$req->embed'";
                $rc = $wpdb->query($query);
                $msgno = 1;
                emb_trace("fn:emb_process_requests : rc = ".$rc." query = ".$query);

            } else if ($req->action == 'embed-add-entry') {

                if (emb_validate_embed_name($req->embed, $req)) {
                    $msgno = 2;
                    // Create a new index and index page using the settings provided by the user.
                    emb_trace("fn:emb_process_requests : adding index for embed : ".$req->embed);

                    $rc = $wpdb->query("INSERT INTO ".EMB_TABLE." VALUES ('$req->embed', '$req->emgroup', '$req->description', '$req->value', '$req->options', '$req->data')");

                    if (!$rc) {
                        $msgno = 21;
                    }
                }
                emb_trace("fn:emb_process_requests : embed-add-entry : rc = ".$rc."");

            } else if ($req->action == 'embed-rename-entry') {

                $newembed = $req->embed;
                $count = $req->set_vars_from_table($req->oldembed);

                if (emb_validate_embed_name($newembed, $req)) {
                    $msgno = 4;
                    // Create a new entry based on the entry being renamed and then delete the old one.
                    emb_trace("fn:emb_process_requests : renaming embed : from: ".$req->oldembed.", to: ".$req->embed);
                    $rc = $wpdb->query("INSERT INTO ".EMB_TABLE." VALUES ('$newembed', '$req->emgroup', '$req->description', '$req->value', '$req->options', '$req->data')");

                    if (!$rc) {
                        $msgno = 22;
                    } else {
                        $rc = $wpdb->query("DELETE FROM ".EMB_TABLE." WHERE embed = '$req->oldembed'");
                        $msgno = $rc ? 4 : 22;
                    }
                }

                emb_trace("fn:emb_process_requests : embed-rename-entry : rc = ".$rc."");

            } else if ($req->action == 'embed-copy-entry') {

                $newembed = $req->embed;
                $count = $req->set_vars_from_table($req->oldembed);

                if (emb_validate_embed_name($newembed, $req)) {
                    $msgno = 5;
                    // Create a new entry based on the entry being renamed and then delete the old one.
                    emb_trace("fn:emb_process_requests : copying embed : from: ".$req->oldembed.", to: ".$req->embed);

                    $rc = $wpdb->query("INSERT INTO ".EMB_TABLE." VALUES ('$newembed', '$req->emgroup', '$req->description', '$req->value', '$req->options', '$req->data')");

                    if (!$rc) {
                        $msgno = $rc ? 5 : 23;
                    }
                }
                emb_trace("fn:emb_process_requests : embed-copy-entry : rc = ".$rc."");

            } else if ($req->action == 'embed-delete-entry') {

                // Delete the index selected by the user.
                emb_trace("fn:emb_process_requests : embed-delete index : ".$req->embed);

                $rc = $wpdb->query("DELETE FROM ".EMB_TABLE." WHERE embed = '$req->embed'");
                $msgno = $rc ? 3 : 31;

            } else if ($req->action == 'embed-enable-entry' || $req->action == 'embed-disable-entry') {

                // Change the disabled state of the plugin.
                emb_trace("fn:emb_process_requests : embed-enable/disable index : ".$req->embed);
                $count = $req->set_vars_from_table($req->embed);
                if ($count > 0) {
                    if (emb_is_disabled($req->options)) {
                        $req->remove_option('disabled');
                    } else {
                        $req->add_option('disabled');
                    }
                    $query = "UPDATE ".EMB_TABLE." SET options = '$req->options' WHERE embed = '$req->embed'";
                    $rc = $wpdb->query($query);
                    $msgno = 6;
                    emb_trace("fn:emb_process_requests : rc = ".$rc." query = ".$query);
                }

            } else if ($req->action == 'embed-sort-entries') {

                $current_sort = get_option('emb_sort_index_table');
                if (strpos($current_sort, $req->sortby) !== false) {
                    if (strpos($current_sort, "ASC") !== false) {
                        $current_sort = str_replace("ASC", "DESC", $current_sort);
                    } else {
                        $current_sort = str_replace("DESC", "ASC", $current_sort);
                    }
                } else {
                    $current_sort = " ORDER BY ".$req->sortby." ASC";
                }
                update_option('emb_sort_index_table', $current_sort);

            } else if ($req->action == 'group-expand') {

                $groups = get_option('emb_groups');
                $groups[$req->emgroup]['show'] = !$groups[$req->emgroup]['show'];
                update_option('emb_groups', $groups);

            } else if ($req->action == 'group-show-all' || $req->action == 'group-hide-all' ) {

                $state = $req->action == 'group-show-all';
                $groups = get_option('emb_groups');
                foreach ($groups as $key => $group) {
                    $groups[$key]['show'] = $state;
                }
                update_option('emb_groups', $groups);

            } else if ($req->action == 'group-add') {

                $groups = get_option('emb_groups');
                $names = array_map('strtolower', array_keys($groups));
                if (!in_array(strtolower($req->emgroup), $names)) {
                    $groups[$req->emgroup] = array('show' => true);
                    update_option('emb_groups', $groups);
                    $msgno = 8;
                } else {
                    $req->error_field['emgroup'] = 'emgroup-error';
                    $req->error_messages[] = "The name '$req->emgroup' is already in use. Please select another group name.";
                }

            } else if ($req->action == 'group-rename') {

                $groups = get_option('emb_groups');
                $names = array_map('strtolower', array_keys($groups));
                if (!in_array(strtolower($req->emgroup), $names)) {
                    $groups[$req->emgroup] = $groups[$req->oldemgroup];
                    unset($groups[$req->oldemgroup]);
                    update_option('emb_groups', $groups);
                    $addwhere = $req->oldemgroup == EMB_DEFAULT_GROUP ? ' OR emgroup IS NULL' : '';
                    $wpdb->query("UPDATE ".EMB_TABLE." SET emgroup = '$req->emgroup' WHERE emgroup = '$req->oldemgroup'".$addwhere);
                    $msgno = 9;
                } else {
                    $req->error_field['emgroup'] = 'emgroup-error';
                    $req->error_messages[] = "The name '$req->emgroup' is already in use. Please select another group name.";
                }

            } else if ($req->action == 'group-disable' || $req->action == 'group-enable') {

                $state = $req->action == 'group-disable';
                $addwhere = $req->emgroup == EMB_DEFAULT_GROUP ? ' OR emgroup IS NULL' : '';
                $embeds = $wpdb->get_results("SELECT * FROM ".EMB_TABLE." WHERE emgroup = '$req->emgroup'".$addwhere);
                if (!empty($embeds)) {
                    foreach ($embeds as $embed) {
                        $options = emb_set_option($embed->options, 'disabled', $state);
                        $wpdb->query("UPDATE ".EMB_TABLE." SET options = '$options' WHERE embed = '$embed->embed'");
                    }
                }
                $msgno = $state ? 11 : 12;

            } else if ($req->action == 'group-delete') {

                $groups = get_option('emb_groups');
                unset($groups[$req->emgroup]);
                update_option('emb_groups', $groups);
                $wpdb->query("UPDATE ".EMB_TABLE." SET emgroup = ".EMB_DEFAULT_GROUP." WHERE emgroup = '$req->emgroup'");
                $msgno = 10;

            } else if ($req->action == 'embed-uninstall-plugin') {

                emb_plugin_uninstall();
                wp_redirect('plugins.php');
                return;
            }

            if (empty($req->error_field)) {
                // Redirect the browser to the main admin index page.
                $req->action = 'embed-redirect';
                emb_redirect($msgno);
            } else {
                $req->prepare_data();
            }
        }
    } else {
        // Nothing to do but fetch the parameters from the 'GET' request.
        $req->set_vars_from_get();
    }
    // Save the request parameters in a global variable for later use.
    $emb_req = $req;
    emb_trace('fn:emb_process_requests : end');
}

function emb_validate_embed_name($embed, $req = null) {
    global $wpdb;
    $results = $wpdb->get_results("SELECT embed FROM ".EMB_TABLE." WHERE embed = '$embed'");
    if (count($results) != 0 && !empty($req)) {
        $req->error_field['embed'] = 'embed-error';
        $req->error_messages[] = "The name '$embed' is already in use. Please select another name.";
    }
    return (count($results) == 0);
}

function emb_get_embeds($fields, $group = null) {
    global $wpdb;
    $current_sort = get_option('emb_sort_index_table');
    emb_trace("emb_get_embeds : SELECT $fields FROM ".EMB_TABLE.$current_sort);
    $query = "SELECT $fields FROM ".EMB_TABLE;
    if (!empty($group)) {
        $query .= " WHERE emgroup = '$group'".($group == EMB_DEFAULT_GROUP ? ' OR emgroup IS NULL' : '');
    }
    $query .= $current_sort;
    return $wpdb->get_results($query);
}

function emb_get_embed($embed, $fields) {
    global $wpdb;
    return $wpdb->get_results("SELECT $fields FROM ".EMB_TABLE." WHERE embed = $embed");
}

/**
 * Make an http redirect request to put us back on the main indexes admin page.
 *
 * @param $msg number of the message to be displayed, if non-zero.
 */
function emb_redirect($msg) {
    emb_trace('fn:emb_redirect : redirect to '.EMB_PAGENAME.($msg != 0 ? '&msg='.$msg : ''));
    wp_redirect(EMB_PAGENAME.($msg != 0 ? '&msg='.$msg : ''));
}

/**
 * Display the manage index administration page.  The page will only
 * be displayed if the supplied action isn't 'embed-redirect'.
 */
function emb_display_admin_page() {

    emb_trace('--- admin --------------------------------------------');
    emb_trace('fn:emb_manage_embeds : start');
    global $emb_req;
    emb_trace('fn:emb_manage_embeds : action = '.$emb_req->action);
    if ((empty($emb_req->action) && empty($emb_req->error_field))
    || (!empty($emb_req->error_field) && !empty($emb_req->error_field['import']))) {
        // By default, display the table of indexes.
        emb_display_embed_table($emb_req);
    } else if ($emb_req->action == 'embed-export-entry' || $emb_req->action == 'group-export') {
        emb_display_export_dialog($emb_req);
    } else if (strpos($emb_req->action, 'group-') === 0) {
        emb_display_group_dialog($emb_req);
    } else if ($emb_req->action != 'embed-redirect') {
        // Otherwise, display the edit panel for an index.
        emb_display_embed_dialog($emb_req);
    }
    emb_trace('fn:emb_manage_embeds : end');
}

function emb_get_group_id($name) {
    return 'gp-'.strtolower(strtr($name, ' ', '-'));
}

function emb_get_attributes($value) {
    // First get an array of all the attributes in the embed.
    $attributes = emb_get_embed_attributes($value);

    // Then sort into alphabetical order and merge into a string.
    $output = '';
    if (!empty($attributes)) {
        ksort($attributes);
        foreach ($attributes as $name => $def) {
            //if ($name = 'content') $name = '_content';
            $output .= $name.(!empty($def) ? '="'.$def.'"' : '').', ';
        }
    }
    return strtolower(trim($output, ', '));
}

/**
 * Display the export embed dialog, and set the fields specified in
 * $req if necessary.
 *
 * @param $req - the serialized embed ready for exporting.
 */
function emb_display_export_dialog($req) {

    $group = false;
    if (!empty($req->embed)) {
        $export = emb_export_embed($req);
    } else if (!empty($req->emgroup)) {
        global $wpdb;
        $group = true;
        $addwhere = $req->emgroup == EMB_DEFAULT_GROUP ? ' OR emgroup IS NULL' : '';
        $embeds = $wpdb->get_results("SELECT * FROM ".EMB_TABLE." WHERE emgroup = '$req->emgroup'".$addwhere);
        if (!empty($embeds)) {
            foreach ($embeds as $embed) {
                $req->set_vars_from_index($embed);
                $export .= emb_export_embed($req).chr(13).chr(13);
            }
        }
    }
    ?>
<div class="wrap"><?php if ($group) { ?>
<h2>Export Group of Embeds</h2>
    <?php } else { ?>
<h2>Export Embed</h2>
    <?php } ?>
<p>Copy the exported embed<?php echo ($group ? 's' : ''); ?> from the
text area below and paste <?php echo ($group ? 'them' : 'it'); ?> into a
file or web page for others to import into their WordPress blog.</p>
<p>You can append <?php echo ($group ? 'these embeds' : 'this embed'); ?>
to other exported embeds in the the same file or post, and import them
all at the same time into another blog using the Embedder plugin.</p>
<h3 style="margin-bottom: 3px">Exported embed<?php echo ($group ? 's' : ''); ?>:</h3>
<textarea id="export" name="export" rows="25" cols="100"
    readonly="readonly" style="font-size: 8pt"><?php echo trim($export); ?></textarea>
<form name="exportembed" id="exportembed" class="add validate"
    method="post" action="<?php echo EMB_PAGENAME; ?>"><br />
<input type="submit" class="button" name="cancel" value="Done" /></form>
</div>
    <?php }

    function emb_export_embed($req) {
        $export = htmlentities(serialize(array('name' => $req->embed, 'emgroup' => $req->emgroup, 'description' => $req->description,
                                             'value' => $req->value, 'options' => $req->options, 
                                             'data' => $req->data)), ENT_COMPAT, 'UTF-8');
        $length = strlen($export);
        $export = '[emb_export,'.$req->embed.','.$length.']'.$export.'[/emb_export,'.$req->embed.']';
        return $export;
    }

    /**
     * Display the add/edit embed dialog, and set the fields specified in
     * $req if necessary.
     *
     * @param $req parameters to be used in the dialog fields
     */
    function emb_display_embed_dialog($req) {
        include_once 'emb-admin-settings.php';
    }

    function emb_display_group_dialog($req) {

        $add = $req->action == 'group-add' || $req->action == 'group-new';
        $rename = $req->action == 'group-newname' || $req->action == 'group-rename';

        ?>
<div class="wrap"><?php
if (!empty($req->error_messages)) { ?>
<div id="message" class="updated fade">
<h3>Error message(s):</h3>
<ul>
<?php foreach ($req->error_messages as $message) {
    echo '- '.$message."<br/>";
} ?>
</ul>
<p>Please correct the highlighted field(s).</p>
</div>
<?php }
if ($rename) {
    echo '<h2>Rename Group</h2>';
} else {
    echo '<h2>Add Group</h2>';
} ?>

<div id="ajax-response"></div>
<span id="autosave"></span>
<form name="addgroup" id="addgroup" class="add validate" method="post"
    action="<?php echo EMB_PAGENAME; ?>">
<table id="embed-form-table" class="form-table">
<?php if ($rename) { ?>
    <tr class="form-field form-required">
        <th scope="row"><label for="embed">Old group name</label></th>
        <td><?php echo $req->oldemgroup; ?></td>
    </tr>
    <?php } ?>
    <tr class="form-field form-required">
        <th scope="row"><?php if ($rename) { ?> <label for="emgroup">New
        group name</label> <?php } else { ?> <label for="emgroup">Group
        name</label> <?php } ?></th>
        <td class="<?php echo $req->error_field['emgroup']; ?>"><input
            name="emgroup" id="emgroup" type="text"
            value="<?php echo $req->emgroup; ?>" size="20" /> <br />
        Enter a name for the group.</td>
    </tr>
</table>
<p class="submit"><?php if ($rename) { ?> <input type="hidden"
    name="oldemgroup" value="<?php echo $req->oldemgroup; ?>" /> <input
    type="hidden" name="action" value="group-rename" /> <input
    type="submit" class="button" name="submit" value="Rename" />&nbsp; <input
    type="submit" class="button" name="cancel" value="Cancel" /> <?php } else { ?>
    <?php wp_nonce_field('emb_plugin_add'); ?> <input type="hidden"
    name="action" value="group-add" /> <input type="submit"
    class="button" name="submit" value="Add Group" />&nbsp; <input
    type="submit" class="button" name="cancel" value="Cancel" /> <?php } ?>
</p>
</form>
</div>
    <?php }

    /**
     * Add an option field to one of the index heading/description selection lists.
     *
     * @param $name name of option field
     * @param $title title of option filed
     * @param $sel true if item is to be selected
     */
    function emb_add_option($name, $title, $sel) {
        echo '<option value="'.$name.'" '.($sel ? 'selected ' : '').'>'.$title.'</option>';
    }

    function emb_add_embed_groups($curgroup) {
        $groups = emb_get_groups(true);
        foreach ($groups as $group => $settings) {
            $selected = ($group == $curgroup) ? ' selected="selected"' : '';
            echo '<option value="'.$group.'"'.$selected.'>'.$group.'</option>';
        }
    }

    function emb_get_groups($sort = false) {
        global $wpdb;
        $groups = get_option('emb_groups');
        $names = $wpdb->get_col('SELECT DISTINCT emgroup FROM '.EMB_TABLE.' ORDER BY emgroup');

        if (empty($groups)) {
            $groups[EMB_DEFAULT_GROUP] = array('show' => true);
        }
        ksort($groups);
        if (!empty($names)) {
            foreach ($names as $name) {
                if (empty($name)) $name = EMB_DEFAULT_GROUP;
                $used[$name] = array('show' => true);
            }
        }
        if (!empty($used)) {
            $groups = array_merge($used, $groups);
        }
        update_option('emb_groups', $groups);
        if ($sort) {
            ksort($groups);
        }
        return $groups;
    }

    function emb_get_local_embeds() {
        global $wpdb;
        $results = $wpdb->get_results("SELECT post_id, meta_key, meta_value FROM "
        .$wpdb->prefix.'postmeta'." WHERE LEFT(meta_key, 1) = '[' AND RIGHT(meta_key, 1) = ']' ORDER BY meta_key");
        return $results;
    }

    /**
     * Generate an <option> field, and set to checked if necessary.
     * Also adds javascript to select items in order to dynamically show/enable related fields.
     *
     * @param $value value of the option field
     * @param $sel set to checked if option is contained within this string.
     * @return string to the included in the option tag
     */
    function emb_check_value($value, $sel) {
        $output = 'name="options[]" id="'.$value.'" value="'.$value.'" '.(strpos($sel, $value) !== false ? 'checked ' : '');
        return $output;
    }

    function emb_insert_option($name, $options, $value, $indent = 0, $hidden = false) {
        echo("<div style='margin:0;padding-left:".$indent."px;".($hidden ? "display:none;" : "")."'>");
        echo("    <input class='option' type='checkbox' ".emb_check_value($name, $value)."/>&nbsp;");
        echo("    <label class='option-label' for='$name'>{$options[$name]}</label>");
        echo("</div>");
    }

    /**
     * Get the information message to display (if any).
     */
    function emb_get_info_message($id) {
        switch ($id) {
            case 1: $message = 'Embed updated successfully.'; break;
            case 2: $message = 'Embed added successfully.'; break;
            case 3: $message = 'Embed deleted successfully.'; break;
            case 4: $message = 'Embed renamed successfully.'; break;
            case 5: $message = 'Embed copied successfully.'; break;
            case 6: $message = 'Embed state changed successfully.'; break;
            case 7: $message = 'Embed(s) imported successfully.'; break;
            case 8: $message = 'Group added successfully.'; break;
            case 9: $message = 'Group renamed successfully.'; break;
            case 10: $message = 'Group deleted successfully.'; break;
            case 11: $message = 'Embed(s) disabled successfully.'; break;
            case 12: $message = 'Embed(s) enabled successfully.'; break;
            case 20: $message = 'ERROR: Unable to update the embed.'; break;
            case 21: $message = 'ERROR: Unable to add the new embed.'; break;
            case 22: $message = 'ERROR: Unable to rename the embed.'; break;
            case 23: $message = 'ERROR: Unable to copy the embed.'; break;
            case 31: $message = 'ERROR: Unable to delete the embed.'; break;
        }
        return $message;
    }

    /**
     * Display serious error messages to the user.
     *
     * @param string $id the id of the error message to display.
     * @return none
     */
    function emb_get_admin_error_message($id) {
        global $wpdb;
        $error = 'EMBEDDER_PLUGIN_ERROR: ';
        switch ($id) {
            case 'database-not-found':
                $error .= '<p>101 - The required database table - '.EMB_TABLE.' - does not exist.</p>'
                .'<p>Please deactivate then re-activate the Embedder plugin to correct the problem.</p>';
                break;
            case 'version-out-of-date':
                $error .= '102 - The blog\'s database table is out-of-date with this version of the plugin.'
                .'<p>This can sometimes happen when you are manually installing a plugin upgrade.</p>'
                .'<p>Please deactivate then reactivate the Embedder plugin from the "Plugins" admin page to upgrade the database.</p>'
                .'<p>All your existing embeds and their settings will be preserved.</p>';
                break;
            case 'rename-table-failed':
                $error .= '201 - The Embedder plugin was unable to finish upgrading your existing embedder settings. ';
                break;
            case 'create-table-failed':
                $error .= '202 - The Embedder plugin was unable to create the new settings database table while upgrading to the latest version. ';
                break;
            case 'fresh-create-table-failed':
                $error .= '203 - The Embedder plugin was unable to create the new settings database table.';
                break;
            case 'upgrade-table-failed':
                $error .= '204 - The Embedder plugin was unable to upgrade the new settings while upgrading to the latest version. ';
                break;
        }

        // If this is an upgrade error, then display more information to help assure the user
        // that no data has been lost, and to point them to somewhere where they can get some help.
        if (strpos($id, 'table-failed') !== false) {
            $error = '<p>'.$error.'</p>'
            .(strpos($id, 'fresh') === false ? '<p>All your existing settings have been saved, but you will not be able to use the new version of Embedder plugin. '
            .'If you want to continue running Embedder, please reinstall the <a href="http://wordpress.org/extend/plugins/embedder/download/">previous version of Embedder</a> '
            .'you were running on this blog.</p>' : '')
            .'<p>For more assistance please visit to the <a href="http://embedder.englishmike.net">Embedder Plugin Home Page</a>. '
            .'or contact the plugin author at <a href="mailto:embedder@englishmike.net">embedder@englishmike.net</a> with this information.</p>'
            .'<p>WordPress version = '.get_bloginfo('version')
            .'<br/>Database version = '.$wpdb->db_version()
            .'<br/>PHP version = '.phpversion()
            .'<br/>OS version = '.PHP_OS.'</p>';
        }
        return $error;
    }

    /**
     * Action hook used to display an error message on the plugins page
     * if something has gone wrong with the database during the install or
     * upgrade.
     */
    function emb_admin_notices() {

        $error = get_option('emb_plugin_error');
        if (!empty($error)) {
            $message = emb_get_admin_error_message($error);
        }

        if (!empty($message)) {
            echo '<div class="error" style="padding:10px 10px">';
            echo '<strong>Fatal Embedder Plugin Upgrade Error</strong>';
            echo '<p>'.$message.'</p>';

            if (function_exists('deactivate_plugins') ) {
                deactivate_plugins( EMB_PLUGIN_FILE);
                echo '<p>The Embedder plugin has been deactivated.</p>';
            }
            echo '</div>';
        }

        // Remember to delete the option so the message is not shown again.
        delete_option('emb_plugin_error');
    }

    function emb_decode_data($data) {
        return unserialize($data);
    }

    function emb_set_option($options, $option, $state) {
        $options = explode(',', $options);
        $key = array_search($option, $options);
        if ($state && $key === false) {
            $options[] = $option;
        } else if (!$state && $key !== false) {
            unset($options[$key]);
        }
        return $options = implode(',', $options);
    }


    /**
     * Class containing all the data sent in a POST or GET message or
     * an entry retrieved from the indexes database.
     */
    class emb_request {
        var $action;       // Current action to be processed
        var $sortby;       // Set if the embed table is to be sorted
        var $embed;        // Name of the embed
        var $emgroup;      // Group name of the embed
        var $description;  // Description of the embed
        var $value;        // Value of the embed
        var $oldembed;     // Old name of the embed during rename operation
        var $oldemgroup;   // Old name of the group during rename operation
        var $info_message; // Informational message to the output to the user
        var $error_field = array();    // Input fields currently in error
        var $error_messages = array(); // Error message to be output to the admin user
        var $data;
        // The following are embed options and are included in a serialized string to be appended to the database.
        var $wrapwith;     // Type of element to wrap the embedded HTML with
        var $wrapclass;    // Class name(s) for wrapper element
        var $wrapstyle;    // Style string for wrapper element
        var $priority;     // Priority of the embed (used when autoembedding more than one embed in the same place).
        var $include_tags; // Include embed in posts/pages with these tags.
        var $exclude_tags; // Exclude embed in posts/pages with these tags.
        var $include_cats; // Include embed in posts/pages with these categories.
        var $exclude_cats; // Exclude embed in posts/pages with these categories.
        var $include_pages;// Include embed in posts/pages with these parent pages.
        var $exclude_pages;// Exclude embed in posts/pages with these parent pages.
        var $userfunction; // Name of the user function to call before the embed is processed and displayed.
        var $options;      // Options for the embed

        /**
         * Constructor for class. Initialize the action instance variable immediately.
         */
        function emb_request() {
            emb_trace('fn:emb_request');
            $this->action = $_GET['action'];
            if (empty($this->action)) {
                if (empty($_POST['cancel'])) {
                    $this->action = $_POST['action'];
                } else {
                    $this->action = 'cancel';
                }
            }
        }

        /**
         * Populate the instance data for the class using the GET request parameters.
         * Also generate the appropriate error messages should problems be found.
         */
        function set_vars_from_post() {
            global $wpdb;
            emb_trace('fn:set_vars_from_post');
            $this->embed = strtolower(stripslashes(trim($_POST['embed'])));
            $this->emgroup = stripslashes(trim($_POST['emgroup']));
            $this->description = stripslashes(trim($_POST['description']));
            $this->value = htmlentities(stripslashes(trim($_POST['value'])), ENT_COMPAT, 'UTF-8');
            $this->wrapwith = !empty($_POST['wrapwith']) ? implode(',', $_POST['wrapwith']) : '';
            $this->wrapclass = stripslashes(trim($_POST['wrapclass']));
            $this->wrapstyle = stripslashes(trim($_POST['wrapstyle']));
            $this->userfunction = stripslashes(trim($_POST['userfunction']));
            $this->priority = stripslashes(trim($_POST['priority']));
            $this->include_tags = $this->process_list($_POST['include-tags']);
            $this->exclude_tags = $this->process_list($_POST['exclude-tags']);
            $this->include_cats = $this->process_list($_POST['include-cats']);
            $this->exclude_cats = $this->process_list($_POST['exclude-cats']);
            $this->include_pages = $this->process_list($_POST['include-pages']);
            $this->exclude_pages = $this->process_list($_POST['exclude-pages']);
            $this->oldembed = stripslashes(trim($_POST['oldembed']));
            $this->oldemgroup = stripslashes(trim($_POST['oldemgroup']));
            $this->options = !empty($_POST['options']) ? implode(',', $_POST['options']) : '';
            $this->info_message = intval($_POST['msg']);

            if (isset($_POST['embed'])) {
                if (empty($this->embed)) {
                    $this->error_field['embed'] = 'embed-error';
                    $this->error_messages[] = 'A name for the embed must be specified.';
                } else if (strlen($this->embed) > 63) {
                    $this->error_field['embed'] = 'embed-error';
                    $this->error_messages[] = 'The embed name too long. It must be fewer than 64 characters long: '.$this->embed;
                } else if (preg_match('/^[\w-]+$/', $this->embed) == 0) {
                    $this->error_field['embed'] = 'embed-error';
                    $this->error_messages[] = 'Invalid characters found in the embed '.$this->embed;
                }
                if ($this->action != 'embed-rename-entry' && $this->action != 'embed-copy-entry' && empty($this->userfunction) && empty($this->value)) {
                    $this->error_field['value'] = 'embed-error';
                    $this->error_messages[] = 'A value for this embed must be specified.';
                }
            }
            if (isset($_POST['emgroup'])) {
                if (empty($this->emgroup)) {
                    $this->error_field['emgroup'] = 'emgroup-error';
                    $this->error_messages[] = 'A name for the group must be specified.';
                } else if (strlen($this->emgroup) > 63) {
                    $this->error_field['emgroup'] = 'emgroup-error';
                    $this->error_messages[] = 'The group name too long. It must be fewer than 64 characters long: '.$this->emgroup;
                } else if (preg_match('/^[\w-\s]+$/', $this->emgroup) == 0) {
                    $this->error_field['emgroup'] = 'emgroup-error';
                    $this->error_messages[] = 'Invalid characters found in the name '.$this->emgroup;
                }
            }
        }

        function add_option($option) {
            if (!empty($this->options)) {
                $this->options .= ',';
            }
            $this->options .= $option;
        }

        function remove_option($name) {
            $options = explode(',', $this->options);
            $key = array_search($name, $options);
            if ($key !== false) {
                unset($options[$key]);
            }
            $this->options = implode(',', $options);
        }

        function process_list($list) {
            $list = explode(',', stripslashes($list));
            foreach ($list as $key => $item) {
                $list[$key] = trim($item);
            }
            return implode(',', $list);
        }

        /**
         * Populate the instance data for the class using the GET request parameters
         * and, where necessary, the selected entry in the index database table.
         */
        function set_vars_from_get() {
            emb_trace('fn:set_vars_from_get');
            $this->embed = $_GET['embed'];
            $this->emgroup = $_GET['emgroup'];
            $this->info_message = intval($_GET['msg']);
            $this->oldembed = $_GET['oldembed'];
            $this->oldemgroup = $_GET['oldemgroup'];

            if ($this->action == 'embed-edit-entry' || $this->action == 'embed-export-entry' ) {
                $this->set_vars_from_table($this->embed);
            } else if ($this->action == 'embed-sort-entries') {
                $this->sortby = $_GET['by'];
            }
        }

        /**
         * Fetch the settings for the current index from the database.
         *
         * @param $id id of index page
         * @return number of indexes found (i.e. if zero, then there is no index)
         */
        function set_vars_from_table($embed) {
            emb_trace('fn:set_vars_from_table: '.$embed);
            global $wpdb;
            $entries = $wpdb->get_results("SELECT * FROM ".EMB_TABLE." WHERE embed = '$embed'");
            if (count($entries) != 0) {
                $this->set_vars_from_index($entries[0]);
            }
            return count($entries);
        }

        /**
         * Fetch the settings for the supplied index object
         *
         * @param $id id of index page
         * @return number of indexes found (i.e. if zero, then there is no index)
         */
        function set_vars_from_index($entry) {
            emb_trace('fn:set_vars_from_index');
            $this->embed = $entry->embed;
            $this->emgroup = $entry->emgroup;
            $this->description = $entry->description;
            $this->value = $entry->value;
            $this->options = $entry->options;
            $this->data = $entry->data;

            // Move data into main object.
            $data = emb_decode_data($entry->data);
            foreach ($data as $property => $value) $this->$property = $value;
        }

        function get_property_keys() {
            return array('wrapwith', 'wrapclass', 'wrapstyle', 'priority', 'userfunction',
                     'include_tags', 'exclude_tags', 'include_cats', 'exclude_cats', 
                     'include_pages', 'exclude_pages');
        }
        /**
         * Escape all the strings that might contain illegal characters,
         * ready for insertion into the wordpress database.
         * Note, if we do not pass in a value (the norm) then $this is
         * the object being updated, otherwise it's the referenced variable passed in.
         */
        function prepare_data() {
            $properties = $this->get_property_keys();
            $this->embed = addslashes($this->embed);
            $this->emgroup = addslashes($this->emgroup);
            $this->description = addslashes($this->description);
            $this->value = addslashes($this->value);
            // Serialize the options.
            foreach ($properties as $property) $data->$property = $this->$property;
            $this->data = serialize($data);
        }

        function prepare_import_data($embed) {
            $properties = $this->get_property_keys();
            $embed->embed = addslashes($embed->embed);
            $embed->emgroup = addslashes($embed->emgroup);
            $embed->description = addslashes($embed->description);
            $embed->value = addslashes($embed->value);
            // Serialize the options.
            foreach ($properties as $property) $data->$property = $embed->$property;
            $embed->data = serialize($data);
            return $embed;
        }

        /**
         * Import one or more embeds in a serialized text string.
         * Performs the following steps:
         *
         * 1. Parses the text string, looking for a valid start tag,
         *    matching data lemgth, and matching end tag.
         *
         * 2. Unserializes the embed data and validates the embed name
         *    and value. Also removes unsupported options fields.
         *    Unsupported options will remain, but will be dropped when edited.
         *
         * 3. Creates the embed disabled, and renames it if the name clashes with
         *    an existing embed. Also tag description with (IMPORT).
         *
         * If an error is found, report it, and bail. Valid embeds up to that
         * point will be added (and reported).
         *
         */
        function validate_imports($imports) {
            $imports = $this->strip_formatting($imports);
            //_echo($imports);
            $imports = trim(htmlentities(stripslashes($imports), ENT_COMPAT, 'UTF-8'));
            while (!empty($imports) && empty($error)) {
                $error = '';
                $name = '';
                $imports = ltrim($imports);
                // Test for the start of a header.
                if ($imports[0] == '[') {
                    $header = substr($imports, 0, strpos($imports, ']') + 1);
                    // Test for valid end of the header.
                    if ($header[strlen($header)-1] == ']') {
                        $skip = strlen($header);
                        $header = explode(',', trim($header, '[] '));
                        // Validate header contents.
                        if (count($header) == 3 && $header[0] == 'emb_export' && !empty($header[1]) && !empty($header[2])) {
                            $name = $header[1];
                            $length = intval($header[2]);
                            $endtag = '[/emb_export,'.$name.']';
                            $imports = substr($imports, $skip);
                            // Check that the data length matches and the endtag is present.
                            if (strncmp(substr($imports, $length), $endtag, strlen($endtag)) == 0) {
                                $embed = substr($imports, 0, $length);
                                $imports = substr($imports, $length + strlen($endtag));
                            } else {
                                $error = 'incorrect embed import length or missing end tag.';
                            }
                        } else {
                            $error = 'invalid embed import header.';
                        }
                    } else {
                        $error = 'invalid embed import header.';
                    }
                } else {
                    $error = 'embed import header not found.';
                }
                if (empty($error)) {
                    // Get the embed object.
                    $embed = (object)unserialize(@html_entity_decode($embed, ENT_COMPAT, 'UTF-8'));
                    if (!empty($embed->name)) {
                        // Validate the name of the embed.
                        if (preg_match('/^[\w-]+$/', $embed->name) == 1) {
                            $embed->embed = $embed->name;
                            // Extract the data properties which removes any invalid properties.
                            $data = unserialize($embed->data);
                            $properties = $this->get_property_keys();
                            foreach ($properties as $property) $embed->$property = $data->$property;

                            // Prepare the rest of the embed for adding to the database.
                            unset($embed->name);
                            unset($embed->data);
                            $embed->description = '(IMPORT) '.$embed->description;
                            if (!emb_is_disabled($embed->options)) {
                                $embed->options = trim($embed->options.',disabled', ',');
                            }
                        } else {
                            $error = 'invalid embed name.';
                        }
                    } else {
                        $error = 'missing embed name.';
                    }
                }
                if (empty($error)) {
                    global $wpdb;
                    // Handle name collisions by appending a number until it is unique in database.
                    $ext = 2;
                    $name = $embed->embed;
                    while (!emb_validate_embed_name($embed->embed, $this)) {
                        $embed->embed = $name.'_'.$ext;
                        $ext++;
                    }
                    // Need to reset the error messages since we do not need them.
                    $this->error_field = array();
                    $this->error_messages = array();

                    // Prepare and insert the imported embed.
                    $embed = $this->prepare_import_data($embed);
                    $rc = $wpdb->query("INSERT INTO ".EMB_TABLE." VALUES ('$embed->embed', '$embed->emgroup', '$embed->description', '$embed->value', '$embed->options', '$embed->data')");
                    if ($rc == 0) {
                        $error = 'unable to add embed to the blog database.';
                    } else {
                        $names[] = $embed->embed;
                    }
                }
            }
            if ($error) {
                // Generate the error messages, including listing the successfully imported embeds first.
                if (!empty($names)) {
                    foreach ($names as $embed) {
                        $this->error_messages[] = 'Imported embed '.$embed.' successfully.';
                    }
                }
                $this->error_messages[] = 'Invalid import'.(!empty($name) ? ' for embed "'.$name.'"' : '').': '.$error;
                $this->error_field['import'] = 'import-error';
                $msgno = 0;
            } else {
                $msgno = 7;
            }
            return $msgno;
        }

        function strip_formatting($text) {
            //_echo('[['.bin2hex($text).']]');
            $search = array(chr(0xe2).chr(0x80).chr(0x98),  // '
            chr(0xe2).chr(0x80).chr(0x99),  // '
            chr(0xe2).chr(0x80).chr(0xb2),  // '
            chr(0xe2).chr(0x80).chr(0x9c),  // "
            chr(0xe2).chr(0x80).chr(0x9d),  // "
            chr(0xe2).chr(0x80).chr(0xb3),  // "
            chr(0xe2).chr(0x80).chr(0x93),  // em dash
            chr(0xe2).chr(0x80).chr(0x94),  // en dash
            chr(0xe2).chr(0x80).chr(0xa6)); // ...

            $replace = array('\'', '\'', '\'', '"', '"', '"', '-', '-', '...');
            return str_replace($search, $replace, $text);
        }
    }

    function emb_add_help_text($contextual_help, $screen_id, $screen) {
        //_echo('contextual help '.$screen->id.'|'.EMB_PAGEPREFIX.EMB_PAGEID.'|'.$_GET['action']);
        if ($screen->id == EMB_PAGEPREFIX.EMB_PAGEID) {
            $action = $_GET['action'];
            switch ($action) {
                case "embed-add-entry":
                case "embed-new-entry":
                    $contextual_help = "<p>Complete the setting on this page and click the <b>Add Embed</b> at the bottom to create a new embed.</p>"
                    ."<p>The <b>Name</b> and <b>Value</b> fields must be completed (unless you supply a User Function name). All the other settings are optional.</p>";
                    break;
                case "embed-edit-entry":
                case "embed-update-entry":
                    $contextual_help = "<p>This page is used to edit the settings for an embed. Enter all of your updates to the settings then click on the <b>Save Changes</b> button to save them.</p>";
                    break;
                case "embed-rename-entry":
                case "embed-newname-entry":
                    $contextual_help = "<p>This page is used to rename an embed. Enter a new name for the embed and click on the <b>Rename</b> button below.</p>";
                    break;
                case "embed-copy-entry":
                case "embed-newcopy-entry":
                    $contextual_help = "<p>This page is used to copy an embed. Enter a new name for the copy of your embed and click on the <b>Copy</b> button below.</p>";
                    break;
                case "embed-export-entry":
                    $contextual_help = "<p>This page is used to export an embed. Simply select the code in the textbox and use the clipboad to copy it to another web page, file, or document. Click the <b>Done</b> button when you are finished.</p>"
                    ."<p>To copy everything to the clipboard, click anywhere inside the textbox and hit the keys <b>Ctrl-A</b> followed by <b>Ctrl-C</b>.</p>";
                    break;
                case "group-rename":
                case "group-newname":
                    $contextual_help = "<p>This page is used to rename a group. Enter a new name for the group and click on the <b>Rename</b> button below.</p>";
                    break;
                case "group-export":
                    $contextual_help = "<p>This page is used to export a whole group of embeds at the same time. Simply select the generated embed codes in the textbox and use the clipboad to copy them to another web page, file, or document. Click the <b>Done</b> button when you are finished.</p>"
                    ."<p>To copy everything to the clipboard, click anywhere inside the textbox and hit the keys <b>Ctrl-A</b> followed by <b>Ctrl-C</b>.</p>";
                    break;
                default:
                    $contextual_help = "<p>This is the main settings page for the Embedder plugin, which allows you to create HTML embeds to insert into your blog posts and pages.</p>"
                    ."<p>This page list all the <b>global embeds</b> you have created. They can be embedded in any post, page, or widget in you blog.</p>"
                    ."<p><b>Local embeds</b> (embeds intended for use in one post or page) are not created or listed on this page. They are created by adding custom fields to a post.</p>"
                    ."<p>The tables can be sorted by name, description, or value. Click on the column headings to sort the tables.</p>"
                    ."<p>Once you have created an embed, you can use it in any post or page by using the syntax: <b>[&lt;your_embed_name&gt;]</b></p>"
                    ."<p>Create new groups for your embeds to help organize and manage them more effectively. To move an embed to a group, simply drag the embed and drop it anywhere over the target group on the page.</p>"
                    ."<p>To import embeds to your blog, click the <b>Import Embeds</b> link, paste the embed codes into the textbox below, and click the <b>Import</b> button at the bottom of the page.</p>";
                    break;
            }
            $contextual_help .= '<p>For more assistance and information, please select one of the following links:</p>'
            .'<div style="padding-left:20px"><a href="http://moztools.com/wordpress/embedder-plugin/">The Embedder Plugin Home Page</a> for documentation, tutorials, and examples.</div>'
            .'<div style="padding-left:20px"><a href="http://moztools.com/wordpress/embedder-plugin/support-forum/">The Embedder Support Forum</a> for more assistance, to report problems, and any other feedback.</div>';
        }
        return $contextual_help;
    }
    ?>