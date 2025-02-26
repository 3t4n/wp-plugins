<?php

/**
 * Settings Builder Class,
 * Responsible for building the settings sections, inputs and labels
 * from the the config/settings.config.php file
 */
class settingsBuilder
{
    protected $config;

    /**
     * When you call new settingsBuilder();
     * this method will run.
     *
     * The input callbacks class is loaded, and if the config property
     * isn't populated the config file will be loaded and stored in memory.
     */
    public function __construct()
    {
        require __DIR__ . '/InputCallbacks.php';

        if(!$this->getConfig())
        {
            require __DIR__ . '/../config/settings.config.php';
            $this->setConfig($settingFields);
        }
    }

    /**
     * Iterate through the config class property,
     * Construct the relevant settings section and field
     * as defined in the file.
     */
    public function constructInputs()
    {
        $settingFields = $this->getConfig();

        foreach($settingFields as $key => $val)
        {
            register_setting('AbolWidgetConfiguration', $key);
            add_settings_section(
                $val['section']['slug'],
                $val['section']['title'],
                $val['section']['callback'],
                'AbolWidgetConfiguration'
            );

            if(isset($val['inputs'])) {
                foreach($val['inputs'] as $k => $v) {
                    add_settings_field(
                        $v['slug'],
                        $v['label'],
                        $v['callback'],
                        'AbolWidgetConfiguration',
                        $val['section']['slug']
                    );
                }
            } else {
                add_settings_field(
                    $val['input']['slug'],
                    $val['input']['label'],
                    $val['input']['callback'],
                    'AbolWidgetConfiguration',
                    $val['section']['slug']
                );
            }
        }
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }
}