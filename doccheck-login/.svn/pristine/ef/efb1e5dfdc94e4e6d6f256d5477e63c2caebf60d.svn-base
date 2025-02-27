<?php

namespace DCL\Admin;

/**
 * Admin: metaboxes.
 *
 * Defines metabox with checkbox to restrict
 * access on posts and pages.
 *
 * @package    DCL\Admin
 * @author     antwerpes ag <opensource@antwerpes.com>
 */
class DCL_Metaboxes extends DCL_Admin
{


    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Ga_Datalayer_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Ga_Datalayer_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/chosen.min.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Ga_Datalayer_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Ga_Datalayer_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/chosen.jquery.min.js', array('jquery'), $this->version, false);

    }

    /**
     * Register meta box.
     *
     * @since   1.0.0
     * @access  public
     */
    public function dcl_register_meta_boxes()
    {
        add_meta_box(
            'dcl_restrict_access',
            esc_html__('DocCheck Login', 'doccheck-login'),
            [$this, 'dcl_display_meta_box_restrict_access'],
            ['post', 'page'],
            'side'
        );
    }

    public function dcl_register_meta_boxes_custom_post_type()
    {
        $screens = get_post_types();
        foreach ($screens as $screen) {
            add_meta_box(
                'dcl_restrict_access',
                esc_html__('DocCheck Login', 'doccheck-login'),
                [$this, 'dcl_display_meta_box_restrict_access'],
                $screen,
                'side'
            );
        }

    }


    /**
     * Meta box display callback.
     *
     * @since   1.0.0
     * @access  public
     */
    public function dcl_display_meta_box_restrict_access()
    {
        global $post;


        $select_box = $this->dcl_get_occupational_group();

        if (get_option('dcl_general_profession_routing_active')) {

            if (get_post_meta(get_the_ID(), 'dcl_group_routing', true) == '' && get_post_meta(get_the_ID(), 'dcl_restrict_access', true) == 'on') {
                update_post_meta(get_the_ID(), 'dcl_all_group', 'on');
            }
            $access_restricted = get_post_meta($post->ID, 'dcl_restrict_access', true);
            $dcl_all_group = get_post_meta($post->ID, 'dcl_all_group', true);

            if ((!$access_restricted || $dcl_all_group)) {
                update_post_meta(get_the_ID(), 'dcl_group_routing', '');
            }
        } else {
            update_post_meta(get_the_ID(), 'dcl_group_routing', '');
            update_post_meta(get_the_ID(), 'dcl_all_group', '');
        }
        $dcl_group_routing = get_post_meta(get_the_ID(), 'dcl_group_routing', true);

        ?>
        <div>
            <label>
                <input type="checkbox"
                       id="dcl_restrict_access"
                       class="<?php echo esc_attr(get_post_meta($post->ID, 'dcl_all_group', true)); ?>"
                       name="dcl_restrict_access"
                    <?php checked(esc_attr(get_post_meta(get_the_ID(), 'dcl_restrict_access', true)), 'on', true); ?>
                       onclick="toggleCheckboxes(this)"/>
                <?php esc_html_e('Restrict access with login', 'doccheck-login'); ?>
            </label>
            <script>

                function toggleCheckboxes(elem) {
                    if (document.getElementById("dcl_all_group")) {
                        if (elem.checked === true) {
                            document.getElementById("dcl_all_group").checked = true;
                            document.getElementById('dcl_all_group_wrapper').style.display = 'block';
                        } else {
                            document.getElementById("dcl_all_group").checked = false;
                            document.getElementById('dcl_all_group_wrapper').style.display = 'none';
                            document.getElementById('dcl_group_routing_wrapper').style.display = 'none';
                        }
                    }
                }

            </script>
        </div>
        <?php if (get_option('dcl_general_profession_routing_active')) : ?>
        <div style="margin-top: 10px; <?php echo !$access_restricted ? ' display: none;' : '' ?>"
             id="dcl_all_group_wrapper">
            <label>
                <input type="checkbox"
                       id="dcl_all_group"
                       name="dcl_all_group"
                    <?php checked(esc_attr(get_post_meta(get_the_ID(), 'dcl_all_group', true)), 'on', true); ?>
                       onclick="toggleSelectbox(this)"/>
                <?php esc_html_e('All approved professions', 'doccheck-login'); ?>
            </label>
        </div>
        <div style="margin-top: 10px; margin-bottom: 20px;<?php echo !$access_restricted || $dcl_all_group ? ' display: none;' : '' ?>"
             id="dcl_group_routing_wrapper">
            <?php esc_html_e('Please select a profession', 'doccheck-login'); ?>

            <select name="dcl_group_routing[]" id="dcl_group_routing"
                    data-placeholder="<?php esc_html_e('Please select a profession', 'doccheck-login'); ?>"
                    multiple class="chosen-select">
                <?php foreach ($select_box as $option_key => $option_value) : ?>

                    <option value="<?php echo esc_attr($option_key) ?>" <?php echo is_array($dcl_group_routing) && in_array($option_key, $dcl_group_routing) ? 'selected="selected"' : ''; ?>><?php
                        echo esc_html($option_value)
                        ?></option>
                <?php endforeach; ?>
            </select>
            <script>
                jQuery(".chosen-select").chosen({width: "100%"});


                function toggleSelectbox(elem) {

                    if (elem.checked === false) {

                        document.getElementById('dcl_group_routing_wrapper').style.display = 'block';

                    } else {
                        document.getElementById('dcl_group_routing_wrapper').style.display = 'none';
                    }

                }

            </script>


        </div>
        <?php wp_nonce_field('dcl_all_group', 'dcl_all_group_nonce'); ?>
        <?php wp_nonce_field('dcl_group_routing', 'dcl_group_routing_nonce'); ?>
    <?php endif; ?>

        <?php wp_nonce_field('dcl_restrict_access', 'dcl_restrict_access_nonce'); ?>
    <?php }

    /**
     * Save meta box content.
     *
     * @param  $request
     *
     * @since   1.1.3
     * @access  public
     */

    public function dcl_sanitize_request($request)
    {
        // Check if the array is set in $_POST
        if (isset($request) && is_array($request)) {
            // Initialize an empty array to store sanitized values
            $sanitized_array = array();

            // Loop through each element in the array
            foreach ($request as $key => $value) {
                // Step 1: Validation (example: check if it's a number)
                if (is_numeric($value)) {
                    // Step 2: Sanitization (example: convert to integer)
                    $sanitized_value = intval($value);

                    // Step 3: Escaping (example: if echoing in an HTML attribute)
                    $escaped_value = esc_attr($sanitized_value);

                    // Add the sanitized and escaped value to the new array
                    $sanitized_array[$key] = $escaped_value;
                }
            }
            return $sanitized_array;
            // Now $sanitized_array contains the sanitized and escaped values
        }
        return sanitize_text_field(wp_unslash($request));
    }


    /**
     * Save meta box content.
     *
     * @param int $post_id Post ID
     *
     * @since   1.0.0
     * @access  public
     */

    public function dcl_save_meta_boxes($post_id)
    {
        $options = [
            'dcl_restrict_access',
            'dcl_all_group',
            'dcl_group_routing'
        ];

        foreach ($options as $option) {
            $nonce = $option . '_nonce';

            if ($this->dcl_user_can_save($post_id, $nonce, $option)) {

                if (isset($_POST[$option])) {

                    $post_option = $this->dcl_sanitize_request($_POST[$option]);

                    update_post_meta($post_id, $option, $post_option);
                } else {
                    // If the option is not set in the POST data, delete the post meta
                    delete_post_meta($post_id, $option);
                }
            }
        }
    }

    /**
     * Verifies that the user who is currently logged in has permission to save the data
     * from the meta box to the database.
     *
     * @param integer $post_id The current post being saved.
     * @param string $nonce The number used once to identify the serialization value
     * @param string $action The source of the action of the nonce being used
     *
     * @return  boolean True if the user can save the information
     * @since   1.0.0
     * @access  private
     */
    private function dcl_user_can_save($post_id, $nonce, $action)
    {
        // Sanitize and validate post ID
        $post_id = absint($post_id);
        // Sanitize and validate action
        $action = sanitize_key($action);
        $is_autosave = wp_is_post_autosave($post_id);
        $is_revision = wp_is_post_revision($post_id);
        $is_valid_nonce = (isset($_POST[$nonce]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST[$nonce])), $action));

        return !($is_autosave || $is_revision) && $is_valid_nonce;
    }


    /**
     * Request access token from oauth service.
     *
     *
     * @return array|mixed|object
     * @since   1.0.0
     */
    private function dcl_get_occupational_group()
    {

        $dcl_form_occupational_groups_en = [
            '' => 'Please choose a professional group',
            '19' => 'Alternative / Non-medical practitioner',
            '24' => 'Bio technican | Medical technican',
            '17' => 'Biochemist',
            '45' => 'Biological / Chemical / Physical technical assistant',
            '14' => 'Biologist',
            '100112' => 'Biomedical Scientist',
            '100108' => 'Biomedical Scientist',
            '1005' => 'Business/ Management/ Economy',
            '15' => 'Chemist',
            '73' => 'Children\'s nurse',
            '69' => 'Chiropractic',
            '100099' => 'Clinical trial assistant',
            '59' => 'Company Password',
            '66' => 'Dental assistant',
            '99116' => 'Dental care profession (other)',
            '100119' => 'Dental care profession (other)',
            '70' => 'Dental hygienist',
            '65' => 'Dental technician / Mechanic',
            '4' => 'Dentist',
            '67' => 'Diabetes Advisor',
            '39' => 'Dietetic Assistant',
            '5016' => 'Dietician',
            '100238' => 'DocCheck Blogger',
            '99999' => 'DocCheck Team',
            '10' => 'Doctor\'s Receptionist/ Assistant',
            '68' => 'Druggist (CH)',
            '35' => 'Emergency medical technician [EMT]',
            '34' => 'Emergency Paramedic',
            '99998' => 'Employee DocCheck Shop',
            '100113' => 'Epidemiologist',
            '18' => 'Ergotherapist',
            '11' => 'Geriatric nurse',
            '3002' => 'Health economist',
            '5007' => 'Health official',
            '100040' => 'Hearing Care Professional',
            '104' => 'Industry employee',
            '38' => 'Insurance Company Employee',
            '1003' => 'Intern pharmacist',
            '5100' => 'Journalist',
            '42' => 'Lawyer',
            '13' => 'Librarian',
            '36' => 'Management Consultant',
            '30' => 'Medical advertising agency employee',
            '100115' => 'Medical Assistant (other)',
            '99110' => 'Medical Assistant (other)',
            '46' => 'Medical dealer',
            '41' => 'Medical documentalist',
            '100098' => 'Medical educator',
            '100109' => 'Medical Engineer',
            '100114' => 'Medical Engineer',
            '22' => 'Medical information scientist',
            '23' => 'Medical journalist',
            '28' => 'Medical laboratory assistant',
            '2004' => 'Medical laboratory scientist (MLS)',
            '5014' => 'Medical laboratory scientist radiology',
            '5019' => 'Medical Photographer / Designer',
            '16' => 'Medical physicist',
            '20' => 'Midwife',
            '9999' => 'Non-medical professions',
            '21' => 'Nurse / Hospital nurse',
            '75' => 'Nurse anesthetist',
            '3010' => 'Nurse without degree',
            '58' => 'Nursing and care management with diploma',
            '2003' => 'Nursing Home Manager',
            '99112' => 'Nursing profession (other)',
            '100116' => 'Nursing profession (other)',
            '5018' => 'Nursing scientist',
            '100100' => 'Nursing teacher/ educationist',
            '100097' => 'Nutrition consultant',
            '53' => 'Optician / Orthoptist',
            '72' => 'Orderly / Ward assistant / Nurse assistant',
            '71' => 'Orthoptics',
            '37' => 'Other medical professions',
            '1008' => 'Other (non-medical profession)',
            '10000' => 'Patient',
            '2005' => 'Pharmaceutical Assistant',
            '99113' => 'Pharmaceutical profession (other)',
            '100096' => 'Pharmaceutical sales representative',
            '26' => 'Pharmaceutical-Commercial employee',
            '25' => 'Pharmaceutical-technical assistant',
            '2' => 'Pharmacist',
            '1002' => 'Pharmacist (employee)',
            '27' => 'Pharmacy engineer',
            '1001' => 'Pharmacy owner',
            '12' => 'Pharmacy technician',
            '1004' => 'Physical scientist',
            '1' => 'Physician',
            '100111' => 'Physician Assistant',
            '100107' => 'Physician Assistant',
            '33' => 'Physiotherapist',
            '100101' => 'Physiotherapist for animals',
            '3006' => 'Podiatrist',
            '5013' => 'Psychiatric nurse / Mental health nurse',
            '57' => 'Psychological technical assistant',
            '31' => 'Psychologist',
            '5020' => 'Psychomotoric therapist',
            '32' => 'Psychotherapist',
            '29' => 'Publishing Company Employee',
            '3004' => 'Radiology assistant',
            '1006' => 'Scholar',
            '63' => 'Speech therapist',
            '5' => 'Student',
            '54' => 'Student of animal health',
            '106' => 'Student of dentistry',
            '105' => 'Student of human medicine',
            '56' => 'Student of pharmacy',
            '100073' => 'Student: Other study courses',
            '76' => 'Surgical nurse',
            '5021' => 'Surgical technician assistant',
            '1007' => 'Technician',
            '99114' => 'Therapist (other)',
            '100117' => 'Therapist (other)',
            '44' => 'Toxicologist',
            '3' => 'Veterinary',
            '5010' => 'Veterinary healer',
            '100118' => 'Veterinary profession (other)',
            '99115' => 'Veterinary profession (other)',
            '5017' => 'Veterinary\'s assistant'
        ];


        $dcl_form_occupational_groups_de = [
            '' => 'Bitte w&#228;hlen Sie eine Berufsgruppe',
            '11' => 'Altenpfleger/in',
            '75' => 'An&#228;sthesiepfleger/in',
            '1002' => 'Angestellte/r Apotheker/in',
            '42' => 'Anwalt',
            '12' => 'Apothekenhelfer/in',
            '2' => 'Apotheker/in',
            '1' => 'Arzt | &#196;rztin',
            '100107' => 'Arztassistent/in',
            '100111' => 'Arztassistent/in (Physician Assistant)',
            '53' => 'Augenoptiker/in | Orthoptist/in',
            '5007' => 'Beamter im Gesundheitswesen',
            '13' => 'Bibliothekar',
            '17' => 'Biochemiker/in | Pharmakologe/in | Toxikologe/in',
            '14' => 'Biologe',
            '1004' => 'Biologe/in | Chemiker/in | Naturwissenschaftler/in',
            '2004' => 'Biologie-Laborant/in | Chemie-Laborant/in',
            '45' => 'Biologisch- | Chemisch- | Physikalisch-technische/r Assistent/in',
            '100112' => 'Biomediziner/in',
            '100108' => 'Biomediziner/in',
            '24' => 'Biotechniker/in | Medizintechniker/in',
            '15' => 'Chemiker',
            '69' => 'Chiropraktiker/in | Osteopath/in',
            '70' => 'Dentalhygieniker',
            '67' => 'Diabetesberater/in',
            '39' => 'Di&#228;tassistent/in',
            '100238' => 'DocCheck Blogger',
            '99998' => 'DocCheck Shop Team',
            '99999' => 'DocCheck Team',
            '68' => 'Drogist/in (CH)',
            '100113' => 'Epidemiologe/in',
            '18' => 'Ergotherapeut/in',
            '100097' => 'Ern&#228;hrungsberater/in',
            '5016' => 'Ern&#228;hrungswissenschaftler/in | &#214;kotrophologe/in',
            '59' => 'Firmenpasswort',
            '1006' => 'Geisteswissenschaftler/in',
            '73' => 'Gesundheits- und Kinderkrankenpfleger/in',
            '21' => 'Gesundheits- und Krankenpfleger/in',
            '3002' => 'Gesundheits&#246;konom/in | Gesundheitsmanager/in | Gesundheitswissenschaftler/in',
            '20' => 'Hebamme | Entbindungspfleger',
            '19' => 'Heilpraktiker/in',
            '100040' => 'H&#246;rakustiker/in',
            '5100' => 'Journalist',
            '100099' => 'Klinischer Monitor | Mitarbeiter/in klinische Studien',
            '72' => 'Krankenpflegehelfer',
            '3010' => 'Krankenpfleger ohne Abschluss',
            '5013' => 'Krankenpfleger/in Psychiatrie',
            '63' => 'Logop&#228;de/in | Sprachtherapeut/in',
            '5019' => 'Medizinfotograf/in | Designer/in',
            '22' => 'Medizininformatiker/in',
            '100114' => 'Mediziningenieur/in',
            '100109' => 'Mediziningenieur/in',
            '99110' => 'Medizinische(r)      Assistent/in (sonstige)',
            '100115' => 'Medizinische/r Assistent/in (sonstige)',
            '41' => 'Medizinische/r Dokumentar/in',
            '10' => 'Medizinische/r Fachangestellte/r',
            '46' => 'Medizinische/r Fachh&#228;ndler/in (Arzneimittel)',
            '28' => 'Medizinisch-technische/r Assistent/in',
            '5014' => 'Medizinisch-technischer Radiologieassistent',
            '23' => 'Medizinjournalist/in',
            '100098' => 'Medizinp&#228;dagoge/in',
            '16' => 'Medizinphysiker/in',
            '104' => 'Mitarbeiter/in Industrie | Agentur',
            '29' => 'Mitarbeiter/in medizinische Verlage',
            '30' => 'Mitarbeiter/in Pharmaagentur',
            '38' => 'Mitarbeiter/in Versicherung',
            '5020' => 'Motop&#228;de/in | Mototherapeut/in',
            '9999' => 'Nichtmedizinischer Beruf',
            '34' => 'Notfallsanit&#228;ter/in',
            '5021' => 'Operationstechnische/r Assistent/in | Chirurgische/r Assistent/in',
            '76' => 'OP-Pfleger/in',
            '71' => 'Orthoptist',
            '10000' => 'Patient',
            '100116' => 'Pflegeberuf (sonstige)',
            '99112' => 'Pflegeberuf (sonstige)',
            '2003' => 'Pflegedienstleiter/in | Pflegeheimleiter/in',
            '5018' => 'Pflegemanager/in | Pflegewissenschaftler/in',
            '100100' => 'Pflegep&#228;dagoge',
            '58' => 'Pflegewirt/in',
            '2005' => 'Pharmaassistent/in',
            '100096' => 'Pharmaberater/in | Pharmareferent/in',
            '1003' => 'Pharmazeut/in | Pharmazie-Praktikant/in',
            '26' => 'Pharmazeutisch-kaufm&#228;nnische/r Angestellte/r (PKA)',
            '25' => 'Pharmazeutisch-technische/r Assistent/in (PTA)',
            '40' => 'Pharmazieberuf (sonstige)',
            '99113' => 'Pharmazieberuf (sonstige)',
            '27' => 'Pharmazieingenieur/in',
            '33' => 'Physiotherapeut/in',
            '3006' => 'Podologe/in | Medizinische/r Fu&#223;pfleger/in',
            '3007' => 'Profession d\'appareillage',
            '31' => 'Psychologe/in',
            '57' => 'Psychologische/r Assistent/in | Psychologische/r Berater/in',
            '32' => 'Psychotherapeut/in',
            '3004' => 'Radiologieassistent',
            '35' => 'Rettungssanit&#228;ter/in',
            '1001' => 'Selbstst. Apotheker/in',
            '1008' => 'Sonstige (nichtmedizinischer Beruf)',
            '5' => 'Student/in',
            '100073' => 'Student/in (andere F&#228;cher)',
            '105' => 'Student/in der Humanmedizin',
            '56' => 'Student/in der Pharmazie',
            '54' => 'Student/in der Tiermedizin',
            '106' => 'Student/in der Zahnmedizin',
            '1007' => 'Techniker/in, IT',
            '99114' => 'Therapeut (sonstige)',
            '100117' => 'Therapeutischer Beruf (sonstige)',
            '3' => 'Tierarzt | Tier&#228;rztin',
            '5010' => 'Tierheilpraktiker/in',
            '100118' => 'Tiermedizinischer Beruf (sonstige)',
            '99115' => 'Tiermedizinischer Beruf (sonstige)',
            '5017' => 'Tiermedizinische/r Fachangestellte/r',
            '100101' => 'Tierphysiotherapeut/in',
            '44' => 'Toxikologe',
            '36' => 'Unternehmensberater/in',
            '37' => 'Weitere medizinische Berufe',
            '1005' => 'Wirtschaftswissenschaftler/in',
            '4' => 'Zahnarzt | Zahn&#228;rztin',
            '100119' => 'Zahnmedizinischer Beruf (sonstige)',
            '99116' => 'Zahnmedizinischer Beruf (sonstige)',
            '66' => 'Zahnmedizinische/r Fachangestellte/r | Dentalhygieniker/in',
            '65' => 'Zahn'
        ];

        if (get_locale() === 'de_DE') {
            $array = $dcl_form_occupational_groups_de;
        } else {
            $array = $dcl_form_occupational_groups_en;
        }

        return $array;
    }
}

