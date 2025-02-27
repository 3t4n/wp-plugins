<?php

namespace ClickableLinks;

class Plugin
{
    public static function make(): Clickable
    {
        return new Clickable();
    }
}
