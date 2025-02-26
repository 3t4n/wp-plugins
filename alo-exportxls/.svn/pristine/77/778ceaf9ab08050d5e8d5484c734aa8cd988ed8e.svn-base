<?php // No direct access, only through WP
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) die('You can\'t call this page directly.'); ?>


<div class="wrap">
    <div id="icon-index" class="icon32"><br /></div>
    <h2>Alo Export Xls</h2>
    <div id="dashboard-widgets-wrap">
    
    
<?php 
/**
 * --- start MAIN --------------------------------------------------------------
 */
?>

<?php
if($_REQUEST['message'] == 'error') {
	print '<div id="message" class="updated fade"><p>Error during process. Have you setted up the file exportation path? Go to <em>Settings > Alo Export Xls</em>.</p></div>';
}
?>

<form name="post" action="<?php echo get_option ('siteurl').'/' ?>wp-content/plugins/alo-exportxls/alo-exportxls_action.php" method="post" id="post">

<h3>From WP database to XLS file</h3>
<p style='margin-top:20px;'>Choose the table to export into a XLS file:</p>

<select name="select_table" id="select_table" >'
    <option value="posts">Posts</option>
    <option value="posts_meta">Posts &amp; meta</option>
    <option value="users">Users</option>
    <option value="users_meta">Users &amp; meta</option>
    <option value="links">Links</option>
    <option value="comments">Comments</option>
</select>

<?php // Submit ?>
    <span class="submit">
    <?php wp_nonce_field('alo-exportxls_main'); ?>
    <input type="submit" name="submit" value="Send" style='font-weight:bold' />
    </span>     
</form>

<p style='margin-top:20px;'>Then, once file opened, use your XLS editor to save (usually <em>Menu > Save as...</em>) and edit the file.</p>
<p>Do you need an open source editor for XLS? Try <a href='http://www.openoffice.org/product/calc.html' target='_blank'>OpenOffice Calc.</a></p>

<p style='margin-top:20px;'><?php echo ALO_EX_FOOTER; ?></p>

<?php 
/**
 * --- end MAIN ----------------------------------------------------------------
 */
?>

        </div>	
        
        
        <div class="clear">
        </div>
    </div>
</div><!-- wrap -->	
