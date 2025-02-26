<!DOCTYPE html>

<HTML>
<head>
<title>Preview</title>
<script src="jj.php"></script>
<link rel="stylesheet" href="../css/style.css">
</head>

<body>
	<div class="adb_overlay">
<?php
	if(isset($_POST['adb_display_status'])) {
		switch($_POST["adb_display_status"]) {
			case 0: echo '<div class="adb_modal">
							<p class="adb_detected">ADBLOCK DETECTED!</p>
							
							<p class="adb_message">'.$_POST["adb_display_message"].'</p>
						</div>';
				break;
			case 1: echo '<div class="adb_modal_img"><img src="'.$_POST["adb_display_image"].'"></div>';
				break;
		}
	}
?>
	</div>
</body>