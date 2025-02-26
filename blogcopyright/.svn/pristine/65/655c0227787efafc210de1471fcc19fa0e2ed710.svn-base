<?php
/*  Copyright 2015 - 2016  Blog Traffic Exchange
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, see {License URI}
*/
function bte_bc_footer() {
	$bte_bc_add = true;
	if ($bte_bc_add) {
		echo bte_bc_get_html();
	}
}


function bte_bc_get_html() {
	$cr_start='';
	$cr_end='';

	$bte_bc_html_tag = get_option('bte_bc_html_tag');
	if (!isset($bte_bc_html_tag)) { $bte_bc_html_tag="div"; }
	if ($bte_bc_html_tag=="div"){$cr_start.="<div style=\"font-size:10px; font-family:Arial, Serif;\" "; $cr_end="</div>";}
	if ($bte_bc_html_tag=="p"){$cr_start.="<p style=\"font-size:10px; font-family:Arial, Serif;\" ";  $cr_end="</p>";}
	if ($bte_bc_html_tag=="span"){$cr_start.="<span style=\"font-size:10px; font-family:Arial, Serif;\" "; $cr_end="</span>";}
		
	$bte_bc_align = get_option('bte_bc_align');
	if (!isset($bte_bc_align)) { $bte_bc_align="center"; }
	$cr_start.="align='".$bte_bc_align."'";
	$cr_start.=">Copyright &copy; ";
	
	$bte_bc_year = get_option('bte_bc_year');
	if (!isset($bte_bc_year)) { $bte_bc_year=date('Y'); }
	if ($bte_bc_year>=date('Y'))
		$cr_start.=$bte_bc_year;
	else
		$cr_start.=$bte_bc_year." - ".date('Y');
	$cr_start.=" ";
	
	$bte_bc_org_html_tag = get_option('bte_bc_org_html_tag');
	if (!isset($bte_bc_org_html_tag)) { $bte_bc_org_html_tag='strong'; }
	$cr_start.="<".$bte_bc_org_html_tag.">";
	
	$bte_bc_url = get_option('bte_bc_url');
	if (!isset($bte_bc_url)) { $bte_bc_url=get_bloginfo('url'); }
	
	$bte_bc_org_name = get_option('bte_bc_org_name');
	if (!isset($bte_bc_org_name)) { $bte_bc_org_name=get_bloginfo('name'); }
	$cr_start.="<a href='".$bte_bc_url."' target='_blank'>".$bte_bc_org_name."</a></".$bte_bc_org_html_tag.">. ";
	
	$bte_bc_rights = get_option('bte_bc_rights');
	if (!isset($bte_bc_rights)) { $bte_bc_rights='All Rights Reserved'; }
	$cr_start.=trim($bte_bc_rights);
	if ($bte_bc_rights!="")
		$cr_start.='.';
	$cr_start.=" ";	
	
	$link = 'Notice by <a href="http://www.blogtrafficexchange.com/blog-copyright" target="_blank">Blog Copyright</a><br><br>';

	$copyright=stripslashes($cr_start.$link.$cr_end);
	$bte_bc_add = get_option('bte_bc_add');
	if (isset($bte_bc_add) && $bte_bc_add==1) {
		return $copyright;
	}
} ?>