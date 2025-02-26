<?php 
/**
* Author URI:  https://3dwebsitebuilder.com/
* Author : Keivan Kamali
*/
if(!defined('ABSPATH')) exit();



global	$wb3d_js;
global	$wb3d_element_created;
		$wb3d_element_created= array();
global	$wb3d_setting;
global	$wb3d_dataslide;
global	$wb3d_open_addons;
global	$wb3d_open_addons_A;
global	$wb3d_max;
global	$wb3d_date;
global 	$wb3d_pro;
global	$wb3d_sn;
		$wb3d_sn=array();


if ( ! function_exists( 'wb3d_set_tag' ) ) 
{
	function wb3d_set_tag($B,$y){

            $tag1='div';
            $tag2='div';
            $obj_num_="obj_num_0";
            if($B[$obj_num_]!=$y){
                  $flag=1;
            }
            else{
                  $flag=0;
            }



            $w_tag_="w_tag_".$y;
            if( isset($B[$w_tag_])){
                  $tag1=$B[$w_tag_];
                  $tag2=$B[$w_tag_];
            }

            if($B['click_type']==0){

                  $tag1='a';
                  $tag2='a';

                  if( !isset($B['click_link'])){
                        $B['click_link']="";
                  }

                  $tag1.=' href="'.$B['click_link'].'" ';
                  $tag2.='';

                  if($B['click_newpage']>1){
                        $tag1.=' target="_self" ';
                  }
                  else{
                        $tag1.=' target="_blank" ';
                  }

                  if($B['click_newpage']==1||$B['click_newpage']==3){
                        $tag1.=' rel="nofollow noopener" ';
                  }
                  else{
                        $tag1.=' rel="noopener" ';
                  }
            }
            if($B['pointer']==1&&$flag===1){
                  $tags[0]=$tag1.' class="wb3d_pointer wb3d_displaynone wb3d_absolute" ';
            }
            else if($B['pointer']==0&&$flag===1){
                  $tags[0]=$tag1.' class="wb3d_displaynone wb3d_absolute" ';
            }             
            else if($B['pointer']==1&&$flag===0){
                  $tags[0]=$tag1.' class="wb3d_pointer wb3d_absolute" ';
            }            
            else{
                  $tags[0]=$tag1;
            }
            $tags[1]=$tag2;
            return $tags;
	}
}

if ( ! function_exists( 'wb3d_get_sql_data' ) ) {
	function wb3d_get_sql_data($main_demo,$myParam,$cu){
		global	$wpdb;
		global	$wb3d_js;
		global	$wb3d_setting;
		global	$wb3d_dataslide;
		global	$wb3d_open_addons;
		global	$wb3d_open_addons_A;
		global	$wb3d_max;
		global	$wb3d_date;
		global	$wb3d_php_id_num;
		global 	$wb3d_addons;
            global $wb3d_sn;
            global $wb3d_pro;
            global $wb3d_effectservice;
            $wb3d_effectservice=0;

            if($main_demo=="view"){

			$messages= $wpdb->get_row( $wpdb->prepare("SELECT id, ver, id_ves, name, effect_name, effect_color, thumbnail, setting, css, html, event, effects, color, wb3d_obj, layerstext, open_addons, date FROM $wpdb->wb3d_setting WHERE name =  %s",$myParam ), OBJECT);
            }
            else{
                  $cu=0;

			$messages= $wpdb->get_row($wpdb->prepare("SELECT id, ver, id_ves, name, effect_name, effect_color, thumbnail, setting, css, html, event, effects, color, wb3d_obj, layerstext, open_addons, date FROM $wpdb->wb3d_setting WHERE id_ves = %s",$myParam), OBJECT);
            }


		$ff['setting']=json_decode($messages->setting,true);
		$ff['effects2']=json_decode($messages->effects,true);
		$ff['color2']=json_decode($messages->color,true);
		$ff['effect_color']=json_decode($messages->effect_color,true);
		$ff['html2']=wb3d_htmldecode2($messages->html);
		$ff['layerstext']=wb3d_htmldecode2($messages->layerstext);
		$ff['event']=$messages->event;
		$ff['css2']=wb3d_htmldecode2($messages->css);
		$ff['ver']=$messages->ver;
		$ff['effect_name']=json_decode(wb3d_htmldecode2($messages->effect_name),true);
		$ff['open_addons']=explode(",",$messages->open_addons);
		$ff['all_addons']=wp_json_encode($wb3d_addons,true); 
		$ff['date']=$messages->date;
		$wb3d_open_addons=explode(",",$messages->open_addons);
		$wb3d_open_addons_A[0]=explode(",",$messages->open_addons);
		$wb3d_date=$ff['date'];
		$ff['id_ves']=$messages->id_ves;
		
		$ff['wb3d_obj']=json_decode($messages->wb3d_obj);
            $st=1;
		$x=$wpdb->get_row($wpdb->prepare("SELECT id, slider_id, slide_id, layers FROM $wpdb->wb3d_slides WHERE id = %d ",$st),OBJECT );
		$ff['layers0']=json_decode($x->layers);
		$myvariable=$ff['id_ves'];
		$x=$wpdb->get_results($wpdb->prepare("SELECT id, slider_id, slide_id, layers FROM $wpdb->wb3d_slides WHERE slider_id = %s And id>%d ",array($myvariable,$st)),OBJECT );

 
		for($v=0;$v< $wpdb->num_rows;$v++){
			$ff['layers2'][$v]=json_decode(wb3d_htmldecode2($x[$v]->layers));
            }

		$cc[0]=$ff;

		$cc[0]["sub"]=( $wpdb->get_results($wpdb->prepare("SELECT id,id_ves,name FROM $wpdb->wb3d_setting WHERE id>%d ",$st), OBJECT));
		$anothers=json_decode($messages->wb3d_obj);
		$i= count($anothers);

		for($b=0;$b<$i;$b++){
			$id=$anothers[$b];
 
			$messages= $wpdb->get_row($wpdb->prepare("SELECT id, ver, id_ves, name, effect_name, effect_color, thumbnail, setting, css, html, event, effects, color, wb3d_obj, layerstext, open_addons, date FROM $wpdb->wb3d_setting WHERE id_ves =  %s ",$id), OBJECT,0);


                  if($messages==""){
                        echo "<br><br><br><br><br>Object Not Found : ".esc_html($id);
                        die();
                  }
			$bb['setting']=json_decode($messages->setting,true);
			$wb3d_open_addons_A[$b+1]=explode(",",$messages->open_addons);
			$bb['effects2']=json_decode($messages->effects,true);
			$bb['color2']=json_decode($messages->color,true);
			$bb['effect_color']=json_decode($messages->effect_color,true);
			$bb['html2']=wb3d_htmldecode2($messages->html);
			$bb['event']=$messages->event;
			$bb['css2']=wb3d_htmldecode2($messages->css);
			$bb['id_ves']=$messages->id_ves;
			$bb['ver']=$messages->ver;
			$bb['effect_name']=json_decode(wb3d_htmldecode2($messages->effect_name),true);
                  $bb['open_addons']=explode(",",$messages->open_addons);

			$x=$wpdb->get_results($wpdb->prepare("SELECT id, slider_id, slide_id, layers FROM $wpdb->wb3d_slides WHERE slider_id = %s  ",$bb['id_ves']),OBJECT );

			
			for($v=0;$v< $wpdb->num_rows;$v++){
				$bb['layers2'][$v]=json_decode(wb3d_htmldecode2($x[$v]->layers));
                  }
			$cc[$b+1]=$bb;
		}
		$max_slider=count($cc);
		$wb3d_max=count($cc);
		
		for( $wn=0;$wn<$max_slider;$wn++){
                  $wb3d_sn[$wn]=$cc[$wn]['id_ves'];
                  $wb3d_dataslide[$wb3d_sn[$wn]]=json_decode(wp_json_encode($cc[$wn]['layers2']),true);
                  $wb3d_setting[$wb3d_sn[$wn]]=json_decode(wp_json_encode($cc[$wn]['setting']),true);
		}//for
		$max=count( $wb3d_open_addons_A[0] );
		$index=$max;
		for ($i=1;$i< $wb3d_max;$i++) {
			for ($s=0;$s< count( $wb3d_open_addons_A[$i] );$s++) {
				$flag=0;
				for ($j=0;$j< count( $wb3d_open_addons_A[0] );$j++) {
					if($wb3d_open_addons_A[0][$j]==$wb3d_open_addons_A[$i][$s]){
						$flag=1;
					}
					if($j==(count( $wb3d_open_addons_A[0] )-1  )&&$flag==0 ){
						$wb3d_open_addons_A[0][$index]=$wb3d_open_addons_A[$i][$s];
						$index++;
					}
					if($j==(count( $wb3d_open_addons_A[0] )-1  )&&$flag==0 ){
						$wb3d_open_addons_A[0][$index]=$wb3d_open_addons_A[$i][$s];
						$index++;
					}
				}
			}
		}


            for ($i=0;$i< count( $wb3d_open_addons_A[0] );$i++) {
                  $flag=0;
                  	if (is_dir(wb3d_DIR.'modules/'.$wb3d_open_addons_A[0][$i])){ 
                              $flag=1;
                        }
                        //////////////////////////////////Pro////////////////////////
	                  else if ((is_dir(wb3d_DIR_Pro.'modules/'.$wb3d_open_addons_A[0][$i]))&&$wb3d_pro==1){ 
                        	$flag=1;
                  	}
                        
                        //////////////////////////////////////////////////////////////
                        if($wb3d_open_addons_A[0][$i]=="effectservice"){
                        	$wb3d_effectservice=1;
                        }
                  if($wb3d_open_addons_A[0][$i]=='img'){
                        $flag=1;
                  }
                  if($flag==0){
                        echo '<br><br><br>Folder/Module '.esc_html($wb3d_open_addons_A[0][$i]).' Not Exist';
                        die();
                  }
            }
            if($wb3d_effectservice==1){
            	if ( function_exists( 'wb3d_create_effectservice' ) ) {
            		wb3d_create_effectservice();
            	}
            }

            if($main_demo=="view"){
			for ($i=0;$i<count($wb3d_open_addons_A[0]);$i++) {
				if ((is_dir(wb3d_DIR.'modules/'.$wb3d_open_addons_A[0][$i])&&$wb3d_open_addons_A[0][$i]!="")){ 
					require wb3d_DIR.'modules/'.$wb3d_open_addons_A[0][$i].'/view/index.php';
				}
				else if ((is_dir(wb3d_DIR_Pro.'modules/'.$wb3d_open_addons_A[0][$i])&&$wb3d_open_addons_A[0][$i]!=""&&$wb3d_pro==1)){ 
					require wb3d_DIR_Pro.'modules/'.$wb3d_open_addons_A[0][$i].'/view/index.php';
				}
			}
		}


		$cc[0]['open_addons']=$wb3d_open_addons_A[0];
		wb3d_first_load($wb3d_sn[0],$cu,0,$main_demo);
		$cc=wp_json_encode($cc,true);
		$cc=json_decode($cc,true);
		$wb3d_js= wp_json_encode($cc,true);
      }
}

if ( ! function_exists( 'wb3d_first_load' ) ) {

	function wb3d_first_load($sn,$cu,$level,$main_demo){

		global $wb3d_html;
		global $wb3d_layers;
		global $wb3d_setting;
		global $wb3d_dataslide;
		$wb3d_html="";

		for( $j=0;$j<$wb3d_setting[$sn]["num"];$j++){
			$f=$wb3d_dataslide[$sn][$j][0]['slide_of_location'];
			$x="los_".$f;
			$wb3d_dataslide[$sn][$j][0][$x]=$j;
			$los[$sn.'-'.$f]=$j;
			$slide_of_location[$sn.'-'.$j]=$f;
			$wb3d_layers[$sn.'-'.$f]=$wb3d_dataslide[$sn][$j][0]['layer'];
			$aa=$wb3d_dataslide[$sn][$j];
			$ls= $wb3d_layers[$sn.'-'.$f];

			$patern='';
                  for( $i=0;$i<$ls;$i++){
                        if($i==0){
                              wb3d_create_slider(0,$cu,$f,$patern,$sn,0,0,0,0,$main_demo);
                        }
                        else{
                              wb3d_createlayer(0,$cu,$sn,$f,$i,$aa,0,0,0,0,$main_demo );
                        }
                  }
			$wb3d_html.='</div>';
		}
	}
}

if ( ! function_exists( 'wb3d_create_id' ) ) {
	function wb3d_create_id($id){
		global $wb3d_php_id_num;
		global $wb3d_php_id;
		global $wb3d_php_ids;
		$wb3d_php_id_num++;
		$wb3d_php_id[$id]=$wb3d_php_id_num;
		$wb3d_php_ids[$wb3d_php_id_num]=$id;
		return $wb3d_php_id[$id];
	}
}

if ( ! function_exists( 'wb3d_create_slider' ) ) {
	function  wb3d_create_slider($level,$cu,$w,$patern,$sn,$w0,$n0,$y0,$A,$main_demo){

		$p="position:absolute;";
		global $wb3d_html;
		if($level==0){
			$w1=wb3d_create_id($cu.'_'.$w);
		}
		else{

			$w1=wb3d_create_id($cu.'_'.$w0.'-'.$n0.'-'.$y0.'-'.$w);
		}

		$overflow1_="overflow2_".$y0;
		$ov2="";

		if($level!=0){
			if(isset($A[$overflow1_])){
				if($A[$overflow1_]==1){
					$ov2="overflow:hidden;";
				}

			}
	
			$cl=' class="wb3d_absolute" ';
		}
		else{
			$cl=' class="wb3d_draggable_s wb3d_absolute" ';
		}


		if($level==0){
			$wb3d_html.='<div '.$cl.' id="wb3dh-'.$w1.'" style="width:100%;height:100%; top:0px;z-index:10;display:none;" >';
            }
		else{
			$wb3d_html.='<div '.$cl.' id="wb3dh-'.$w1.'" style="transform-style: preserve-3d; width:100%;height:100%; top:0px;z-index:10;display:none;overflow:hidden;" >';
            }
	}
}
if ( ! function_exists( 'wb3d_createlayer' ) ) {
	function wb3d_createlayer($level,$cu,$sn,$w,$dlnum,&$aa,$w0,$n0,$y0,$parent,$main_demo){

		global $wb3d_html;
		global $wb3d_layers;
		global $wb3d_element_created;

		if($dlnum==0){
			$ind=0;
            }
		else{
			$ind=$aa[$dlnum]['ind'];
            }

		$B=$aa[ $dlnum  ];
		if($dlnum==0){
			$ind=0;  
			$layer_of_location[$sn.'-'.$w.'-'.$ind]=$ind; 
		}
		else {
			$layer_of_location[$sn.'-'.$w.'-'.$dlnum]=$ind;
		}
		$w3=$aa[$dlnum]['U_P'] ;

		$r=0;
		if($ind!=0){
			for( $r=0;$r<$B['layer_obj'];$r++){
				$modd="obj_num_".$r;
				$T1= "type_".$B[$modd] ;
				if(!isset($B[$T1]))
					$B[$T1]=-1;

				$T= $B[$T1];

      			if(!isset($wb3d_element_created[ $cu.'_'.'0-0-0-'.$w.'-'.$ind.'-'.$B[$modd] ])){
      				$wb3d_element_created[ $cu.'_'.'0-0-0-'.$w.'-'.$ind.'-'.$B[$modd] ]=-1;
                        }

				if(!isset($wb3d_element_created[$cu.'_'.$w0.'-'.$n0.'-'.$y0.'-'.$w.'-'.$ind.'-'.$B[$modd] ])){
					$wb3d_element_created[$cu.'_'.$w0.'-'.$n0.'-'.$y0.'-'.$w.'-'.$ind.'-'.$B[$modd] ]=-1;
                        }

				if($level==0&&$wb3d_element_created[ $cu.'_'.'0-0-0-'.$w.'-'.$ind.'-'.$B[$modd] ]!=1&&($parent==$w3||$parent==explode("-",$w3)[0]) )
				{
					$wb3d_element_created[$cu.'_'. '0-0-0-'.$w.'-'.$ind.'-'.$B[$modd] ]=1;
					wb3d_createobjects($level,$cu,$w,$ind,$B[$modd],"new",$sn,$w,$ind,$B[$modd],0,$B,$B,0,$r,$dlnum,$aa,$main_demo);
				}
				else if($level!=0&&$T!='wb3d'&& $wb3d_element_created[$cu.'_'.$w0.'-'.$n0.'-'.$y0.'-'.$w.'-'.$ind.'-'.$B[$modd] ]!=1&&($parent==0||$parent==explode("-",$w3)[0])){
					$wb3d_element_created[$cu.'_'.$w0.'-'.$n0.'-'.$y0.'-'.$w.'-'.$ind.'-'.$B[$modd] ]=1;
					wb3d_createobjects($level,$cu,$w,$ind,$B[$modd],"new",$sn,$w0,$n0,$y0,0,$B,$B,0,$r,$dlnum,$aa,$main_demo);
				}
			}
            }
		return 0;           
	}//enid function
}

if ( (! function_exists( 'wb3d_htmldecode2' ))&&$wb3d_pro==0 ) {
	function wb3d_htmldecode2($data){
		return $data;
	}
}





if ( ! function_exists( 'wb3d_createobjects' ) ) {
	function wb3d_createobjects($level,$cu,$w,$name,$y,$flag,$sn,$w_0,$name_0,$y_0,$type1,$A,$B,$parent,$r,$dlnum,$aa,$main_demo){
		global $wb3d_html;
		global $wb3d_setting;
		global $wb3d_dataslide;
		global $wb3d_layers;
		$p="position:absolute;";
		$T= "type_obj-".$y ;
		$T= $B[$T];
		$T1= "type_".$y ;
		$T1= $B[$T1];
		if($level==0){
			$idm=$w.'-'.$name.'-'.$y;
            }
		else{
			$idm=$w_0.'-'.$name_0.'-'.$y_0.'-'.$w.'-'.$name.'-'.$y;
		}


		$idm=wb3d_create_id($cu.'_'.$idm);
		$index1="type_obj-".$y;
		$func1="wb3d_create_".$B[$index1];

		$ov="overflow";
		if($B[$ov]!=1){
			$ov="overflow:hidden;";
		}
		else{
			$ov="";
		}


		$ov2="overflow2";
		if($B[$ov2]!=1){
			$ov2="overflow:hidden;";
		}
		else{
			$ov2="";
		}

	      $textx="";
	      if($level===0&&$main_demo==="main"){
	      	$ov="";
	            $textx=wb3d_button_textx(wb3d_plagin_images_URL,$idm);
	      }
		$func1="wb3d_create_".$B[$index1];
		$tag1='div';
		$tag2='div';
		if($main_demo!="main"){
		      $tags=wb3d_set_tag($B,$y);
		      $tag1=$tags[0];
		      $tag2=$tags[1];
		}
		$c="";

		if($level===0){
			$c="wb3d_draggable";
		}
		$relative="relative_".$y;
		if( !isset($B[$relative])){
			$B[$relative]=0;
		}


		if($B[$index1]=='ajaxwb3d'){
			$wb3d_html.='<div class="wb3d_absolute wb3d_draggable_a" id="wb3dg-'.$idm.'" style="'.$ov.'">'.$textx;
			$wb3d_html.='<div class="wb3d_absolute" id="wb3df-'.$idm.'"  style="top:0px;left:0px; height:100%;width:100%;overflow:hidden;">';
			$wb3d_html.='<div class="wb3d_absolute" id="wb3de-'.$idm.'" >';
			$func1($level,$cu,$sn,$idm,$B,$T,$w,$name,$y,$dlnum,$aa,$w_0,$name_0,$y_0);
		}
		else{
			if($B[$relative]==2)
				$wb3d_html.='<div id="wb3dg-'.$idm.'" style="'.$ov.';position:relative;">'.$textx;
			else
				$wb3d_html.='<div class="wb3d_absolute '. $c.'" id="wb3dg-'.$idm.'" style="'.$ov.'">'.$textx;
			$wb3d_html.='<div class="wb3d_absolute" id="wb3df-'.$idm.'" style="top:0px;left:0px; height:100%;width:100%;">';
			$wb3d_html.='<'.$tag1.' class="wb3d_absolute"  id="wb3de-'.$idm.'" style="'.$ov2.'">';
			$func1($level,$cu,$sn,$idm,$B,$T,$w,$name,$y,$dlnum,$aa,$w_0,$name_0,$y_0);
		}
		
		if($B[$index1]=='ajaxwb3d'){
			$wb3d_html.='</div></div></div>';
		}
		else{
			$wb3d_html.='</'.$tag2.'></div></div>';
		}
	}
}
if ( ! function_exists( 'wb3d_button_textx' ) ) {
	function wb3d_button_textx($ES_plagin_pic_URL,$idm){  
		$p="position:absolute;";
		$c1='<img alt="" class="move" src="'.$ES_plagin_pic_URL.'au.png" id="l_t-'.$idm.'" style="'.$p;
		$c2='<img alt="" class="move" src="'.$ES_plagin_pic_URL.'au.png" id="l_u-'.$idm.'" style="'.$p;
		$c3='<img alt="" class="move" src="'.$ES_plagin_pic_URL.'au.png" id="r_t-'.$idm.'" style="'.$p;
		$c4='<img alt="" class="move" src="'.$ES_plagin_pic_URL.'au.png" id="r_u-'.$idm.'" style="'.$p;
		$cp='<img title="Edit Layer" class="pen wb3d_pointer" src="'.$ES_plagin_pic_URL.'pen.png" id="pen-'.$idm.'" style="'.$p;
		$cc='<img title="Edit Content" class="pen2 wb3d_pointer" src="'.$ES_plagin_pic_URL.'pen2.png" id="pen2-'.$idm.'" style="'.$p;
		$d='border:1px black solid;width:20px;height:20px;display:none"/>';
		$dp='background-color: #ccc;width:20px;height:20px;"/>';
		$dc='background-color: #ccc;width:20px;height:20px;"/>';
		$textx=$c1.$d;
		$textx.=$c2.$d;
		$textx.=$c3.$d;
		$textx.=$c4.$d;
		$textx.=$cp.$dp;
		$textx.=$cc.$dc;
		return $textx;
	}
}
?>
