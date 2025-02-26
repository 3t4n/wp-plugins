<?php

$form = <<<EOD

<form id="ajax_contact_form"> 
Name:<br>
<input name="name" type="text" required placeholder="Enter your name">
<br> Email:<br>
<input name="email" type="email" required placeholder="Enter a valid email address">
<br> Message:<br>
<textarea name="message" required></textarea><br>
<div class="form_result"> </div>
<input value="Send" name="submit" type="submit">
</form>

EOD;

echo $form;

?>

