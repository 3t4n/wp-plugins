<div id="<?php echo $int_id; ?>" class="eso-twitter-feed-default uk-margin-remove-last-child <?php echo esc_attr(implode(' ', $wrap_class)); ?>"></div>

<script type="text/javascript">
(function($) {
    $(document).ready(function() {
        $(function(){

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
                    html += '<div class="eso-twitter-feed-item uk-width-1-1 uk-padding-medium-bottom uk-margin-medium-bottom">';
                    // html += '<div class="uk-width-auto uk-margin-medium-right <?php echo $logo; ?>">';
                    // html += '<a href="' + v.user_url + '"><img height="50" width="50" class="uk-border-circle" src="' + v.image_src + '"></a>';
                    // html += '</div>';
                    // html += '<div class="uk-width-expand">';
                    html += '<div class="eso-tweet">' + v.tweet + '</div>';
                    html += '<div class="eso-tweet-posted uk-margin-small-top <?php echo $posted; ?>">' + v.time + '</div>';
                    html += '</div>';
                    // html += '</div>';
                })

                $('#<?php echo $int_id; ?>').html(html);

            }

        });
    })
})(jQuery)
</script>
