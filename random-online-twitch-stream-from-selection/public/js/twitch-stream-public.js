(function ($) {

    TwitchStream = window.TwitchStream || {};
    TwitchStream.twitch = TwitchStream.twitch || {};

    TwitchStream.twitch.TwitchStream = function (twitchVars) {
        var $streamElement = $('.twitch-wall #twitch-embed');
        var gameName = twitchVars.twitchGame;
        var streamers = twitchVars.twitchIds !== null ? '&channel=' + twitchVars.twitchIds : '';
        var language = twitchVars.language !== null ? '&language=' + twitchVars.language : '';
        var theme = twitchVars.theme;
        var twitchOfflineHtml = $.parseHTML(twitchVars.twitchOfflineHtml);

        this.init = function () {
            if ($streamElement.length > 0) {
                getGameStreams();
            }
        };

        function getGameStreams() {
            $.ajax({
                url: 'https://api.twitch.tv/kraken/streams/?game=' + gameName + streamers + language,
                type: 'GET',
                headers: {
                    'Client-ID': 'c9y13nevu8fzazuq2ty6zdqz9f7xlem',
                    'Accept': 'application/vnd.twitchtv.v5+json'
                },
                success: function (data) {
                    if (data.streams.length > 0) {
                        appendStream(data.streams);
                    } else {
                        $streamElement.html(twitchOfflineHtml);
                    }
                },
            });
        }

        function appendStream(streamsData) {
            var randomSteamer = streamsData[streamsData.length * Math.random() | 0];
            var steamerName = randomSteamer.channel.name;

            $streamElement.addClass('active');
            new Twitch.Embed("twitch-embed", {
                width: '100%',
                height: '100%',
                channel: steamerName,
                theme: theme,
                muted: true,
                layout: "video"
            });
        }
    };

    var twitch = new TwitchStream.twitch.TwitchStream(twitch_stream_vars);
    twitch.init();

})(jQuery);
