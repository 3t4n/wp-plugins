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

namespace UA1Labs\Fire\Studio\Feature\Debug\Panel;

use \UA1Labs\Fire\Bug\Panel;

class FireStudioDebugPanel extends Panel
{

    const ID = 'firestudio';

    /**
     * The features that have been loaded and the order in which they
     * were loaded.
     *
     * @var array<string>
     */
    private $loadedFeatures;

    /**
     * An array of classnames that were loaded into the injector cache.
     *
     * @var array<string>
     */
    private $injectorCache;

    /**
     * The class constructor.
     */
    public function __construct()
    {
        $this->featuresLoaded = [];
        $this->injectorCache = [];
        parent::__construct(self::ID, 'FireStudio Info', __DIR__ . '/../Templates/panels/firestudio.phtml');
        $this->setDescription(
            'Information included in this debug panel provides an overview of all of the crucial environmental ' .
            'variables that go into loading FireStudio. The Features Loaded section accounts ' .
            'for the features that were loaded in using \UA1Labs\Fire\Studio::loadFeature(). The features are ' .
            'displayed in the same order in which they were loaded in. The Injector Cache section ' .
            'accounts for the objects that have been loaded into the injector\'s object cache.'
        );
    }

    /**
     * Sets the loaded features array
     *
     * @param array<string> $loadedFeatures An array of strings that include classes that have been loaded.
     */
    public function setLoadedFeatures($loadedFeatures)
    {
        $this->loadedFeatures = $loadedFeatures;
    }

    /**
     * Returns the loaded features.
     *
     * @return array<string>
     */
    public function getLoadedFeatures()
    {
        return $this->loadedFeatures;
    }

    /**
     * Set the injector cache array.
     *
     * @param array<string> $injectorCache
     */
    public function setInjectorCache($injectorCache)
    {
        $this->injectorCache = $injectorCache;
    }

    /**
     * Returns the injector cache.
     *
     * @return array<string>
     */
    public function getInjectorCache()
    {
        return $this->injectorCache;
    }
}