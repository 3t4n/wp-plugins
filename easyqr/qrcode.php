<?php
/*
	Plugin Name: EasyQR
	Plugin URI: http://qrgenerator.mindster.net
	Description: Plugin for display qr code in website
	Author: Muhammad Jauhari Bin Saealal
	Version: 1.0.1
	Author URI: http://sukakomputer.mindster.net/hubungi-kami.html
*/

function DisplayWidgetContent()
{

	$Temp = "";
	$options = get_option("widget_QrCode");
	$Temp = $options['QrCode'];
	$Size = $options['Size'] . "x" . $options['Size'];
	$Temp = "http://chart.apis.google.com/chart?chs=" . $Size . "&cht=qr&chl=" . $Temp;
	echo "<img src='" . $Temp . "'>";
	//echo $Temp;
	//display description if not empty
	$Temp = $options['Note'];
	if ($Temp != "")
	{
		echo "<p>" . $Temp . "</p>";
	}	
}
 
function widget_QrCode($args) {
  extract($args);
 
  $options = get_option("widget_QrCode");
  if (!is_array( $options ))
{
$options = array(
      'title' => 'Qr Code'
      );
  }
 
  echo $before_widget;
    echo $before_title;
      echo $options['title'];
    echo $after_title;
 
    //Our Widget Content
		//put google analytic
		echo "<script type='text/javascript'>";
		echo "var _gaq = _gaq || [];";
		echo "_gaq.push(['_setAccount', 'UA-10339597-13']);";
		echo "_gaq.push(['_trackPageview']);";

		echo "(function() {";
    echo "var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;";
    echo "ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';";
    echo "var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);";
		echo "})();";

		echo "</script>";
    DisplayWidgetContent();
  echo $after_widget;
 
}
 
function QrCode_control()
{
  $options = get_option("widget_QrCode");
  if (!is_array( $options ))
{
$options = array(
      'title' => 'QR Code',
			'QrCode' => 'My QR Code',
			'Note' => 'Put your note here',
			'Size' => '150'
      );
  }
 
  if ($_POST['QrCode-Submit'])
  {
    $options['title'] = htmlspecialchars($_POST['QrCode-WidgetTitle']);
	$options['QrCode'] = $_POST['QrCode-WidgetQrCode'];
	$options['Note'] = htmlspecialchars($_POST['QrCode-WidgetQrNote']);
	$Temp = $_POST['QrCode-WidgetQrSize'];
	if ($Temp >= 500) 
	{
		$Temp = 500;
	}
	if ($Temp <= 50)
	{
		$Temp = 50;
	}
	$options['Size'] = $Temp;
	update_option("widget_QrCode", $options);
  }

?>

  <p>
    <label for="QrCode-WidgetTitle">Title: </label>
    <input type="text" id="QrCode-WidgetTitle" name="QrCode-WidgetTitle" value="<?php echo $options['title'];?>" />
	<br>
    <label for="QrCode-WidgetTitle">Code: </label>
    <input type="text" id="QrCode-WidgetTitle" name="QrCode-WidgetQrCode" value="<?php echo $options['QrCode'];?>" />
	<br>
    <label for="QrCode-WidgetTitle">Desc: </label>
    <input type="text" id="QrCode-WidgetNote" name="QrCode-WidgetQrNote" value="<?php echo $options['Note'];?>" />
	<br>
    <label for="QrCode-WidgetTitle">Size: </label>
    <input type="text" id="QrCode-WidgetNote" name="QrCode-WidgetQrSize" value="<?php echo $options['Size'];?>" /> px
	<br>

	Get your QR Code <a href='http://qrgenerator.mindster.net' target='_blank'>here</a>
    <input type="hidden" id="QrCode-Submit" name="QrCode-Submit" value="1" />
  </p>
<?php
}
 
function QrCode_init()
{
  register_sidebar_widget(__('EasyQR'), 'widget_QrCode');
  register_widget_control(   'EasyQR', 'QrCode_control', 200, 200 );
}
add_action("plugins_loaded", "QrCode_init");
?>