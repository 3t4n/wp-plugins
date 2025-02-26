jQuery(document).ready(function ($) {
    if (typeof DiscographyData !== 'undefined' && DiscographyData.playlist) {
        // Initialize the jPlayer playlist
        new jPlayerPlaylist(
            {
                jPlayer: "#jquery_jplayer_1",
                cssSelectorAncestor: "#jp_container_1"
            },
            DiscographyData.playlist,
            {
                swfPath: "../js", // Path to the jPlayer SWF file
                supplied: "mp3, oga",
                wmode: "window",
                useStateClassSkin: true,
                autoBlur: false,
                smoothPlayBar: false,
                keyEnabled: true,
                audioFullScreen: true // Enable full screen for audio only
            }
        );
    } else {
        console.warn("No playlist data available.");
    }
});