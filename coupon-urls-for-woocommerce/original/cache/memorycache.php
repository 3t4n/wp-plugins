<?php

namespace CouponURLs\Original\Cache;

use AllowDynamicProperties;
use CouponURLs\Original\Cache\Cache;
#[AllowDynamicProperties]
class MemoryCache extends Cache
{
    public function get($key)
    {
        return $this->data->get($key);
    }
    public function getIfExists($key)
    {
        return new ExistingValueResolver(['key' => $key, 'data' => $this->data]);
    }
}