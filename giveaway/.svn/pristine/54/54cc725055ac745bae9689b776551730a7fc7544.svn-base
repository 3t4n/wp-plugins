<?php
@include_once dirname(__FILE__) . '/controls.php';

$plugin = Giveaway::$instance;

// The comments (cleaned of duplicates) of the selected post (if one).
function giveaway_get_comments($post_id) {
    global $wpdb;

    // get the number of direct replies too
    //$comments = $wpdb->get_results("select comment_id id, lower(comment_author_email) email, comment_author name, comment_post_id post_id, coalesce(wc.replies, 0) replies from " . $wpdb->prefix . "comments
    //    left outer join (select comment_parent cp, count(*) replies from " . $wpdb->prefix . "comments where comment_post_id=" . $post_id . " and comment_type='' group by comment_parent) wc
    //    on comment_id=wc.cp where comment_parent=0 and comment_post_id=" . $post_id . " and comment_type='' and comment_author_email<>''");

    $comments = $wpdb->get_results("select comment_id id, lower(comment_author_email) email, comment_author name, comment_post_id post_id from " . $wpdb->prefix .
        "comments where comment_parent=0 and comment_post_id=" . $post_id . " and comment_type='' and comment_author_email<>''");
    if (empty($comments)) return null;
    $results = array();
    $duplicates = array();
    foreach($comments as $comment) {
        // Cleans email like xxx+yyy@aaa.bbb to xxx@aaa.bbb
        // TODO
        if (isset($duplicates[$comment->email])) continue;
        $duplicates[$comment->email] = 1;
        $results[] = $comment;
    }

    // Replies count
    foreach($results as $comment) {
        $comment->replies = $wpdb->get_var("select count(*) from " . $wpdb->prefix .
        "comments where comment_parent=" . $comment->id . " and lower(comment_author_email)<>'" . $comment->email . "'");
    }
    return $results;
}

function giveaway_replace($text, $comment) {
    $text = str_replace('{post_link}', get_permalink($comment->post_id), $text);
    $text = str_replace('{comment_link}', get_comment_link($comment->id), $text);
    $text = str_replace('{name}', $comment->name, $text);
    $text = str_replace('{email}', $comment->email, $text);
    return $text;
}

// If there is no action requested...
if (!$controls->is_action()) {
    // Nothing
}
else {
    // Process known actions. Some actions need to process the options, do something
    // without storing them on the database but showing them to the user a second time.
    if ($controls->is_action('save')) {
        $plugin->set_options(stripslashes_deep($_POST['options']));
    }

    if ($controls->is_action('reset')) {
        $plugin->set_options($plugin->get_default_options());
    }

    if ($controls->is_action('send')) {
        $plugin->set_options(stripslashes_deep($_POST['options']));
        $controls->options = $plugin->get_options();

        $headers = "MIME-Version: 1.0\n";
        $headers .= "Content-Type: text/plain;charset=UTF-8\n";
        $headers .= "From: " . $controls->options['sender_name'] . " <" . $controls->options['sender_email'] . ">\n";

        $comments = giveaway_get_comments($controls->options['post']);
        $i = 0;
        foreach($comments as $comment) {
            $i++;
            wp_mail($comment->email, giveaway_replace($controls->options['email_subject'], $comment),
                    giveaway_replace($controls->options['email_body'], $comment), $headers);
        }
        $controls->errors = 'Sent to ' . $i . ' participants.';
    }

    // Test the email sending it to the blog admin
    if ($controls->is_action('test')) {
        $plugin->set_options(stripslashes_deep($_POST['options']));
        $controls->options = $plugin->get_options();
        $headers = "MIME-Version: 1.0\n";
        $headers .= "Content-Type: text/plain;charset=UTF-8\n";
        $headers .= "From: " . $controls->options['sender_name'] . " <" . $controls->options['sender_email'] . ">\n";

        $comment = new stdClass();
        $comment->id = 0;
        $comment->name = 'John Smith';
        $comment->email = 'john.smith@example.com';
        $comment->post_id = $controls->options['post'];

        $r = wp_mail(get_option('admin_email'), giveaway_replace($controls->options['email_subject'], $comment),
                giveaway_replace($controls->options['email_body'], $comment), $headers);

        if ($r)
            $controls->errors = 'Test email sent to ' . get_option('admin_email') . '.';
        else
            $controls->errors = 'Test email failed, check the sender data, to have a non empty subject and body.';
    }

    if ($controls->is_action('extract')) {
        $plugin->set_options(stripslashes_deep($_POST['options']));
        $comments = giveaway_get_comments($plugin->get_option('post'));
        $idx = rand(1, count($comments));
        $controls->errors = 'The winner is: ' . $idx . ' ' . $comments[$idx-1]->name . '.';
    }

}

if ($controls->options == null) $controls->options = $plugin->get_options();

?>
<script type="text/javascript">
function giveaway_print(id)
{
    var h = window.open("", "print");
    var oIframe = document.getElementById('giveaway_iframe');
    var oContent = document.getElementById(id).innerHTML;
    var oDoc = h.document; //(oIframe.contentWindow || oIframe.contentDocument);
    if (oDoc.document) oDoc = oDoc.document;
    oDoc.write("<html><head><style>table {width: 175mm; border-collapse: collapse;} td {font-size: 3mm; font-family: arial; width: 35mm; overflow: hidden; height: 15mm; border: 0.2mm solid #000}</style>");
    oDoc.write("</head><body>");
    oDoc.write(oContent + "</body></html>");
    oDoc.close();
}
</script>

<div class="wrap metabox-holder">
    <div id="satollo-header">
        <a href="http://www.satollo.net/plugins/giveaway" target="_blank">Get Help</a>
        <a href="http://www.satollo.net/forums" target="_blank">Forum</a>

        <form style="display: inline; margin: 0;" action="http://www.satollo.net/wp-content/plugins/newsletter/do/subscribe.php" method="post" target="_blank">
            Subscribe to satollo.net <input type="email" name="ne" required placeholder="Your email">
            <input type="hidden" name="nr" value="giveaway">
            <input type="submit" value="Go">
        </form>

        <a href="https://www.facebook.com/satollo.net" target="_blank"><img style="vertical-align: bottom" src="http://www.satollo.net/images/facebook.png"></a>

        <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=5PHGDGNHAYLJ8" target="_blank"><img style="vertical-align: bottom" src="http://www.satollo.net/images/donate.png"></a>
        <a href="http://www.satollo.net/donations" target="_blank">Even <b>2$</b> helps: read more</a>
    </div>
    
    <h2>Giveaway</h2>

    <?php if (!empty($controls->errors)) { ?>
    <div class="updated">
        <p><?php echo $controls->errors; ?></p>
    </div>
    <?php } ?>

    <p>
        Giveaways managed by this plugin is when you create a post and ask the readers to comment on it (may be with a specific theme).
        When the giveaway ends, you close the comment and extract randomly a subscriber. Giveaways posts need to be tagged to be recognized
        usually with "giveaway" word, but you can change it below.
    </p>
    <p>
        The plugin can randomly choose a winner (removing duplicates) or print the list so you can cut out some tickets with participant
        names and publish a video where you extract the winner from a bag (credibility is not an option).
    </p>

    <form method="post" action="">
        <?php $controls->init(); ?>

        <div class="postbox">
        <h3 class="hndle"><span>Configuration</span></h3>

        <table class="form-table">
            <tr valign="top">
                <th>Current giveaway post</th>
                <td>
                    <?php
                    $posts = get_posts(array('tag'=>$controls->options['tag']));
                    $opts = array(0=>'Select a giveaway post to work on');
                    foreach($posts as $post) {
                        $opts[$post->ID] = $post->post_title;
                    }
                    ?>
                    <?php $controls->select('post', $opts); ?>
                    <?php $controls->button('save', 'Select'); ?>
                    <?php $controls->button('extract', 'Extract a winner'); ?>

                </td>
            </tr>
        </table>
        </div>

        <div class="postbox">
        <h3 class="hndle"><span>Participants</span></h3>
        <table class="form-table">
            <tr valign="top">
                <th>Participants</th>
                <td>
                    <?php
                    $comments = giveaway_get_comments($controls->options['post']);
                    if (!empty($comments)) {
                    ?>

                        <div style="height: 400px; overflow: auto; border: 1px solid #999; padding: 10px;" id="giveaway_table">
                        <table class="widefat" >
                            <thead><tr><th>Number</th><th>Name</th><th>Email</th><th>Replies</th><th>Comment ID</th></tr></thead>
                        <?php
                        $i = 0;
                        foreach($comments as $comment) {
                            $i++;
                        ?>
                        <tr><td><?php echo $i; ?></td><td><?php echo $comment->name; ?></td><td><?php echo $comment->email; ?></td><td><?php echo $comment->replies; ?></td><td><?php echo $comment->id; ?></td></tr>
                        <?php
                        }
                        ?>
                        </table>
                        </div>

                        <div style="display: none" id="giveaway_print">
                            <table border="1" cellspacing="0" cellpadding="3">
                            <?php
                            $i = 0;
                            foreach($comments as $comment) {
                                $i++;
                                if ($i % 5 == 1) echo '<tr>';
                            ?>
                            <td><small><?php echo $i; ?></small><br /><?php echo $comment->name; ?></td>
                            <?php
                            }
                            ?>
                            </table>
                        </div>
                        <iframe style="display: none" id="giveaway_iframe"></iframe>
                        <input type="button" class="button-secondary" value="Print" onclick="giveaway_print('giveaway_table')"/>
                        <input type="button" class="button-secondary" value="Print ticket table" onclick="giveaway_print('giveaway_print')"/>

                    <?php } else { ?>

                        Select a giveaway post above (or wait for some participants)

                    <?php } ?>
                </td>
            </tr>

            <tr valign="top">
                <th>Mass mail to participants</th>
                <td>
                    <?php $controls->text('email_subject', 70); ?><br />
                    <?php $controls->textarea('email_body'); ?><br />
                    <?php $controls->button('save', 'Save'); ?>
                    <?php $controls->button('test', 'Test'); ?>
                    <?php if (!empty($comments)) { ?>
                        <?php $controls->button('send', 'Send', 'Really?'); ?>
                    <?php } else { ?>
                        Select a giveaway post to send emails.
                    <?php } ?>
                    <div class="hints">
                       The email is in text format, no HTML. Test email is sent to blog admin. Some tags are available to personalize the email body
                       and subject:<br />
                       {name} - comment author name<br />
                       {email} - comment author email<br />
                       {comment_link} - link to the author comment<br />
                       {post_link} - link to the giveaway post
                    </div>
                </td>
            </tr>
        </table>
        </div>

        <div class="postbox">
        <h3 class="hndle"><span>Common options</span></h3>

        <table class="form-table">
            <tr valign="top">
                <th>Thank you email to participants</th>
                <td>
                    <?php $controls->text('thankyou_email_subject', 70); ?><br />
                    <?php $controls->textarea('thankyou_email_body'); ?><br />
                    <?php $controls->button('save', 'Save'); ?>
                    <?php //$controls->button('thankyou_test', 'Test'); ?>

                    <div class="hints">
                        Email sent to each participant of a giveaway when the enter the contest. The email is in text format, no HTML.
                        Test email is sent to blog admin. Leave the subject empty to block this service.
                        Some tags are available to personalize the email body
                       and subject:<br />
                       {name} - comment author name<br />
                       {email} - comment author email<br />
                       {comment_link} - link to the author comment<br />
                       {post_link} - link to the giveaway post
                    </div>
                </td>
            </tr>
            <tr valign="top">
                <th>Tag that identify giveaway posts</th>
                <td>
                    <?php $controls->text('tag'); ?>
                </td>
            </tr>
            <tr valign="top">
                <th>Email sender</th>
                <td>
                    address: <?php $controls->text('sender_email', 30); ?>
                    name: <?php $controls->text('sender_name', 30); ?>
                </td>
            </tr>
            <tr valign="top">
                <th>Enable logging?</th>
                <td>
                    <?php $controls->select('log', array(0=>'No', 1=>'Error level', 2=>'Informative level', 3=>'Debug level')); ?>
                    <div class="hints">
                        Logs are written on "log.txt" file inside the plugin folder. Debug level can disclose sensible data and create
                        huge log file.
                    </div>
                </td>
            </tr>
        </table>
        <p class="submit">
            <?php $controls->button('save', 'Save'); ?>
            <?php $controls->button('reset', 'Reset to defaults'); ?>
        </p>
        </div>
    </form>

</div>

