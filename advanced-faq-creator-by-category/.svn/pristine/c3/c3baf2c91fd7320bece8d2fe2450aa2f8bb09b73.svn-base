<?php
if( ! class_exists( 'AFAQCBC_q_a_faq_query' ) ) {
			/*
* الكلاس المسؤل عن جلب البيانات بالبلقن 
*/
    class AFAQCBC_q_a_faq_query {

		/*
* تكوين جملية الكويري لجلب الاسئلة
*/
        public function get_all_question_about_faq($faq_id,$data = array(),$search = '') {

            $args = array(
                'post_type' => 'question',
                'tax_query'         => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy'  => 'faqs',
                        'field'     => 'term_id',
                        'terms'     => $faq_id
                    )
                ),
            );

			if(isset($data) && !empty($data)){
			    $args['orderby'] = $data['faqs_style']['faqs_Order_By_Post'];
                $args['order']   = $data['faqs_style']['faqs_Order_Post'];
			}
			if(isset($_POST['faq_search']) && $_POST['faq_search'] !=''){
			    $args['s'] = sanitize_text_field($_POST['faq_search']);
			}
            if(isset($search) && $search !=''){
                $args['s'] = sanitize_text_field($search);
            }

            if(isset($data['arg']['cat_id']) && $data['arg']['cat_id'] != ''){
                $args['tax_query'][] = array(
                    'taxonomy'  => 'faqscategory',
                    'field'     => 'term_id',
                    'terms'     => $data['arg']['cat_id']
                );
            }
            $the_query = new WP_Query($args);
            $resultfinal = array();
            if(!empty($the_query->posts)){
                foreach($the_query->posts as $row) {
                    if(isset($data['arg']['cat_id']) && $data['arg']['cat_id'] != '') {
                        $terms = array(get_term( absint($data['arg']['cat_id']), 'faqscategory' ));
                    }else{
                        $terms = get_the_terms(absint($row->ID), 'faqscategory');
                    }
                    if (is_array($terms) || is_object($terms))
                    {
                        foreach ($terms as $term){
                            $result = array_merge((array)$row, (array)$term);
                            if(array_key_exists($term->term_id, $resultfinal)){
                                array_push($resultfinal[$term->term_id], $result);
                            }else{
                                $resultfinal[absint($term->term_id)][] = $result;
                            }
                        }
                    }
                }
            }

            wp_reset_postdata();
            return $resultfinal;


        }

    }


}

