<ul class="sip-point-list js-sip-point-list">
  <li class="js-point-warning"><?php esc_html_e( 'Please click on image above to add point.', 'image-point' ); ?></li>
</ul>

<script type="text/html" id="tmpl-sip-point">
  <li class="sip-point-item js-sip-point-item" data-id="{{ data.id }}">
    <div class="sip-point-item-handle js-sip-point-item-handle">
      <span class="sip-point-item-title js-sip-point-item-title"><?php esc_html_e( 'Point', 'image-point' ); ?> {{ data.id }}</span>
      <span class="sip-point-item-control-container">
          <a href="#remove" class="js-remove-point dashicons dashicons-trash" title="<?php esc_attr_e( 'Remove', 'image-point' ); ?>"></a>
        </span>
    </div>
    <div class="sip-point-item-detail">
      <div class="sip-point-group">
        <div class="sip-point-group-title"><?php esc_html_e( 'Point Icon', 'image-point' ); ?></div>
        <div class="sip-point-group-content">
          <table class="form-table">
            <tr>
              <th><?php esc_html_e( 'Icon Text', 'image-point' ); ?></th>
              <td><input type="text" class="js-point-input" data-prop="icon_text" value="{{ data.icon_text }}" /></td>
              <th><?php esc_html_e( 'Icon Text Color', 'image-point' ); ?></th>
              <td>
                <input type="text" class="js-point-input js-sip-color" data-prop="icon_color" value="{{ data.icon_color }}" />
              </td>
            </tr>
            <tr>
              <th><?php esc_html_e( 'Icon Image', 'image-point' ); ?></th>
              <td>
                <input type="text" class="js-point-input js-sip-inp-icon-image" data-prop="icon_image" value="{{ data.icon_image }}" />
                <a href="#change-icon-image" class="js-sip-change-icon-image dashicons dashicons-format-image"></a>
                <a href="#remove-icon-image" class="js-sip-remove-icon-image dashicons dashicons-trash"></a>
              </td>
              <th><?php esc_html_e( 'Icon Background Color', 'image-point' ); ?></th>
              <td>
                <input type="text" class="js-point-input js-sip-color" data-prop="icon_background" value="{{ data.icon_background }}" />
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="sip-point-group">
        <div class="sip-point-group-title"><?php esc_html_e( 'Point Popup', 'image-point' ); ?></div>
        <div class="sip-point-group-content">
          <table class="form-table">
            <tr>
              <th><?php esc_html_e( 'Popup Type', 'image-point' ); ?></th>
              <td>
                <select class="js-inp-popup-type js-point-input" data-prop="popup_type">
                  <option value="popup" {{ data.popup_type === 'popup' ? ' selected="selected"' : '' }}><?php esc_html_e( 'Popup', 'image-point' ); ?></option>
                  <option value="link" {{ data.popup_type === 'link' ? ' selected="selected"' : '' }}><?php esc_html_e( 'Link', 'image-point' ); ?></option>
                  <option value="product" {{ data.popup_type === 'product' ? ' selected="selected"' : '' }}><?php esc_html_e( 'Product', 'image-point' ); ?></option>
                </select>
              </td>
            </tr>
            <tr class="js-popup-title {{ data.popup_type == 'product' ? 'hidden' : '' }}">
              <th><?php esc_html_e( 'Popup Title', 'image-point' ); ?></th>
              <td><input type="text" class="js-point-input" data-prop="popup_title" value="{{ data.popup_title }}" /></td>
            </tr>
            <tr class="js-popup-content {{ data.popup_type != 'popup' ? 'hidden' : '' }}">
              <th><?php esc_html_e( 'Popup Content', 'image-point' ); ?></th>
              <td><textarea class="js-point-input" data-prop="popup_content" cols="60" rows="5">{{ data.popup_content }}</textarea></td>
            </tr>
            <tr class="js-popup-link {{ data.popup_type != 'link' ? 'hidden' : '' }}">
              <th><?php esc_html_e( 'Popup Link', 'image-point' ); ?></th>
              <td><input type="text" class="js-point-input" data-prop="popup_link" value="{{ data.popup_link }}" /></td>
            </tr>
            <tr class="js-popup-product {{ data.popup_type != 'product' ? 'hidden' : '' }}">
              <th><?php esc_html_e( 'WooCommerce Product', 'image-point' ); ?></th>
              <td>
                <select class="wc-product-search" data-prop="product">
                  <# if (data.product_name) { #>
                    <option value="{{ data.product }}" selected="selected">{{ data.product_name }}</option>
                  <# } #>
                </select>
              </td>
            </tr>
            <tr class="js-popup-position">
              <th><?php esc_html_e( 'Popup Position', 'image-point' ); ?></th>
              <td>
                <select class="js-point-input" data-prop="popup_position">
                  <option value="top" {{ data.popup_position === 'top' ? ' selected="selected"' : '' }}><?php esc_html_e( 'Top', 'image-point' ); ?></option>
                  <option value="bottom" {{ data.popup_position === 'bottom' ? ' selected="selected"' : '' }}><?php esc_html_e( 'Bottom', 'image-point' ); ?></option>
                  <option value="left" {{ data.popup_position === 'left' ? ' selected="selected"' : '' }}><?php esc_html_e( 'Left', 'image-point' ); ?></option>
                  <option value="right" {{ data.popup_position === 'right' ? ' selected="selected"' : '' }}><?php esc_html_e( 'Right', 'image-point' ); ?></option>
                </select>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </li>
</script>