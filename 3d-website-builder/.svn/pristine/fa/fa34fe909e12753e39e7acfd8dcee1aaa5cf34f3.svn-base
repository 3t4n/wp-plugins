<?php 
/**
* Author URI:  https://3dwebsitebuilder.com/
* Author : Keivan Kamali
*/
if(!defined('ABSPATH')) exit();


add_action('wp_ajax_wb3d_export', 'wb3d_export');
add_action('wp_ajax_nopriv_wb3d_export', 'wb3d_export');



add_action('wp_ajax_wb3d_copy', 'wb3d_copy');
add_action('wp_ajax_nopriv_wb3d_copy', 'wb3d_copy');

add_action('wp_ajax_wb3d_new', 'wb3d_new');
add_action('wp_ajax_nopriv_wb3d_new', 'wb3d_new');


add_action('wp_ajax_wb3d_delete', 'wb3d_delete');
add_action('wp_ajax_nopriv_wb3d_delete', 'wb3d_delete');



add_action('wp_ajax_wb3d_rename', 'wb3d_rename');
add_action('wp_ajax_nopriv_wb3d_rename', 'wb3d_rename');





add_action('wp_ajax_wb3d_import_file', 'wb3d_import_file');
add_action('wp_ajax_nopriv_wb3d_import_file', 'wb3d_import_file');


add_action('wp_ajax_wb3d_change_thumbnail', 'wb3d_change_thumbnail');
add_action('wp_ajax_nopriv_wb3d_change_thumbnail', 'wb3d_change_thumbnail');



if ( ! function_exists( 'wb3d_export' ) ) {
      function wb3d_export() {

            if ( ! isset( $_POST['wb3d_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['wb3d_nonce'] ) ) , 'wb3d_nonce' ) ){
                  die();
            }
            global $wp_filesystem;
            global $wpdb;
            $id_ves=sanitize_text_field($_POST['id_ves']);
            $url=sanitize_url($_POST['url']);

            if(explode("http://",$url)[1]!=""){
                  $url=explode("http://",$url)[1];
            }
            else if(explode("https://",$url)[1]!=""){
                  $url=explode("https://",$url)[1];
            }
     
            $messages[0]= $wpdb->get_row($wpdb->prepare("SELECT id, ver, id_ves, name, effect_name, effect_color, thumbnail, setting, css, html, event, effects, color, wb3d_obj, layerstext, open_addons, date FROM $wpdb->wb3d_setting WHERE id_ves= %s",$id_ves), OBJECT);

            $messages[1]= $wpdb->get_results( $wpdb->prepare("SELECT id, slider_id, slide_id, layers FROM $wpdb->wb3d_slides WHERE slider_id = %s",$id_ves), OBJECT);
            $de=wp_json_encode($messages,true);
            $de=json_decode($de,true);
            $zip = new ZipArchive();
            $archive_file_name=wb3d_DIR . '/backup/'.$id_ves.'.zip';
            $file_path=get_home_path();
            $file_path2=wb3d_DIR . '/backup/';
            require_once (ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();
            if ( !file_exists( $file_path2 ) && !is_dir( $file_path2 ) ) {
                  wp_mkdir_p( $file_path2 );     
            }
            wp_delete_file($file_path2.$id_ves.'.zip');
            if ($zip->open($archive_file_name, ZIPARCHIVE::CREATE )!==TRUE) {
                  echo "error create zip";
            }

            $url2=explode($url,$messages[0]->thumbnail)[1];
            if($url2!=""){
                  $zip->addFile($file_path.$url2,$url2);
            }

            for( $s=0;$s<count($de[1]);$s++){
                  $data2=json_decode($de[1][$s]['layers'],true);
                  for( $l=1;$l<count($data2);$l++){
                        $F=($data2[$l]);
                        for( $c=0;$c<$F["layer_obj"];$c++){
                              $t= $F["obj_num_".$c];
                              wb3d_get_media($F,$t,$zip,$file_path,$url);
                              wb3d_get_media($F,$t,$zip,$file_path,"..");
                        }

                  }
            }
            $a=$wp_filesystem->put_contents($file_path2.'wb3d_objexts.txt',wp_json_encode($messages,true));
            $zip->addFile($file_path2.'wb3d_objexts.txt','wb3d_objexts.txt');
            $zip->close();
            wp_delete_file($file_path2.'wb3d_objexts.txt');
            wp_die();
      };
}

function wb3d_get_media($F,$t,$zip,$file_path,$url){

      $index1=$F[ "type_obj-".$t];
      $func1="wb3d_get_media_".$index1;
      if ( function_exists( $func1 ) ) {
            $x=$func1($F,$t,$url);
            for($v=0;$v<count($x);$v++){
                  if($x[$v]!=""){
                        $zip->addFile($file_path.$x[$v],$x[$v]);
                  }
            }
      }

}


/////////////////////////////////////////
if ( ! function_exists( 'wb3d_new' ) ) {
      function wb3d_new() {
            global $wpdb;

            if ( ! isset( $_POST['wb3d_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['wb3d_nonce'] ) ) , 'wb3d_nonce' ) ){
                  die();
            }

            $id_ves=sanitize_text_field($_POST['id_ves']);
            $id_ves_new=sanitize_text_field($_POST['id_ves_new']);
            $tmp_name=sanitize_text_field($_POST['name']).'_1';
            $tmp=$tmp_name;

            for($i=1;$i<25000;$i++){

                  $messages= $wpdb->get_row($wpdb->prepare("SELECT id, ver, id_ves, name FROM $wpdb->wb3d_setting WHERE name =%s ",$tmp), OBJECT);
                  $rowcount = $wpdb->num_rows;
                  if($rowcount==0){
                        break;
                  }
                  else{
                        $tmp=$tmp_name.'_'.$i; 
                  }
            }

            $id2=1;

            $messages= $wpdb->get_row($wpdb->prepare("INSERT INTO $wpdb->wb3d_setting (ver,name,thumbnail,effect_name,effect_color,setting,css,html,event,effects,color,wb3d_obj,layerstext,open_addons,date) SELECT ver,name,thumbnail,effect_name,effect_color,setting,css,html,event,effects,color,wb3d_obj,layerstext,open_addons,date from $wpdb->wb3d_setting WHERE id = %d",$id2), OBJECT);
            unset($messages);
  
            $id=0;
            $messages= $wpdb->get_row ($wpdb->prepare("SELECT id FROM $wpdb->wb3d_setting WHERE id <> %d ORDER BY id DESC",$id), OBJECT );
            $wpdb->query($wpdb->prepare("UPDATE $wpdb->wb3d_setting SET name= %s,id_ves= %s WHERE id = %d",array($tmp,$id_ves_new,$messages->id)));

            $id=1;
            $messages= $wpdb->get_row ($wpdb->prepare("SELECT id, slider_id, slide_id, layers FROM $wpdb->wb3d_slides where id = %d ",$id), OBJECT);

            $messages=$messages->layers;

            $wpdb->query( $wpdb->prepare(" INSERT INTO $wpdb->wb3d_slides ( slider_id,slide_id,layers ) VALUES ( %s,%d,%s )  ",array($id_ves_new,0,$messages)  ) );
            
            $id=0;
            $messages= $wpdb->get_row ($wpdb->prepare("SELECT id,id_ves,thumbnail FROM $wpdb->wb3d_setting WHERE id <> %d ORDER BY id DESC",$id), OBJECT);

            $data['id']=$messages->id;
            $data['id_ves']=$messages->id_ves;
            $data['thumbnail']=$messages->thumbnail;
            $data['name']=$tmp;
            echo wp_json_encode($data,true);
            wp_die();
      };
}



/////////////////////////////////////////
if ( ! function_exists( 'wb3d_copy' ) ) {
      function wb3d_copy() {
            global $wpdb;

            if ( ! isset( $_POST['wb3d_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['wb3d_nonce'] ) ) , 'wb3d_nonce' ) ){
                  die();
            }

            $id_ves=sanitize_text_field($_POST['id_ves']);
            $id_ves_new=sanitize_text_field($_POST['id_ves_new']);
            $tmp_name=sanitize_text_field($_POST['name']);
            $tmp=$tmp_name.'_1';

            for($i=1;$i<25000;$i++){

                  $messages= $wpdb->get_row($wpdb->prepare("SELECT id, ver, id_ves, name, effect_name, effect_color, thumbnail, setting, css, html, event, effects, color, wb3d_obj, layerstext, open_addons, date FROM $wpdb->wb3d_setting WHERE name = %s",$tmp), OBJECT);
                  $rowcount = $wpdb->num_rows;
                  if($rowcount==0){
                        break;
                  }
                  else{
                        $tmp=$tmp_name.'_'.$i; 
                  }
            }
            

            $messages= $wpdb->get_row($wpdb->prepare("INSERT INTO $wpdb->wb3d_setting (ver,name,thumbnail,effect_name,effect_color,setting,css,html,event,effects,color,wb3d_obj,layerstext,open_addons,date) SELECT ver,name,thumbnail,effect_name,effect_color,setting,css,html,event,effects,color,wb3d_obj,layerstext,open_addons,date from $wpdb->wb3d_setting WHERE id_ves = %s",$id_ves), OBJECT);
            
            $messages= $wpdb->get_row ("SELECT id FROM $wpdb->wb3d_setting ORDER BY id DESC", OBJECT);

            $id=$messages->id ;

            $wpdb->query($wpdb->prepare("UPDATE $wpdb->wb3d_setting SET name= %s,id_ves= %s WHERE id = %d",array($tmp,$id_ves_new,$messages->id)));

            $messages= $wpdb->get_row($wpdb->prepare("INSERT INTO $wpdb->wb3d_slides (slider_id,slide_id,layers) SELECT %s,slide_id,layers from $wpdb->wb3d_slides WHERE slider_id= %s",array($id_ves_new,$id_ves)), OBJECT);

            $messages= $wpdb->get_row ("SELECT id,id_ves,thumbnail FROM $wpdb->wb3d_setting ORDER BY id DESC", OBJECT);

            $data['id']=$messages->id;
            $data['id_ves']=$messages->id_ves;
            $data['thumbnail']=$messages->thumbnail;
            $data['name']=$tmp;

            echo wp_json_encode($data,true);
            wp_die();
      };
}


if ( ! function_exists( 'wb3d_delete' ) ) {
      function wb3d_delete() {
            global $wpdb;
            if ( ! isset( $_POST['wb3d_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['wb3d_nonce'] ) ) , 'wb3d_nonce' ) ){
                  die();
            }

            $id_ves=sanitize_text_field($_POST['id_ves']);

            if($id_ves!=-1){
                  $wpdb->query($wpdb->prepare("DELETE  FROM $wpdb->wb3d_setting WHERE id_ves= %s",$id_ves));
                  $wpdb->query($wpdb->prepare("DELETE  FROM $wpdb->wb3d_slides WHERE slider_id= %s",$id_ves));
            }
            $messages= $wpdb->get_results($wpdb->prepare("SELECT id,id_ves,name,thumbnail FROM $wpdb->wb3d_setting WHERE id>%d ORDER BY id ASC  ",1), OBJECT);
            echo wp_json_encode($messages,true);

            wp_die();
      };
}



if ( ! function_exists( 'wb3d_change_thumbnail' ) ) {
      function wb3d_change_thumbnail() {
      global $wpdb;

      if ( ! isset( $_POST['wb3d_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['wb3d_nonce'] ) ) , 'wb3d_nonce' ) ){
            die();
      }
      $thumbnail=sanitize_url($_POST['thumbnail']);
      $id_ves=sanitize_text_field($_POST['id_ves']);
      $wpdb->query($wpdb->prepare("UPDATE  $wpdb->wb3d_setting SET thumbnail = %s WHERE id_ves = %s",array($thumbnail,$id_ves)));
            wp_die();
      };
}



if ( ! function_exists( 'wb3d_rename' ) ) {
      function wb3d_rename() {
            global $wpdb;

            if ( ! isset( $_POST['wb3d_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['wb3d_nonce'] ) ) , 'wb3d_nonce' ) ){
                  die();
            }

            $name=sanitize_text_field($_POST['name']);
            $id_ves=sanitize_text_field($_POST['id_ves']);

            $messages= $wpdb->get_results($wpdb->prepare("SELECT id_ves FROM $wpdb->wb3d_setting WHERE name= %s",$name), OBJECT);
            $rowcount = $wpdb->num_rows;

            if($rowcount==0){
                  $wpdb->query($wpdb->prepare("UPDATE  $wpdb->wb3d_setting SET name = %s WHERE id_ves = %s",array($name,$id_ves)));
            }

            echo  esc_html($rowcount);

            wp_die();
      };
}
///////////////////////////////////


if ( ! function_exists( 'wb3d_import_file' ) ) {
      function wb3d_import_file() {
            global $wpdb;
            if ( ! isset( $_POST['wb3d_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['wb3d_nonce'] ) ) , 'wb3d_nonce' ) ){
                  die();
            }
            WP_Filesystem();
            global $wp_filesystem;
            $replace_ves=sanitize_text_field($_POST['replace_ves']);
            $file_path2=ABSPATH;

            if ( ! function_exists( 'wp_handle_upload' ) ) {
                  require_once( ABSPATH . 'wp-admin/includes/file.php' );
            }
            $upload_overrides = array( 'test_form' => false );

            if(!empty($_FILES['file'])){

                  $movefile = wp_handle_upload( $_FILES['file'], $upload_overrides );

                  if ( $movefile ) {
                        $tmp_adr=$movefile["file"];
                        
                        wp_delete_file($file_path2."wb3d_objexts.txt");

                        $zip = new ZipArchive;
                        $res = $zip->open($tmp_adr);
                        if ($res === TRUE) {
                              $zip->extractTo($file_path2);
                              $zip->close();
                              $json_data =$wp_filesystem->get_contents($file_path2."wb3d_objexts.txt", "r");
                              if($json_data){
                                    $json_data=json_decode($json_data, true);
                                    $id_ves= $json_data[0]["id_ves"];
                                    global $wpdb;
                           
                                    $x= $wpdb->get_row($wpdb->prepare("SELECT id, ver, id_ves, name FROM $wpdb->wb3d_setting WHERE id_ves= %s",$id_ves), OBJECT);

                                    if((!empty($x))&&$replace_ves=='1'){
                                          $wpdb->query($wpdb->prepare("DELETE  FROM $wpdb->wb3d_setting WHERE id_ves= %s",$id_ves));
                                          $wpdb->query($wpdb->prepare("DELETE  FROM $wpdb->wb3d_slides WHERE slider_id= %s",$id_ves));
                                    }

                                    if((!empty($x))&&$replace_ves=='0'){
                                          echo 2;
                                    }
                                    else{

                                          $wpdb->query( $wpdb->prepare( 
                                          " INSERT INTO $wpdb->wb3d_setting (ver, id_ves,name,effect_name,effect_color,thumbnail,setting,css,html,event,effects,color,wb3d_obj,layerstext,open_addons,date )
                                          VALUES ( %s, %s, %s, %s, %s, %s, %s, %s, %s,%s,%s,%s,%s,%s,%s,%s)" , array($json_data[0]['ver'],$json_data[0]['id_ves'],$json_data[0]['name'],$json_data[0]['effect_name'],$json_data[0]['effect_color'],$json_data[0]['thumbnail'],$json_data[0]['setting'],$json_data[0]['css'],$json_data[0]['html'],$json_data[0]['event'],$json_data[0]['effects'],$json_data[0]['color'],$json_data[0]['wb3d_obj'],$json_data[0]['layerstext'],$json_data[0]['open_addons'],$json_data[0]['date'])) );


                                          for($i=0;$i<count($json_data[1]);$i++){
                                                $wpdb->query( $wpdb->prepare("INSERT INTO $wpdb->wb3d_slides ( slider_id,slide_id,layers ) VALUES ( %s,%s,%s ) ",array($json_data[1][$i]['slider_id'],$json_data[1][$i]['slide_id'],$json_data[1][$i]['layers']) ) );
                                          }

                                          unset($messages);
                                          $messages= $wpdb->get_results($wpdb->prepare("SELECT id,id_ves,name,thumbnail FROM $wpdb->wb3d_setting WHERE id>%d ORDER BY id ASC ",1), OBJECT);
                                          echo wp_json_encode($messages,true);
                                    }
                              }
                              else{
                                    echo -1;
                              }
                              wp_delete_file($file_path2."wb3d_objexts.txt");
                              wp_delete_file($tmp_adr);
                              wp_die();
                        }
                  } 
                  else {
                        echo -1;
                  }
            }
      }
}
?>