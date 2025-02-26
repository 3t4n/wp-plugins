<?php

/*
 * Plugin Name: Documents Tab WooCommerce
 * Plugin URI:  http://wordpress.org/plugins/documents-tab-woocommerce/
 * Description: Provide Documents tab in the product page of WooCommerce product
 * Author:      Adrian Dimitrov <dimitrov.adrian@gmail.com>
 * Author URI:  http://e01.scifi.bg/
 * Version:     1.0
 * Text Domain: documents-tab-woocommerce
 * Domain Path: /languages/
 */


/**
 * Class WooCommerceDocumentsTab
 */
class DocumentsTabWooCommerce {


  /**
   * Setup
   */
  function plugins_loaded() {

    // L10N
    load_plugin_textdomain('documents-tab-woocommerce', FALSE, dirname(plugin_basename(__FILE__)) . '/languages/');

    // FE
    add_filter('woocommerce_product_tabs', array($this, 'woocommerce_product_tabs'));

    // BE
    add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
    add_action('woocommerce_process_product_meta', array($this, 'woocommerce_process_product_meta'), 10, 2);
    add_filter('woocommerce_product_data_tabs', array($this, 'woocommerce_product_data_tabs'));
    add_action('woocommerce_product_data_panels', array($this, 'woocommerce_product_data_panels'));

  }


  /**
   * Add documents tab in product view.
   *
   * @param $tabs
   *
   * @return mixed
   */
  function woocommerce_product_tabs( $tabs ) {

    $documents = get_post_meta(get_the_ID(), 'documents_tab_woocommerce', TRUE);

    if (!empty($documents['documents'])) {
      $label = empty($documents['tab_label']) ? __('Documents', 'documents-tab-woocommerce') : $documents['tab_label'];
      $tabs['documents_tab_woocommerce'] = array(
        'title' => $label,
        'priority' => 10,
        'callback' => array($this, 'documents_tab_woocommerce_tab_cb'),
      );
    }

    return $tabs;
  }


  /**
   * Callback for documents tab in product view.
   */
  function documents_tab_woocommerce_tab_cb() {
    $documents = get_post_meta(get_the_ID(), 'documents_tab_woocommerce', TRUE);

    if ($documents['heading']) {
      echo '<div class="description heading-text">' . wpautop($documents['heading']) . '</div>';
    }

    if (!empty($documents['documents'])) {
      ?>
      <table class="table documents-tab-woocommerce">
        <thead>
        <tr>
          <th style="width:72px;"></th>
          <th>
            <?php echo __('Title', 'documents-tab-woocommerce')?>
          </th>
          <th style="width:12em;">
            <?php echo __('Type', 'documents-tab-woocommerce')?>
          </th>
          <th style="width:4em;">
            <?php echo __('Size', 'documents-tab-woocommerce')?>
          </th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($documents['documents'] as $doc_id):
          $document = get_post($doc_id);
          if (!$document) {
            continue;
          }
          $alt = get_post_meta($document->ID, '_wp_attachment_image_alt', TRUE);
          ?>
          <tr>
            <td>
              <a href="<?php echo esc_attr($document->guid)?>" target="_blank" alt="<?php esc_attr($alt)?>">
                <?php echo wp_get_attachment_image($doc_id, array(64,64), TRUE)?>
              </a>
            </td>
            <td>
              <a href="<?php echo esc_attr($document->guid)?>" target="_blank" alt="<?php esc_attr($alt)?>">
                <?php echo $document->post_title?>
              </a>
              <?php if ($document->post_content):?>
                <div class="description">
                  <?php echo wpautop($document->post_content)?>
                </div>
              <?php endif?>
            </td>
            <td class="type column-type">
              <?php echo $document->post_mime_type?>
            </td>
            <td class="size column-size">
              <?php echo size_format(filesize(get_attached_file($document->ID)))?>
            </td>
          </tr>
        <?php endforeach?>
        </tbody>
      </table>
      <?php

      if ($documents['footer']) {
        echo '<div class="description footer-text">' . wpautop($documents['footer']) . '</div>';
      }

    }
  }


  /**
   * Add assets for admin panel
   */
  function admin_enqueue_scripts() {
    wp_enqueue_style('documents-tab-woocommerce', plugins_url('admin.css', __FILE__));
  }


  /**
   * Add documents tab in vertical tabs in product data.
   *
   * @param $tabs
   *
   * @return mixed
   */
  function woocommerce_product_data_tabs($tabs) {
    $tabs['documents'] = array(
      'label'  => __('Documents', 'documents-tab-woocommerce'),
      'target' => 'documents_product_data',
      'class'  => array('hide_if_grouped'),
    );
    return $tabs;
  }


  /**
   * Callback for documents tab in product data
   */
  function woocommerce_product_data_panels() {
    wp_enqueue_media();
    wp_enqueue_script('documents-tab-woocommerce', plugins_url('admin.js', __FILE__), array('jquery', 'media'), NULL, TRUE);
    wp_localize_script('documents-tab-woocommerce', 'documentsTabWooCommerceL10N', array(
      'title' => __('Documents', 'documents-tab-woocommerce'),
      'button' => __('Attach', 'documents-tab-woocommerce'),
      'edit' => __('Edit', 'documents-tab-woocommerce'),
      'remove' => __('Remove', 'documents-tab-woocommerce'),
      'removeConfirmText' => __('Are you sure you wish to delete these files?', 'documents-tab-woocommerce'),
    ));
    $documents = get_post_meta(get_the_ID(), 'documents_tab_woocommerce', TRUE);
    ?>
    <div id="documents_product_data" class="panel woocommerce_options_panel wc-metaboxes-wrapper">

      <div class="options_group wc-metaboxes">
        <table class="documents-tab-woocommerce-documents">
          <tbody>
            <?php if (!empty($documents['documents'])):?>
              <?php foreach ($documents['documents'] as $doc_id):?>
                <?php if (($document = get_post($doc_id))):?>
                <tr>
                  <td>
                    <input type="hidden" name="documents_tab_woocommerce[documents][]" value="<?php echo esc_attr($doc_id)?>" />
                    <?php echo wp_get_attachment_image($doc_id, array(32,32), TRUE)?>
                  </td>
                  <td>
                    <a href="<?php echo esc_attr($document->guid)?>" target="_blank">
                      <?php echo $document->post_title?>
                    </a>
                  </td>
                  <td>
                    <?php echo $document->post_mime_type?>
                  </td>
                  <td>
                    <?php echo size_format(filesize(get_attached_file($document->ID)))?>
                  </td>
                  <td>
                    <a href="<?php echo esc_attr(get_edit_post_link($doc_id))?>" target="_blank"><?php _e('Edit')?></a>
                  </td>
                </tr>
                <?php endif?>
              <?php endforeach?>
            <?php endif?>
          </tbody>
        </table>

        <p class="form-field">
          <button type="button" class="button documents-tab-woocommerce-add-button">
            <?php _e('Add', 'documents-tab-woocommerce'); ?>
          </button>
        </p>

      </div>

      <div class="options_group">
        <p class="form-field">
          <label for="woocommerce-product-documents-label">
            <?php _e('Custom tab label', 'documents-tab-woocommerce')?>
          </label>
          <input type="text" id="woocommerce-product-documents-label" name="documents_tab_woocommerce[tab_label]" value="<?php echo empty($documents['tab_label']) ? '' : esc_attr($documents['tab_label'])?>" />
          <p>
            <small><?php printf(__('Leave empty and default text (%s) will be used.', 'documents-tab-woocommerce'), __('Documents', 'documents-tab-woocommerce'))?></small>
          </p>
        </p>

        <p class="form-field">
          <label for="woocommerce-product-documents-heading">
            <?php _e('Heading text', 'documents-tab-woocommerce')?>
          </label>
          <textarea id="woocommerce-product-documents-heading" name="documents_tab_woocommerce[heading]" class="widefat" rows="2" cols="20"><?php echo empty($documents['heading']) ? '' : esc_html($documents['heading'])?></textarea>
        </p>

        <p class="form-field">
          <label for="woocommerce-product-documents-footer">
            <?php _e('Footer text', 'documents-tab-woocommerce')?>
          </label>
          <textarea id="woocommerce-product-documents-footer" name="documents_tab_woocommerce[footer]" class="widefat" rows="2" cols="20"><?php echo empty($documents['footer']) ? '' : esc_html($documents['footer'])?></textarea>
        </p>
      </div>

    </div>
    <?php
  }


  /**
   * Saves the data inputed into the product boxes, as post meta data
   * identified by the name 'frs_woo_product_tabs'
   *
   * @param int $post_id the post (product) identifier
   * @param stdClass $post the post (product)
   */
  public function woocommerce_process_product_meta($post_id, $post) {
    if (!empty($_REQUEST['documents_tab_woocommerce'])) {
      update_post_meta($post_id, 'documents_tab_woocommerce', $_REQUEST['documents_tab_woocommerce']);
    }
  }

}


$DocumentsTabWooCommerce = new DocumentsTabWooCommerce();

add_action('plugins_loaded', array($DocumentsTabWooCommerce, 'plugins_loaded'));
