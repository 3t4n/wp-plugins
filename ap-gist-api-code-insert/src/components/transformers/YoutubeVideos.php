<?php

namespace Pinchoalex\SocialPatch\components\transformers;

class YoutubeVideos
{
    public array $results = [];
    public $info;
    public array $debug;
    public function __construct(array $response)
    {
        $this->info = json_decode($response['data']['body'])->info;

        if (is_array(json_decode($response['data']['body'])->results)) {
            foreach (json_decode($response['data']['body'])->results as $item) {
                $this->results[] = new YoutubeVideo($item);
            }
        }

        $this->debug = $response['debug'] ?? [];
    }
}