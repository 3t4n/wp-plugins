<?php

namespace Pinchoalex\SocialPatch\components\youtube;

use Jenssegers\Blade\Blade;
use Pinchoalex\SocialPatch\components\InstanceLoader;
use Pinchoalex\SocialPatch\components\transformers\YoutubeVideos;
use stdClass;

class ChannelVideos
{
    protected array $attributes;
    protected stdClass $info;

    public function __construct(array $attributes, $info = null)
    {
        $blockSettings = InstanceLoader::getBlockSettings('sp-youtube-channel');

        $this->attributes = array_merge($blockSettings->getShortcodeAttributes(), $attributes);

        if (empty($info)) {
            $info = new stdClass();
        }
        $this->info = $info;
    }

    protected function getResponse()
    {
        $cache = get_transient($this->channelVideosCacheKey());

        if (!empty($cache)) {
            $response = $cache;
        } else {
            $requestBuilder = InstanceLoader::getChannelVideosRequestBuilder();
            $url = $requestBuilder
                ->order($this->attributes['orderBy'])
                ->maxResults($this->attributes['maxResults'])
                ->videoDuration($this->attributes['videoDuration'] ?? '')
                ->channel($this->attributes['channel'] ?? '');

            if (isset($this->info->nextPageToken) && !empty($this->info->nextPageToken)) {
                $url->nextPage($this->info->nextPageToken);
            }

            $response = [
                'data' => wp_remote_get($url->build(), ['timeout' => 5]),
                'debug' => ['url' => $url->build()]
            ];
        }

        return $response;
    }

    public function drawLoadMore()
    {
        $response = $this->prepareResponse();

        if (is_string($response)) {
            return $response;
        }

        return [
            'html' => InstanceLoader::getBlade()->make('channel-load', [
                'response' => $response,
                'attributes' => $this->attributes,
                'currentPageToken' => $this->info->nextPageToken
            ])->render(),
            'info' => $response->info,
            'currentPageToken' => $this->info->nextPageToken
        ];
    }

    public function draw()
    {
        $response = $this->prepareResponse();

        if (is_string($response)) {
            return $response;
        }

        return InstanceLoader::getBlade()->make('channel', [
            'response' => $response,
            'attributes' => $this->attributes
        ])->render();
    }

    protected function prepareResponse()
    {
        $blade = InstanceLoader::getBlade();
        $cacheKey = $this->channelVideosCacheKey();

        $response = $this->getResponse();

        if ($response instanceof \WP_Error) {
            return $blade->make('error', ['message' => implode(',', $response->get_error_messages())])->render();
        }
        if (isset($response['data']['response']['code']) && $response['data']['response']['code'] == 200 && isset($response['data']['body'])) {
            $data = json_decode($response['data']['body']);
            if (!is_array($data) && isset($data->type) && $data->type == 'error' && !empty($data->value)) {
                return $blade->make('error', ['message' => $data->value])->render();
            }

            set_transient($cacheKey, $response, $this->channelVideosCacheTime());

            return new YoutubeVideos($response);
        }


        return '';
    }

    protected function channelVideosCacheKey(): string
    {
        return AP_YOUTUBE_NAME . '-' . md5(json_encode([
                $this->attributes['channel'],
                $this->attributes['maxResults'],
                $this->attributes['orderBy'],
                $this->attributes['videoDuration'],
                $this->info->nextPageToken ?? '',
            ]));
    }

    protected function channelVideosCacheTime()
    {
        return 60;
    }
}