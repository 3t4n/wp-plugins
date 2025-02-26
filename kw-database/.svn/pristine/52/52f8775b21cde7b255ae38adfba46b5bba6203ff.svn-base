<?php 
/*
Plugin Name: Kw DATA Save
Plugin URI: http://kwark.allwebtuts.net
Description: DATA SAVE plugin for Wordpress with cleanup options for revisions, spams and erase old options from old installation plugin
Author: Laurent (KwarK) Bertrand
Version: 1.0
Author URI: http://kwark.allwebtuts.net
*/

/*  
	Copyright 2011  Laurent (KwarK) Bertrand  (email : http://kwark@allwebtuts.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

//WORDPRESS API

// Enable internationalisation

load_plugin_textdomain( 'kw-data', false, dirname( plugin_basename( __FILE__ ) ) . '/langue/' );

// Database Manager Menu

add_action('admin_menu', 'database_menu');

//CSS admin
   
wp_enqueue_style( 'kw-data-css', plugins_url( '/kw-database/css/admin-style.css' ) );


function database_menu() {
	
	add_menu_page('DATA save', 'DATA save', 'manage_options', 'options.php');
	add_submenu_page('options.php', 'DATA options', __('DATA menu'), 'manage_options', 'options.php', 'kw_do_page_options');
	add_submenu_page('options.php', 'DATA options', __('DATA liste dossiers'), 'manage_options', 'gestionfolder.php', 'kw_do_page_folder');
	add_submenu_page('options.php', 'DATA options', __('DATA liste des dump'), 'manage_options', 'gestionfile.php', 'kw_do_page_file');
	add_submenu_page('options.php', 'DATA options', __('Sauvegarder dossier !'), 'manage_options', 'sauvegarde.php', 'kw_do_page_server');
	add_submenu_page('options.php', 'DATA options', __('Sauvegarder dump !'), 'manage_options', 'compress.php', 'kw_do_page_backup');
	add_submenu_page('options.php', 'DATA options', __('Nettoyer les options !'), 'manage_options', 'deloptions.php', 'kw_do_page_clean_options');
	add_submenu_page('options.php', 'DATA options', __('Nettoyer r&eacute;visions !'), 'manage_options', 'delrevisions.php', 'kw_do_page_clean_revisions');
	add_submenu_page('options.php', 'DATA options', __('Nettoyer les spams !'), 'manage_options', 'delspams.php', 'kw_do_page_clean_spams');
	
}
 
function kw_do_page_folder(){
	require_once(dirname(__FILE__).'/gestionfolder.php');
	}
function kw_do_page_file(){
	require_once(dirname(__FILE__).'/gestionfile.php');
	}
function kw_do_page_server(){
	require_once(dirname(__FILE__).'/sauvegarde.php');
	}
function kw_do_page_backup(){
	require_once(dirname(__FILE__).'/compress.php');
	}
function kw_do_page_clean_options(){
	require_once(dirname(__FILE__).'/deloptions.php');
	}
function kw_do_page_clean_revisions(){
	require_once(dirname(__FILE__).'/delrevisions.php');
	}
function kw_do_page_clean_spams(){
	require_once(dirname(__FILE__).'/delspams.php');
	}
	
function kw_do_page_options() {
	
	//START options page
	
	require_once(dirname(__FILE__).'/config.php');
	require_once(dirname(__FILE__).'/admin.php');
	
if(isset($_POST['submitted']) == "yes"){
		
	update_option('prefix', $_POST['prefix']);
	update_option('timescript', $_POST['timescript']);
	
	echo "<div id=\"message\" class=\"updated fade\"><p><strong>";
	echo _e("Options sauvegard&eacute;es.", "kw-data" );
	echo "</strong></p></div>";
	}
  	echo '<div id="message" class="updated fade"><p><strong>';
	echo _e("Accueil", "kw-data" );
	echo '</strong></p></div>';
	?>

    <form method="post" name="kw_data_admin" target="_self">
      <div style="Display: block; height: 15px; width: 100%;"></div>
      <table class="form-table">
       </tr>
      <tr valign="top">
        <th scope="row"><?php _e("Time script en seconde", "kw-data" ) ?></th>
        <td><input type='text' style="width:125px;"  maxlength="20" name='timescript' id="timescript" value="<?php echo get_option("timescript"); ?>" />
        <span>
        <input name="submitted" type="hidden" value="yes" />
        <input type="submit" name="Submit" value="<?php echo _e("Mettre &agrave; jour", "kw-data" ); ?> &raquo;" />&nbsp;<?php echo _e("Certains h&eacute;bergeurs limitent l'activit&eacute; possible d'un script, valeur la plus populaire (30 sec) par d&eacute;faut. La v&ocirc;tre", "kw-data" ); ?> > <?php $limitation = ini_get('max_execution_time'); echo "<span style=\"color:red\"> ".$limitation."</span>"; echo "&nbsp;sec"; ?>
        </span>
          </td>
      </tr>
      <tr valign="top">
        <th scope="row">DB Prefix</th>
        <td><input type='text' style="width:125px;"  maxlength="20" name='prefix' id="prefix" value="<?php echo get_option("prefix"); ?>" />
        <span>
        <input name="submitted" type="hidden" value="yes" />
        <input type="submit" name="Submit" value="<?php echo _e("Mettre &agrave; jour", "kw-data" ); ?> &raquo;" />&nbsp;<?php echo _e("D&eacute;finissez le pr&eacute;fix de vos tables (ex: wp_ le plus populaire sous Wordpress), n&eacute;cessaire pour les options de nettoyage", "kw-data" ); ?>
      </span>
          </td>
          </tr>
      </table>
      <div style="Display: block; height: 15px; width: 100%;"></div>
    </form>
<?php } //END Options page ?>