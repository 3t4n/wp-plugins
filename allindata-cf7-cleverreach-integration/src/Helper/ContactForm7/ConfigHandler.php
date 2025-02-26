<?php
/*
Copyright (C) 2018 All.In Data GmbH

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

namespace AllInData\CF7CRIntegration\Helper\ContactForm7;

/**
 * Class ConfigHandler
 * @package AllInData\CF7CRIntegration\Helper\ContactForm7
 */
class ConfigHandler
{
    const KEY_CONTACT_FORM_CONFIG_OPTIONS = 'aid-cf7cr-form-config-options';

    /**
     * @var array
     */
    private $defaultOptions = [];
    /**
     * @var string|null
     */
    private $defaultOptionFile = null;

    /**
     * ConfigHandler constructor.
     * @param string|null $defaultOptionFile
     */
    public function __construct(?string $defaultOptionFile = null)
    {
        $this->defaultOptionFile = $defaultOptionFile;
    }

    /**
     * @inheritdoc
     */
    protected function doInit()
    {
        if (!is_readable($this->defaultOptionFile)) {
            return;
        }

        $this->defaultOptions = json_decode(file_get_contents($this->defaultOptionFile), true);
        if (!is_array($this->defaultOptions)) {
            $this->defaultOptions = [];
        }
    }
    
    /**
     * @param int $postId
     * @return array
     */
    public function getOptions($postId)
    {
        $jsonData = get_post_meta($postId, self::KEY_CONTACT_FORM_CONFIG_OPTIONS, true);
        if (empty($jsonData)) {
            return $this->applyDefaultValues([]);
        }

        $options = json_decode($jsonData, true);
        return $this->applyDefaultValues($options);
    }

    /**
     * @param int $postId
     * @param array $options
     * @return bool|int
     */
    public function saveOptions($postId, array $options)
    {
        return update_post_meta($postId, self::KEY_CONTACT_FORM_CONFIG_OPTIONS, json_encode(
            $this->applyDefaultValues($options)
        ));
    }

    /**
     * @return array
     */
    public function getDefaultValues()
    {
        return $this->defaultOptions;
    }

    /**
     * @param array $defaultOptions
     * @return $this
     */
    public function setDefaultValues(array $defaultOptions)
    {
        $this->defaultOptions = $defaultOptions;
        return $this;
    }

    /**
     * @param array $options
     * @return array
     */
    private function applyDefaultValues(array $options)
    {
        return array_replace_recursive(
            $this->getDefaultValues(),
            $options
        );
    }
}
