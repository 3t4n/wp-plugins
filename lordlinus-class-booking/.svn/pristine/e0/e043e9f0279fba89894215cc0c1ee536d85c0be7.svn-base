<?php
if(isset($_POST['submit']))
{
	$val = $_POST['display_booking'];
	update_option('lordlinus_display_seting_book',$val);
	echo "<div class='alert alert-info'>Setting Saved Successfully</div>";
}
?>
<h4>
There are two option to Show the Booking form on user end.
<br/>

<br/>
How you want to show the booking form : 

<br/>
<br/>
<?php 
$c = get_option('lordlinus_display_seting_book');
?>
<form method="post" action="#">
<input type="radio" name="display_booking" value='1'  <?php if($c== '1') echo "checked='checked'"; ?> > In Pop-up window<br/>
<br/>
<input type="radio" name="display_booking" value='2'  <?php if($c== '2') echo "checked='checked'"; ?> > In a simple form
<br/>
<br/>
<input type="submit" class='btn btn-info' name="submit" value="Save Details">
</h4>
