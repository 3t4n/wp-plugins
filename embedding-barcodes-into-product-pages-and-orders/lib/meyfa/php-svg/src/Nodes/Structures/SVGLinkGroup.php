<?php

namespace UKRSOLGENERATORSVG\Nodes\Structures;

use UKRSOLGENERATORSVG\Nodes\SVGNodeContainer;

class SVGLinkGroup extends SVGNodeContainer
{
    const TAG_NAME = 'a';

    public function __construct()
    {
        parent::__construct();
    }
}
