<?php

namespace Brickdots\AdminTodotastic;

use Brickdots\AdminTodotastic\base\Core as BaseCore;
use Brickdots\AdminTodotastic\rest\TodoController;
use Brickdots\AdminTodotastic\view\metabox\Metabox;
use Brickdots\AdminTodotastic\view\dashboard\Board;
use Corcel\Database;

// @codeCoverageIgnoreStart
defined('ABSPATH') or die('No script kiddies please!'); // Avoid direct file request
// @codeCoverageIgnoreEnd

/**
 * Singleton core class which handles the main system for plugin. It includes
 * registering of the autoload, all hooks (actions & filters) (see BaseCore class).
 */
class Core extends BaseCore {
    /**
     * Singleton instance.
     */
    private static $me;

    /**
     * Application core constructor.
     */
    protected function __construct() {
        parent::__construct();
        // Load corcel including eloquent
        $this->loadCorcel();
    }

    /**
     * The init function is fired even the init hook of WordPress. If possible
     * it should register all hooks to have them in one place.
     */
    public function init() {
        // Register all your hooks here
        add_action('rest_api_init', [TodoController::instance(), 'rest_api_init']);
        add_action('add_meta_boxes', [Metabox::instance(), 'addMetabox']);
        add_action('admin_enqueue_scripts', [$this->getAssets(), 'admin_enqueue_scripts']);
        add_action('wp_enqueue_scripts', [$this->getAssets(), 'wp_enqueue_scripts']);
        add_action( 'wp_dashboard_setup', [Board::instance(), 'addMetabox']);
        add_filter( 'wp_mail_content_type', [$this, 'wpdocs_set_html_mail_content_type'] );
    }

    public function wpdocs_set_html_mail_content_type() {
        return 'text/html';
    }

    /**
     * Get singleton core class.
     *
     * @return Core
     */
    public static function getInstance() {
        return !isset(self::$me) ? (self::$me = new Core()) : self::$me;
    }

    private function loadCorcel() {
        global $wpdb;
        $params = [
            'database'  => DB_NAME,
            'host'      => DB_HOST,
            'username'  => DB_USER,
            'password'  => DB_PASSWORD,
            'prefix'    => $wpdb->prefix
        ];
        Database::connect($params);
    }
}

// Inherited from packages/utils/src/Service
/**
 * See API docs.
 *
 * @api {get} /wpnoteplus/v1/plugin Get plugin information
 * @apiHeader {string} X-WP-Nonce
 * @apiName GetPlugin
 * @apiGroup Plugin
 *
 * @apiSuccessExample {json} Success-Response:
 * {
 *     Name: "WC Todo",
 *     PluginURI: "https://brickdots.com/wc-todo",
 *     Version: "1.0.0",
 *     Description: "Add todo list to your woocommerce orders",
 *     Author: "<a href="https://brickdots.com">BrickDots</a>",
 *     AuthorURI: "https://brickdots.com",
 *     TextDomain: "wc todo",
 *     DomainPath: "/languages",
 *     Network: false,
 *     Title: "<a href="https://brickdots.com">WC Todo</a>",
 *     AuthorName: "Richard Ho"
 * }
 * @apiVersion 1.0.0
 */

/**
 *
 * @api {get} /wpnoteplus/v1/user Get users information for mentions
 * @apiHeader {string} X-WP-Nonce
 * @apiName GetUsers
 * @apiGroup User
 * @apParam {string} s Search keyword upon email, display name, username of users.
 *
 * @apiSuccessExample {json} Success-Response:
 * {
 *      "data":[
 *          {
 *              "id": 1,
                "email": "admin@test.com",
                "displayName": "Richard Ho",
                "username": "WordPress"
 *          }
 *      ]
 * }
 * @apiVersion 1.0.0
 */

/**
 *
 * @api {get} /wpnoteplus/v1/todo Get a list of todos
 * @apiHeader {string} X-WP-Nonce
 * @apiName GetTodos
 * @apiGroup Todo
 * @apParam {string} entity_type Entity type, e.g. `post`
 * @apParam {string} entity_id Entity id
 * @apParam {string} status Status label, e.g. `open`
 *
 * @apiSuccessExample {json} Success-Response:
 * {
 *      "data":[
 *          {
 *              "id": 1,
                "description": "@admin to Check if all products in stock",
                "position": 1,
                "status": {
                    "text": "Open",
                    "label": "open"
                }
 *          }
 *      ]
 * }
 * @apiVersion 1.0.0
 */

/**
 *
 * @api {post} /wpnoteplus/v1/todo Create a todo item
 * @apiHeader {string} X-WP-Nonce
 * @apiName PostTodo
 * @apiGroup Todo
 * @apParam {string} description Todo item
 *
 * @apiSuccessExample {json} Success-Response:
 * {
 *      "data":[
 *          {
 *              "id": 1,
                "description": "@admin to Check if all products in stock",
                "position": 1,
                "status": {
                    "text": "Open",
                    "label": "open"
                }
 *          }
 *      ]
 * }
 * @apiVersion 1.0.0
 */

/**
 *
 * @api {put} /wpnoteplus/v1/todo/:id Update a todo item.
 * @apiDescription Update todo item. Fields that can be updated
 * `description`,
 * `status.label`,
 * `position`
 *
 * @apiHeader {string} X-WP-Nonce
 * @apiName PostTodo
 * @apiGroup Todo
 * @apParam {string} id Todo item id
 * @apiParamExample {json} Request-Example:
 *     {
 *       "status":{
 *          "text": "Done",
 *          "label": "done"
 *       }
 *     }
 * @apiSuccessExample {json} Success-Response:
 * {
 *      "data":[
 *          {
 *              "id": 1,
                "description": "@admin to Check if all products in stock",
                "position": 1,
                "status": {
                    "text": "Open",
                    "label": "open"
                }
 *          }
 *      ]
 * }
 * @apiVersion 1.0.0
 */

/**
 *
 * @api {delete} /wpnoteplus/v1/todo/:id Delete a todo item
 * @apiHeader {string} X-WP-Nonce
 * @apiName PostTodo
 * @apiGroup Todo
 * @apParam {string} id Todo item id
 * @apiSuccessExample {json} Success-Response:
 * {
 *      "message":"Todo {id} deleted."
 * }
 * @apiVersion 1.0.0
 */
