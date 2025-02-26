<div id="es_faq_options" style="display: none;">
   <div class="tab">
      <div class="tab_intro_banner">
      <span class="tab_heading_span">Mark up your FAQs with structured data</span>
      <p class="tab_tagline">A Frequently Asked Question (FAQ) page contains a list of questions and answers relevant to a topic. Pages with properly marked up FAQ schema may be eligible to have a rich result on Search and an Action on the Google Assistant, which can help your site reach the right users. Here's an example of an FAQ rich result:</p>
      </div>
      <div class="faq_split_informational_boxes">
    <div class="faq_top_split_left">
        <div class="es_faq_form_wrapper">
       <h3 class="faw_heading">Questions & Answers</h3>
      <div class="es_faq_form">
      <table class="form-table">
         <tr>
            <th scope="row" class="th-subhead"><?php esc_html_e('Question One:', 'schema-set') ?></th>
            <td class="es-faq-td"><input class="es_faq_opening_hours" type="text" name="faq_question_one" style="width:100%;" value="<?php echo esc_attr( $faq_question_one ); ?>" placeholder="<?php esc_attr_e('Question', 'schema-set')?>"></td>
         </tr>
         <tr>
            <th scope="row" class="th-subhead"><?php esc_html_e('', 'schema-set') ?></th>
            <td class="es-faq-td"><input class="es_faq_opening_hours" type="text" name="faq_answer_one" style="width:100%;" value="<?php echo esc_attr( $faq_answer_one ); ?>" placeholder="<?php esc_attr_e('Answer', 'schema-set')?>"></td>
         </tr>
         <tr>
            <th scope="row" class="th-subhead"><?php esc_html_e('Question Two:', 'schema-set') ?></th>
            <td class="es-faq-td"><input class="es_faq_opening_hours" type="text" name="faq_question_two" style="width:100%;" value="<?php echo esc_attr( $faq_question_two ); ?>" placeholder="<?php esc_attr_e('Question', 'schema-set')?>"></td>
         </tr>
         <tr>
            <th scope="row" class="th-subhead"><?php esc_html_e('', 'schema-set') ?></th>
            <td class="es-faq-td"><input class="es_faq_opening_hours" type="text" name="faq_answer_two" style="width:100%;" value="<?php echo esc_attr( $faq_answer_two ); ?>" placeholder="<?php esc_attr_e('Answer', 'schema-set')?>"></td>
         </tr>
         <tr>
            <th scope="row" class="th-subhead"><?php esc_html_e('Question Three:', 'schema-set') ?></th>
            <td class="es-faq-td"><input class="es_faq_opening_hours" type="text" name="faq_question_three" style="width:100%;" value="<?php echo esc_attr( $faq_question_three ); ?>" placeholder="<?php esc_attr_e('Question', 'schema-set')?>"></td>
         </tr>
         <tr>
            <th scope="row" class="th-subhead"><?php esc_html_e('', 'schema-set') ?></th>
            <td class="es-faq-td"><input class="es_faq_opening_hours" type="text" name="faq_answer_three" style="width:100%;" value="<?php echo esc_attr( $faq_answer_three ); ?>" placeholder="<?php esc_attr_e('Answer', 'schema-set')?>"></td>
         </tr>
         <tr>
            <th scope="row" class="th-subhead"><?php esc_html_e('Question Four:', 'schema-set') ?></th>
            <td class="es-faq-td"><input class="es_faq_opening_hours" type="text" name="faq_question_four" style="width:100%;" value="<?php echo esc_attr( $faq_question_four ); ?>" placeholder="<?php esc_attr_e('Question', 'schema-set')?>"></td>
         </tr>
         <tr>
            <th scope="row" class="th-subhead"><?php esc_html_e('', 'schema-set') ?></th>
            <td class="es-faq-td"><input class="es_faq_opening_hours" type="text" name="faq_answer_four" style="width:100%;" value="<?php echo esc_attr( $faq_answer_four ); ?>" placeholder="<?php esc_attr_e('Answer', 'schema-set')?>"></td>
         </tr>
         <tr>
            <th scope="row" class="th-subhead"><?php esc_html_e('Question Five:', 'schema-set') ?></th>
            <td class="es-faq-td"><input class="es_faq_opening_hours" type="text" name="faq_question_five" style="width:100%;" value="<?php echo esc_attr( $faq_question_five ); ?>" placeholder="<?php esc_attr_e('Question', 'schema-set')?>"></td>
         </tr>
         <tr>
            <th scope="row" class="th-subhead"><?php esc_html_e('', 'schema-set') ?></th>
            <td class="es-faq-td"><input class="es_faq_opening_hours" type="text" name="faq_answer_five" style="width:100%;" value="<?php echo esc_attr( $faq_answer_five ); ?>" placeholder="<?php esc_attr_e('Answer', 'schema-set')?>"></td>
         </tr>
      </table>
      <div class="faq_display_options">
         <h3 class="opening-hours-title">Display Options</h3>
         <div>
            <p class="faq-intro">Once you have completed your FAQ Schema settings you can output the Schema on your FAQ page with the shortcode [faq_schema]</p>
            <p class="faq-intro">The FAQ Schema shortcode won't be visible on your page to your users, but with the Rich Results Test you can check that the Schema markup is outputting correctly.</p>
         </div>
      </div>
      </div>
      </div>
     </div>
     <div class="faq_schema_right_side_stacked_boxes">
      <div class="faq-split-column-guides">
         <div class="column-child-guides">
            <span class="inclusion-heading">What you should do:</span>
            <ul class="list-do">
               <li><span class="dashicons dashicons-yes"></span>Add the same questions &amp; answers that are displayed on your page</li>
               <li><span class="dashicons dashicons-yes"></span>Use accurate &amp; complete information</li>
               <li><span class="dashicons dashicons-yes"></span>Test your Schema using the Rich Results Test</li>
            </ul>
         </div>
      </div>
            <div class="faq-split-column-guides">
                <div class="faq-image-container">
                    <p><img src="<?php echo esc_url( plugins_url( '/admin/images/faq-example.png', __FILE__ ) ); ?>" style="width: 100%;"></p>
                </div>
            </div>
      </div>
      </div>
   </div>
</div>