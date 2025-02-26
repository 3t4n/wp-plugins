<?php
	add_action( 'wp_ajax_Get_Vimeo_Video_Image_Src', 'Get_Vimeo_Video_Image_Src_Callback' );
	add_action( 'wp_ajax_nopriv_Get_Vimeo_Video_Image_Src', 'Get_Vimeo_Video_Image_Src_Callback' );

	function Get_Vimeo_Video_Image_Src_Callback()
	{
		$GET_Video_Video_Src = sanitize_text_field($_POST['foobar']);

		$Juna_IT_Video_Gallery_Image_Src=explode('video/',$GET_Video_Video_Src);
		$Juna_IT_Video_Gallery_Image_Src_Real=unserialize(file_get_contents("http://vimeo.com/api/v2/video/$Juna_IT_Video_Gallery_Image_Src[1].php"));
		$Juna_IT_Video_Gallery_Image_Src_Real=$Juna_IT_Video_Gallery_Image_Src_Real[0]['thumbnail_large'];

		echo $Juna_IT_Video_Gallery_Image_Src_Real;

		die();
	}

	add_action( 'wp_ajax_Delete_Juna_IT_Video_Gallery_Click', 'Delete_Juna_IT_Video_Gallery_Click_Callback' );
	add_action( 'wp_ajax_nopriv_Delete_Juna_IT_Video_Gallery_Click', 'Delete_Juna_IT_Video_Gallery_Click_Callback' );

	function Delete_Juna_IT_Video_Gallery_Click_Callback()
	{
		$Delete_gallery_id = sanitize_text_field($_POST['foobar']);
		
		global $wpdb;
		$table_name  = $wpdb->prefix . "juna_it_gallery_manager";
		$table_name1 = $wpdb->prefix . "juna_it_video_manager";
		$table_name2 = $wpdb->prefix . "juna_it_video_link";

		$wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id= %d", $Delete_gallery_id));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name1 WHERE gallery_number= %d", $Delete_gallery_id));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name2 WHERE gallery_number= %d", $Delete_gallery_id));

		die();
	}

	add_action( 'wp_ajax_Edit_Juna_IT_Video_Gallery_Click', 'Edit_Juna_IT_Video_Gallery_Click_Callback' );
	add_action( 'wp_ajax_nopriv_Edit_Juna_IT_Video_Gallery_Click', 'Edit_Juna_IT_Video_Gallery_Click_Callback' );

	function Edit_Juna_IT_Video_Gallery_Click_Callback()
	{
		$Edit_gallery_id = sanitize_text_field($_POST['foobar']);
		
		global $wpdb;
		$table_name  = $wpdb->prefix . "juna_it_gallery_manager";
		$table_name1 = $wpdb->prefix . "juna_it_video_manager";
		$table_name2 = $wpdb->prefix . "juna_it_video_link";

		$Juna_IT_Gallery_title=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id= %d", $Edit_gallery_id));

		$Juna_IT_Video_Gallery_Video_params=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE gallery_number= %d", $Juna_IT_Gallery_title[0]->id));
		$Juna_IT_Video_Gallery_Link_params=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE gallery_number= %d", $Juna_IT_Gallery_title[0]->id));

		echo $Juna_IT_Gallery_title[0]->gallery_title . '^%^' . $Juna_IT_Gallery_title[0]->gallery_type . '^%^' . $Juna_IT_Gallery_title[0]->Juna_IT_Video_Gallery_Show_Video_Type . '^%^' . $Juna_IT_Gallery_title[0]->Juna_IT_Video_Gallery_Videos_Quantity . '^%^' . count($Juna_IT_Video_Gallery_Video_params) . '^%^' . $Juna_IT_Video_params;
		for($i=0;$i<count($Juna_IT_Video_Gallery_Video_params);$i++)
		{
			$u = explode(')*^*(', $Juna_IT_Video_Gallery_Video_params[$i]->video_title);
			$y = implode('"', $u);
			$t = explode(")*&*(", $y);
			$Video_Title = implode("'", $t);

			$w = explode(')*^*(', $Juna_IT_Video_Gallery_Video_params[$i]->video_description);
			$s = implode('"', $w);
			$x = explode(")*&*(", $s);
			$Description_textarea = implode("'", $x);

			$Juna_IT_Video_params = $Video_Title . '$#$' . $Description_textarea . '$#$' . $Juna_IT_Video_Gallery_Video_params[$i]->video_url . '$#$' . $Juna_IT_Video_Gallery_Video_params[$i]->image_url . '$#$' . $Juna_IT_Video_Gallery_Link_params[$i]->video_link . '$#$' . $Juna_IT_Video_Gallery_Link_params[$i]->video_ONT . ')*(';
			echo $Juna_IT_Video_params;
		}
		die();
	}

	add_action( 'wp_ajax_Search_Juna_IT_Video_Gallery_Click', 'Search_Juna_IT_Video_Gallery_Click_Callback' );
	add_action( 'wp_ajax_nopriv_Search_Juna_IT_Video_Gallery_Click', 'Search_Juna_IT_Video_Gallery_Click_Callback' );

	function Search_Juna_IT_Video_Gallery_Click_Callback()
	{
		$Search_Juna_IT_Video_Gallery = strtolower(sanitize_text_field($_POST['foobar']));
		global $wpdb;		

		$table_name  =  $wpdb->prefix . "juna_it_gallery_manager";
		$table_name1 =  $wpdb->prefix . "juna_it_video_manager";

		$Searched_Juna_IT_Gallery=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id > %d",0));

		for($i=0;$i<count($Searched_Juna_IT_Gallery);$i++)
		{
			for($j=1;$j<strlen($Searched_Juna_IT_Gallery[$i]->gallery_title);$j++)
			{
				if($Search_Juna_IT_Video_Gallery==substr(strtolower($Searched_Juna_IT_Gallery[$i]->gallery_title),0,$j))
				{
					$Quantity_Gallery_Videos=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE gallery_number=%d",$Searched_Juna_IT_Gallery[$i]->id));
					echo $Searched_Juna_IT_Gallery[$i]->id . ')&*&(' . $Searched_Juna_IT_Gallery[$i]->gallery_title . ')&*&('. count($Quantity_Gallery_Videos) . ')*^*(';
				}
				else
				{
					echo "";
				}
			}
		}
		die();
	}
	add_action( 'wp_ajax_Juna_IT_Video_Gallery_Thumbnails_Big_Click', 'Juna_IT_Video_Gallery_Thumbnails_Big_Click_Callback' );
	add_action( 'wp_ajax_nopriv_Juna_IT_Video_Gallery_Thumbnails_Big_Click', 'Juna_IT_Video_Gallery_Thumbnails_Big_Click_Callback' );

	function Juna_IT_Video_Gallery_Thumbnails_Big_Click_Callback()
	{
		$Juna_IT_Video_Gallery_Video_Params=sanitize_text_field($_POST['foobar']);
		$Juna_IT_Video_Gallery_Video_Param =explode(")*&^&*(", $Juna_IT_Video_Gallery_Video_Params);
		global $wpdb;
		$table_name1 =  $wpdb->prefix . "juna_it_video_manager";

		$Juna_IT_Video_Gallery_URLs=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE gallery_number=%d",$Juna_IT_Video_Gallery_Video_Param[1]));

		for($i=0;$i<count($Juna_IT_Video_Gallery_URLs);$i++)
		{
			if($Juna_IT_Video_Gallery_URLs[$i]->video_url==$Juna_IT_Video_Gallery_Video_Param[2])
			{
				if($Juna_IT_Video_Gallery_Video_Param[0]=='left')
				{
					if($i!=0)
					{
						echo $i . ')*&^&*(' . $Juna_IT_Video_Gallery_URLs[$i-1]->video_url;
					}
					else
					{
						echo count($Juna_IT_Video_Gallery_URLs) . ')*&^&*(' . $Juna_IT_Video_Gallery_URLs[count($Juna_IT_Video_Gallery_URLs)-1]->video_url;
					}					
				}
				else if($Juna_IT_Video_Gallery_Video_Param[0]=='right')
				{
					if($i+1!=count($Juna_IT_Video_Gallery_URLs))
					{
						echo $i+2 . ')*&^&*(' . $Juna_IT_Video_Gallery_URLs[$i+1]->video_url;
					}
					else
					{
						echo '1)*&^&*(' . $Juna_IT_Video_Gallery_URLs[0]->video_url;
					}
				}
			}
		}
		die();
	}

	add_action( 'wp_ajax_Juna_IT_Video_Gallery_Content_Big_Click', 'Juna_IT_Video_Gallery_Content_Big_Click_Callback' );
	add_action( 'wp_ajax_nopriv_Juna_IT_Video_Gallery_Content_Big_Click', 'Juna_IT_Video_Gallery_Content_Big_Click_Callback' );

	function Juna_IT_Video_Gallery_Content_Big_Click_Callback()
	{
		$Juna_IT_Video_Gallery_Video_Params=sanitize_text_field($_POST['foobar']);
		$Juna_IT_Video_Gallery_Video_Param =explode(")*&^&*(", $Juna_IT_Video_Gallery_Video_Params);
		global $wpdb;
		$table_name1 = $wpdb->prefix . "juna_it_video_manager";
		$table_name2 = $wpdb->prefix . "juna_it_video_link";

		$Juna_IT_Video_Gallery_URLs=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE gallery_number=%d",$Juna_IT_Video_Gallery_Video_Param[1]));
		$Juna_IT_Video_Gallery_Links=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE gallery_number=%d",$Juna_IT_Video_Gallery_Video_Param[1]));
		
		for($i=0;$i<count($Juna_IT_Video_Gallery_URLs);$i++)
		{
			$u = explode(')*^*(', $Juna_IT_Video_Gallery_URLs[$i]->video_title);
			$y = implode('"', $u);
			$t = explode(")*&*(", $y);
			$Juna_IT_Video_Gallery_URLs[$i]->video_title = implode("'", $t);

			$w = explode(')*^*(', $Juna_IT_Video_Gallery_URLs[$i]->video_description);
			$s = implode('"', $w);
			$x = explode(")*&*(", $s);
			$Juna_IT_Video_Gallery_URLs[$i]->video_description = implode("'", $x);
		}

		for($i=0;$i<count($Juna_IT_Video_Gallery_URLs);$i++)
		{
			if($Juna_IT_Video_Gallery_URLs[$i]->video_url==$Juna_IT_Video_Gallery_Video_Param[2])
			{
				if($Juna_IT_Video_Gallery_Video_Param[0]=='left')
				{
					if($i!=0)
					{
						echo $i . ')*&^&*(' . $Juna_IT_Video_Gallery_URLs[$i-1]->video_url . ')*&^&*(' . $Juna_IT_Video_Gallery_URLs[$i-1]->video_title . ')*&^&*(' . $Juna_IT_Video_Gallery_URLs[$i-1]->video_description . ')*&^&*(' . $Juna_IT_Video_Gallery_Links[$i-1]->video_link . ')*&^&*(' . $Juna_IT_Video_Gallery_Links[$i-1]->video_ONT;
					}
					else
					{
						echo count($Juna_IT_Video_Gallery_URLs) . ')*&^&*(' . $Juna_IT_Video_Gallery_URLs[count($Juna_IT_Video_Gallery_URLs)-1]->video_url . ')*&^&*(' . $Juna_IT_Video_Gallery_URLs[count($Juna_IT_Video_Gallery_URLs)-1]->video_title . ')*&^&*(' . $Juna_IT_Video_Gallery_URLs[count($Juna_IT_Video_Gallery_URLs)-1]->video_description . ')*&^&*(' . $Juna_IT_Video_Gallery_Links[count($Juna_IT_Video_Gallery_URLs)-1]->video_link . ')*&^&*(' . $Juna_IT_Video_Gallery_Links[count($Juna_IT_Video_Gallery_URLs)-1]->video_ONT;
					}					
				}
				else if($Juna_IT_Video_Gallery_Video_Param[0]=='right')
				{
					if($i+1!=count($Juna_IT_Video_Gallery_URLs))
					{
						echo $i+2 . ')*&^&*(' . $Juna_IT_Video_Gallery_URLs[$i+1]->video_url . ')*&^&*(' . $Juna_IT_Video_Gallery_URLs[$i+1]->video_title . ')*&^&*(' . $Juna_IT_Video_Gallery_URLs[$i+1]->video_description . ')*&^&*(' . $Juna_IT_Video_Gallery_Links[$i+1]->video_link . ')*&^&*(' . $Juna_IT_Video_Gallery_Links[$i+1]->video_ONT;
					}
					else
					{
						echo '1)*&^&*(' . $Juna_IT_Video_Gallery_URLs[0]->video_url . ')*&^&*(' . $Juna_IT_Video_Gallery_URLs[0]->video_title . ')*&^&*(' . $Juna_IT_Video_Gallery_URLs[0]->video_description . ')*&^&*(' . $Juna_IT_Video_Gallery_Links[0]->video_link . ')*&^&*(' . $Juna_IT_Video_Gallery_Links[0]->video_ONT;
					}
				}
			}
		}
		die();
	}

	add_action( 'wp_ajax_Juna_IT_Video_Gallery_Content_Get_Description', 'Juna_IT_Video_Gallery_Content_Get_Description_Callback' );
	add_action( 'wp_ajax_nopriv_Juna_IT_Video_Gallery_Content_Get_Description', 'Juna_IT_Video_Gallery_Content_Get_Description_Callback' );

	function Juna_IT_Video_Gallery_Content_Get_Description_Callback()
	{
		$Juna_IT_Video_Gallery_Video_URL=sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name1 = $wpdb->prefix . "juna_it_video_manager";
		$table_name2 = $wpdb->prefix . "juna_it_video_link";

		$Juna_IT_Video_Gallery_Description=$wpdb->get_var($wpdb->prepare("SELECT video_description FROM $table_name1 WHERE video_url=%s",$Juna_IT_Video_Gallery_Video_URL));
		
		$u = explode(')*^*(', $Juna_IT_Video_Gallery_Description);
		$y = implode('"', $u);
		$t = explode(")*&*(", $y);
		$Juna_IT_Video_Gallery_Description = implode("'", $t);

		echo $Juna_IT_Video_Gallery_Description;
		die();
	}	
?>