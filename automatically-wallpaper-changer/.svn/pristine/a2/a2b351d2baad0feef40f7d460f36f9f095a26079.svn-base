<?php
// 24-hour format of an hour without leading zeros (0 through 23)
$Hour = date('G');
if ( $Hour >= 5 && $Hour <= 18 ) {
 //Good Morning
 $backgroundImage = '../images/morning.jpg';
} 
else if ( $Hour >= 19 || $Hour <= 4 ) {
 //Good Evening
 $backgroundImage = '../images/evening.jpg';
}

header("Content-Type: text/css");
?>
.wpc_changewallpaper {
 background-image: url(<?php echo $backgroundImage;?>);
 background-repeat: repeat;
 background-position: top left;
 background-attachment: fixed;
 }