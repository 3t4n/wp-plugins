<?php

namespace Ambikly\Database\Tables;

use Ambikly\Admin\AdminConstants;

abstract class BaseTable
{
    protected $table_name;

    protected $wpdb;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
    }

    /**
     * Get the fully qualified table name with prefix.
     *
     * @return string The prefixed table name.
     */
    public function getTableName(): string
    {
        return $this->wpdb->prefix . AdminConstants::TABLE_PREFIX . $this->table_name;
    }

    /**
     * Get the charset and collation for the table.
     *
     * @return string The charset and collation string.
     */
    public function getCharsetCollate(): string
    {
        return $this->wpdb->get_charset_collate();
    }

    /**
     * Get the CREATE TABLE SQL query.
     * This method should be overridden by each specific table.
     *
     * @return string The SQL query to create the table.
     */
    abstract public function getCreateTableQuery(): string;

    public function insert(array $data)
    {
        $result = $this->wpdb->insert($this->getTableName(), $data);

        return $result !== false ? $this->wpdb->insert_id : false;
    }

    public function update(array $data, array $where)
    {
        $result = $this->wpdb->update($this->getTableName(), $data, $where);
        return $result !== false ? $result : false;
    }

    public function delete(array $where)
    {
        $result = $this->wpdb->delete($this->getTableName(), $where);
        return $result !== false ? $result : false;
    }

    public function get(array $where, array $fields = ['*'])
    {
        $table = $this->getTableName();

        $fieldValues = implode(', ', array_map('esc_sql', $fields));

        $whereClause = $this->buildWhereClause($where);

        $query = "SELECT $fieldValues FROM $table WHERE $whereClause LIMIT 1";

        return $this->wpdb->get_row($query, ARRAY_A);
    }

    public function getAll(array $where = [], array $fields = ['*'], string $order = '', int $limit = 0, int $offset = 0)
    {
        $table = $this->getTableName();

        $fieldValues = implode(', ', array_map('esc_sql', $fields));

        $whereClause = $this->buildWhereClause($where);

        $limitOffsetClause = '';

        if ($limit > 0) {

            $limitOffsetClause = $this->wpdb->prepare("LIMIT %d OFFSET %d", $limit, $offset);

        }

        $orderClause = '';

        if (!empty($order)) {
            $order = str_replace('ORDER BY', '', $order);

            $orderClause = "ORDER BY " . esc_sql($order);
        }

        $query = "SELECT $fieldValues FROM $table WHERE $whereClause $orderClause $limitOffsetClause";

        return $this->wpdb->get_results($query, ARRAY_A);
    }

    /**
     * Count the total number of rows matching the specified where conditions.
     *
     * @param array $where The where conditions for counting.
     * @return int The total count of rows.
     */
    public function count(array $where = []): int
    {
        $table = $this->getTableName();
        $whereClause = $this->buildWhereClause($where);

        // Prepare query
        $query = "SELECT COUNT(*) FROM $table WHERE $whereClause";
        return (int)$this->wpdb->get_var($query);
    }

    /**
     * Build the WHERE clause from an associative array of conditions.
     *
     * @param array $where The conditions for the WHERE clause.
     * @return string The generated WHERE clause.
     */
    private function buildWhereClause(array $where): string
    {
        $conditions = [];
        foreach ($where as $key => $value) {
            if (is_numeric($value)) {
                $conditions[] = $this->wpdb->prepare("$key = %d", $value);
            } else {
                $conditions[] = $this->wpdb->prepare("$key = %s", $value);
            }
        }
        return !empty($conditions) ? implode(' AND ', $conditions) : '1=1'; // Default to '1=1' if no conditions
    }
}