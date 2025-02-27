<?php

	function addpostsection(){ 
		$is_already =0;
		$error_msg='';

		/**** Condition to check for selected Sections ****/
		if(isset($_REQUEST['delete']))
		{ 
			cpo_delete_single_post();
		}

		/**** Condition to delete All Sections ****/
		if(isset($_REQUEST['deleteall']))
		{
			cpo_delete_selected_posts();
		}

		/**** Condition to Update List ****/
		if(isset($_REQUEST['postid']))
		{
			$postsid = sanitize_text_field($_REQUEST['postid']);
			update_option('porder_name_'.$_REQUEST['listname'], $postsid ); 
		}

		/**** Condition to check duplicate section names ****/
		if(isset($_REQUEST['pname']))
		{
			$list_name = sanitize_text_field($_REQUEST['pname']);
			$list_name = ucwords($list_name);
			$sections_names = explode(",", get_option( 'porder_name'));
			$is_already = in_array($list_name, $sections_names);
			$error_msg='Section Name Already Exits';
		}

		/**** Condition to display page1 and page2  ****/
		if (!isset($_REQUEST['listing']) || ($is_already))
		{	
			
			if($is_already){
				echo '
					<div id="setting-error-invalid_admin_email" class="error settings-error notice is-dismissible error_msg"> 
						<p><strong>'.$error_msg.'</strong></p>
						<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
					</div>';
				echo '
					<script type="text/javascript">
					  jQuery(document).ready(function() {
					  	setTimeout(function(){
					        history.go(-1);
					  		},3000);
					  });
					</script>
				';
			}
			
			cpo_add_sectionlisting_form();
			echo cpo_lists_table();
		}
		else
		{
			if( isset($_REQUEST['pname']) )
			{
				cpo_data_insert();
			}
			echo cpo_posts_table();
		}

		/**** Condition to delete post  ****/
		if(isset($_REQUEST['postid']))
		{
			cpo_postdelete_function();
		}
	}

	/**** Function to display new section Form (Page 1) ****/
	function cpo_add_sectionlisting_form(){ 
?>  
		<form action="?page=addpostsection&listing=post" method="post" enctype="multipart/form-data" class="addsecform" >
			<h2>Add Section</h2>
			<table class="addsecformtable">
				<tr>    
					<td class="labelname">Section Name: <span class="alert">*</span></td>
					<td><input type="text" name='pname' id='pname' value='' /></td>
					<td><input type="submit" name='addpostsection' value="Add section" id='addpostsection' class="button-primary" /></td>
				</tr>
			</table><br />
		</form>	
<?php
	}

	/**** Function to display Section Listing (Page 1) ****/
	function cpo_lists_table(){ 
		$section_listing = '
			<form name="delete_posts" id="delete_posts" action="?page=addpostsection&deleteall=deleteall" method="post">
				<h2>Section Listing </h2>
				<table width="100%" class="widefat">
					<tr>
						<th><input type="checkbox" name="checkAll" id="checkAll"/>Select to delete</th>
						<th>Section Name</th>
						<th>Action</th>
					</tr>';
		$options=get_option( 'porder_name');
		if(!$options){
			$section_listing.= '
					<tr>
						<td>There is No list Available</td>
					</tr>';
		}
		$sections= explode(",", $options);

		for($i=0; $i<count($sections); $i++){
			if($sections[0]!=''){
				$section_listing.="
					<tr>
						<td valign='top'>
							<input class='checkItem' type='checkbox' name='delete_section[]' value='".$sections[$i]."' />
						</td>
						<td valign='top' id='".$sections[$i]."'>" .$sections[$i]. "</td>
						<td valign='top'>
							<a href='?page=addpostsection&listing=post&listname=".$sections[$i]."'>Edit</a> / 
							<a onclick='return confirmdelete()' href='?page=addpostsection&delete=".$sections[$i]."'>Delete</a>
						</td>
					</tr>";
			}
		}
		$section_listing.='
				</table>
				<br>
				<input onclick="return confirmdelete();" type="submit" class="button-primary" value="Delete" name="deleteall" id="deleteall"/>
			</form>';	
		return $section_listing;
	}

	/**** Function to Delete selected Sections (Page 1) *****/
	function cpo_delete_single_post(){
		$listname = $_REQUEST['delete'];
		delete_option( 'porder_name_'.$listname); 
		$get_section_names = get_option('porder_name');
		$get_section_names = str_replace($listname.',','',$get_section_names.',');
		update_option('porder_name',  substr($get_section_names,0, -1));
	}

	/**** Function to Delete All Sections (Page 1) *****/
	function cpo_delete_selected_posts(){ 
		if(!empty($_POST['delete_section'])) {
			foreach($_POST['delete_section'] as $deletecheck) {
				delete_option( 'porder_name_'.$deletecheck); 
				$get_section_names = get_option('porder_name');
				$get_section_names = str_replace($deletecheck.',','',$get_section_names.',');
				update_option('porder_name',  substr($get_section_names,0, -1));
			}
		}
	}

	/**** Function to insert new section (Page 1) ****/
	function cpo_data_insert(){
		$list_name = sanitize_text_field($_REQUEST['pname']);
		$list_name = ucwords($list_name);
		global $wpdb;
		$args = array(
					'posts_per_page'   => -1,
					'offset'           => 0,
					'category'         => '',
					'category_name'    => '',
					'orderby'          => 'date',
					'order'            => 'DESC',
					'include'          => '',
					'exclude'          => '',
					'meta_key'         => '',
					'meta_value'       => '',
					'post_type'        => 'post',
					'post_mime_type'   => '',
					'post_parent'      => '',
					'author'	   => '',
					'post_status'      => 'publish',
					'suppress_filters' => true 
				);
		$allpost_datas=get_posts($args); 
		$all_post_ids = "";
		foreach ($allpost_datas as $post) {
			$all_post_ids = $all_post_ids.','.$post->ID;
		}
		$all_post_ids = substr($all_post_ids, 1);
		add_option("porder_name_".$list_name, $all_post_ids); 
		if(get_option("porder_name")==""){
			update_option("porder_name",$list_name); 
		}
		else{
			update_option("porder_name", get_option("porder_name").','.$list_name);
		}
	}

	add_action( 'delete_post', 'cpo_postdelete_function' );
	function cpo_postdelete_function() { 
		global $wpdb;
		$count_posts = wp_count_posts(); 
		$published_posts = $count_posts->publish;
	    $allgetposts = get_posts(array('posts_per_page'=>$published_posts)); 
		$allprostsids = array();   
	    foreach($allgetposts as $allgetpost)
	    {
			$allprostsids[] = $allgetpost->ID;
	    }
		$cid= sanitize_text_field($_GET['listname']);
		$options=get_option( 'porder_name');
		$ary = explode(",",$options);
		$result = count($ary);
		for($i=0;$i<$result;$i++)
		{
			$current_list_posts=get_option('porder_name_'.$ary[$i]);
			$metadetails= explode(",", $current_list_posts);
			if(array_diff($metadetails,$allprostsids)){
				$pid= implode(",",$allprostsids);
				$updatestring = get_option( 'porder_name_'.$ary[$i]);
				update_option( 'porder_name_'.$ary[$i], $pid);
			}
		}
	}  

	/**** Function to display all posts (Page 2) ****/
	function cpo_posts_table(){ 
		if( isset($_REQUEST['pname']) ){
			$current_list =sanitize_text_field($_REQUEST["pname"]);
		}
		else{
			$current_list =sanitize_text_field($_REQUEST["listname"]);
		}
		
		$ulist= '<h2>Post Listing</h2>';
		$ulist.='<h3>Section Name: '.ucwords($current_list).'</h3>';
			
		/* Form 2 (Drag And Drop Form) */
		$ulist.='<form name="frmCustomPost" method="post" action="?page=addpostsection&listing=post&listname='.$current_list.'">
					<ul class="postsheading">
						<li class="postlineitem">Title</li>
					</ul>
					<ul id="PostOrderList">';
		
		global $wpdb;
		$database_table = $wpdb->prefix . 'options';
		$count_posts = wp_count_posts(); 
		$published_posts = $count_posts->publish;
	    $allgetposts = get_posts(array('posts_per_page'=>$published_posts)); 
		$allprostsids = array();   
	    foreach($allgetposts as $allgetpost)
	    {
			$allprostsids[] = $allgetpost->ID;
	    }
		$getdata = $wpdb->get_results("SELECT option_value FROM $database_table WHERE option_name= 'porder_name_".$current_list."'") or die(mysql_error());
	    $newpost='';
	    foreach($getdata as $gpost){
			$newpost = $gpost->option_value;
	    }             
	    $newallprosts = array();   
	    $newallprosts = explode(',',$newpost);
		$newallposts = array_unique(array_merge($newallprosts,$allprostsids));
	    $all_post_datas = array_diff($allprostsids,$newallprosts);
		$current_list_posts=get_option('porder_name_'.$current_list);
		$metadetails= explode(",", $current_list_posts);	
		$new = array_unique(array_merge($metadetails,$all_post_datas));
		$all = array_diff($new,$allprostsids);

		for($i=0;$i<count($new);$i++){
			if($new[0]!='')
			{								
				$ulist.= "<li id='".$new[$i]."' class='postlineitem'>".get_the_title($new[$i])."</li>";
			}
			else 
			{
				$updatestring = get_option( 'porder_name_'.$current_list);
				$string = str_replace($new[$i].',', "", $updatestring.',');
				$string = substr($string,0, -1);
				update_option( 'porder_name_'.$current_list, $string); 
			}
		}
		$ulist.='
					</ul>
					<input type="hidden" name="postid" value=""/>
					<input type="submit" name="send" value="Update" id="send" class="button-primary" />
					<a href="?page=addpostsection" class="button-primary" >Back</a>
				</form>
				<p><b>Note: </b> Simply drag and drop the posts into the desired position and update.</p>';
	    $ulist.="<p>Place shortcode <span> <b>[posts_order posts=2 section=porder_name]</b> </span> in wordpress page, post or text widget.</p>";
	    $ulist.="<p>Place the code <span> <b>&lt;?php do_shortcode('[posts_order posts=2 section=\"porder_name\"]'); ?&gt;</b> </span> in template files.</p>";
		return $ulist; 
	}

?>