<?php

declare(strict_types=1);

/*
Copyright (C) 2020 All.In Data GmbH

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

namespace AllInData\CF7CRIntegration\Model\CleverReach;

/**
 * Class Receiver
 * @package AllInData\CF7CRIntegration\Model\CleverReach
 */
class Receiver
{
    /**
     * @var string|null
     */
    private $email;
    /**
     * @var string|null
     */
    private $activated;
    /**
     * @var string|null
     */
    private $registered;
    /**
     * @var string|null
     */
    private $deactivated;
    /**
     * @var string|null
     */
    private $source;
    /**
     * @var string[]|null
     */
    private $attributes;
    /**
     * @var string[]|null
     */
    private $globalAttributes;

    /**
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return Receiver
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getActivated()
    {
        return $this->activated;
    }

    /**
     * @param string|null $activated
     * @return Receiver
     */
    public function setActivated($activated)
    {
        $this->activated = $activated;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRegistered()
    {
        return $this->registered;
    }

    /**
     * @param string|null $registered
     * @return Receiver
     */
    public function setRegistered($registered)
    {
        $this->registered = $registered;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDeactivated()
    {
        return $this->deactivated;
    }

    /**
     * @param string|null $deactivated
     * @return Receiver
     */
    public function setDeactivated($deactivated)
    {
        $this->deactivated = $deactivated;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string|null $source
     * @return Receiver
     */
    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param string[]|null $attributes
     * @return Receiver
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getGlobalAttributes()
    {
        return $this->globalAttributes;
    }

    /**
     * @param string[]|null $globalAttributes
     * @return Receiver
     */
    public function setGlobalAttributes($globalAttributes)
    {
        $this->globalAttributes = $globalAttributes;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'activated' => $this->activated,
            'registered' => $this->registered,
            'deactivated' => $this->deactivated,
            'source' => $this->source,
            'attributes' => $this->attributes,
            'global_attributes' => $this->globalAttributes
        ];
    }
}