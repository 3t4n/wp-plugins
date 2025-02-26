<?php
/**
 * Author: Inna Janssen,Stefan Strobl
 */
class MiFaZWidgetForm
{
  public static function displayForm($instance,$widget)
  {
    
  if (!isset($instance ['title']))
  {
    $title = Mifaz_Widget::$defaulTitle;
  }
  else  $title = esc_attr($instance ['title']);
  $titleid = $widget->get_field_id('title'); 
  $titlename = $widget->get_field_name('title');
    
  $startort = esc_attr($instance ['startloc']);
  $startorthtmlid = $widget->get_field_id('startloc'); 
  $startfieldname = $widget->get_field_name('startloc');
  
  $startvalue = esc_attr($instance ['startlocValue']);
  $startvaluehtmlid = $widget->get_field_id('startlocValue'); 
  $startvaluefieldname = $widget->get_field_name('startlocValue');
 
  $zielort = esc_attr($instance ['destloc']);
  $zielorthtmlid = $widget->get_field_id('destloc');
  $zielfieldname = $widget->get_field_name('destloc');

  $zielvalue = esc_attr($instance ['destlocValue']);
  $zielvaluehtmlid = $widget->get_field_id('destlocValue'); 
  $zielvaluefieldname = $widget->get_field_name('destlocValue');
  
  echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . plugins_url('WP_MiFaZstyle.css', __FILE__).
  "\" />";

  echo "<label for=\"$titleid\">";
  _e('Title:'); 
  echo '</label>';   
  echo "<input class=\"widefat\" id=\"$titleid\" name=\"$titlename\" type=\"text\" value=\"$title\" />";
  
  
  echo "<script	src=\"";
  echo (plugins_url('WP_MiFaZ_co.js', __FILE__));
  echo "\"></script>"; 
  echo '<span id="MiFaZInfo"></span>'; 
  echo '<span class="MiFaZ"	id="MiFazInputs">'; 
  
  echo "<label for=\"$startorthtmlid\">";
  _e('Ggf. Startort vorgeben:');
  echo "</label>";
  echo "<input class=\"widefat\" id=\"$startorthtmlid\" name=\"$startfieldname\" type=\"text\" value=\"$startort\" />";
  echo "<input id=\"{$startvaluehtmlid}\" name=\"$startvaluefieldname\" type=\"hidden\" value=\"$startvalue\" />";
  echo "<span	id=\"{$startorthtmlid}List\" class=\"MiFaZListBox MiFaZhide\">";
  echo "<p class=\"MiFaZUL\"></p>";
  echo "</span>";
  
  echo "<label for=\"$zielorthtmlid\">";
  _e('Ggf. Zielort vorgeben:');
  echo "</label>";
  echo "<input class=\"widefat\" id=\"$zielorthtmlid\" name=\"$zielfieldname\" type=\"text\" value=\"$zielort\" />";
  echo "<input id=\"{$zielvaluehtmlid}\" name=\"$zielvaluefieldname\" type=\"hidden\" value=\"$zielvalue\" />";
  echo "<span	id=\"{$zielorthtmlid}List\" class=\"MiFaZListBox MiFaZhide\">";
  echo "<p class=\"MiFaZUL\"></p>";
  echo "</span>";
  
  
  echo "</span>";
  echo "</span>";
  ?>  
<script>

document.addEventListener('DOMContentLoaded',function(){ WP_MiFaZ.init('<?php
echo (plugins_url('', __FILE__));
?>');
WP_MiFaZ.autocompleter(document.getElementById('<?php echo $startorthtmlid; ?>'));
WP_MiFaZ.autocompleter(document.getElementById('<?php echo $zielorthtmlid; ?>'));

}, false);
</script>
<?php 

}//displayForm
}
?>