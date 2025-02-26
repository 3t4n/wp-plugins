jQuery(document).ready(function($) {
    var filename = window.location.pathname.split('/').pop();

    switch (filename) {
        case 'post-new.php':
        case 'post.php':
            // For new and basic post pages
			
            
            /*$('#title').bind("keydown", switchKBonKeyDown);
            $('#title').bind("keypress", switchKBonKeyPress);
            $('#content').bind("keydown", switchKBonKeyDown);
            $('#content').bind("keypress", switchKBonKeyPress);*/
			console.log('This is the new page.');
            break;

        case 'edit.php':
            // For edit post pages
            if ($('#posts-filter input:text[name=s]').length > 0) {
                $('#posts-filter input:text[name=s]').bind("keydown", switchKBonKeyDown);
                $('#posts-filter input:text[name=s]').bind("keypress", switchKBonKeyPress);
            } else if ($('#post-search-input').length > 0) {
                $('#post-search-input').bind("keydown", switchKBonKeyDown);
                $('#post-search-input').bind("keypress", switchKBonKeyPress);
            }

            // Quick Edit fields
            $('input:text[name=post_title]').bind("keydown", switchKBonKeyDown);
            $('input:text[name=post_title]').bind("keypress", switchKBonKeyPress);
            $('input:text[name=post_name]').bind("keydown", switchKBonKeyDown);
            $('input:text[name=post_name]').bind("keypress", switchKBonKeyPress);
            $('textarea[name=tags_input]').bind("keydown", switchKBonKeyDown);
            $('textarea[name=tags_input]').bind("keypress", switchKBonKeyPress);
            $('textarea[data-wp-taxonomy=post_tag]').bind("keydown", switchKBonKeyDown);
            $('textarea[data-wp-taxonomy=post_tag]').bind("keypress", switchKBonKeyPress);
			console.log('This is the edit.php page.');
            break;

        case 'edit-pages.php':
            // For edit pages
            if ($('#posts-filter input:text[name=s]').length > 0) {
                $('#posts-filter input:text[name=s]').bind("keydown", switchKBonKeyDown);
                $('#posts-filter input:text[name=s]').bind("keypress", switchKBonKeyPress);
            } else if ($('#page-search-input').length > 0) {
                $('#page-search-input').bind("keydown", switchKBonKeyDown);
                $('#page-search-input').bind("keypress", switchKBonKeyPress);
            }

            // Quick Edit fields
            $('input:text[name=post_title]').bind("keydown", switchKBonKeyDown);
            $('input:text[name=post_title]').bind("keypress", switchKBonKeyPress);
            $('input:text[name=post_name]').bind("keydown", switchKBonKeyDown);
            $('input:text[name=post_name]').bind("keypress", switchKBonKeyPress);
			console.log('This is the edit-pages.php page.');
            break;

        case 'edit-tags.php':
        case 'term.php':
            // For edit tags and term pages
            if ($('#posts-filter input:text[name=s]').length > 0) {
                $('#posts-filter input:text[name=s]').bind("keydown", switchKBonKeyDown);
                $('#posts-filter input:text[name=s]').bind("keypress", switchKBonKeyPress);
            } else if ($('#tag-search-input').length > 0) {
                $('#tag-search-input').bind("keydown", switchKBonKeyDown);
                $('#tag-search-input').bind("keypress", switchKBonKeyPress);
            }

            $('#tag-name').bind("keydown", switchKBonKeyDown);
            $('#tag-name').bind("keypress", switchKBonKeyPress);
            $('#tag-slug').bind("keydown", switchKBonKeyDown);
            $('#tag-slug').bind("keypress", switchKBonKeyPress);
            $('#tag-description').bind("keydown", switchKBonKeyDown);
            $('#tag-description').bind("keypress", switchKBonKeyPress);

            // Quick Edit fields
            $('.ptitle').bind("keydown", switchKBonKeyDown);
            $('.ptitle').bind("keypress", switchKBonKeyPress);

            // Single tag edit
            $('#name').bind("keydown", switchKBonKeyDown);
            $('#name').bind("keypress", switchKBonKeyPress);
            $('#slug').bind("keydown", switchKBonKeyDown);
            $('#slug').bind("keypress", switchKBonKeyPress);
            $('#description').bind("keydown", switchKBonKeyDown);
            $('#description').bind("keypress", switchKBonKeyPress);
			console.log('This is the edit-tags or term.php page.');
            break;

        case 'edit-comments.php':
            // For edit comments page
            if ($('#comments-form input:text[name=s]').length > 0) {
                $('#comments-form input:text[name=s]').bind("keydown", switchKBonKeyDown);
                $('#comments-form input:text[name=s]').bind("keypress", switchKBonKeyPress);
            } else if ($('#comment-search-input').length > 0) {
                $('#comment-search-input').bind("keydown", switchKBonKeyDown);
                $('#comment-search-input').bind("keypress", switchKBonKeyPress);
            }

            $('input:text[name=newcomment_author]').bind("keydown", switchKBonKeyDown);
            $('input:text[name=newcomment_author]').bind("keypress", switchKBonKeyPress);
            $('#replycontent').bind("keydown", switchKBonKeyDown);
            $('#replycontent').bind("keypress", switchKBonKeyPress);
			console.log('This is the edit-comments.php page.');
            break;

        case 'link-manager.php':
            // For link manager page
            if ($('input:text[name=s]').length > 0) {
                $('input:text[name=s]').bind("keydown", switchKBonKeyDown);
                $('input:text[name=s]').bind("keypress", switchKBonKeyPress);
            } else if ($('#link-search-input').length > 0) {
                $('#link-search-input').bind("keydown", switchKBonKeyDown);
                $('#link-search-input').bind("keypress", switchKBonKeyPress);
            }
			console.log('This is the link-manager.php page.');
            break;

        case 'link.php':
        case 'link-add.php':
            // For adding and managing links
            $('#newcat').bind("keydown", switchKBonKeyDown);
            $('#newcat').bind("keypress", switchKBonKeyPress);
            $('#link_name').bind("keydown", switchKBonKeyDown);
            $('#link_name').bind("keypress", switchKBonKeyPress);
            $('#link_description').bind("keydown", switchKBonKeyDown);
            $('#link_description').bind("keypress", switchKBonKeyPress);
            $('#link_notes').bind("keydown", switchKBonKeyDown);
            $('#link_notes').bind("keypress", switchKBonKeyPress);
            break;

        case 'options-general.php':
            // For general settings
            $('#blogname').bind("keydown", switchKBonKeyDown);
            $('#blogname').bind("keypress", switchKBonKeyPress);
            $('#blogdescription').bind("keydown", switchKBonKeyDown);
            $('#blogdescription').bind("keypress", switchKBonKeyPress);
			console.log('This is the options-general.php page.');
            break;

        case 'options-discussion.php':
            // For discussion settings
            $('#moderation_keys').bind("keydown", switchKBonKeyDown);
            $('#moderation_keys').bind("keypress", switchKBonKeyPress);
            $('#blacklist_keys').bind("keydown", switchKBonKeyDown);
            $('#blacklist_keys').bind("keypress", switchKBonKeyPress);
			console.log('This is the options-discussion.php page.');
            break;

        case 'options-permalink.php':
            // For permalink settings
            $('#category_base').bind("keydown", switchKBonKeyDown);
            $('#category_base').bind("keypress", switchKBonKeyPress);
            $('#tag_base').bind("keydown", switchKBonKeyDown);
            $('#tag_base').bind("keypress", switchKBonKeyPress);
			console.log('This is the options-permalink.php page.');
            break;

        case 'comment.php':
            // For comment editing page
            if ($('#post input:text[name=newcomment_author]').length > 0) {
                $('#post input:text[name=newcomment_author]').bind("keydown", switchKBonKeyDown);
                $('#post input:text[name=newcomment_author]').bind("keypress", switchKBonKeyPress);
            } else if ($('#name').length > 0) {
                $('#name').bind("keydown", switchKBonKeyDown);
                $('#name').bind("keypress", switchKBonKeyPress);
            }

            $('#content').bind("keydown", switchKBonKeyDown);
            $('#content').bind("keypress", switchKBonKeyPress);
			console.log('This is the comment.php page.');
            break;
			
		case 'users.php':
            // For users editing page
            $('#user-search-input').bind("keydown", switchKBonKeyDown);
			$('#user-search-input').bind("keypress", switchKBonKeyPress);
			console.log('This is the users.php page.');
            break;
			
		case 'admin.php':
            // For admin editing page
            $('#title').bind("keydown", switchKBonKeyDown);
			$('#title').bind("keypress", switchKBonKeyPress);
			$('#wpcf7-form').bind("keydown", switchKBonKeyDown);
			$('#wpcf7-form').bind("keypress", switchKBonKeyPress);
			$('#wpcf7-mail-subject').bind("keydown", switchKBonKeyDown);
			$('#wpcf7-mail-subject').bind("keypress", switchKBonKeyPress);
			$('#wpcf7-mail-body').bind("keydown", switchKBonKeyDown);
			$('#wpcf7-mail-body').bind("keypress", switchKBonKeyPress);
			$('#wpcf7-mail-attachments').bind("keydown", switchKBonKeyDown);
			$('#wpcf7-mail-attachments').bind("keypress", switchKBonKeyPress);
			console.log('This is the admin.php page.');
			break;
			
		case 'nav-menus.php':
            // For Nav menu editing page
            $('#menu-name').bind("keydown", switchKBonKeyDown);
			$('#menu-name').bind("keypress", switchKBonKeyPress);
			$('#custom-menu-item-name').bind("keydown", switchKBonKeyDown);
			$('#custom-menu-item-name').bind("keypress", switchKBonKeyPress);
			
             //post search
			if($('input:text[name=submit-quick-search-posttype-post]').length > 0){
				$('input:text[name=submit-quick-search-posttype-post]').bind("keydown", switchKBonKeyDown);
				$('input:text[name=submit-quick-search-posttype-post]').bind("keypress", switchKBonKeyPress);
			} else if($('#quick-search-posttype-post').length > 0){
				$('#quick-search-posttype-post').bind("keydown", switchKBonKeyDown);
				$('#quick-search-posttype-post').bind("keypress", switchKBonKeyPress);
			} 

			//page search
			if($('input:text[name=submit-quick-search-posttype-page]').length > 0){
				$('input:text[name=submit-quick-search-posttype-page]').bind("keydown", switchKBonKeyDown);
				$('input:text[name=submit-quick-search-posttype-page]').bind("keypress", switchKBonKeyPress);
			} else if($('#quick-search-posttype-page').length > 0){
				$('#quick-search-posttype-page').bind("keydown", switchKBonKeyDown);
				$('#quick-search-posttype-page').bind("keypress", switchKBonKeyPress);
			} 

			//category search
			if($('input:text[name=submit-quick-search-taxonomy-category]').length > 0){
				$('input:text[name=submit-quick-search-taxonomy-category]').bind("keydown", switchKBonKeyDown);
				$('input:text[name=submit-quick-search-taxonomy-category]').bind("keypress", switchKBonKeyPress);
			} else if($('#quick-search-taxonomy-category').length > 0){
				$('#quick-search-taxonomy-category').bind("keydown", switchKBonKeyDown);
				$('#quick-search-taxonomy-category').bind("keypress", switchKBonKeyPress);
			} 
			console.log('This is the nav-menus.php page.');
            break;
			
		case 'profile.php':
        case 'user-new.php':
            // For Profile & User New pages
            $('#first_name').bind("keydown", switchKBonKeyDown);
			$('#first_name').bind("keypress", switchKBonKeyPress);
			$('#last_name').bind("keydown", switchKBonKeyDown);
			$('#last_name').bind("keypress", switchKBonKeyPress);
			$('#nickname').bind("keydown", switchKBonKeyDown);
			$('#nickname').bind("keypress", switchKBonKeyPress);
			$('#description').bind("keydown", switchKBonKeyDown);
			$('#description').bind("keypress", switchKBonKeyPress);
			$('#user_login').bind("keydown", switchKBonKeyDown);
			$('#user_login').bind("keypress", switchKBonKeyPress);
			console.log('This is the profile or user-new.php page.');
            break;
			
		case 'media.php':
            // For Media editing page
            $('#media-single-form').bind("keydown", switchKBonKeyDown);
			$('#media-single-form').bind("keypress", switchKBonKeyPress);
			 console.log('This is the media.php page.');
            break;
			
		case 'widgets.php':
            // For Media editing page
            $('#anblogs-title').bind("keydown", switchKBonKeyDown);
			$('#anblogs-title').bind("keypress", switchKBonKeyPress);
			$('#widget-search-1-title,#widget-search-2-title,#widget-search-3-title').bind("keydown", switchKBonKeyDown);
			$('#widget-search-1-title,#widget-search-2-title,#widget-search-3-title').bind("keypress", switchKBonKeyPress);
			$('#widget-recent-posts-1-title,#widget-recent-posts-2-title,#widget-recent-posts-3-title').bind("keydown", switchKBonKeyDown);
			$('#widget-recent-posts-1-title,#widget-recent-posts-2-title,#widget-recent-posts-3-title').bind("keypress", switchKBonKeyPress);
			$('#widget-categories-1-title,#widget-categories-2-title,#widget-categories-3-title').bind("keydown", switchKBonKeyDown);
			$('#widget-categories-1-title,#widget-categories-2-title,#widget-categories-3-title').bind("keypress", switchKBonKeyPress);
			$('#widget-calendar-1-title,#widget-calendar-2-title,#widget-calendar-3-title').bind("keydown", switchKBonKeyDown);
			$('#widget-calendar-1-title,#widget-calendar-2-title,#widget-calendar-3-title').bind("keypress", switchKBonKeyPress);
			console.log('This is the widgets.php page.');
            break;
			
		case 'upload.php':
            // For Media editing page
            if($('input:text[name=s]').length > 0){
				$('input:text[name=s]').bind("keydown", switchKBonKeyDown);
				$('input:text[name=s]').bind("keypress", switchKBonKeyPress);
			} else if($('#media-search-input').length > 0){
				$('#media-search-input').bind("keydown", switchKBonKeyDown);
				$('#media-search-input').bind("keypress", switchKBonKeyPress);
			} 
			console.log('This is the upload.php page.');
            break;

        
    }
});
