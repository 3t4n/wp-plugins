<?php /*
Plugin Name:  Fil d'Ariane pour Menu
Plugin URI:   http://whibe.com/
Description:  Cr&eacute;e un fil d'ariane fid&egrave;le au menu parcouru
Version:      0.0.1
Author:       Thomas Faur&eacute;
Author URI:   http://whibe.com/

Copyright (C) 2010, Thomas Faur&eacute;
All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
Neither the name of Joost de Valk or Yoast nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.
THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.*/

// Load some defaults

//exemple de configuration :
// $menu_correspondance_config = array(
		// 'noms'  => array('1'=>'Vie scoute','2'=>'Aventures','3'=>'Scoutmaîtrise'),
		// 'liens' => array('1'=>'27','2'=>'82','3'=>'112'),
		// 'categories' => array('1'=>'1','19'=>'2','22'=>'3'),
	// );
 
if ( ! function_exists( 'determine_menu' ) ) :
function determine_menu($menu_correspondance_config=null) {
	if($menu_correspondance_config == null){
		$menu_correspondance_config = get_menu_configuration_config();
	}
	$menu_id = 0;
	if(is_single() or is_category() ){
		$cat = get_the_category();
		$cat0 = $cat[0];
		$category_ancestor = get_category_ancestor(intval($cat0->cat_ID));
		$menu_correspondance_categories = $menu_correspondance_config['categories'];
		if(array_key_exists($category_ancestor, $menu_correspondance_categories)){
			$menu_id = $menu_correspondance_categories[$category_ancestor];
		} // sinon, $menu_id reste à 0
	}
	elseif (is_page() ) {
		$post_id = 0; // initialisation de la valeur de $post_id
		if ( have_posts() ) : 
			while ( have_posts() ) : the_post();
				// récupération de l'ID dans le Loop
				$post_id = get_the_ID();
			endwhile;
		endif;
		// ancestor est déduit du champ meta 'menu'
		if ( $post_id > 0) {
			$menu_id= get_post_meta($post_id, 'menu', true);
		} // sinon, $menu_id reste à 0
	}
	return $menu_id;
}
endif;
if ( ! function_exists( 'get_menu_configuration_config' ) ) :

function get_menu_configuration_config(){
	$fam_noms_1 = get_option('fam_noms_1');
	$fam_noms_2 = get_option('fam_noms_2');
	$fam_noms_3 = get_option('fam_noms_3');
	$fam_liens_1 = get_option('fam_liens_1');
	$fam_liens_2 = get_option('fam_liens_2');
	$fam_liens_3 = get_option('fam_liens_3');
	$fam_cat_1 = get_option('fam_cat_1');
	$fam_cat_2 = get_option('fam_cat_2');
	$fam_cat_3 = get_option('fam_cat_3');
	if(empty($fam_noms_1)) {
		$fam_noms_1 = 'nom du menu 1';
		update_option('fam_noms_1',$fam_noms_1);
	}
	if(empty($fam_noms_2)) {
		$fam_noms_2 = 'nom du menu 2';
		update_option('fam_noms_2',$fam_noms_2);
	}
	if(empty($fam_noms_3)) {
		$fam_noms_3 = 'nom du menu 3';
		update_option('fam_noms_3',$fam_noms_3);
	}
	if(empty($fam_liens_1)) {
		$fam_liens_1 = '27';
		update_option('fam_liens_1',$fam_liens_1);
	}
	if(empty($fam_liens_2)) {
		$fam_liens_2 = '82';
		update_option('fam_liens_2',$fam_liens_2);
	}
	if(empty($fam_liens_3)) {
		$fam_liens_3 = '112';
		update_option('fam_liens_3',$fam_liens_3);
	}
	if(empty($fam_cat_1)) {
		$fam_cat_1 = '1';
		update_option('fam_cat_1',$fam_cat_1);
	}
	if(empty($fam_cat_2)) {
		$fam_cat_2 = '19';
		update_option('fam_cat_2',$fam_cat_2);
	}
	if(empty($fam_cat_3)) {
		$fam_cat_3 = '22';
		update_option('fam_cat_3',$fam_cat_3);
	}
	return array(
		'noms'  => array('1'=>$fam_noms_1,'2'=>$fam_noms_2,'3'=>$fam_noms_3),
		'liens' => array('1'=>$fam_liens_1,'2'=>$fam_liens_2,'3'=>$fam_liens_3),
		'categories' => array($fam_cat_1=>'1',$fam_cat_2=>'2',$fam_cat_3=>'3'),
	);
	// return $menu_correspondance_config;
}

endif;
if ( ! function_exists( 'fil_ariane_menu' ) ) :

function fil_ariane_menu($menu_correspondance_config) {
	$menu_correspondance_config = get_menu_configuration_config();
	echo '<script>
			jQuery(function($){
				// Pour le menu de droite
				jQuery(".current-menu-parent > a").parent("li").addClass("unparent");
				jQuery(".current-category-ancestor > a").parent("li").addClass("unparent");
				jQuery(".current_page_item > a").parent("li").addClass("unparent");
				jQuery(".current-menu-item > a").parent("li").addClass("unparent");
				jQuery(".unparent").parents("li.menu-item").addClass("unparent");
				
				// pour le fil d\'ariane : 
				jQuery(".current-menu-parent > a").parent("span").addClass("unparent");
				jQuery(".current-category-ancestor > a").parent("span").addClass("unparent");
				jQuery(".current_page_item > a").parent("span").addClass("unparent");
				jQuery(".current-menu-item > a").parent("span").addClass("unparent");
				jQuery(".unparent").parents("span.menu-item").addClass("unparent");
				jQuery(".unparent:first ~ .unparent:first").before("<br/>(et ... ").after(")");
			});
		</script>';


	$menu_id = determine_menu($menu_correspondance_config);
	if($menu_id==0){
		if ( function_exists('yoast_fil_ariane') ) {
			yoast_fil_ariane('<div class="menubreadcrumb"><p id="fil_arianes">','</p></div>');
		}
	}
	else{
		$output = '<div class="menubreadcrumb">Vous &ecirc;tes ici : ';
		$menu_correspondance = $menu_correspondance_config['noms'];
		$menu_correspondance_liens = $menu_correspondance_config['liens'];
		$output .= '<a href="'.get_bloginfo('url').'/">'.get_bloginfo('name').'</a> &raquo; ';
		$output .= '<a href="'.get_bloginfo('url').'/?page_id='.$menu_correspondance_liens[$menu_id].'">'.$menu_correspondance[$menu_id].'</a>';
		echo $output;
		echo str_replace('<li','<span',str_replace('</li>','</span>',str_replace('<ul','<div',str_replace('</ul>','</div>',wp_nav_menu(array('menu' => $menu_correspondance[$menu_id] ,'before'=>' &raquo; ', 'container' => '', 'echo'=>false))))));
		echo '</div>';
	}
}
endif;
add_action('admin_menu', 'add_menu_items');
function add_menu_items(){
	add_options_page('Options du Plugin', 'Fil d\'Ariane Menu', 10, __FILE__, 'fil_ariane_menu_admin_menu');
}
function fil_ariane_menu_admin_menu(){
	if (!empty($_POST['fil_ariane_menu_action'])) {

		$fam_noms_1 = !isset($_POST['fam_noms_1'])   ? 'Nom menu 1' : $_POST['fam_noms_1'];
		$fam_noms_2 = !isset($_POST['fam_noms_2'])   ? 'Nom menu 2' : $_POST['fam_noms_2'];
		$fam_noms_3 = !isset($_POST['fam_noms_3'])   ? 'Nom menu 3' : $_POST['fam_noms_3'];
		$fam_liens_1 = !isset($_POST['fam_liens_1']) ? 'lien menu 1' : $_POST['fam_liens_1'];
		$fam_liens_2 = !isset($_POST['fam_liens_2']) ? 'lien menu 2' : $_POST['fam_liens_2'];
		$fam_liens_3 = !isset($_POST['fam_liens_3']) ? 'lien menu 3' : $_POST['fam_liens_3'];
		$fam_cat_1 = !isset($_POST['fam_cat_1'])     ? 'cat menu 1' : $_POST['fam_cat_1'];
		$fam_cat_2 = !isset($_POST['fam_cat_2'])     ? 'cat menu 2' : $_POST['fam_cat_2'];
		$fam_cat_3 = !isset($_POST['fam_cat_3'])     ? 'cat menu 3' : $_POST['fam_cat_3'];
		                                                                                        
		update_option('fam_noms_1',$fam_noms_1);
		update_option('fam_noms_2',$fam_noms_2);
		update_option('fam_noms_3',$fam_noms_3);
		update_option('fam_liens_1',$fam_liens_1);
		update_option('fam_liens_2',$fam_liens_2);
		update_option('fam_liens_3',$fam_liens_3);
		update_option('fam_cat_1',$fam_cat_1);
		update_option('fam_cat_2',$fam_cat_2);
		update_option('fam_cat_3',$fam_cat_3);
		print('
			<div id="message" class="updated fade">
				<p>'.__('Les options ont &eacute;t&eacute; mises &agrave; jour.', 'Fil_Ariane_Menu').'</p>
			</div>');
	}
	$fam_noms_1 = get_option('fam_noms_1');
	$fam_noms_2 = get_option('fam_noms_2');
	$fam_noms_3 = get_option('fam_noms_3');
	$fam_liens_1 = get_option('fam_liens_1');
	$fam_liens_2 = get_option('fam_liens_2');
	$fam_liens_3 = get_option('fam_liens_3');
	$fam_cat_1 = get_option('fam_cat_1');
	$fam_cat_2 = get_option('fam_cat_2');
	$fam_cat_3 = get_option('fam_cat_3');
	if(empty($fam_noms_1)) {
		$fam_noms_1 = 'nom du menu 1';
		update_option('fam_noms_1',$fam_noms_1);
	}
	if(empty($fam_noms_2)) {
		$fam_noms_2 = 'nom du menu 2';
		update_option('fam_noms_2',$fam_noms_2);
	}
	if(empty($fam_noms_3)) {
		$fam_noms_3 = 'nom du menu 3';
		update_option('fam_noms_3',$fam_noms_3);
	}
	if(empty($fam_liens_1)) {
		$fam_liens_1 = '27';
		update_option('fam_liens_1',$fam_liens_1);
	}
	if(empty($fam_liens_2)) {
		$fam_liens_2 = '82';
		update_option('fam_liens_2',$fam_liens_2);
	}
	if(empty($fam_liens_3)) {
		$fam_liens_3 = '112';
		update_option('fam_liens_3',$fam_liens_3);
	}
	if(empty($fam_cat_1)) {
		$fam_cat_1 = '1';
		update_option('fam_cat_1',$fam_cat_1);
	}
	if(empty($fam_cat_2)) {
		$fam_cat_2 = '19';
		update_option('fam_cat_2',$fam_cat_2);
	}
	if(empty($fam_cat_3)) {
		$fam_cat_3 = '22';
		update_option('fam_cat_3',$fam_cat_3);
	}
	echo '
		<div class="wrap">
			<h2>Fil d\'Ariane pour Menu - Configuration</h2>
			<p>'.htmlentities('On peut configurer au maximum 3 menus. Chaque menu peut contenir des pages et des catégories. Le menu doit avoir une page mère, dont l\'ID est à indiquer. Toutes les catégories présentes dans le menu doivent être raccrochées à une catégorie mère dont l\'ID est également à indiquer.').'</p>
			<form id="fil_ariane_menu_id" name="fil_ariane_menu" action="'.get_bloginfo('wpurl').'/wp-admin/options-general.php?page=fil_ariane_menu/fil_ariane_menu.php" method="post">
				<input type="hidden" name="fil_ariane_menu_action" value="fil_ariane_menu_update_settings" />
				<fieldset class="options">
					<table>
						<tr>
							<td></td>
							<td>'.__('Nom du Menu WP', 'Fil_Ariane_Menu').'</td>
							<td>'.__('ID de la page m&egrave;re', 'Fil_Ariane_Menu').'</td>
							<td>'.__('ID de la Cat&eacute;gorie m&egrave;re', 'Fil_Ariane_Menu').'</td>
						</tr>
						<tr>
							<td>'.__('Menu WP n&ordm;', 'Fil_Ariane_Menu').' 1</td>
							<td><input size="30" name="fam_noms_1" type="text" value="'.$fam_noms_1.'" /></td>
							<td><input size="20" name="fam_liens_1" type="text" value="'.$fam_liens_1.'" /></td>
							<td><input size="20" name="fam_cat_1" type="text" value="'.$fam_cat_1.'" /></td>
						</tr>
						<tr>
							<td>'.__('Menu WP n&ordm;', 'Fil_Ariane_Menu').' 2</td>
							<td><input size="30" name="fam_noms_2" type="text" value="'.$fam_noms_2.'" /></td>
							<td><input size="20" name="fam_liens_2" type="text" value="'.$fam_liens_2.'" /></td>
							<td><input size="20" name="fam_cat_2" type="text" value="'.$fam_cat_2.'" /></td>
						</tr>
						<tr>
							<td>'.__('Menu WP n&ordm;', 'Fil_Ariane_Menu').' 3</td>
							<td><input size="30" name="fam_noms_3" type="text" value="'.$fam_noms_3.'" /></td>
							<td><input size="20" name="fam_liens_3" type="text" value="'.$fam_liens_3.'" /></td>
							<td><input size="20" name="fam_cat_3" type="text" value="'.$fam_cat_3.'" /></td>
						</tr>
					</table>
				</fieldset>
				<p class="submit">
					<input type="submit" name="submit" value="'.__('Mettre &agrave; jour les options', 'Fil_Ariane_Menu').'" />
				</p>
				<h3>Cr&eacute;dits</h3>
				<p><i>Extension cr&eacute;&eacute;e par <a href="mailto:faure.thomas@gmail.com">Thomas Faur&eacute;</a>. Tous droits r&eacute;serv&eacute;s &copy; 2010.</i></p>
		</div>';
}
?>