<?php
error_reporting(0);

//include_once("db.php");
include_once("function.php");

global $wpdb;

$itable		=	$wpdb->prefix."html5video_items";

if(isset($_REQUEST['id']) && $_REQUEST['id']!="")
 $id = $_REQUEST['id'];
else
 $id = 0;

$qq = mysql_query("select * from `".$table."` where id = '".$id."' ");

$docdata = mysql_fetch_assoc($qq);



/* Save Playlist */

if(isset($_REQUEST['submit']) && $_REQUEST['submit']=="Save Playlist")
{

include("saveplus.php");

}


/* Save Playlist */


$ele = '';

if($id)
{





$qqqq = mysql_query("select * from `".$itable."` where pid = '".$id."'  ");

$mm=1;
	  
while( $docta = mysql_fetch_assoc($qqqq) )
{

			  
	$mp3i = $docta['id'];
	
	$mp3p = $docta['image'];						
		
	$mp3s = $docta['song'];  
	 
	$mp3t = $docta['title']; 
	
	$mp3a = $docta['artist'];
	
	$mp3d = $docta['download'];
			  
			  
			  //echo "<pre>"; print_r($result);
				
			 	
				
				
				if($mp3d=='1')
				{  
				  $ddd = ' checked="checked" '; 
				  $vvv = 1; 
				}  
				else
				{
				 $ddd = '';
				 $vvv = 0;
				} 
				
			
			    $ele .= '<div id="divId' .$mm. '">';
				
				$ele .= '<input type="checkbox" name="download['.($mm-1).']" id="download' .$mm. '" '.$ddd.' value="1" />&nbsp;<input type="text" name="title[]"	id="title' .$mm. '" value="'.$mp3t.'" placeholder="title" />&nbsp;<input type="text" name="artist[]"	id="artist' .$mm. '" value="'.$mp3a.'" placeholder="artist" />&nbsp;<input type="text" size="70" name="song[]"	id="song' .$mm. '" value="'.$mp3s.'" placeholder="video" />&nbsp;<input type="text" size="70" name="image[]"	id="image' .$mm. '" value="'.$mp3p.'" placeholder="image" />';
				
				if($mm==1)
				  $ele .= '&nbsp;<a href="javascript:void(0)" onclick="return addNewElement()">+ Add More</a><br><br><br>';
				else
				  $ele .= '&nbsp;<a href="javascript:void(0)" onclick="return removeThisElement(' .$mm. ')">Remove This</a><br><br><br>';  
				  
				$ele .= '</div>';
				  
				
				$mm++;
				
			  }
			  
			  
			
			
			


}


?>

<?php if(isset($_REQUEST['page']) && $_REQUEST['page']=="html5video-options") { ?>
<h2>Manage Playlist</h2>	 <br />
<?php } ?>

		
	 
 <form name="frm" action="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=html5video_add_playlist&action=update&id=<?php echo $_REQUEST['id']; ?>" method="post">
		

<br />
Manage HTML5 Video link and other information<br /><br />


<br />

<strong>Title</strong>: <input type="text" name="ptitle" value="<?php echo $docdata['title']; ?>" placeholder="title" />&nbsp;&nbsp;
<strong>Description</strong>: <input type="text" name="description" value="<?php echo $docdata['description']; ?>" placeholder="description" />&nbsp;&nbsp;
 

<?php //echo plugin_dir_path(__FILE__).'../videoplayer/jquery-ui'; ?>

<br /><br /><br />


<table width="90%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="5%" align="left"><strong>Download</strong></td>
    <td width="13%" align="center"><strong>Name</strong></td>
    <td width="11%" align="center"><strong>Artist</strong></td>
    <td width="32%" align="center"><strong>Media</strong></td>
    <td width="39%" align="center"><strong>Image</strong></td>
  </tr>
</table>





<div id="more_element_area">
  
  <script language="javascript">
  
  var idno = <?php echo isset($mm)?$mm:'2'; ?>;
  
  </script>
  
  <?php if($ele!="") { ?>
  
  <?php echo $ele; ?>
  
  <?php }else{ ?>
  
    <input type="checkbox" name="download[0]" id="download1"  value="1" />&nbsp;<input type="text" name="title[]" id="title1" value="" placeholder="title" />&nbsp;<input type="text" name="artist[]" id="artist1" value="" placeholder="artist" />&nbsp;<input type="text" name="song[]" id="song1" size="70" value="" placeholder="video" />&nbsp;<input type="text" name="image[]" id="image1" size="70" value="" placeholder="image" />&nbsp;<a href="javascript:void(0)" onclick="return addNewElement()">+ Add More</a><br><br>
    
  <?php } ?>  
    
  
</div>


<br />

<input type="hidden" name="host" value="<?php echo $_REQUEST['host']; ?>" />
 <input type="hidden" name="url" value="<?php echo $docdata['url']; ?>" />
 
 <input type="hidden"   name="size" value="full" />


<input type="submit" name="submit" style="background-color:#D84937; height:35px; color:#ffffff; font-weight:bold;" value="Save Playlist" />



</form>


<script type="text/javascript">
//var idno = <?php //echo $mm; ?>; // It start from id 2 

function addNewElement()
{
	// mainDiv is a variable to store the object of main area Div.
	var mainDiv = document.getElementById('more_element_area');
	// Create a new div 
	var innerDiv = document.createElement('div');
	// Set the attribute for created new div like here I am assigning Id attribure. 
	innerDiv.setAttribute('id', 'divId' + idno);
	// Create text node to insert in the created Div
	//var generatedContent = '<input type="text" name="new_element' + idno + '"	id="new_element' + idno + '" value="" />: <input type="text" size="70" name="new_element_' + idno + '"	id="new_element_' + idno + '" value="" />&nbsp;<a href="javascript:void(0)" onclick="return removeThisElement(' + idno + ')">Remove This</a>';
	
	var generatedContent = '<input type="checkbox" name="download[' + (idno-1) + ']" id="download' + idno + '" value="1" />&nbsp;<input type="text" name="title[]"	id="title' + idno + '" value="" placeholder="title" />&nbsp;<input type="text" name="artist[]"	id="artist' + idno + '" value="" placeholder="artist" />&nbsp;<input type="text" size="70" name="song[]"	id="song' + idno + '" value="" placeholder="video" />&nbsp;<input type="text" size="70" name="image[]"	id="image' + idno + '" value="" placeholder="image" />&nbsp;<a href="javascript:void(0)" onclick="return removeThisElement(' + idno + ')">Remove This</a><br><br><br>';
	
	
	// Inserting content to created Div by innerHtml
	innerDiv.innerHTML = generatedContent;
	// Appending this complete div to main div area.
	mainDiv.appendChild(innerDiv);
	// increment the id number by 1.
	idno++;
}

function removeThisElement(idnum)
{
	// mainDiv is a variable to store the object of main area Div.
	var mainDiv = document.getElementById('more_element_area');
	// get the div object with get Id to remove from main div area.
	var innerDiv = document.getElementById('divId' + idnum);
	// Removing element from main div area.
	mainDiv.removeChild(innerDiv);
 
}
</script>

<br />

Download video will be option in Paid version ...

<br />


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=181968385196620";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-like" data-href="https://www.facebook.com/svnlab" data-send="true" data-width="450" data-show-faces="true"></div>


<p><a href="http://html5plus.svnlabs.com/shop/html5-video-player-with-playlist/" target="_blank"><img alt="" border="0" src="https://www.paypal.com/en_GB/i/btn/btn_buynowCC_LG.gif" ></a></p>




<?php



?>


  <div>
        		
 </div>
