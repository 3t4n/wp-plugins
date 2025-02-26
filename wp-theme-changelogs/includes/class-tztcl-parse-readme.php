<?php
/**
 * Parse readme.txt and show changelog box
 *
 * This class is a fork of the WordPress Plugin Readme Parser
 * https://github.com/markjaquith/WordPress-Plugin-Readme-Parser
 *
 * @package WP Theme Changelogs
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Make Markdown library available.
use \Michelf\MarkdownExtra;

/**
 * Parse Readme Class
 */
class TZTCL_Parse_Readme {

	/**
	 * Parse the content from markdown to HTML.
	 *
	 * @param  string $file_contents 	Content to parse.
	 * @return array           			Array with parsed content.
	 */
	function parse_readme_contents( $file_contents ) {

		// Format file ending correctly.
		$file_contents = str_replace( array( "\r\n", "\r" ), "\n", $file_contents );
		$file_contents = trim( $file_contents );
		if ( 0 === strpos( $file_contents, "\xEF\xBB\xBF" ) ) {
			$file_contents = substr( $file_contents, 3 );
		}

		// Markdown transformations.
		$file_contents = preg_replace( "|^###([^#]+)#*?\s*?\n|im", '=$1='."\n",     $file_contents );
		$file_contents = preg_replace( "|^##([^#]+)#*?\s*?\n|im",  '==$1=='."\n",   $file_contents );
		$file_contents = preg_replace( "|^#([^#]+)#*?\s*?\n|im",   '===$1==='."\n", $file_contents );

		// Check if plugin name is first in file.
		if ( ! preg_match( '|^===(.*)===|', $file_contents, $_name ) ) {
			return array(); // Return early if no name found.
		}

		// Set plugin name.
		$name = trim( $_name[1], '=' );
		$name = sanitize_text_field( $name );

		// Remove plugin name from file content.
		$file_contents = $this->chop_string( $file_contents, $_name[0] );

		// Get "Requires at least" info.
		if ( preg_match( '|Requires at least:(.*)|i', $file_contents, $_requires_at_least ) ) {
			$requires_at_least = sanitize_text_field( $_requires_at_least[1] );
		} else {
			$requires_at_least = null;
		}

		// Get "Tested up to" info.
		if ( preg_match( '|Tested up to:(.*)|i', $file_contents, $_tested_up_to ) ) {
			$tested_up_to = sanitize_text_field( $_tested_up_to[1] );
		} else {
 			$tested_up_to = null;
		}

		// Get "Stable tag" info.
		if ( preg_match( '|Stable tag:(.*)|i', $file_contents, $_stable_tag ) ) {
			$stable_tag = sanitize_text_field( $_stable_tag[1] );
		} else {
			$stable_tag = null;
		}

		// Get tags.
		if ( preg_match( '|Tags:(.*)|i', $file_contents, $_tags ) ) {
			$tags = preg_split( '|,[\s]*?|', trim( $_tags[1] ) );

			foreach ( array_keys( $tags ) as $t ) {
				$tags[ $t ] = sanitize_text_field( $tags[ $t ] );
			}

		} else {
			$tags = array();
		}

		// Get Contributors.
		$contributors = array();
		if ( preg_match( '|Contributors:(.*)|i', $file_contents, $_contributors ) ) {

			$temp_contributors = preg_split( '|,[\s]*|', trim( $_contributors[1] ) );
			foreach ( array_keys( $temp_contributors ) as $c ) {
				$tmp_sanitized = $this->user_sanitize( $temp_contributors[ $c ] );
				if ( strlen( trim( $tmp_sanitized ) ) > 0 ) {
					$contributors[ $c ] = $tmp_sanitized;
				}
				unset( $tmp_sanitized );
			}
		}

		// Get Donate Link.
		if ( preg_match( '|Donate link:(.*)|i', $file_contents, $_donate_link ) ) {
			$donate_link = esc_url( $_donate_link[1] );
		} else {
			$donate_link = null;
		}

		// Tags, Contributors, etc are optional and order shouldn't matter. So we chop them only after we've grabbed their values.
		foreach ( array( 'tags', 'contributors', 'requires_at_least', 'tested_up_to', 'stable_tag', 'donate_link' ) as $chop ) {
			if ( $$chop ) {
				$_chop = '_' . $chop;
				$file_contents = $this->chop_string( $file_contents, ${$_chop}[0] );
			}
		}

		// Remove white spaces.
		$file_contents = trim( $file_contents );

		// Get short description.
		if ( ! preg_match( '/(^(.*?))^[\s]*=+?[\s]*.+?[\s]*=+?/ms', $file_contents, $_short_description ) ) {
			$_short_description = array( 1 => &$file_contents, 2 => &$file_contents );
		}

		// Format short description.
		$short_desc_filtered = sanitize_text_field( $_short_description[2] );
		$short_desc_length = strlen( $short_desc_filtered );
		$short_description = substr( $short_desc_filtered, 0, 150 );

		if ( $short_desc_length > strlen( $short_description ) ) {
			$truncated = true;
		} else {
			$truncated = false;
		}

		// Remove short description from file content.
		if ( $_short_description[1] ) {
			$file_contents = $this->chop_string( $file_contents, $_short_description[1] ); // Yes, the [1] is intentional.
		}

		// Break content into sections.
		// $_sections[0] will be the title of the first section, $_sections[1] will be the content of the first section.
		// The array alternates from there:  title2, content2, title3, content3... and so forth
		$_sections = preg_split( '/^[\s]*==[\s]*(.+?)[\s]*==/m', $file_contents, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY );

		$sections = array();
		for ( $i = 1; $i <= count( $_sections ); $i += 2 ) {
			$_sections[ $i ] = preg_replace( '/^[\s]*=[\s]+(.+?)[\s]+=/m', '<h4>$1</h4>', $_sections[ $i ] );
			$_sections[ $i ] = $this->filter_text( $_sections[ $i ], true );
			$title = sanitize_text_field( $_sections[ $i -1 ] );
			$sections[ str_replace( ' ', '_', strtolower( $title ) ) ] = array( 'title' => $title, 'content' => $_sections[ $i ] );
		}

		// Special sections.
		// This is where we nab our special sections, so we can enforce their order and treat them differently, if needed.
		// Note: upgrade_notice is not a section, but parse it like it is for now.
		$final_sections = array();
		foreach ( array( 'description', 'installation', 'frequently_asked_questions', 'screenshots', 'changelog', 'change_log', 'upgrade_notice' ) as $special_section ) {
			if ( isset( $sections[ $special_section ] ) ) {
				$final_sections[ $special_section ] = $sections[ $special_section ]['content'];
				unset( $sections[ $special_section ] );
			}
		}
		if ( isset( $final_sections['change_log'] ) && empty( $final_sections['changelog'] ) ) {
			$final_sections['changelog'] = $final_sections['change_log'];
		}

		$final_screenshots = array();
		if ( isset( $final_sections['screenshots'] ) ) {
			preg_match_all( '|<li>(.*?)</li>|s', $final_sections['screenshots'], $screenshots, PREG_SET_ORDER );
			if ( $screenshots ) {
				foreach ( (array) $screenshots as $ss ) {
					$final_screenshots[] = $ss[1];
				}
			}
		}

		// Parse the upgrade_notice section specially:
		// 1.0 => blah, 1.1 => fnord
		if ( isset( $final_sections['upgrade_notice'] ) ) {
			$upgrade_notice = array();
			$split = preg_split( '#<h4>(.*?)</h4>#', $final_sections['upgrade_notice'], -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY );
			for ( $i = 0; $i < count( $split ); $i += 2 ) {
				$upgrade_notice[ sanitize_text_field( $split[ $i ] ) ] = substr( sanitize_text_field( $split[ $i + 1 ] ), 0, 300 );
			}
			unset( $final_sections['upgrade_notice'] );
		}

		// No description?
		// No problem... we'll just fall back to the old style of description.
		// We'll even let you use markup this time!
		$excerpt = false;
		if ( ! isset( $final_sections['description'] ) ) {
			$final_sections = array_merge( array( 'description' => $this->filter_text( $_short_description[2], true ) ), $final_sections );
			$excerpt = true;
		}

		// Dump the non-special sections into $remaining_content.
		// Their order will be determined by their original order in the readme.txt.
		$remaining_content = '';
		foreach ( $sections as $s_name => $s_data ) {
			$remaining_content .= "\n<h3>{$s_data['title']}</h3>\n{$s_data['content']}";
		}
		$remaining_content = trim( $remaining_content );

		// All done!
		// $r['tags'] and $r['contributors'] are simple arrays.
		// $r['sections'] is an array with named elements.
		$r = array(
			'name' => $name,
			'tags' => $tags,
			'requires_at_least' => $requires_at_least,
			'tested_up_to' => $tested_up_to,
			'stable_tag' => $stable_tag,
			'contributors' => $contributors,
			'donate_link' => $donate_link,
			'short_description' => $short_description,
			'screenshots' => $final_screenshots,
			'is_excerpt' => $excerpt,
			'is_truncated' => $truncated,
			'sections' => $final_sections,
			'remaining_content' => $remaining_content,
			'upgrade_notice' => $upgrade_notice,
		);

		return $r;
	}

	function chop_string( $string, $chop ) {
		// chop a "prefix" from a string: Agressive! uses strstr not 0 === strpos
		if ( $_string = strstr( $string, $chop ) ) {
			$_string = substr( $_string, strlen( $chop ) );
			return trim( $_string );
		} else {
			return trim( $string );
		}
	}

	function user_sanitize( $text, $strict = false ) {
		if ( $strict ) {
			$text = preg_replace( '/[^a-z0-9-]/i', '', $text );
			$text = preg_replace( '|-+|', '-', $text );
		} else {
			$text = preg_replace( '/[^a-z0-9_-]/i', '', $text );
		}
		return $text;
	}

	function filter_text( $text, $markdown = false ) {
		// fancy, Markdown

		$text = trim( $text );
		$text = call_user_func( array( __CLASS__, 'code_trick' ), $text, $markdown ); // A better parser than Markdown's for: backticks -> CODE

		// Parse markdown.
		if ( $markdown ) {

			// Include Parsedown if necessary.
			if ( ! class_exists( 'MarkdownExtra' ) ) {
				include_once( TZTCL_PLUGIN_DIR . 'includes/markdown/Michelf/MarkdownExtra.inc.php' );
			}

			// Parse Text to HTML.
			$text = MarkdownExtra::defaultTransform( $text );
		}

		$allowed = array(
			'a' => array(
				'href' => array(),
				'title' => array(),
				'rel' => array(),
			),
			'blockquote' => array( 'cite' => array() ),
			'br' => array(),
			'p' => array(),
			'code' => array(),
			'pre' => array(),
			'em' => array(),
			'strong' => array(),
			'ul' => array(),
			'ol' => array(),
			'li' => array(),
			'h3' => array(),
			'h4' => array(),
		);

		$text = balanceTags( $text );

		$text = wp_kses( $text, $allowed );
		$text = trim( $text );
		return $text;
	}

	function code_trick( $text, $markdown ) {

		// Take any user formatted code blocks and turn them into backticks so that markdown will preserve things like underscores in code blocks.
		if ( $markdown ) {
			$text = preg_replace_callback( '!(<pre><code>|<code>)(.*?)(</code></pre>|</code>)!s', array( __CLASS__, 'decodeit' ), $text );
		}

		$text = str_replace( array( "\r\n", "\r" ), "\n", $text );
		if ( ! $markdown ) {
			// This gets the "inline" code blocks, but can't be used with Markdown.
			$text = preg_replace_callback( '|(`)(.*?)`|', array( __CLASS__, 'encodeit' ), $text );
			// This gets the "block level" code blocks and converts them to PRE CODE.
			$text = preg_replace_callback( "!(^|\n)`(.*?)`!s", array( __CLASS__, 'encodeit' ), $text );
		} else {
			// Markdown can do inline code, we convert bbPress style block level code to Markdown style.
			$text = preg_replace_callback( "!(^|\n)([ \t]*?)`(.*?)`!s", array( __CLASS__, 'indent' ), $text );
		}
		return $text;
	}

	function indent( $matches ) {
		$text = $matches[3];
		$text = preg_replace( '|^|m', $matches[2] . '    ', $text );
		return $matches[1] . $text;
	}

	function encodeit( $matches ) {
		$text = trim( $matches[2] );
		$text = htmlspecialchars( $text, ENT_QUOTES );
		$text = str_replace( array( "\r\n", "\r" ), "\n", $text );
		$text = preg_replace( "|\n\n\n+|", "\n\n", $text );
		$text = str_replace( '&amp;lt;', '&lt;', $text );
		$text = str_replace( '&amp;gt;', '&gt;', $text );
		$text = "<code>$text</code>";
		if ( '`' != $matches[1] ) {
			$text = "<pre>$text</pre>";
		}
		return $text;
	}

	function decodeit( $matches ) {
		$text = $matches[2];
		$trans_table = array_flip( get_html_translation_table( HTML_ENTITIES ) );
		$text = strtr( $text, $trans_table );
		$text = str_replace( '<br />', '', $text );
		$text = str_replace( '&#38;', '&', $text );
		$text = str_replace( '&#39;', "'", $text );
		if ( '<pre><code>' == $matches[1] ) {
			$text = "\n$text\n";
		}
		return "`$text`";
	}
} // End class.
