<?php if(!defined('ABSPATH')){exit();}?>
<?php
	if($data['edit']){
		echo "<div class='save-cloud cloud'>";
		foreach($data['edit'] as $row){
			$title=__('No title','twp-youtube');
			if($row->title!=''){
				$title=$row->title;
			}
			
			echo '<span>'.$title.'</span> - '.__('Saved','twp-youtube').' - '.date('H:i:s');
		}
		echo "</div>";
	}
?>