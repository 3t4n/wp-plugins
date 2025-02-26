<?php
if (!defined('ABSPATH')) {
    exit;
}

class aerppk_Loader {
    protected $actions;
    protected $filters;
    protected $shortcodes;

    public function __construct() {
        $this->actions = array();
        $this->filters = array();
        $this->shortcodes = array();
        
        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_public_hooks();
        $this->define_shortcodes();
    }

    private function load_dependencies() {
        // Initialize main classes
        $this->reactions = new aerppk_Reactions();
        $this->admin = new aerppk_Admin();
    }

    private function define_admin_hooks() {
        // Admin hooks
        $this->add_action('admin_menu', $this->admin, 'add_plugin_menu');
        $this->add_action('admin_init', $this->admin, 'register_settings');
        $this->add_action('admin_enqueue_scripts', $this->admin, 'enqueue_styles');
        $this->add_action('admin_enqueue_scripts', $this->admin, 'enqueue_scripts');
        
        // Gutenberg block hooks
        $this->add_action('init', $this->admin, 'register_blocks');
    }

    private function define_public_hooks() {
        // Public hooks
        $this->add_action('wp_enqueue_scripts', $this->reactions, 'enqueue_styles');
        $this->add_action('wp_enqueue_scripts', $this->reactions, 'enqueue_scripts');
        
        // AJAX hooks
        $this->add_action('wp_ajax_add_reaction', $this->reactions, 'handle_add_reaction');
        $this->add_action('wp_ajax_nopriv_add_reaction', $this->reactions, 'handle_add_reaction');
        $this->add_action('wp_ajax_remove_reaction', $this->reactions, 'handle_remove_reaction');
        $this->add_action('wp_ajax_nopriv_remove_reaction', $this->reactions, 'handle_remove_reaction');
    }

    private function define_shortcodes() {
        // Register shortcode
        add_shortcode('aerppk_emoji_reactions', array($this->reactions, 'render_reactions'));
    }

    public function add_action($hook, $component, $callback, $priority = 10, $accepted_args = 1) {
        $this->actions = $this->add($this->actions, $hook, $component, $callback, $priority, $accepted_args);
    }

    public function add_filter($hook, $component, $callback, $priority = 10, $accepted_args = 1) {
        $this->filters = $this->add($this->filters, $hook, $component, $callback, $priority, $accepted_args);
    }

    private function add($hooks, $hook, $component, $callback, $priority, $accepted_args) {
        $hooks[] = array(
            'hook'          => $hook,
            'component'     => $component,
            'callback'      => $callback,
            'priority'      => $priority,
            'accepted_args' => $accepted_args
        );
        return $hooks;
    }

    public function run() {
        // Register all actions and filters
        foreach ($this->actions as $hook) {
            add_action(
                $hook['hook'],
                array($hook['component'], $hook['callback']),
                $hook['priority'],
                $hook['accepted_args']
            );
        }

        foreach ($this->filters as $hook) {
            add_filter(
                $hook['hook'],
                array($hook['component'], $hook['callback']),
                $hook['priority'],
                $hook['accepted_args']
            );
        }
    }
} 