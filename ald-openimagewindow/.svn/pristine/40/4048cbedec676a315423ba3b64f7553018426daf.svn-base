<?php 

function aldopw_quicktag()
{

	if(strpos($_SERVER['REQUEST_URI'], 'post.php') || strpos($_SERVER['REQUEST_URI'], 'comment.php') || strpos($_SERVER['REQUEST_URI'], 'page.php') || strpos($_SERVER['REQUEST_URI'], 'post-new.php') || strpos($_SERVER['REQUEST_URI'], 'page-new.php') || strpos($_SERVER['REQUEST_URI'], 'bookmarklet.php'))
	{
		?>
		<script language="JavaScript" type="text/javascript"><!--
		var toolbar = document.getElementById("ed_toolbar");
		<?php
				edit_insert_button("OPW", "aldopw_button", "Open Picture Window");
		?>
		var state_aldopw_button = true;

		function aldopw_button()
		{
			if (state_aldopw_button) {
				var URL = prompt('Enter the URL of the Image you want to display' ,'http://');
				if ((URL)&&(URL!='http://'))
				{
					tagStart = '<a href="' + URL + '"';
					var defaultWidth = prompt('Enter the width' ,'640');
					var defaultHeight = prompt('Enter the height' ,'480');
					var defaultTitle = prompt('Enter the title of the window','');
					if ((!defaultWidth)||(isNaN(defaultWidth))) defaultWidth = 640;
					if ((!defaultHeight)||(isNaN(defaultHeight))) defaultHeight = 480;
					
					tagStart += ' onclick="ald_OpenPictureWindow(this.href,\'aldopw\',\'\',\'' + defaultWidth + '\',\'' + defaultHeight + '\',true';
					if (defaultTitle) tagStart += ',\''+defaultTitle+'\'';
					tagStart +='); return false"';
					tagStart +='>';
					
					document.getElementById('ed_OPW').value = '/OPW';
					edInsertContent(edCanvas, tagStart);
					state_aldopw_button = !state_aldopw_button;
				}
			}
			else
			{
				document.getElementById('ed_OPW').value = 'OPW';
				edInsertContent(edCanvas, '</a>');
				state_aldopw_button = !state_aldopw_button;
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

add_filter('admin_footer', 'aldopw_quicktag');
?>