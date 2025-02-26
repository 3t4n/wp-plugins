<?php
/**
 * @package WP Comment Form
 * 
 * Comment Form WP Backend
 * */

// ABSPATH Defined
if (! defined('ABSPATH')) {
	exit('not valid');
}


// Admin Menu
add_action('admin_menu', 'commentformwp_admin_menu');
function commentformwp_admin_menu(){
	add_submenu_page( 'tools.php', 'WordPress Comment Form', 'Comment Form WP', 'manage_options', 'comment-form-wp', 'commentformwp_option_callback' );
}

// Plugin Option
function commentformwp_option_callback(){ ?>
	
	<div class="commentformwp-option">
		<div class="container">
			<!-- Option Form -->
			<div class="commentformwp-form">
				<h2 class="title">Comment Form WP Option</h2>
				<div class="commentformwp-tabs">
					<!-- tab menu -->
					<ul class="commentformwp-menu">
						<li><a href="#cfwp_settings"><?php esc_html_e('Settings', 'comment-form-wp'); ?></a></li>
						<li><a href="#cfwp_textchange"><?php esc_html_e('Text Changes', 'comment-form-wp'); ?></a></li>
						<li><a href="#cfwp_labelplaceholder"><?php esc_html_e('Label/Placeholder', 'comment-form-wp'); ?></a></li>
					</ul>
					<!-- form -->
					<div class="commentformwp-form_details">
						<!-- settings option -->
						<div id="cfwp_settings">
							<form action="options.php" method="POST">
								<?php wp_nonce_field('update-options'); ?>

								<!-- name option -->
								<label><?php esc_html_e('Name Option Show or Hide', 'comment-form-wp'); ?></label>
								<small style="display:block;"><?php esc_html_e('default: show', 'comment-form-wp'); ?></small>
								<input type="radio" name="commentformwp-nameoption" id="commentformwp-nameoption" value="yes" <?php if(get_option('commentformwp-nameoption') == 'yes'){echo 'checked="checked"';} ?> >
								<label for="commentformwp-nameoption" class="label_yesnot"><?php esc_html_e('Show', 'comment-form-wp'); ?></label>
								<input type="radio" name="commentformwp-nameoption" id="commentformwp-nameoptionnot" value="not" <?php if(get_option('commentformwp-nameoption') == 'not'){echo 'checked="checked"';} ?> >
								<label for="commentformwp-nameoptionnot" class="label_yesnot"><?php esc_html_e('Hide', 'comment-form-wp'); ?></label>

								<!-- email option -->
								<label style="margin-top: 15px;"><?php esc_html_e('Email Option Show or Hide', 'comment-form-wp'); ?></label>
								<small style="display:block;"><?php esc_html_e('default: show', 'comment-form-wp'); ?></small>
								<input type="radio" name="commentformwp-emailoption" id="commentformwp-emailoption" value="yes" <?php if(get_option('commentformwp-emailoption') == 'yes'){echo 'checked="checked"';} ?> >
								<label for="commentformwp-emailoption" class="label_yesnot"><?php esc_html_e('Show', 'comment-form-wp'); ?></label>
								<input type="radio" name="commentformwp-emailoption" id="commentformwp-emailoptionnot" value="not" <?php if(get_option('commentformwp-emailoption') == 'not'){echo 'checked="checked"';} ?> >
								<label for="commentformwp-emailoptionnot" class="label_yesnot"><?php esc_html_e('Hide', 'comment-form-wp'); ?></label>

								<!-- Website option -->
								<label style="margin-top: 15px;"><?php esc_html_e('Website Option Show or Hide', 'comment-form-wp'); ?></label>
								<small style="display:block;"><?php esc_html_e('default: show', 'comment-form-wp'); ?></small>
								<input type="radio" name="commentformwp-websiteoption" id="commentformwp-websiteoption" value="yes" <?php if(get_option('commentformwp-websiteoption') == 'yes'){echo 'checked="checked"';} ?> >
								<label for="commentformwp-websiteoption" class="label_yesnot"><?php esc_html_e('Show', 'comment-form-wp'); ?></label>
								<input type="radio" name="commentformwp-websiteoption" id="commentformwp-websiteoptionnot" value="not" <?php if(get_option('commentformwp-websiteoption') == 'not'){echo 'checked="checked"';} ?> >
								<label for="commentformwp-websiteoptionnot" class="label_yesnot"><?php esc_html_e('Hide', 'comment-form-wp'); ?></label>

								<!-- comment field at last -->
								<label style="margin-top: 15px;"><?php esc_html_e('Comment Field move to Bottom or not', 'comment-form-wp'); ?></label>
								<small style="display:block;"><?php esc_html_e('default: not', 'comment-form-wp'); ?></small>
								<input type="radio" name="commentformwp-commentbottom" id="commentformwp-commentbottom" value="yes" <?php if(get_option('commentformwp-commentbottom') == 'yes'){echo 'checked="checked"';} ?> >
								<label for="commentformwp-commentbottom" class="label_yesnot"><?php esc_html_e('Bottom', 'comment-form-wp'); ?></label>
								<input type="radio" name="commentformwp-commentbottom" id="commentformwp-commentbottomnot" value="not" <?php if(get_option('commentformwp-commentbottom') == 'not'){echo 'checked="checked"';} ?> >
								<label for="commentformwp-commentbottomnot" class="label_yesnot"><?php esc_html_e('Not', 'comment-form-wp'); ?></label>

								<!-- cookies hide/show -->
								<label style="margin-top:15px;"><?php esc_html_e('Cookies Option Hide or Show', 'comment-form-wp'); ?></label>
								<small style="display:block;"><?php esc_html_e('default: show', 'comment-form-wp'); ?></small>
								<input type="radio" name="commentformwp-cookie-hideshow" id="commentformwp-cookie-hideshow" value="yes" <?php if(get_option('commentformwp-cookie-hideshow') == 'yes'){echo 'checked="checked"';} ?> >
								<label for="commentformwp-cookie-hideshow" class="label_yesnot"><?php esc_html_e('Show', 'comment-form-wp'); ?></label>
								<input type="radio" name="commentformwp-cookie-hideshow" id="commentformwp-cookie-hideshownot" value="not" <?php if(get_option('commentformwp-cookie-hideshow') == 'not'){echo 'checked="checked"';} ?> >
								<label for="commentformwp-cookie-hideshownot" class="label_yesnot"><?php esc_html_e('Hide', 'comment-form-wp'); ?></label>
								<!-- cookies text -->
								<div class="commentformwp-cookies">
									<label for="commentformwp-cookies" style="margin-top:15px;"><?php esc_html_e('Cookies Text', 'comment-form-wp'); ?></label>
									<small><?php esc_html_e('default: Save my name, email, and website in this browser for the next time I comment.', 'comment-form-wp'); ?></small>
									<input type="text" name="commentformwp-cookies" id="commentformwp-cookies" placeholder="cookies text here" value="<?php esc_url(print get_option('commentformwp-cookies')); ?>">
								</div>

								<!-- cookies option at last -->
								<label style="margin-top: 15px;"><?php esc_html_e('Cookies option move to Bottom or not (if comment field is bottom)', 'comment-form-wp'); ?></label>
								<small style="display:block; margin-bottom: 0;"><?php esc_html_e('default: not ', 'comment-form-wp'); ?></small>
								<p><span class="style-span" title="red this message">!</span> Must give here <strong>'Not'</strong> if cookies option is <strong>'Hide'</strong></p>
								<input type="radio" name="commentformwp-cookiesbottom" id="commentformwp-cookiesbottom" value="yes" <?php if(get_option('commentformwp-cookiesbottom') == 'yes'){echo 'checked="checked"';} ?> >
								<label for="commentformwp-cookiesbottom" class="label_yesnot"><?php esc_html_e('Bottom', 'comment-form-wp'); ?></label>
								<input type="radio" name="commentformwp-cookiesbottom" id="commentformwp-cookiesbottomnot" value="not" <?php if(get_option('commentformwp-cookiesbottom') == 'not'){echo 'checked="checked"';} ?> >
								<label for="commentformwp-cookiesbottomnot" class="label_yesnot"><?php esc_html_e('Not', 'comment-form-wp'); ?></label>

								<!-- post comment move -->
								<label style="margin-top:15px;"><?php esc_html_e('Post Comment Buttom Right', 'comment-form-wp'); ?></label>
								<small style="display:block;"><?php esc_html_e('default: left', 'comment-form-wp'); ?></small>
								<input type="radio" name="commentformwp-submitbtn-right" id="commentformwp-submitbtn-right" value="not" <?php if(get_option('commentformwp-submitbtn-right') == 'not'){echo 'checked="checked"';} ?> >
								<label for="commentformwp-submitbtn-right" class="label_yesnot"><?php esc_html_e('Left', 'comment-form-wp'); ?></label>
								<input type="radio" name="commentformwp-submitbtn-right" id="commentformwp-submitbtn-rightnot" value="yes" <?php if(get_option('commentformwp-submitbtn-right') == 'yes'){echo 'checked="checked"';} ?> >
								<label for="commentformwp-submitbtn-rightnot" class="label_yesnot"><?php esc_html_e('Right', 'comment-form-wp'); ?></label> <br><br>

								<input type="hidden" name="action" value="update">
								<input type="hidden" name="page_options" value="commentformwp-nameoption, commentformwp-emailoption, commentformwp-websiteoption, commentformwp-commentbottom, commentformwp-cookies, commentformwp-cookie-hideshow, commentformwp-cookiesbottom, commentformwp-submitbtn-right">
								<input type="submit" value="save changes">
							</form>
						</div>	
						<!-- text changes option -->
						<div id="cfwp_textchange">
							<form action="options.php" method="POST">
								<?php wp_nonce_field('update-options'); ?>

								<!-- comment title -->
								<label for="commentformwp-title"><?php esc_html_e('Comment Title', 'comment-form-wp'); ?></label>
								<small><?php esc_html_e('default: Leave a Reply', 'comment-form-wp'); ?></small>
								<input type="text" name="commentformwp-title" id="commentformwp-title" placeholder="Comment Title Here" value="<?php esc_url(print get_option('commentformwp-title')); ?>">

								<!-- comment note -->
								<label for="commentformwp-note"><?php esc_html_e('Comment Form Notes', 'comment-form-wp'); ?></label>
								<small><?php esc_html_e('default: Your email address will not be published. Required fields are marked *', 'comment-form-wp'); ?></small>
								<input type="text" name="commentformwp-note" id="commentformwp-note" placeholder="Comment form note text here" value="<?php esc_url(print get_option('commentformwp-note')); ?>">

								<!-- reply -->
								<label for="commentformwp-reply" style="margin-top:15px;"><?php esc_html_e('Reply Text', 'comment-form-wp'); ?></label>
								<small><?php esc_html_e('default: reply', 'comment-form-wp'); ?></small>
								<input type="text" name="commentformwp-reply" id="commentformwp-reply" placeholder="reply text here" value="<?php esc_url(print get_option('commentformwp-reply')); ?>">

								<!-- cancel reply -->
								<label for="commentformwp-cancel-reply"><?php esc_html_e('Cancel Reply Text', 'comment-form-wp'); ?></label>
								<small><?php esc_html_e('default: cancel reply', 'comment-form-wp'); ?></small>
								<input type="text" name="commentformwp-cancel-reply" id="commentformwp-cancel-reply" placeholder="cancel reply text here" value="<?php esc_url(print get_option('commentformwp-cancel-reply')); ?>">

								<!-- post comment -->
								<label for="commentformwp-submitbtn"><?php esc_html_e('Post Comment Text', 'comment-form-wp'); ?></label>
								<small><?php esc_html_e('default: post comment', 'comment-form-wp'); ?></small>
								<input type="text" name="commentformwp-submitbtn" id="commentformwp-submitbtn" placeholder="post comment text here" value="<?php esc_url(print get_option('commentformwp-submitbtn')); ?>">
								

								<input type="hidden" name="action" value="update">
								<input type="hidden" name="page_options" value="commentformwp-title, commentformwp-note, commentformwp-reply, commentformwp-cancel-reply, commentformwp-submitbtn">
								<input type="submit" value="save changes">
							</form>
						</div>
						<!-- label/placeholder option -->
						<div id="cfwp_labelplaceholder">
							<form action="options.php" method="POST">
								<?php wp_nonce_field('update-options'); ?>
								
								<!-- label/placeholder -->
								<label><?php esc_html_e('Do you want to form label or placeholder?', 'comment-form-wp'); ?></label>
								<small style="display:block;"><?php esc_html_e('default: label', 'comment-form-wp'); ?></small>
								<input type="radio" name="commentformwp-labelyes" id="commentformwp-labelyes" value="yes" <?php if(get_option('commentformwp-labelyes') == 'yes'){echo 'checked="checked"';} ?> >
								<label for="commentformwp-labelyes" class="label_yesnot"><?php esc_html_e('label', 'comment-form-wp'); ?></label>
								<input type="radio" name="commentformwp-labelyes" id="commentformwp-labelnot" value="not" <?php if(get_option('commentformwp-labelyes') == 'not'){echo 'checked="checked"';} ?> >
								<label for="commentformwp-labelnot" class="label_yesnot"><?php esc_html_e('Placeholder', 'comment-form-wp'); ?></label>

								<!-- label -->
								<div class="commentformwp_labelyes">
									<!-- notice -->
									<p><span class="style-span" title="red this message">!</span> If choice Label please empty all Placeholder fields</p>
									<!-- author -->
									<label for="commentformwp-author"><?php esc_html_e('Name Label', 'comment-form-wp'); ?></label>
									<small><?php esc_html_e('default: Name *', 'comment-form-wp'); ?></small>
									<input type="text" name="commentformwp-author" id="commentformwp-author" placeholder="name label text here" value="<?php esc_url(print get_option('commentformwp-author')); ?>">
									<!-- Email -->
									<label for="commentformwp-email"><?php esc_html_e('Email Label', 'comment-form-wp'); ?></label>
									<small><?php esc_html_e('default: Email *', 'comment-form-wp'); ?></small>
									<input type="text" name="commentformwp-email" id="commentformwp-email" placeholder="email label text here" value="<?php esc_url(print get_option('commentformwp-email')); ?>">
									<!-- website -->
									<label for="commentformwp-url"><?php esc_html_e('Website Label', 'comment-form-wp'); ?></label>
									<small><?php esc_html_e('default: Email *', 'comment-form-wp'); ?></small>
									<input type="text" name="commentformwp-url" id="commentformwp-url" placeholder="website label text here" value="<?php esc_url(print get_option('commentformwp-url')); ?>">
									<!-- comments -->
									<label for="commentformwp-textarea"><?php esc_html_e('Comment Label', 'comment-form-wp'); ?></label>
									<small><?php esc_html_e('default: Email *', 'comment-form-wp'); ?></small>
									<input type="text" name="commentformwp-textarea" id="commentformwp-textarea" placeholder="comment label text here" value="<?php esc_url(print get_option('commentformwp-textarea')); ?>">
									<!-- required mark hide/show -->
									<label><?php esc_html_e('Label Required Mark Hide or Show', 'comment-form-wp'); ?></label>
									<small style="display:block;"><?php esc_html_e('default: show', 'comment-form-wp'); ?></small>
									<select name="commentformwp-labelrequired-yes" id="commentformwp-labelrequired-yes">
										<option value="yes" <?php if(get_option('commentformwp-labelrequired-yes') == 'yes'){echo 'selected="selected"';} ?> ><?php esc_html_e('Show', 'comment-form-wp'); ?></option>
										<option value="not" <?php if(get_option('commentformwp-labelrequired-yes') == 'not'){echo 'selected="selected"';} ?> ><?php esc_html_e('Hide', 'comment-form-wp'); ?></option>
									</select>
								</div>

								<!-- placeholder /////-->
								<div class="commentformwp_placeholderyes">
									<!-- notice -->
									<p><span class="style-span" title="red this message">!</span> If choice Placeholder please empty all Label fields</p>
									<!-- author -->
									<label for="commentformwp-author-plc"><?php esc_html_e('Name Placeholder Text', 'comment-form-wp'); ?></label>
									<small><?php esc_html_e('default: none', 'comment-form-wp'); ?></small>
									<input type="text" name="commentformwp-author-plc" id="commentformwp-author-plc" placeholder="name placeholder text here" value="<?php esc_url(print get_option('commentformwp-author-plc')); ?>">
									<!-- Email -->
									<label for="commentformwp-email-plc"><?php esc_html_e('Email Placeholder Text', 'comment-form-wp'); ?></label>
									<small><?php esc_html_e('default: none', 'comment-form-wp'); ?></small>
									<input type="text" name="commentformwp-email-plc" id="commentformwp-email-plc" placeholder="email placeholder text here" value="<?php esc_url(print get_option('commentformwp-email-plc')); ?>">
									<!-- website -->
									<label for="commentformwp-url-plc"><?php esc_html_e('Website Placeholder Text', 'comment-form-wp'); ?></label>
									<small><?php esc_html_e('default: none', 'comment-form-wp'); ?></small>
									<input type="text" name="commentformwp-url-plc" id="commentformwp-url-plc" placeholder="website placeholder text here" value="<?php esc_url(print get_option('commentformwp-url-plc')); ?>">
									<!-- comments -->
									<label for="commentformwp-textarea-plc"><?php esc_html_e('Comment Placeholder Text', 'comment-form-wp'); ?></label>
									<small><?php esc_html_e('default: none', 'comment-form-wp'); ?></small>
									<input type="text" name="commentformwp-textarea-plc" id="commentformwp-textarea-plc" placeholder="comment placeholder text here" value="<?php esc_url(print get_option('commentformwp-textarea-plc')); ?>">
									<!-- required mark hide/show -->
									<label><?php esc_html_e('Placeholder Required Mark Hide or Show', 'comment-form-wp'); ?></label>
									<small style="display:block;"><?php esc_html_e('default: hide', 'comment-form-wp'); ?></small>
									<select name="commentformwp-placerequired-yes" id="commentformwp-placerequired-yes">
										<option value="not" <?php if(get_option('commentformwp-placerequired-yes') == 'not'){echo 'selected="selected"';} ?> ><?php esc_html_e('Hide', 'comment-form-wp'); ?></option>
										<option value="yes" <?php if(get_option('commentformwp-placerequired-yes') == 'yes'){echo 'selected="selected"';} ?> ><?php esc_html_e('Show', 'comment-form-wp'); ?></option>
									</select>
								</div>
								
								<input type="hidden" name="action" value="update">
								<input type="hidden" name="page_options" value="commentformwp-labelyes, commentformwp-labelrequired-yes, commentformwp-author, commentformwp-email, commentformwp-url, commentformwp-textarea,  commentformwp-author-plc, commentformwp-email-plc, commentformwp-url-plc, commentformwp-textarea-plc, commentformwp-placerequired-yes">
								<input type="submit" value="save changes">
							</form>
						</div>
							
					</div>
					<!-- WP Comment Form Backend Script -->
					<script>
						(function($){
							'use strict';
							jQuery(document).ready(function($){
								// tabs
								jQuery('.commentformwp-tabs').tabs();
								
								// Placeholder and Label
								jQuery('.commentformwp-option .commentformwp_placeholderyes').hide();
								jQuery('.commentformwp-option input#commentformwp-labelyes').click(function(e){
									jQuery('.commentformwp-option .commentformwp_labelyes').show();
									jQuery('.commentformwp-option .commentformwp_placeholderyes').hide();
								});

								jQuery('.commentformwp-option input#commentformwp-labelnot').click(function(e){
									jQuery('.commentformwp-option .commentformwp_labelyes').hide();
									jQuery('.commentformwp-option .commentformwp_placeholderyes').show();
								});

								if (jQuery('.commentformwp-option input#commentformwp-labelyes').prop('checked')){
									jQuery('.commentformwp-option .commentformwp_labelyes').show();
									jQuery('.commentformwp-option .commentformwp_placeholderyes').hide();
								}
								if (jQuery('.commentformwp-option input#commentformwp-labelnot').prop('checked')){
									jQuery('.commentformwp-option .commentformwp_labelyes').hide();
									jQuery('.commentformwp-option .commentformwp_placeholderyes').show();
								}

								// Cookies Script
								jQuery('.commentformwp-option input#commentformwp-cookie-hideshow').click(function(){
									jQuery('.commentformwp-option .commentformwp-cookies').show();
								});
								jQuery('.commentformwp-option input#commentformwp-cookie-hideshownot').click(function(){
									jQuery('.commentformwp-option .commentformwp-cookies').hide();
								});

								if (jQuery('.commentformwp-option input#commentformwp-cookie-hideshownot').prop('checked')) {
									jQuery('.commentformwp-option .commentformwp-cookies').hide();
								}

								
							});
						})(jQuery);
					</script>
				</div>
			</div>
			<!-- Author -->
			<div class="commentformwp-author">
				<h2 class="title">Author</h2>
				<div class="author-img">
                    <img src="<?php echo esc_url(COMMENTFORMWP_PLUGIN_URL . 'img/habibcoder.jpg'); ?>" alt="HabibCoder">
                </div>
                <h4 class="author-name"> <?php esc_html_e('HabibCoder', 'comment-form-wp'); ?> </h4>
                <div class="author-description">
                    <p><?php esc_html_e('I\'m ', 'comment-form-wp'); ?><a href="<?php echo esc_url('http://habibcoder.com'); ?>" target="_blank"><?php esc_html_e('Habibur Rahman', 'comment-form-wp') ?></a> <?php esc_html_e('and a Professional Web Developer and Web Designer. For the last some years, I\'m working in this field with national and international clients. I have done many more projects with client satisfaction.', 'comment-form-wp'); ?><br>
                    <?php esc_html_e('This is an open-source WordPress Plugin. If you want to support me, You can', 'comment-form-wp'); ?> <b><?php esc_html_e('click on the Buy Me a Coffe Button', 'comment-form-wp'); ?></b>. <br> <?php esc_html_e('Thank You !.', 'comment-form-wp'); ?> </p>
                </div>
                <div class="donate-btn">
                    <a href="<?php echo esc_url('https://www.buymeacoffee.com/habibcoder'); ?>" target="_blank">
                    <h4><span>🍦</span><?php esc_html_e('Buy Me A Coffee', 'comment-form-wp'); ?></h4>
                    </a>
                </div>
                <h3 class="social-title"> 
                    <?php esc_html_e('Follow Me', 'comment-form-wp'); ?>
                </h3>
                <div class="social-icons">
                    <a class="facebook" title="Facebook" href="<?php echo esc_url('http://facebook.com/habibcoder1'); ?>" target="_blank"><img src="<?php echo esc_url( COMMENTFORMWP_PLUGIN_URL . 'img/commentformwp-facebook.png'); ?>" alt="facebook"></a>
                    <a class="linkedin" title="LinkedIn" href="<?php echo esc_url('http://linkedin.com/in/habibcoder'); ?>" target="_blank"><img src="<?php echo esc_url(COMMENTFORMWP_PLUGIN_URL . 'img/commentformwp-linkedin.png'); ?>" alt="LinkedIn"></a>
                    <a class="instagram" title="Instagram" href="<?php echo esc_url('http://instagram.com/habibcoder'); ?>" target="_blank"><img src="<?php echo esc_url(COMMENTFORMWP_PLUGIN_URL . 'img/commentformwp-instagram.png'); ?>" alt="instagram"></a>
                    <a class="website" title="Website" href="<?php echo esc_url('http://habibcoder.com'); ?>" target="_blank"><img src="<?php echo esc_url(COMMENTFORMWP_PLUGIN_URL . 'img/website.png'); ?>" alt="HabibCoder"></a>
                </div>
                <div class="thank-you">
                    <span>♥</span>
                    <h5><?php esc_html_e('Thank You', 'comment-form-wp'); ?></h5>
                    <span>♥</span>
                </div>
			</div>
		</div>
	</div>

<?php
}