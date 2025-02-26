<?php

namespace RankologyFno\Services\Options;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

class NoticeOption
{
    /**
     * 
     *
     * @return array
     */
    public function getOption()
    {
        return get_option('rankology_notices');
    }

    /**
     * 
     *
     * @param string $key
     *
     * @return mixed
     */
    public function searchOptionByKey($key)
    {
        $data = $this->getOption();

        if (empty($data)) {
            return null;
        }

        if (! isset($data[$key])) {
            return null;
        }

        return $data[$key];
    }

    /**
     * 
     *
     * @return string
     */
    public function getNoticeRobotsTxt(){
        return $this->searchOptionByKey('notice-robots-txt');
    }
}
