<?php
/*
es-custom-fields-interface
es_cfi_class
Author: Enzo Sforna
This file is released under GPL
Last update 30/01/2010
Vers. 3.20

****************************

This file is derived from "Custom Field Gui Utility"
Copyright (c)	2005 Joshua Sigar
Licensed under the MIT License:
Customize:	 Tomohiro Okuwaki (http://www.tinybeans.net/blog/)
	Last update: 2009-07-10
*/

class es_custom_fields_interface {
	
	
	function es_categories($currentcat=0, $currentparent=0, $parent=0, $level=0, $categories=0) {
		static $values,$labels,$levels,$separ;
		if (!$categories){
			$args=array('hide_empty'=>0);
			$categories=get_categories($args);
			$values='';$labels='';$levels='';$separ='';
		}
		
		if ($categories) {
			foreach ($categories as $category) {
				if ( $currentcat != $category->term_id && $parent == $category->parent) {
					$category->name = esc_html( $category->name);
					$values.=$separ.$category->term_id;
					$cc=$category->category_count;if($cc){$cc=' ('.$cc.')';}else{$cc='';}
					$labels.=$separ.$category->name.$cc;
					$levels.=$separ.$level;
					$separ='#';
				//if($currentparent==$category->term_id){...;}
					es_custom_fields_interface::es_categories($currentcat, $currentparent, $category->term_id, $level +1, $categories);
				}
			}
			}else{
			return '';
		}
		$myvalues=array('values'=>$values,'labels'=>$labels,'levels'=>$levels);
		return $myvalues;
	}
	
	
	function sanitize_name($name){
		$name = sanitize_title($name); // taken from WP's wp-includes/functions-formatting.php
		$name = str_replace('-', '_', $name);
		return $name;
	}
	
	
	function get_custom_fields(){
		$file = dirname(__FILE__) . '/config.txt';
		if (!file_exists($file))
			return null;
		$custom_fields = parse_ini_file($file, true);
		return $custom_fields;
	}
	
	
	function set_style($style){//checkbox radio
		$style_out='';
		switch ($style) {
			case 'i':case 'inline':
			$style_out.='>';
			break;
			case 'e':case 'extended':
			$style_out.=' style="height:auto!important;">';
			break;
			default://'s' oppure 'scroll' oppure altezza max in px
			if (!is_numeric($style)){$style=128;}
			$style_out.=' style="height:'.$style.'px!important;overflow:auto;">';//max-height
		}
		return $style_out;
	}
	
	
	function set_color($color){
		switch ($color) {
			case 'red':case 'green':case 'blue':case 'yellow':case 'aqua':case 'fuchsia':
				$color_out = 'es_'.$color;
			break;
			default:
				$color_out = 'es_gray';
		}
		return $color_out;
	}
	
	
	function make_textfield($name, $label, $help, $required, $default, $size, $indexchild){
		if ($size<1){$size=32;};
		$title = $name;
		$name = 'es_' . es_custom_fields_interface::sanitize_name($name);
		if(isset($_REQUEST['post'])){
			$value = get_post_meta($_REQUEST['post'], $title);
			$value = $value[0];
		}
	if ($required){$required = ' required';}else{$required = '';}
		if ($value){
			$value = attribute_escape($value);
			}else{
			$value = $default;
		}
		$out='<div class="postbox textfield'.$required.'" id="es_'.$name.'">';
		if ($indexchild) {
			$out.='<label  for="'.$name.'" class="multi_item'.$required.'" title="'.$help.'">'.
			'<input class="data" id="'.$name.'" name="'.$name.'" value="'.$value.'" type="text" size="'.$size.'" title="'.$help.'" />'.
			'<span title="Campo richiesto" class="img_required"> </span>'.
			'<span class="help">'.$label.'</span></label></div>';
			}else{
			$out.='<label  for="'.$name.'" class="cf_title" title="'.$help.'">'.$label.'</label>'.
			'<div class="inside">'.
			'<p>'.
			'<input class="data" id="'.$name.'" name="'.$name.'" value="'.$value.'" type="text" size="'.$size.'" title="'.$label.'" /></p>'.
			'<span title="Campo richiesto" class="img_required"> </span>'.
			'<p>'.$help.'</p></div></div>';
		}
		return $out;
	}
	
	
	function make_datefield($name, $label, $help, $required, $default, $size, $indexchild){
	if ($size<1){$size=10;}
		$title = $name;
		$name = 'es_' . es_custom_fields_interface::sanitize_name($name);
		if(isset($_REQUEST['post'])){
			$value = get_post_meta($_REQUEST['post'], $title);
			$value = $value[0];
		}
	if ($required){$required = ' required';}else{$required = '';}
		if ($value){
			$value = attribute_escape($value);
			}else{
			$value = $default;
		}
		if ($value){
			$array = explode("-", $value);
			$format_value = $array[2]."/".$array[1]."/".$array[0];//data in italiano dd/mm/yyyy
		}
		$out='<div class="postbox datefield'.$required.'" id="es_'.$name.'">';
		if ($indexchild){
			$out.='<label for="format_'.$name.'" class="multi_item'.$required.'" title="'.$help.'">'.
			'<input class="date_input" id="format_'.$name.'" name="format_'.$name.'" value="'.$format_value.'" type="text" size="'.$size.'" title="'.$help.'" />'.
			'<span title="Campo richiesto" class="img_required"> </span>'.
			'<span class="help">'.$label.'</span></label>'.
			'&nbsp;&nbsp;&nbsp;<input class="data" readonly="readonly" id="'.$name.'" name="'.$name .'" value="'.$value.'" type="text" size="'.$size.'" title="Data in formato ISO: AAAA-MM-GG" /></p><br /></div>';
			}else{
			$out.='<label  for="'.$name.'" class="cf_title" title="'.$help.'">'.$label.'</label>'.
			'<div class="inside">' .
			'<p>'.
			'<input  class="date_input" id="format_'.$name.'" name="format_'.$name.'" value="'.$format_value.'" type="text" size="'.$size.'" title="'.$default.'" />'.
			'<span title="Campo richiesto" class="img_required"> </span>'.
			'Formato ISO: <input class="data" readonly="readonly" id="' . $name . '" name="' . $name . '" value="' . $value . '" type="text" size="'. $size . '" title="' . $default . '" /></p>' .
			'<p>'.$help.'</p></div></div>';
		}
		return $out;
	}
	
	
	function make_imagefield($name, $label, $help, $required, $size, $indexchild){
	if ($size<1){$size=32;}
		$title = $name;
		$name = 'es_' . es_custom_fields_interface::sanitize_name($name);
		if(isset($_REQUEST['post'])){
			$value = get_post_meta($_REQUEST['post'], $title);
			$value = $value[ 0 ];
		}
	if ($required){$required = ' required';}else{$required = '';}
		$out='<div class="postbox imf'.$required.'" id="box'.$name.'">';
		if ($indexchild){
			$out.='<div class="inside">'.
			'<p title="'.$help.'" class="imf_media">'.
			'<input title="'.$help.'" class="data" id="'.$name.'" name="'.$name.'" value="'.attribute_escape($value).'" type="text" size="'.$size.'" />'.
			'<img title="Cancella campo" src="" class="imf_clear" width="16" height="16" style="display:none;" />'.
			'<span title="Campo richiesto" class="img_required"> </span>'.		
			'<label  for="'.$name.'" class="help" title="'.$help.'">'.$label.'</label>'.			
			'<span id="thumb_'.$name.'" class="imf_thumb"><a href="#" class="imf_img" rel="facebox"></a></span>'.
			'</p><div class="clone_replace"></div>'.
			'<p>'.$help.'</p></div></div>';
			}else{
			$out.='<label  for="'.$name.'" class="cf_title" title="'.$help.'">'.$label.'</label>'.
			'<div class="inside">'.
			'<p class="imf_media">'.
			'<input class="data" id="'.$name.'" name="'.$name.'" value="'.attribute_escape($value).'" type="text" size="'.$size.'" />'.
			'<span title="Campo richiesto" class="img_required"> </span>'.
			'<img title="Cancella campo" src="" class="imf_clear" width="16" height="16" style="display:none;" />'.
			'<span id="thumb_'.$name.'" class="imf_thumb"><a href="#" class="imf_img" rel="facebox"></a></span></p>'.
			'<div class="clone_replace"></div>'.
			'<p>'.$help.'</p></div></div>';
		}
		return $out;
	}
	
	
	function make_filefield($name, $label, $help, $required, $size, $indexchild){
	if ($size<1){$size=32;}
		$title = $name;
		$name = 'es_' . es_custom_fields_interface::sanitize_name($name);
		if(isset($_REQUEST['post'])){
			$value = get_post_meta($_REQUEST['post'], $title);
			$value = $value[ 0 ];
		}
	if ($required){$required = ' required';}else{$required = '';}
		$out='<div class="postbox imf'.$required.'" id="box'.$name.'">';
		if ($indexchild){
			$out.='<div class="inside">'.
			'<p title="'.$help.'" class="imf_media">'.
			'<input title="'.$help.'" class="data" id="'.$name.'" name="'.$name.'" value="'.attribute_escape($value).'" type="text" size="'.$size.'" />'.
			'<img title="Cancella campo" src="" class="imf_clear" width="16" height="16" style="display:none;" />'.
			'<span title="Campo richiesto" class="img_required"> </span>'.
			'<label  for="'.$name.'" class="help" title="'.$help.'">'.$label.'</label></p>'.
			'<div class="clone_replace"></div>'.
			'<p>'.$help.'</p></div></div>';
			}else{
			$out.='<label  for="'.$name.'" class="cf_title" title="'.$help.'">'.$label.'</label>'.
			'<div class="inside">'.
			'<p class="imf_media">'.
			'<input class="data" id="'.$name.'" name="'.$name.'" value="'.attribute_escape($value).'" type="text" size="'.$size.'" />'.
			'<img src="" class="imf_clear" width="16" height="16" style="display:none;" />'.
			'<span title="Campo richiesto" class="img_required"> </span></p>'.
			'<div class="clone_replace"></div>'.
			'<p>'.$help.'</p></div></div>';
		}
		return $out;
	}
	
	
	function make_checkbox($name, $label, $help, $required, $default, $values, $labels, $style, $levels){
		if ($style=='compact'){$compact=1;$style='scroll';}else{$compact=0;}
		$title = $name;
		$name = 'es_' . es_custom_fields_interface::sanitize_name($name);
		if(isset($_REQUEST['post']))
		{
			$value = get_post_meta($_REQUEST['post'], $title);
			$value = $value[ 0 ];
		}
	if ($required){$required = ' required';}else{$required = '';}
		$out='<div class="postbox multi_checkbox'.$required.'" id="cf_'.$name.'">';
		if ($compact){
			$out.='<label  for="'.$name.'" class="cf_title" title="'.$help.'"><span class="help">'.$label.'</span></label>';			
		}else{
			$out.='<label  for="'.$name.'" class="cf_title" title="'.$help.'">'.$label.'</label>';	
		}		
		$out.='<span title="Campo richiesto" class="img_required"> </span>'.
		'<div class="inside">';
		$out.='<div class="multi_checkbox_list rounded_box"';
		$out.= es_custom_fields_interface::set_style($style);
		$count=0;
		foreach($values as $val)
		{
			$id = $name . '_' . es_custom_fields_interface::sanitize_name($val);
			$option_label= ($labels[$count]) ? $labels[$count] : $val;
			$level=$levels[$count];
			$count += 1;
			$title=$val;
			$out .= '<label for="'.$id.'" class="multi_item pad'.$level.'" title="'.$title.'"><input id="'.$id.'" name="'.$id.'" value="1" type="checkbox" title="'.$title.'" />'.$option_label.'</label>';
			if ($style=='i'||$style=='inline'){}else{$out .= '<br />';}
		}
		$out.='<input class="multi_checkbox_val data" id="'.$name.'" name="'.$name.'" value="'.attribute_escape($value).'" type="text" />'.
		'<span class="multi_checkbox_def">'.$default.'</span></div></div>';
		if(!$compact){$out.='<p>'.$help.'</p>';}
		$out.='</div>';
		return $out;
	}
	
	
	function make_radio($name, $label, $help, $required, $default, $values, $labels, $style, $inside, $levels){
		if ($style=='compact'){$compact=1;$style='scroll';}else{$compact=0;}
		$title = $name;
		$name = 'es_' . es_custom_fields_interface::sanitize_name($name);
		if(isset($_REQUEST['post'])){
			$selected = get_post_meta($_REQUEST['post'], $title);
			$selected = $selected[ 0 ];
			}else{
			$selected = $default;
		}
	if ($required){$required = ' required';}else{$required = '';}
		$out='<div class="postbox radio'.$required.'" id="cf_'.$name.'">';
		if ($compact){
			$out.='<label  for="'.$name.'" class="cf_title" title="'.$help.'"><span class="help">'.$label.'</span></label>';			
		}else{
			$out.='<label  for="'.$name.'" class="cf_title" title="'.$help.'">'.$label.'</label>';
		}		
		$out.='<span title="Campo richiesto" class="img_required"> </span></p>'.
		'<div class="inside">';
		$out.='<div class="multi_checkbox_list rounded_box"';
		$out .= es_custom_fields_interface::set_style($style);
		$count=0;$nchecked=0;
		foreach($values as $val){
			$id = $name . '_' . es_custom_fields_interface::sanitize_name($val);
			$checked=(trim($val)==trim($selected)) ? 'checked="checked"' : '';
			$nchecked += ($checked!='');
			$option_label= ($labels[$count]) ? $labels[$count] : $val;
			$level=$levels[$count];
			$count += 1;
			if (strrchr($option_label,'@')){
				$opt_label=explode('@', $option_label, 2);
				$option_label=$opt_label[0];$indexchild=$opt_label[1];
				if (strrchr($val,'@')){
					$opt_val=explode('@', $val, 2);
					$val=$opt_val[0];$indexchild=$opt_val[1];
				}
			}
			$title=($val!='none') ? $val : $option_label;
			$out.='<label for="'.$id.'" class="multi_item pad'.$level.'" title="'.$title.'">'.
			'<input class="data" id="'.$id.'" name="'.$name.'" value="'.$val.'" '.$checked.' type="radio" title="'.$title.'" />'.$option_label.'</label>';
			if ($indexchild){
				$out.=$inside[$indexchild];$indexchild='';
			}
			if ($style=='i'||$style=='inline'){}else{$out .= '<br />';}
		}
		$out.='</div></div>';
		if(!$compact){$out.='<p>'.$help.'</p>';}
		$out.='</div>';
		$checked = ($nchecked==0) ? 'checked="checked"' : '';$count=1;$input=$out;
		$count=1;
		$out=str_replace('value="none" ', 'value="" '.$checked, $input, $count);
		return $out;
	}
	
	
	function make_select($name, $label, $help, $required, $default, $values, $labels, $style, $indexchild, $levels){
		if($indexchild){$style=='compact';}
		if ($style=='compact'){$compact=1;$style='i';}else{$compact=0;}
		$title = $name;
		$name = 'es_' . es_custom_fields_interface::sanitize_name($name);
		if(isset($_REQUEST['post'])){
			$selected = get_post_meta($_REQUEST['post'], $title);
			$selected = $selected[ 0 ];
			}else{
			$selected = $default;
		}
	if ($required){$required = ' required';}else{$required = '';}
		$out='<div class="postbox select'.$required.'" id="cfi_'.$name.'">';
		if ($compact){
			$out.='<label for="'.$name.'" class="multi_item'.$required.'" title="'.$help.'">';
			}else{
			$out.='<label  for="'.$name.'" class="cf_title" title="'.$help.'">'.$label.'</label>'.
			'<div class="inside">';
		}
		$out .= '<select  id="'.$name.'" name="' . $name . '" title="'.$help.'"';
		if ($style=='i'||$style=='inline'){}else{$out .= ' multiple="multiple"';}
		$out .= es_custom_fields_interface::set_style($style);
		$title='Nessun valore';
		$out.='<option value="" title="'.$title.'">'.$help.'</option>';
		$count=0;
		foreach($values as $val){
			$checked=(trim($val)==trim($selected)) ? ' selected="selected"' : '';
			$option_label=($labels[$count]) ? $labels[$count] : $val;
			$level=$levels[$count];
			$pad = str_repeat( '&nbsp;&nbsp;&nbsp;&nbsp;', $level );//&#8211
			$count += 1;
			$title=($val!='none') ? $val : $option_label;
			$out.='<option class="data" value="'.$val.'" '.$checked.' title="'.$title.'">'.$pad.$option_label.'</option>';
		}
		$out.='</select>';
		$out.='<span title="Campo richiesto" class="img_required"> </span>';
		if ($compact){
			$out.='<span class="help">'.$label.'</span></label><br />';						
			}else{
			$out.='<p>'.$help.'</p></div>';
		}
		$out.='</div>';
		return $out;
	}
	
	
	function make_textarea($name, $label, $help, $required, $rows, $cols, $indexchild){
		if ($rows<1){$rows=4;};
		if ($cols<1){$cols=32;};
		$title = $name;
		$name = 'es_' . es_custom_fields_interface::sanitize_name($name);
		if(isset($_REQUEST['post'])){
			$value = get_post_meta($_REQUEST['post'], $title);
			$value = $value[ 0 ];
		}
	if ($required){$required = ' required';}else{$required = '';}
		$out='<div class="postbox textarea'.$required.'" id="cfi_'.$name.'">';
		if ($indexchild) {
			$out.='<label for="'.$name.'" class="multi_item'.$required.'" title="'.$help.'">'.
			'<textarea class="data" id="'.$name.'" name="'.$name.'" type="textfield" rows="' .$rows. '" cols="' .$cols. '" title="'.$help.'">'.attribute_escape($value).'</textarea>'.
			'<span title="Campo richiesto" class="img_required"> </span>'.
			'<span class="help">'.$label.'</span></label><br /></div>';
			}else{
			$out='<label  for="'.$name.'" class="cf_title" title="'.$help.'">'.$label.'</label>'.
			'<div class="inside">'.
			'<textarea class="data" id="'.$name.'" name="'.$name.'" type="textfield" rows="'.$rows.'" cols="'.$cols.'">'.attribute_escape($value).'</textarea>'.
			'<span title="Campo richiesto" class="img_required"> </span>'.
			'<p>'.$help.'</p></div></div>';
		}
		return $out;
	}
	
	
	function make_fieldset($label, $help, $color, $style){
		static $nfieldset;
		$out='';
		if ($nfieldset>0){
			$out.='</fieldset>';
			$nfieldset -= 1;
		}
		if ($label){
			$out .= '<fieldset class="rounded_box ';
			$out .= es_custom_fields_interface::set_color($color);
			if ($style=='compact'){
				$out .= '"><legend title="'.$help.'"><span class="help_fieldset">'.$label.'</span></legend>';			
			}else{
				$out .= '"><legend>'.$label.'</legend>';			
				$out .= '<p class="cf_title">'.$help.'</p><br />';
			}		
		
			$nfieldset += 1;
		}
		return $out;
	}
	
	
	function insert_gui(){
		$fields = es_custom_fields_interface::get_custom_fields();
		if($fields == null)
			return;
		$out = '<input type="hidden" name="custom_fields_interface-verify-key" id="custom_fields_interface-verify-key"
		value="' . wp_create_nonce('custom_fields_interface') . '" />';
		$myPage=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
		$nfieldset=0;
		foreach($fields as $title => $data){
			switch ($data['page']){
				case "post":
				if ($myPage=='post.php'||$myPage=='post-new.php'){
					$myFlag=true;
					}else{$myFlag=false;
				}
				break;
				case "page":
				if ($myPage=='page.php'||$myPage=='page-new.php'){
					$myFlag=true;
					}else{$myFlag=false;
				}
				break;
				default:
				$myFlag=true;
				break;
			}
			if ($myFlag==true){
				$indexchild=$data['parent'];
				if($indexchild){
					$compact=$indexchild;
					}else{
					$compact=($data['style']=='compact');
				}
				
				
				switch ($data['values']){
					case 'categories':
					//$tags=get_categories(array('hide_empty'=>0,'number'=>'0','orderby'=>'ID','order'=>'ASC'));//term_id slug name parent
					$values='';$labels='';$levels='';$separ='';
					$myvalues=es_custom_fields_interface::es_categories($currentcat=0, $currentparent=0, $parent=0, $level=0, $categories=0);
					$values=$myvalues['values'];$labels=$myvalues['labels'];$levels=$myvalues['levels'];
					$nonelabel='Nessuna';
					break;
					case 'pages':
					$tags=get_pages(array('order'=>'ASC'));
					$values='';$labels='';$levels='';$separ='';
					foreach ((array) $tags as $tag){
						$values.=$separ.$tag->ID;//post_name;
						$labels.=$separ.$tag->post_title;
						$separ='#';
					}
					$nonelabel='Nessuna';
					break;
					case 'posts':
					$tags=get_posts(array('orderby'=>'date','order'=>'DESC','numberposts'=>16));//'category_name'=>'eventi'
					$values='';$labels='';$levels='';$separ='';
					foreach ((array) $tags as $tag){
						$values.=$separ.$tag->ID;//post_name;
						$labels.=$separ.$tag->post_title;
						$separ='#';
					}
					$nonelabel='Nessuno';
					break;
					case 'tags':
					$tags=get_tags(array('order'=>'ASC'));
					$values='';$labels='';$levels='';$separ='';
					foreach ((array) $tags as $tag){
						$values.=$separ.$tag->term_id;//slug;
						$labels.=$separ.$tag->name;
						$separ='#';
					}
					$nonelabel='Nessuno';
					break;
					default:
				}
				
				switch ($data['values']){
					case 'categories':case 'pages':case 'posts':case 'tags':
					if($data['type']=='radio'){
						$separ='#';
						$values='none'.$separ.$values;
						$labels=$nonelabel.$separ.$labels;
						$levels='0'.$separ.$levels;
					}
					$data['values']=$values;
					$data['labels']=$labels;
					$data['levels']=$levels;
					default:
				}
				
				switch ($data['type']){
					case 'textfield':
					$tmp= es_custom_fields_interface::make_textfield($title, $data['label'], $data['help'], $data['required'], $data['default'], $data['size'], $compact);
					break;
					case 'datefield':
					$tmp = es_custom_fields_interface::make_datefield($title, $data['label'], $data['help'], $data['required'], $data['default'], $data['size'], $compact);
					break;
					case 'imagefield':
					$tmp = es_custom_fields_interface::make_imagefield($title, $data['label'], $data['help'], $data['required'], $data['size'], $compact);
					break;
					case 'filefield':
					$tmp = es_custom_fields_interface::make_filefield($title, $data['label'], $data['help'], $data['required'], $data['size'], $compact);
					break;
					case 'checkbox':
					$tmp = es_custom_fields_interface::make_checkbox($title, $data['label'], $data['help'], $data['required'], $data['default'], explode('#', $data['values']), explode('#', $data['labels']), $data['style'], explode('#',$data['levels']));
					break;
					case 'radio':
					$tmp = es_custom_fields_interface::make_radio($title, $data['label'], $data['help'], $data['required'], $data['default'], explode('#', $data['values']), explode('#', $data['labels']), $data['style'], $inside,explode('#',$data['levels']));
					break;
					case 'select':
					$tmp = es_custom_fields_interface::make_select($title, $data['label'], $data['help'], $data['required'], $data['default'], explode('#', $data['values']), explode('#', $data['labels']), $data['style'], $compact, explode('#',$data['levels']));
					break;
					case 'textarea':
					$tmp =	es_custom_fields_interface::make_textarea($title, $data['label'], $data['help'], $data['required'], $data['rows'], $data['cols'], $compact);
					break;
					case 'fieldset':
					$tmp = es_custom_fields_interface::make_fieldset($data['label'], $data['help'], $data['color'], $data['style']);
					break;
					default:
					$tmp = '';
					break;
				}
				if ($indexchild){
					$inside[$indexchild]=$tmp;	
					}else{
					$out .= $tmp;
				}
			}
		}
		$out .= es_custom_fields_interface::make_fieldset('','','','');
		echo $out;
	}
	
	
	function edit_meta_value($id){
		global $wpdb;
		if(!isset($id))
			$id = $_REQUEST['post_ID'];
		if(!current_user_can('edit_post', $id))
			return $id;
		if(!wp_verify_nonce($_REQUEST['custom_fields_interface-verify-key'], 'custom_fields_interface'))
			return $id;
		$fields = es_custom_fields_interface::get_custom_fields();
		if ($fields == null)
			return;
		foreach($fields as $title	=> $data){
			$name = 'es_' . es_custom_fields_interface::sanitize_name($title);
			$title = $wpdb->escape(stripslashes(trim($title)));
			$meta_value = stripslashes(trim($_REQUEST[ "$name" ]));
			if(isset($meta_value) && !empty($meta_value)){
				delete_post_meta($id, $title);
				if($data['type']=='textfield'||$data['type']=='checkbox'||$data['type']=='radio'||$data['type']=='select'||$data['type']=='multiselect'||$data['type']=='tags_list'||$data['type']=='textarea'||$data['type']=='filefield'||$data['type']=='datefield'||$data['type']=='imagefield')
				{
					add_post_meta($id, $title, $meta_value);
				}
				}else{
				delete_post_meta($id, $title);
			}
		}
	}
}
?>
