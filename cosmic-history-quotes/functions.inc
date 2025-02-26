<?php // functions.inc

// Date MySQL to SHORT DATE
function date_mysql_to_short($mysql_date){
	$mysql_date_pcs = explode('-',$mysql_date);
	$year = $mysql_date_pcs[0];
	$month = $mysql_date_pcs[1];
	$day = $mysql_date_pcs[2];

	switch ($month){
		case "01":  $month = "1"; break;
		case "02":  $month = "2"; break;
		case "03":  $month = "3"; break;
		case "04":  $month = "4"; break;
		case "05":  $month = "5"; break;
		case "06":  $month = "6"; break;
		case "07":  $month = "7"; break;
		case "08":  $month = "8"; break;
		case "09":  $month = "9"; break;
		case "10":  $month = "10"; break;
		case "11":  $month = "11"; break;
		case "12":  $month = "12"; break;
    }

	switch ($day){
		case "01":  $day = "1"; break;
		case "02":  $day = "2"; break;
		case "03":  $day = "3"; break;
		case "04":  $day = "4"; break;
		case "05":  $day = "5"; break;
		case "06":  $day = "6"; break;
		case "07":  $day = "7"; break;
		case "08":  $day = "8"; break;
		case "09":  $day = "9"; break;
    }

	$date_full = "$month/$day/$year";
	return $date_full;
}

?>