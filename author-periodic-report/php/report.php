<?php
class PeriodicReport {
function view() {

	$month=$_GET["month"];
	if(!$month)$month=date(n);
	$m[$month]="selected";

	$year=$_GET["year"];
	if(!$year)$year=date(Y);
?>


	<div class="wrap">
	<div id="author-periodic-report">

		<h2>Author Periodic Report</h2>
		<br/>

		<form method="GET" action="">
       	<div>
        	<label>Select Month: </label>

			<select name="month" id="month" />
			<?php
				for($i=1; $i<=12; $i++)
				echo "<option value='",$i,"' ",$m[$i],">", date('F',mktime(0,0,0,$i,10)) ,"</option>";
			?>
			</select>

			<input type="text" name="year" id="year" value="<?=$year;?>"/>

			<input type="submit" id="display_report" value="Display Report"/>
			<input type="hidden" name="page" value="<?php echo $_GET['page']?>"/>
		</div>
		</form>
    
	</div>

	
	
<?php

include_once(PERIODIC_REPORT_ROOT . '/php/display_report.php');
}
  

function get_authors($time) {
      $args = array('role' => 'administrator', 'orderby' => 'display_name', 'fields' => array('ID','display_name'));
      $admins = get_users($args);
      $args = array('role' => 'editor', 'orderby' => 'display_name', 'fields' => array('ID','display_name'));
      $editors = get_users($args);
      $args = array('role' => 'author', 'orderby' => 'display_name', 'fields' => array('ID','display_name'));
      $authors = get_users($args);
      $args = array('role' => 'contributor', 'orderby' => 'display_name', 'fields' => array('ID','display_name'));
      $contributors = get_users($args);

	foreach ($admins as $user) {
		$arr[]=array($user->ID,$user->display_name,'<font style="color:red;">Admin</font>',$this->get_numbers($user->ID,$time));
	}
	foreach ($editors as $user) {
		$arr[]=array($user->ID,$user->display_name,'<font style="color:purple;">Editor</font>',$this->get_numbers($user->ID,$time));
	}
	foreach ($authors as $user) {
		$arr[]=array($user->ID,$user->display_name,'Author',$this->get_numbers($user->ID,$time));
	}
	foreach ($contributors as $user) {
		$arr[]=array($user->ID,$user->display_name,'Contributor',$this->get_numbers($user->ID,$time));
	}

      return $arr;
}


function get_numbers($author, $time) {
      global $wpdb;
      $sql = "SELECT count(ID) as c FROM ". $wpdb->posts . " WHERE post_author=". $author;
      $sql .= " and post_status='publish'";
      if ($time) {
          $sql .= " and post_date LIKE '%".$time."%';";
      }
	$res = $wpdb->get_row($sql);
      return $res->c;
}
  

}
?>