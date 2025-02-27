<?php

namespace UKRSOLGENERATORSVG\Reading;

use UKRSOLGENERATORSVG\Nodes\SVGGenericNodeType;
use UKRSOLGENERATORSVG\Nodes\SVGNode;
use UKRSOLGENERATORSVG\Nodes\SVGNodeContainer;
use UKRSOLGENERATORSVG\SVG;
use UKRSOLGENERATORSVG\Utilities\SVGStyleParser;

class SVGReader
{
    private static $nodeTypes = array(
        'svg' => 'UKRSOLGENERATORSVG\Nodes\Structures\SVGDocumentFragment',
        'g' => 'UKRSOLGENERATORSVG\Nodes\Structures\SVGGroup',
        'defs' => 'UKRSOLGENERATORSVG\Nodes\Structures\SVGDefs',
        'style' => 'UKRSOLGENERATORSVG\Nodes\Structures\SVGStyle',
        'rect' => 'UKRSOLGENERATORSVG\Nodes\Shapes\SVGRect',
        'circle' => 'UKRSOLGENERATORSVG\Nodes\Shapes\SVGCircle',
        'ellipse' => 'UKRSOLGENERATORSVG\Nodes\Shapes\SVGEllipse',
        'line' => 'UKRSOLGENERATORSVG\Nodes\Shapes\SVGLine',
        'polygon' => 'UKRSOLGENERATORSVG\Nodes\Shapes\SVGPolygon',
        'polyline' => 'UKRSOLGENERATORSVG\Nodes\Shapes\SVGPolyline',
        'path' => 'UKRSOLGENERATORSVG\Nodes\Shapes\SVGPath',
        'image' => 'UKRSOLGENERATORSVG\Nodes\Embedded\SVGImage',
        'text' => 'UKRSOLGENERATORSVG\Nodes\Texts\SVGText',
        'textPath' => 'UKRSOLGENERATORSVG\Nodes\Texts\SVGTextPath',
        'title' => 'UKRSOLGENERATORSVG\Nodes\Texts\SVGTitle',
    );
    private static $styleAttributes = array(
        'font', 'font-family', 'font-size', 'font-size-adjust', 'font-stretch',
        'font-style', 'font-variant', 'font-weight',
        'direction', 'letter-spacing', 'word-spacing', 'text-decoration',
        'unicode-bidi',
        'clip', 'color', 'cursor', 'display', 'overflow', 'visibility',
        'clip-path', 'clip-rule', 'mask', 'opacity',
        'enable-background', 'filter', 'flood-color', 'flood-opacity',
        'lighting-color',
        'stop-color', 'stop-opacity',
        'pointer-events',
        'color-interpolation', 'color-interpolation-filters', 'color-profile',
        'color-rendering', 'fill', 'fill-opacity', 'fill-rule',
        'image-rendering', 'marker', 'marker-end', 'marker-mid', 'marker-start',
        'shape-rendering', 'stroke', 'stroke-dasharray', 'stroke-dashoffset',
        'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit',
        'stroke-opacity', 'stroke-width', 'text-rendering',
        'alignment-base', 'baseline-shift', 'dominant-baseline',
        'glyph-orientation-horizontal', 'glyph-orientation-vertical', 'kerning',
        'text-anchor', 'writing-mode',
    );

    public function parseString($string)
    {
        $xml = simplexml_load_string($string);
        return $this->parseXML($xml);
    }

    public function parseFile($filename)
    {
        $xml = simplexml_load_file($filename);
        return $this->parseXML($xml);
    }

    public function parseXML(\SimpleXMLElement $xml)
    {
        $name = $xml->getName();
        if ($name !== 'svg') {
            return null;
        }

        $width = isset($xml['width']) ? $xml['width'] : null;
        $height = isset($xml['height']) ? $xml['height'] : null;
        $namespaces = $xml->getNamespaces(true);

        $img = new SVG($width, $height, $namespaces);

        $nsKeys = array_keys($namespaces);

        $doc = $img->getDocument();
        $this->applyAttributes($doc, $xml, $nsKeys);
        $this->applyStyles($doc, $xml);
        $this->addChildren($doc, $xml, $nsKeys);

        return $img;
    }

    private function applyAttributes(SVGNode $node, \SimpleXMLElement $xml,
        array $namespaces) {
        if (!in_array('', $namespaces, true) && !in_array(null, $namespaces, true)) {
            $namespaces[] = '';
        }

        foreach ($namespaces as $ns) {
            foreach ($xml->attributes($ns, true) as $key => $value) {
                if ($key === 'style') {
                    continue;
                }
                if (in_array($key, self::$styleAttributes)) {
                    $node->setStyle($key, $value);
                    continue;
                }
                if (!empty($ns) && $ns !== 'svg') {
                    $key = $ns . ':' . $key;
                }
                $node->setAttribute($key, $value);
            }
        }
    }

    private function applyStyles(SVGNode $node, \SimpleXMLElement $xml)
    {
        if (!isset($xml['style'])) {
            return;
        }

        $styles = SVGStyleParser::parseStyles($xml['style']);
        foreach ($styles as $key => $value) {
            $node->setStyle($key, $value);
        }
    }

    private function addChildren(SVGNodeContainer $node, \SimpleXMLElement $xml,
        array $namespaces) {
        foreach ($xml->children() as $child) {
            $node->addChild($this->parseNode($child, $namespaces));
        }
    }

    private function parseNode(\SimpleXMLElement $xml, array $namespaces)
    {
        $type = $xml->getName();

        if (isset(self::$nodeTypes[$type])) {
            $call = array(self::$nodeTypes[$type], 'constructFromAttributes');
            $node = call_user_func($call, $xml);
        } else {
            $node = new SVGGenericNodeType($type);
        }

        $this->applyAttributes($node, $xml, $namespaces);
        $this->applyStyles($node, $xml);
        $node->setValue($xml);

        if ($node instanceof SVGNodeContainer) {
            $this->addChildren($node, $xml, $namespaces);
        }

        return $node;
    }
}
