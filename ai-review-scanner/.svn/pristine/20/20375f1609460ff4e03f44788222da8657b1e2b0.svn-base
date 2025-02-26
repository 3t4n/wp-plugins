<?php

namespace AIReviewScanner\WPBones\Html;

class Html
{
    protected static $htmlTags = [
    'a'        => '\AIReviewScanner\WPBones\Html\HtmlTagA',
    'button'   => '\AIReviewScanner\WPBones\Html\HtmlTagButton',
    'checkbox' => '\AIReviewScanner\WPBones\Html\HtmlTagCheckbox',
    'datetime' => '\AIReviewScanner\WPBones\Html\HtmlTagDatetime',
    'fieldset' => '\AIReviewScanner\WPBones\Html\HtmlTagFieldSet',
    'form'     => '\AIReviewScanner\WPBones\Html\HtmlTagForm',
    'input'    => '\AIReviewScanner\WPBones\Html\HtmlTagInput',
    'label'    => '\AIReviewScanner\WPBones\Html\HtmlTagLabel',
    'optgroup' => '\AIReviewScanner\WPBones\Html\HtmlTagOptGroup',
    'option'   => '\AIReviewScanner\WPBones\Html\HtmlTagOption',
    'select'   => '\AIReviewScanner\WPBones\Html\HtmlTagSelect',
    'textarea' => '\AIReviewScanner\WPBones\Html\HtmlTagTextArea',
  ];

    public static function __callStatic($name, $arguments)
    {
        if (in_array($name, array_keys(self::$htmlTags))) {
            $args = (isset($arguments[ 0 ]) && ! is_null($arguments[ 0 ])) ? $arguments[ 0 ] : [];

            return new self::$htmlTags[ $name ]($args);
        }
    }
}
