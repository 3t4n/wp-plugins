<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class reviWidgetsClass
{
    var $wpdb;
    var $reviProductsModel;
    var $templateVars;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->reviProductsModel = new reviProductsModel();
        $this->templateVars = [];
    }

    public function loadReviWidget($widgetTypeName, $data_view = [], $idProduct = null)
    {
        // Without apik key, do not load widget
        if (empty(get_option('REVI_API_KEY'))) {
            return;
        }

        $hashId = get_option('REVI_WIDGET_' . $widgetTypeName);

        $this->templateVars = $data_view;
        $this->templateVars = array_merge($this->templateVars, [
            "hashId" => $hashId,
        ]);


        if ($idProduct) {
            if (REVI_PLUGIN_LANGUAGE == 'wpml') {
                $idProduct = $this->reviProductsModel->get_id_main_product($idProduct);
            }

            $productInfo = $this->reviProductsModel->getReviProduct($idProduct);
            if ($productInfo->num_reviews == 0 && get_option('REVI_DISPLAY_WIDGET_WITHOUT_REVIEWS') == 0) {
                return;
            }

            $productVars = [
                'idProduct' => $idProduct,
            ];

            $this->templateVars = array_merge($this->templateVars, $productVars);

            return $this->loadView('hook/widget-product.php', $this->templateVars);
        }

        return $this->loadView('hook/widget.php', $this->templateVars);
    }

    function loadView($template_name, $variables = [])
    {
        extract($variables);

        if (!empty($template_name)) {
            $templateArray = ['revi-io-customer-and-product-reviews/' . $template_name];
            if (!empty(locate_template($templateArray))) {
                $templateFile = locate_template($templateArray);
            } else {
                $templateFile = REVI_DIR . 'templates/' . $template_name;
            }

            ob_start();
            require($templateFile);
            return ob_get_clean();
        }
    }
}
