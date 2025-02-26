<?php

/**
 * The shortcodes of the plugin.
 *
 * @link       https://atl-software.net/
 * @since      1.0.0
 *
 * @package    Aec
 * @subpackage Aec/public
 */

require_once AEC_PATH . 'includes/class-kiosque-component-loader.php';

/**
 * The shortcodes of the plugin.
 *
 * Defines the plugin shortcodes.
 *
 * @package    Aec
 * @subpackage Aec/public
 * @author     ATL Software <support@atl-software.net>
 */
class Aec_Shortcodes
{

    /**
     * The AEC client instance name.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $client_instance The AEC client instance name.
     */
    private $client_instance;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $client_instance The AEC client instance name.
     * @since    1.0.0
     */
    public function __construct($client_instance)
    {

        $this->client_instance = $client_instance;

    }

    /**
     * Combine user attributes with known attributes and fill in defaults when needed. Also checks URL query string.
     *
     * @param $pairs array Entire list of supported attributes and their defaults.
     * @param $atts array User defined attributes in shortcode tag.
     * @return array
     */
    private function parse_atts($pairs, $atts)
    {
        $atts = (array)$atts;
        $out = array();
        foreach ($pairs as $name => $default) {
            if (array_key_exists($name, $atts)) {
                $out[$name] = $atts[$name];
            } else if (isset($_GET[$name])) {
                $out[$name] = sanitize_text_field($_GET[$name]);
            } else {
                $out[$name] = $default;
            }
        }

        if (!empty($atts)) {
            foreach ($atts as $name => $unknow_att) {
                if (!array_key_exists($name, $out)) {
                    $out[$name] = $unknow_att;
                }
            }
        }

        return $out;
    }

    /**
     * Get webapp components data parameters from shortcode attributes.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     */
    private function get_data_from_attributes($atts)
    {
        $atts = (array)$atts;
        $data = 'data-instance="' . $this->client_instance . '"';
        foreach ($atts as $key => $value) {
            $data .= ' data-param-' . str_replace('_', '-', $key) . '="' . do_shortcode(str_replace(['{', '}'], ['[', ']'], $value)) . '"';
        }
        return $data;
    }

    private function getComponentLoader($function, $attr)
    {
        $attr['lang'] = AEC()->get_locale();
        $componentLoader = (new KiosqueComponentLoader())->getKiosqueComponentLoader();
        return $componentLoader->$function($attr);
    }

    /**
     * Webapp AEC account creation form.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_account_creation($atts)
    {
        return $this->getComponentLoader('getStudentRegisterComponent', $atts);
    }

    /**
     * Webapp AEC events.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_events($atts)
    {
        return $this->getComponentLoader('getEventListComponent', $atts);
    }

    /**
     * Webapp AEC events list.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_events_list($atts)
    {
        $atts = $this->parse_atts([
            'detail_link' => '',
        ], $atts);

        $atts['event-url'] = $atts['detail_link'];

        return $this->getComponentLoader('getEventsListComponent', $atts);
    }

    /**
     * Webapp AEC next events.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_next_events($atts)
    {
        $atts = $this->parse_atts([
            'detail_link' => '',
            'quantity-column' => 3,
        ], $atts);

        $atts['event-url'] = $atts['detail_link'];

        return $this->getComponentLoader('getNextEventComponent', $atts);
    }

    /**
     * Webapp AEC event detail.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_event_detail($atts)
    {
        return $this->getComponentLoader('getEventDetailComponent', $atts);
    }

    /**
     * Webapp AEC events list grid.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_events_list_grid($atts)
    {
        $atts = $this->parse_atts([
            'detail_link' => '',
            'quantity-column' => 3,
        ], $atts);

        $atts['event-url'] = $atts['detail_link'];

        return $this->getComponentLoader('getEventListGridComponent', $atts);
    }

    /**
     * Webapp AEC events list wide.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_events_list_wide($atts)
    {
        $atts = $this->parse_atts([
            'detail_link' => '',
        ], $atts);

        $atts['event-url'] = $atts['detail_link'];

        return $this->getComponentLoader('getEventListWideComponent', $atts);
    }

    /**
     * Webapp AEC classes list.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.1.4
     */
    public function webapp_classes_list($atts)
    {
        return $this->getComponentLoader('getCourseListComponent', $atts);
    }

    /**
     * Webapp AEC course detail.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_class_detail($atts)
    {
        return $this->getComponentLoader('getCourseDetailComponent', $atts);
    }

    /**
     * Webapp AEC contact map.
     *
     * @param $atts
     * @return string
     * @since    1.0.0
     */
    public function webapp_contact_map($atts = [])
    {
        $atts = $this->parse_atts([
            'display-details' => 'true',
            'etablishment_id' => 0,
            'height' => 500
        ], $atts);

        $atts['etablishment-branch-id'] = $atts['etablishment_id'];
        $atts['height'] .= 'px';

        return $this->getComponentLoader('getDisplayContactInfoComponent', $atts);
    }

    /**
     * Webapp AEC private tuition form.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_private_tuition($atts)
    {
        $atts = $this->parse_atts([
            'product-type-id' => '',
        ], $atts);
        return $this->getComponentLoader('getPrivateTuitionComponent', $atts);
    }

    /**
     * Webapp AEC class selection.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_class_selection($atts)
    {
        return $this->getComponentLoader('getSelectClassComponent', $atts);
    }

    /**
     * Webapp AEC products list.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_products_list($atts)
    {
        return $this->getComponentLoader('getShowProductComponent', $atts);
    }

    /**
     * Webapp AEC donation form.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_donation_form($atts)
    {
        return $this->getComponentLoader('getDonationFormComponent', $atts);
    }

    /**
     * Webapp AEC donation form.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_donation_form_free($atts)
    {
        return $this->getComponentLoader('getDonationFormFreeComponent', $atts);
    }

    /**
     * Webapp AEC donation form list.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_donation_list($atts)
    {
        return $this->getComponentLoader('getDonationListComponent', $atts);
    }

    /**
     * Webapp AEC student login form.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_student_login($atts)
    {
        return $this->getComponentLoader('getStudentLoginComponent', $atts);
    }

    /**
     * Webapp AEC student password recover form.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.11
     */
    public function webapp_student_password_recover($atts)
    {
        return $this->getComponentLoader('getStudentPasswordRecoverComponent', $atts);
    }

    /**
     * Webapp AEC student password update form.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.1.6
     */
    public function webapp_student_password_update($atts)
    {
        return $this->getComponentLoader('getStudentPasswordUpdateComponent', $atts);
    }

    /**
     * Webapp AEC student password reset form.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.11
     */
    public function webapp_student_password_reset($atts)
    {
        return $this->getComponentLoader('getStudentPasswordResetComponent', $atts);
    }

    /**
     * Webapp AEC student registration form.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_student_register($atts)
    {
        return $this->getComponentLoader('getStudentRegisterComponent', $atts);
    }

    /**
     * Webapp AEC student account.
     *
     * @return string
     * @since    1.0.0
     */
    public function webapp_student_account()
    {
        return '<div class="arc-en-ciel"><div class="loading" data-module="student" data-show-loading="true" data-action="accountInformation" data-param-lang="' . AEC()->get_locale() . '"></div></div>';
    }

    /**
     * Webapp AEC student account dashboard.
     *
     * @return string
     * @since    1.0.0
     */
    public function webapp_student_account_dashboard($atts)
    {
        return $this->getComponentLoader('getAccountDashboardComponent', $atts);
    }

    /**
     * Webapp AEC student controls.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_student_controls($atts)
    {
        $atts = $this->parse_atts([
            'is-wordpress-site' => '',
            'login-link' => '',
            'register-link' => '',
            'account-link' => '',
            'logout-link' => '',
            'my-cart-link' => '',
        ], $atts);

        return $this->getComponentLoader('getStudentControlsComponent', $atts);
    }

    /**
     * Webapp AEC classes catalog.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_classes_catalog($atts)
    {
        $atts = $this->parse_atts([
            'etablishment-branch-id' => '',
            'period-id' => '',
            'classification-id' => '',
            'subject-id' => '',
            'class-type-id' => '',
            'level-id' => '',
            'sidebar' => '',
            'show-filter-choices' => '',
        ], $atts);

        return $this->getComponentLoader('getCourseCatalogueComponent', $atts);
    }

    /**
     * Webapp AEC classes catalog with filter.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_classes_catalog_with_filter($atts)
    {
        $atts = $this->parse_atts([
            'etablishment-branch-id' => '',
            'period-id' => '',
            'classification-id' => '',
            'subject-id' => '',
            'class-type-id' => '',
            'level-id' => '',
            'sidebar' => '',
            'show-filter-choices' => '',
        ], $atts);

        return '<div class="arc-en-ciel"><div class="loading" data-module="classes" data-action="courses-catalogue-with-filters" data-show-loading="true" ' . $this->get_data_from_attributes($atts) . '  data-param-lang="' . AEC()->get_locale() . '"></div></div>';
    }

    /**
     * Webapp AEC courses search bar.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_classes_search_box($atts)
    {
        if (isset($atts['url-configuration'])) {
            $atts['url-configuration'] = htmlentities(trim($atts['url-configuration']));
        }

        return $this->getComponentLoader('getCourseSearchBarComponent', $atts);
    }

    /**
     * Webapp AEC student account.
     *
     * @return string
     * @since    1.0.4
     */
    public function webapp_shopping_cart()
    {
        return $this->getComponentLoader('getShoppingComponent', []);
    }

    /**
     * Webapp AEC examination list.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.4
     */
    public function webapp_examination_list($atts)
    {
        $atts = $this->parse_atts([
            'examination-type-ids' => '',
            'show-category-title' => '',
        ], $atts);

        return $this->getComponentLoader('getExaminationListComponent', $atts);
    }

    /**
     * Webapp AEC examination type list.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.4
     */
    public function webapp_examination_type_list($atts)
    {
        $atts = $this->parse_atts([
            'examination-type-ids' => '',
            'etablishment-branch-id' => ''
        ], $atts);

        return $this->getComponentLoader('getExaminationTypeListComponent', $atts);
    }

    /**
     * Webapp AEC examination type detail.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.4
     */
    public function webapp_examination_type_detail($atts)
    {
        $atts = $this->parse_atts([
            'examination-type-id' => '',
            'etablishment-branch-id' => ''
        ], $atts);

        return $this->getComponentLoader('getExaminationTypeDetailComponent', $atts);
    }

    /**
     * Webapp AEC examination detail.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.4
     */
    public function webapp_examination_detail($atts)
    {
        $atts = $this->parse_atts(['examination-id' => ''], $atts);

        return $this->getComponentLoader('getExaminationDetailComponent', $atts);
    }

    /**
     * Webapp AEC Identify Panel.
     *
     * @return string
     * @since    1.0.0
     */
    public function webapp_identify_panel($atts)
    {
        return $this->getComponentLoader('getIdentityPanelComponent', $atts);
    }

    /**
     * Webapp AEC courses catalog.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_courses_catalog($atts)
    {
        $atts = $this->parse_atts([
            'etablishment-branch-id' => '',
            'period-id' => '',
            'classification-id' => '',
            'subject-id' => '',
            'class-type-id' => '',
            'level-id' => '',
            'sidebar' => '',
            'class-format-id' => '',
            'localization' => '',
            'show-filter-choices' => '',
        ], $atts);

        return $this->getComponentLoader('getCourseCatalogComponent', $atts);
    }

    /**
     * Webapp AEC courses selection tiles.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_courses_selection_tiles($atts)
    {
        $atts = $this->parse_atts([
            'etablishment-branch-id' => '',
            'period-id' => '',
            'classification-id' => '',
            'subject-id' => '',
            'class-type-id' => '',
            'main-level' => '',
            'levels-to-filter-by' => '',
            'localization' => '',
            'class-format-id' => '',
            'show-filter-choices' => true,
        ], $atts);

        return $this->getComponentLoader('getCourseSelectionTilesComponent', $atts);
    }

    /**
     * Webapp AEC courses wizard.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.0
     */
    public function webapp_courses_wizard($atts)
    {

        $atts = $this->parse_atts([
            'id-subject' => '',
            'id-classification' => '',
        ], $atts);
        return $this->getComponentLoader('getCourseWizardComponent', $atts);
    }


    /**
     * Webapp AEC Newsletter.
     *
     * @return string
     * @since    1.0.4
     */
    public function webapp_newsletter()
    {
        return $this->getComponentLoader('getNewsLetterSubscribeFormComponent', []);
    }

    /**
     * Webapp AEC Unsubscribe Newsletter.
     *
     * @param $atts array User defined attributes in shortcode tag.
     * @return string
     * @since    1.0.4
     */
    public function webapp_unsubscribe_newsletter($atts)
    {
        $atts = $this->parse_atts([
            'redirect' => ''
        ], $atts);

        return $this->getComponentLoader('getNewsLetterUnsubscribeFormComponent', $atts);
    }

	/**
	 * Webapp AEC Private Tuition Form (new visualization).
	 *
	 * @param $attrs array User defined attributes in shortcode tag.
	 * @return string
	 * @since    1.0.0
	 */
	public function webapp_private_tuition_form( array $attrs ): string
	{
		$attrs = $this->parse_atts( [
			'product-type-id' => '',
		], $attrs );

		return $this->getComponentLoader( 'getPrivateTuitionFormComponent', $attrs );
	}
}
