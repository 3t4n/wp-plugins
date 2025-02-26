@php
    use Pinchoalex\SocialPatch\components\transformers\YoutubeVideo;
@endphp

@if (is_user_logged_in())
<div class="ap-youtube-plugin-debug" style="overflow-x: scroll;">
    <pre>{{ var_dump($response->debug) }}</pre>
</div>
@endif
<div class="ap-youtube-plugin ytp_{{ md5($attributes['channel']) }}" id="ytp_{{ md5($attributes['channel']) }}">
    <div class="ytp-container">
        @foreach($response->results as $result)
            @php /** @var YoutubeVideo $result */ @endphp
            <div class="ytp-flex-item ytp-open-video-modal" data-video-id="{{ $result->getVideoID() }}">
                <div class="ytp-thumb"
                     style="background-image: url('{{ $result->getVideoThumbUrl($attributes['thumb']) }}');">
                    @if(isset($attributes['showDuration']) && $attributes['showDuration'])
                        <span class="ytp-video-duration">{{ $result->getVideoDuration() }}</span>
                    @endif
                    @if(isset($attributes['showViewCount']) && $attributes['showViewCount'])
                        <span class="ytp-views">{{ $result->getViewsCount() }}</span>
                    @endif
                </div>
                @if(isset($attributes['showTitle']) && $attributes['showTitle'])
                    <div class="ytp-body">
                        <p>{{ $result->getTitle() }}</p>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
    <style>
        .ap-youtube-plugin.ytp_{{ md5($attributes['channel']) }} .ytp-container .ytp-flex-item {
            width: {{$attributes['width']}}px;
        }

        .ap-youtube-plugin.ytp_{{ md5($attributes['channel']) }} .ytp-container .ytp-thumb {
            height: {{$attributes['height']}}px;
        }
    </style>
</div>
@if(!empty($response->info->nextPageToken) && $attributes['showLoadMore'])
<div class="ap-youtube-plugin">
    <div class="ytp-container">
        <div
                class="ytp-load-more-btn"
                data-attributes="{{ json_encode([
                    'channel' => $attributes['channel'],
                    'maxResults' => $attributes['maxResults'],
                    'orderBy' => $attributes['orderBy'],
                    'showTitle' => $attributes['showTitle'],
                    'showViewCount' => $attributes['showViewCount'],
                    'showDuration' => $attributes['showDuration'],
                    'thumb' => $attributes['thumb'],
                    'videoDuration' => $attributes['videoDuration'],
                ]) }}"
                data-info="{{ json_encode($response->info) }}"
                data-result="ytp_{{ md5($attributes['channel']) }}"
        >
            <span>{{ __('Load more', AP_YOUTUBE_NAME) }}</span>
        </div>
    </div>
</div>
@endif

