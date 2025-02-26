<?php

// These functions check odd or even and makes forms for post.

//check odd or even , form metas (for post)

if(!function_exists('amJL_post_forms')){
  function amJL_post_forms($basic_label, $number, $basic_name, $size, $place){
      global $post;
      switch((int)$number%2){
        case 0: //even
          echo "<table class='form-table'>\n";
          for((int)$i = 0; $i < (int)$number/2; $i++){
            $even = 2*($i + 1);
            $odd = 2*$i + 1;
            $OddVal = [$basic_label.$even, $basic_name.$even];
            $EvenVal = [$basic_label.$odd, $basic_name.$odd];
            amJL_double_post_form('No', $EvenVal[0], $EvenVal[1], $size, $place, $OddVal[0], $OddVal[1], $size, $place);
          }
          echo "</table>\n";
          break;
    
        case 1: //odd
          echo "<table class='form-table'>\n";
          for((int)$i = 0; $i < ($number-1)/2; $i++){
            $even = 2*($i + 1);
            $odd = 2*$i + 1;
            $OddVal = [$basic_label.$even, $basic_name.$even];
            $EvenVal = [$basic_label.$odd, $basic_name.$odd];
            amJL_double_post_form('No', $EvenVal[0], $EvenVal[1], $size, $place, $OddVal[0], $OddVal[1], $size, $place);
          }
          amJL_single_post_form('No', $basic_label.$number, $basic_name.$number, $size, $place);
          echo "</table>\n";
      }
  }
}

//form metas or no form meta (for post), set init form metas
if(!function_exists('amJL_select_post_form')){
  function amJL_select_post_form($init_number, $max_number, $label, $name, $size, $place){
      global $post;
      if($max_number === 0){
        if($init_number === 0){
          echo "<p>入力フォームの個数が選択されていません。</p>\n";
        }else{
          amJL_post_forms($label, $init_number, $name, $size, $place);
        }
      }else{
        amJL_post_forms($label, $max_number, $name, $size, $place);
      }
  }
}