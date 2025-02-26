<?php 
/* 	Copyright 2015 - 2016  Blog Traffic Exchange
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
function bte_bc_deactivate() {
	delete_option('bte_bc_html_tag');
	delete_option('bte_bc_align');
	delete_option('bte_bc_year');
	delete_option('bte_bc_org_name');
	delete_option('bte_bc_org_html_tag');
	delete_option('bte_bc_url');
	delete_option('bte_bc_rights');
	delete_option('bte_bc_add');
	delete_option('bte_bc_link');
}

function bte_bc_activate() {
	add_option('bte_bc_html_tag','div');
	add_option('bte_bc_align','center');
	add_option('bte_bc_year',date('Y'));
	add_option('bte_bc_org_name',get_bloginfo('name'));
	add_option('bte_bc_org_html_tag','strong');
	add_option('bte_bc_url',get_bloginfo('url'));
	add_option('bte_bc_rights','All Rights Reserved');
	add_option('bte_bc_add',true);
	add_option('bte_bc_link',true);
} 
?>