<link rel="stylesheet" type="text/css" href="../wp-content/plugins/adminnotes/adminnotes.css" media="screen">
<div id="asterisk" class="asterisk"></div>


<div id="adminnotes" class="toggle" ><strong>Toggle Notes</strong></div>
<div id="savethenotes" class="hide_show">
  <p>
    <label for="notes_input">Add a Note:</label>
    <br />
    <textarea  id="notes_input" name="notes_input" rows="4" cols="36"></textarea>
  </p>
  <div id="thenotes" >
    <?php foreach($notesarray as $note) {

	 echo "<input type=\"checkbox\" name=\"posted_notes\" id=".$note->task_id." style=\"margin: 2px 0 0 5px; \" \><span   style=\"background:yellow;margin-left:5px;\">"  .$note->notes . "</span><br /><br />";

	 } ?>
  </div>
  <hr />
  <p><a href="../wp-content/plugins/adminnotes/adminnotes.php" id="save_notes" class="button button-highlighted">Save Note</a></p>
  <p><a href="../wp-content/plugins/adminnotes/adminnotes.php" id="del_notes" class="button button-highlighted">Delete Checked Note/s</a></p>
</div>
