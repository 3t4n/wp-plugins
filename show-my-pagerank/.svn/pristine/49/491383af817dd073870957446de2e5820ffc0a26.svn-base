<?php
/*
Plugin Name: Show-My-PageRank
Plugin URI: http://www.sajithmr.com/wordpress-page-rank-plugin/
Description: If your wordpress blog has a better page rank, here is a better chance to reveal it to your blog readers. That is Wordpress Page Rank Plugin Show-My-PageRank. What you want to do is just download this plugin and activate it. All of your wordpress post automatically tagged with your google page rank. This will increase your readers interest. More page ranked articles / post get more readership. Just try.
Version: 1.0
Author: Sajith
Author URI: http://www.sajithmr.com
*/


/*  Copyright 2008  Show-My_PageRank (email : mrsajith@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_filter('the_content', 'append_pagerank');

function wp_show_my_pagerank()
{
	
	$img = retrieve_pagerank();
	if($img != 'null')
		{
			
			$pr_out_template = '<table border="0" >
				  <tr>
					<td><a href="http://www.sajithmr.me/wordpress-page-rank-plugin/"><img src="'.get_option('siteurl').'/wp-content/plugins/show-my-pagerank/pr/'.$img.'"  style="border: 1px solid #cccccc" width="'.get_option('my_pagerank_picture_width').'"></a></td>
				  </tr>
				  <tr>
					<td><div align="center"><font color="'. get_option('my_pagerank_text_color').'" size="'.get_option('my_pagerank_font_size').'" face="Arial, Helvetica, sans-serif">Page Rank</font></div></td>
				  </tr>
				</table>
				'; 
			
			
			echo $pr_out_template;
		}

}

function retrieve_pagerank()
{
	$url=  'http://'. $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;
	
	//Set no error reporting
	$Prev_ER = error_reporting(0);
	
	//$pr = file_get_contents("http://www.sajithmr.com/api/prcheck.php?u=".$url);
	
	$pr = getpagerank($url);
	switch(trim($pr))
	{
		case '' : 		return 'pr0.jpg';		
						break;
		case '0'	: 
						return 'pr0.jpg';		
						break;
		case '1'	: 	return 'pr1.jpg';		
						break;
		case '2'	: 	return 'pr2.jpg';		
						break;
		case '3'	: 	return 'pr3.jpg';		
						break;
		case '4'	: 	return 'pr4.jpg';		
						break;
		case '5'	: 	return 'pr5.jpg';		
						break;
		case '6'	: 	return 'pr6.jpg';		
						break;
		case '7'	: 	return 'pr7.jpg';		
						break;
		case '8'	: 	return 'pr8.jpg';		
						break;
		case '9'	: 	return 'pr9.jpg';		
						break;
		case '10'	: 	return 'pr10.jpg';		
						break;
						
		default: 
					return 'null';
					break;				
		
	}
	
	
	
}

function append_pagerank($content)
{
	
	$img = retrieve_pagerank();
	
	$pr_string = '';
	
	if($img != '')
	{
    $pr_string= '<table border="0" style="float:right">
				  <tr>
					<td><a href="http://www.sajithmr.me/wordpress-page-rank-plugin/"><img src="'.get_option('siteurl').'/wp-content/plugins/show-my-pagerank/pr/'.$img.'"  style="border: 1px solid #cccccc" width="'.get_option('my_pagerank_picture_width').'"></a></td>
				  </tr>
				  <tr>
					<td><div align="center"><font color="'. get_option('my_pagerank_text_color').'" size="'.get_option('my_pagerank_font_size').'" face="Arial, Helvetica, sans-serif">'.get_option('my_pagerank_caption').' </font></div></td>
				  </tr>
				</table>
				'; 
	}
	
	if(is_single()  && get_option('my_pagerank_append_post') == 1 )
	return $pr_string.$content;
	else
	return $content;
	
}

function my_pagerank_option()
{

	$options = array("my_pagerank_text_color","my_pagerank_caption","my_pagerank_font_size","my_pagerank_picture_width");
	
	if($_POST['action'] == 'save')
	{
		
		
		if ( ! isset($_POST['my_pagerank_append_post']) )
			update_option(my_pagerank_append_post, "0");
		else
			update_option(my_pagerank_append_post, "1");	
			
			
		foreach($options as $o)
		{	
			if(isset( $_POST[$o]) )
			{
				$val = $_POST[$o];
				update_option($o, $val);
			}	
		}
	}

	$my_pagerank_append_post =  get_option('my_pagerank_append_post');
	$my_pagerank_caption =  get_option('my_pagerank_caption');
	$my_pagerank_text_color =  get_option('my_pagerank_text_color');
	$my_pagerank_font_size =  get_option('my_pagerank_font_size');
	$my_pagerank_picture_width =  get_option('my_pagerank_picture_width');
		

?>
<form action="?page=mypagerank" method="POST">
<input type="hidden" name="action" value="save"/>
<h2><font color="#009900">MyPa</font><font color="#999999">geRan<font color="#FF0000">k</font> 
  Options &gt;&gt;</font></h2>
<table width="32%" height="129" border="0" cellpadding="6" cellspacing="10" bordercolor="#333333">
  <tr bgcolor="#99CCFF"> 
    <td width="34%" height="34" bordercolor="#99CCFF"><font color="#FFFFFF">Append Each Post</font></td>
    <td width="66%" bordercolor="#99CCFF"><input name="my_pagerank_append_post" type="checkbox" value="1" <?php if($my_pagerank_append_post): ?>checked <?php endif;?>></td>
  </tr>
   <tr bgcolor="#99CCFF"> 
    <td height="42" bordercolor="#99CCFF"><font color="#FFFFFF">Caption</font></td>
    <td bordercolor="#99CCFF"><input name="my_pagerank_caption" type="text" value="<? echo $my_pagerank_caption ?>" ></td>
  </tr>
  
  <tr bgcolor="#99CCFF"> 
    <td height="42" bordercolor="#99CCFF"><font color="#FFFFFF">Text-Color</font></td>
    <td bordercolor="#99CCFF"><input name="my_pagerank_text_color" type="text" value="<? echo $my_pagerank_text_color ?>" size="15"></td>
  </tr>
  <tr bgcolor="#99CCFF"> 
    <td height="42" bordercolor="#99CCFF"><font color="#FFFFFF">Font-Size</font></td>
    <td bordercolor="#99CCFF"><input name="my_pagerank_font_size" type="text" value="<? echo $my_pagerank_font_size ?>" size="6">
      px </td>
  </tr>
  <tr bgcolor="#99CCFF"> 
    <td height="42" bordercolor="#99CCFF"><font color="#FFFFFF">Picture Width</font></td>
    <td bordercolor="#99CCFF"><input name="my_pagerank_picture_width" type="text" value="<? echo $my_pagerank_picture_width ?>" size="6">
      px</td>
  </tr>
  <tr> 
    <td height="39" colspan="2" bordercolor="#99CCFF" bgcolor="#99CCFF"><div align="center"> 
        <input type="submit" name="Submit" value="Update Options &raquo;" >
      </div></td>
  </tr>
</table>
* <em>type</em> <strong>&lt;?php wp_show_my_pagerank() ?&gt;</strong> <em>to show 
  your page rank any where in your template (theme editor) </em>
</form>
<?php
}

function my_pagerank_add_admin()
{
	add_options_page('MyPageRank', 'MyPageRank', 7, 'mypagerank', 'my_pagerank_option');
}

function my_pagerank_install()
{ 
	add_option('my_pagerank_append_post', 	"1", "Whether to append each post");
	add_option('my_pagerank_caption', 	'Post Page Rank', "PageRank Text");
	add_option('my_pagerank_text_color', 	'#000000', "PageRank Text Color");
	add_option('my_pagerank_font_size', 	"1", "PageRank Font Size");
	add_option('my_pagerank_picture_width',	"75", "PageRank Picture Width");
	
}


add_action('admin_menu', 'my_pagerank_add_admin');
register_activation_hook(__FILE__,"my_pagerank_install");



/*
 * convert a string to a 32-bit integer
 */
function StrToNum($Str, $Check, $Magic)
{
    $Int32Unit = 4294967296;  // 2^32

    $length = strlen($Str);
    for ($i = 0; $i < $length; $i++) {
        $Check *= $Magic; 	
        //If the float is beyond the boundaries of integer (usually +/- 2.15e+9 = 2^31), 
        //  the result of converting to integer is undefined
        //  refer to http://www.php.net/manual/en/language.types.integer.php
        if ($Check >= $Int32Unit) {
            $Check = ($Check - $Int32Unit * (int) ($Check / $Int32Unit));
            //if the check less than -2^31
            $Check = ($Check < -2147483648) ? ($Check + $Int32Unit) : $Check;
        }
        $Check += ord($Str{$i}); 
    }
    return $Check;
}

/* 
 * Genearate a hash for a url
 */
function HashURL($String)
{
    $Check1 = StrToNum($String, 0x1505, 0x21);
    $Check2 = StrToNum($String, 0, 0x1003F);

    $Check1 >>= 2; 	
    $Check1 = (($Check1 >> 4) & 0x3FFFFC0 ) | ($Check1 & 0x3F);
    $Check1 = (($Check1 >> 4) & 0x3FFC00 ) | ($Check1 & 0x3FF);
    $Check1 = (($Check1 >> 4) & 0x3C000 ) | ($Check1 & 0x3FFF);	
	
    $T1 = (((($Check1 & 0x3C0) << 4) | ($Check1 & 0x3C)) <<2 ) | ($Check2 & 0xF0F );
    $T2 = (((($Check1 & 0xFFFFC000) << 4) | ($Check1 & 0x3C00)) << 0xA) | ($Check2 & 0xF0F0000 );
	
    return ($T1 | $T2);
}

/* 
 * genearate a checksum for the hash string
 */
function CheckHash($Hashnum)
{
    $CheckByte = 0;
    $Flag = 0;

    $HashStr = sprintf('%u', $Hashnum) ;
    $length = strlen($HashStr);
	
    for ($i = $length - 1;  $i >= 0;  $i --) {
        $Re = $HashStr{$i};
        if (1 === ($Flag % 2)) {              
            $Re += $Re;     
            $Re = (int)($Re / 10) + ($Re % 10);
        }
        $CheckByte += $Re;
        $Flag ++;	
    }

    $CheckByte %= 10;
    if (0 !== $CheckByte) {
        $CheckByte = 10 - $CheckByte;
        if (1 === ($Flag % 2) ) {
            if (1 === ($CheckByte % 2)) {
                $CheckByte += 9;
            }
            $CheckByte >>= 1;
        }
    }

    return '7'.$CheckByte.$HashStr;
}

function getpagerank($url) {

$fp = fsockopen("toolbarqueries.google.com", 80, $errno, $errstr, 30);
if (!$fp) {
   return '';
} else {
 $out = "GET /search?client=navclient-auto&ch=".CheckHash(HashURL($url))."&features=Rank&q=info:".$url."&num=100&filter=0 HTTP/1.1\r\n";
$out .= "Host: toolbarqueries.google.com\r\n";
$out .= "User-Agent: Mozilla/4.0 (compatible; GoogleToolbar 2.0.114-big; Windows XP 5.1)\r\n";
$out .= "Connection: Close\r\n\r\n";

   fwrite($fp, $out);
   
   //$pagerank = substr(fgets($fp, 128), 4);
   //echo $pagerank;
   while (!feof($fp)) {
	$data = fgets($fp, 128);
	$pos = strpos($data, "Rank_");
	if($pos === false){} else{
		$pagerank = substr($data, $pos + 9);
		return $pagerank;
	}
   }
   fclose($fp);
   
   }

}

//echo getpagerank('http://www.sajithmr.com');


?>