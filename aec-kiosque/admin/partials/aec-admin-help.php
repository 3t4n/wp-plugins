<div class="wrap aec-admin-wrap">

    <?php Aec_Admin_Settings::render_settings_page_header(AEC()->t('aec_section_title_help_center')) ?>

    <div class="aec-admin-container">
        <div class="aec-admin-container__title"><?php echo AEC()->t('aec_section_title_shortcode_documentation') ?></div>

        <h3>[aec_class_detail]</h3>
        <p>Allow to display a class detail</p>
        <div class="aec-shortcode-description">
            <ul class="aec-shortcode-description__list">
                <li><strong>registration-form-container-id</strong> : The id of a div that will serve as a container for
                    the panel with the registration button.
                </li>
            </ul>
            <p>For example : [aec_class_detail registration-form-container-id="registration-form-container"]
                <br/><br/><i>Note: If not provided the registration panel will be displayed right above the contact info
                    section.</i>
            </p>
        </div>

        <h3>[aec_events]</h3>
        <p>Allow to display events</p>
        <div class="aec-shortcode-description">
            <ul class="aec-shortcode-description__list">
                <li><strong>default-view-mode</strong> : The default view mode for the events (list, grid). Default is
                    list
                </li>
                <li><strong>etablishment-branch-id</strong> : Class etablishment center (Main Center, Other center...)
                </li>
                <li><strong>event-type</strong> : Event Type ID of event category to filter. Default is 0, meaning no
                    filtering
                </li>
            </ul>
            <p>For example : [aec_events default-view-mode="events-list-grid" etablishment-branch-id="1"
                event-type="3"]</p>
        </div>

        <h3>[aec_events_list]</h3>
        <p>Allow to display a list of events</p>
        <div class="aec-shortcode-description">
            <ul class="aec-shortcode-description__list">
                <li>
                    <strong>event-type</strong> : Event Type ID of event category to filter.
                </li>
            </ul>
            <p>For example : [aec_events_list event-type="3"]</p>
        </div>

        <h3>[aec_event_detail]</h3>
        <p>Allow to display one event</p>
        <div class="aec-shortcode-description">
            <ul class="aec-shortcode-description__list">
                <li>
                    <strong>event-id</strong> : The ID of the event to display. If not provided, the event ID will be
                    taken
                    from the URL parameter "idevent" if it exists.
                </li>
                <li>
                    <strong>image-width</strong> : The width of the image to display.
                </li>
            </ul>
            <p>For example : [aec_event_detail]</p>
        </div>

        <h3>[aec_next_events]</h3>
        <p>Allow to display next events on homepage</p>
        <div class="aec-shortcode-description">
            <ul class="aec-shortcode-description__list">
                <li>
                    <strong>event-type</strong> : Event Type ID of event category to filter.
                </li>
                <li><strong>quantity-column</strong> : The quantity of events blocks to display. Default is 2.</li>
            </ul>
            <p>For example : [aec_next_events event-type="3" quantity-column="3"]</p>
        </div>

        <h3>[aec_events_grid]</h3>
        <p>Allow to display next events for grid</p>
        <div class="aec-shortcode-description">
            <ul class="aec-shortcode-description__list">
                <li>
                    <strong>event-type</strong> : Event Type ID of event category to filter.
                </li>
                <li><strong>quantity-column</strong> : The quantity of events blocks to display. Default is 2.</li>
            </ul>
            <p>For example : [aec_events_grid quantity-column="3"]</p>
        </div>

        <h3>[aec_events_wide]</h3>
        <p>Allow to display events for wide</p>
        <div class="aec-shortcode-description">
            <ul class="aec-shortcode-description__list">
                <li>
                    <strong>event-type</strong> : Event Type ID of event category to filter.
                </li>
            </ul>
            <p>For example : [aec_events_wide]</p>
        </div>

        <h3>[aec_contact_map]</h3>
        <p>Allow to display a Google Map of etablishment centers. Addresses are taken from AEC centers configuration</p>
        <div class="aec-shortcode-description">
            <ul class="aec-shortcode-description__list">
                <li><strong>height</strong> : allows to set custom height for the map. (default is 500px)</li>

                <li>
                    <strong>class</strong> : allows to set custom class to the surrounding map div. (default => empty
                    string)
                </li>

                <li>
                    <strong>display-details</strong> : allows to set where to display address details or not. (default
                    => true)
                </li>

                <li>
                    <strong>etablishment-branch-id</strong> : Allows to select a certain etablishment branch by it\'s
                    ID. (Optional)
                </li>

            </ul>
            <p>For example : [aec_contact_map height="250" display-details="true"]</p>
        </div>

        <h3>[aec_private_tuition]</h3>
        <p>Allow to display a form to registers private classes.</p>
        <div class="aec-shortcode-description">
            <ul class="aec-shortcode-description__list">
                <li><strong>product-type-id</strong> : ID of the product type to display.</li>
            </ul>
            <p>For example, if you want to display a form to register private classes : [aec_private_tuition
                product-type-id="1"]</p>
        </div>

        <h3>[aec_courses_wizard]</h3>
        <p>Allow to display a wizard to register to a course.</p>
        <div class="aec-shortcode-description">
            <ul class="aec-shortcode-description__list">
                <li><strong>id-subject</strong> : Class subject (French, English...)</li>
                <li><strong>id-classification</strong> : Age bracket (Adults, Children...)</li>
                <li><strong>show-all-establishment</strong> : Show the courses for all the establishment branches
                    (Y, N)
                </li>
            </ul>
            <p>For example : [aec_courses_wizard]</p>
        </div>

        <h3>[aec_identify_panel]</h3>
        <p>Allow to display a panel with two tabs, one with a form to log in and another with a form to register.</p>
        <div class="aec-shortcode-description">
            <ul class="aec-shortcode-description__list">
                <li>
                    <strong>tag-active</strong> : The active tab when the panel is displayed. (Default: login) Accepts
                    login or register.
                </li>
            </ul>
            <p>For example : [aec_identify_panel tag-active="register"]</p>
        </div>

        <h3>[aec_student_login]</h3>
        <p>Allow to display the login form for students, so they can log in from the WP Site into their accounts.</p>
        <div class="aec-shortcode-description">
            <p>For example : [aec_student_login]</p>
        </div>

        <h3>[aec_student_register]</h3>
        <p>Allow to display the register form for students so they can register into the system or register some
            relatives from the WP Site into their accounts.</p>
        <div class="aec-shortcode-description">
            <ul class="aec-shortcode-description__list">
                <li><strong>is-for-front-desk-account</strong>: Enables a registration form that provides customers with
                    their client code at the end of the sign-up process. (Default: false)
                </li>
            </ul>
            <p>For example, if you want to show a registration form for students : [aec_student_register]</p>
        </div>

        <h3>[aec_student_account_dashboard]</h3>
        <p>Allow to display the account(personal info, billing info, relatives, signed up courses, ect...)
            information for a certain student, usually the logged in one.</p>
        <div class="aec-shortcode-description">
            <p>For example, if you want to show a the account information for the current logged in student:
                [aec_student_account]</p>
        </div>

        <h3>[aec_student_controls]</h3>
        <p>Allows to show the control buttons for the user to manage his/her account.</p>
        <div class="aec-shortcode-description">
            <ul class="aec-shortcode-description__list">
                <li><strong>hide-text</strong> : Hide the text of the buttons. (Default: false)</li>
            </ul>
            <p>For example, if you want to show the this web-app: [aec_student_controls]</p>
        </div>

        <h3>[aec_student_password_recover]</h3>
        <p>Allow to display the password recovery form for students.</p>
        <div class="aec-shortcode-description">
            <p>For example : [aec_student_password_recover]</p>
        </div>

        <h3>[aec_student_password_reset]</h3>
        <p>Allow to display the password reset form for students.</p>
        <div class="aec-shortcode-description">
            <p>For example : [aec_student_password_reset]</p>
        </div>

        <h3>[aec_student_password_update]</h3>
        <p>Allow to display the password update form for students.</p>
        <div class="aec-shortcode-description">
            <p>For example : [aec_student_password_update]</p>
        </div>

        <h3>[aec_products_view]</h3>
        <p>Allow to display a list for all products available.</p>
        <div class="aec-shortcode-description">
            <ul class="aec-shortcode-description__list">
                <li>
                    <strong>product-type</strong> : Tells the server to display all the products based on the
                    product type ID (Default: null)
                </li>

                <li>
                    <strong>etablishment-branch-id</strong>: This tells the web-app to show the products for a
                    certain etablishment branch if there are many etablishment branches available.
                </li>

                <li>
                    <strong>show-category-title</strong> : Enable or disable the product type title in the webapp
                    (Default: true)
                </li>
            </ul>
            <p>For example : [aec_products_view product-type="16"]</p>
        </div>

        <h3>[aec_donation_form]</h3>
        <p>Allow to display a donation form.</p>
        <div class="aec-shortcode-description">
            <p>For example : [aec_donation_form]</p>
        </div>

        <h3>[aec_donation_list]</h3>
        <p>Allow to display a donation list configured on AEC and a donation form.</p>
        <div class="aec-shortcode-description">
            <ul class="aec-shortcode-description__list">
                <li>
                    <strong>product-type-ids</strong> : ID of the donation type to display.
                </li>
                <li>
                    <strong>show-category-title</strong> : Enable or disable the product type title in the webapp
                    (Default: false)
                </li>
            </ul>
            <p>For example : [aec_donation_list]</p>
        </div>

        <h3>[aec_donation_form_free]</h3>
        <p>Allow to display a donation form with a free quantity input.</p>
        <div class="aec-shortcode-description">
            <ul class="aec-shortcode-description__list">
                <li>
                    <strong>product-type-id</strong> : ID of the donation type to display.
                </li>
            </ul>
            <p>For example : [aec_donation_form_free]</p>
        </div>

        <h3>[aec_classes_list]</h3>
        <p>Allow to display courses list from AEC. The list is filtered according to the following attributes.</p>
        <div class="aec-shortcode-description">
            <ul class="aec-shortcode-description__list">
                <li><strong>id-etablishment-branch</strong> : Class etablishment center (Main Center, Other
                    center...)
                </li>
                <li><strong>id-period</strong> : Class Period (Current Period, Previous Period...)</li>
                <li><strong>id-classification</strong> : Age bracket (Adults, Children...)</li>
                <li><strong>id-subject</strong> : Class subject (French, English...)</li>
                <li><strong>id-main-level</strong> : Class main level (A1, A2, B1, B2...)</li>
                <li><strong>id-class-type</strong> : Class type (Regular courses, Intensive courses, Workshop...)
                </li>
                <li><strong>level-id</strong> : Class level (Beginner, A1.1, Advanced...)</li>
                <li><strong>id-class-format</strong> : Class format (At home, Hybrid...)</li>
                <li><strong>location</strong> : Class localization (use ONLINE, INTRAMUROS or EXTRAMUROS)</li>
                <li><strong>show-all-establishment</strong> : Show the courses for all the establishment branches
                    (Y, N)
                </li>
            </ul>
            <p>For example, if you want to display only Adults Beginner classes and Adults age bracket is ID 3 in
                AEC, and Beginner Level is ID 12, you can use this shortcode : [aec_classes_list id-classification="3"
                id-level="12"]
                <br/><br/><i>Note : ID values can be found in AEC in configuration module > Lists. This is the
                    number on the right of the name of the list item.</i>
            </p>
        </div>

        <h3>[aec_courses_selection_tiles]</h3>
        <p>Allow to display a list of classes with some filters to go straight to the group of classes needed.</p>
        <div class="aec-shortcode-description">
            <ul class="aec-shortcode-description__list">
                <li>
                    <strong>etablishment-branch-id</strong>: This tells the web-app to show the classes for a
                    certain establishment branch if there are many establishment branches available. Default(0)
                </li>

                <li><strong>period-id</strong>: This is the period ID selected by default if needed. Default(0)
                </li>

                <li>
                    <strong>classification-id</strong>: This is the classification ID selected by default if
                    needed(Children, Adults,...). Default(0)
                </li>

                <li>
                    <strong>subject-id</strong>: This is the class type ID selected by default if needed(Teen
                    Classes, Workshops,...). Default(0)
                </li>

                <li>
                    <strong>main-level</strong>: This is the main level selected by default(A1, A2, B1,...).
                    Default(null)
                </li>

                <li>
                    <strong>class-type-id</strong>: This is the class type ID selected by default if needed(Teen
                    Classes, Workshops,...). Default(0)
                </li>

                <li>
                    <strong>levels-to-filter-by</strong>: Allow filter the classes by its levels IDs. You must send
                    this levels IDs in the following format = "12|28|63" for this to work correctly. Optional
                </li>

                <li>
                    <strong>localization</strong>: ID of Class localization (use ONLINE, INTRAMUROS or EXTRAMUROS).
                </li>

                <li>
                    <strong>class-format-id</strong>: ID of Class format (At home, Hybrid...)
                </li>

                <li>
                    <strong>show-filter-choices</strong>: This will set if the filter choices set by default must be
                    displayed as selection box. Default(true)
                </li>

                <li>
                    <strong>show-all-establishment</strong>: Show the courses for all the establishment branches
                    (Y, N)
                </li>
            </ul>
            <p>For example, if you want to show the web-app without any parameters to allow the user to filter
                before showing the list of classes: [aec_courses_selection_tiles]</p>
        </div>

        <h3>[aec_courses_catalog]</h3>
        <p>Allow to display a catalog of classes with filters to go straight to the group of classes needed,
            allowing to multi-select your filter selections.</p>
        <div class="aec-shortcode-description">
            <ul class="aec-shortcode-description__list">
                <li>
                    <strong>etablishment-branch-id</strong>: This tells the web-app to show the classes for a
                    certain etablishment branch if there are many etablishment branches available. Default(0)
                </li>

                <li>
                    <strong>period-id</strong>: This is the period ID selected by default if needed. Default(0)
                </li>

                <li>
                    <strong>classification-id</strong>: This is the classification ID selected by default if
                    needed(Children, Adults,...). Default(0)
                </li>

                <li>
                    <strong>subject-id</strong>: This is the class type ID selected by default if needed(Teen
                    Classes, Workshops,...). Default(0)
                </li>

                <li>
                    <strong>level-id</strong>: This is the class type ID selected by default if needed(Teen Classes,
                    Workshops,...). Default(0)
                </li>

                <li>
                    <strong>class-format-id</strong>: ID of Class format (At home, Hybrid...)
                </li>

                <li>
                    <strong>localization</strong>: ID of Class localization (use ONLINE, INTRAMUROS or EXTRAMUROS).
                </li>

                <li>
                    <strong>sidebar</strong>: This toggle the filter bar position, on top of the catalog or at it\'s
                    side. Default(false)
                </li>

                <li>
                    <strong>show-filter-choices</strong>: This will set if the filter choices set by default must be
                    displayed as selection box. Default(true)
                </li>

                <li>
                    <strong>show-all-establishment</strong>: Show the courses for all the establishment branches
                    (Y, N)
                </li>
            </ul>
            <p>For example, if you want to show the this web-app without any parameters to allow the user to filter
                before showing the list of classes: [aec_courses_catalog]</p>
        </div>

        <h3>[aec_classes_search_box]</h3>
        <p>Allow to display a search box with filters that will redirect to the course list you configure or the
            course list on your Kiosque.</p>
        <div class="aec-shortcode-description">
            <ul class="aec-shortcode-description__list">
                <li>
                    <strong>default-url</strong>: This will be the url that users will be redirected to when
                    clicking the search button. This url must make reference to a website page where there's at
                    least one of the course's list web-apps listed above. Default(none)
                </li>
            </ul>
            <p>For example, if you want to show the web-app without any parameters to allow the user to filter
                before showing the list of classes: [aec_classes_search_box]</p>
        </div>

        <h3>[aec_shopping_cart]</h3>
        <p>Allow to display the shopping cart of the user.</p>
        <div class="aec-shortcode-description">
            <p>For example, if you want to show the shopping cart of the user: [aec_shopping_cart]</p>
        </div>

        <h3>[aec_examination_type_list]</h3>
        <p>Allow to display a list of exams.</p>
        <div class="aec-shortcode-description">
            <ul>
                <li><strong>examination-type-ids</strong>: IDs of the examination type to display.</li>

                <li><strong>etablishment-branch-id</strong>: This tells the web-app to show the exams for a certain
                    establishment branch if there are many establishment branches available.
            </ul>

            <p>For example : [aec_examination_type_list examination-type-ids="1|3" etablishment-branch-id="1"]</p>
        </div>

        <h3>[aec_examination_type_detail]</h3>
        <p>Allow to display one exam.</p>
        <div class="aec-shortcode-description">
            <ul>
                <li><strong>examination-type-id</strong>: ID of the examination type to display.</li>

                <li><strong>etablishment-branch-id</strong>: This tells the web-app to show the exams for a certain
                    establishment branch if there are many establishment branches available.
            </ul>

            <p>For example : [aec_examination_type_detail examination-type-id="1" etablishment-branch-id="1"]</p>
        </div>

        <h3>[aec_examination_detail]</h3>
        <p>Allow to display the details of one exam.</p>
        <div class="aec-shortcode-description">
            <ul>
                <li><strong>examination-id</strong>: ID of the examination to display.</li>
            </ul>

            <p>For example : [aec_examination_detail]
                <br/><br/><i>Note: This shortcode is used to display the details of an exam from the exam list
                    page.</i>
            </p>
        </div>

        <h3>[aec_newsletter]</h3>
        <p>Allow to display the newsletter form.</p>
        <div class="aec-shortcode-description">
            <p>For example : [aec_newsletter]</p>
        </div>

        <h3>[aec_unsubscribe_newsletter]</h3>
        <p>Allow to display the unsubscribe newsletter form.</p>
        <div class="aec-shortcode-description">
            <p>For example : [aec_unsubscribe_newsletter]</p>
        </div>
    </div>
