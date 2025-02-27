<?php
/**
 * (C) Copyright 2011-2025 by Kolja Nolte
 * kolja.nolte@gmail.com
 * https://www.kolja-nolte.com
 *
 * Secondary Title is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Secondary Title is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * @package secondary-title
 * @see     https://wordpress.org/plugins/secondary-title
 */

/** Stop script when the file is called directly */
if ( ! function_exists( "add_action" ) ) {
	die( "403 - You are not authorized to view this page." );
}

/**
 * Marks the function 'secondary_title_print_html_info_circle' as deprecated.
 *
 * This function is deprecated as of version 2.2.0 and suggests using
 * 'secondary_title_documentation_icon' instead.
 *
 * @deprecated 2.2.0 Use secondary_title_documentation_icon() instead.
 */
function secondary_title_print_html_info_circle() {
	_deprecated_function(
		__FUNCTION__,
		'2.2.0',
		'secondary_title_documentation_icon',
	);
}