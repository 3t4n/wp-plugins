<?php

namespace Foxlis\Geo\Entities;

class FoxlisGeoAccount
{
    private $data = [];

    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getFreePoints()
    {
        return isset($this->data['freePoints']) ? $this->data['freePoints'] : 0;
    }

    public function getPayPoints()
    {
        return isset($this->data['payPoints']) ? $this->data['payPoints'] : 0;
    }

    public function getExpiredAt()
    {
        return isset($this->data['expiredAt']) ? $this->data['expiredAt'] : '';
    }

    public function getBan()
    {
        return isset($this->data['ban']) ? $this->data['ban'] : '';
    }

    public function getBlock()
    {
        return isset($this->data['block']) ? $this->data['block'] : '';
    }
}
