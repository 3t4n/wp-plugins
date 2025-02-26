<?php

class MiFaZWidgetFrontend
{


public static function displayFrontend($args,$instance)
{
  extract($args);
  $startort = esc_attr($instance ['startloc']);
  $startvalue = esc_attr($instance ['startlocValue']);
  $zielort = esc_attr($instance ['destloc']);
  $zielvalue = esc_attr($instance ['destlocValue']);
  echo $before_widget;
	$title = apply_filters( 'widget_title', $instance['title'] );
  if ( !$title ) $title = Mifaz_Widget::$defaulTitle;	
  echo $before_title . $title . $after_title;
  MiFaZWidgetFrontend::displayInputfields($startort,$startvalue,$zielort,$zielvalue);
  echo $after_widget;
}
  
public static function displayInputfields($startort,$startvalue,$zielort,$zielvalue)
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo (plugins_url('WP_MiFaZstyle.css', __FILE__)); ?>" />
<div id="MiFaZ-WordpressWidget">

<script	src="<?php echo (plugins_url('WP_MiFaZ_co.js', __FILE__)); ?>"></script> 
<span id="MiFaZInfo"></span> 
<span class="MiFaZ"	id="MiFazInputs"> 
<strong class="MiFaZinputlabel"><label for="MiFazLoc1"><?php _e(Mifaz_Widget::$startLabel);?></label></strong> 

<?php 
if ($startort!='' && is_numeric($startvalue))
{
  echo "<span class=\"MiFaZLocName\">$startort</span>";
  echo "<input id=\"MiFazLoc1\" 	type=\"hidden\"  class=\"MiFaZLocInput\" value=\"$startort\" />";
  echo "<input id=\"MiFazLoc1Value\" type=\"hidden\" value=\"$startvalue\" />";
}
else
{
  ?>
  <input id="MiFazLoc1"	class="MiFaZLocInput" type="text" value="" />
  <input id="MiFazLoc1Value" type="hidden" value="-1" />
  <span	id="MiFazLoc1List" class="MiFaZListBox MiFaZhide">
  <span></span>
  <?php 
}
?>
</span>
<strong class="MiFaZinputlabel"><label for="MiFazLoc2"><?php _e(Mifaz_Widget::$destLabel);?></label></strong>
<?php 
if ($zielort!='' && is_numeric($zielvalue))
{
  echo "<span class=\"MiFaZLocName\">$zielort</span>";
  echo "<input id=\"MiFazLoc2\" 	type=\"hidden\"  class=\"MiFaZLocInput\" value=\"$zielort\" />";
  echo "<input id=\"MiFazLoc2Value\" type=\"hidden\" value=\"$zielvalue\" />";
}
else
{
?>
<input id="MiFazLoc2"	class="MiFaZLocInput" type="text" value="" />
<input id="MiFazLoc2Value" type="hidden" value="-1" />
<span	id="MiFazLoc2List" class="MiFaZListBox MiFaZhide">
<span></span>
<?php 
}
?>
</span>
<p>&nbsp;</p>
<button class="MiFaZsend" onclick="WP_MiFaZ.sendRequest();"><?php _e(Mifaz_Widget::$buttonLabel); ?></button>
</span>

<span id ="MiFaZResults">
 <ul></ul>
</span>

</div>
<script>
document.addEventListener('DOMContentLoaded',function(){ WP_MiFaZ.init('<?php
echo (plugins_url('', __FILE__));
?>');}, false);
</script>
<?php
}
}
?>