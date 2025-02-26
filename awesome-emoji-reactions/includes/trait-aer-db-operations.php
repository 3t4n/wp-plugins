<?php
if (!defined('ABSPATH')) {
    exit;
}

trait aerppk_DB_Operations {
    protected function get_reactions_table() {
        global $wpdb;
        return $wpdb->prefix . 'aerppk_reactions';
    }

    protected function get_reaction($post_id, $user_id) {
        global $wpdb;
        
        $cache_key = 'aerppk_existing_' . $post_id . '_' . $user_id;
        $existing = wp_cache_get($cache_key, 'aerppk_reactions');
        
        if (false === $existing) {
            // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
            $table_name = $this->get_reactions_table();
            $query = $wpdb->prepare(
                "SELECT * FROM `" . esc_sql($table_name) . "` WHERE post_id = %d AND user_id = %s",
                $post_id,
                $user_id
            );
            // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.PreparedSQL.NotPrepared
            $existing = $wpdb->get_row($query);
            
            wp_cache_set($cache_key, $existing, 'aerppk_reactions', HOUR_IN_SECONDS);
        }
        
        return $existing;
    }

    protected function delete_reaction($post_id, $user_id) {
        global $wpdb;
        
        // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
        $result = $wpdb->delete(
            $this->get_reactions_table(),
            array(
                'post_id' => $post_id,
                'user_id' => $user_id
            ),
            array('%d', '%s')
        );

        if ($result !== false) {
            wp_cache_delete('aerppk_existing_' . $post_id . '_' . $user_id, 'aerppk_reactions');
            wp_cache_delete('aerppk_reactions_' . $post_id, 'aerppk_reactions');
        }

        return $result;
    }

    protected function update_reaction($post_id, $user_id, $emoji) {
        global $wpdb;
        
        // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
        $result = $wpdb->update(
            $this->get_reactions_table(),
            array('emoji' => $emoji),
            array(
                'post_id' => $post_id,
                'user_id' => $user_id
            ),
            array('%s'),
            array('%d', '%s')
        );

        if ($result !== false) {
            wp_cache_delete('aerppk_existing_' . $post_id . '_' . $user_id, 'aerppk_reactions');
            wp_cache_delete('aerppk_reactions_' . $post_id, 'aerppk_reactions');
        }

        return $result;
    }

    protected function insert_reaction($post_id, $user_id, $emoji) {
        global $wpdb;
        
        // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
        $result = $wpdb->insert(
            $this->get_reactions_table(),
            array(
                'post_id' => $post_id,
                'user_id' => $user_id,
                'emoji' => $emoji
            ),
            array('%d', '%s', '%s')
        );

        if ($result !== false) {
            wp_cache_delete('aerppk_existing_' . $post_id . '_' . $user_id, 'aerppk_reactions');
            wp_cache_delete('aerppk_reactions_' . $post_id, 'aerppk_reactions');
        }

        return $result;
    }

    protected function get_reactions_for_post($post_id) {
        global $wpdb;
        
        $cache_key = 'aerppk_reactions_' . $post_id;
        $results = wp_cache_get($cache_key, 'aerppk_reactions');
        
        if (false === $results) {
            // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
            $table_name = $this->get_reactions_table();
            $query = $wpdb->prepare(
                "SELECT emoji, COUNT(*) as count FROM `" . esc_sql($table_name) . "` WHERE post_id = %d GROUP BY emoji",
                $post_id
            );
            // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.PreparedSQL.NotPrepared
            $results = $wpdb->get_results($query);
            
            wp_cache_set($cache_key, $results, 'aerppk_reactions', HOUR_IN_SECONDS);
        }
        
        return $results;
    }

    protected function get_user_reactions($post_id, $user_id = null) {
        global $wpdb;
        
        if ($user_id === null) {
            if (!is_user_logged_in() && $this->options['allow_guests']) {
                $ip = '';
                if (isset($_SERVER['REMOTE_ADDR'])) {
                    $ip = sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR']));
                }
                $user_id = 'guest_' . ip2long($ip);
            } else {
                $user_id = get_current_user_id();
            }
        }

        $cache_key = 'aerppk_user_reactions_' . $post_id . '_' . $user_id;
        $reactions = wp_cache_get($cache_key, 'aerppk_reactions');
        
        if (false === $reactions) {
            // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
            $table_name = $this->get_reactions_table();
            $query = $wpdb->prepare(
                "SELECT emoji FROM `" . esc_sql($table_name) . "` WHERE post_id = %d AND user_id = %s",
                $post_id,
                $user_id
            );
            // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.PreparedSQL.NotPrepared
            $reactions = $wpdb->get_col($query);
            
            wp_cache_set($cache_key, $reactions, 'aerppk_reactions', HOUR_IN_SECONDS);
        }
        
        return $reactions;
    }
} 