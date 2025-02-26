<?php
/*
Plugin Name: arkavis sidebar
Plugin URI: http://www.arkavis.de/wordpress
Description: Automatisch neue Spiele für Deine Seitenleiste
Version: 1.2
Author: arkavis.de
Author URI: http://www.arkavis.de
*/

if(!function_exists('init_arkavis_sidebar_plugin')){
  function init_arkavis_sidebar_plugin(){

    function get_embed_code($site_id, $width, $height, $games_displayed, $games_total, $games_mode, $games_selection)
	{
		if (!$site_id){ $site_id = "1";}
		if (!$width){ $width = "290";}
		if (!$height){ $height = "540";}
		if (!$games_displayed){ $games_displayed = "5";}
		if (!$games_total){ $games_total = "15";}
		if (!$games_mode){ $games_mode = "IN_BROWSER_POP_UP";}
		if (!$games_selection){ $games_selection = "NEWEST";}
		
		$games = strtolower($games_selection);
		
      	return "<script id=\"arkavis_embed_worpress_plugin\" src=\"http://arkavis.heroku.com/assets/embed.js\" site=\"$site_id\"  widget=\"sidebar\" type=\"text/javascript\" games-mode=\"$games_mode\" width=\"$width\" height=\"$height\" games-displayed=\"$games_displayed\" games-total=\"$games_total\" games=\"$games\" ></script>";
    }

    function add_arkavis_widget_to_sidebar($args) {
    	$site_id = trim(get_option('arkavis_site_id'));
	  	$width = trim(get_option('arkavis_width'));
	  	$height = trim(get_option('arkavis_height'));
	  	$games_displayed = get_option('arkavis_games_displayed');
	  	$games_total = get_option('arkavis_games_total');
    	$games_mode = get_option('arkavis_games_mode');
    	$games_selection = get_option('arkavis_games_selection');

      	$sidebar_widget = get_embed_code($site_id, $width, $height, $games_displayed, $games_total, $games_mode, $games_selection);
      	extract($args);
    ?>
		<?php echo $before_widget; ?>
		<?php echo $sidebar_widget; ?>
		<?php echo $after_widget; ?>
    <?php
    }

    function arkavis_menu() {
        add_options_page('arkavis Einstellungen', 'arkavis Seitenleiste', 4, __FILE__, 'arkavis_plugin_options');
    }

    function arkavis_plugin_options() {
        $site_id = get_option('arkavis_site_id');
	    $width = get_option('arkavis_width');
	    $height = get_option('arkavis_height');
	    $games_displayed = get_option('arkavis_games_displayed');
	    $games_total = get_option('arkavis_games_total');
	    $games_mode = get_option('arkavis_games_mode');
	    $games_selection = get_option('arkavis_games_selection');

		if (!$site_id){ $site_id = "1";}
		if (!$width){ $width = "290";}
		if (!$height){ $height = "540";}
		if (!$games_displayed){ $games_displayed = "5";}
		if (!$games_total){ $games_total = "15";}
		if (!$games_mode){ $games_mode = "IN_BROWSER_POP_UP";}
		if (!$games_selection){ $games_selection = "NEWEST";}

        echo '<div class="wrap">';
        echo '<h2>arkavis Seitenleisten Plugin</h2>';
        echo '<form method="post" action="options.php">';
        echo wp_nonce_field('update-options');
        echo '<table>';
        echo '<tr valign="top">';
        echo '<td width="150" align="right">Site ID:</td>';
        echo '<td width="400"><input type="text" name="arkavis_site_id" value=" ' . $site_id . '" /><br /><small>Erzeuge Dein eigenes Farbschema und wähle welche Spielearten Dein Widget enthalten soll. Erstelle eine eigene Site ID unter <a href="http://www.arkavis.de/widget-erstellen">http://www.arkavis.de/widget-erstellen</a> und trag sie hier ein.</small></td>';
        echo '</tr>';

        echo '<tr valign="top">';
        echo '<td align="right">Breite:</td>';
        echo '<td><input type="text" name="arkavis_width" value=" ' . $width . '" /></td>';
        echo '</tr>';

        echo '<tr valign="top">';
        echo '<td align="right">Höhe:</td>';
        echo '<td><input type="text" name="arkavis_height" value=" ' . $height . '" /></td>';
        echo '</tr>';

        echo '<tr valign="top">';
        echo '<td align="right">Spiele anzeigen:</td>';
        echo '<td><input type="text" name="arkavis_games_displayed" value=" ' . $games_displayed . '" /></td>';
        echo '</tr>';

        echo '<tr valign="top">';
        echo '<td align="right">Spiele gesamt:</td>';
        echo '<td><input type="text" name="arkavis_games_total" value=" ' . $games_total . '" /></td>';
        echo '</tr>';

        echo '<tr valign="top">';
        echo '<td align="right">Anzeigeart Spiele:</td>';
		echo '<td><select name="arkavis_games_mode" style="width:170px">';
		
		if ($games_mode == "POP_UP") { $games_mode_opt1_selected = "selected"; }
		if ($games_mode == "POP_UP_BIG") { $games_mode_opt2_selected = "selected"; }
		if ($games_mode == "IN_BROWSER_POP_UP") { $games_mode_opt3_selected = "selected"; }
		if ($games_mode == "IN_BROWSER_POP_UP_BIG") { $games_mode_opt4_selected = "selected"; }
		
		echo '<option '.$games_mode_opt1_selected.'>POP_UP</option>';
		echo '<option '.$games_mode_opt2_selected.'>POP_UP_BIG</option>';
		echo '<option '.$games_mode_opt3_selected.'>IN_BROWSER_POP_UP</option>';
		echo '<option '.$games_mode_opt4_selected.'>IN_BROWSER_POP_UP_BIG</option>';
		echo '</select></td>';
        echo '</tr>';

        echo '<tr valign="top">';
        echo '<td align="right">Spiele Auswahl:</td>';
		echo '<td><select name="arkavis_games_selection" style="width:170px">';

		if ($games_selection == "NEWEST") { $games_selection_opt1_selected = "selected"; }
		if ($games_selection == "MOST_PLAYED") { $games_selection_opt2_selected = "selected"; }
		if ($games_selection == "BEST_RATED") { $games_selection_opt3_selected = "selected"; }

		echo '<option '.$games_selection_opt1_selected.'>NEWEST</option>';
		echo '<option '.$games_selection_opt2_selected.'>MOST_PLAYED</option>';
		echo '<option '.$games_selection_opt3_selected.'>BEST_RATED</option>';
		echo '</select></td>';
        echo '</tr>';
        echo '</tr>';


        echo '</table>';
        echo '<input type="hidden" name="action" value="update" />';
        echo '<input type="hidden" name="page_options" value="arkavis_height,arkavis_width,arkavis_games_mode,arkavis_games_selection,arkavis_games_total,arkavis_games_displayed,arkavis_site_id" />';
        echo '<p class="submit">';
        echo '<input class="button-primary" type="submit" name="Submit" value="Speichern" />';
        echo '</p>';
        echo '</form>';

        echo '</div>';
    }

	//register callbacks
    add_action('admin_menu', 'arkavis_menu');

    wp_register_sidebar_widget(
		"arkavis_sidebar_widget_plugin",
		"arkavis Spiele für Seitenleisten", 
		"add_arkavis_widget_to_sidebar",
		array(                  // options
        	'description' => 'Zeigt die neuesten, best-bewertesten oder meist gespielten Spiele in einer Liste. Perfekt für Seitenleisten.'
    	)
	);
  }
}

//add plugin
add_action('widgets_init', 'init_arkavis_sidebar_plugin');
?>
