<?php

class AttendanceAPI {
    const TABLE_PREFIX = 'attendance-';
    const METHODS = 'GET, POST, PUT, PATCH, DELETE, OPTIONS';

    public static $attendance_api_instance;
    public static $version;
    public static $current_user;

    public static function init() {
        if ( is_null( self::$attendance_api_instance ) ) { self::$attendance_api_instance = new AttendanceAPI(); }
        return self::$attendance_api_instance;
    }

    private function __construct() {
        add_action( 'rest_api_init', array( $this, 'register_routes' ));
    }

    public static function register_routes() {
        register_rest_route( 'attendance/v1', '/(?P<pin>\d+)/days(?:/(?P<id>\d+))?', array(
            'methods'  => self::METHODS,
            'callback' => array( 'AttendanceAPI', 'rest_api_v1_days_callback' ),
            'permission_callback' => array( 'AttendanceAPI', 'rest_api_v1_permission_callback' )
        ));

        register_rest_route( 'attendance/v1', '/(?P<pin>\d+)/delta', array(
            'methods'  => 'POST',
            'callback' => array( 'AttendanceAPI', 'rest_api_v1_delta_callback' ),
            'permission_callback' => array( 'AttendanceAPI', 'rest_api_v1_permission_callback' )
        ));

        register_rest_route( 'attendance/v1', '/(?P<pin>\d+)/locations(?:/(?P<id>\d+))?', array(
            'methods'  => self::METHODS,
            'callback' => array( 'AttendanceAPI', 'rest_api_v1_locations_callback' ),
            'permission_callback' => array( 'AttendanceAPI', 'rest_api_v1_permission_callback' )
        ));

        register_rest_route( 'attendance/v1', '/(?P<pin>\d+)/people(?:/(?P<id>\d+))?', array(
            'methods'  => self::METHODS,
            'callback' => array( 'AttendanceAPI', 'rest_api_v1_people_callback' ),
            'permission_callback' => array( 'AttendanceAPI', 'rest_api_v1_permission_callback' )
        ));

        register_rest_route( 'attendance/v1', '/(?P<pin>\d+)/staff(?:/(?P<id>\d+))?', array(
            'methods'  => self::METHODS,
            'callback' => array( 'AttendanceAPI', 'rest_api_v1_staff_callback' ),
            'permission_callback' => array( 'AttendanceAPI', 'rest_api_v1_permission_callback' )
        ));

        register_rest_route( 'attendance/v1', '/(?P<pin>\d+)/pin', array(
            'methods'  => 'POST',
            'callback' => array( 'AttendanceAPI', 'rest_api_v1_pin_callback' ),
            'permission_callback' => array( 'AttendanceAPI', 'rest_api_v1_permission_callback' )
        ));
    }

    public static function format_location($post) {
        $peopleIds = get_post_meta($post->ID, self::TABLE_PREFIX . 'peopleIds', true);

        return array(
            'id' => $post->ID,
            'name' => $post->post_title,
            'slug' => $post->post_name,
            'peopleIds' => is_array($peopleIds) ? $peopleIds : array(),
            'updatedAt' => get_the_modified_time('U', $post),
            '_status' => $post->post_status
        );
    }

    public static function format_person($post) {
        return array(
            'id' => $post->ID,
            'name' => $post->post_title,
            'slug' => $post->post_name,
            'updatedAt' => get_the_modified_time('U', $post),
            '_status' => $post->post_status
        );
    }

    public static function format_day($post) {
        $peopleIds = get_post_meta($post->ID, self::TABLE_PREFIX . 'peopleIds', true);

        return array(
            'id' => $post->ID,
            'name' => $post->post_title,
            'slug' => $post->post_name,
            'peopleIds' => is_array($peopleIds) ? $peopleIds : array(),
            'locationId' => (int) get_post_meta($post->ID, self::TABLE_PREFIX . 'locationId', true),
            'date' => get_post_meta($post->ID, self::TABLE_PREFIX . 'date', true),
            'updatedAt' => get_the_modified_time('U', $post),
            '_status' => $post->post_status
        );
    }

    public static function format_staff($post) {
        $peopleIds = get_post_meta($post->ID, self::TABLE_PREFIX . 'permissions', true);

        return array(
            'id' => $post->ID,
            'name' => $post->post_title,
            'slug' => $post->post_name,
            'pin' => get_post_meta($post->ID, self::TABLE_PREFIX . 'pin', true),
            'permissions' => is_array($peopleIds) ? $peopleIds : array(),
            'updatedAt' => get_the_modified_time('U', $post),
            '_status' => $post->post_status
        );
    }

    public static function format($type, $data) {
        global $post;
        global $result;

        $pluralized_type = self::pluralize($type);

        // TODO: v2 of the API can just use $result, which scopes the data

        if ($data instanceof WP_Query) {
            $result[$pluralized_type] = array();

            while ($data->have_posts()) {
                $data->the_post();
                $result[$pluralized_type][] = forward_static_call('AttendanceAPI::format_' . $type, $post);
            }

            return $result[$pluralized_type];
        } else if ($data instanceof WP_Post) {
            $result[$type] = forward_static_call('AttendanceAPI::format_' . $type, $data);
            return $result[$type];
        }

        return $data;
    }

    public static function pluralize($singular) {
        if ($singular == 'person') {
            return 'people';
        }

        $last_letter = strtolower( $singular[strlen($singular) - 1] );

        switch($last_letter) {
            case 'y':
                return substr($singular, 0, -1) . 'ies';
            case 's':
                return $singular . 'es';
            default:
                return $singular . 's';
        }
    }

    public static function build_meta($item) {
        $args = array();

        foreach ($item as $key => $value) {
            if ($key == 'id') continue;
            if ($key == 'slug') continue;
            if ($key == 'name') continue;
            if ($key == 'updatedAt') continue;
            if ($key[0] == '_') continue;

            $args[self::TABLE_PREFIX . $key] = $value;
        }

        return $args;
    }

    public static function rest_api_v1_pattern($type, $request) {
        $db_table = self::TABLE_PREFIX . $type;

        if (isset($request[$type])) {
            $args = array(
                'post_type'   => $db_table,
                'meta_input'  => self::build_meta($request[$type])
            );

            if (isset($request['id'])) {
                $action = 'update';
                $args['ID'] = $request['id'];
            } else if (isset($request[$type]['id'])) {
                $action = 'create';
                $args['post_status'] = 'publish';

                if (is_numeric($request[$type]['id'])) {
                    $args['ID'] = $request[$type]['id'];
                } else {
                    $args['post_name'] = $request[$type]['id'];
                }
            }

            if (isset($request[$type]['name'])) {
                $args['post_title'] = $request[$type]['name'];
                $id = wp_insert_post($args);
            } else {
                if (isset($request[$type]['_status']) && $request[$type]['_status'] == self::TABLE_PREFIX . 'archive') {
                    $args['post_status'] = self::TABLE_PREFIX . 'archive';
                }

                $id = wp_update_post($args);
            }

            self::create_action($action, $args);

            $results = get_post($id);
        } else {
            $args = array(
                'post_type' => $db_table,
                'post_status' => 'any',
                'orderby' => 'post_modified',
                'order' => 'ASC',
                'posts_per_page' => -1,
            );

            if (isset($request['id'])) {
                $args['p'] = $request['id'];
            }

            $results = new WP_Query($args);

            if (isset($request['id'])) {
                $results = $results->posts[0];
            }
        }

        if (empty($results)) {
            $results = array(
                'message' => 'No ' . $type . ' found.',
                'data' => array( 'status' => 204 )
            );
        } else {
            if (is_array($results)) {
                // $results['data'] = array( 'status' => 200 );
            } else {
                $results->data = array( 'status' => 200 );
            }
        }

        return self::format_response(self::format($type, $results));
    }

    public static function create_action($action, $data) {
        wp_insert_post(array(
            'post_title'  => 'Action ' . time(),
            'post_name'   => $action . '-' . time(),
            'post_status' => 'publish',
            'post_type'   => self::TABLE_PREFIX . 'action',
            'meta_input'  => self::build_meta(array(
                'staffId' => self::$current_user['id'],
                'payload' => json_encode($data)
            ))
        ));
    }

    public static function format_response($data) {
        $attendance = Attendance::get_vars();
        $response = rest_ensure_response($data);

        if (isset(self::$current_user)) {
            $response->set_headers(array(
                'x-current-user'=> json_encode(self::$current_user),
                'x-app-title'=> $attendance['title'],
                'access-control-expose-headers' => 'x-current-user,x-app-title'
            ));
        }

        return $response;
    }

    public static function rest_api_v1_locations_callback($request) {
        return self::rest_api_v1_pattern('location', $request);
    }

    public static function rest_api_v1_people_callback($request) {
        return self::rest_api_v1_pattern('person', $request);
    }

    public static function rest_api_v1_days_callback($request) {
        return self::rest_api_v1_pattern('day', $request);
    }

    public static function rest_api_v1_staff_callback($request) {
        return self::rest_api_v1_pattern('staff', $request);
    }

    public static function rest_api_v1_delta_callback($request) {
        try {
            $item = $request['item'];
            $delta = $request['delta'];
            $attr = self::TABLE_PREFIX . $delta['attr'];
            $arr = get_post_meta($item['id'], $attr, true);

            if (!is_array($arr)) {
                $arr = array();
            }

            if ($delta['action'] == 'add' && !in_array($delta['value'], $arr)) {
                array_push($arr, $delta['value']);
                update_post_meta( $item['id'], $attr, $arr );
            } else if ($delta['action'] == 'remove' && in_array($delta['value'], $arr)) {
                $arr = array_values( array_diff($arr, array($delta['value'])) );
                update_post_meta( $item['id'], $attr, $arr );
            }

            return self::format_response(
                self::format( $item['type'], get_post($item['id']) )
            );
        } catch (Exception $e) {
            return self::format_response( array(
                'message' => 'Item not found.',
                'data' => array( 'status' => 204 )
            ) );
        }
    }

    public static function rest_api_v1_pin_callback($request) {
        return self::format_response(array( 'Authorized' => true ));
    }

    public static function authorize($request) {
        global $result;

        $result = array();
        $headers = $request->get_headers();
        $authorization = isset($headers['Authorization']) ? $headers['Authorization'] : (isset($headers['authorization']) ? $headers['authorization'] : undefined);

        if (isset($authorization) && empty($authorization[0]) && !empty($request['pin'])) {
            $authorization = array('Basic ' . base64_encode($request['pin']));
        }

        if (isset($authorization) && !empty($authorization[0])) {
            try {
                $pin = base64_decode(explode(' ', $authorization[0])[1]);

                $staff = new WP_Query(array(
                    'post_status' => 'publish',
                    'post_type'   => self::TABLE_PREFIX . 'staff',
                    'meta_key'    => self::TABLE_PREFIX . 'pin',
                    'meta_value'  => $pin
                ));

                if (isset($staff->posts[0])) {
                    self::set_current_user($staff->posts[0], $request);
                }

                if (isset(self::$current_user)) {
                    return true;
                }
            } catch (Exception $e) { }
        }

        if (isset($pin) && preg_match('/\/pin$/i', $request->get_route())) {
            $staff = new WP_Query(array(
                'post_type'       => self::TABLE_PREFIX . 'staff',
                'post_status'     => 'publish',
                'posts_per_page'  => -1
            ));

            if ($staff->found_posts == 0) {
                $id = wp_insert_post(array(
                    'post_title'  => 'Admin',
                    'post_name'   => 'attendance-admin-staff',
                    'post_status' => 'publish',
                    'post_type'   => self::TABLE_PREFIX . 'staff',
                    'meta_input'  => self::build_meta(array(
                        'pin' => $pin,
                        'permissions' => array('admin', 'reports')
                    ))
                ));

                self::set_current_user($id, $request);

                return true;
            }
        }

        return null;
    }

    public static function set_current_user($item, $request) {
        if (is_numeric($item)) {
            $item = get_post($item);
        }

        self::$current_user = array(
            'id' => $item->ID,
            'name' => get_the_title($item->ID),
            'permissions' => get_post_meta($item->ID, self::TABLE_PREFIX . 'permissions', true)
        );

        return self::$current_user;
    }

    public static function is_permitted($request) {
        if (in_array('admin', self::$current_user['permissions'])) {
            return true;
        }

        // if ($request->get_method() == 'DELETE') {
        //     return false;
        // }

        return true;
        $permissions = self::get_permissions();
        // $permission = $permissions[$type];

        if ($permission == 'all') {
            return true;
        }

        // $permission
    }

    public static function get_permissions() {
        return array(
            'people' => 'all',
            'delta' => 'all',
            'locations' => array(
                'id',
                self::$current_user['permissions']
            ),
            'days' => array(
                'locationId',
                self::$current_user['permissions']
            ),
        );
    }

    public static function rest_api_v1_permission_callback($request) {
        if ($request->get_method() == 'OPTIONS') {
            return true;
        }

        // TODO: authorized items and attribute changes

        return !!self::authorize($request) && self::is_permitted($request);
    }
}

AttendanceAPI::init();

?>
