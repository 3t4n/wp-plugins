(function ($) {
    'use strict';

    $(function () {

        // global variables
        var player;
        var index = 0;
        var ready = false;
        var currentTime = 0;
        var duration = 0;
        // -------------

        // dailymotion player
        if ($("#player").length > 0) {
            player = DM.player(document.getElementById("player"), {
                width: "100%",
                height: "100%",
                params: {
                    autoplay: true,
                    controls: false,
                    "sharing-enable": false,
                    "ui-logo": false,
                    mute: true,
                    "ui-start-screen-info": false,
                    "endscreen-enable": false,
                    syndication: 273774,
                    ads_params: "main",
                },
            });

            player.addEventListener("apiready", function () {
                ready = true;
                window.setInterval(function () {
                    currentTime = player.currentTime;
                    duration = player.duration;
                    var progress = duration > 0 ? currentTime / duration : 0;
                    $("[player-seekbar]").css('transform', 'scaleX(' + progress + ')');

                }, 100);
                playSampleVideo();
            });

            player.addEventListener("video_end", function () {
                var cat = $("#ad-ink-admin [categories-wrapper] [category-input]").val();
                if (adInkVideoSamples[cat] !== undefined) {
                    var len = adInkVideoSamples[cat].length;
                    if (index + 1 >= len) {
                        index = 0;
                    } else {
                        index++;
                    }
                    playSampleVideo();
                }
            });

            $("#ad-ink-admin [categories-wrapper] [category-input]").change(function () {
                index = 0;
                playSampleVideo();
            });

            $("#ad-ink-admin [device-selectors] [device-selector]").click(function (e) {
                var device = $(this).attr("device-selector");
                $("#ad-ink-admin [device-selectors] [device-selector]").removeClass("cursor-pointer bg-green-500 text-white hover:bg-gray-200");
                $("#ad-ink-admin [device-selectors] [device-selector]").addClass("cursor-pointer hover:bg-gray-200");
                $("#ad-ink-admin [device-selectors] [device-selector='" + device + "']").addClass("bg-green-500 text-white");
                $("#ad-ink-admin [device-selectors] [device-selector='" + device + "']").removeClass("cursor-pointer hover:bg-gray-200");

                changeDevice(device);
            });

            // actions
            $("#ad-ink-admin [player-seekbar-wraper]").click(function (e) {
                if (ready) {
                    var rect = e.target.getBoundingClientRect();
                    var x = e.clientX - rect.left; //x position within the element.
                    var percentage = rect.width > 0 ? x / rect.width : 0;
                    seekTo(duration * percentage);
                }
            });

            $("#ad-ink-admin [player-pause]").click(function (e) {
                if (ready) {
                    player.pause();
                    $("#ad-ink-admin [player-pause]").hide();
                    $("#ad-ink-admin [player-play]").show();
                }
            });

            $("#ad-ink-admin [player-play]").click(function (e) {
                if (ready) {
                    player.play();
                    $("#ad-ink-admin [player-play]").hide();
                    $("#ad-ink-admin [player-pause]").show();
                }
            });

            $("#ad-ink-admin [player-unmute]").click(function (e) {
                if (ready) {
                    player.setMuted(false)
                    $("#ad-ink-admin [player-unmute]").hide();
                    $("#ad-ink-admin [player-mute]").show();
                }
            });

            $("#ad-ink-admin[player-mute]").click(function (e) {
                if (ready) {
                    player.setMuted(true)
                    $("#ad-ink-admin [player-mute]").hide();
                    $("#ad-ink-admin [player-unmute]").show();
                }
            });

            $("#ad-ink-admin [player-fullscreen]").click(function (e) {
                var el = document.querySelector("#ad-ink-admin [player-wrapper]");
                if (el.requestFullscreen) {
                    el.requestFullscreen();
                }
            });

            // colors
            $("#ad-ink-admin input[name='player_color_foreground']").change(function () {
                updateForegroundColor();
            });

            $("#ad-ink-admin input[name='player_color_background']").change(function () {
                updateBackgroundColor();
            });

            $("#ad-ink-admin input[name='player_color_text']").change(function () {
                updateTextColor();
            });

            updateForegroundColor()
            updateBackgroundColor()
            updateTextColor()
        }

        function playVideo(video) {
            if (!ready) {
                return;
            }
            player.load(video.source);

            $("[video-title]").text(video.title)
            $("[video-description]").text(video.description)
        }

        function playSampleVideo() {
            var cat = $("#ad-ink-admin [categories-wrapper] [category-input]").val();
            if (window.adInkVideoSamples[cat] !== undefined) {
                playVideo(adInkVideoSamples[cat][index]);
            }
        }

        function changeDevice(device) {
            $("#ad-ink-admin [theme-device]").each(function () {
                var desktopClasses = $(this).attr("theme-device-1");
                var mobileClasses = $(this).attr("theme-device-2");
                if (device == 1) {
                    $(this).removeClass(mobileClasses);
                    $(this).addClass(desktopClasses);
                } else {
                    $(this).removeClass(desktopClasses);
                    $(this).addClass(mobileClasses);
                }
            });
        }

        function seekTo(value) {
            if (ready && isFinite(value)) {
                player.seek(value);
            }
        }

        function updateForegroundColor() {
            $("#ad-ink-admin [player-seekbar]").css("background-color", $("#ad-ink-admin input[name='player_color_foreground']").val());
        }

        function updateBackgroundColor() {
            $("#ad-ink-admin [player-background]").css("background-color", $("#ad-ink-admin input[name='player_color_background']").val());
        }

        function updateTextColor() {
            $("#ad-ink-admin [player-text]").css("color", $("#ad-ink-admin input[name='player_color_text']").val());
        }
    });
})(jQuery);