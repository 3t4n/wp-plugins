<?php


namespace Ambikly\RestApi;

abstract class BaseRestApi
{
    protected $namespace;

    public function __construct($namespace = 'ambikly/v1')
    {
        $this->namespace = $namespace;
        $this->register_routes(); // Automatically register routes in the constructor
    }

    /**
     * Register API routes.
     * This method should be implemented by child classes to register specific routes.
     */
    abstract public function register_routes();

    /**
     * Register a route with the specified endpoint and HTTP method.
     *
     * @param string $route The route to register.
     * @param string $method The HTTP method (GET, POST, etc.)
     * @return void
     */
    protected function register_route($route, $method = 'GET')
    {
        register_rest_route($this->namespace, $route, [
            'methods' => $method,
            'callback' => [$this, 'handle'],
            'permission_callback' => [$this, 'get_permission_callback'], // Calls the permission check method
        ]);
    }

    /**
     * Get the callback for the API route.
     * Must be implemented by child classes.
     *
     * @return callable
     */
    abstract protected function handle(\WP_REST_Request $request);

    /**
     * Get the permission callback for the API route.
     * Must be implemented by child classes.
     *
     * @return callable
     */
    abstract protected function get_permission_callback(\WP_REST_Request $request);

    /**
     * Helper method to send a response.
     *
     * @param mixed $data The data to send.
     * @param int $status_code HTTP status code.
     * @return \WP_REST_Response
     */
    protected function send_response($data, $status_code = 200)
    {
        rest_ensure_response($data)->set_status($status_code);
    }

    /**
     * Helper method to send an error response.
     *
     * @param string $message The error message.
     * @param int $status_code HTTP status code.
     * @return \WP_REST_Response
     */
    protected function send_error($message, $status_code = 400)
    {
        return $this->send_response(['error' => $message], $status_code);
    }
}