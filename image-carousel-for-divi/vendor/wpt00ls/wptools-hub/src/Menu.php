<?php
namespace WPTools_Hub;

/**
 * AdminMenu.
 */
class Menu
{
    public static $hasRendered = false;

    protected $container;

    /**
     * Constructor.
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * Main menu for the hub.
     */
    public function add_main_menu_page()
    {
        if (self::$hasRendered) {
            //main menu view html loads x-number of times. Need a singleton menu.
            return;
        }
        self::$hasRendered = true;
        $file              = __DIR__ . '/../views/wptools-hub.php';
        $icon              = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAFBAAABQQBQWt8+gAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAHvSURBVDiNdZQ7T1RRFIW/SyGTCPwAxkRDDAJGGx+dEkXExGinla1G4bdoRwFqop0ahFY0QWhplRl8RLGhwwbGzGjiZ+ECxsl1Jzu52Y9119l7nQMlpl5WH6of1J34emLjZT1FB8Ag8Ag4B6wBi8C3pI8AE8AIsALcLoriUxmLUfW7uqaOJdannoz3JTau1lJ7vhNkMIlXaq96XF1QW+5bS51Xh1OzmJ7BdqAV9X0KrqsNta7eVU/F72VmDfVaamvqMm1UVcfC5If6TO1Wq+qteFWtqM8DNtzei/pYfRfQhTDpVm9mW7/i2+qN5NbVl+mpqTOE7v0MtpXjVAPyRD2o9qhPA1ZVJ9Vm4g/UehfQD2wAA8ABYBW4AHQDU0VRNIqi2AGmgEpyq8kPRB6Hutr0ZIm2/tFZSdx8/+4CNiO2L8BP4CzwFmgC06HfA0wntpSaFvAVOAxsEtmvZXDzmVklg90uGXZF/ajOpae+O+xLWeF4VtpQX5Ssvz8gc1nEMXUivRd3tbScNfZGbI0wm1RPq2fUqTDZUa9my3V1qeyKvA7YSI7ZdN+aYTMUkDfqlnq0876NBqxmnoqAnoj3JjYRJlu2XdqyZ2QWGAXq/H1GNpI+AlwBhrLVO0VRfP6PPPYAx9TZ/Hk7XlNn9gbbYX8AIfHLAN08nDAAAAAASUVORK5CYII=';
        add_menu_page(
            'WP Tools Hub',
            'WP Tools',
            'manage_options',
            'wptools',
            function () use ($file) {
                ob_start();
                require $file;
                echo ob_get_clean();
            },
            $icon,
            2
        );
    }
}
