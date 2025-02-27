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

$add = $req->action == 'embed-add-entry' || $req->action == 'embed-new-entry';
$edit = $req->action == 'embed-edit-entry' || $req->action == 'embed-update-entry';
$rename = $req->action == 'embed-newname-entry' || $req->action == 'embed-rename-entry';
$copy = $req->action == 'embed-newcopy-entry' || $req->action == 'embed-copy-entry';

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
if ($edit) {
    echo '<h2>Edit Embed</h2>';
} else if ($rename) {
    echo '<h2>Rename Embed</h2>';
} else if ($copy) {
    echo '<h2>Copy Embed</h2>';
} else {
    echo '<h2>Add Embed</h2>';
} ?>

<div id="ajax-response"></div>
<span id="autosave"></span>
<form name="addembed" id="addembed" class="add validate" method="post"
    action="<?php echo EMB_PAGENAME; ?>">
<table id="embed-form-table" class="form-table">
<?php if ($rename || $copy) { ?>
    <tr class="form-field form-required">
        <th scope="row"><label for="embed">Old embed name</label></th>
        <td><?php echo $req->oldembed; ?></td>
    </tr>
    <?php } ?>
    <tr class="form-field form-required">
        <th scope="row"><?php if ($rename || $copy) { ?> <label
            for="embed">New embed name</label> <?php } else { ?> <label
            for="embed">Embed name</label> <?php } ?></th>
        <td class="<?php echo $req->error_field['embed']; ?>"><?php if ($add || $rename || $copy) { ?>
        <input name="embed" id="embed" type="text"
            value="<?php echo $req->embed; ?>" size="20" /> <br />
        This is the name you will use wherever you want to embed the
        HMTL for this embed. <?php } else { ?> <?php echo $req->embed; ?>
        <?php } ?></td>
    </tr>
    <?php if ($add || $edit) {
        $options = emb_get_options(); ?>
    <tr class="form-field" id="emgroup-row">
        <th scope="row"><label for="emgroup" id="emgroup-head">Group</label></th>
        <td><select name="emgroup" id="emgroup" style="min-width: 200px">
        <?php emb_add_embed_groups($req->emgroup); ?>
        </select> <br />
        Select the group the embed belongs to.</td>
    </tr>
    <tr class="form-field" id="description-row">
        <th scope="row"><label for="description" id="description-head">Description</label></th>
        <td><input name="description" id="description" type="text"
            value="<?php echo $req->description; ?>" size="40" /> <br />
        Enter a description of the embed to remind you of what it
        represents.</td>
    </tr>
    <tr class="form-field" id="value-row">
        <th scope="row"><label for="value" id="value-head">Value</label></th>
        <td class="<?php echo $req->error_field['value']; ?>"><textarea
            id="value" name="value" rows="8" cols="80"><?php echo $req->value; ?></textarea>
        <br />
        Enter the HTML you want to replace the embed with.</td>
    </tr>
    <tr class="form-field" id="options-row">
        <th scope="row"><label for="options" id="options-head">Options</label></th>
        <td class="<?php echo $req->error_field['options']; ?>"><?php
        emb_insert_option('allow-in-comments', $options, $req->options, 0);
        emb_insert_option('disabled', $options, $req->options, 0, true);
        ?></td>
    </tr>
    <tr class="form-field" id="autoembed-row">
        <th scope="row"><label for="autoembed" id="autoembed-head">Auto
        Embed</label></th>
        <td class="<?php echo $req->error_field['autoembed']; ?>">If you
        want the HTML to be embedded automatically, select one or more
        of the following places to insert it:<?php
        emb_insert_option('before-single-post-content', $options, $req->options, 20);
        emb_insert_option('after-single-post-content', $options, $req->options, 20);
        emb_insert_option('before-multi-post-content', $options, $req->options, 20);
        emb_insert_option('after-multi-post-content', $options, $req->options, 20);
        emb_insert_option('before-page-content', $options, $req->options, 20);
        emb_insert_option('after-page-content', $options, $req->options, 20);
        ?></td>
    </tr>
    <tr class="form-field" id="priority-row" style="display: none">
        <th scope="row"><label for="priority" id="priority-head">Priority</label></th>
        <td><input name="priority" id="priority" type="text"
            value="<?php echo $req->priority; ?>" size="10" /> <br />
        Enter the priority for this embed. You only need to change this
        if you are auto-embedding <br />
        more than one embed in the same place (e.g. at the end of the
        page content). The embeds will <br />
        appear in numerical order (e.g. priority <strong>10</strong>
        before priority <strong>20</strong>).</td>
    </tr>
    <tr class="form-field" id="include-row" style="display: none">
        <th scope="row"><label for="include-tags" id="include-head">Include/Exclude</label></th>
        <td>
        <div class="pages-only"><label for="include-pages">Include Page
        Parents:</label> <input name="include-pages" id="include-pages"
            type="text" value="<?php echo $req->include_pages; ?>"
            size="10" /></div>
        <div class="pages-only"><label for="exclude-pages">Exclude Page
        Parents:</label> <input name="exclude-pages" id="exclude-pages"
            type="text" value="<?php echo $req->exclude_pages; ?>"
            size="10" /></div>
        <div><label for="include-cats">Include Categories:</label> <input
            name="include-cats" id="include-cats" type="text"
            value="<?php echo $req->include_cats; ?>" size="10" /></div>
        <div><label for="exclude-cats">Exclude Categories:</label> <input
            name="exclude-cats" id="exclude-cats" type="text"
            value="<?php echo $req->exclude_cats; ?>" size="10" /></div>
        <div><label for="include-tags">Include Tags:</label> <input
            name="include-tags" id="include-tags" type="text"
            value="<?php echo $req->include_tags; ?>" size="10" /></div>
        <div><label for="exclude-tags">Exclude Tags:</label> <input
            name="exclude-tags" id="exclude-tags" type="text"
            value="<?php echo $req->exclude_tags; ?>" size="10" /></div>
        </td>
    </tr>
    <tr class="form-field" id="wrap-row">
        <th scope="row"><label for="wrap" id="wrap-head">Wrap Embed</label></th>
        <td class="<?php echo $req->error_field['wrap']; ?>"><?php emb_insert_option('wrap', $options, $req->options); 
        if (empty($req->wrapwith)) $req->wrapwith = 'span'; ?>
        <div id='optional-wrap' class='optional'>
        <div><span>Wrapped by:</span><input class="option" type="radio"
            id="span" name="wrapwith[]" value="span"
            <?php echo (strpos($req->wrapwith, 'span') !== false ? 'checked ' : ''); ?> />
        <label class="option-label" for="wrapspan">span</label></div>
        <div><span>or:</span><input class="option" type="radio" id="div"
            name="wrapwith[]" value="div"
            <?php echo (strpos($req->wrapwith, 'div') !== false ? 'checked ' : ''); ?> />
        <label class="option-label" for="wrapdiv">div</label></div>
        <div><label class="option-label" for="wrapclass">CSS Class
        name(s): </label> <input type="text" id="wrapclass"
            name="wrapclass" size="30"
            value="<?php echo $req->wrapclass; ?>" /> <span>(separated
        by spaces)</span></div>
        <div><label class="option-label" for="wrapstyle">CSS Style(s): </label>
        <input type="text" id="wrapstyle" name="wrapstyle" size="30"
            value="<?php echo $req->wrapstyle; ?>" /> <span>(separated
        by semi-colons)</span></div>
        <div><label class="option-label"></label> <span
            style="font-style: italic;">(Note: Embed attributes can be
        used in both these settings.)</span></div>
        </div>
        </td>
    </tr>
    <tr class="form-field" id="user-function-row">
        <th scope="row"><label for="user-function"
            id="user-function-head">Call User Function</label></th>
        <td class="<?php echo $req->error_field['user-function']; ?>"><?php emb_insert_option('user-function', $options, $req->options); ?>
        <div id='optional-user-function' class='optional'><input
            type="text" id="userfunction" name="userfunction" size="20"
            value="<?php echo $req->userfunction; ?>" /> <br />
        Enter the name of the user-defined function to call before the
        embed is displayed. <br />
        The function must exist in the code base of your blog, usually
        in another plugin, or the functions.php file in your blog's
        theme directory. <br />
        See the Embedder Plugin documentation for more details.</div>
        </td>
    </tr>
    <?php } ?>
</table>
<p class="submit"><?php if ($edit) { ?> <?php wp_nonce_field('emb_plugin_update'); ?>
<input type="hidden" name="embed" value="<?php echo $req->embed; ?>" />
<input type="hidden" name="action" value="embed-update-entry" /> <input
    type="submit" class="button" name="submit" value="Save Changes" />&nbsp;
<input type="submit" class="button" name="cancel" value="Cancel" /> <?php } else if ($rename) { ?>
<input type="hidden" name="oldembed"
    value="<?php echo $req->oldembed; ?>" /> <input type="hidden"
    name="action" value="embed-rename-entry" /> <input type="submit"
    class="button" name="submit" value="Rename" />&nbsp; <input
    type="submit" class="button" name="cancel" value="Cancel" /> <?php } else if ($copy) { ?>
<input type="hidden" name="oldembed"
    value="<?php echo $req->oldembed; ?>" /> <input type="hidden"
    name="action" value="embed-copy-entry" /> <input type="submit"
    class="button" name="submit" value="Copy" />&nbsp; <input
    type="submit" class="button" name="cancel" value="Cancel" /> <?php } else { ?>
    <?php wp_nonce_field('emb_plugin_add'); ?> <input type="hidden"
    name="action" value="embed-add-entry" /> <input type="submit"
    class="button" name="submit" value="Add Embed" />&nbsp; <input
    type="submit" class="button" name="cancel" value="Cancel" /> <?php } ?>
</p>
</form>
</div>
