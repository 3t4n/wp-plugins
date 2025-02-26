<?php
  $dqbcl = new dq_bandcamplibrary();
  
  function dqbcl_style() {
    wp_register_style('dqbcl-style', 
	  plugins_url('/dq-bandcamp-library/style.css'), 
	  array(), 
	  '1', 
	  'all');
	wp_enqueue_style('dqbcl-style');
  }
  add_action('wp_enqueue_scripts','dqbcl_style');

  $slug = $dqbcl->dqbcl_pageslug(); // implemented v1.1
  $page = "/".$slug."/"; // was hardcoded: /bandcamp/, updated v1.1
  $by = "title";
  $how = "asc";
  $howArtist = "asc";
  $howTitle = "asc";
	
  if(isset($_GET['by'])){
    $by = $_GET['by'];
	if(isset($_GET['how'])){
	  $how = $_GET['how']="asc" ? "desc" : "asc";
	  if($by = 'artist') {
	    $howArtist = $how;
		$howTitle = "asc";
	  } else {
	    $howArtist = "asc";
		$howTitle = $how;
	  }
    }
  } 
  
  $style = $dqbcl->cssFile;
  $albums = $dqbcl->dqbcl_libraryitems($by,$how);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>DQ Bandcamp Library</title>
	<link rel='stylesheet' type='text/css' media='all' href='<?php echo plugins_url('/dq-bandcamp-library/style.css'); ?>'>
	<script>
function changeAlbum(albumID){
  var srcValue = "http://bandcamp.com/EmbeddedPlayer/v=2/"+albumID+"/size=venti/transparent=true/linkcol=2C2C2C/";
  var iframe = document.getElementById('player');
  iframe.src = srcValue;
}
	</script>
  </head>
  <body>
    <div id='controls'>
      <iframe id='player' width="400" height="100" style="position: relative; display: block; width: 400px; height: 100px;" src="" allowtransparency="true" frameborder="0"></iframe> 
	</div>
	<ul id='order'>
	    <li class='<?php echo $howArtist; ?>ending'><a href='<?php echo $page."?by=artist&amp;how=".$howArtist; ?>'>Artist</a></li>
		<li class='<?php echo $howTitle; ?>ending'><a href='<?php echo $page."?by=title&amp;how=".$howTitle; ?>'>Title</a></li>
    </ul>
	<ol id='library'>
<?php
  foreach($albums as $album){
    if($album[4] == 0){
	  $link = "album=";
    } else {
	  $link = "track=";
	}
	$link .= $album[2];
	
	if($album[5] == null){
	  $thumb = ""; //"unknown.png";
	} else {
	  $thumb = $album[5];
	}
?>
	  <li class='album' onClick="changeAlbum('<?php echo $link; ?>');">
	    <img src='<?php echo $thumb; ?>'>
		<p><span class='albumTitle'><?php echo $album[0]; ?></span><br>
		<span class='artistName'><?php echo $album[1]; ?></p>
	  </li>
<?php
  }
?>  
	</div>
  </body>
</html>