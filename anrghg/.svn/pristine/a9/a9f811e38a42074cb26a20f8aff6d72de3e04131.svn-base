// phpcs:ignoreFile
/**
 * Format conversion script (draft).
 *
 * @since 0.24.6  experimental
 * @since 0.33.0  demo
 * @package WordPress
 * @subpackage A.N.R.GHG Publishing Toolkit
 * Copyright 2021–2023 ANRGHG
 * This file is part of A.N.R.GHG Publishing Toolkit.
 * A.N.R.GHG Publishing Toolkit is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 * A.N.R.GHG Publishing Toolkit is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with A.N.R.GHG Publishing Toolkit.  If not, see <https://www.gnu.org/licenses/>.
 * @see COPYING.txt
 */

/***
 * Shall convert Markdown style endnotes to inline endnotes.
 *
 * Provisional, demo only.
 */
function convert() {
	let start   = document.getElementById('delimiter_start').textContent;
	let end     = document.getElementById('delimiter_end').textContent;
	let mode    = document.getElementById('mode').textContent;
	let content = '';
	if ( mode === 'visual' ) {
		content = document.getElementById('content').innerHTML;
	}
	if ( mode === 'text' ) {
		content = document.getElementById('gethtml').value;
	}

	/* Draft script removed after 0.60.0b1. Do something: */
	content = start + 'Some reference here.' + end + content;

	document.getElementById('content').innerHTML = content;
	document.getElementById('gethtml').value = content;

	return true;
}
