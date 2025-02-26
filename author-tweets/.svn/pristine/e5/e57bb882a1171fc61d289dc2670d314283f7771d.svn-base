function twitter_callback_function( tweet ) {
    var name = tweet[0].user.name.split(' ', 1);
    $('#latest_authortweet').html(
        '<div class="me">' +
        '<img src="/wp-content/plugins/author-tweets/twitter-32x32.png" style="float:left;width:32px;height:32px;padding:10px;" alt=""/><strong><a href="http://twitter.com/' +
        tweet[0].user.screen_name + '" target="_blank">' +
         name[0] + '&#39;s Latest Tweet:</a></strong></div><div class="msg">' +
        tweet[0].text + '</div>'
    );
    $('#latest_authortweet').addClass('last_author_tweet');
}