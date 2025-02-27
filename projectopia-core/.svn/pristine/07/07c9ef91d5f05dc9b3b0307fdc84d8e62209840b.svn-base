#!/usr/bin/env php
<?php

require_once(dirname(__FILE__).'/bootstrap.php');
// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
$sSource = file_get_contents('php://stdin');
$oParser = new Sabberworm\CSS\Parser(esc_html($sSource));

$oDoc = $oParser->parse();
echo "\n".'#### Input'."\n\n```css\n";
print esc_html($sSource);

echo "\n```\n\n".'#### Structure (`var_dump()`)'."\n\n```php\n";
var_dump($oDoc);

echo "\n```\n\n".'#### Output (`render()`)'."\n\n```css\n";
// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
print $oDoc->render();

echo "\n```\n";

