     </pre>
<div class="wrap"><form action="options.php" method="post" name="options">
<h2>Select Your Settings</h2>
<?php wp_nonce_field('update-options');?>
<table class="form-table" width="100%" cellpadding="10">
<tbody>

<tr>
    <th>
        <label for="mind_disclaimer_sidewide">Sidewide Protection</label>
    </th>
    <td scope="row" align="left">
        <input id="mind_disclaimer_sidewide" name="mind_disclaimer_sidewide" <?php echo $sidewideProtection;?> type="checkbox" value="yes" />
        <p class="description">Enable this flag if you want to have the disclaimer shown on every webpage of your 
        website. If you disable the flag then you can have the disclaimer popup in selected pages and posts by adding the [disclaimer] shortcode in them.
        </p>
    </td>
</tr>

<tr>
    <th>
        <label for="mind_disclaimer_show_once">Show Disclaimer Only Once</label>
    </th>
    <td scope="row" align="left">
        <input id="mind_disclaimer_show_once" name="mind_disclaimer_show_once" <?php echo $showOnce;?> type="checkbox" value="yes" />

        <p class="description">Turn this setting off if you want the disclaimer to keep on popping up.</p>
    </td>
</tr>

<tr>
    <th>
        <label for="mind_disclaimer_title">Disclaimer Title</label>
    </th>
    <td scope="row" align="left">
        <input 
            id="mind_disclaimer_title"
            class="regular-text"
             name="mind_disclaimer_title" type="text" value="<?php echo esc_html($title);?>" />
    </td>
</tr>

<tr>
    <th>
        <label for="mind_disclaimer_text">Disclaimer Text</label>
    </th>
    <td scope="row" align="left">
        <?php wp_editor( __(get_option('mind_disclaimer_text', '')), 'mind_disclaimer_text', $settings);?>
    </td>
</tr>


<tr>
    <th>
        <label for="mind_accept_text">Accept Link Text</label>
    </th>
    <td scope="row" align="left">
        <input id="mind_accept_text" name="mind_accept_text" 
            class="regular-text"
            type="text" value="<?php echo esc_html($acceptText);?>" />
    </td>
</tr>

</tbody>
</table>
 <input type="hidden" name="action" value="update" />
 <input type="hidden" name="page_options" value="mind_disclaimer_sidewide,mind_disclaimer_show_once,mind_disclaimer_text,mind_accept_text,mind_disclaimer_title" />
 <input type="submit" name="Submit" value="Update" /></form></div>
<pre>
