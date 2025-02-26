<?php
/**
 * MoMo ACG RSS Feed - Amin AJAX functions
 *
 * @package momoacg
 * @author MoMo Themes
 * @since v3.0.0
 */
class MoMo_RssFeed_Admin_Ajax {
	/**
	 * Constructor
	 */
	public function __construct() {
		$ajax_events = array(
			'momo_rssfeed_generate_title_add_to_queue'  => 'momo_rssfeed_generate_title_add_to_queue', // One.
			'momo_acg_rssfeed_delete_cron_by_id'        => 'momo_acg_rssfeed_delete_cron_by_id', // Two.
			'momo_autoblog_add_to_queue'                => 'momo_autoblog_add_to_queue', // Three.
			'momo_acg_autoblog_delete_cron_by_id'       => 'momo_acg_autoblog_delete_cron_by_id', // Four.
			'momo_acg_openai_generate_content_autoblog' => 'momo_acg_openai_generate_content_autoblog', // Five.
			'momo_acg_openai_save_content_autoblog'     => 'momo_acg_openai_save_content_autoblog', // Six.
		);
		foreach ( $ajax_events as $ajax_event => $class ) {
			add_action( 'wp_ajax_' . $ajax_event, array( $this, $class ) );
			add_action( 'wp_ajax_nopriv_' . $ajax_event, array( $this, $class ) );
		}
	}
	/**
	 * Generate New Title Row ( One )
	 */
	public function momo_rssfeed_generate_title_add_to_queue() {
		global $momoacg;
		$res = check_ajax_referer( 'momoacg_security_key', 'security' );
		if ( isset( $_POST['action'] ) && 'momo_rssfeed_generate_title_add_to_queue' !== $_POST['action'] ) {
			return;
		}
		$url      = isset( $_POST['url'] ) ? sanitize_text_field( wp_unslash( $_POST['url'] ) ) : '';
		$status   = isset( $_POST['status'] ) ? sanitize_text_field( wp_unslash( $_POST['status'] ) ) : '';
		$category = isset( $_POST['category'] ) ? sanitize_text_field( wp_unslash( $_POST['category'] ) ) : '';

		$rss    = simplexml_load_file( $url );
		$cnt    = 0;
		$feeder = array();
		if ( ! $rss ) {
			echo wp_json_encode(
				array(
					'status' => 'bad',
					'msg'    => esc_html__( 'Unable to generate title from given RSS feed url. Please check URL and try again..', 'momoacg' ),
				)
			);
			exit;
		}
		foreach ( $rss->channel->item as $feeds ) {
			$cnt++;
			if ( isset( $feeds->title ) ) {
				$feeder[] = array(
					'title'     => $feeds->title->__toString(),
					'ocategory' => isset( $feeds->category ) ? (array) $feeds->category : array(),
					'link'      => isset( $feeds->link ) ? $feeds->link->__toString() : '',
				);
			}
		}
		$index   = 1;
		$success = 0;
		$failure = 0;
		foreach ( $feeder as $line ) {
			$line['index']    = $index;
			$line['ptype']    = $status;
			$line['category'] = $category;
			$line['date']     = '';
			$line['noofpara'] = 4;
			$return           = $momoacg->rssfeedcron->momo_add_item_to_queue( $line );
			if ( $return ) {
				$success++;
			} else {
				$failure++;
			}
			$index++;
		}
		if ( 0 === $failure ) {
			echo wp_json_encode(
				array(
					'status' => 'good',
					/* translators: %s: success number */
					'msg'    => sprintf( esc_html__( '%s title(s) are added to schedule.', 'momoacg' ), $success ),
				)
			);
			exit;
		} else {
			echo wp_json_encode(
				array(
					'status' => 'good',
					/* translators: %1$1s: success number, %2$2s: failure */
					'msg'    => sprintf( esc_html__( '%1$1s title(s) are added to schedule with %2$2s failed to add.', 'momoacg' ), $success, $failure ),
					'queue'  => $momoacg->rssfeedfn->momo_rssfeed_generate_queue_cron_list(),
				)
			);
			exit;
		}
	}
	/**
	 * Delete Cron by Cron ID.
	 */
	public function momo_acg_rssfeed_delete_cron_by_id() {
		global $momoacg;
		$res = check_ajax_referer( 'momoacg_security_key', 'security' );
		if ( isset( $_POST['action'] ) && 'momo_acg_rssfeed_delete_cron_by_id' !== $_POST['action'] ) {
			return;
		}
		$cron_id = isset( $_POST['cron_id'] ) ? sanitize_text_field( wp_unslash( $_POST['cron_id'] ) ) : '';

		$single = $momoacg->rssfeedfn->momo_get_rssfeed_single_event( $cron_id );
		if ( $single ) {
			wp_unschedule_event( $single['timestamp'], $single['hook'], $single['args'] );
			echo wp_json_encode(
				array(
					'status' => 'good',
					'msg'    => esc_html__( 'Cron event unscheduled successfully.', 'momoacg' ),
				)
			);
			exit;
		} else {
			echo wp_json_encode(
				array(
					'status' => 'bad',
					'msg'    => esc_html__( 'Cron event not found for given cron ID.', 'momoacg' ),
				)
			);
			exit;
		}
	}
	/**
	 * Generate New Title Row ( One )
	 */
	public function momo_autoblog_add_to_queue() {
		global $momoacg;
		$res = check_ajax_referer( 'momoacg_security_key', 'security' );
		if ( isset( $_POST['action'] ) && 'momo_autoblog_add_to_queue' !== $_POST['action'] ) {
			return;
		}
		$tags     = isset( $_POST['tags'] ) ? sanitize_text_field( wp_unslash( $_POST['tags'] ) ) : '';
		$status   = isset( $_POST['status'] ) ? sanitize_text_field( wp_unslash( $_POST['status'] ) ) : '';
		$category = isset( $_POST['category'] ) ? sanitize_text_field( wp_unslash( $_POST['category'] ) ) : '';
		$nop      = isset( $_POST['nop'] ) ? sanitize_text_field( wp_unslash( $_POST['nop'] ) ) : '';
		$nofpara  = isset( $_POST['nofpara'] ) ? sanitize_text_field( wp_unslash( $_POST['nofpara'] ) ) : '';
		$per      = isset( $_POST['per'] ) ? sanitize_text_field( wp_unslash( $_POST['per'] ) ) : '';
		$wstyle   = isset( $_POST['wstyle'] ) ? sanitize_text_field( wp_unslash( $_POST['wstyle'] ) ) : 'normal';
		$addimage = isset( $_POST['addimage'] ) ? sanitize_text_field( wp_unslash( $_POST['addimage'] ) ) : 'off';
		$title    = isset( $_POST['title'] ) ? sanitize_text_field( wp_unslash( $_POST['title'] ) ) : 'off';

		$args = array(
			'tags'          => $tags,
			'category'      => $category,
			'status'        => $status,
			'no_of_posts'   => $nop,
			'time_basis'    => $per,
			'writing_style' => $wstyle,
			'add_image'     => $addimage,
			'gen_title'     => $title,
			'no_of_para'    => $nofpara,
		);

		$return = $momoacg->rssfeedcron->momo_add_autoblog_to_queue( $args );
		if ( ! $return  ) {
			echo wp_json_encode(
				array(
					'status' => 'bad',
					'msg'    => esc_html__( 'Not able to auto blogging. Please try it later.', 'momoacg' ),
				)
			);
			exit;
		} else {
			echo wp_json_encode(
				array(
					'status' => 'good',
					'msg'    => esc_html__( 'Auto blogging added successfully.', 'momoacg' ),
					'queue'  => $momoacg->rssfeedfn->momo_autoblog_generate_queue_cron_list(),
				)
			);
			exit;
		}
	}
	/**
	 * Generate OpenAI Content ( Five )
	 */
	public function momo_acg_openai_generate_content_autoblog() {
		global $momoacg;
		$res = check_ajax_referer( 'momoacg_security_key', 'security' );
		if ( isset( $_POST['action'] ) && 'momo_acg_openai_generate_content_autoblog' !== $_POST['action'] ) {
			return;
		}
		$language          = isset( $_POST['language'] ) ? sanitize_text_field( wp_unslash( $_POST['language'] ) ) : '';
		$title             = isset( $_POST['title'] ) ? sanitize_text_field( wp_unslash( $_POST['title'] ) ) : '';
		$paragraph         = isset( $_POST['no_of_paragraph'] ) ? sanitize_text_field( wp_unslash( $_POST['no_of_paragraph'] ) ) : 3;
		$writing_style     = isset( $_POST['writing_style'] ) ? sanitize_text_field( wp_unslash( $_POST['writing_style'] ) ) : 'simple';
		$enable_image      = isset( $_POST['enable_image'] ) ? sanitize_text_field( wp_unslash( $_POST['enable_image'] ) ) : 'off';
		$add_introduction  = isset( $_POST['add_introduction'] ) ? sanitize_text_field( wp_unslash( $_POST['add_introduction'] ) ) : 'off';
		$add_conclusion    = isset( $_POST['add_conclusion'] ) ? sanitize_text_field( wp_unslash( $_POST['add_conclusion'] ) ) : 'off';
		$add_para_heading  = isset( $_POST['add_para_heading'] ) ? sanitize_text_field( wp_unslash( $_POST['add_para_heading'] ) ) : 'off';
		$temperature       = isset( $_POST['temperature'] ) ? sanitize_text_field( wp_unslash( $_POST['temperature'] ) ) : 0.7;
		$max_tokens        = isset( $_POST['max_tokens'] ) ? sanitize_text_field( wp_unslash( $_POST['max_tokens'] ) ) : 1500;
		$top_p             = isset( $_POST['top_p'] ) ? sanitize_text_field( wp_unslash( $_POST['top_p'] ) ) : 0.5;
		$frequency_penalty = isset( $_POST['frequency_penalty'] ) ? sanitize_text_field( wp_unslash( $_POST['frequency_penalty'] ) ) : 0.6;
		$presence_penalty  = isset( $_POST['presence_penalty'] ) ? sanitize_text_field( wp_unslash( $_POST['presence_penalty'] ) ) : 0.6;

		$openai_settings = get_option( 'momo_acg_openai_settings' );
		$language_model  = isset( $openai_settings['language_model'] ) && ! empty( $openai_settings['language_model'] ) ? $openai_settings['language_model'] : 'gpt-3.5-turbo';

		$initial   = $this->momo_autoblog_get_initial_message();
		$message   = array();
		$message[] = $initial;
		$prompt    = $title;
		$prompt    = $prompt . "\n" . $this->momo_autoblog_get_prompt( $language, $paragraph, $writing_style, $enable_image, $add_introduction, $add_conclusion, $add_para_heading );
		$new_msg   = array(
			'role'    => 'user',
			'content' => $prompt,
		);
		$message[] = $new_msg;
		if ( 'text-davinci-003' === $language_model || 'text-curie-001' === $language_model || 'text-babbage-001' === $language_model || 'text-ada-001' === $language_model ) {
			$body = array(
				'model'             => $language_model,
				'prompt'            => $prompt,
				'temperature'       => (float) $temperature,
				'max_tokens'        => (int) $max_tokens,
				'top_p'             => (float) $top_p,
				'frequency_penalty' => (float) $frequency_penalty,
				'presence_penalty'  => (float) $presence_penalty,
			);
			$url  = 'https://api.openai.com/v1/completions';
		} else {
			$body = array(
				'model'             => $language_model,
				'messages'          => $message,
				'temperature'       => (float) $temperature,
				'max_tokens'        => (int) $max_tokens,
				'top_p'             => (float) $top_p,
				'frequency_penalty' => (float) $frequency_penalty,
				'presence_penalty'  => (float) $presence_penalty,
			);
			$url  = 'https://api.openai.com/v1/chat/completions';
		}
		$response = $momoacg->fn->momo_wsw_run_rest_api( 'POST', $url, $body );

		$info    = '';
		$content = '';
		if ( isset( $response['status'] ) && 404 === $response['status'] ) {
			$info .= isset( $response['body']->error->message ) ? $response['body']->error->message : esc_html__( 'Provided url not found.', 'momoacg' );
		}
		if ( isset( $response['status'] ) && 200 === $response['status'] ) {
			$choices = isset( $response['body']->choices ) ? $response['body']->choices : array();
			if ( ! empty( $choices ) ) {
				foreach ( $choices as $choice ) {
					if ( 'text-davinci-003' === $language_model || 'text-curie-001' === $language_model || 'text-babbage-001' === $language_model || 'text-ada-001' === $language_model ) {
						$content .= $choice->text;
					} else {
						$content .= $choice->message->content;
					}
				}
			} else {
				$info .= esc_html__( 'Not enough choices generated.', 'momoacg' );
			}
		}
		if ( isset( $response['status'] ) && 'bad' === $response['status'] ) {
			$info .= $response['message'];
		}
		if ( ! empty( $content ) ) {
			echo wp_json_encode(
				array(
					'status'  => 'good',
					'message' => esc_html__( 'Content generated successfully.', 'momoacg' ),
					'content' => $content,
				)
			);
			exit;
		}
		echo wp_json_encode(
			array(
				'status'  => 'bad',
				'message' => empty( $info ) ? esc_html__( 'Something went wrong while generating answer. Please try again.', 'momoacg' ) : $info,
				'content' => empty( $info ) ? esc_html__( 'Something went wrong while generating answer. Please try again.', 'momoacg' ) : $info,
			)
		);
		exit;
	}
	/**
	 * Get some predefined cotext
	 */
	public function momo_autoblog_get_initial_message() {
		$message = array(
			'role'    => 'system',
			'content' => esc_html__( "You are an AI assistant, your task is to generate and modify content based on user requests. This functionality is integrated into the AI Tools developed by MoMo Themes. You are inside the Wordpress editor. Strictly follow these rules: Format your responses in html syntax, using wordpress basic elements.\\n\\n- Execute the request without any acknowledgement to the user.\\n\\n- Avoid sensitive or controversial topics and ensure your responses are grammatically correct and coherent.\\n\\n- If you cannot generate a meaningful response to a user’s request, reply with '__MOMO_AI_HELPER_ERROR__'. This term should only be used in this context, it is used to generate user facing errors.\\n\\n", 'momoacg' ),
		);
		return $message;
	}
	/**
	 * Return the instructions for OpenAI to generate content with the given parameters
	 *
	 * @param string $language The language of the content.
	 * @param int    $paragraph The number of paragraphs.
	 * @param string $writing_style The writing style (e.g. formal, informal, etc.).
	 * @param string $enable_image Whether or not to include an image.
	 * @param string $add_introduction Whether or not to include an introduction.
	 * @param string $add_conclusion Whether or not to include a conclusion.
	 * @param string $add_para_heading Whether or not to include headings for each paragraph.
	 *
	 * @return string The instructions for OpenAI
	 */
	public function momo_autoblog_get_prompt( $language, $paragraph, $writing_style, $enable_image, $add_introduction, $add_conclusion, $add_para_heading ) {
		$instructions = 'With following instructions';

		$instructions .= "\nLanguage: " . $language . "\nNo. of paragraphs: " . $paragraph . "\nWriting Style: " . $writing_style . "\nEnable Image: " . $enable_image . "\nAdd Introduction: " . $add_introduction . "\nAdd Conclusion: " . $add_conclusion . "\nAdd Paragraph Heading: " . $add_para_heading;
		return $instructions;
	}
	/**
	 * Save the content generated by OpenAI (Six)
	 *
	 * @return void
	 */
	public function momo_acg_openai_save_content_autoblog() {
		global $momoacg;
		$res = check_ajax_referer( 'momoacg_security_key', 'security' );
		if ( isset( $_POST['action'] ) && 'momo_acg_openai_save_content_autoblog' !== $_POST['action'] ) {
			return;
		}
		if ( ! current_user_can( 'edit_posts' ) ) {
			echo wp_json_encode(
				array(
					'status'  => 'bad',
					'message' => esc_html__( 'You do not have permission to perform this action.', 'momoacg' ),
				)
			);
			exit;
		}

		// Get the content from the AJAX request.
		$content = isset( $_POST['content'] ) ? wp_unslash( $_POST['content'] ) : '';
		$title   = isset( $_POST['title'] ) ? sanitize_text_field( wp_unslash( $_POST['title'] ) ) : '';

		if ( empty( $content ) ) {
			echo wp_json_encode(
				array(
					'status'  => 'bad',
					'message' => esc_html__( 'No content provided.', 'momoacg' ),
				)
			);
			exit;
		}

		// Check if the block editor (Gutenberg) is active.
		if ( $this->momo_is_block_editor_active() ) {
			$blocks = array(
				array(
					'blockName'    => 'core/paragraph',
					'attrs'        => array(),
					'innerBlocks'  => array(),
					'innerHTML'    => '',
					'innerContent' => array( "<p>$content</p>" ),
				),
			);
			$formatted_content = serialize_blocks( $blocks );
		} else {
			// Save content as raw HTML for Classic Editor.
			$formatted_content = $content;
		}

		// Save the content to a post.
		$post_id = wp_insert_post(
			array(
				'post_title'   => $title,
				'post_content' => $formatted_content,
				'post_status'  => 'draft',
				'post_author'  => get_current_user_id(),
			)
		);

		if ( is_wp_error( $post_id ) ) {
			echo wp_json_encode(
				array(
					'status'  => 'bad',
					'message' => esc_html__( 'Failed to save content.', 'momoacg' ),
				)
			);
			exit;
		}

		echo wp_json_encode(
			array(
				'status'  => 'good',
				'message' => esc_html__( 'Content saved successfully. Title:', 'momoacg' ) . '<strong>' . $title . '</strong>',
			)
		);
		exit;
	}
	/**
	 * Check if the block editor is active for the given post type.
	 *
	 * @return boolean True if the block editor is active for the given post type, false otherwise.
	 */
	public function momo_is_block_editor_active() {
		if ( function_exists( 'use_block_editor_for_post_type' ) ) {
			return use_block_editor_for_post_type( 'post' );
		}
		return false;
	}
}
new MoMo_RssFeed_Admin_Ajax();
