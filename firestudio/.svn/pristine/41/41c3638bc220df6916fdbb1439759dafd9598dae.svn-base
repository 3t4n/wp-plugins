<?php

/**
 *    __  _____   ___   __          __
 *   / / / /   | <  /  / /   ____ _/ /_  _____
 *  / / / / /| | / /  / /   / __ `/ __ `/ ___/
 * / /_/ / ___ |/ /  / /___/ /_/ / /_/ (__  )
 * `____/_/  |_/_/  /_____/`__,_/_.___/____/
 *
 * @package FireStudio
 * @author UA1 Labs Developers https://ua1.us
 * @copyright Copyright (c) UA1 Labs
 */

namespace UA1Labs\Fire;

use \UA1Labs\Fire\Studio\Injector;
use \UA1Labs\Fire\StudioException;
use \UA1Labs\Fire\Studio\Feature;

/**
 * The class that makes FireStudio possible. This class is the main entry
 * point into the FireStudio runtime environment and provides structure
 * for the SDK.
 */
class Studio
{

    /**
     * The Firestudio injector
     *
     * @var \UA1Labs\Fire\Studio\Injector;
     */
    public $injector;

    /**
     * An array of features that have been loaded into FireStudio.
     *
     * @var array<\UA1Labs\Fire\Studio\Feature>
     */
    private $features;

    /**
     * The class constructor.
     */
    public function __construct()
    {
        $this->injector = Injector::instance();
        $this->features = [];
    }

    /**
     * Initializes FireStudio.
     */
    public function init()
    {
        add_action('plugins_loaded', [$this, 'loadFirestudioAction']);
    }

    /**
     * Runs the do_action for the firestudio_loaded hook.
     */
    public function loadFirestudioAction()
    {
        do_action('firestudio_loaded', $this);
    }

    /**
     * Loads a feature into the FireStudio runtime environment.
     *
     * @param string $className The class that represents the feature
     * @throws StudioException If the class cannot be resolved by the injector
     * @throws StudioException If the feature class does not extend \UA1Labs\Fire\Studio\Feature
     */
    public function loadFeature($className)
    {
        if ($this->injector->has($className)) {
            $feature = $this->injector->get($className);
        } else {
            throw new StudioException($className . ' could not be loaded as a feature.');
        }

        if (!$feature instanceof Feature) {
            throw new StudioException($className . ' must extend \UA1Labs\Fire\Studio\Feature.');
        }

        $feature->initWpHooksByDecorators();
        $this->features[$className] = $feature;
    }

    /**
     * Determines if the feature has been loaded successfully.
     *
     * @param string $className
     * @return boolean
     */
    public function hasFeature($className)
    {
        return isset($this->features[$className]);
    }

    /**
     * Returns the feature. If the feature was not loaded successfully,
     * this method will return null.
     *
     * @param string $className
     * @return \UA1Labs\Fire\Studio\Feature | null
     */
    public function getFeature($className)
    {
        if ($this->hasFeature($className)) {
            return $this->features[$className];
        }

        return null;
    }

    /**
     * Returns the entire array of features that have been loaded
     *
     * @return array<\UA1Labs\Fire\Studio\Feature>
     */
    public function getLoadedFeatures()
    {
        return $this->features;
    }

}