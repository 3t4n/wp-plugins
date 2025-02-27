<?php

namespace BitApps\Pi\src\Queue;

use BitApps\Pi\Config;

abstract class AsyncRequest
{
    /**
     * Prefix
     *
     * (default value: 'wp')
     *
     * @var string
     *
     * @access protected
     */
    protected $prefix = 'wp';

    /**
     * Action
     *
     * (default value: 'async_request')
     *
     * @var string
     *
     * @access protected
     */
    protected $action = 'async_request';

    protected $batch_action = 'batch_background_process_request';

    /**
     * Identifier
     *
     * @var mixed
     *
     * @access protected
     */
    protected $identifier;

    protected $batchIdentifier;

    /**
     * Data
     *
     * (default value: array())
     *
     * @var array
     *
     * @access protected
     */
    protected $data = [];

    /**
     * Initiate new async request.
     */
    public function __construct()
    {
        $this->identifier = $this->prefix . $this->action;
        $this->batchIdentifier = $this->prefix . $this->batch_action;
    }

    public function setBodyParams($data)
    {
        $this->data = $data;

        return $this;
    }

    public function getBodyParams()
    {
        return $this->data;
    }

    /**
     * Dispatch the async request.
     *
     * @return array|WP_Error|false HTTP Response array, WP_Error on failure, or false if not attempted.
     */
    public function dispatch()
    {
        $url = add_query_arg($this->getQueryArgs($this->identifier), $this->getQueryUrl($this->identifier));

        return wp_remote_post(esc_url_raw($url), $this->getPostArgs($this->identifier));
    }

    public function batchDispatch()
    {
        $url = add_query_arg($this->getQueryArgs($this->batchIdentifier), $this->getQueryUrl($this->batchIdentifier));

        return wp_remote_post(esc_url_raw($url), $this->getPostArgs($this->batchIdentifier));
    }

    /**
     * Maybe handle a dispatched request.
     *
     * Check for correct nonce and pass to handler.
     *
     * @return void|mixed
     */
    public function maybeHandle()
    {        // Don't lock up other requests while processing.
        session_write_close();

        check_ajax_referer($this->identifier, 'nonce');

        $this->handle();

        return $this->maybeWpDie();
    }

    /**
     * Get query args.
     *
     * @param mixed $identifier
     *
     * @return array
     */
    protected function getQueryArgs($identifier)
    {
        if (\defined('REST_REQUEST') && REST_REQUEST && ((int) wp_get_current_user()->ID) === 0) {
            $_COOKIE = [];
        }

        $args = [
            'action'      => $identifier,
            '_ajax_nonce' => wp_create_nonce(Config::withPrefix('nonce')),
        ];

        /**
         * Filters the post arguments used during an async request.
         *
         * @param array $url
         */
        return apply_filters($identifier . '_query_args', $args);
    }

    /**
     * Get query URL.
     *
     * @param mixed $identifier
     *
     * @return string
     */
    protected function getQueryUrl($identifier)
    {
        $url = admin_url('admin-ajax.php');

        return apply_filters($identifier . '_query_url', $url);
    }

    /**
     * Get post args.
     *
     * @param mixed      $identifier
     * @param null|mixed $batch
     *
     * @return array
     */
    protected function getPostArgs($identifier)
    {
        $args = [
            'timeout'   => 0.01,
            'blocking'  => false,
            'body'      => $this->getBodyParams(),
            'cookies'   => $_COOKIE, // Passing cookies ensures request is performed as initiating user.
            'sslverify' => apply_filters('https_local_ssl_verify', false), // Local requests, fine to pass false.
        ];

        /**
         * Filters the post arguments used during an async request.
         *
         * @param array $args
         */
        return apply_filters($identifier . '_post_args', $args);
    }

    /**
     * Should the process exit with wp_die?
     *
     * @param mixed $return What to return if filter says don't die, default is null.
     *
     * @return void|mixed
     */
    protected function maybeWpDie($return = null)
    {
        /**
         * Should wp_die be used?
         *
         * @return bool
         */
        if (apply_filters($this->identifier . '_wp_die', true)) {
            wp_die();
        }

        return $return;
    }

    /**
     * Handle a dispatched request.
     *
     * Override this method to perform any actions required
     * during the async request.
     */
    abstract protected function handle();
}
