<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	global $wpdb;

	$table_name   = $wpdb->prefix . "juna_it_gallery_manager";
	$table_name1  = $wpdb->prefix . "juna_it_video_manager";
	$table_name2  = $wpdb->prefix . "juna_it_video_link";
	$table_name3  = $wpdb->prefix . "juna_it_font_family";
	$table_name4  = $wpdb->prefix . "juna_it_video_effdb";
	$table_name5  = $wpdb->prefix . "juna_it_v_effect1";
	$table_name6  = $wpdb->prefix . "juna_it_v_effect2";
	$table_name7  = $wpdb->prefix . "juna_it_v_effect3";
	$table_name8  = $wpdb->prefix . "juna_it_v_effect4";
	$table_name9  = $wpdb->prefix . "juna_it_v_effect5";
	$table_name10 = $wpdb->prefix . "juna_it_v_effect6";

	if( $wpdb->get_var('SHOW TABLES LIKE' . $table_name) != $table_name )
	{
		$sql = 'CREATE TABLE IF NOT EXISTS ' .$table_name . '(
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			gallery_title VARCHAR(255) NOT NULL,
			gallery_type VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Show_Video_Type VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Videos_Quantity INTEGER(10) NOT NULL,
			PRIMARY KEY (id))';

		$sql1 = 'CREATE TABLE IF NOT EXISTS ' .$table_name1 . '(
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			video_title VARCHAR(255) NOT NULL, 
			video_description LONGTEXT NOT NULL,
			video_url VARCHAR(255) NOT NULL,
			gallery_number INTEGER(10) NOT NULL,
			image_url VARCHAR(255) NOT NULL,
			PRIMARY KEY (id))';

		$sql2 = 'CREATE TABLE IF NOT EXISTS ' .$table_name2 . '(
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			video_link VARCHAR(255) NOT NULL, 
			video_ONT VARCHAR(255) NOT NULL,
			gallery_number INTEGER(10) NOT NULL,
			PRIMARY KEY (id))';

		$sql3 = 'CREATE TABLE IF NOT EXISTS ' .$table_name3 . '(
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			Font_family VARCHAR(255) NOT NULL,
			PRIMARY KEY (id))';

		$sql4 = 'CREATE TABLE IF NOT EXISTS ' .$table_name4 . '(
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			effect_name VARCHAR(255) NOT NULL, 
			effect_type VARCHAR(255) NOT NULL,
			PRIMARY KEY (id))';

		$sql5 = 'CREATE TABLE IF NOT EXISTS ' .$table_name5 . '(
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			Juna_IT_Video_Gallery_Video_Title_Background_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Video_Title_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Box_Shadow_Video_Title_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Font_Size_Video_Title VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Font_Family_Video_Title VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Video_Description_Background_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Video_Description_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_First_Font_Size_Video_Description VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Font_Size_Video_Description VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Font_Family_Video_Description VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Video_Width VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Video_Height VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Border_Radius VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Border_Style VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Video_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Hover_Background_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Background_Transparency VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Choose_Buttons_Type VARCHAR(255) NOT NULL,
			JIT_VG_Page_PFS VARCHAR(255) NOT NULL,
			JIT_VG_Page_PC VARCHAR(255) NOT NULL,
			JIT_VG_Page_IFS VARCHAR(255) NOT NULL,
			JIT_VG_Page_IC VARCHAR(255) NOT NULL,
			JIT_VG_Page_PPos VARCHAR(255) NOT NULL,
			JIT_VG_IBgC VARCHAR(255) NOT NULL,
			JIT_VG_IC VARCHAR(255) NOT NULL,
			JIT_VG_IFS VARCHAR(255) NOT NULL,
			JIT_VG_PBgC VARCHAR(255) NOT NULL,
			JIT_VG_PBW VARCHAR(255) NOT NULL,
			JIT_VG_PBS VARCHAR(255) NOT NULL,
			JIT_VG_PBC VARCHAR(255) NOT NULL,
			JIT_VG_PTC VARCHAR(255) NOT NULL,
			JIT_VG_PTFF VARCHAR(255) NOT NULL,
			JIT_VG_PTFS VARCHAR(255) NOT NULL,
			JIT_VG_CP_LFS VARCHAR(255) NOT NULL,
			JIT_VG_CP_LFF VARCHAR(255) NOT NULL,
			JIT_VG_CP_LC VARCHAR(255) NOT NULL,
			JIT_VG_CP_LT VARCHAR(255) NOT NULL,
			JIT_VG_CP_LBgC VARCHAR(255) NOT NULL,
			JIT_VG_CP_LBC VARCHAR(255) NOT NULL,
			JIT_VG_CP_LBR VARCHAR(255) NOT NULL,
			JIT_VG_CP_LPos VARCHAR(255) NOT NULL,
			JIT_VGallery_TN_ID VARCHAR(255) NOT NULL,
			PRIMARY KEY (id))';

		$sql6 = 'CREATE TABLE IF NOT EXISTS ' .$table_name6 . '(
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			Juna_IT_Video_Gallery_Video_Title_Background_Color1 VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Video_Title_Color1 VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Font_Size_Video_Title1 VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Font_Family_Video_Title1 VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Title_Align VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Video_Description_Background_Color1 VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Video_Description_Color1 VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_First_Font_Size_Video_Description1 VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Font_Size_Video_Description1 VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Font_Family_Video_Description1 VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Description_Align VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Video_Container VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Video_Width1 VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Video_Height1 VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Video_Position VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Video_Location VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Border_Width1 VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Border_Radius1 VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Border_Style1 VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Video_Border_Color1 VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Line_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Line_Width VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Line_Style VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Pageination_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Pageination_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Pageination_Icons_Size VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Pageination_Icons_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Pageination_Position VARCHAR(255) NOT NULL,
			JIT_VG_BS_LFS VARCHAR(255) NOT NULL,
			JIT_VG_BS_LFF VARCHAR(255) NOT NULL,
			JIT_VG_BS_LC VARCHAR(255) NOT NULL,
			JIT_VG_BS_LT VARCHAR(255) NOT NULL,
			JIT_VG_BS_LBgC VARCHAR(255) NOT NULL,
			JIT_VG_BS_LBC VARCHAR(255) NOT NULL,
			JIT_VG_BS_LBR VARCHAR(255) NOT NULL,
			JIT_VG_BS_LPos VARCHAR(255) NOT NULL,
			JIT_VGallery_TN_ID VARCHAR(255) NOT NULL,
			PRIMARY KEY (id))';
		
		$sql7 = 'CREATE TABLE IF NOT EXISTS ' .$table_name7 . '(
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			Juna_IT_Video_Gallery_Thumbnails_Video_Title_Bg_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Thumbnails_Video_Title_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Thumbnails_Video_Title_Transparency_Hover VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Thumbnails_Video_Title_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Thumbnails_Video_Title_Font_Family VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Thumbnails_Video_Title_Line_Width VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Thumbnails_Video_Title_Line_Style VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Thumbnails_Video_Title_Line_Text VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Thumbnails_Pageination_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Thumbnails_Pageination_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Thumbnails_Pageination_Icons_Size VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Thumbnails_Pageination_Icons_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Thumbnails_Pageination_Position VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Thumbnails_Video_Image_Width VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Thumbnails_Video_Image_Height VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Thumbnails_Video_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Thumbnails_Video_Border_Radius VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Thumbnails_Video_Border_Style VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Thumbnails_Video_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Thumbnails_Video_Icons VARCHAR(255) NOT NULL,
			JIT_VGallery_TN_ID VARCHAR(255) NOT NULL,
			PRIMARY KEY (id))';

		$sql8 = 'CREATE TABLE IF NOT EXISTS ' .$table_name8 . '(
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			Juna_IT_Video_Gallery_Slider_Title_Background_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Slider_Title_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Slider_Title_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Slider_Title_Font_Family VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Slider_Title_Position VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Slider_Video_Width VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Slider_Video_Height VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Slider_Background_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Slider_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Slider_Border_Radius VARCHAR(255) NOT NULL,					
			Juna_IT_Video_Gallery_Slider_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Slider_Position VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Slider_Pause_Time VARCHAR(255) NOT NULL,	
			Juna_IT_Video_Gallery_Slider_Border_Style VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Slider_Change_Speed VARCHAR(255) NOT NULL,		
			Juna_IT_Video_Gallery_Slider_Icons_Type VARCHAR(255) NOT NULL,
			JIT_VGallery_TN_ID VARCHAR(255) NOT NULL,
			PRIMARY KEY (id))';
		
		$sql9 = 'CREATE TABLE IF NOT EXISTS ' .$table_name9 . '(
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			Juna_IT_Video_Gallery_Carousel_Width VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Carousel_Height VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Carousel_Autoplay_Steps VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Carousel_Slide_Width VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Carousel_Slide_Spacing VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Carousel_Slide_Cols VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Carousel_Arrows_Steps VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Carousel_Position VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Carousel_Pause_Time VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Carousel_Change_Speed VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Carousel_Background_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Carousel_Video_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Carousel_Video_Border_Radius VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Carousel_Video_Border_Style VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Carousel_Video_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Carousel_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Carousel_Border_Radius VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Carousel_Border_Style VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Carousel_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_Video_Gallery_Carousel_Icons_Type VARCHAR(255) NOT NULL,
			JIT_VGallery_TN_ID VARCHAR(255) NOT NULL,
			PRIMARY KEY (id))';
			
		$sql10 = 'CREATE TABLE IF NOT EXISTS ' .$table_name10 . '(
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			Juna_IT_VG_Polaroids_Title_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Title_Font_Family VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Title_Color VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Desc_Show VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Desc_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Desc_First_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Desc_Font_Family VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Desc_Color VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Desc_Bg_Color VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Image_Width VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Image_Background VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Big_Image_Border_Radius VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Image_Border_Radius VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Image_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Image_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Image_Box_Shadow VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Image_Box_Shadow_Color VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Slider_Background VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Slider_Height VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Slider_Box_Shadow VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Slider_Border_Radius VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Video_Bg_Color VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Popup_Effect_Speed VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Icon_Color VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Icon_Size VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Icon_Type VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Video_Bg_Color_Op VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Radius_Bg_Color VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Radius_Border_radius VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Radius_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Radius_Color VARCHAR(255) NOT NULL,
			Juna_IT_VG_Polaroids_Radius_Bg_Color2 VARCHAR(255) NOT NULL,
			JIT_VG_Pol_LFS VARCHAR(255) NOT NULL,
			JIT_VG_Pol_LFF VARCHAR(255) NOT NULL,
			JIT_VG_Pol_LC VARCHAR(255) NOT NULL,
			JIT_VG_Pol_LT VARCHAR(255) NOT NULL,
			JIT_VG_Pol_LBgC VARCHAR(255) NOT NULL,
			JIT_VG_Pol_LBC VARCHAR(255) NOT NULL,
			JIT_VG_Pol_LBR VARCHAR(255) NOT NULL,
			JIT_VG_Pol_LPos VARCHAR(255) NOT NULL,
			JIT_VGallery_TN_ID VARCHAR(255) NOT NULL,
			PRIMARY KEY (id))';

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
		dbDelta($sql1);
		dbDelta($sql2);
		dbDelta($sql3);
		dbDelta($sql4);
		dbDelta($sql5);
		dbDelta($sql6);
		dbDelta($sql7);
		dbDelta($sql8);
		dbDelta($sql9);
		dbDelta($sql10);
		
		DefaultData();
	}
	function DefaultData()
	{
		global $wpdb;

		$table_name   = $wpdb->prefix . "juna_it_gallery_manager";
		$table_name1  = $wpdb->prefix . "juna_it_video_manager";
		$table_name2  = $wpdb->prefix . "juna_it_video_link";
		$table_name3  = $wpdb->prefix . "juna_it_font_family";
		$table_name4  = $wpdb->prefix . "juna_it_video_effdb";
		$table_name5  = $wpdb->prefix . "juna_it_v_effect1";
		$table_name6  = $wpdb->prefix . "juna_it_v_effect2";
		$table_name7  = $wpdb->prefix . "juna_it_v_effect3";
		$table_name8  = $wpdb->prefix . "juna_it_v_effect4";
		$table_name9  = $wpdb->prefix . "juna_it_v_effect5";
		$table_name10 = $wpdb->prefix . "juna_it_v_effect6";

		$family = array('Abadi MT Condensed Light','Aharoni','Aldhabi','Andalus','Angsana New',' AngsanaUPC','Aparajita','Arabic Typesetting','Arial','Arial Black', 'Batang','BatangChe','Browallia New','BrowalliaUPC','Calibri','Calibri Light','Calisto MT','Cambria','Candara','Century Gothic','Comic Sans MS','Consolas', 'Constantia','Copperplate Gothic','Copperplate Gothic Light','Corbel','Cordia New','CordiaUPC','Courier New','DaunPenh','David','DFKai-SB','DilleniaUPC', 'DokChampa','Dotum','DotumChe','Ebrima','Estrangelo Edessa','EucrosiaUPC','Euphemia','FangSong','Franklin Gothic Medium','FrankRuehl','FreesiaUPC','Gabriola',
			'Gadugi','Gautami','Georgia','Gisha','Gulim','GulimChe','Gungsuh','GungsuhChe','Impact','IrisUPC','Iskoola Pota','JasmineUPC','KaiTi','Kalinga','Kartika', 'Khmer UI','KodchiangUPC','Kokila','Lao UI','Latha','Leelawadee','Levenim MT','LilyUPC','Lucida Console','Lucida Handwriting Italic','Lucida Sans Unicode', 'Malgun Gothic','Mangal','Manny ITC','Marlett','Meiryo','Meiryo UI','Microsoft Himalaya','Microsoft JhengHei','Microsoft JhengHei UI','Microsoft New Tai Lue', 'Microsoft PhagsPa','Microsoft Sans Serif','Microsoft Tai Le','Microsoft Uighur','Microsoft YaHei','Microsoft YaHei UI','Microsoft Yi Baiti','MingLiU_HKSCS', 'MingLiU_HKSCS-ExtB','Miriam','Mongolian Baiti','MoolBoran','MS UI Gothic','MV Boli','Myanmar Text','Narkisim','Nirmala UI','News Gothic MT','NSimSun','Nyala', 'Palatino Linotype','Plantagenet Cherokee','Raavi','Rod','Sakkal Majalla','Segoe Print','Segoe Script','Segoe UI Symbol','Shonar Bangla','Shruti','SimHei','SimKai', 'Simplified Arabic','SimSun','SimSun-ExtB','Sylfaen','Tahoma','Times New Roman','Traditional Arabic','Trebuchet MS','Tunga','Utsaah','Vani','Vijaya');
		$Juna_IT_VGallery_Count_Fonts=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id>%d",0));
		if(count($Juna_IT_VGallery_Count_Fonts)==0)
		{
			foreach ($family as $font_family) 
			{
				$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, Font_family) VALUES (%d, %s)", '', $font_family));
			}
		}
		$Juna_IT_VGallery_Count_VGN=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id>%d",0));	
		if(count($Juna_IT_VGallery_Count_VGN)==0)
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name (id, gallery_title, gallery_type, Juna_IT_Video_Gallery_Show_Video_Type, Juna_IT_Video_Gallery_Videos_Quantity) VALUES (%d, %s, %s, %s, %d)", '', 'Video Gallery', 'Video Gallery/Content-Popup', 'Show All', 6));

			$JIT_VGGID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE gallery_title=%s",'Video Gallery'));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, gallery_number, image_url) VALUES (%d, %s, %s, %s, %d, %s)", '', 'Dubai City', 'Dubai is the most populous city in the United Arab Emirates (UAE). It is located on the southeast coast of the Persian Gulf and is one of the seven emirates that make up the country. Abu Dhabi and Dubai are the only two emirates to have veto power over critical matters of national importance in the country)*&*(s legislature. The city of Dubai is located on the emirate)*&*(s northern coastline and heads up the Dubai-Sharjah-Ajman metropolitan area. Dubai is to host World Expo 2020', 'https://www.youtube.com/embed/t5vta25jHQI', $JIT_VGGID[0]->id, 'http://img.youtube.com/vi/t5vta25jHQI/mqdefault.jpg'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, gallery_number, image_url) VALUES (%d, %s, %s, %s, %d, %s)", '', 'Lamborghini Aventador LP760', 'I have managed to film an extremely loud Lamborghini Aventador LP760-4 Roadster Novitec Torado during the Rallye Germania in the Nürburgring. When the cars enteringt the hotel, this amazing tuned Aventador shooting some very loud and huge flames!', 'https://www.youtube.com/embed/g_YToB10qUs', $JIT_VGGID[0]->id, 'http://img.youtube.com/vi/g_YToB10qUs/mqdefault.jpg'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, gallery_number, image_url) VALUES (%d, %s, %s, %s, %d, %s)", '', 'How to Make a Professional Camera Slider', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry)*&*(s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'https://www.youtube.com/embed/GE37xI14Fyw', $JIT_VGGID[0]->id, 'http://img.youtube.com/vi/GE37xI14Fyw/mqdefault.jpg'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, gallery_number, image_url) VALUES (%d, %s, %s, %s, %d, %s)", '', 'Greatest Game Ever Played', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using )*&*(Content here, content here)*&*(, making it look like readable English.', 'https://www.youtube.com/embed/f92yfPFl9NY', $JIT_VGGID[0]->id, 'http://img.youtube.com/vi/f92yfPFl9NY/mqdefault.jpg'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, gallery_number, image_url) VALUES (%d, %s, %s, %s, %d, %s)", '', 'Indiana Jones in Real Life! In 4K!', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', 'https://www.youtube.com/embed/qPKKtvkVAjY', $JIT_VGGID[0]->id, 'http://img.youtube.com/vi/qPKKtvkVAjY/mqdefault.jpg'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, gallery_number, image_url) VALUES (%d, %s, %s, %s, %d, %s)", '', 'World)*&*(s Largest Urban Zipline', 'Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of )*^*(de Finibus Bonorum et Malorum)*^*( (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, )*^*(Lorem ipsum dolor sit amet..)*^*(, comes from a line in section 1.10.32.', 'https://www.youtube.com/embed/YcwrRA2BIlw', $JIT_VGGID[0]->id, 'http://img.youtube.com/vi/YcwrRA2BIlw/mqdefault.jpg'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, gallery_number, image_url) VALUES (%d, %s, %s, %s, %d, %s)", '', 'Bike Parkour -Streets of San Francisco!', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don)*&*(t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn)*&*(t anything embarrassing hidden in the middle of text.', 'https://www.youtube.com/embed/K9XCKP9KN7A', $JIT_VGGID[0]->id, 'http://img.youtube.com/vi/K9XCKP9KN7A/mqdefault.jpg'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, gallery_number, image_url) VALUES (%d, %s, %s, %s, %d, %s)", '', 'BMX Meets Parkour', 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'https://www.youtube.com/embed/5HTZeOkkk7I', $JIT_VGGID[0]->id, 'http://img.youtube.com/vi/5HTZeOkkk7I/mqdefault.jpg'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, gallery_number, image_url) VALUES (%d, %s, %s, %s, %d, %s)", '', 'Steve Spangler)*&*(s Biggest Experiment Yet!', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from )*^*(de Finibus Bonorum et Malorum)*^*( by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'https://www.youtube.com/embed/BmqDLMAesck', $JIT_VGGID[0]->id, 'http://img.youtube.com/vi/BmqDLMAesck/mqdefault.jpg'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, gallery_number, image_url) VALUES (%d, %s, %s, %s, %d, %s)", '', 'How to make Amazing Cinematic Effects', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry)*&*(s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'https://www.youtube.com/embed/NwN3G6VQ-Fs', $JIT_VGGID[0]->id, 'http://img.youtube.com/vi/NwN3G6VQ-Fs/mqdefault.jpg'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, gallery_number, image_url) VALUES (%d, %s, %s, %s, %d, %s)", '', '5 BEAUTIFUL WATER TRICKS', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry)*&*(s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'https://www.youtube.com/embed/mdMAYqQPLqs', $JIT_VGGID[0]->id, 'http://img.youtube.com/vi/mdMAYqQPLqs/mqdefault.jpg'));
		}
		$Juna_IT_VGallery_Count_VGE=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id>%d",0));	
		if(count($Juna_IT_VGallery_Count_VGE)==0)
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, effect_name, effect_type) VALUES (%d, %s, %s)", '', 'Video Gallery/Content-Popup', 'Video Gallery/Content-Popup'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, effect_name, effect_type) VALUES (%d, %s, %s)", '', 'Block Style Video Gallery', 'Block Style Video Gallery'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, effect_name, effect_type) VALUES (%d, %s, %s)", '', 'Thumbnails', 'Thumbnails'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, effect_name, effect_type) VALUES (%d, %s, %s)", '', 'Video Slider', 'Video Slider'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, effect_name, effect_type) VALUES (%d, %s, %s)", '', 'Video Carousel', 'Video Carousel'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, effect_name, effect_type) VALUES (%d, %s, %s)", '', 'Polaroids', 'Polaroids'));
		}

		$Juna_IT_VGallery_E1=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE id>%d",0));	
		
		if(count($Juna_IT_VGallery_E1)==0)
		{	
			$Juna_IT_VGallery_EN=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE effect_name=%s", 'Video Gallery/Content-Popup'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name5 (id, Juna_IT_Video_Gallery_Video_Title_Background_Color, Juna_IT_Video_Gallery_Video_Title_Color, Juna_IT_Video_Gallery_Box_Shadow_Video_Title_Color, Juna_IT_Video_Gallery_Font_Size_Video_Title, Juna_IT_Video_Gallery_Font_Family_Video_Title, Juna_IT_Video_Gallery_Video_Description_Background_Color, Juna_IT_Video_Gallery_Video_Description_Color, Juna_IT_Video_Gallery_First_Font_Size_Video_Description, Juna_IT_Video_Gallery_Font_Size_Video_Description, Juna_IT_Video_Gallery_Font_Family_Video_Description, Juna_IT_Video_Gallery_Video_Width, Juna_IT_Video_Gallery_Video_Height, Juna_IT_Video_Gallery_Border_Width, Juna_IT_Video_Gallery_Border_Radius, Juna_IT_Video_Gallery_Border_Style, Juna_IT_Video_Gallery_Video_Border_Color, Juna_IT_Video_Gallery_Hover_Background_Color, Juna_IT_Video_Gallery_Background_Transparency, Juna_IT_Video_Gallery_Choose_Buttons_Type, JIT_VG_Page_PFS, JIT_VG_Page_PC, JIT_VG_Page_IFS, JIT_VG_Page_IC, JIT_VG_Page_PPos, JIT_VG_IBgC, JIT_VG_IC, JIT_VG_IFS, JIT_VG_PBgC, JIT_VG_PBW, JIT_VG_PBS, JIT_VG_PBC, JIT_VG_PTC, JIT_VG_PTFF, JIT_VG_PTFS, JIT_VG_CP_LFS, JIT_VG_CP_LFF, JIT_VG_CP_LC, JIT_VG_CP_LT, JIT_VG_CP_LBgC, JIT_VG_CP_LBC, JIT_VG_CP_LBR, JIT_VG_CP_LPos, JIT_VGallery_TN_ID) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', '#dd8500', '#000000', '#ffffff', '10px', 'Arial', '#f5f5f5', '#dd8500', '17px', '10px', 'Arial', '260px', '185px', '0px', '0px', 'solid', '#dd8500', '#dd8500', '0.3', '8', '20px', '#dd8500', '22px', '#dd8500', 'Center', '#e1e1e1', '#000000', '30px', '#f5f5f5', '2px', 'solid', '#dd8500', '#000000', 'Arial', '16px', '16px', 'Arial', '#dd8500', 'View More', '#ffffff', '#dd8500', '5px', 'center', $Juna_IT_VGallery_EN[0]->id));	
		}	
		$Juna_IT_VGallery_E2=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE id>%d",0));	
		if(count($Juna_IT_VGallery_E2)==0)
		{
			$Juna_IT_VGallery_EN=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE effect_name=%s", 'Block Style Video Gallery'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name6 (id, Juna_IT_Video_Gallery_Video_Title_Background_Color1, Juna_IT_Video_Gallery_Video_Title_Color1, Juna_IT_Video_Gallery_Font_Size_Video_Title1, Juna_IT_Video_Gallery_Font_Family_Video_Title1, Juna_IT_Video_Gallery_Title_Align, Juna_IT_Video_Gallery_Video_Description_Background_Color1, Juna_IT_Video_Gallery_Video_Description_Color1, Juna_IT_Video_Gallery_First_Font_Size_Video_Description1, Juna_IT_Video_Gallery_Font_Size_Video_Description1, Juna_IT_Video_Gallery_Font_Family_Video_Description1, Juna_IT_Video_Gallery_Description_Align, Juna_IT_Video_Gallery_Video_Container, Juna_IT_Video_Gallery_Video_Width1, Juna_IT_Video_Gallery_Video_Height1, Juna_IT_Video_Gallery_Video_Position, Juna_IT_Video_Gallery_Video_Location, Juna_IT_Video_Gallery_Border_Width1, Juna_IT_Video_Gallery_Border_Radius1, Juna_IT_Video_Gallery_Border_Style1, Juna_IT_Video_Gallery_Video_Border_Color1, Juna_IT_Video_Gallery_Line_Color, Juna_IT_Video_Gallery_Line_Width, Juna_IT_Video_Gallery_Line_Style, Juna_IT_Video_Gallery_Pageination_Font_Size, Juna_IT_Video_Gallery_Pageination_Color, Juna_IT_Video_Gallery_Pageination_Icons_Size, Juna_IT_Video_Gallery_Pageination_Icons_Color, Juna_IT_Video_Gallery_Pageination_Position, JIT_VG_BS_LFS, JIT_VG_BS_LFF, JIT_VG_BS_LC, JIT_VG_BS_LT, JIT_VG_BS_LBgC, JIT_VG_BS_LBC, JIT_VG_BS_LBR, JIT_VG_BS_LPos, JIT_VGallery_TN_ID) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', '#dd8500', '#ffffff', '10px', 'Arial', 'Left', '#ffffff', '#828282', '10px', '10px', 'Arial', 'Justify', '100%', '600px', '336px', 'Center', 'Before Title', '0px', '0px', 'solid', '#000000', '#000000', '1px', 'dotted', '13px', '#dda552', '15px', '#dd8500', 'Center', '16px', 'Arial', '#dd8500', 'View More', '#ffffff', '#dd8500', '5px', 'center', $Juna_IT_VGallery_EN[0]->id));
		}
		$Juna_IT_VGallery_E3=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE id>%d",0));	
		if(count($Juna_IT_VGallery_E3)==0)
		{
			$Juna_IT_VGallery_EN=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE effect_name=%s", 'Thumbnails'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name7 (id, Juna_IT_Video_Gallery_Thumbnails_Video_Title_Bg_Color, Juna_IT_Video_Gallery_Thumbnails_Video_Title_Color, Juna_IT_Video_Gallery_Thumbnails_Video_Title_Transparency_Hover, Juna_IT_Video_Gallery_Thumbnails_Video_Title_Font_Size, Juna_IT_Video_Gallery_Thumbnails_Video_Title_Font_Family, Juna_IT_Video_Gallery_Thumbnails_Video_Title_Line_Width, Juna_IT_Video_Gallery_Thumbnails_Video_Title_Line_Style, Juna_IT_Video_Gallery_Thumbnails_Video_Title_Line_Text, Juna_IT_Video_Gallery_Thumbnails_Pageination_Font_Size, Juna_IT_Video_Gallery_Thumbnails_Pageination_Color, Juna_IT_Video_Gallery_Thumbnails_Pageination_Icons_Size, Juna_IT_Video_Gallery_Thumbnails_Pageination_Icons_Color, Juna_IT_Video_Gallery_Thumbnails_Pageination_Position, Juna_IT_Video_Gallery_Thumbnails_Video_Image_Width, Juna_IT_Video_Gallery_Thumbnails_Video_Image_Height, Juna_IT_Video_Gallery_Thumbnails_Video_Border_Width, Juna_IT_Video_Gallery_Thumbnails_Video_Border_Radius, Juna_IT_Video_Gallery_Thumbnails_Video_Border_Style, Juna_IT_Video_Gallery_Thumbnails_Video_Border_Color, Juna_IT_Video_Gallery_Thumbnails_Video_Icons, JIT_VGallery_TN_ID) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', '#dd8500', '#ffffff', '0.4', '10px', 'Arial', '1px', 'solid', 'Watch Video', '14px', '#ddae68', '15px', '#dd8500', 'Center', '280px', '169px', '5px', '0px', 'solid', '#ffffff', '8', $Juna_IT_VGallery_EN[0]->id));
		}
		$Juna_IT_VGallery_E4=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE id>%d",0));	
		if(count($Juna_IT_VGallery_E4)==0)
		{
			$Juna_IT_VGallery_EN=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE effect_name=%s", 'Video Slider'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name8 (id, Juna_IT_Video_Gallery_Slider_Title_Background_Color, Juna_IT_Video_Gallery_Slider_Title_Color, Juna_IT_Video_Gallery_Slider_Title_Font_Size, Juna_IT_Video_Gallery_Slider_Title_Font_Family, Juna_IT_Video_Gallery_Slider_Title_Position, Juna_IT_Video_Gallery_Slider_Video_Width, Juna_IT_Video_Gallery_Slider_Video_Height, Juna_IT_Video_Gallery_Slider_Background_Color, Juna_IT_Video_Gallery_Slider_Border_Width, Juna_IT_Video_Gallery_Slider_Border_Radius, Juna_IT_Video_Gallery_Slider_Border_Color, Juna_IT_Video_Gallery_Slider_Position, Juna_IT_Video_Gallery_Slider_Pause_Time, Juna_IT_Video_Gallery_Slider_Border_Style, Juna_IT_Video_Gallery_Slider_Change_Speed, Juna_IT_Video_Gallery_Slider_Icons_Type, JIT_VGallery_TN_ID) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', '#dd8500', '#ffffff', '22px', 'Arial', 'Center', '655px', '400px', '#dd8500', '0px', '0px', '#dd8500', '6%', '3s', 'solid', '1s', '7', $Juna_IT_VGallery_EN[0]->id));
		}
		$Juna_IT_VGallery_E5=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE id>%d",0));	
		if(count($Juna_IT_VGallery_E5)==0)
		{
			$Juna_IT_VGallery_EN=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE effect_name=%s", 'Video Carousel'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name9 (id, Juna_IT_Video_Gallery_Carousel_Width, Juna_IT_Video_Gallery_Carousel_Height, Juna_IT_Video_Gallery_Carousel_Autoplay_Steps, Juna_IT_Video_Gallery_Carousel_Slide_Width, Juna_IT_Video_Gallery_Carousel_Slide_Spacing, Juna_IT_Video_Gallery_Carousel_Slide_Cols, Juna_IT_Video_Gallery_Carousel_Arrows_Steps, Juna_IT_Video_Gallery_Carousel_Position, Juna_IT_Video_Gallery_Carousel_Pause_Time, Juna_IT_Video_Gallery_Carousel_Change_Speed, Juna_IT_Video_Gallery_Carousel_Background_Color, Juna_IT_Video_Gallery_Carousel_Video_Border_Width, Juna_IT_Video_Gallery_Carousel_Video_Border_Radius, Juna_IT_Video_Gallery_Carousel_Video_Border_Style, Juna_IT_Video_Gallery_Carousel_Video_Border_Color, Juna_IT_Video_Gallery_Carousel_Border_Width, Juna_IT_Video_Gallery_Carousel_Border_Radius, Juna_IT_Video_Gallery_Carousel_Border_Style, Juna_IT_Video_Gallery_Carousel_Border_Color, Juna_IT_Video_Gallery_Carousel_Icons_Type, JIT_VGallery_TN_ID) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', '801px', '155px', '1', '195', '7', '4', '1', '3%', '4s', '0.9s', '#dda95a', '1px', '0px', 'solid', '#ffffff', '2px', '0px', 'solid', '#ffffff', '7', $Juna_IT_VGallery_EN[0]->id));
		}		
		$Juna_IT_VGallery_E6=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name10 WHERE id>%d",0));	
		if(count($Juna_IT_VGallery_E6)==0)
		{

			$Juna_IT_VGallery_EN=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE effect_name=%s", 'Polaroids'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name10 (id, Juna_IT_VG_Polaroids_Title_Font_Size, Juna_IT_VG_Polaroids_Title_Font_Family, Juna_IT_VG_Polaroids_Title_Color, Juna_IT_VG_Polaroids_Desc_Show, Juna_IT_VG_Polaroids_Desc_Font_Size, Juna_IT_VG_Polaroids_Desc_First_Font_Size, Juna_IT_VG_Polaroids_Desc_Font_Family, Juna_IT_VG_Polaroids_Desc_Color, Juna_IT_VG_Polaroids_Desc_Bg_Color, Juna_IT_VG_Polaroids_Image_Width, Juna_IT_VG_Polaroids_Image_Background, Juna_IT_VG_Polaroids_Big_Image_Border_Radius, Juna_IT_VG_Polaroids_Image_Border_Radius, Juna_IT_VG_Polaroids_Image_Border_Width, Juna_IT_VG_Polaroids_Image_Border_Color, Juna_IT_VG_Polaroids_Image_Box_Shadow, Juna_IT_VG_Polaroids_Image_Box_Shadow_Color, Juna_IT_VG_Polaroids_Slider_Background, Juna_IT_VG_Polaroids_Slider_Height, Juna_IT_VG_Polaroids_Slider_Box_Shadow, Juna_IT_VG_Polaroids_Slider_Border_Radius, Juna_IT_VG_Polaroids_Video_Bg_Color, Juna_IT_VG_Polaroids_Popup_Effect_Speed, Juna_IT_VG_Polaroids_Icon_Color, Juna_IT_VG_Polaroids_Icon_Size, Juna_IT_VG_Polaroids_Icon_Type, Juna_IT_VG_Polaroids_Video_Bg_Color_Op, Juna_IT_VG_Polaroids_Radius_Bg_Color, Juna_IT_VG_Polaroids_Radius_Border_radius, Juna_IT_VG_Polaroids_Radius_Font_Size, Juna_IT_VG_Polaroids_Radius_Color, Juna_IT_VG_Polaroids_Radius_Bg_Color2, JIT_VG_Pol_LFS, JIT_VG_Pol_LFF, JIT_VG_Pol_LC, JIT_VG_Pol_LT, JIT_VG_Pol_LBgC, JIT_VG_Pol_LBC, JIT_VG_Pol_LBR, JIT_VG_Pol_LPos, JIT_VGallery_TN_ID) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', '15px', 'Arial', '#ffffff', 'on', '15px', '25px', 'Arial', '#ffffff', '#dd8500', '290px', '#dd8500', '3%', '3%', '2px', '#ffffff', '10px', '#ffffff', '#ffffff', '450px', '4px', '0%', '#dd8500', '3s', '#dd8500', '30px', '1', '90', '#dd9933', '25%', '80%', '#ffffff', '#dd8500', '16px', 'Arial', '#dd8500', 'View More', '#ffffff', '#dd8500', '5px', 'center', $Juna_IT_VGallery_EN[0]->id));
		}		
	}
?>