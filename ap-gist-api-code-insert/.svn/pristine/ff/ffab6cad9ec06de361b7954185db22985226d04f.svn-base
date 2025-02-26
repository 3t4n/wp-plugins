@php
    use Pinchoalex\SocialPatch\components\transformers\YoutubeVideo;
@endphp

<div class="ytp-container ytp_{{ md5($attributes['channel']) }} page-{{ $currentPageToken }}">
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

