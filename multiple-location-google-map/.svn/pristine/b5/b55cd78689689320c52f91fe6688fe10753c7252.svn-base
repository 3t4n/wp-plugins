<div class="mlgmsetting-panel-wrap">
<h2 class="nav-tab-wrapper">
<?php  if(isset($_GET['managemaps']) && $_GET['managemaps']=='general_setting'){ $tabactivegrnClass='nav-tab-active';} else if(isset($_GET['managemaps']) && $_GET['managemaps']=='manage_style'){$tabactivestyleClass='nav-tab-active';}else {$tabactivegrnClass='nav-tab-active';} ?>

<a href="<?php echo admin_url("edit.php?post_type=mlgm&page=mlgmsetting&managemaps=general_setting"); ?>" class="nav-tab <?php echo $tabactivegrnClass; ?>">General</a>
<a href="<?php echo admin_url("edit.php?post_type=mlgm&page=mlgmsetting&managemaps=manage_style"); ?>" class="nav-tab <?php echo $tabactivestyleClass; ?>">Styling</a></h2>
<div class="options-container">
<?php
if(isset($_GET['managemaps']))
{
switch($_GET['managemaps'])
  {
	  case 'manage_style':
	  include_once('setting/manage_style.php');
	  break;
	  default:
	  include_once('setting/manage_maps.php');
	  break;
	  
  }
}else 
{
   include_once('setting/manage_maps.php');
}
?>					
</div>
</div>