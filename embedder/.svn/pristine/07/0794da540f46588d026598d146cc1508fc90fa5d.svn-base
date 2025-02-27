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

function emb_display_embed_table($req) { ?>
<div id="manage-embed-page" class="wrap"><?php if (emb_is_table_present() && emb_is_compatible_version()) { ?>
<h2>Manage Embeds <a class="button add-new-h2"
    href="<?php echo EMB_PAGENAME; ?>&amp;action=embed-new-entry">Add
New Embed</a> <a id="add-new-group" class="button add-new-h2"
    href="<?php echo EMB_PAGENAME; ?>&amp;action=group-new">Add New
Group</a></h2>
<?php if (!empty($req->info_message)) { ?>
<div id="message"
    class="updated fade <?php echo ($req->info_message > 19 ? 'embed-error' : '')?>">
<p><?php echo emb_get_info_message($req->info_message); ?></p>
</div>
<?php }
if (!empty($req->error_messages)) { ?>
<div id="message" class="updated fade">
<h3>Error message(s):</h3>
<ul>
<?php foreach ($req->error_messages as $message) {
    echo '- '.$message."<br/>";
} ?>
</ul>
</div>
<?php } ?>
<table id="new-group-table">
    <thead />
</table>
<div id="ajax-fields" style="padding: 10px 0 10px 20px"><input
    type="hidden" id="emb-ajax-url"
    value="<?php bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php"> <img
    id="emb-spinner"
    src="<?php echo site_url(); ?>/wp-admin/images/wpspin_light.gif"
    class="waiting" />
<div id="new-group-dialog" class="dialog-hide ajax-dialog">
<h4>Add New Group</h4>
<div><label for="new-name">Enter the name of the new group:</label> <input
    name="new-name" id="new-name" type="text" value="" size="30" /></div>
<div class="dialog-buttons"><input type="submit"
    class="button-primary submit" name="submit" value="Add" /> <input
    type="submit" class="button-secondary cancel" name="cancel"
    value="Cancel" /> <span class="dialog-message"></span></div>
</div>
<div id="rename-group-dialog" class="dialog-hide ajax-dialog">
<h4>Rename Group</h4>
<div><label for="new-name">Enter the new name of the group:</label> <input
    name="new-name" id="new-name" type="text" value="" size="30" /></div>
<div class="dialog-buttons"><input type="submit"
    class="button-primary submit" name="submit" value="Rename" /> <input
    type="submit" class="button-secondary cancel" name="cancel"
    value="Cancel" /> <span class="dialog-message"></span></div>
</div>
<div id="rename-embed-dialog" class="dialog-hide ajax-dialog">
<h4>Rename Embed</h4>
<div><label for="new-name">Enter the new name of the embed:</label> <input
    name="new-name" id="new-name" type="text" value="" size="30" /></div>
<div class="dialog-buttons"><input type="submit"
    class="button-primary submit" name="submit" value="Rename" /> <input
    type="submit" class="button-secondary cancel" name="cancel"
    value="Cancel" /> <span class="dialog-message"></span></div>
</div>
<div id="copy-embed-dialog" class="dialog-hide ajax-dialog">
<h4>Copy Embed</h4>
<div><label for="new-name">Enter a name for the new embed:</label> <input
    name="new-name" id="new-name" type="text" value="" size="30" /></div>
<div class="dialog-buttons"><input type="submit"
    class="button-primary submit" name="submit" value="Copy" /> <input
    type="submit" class="button-secondary cancel" name="cancel"
    value="Cancel" /> <span class="dialog-message"></span></div>
</div>
<input id='emb_new_parser' class='option global-option' type='checkbox'
<?php echo get_option('emb_new_parser') == 'true' ? 'checked="checked"' : '' ?> />
<label class='option-label' for='emb_new_parser'>Use the new Embedder
parser</label> <label>(recommended: <a
    href="http://moztools.com/wordpress/embedder-plugin/new-embed-parser">click
here</a> for more information).</label></div>
<div id="ajax-message" style="margin: 5px 2px 10px 20px; color: red"><span
    class="updated fade" style="display: none; padding: 4px;"></span></div>
<a id="show-all-groups"
    href='<?php echo EMB_PAGENAME; ?>&amp;action=group-show-all'
    class='button'>Expand All Groups</a> <a id="hide-all-groups"
    href='<?php echo EMB_PAGENAME; ?>&amp;action=group-hide-all'
    class='button'>Collapse All Groups</a> <?php // Fetch the groups and index definitions from the database.
$groups = emb_get_groups();
$entries = emb_get_embeds("*");
$empty = false;
foreach ($groups as $group => $settings) {
    if (!$empty) {
        $empty = true;
        // Look to see if the group has an embed.
        foreach ($entries as $entry) {
            if (empty($entry->emgroup)) $entry->emgroup = EMB_DEFAULT_GROUP;
            if ($entry->emgroup == $group) {
                $empty = false;
                break;
            }
        }
        // If a group is empty then the rest are too, so we
        // can insert a title to separate them from the rest.
        if ($empty) { ?>
<h4 id="empty-groups">Empty Groups</h4>
        <?php }
    }
    emb_output_group($group, $settings, $empty, $entries);
}
if (!$empty) { ?>
<h4 id="empty-groups">Empty Groups</h4>
<?php } ?>
<div>
<h2><a class="import-link" onclick="show_import_fields()">Import Embeds
&raquo;</a></h2>
<div id="import-wrapper" class="embed-hide">
<p>Paste one or more embeds into the text box below and click the <b>Import
Embeds</b> button to import them.</p>
<p>The imported embeds will be disabled so you can review them before
you start using them. Any import with the same name as an existing embed
will be renamed to prevent the old one from being overwritten.</p>
<form name="importembed" id="importembed" class="add validate"
    method="post" action="<?php echo EMB_PAGENAME; ?>"><textarea
    id="import" name="import" rows="20" cols="100"
    style="font-size: 8pt"></textarea>
<div><input type="hidden" name="action" value="embed-import-entry" /> <input
    type="submit" class="button" name="submit" value="Import" /></div>
</form>
</div>
</div>
<?php } else { ?>
<div id="message" class="error fade embed-error">
<p><?php if (!emb_is_table_present()) {
    echo emb_get_admin_error_message('database-not-found');
} else {
    echo emb_get_admin_error_message('version-out-of-date');
} ?></p>
</div>
<?php } ?>
<div
    style="margin-top: 20px; border: 2px solid #ffcc99; background-color: #ffeecc; padding: 10px;">
For more help with Embedder, please visit the <a
    href="http://moztools.com/wordpress/embedder-plugin">Moztools
Embedder Plugin Website</a> where you will find tutorials, examples, and
plenty of other information on using the plugin.</div>
<div class="tablenav"></div>
<br class="clear" />
</div>
<br />
<a style="font-size: 8pt" href="#" onclick='uninstall_plugin()'>Uninstall
Embedder Plugin</a>
<div id='uninstall' class='embed-hide'>
<p>You are about to uninstall the Embedder plugin. 



<p>All embeds and settings created using the Embedder plugin will be deleted, including the database table used by the plugin (wp_emb_embeds).</p>
    <p>If you just want to deactivate the plugin temporarily, go to the <a
    href="plugins.php">Plugin Management</a> page and deactivate it from there</p>  
    <p style="color:red">Once you click uninstall, it cannot be undone.</p>
    <p>Note: this will not delete the plugin from the system. The plugin can still be reactivated from the Plugin Management page later.</p>
    <div
    style="margin:20px 0 0 40px;padding:30px;text-align:center;width:500px;border 1px dotted #ddd;background-color:#eee;">
        <p>Are you sure you want to uninstall the Embedder plugin?</p>
        <input type="checkbox" name="uninstall-check"
    id="uninstall-check" onclick='uninstall_confirmed()'>&nbsp;Yes 
        <br />
        <form name="uninstall" id="uninstall" class="add validate"
    method="post" action="<?php echo EMB_PAGENAME; ?>">
            <input type="hidden" name="action"
    value="embed-uninstall-plugin" />
            <input style="margin-top: 20px;" disabled
    id="uninstall-button" type="submit" class="button" name="submit"
    value="Uninstall Embedder" />
        </form>
    </div>  
</div>
<br/>
</div>  <!-- Extra end-div pushes footer to bottom of screen. -->
<?php }

function emb_output_group($group, $settings, $empty, $entries) { ?> 
    <table id="<?php echo emb_get_group_id($group); ?>" class="embeds widefat<?php echo $empty ? ' empty-group' : ''; ?>" summary="<?php echo $group;?>" style="table-layout:fixed;">
        <col width="140">
        <col width="200">
        <col width="70">
        <col width="80">
        <col>
        <col width="165">
        <thead>
            <tr class="group-header">
                <th colspan="2">
                    <a class="group-expand<?php echo ($settings['show'] ? ' group-visible' : '').($empty ? ' group-hide' : '');?>" href="<?php echo EMB_PAGENAME; ?>&amp;action=group-expand&amp;emgroup=<?php echo $group; ?>"></a>
                    <span>Group:</span>
                    <span class="group-title"><?php echo $group;?></span>
                </th>
                <th colspan="4" style="font-weight:normal;text-align:right">
                    <span>Group actions: 
                        <a href='<?php echo EMB_PAGENAME; ?>&amp;action=group-newname&amp;oldemgroup=<?php echo $group; ?>' title='Rename this group' class='edit group-rename'>Rename</a>
<span
    class="populated-group-actions<?php echo $empty ? ' group-hide' : ''; ?>">
                            | <a
    href='<?php echo EMB_PAGENAME; ?>&amp;action=group-disable&amp;emgroup=<?php echo $group; ?>'
    title='Disable all the embeds in this group'
    class='edit group-disable-all'>Disable All</a>
                            | <a
    href='<?php echo EMB_PAGENAME; ?>&amp;action=group-enable&amp;emgroup=<?php echo $group; ?>'
    title='Enable all the embeds in this group'
    class='edit group-enable-all'>Enable All</a>
                            | <a
    href='<?php echo EMB_PAGENAME; ?>&amp;action=group-export&amp;emgroup=<?php echo $group; ?>'
    title='Export all the embeds in this group'
    class='edit group-export-all'>Export All</a>
                        </span>    
                        <?php if ($group != EMB_DEFAULT_GROUP) { ?>
                            | <a
    href='<?php echo EMB_PAGENAME; ?>&amp;action=group-delete&amp;emgroup=<?php echo $group; ?>'
    title='Delete this group (and move all embeds to "Default" group)'
    class="reset group-delete">Delete</a>
    <?php } ?>
                    </span>
                </th>
            </tr>
            <tr
    class="embed-titles <?php echo (!$empty && $settings['show'] ? '' : ' group-hide'); ?>">
                <th><a
        href='<?php echo EMB_PAGENAME; ?>&amp;action=embed-sort-entries&amp;by=embed'
        class='reset'>Name</a></th>
                <th><a
        href='<?php echo EMB_PAGENAME; ?>&amp;action=embed-sort-entries&amp;by=description'
        class='reset'>Description</a></th>
                <th>Priority</th>
                <th>Attributes</th>
                <th><a
        href='<?php echo EMB_PAGENAME; ?>&amp;action=embed-sort-entries&amp;by=value'
        class='reset'>Value</a></th>
                <th class="actions">Actions</th>
            </tr>
        </thead>
        <tbody
    class="embed-listing <?php echo ($settings['show'] ? '' : ' group-hide'); ?>">
    <?php if (!$empty) {
        foreach ($entries as $entry) {
            if (empty($entry->emgroup)) $entry->emgroup = EMB_DEFAULT_GROUP;
            if ($entry->emgroup == $group) {
                $count++;
                // Decode for Javascript function call
                $name = addslashes(@html_entity_decode($entry->embed, ENT_COMPAT, 'UTF-8'));
                $disabled = emb_is_disabled($entry->options);
                // Truncate the length of the value of the embed to 80 characters
                if (strlen($entry->value) > 150) {
                    $entry->value = substr($entry->value, 0, 150).'...';
                }
                ?>
                        <tr id="embed-row-<?php echo $entry->embed; ?>"
        class="<?php echo $disabled ? 'embed-disabled' : 'embed-row' ?>">
                            <td style="font-weight:bold;font-size:10pt"
            class="embed-title drag-handle">
                                <a class="embed-name"
            title="Edit this embed's settings"
            href="<?php echo EMB_PAGENAME; ?>&amp;action=embed-edit-entry&amp;embed=<?php echo $entry->embed; ?>"><?php echo $entry->embed; ?></a>
                            </td>
                            <td class="drag-handle"><?php echo $entry->description; ?></td>
                            <td class="drag-handle"><?php echo $data->priority; ?></td>
                            <td class="drag-handle"><?php echo emb_get_attributes($entry->value); ?></td>
                            <td class="drag-handle"><?php echo $entry->value; ?></td>
                            <td class="actions"><a
            href='<?php echo EMB_PAGENAME; ?>&amp;action=embed-edit-entry&amp;embed=<?php echo $entry->embed; ?>'
            class='edit'>Edit</a> |
                            <a class='edit embed-rename'
            href='<?php echo EMB_PAGENAME; ?>&amp;action=embed-newname-entry&amp;oldembed=<?php echo $entry->embed; ?>'>Rename</a> |
                            <a class='edit embed-copy'
            href='<?php echo EMB_PAGENAME; ?>&amp;action=embed-newcopy-entry&amp;oldembed=<?php echo $entry->embed; ?>'>Copy</a><br>
                            <a class='edit embed-edit'
            href='<?php echo EMB_PAGENAME; ?>&amp;action=embed-export-entry&amp;embed=<?php echo $entry->embed; ?>'>Export</a> |
                            <a
            class='edit embed-enable<?php echo !$disabled ? ' embed-hide' : ''; ?>'
            href='<?php echo EMB_PAGENAME; ?>&amp;action=embed-enable-entry&amp;embed=<?php echo $entry->embed; ?>'>Enable</a>
                            <a
            class='edit embed-disable<?php echo $disabled ? ' embed-hide' : ''; ?>'
            href='<?php echo EMB_PAGENAME; ?>&amp;action=embed-disable-entry&amp;embed=<?php echo $entry->embed; ?>'>Disable</a> |
                            <a class='reset embed-delete'
            href='<?php echo EMB_PAGENAME; ?>&amp;action=embed-delete-entry&amp;embed=<?php echo $entry->embed; ?>'>Delete</a></td>
                        </tr>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
        </tbody>
    </table>
<?php } ?>