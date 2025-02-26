<?php
/*
Plugin Name: Alphabetical List
Plugin URI: http://web-argument.com/wordpress-alphabetical-list-plugin/
Description: List your post alphabetically with categories selection feature. 
Version: 1.0.3
Author: Alain Gonzalez
Author URI: http://web-argument.com/wordpress-alphabetical-list-plugin/
*/


add_filter('posts_orderby', 'alphabetical_order_cat' );
add_action('admin_menu', 'alphabetical_order_setting');

function alphabetical_order_cat($orderby)
{	
	if(    ( count(get_option('alph_list_cat_arr')) != 0 )  AND  (   is_category( get_option('alph_list_cat_arr'))  )    ){
     return "post_title ASC";
  } else { 
     return $orderby;
}  
}


// action function for above hook
function alphabetical_order_setting() {
    // Add a new submenu under Manage:
    add_options_page('Alphabetical List', 'Alphabetical List', 'administrator', 'alphabetical-list', 'alphabetical_order_man'); 
	 
}
function alphabetical_order_man() { 
    $alph_list_cat_arr_loop = array ();	
	$alph_list_cat_arr_op = get_option('alph_list_cat_arr');
	$categories =  get_categories();
	    
    if(isset($_POST['Submit'])) 	{
		for ($j = 0; $j <= count($categories); $j++) {
		if (isset($_POST["cat".$j])) {
		  $alph_list_cat_arr_loop[$j] = $_POST["cat".$j];	
		  }		  
        }
		$alph_list_cat_arr_op = $alph_list_cat_arr_loop;
		update_option('alph_list_cat_arr', $alph_list_cat_arr_loop);    

?>
<div class="updated"><p><strong><?php _e('Options saved.', 'mt_trans_domain' ); ?></strong></p></div>
<?php  }  ?>

<div class="wrap">   

<form method="post" name="options" target="_self">

<h2>Select the Categories to Order  Alphabetically</h2>

<table width="100%" cellpadding="10" class="form-table">

    <tr>
        <td width="200" align="right"><input name="m_cat_chk_all" id="m_cat_chk_all" type="checkbox" /> 
        <td align="left"><strong><?php _e('Check All') ?></strong></td>
    </tr>
    <tr>
      <td align="left" colspan="2">           
        <table width="100%" cellpadding="10" class="form-table" id="chk_cat">
			<?php    
            $i= 0; 
            foreach ($categories as $cat) { ?>
            <tr valign="top">
            <td width="200" align="right"><input name="cat<?php echo $i; $i ++ ?>" type="checkbox" value="<?php echo $cat->cat_ID ?>"  	
            <?php
            if ($alph_list_cat_arr_op!= '')	{
            if (in_array($cat->cat_ID, $alph_list_cat_arr_op)) {
            echo "checked=\"checked\"";
            }
            }	
            ?>
            />
            <td align="left" scope="row"><?php echo $cat->cat_name ?></td>
            </tr>
            <?php }  ?>
        </table>    
      </td>
    </tr> 
</table>

<p class="submit">
<input type="submit" name="Submit" value="Update" />
</p>

</form>
</div>

<script type="text/javascript">

(function ($) {

	 $(document).ready(function(){

    	$("#m_cat_chk_all").click(function()
		  {
		   var checked_status = this.checked;
		   $("#chk_cat input").each(function()
		   {
			this.checked = checked_status;
		   });
		});		
	
	 });
})(jQuery);


</script>

<?php }  ?>