<?php

namespace Pinchoalex\SocialPatch\components;

class HooksLoader
{
    /**
     * @var string[]
     */
    protected array $registeredClassList = [];

    /**
     * Add a new action to the collection to be registered with WordPress.
     * @param string $hook The name of the WordPress action that is being registered.
     * @param callable $callable The name of the function you wish to be called.
     * @param int $priority Optional. The priority at which the function should be fired. Default is 10.
     * @param int $acceptedArgsCount Optional. The number of arguments that should be passed to the $callback. Default
     *     is 1.
     * @return self
     */
    public function addAction(string $hook, callable $callable, int $priority = 10, int $acceptedArgsCount = 1): HooksLoader
    {
        add_action($hook, $callable, $priority, $acceptedArgsCount);

        return $this;
    }

    /**
     * Add a new filter to the collection to be registered with WordPress.
     * @param string $hook The name of the WordPress action that is being registered.
     * @param callable $callable The name of the function you wish to be called.
     * @param int $priority Optional. The priority at which the function should be fired. Default is 10.
     * @param int $acceptedArgsCount Optional. The number of arguments that should be passed to the $callback. Default
     *     is 1.
     * @return self
     */
    public function addFilter(string $hook, callable $callable, int $priority = 10, int $acceptedArgsCount = 1): HooksLoader
    {

        add_filter($hook, $callable, $priority, $acceptedArgsCount);

        return $this;
    }

    /**
     * Add a new shortcode to the collection to be registered with WordPress.
     * @param string $name The name of shortcode
     * @param callable $callable The name of the function you wish to be called.
     */
    public function addShortcode(string $name, callable $callable): HooksLoader
    {
        add_shortcode($name, $callable);

        return $this;
    }

    /**
     * Fires authenticated Ajax actions for logged-in users.
     * @param string $hook The name of the WordPress action that is being registered.
     * @param callable $callable The name of the function you wish to be called.
     * @param int $priority Optional. The priority at which the function should be fired. Default is 10.
     * @param int $acceptedArgsCount Optional. The number of arguments that should be passed to the $callback. Default
     */
    public function addAdminAjaxEndpoint(string $hook, callable $callable, int $priority = 10, int $acceptedArgsCount = 1): HooksLoader
    {
        return $this->addAction("wp_ajax_$hook", $callable, $priority, $acceptedArgsCount);
    }

    /**
     * Fires non-authenticated Ajax actions for logged-out users.
     * @param string $hook The name of the WordPress action that is being registered.
     * @param callable $callable The name of the function you wish to be called.
     * @param int $priority Optional. The priority at which the function should be fired. Default is 10.
     * @param int $acceptedArgsCount Optional. The number of arguments that should be passed to the $callback. Default
     */
    public function addPublicAjaxEndpoint(string $hook, callable $callable, int $priority = 10, int $acceptedArgsCount = 1): HooksLoader
    {
        return $this->addAction("wp_ajax_nopriv_$hook", $callable, $priority, $acceptedArgsCount);
    }
}
