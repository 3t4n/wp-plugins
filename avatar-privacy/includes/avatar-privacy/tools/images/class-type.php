<?php
/**
 * This file is part of Avatar Privacy.
 *
 * Copyright 2018-2020 Peter Putzer.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 *  ***
 *
 * @package mundschenk-at/avatar-privacy
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 */

namespace Avatar_Privacy\Tools\Images;

use Avatar_Privacy\Tools\Images\Image_File;

/**
 * An abstract class for MIME type and extension handling.
 *
 * @since 2.0.0
 *
 * @deprecated 2.4.0 Use the constants in Avatar_Privacy\Tools\Images\Image_File instead.
 *
 * @author Peter Putzer <github@mundschenk.at>
 */
abstract class Type {
	const JPEG_IMAGE = Image_File::JPEG_IMAGE;
	const PNG_IMAGE  = Image_File::PNG_IMAGE;
	const SVG_IMAGE  = Image_File::SVG_IMAGE;

	const JPEG_EXTENSION     = Image_File::JPEG_EXTENSION;
	const JPEG_ALT_EXTENSION = Image_File::JPEG_ALT_EXTENSION;
	const PNG_EXTENSION      = Image_File::PNG_EXTENSION;
	const SVG_EXTENSION      = Image_File::SVG_EXTENSION;

	const CONTENT_TYPE = [
		self::JPEG_EXTENSION     => self::JPEG_IMAGE,
		self::JPEG_ALT_EXTENSION => self::JPEG_IMAGE,
		self::PNG_EXTENSION      => self::PNG_IMAGE,
		self::SVG_EXTENSION      => self::SVG_IMAGE,
	];

	const FILE_EXTENSION = [
		self::JPEG_IMAGE => self::JPEG_EXTENSION,
		self::PNG_IMAGE  => self::PNG_EXTENSION,
		self::SVG_IMAGE  => self::SVG_EXTENSION,
	];
}
