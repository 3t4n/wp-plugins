<?php

namespace CodeConfig\IntegrateDropbox\Database;

class UserAccessModel
{
    private static $instance = null;
    private $table;
    /**
     * @var \wpdb
     * @access private
     */
    private $wpdb;

    private function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table = $wpdb->prefix . 'integrate_dropbox_user_access';
    }

    // Get the single instance of the class
    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Create a new record
    public function create($type, $value, $folders = null, $force = 0)
    {
        $data = [
            'type' => $type,
            'value' => $value,
            'folders' => maybe_serialize($folders),
            'force' => $force,
            'created_at' => current_time('mysql', 1),
        ];

        $format = ['%s', '%s', '%s', '%d', '%s'];
        $this->wpdb->insert($this->table, $data, $format);

        return $this->wpdb->insert_id;
    }

    // Read a record by ID
    public function get($id)
    {
        // Prepare and execute the query safely
        $query = $this->wpdb->prepare("SELECT * FROM {$this->table} WHERE id = %d", $id);
        $result = $this->wpdb->get_row($query, ARRAY_A);

        // Check if a result was found
        if ($result) {
            // Unserialize folders if it exists
            if (isset($result['folders'])) {
                $result['folders'] = maybe_unserialize($result['folders']);
            }

            // Cast force to a boolean if it exists
            if (isset($result['force'])) {
                $result['force'] = (bool) $result['force'];
            }
        }

        return $result;
    }

    public function get_by($args)
    {
        $default = [
            'type' => 'user',
            'value' => '',
        ];

        $args = wp_parse_args($args, $default);

        $type = $args['type'];
        $value = $args['value'];

        // Check if a result was found
        if (empty($value)) {
            return false;
        }

        // Prepare and execute the query safely
        $query = $this->wpdb->prepare("SELECT * FROM {$this->table} WHERE type = %s AND value = %s", $type, $value);
        $result = $this->wpdb->get_row($query, ARRAY_A);

        // Check if a result was found
        if (!empty($result)) {
            // Unserialize folders if it exists
            if (isset($result['folders'])) {
                $result['folders'] = maybe_unserialize($result['folders']);
            }

            // Cast force to a boolean if it exists
            if (isset($result['force'])) {
                $result['force'] = (bool) $result['force'];
            }
        }else {
            $result = false;
        }

        return $result;
    }


    // Read folders by user id
    public function get_folders($username, $roles)
    {
        $userData = $this->get_by(['type' => 'user', 'value' => $username]);

        $only_user = isset($userData['force']) ? !empty($userData['force']) : false;

        $conditions = ['(type = %s AND value = %s)'];
        $values = ['user', $username];

        if (is_array($roles) && !$only_user && !empty($roles)) {
            foreach ($roles as $role) {
                $conditions[] = '(type = %s AND value = %s)';
                $values[] = 'role';
                $values[] = $role;
            }
        }

        $where_clause = implode(' OR ', $conditions);

        $query = $this->wpdb->prepare("SELECT folders FROM {$this->table} WHERE $where_clause", ...$values);
        $results = $this->wpdb->get_results($query, ARRAY_A);

        $folders = [];
        foreach ($results as $item) {
            $folders = array_merge($folders, maybe_unserialize($item['folders']));
        }

        return $folders;
    }


    // Read all records
    public function get_all()
    {
        $query = "SELECT * FROM {$this->table}";
        $results = $this->wpdb->get_results($query, ARRAY_A);

        // Unserialize the 'folders' field and cast 'force' to boolean for each record
        foreach ($results as &$record) {
            $record['folders'] = maybe_unserialize($record['folders']);
            $record['force'] = (bool) $record['force'];
        }

        return $results;
    }


    // Update a record by ID
    public function update($id, $type, $value, $folders = null, $force = 0)
    {
        $data = [
            'type' => $type,
            'value' => $value,
            'folders' => maybe_serialize($folders),
            'force' => $force,
            'updated_at' => current_time('mysql', 1),
        ];
        $where = ['id' => $id];

        $format = ['%s', '%s', '%s', '%d', '%s'];
        $where_format = ['%d'];

        return $this->wpdb->update($this->table, $data, $where, $format, $where_format);
    }

    // Delete a record by ID
    public function delete($id)
    {
        $where = ['id' => $id];
        $where_format = ['%d'];

        return $this->wpdb->delete($this->table, $where, $where_format);
    }
}
