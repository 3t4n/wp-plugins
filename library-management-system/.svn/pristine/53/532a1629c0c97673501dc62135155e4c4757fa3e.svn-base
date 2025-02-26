<?php

/**
 * Fired during plugin activation
 *
 * @link       https://onlinewebtutorblog.com/
 * @since      3.0
 *
 * @package    Library_Management_System
 * @subpackage Library_Management_System/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      3.0
 * @package    Library_Management_System
 * @subpackage Library_Management_System/includes
 * @author     Online Web Tutor <onlinewebtutorhub@gmail.com>
 */
class Library_Management_System_Activator {

    /**
     * Activate the plugin.
     *
     * @since 3.0
     */
    public function activate() {
        // Plugin Tables
        $this->owt7_library_generate_plugin_tables();
        // Insert Table Data
        $this->owt7_library_insert_default_data();
        // Plugin Options
        $this->owt7_library_options();
    }

    /**
     * Generate plugin tables.
     *
     * @since 3.0
     */
    private function owt7_library_generate_plugin_tables() {

        global $wpdb;

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        $tables = [
            'users' => [
                'name' => $this->owt7_library_tbl_users(),
                'sql' => "CREATE TABLE %s (
                    id INT NOT NULL AUTO_INCREMENT,
                    register_from ENUM('web', 'admin') DEFAULT 'admin',
                    u_id VARCHAR(20) DEFAULT NULL,
                    name VARCHAR(20) DEFAULT NULL,
                    email VARCHAR(80) DEFAULT NULL,
                    gender ENUM('male', 'female', 'other') DEFAULT NULL,
                    branch_id INT(5) DEFAULT NULL,
                    phone_no VARCHAR(20) DEFAULT NULL,
                    profile_image VARCHAR(220) DEFAULT NULL,
                    address_info TEXT,
                    status INT NOT NULL DEFAULT '1',
                    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    PRIMARY KEY (id)
                ) %s;"
            ],
            'books' => [
                'name' => $this->owt7_library_tbl_books(),
                'sql' => "CREATE TABLE %s (
                    id INT NOT NULL AUTO_INCREMENT,
                    book_id VARCHAR(20) DEFAULT NULL,
                    bookcase_id INT(5) DEFAULT NULL,
                    bookcase_section_id INT(5) DEFAULT NULL,
                    category_id INT(5) DEFAULT NULL,
                    name VARCHAR(120) DEFAULT NULL,
                    author_name VARCHAR(150) DEFAULT NULL,
                    publication_name VARCHAR(150) DEFAULT NULL,
                    publication_year VARCHAR(10) DEFAULT NULL,
                    publication_location VARCHAR(80) DEFAULT NULL,
                    amount VARCHAR(10) DEFAULT NULL,
                    cover_image VARCHAR(200) DEFAULT NULL,
                    isbn VARCHAR(20) DEFAULT NULL,
                    book_url VARCHAR(220) DEFAULT NULL,
                    stock_quantity INT(5) DEFAULT NULL,
                    book_language VARCHAR(50) DEFAULT NULL,
                    book_pages INT(5) DEFAULT NULL,
                    description TEXT,
                    status INT NOT NULL DEFAULT '1',
                    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    PRIMARY KEY (id)
                ) %s;"
            ],
            'bookcase' => [
                'name' => $this->owt7_library_tbl_bookcase(),
                'sql' => "CREATE TABLE %s (
                    id INT NOT NULL AUTO_INCREMENT,
                    name VARCHAR(100) DEFAULT NULL,
                    status ENUM('1', '0') NOT NULL DEFAULT '1',
                    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    PRIMARY KEY (id)
                ) %s;"
            ],
            'bookcase_sections' => [
                'name' => $this->owt7_library_tbl_bookcase_sections(),
                'sql' => "CREATE TABLE %s (
                    id INT NOT NULL AUTO_INCREMENT,
                    name VARCHAR(100) DEFAULT NULL,
                    bookcase_id INT(5) DEFAULT NULL,
                    status ENUM('1', '0') NOT NULL DEFAULT '1',
                    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    PRIMARY KEY (id)
                ) %s;"
            ],
            'branch' => [
                'name' => $this->owt7_library_tbl_branch(),
                'sql' => "CREATE TABLE %s (
                    id INT NOT NULL AUTO_INCREMENT,
                    name VARCHAR(100) DEFAULT NULL,
                    status ENUM('1', '0') NOT NULL DEFAULT '1',
                    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    PRIMARY KEY (id)
                ) %s;"
            ],
            'category' => [
                'name' => $this->owt7_library_tbl_category(),
                'sql' => "CREATE TABLE %s (
                    id INT NOT NULL AUTO_INCREMENT,
                    name VARCHAR(100) DEFAULT NULL,
                    status ENUM('1', '0') NOT NULL DEFAULT '1',
                    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    PRIMARY KEY (id)
                ) %s;"
            ],
            'book_borrow' => [
                'name' => $this->owt7_library_tbl_book_borrow(),
                'sql' => "CREATE TABLE %s (
                    id INT NOT NULL AUTO_INCREMENT,
                    borrow_id VARCHAR(11) DEFAULT NULL,
                    category_id INT(5) DEFAULT NULL,
                    book_id INT(5) DEFAULT NULL,
                    branch_id INT(5) DEFAULT NULL,
                    u_id INT(5) DEFAULT NULL,
                    borrows_days INT(5) DEFAULT NULL,
                    return_date VARCHAR(20) DEFAULT NULL,
                    status ENUM('1', '0') NOT NULL DEFAULT '1',
                    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    PRIMARY KEY (id)
                ) %s;"
            ],
            'book_return' => [
                'name' => $this->owt7_library_tbl_book_return(),
                'sql' => "CREATE TABLE %s (
                    id INT NOT NULL AUTO_INCREMENT,
                    borrow_id VARCHAR(11) DEFAULT NULL,
                    category_id INT(5) DEFAULT NULL,
                    book_id INT(5) DEFAULT NULL,
                    branch_id INT(5) DEFAULT NULL,
                    u_id INT(5) DEFAULT NULL,
                    has_fine_status ENUM('1', '0') NOT NULL DEFAULT '0',
                    status ENUM('1', '0') NOT NULL DEFAULT '1',
                    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    PRIMARY KEY (id)
                ) %s;"
            ],
            'book_late_fine' => [
                'name' => $this->owt7_library_tbl_book_late_fine(),
                'sql' => "CREATE TABLE %s (
                    id INT NOT NULL AUTO_INCREMENT,
                    return_id INT(5) DEFAULT NULL,
                    book_id INT(5) DEFAULT NULL,
                    u_id INT(5) DEFAULT NULL,
                    extra_days INT(5) DEFAULT NULL,
                    fine_amount INT(5) DEFAULT NULL,
                    has_paid ENUM('1', '2') NOT NULL DEFAULT '1' COMMENT '1 - Not Paid, 2 - Paid',
                    status ENUM('1', '0') NOT NULL DEFAULT '1',
                    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    PRIMARY KEY (id)
                ) %s;"
            ],
        ];

        foreach ($tables as $table) {
            $cache_key = 'table_exists_' . md5($table['name']);
            $table_exists = wp_cache_get($cache_key);
            if (false === $table_exists) {
                $table_exists = $wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $table['name'])) == $table['name'];
                wp_cache_set($cache_key, $table_exists);
            }

            if (!$table_exists) {
                dbDelta(sprintf($table['sql'], $table['name'], $wpdb->get_charset_collate()));
                wp_cache_delete($cache_key);
            }
        }

    }

    /**
     * Insert default data.
     *
     * @since 3.0
     */
    private function owt7_library_insert_default_data() {
        // Implementation to insert default data
    }

    /**
     * Add plugin options.
     *
     * @since 3.0
     */
    private function owt7_library_options() {
        update_option('owt7_library_version', '3.0');
        update_option('owt7_library_system', serialize(['lms' => 'free']));
        update_option('owt7_library_db_tables', serialize([
            $this->owt7_library_tbl_branch(),
            $this->owt7_library_tbl_users(),
            $this->owt7_library_tbl_bookcase(),
            $this->owt7_library_tbl_bookcase_sections(),
            $this->owt7_library_tbl_category(),
            $this->owt7_library_tbl_books(),
            $this->owt7_library_tbl_book_borrow(),
            $this->owt7_library_tbl_book_return(),
            $this->owt7_library_tbl_book_late_fine()
        ]));
        update_option('owt7_lms_late_fine_currency', '1');
        update_option('owt7_lms_country', 'India');
        update_option('owt7_lms_currency', 'INR');
    }

    /**
     * Return the users table name.
     *
     * @since 3.0
     */
    public function owt7_library_tbl_users() {
        global $wpdb;
        return $wpdb->prefix . 'owt7_lib_users';
    }

    /**
     * Return the books table name.
     *
     * @since 3.0
     */
    public function owt7_library_tbl_books() {
        global $wpdb;
        return $wpdb->prefix . 'owt7_lib_books';
    }

    /**
     * Return the bookcase table name.
     *
     * @since 3.0
     */
    public function owt7_library_tbl_bookcase() {
        global $wpdb;
        return $wpdb->prefix . 'owt7_lib_bookcase';
    }

    /**
     * Return the bookcase sections table name.
     *
     * @since 3.0
     */
    public function owt7_library_tbl_bookcase_sections() {
        global $wpdb;
        return $wpdb->prefix . 'owt7_lib_bookcase_sections';
    }

    /**
     * Return the branch table name.
     *
     * @since 3.0
     */
    public function owt7_library_tbl_branch() {
        global $wpdb;
        return $wpdb->prefix . 'owt7_lib_branch';
    }

    /**
     * Return the category table name.
     *
     * @since 3.0
     */
    public function owt7_library_tbl_category() {
        global $wpdb;
        return $wpdb->prefix . 'owt7_lib_category';
    }

    /**
     * Return the book borrow table name.
     *
     * @since 3.0
     */
    public function owt7_library_tbl_book_borrow() {
        global $wpdb;
        return $wpdb->prefix . 'owt7_lib_book_borrow';
    }

    /**
     * Return the book return table name.
     *
     * @since 3.0
     */
    public function owt7_library_tbl_book_return() {
        global $wpdb;
        return $wpdb->prefix . 'owt7_lib_book_return';
    }

    /**
     * Return the book late fine table name.
     *
     * @since 3.0
     */
    public function owt7_library_tbl_book_late_fine() {
        global $wpdb;
        return $wpdb->prefix . 'owt7_lib_book_late_fine';
    }
}
?>
