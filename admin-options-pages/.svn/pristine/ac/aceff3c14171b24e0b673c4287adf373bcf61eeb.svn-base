<?php

namespace AOP\App\Admin;

use AOP\App\Data;
use AOP\App\Database\DB;
use AOP\App\Admin\AdminPages\SubpageEdit;
use Illuminate\Support\Collection;

class ListTable extends WPListTable
{
    public function __construct()
    {
        parent::__construct([
            'singular' => 'optionpage',
            'plural' => 'optionpages',
            'screen' => isset($args['screen']) ? $args['screen'] : null,
            'ajax' => false
        ]);
    }

    public function column_default($item, $columnName)
    {
        switch ($columnName) {
            case 'position':
            case 'pages':
                return $item[$columnName];

            default:
                return print_r($item, true);
        }
    }

    // public function column_cb($item)
    // {
    //     return sprintf('<input type="checkbox" name="%1$s[]" value="%2$s" />', $this->_args['singular'], $item['ID']);
    // }

    public function get_columns()
    {
        return [
            // 'cb' => '<input type="checkbox" />',
            'title' => _x('Menu', 'media modal menu', 'admin-options-pages') . ' ' . __('Title', 'admin-options-pages'),
            'position' => __('Position', 'admin-options-pages'),
            'pages' => __('Pages', 'admin-options-pages'),
            // 'menu_type' => 'Menu type'
        ];
    }

    protected function get_views()
    {
        return [
            'all' => '<a href="#">All</a>',
            'published' => '<a href="#">Published</a>',
            'trashed' => '<a href="#">Trashed</a>'
        ];
    }

    public function get_sortable_columns()
    {
        return [
            'title' => ['title', false],
            'pages' => ['pages', false],
            'position' => ['position', true]
        ];
    }

    public function get_bulk_actions()
    {
        return [
            // 'delete' => 'Delete'
        ];
    }

    private function bulkActionDeleteArray()
    {
        if ('delete' !== $this->current_action() || !isset($_REQUEST['optionpage']) || !isset($_REQUEST['_wpnonce'])) {
            return;
        }

        list($nonce, $ids) = [$_REQUEST['_wpnonce'], $_REQUEST['optionpage']];

        if (!wp_verify_nonce($nonce, 'bulk-' . $this->_args['plural'])) {
            return;
        }

        $ids = Collection::make($ids);

        $ids->map(function ($id) {
            return Data::getOptionNamesFromSettingPagesById($id)->all();
        })->flatten(1)->map(function ($optionName) {
            return delete_option($optionName);
        });

        $ids->map(function ($id) {
            return DB::deleteRowById($id);
        });
    }

    private function bulkActionDeleteSingle()
    {
        if ('delete' !== $this->current_action() || !isset($_REQUEST['optionpage']) || !isset($_REQUEST['nonce'])) {
            return;
        }
    }

    public function processBulkActions()
    {
        $this->bulkActionDeleteArray();
    }

    public function prepare_items()
    {
        $recordsPerPage = 20;

        $this->_column_headers = [
            $this->get_columns(),
            [],
            $this->get_sortable_columns()
        ];

        // $this->processBulkActions();

        $data = Data::listTableData()->all();

        $usortReorder = function ($a, $b) {
            $orderby = (!empty($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : 'position';
            $order   = (!empty($_REQUEST['order'])) ? $_REQUEST['order'] : 'asc';

            if ($a[$orderby] === $b[$orderby]) {
                return 0;
            }

            if ($order === 'asc') {
                return ($a[$orderby] < $b[$orderby]) ? -1 : 1;
            }

            return ($a[$orderby] > $b[$orderby]) ? -1 : 1;
        };

        usort($data, $usortReorder);

        $totalItems = count($data);

        $this->items = array_slice($data, (($this->get_pagenum() - 1) * $recordsPerPage), $recordsPerPage);

        $this->set_pagination_args([
            'total_items' => $totalItems,
            'per_page' => $recordsPerPage,
            'total_pages' => ceil($totalItems / $recordsPerPage)
        ]);
    }
}
