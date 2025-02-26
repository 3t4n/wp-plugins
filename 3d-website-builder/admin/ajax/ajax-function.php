<?php 
/**
* Author :  Keivan Kamali 
*/
if(!defined('ABSPATH')) exit();

add_action('wp_ajax_wb3d_read_first_data', 'wb3d_read_first_data');
add_action('wp_ajax_nopriv_wb3d_read_first_data', 'wb3d_read_first_data');

add_action('wp_ajax_wb3d_save_data', 'wb3d_save_data');
add_action('wp_ajax_nopriv_wb3d_save_data', 'wb3d_save_data');

add_action('wp_ajax_wb3d_get_sub_slider_data', 'wb3d_get_sub_slider_data');
add_action('wp_ajax_nopriv_wb3d_get_sub_slider_data', 'wb3d_get_sub_slider_data');




if ( ! function_exists( 'wb3d_save_data' ) ) {
	function wb3d_save_data() {


            if ( ! isset( $_POST['wb3d_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['wb3d_nonce'] ) ) , 'wb3d_nonce' ) ){
			die();
		}

		global $wpdb;
		$layers=wp_kses_post(wp_unslash($_POST['layers']));
		$setting=wp_kses_post(wp_unslash($_POST['setting']));
		$html1=wp_kses_post(wp_unslash($_POST['html']));
		$event=sanitize_text_field(wp_unslash($_POST['event']));
		$css=wp_kses_post(wp_unslash($_POST['css']));
		$effect_name=sanitize_text_field(wp_unslash($_POST['effect_name']));
		$open_addons=sanitize_text_field(wp_unslash($_POST['open_addons']));
		$effects=sanitize_text_field(wp_unslash($_POST['effects']));
		$color=sanitize_text_field(wp_unslash($_POST['color']));
		$effect_color=sanitize_text_field(wp_unslash($_POST['effect_color']));
		$wb3d_obj=sanitize_text_field(wp_unslash($_POST['wb3d_obj']));
		$id_ves=sanitize_text_field(wp_unslash($_POST['id_ves']));
		$layerstext=wp_kses_post(wp_unslash($_POST['layerstext']));
		$textv=wp_kses_post(wp_unslash($_POST['textv']));
		$date= time();

		$zz=$wpdb->query($wpdb->prepare("UPDATE $wpdb->wb3d_setting SET setting= %s,wb3d_obj= %s, effect_name= %s, effect_color= %s,open_addons= %s,html= %s,event= %s,layerstext= %s,css= %s,effects= %s,color= %s,date= %s WHERE id_ves = %s",array($setting,$wb3d_obj,$effect_name,$effect_color,$open_addons,$html1,$event,$layerstext,$css,$effects,$color,$date,$id_ves )));

		$zz=$wpdb->query($wpdb->prepare("DELETE  FROM $wpdb->wb3d_slides WHERE slider_id = %s ",$id_ves));

		$textv=json_decode($layers,true);

		$max=json_decode($setting, true)["num"];

		for($i=0;$i<$max;$i++){

			$text=wp_json_encode($textv[$i]);

			$wpdb->query( $wpdb->prepare("INSERT INTO $wpdb->wb3d_slides ( layers,slider_id,slide_id ) VALUES ( %s,%s,%s )",array($text,$id_ves,$i)) );
		}
		wp_die();
	};
}


if ( ! function_exists( 'wb3d_read_first_data' ) ) {
	function wb3d_read_first_data() {

		global $wpdb;
		$id=1;

		$messages[0]= $wpdb->get_results($wpdb->prepare("SELECT id,id_ves,name,thumbnail FROM $wpdb->wb3d_setting WHERE id>%d ORDER BY id DESC",$id), OBJECT);

		echo wp_json_encode($messages,true);

		wp_die();
	};
}


if ( ! function_exists( 'wb3d_get_sub_slider_data' ) ) {
	function wb3d_get_sub_slider_data() {


            if ( ! isset( $_POST['wb3d_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['wb3d_nonce'] ) ) , 'wb3d_nonce' ) ){
			die();
		}

		global $wpdb;
		$id_ves=sanitize_text_field(wp_unslash($_POST['id_ves']));

		$messages= $wpdb->get_row($wpdb->prepare("SELECT id, ver, id_ves, name, effect_name, effect_color, thumbnail, setting, css, html, event, effects, color, wb3d_obj, layerstext, open_addons, date FROM $wpdb->wb3d_setting WHERE id_ves = %s  ",$id_ves), OBJECT);

		$ff['setting']=json_decode($messages->setting,true);
		$ff['effects2']=json_decode($messages->effects,true);
		$ff['color2']=json_decode($messages->color,true);
		$ff['effect_color']=json_decode($messages->effect_color,true);
		$ff['event']=$messages->event;
		$ff['css2']=wb3d_htmldecode2($messages->css);
		$ff['html2']=wb3d_htmldecode2($messages->html);
		$ff['ver']=$messages->ver;
		$ff['effect_name']=json_decode(wb3d_htmldecode2($messages->effect_name),true);
		$ff['id_ves']=$messages->id_ves;
		$ff['wb3d_obj']=json_decode($messages->wb3d_obj);
		$ff['open_addons']=explode(",",$messages->open_addons);

		$x=$wpdb->get_results($wpdb->prepare("SELECT id, slider_id, slide_id, layers FROM $wpdb->wb3d_slides WHERE slider_id = %s  ",$ff['id_ves']),OBJECT );

		for($v=0;$v< $wpdb->num_rows;$v++){
			$ff['layers2'][$v]=json_decode(wb3d_htmldecode2($x[$v]->layers));
		}


		for( $j=0;$j<$ff['setting']["num"];$j++){

			$f=$ff['layers2'][$j][0]->slide_of_location;
			$f=$ff['layers2'][$j][0]->layer;

			for( $i=1;$i<$ff['layers2'][$j][0]->layer;$i++){
				for( $r=0;$r<$ff['layers2'][$j][$i]->layer_obj;$r++){
					$modd="obj_num_".$r;
					$y= $ff['layers2'][$j][$i]->$modd ;
					$T1= "type_obj-".$y ;
					$func= 'wb3d_ajax_value_replace_'.$ff['layers2'][$j][$i]->$T1;
					$T1= "type_obj-0" ;

					if(function_exists( $func )){
						$func($ff['layers2'][$j][$i],$y);
					}
				}
			}
		}
		echo wp_json_encode($ff,true);
		wp_die();
	};
}
?>