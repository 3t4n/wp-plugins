jQuery(document).ready(function($) {
    $('#generate-article').click(function() {
        $('#loading').show();
        $('#result').hide();
        $('#generate-article').prop('disabled', true);

        // AJAXリクエストを送信して記事を生成
        $.post(aiArticleGenerator.ajaxurl, {
            action: 'generate_article',
            nonce: aiArticleGenerator.nonce
        }, function(response) {
            $('#loading').hide();
            $('#generate-article').prop('disabled', false);
            $('#result').html('<p>' + response.data + '</p>').show();
        }).fail(function(xhr, status, error) {
            $('#loading').hide();
            $('#generate-article').prop('disabled', false);
            $('#result').html('<p class="error">エラーが発生しました: ' + error + '</p>').show();
        });
    });
});