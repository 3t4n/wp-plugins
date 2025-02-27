<?php
// SLOPE PROMOTIONS

add_shortcode('slope-promotions', 'slope_promotions');

// Content to show with the shortcode [slope-promotions]
function slope_promotions() {
    $uuid = ReservationsSettingsProvider::getEstablishmentId();
    $bookTarget = PromotionsSettingProvider::shouldOpenLinksOnANewTab() ? ' data-open-new-tab="true"' : '';
    return '<div id="slope-promotions"' . $bookTarget . ' data-id="' . esc_attr($uuid) . '"></div>';
}

// Callback slope promotions
function slope_promotions_intro() {

    // SETTINGS
    echo '<div class="slope-setting-container-promotions"><p>' . esc_html__('Personalizza il widget delle promozioni di Slope. Usa lo ', 'slope-widgets') . 'shortcode <strong>[slope-promotions]</strong> ' . esc_html__('per inserirlo dove vuoi!', 'slope-widgets') . '</p>';
    // Readonly options[uuid]
    echo '<p id="link-change-id">' . esc_html__('Per modificare il tuo ID struttura ', 'slope-widgets') . '<a href="?page=slope_reservations">' . esc_html__('clicca qui', 'slope-widgets') . '</a>.</p>';
    $uuid = ReservationsSettingsProvider::getEstablishmentId();
    echo "<table class='form-table'><tbody>
        <tr class='slope-setting-field'>
            <th scope='row'>" . esc_html__('ID struttura', 'slope-widgets') . "</th>
            <td>
                <input id='slope_promotions_uuid' name='slope_options[uuid]' size='40' disabled='disabled' value='" . esc_attr($uuid) . "' placeholder='" . esc_attr__('Il tuo Slope ID', 'slope-widgets') . "'>
            </td>
        </tr>";

    // Checkbox: slope_promotions_options[hide_description]
    $checkedHideDescription = PromotionsSettingProvider::isDescriptionHidden() ? ' checked="checked" ' : '';
    echo "<tr class='slope-setting-field'>
            <th scope='row'> " . esc_html__('Nascondi descrizione delle promozioni', 'slope-widgets') . " </th>
            <td>
                <input " . esc_attr($checkedHideDescription) . " id='slope_promotions_hide_description' name='slope_promotions_options[hide_description]' type='checkbox'>
            </td>
        </tr>";

    // Checkbox: slope_promotions_options[hide_information]
    $checkedHideInformation = PromotionsSettingProvider::isBookabilityInformationHidden() ? ' checked="checked" ' : '';
    echo "<tr class='slope-setting-field'>
            <th scope='row'> " . esc_html__('Nascondi informazioni delle promozioni', 'slope-widgets') . " </th>
            <td>
                <input " . esc_attr($checkedHideInformation) . "id='slope_promotions_hide_information' name='slope_promotions_options[hide_information]' type='checkbox'>
            </td>
        </tr>";

    // Checkbox: slope_promotions_options[book_target]
    $checkedBook = PromotionsSettingProvider::shouldOpenLinksOnANewTab() ? ' checked="checked" ' : '';
    echo "<tr class='slope-setting-field'>
            <th scope='row'>" . esc_html__('Apri il Booking Engine in una nuova scheda', 'slope-widgets') . " </th>
            <td>
                <input" . esc_attr($checkedBook) . " id='slope_promotions_open_new_tab' name='slope_promotions_options[book_target]' type='checkbox'>
            </td>
        </tr>";
    echo '</tbody></table></div>';

    // STYLE
    echo "<div class='slope-style-container-promotions'>";

    // CARD STYLE
    // Colorpicker: optionsPromotions[promotions_background_color]
    $cardBackgroundColor = PromotionsSettingProvider::getCardBackgroundColor();
    echo "<table class='form-table'><tbody>
        <tr><th colspan='2'><h1><b>" .esc_html__('SCHEDA', 'slope-widgets') ."</b></h1></th></tr>
        <tr class='slope-setting-field slope-style-field'>
            <th scope='row'>" . esc_html__('Colore dello sfondo', 'slope-widgets') . "</th>
            <td>
                <input name='slope_promotions_options[promotions_background_color]' type='text' data-role='slope-color-picker' value='" . esc_attr($cardBackgroundColor) . "'>
            </td>
        </tr>";

    // Range: optionsPromotions[promotions_border_size]
    $promotionsBorderSize = PromotionsSettingProvider::getCardBorderSize();
    echo "<tr class='slope-setting-field slope-style-field'>
        <th scope='row'>" . esc_html__('Spessore dei bordi', 'slope-widgets') . " (<input id='slope_text_border_size' readonly='text' class='slope_promotions_border_size' value='" . esc_attr($promotionsBorderSize) . "'/>px)
        <td>
            <input id='slope_promotions_border_size' min='0' max='6' name='slope_promotions_options[promotions_border_size]' type='range' class='promotions-border-size' value='" . esc_attr($promotionsBorderSize) . "' onchange='slope_text_border_size.value=value' />
        </td>
      </tr>";

    // Colorpicker: optionsPromotions[promotions_border_color]
    $cardBorderColor = PromotionsSettingProvider::getCardBorderColor();
    echo "<tr class='slope-setting-field slope-style-field'>
        <th scope='row'>" . esc_html__('Colore dei bordi', 'slope-widgets') . "</th>
        <td>
            <input name='slope_promotions_options[promotions_border_color]' type='text' data-role='slope-color-picker' value='" . esc_attr($cardBorderColor) . "'>
        </td>
      </tr>";

    // Range: optionsPromotions[border_radius]
    $promotionsBorderRadius = PromotionsSettingProvider::getCardBorderRadius();
    echo "<tr class='slope-setting-field slope-style-field'>
        <th scope='row'>" . esc_html__('Raggio dei bordi', 'slope-widgets') . " (<input id='slope_text_border_radius' readonly='readonly' class='slope_promotions_border_radius' value='" . esc_attr($promotionsBorderRadius) . "' />px)
        </th>
        <td>
            <input id='border_radius' min='0' max='40' name='slope_promotions_options[border_radius]' type='range' class='slope_promotions_border_radius' value='" . esc_attr($promotionsBorderRadius) . "' onchange='slope_text_border_radius.value=value' />
        </td>
      </tr>";

    // TITLE CARD STYLE
    // Colorpicker: optionsPromotions[promotions_title_color]
    $titleColor = PromotionsSettingProvider::getTitleColor();
    echo "<tr><th colspan='2'><h1><b>" .esc_html__('TITOLO', 'slope-widgets') ."</b></h1></th></tr>
        <tr class='slope-setting-field slope-style-field'>
        <th scope='row'>" . esc_html__('Colore del testo', 'slope-widgets') . "</th>
        <td>
            <input name='slope_promotions_options[promotions_title_color]' type='text' data-role='slope-color-picker' value='" . esc_attr($titleColor) . "'>
        </td>
      </tr>";

    // Range: optionsPromotions[title_size]
    $promotionsTitleSize = PromotionsSettingProvider::getTitleSize();
    echo "<tr class='slope-setting-field slope-style-field'>
        <th scope='row'>" . esc_html__('Dimensione del testo', 'slope-widgets') . " (<input id='slope_text_title_size' readonly='readonly' class='slope_promotions_title_size' value='" . esc_attr($promotionsTitleSize) . "' />px)
        </th>
        <td>
            <input id='title_size' min='0' max='35' name='slope_promotions_options[title_size]' type='range' class='slope_promotions_title_size' value='" . esc_attr($promotionsTitleSize) . "'  onchange='slope_text_title_size.value=value' />
        </td>
      </tr>";

    // Radio: optionsPromotion[title_weight]
    echo "<tr class='slope-style-field'>";
    $promotionsTitleWeight = PromotionsSettingProvider::getTitleWeight();
    $fontWeightLabels = [
        FontWeight::LIGHT => esc_html__('Leggero', 'slope-widgets'),
        FontWeight::REGULAR => esc_html__('Normale', 'slope-widgets'),
        FontWeight::MEDIUM => esc_html__('Medio', 'slope-widgets'),
        FontWeight::SEMIBOLD => esc_html__('Grassetto Leggero', 'slope-widgets'),
        FontWeight::BOLD => esc_html__('Grassetto', 'slope-widgets'),
    ];
    echo "<th>" . esc_html__('Peso del font', 'slope-widgets') . "<br><div class='slope-setting-field slope-radio-field'>";
    foreach ($fontWeightLabels as $weight => $label) {
        $checkedTitleWeight = ($promotionsTitleWeight == $weight) ? ' checked="checked" ' : '';
        echo "<label class='slope-radio-field'>
  " . esc_attr($label) . "
  <input " . esc_attr($checkedTitleWeight) . " value='" . esc_attr($weight) . "' name='slope_promotions_options[title_weight]' type='radio'>
</label>
<br>";
    }
    echo "</div></th></tr>";

    // Radio: optionsPromotions[align_title]
    echo "<tr class='slope-style-field'>";
    $promotionsAlignTitle = PromotionsSettingProvider::getTitleAlignment();
    $alignLabels = [
        TextAlignment::LEFT => esc_html__('Sinistra', 'slope-widgets'),
        TextAlignment::CENTER => esc_html__('Centro', 'slope-widgets'),
        TextAlignment::RIGHT => esc_html__('Destra', 'slope-widgets'),
    ];
    echo "<th>" . esc_html__('Allineamento del testo', 'slope-widgets') . "<br><div class='slope-setting-field slope-radio-field'>";
    foreach ($alignLabels as $alignPosition => $label) {
        $checkedAlign = ($promotionsAlignTitle == $alignPosition) ? ' checked="checked" ' : '';
        echo "<label class='slope-radio-field'>
  " . esc_attr($label) . "
  <input " . esc_attr($checkedAlign) . " value='" . esc_attr($alignPosition) . "' name='slope_promotions_options[align_title]' type='radio'>
</label>
<br>";
    }
    echo "</div></th></tr>";

    // BUTTON CARD STYLE
    // Colorpicker: optionsPromotions[promotions_button_background_color]
    $buttonBackgroundColor = PromotionsSettingProvider::getButtonBackgroundColor();
    echo "<tr><th colspan='2'><h1><b>" .esc_html__('PULSANTE', 'slope-widgets') ."</b></h1></th></tr>
        <tr class='slope-setting-field slope-style-field'>
        <th scope='row'>" . esc_html__('Colore di sfondo', 'slope-widgets') . "</th>
        <td>
            <input name='slope_promotions_options[promotions_button_background_color]' type='text' data-role='slope-color-picker' value='" . esc_attr($buttonBackgroundColor) . "'>
        </td>
      </tr>";

    // Colorpicker: optionsPromotions[promotions_button_text_color]
    $buttonTextColor = PromotionsSettingProvider::getButtonTextColor();
    echo "<tr class='slope-setting-field slope-style-field'>
        <th scope='row'>" . esc_html__('Colore del testo', 'slope-widgets') . "</th>
        <td>
            <input name='slope_promotions_options[promotions_button_text_color]' type='text' data-role='slope-color-picker' value='" . esc_attr($buttonTextColor) . "'>
        </td>
      </tr>";

    // Radio: optionsPromotions[button_weight]
    echo "<tr class='slope-setting-field slope-style-field'>";
    $promotionsButtonWeight = PromotionsSettingProvider::getButtonTextWeight();
    $fontWeightLabels = [
        FontWeight::LIGHT => esc_html__('Leggero', 'slope-widgets'),
        FontWeight::REGULAR => esc_html__('Normale', 'slope-widgets'),
        FontWeight::MEDIUM => esc_html__('Medio', 'slope-widgets'),
        FontWeight::SEMIBOLD => esc_html__('Grassetto Leggero', 'slope-widgets'),
        FontWeight::BOLD => esc_html__('Grassetto', 'slope-widgets'),
    ];
    echo "<th>" . esc_html__('Peso del font', 'slope-widgets') . "<br><div class='slope-setting-field slope-radio-field'>";
    foreach ($fontWeightLabels as $weight => $label) {
        $checkedButtonWeight = ($promotionsButtonWeight == $weight) ? ' checked="checked" ' : '';
        echo "<label class='slope-radio-field'>
  " . esc_attr($label) . "
  <input " . esc_attr($checkedButtonWeight) . " value='" . esc_attr($weight) . "' name='slope_promotions_options[button_weight]' type='radio'>
</label>
<br>";
    }
    echo "</div></th></tr>";

    // TEXT STYLE
    // Colorpicker: optionsPromotions[promotions_text_color]
    $textColor = PromotionsSettingProvider::getTextColor();
    echo "<tr><th colspan='2'><h1><b>" .esc_html__('TESTO', 'slope-widgets') ."</b></h1></th></tr>
        <tr class='slope-setting-field slope-style-field'>
        <th scope='row'>" . esc_html__('Colore del testo', 'slope-widgets') . "</th>
        <td>
            <input name='slope_promotions_options[promotions_text_color]' type='text' data-role='slope-color-picker' value='" . esc_attr($textColor) . "'>
        </td>
      </tr>";

    echo '</tbody></table></div>';

    // LAYOUT
    echo "<div class='slope-layout-container-promotions'>";

    // Radio: optionsPromotions[option_set]
    echo "<table class='form-table'><tbody>
        <tr class='slope-radio-field'>";
    $promotionsLayoutOption = PromotionsSettingProvider::getCardLayoutOption();
    $cardLayoutLabels = [
        CardLayout::ONE_COLUMN => esc_html__('1', 'slope-widgets'),
        CardLayout::THREE_COLUMNS => esc_html__('3', 'slope-widgets'),
    ];
    echo "<th>" . esc_html__('Numero di schede da mostrare per riga', 'slope-widgets') . "<br><div class='slope-setting-field slope-radio-field'>";
    foreach ($cardLayoutLabels as $layout => $label) {
        $checkedLayoutProm = ($promotionsLayoutOption == $layout) ? ' checked="checked" ' : '';
        echo "<label class='slope-radio-field'>
  " . esc_attr($label) . "
  <input " . esc_attr($checkedLayoutProm) . " value='" . esc_attr($layout) . "' name='slope_promotions_options[option_set]' type='radio'>
</label>
<br>";
    }
    echo "</div></th></tr>";
    echo '</tbody></table></div>';
}

// Shows the admin page of PROMOTIONS options
function slope_promotions_options_page() {
    ?>
    <div class="wrap">
        <h1 class="title-promotions">Slope Promotions</h1>
        <?php settings_errors(); ?>
        <form id="slope-widget-container" action="options.php" method="post">
            <h2 class="nav-tab-wrapper">
                <a id='setting_page_promotions_select' href='#' class='nav-tab nav-tab-active'
                   onclick='activate_page_setting_promotions()'>
                    <?php esc_attr_e('Impostazioni', 'slope-widgets') ?>
                </a>
                <a id='style_page_promotions_select' href='#' class='nav-tab' onclick='activate_page_style_promotions()'>
                    <?php esc_attr_e('Stile', 'slope-widgets') ?>
                </a>
                <a id='layout_page_promotions_select' href='#' class='nav-tab' onclick='activate_page_layout_promotions()'>
                    <?php esc_attr_e('Layout', 'slope-widgets') ?>
                </a>
            </h2>
            <?php settings_fields('slope_promotions_options'); ?>
            <?php do_settings_sections('slope_promotions_page'); ?>
            <p class="submit">
                <input name="Submit" type="submit" class="button-primary"
                       value="<?php esc_attr_e('Salva modifiche', 'slope-widgets'); ?>"/>
            </p>
        </form>
    </div>
    <?php
}

function slope_promotions_style() {
    $promotionsBgColor = PromotionsSettingProvider::getCardBackgroundColor();
    $promotionsBorderColor = PromotionsSettingProvider::getCardBorderColor();
    $promotionsBorderRadius = PromotionsSettingProvider::getCardBorderRadius();
    $promotionsBorderThickness = PromotionsSettingProvider::getCardBorderSize();
    $promotionsButtonBgColor = PromotionsSettingProvider::getButtonBackgroundColor();
    $promotionsButtonColor = PromotionsSettingProvider::getButtonTextColor();
    $promotionsButtonWeight = PromotionsSettingProvider::getButtonTextWeight();
    $promotionsColor = PromotionsSettingProvider::getTextColor();
    $promotionsTitleColor = PromotionsSettingProvider::getTitleColor();
    $promotionsTitleSize = PromotionsSettingProvider::getTitleSize();
    $promotionsTitleWeight = PromotionsSettingProvider::getTitleWeight();
    $promotionTitleAlign = PromotionsSettingProvider::getTitleAlignment();

    // NOTE: The following style is applied to the promotions HTML fragment that is injected into the page. Changes to
    // the CSS classes or HTML structure in the crs must be reflected here.
    ?>
    <style>
        .slp-column p,
        .slp td {
            color: <?php echo esc_attr($promotionsColor) ?> !important;
        }

        a.slp-button {
            background: <?php echo esc_attr($promotionsButtonBgColor) ?> !important;
            color: <?php echo esc_attr($promotionsButtonColor) ?> !important;
            font-weight: <?php echo esc_attr($promotionsButtonWeight) ?> !important;
        }

        p.slp-title {
            color: <?php echo esc_attr($promotionsTitleColor) ?> !important;
            font-size: <?php echo esc_attr($promotionsTitleSize) ?>px !important;
            font-weight: <?php echo esc_attr($promotionsTitleWeight) ?> !important;
            text-align: <?php echo esc_attr($promotionTitleAlign) ?> !important;
        }

        .slp-column {
            border: <?php echo esc_attr($promotionsBorderThickness) ?>px solid <?php echo esc_attr($promotionsBorderColor) ?> !important;
            background: <?php echo esc_attr($promotionsBgColor) ?> !important;
        }

        .slp-column,
        a.slp-button {
            border-radius: <?php echo esc_attr($promotionsBorderRadius) ?>px !important;
        }

        <?php if (PromotionsSettingProvider::isDescriptionHidden()) : ?>
        .slp-column .slp-title {
            display: block !important;
        }

        .slp-column p {
            display: none !important;
        }
        <?php endif; ?>

        <?php if (PromotionsSettingProvider::isBookabilityInformationHidden()) : ?>
        .slp td {
            display: none !important;
        }
        <?php endif; ?>
    </style>
    <?php
}

// Cards layout
function slope_promotions_layout_select() {
    $cardLayout = PromotionsSettingProvider::getCardLayoutOption();
    if ($cardLayout == CardLayout::ONE_COLUMN) {
        // .slp-column-4 is provided by the backend so we can't change its name, so even if it seems to indicate a column
        // width of 4, we actually change its style to display a layout with 1 or 3 columns.
        echo "<style> .slp-row .slp-column-4 {
            clear: both;
            max-width: 500px !important;
            margin-bottom: 2rem !important;
            width: 100% !important;
            margin-left: 1.6% !important;
          } </style>";
    } else if ($cardLayout == CardLayout::THREE_COLUMNS) {
        echo "<style> .slp-row .slp-column-4 {
            max-width: 500px !important;
            margin-bottom: 2rem !important;
            width: 30.3% !important;
            margin-left: 1.6% !important;
          } </style>";
    }
}
