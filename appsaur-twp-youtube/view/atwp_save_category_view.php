<?php if(!defined('ABSPATH')){exit();}?>
<?php
	if($data['edit']){
		echo "<div class='save-cloud cloud'>";
		foreach($data['edit'] as $row){			
			echo '<span>'.$row->title.'</span> - '.__('Saved','twp-youtube').' - '.date('H:i:s');
		}
		echo "</div>";
	}
?>