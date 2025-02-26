<?php 

function aldobw_quicktag()
{

	if(strpos($_SERVER['REQUEST_URI'], 'post.php') || strpos($_SERVER['REQUEST_URI'], 'comment.php') || strpos($_SERVER['REQUEST_URI'], 'page.php') || strpos($_SERVER['REQUEST_URI'], 'post-new.php') || strpos($_SERVER['REQUEST_URI'], 'page-new.php') || strpos($_SERVER['REQUEST_URI'], 'bookmarklet.php'))
	{
		?>
		<script language="JavaScript" type="text/javascript"><!--
		var toolbar = document.getElementById("ed_toolbar");
		<?php
				edit_insert_button("OBW", "aldobw_button", "Open Browser Window");
		?>
		var state_aldobw_button = true;

		function aldobw_button()
		{
			if (state_aldobw_button) {
				var URL = prompt('Enter the URL of the page you want to display' ,'http://');
				if ((URL)&&(URL!='http://'))
				{
					tagStart = '<a href="' + URL + '"';
					var defaultWidth = prompt('Enter the width' ,'640');
					var defaultHeight = prompt('Enter the height' ,'480');
					if ((!defaultWidth)||(isNaN(defaultWidth))) defaultWidth = 640;
					if ((!defaultHeight)||(isNaN(defaultHeight))) defaultHeight = 480;
					
					tagStart += ' onclick="ald_OpenBrWindow(this.href,\'aldobw\',\'\',\'' + defaultWidth + '\',\'' + defaultHeight + '\',true';
					tagStart +='); return false"';
					tagStart +='>';
					
					document.getElementById('ed_OBW').value = '/OBW';
					edInsertContent(edCanvas, tagStart);
					state_aldobw_button = !state_aldobw_button;
				}
			}
			else
			{
				document.getElementById('ed_OBW').value = 'OBW';
				edInsertContent(edCanvas, '</a>');
				state_aldobw_button = !state_aldobw_button;
			}
		}
		//--></script>
		<?php
	}
}

if(!function_exists('edit_insert_button'))
{
	//edit_insert_button: Inserts a button into the editor
	function edit_insert_button($caption, $js_onclick, $title = '')
	{
		?>
		if(toolbar)
		{
			var theButton = document.createElement('input');
			theButton.type = 'button';
			theButton.value = '<?php echo $caption; ?>';
			theButton.onclick = <?php echo $js_onclick; ?>;
			theButton.className = 'ed_button';
			theButton.title = "<?php echo $title; ?>";
			theButton.id = "<?php echo "ed_{$caption}"; ?>";
			toolbar.appendChild(theButton);
		}
		<?php
	}
}

add_filter('admin_footer', 'aldobw_quicktag');
?>