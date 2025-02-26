<?php
if ( ! defined('ABSPATH')) exit;  // if direct access
/*
 * Add menu page in admin section.. 
 */
function spt_title()
{
  add_options_page('Simple Page Title', 'Simple Page Title', 'manage_options', 'spt', 'spt'); 
}

add_action('admin_menu', 'spt_title');

function spt(){
?>
<!--
 page setting start here..
 -->
<div class="wrap" id="custom-page-title"> 
   <h1><?php //echo $x; ?>
   	
   	<?php echo __( 'Simple Page Title' ); ?>

   </h1>
   <form name="spt" id="spt" action='' method="post">
      <div id="poststuff">
	    <div id="post-body" class="metabox-holder columns-2">
	       <div id="post-body-content">
		   	 <!-- top tabs -->
			   	 <div id="custom_title">
				    <ul class="nav nav-pills" id="tab_simple">
				        <li class="active"><a href="1b" data-toggle="tab">Page Titles</a>
				        </li>
				        <li><a href="2b" data-toggle="tab">Archieve Page</a>
				        </li>
				        <li><a href="3b" data-toggle="tab">Single Page</a>
				        </li>
				        <li><a href="4b" data-toggle="tab">Other Page</a>
				        </li>
				        <li><a href="5b" data-toggle="tab">Class and ID</a>
				        </li>
				        <li><a href="6b" data-toggle="tab">Dcoumentation</a>
				        </li>
				    </ul>
				</div>
			<!-- top tabs -->
			<!-- bottom tabs -->
			     <div class="tab-content-title clearfix">
				     <div class="tab-pane active" id="1b">
				          <?php
				            $hidden_field = 'post_title';
				            if(isset($_POST[ $hidden_field ]) && $_POST[ $hidden_field ] == 'changes')
				            { 
                                 $sp_home = sanitize_text_field($_POST['spt_home']);
								 $sp_404 = sanitize_text_field($_POST['spt_404']);
								 $sp_search = sanitize_text_field($_POST['spt_search']);
								 $sp_blog = sanitize_text_field($_POST['spt_blog']);
								 $sp_category = sanitize_text_field($_POST['spt_category']); 
								 $sp_tag = sanitize_text_field($_POST['spt_tag']);
								 $sp_blog_single = sanitize_text_field($_POST['spt_blog_single']);
								 $sp_ele_name = sanitize_text_field($_POST['spt_ele_name']);
								 $sp_ele_ID = sanitize_text_field($_POST['spt_ele_ID']);
								 $sp_ele_class = sanitize_text_field($_POST['spt_ele_class']);
								 update_option('spt_home', $sp_home);
								 update_option('spt_404',  $sp_404 );
								 update_option('spt_search',  $sp_search );
								 update_option('spt_blog',  $sp_blog );
								 update_option('spt_category',  $sp_category );
								 update_option('spt_tag',  $sp_tag );
								 update_option('spt_blog_single', $sp_blog_single);
								 update_option('spt_ele_name',  $sp_ele_name );
								 update_option('spt_ele_ID',  $sp_ele_ID );
								 update_option('spt_ele_class',  $sp_ele_class );
								 $args = array('public'=> true,'_builtin'=>false); 
								 $output = 'names'; 
								 $operator = 'and'; 
								 $post_types = get_post_types( $args, $output, $operator ); 
								 foreach ($post_types as $post_type) {
								   update_option('spta_'.$post_type.'', sanitize_text_field( $_POST['spta_'.$post_type.'']));
								   update_option('spts_'.$post_type.'', sanitize_text_field( $_POST['spts_'.$post_type.'']));
								 } 
                            ?>
                             <div id="message" class="updated notice is-dismissible no_mr">
							      <p><strong>Setting Saved...</strong></p>
							      <button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
							</div>
                          <?php  
                           }
				             include('name-titles.php');
                          ?>
				          <table class="wp-list-table widefat fixed striped spt_table">
							<thead>
								   <tr>
								   	   <td style="width: 30%">Page</td>
								   	   <td>Titles</td>
								   </tr>
							</thead>
							<tbody>
								  <tr>
								  	   <td>Home Page</td>
								  	   <td><input type="text" name="spt_home" value="<?php echo $spt_home ?>"></td>
								  </tr>
								  <tr>
								  	   <td>404 Page</td>
								  	   <td><input type="text" name="spt_404" value="<?php echo $spt_404 ?>"></td>
								  </tr>
								  <tr>
								  	   <td>Search Page</td>
								  	   <td><input type="text" name="spt_search" value="<?php echo $spt_search ?>"></td>
								  </tr>
								  <tr>
								  	   <td>Blog Page</td>
								  	   <td><input type="text" name="spt_blog" value="<?php echo $spt_blog ?>"></td>
								  </tr>
							</tbody>
					   	  </table>
				     </div>

                     <!-- tab two -->
				      <div class="tab-pane" id="2b">
				      	<table class="wp-list-table widefat fixed striped spt_table">
							<thead>
								   <tr>
								   	   <td style="width: 30%">Page</td>
								   	   <td>Titles</td>
								   </tr>
							</thead>
							<tbody>
						      <?php 
	      	   	       	         $args = array('public'=> true,'_builtin'=>false); 
	      	   	       	         $output = 'names'; 
	      	   	       	         $operator = 'and'; 
	      	   	       	         $post_types = get_post_types( $args, $output, $operator ); 
	      	   	       	         foreach ($post_types as $post_type) { ?> 
		      	   	       	         <tr> 
		      	   	       	           <td style="text-transform: capitalize;"><?php echo $post_type; ?></td> 
		      	   	       	           <td> 
		      	   	       	              <input 
		      	   	       	               type="text" 
		      	   	       	               value="<?php echo get_option('spta_'.$post_type.''); ;?>"
                                           name = "spta_<?php echo $post_type; ?>"  
		      	   	       	                />
		      	   	       	           </td> 
		      	   	       	         </tr> 
		      	   	       	    <?php } 
		      	   	       	  ?>
							</tbody>
					   	  </table>
				      </div>
				     <!-- tab two -->

				     <!-- tab two -->
				      <div class="tab-pane" id="3b">
				      	<table class="wp-list-table widefat fixed striped spt_table">
							<thead>
								   <tr>
								   	   <td style="width: 30%">Page</td>
								   	   <td>Titles</td>
								   </tr>
							</thead>
							<tbody>
							   <tr>
							   	  <td>Single Blog</td>
							   	  <td>
                                     <input type="text" value="<?php echo $spt_blog_single ?>" name="spt_blog_single">
							   	  </td>
							   </tr>
							   <?php 
	      	   	       	         $args = array('public'=> true,'_builtin'=>false); 
	      	   	       	         $output = 'names'; 
	      	   	       	         $operator = 'and'; 
	      	   	       	         $post_types = get_post_types( $args, $output, $operator ); 
	      	   	       	         foreach ($post_types as $post_type) { ?> 
		      	   	       	         <tr> 
		      	   	       	           <td style="text-transform: capitalize;">Single <?php echo $post_type; ?></td> 
		      	   	       	           <td> 
		      	   	       	              <input type="text" 
		      	   	       	               value="<?php echo get_option('spts_'.$post_type.''); ;?>"
                                           name = "spts_<?php echo $post_type; ?>"
		      	   	       	                />
		      	   	       	           </td> 
		      	   	       	         </tr> 
		      	   	       	    <?php } 
		      	   	       	  ?>
							</tbody>
					   	  </table>
				      </div>
				     <!-- tab two --> 

				     <!-- tab two -->
				      <div class="tab-pane" id="4b">
				      	<table class="wp-list-table widefat fixed striped spt_table">
							<thead>
								   <tr>
								   	   <td style="width: 30%">Page</td>
								   	   <td>Titles</td>
								   </tr>
							</thead>
							<tbody>
								  <tr>
								  	   <td>For Category Page</td>
								  	   <td><input type="text" name="spt_category" value="<?php echo $spt_category ?>"></td>
								  </tr>
								  <tr>
								  	   <td>For Tag Page</td>
								  	   <td><input type="text" name="spt_tag" value="<?php echo $spt_tag ?>"></td>
								  </tr>
							</tbody>
					   	  </table>
				      </div>
				     <!-- tab two -->
                     
                     <!-- tab two -->
				      <div class="tab-pane" id="5b">
				      	<table class="wp-list-table widefat fixed striped spt_table">
							<thead>
								   <tr>
								   	   <td style="width: 30%">Tag Name</td>
								   	   <td>Details</td>
								   </tr>
							</thead>
							<tbody>
								  <tr>
								  	   <td>Tag Name</td>
								  	   <td><input type="text" name="spt_ele_name" value="<?php echo $spt_ele_name ?>"></td>
								  </tr>
								  <tr>
								  	   <td>Tag ID</td>
								  	   <td><input type="text" name="spt_ele_ID" value="<?php echo $spt_ele_ID ?>"></td>
								  </tr>
								  <tr>
								  	   <td>Tag Class</td>
								  	   <td><input type="text" name="spt_ele_class" value="<?php echo $spt_ele_class ?>"></td>
								  </tr>
							</tbody>
					   	  </table>
				      </div>
				     <!-- tab two -->

				     <!-- tab two -->
				      <div class="tab-pane" id="6b">
				      	<table class="wp-list-table widefat fixed striped spt_table">
							<thead>
								   <tr>
								   	   <td>Plugin Documentation</td>
								   </tr>
							</thead>
							<tbody>
								  <tr>
								  	   <td>
								  	   	  <h4>For Page Titles</h4>
								  	   	  <p>This section for home page, 404 page, Search Page and Blog Page. you can change the title.
								  	   	  </p>
								  	   </td>
								  </tr>
								  <tr>
								  	   <td>
								  	   	  <h4>For Archieve Page</h4>
								  	   	  <p>This section for all archieve. for default the custom name of archieve.</p>
								  	   </td>
								  </tr>
								  <tr>
								  	   <td>
								  	   	  <h4>For Single Page</h4>
								  	   	  <p>This section for all single post type's, for the default page use <b>(%postname%).</b></p>
								  	   </td>
								  </tr>
								  <tr>
								  	   <td>
								  	   	  <h4>For Other Page</h4>
								  	   	  <p>This section for category and tag page. you have change the category and tag page name.</p>
								  	   </td>
								  </tr>
								  <tr>
								  	   <td>
								  	   	  <h4>For Class and ID</h4>
								  	   	  <p>This section is for html tag name, the default tag name is
								  	   	   <b>(h1)</b>. <br>for id section default ID <b>(%postID%)</b> the id result is <b>'(spt-page-id-*)'</b>, <br>for class default is <b>(%postclass%).</b> <br> the result is <b>(spt-id-*).</b>
                                           the final result is <br> <b>&lt;h1 class="spt-id-*" id="spt-page-id-*">Title &gt;/h1> </b>
								  	   	   </p>
								  	   </td>
								  </tr>
							</tbody>
					   	  </table>
				      </div>
				     <!-- tab two -->
                 </div> 
			<!-- bottom tabs -->	
		   </div>
		   <!-- right details -->
		   <div id="postbox-container-1" class="postbox-container">
		       <div id="submitdiv" class="postbox ">
                   <h2 class="hndle ui-sortable-handle">
                       Submit  
                   </h2>
                   <div id="major-publishing-actions">
                      <input type="hidden" name="post_title" value="changes">
                   	  <?php submit_button( 'Submit' ); ?>
                   	  <p class="plugin_choose">Thanks for chossing this plugin.</p>
                   </div>

		       </div>
		   </div>
		   <!-- right details -->	 
	   	 </div>
	  </div> 	 
   </form>
</div> 
<!--
 page setting end here..
 -->  
<?php }
?>