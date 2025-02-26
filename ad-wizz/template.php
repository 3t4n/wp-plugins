<?php
session_start();
$expire = $_REQUEST['expire'];
$_SESSION['time_add'] = time() + $expire;
$link = $_REQUEST['link'];
?>
<?php $redirect = $_SESSION['redirect_wizz']; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">
window.onload = function() {
/*	set your parameters(
number to countdown from, 
pause between counts in milliseconds, 
function to execute when finished
) 
*/
startCountDown(<?php echo $redirect; ?>, 1000, myFunction);
}

function startCountDown(i, p, f) {
//	store parameters
var pause = p;
var fn = f;
//	make reference to div
var countDownObj = document.getElementById("countDown");
if (countDownObj == null) {
//	error
alert("div not found, check your id");
//	bail
return;
}
countDownObj.count = function(i) {
//	write out count
countDownObj.innerHTML = i;
if (i == 0) {
//	execute function
fn();
//	stop
return;
}
setTimeout(function() {
//	repeat
countDownObj.count(i - 1);
},
pause
);
}
//	set it going
countDownObj.count(i);
}

function myFunction() {
window.location = "<?php echo $link ?>"
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

</head>

<body>
<a href="<?php echo $link; ?>"><?php echo $_SESSION['forward_wizz'] ?></a> 
<div style="position:absolute; width:300px; right:0px; top:10px;">
<div style="float:left; width:155px">You will be redirected in: </div>
<div id="countDown" style="width:25px; float:left; text-align:right; margin-right:5px;"></div>
<div  style="width:50px; float:left">seconds</div>
</div>
<br>
<div style="clear:both; margin-top:20px;">
<?php echo htmlspecialchars_decode(html_entity_decode(stripslashes($_SESSION['content_add']))) ?>
<?php //echo $_SESSION['content_add']; ?>
</div>
 
</body>

</html>


