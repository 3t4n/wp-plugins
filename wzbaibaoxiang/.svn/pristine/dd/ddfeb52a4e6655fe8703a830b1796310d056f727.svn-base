jQuery(document).ready(function($) {
    const wpmedia =wp.media.frame.content.get().collection;
    console.log(wpmedia);
    // 动态生成分类筛选器
    var html = '<select name="websitebox_media_category" class="websitebox_change"><option value="">所有分类</option>';
    websiteboxTerms.forEach(function(term) {
        var selected = term.selected ? 'selected="selected"' : '';
        html += '<option value="' + term.term_id + '" ' + selected + '>' + term.name + '</option>';
    });
    html += '</select>';

    $('.media-toolbar-secondary').append(html);

    var currentPage = 1; // 当前页码
    var categorySlug = ''; // 当前选择的分类

    // 监听筛选器的更改事件
    $('.websitebox_change').on('change', function() {
        categorySlug = $(this).val();
        currentPage = 1;
        
        if (wp.media.frame && wp.media.frame.content.get().collection) {
            wp.media.frame.content.get().collection.props.set({
                'websitebox_media_category': categorySlug || undefined,
                'orderby': 'date',
                'order': 'DESC',
                'posts_per_page': 80,
                'paged': currentPage
            });

            wp.media.frame.content.get().collection.reset();
            wp.media.frame.content.get().collection.more();
        } else {
            wpmedia.props.set({
                'websitebox_media_category': categorySlug || undefined,
                'orderby': 'date',
                'order': 'DESC',
                'posts_per_page': 80,
                'paged': currentPage
            });
            wpmedia.reset();
            wpmedia.more();
        }
    });

    // 点击"加载更多"按钮加载下一页数据
    $(document).on('click', '.load-more-button', function() {
        currentPage++;

        if (wp.media.frame && wp.media.frame.content.get().collection) {
            wp.media.frame.content.get().collection.props.set({
                'websitebox_media_category': categorySlug || undefined,
                'posts_per_page': 80,
                'paged': currentPage
            });

            wp.media.frame.content.get().collection.more();
        }else{
              wpmedia.props.set({
                'websitebox_media_category': categorySlug || undefined,
                'orderby': 'date',
                'order': 'DESC',
                'posts_per_page': 80,
                'paged': currentPage
            });
            wpmedia.more();
        } 
    });
});