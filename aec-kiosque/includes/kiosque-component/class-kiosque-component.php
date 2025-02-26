<?php

class KiosqueComponent
{
    /**
     * @var KiosqueElement $kiosqueElement
     */
    private $kiosqueElement;

    public function __construct(KiosqueElement $factory)
    {
        $this->kiosqueElement = $factory;
    }

    /**
     * @param array $shopping_cart_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        lang : string
     * }
     */
    public function getShoppingComponent(array $shopping_cart_attributes): string
    {
        $default_attributes = [
            "selector" => "cartForm",
            "module" => "cart",
            "action" => "cart-form"
        ];
        $attributes = array_merge($default_attributes, $shopping_cart_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $course_detail_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        registration-form-container-id: string
     *        lang : string
     * }
     */
    public function getCourseDetailComponent(array $course_detail_attributes): string
    {
        $default_attributes = [
            "selector" => "coursesDetail",
            "module" => "classes",
            "action" => "course-detail"
        ];
        $attributes = array_merge($default_attributes, $course_detail_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $course_catalog_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        show-all-establishment: string (Y | N)
     *        class-type-id: string
     *        classification-id: string
     *        subject-id: string
     *        period-id: string
     *        level-id: string
     *        main-level-id: string
     *        sidebar: string
     *        show-filter-choices: string
     *        class-location: string
     *        class-format-id: string
     *        learning-pace: string
     *        course-detail-page-url: string
     *        etablishment-branch-id: string
     *        lang: string
     *        show-loading: boolean
     * }
     */
    public function getCourseCatalogComponent(array $course_catalog_attributes): string
    {
        $default_attributes = [
            "selector" => "coursesCatalog",
            "module" => "classes",
            "action" => "courses-catalog"
        ];
        $attributes = array_merge($default_attributes, $course_catalog_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }


    /**
     * @param array $course_catalogue_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        course-detail-page-url: string
     *        etablishment-branch-id: string
     *        class-type-id: string
     *        classification-id: string
     *        subject-id: string
     *        period-id: string
     *        level-id: string
     *        main-level-id: string
     *        sidebar: string
     *        show-filter-choices: string
     *        class-location: string
     *        class-format-id: string
     *        show-all-establishment: string
     *        lang: string
     *        show-loading: boolean,
     * }
     */
    public function getCourseCatalogueComponent(array $course_catalogue_attributes): string
    {
        $default_attributes = [
            "selector" => "coursesCatalogue",
            "module" => "classes",
            "action" => "courses-catalogue"
        ];
        $attributes = array_merge($default_attributes, $course_catalogue_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }


    /**
     * @param array $course_list_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        id-etablishment-branch: string
     *        id-period: string
     *        id-classification: string
     *        id-subject: string
     *        id-main-level: string
     *        id-class-type: string
     *        level-id: string
     *        course-detail-page-url: string
     *        id-class-format: string
     *        location: string
     *        show-all-establishment: string
     *        lang: string
     *        show-loading: boolean
     * }
     */
    public function getCourseListComponent(array $course_list_attributes): string
    {
        $default_attributes = [
            "selector" => "classesList",
            "module" => "classes",
            "action" => "classes-list"
        ];
        $attributes = array_merge($default_attributes, $course_list_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $course_search_bar_attributes {
     *    selector: string
     *        module: string
     *        action: string
     *        default-url: string
     *        lang: string
     *        show-loading: boolean
     * }
     */
    public function getCourseSearchBarComponent(array $course_search_bar_attributes): string
    {
        $default_attributes = [
            "selector" => "coursesSearchBar",
            "module" => "classes",
            "action" => "courses-search-bar"
        ];
        $attributes = array_merge($default_attributes, $course_search_bar_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $course_selection_title_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        main-level: string
     *        levels-to-filter-by: string
     *        course-detail-page-url: string
     *        classification-id: string
     *        subject-id: string
     *        period-id: string
     *        etablishment-branch-id: string
     *        class-type-id: string
     *        class-format-id: string
     *        location: string
     *        show-all-establishment: string
     *        lang: string
     *        show-loading: boolean,
     * }
     */
    public function getCourseSelectionTilesComponent(array $course_selection_title_attributes): string
    {
        $default_attributes = [
            "selector" => "coursesSelectionTitles",
            "module" => "classes",
            "action" => "courses-selection-tiles"
        ];
        $attributes = array_merge($default_attributes, $course_selection_title_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $course_wizard_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        id-subject: string
     *        id-classification: string
     *        localization: string
     *        class-format-id: string
     *        show-all-establishment: string
     *        lang: string
     *        show-loading: boolean,
     * }
     */
    public function getCourseWizardComponent(array $course_wizard_attributes): string
    {
        $default_attributes = [
            "selector" => "coursesWizard",
            "module" => "classes",
            "action" => "courses-wizard"
        ];
        $attributes = array_merge($default_attributes, $course_wizard_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $donation_form_free_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        product-type-ids: string
     *        label-quote: string
     *        lang: string
     *        show-loading: boolean,
     * }
     */
    public function getDonationFormFreeComponent(array $donation_form_free_attributes): string
    {
        $default_attributes = [
            "selector" => "donationFreeForm",
            "module" => "donation",
            "action" => "free-form"
        ];
        $attributes = array_merge($default_attributes, $donation_form_free_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $donation_list_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        product-type-ids: string
     *        show-category-title: string
     *        lang: string
     *        show-loading: boolean,
     * }
     */
    public function getDonationListComponent(array $donation_list_attributes): string
    {
        $default_attributes = [
            "selector" => "donationList",
            "module" => "donation",
            "action" => "list"
        ];
        $attributes = array_merge($default_attributes, $donation_list_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $event_detail_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        event-id: string
     *        lang: string
     *        show-loading: boolean,
     * }
     */
    public function getEventDetailComponent(array $event_detail_attributes): string
    {
        $default_attributes = [
            "selector" => "eventView",
            "module" => "events",
            "action" => "event-view"
        ];
        $attributes = array_merge($default_attributes, $event_detail_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $event_list_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        default-view-mode: string
     *        event-type: string
     *        etablishment-branch-id: string
     *        event-url: string
     *        detail-link: string
     *        lang: string
     *        show-loading: boolean,
     * }
     */
    public function getEventListComponent(array $event_list_attributes): string
    {
        $default_attributes = [
            "selector" => "list",
            "module" => "events",
            "action" => "list"
        ];
        $attributes = array_merge($default_attributes, $event_list_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $events_list_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        event-type: string
     *        event-url: string
     *        etablishment-branch-id: string
     *        detail_link: string
     *        lang: string
     *        show-loading: boolean,
     * }
     */
    public function getEventsListComponent(array $events_list_attributes): string
    {
        $default_attributes = [
            "selector" => "eventsList",
            "module" => "events",
            "action" => "events-list"
        ];
        $attributes = array_merge($default_attributes, $events_list_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $event_list_grid_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        event-type: string
     *        quantity-column: number
     *        event-url: string
     *        etablishment-branch-id: string
     *        detail_link: string
     *        lang: string
     *        show-loading: boolean,
     * }
     */
    public function getEventListGridComponent(array $event_list_grid_attributes): string
    {
        $default_attributes = [
            "selector" => "eventsListGrid",
            "module" => "events",
            "action" => "events-list-grid"
        ];
        $attributes = array_merge($default_attributes, $event_list_grid_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $event_list_wide_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        event-type: string
     *        event-url: string
     *        etablishment-branch-id: string
     *        detail_link: string
     *        lang: string
     *        show-loading: boolean,
     * }
     */
    public function getEventListWideComponent(array $event_list_wide_attributes): string
    {
        $default_attributes = [
            "selector" => "eventsListWide",
            "module" => "events",
            "action" => "events-list-wide"
        ];
        $attributes = array_merge($default_attributes, $event_list_wide_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $next_event_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        event-type: string
     *        quantity-column: number
     *        event-url: string
     *        etablishment-branch-id: string
     *        detail_link: string
     *        amount-to-show: string
     *        lang: string
     *        show-loading: boolean,
     * }
     */
    public function getNextEventComponent(array $next_event_attributes): string
    {
        $default_attributes = [
            "selector" => "eventsNext",
            "module" => "events",
            "action" => "events-next"
        ];
        $attributes = array_merge($default_attributes, $next_event_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }


    /**
     * @param array $examination_detail_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        examination-id: string
     *        lang: string
     *        show-loading: boolean,
     * }
     */
    public function getExaminationDetailComponent(array $examination_detail_attributes): string
    {
        $default_attributes = [
            "selector" => "examinationDetail",
            "module" => "examination",
            "action" => "examination-detail"
        ];
        $attributes = array_merge($default_attributes, $examination_detail_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $examination_type_detail_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        examination-type-id: string
     *        etablishment-branch-id: string
     *        lang: string
     *        show-loading: boolean,
     * }
     */
    public function getExaminationTypeDetailComponent(array $examination_type_detail_attributes): string
    {
        $default_attributes = [
            "selector" => "examinationTypeDetail",
            "module" => "examination",
            "action" => "examination-type-detail"
        ];
        $attributes = array_merge($default_attributes, $examination_type_detail_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $examination_list_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        examination-type-ids: string
     *        etablishment-branch-id: string
     *        show-category-title: string
     *        lang: string
     *        show-loading: boolean,
     * }
     */
    public function getExaminationListComponent(array $examination_list_attributes): string
    {
        $default_attributes = [
            "selector" => "examinationList",
            "module" => "examination",
            "action" => "list"
        ];
        $attributes = array_merge($default_attributes, $examination_list_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $examination_type_list_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        examination-type-ids: string
     *        etablishment-branch-id: string
     *        lang: string
     *        show-loading: boolean,
     * }
     */
    public function getExaminationTypeListComponent(array $examination_type_list_attributes): string
    {
        $default_attributes = [
            "selector" => "examinationTypeList",
            "module" => "examination",
            "action" => "examination-type-list"
        ];
        $attributes = array_merge($default_attributes, $examination_type_list_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $newsletter_confirm_subscribe_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        redirect: string
     *        lang: string
     *        show-loading: boolean
     * }
     */
    public function getNewsLetterConfirmSubscribeComponent(array $newsletter_confirm_subscribe_attributes): string
    {
        $default_attributes = [
            "selector" => "confirmSubscribe",
            "module" => "newsletter",
            "action" => "confirm-subscribe"
        ];
        $attributes = array_merge($default_attributes, $newsletter_confirm_subscribe_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $newsletter_subscribe_form_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        lang: string
     *        show-loading: boolean
     * }
     */
    public function getNewsLetterSubscribeFormComponent(array $newsletter_subscribe_form_attributes): string
    {
        $default_attributes = [
            "selector" => "subscribeForm",
            "module" => "newsletter",
            "action" => "subscribe-form"
        ];
        $attributes = array_merge($default_attributes, $newsletter_subscribe_form_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $newsletter_unsubscribe_form_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        redirect: string
     *        email-to-unsubscribe: string
     *        lang: string
     *        show-loading: boolean
     * }
     */
    public function getNewsLetterUnsubscribeFormComponent(array $newsletter_unsubscribe_form_attributes): string
    {
        $default_attributes = [
            "selector" => "unsubscribeForm",
            "module" => "newsletter",
            "action" => "unsubscribe-form"
        ];
        $attributes = array_merge($default_attributes, $newsletter_unsubscribe_form_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $donation_free_form_attributes {
     *    selector : string
     *        module : string
     *        action : string
     *        lang: string
     *        show-loading: boolean
     * }
     */
    public function getDonationFormComponent(array $donation_free_form_attributes): string
    {
        $default_attributes = [
            "selector" => "donation_form",
            "module" => "products",
            "action" => "donation_form"
        ];
        $attributes = array_merge($default_attributes, $donation_free_form_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $show_product_attributes {
     *    selector: string
     *        module: string
     *        action: string
     *        product-type: string
     *        etablishment-branch-id: string
     *        show-category-title: string
     *        lang: string
     *        show-loading: boolean
     * }
     */
    public function getShowProductComponent(array $show_product_attributes): string
    {
        $default_attributes = [
            "selector" => "showProducts",
            "module" => "products",
            "action" => "show-products"
        ];
        $attributes = array_merge($default_attributes, $show_product_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $account_dashboard_attributes {
     *    selector: string
     *        module: string
     *        action: string
     *        register-class-url: string
     *        update-password-url: string
     *        account-creation-url: string
     *        lang: string
     *        show-loading: boolean
     * }
     */
    public function getAccountDashboardComponent(array $account_dashboard_attributes): string
    {
        $default_attributes = [
            "selector" => "accountDashboard",
            "module" => "student",
            "action" => "account-dashboard"
        ];
        $attributes = array_merge($default_attributes, $account_dashboard_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $students_controls_attributes {
     *        selector : string
     *        module : string
     *        action : string
     *        login-link : string
     *        register-link : string
     *        account-link : string
     *        logout-link : string
     *        my-cart-link : string
     *        is-wordpress-site : boolean
     *        modal-placement: string
     *        hide-text : boolean
     *        color : string
     *        hover-color : string
     *        lang : string
     * }
     */
    public function getStudentControlsComponent(array $students_controls_attributes): string
    {
        $default_attributes = [
            "selector" => "studentControl",
            "module" => "student",
            "action" => "student-controls",
            "is-wordpress-site" => "true"
        ];
        $attributes = array_merge($default_attributes, $students_controls_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $identity_panel_attributes {
     *    selector: string
     *        module: string
     *        action: string
     *        tag-active: string
     *        redirect: string
     *        reminder-url: string
     *        lang: string
     *        show-loading: boolean
     * }
     */
    public function getIdentityPanelComponent(array $identity_panel_attributes): string
    {
        $default_attributes = [
            "selector" => "identifyPanel",
            "module" => "student",
            "action" => "identify-panel"
        ];
        $attributes = array_merge($default_attributes, $identity_panel_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $student_courses_attributes {
     *    selector: string
     *        module: string
     *        action: string
     *        register-class-url: string
     *        lang: string
     *        show-loading: boolean
     * }
     */
    public function getStudentCoursesComponent(array $student_courses_attributes): string
    {
        $default_attributes = [
            "selector" => "studentCourses",
            "module" => "student",
            "action" => "student-courses"
        ];
        $attributes = array_merge($default_attributes, $student_courses_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $student_login_attributes {
     *    selector: string
     *        module: string
     *        action: string
     *        redirect-url: string
     *        reminder-url: string
     *        lang: string
     *        show-loading: boolean
     * }
     */
    public function getStudentLoginComponent(array $student_login_attributes): string
    {
        $default_attributes = [
            "selector" => "login",
            "module" => "student",
            "action" => "login"
        ];
        $attributes = array_merge($default_attributes, $student_login_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $student_password_recover_attributes {
     *    selector: string
     *        module: string
     *        action: string
     *        login-url: string
     *        lang: string
     *        show-loading: boolean
     * }
     */
    public function getStudentPasswordRecoverComponent(array $student_password_recover_attributes): string
    {
        $default_attributes = [
            "selector" => "reminder",
            "module" => "student",
            "action" => "reminder"
        ];
        $attributes = array_merge($default_attributes, $student_password_recover_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $student_password_reset_attributes {
     *    selector: string
     *        module: string
     *        action: string
     *        user-id: string
     *        hash-content: string
     *        login-url: string
     *        lang: string
     *        show-loading: boolean
     * }
     */
    public function getStudentPasswordResetComponent(array $student_password_reset_attributes): string
    {
        $default_attributes = [
            "selector" => "passwordReset",
            "module" => "student",
            "action" => "password-reset"
        ];
        $attributes = array_merge($default_attributes, $student_password_reset_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $student_password_update_attributes {
     *    selector: string
     *        module: string
     *        action: string
     *        student-id: string
     *        redirect-url: string
     *        lang: string
     *        show-loading: boolean
     * }
     */
    public function getStudentPasswordUpdateComponent(array $student_password_update_attributes): string
    {
        $default_attributes = [
            "selector" => "passwordUpdate",
            "module" => "student",
            "action" => "password-update"
        ];
        $attributes = array_merge($default_attributes, $student_password_update_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $student_register_attributes {
     *    selector: string
     *        module: string
     *        action: string
     *        redirect-url: string
     *        with-container: boolean
     *        lang: string
     *        show-loading: boolean
     * }
     */
    public function getStudentRegisterComponent(array $student_register_attributes): string
    {
        $default_attributes = [
            "selector" => "register",
            "module" => "student",
            "action" => "register"
        ];
        $attributes = array_merge($default_attributes, $student_register_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $display_contact_info_attributes {
     *    selector: string
     *        module: string
     *        action: string
     *        display-details: boolean
     *        etablishment-branch-id: string
     *        height: boolean
     *        lang: string
     *        show-loading: boolean
     * }
     */
    public function getDisplayContactInfoComponent(array $display_contact_info_attributes): string
    {
        $default_attributes = [
            "selector" => "displayContactInfo",
            "module" => "contact",
            "action" => "display-contact-info"
        ];
        $attributes = array_merge($default_attributes, $display_contact_info_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $private_tuition_attributes {
     *    selector: string
     *        module: string
     *        action: string
     *        product-type-id: string
     *        is-student-class-to-extend: boolean
     *        lang: string
     *        show-loading: boolean
     * }
     */
    public function getPrivateTuitionComponent(array $private_tuition_attributes): string
    {
        $default_attributes = [
            "selector" => "privateTuitionForm",
            "module" => "private-tuition",
            "action" => "showPrivateTuitionForm"
        ];
        $attributes = array_merge($default_attributes, $private_tuition_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

	/**
	 * @param array $attrs {
	 *    selector: string
	 *        module: string
	 *        action: string
	 *        product-type-id: string
	 *        lang: string
	 *        show-loading: boolean
	 * }
	 */
	public function getPrivateTuitionFormComponent(array $attrs): string
	{
		$default_attributes = [
			"selector" => "privateTuitionForm",
			"module" => "private-tuition",
			"action" => "private-tuition-form-webapp"
		];
		$attributes = array_merge($default_attributes, $attrs);

		return $this->kiosqueElement->createHtmlTag($attributes);
	}


    /**
     * @param array $select_class_attributes {
     *    selector: string
     *        module: string
     *        action: string
     *        id-subject: string
     *        id-classification: string
     *        lang: string
     *        show-loading: boolean
     * }
     */
    public function getSelectClassComponent(array $select_class_attributes): string
    {
        $default_attributes = [
            "selector" => "noAngularWebapp",
            "module" => "classes",
            "action" => "select-class"
        ];
        $attributes = array_merge($default_attributes, $select_class_attributes);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }

    /**
     * @param array $view_classes_with_filters {
     *    selector: string
     *        module: string
     *        action: string
     *        subject-id: string
     *        classification-id: string
     *        etablishmentBranch-id: string
     *        period-id: string
     *        classType-id: string
     *        main-level: string
     *        levels-to-filter-by: string
     *        class-types-to-filter-by: string
     *        show-etablishment-name-when-filtered: string
     *        show-filter-choices: string
     *        class-location: string
     *        course-detail-page-url: string
     *        lang: string
     *        show-loading: boolean
     * }
     */
    public function getViewClassesWithFilters(array $view_classes_with_filters): string
    {
        $default_attributes = [
            "selector" => "noAngularWebapp",
            "module" => "classes",
            "action" => "view-classes-with-filters"
        ];
        $attributes = array_merge($default_attributes, $view_classes_with_filters);

        return $this->kiosqueElement->createHtmlTag($attributes);
    }
}
