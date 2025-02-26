<?php
class class_import {
  private $meta;
  
  // aus performencegründen
  function load_meta (){
    require_once('class_functions.php');
    $functions = new class_functions();
    $this->meta = $functions->get_Meta();
  }
    
  // in utf8 umwandeln
  function encode_utf8($array){
    for ($i = 0; $i < count($array); $i++){
      $array[$i] = utf8_encode($array[$i]);
    }
    return $array;
  }

  // Metabox generieren
  function generate_Meta_Box(){
    $out = '<b>moegliche Eingabe:</b><br />';
    for ($i = 0; $i < count($this->meta); $i ++){
      $out .= $this->meta[$i].'<br />';
    }
  return $out;
  }

  // logik stimmt muss noch gestestet werden
  function insert_Data($data, $filter){
    $rows = count($data,0);
    $cols = (count($data,1)/count($data,0))-1;
    $start = get_option('ex_import');
    echo 'reihen: '.$rows;
    echo 'zeilen: '.$cols;
    $i = 0;
    while($i < $rows){
      $my_post = array();
      $my_post['post_title'] = $start+$i;
      $my_post['post_content'] = '';
      $my_post['post_status'] = 'publish';
      $my_post['post_author'] = 1;
      $my_post['post_category'] = array(0);

      wp_insert_post( $my_post );
      
      for ($j = 0; $j < $cols; $j ++){
         update_post_meta($start+$i, $filter[$j], $data[$i][$j]);
      }
      $i++;     
    }
    update_option('ex_import', ($start+$i));
  }
  
  
  function removeEmptyRows($array){
    $rows = count($array,0);
    $cols = (count($array,1)/count($array,0))-1;
    
    $del = 0;
    
    for ($i = 0; $i < $cols; $i++){
       for ($j = 1; $j < $rows; $j++){
         if (!empty($array[$i][$j])){
            $del++;
         }
         if (($del-1) == $cols){
            for ($k = 0; $k < $rows; $k ++){
              unset($array[$i][$k]);
            }
         }
       }
       $del = 0;
    }

    return $array;
  }
  
  function filetocsv($path){
    $datei = array();
	  $i = 0;
	
    $handle = fopen($path, 'r');
    while($data = fgetcsv($handle, 2048, ',')) {
      $datei[$i] = $this->encode_utf8($data);
      $i++;
    }
    fclose($handle);
    
    return $datei;
  }   
}
?>