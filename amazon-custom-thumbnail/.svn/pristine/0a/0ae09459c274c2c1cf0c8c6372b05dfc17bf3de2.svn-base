<?php
 header("Content-type: text/css; charset: UTF-8");
if(isset($_GET['warna']))
{
	$warna=$_GET['warna'];
}else
{
	$warna = 'white';
}
if(isset($_GET['lebar']))
{
	$default_lebar=380;
	//$default_tinggi=330;
	$lebar=$_GET['lebar'];
	//$percen=($lebar*100)/$default_lebar;
//	$tinggi=($percen/100)*$default_tinggi;
	$tinggi = '330';
}else
{
	$lebar = '380';
	$tinggi = '330';
}
echo '
.sgtact_container_plugin:before,
.sgtact_container_plugin:after {
  content: "";
  display: table;
}
.sgtact_container_plugin:after {
  clear: both;
}
.sgtact_container_plugin {
  *zoom: 1;
  /*border: 1px solid black;*/
}
.sgtact_container_plugin,
sgtact_section_plugin,
sgtact_aside_plugin {
  border-radius: 6px;
}
sgtact_section_plugin,
sgtact_aside_plugin {
  margin: 1.858736059%;
  padding: 0px 0;
  text-align:left;
}
sgtact_aside_plugin {
  background: '.$warna.';
}
/*sgtact_section_plugin
{
  background: #09C;
 }*/
@media all and (min-width: 150px) {
  .sgtact_container_plugin {
    max-width: '.$lebar.'px;
	height: '.$tinggi.';	
	max-height: 400px;	
  }
  sgtact_section_plugin {
	align:center;
    float: left;
    width: 98.5%;
	min-height:200px;
  }
  sgtact_aside_plugin {
    float: right;
    width: 96.5%;
  }
}';
?>
