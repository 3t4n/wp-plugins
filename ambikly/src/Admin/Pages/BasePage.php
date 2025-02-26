<?php

namespace Ambikly\Admin\Pages;

use Ambikly\Admin\UIComponents;
use Ambikly\Controllers\ProductController;
use Ambikly\Options\ProductOptions;

abstract class BasePage
{
    protected $page_id;

    protected $data;

    protected $action;

    protected $id = 0;

    protected $page_title;

    protected $options = [];

    public function __construct()
    {

        $id = isset($_GET['id']) ? absint($_GET['id']) : 0;

        $action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : '';

        if ($action != 'edit' && $id != 0) {
            return;
        }
        $this->id = $id;
        $this->action = $action;
    }

    public function Options()
    {
        return $this->options;
    }

    public function Render($section_id)
    {

        $all_options = $this->Options();

        $options = $all_options[$section_id] ?? [];

        $data = $this->data;

        if (!is_array($options) || count($options) < 1) {
            return;
        }

        UIComponents::metabox(function () use ($options, $data) {

            foreach ($options as $option) {

                $optionName = $option['name'] ?? '';

                if (isset($data[$optionName])) {

                    UIComponents::field($option, $data[$optionName]);

                } else {

                    UIComponents::field($option);
                }
            }
        }, '', $section_id, '');


    }
}