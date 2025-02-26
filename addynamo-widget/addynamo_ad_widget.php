<?php
/*
Plugin Name: Addynamo Ad Widget
Plugin URI: http://www.addynamo.com/
Description: Addynamo Ad Widget to display ads in your sidebar
Author: Addynamo
Version: 1
Author URI: http://www.addynamo.com
*/

function widget_Addynamo($args) {
  extract($args);

  $options = get_option("widget_Addynamo");
  if (!is_array( $options ))
	{
		$options = array(
      'addynamo_id' => 'Addynamo Ad Widget'
      );
  }      

  echo $before_widget;
    echo $before_title;
    echo $after_title;
    //Our Widget Content
	echo "<script type='text/javascript'>";
	echo "var _adynamo_client = '" .  $options['addynamo_id'] . "';";
	echo "var _adynamo_width = " . $options['addynamo_width'] . ";";
	echo "var _adynamo_height = " . $options['addynamo_height'] . ";";
	echo "</script>";
	echo "<script type='text/javascript' src='http://www.addynamo.com/javascripts/deliverAds.js'></script>";

  echo $after_widget;
}

function Addynamo_control()
{
  $options = get_option("widget_Addynamo");

  if ($_POST['Addynamo-Submit'])
  {
    $options['addynamo_id'] = htmlspecialchars($_POST['Widget-Addynamo-ID']);
	$options['addynamo_width'] = htmlspecialchars($_POST['Widget-Addynamo-Width']);
	$options['addynamo_height'] = htmlspecialchars($_POST['Widget-Addynamo-Height']);

    update_option("widget_Addynamo", $options);
  }

?>
  <p>
  	<table width="100%" border="0">
    	<tr>
        	<td><label for="Widget-Addynamo-ID">Ad ID: </label></td>
            <td><input type="text" id="Widget-Addynamo-ID" name="Widget-Addynamo-ID" value="<?php echo $options['addynamo_id'];?>" /></td>
        </tr>
    	<tr>
        	<td><label for="Widget-Addynamo-Width">Width: </label></td>
			<td><input type="text" id="Widget-Addynamo-Width" name="Widget-Addynamo-Width" value="<?php echo $options['addynamo_width'];?>" /></td>
        </tr>
    	<tr>
        	<td><label for="Widget-Addynamo-Height">Height: </label></td>
            <td><input type="text" id="Widget-Addynamo-Height" name="Widget-Addynamo-Height" value="<?php echo $options['addynamo_height'];?>" /><input type="hidden" id="Addynamo-Submit" name="Addynamo-Submit" value="1" /></td>
        </tr>
    </table>
  </p>
<?php
}

function myAddynamo_init()
{
  register_sidebar_widget(__('Addynamo Ad'), 'widget_Addynamo');
  register_widget_control(   'Addynamo Ad', 'Addynamo_control');
}
add_action("plugins_loaded", "myAddynamo_init");
?>
