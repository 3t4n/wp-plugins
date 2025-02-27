<?php
/*  Copyright 2010  Michael J. Walker (email: mike@moztools.com)

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

new EmbAdminAjax();

/**
 * Contains all the ajax actions for the administration page.
 * All actions passed to the server should have the prefix 'emb_'
 * and the matching method of the same name should have the
 * prefix 'ajax_'.
 */
class EmbAdminAjax {

    /**
     * Class constructor - add all 'ajax_' methods as ajax actions.
     */
    function EmbAdminAjax() {
        $methods = get_class_methods('EmbAdminAjax');
        foreach ($methods as $name) {
            if ($this->starts_with($name, 'ajax_')) {
                add_action('wp_ajax_emb_'.$this->str_after($name, 'ajax_'), array(&$this, $name));
            }
        }
    }

    function ajax_set_global_option() {
        $id = $_GET['id'];
        if (!empty($id)) {
            update_option($id, $_GET['val']);
            die(true);
        }
    }

    function ajax_toggle_group() {
        $id = $_GET['id'];
        if (!empty($id)) {
            $groups = get_option('emb_groups');
            if ($id == 'all') {
                foreach ($groups as $key => $group) {
                    $groups[$key]['show'] = $_GET['val'] == 'true';
                }
            } else {
                $groups = get_option('emb_groups');
                $groups[$id]['show'] = !$groups[$id]['show'];
            }
            update_option('emb_groups', $groups);
            die(true);
        }
    }

    function ajax_add_group() {
        $name = $_GET['val'];
        $groups = get_option('emb_groups');
        $names = array_map('strtolower', array_keys($groups));
        if (!empty($name) && !in_array(strtolower($name), $names)) {
            $groups[$name] = array('show' => true);
            update_option('emb_groups', $groups);
            $this->display_group_table($name, $groups[$name]);
            die();
        } else {
            die("ERROR: The name '$name' is already in use. Please choose another name.");
        }
    }

    function ajax_rename_group() {
        $id = $_GET['id'];
        if (!empty($id)) {
            global $wpdb;
            $name = $_GET['val'];
            $groups = get_option('emb_groups');
            $names = array_map('strtolower', array_keys($groups));
            if (!in_array(strtolower($name), $names)) {
                // Prevent clash of names with "Default" group name.
                if (strtolower($name) == strtolower(EMB_DEFAULT_GROUP)) {
                    $name = EMB_DEFAULT_GROUP;
                }
                $groups[$name] = $groups[$id];
                unset($groups[$id]);
                update_option('emb_groups', $groups);
                $addwhere = $id == EMB_DEFAULT_GROUP ? ' OR emgroup IS NULL' : '';
                $wpdb->query("UPDATE ".EMB_TABLE." SET emgroup = '$name' WHERE emgroup = '$id'".$addwhere);
                $this->display_group_table($name, $groups[$name]);
                die();
            } else {
                die("ERROR: The name '$name' is already in use. Please choose another name.");
            }
        }
    }

    function ajax_disable_group() {
        $group = $_GET['group'];
        if (!empty($group)) {
            global $wpdb;
            $state = $_GET['state'] == 'true';
            $addwhere = $group == EMB_DEFAULT_GROUP ? ' OR emgroup IS NULL' : '';
            $embeds = $wpdb->get_results("SELECT * FROM ".EMB_TABLE." WHERE emgroup = '$group'".$addwhere);
            if (!empty($embeds)) {
                foreach ($embeds as $embed) {
                    $options = emb_set_option($embed->options, 'disabled', $state);
                    $wpdb->query("UPDATE ".EMB_TABLE." SET options = '$options' WHERE embed = '$embed->embed'");
                }
            }
            die(true);
        }
    }

    function ajax_delete_group() {
        $group = $_GET['group'];
        if (!empty($group)) {
            global $wpdb;
            $groups = get_option('emb_groups');
            unset($groups[$group]);
            $count = $wpdb->query("UPDATE ".EMB_TABLE." SET emgroup = ".EMB_DEFAULT_GROUP." WHERE emgroup = '$group'");
            if ($count > 0) {
                $groups[EMB_DEFAULT_GROUP]['show'] = true;
                $this->display_group_table(EMB_DEFAULT_GROUP, $groups[EMB_DEFAULT_GROUP]);
            }
            update_option('emb_groups', $groups);
            die();
        }
    }

    function ajax_disable_embed() {
        $id = $_GET['id'];
        if (!empty($id)) {
            global $wpdb;
            $state = $_GET['val'] == 'true';
            $embeds = $wpdb->get_results("SELECT * FROM ".EMB_TABLE." WHERE embed = '$id'");
            if (count($embeds) > 0) {
                $options = emb_set_option($embeds[0]->options, 'disabled', $state);
                $query = "UPDATE ".EMB_TABLE." SET options = '$options' WHERE embed = '$id'";
                $wpdb->query($query);
                die(true);
            }
        }
        die(false);
    }

    function ajax_delete_embed() {
        $embed = $_GET['id'];
        if (!empty($embed)) {
            global $wpdb;
            $wpdb->query("DELETE FROM ".EMB_TABLE." WHERE embed = '$embed'");
            die(true);
        }
        die(false);
    }

    function ajax_move_embed() {
        $embed = $_GET['embed'];
        $group = $_GET['group'];
        if (!empty($embed) && !empty($group)) {
            global $wpdb;
            $count = $wpdb->query("UPDATE ".EMB_TABLE." SET emgroup = '".$group."' WHERE embed = '$embed'");
            if ($count > 0) {
                $groups = get_option('emb_groups');
                $groups[$group]['show'] = true;
                $this->display_group_table($group, $groups[$group]);
                update_option('emb_groups', $groups);
                die();
            }
        }
    }

    function ajax_copy_embed() {
        $this->ajax_rename_embed(true);
    }

    function ajax_rename_embed($copy = false) {
        $oldname = strtolower($_GET['id']);
        $newname = strtolower($_GET['val']);
        if (!empty($oldname) && !empty($newname)) {
            if (emb_validate_embed_name($newname)) {
                global $wpdb;
                if ($copy) {
                    $rows = $wpdb->get_results("SELECT * FROM ".EMB_TABLE." WHERE embed = '$oldname'");
                    $embed = $rows[0];
                    $wpdb->query("INSERT INTO ".EMB_TABLE." VALUES ('$newname', '$embed->emgroup', '$embed->description', '$embed->value', '$embed->options', '$embed->data')");
                } else {
                    $wpdb->query("UPDATE ".EMB_TABLE." SET embed = '$newname' WHERE embed = '$oldname'");
                    $rows = $wpdb->get_results("SELECT emgroup FROM ".EMB_TABLE." WHERE embed = '$newname'");
                }
                $group = $rows[0]->emgroup;
                $groups = get_option('emb_groups');
                $this->display_group_table($group, $groups[$group]);
                die();
            } else {
                die("ERROR: The name '$newname' is already in use. Please choose another name.");
            }
        }
    }

    function display_group_table($group, $settings) {
        $entries = emb_get_embeds('*', $group);
        emb_output_group($group, $settings, count($entries) == 0, $entries);
    }

    function starts_with($str, $sub) {
        return substr($str, 0, strlen($sub)) == $sub;
    }

    function ends_with($str, $sub) {
        return substr($str, strlen($str) - strlen($sub)) == $sub;
    }

    function str_after($str, $sub) {
        return substr($str, strpos($str, $sub) + strlen($sub));
    }
}