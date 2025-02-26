<div class="wrap" id="center-panel">
<h2><?php _e( 'Editing links','advlinkdirectory' ); ?></h2>
<form action="admin.php?page=edit-reviews&action=submit" method="POST">
<table class="input-table" style="width:100%; margin:0 auto;" border="0">
<tr><td width="280px" class="inp_tt"> 
 <label for="link"> <?php _e( 'Link:','advlinkdirectory' ); ?> </label><br>
 <input type="text" name="link" id="link" value="<?php echo $data['review']['link'] ?>" required><br>
</td> 
<td rowspan="2" valign="top">
<label for="description"> <?php _e( 'Text description of the link:','advlinkdirectory' ); ?> </label><br>
<textarea name="description" id="description" rows="4"><?php echo $data['review']['description'] ?></textarea><br><br>
</td></tr>
<tr><td class="inp_tt"> 
 <label for="ankor"> <?php _e( 'Anchor links:','advlinkdirectory' ); ?> </label><br>
 <input type="text" name="ankor" id="ankor" value="<?php echo $data['review']['ankor'] ?>" required><br><br>
</td></tr>  

<tr>
<td colspan="2"> 
  <table style="width:100%; margin:0 auto;" border="0">
	<tr>
		<td><b>Only&nbsp;for&nbsp;admin</b></td>
		<td width="95%"><hr></td>
	</tr>
  </table>
</td>
</tr>

<tr><td valign="top" class="inp_tt">
<label for="reverse_link"> <?php _e( 'Back link:','advlinkdirectory' ); ?> </label><br>
<input type="text" name="reverse_link" id="reverse_link" value="<?php echo $data['review']['reverse_link'] ?>" /><br><br>
</td>
<td>
<label for="note"> <?php _e( 'Note:','advlinkdirectory' ); ?> </label><br>
<textarea name="note" id="note" rows="4"><?php echo $data['review']['note'] ?></textarea><br><br>
</td></tr> 
</table>
  <div style="text-align:center">
    <input type="hidden" name="id" value="<?php echo $data['review']['ID'] ?>" />
	<input type="submit" class="button" name="send" value="<?php _e( 'Change link','advlinkdirectory' ); ?>" />
  </div>
 </form>
</div> <!-- /#center-panel -->

<style>
#link, #description, #reverse_link, #ankor, #button, #note  {  width: 100%;	}
.inp_tt { padding-right: 20px; }
</style>