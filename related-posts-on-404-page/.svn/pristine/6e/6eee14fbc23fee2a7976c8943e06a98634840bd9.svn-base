<?php
/**
 * This file contains the hooks handler class
 * 
 * PHP Version 7.4.9
 * 
 * @category   WordPress_Plugin
 * @package    Related_Posts_404
 * @subpackage Related_Posts_404/includes
 * @author     Ahmad Karim <ahmu83@gmail.com>
 * @license    https://opensource.org/licenses/GPL-2.0 GPL-2.0+
 * @link       https://ahmadkarim.com/
 * @since      1.0.0
 */

/**
 * This is the action hooks handler class
 * 
 * @category   WordPress_Plugin
 * @package    Related_Posts_404
 * @subpackage Related_Posts_404/includes
 * @author     Ahmad Karim <ahmu83@gmail.com>
 * @license    https://opensource.org/licenses/GPL-2.0 GPL-2.0+
 * @link       https://ahmadkarim.com/
 */
class Rpp_RelatedPosts404 {

  static $post_types = array();

  public function __construct() {

    add_action('404_related_posts', array(&$this, 'relatedPosts'));

    self::$post_types = get_option('rpp_post_types');

  }

  public function relatedPosts() {

    if (is_404()) {

      self::validatePostTypes();

      global $wpdb;

      $posts = array();
      $uri_parts = self::_pageUri();

      foreach ($uri_parts as $uri) {

        $uri_chunks = self::_breakPageUri($uri);
        $posts[] = self::_fetchPosts($uri_chunks, $wpdb);

      }

      $related_posts = self::_filterPostsArray($posts);
      $template_file = self::_getTemplateFile();

      global $post;

      require $template_file;

    }

  }

  private static function _getTemplateFile() {

    $template_name = '404-related-posts.php';
    $theme_template = get_stylesheet_directory() . '/' . RPP_PLUGIN_NAME . '/' . $template_name;

    if (file_exists($theme_template)) {

      $template_part = $theme_template;

    } else {

      $template_part = Rpp_dir("templates/{$template_name}");

    }

    return $template_part;

  }

  private static function _filterPostsArray($posts) {

    $posts2 = array();

    foreach ($posts as $p) {

      foreach ($p as $p2) {

        if (count($p) > 0) {

          foreach ($p2 as $p3) {

            $posts2[$p3->ID] = $p3;

          }

        }

      }

    }

    return $posts2;

  }

  private static function _fetchPosts($uri_chunks, $wpdb) {

    $posts = array();

    if (!is_object($wpdb)) return $posts;

    foreach ($uri_chunks as $k => $uri) {

      $search_term = ($k == 0 ? $uri . '%' : '%' . $uri);

      $query = self::_fetchPostsQuery($wpdb->posts, $search_term);

      if ($query) {

        $posts[] = $wpdb->get_results($query, OBJECT);

      }

    }

    return $posts;

  }

  private static function _fetchPostsQuery($tbl, $search_term) {

    $query = false;
    $post_types = self::$post_types;

    if (is_array($post_types) && count($post_types) > 0) {

      $where[] = 'WHERE (';

      foreach ($post_types as $key => $post_type) {

        $whr = "`post_type` = '$post_type'";

        if (count($post_types) > 1 && ($key + 1) < count($post_types)) {

          $whr .= ' OR';

        }

        $where[] = $whr;

      }

      $where[] = ')';

      $where = implode(PHP_EOL, $where);

      $query = array(
        "SELECT *",
        "FROM `{$tbl}`",
        $where,
        "AND `post_status` = 'publish'",
        "AND `post_name` LIKE '{$search_term}'",
        "LIMIT 2",
      );

      $query = array_filter($query);

      $query = implode(PHP_EOL, $query);

    }

    return $query;

  }

  public static function validatePostTypes() {

    $changed = false;
    $post_types = self::$post_types;

    if (is_array($post_types)) {

      foreach ($post_types as $key => $post_type) {

        if (!post_type_exists($post_type)) {

          $changed = true;

          unset($post_types[$key]);

        }

      }

    }

    if ($changed) {

      update_option('rpp_post_types', $post_types);

      self::$post_types = get_option('rpp_post_types');

    }

  }

  private static function _breakPageUri($uri) {

    $len = strlen($uri);
    $parts = ceil($len / 2);
    $uri_chunks = chunk_split($uri, $parts);
    $uri_chunks = explode(PHP_EOL, $uri_chunks);
    $uri_chunks = array_filter($uri_chunks);
    $uri_chunks = array_map(function($n) {

      return trim($n);

    }, $uri_chunks);

    return $uri_chunks;

  }

  private static function _pageUri() {

    $uri = $_SERVER['REQUEST_URI'];
    $uri = urldecode($uri);
    $uri_parts = array_filter(explode('/', $uri));
    $uri_parts = array_map(function($n) {

      $n = esc_html($n);
      $n = sanitize_title($n);

      return $n;

    }, $uri_parts);

    $uri_parts = array_filter($uri_parts);

    return $uri_parts;

  }

}

