<?php
/*
Plugin Name: CommentCaVa
Description: First read, then comment
Version: 1.0.1
Author: Herbert Braun
Author URI: http://woerter.de
License: GPL2

    Copyright 2013-4  Herbert Braun  (email: wortwart@woerter.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
wp_enqueue_script("CommentCaVa", plugins_url() . "/commentcava/CommentCaVa.js");
?>