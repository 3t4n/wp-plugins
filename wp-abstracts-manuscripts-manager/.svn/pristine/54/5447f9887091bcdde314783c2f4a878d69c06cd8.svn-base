<?php

namespace Mpdf\Fonts;

class FontFileFinder
{

	private $directories;

	public function __construct($directories)
	{
		$this->setDirectories($directories);
	}

	public function setDirectories($directories)
	{
		if (!is_array($directories)) {
			$directories = [$directories];
		}

		$this->directories = $directories;
	}

	public function findFontFile($name)
	{
		foreach ($this->directories as $directory) {
			$filename = $directory . '/' . $name;
			if (file_exists($filename)) {
				return $filename;
			}
		}
		// fall back by Kevon 11/04/2021
		$filename = $directory . '/DejaVuSerif.ttf';
		if (file_exists($filename)) {
			return $filename;
		} else {
			throw new \Mpdf\MpdfException(sprintf('Cannot find TTF TrueType font file "%s" in configured font directories.', $name));
		}

	}
}
