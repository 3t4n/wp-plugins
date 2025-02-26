<?php
  $formaction = str_replace('%7E','~',$_SERVER['REQUEST_URI']);
  $dqbcl = new dq_bandcamplibrary();
  
  // Delete a provided list of IDs
  function dqbcl_admindelete($dqbcl){
	if(isset($_POST['dqbcl_albumid'])) {
	  $affected = $dqbcl->dqbcl_delete($_POST['dqbcl_albumid']);
	  if(trim($affected) != "") {
		// I know I should template this properly, but this is much more readable IMO
		$html  = "<div class='updated'>\n";
		$html .= "  <p>The albums(s) were successfully deleted from your library. Here are the URLs just in case.</p>\n";
		$html .= "  <ul>\n";
		$html .= $affected;
		$html .= "  </ul>";
		$html .= "</div>";
		
		echo $html;
	  }
	}
  }
  
  // Add a provided list of URLs
  function dqbcl_adminadd($dqbcl){
    if($_POST['dqbcl_hidden']=='Y'){
	  $insert = $dqbcl->dqbcl_NewItem();
	  if($insert == "") { // fine
		$html  = "<div class='updated'>\n";
		$html .= "  <p>The album(s) were successfully added to your library.</p>\n";
		$html .= "</div>\n";
	  } else { // not fine 
		$html = "<div class='error'>\n";
		$html .= "  <p>The following url(s) didn't get saved:</p>\n";
		$html .= "  <ul>\n";
		$html .=  $insert;
		$html .= "  </ul>\n";
		$html .= "</div>";
	  }
	  
	  echo $html;
    }
  }
  
  // update the slug if the user submits the slug form (implemented v1.1)
  if(isset($_POST['slug_submit'])) {
	if(!empty($_POST['dqbcl_slug'])) {
	  update_option('dqbcl_slug', $_POST['dqbcl_slug']);
	}
  } else {
    // Perform deletes first
    dqbcl_admindelete($dqbcl);
    // Perform inserts next
    dqbcl_adminadd($dqbcl);
  }
  // Get library contents after all other actions
  $contents = $dqbcl->dqbcl_libraryitems("title","asc"); // get library contents
?>

<div class='wrap'>
  <h2>Add Item</h2>
  <form name='dqbcl_form' method='post' action='<?php echo $formaction; ?>'>
	<input type='hidden' name='dqbcl_hidden' value='Y'>
	<p>
	  <label for='dqbcl_url'><em>URL(s):</em></label><br>
	  <textarea id='dqbcl_url' name='dqbcl_url' size='20' rows='4' cols='60' value=''></textarea><br>
	  (To add multiple albums at once, add one URL per line.)
	</p>
	<p class='submit'>
	  <input class='button-primary' type='submit' name='Submit' value='Submit'>
	</p>
  </form>

  <hr>
  
  <!-- form added in v1.1 -->
  <h2>Update Page Slug</h2>  
  <form name='dqbcl_slug_form' method='post' action=''>
    <p>
	  The page slug of your library: <input type='text' name='dqbcl_slug' size='20' value='<?php echo get_option('dqbcl_slug'); ?>'>  <input class='button-primary' type='submit' name='slug_submit' value='Submit'>
	</p>
  </form>
  
  <hr>

  <h2>Library Contents</h2>
  <form name='dqbcl_delete' method='post' action='<?php echo $formaction; ?>'>
	<input type='hidden' name='dqbcl_delete' value='Y'>
	<input type='hidden' id='dqbcl_albumid' name='dqbcl_albumid' value=''>
	
	<table class='widefat'>
	  <thead>
		<tr>
		  <th>Cover</th>
		  <th>Title</th>
		  <th>Artist</th>
		  <th>Type</th>
		  <th>URL</th>
		  <th>Actions</td>
		</tr>
	  </thead>
	  <tfoot>
		<tr>
		  <th>Cover</th>
		  <th>Title</th>
		  <th>Artist</th>
		  <th>Type</th>
 		  <th>URL</th>
		  <th>Actions</td>
		</tr>
	  </tfoot>
	  <tbody>
<?php
  // Display the SQL results in a table
  foreach($contents as $item) {
?>
		<tr>
		  <td><img src='<?php echo $item[5]; // thumbnail ?>' height='30' width='30'></td>
		  <td><?php echo $item[0]; // title ?></td>
		  <td><?php echo $item[1]; // artist ?></td>
		  <td><?php echo $item[4] == 0 ? "Album" : "Track"; // type ?></td>
		  <td><a href='<?php echo $item[3]; // url ?>'><?php echo $item[3]; // url ?></a></td>
		  <!--<td><a href='admin.php?page=dqbclmenu&amp;action=delete&amp;id=<?php //echo $item[6]; ?>'>Delete <?php //echo $item[6]; ?></a></td>-->
		  <td><a href="javascript:document.getElementById('dqbcl_albumid').value=<?php echo $item[6]; ?>; document.forms['dqbcl_delete'].submit();">Delete</a></td>
		</tr>
<?php		
  }
?>	
	  </tbody>
	</table>
	<!-- delete links use javascript to post this form from the table -->
  </form>
</div>
