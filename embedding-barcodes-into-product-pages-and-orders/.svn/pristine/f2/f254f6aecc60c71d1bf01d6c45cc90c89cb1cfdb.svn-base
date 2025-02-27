<?php

namespace UKRSOLGENERATORSVG;

use UKRSOLGENERATORSVG\Nodes\Structures\SVGDocumentFragment;
use UKRSOLGENERATORSVG\Rasterization\SVGRasterizer;
use UKRSOLGENERATORSVG\Reading\SVGReader;
use UKRSOLGENERATORSVG\Writing\SVGWriter;

class SVG
{
    private static $reader;

    private $document;

    public function __construct($width, $height, array $namespaces = array())
    {
        $this->document = new SVGDocumentFragment($width, $height, $namespaces);
    }

    public function getDocument()
    {
        return $this->document;
    }

    public function toRasterImage($width, $height, $background = null)
    {
        $docWidth  = $this->document->getWidth();
        $docHeight = $this->document->getHeight();
        $viewBox = $this->document->getViewBox();

        $rasterizer = new SVGRasterizer($docWidth, $docHeight, $viewBox, $width, $height, $background);
        $this->document->rasterize($rasterizer);

        return $rasterizer->finish();
    }

    public function __toString()
    {
        return $this->toXMLString();
    }

    public function toXMLString($standalone = true)
    {
        $writer = new SVGWriter($standalone);
        $writer->writeNode($this->document);

        return $writer->getString();
    }

    public static function fromString($string)
    {
        return self::getReader()->parseString($string);
    }

    public static function fromFile($file)
    {
        return self::getReader()->parseFile($file);
    }

    private static function getReader()
    {
        if (!isset(self::$reader)) {
            self::$reader = new SVGReader();
        }
        return self::$reader;
    }
}
