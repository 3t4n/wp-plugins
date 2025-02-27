<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/admin/partials
 */
?>

<h2><?php echo esc_html(get_admin_page_title()); ?></h2>

<form method="post" name="delivery_config" action="options.php">

    <?php

        $options = get_option($this->plugin_name);

        if (!(isset($options['affiliate_id'])))               { $options['affiliate_id'] = '';                    }
        if (!(isset($options['products'])))                   { $options['products'] = 0;                         }
        if (!(isset($options['products_cm'])))                { $options['products_cm'] = 0;                      }
        if (!(isset($options['products_ea'])))                { $options['products_ea'] = 0;                      }
        if (!(isset($options['products_md'])))                { $options['products_md'] = 0;                      }
        if (!(isset($options['products_tg'])))                { $options['products_tg'] = 0;                      }
        if (!(isset($options['products_vd'])))                { $options['products_vd'] = 0;                      }
        if (!(isset($options['products_fb'])))                { $options['products_fb'] = 0;                      }
        if (!(isset($options['choose_colors'])))              { $options['choose_colors'] = 0;                    }
        if (!(isset($options['navigation_color'])))           { $options['navigation_color'] = '#8db6d9';         }
        if (!(isset($options['navigation_hover_color'])))     { $options['navigation_hover_color'] = '#18477d';   }
        if (!(isset($options['navigation_text_color'])))      { $options['navigation_text_color'] = '#FFF';       }
        if (!(isset($options['navigation_hover_text_color']))){ $options['navigation_hover_text_color'] = '#000'; }
        if (!(isset($options['button_color'])))               { $options['button_color'] = '#8db6d9';             }
        if (!(isset($options['button_hover_color'])))         { $options['button_hover_color'] = '#8db6d9';       }
        if (!(isset($options['button_text_color'])))          { $options['button_text_color'] = '#FFF';           }
        if (!(isset($options['button_hover_text_color'])))    { $options['button_hover_text_color'] = '#000';     }
        if (!(isset($options['link_color'])))                 { $options['link_color'] = '#18477d';               }
        if (!(isset($options['heading_color'])))              { $options['heading_color'] = '#000';               }
        if (!(isset($options['text_color'])))                 { $options['text_color'] = '#000';                  }
        if (!(isset($options['products_per_page'])))          { $options['products_per_page'] = 12;               }
        if (!(isset($options['address_institution'])))        { $options['address_institution'] = '';             }
        if (!(isset($options['address_1'])))                  { $options['address_1'] = '';                       }
        if (!(isset($options['address_city'])))               { $options['address_city'] = '';                    }
        if (!(isset($options['address_state'])))              { $options['address_state'] = '';                   }
        if (!(isset($options['address_country'])))            { $options['address_country'] = '';                 }
        if (!(isset($options['address_zipcode'])))            { $options['address_zipcode'] = '';                 }
        if (!(isset($options['address_phone'])))              { $options['address_phone'] = '';                   }
        if (!(isset($options['currency'])))                   { $options['currency'] = 'u';                       }
        if (!(isset($options['flower_storefront_id'])))       { $options['flower_storefront_id'] = 0;             }
        if (!(isset($options['florist_selection'])))          { $options['florist_selection'] = 0;                }
        if (!(isset($options['florists_of_choice'])))         { $options['florists_of_choice'] = array();         }
        if (!(isset($options['facility_id'])))                { $options['facility_id'] = 0;                      }
        if (!(isset($options['rotation'])))                   { $options['rotation'] = 0;                         }
        if (!(isset($options['show_trees'])))                 { $options['show_trees'] = 0;                       }
        if (!(isset($options['locations']))) {
          $options['locations'] = array();
          if (strlen($options['address_1']) > 0){
            $options['locations'][0] = array(
              'address_institution' => $options['address_institution'],
              'address_1' => $options['address_1'],
              'address_city' => $options['address_city'],
              'address_state' => $options['address_state'],
              'address_country' => $options['address_country'],
              'address_zipcode' => $options['address_zipcode'],
              'address_phone' => $options['address_phone'],
              'facility_id' => $options['facility_id'],
              'florists' => array(),
              'rotation' => $options['rotation']
            );
          }
        }

        $affiliate_id = $options['affiliate_id'];
        $products = $options['products'];

        $products_cm = $options['products_cm'];
        $products_ea = $options['products_ea'];
        $products_md = $options['products_md'];
        $products_tg = $options['products_tg'];
        $products_vd = $options['products_vd'];
        $products_fb = $options['products_fb'];
        $products_tree = $options['show_trees'];
        $custom_colors = $options['choose_colors'];

        $navigation_color = $options['navigation_color'];
        $navigation_hover_color = $options['navigation_hover_color'];
        $navigation_text_color = $options['navigation_text_color'];
        $navigation_hover_text_color = $options['navigation_hover_text_color'];
        $button_color = $options['button_color'];
        $button_hover_color = $options['button_hover_color'];
        $button_text_color = $options['button_text_color'];
        $button_hover_text_color = $options['button_hover_text_color'];
        $link_color = $options['link_color'];
        $heading_color = $options['heading_color'];
        $text_color = $options['text_color'];
        $products_per_page = $options['products_per_page'];
        $address_institution = $options['address_institution'];
        $address_1 = $options['address_1'];
        $address_city = $options['address_city'];
        $address_state = $options['address_state'];
        $address_country = $options['address_country'];
        $address_zipcode = $options['address_zipcode'];
        $address_phone = $options['address_phone'];
        $currency = $options['currency'];
        $flower_storefront_id = $options['flower_storefront_id'];

        $rotation = 0;
        $florist_selection = $options['florist_selection'];
        $florists_of_choice = $options['florists_of_choice'];
        $facility_id = ( isset($options['facility_id']) ? json_encode($options['facility_id']) : 0 );        //echo $options['facility_id'];

        $locations = $options['locations'];

    ?>

    <?php
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
    ?>

    <table class="admin_section">
      <tr>
        <td><h3><?php esc_html_e( 'Affiliate', 'flower-delivery-by-florist-one');?></h3></td>
        <td></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Affiliate ID', 'flower-delivery-by-florist-one' );?></td>
        <td>
          <fieldset>
            <input type="text" id="<?php echo esc_attr($this->plugin_name); ?>-affiliate_id" name="<?php echo esc_attr($this->plugin_name); ?>[affiliate_id]" value="<?php echo esc_attr($affiliate_id)?>" />
          </fieldset>
        </td>
      </tr>
      <tr>
        <td></td>
        <td><?php esc_html_e('To obtain a Florist One Affiliate ID', 'flower-delivery-by-florist-one' )?>, <a href="<?php echo esc_url("https://www.floristone.com/affiliate/aff_manager/index.cfm?fuseaction=newaff&newafftype=flower_plugin"); ?>"><?php esc_html_e('sign up here', 'flower-delivery-by-florist-one' )?></a>.</td>
      </tr>
      <tr>
        <td colspan="2"><hr /></td>
      </tr>
      <tr>
        <td><h3><?php esc_html_e( 'Products', 'flower-delivery-by-florist-one');?></h3></td>
        <td></td>
      </tr>
      <tr>
        <td><?php esc_html_e( 'Products', 'flower-delivery-by-florist-one');?></td>
        <td>
          <fieldset>
            <input type="radio" id="<?php echo esc_attr($this->plugin_name); ?>-products-1" name="<?php echo esc_attr($this->plugin_name); ?>[products]" value="0" <?php checked( esc_attr($products), 0 ); ?>> <?php esc_html_e('All Flower Categories', 'flower-delivery-by-florist-one' )?> <input type="radio" id="<?php echo esc_attr($this->plugin_name); ?>-products-1" name="<?php echo esc_attr($this->plugin_name); ?>[products]" value="1"<?php checked( esc_attr($products), 1 ); ?>> <?php esc_html_e( 'Only Funeral &amp; Sympathy', 'flower-delivery-by-florist-one');?>
          </fieldset>
        </td>
        <td></td>
      </tr>
      <tr class="additional_holidays">
        <td colspan="3"><h4><?php esc_html_e( 'Additional Occasions and Holidays', 'flower-delivery-by-florist-one');?></h4></td>
      </tr>
      <tr class="additional_holidays">
        <td><?php esc_html_e( 'Christmas', 'flower-delivery-by-florist-one');?></td>
        <td>
          <fieldset>
            <input type="checkbox" id="<?php echo esc_attr($this->plugin_name); ?>-products_cm" name="<?php echo esc_attr($this->plugin_name); ?>[products_cm]" <?php echo esc_attr($products_cm) == 1 ? 'checked="checked"' : ''; ?> value="1">
          </fieldset>
        </td>
        <td></td>
      </tr>
      <tr class="additional_holidays">
        <td><?php esc_html_e( 'Easter', 'flower-delivery-by-florist-one');?></td>
        <td>
          <fieldset>
            <input type="checkbox" id="<?php echo esc_attr($this->plugin_name); ?>-products_ea" name="<?php echo esc_attr($this->plugin_name); ?>[products_ea]" <?php echo esc_attr($products_ea) == 1 ? 'checked="checked"' : ''; ?> value="1">
          </fieldset>
        </td>
        <td></td>
      </tr>
      <tr class="additional_holidays">
        <td><?php esc_html_e( "Mother's Day", 'flower-delivery-by-florist-one');?></td>
        <td>
          <fieldset>
            <input type="checkbox" id="<?php echo esc_attr($this->plugin_name); ?>-products_md" name="<?php echo esc_attr($this->plugin_name); ?>[products_md]" <?php echo esc_attr($products_md) == 1 ? 'checked="checked"' : ''; ?> value="1">
          </fieldset>
        </td>
        <td></td>
      </tr>
      <tr class="additional_holidays">
        <td><?php esc_html_e( 'Thanksgiving', 'flower-delivery-by-florist-one');?></td>
        <td>
          <fieldset>
            <input type="checkbox" id="<?php echo esc_attr($this->plugin_name); ?>-products_tg" name="<?php echo esc_attr($this->plugin_name); ?>[products_tg]" <?php echo esc_attr($products_tg) == 1 ? 'checked="checked"' : ''; ?> value="1">
          </fieldset>
        </td>
        <td></td>
      </tr>
      <tr class="additional_holidays">
        <td><?php esc_html_e( "Valentine's Day", 'flower-delivery-by-florist-one');?></td>
        <td>
          <fieldset>
            <input type="checkbox" id="<?php echo esc_attr($this->plugin_name); ?>-products_vd" name="<?php echo esc_attr($this->plugin_name); ?>[products_vd]" <?php echo esc_attr($products_vd) == 1 ? 'checked="checked"' : ''; ?> value="1">
          </fieldset>
        </td>
        <td></td>
      </tr>
      <tr class="additional_holidays_funeral">
        <td><?php esc_html_e( 'Show Flowers First', 'flower-delivery-by-florist-one');?></td>
        <td>
          <fieldset>
            <input type="checkbox" id="<?php echo esc_attr($this->plugin_name); ?>-show_trees" name="<?php echo esc_attr($this->plugin_name); ?>[show_trees]" <?php echo esc_attr($products_tree) == 1 ? 'checked="checked"' : ''; ?> value="1">
          </fieldset>
        </td>
        <td></td>
      </tr>

      <tr class="additional_holidays_funeral">
        <td colspan="3"><h4><?php esc_html_e( 'Additional Categories', 'flower-delivery-by-florist-one');?></h4></td>
      </tr>
      <tr class="additional_holidays_funeral">
        <td><?php esc_html_e( 'Fruit Baskets', 'flower-delivery-by-florist-one');?></h4></td>
        <td>
          <fieldset>
            <input type="checkbox" id="<?php echo esc_attr($this->plugin_name); ?>-products_fb" name="<?php echo esc_attr($this->plugin_name); ?>[products_fb]" <?php echo esc_attr($products_fb) == 1 ? 'checked="checked"' : ''; ?> value="1">
          </fieldset>
        </td>
        <td></td>
      </tr>


      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>

      <tr>
        <td><?php esc_html_e( 'Products Per Page', 'flower-delivery-by-florist-one');?></td>
        <td>
          <fieldset>
            <select id="<?php echo esc_attr($this->plugin_name); ?>-products_per_page" name="<?php echo esc_attr($this->plugin_name); ?>[products_per_page]">
              <option value="6"  <?php if (esc_attr($products_per_page) == 6){ echo 'selected="selected"'; } ?>><?php echo esc_html(6); ?></option>
              <option value="12" <?php if (esc_attr($products_per_page) == 12){ echo 'selected="selected"'; } ?>><?php echo esc_html(12); ?></option>
              <option value="18" <?php if (esc_attr($products_per_page) == 18){ echo 'selected="selected"'; } ?>><?php echo esc_html(18); ?></option>
              <option value="24" <?php if (esc_attr($products_per_page) == 24){ echo 'selected="selected"'; } ?>><?php echo esc_html(24); ?></option>
            </select>
          </fieldset>
        </td>
        <td></td>
      </tr>
      <tr>
        <td colspan="2"><hr /></td>
      </tr>

      <tr class="_autopop-address">
        <td><h3><?php esc_html_e( 'Locations', 'flower-delivery-by-florist-one');?> (<?php echo sizeof($locations) ?>) <?php esc_html_e( 'and Florist Selection', 'flower-delivery-by-florist-one');?></h3></td>
        <td align="right"><button id="<?php echo esc_attr($this->plugin_name); ?>-add_new_location_btn" class="<?php echo esc_attr($this->plugin_name); ?>-add_new_location_btn"><?php esc_html_e( 'Add New Location', 'flower-delivery-by-florist-one');?></button></td>
      </tr>
      <tr class="_autopop-address">
        <td colspan="2">
          <table class="table_display_all_locations">
            <!-- dynamic content -->
          </table>
        </td>
      </tr>
      <tr class="autopop-address">
        <td colspan="2">
          <h3><span class="add-update-address-institution">_</span></h3>
        </td>
      </tr>
      <tr class="autopop-address">
        <td><?php esc_html_e( 'Funeral Home Name', 'flower-delivery-by-florist-one');?></td>
        <td>
          <fieldset>
            <input type="hidden" id="florist-one-flower-delivery-address-index-to-update" name="florist-one-flower-delivery-address-index-to-update" class="florist-one-flower-delivery-address-index-to-update" value="-1" />
            <input type="text" id="<?php echo esc_attr($this->plugin_name); ?>-address_institution" name="<?php echo esc_attr($this->plugin_name); ?>[address_institution]" value="<?php echo esc_html( $address_institution); ?>" />
          </fieldset>
        </td>
      </tr>
      <tr class="autopop-address">
        <td><?php esc_html_e( 'Address', 'flower-delivery-by-florist-one');?></td>
        <td>
          <fieldset>
            <input type="text" id="<?php echo esc_attr($this->plugin_name); ?>-address_1" name="<?php echo esc_attr($this->plugin_name); ?>[address_1]" value="<?php echo esc_html($address_1); ?>" />
          </fieldset>
        </td>
      </tr>
      <tr class="autopop-address">
        <td><?php esc_html_e( 'City', 'flower-delivery-by-florist-one');?></td>
        <td>
          <fieldset>
            <input type="text" id="<?php echo esc_attr($this->plugin_name); ?>-address_city" name="<?php echo esc_attr($this->plugin_name); ?>[address_city]" value="<?php echo esc_html($address_city); ?>" />
          </fieldset>
        </td>
      </tr>
      <tr class="autopop-address">
        <td><?php esc_html_e( 'State', 'flower-delivery-by-florist-one');?></td>
        <td>
          <fieldset>
            <input type="text" id="<?php echo esc_attr($this->plugin_name); ?>-address_state" name="<?php echo esc_attr($this->plugin_name); ?>[address_state]" value="<?php echo esc_html($address_state); ?>" maxlength="2" />
          </fieldset>
        </td>
      </tr>
      <tr class="autopop-address">
        <td><?php esc_html_e( 'Zip', 'flower-delivery-by-florist-one');?></td>
        <td>
          <fieldset>
            <input type="text" id="<?php echo esc_attr($this->plugin_name); ?>-address_zipcode" name="<?php echo esc_attr($this->plugin_name); ?>[address_zipcode]" value="<?php echo esc_html($address_zipcode); ?>" />
          </fieldset>
        </td>
      </tr>
      <tr class="autopop-address">
        <td><?php esc_html_e( 'Country', 'flower-delivery-by-florist-one');?></td>
        <td>
          <fieldset>
            <input type="text" id="<?php echo esc_attr($this->plugin_name); ?>-address_country" name="<?php echo esc_attr($this->plugin_name); ?>[address_country]" value="<?php echo esc_html($address_country); ?>" maxlength="2" />
          </fieldset>
        </td>
      </tr>
      <tr class="autopop-address">
        <td><?php esc_html_e( 'Phone', 'flower-delivery-by-florist-one');?></td>
        <td>
          <fieldset>
            <input type="text" id="<?php echo esc_attr($this->plugin_name); ?>-address_phone" name="<?php echo esc_attr($this->plugin_name); ?>[address_phone]" value="<?php echo esc_html($address_phone); ?>" />
          </fieldset>
        </td>
      </tr>
      <tr class="florists-selection-area">
        <td colspan="2"><h3><?php esc_html_e( 'Florist Selection - Choose florists for', 'flower-delivery-by-florist-one');?> <span class="choose-florists-institution-name">_</span></h3></td>
      </tr>
      <tr class="florists-selection-area">
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr class="florists-selection-area florist-selection-row">
        <td colspan="2">
          <input type="hidden" id="<?php echo esc_attr($this->plugin_name); ?>-facility_id" class="<?php echo esc_attr($this->plugin_name); ?>-facility_id" name="<?php echo esc_attr($this->plugin_name); ?>[facility_id]" value="<?php echo esc_html($facility_id); ?>">
        </td>
      </tr>
      <tr class="florists-selection-area florist-selection-row_" style="display: none;">
        <td><?php esc_html_e( 'First Choice / Rotation', 'flower-delivery-by-florist-one');?></td>
        <td>
          <fieldset>
            <input type="radio" id="<?php echo esc_attr($this->plugin_name); ?>-rotation" name="<?php echo esc_attr($this->plugin_name); ?>[rotation]" value="0"> <?php esc_html_e( 'First Choice','flower-delivery-by-florist-one');?> <input type="radio" id ="<?php echo esc_attr($this->plugin_name); ?>-rotation-1" name="<?php echo esc_attr($this->plugin_name); ?>[rotation]" value="1"> <?php esc_html_e( 'Rotation','flower-delivery-by-florist-one');?>
          </fieldset>
        </td>
      </tr>
      <tr class="florists-selection-area florist-selection-row">
        <td colspan="2">
          <h4><?php esc_html_e( 'Your Florists', 'flower-delivery-by-florist-one');?></h4>
        </td>
      </tr>
      <tr class="florists-selection-area florist-selection-row">
        <td colspan="2">
          <div class="your_florists"></div>
          <input type="hidden" id="<?php echo esc_attr($this->plugin_name); ?>-florists_of_choice" class="<?php echo esc_attr($this->plugin_name); ?>-florists_of_choice" name="<?php echo esc_attr($this->plugin_name); ?>[florists_of_choice]" value='<?php echo json_encode($florists_of_choice); ?>' />
        </td>
      <tr class="florists-selection-area florist-selection-row">
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr class="<?php echo esc_attr($this->plugin_name); ?>-show_add_another_florist_row florist-selection-row">
        <td colspan="2">
          <select id="new_florist_code" class="new_florist_code"></select>
          <button id="<?php echo esc_attr($this->plugin_name); ?>-add_another_florist_btn" class="<?php echo esc_attr($this->plugin_name); ?>-add_another_florist_btn"><?php esc_html_e( 'Add','flower-delivery-by-florist-one');?></button>
          <button id="<?php echo esc_attr($this->plugin_name); ?>-cancel_add_another_florist_btn" class="<?php echo esc_attr($this->plugin_name); ?>-cancel_add_another_florist_btn"><?php esc_html_e( 'Cancel', 'flower-delivery-by-florist-one');?></button>
        </td>
      </tr>
      <tr class="florists-selection-area florist-selection-row">
        <td colspan="2">
          <button id="<?php echo esc_attr($this->plugin_name); ?>-show_add_another_florist_btn" class="<?php echo esc_attr($this->plugin_name); ?>-show_add_another_florist_btn"><?php esc_html_e( 'Add A New Florist', 'flower-delivery-by-florist-one');?></button>
        </td>
      </tr>
      <tr class="autopop-address">
        <td>
          <button id="<?php echo esc_attr($this->plugin_name); ?>-cancel_new_location_update_location" class="<?php echo esc_attr($this->plugin_name); ?>-cancel_new_location_update_location"><?php esc_html_e( 'Cancel', 'flower-delivery-by-florist-one');?></button>
        </td>
        <td>
          <button id="<?php echo esc_attr($this->plugin_name); ?>-show_add_another_location_btn" class="<?php echo esc_attr($this->plugin_name); ?>-show_add_another_location_btn"><?php esc_html_e( 'Save');?></button>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <textarea rows="10" cols="50" id="<?php echo esc_attr($this->plugin_name); ?>-locations" name="<?php echo esc_attr($this->plugin_name); ?>[locations]" style="display: none;"><?php echo json_encode($locations); ?></textarea>
          <hr />
        </td>
      </tr>
    </table>
    <table class="admin_section">
      <tr class="autopop-address">
        <td colspan="2"><hr /></td>
      </tr>
      <tr>
        <td colspan="2"><h3><?php esc_html_e( 'Colors', 'flower-delivery-by-florist-one');?></h3></td>
      </tr>
      <tr>
        <td width="265px"><?php esc_html_e( 'Use Custom Colors', 'flower-delivery-by-florist-one');?></td>
        <td>
          <fieldset>
            <input type="checkbox" id="<?php echo esc_attr($this->plugin_name); ?>-choose_colors" name="<?php echo esc_attr($this->plugin_name); ?>[choose_colors]" <?php echo  $custom_colors == 1 ? 'checked="checked"' : ''; ?> value="1">
          </fieldset>
        </td>
      </tr>
      
      <?php if ($custom_colors == 1){ ?>
        <tr>
          <td colspan="2"><h4><?php esc_html_e( 'Navigation', 'flower-delivery-by-florist-one');?></h4></td>
        </tr>
        <tr>
          <td><?php esc_html_e( 'Color 1', 'flower-delivery-by-florist-one');?></td>
          <td>
            <fieldset class="<?php echo esc_attr($this->plugin_name);?>-admin-colors">
            	<input type="text" class="<?php echo esc_attr($this->plugin_name);?>-color-picker" id="<?php echo esc_attr($this->plugin_name);?>-navigation_color" name="<?php echo esc_attr($this->plugin_name);?>[navigation_color]" value="<?php echo esc_html($navigation_color);?>" />
            </fieldset>
          </td>
        </tr>
        <tr>
          <td><?php esc_html_e( 'Color 2', 'flower-delivery-by-florist-one');?></td>
          <td>
            <fieldset class="<?php echo esc_attr($this->plugin_name);?>-admin-colors">
            	<input type="text" class="<?php echo esc_attr($this->plugin_name);?>-color-picker" id="<?php echo esc_attr($this->plugin_name);?>-navigation_hover_color" name="<?php echo esc_attr($this->plugin_name);?>[navigation_hover_color]" value="<?php echo esc_html( $navigation_hover_color) ;?>" />
            </fieldset>
          </td>
        </tr>
        <tr>
          <td><?php esc_html_e( 'Text Color', 'flower-delivery-by-florist-one');?></td>
          <td>
            <fieldset class="<?php echo esc_attr($this->plugin_name);?>-admin-colors">
                <input type="text" class="<?php echo esc_attr($this->plugin_name);?>-color-picker" id="<?php echo esc_attr($this->plugin_name);?>-navigation_text_color" name="<?php echo esc_attr($this->plugin_name);?>[navigation_text_color]" value="<?php echo esc_html($navigation_text_color);?>" />
            </fieldset>
          </td>
        </tr>
        <tr>
          <td><?php esc_html_e( 'Hover Text Color', 'flower-delivery-by-florist-one');?></td>
          <td>
            <fieldset class="<?php echo esc_attr($this->plugin_name);?>-admin-colors">
                <input type="text" class="<?php echo esc_attr($this->plugin_name);?>-color-picker" id="<?php echo esc_attr($this->plugin_name);?>-navigation_hover_text_color" name="<?php echo esc_attr($this->plugin_name);?>[navigation_hover_text_color]" value="<?php echo esc_html( $navigation_hover_text_color);?>" />
            </fieldset>
          </td>
        </tr>
        <tr>
          <td colspan="2"><h4><?php esc_html_e( 'Buttons', 'flower-delivery-by-florist-one');?></h4></td>
        </tr>
        <tr>
          <td><?php esc_html_e( 'Color 1', 'flower-delivery-by-florist-one');?></td>
          <td>
            <fieldset class="<?php echo esc_attr($this->plugin_name);?>-admin-colors">
                <input type="text" class="<?php echo esc_attr($this->plugin_name);?>-color-picker" id="<?php echo esc_attr($this->plugin_name);?>-button_color" name="<?php echo esc_attr($this->plugin_name);?>[button_color]" value="<?php echo esc_html($button_color);?>" />
            </fieldset>
          </td>
        </tr>
        <tr>
          <td><?php esc_html_e( 'Color 2', 'flower-delivery-by-florist-one');?></td>
          <td>
            <fieldset class="<?php echo esc_attr($this->plugin_name);?>-admin-colors">
                <input type="text" class="<?php echo esc_attr($this->plugin_name);?>-color-picker" id="<?php echo esc_attr($this->plugin_name);?>-button_hover_color" name="<?php echo esc_attr($this->plugin_name);?>[button_hover_color]" value="<?php echo esc_html($button_hover_color);?>" />
            </fieldset>
          </td>
        </tr>
        <tr>
          <td><?php esc_html_e( 'Text Color', 'flower-delivery-by-florist-one');?></td>
          <td>
            <fieldset class="<?php echo esc_attr($this->plugin_name);?>-admin-colors">
                <input type="text" class="<?php echo esc_attr($this->plugin_name);?>-color-picker" id="<?php echo esc_attr($this->plugin_name);?>-button_text_color" name="<?php echo esc_attr($this->plugin_name);?>[button_text_color]" value="<?php echo esc_html($button_text_color);?>" />
            </fieldset>
          </td>
        </tr>
        <tr>
          <td><?php esc_html_e( 'Hover Text Color', 'flower-delivery-by-florist-one');?></td>
          <td>
            <fieldset class="<?php echo esc_attr($this->plugin_name);?>-admin-colors">
                <input type="text" class="<?php echo esc_attr($this->plugin_name);?>-color-picker" id="<?php echo esc_attr($this->plugin_name);?>-button_hover_text_color" name="<?php echo esc_attr($this->plugin_name);?>[button_hover_text_color]" value="<?php echo esc_html($button_hover_text_color);?>" />
            </fieldset>
          </td>
        </tr>
        <tr>
          <td colspan="2"><h4><?php esc_html_e( 'Other Color Options', 'flower-delivery-by-florist-one');?></h4></td>
        </tr>
        <tr>
          <td><?php esc_html_e( 'Link Color', 'flower-delivery-by-florist-one');?></td>
          <td>
            <fieldset class="<?php echo esc_attr($this->plugin_name);?>-admin-colors">
              <input type="text" class="<?php echo esc_attr($this->plugin_name);?>-color-picker" id="<?php echo esc_attr($this->plugin_name);?>-link_color" name="<?php echo esc_attr($this->plugin_name);?>[link_color]" value="<?php echo esc_html($link_color);?>" />
            </fieldset>
          </td>
          <td></td>
        </tr>
        <tr>
          <td><?php esc_html_e( 'Heading Color', 'flower-delivery-by-florist-one');?></td>
          <td>
            <fieldset class="<?php echo esc_attr($this->plugin_name);?>-admin-colors">
              <input type="text" class="<?php echo esc_attr($this->plugin_name);?>-color-picker" id="<?php echo esc_attr($this->plugin_name);?>-heading_color" name="<?php echo esc_attr($this->plugin_name);?>[heading_color]" value="<?php echo esc_html($heading_color);?>" />
            </fieldset>
          </td>
          <td></td>
        </tr>
        <tr>
          <td><?php esc_html_e( 'Text Color', 'flower-delivery-by-florist-one');?></td>
          <td>
            <fieldset class="<?php echo esc_attr($this->plugin_name);?>-admin-colors">
              <input type="text" class="<?php echo esc_attr($this->plugin_name);?>-color-picker" id="<?php echo esc_attr($this->plugin_name);?>-text_color" name="<?php echo esc_attr($this->plugin_name);?>[text_color]" value="<?php echo esc_html($text_color);?>" />
            </fieldset>
          </td>
          <td></td>
        </tr>
      <?php } ?>    
    </table>

    <input type="hidden" id="<?php echo esc_attr($this->plugin_name); ?>-flower_storefront_id" name="<?php echo esc_attr($this->plugin_name); ?>[flower_storefront_id]" value="<?php echo esc_html($flower_storefront_id);?>" />

<?php submit_button('Save all changes', 'primary','submit', TRUE); ?>

</form>
