<?php

// ----------------------------------------------------------------------------------------------------------------------------------------------------------
//					JOOMOOD START PLAYING
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

// SHOW LAST SE X PUBLIC POLLS

    include(ABSPATH.'wp-content/plugins/giggi_functions/giggi_database.php');
    require_once(ABSPATH.'wp-content/plugins/giggi_functions/giggi_functions.php');


// Check some data...

if($nametype=="1" OR $nametype=="2") {
$nametypez=$nametype;
} else {
$nametypez="2";
}

		// Check for hidden description
		
		$hiddesc=strtolower($hide_desc);
		if($hiddesc=="yes") {
		$hide_desc="yes";
		} else {
		$hide_desc="no";
		}

		// Check the group description cut-off point
		
        if (!$cut_off=="") {
        $cut="1";
        } else {
        $cut="0";  // vuol dire che l'utente non ha inserito un numero!
        }

		// Check for Splitted Stats
		
		$split_stat=strtolower($split_stat);
		if($split_stat=="yes") {
		$split="1";
		} else {
		$split="0";
		}
		
		// Check if Stats are Showed
		
		$show_stat=strtolower($show_stat);
		if($show_stat=="yes") {
		$shows="1";
		} else {
		$shows="0";
		}
		
		// Check personal width & height...

        if (preg_match ("/^([0-9.,-]+)$/", $pic_dim_width)) {
        $my_w="1";
        } else {
        $my_w="0";  // vuol dire che l'utente non ha inserito un numero!
        }
        if (preg_match ("/^([0-9.,-]+)$/", $pic_dim_height)) {
        $my_h="1";
        } else {
        $my_h="0";  // vuol dire che l'utente non ha inserito un numero!
        }

        if($pic_dim_width=="0" OR $pic_dim_height=="0" OR $pic_dim_width=="" OR $pic_dim_height=="" OR $my_w=="0" OR $my_h=="0") {
        $pic_dimensions="0";
        } else {
        $pic_dimensions="1";
        }

        if($pic_dimensions =="1") {
		
		$mywidth=$pic_dim_width;
		$myheight=$pic_dim_height;
		
		} else {
		$mywidth="60";
		$myheight="60";
		
		}

		// Check Num of Groups...

		if($numOfGroup<0) {
		$numOfGroup=1;
		}

		if($how_many_groups>$numOfGroup) {
		$how_many_groups=$numOfGroup;
		}
		
// ---------------------------------------------------------

		// Check Main Box border style
		
		if ($mainbox_border_style=="0" OR $mainbox_border_style=="1" OR $mainbox_border_style=="2") {
		$mainbox_border_res="1";
		} else {
		$mainbox_border_res="0";
		}

		// Check Main Box border color
		
		if ($mainbox_border_color!=='') {
		$mainbox_bordercol_res="1";
		} else {
		$mainbox_bordercol_res="0";
		}

		// Substitute empty or wrong fields
		
		if ($mainbox_border_res=="0") {
		$mainboxbord="0px solid";
		} 
		
		if ($mainbox_border_style=="1") {
		$mainboxbord="{$mainbox_border_dim}px dotted";
		} 
		
		if ($mainbox_border_style=="2") {
		$mainboxbord="{$mainbox_border_dim}px solid";
		} 
		

		if ($mainbox_bordercol_res=="0") {
		$mainboxbordcol="#ffffff";
		} else {
		$mainboxbordcol=$mainbox_border_color;
		}
		
		$mainboxbgcol=$mainbox_bg_color;

		$mainbox_width=$mainbox_width."%";
		
		if($mainbox_width=="" || $mainbox_width=="%") {
		$mainbox_width="100%";
		}


// ---------------------------------------------------------

		
		
		// Check Inner Box border style
		
		if ($box_border_style=="0" OR $box_border_style=="1" OR $box_border_style=="2") {
		$box_border_res="1";
		} else {
		$box_border_res="0";
		}

		// Check box border color
		
		if ($box_border_color!=='') {
		$box_bordercol_res="1";
		} else {
		$box_bordercol_res="0";
		}
		
		
		// Substitute empty or wrong fields
		
		if ($box_border_res=="0") {
		$boxbord="0px solid";
		} 
		
		if ($box_border_style=="1") {
		$boxbord="{$box_border_dim}px dotted";
		} 
		
		if ($box_border_style=="2") {
		$boxbord="{$box_border_dim}px solid";
		} 
		

		if ($box_bordercol_res=="0") {
		$boxbordcol="#ffffff";
		} else {
		$boxbordcol=$box_border_color;
		}
		
		$boxbgcol=$box_bg_color;
		$boxbgcol1=$box_bg_color1;
		

		// Build Full Style Variables
		
		$mystyle="style=\"border:".$boxbord." ".$boxbordcol."; background-color: ".$boxbgcol.";\"";
		$mystyle0="style=\"border:".$boxbord." ".$boxbordcol."; background-color: ".$boxbgcol.";\"";
		$mystyle1="style=\"border:".$boxbord." ".$boxbordcol."; background-color: ".$boxbgcol1.";\"";
		$mymainstyle="style=\"border:".$mainboxbord." ".$mainboxbordcol."; background-color: ".$mainboxbgcol.";\"";
		$titlestyle="padding: 0px 2px 2px 0px; border-bottom: 1px solid #CCCCCC; margin-bottom: 4px;";
		$bodystyle="margin-bottom: 0px;";
		$statstyle="font-size: 7pt; color: #777777; font-weight: normal;";
		$smalltxt="font-size:90%;";



// ----------------------------------------------------------------------------------------------------------------------------------------------------------
//					LET'S START QUERY TO RETRIEVE OUR DATA
// ----------------------------------------------------------------------------------------------------------------------------------------------------------


$query="SELECT a.*, b.* FROM se_polls a LEFT JOIN se_users b ON (a.poll_user_id=b.user_id)
WHERE a.poll_privacy='63' ORDER by a.poll_datecreated DESC LIMIT ".$numOfGroup."";

$result = mysql_query($query);

$i=0;

while($row = mysql_fetch_array($result, MYSQL_ASSOC))

{
	
$miovalore= giggitime2($row['poll_datecreated'], $num_times=1).' ago';


// Choose a name...

if ($nametypez=="2") {
$mynome=$row['user_displayname'];
} else {
$mynome=$row['user_username'];
}


// Cut a little bit the group description field...

$mydesc = $row['poll_title'];

if($cut=="0" OR $cut_off=="0" OR $cut_off=="") {
$shortdesc=$mydesc;
} else {
$shortdesc = substr($mydesc,0,$cut_off)."...";
}


$mydir=$wpdir."/wp-content/plugins/wp-se_polls";
$subdir = $row['user_id']+999-(($row['user_id']-1)%1000);


if($use_resize !=="no") { // RESIZING SCRIPT

if ($row['user_photo']!='') {
// Creates a thumbnail based on your personal dims (width/height), without stretching the original pic
$mypic="<img src=\"{$mydir}/image.php/{$row['user_photo']}?width={$mywidth}&amp;height={$myheight}&amp;cropratio=1:1&amp;quality=100&amp;image={$socialdir}/uploads_user/{$subdir}/{$row['user_id']}/{$row['user_photo']}\" style=\"border:".$image_border."px solid ".$image_bordercolor."\" alt=\"".$myn."\" />";
} else {
$mypic="<img src=\"{$mydir}/image.php/nophoto.gif?width={$mywidth}&amp;height={$myheight}&amp;cropratio=1:1&amp;quality=100&amp;image={$socialdir}/{$empty_image_url}\" style=\"border:".$image_border."px ".$image_bordercolor." solid\" alt=\"".$myn."\" />";
}

} else { // NO RESIZING SCRIPT

if ($row['user_photo']!='') {
// Creates a thumbnail based on your personal dims (width/height)
$myp=str_replace(".", "_thumb.", $row['user_photo']);
$mypfile=$socialdir."/uploads_user/{$subdir}/{$row['user_id']}/{$myp}";

if (@fopen($mypfile, "r")) {
$myps=str_replace(".", "_thumb.", $row['user_photo']);
$mypfile=$socialdir."/uploads_user/{$subdir}/{$row['user_id']}/{$myps}";
} else {
$mypfile=$socialdir."/uploads_user/{$subdir}/{$row['user_id']}/{$row['user_photo']}";
}

$mypic="<img src=\"{$mypfile}\" width=\"{$mywidth}\" height=\"{$myheight}\" style=\"border:".$image_border."px solid ".$image_bordercolor."\" alt=\"".$myn."\" />";
} else {
$mypic="<img src=\"{$socialdir}/{$empty_image_url}\" width=\"{$mywidth}\" height=\"{$myheight}\" style=\"border:".$image_border."px ".$image_bordercolor." solid\" alt=\"".$myn."\" />";
}

}



// Create a link to the poll

$mylink="<a href=\"".$socialdir."/poll.php?user={$row['user_username']}&amp;poll_id={$row['poll_id']}\" title=\"".$go_profile_text1." {$row['poll_title']}\">";

// Create a link to the poll leader

$mylink1="<a href=\"".$socialdir."/profile.php?user_id=".$row['user_id']."\" title=\"{$go_profile_text} {$mynome}\">";


if ($pp%2 !==0) {
$mystyle=$mystyle1;
} else {
$mystyle=$mystyle0;
}


// Comment-Comments? View-Views? - Vote-Votes?

if($row['poll_totalcomments']>1 && $row['poll_comments']=="63") {
$comment="<a href=\"{$socialdir}/poll.php?user={$row['user_username']}&amp;poll_id={$row['poll_id']}\">{$row['poll_totalcomments']} Comments</a>";
} else 
if($row['poll_totalcomments']==1 && $row['poll_comments']=="63") {
$comment="<a href=\"{$socialdir}/poll.php?user={$row['user_username']}&amp;poll_id={$row['poll_id']}\">1 Comment</a>";
} else {
$comment="No Comment";
}
if($row['poll_totalvotes']>1) {
$vote="{$row['poll_totalvotes']} Votes";
} else 
if($row['poll_totalvotes']==1) {
$vote="1 Vote";
} else {
$vote="No Vote";
}
if($row['poll_views']>1) {
$view="{$row['poll_views']} Views";
} else 
if($row['poll_views']==1) {
$view="1 View";
} else {
$view="No View";
}


$icona="<img src=\"{$socialdir}/images/icons/poll_action_newpoll.gif\" width=\"16\" height=\"16\" alt=\"\" />";

if($i<$how_many_groups) {

$rows .= "
<td align=\"left\" valign=\"top\">
<table width=\"100%\" cellspacing=\"{$inner_cellspacing}\" cellpadding=\"{$inner_cellpadding}\" ".$mystyle.">
<tr>
<td width=\"100%\" align=\"left\"><div style=\"{$titlestyle}\">{$icona}&nbsp;&nbsp;{$mylink}{$shortdesc}</a></div></td>
</tr>
<tr>
<td width=\"100%\" align=\"left\" valign=\"top\" style=\"{$smalltxt}\">Created {$miovalore} by {$mylink1}{$mynome}</a>
<br />{$vote}, {$comment}, {$view}</td>
</tr>
</table>
</td>
";

} else {

$rows .= "
</tr><tr><td align=\"left\" valign=\"top\">
<table width=\"100%\" cellspacing=\"{$inner_cellspacing}\" cellpadding=\"{$inner_cellpadding}\" ".$mystyle.">
<tr>
<td width=\100%\" align=\"left\"><div style=\"{$titlestyle}\">{$icona}&nbsp;&nbsp;{$mylink}{$shortdesc}</a></div></td>
</tr>
<tr>
<td width=\"100%\" align=\"left\" valign=\"top\" style=\"{$smalltxt}\">Created {$miovalore} by {$mylink1}{$mynome}</a>
<br />{$vote}, {$comment}, {$view}</td>
</tr>
</table>
</td>
";
$i=0;
}

$i++;
$pp++;

}

$content .=" <table width=\"{$mainbox_width}\" cellspacing=\"{$outer_cellspacing}\" cellpadding=\"{$outer_cellpadding}\" bgcolor=\"{$mainbox_bg_color}\" {$mymainstyle}><tr>";

$content .="{$rows}";

$content .="</tr></table>";

echo $content;


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
//					END OF JOOMOOD FUNNY TOY
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

?>