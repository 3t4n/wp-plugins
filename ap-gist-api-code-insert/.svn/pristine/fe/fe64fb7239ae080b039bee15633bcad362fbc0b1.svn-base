<?php

namespace Pinchoalex\SocialPatch\components\requests;

class ChannelVideos extends RequestBuilder
{
    protected string $channel;
    protected string $order;
    protected string $nextPage;
    protected string $part = 'id,snippet';
    protected string $maxResults = '10';
    protected string $videoDuration = 'any';

    public function __construct()
    {
        parent::__construct();

        $this->url = 'https://spatch.store/api/v1/youtube/channel-videos';
    }

    public function channel(string $value): ChannelVideos
    {
        $this->channel = $value;

        return $this;
    }

    public function nextPage(string $value): ChannelVideos
    {
        $this->nextPage = $value;

        return $this;
    }

    public function order(string $value): ChannelVideos
    {
        $this->order = $value;

        return $this;
    }

    public function part(string $value): ChannelVideos
    {
        $this->part = $value;

        return $this;
    }

    public function maxResults(string $value): ChannelVideos
    {
        $this->maxResults = $value;

        return $this;
    }

    public function videoDuration(string $value): ChannelVideos
    {
        $this->videoDuration = $value;

        return $this;
    }
}