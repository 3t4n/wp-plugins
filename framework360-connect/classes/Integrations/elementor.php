<?php
namespace Fw360Connect\Integrations;

use \Elementor\Controls_Manager;
use \ElementorPro\Modules\Forms\Classes\Form_Record;
use \ElementorPro\Modules\Forms\Classes\Integration_Base;

class elementor extends Integration_Base {

    public function get_name() {
        return 'fw360';
    }

    public function get_label() {
        return 'Framework360';
    }

    public function register_settings_section( $widget ) {
        $widget->start_controls_section(
            'section_fw360',
            [
                'label' => __( 'Framework360', 'framework360-connect' ),
                'condition' => [
                    'submit_actions' => $this->get_name(),
                ],
            ]
        );

        $widget->add_control(
            'fw360_lists',
            [
                'label' => __( 'Framework360 lists (Separated by comma)', 'framework360-connect' ),
                'type' => Controls_Manager::TEXT,
                'render_type' => 'none',
                'label_block' => true,
            ]
        );

        $this->register_fields_map_control( $widget );

        $widget->end_controls_section();
    }

    public function on_export( $element ) {
        unset( $element['fw360_lists'] );

        return $element;
    }

    public function run( $record, $ajax_handler ) {
        $subscriber = $this->map_fields( $record );

        if($subscriber['user']) {
            $userData = array_replace($subscriber['user'], [
                'tags' => 'Fw360 Connect (' . get_bloginfo('name') . ')',
                'marketing_list' => array_filter(array_merge(explode(',', $subscriber['user_list']['list_ids'][0])))
            ]);

            (new \Fw360Connect\api())->call('/customers/registration', $userData);
        }
    }

    /**
     * @param Form_Record $record
     *
     * @return array
     */
    private function map_fields( $record ) {
        $settings = $record->get( 'form_settings' );
        $fields = $record->get( 'fields' );

        $subscriber = [
            'user' => [
                'email' => '',
            ],
            'user_list' => [ 'list_ids' => (array) $settings['fw360_lists'] ],
        ];

        foreach ( $settings['fw360_fields_map'] as $map_item ) {
            if ( empty( $fields[ $map_item['local_id'] ]['value'] ) ) {
                continue;
            }

            $value = $fields[ $map_item['local_id'] ]['value'];
            if ( 'email' === $map_item['remote_id'] ) {
                $subscriber['user']['email'] = $value;
            } else {
                $subscriber['user'][ $map_item['remote_id'] ] = $value;
            }
        }

        return $subscriber;
    }

    protected function get_fields_map_control_options() {
        return [
            'default' => [
                [
                    'remote_id' => 'nome',
                    'remote_label' => __( 'First Name', 'framework360-connect' ),
                    'remote_type' => 'text',
                ],
                [
                    'remote_id' => 'cognome',
                    'remote_label' => __( 'Last Name', 'framework360-connect' ),
                    'remote_type' => 'text',
                ],
                [
                    'remote_id' => 'telefono',
                    'remote_label' => __( 'Phone', 'framework360-connect' ),
                    'remote_type' => 'text',
                ],
                [
                    'remote_id' => 'email',
                    'remote_label' => __( 'Email', 'framework360-connect' ),
                    'remote_type' => 'email',
                    'remote_required' => true
                ],
                [
                    'remote_id' => 'indirizzo',
                    'remote_label' => __( 'Address', 'framework360-connect' ),
                    'remote_type' => 'text',
                ],
                [
                    'remote_id' => 'stato',
                    'remote_label' => __( 'Country', 'framework360-connect' ),
                    'remote_type' => 'text',
                ],
                [
                    'remote_id' => 'citta',
                    'remote_label' => __( 'City', 'framework360-connect' ),
                    'remote_type' => 'text',
                ],
                [
                    'remote_id' => 'comune',
                    'remote_label' => __( 'Locality', 'framework360-connect' ),
                    'remote_type' => 'text',
                ],
                [
                    'remote_id' => 'cap',
                    'remote_label' => __( 'CAP', 'framework360-connect' ),
                    'remote_type' => 'numeric',
                ],
                [
                    'remote_id' => 'ragione_sociale',
                    'remote_label' => __( 'Business Name', 'framework360-connect' ),
                    'remote_type' => 'text',
                ],
                [
                    'remote_id' => 'piva',
                    'remote_label' => __( 'VAT', 'framework360-connect' ),
                    'remote_type' => 'text',
                ],
                [
                    'remote_id' => 'cf',
                    'remote_label' => __( 'Personal ID', 'framework360-connect' ),
                    'remote_type' => 'text',
                ]
            ],
            'condition' => []
        ];
    }
}
