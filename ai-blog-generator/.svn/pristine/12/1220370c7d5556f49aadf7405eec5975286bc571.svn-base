<?php
   defined('ABSPATH') || exit;
?>
<div class="wrap">
   <div class="row ai-blog-row">
      <div class="col-100">
         <div class="wrap-row">
            <div id="ai-blog-genrate">
               <h1><?php echo esc_html__( 'AI Blog Generation', 'ai-blog-generator' ); ?></h1>
               <p><?php echo esc_html__( "Click the button below to generate a blog post using OpenAI's API.", 'ai-blog-generator' ); ?></p>
               <div id="message-container"></div>
               <div id="loader"><span class="spinner is-active"></span></div>
               <form method="post" name="generate_ai_blog" action="">
                  <?php wp_nonce_field('generate_blog_action', 'generate_blog_nonce'); ?>
                  <table class="form-table" role="presentation">
                     <tbody>
                        <tr>
                           <th scope="row"><?php echo esc_html__('Enter Post Topic', 'ai-blog-generator'); ?>:</th>
                           <td>
                              <input type="text" name="generate_blog_topic" class="regular-text" id="generate_blog_topic" value="" placeholder="<?php echo esc_html__('The post topic must be at least 5 words long.', 'ai-blog-generator'); ?>">
                              <p class="validation-error" id="generate_blog_topic_error"></p>
                           </td>
                        </tr>
                        <tr>
                           <th scope="row"><?php echo esc_html__('Words Limit', 'ai-blog-generator'); ?>:</th>
                           <td>
                              <span class="pro-feature">Pro Feature</span>
                              <div class="pro-feature-options">
                                 <input type="text" name="post_words_limit_placeholder" class="regular-text">
                                 <input type="hidden" name="post_words_limit" class="regular-text" id="post_words_limit" value="500" placeholder="<?php echo esc_html__('Enter Words Limit', 'ai-blog-generator'); ?>">
                                 <p class="validation-error" id="post_words_limit_error"></p>
                              </div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  <input type="submit" name="generate_blog_post" class="button button-primary" id="generate-blog-post" value="<?php echo esc_html__('Generate a New Blog Post', 'ai-blog-generator'); ?>">
               </form>
            </div>
            <div id="ai-blog-preview">
               <h2><?php echo esc_html__('Generated Post Preview', 'ai-blog-generator'); ?></h2>
               <form method="post" name="publish_ai_blog" id="publish_ai_blog" action="">
                  <?php wp_nonce_field('publish_blog_action', 'publish_blog_nonce'); ?>
                  <table class="form-table">
                     <tbody>
                        <tr>
                           <th scope="row"><?php echo esc_html__('Post Title', 'ai-blog-generator'); ?>:</th>
                           <td>
                              <input type="text" name="ai_blog_post_title" class="regular-text" id="ai_blog_post_title" value="">
                           </td>
                        </tr>
                        <tr>
                           <th scope="row"><?php echo esc_html__('Post Category', 'ai-blog-generator'); ?>:</th>
                           <td>
                              <?php
                                 wp_dropdown_categories(array(
                                    'show_option_none' => esc_html__('Select Category', 'ai-blog-generator'),
                                    'name' => 'ai_blog_post_categories',
                                    'id' => 'ai_blog_post_categories',
                                    'class' => 'regular-text',
                                    'hide_empty' => false,
                                    'orderby' => 'name',
                                    'hierarchical' => true,
                                    'selected' => '',
                                 ));
                              ?>
                           </td>
                        </tr>
                        <tr>
                           <th scope="row"><?php echo esc_html__('Post Content', 'ai-blog-generator'); ?>:</th>
                           <td>
                              <?php
                                 wp_editor('', 'ai_blog_post_content', array(
                                    'textarea_name' => 'ai_blog_post_content',
                                    'media_buttons' => true,
                                    'textarea_rows' => 50,
                                    'teeny'         => false,
                                    'tinymce'       => true,
                                 ));
                              ?>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  <input type="submit" name="publish_blog_post" class="button button-primary" id="publish-blog-post" value="<?php echo esc_html__('Publish Post', 'ai-blog-generator'); ?>">
                  <input type="reset" name="clear_blog_data" class="button" id="clear_blog_data" value="<?php echo esc_html__('Clear Post', 'ai-blog-generator'); ?>">
               </form>
            </div>
            <!-- Call the Premium Promotion Function -->
            <?php ai_blog_premium_promotion_section(); ?>
         </div>
      </div>
   </div>
</div>