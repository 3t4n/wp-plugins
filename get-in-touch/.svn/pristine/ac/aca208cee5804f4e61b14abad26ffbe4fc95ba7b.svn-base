<?php

function git_map_shortcode($form_id)
{
  if(empty($form_id)){
    return false;
  }

  $GetClass = new git\GetData();

  $InputMapById = $GetClass->get_map_details_by_id($form_id);
  if(empty($InputMapById)){
    return false;
  }

  $UnserializedInputMap = unserialize($InputMapById[0]->Input_Data);

  ob_start();
  ?>
  <input type="hidden" id="git_map_check" value="true">
  <input type="hidden" id="git_map_latitude" value="<?php echo $UnserializedInputMap['latitude'];?>">
  <input type="hidden" id="git_map_longitude" value="<?php echo $UnserializedInputMap['longitude'];?>">
  <input type="hidden" id="git_map_title" value="<?php echo $UnserializedInputMap['title'];?>">
  <input type="hidden" id="git_map_zoom" value="<?php echo $UnserializedInputMap['zoom'];?>">
  <input type="hidden" id="git_map_scrollwheel" value="<?php echo $UnserializedInputMap['scrollwheel'];?>">
  <input type="hidden" id="git_map_clickable" value="<?php echo $UnserializedInputMap['clickable'];?>">
  <div style="background-color: #FFFFFF;border: 1px solid #CCCCCC;box-shadow: 0 0 10px -8px #888888; padding: 5px; width: <?php echo $UnserializedInputMap['width'];?>px;" class="git-map-container">
    <div style="margin: 0px; padding: 0px; height: <?php echo $UnserializedInputMap['height'];?>px;" id="map_can">
    </div>
  </div>
  <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
  <?php
  return ob_get_clean();
}


function git_map($form_id)
{
  if(empty($form_id)){
    return false;
  }

  $GetClass = new git\GetData();

  $InputMapById = $GetClass->get_map_details_by_id($form_id);
  if(empty($InputMapById)){
    return false;
  }

  $UnserializedInputMap = unserialize($InputMapById[0]->Input_Data);
  ?>
  <input type="hidden" id="git_map_check" value="true">
  <input type="hidden" id="git_map_latitude" value="<?php echo $UnserializedInputMap['latitude'];?>">
  <input type="hidden" id="git_map_longitude" value="<?php echo $UnserializedInputMap['longitude'];?>">
  <input type="hidden" id="git_map_title" value="<?php echo $UnserializedInputMap['title'];?>">
  <input type="hidden" id="git_map_zoom" value="<?php echo $UnserializedInputMap['zoom'];?>">
  <input type="hidden" id="git_map_scrollwheel" value="<?php echo $UnserializedInputMap['scrollwheel'];?>">
  <input type="hidden" id="git_map_clickable" value="<?php echo $UnserializedInputMap['clickable'];?>">
  <div style="background-color: #FFFFFF;border: 1px solid #CCCCCC;box-shadow: 0 0 10px -8px #888888; padding: 5px; width: <?php echo $UnserializedInputMap['width'];?>px;" class="git-map-container">
    <div style="margin: 0px; padding: 0px; height: <?php echo $UnserializedInputMap['height'];?>px;" id="map_can">
    </div>
  </div>
  <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
  <?php
}
