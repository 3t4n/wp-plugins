<?php

if (!class_exists('AEIDN_Utils')) {
  class AEIDN_Utils
  {
    /**
     * This function removes specified tags and malformed tags from HTML.
     * Used to sanitize the product descriptions.
     *
     * @param string $html code to parse
     * @param array $tags tags to remove.
     *  Default array: 'script', 'head', 'meta', 'style', 'map', 'noscript', 'object'
     *  If the argument is empty and the option is set, removes 'img' (images)
     *  If the argument is empty and the option is set, removes 'a' (links)
     */
    public static function removeTags($html, $tags = array())
    {
      $dom = new DOMDocument();
      libxml_use_internal_errors(true);
      @$dom->loadHTML($html);
      libxml_use_internal_errors(false);
      $dom->formatOutput = true;

      if (!$tags) {
        $tags = array('script', 'head', 'meta', 'style', 'map', 'noscript', 'object');

        if (get_option('aeidn_remove_img_from_desc', false)) {
          $tags[] = 'img';
        }
        if (get_option('aeidn_remove_link_from_desc', false)) {
          $tags[] = 'a';
        }
      }
      foreach ($tags as $tag) {
        $elements = $dom->getElementsByTagName($tag);
        for ($i = $elements->length; --$i >= 0;) {
          $e = $elements->item($i);
          if ($tag === 'a') {
            while ($e->hasChildNodes()) {
              $child = $e->removeChild($e->firstChild);
              $e->parentNode->insertBefore($child, $e);
            }
            $e->parentNode->removeChild($e);
          } else {
            $e->parentNode->removeChild($e);
          }
        }
      }

      return preg_replace('~<(?:!DOCTYPE|/?(?:html|body))[^>]*>\s*~i', '', $dom->saveHTML());
    }

    /**
     * Get the product category tree from WP terms.
     * This is not the category tree from AliExpress, but there is a function
     * to sync them.
     *
     * @return array hierarchical category tree
     **/
    public static function getCategoriesTree()
    {
      $categories = get_terms(
        'product_cat',
        array(
          'hide_empty' => 0,
          'hierarchical' => true
        )
      );
      $categories = json_decode(json_encode($categories), TRUE);
      $categories = AEIDN_Utils::buildCategoriesTree($categories, 0);
      return $categories;
    }

    /**
     * A recursive tree-building function.
     * Makes the tree array hierarchical.
     *
     * @param array $all_cats categories to arrange
     * @param int $parent_cat parent category ID
     * @param int $level level to arrange
     *
     * @return array
     **/
    private static function buildCategoriesTree($all_cats, $parent_cat, $level = 1)
    {
      $res = array();
      foreach ($all_cats as $c) {
        if ($c['parent'] === $parent_cat) {
          $c['level'] = $level;
          $res[] = $c;
          $child_cats = AEIDN_Utils::buildCategoriesTree($all_cats, $c['term_id'], $level + 1);
          if ($child_cats) {
            /** @noinspection SlowArrayOperationsInLoopInspection */
            $res = array_merge($res, $child_cats);
          }
        }
      }
      return $res;
    }
  }
}
