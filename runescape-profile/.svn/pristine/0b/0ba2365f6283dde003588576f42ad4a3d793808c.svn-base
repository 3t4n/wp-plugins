<?php
/*
    Plugin Name: Runescape Profile
    Plugin URI: http://www.define83.com/resources/plugin/runescapeprofile/
    Description: A plugin to display your Runescapes character information as a widget
    Version: 1.0
    Author: Bradley Moore
    Author URI: http://www.define83.com
*/

function show_profile($args) {
    $options = get_option("rp_options");
    if (!is_array( $options ))
        {
            $options = array(
            'title' => 'My Character',
            'name' => 'Stealth_Ltd',
			'data' => $data
            ); 
        }
    extract($args);
    echo $before_widget;
    echo $before_title . $options['title'] . $after_title;
    //* The fun *//
    $player = $options['data'];
    $stats = str_replace("-1", "Unranked", $player);
    $stats = explode("\n",$stats);
        $skill['Overall']=  explode(",",$stats[0]);
        $skill['Attack'] =     explode(",",$stats[1]);
        $skill['Defence'] =     explode(",",$stats[2]);
        $skill['Strength'] =     explode(",",$stats[3]);
        $skill['Hitpoints'] =      explode(",",$stats[4]);
        $skill['Range'] =   explode(",",$stats[5]);
        $skill['Prayer'] =    explode(",",$stats[6]);
        $skill['Magic'] =    explode(",",$stats[7]);
        $skill['Cooking']=     explode(",",$stats[8]);
        $skill['Woodcutting']=       explode(",",$stats[9]);
        $skill['Flretching']=   explode(",",$stats[10]);
        $skill['Fishing']=     explode(",",$stats[11]);
        $skill['Fire Making']=     explode(",",$stats[12]);
        $skill['Crafting']=    explode(",",$stats[13]);
        $skill['Smithing']=    explode(",",$stats[14]);
        $skill['Mining']=     explode(",",$stats[15]);
        $skill['Herblore']=     explode(",",$stats[16]);
        $skill['Agility']=  explode(",",$stats[17]);
        $skill['Thieving']=    explode(",",$stats[18]);
        $skill['Slayer']=     explode(",",$stats[19]);
        $skill['Faring']=     explode(",",$stats[20]);
        $skill['Runecrafting']=       explode(",",$stats[21]);
        $skill['Hunter']=     explode(",",$stats[22]);
        $skill['Construction']=      explode(",",$stats[23]);
        $skill['Summoning']=      explode(",",$stats[24]);
        $skill['Duel']=     explode(",",$stats[25]);
        $skill['Bounty']=   explode(",",$stats[26]);
        $skill['Rogue']=    explode(",",$stats[27]);
        $skill['Fist of guthix']=    explode(",",$stats[28]);
        echo '<table style="width: 100%; text-align: left;">';
    foreach($skill as $key => $value){
        echo '<tr><td style="width: 49%;">'. $key .'</td><td style="width: 49%; text-align: right;">'. $value[1] .'</td></tr>';
        }
        echo '</table>';
    echo $after_widget;
}

function rp_options() {
    $options = get_option("rp_options");
    if (!is_array( $options ))
        {
            $options = array(
            'title' => 'My Character',
            'name' => 'Stealth_Ltd',
			'data' => $data
            ); 
        }      
  
    if ($_POST['rp_submit']) 
        {
            $options['title'] = htmlspecialchars($_POST['rp_title']);
            $options['name'] = htmlspecialchars($_POST['rp_name']);
			$options[data] = file_get_contents("http://hiscore.runescape.com/index_lite.ws?player=".$_POST['rp_name']);
            update_option("rp_options", $options);
        }
    echo '<p><label for="rp_title">Widget Title: <input style="width: 150px;" id="rp_title" name="rp_title" value="'.$options['title'].'" type="text"></label></p>';
    echo '<p><label for="rp_name">Username: <input style="width: 150px;" id="rp_name" name="rp_name" value="'.$options['name'].'" type="text"></label></p>';
    echo '<input type="hidden" name="rp_submit" value="1" />';
}

function load_runescape_profile()
{
  register_sidebar_widget(__('Runescape Profile'), 'show_profile');     
  register_widget_control(   'Runescape Profile', 'rp_options', 300, 200 );
}
add_action("plugins_loaded", "load_runescape_profile");

?>