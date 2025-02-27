<div id="<?php echo $int_id; ?>">

    <div class="uk-position-relative">

        <div uk-slider="autoplay: <?php echo esc_attr($slider_autoplay); ?>;' autoplay-interval: <?php echo absint($slider_autoplay_interval); ?>;">

            <div class="uk-flex">

                <div class="uk-width-auto uk-margin-small-right">

                    <div class="uk-text-center">

                        <a href="https://twitter.com/<?php echo esc_attr($username); ?>">
                            <img src="<?php echo $image_url; ?>" style="width: 68px; height: 68px;" class="uk-border-circle">
                        </a>

                    </div>

                    <div class="uk-slidenav-container uk-position-bottom-left">
                        <a class="eso-slidenav-previous" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="eso-slidenav-next" href="#" uk-slidenav-next uk-slider-item="next"></a>
                    </div>

                </div>

                <div class="uk-width-expand">

                    <div class="uk-slider-container">

                        <div class="uk-slider-items uk-child-width-1-1"></div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript">
(function($) {
    $(document).ready(function() {

        getTweets()

        function getTweets() {
            twitterFetcher.fetch({
                "profile": {"screenName": '<?php echo esc_attr($username); ?>'},
                "domId": '<?php echo $int_id; ?>',
                "maxTweets": <?php echo $max_tweets; ?>,
                "enableLinks": true,
                "showUser": true,
                "showTime": true,
                "showImages": false,
                "lang": 'en',
                "showInteraction": false,
                "customCallback": handleTweets,
            });
        }

        function handleTweets(tweets) {

            var n = 0;
            var x = tweets.length;

            var parts = [];
            var element = {};

            while(n < x) {
                element.time = $($.parseHTML(tweets[n])).filter('.timePosted').text();
                element.tweet = $($.parseHTML(tweets[n])).filter('.tweet').html();
                element.image_src = $($.parseHTML(tweets[n])).filter('.user').find('img').attr('src');
                element.user_url = $($.parseHTML(tweets[n])).filter('.user').find('a').attr('href');
                element.username = $($.parseHTML(tweets[n])).filter('.user').find('[data-scribe="element:screen_name"]').text();
                parts.push( element)
                element = {};
                n++;
            }


            html = '';

            $.each(parts, function(k, v) {
                html += '<li class="eso-twitter-feed-item uk-width-1-1">';
                html += '<div class="eso-tweet">' + v.tweet;
                html += '<div class="eso-tweet-posted uk-margin-small-top <?php echo $posted; ?>">' + v.time + '</div>';
                html += '</li>';
            })

            $('#<?php echo $int_id; ?> div.uk-slider-items').html(html);

        }

    })
})(jQuery)
</script>
