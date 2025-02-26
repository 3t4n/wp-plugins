<?php

class LLLoginLink {

    protected static $table_name = 'login_links';
    public $id;
    public $user_id;
    public $temp_user_id;
    public $token;
    public $expiration_time;
    public $max_logins;
    public $logins_used;
    public $is_temporary_user;
    public $role;
    public $used;

    public function __construct($data) {
        $this->id = isset($data->id) ? $data->id : null;
        $this->user_id = isset($data->user_id) ? $data->user_id : null;
        $this->temp_user_id = isset($data->temp_user_id) ? $data->temp_user_id : null;
        $this->token = isset($data->token) ? $data->token : null;
        $this->expiration_time = isset($data->expiration_time) ? $data->expiration_time : null;
        $this->max_logins = isset($data->max_logins) ? $data->max_logins : null;
        $this->logins_used = isset($data->logins_used) ? $data->logins_used : null;
        $this->is_temporary_user = isset($data->is_temporary_user) ? $data->is_temporary_user : 0;
        $this->role = isset($data->role) ? $data->role : 'subscriber';
        $this->used = isset($data->used) ? $data->used : 0;
    }

    public static function insert($args = []) {
		global $wpdb;
	
		$allowed_fields = [
			'user_id',
			'temp_user_id',
			'token',
			'expiration_time',
			'max_logins',
			'logins_used',
			'is_temporary_user',
			'role',
			'used'
		];
	
		$defaults = [
			'user_id'          => null,
			'temp_user_id'     => null,
			'token'            => wp_generate_password(63, false),
			'expiration_time'  => null,
			'max_logins'       => null,
			'logins_used'      => 0,
			'is_temporary_user'=> 0,
			'role'             => 'subscriber',
			'used'             => 0,
		];
	
		$data = wp_parse_args($args, $defaults);
	
		$filtered_data = array_intersect_key($data, array_flip($allowed_fields));
	
		if (isset($filtered_data['expiration_time']) && !empty($filtered_data['expiration_time'])) {
			$filtered_data['expiration_time'] = gmdate('Y-m-d H:i:s', strtotime($filtered_data['expiration_time']));
		}
	
		if (!isset($filtered_data['token'])) {
			$filtered_data['token'] = wp_generate_password(63, false);
		}
	
		if (isset($filtered_data['max_logins']) && !is_numeric($filtered_data['max_logins'])) {
			throw new Exception('Invalid max_logins value. It must be a numeric value.');
		}
	
		if (isset($filtered_data['logins_used']) && !is_numeric($filtered_data['logins_used'])) {
			throw new Exception('Invalid logins_used value. It must be a non-negative numeric value.');
		}
	
		if (isset($filtered_data['is_temporary_user']) && !in_array($filtered_data['is_temporary_user'], [0, 1])) {
			throw new Exception('Invalid is_temporary_user value. It must be either 0 or 1.');
		}
	
		$table_name = $wpdb->prefix . self::$table_name;
		$result = $wpdb->insert($table_name, $filtered_data);
	
		if ($result === false) {
			throw new Exception('Failed to insert login link. ' . esc_html($wpdb->last_error));
		}
	
		$id = $wpdb->insert_id;
	
		return $id;
	}

	public static function create($args = []) {
		global $wpdb;
		
		$wpdb->query('START TRANSACTION');
		
		try {
			$default_unit = 'day';
		
			if (!isset($args['expiration_time']) && !isset($args['max_logins'])) {
				$args['expiration_time'] = "+1 {$default_unit}";
			}
		
			if (isset($args['expiration_time']) && isset($args['expiration_unit'])) {
				$expiration_time = $args['expiration_time'];
				$expiration_unit = $args['expiration_unit'];
		
				/**
				 * @todo Make a model for this units and add it to admin-page.php when outputting
				 */
				$units_map = [
					'hour' => 'hour',
					'day' => 'day',
					'week' => 'week',
					'month' => 'month',
					'year' => 'year'
				];
		
				if (!array_key_exists($expiration_unit, $units_map)) {
					throw new Exception("Invalid expiration unit provided: {$expiration_unit}. Valid units are: " . implode(', ', array_keys($units_map)));
				}
		
				$args['expiration_time'] = '+' . intval($expiration_time) . ' ' . $units_map[$expiration_unit];
			}
		
			if (isset($args['user_type'])) {
				if ($args['user_type'] === 'temporary') {
					$args['temp_user_id'] = self::createTemporaryUser($args['role'] ?? 'administrator');
					$args['is_temporary_user'] = 1;
				} 
				elseif ($args['user_type'] === 'existing' && !empty($args['user_id'])) {
					$args['is_temporary_user'] = 0;
				} else {
					throw new Exception("User ID must be provided for existing users.");
				}
			} else {
				$args['temp_user_id'] = self::createTemporaryUser($args['role'] ?? 'administrator');
				$args['is_temporary_user'] = 1;
			}
		
			$insert_id = self::insert($args);
		
			$wpdb->query('COMMIT');
		
			return $insert_id;
		
		} catch (Exception $e) {
			$wpdb->query('ROLLBACK');
			
			throw new Exception(esc_html($e->getMessage()), $e->getCode(), $e);
		}
	}
	
    private static function createTemporaryUser($role = 'administrator') {
        $username = 'temp_user_' . wp_generate_password(6, false);
        $password = wp_generate_password();
        $email = $username . '@example.com';

        $user_id = wp_create_user($username, $password, $email);
        
        if (is_wp_error($user_id)) {
            throw new Exception('Failed to create temporary user.');
        }

        $user = new WP_User($user_id);
        $user->set_role($role);

        return $user_id;
    }

    public static function updateById($id, $args = []) {
        global $wpdb;

        if (empty($id)) {
            throw new Exception('ID is required for updating a link.');
        }

        $allowed_fields = [
            'user_id', 'temp_user_id', 'token', 'expiration_time', 'max_logins',
            'logins_used', 'is_temporary_user', 'role', 'used'
        ];
        $args = array_intersect_key($args, array_flip($allowed_fields));

        if (isset($args['expiration_time'])) {
            $args['expiration_time'] = gmdate('Y-m-d H:i:s', strtotime($args['expiration_time']));
        }

        $table_name = $wpdb->prefix . self::$table_name;
        $result = $wpdb->update($table_name, $args, ['id' => $id]);

        if ($result === false) {
            throw new Exception('Failed to update temporary login link.');
        }

        return $result; // Returns the number of rows affected
    }

    public static function deleteById($id) {
        global $wpdb;

        if (empty($id)) {
            throw new Exception('ID is required for deleting a link.');
        }

        $table_name = $wpdb->prefix . self::$table_name;
        $result = $wpdb->delete($table_name, ['id' => $id]);

        if ($result === false) {
            throw new Exception('Failed to delete temporary login link.');
        }

        return true;
    }

	/**
     * Static method to destroy (delete) a temporary login link by ID
     * It also deletes the temporary user profile if one was created, 
     * but only if the user deletion is successful.
     *
     * @param int $id The ID of the temporary login link to delete
     * @return bool True if successfully destroyed, otherwise throws exception
     */
    public static function destroyById($id) {
        global $wpdb;

        $link = self::getById($id);

        if ($link) {
            if ($link->is_temporary_user && !empty($link->temp_user_id)) {
                $user = get_user_by('ID', $link->temp_user_id);

                if ($user) {
                    require_once(ABSPATH . 'wp-admin/includes/user.php');
                    $user_deleted = wp_delete_user($user->ID);

                    if (!$user_deleted) {
                        throw new Exception('Failed to delete the associated temporary user.');
                    }
                }
            }

            self::deleteById($id);

            return true;
        } else {
            throw new Exception('Temporary login link not found.');
        }
    }

	public static function incrementLoginsUsed($id) {
		global $wpdb;
	
		if (empty($id)) {
			throw new Exception('ID is required to increment logins used.');
		}
	
		$link = self::getById($id);
	
		if (isset($link->max_logins) && is_numeric($link->max_logins) && $link->logins_used >= $link->max_logins) {
			throw new Exception('Maximum logins used for this temporary link.');
		}
	
		$new_logins_used = $link->logins_used + 1;
	
		$table_name = $wpdb->prefix . self::$table_name;
		$result = $wpdb->update(
			$table_name,
			['logins_used' => $new_logins_used],
			['id' => $id]
		);
	
		if ($result === false) {
			throw new Exception('Failed to increment logins used.');
		}
	
		return $new_logins_used;
	}

    public static function getAll() {
        global $wpdb;

        $table_name = $wpdb->prefix . self::$table_name;
        $results = $wpdb->get_results( $wpdb->prepare("SELECT * FROM {$table_name} ORDER BY id DESC") );

        return array_map(function($row) {
            return new self($row);
        }, $results);
    }

    public static function getById($id) {
        global $wpdb;

        if (empty($id)) {
            throw new Exception('ID is required.');
        }

        $table_name = $wpdb->prefix . self::$table_name;
        $result = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$table_name} WHERE id = %d", $id ) );

        if (!$result) {
            throw new Exception('Temporary login link not found.');
        }

        return new self($result);
    }

	public static function getByToken($token) {
		global $wpdb;
	
		if (empty($token)) {
			throw new Exception('Token is required.');
		}
	
		$table_name = $wpdb->prefix . self::$table_name;
		$result = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$table_name} WHERE token = %s", $token ) );
	
		if (!$result) {
			return false;
		}
	
		return new self($result);
	}

    public static function truncate() {
        global $wpdb;

        $table_name = $wpdb->prefix . self::$table_name;
        $wpdb->query($wpdb->prepare("TRUNCATE TABLE {$table_name}"));
    }

    public static function getParameterPrefix() {
        return 'll';
    }

    public function getRelativeUrl() {
        return "/?" . esc_attr(self::getParameterPrefix()) . esc_attr($this->token);
    }

    public function getUrl() {
        return site_url(esc_attr($this->getRelativeUrl()));
    }

	public function getRowData() {
		if (!empty($this->temp_user_id)) {
			$user = get_user_by('ID', $this->temp_user_id);
		} elseif (!empty($this->user_id)) {
			$user = get_user_by('ID', $this->user_id);
		} else {
			$user = null;
		}
	
		$display_name = !empty($user) ? $user->display_name : 'Unknown User';
	
		$role = (!empty($user) && !empty($user->roles)) ? implode(', ', $user->roles) : 'No role';
	
		$link_url = $this->getUrl();
		$relative_link_url = $this->getRelativeUrl();
	
		$expiration_time = 'N/A';
		if (!empty($this->expiration_time)) {
			$expiration_timestamp = strtotime($this->expiration_time);
			if ($expiration_timestamp < time()) {
				$expiration_time = sprintf('Expired %s ago', human_time_diff($expiration_timestamp, time()));
			} else {
				$expiration_time = sprintf('%s', human_time_diff(time(), $expiration_timestamp));
			}
		}
	
		$max_logins = isset($this->max_logins) && is_numeric($this->max_logins) ? $this->max_logins : '∞';
		
		$logins_used_max = $this->logins_used . ' / ' . $max_logins;
	
		$isExpired = $this->isExpired();
	
		return [
			'id'               => esc_attr($this->id),
			'link_url'         => esc_url($link_url),
			'relative_link_url'=> esc_url($relative_link_url),
			'display_name'     => esc_html($display_name),
			'role'             => esc_html($role),
			'expiration_time'  => esc_html($expiration_time),
			'logins_used_max'  => esc_html($logins_used_max),
			'is_expired'       => esc_html((int) $isExpired),
		];
	}
	

	public function getUserId() {
		if ($this->is_temporary_user && !empty($this->temp_user_id)) {
			return $this->temp_user_id;
		}
		
		if (!empty($this->user_id)) {
			return $this->user_id;
		}
		
		/**
		 * @todo Throw new Exception('No user ID available.') instead of null
		 */
		return null; 
	}
	
	/**
     * Check if the temporary login link is expired (either by time or login limit)
     * 
     * @return bool True if the link is expired, false otherwise
     */
    public function isExpired() {
        if (!empty($this->expiration_time)) {
            $expiration_timestamp = strtotime($this->expiration_time);
            if ($expiration_timestamp < time()) {
                return true;
            }
        }

        if (isset($this->max_logins) && is_numeric($this->max_logins) && $this->logins_used >= $this->max_logins) {
            return true;
        }

        return false;
    }

}
