<?php
/**
 * Rule Set
 *
 * @category Class
 * @package ACFG
 * @subpackage ACFGRuleSet
 * @since 1.0.0
 */

namespace Refact\ACFG;

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Register Plugin Blocks
 *
 * @package ACFG
 * @subpackage ACFGRuleSet
 * @since 1.0.0
 */
/**
 * All ajax request and methods
 *
 * @category Class
 * @package ACFG
 * @subpackage ACFGRuleSet
 * @since  1.0.0
 * @global $wpdb
 */
class RuleSet
{
    /**
     * Get current post type
     * Checks if it is a new post or edit post
     *
     * @since 1.0.0
     * @return string
     */
    private static function _get_post_type()
    {
        global $pagenow;

        $post_type = false;

        $post_type = false;

        if ( 'post.php' === $pagenow && isset( $_GET['post'] ) ) {
            $post_type = get_post_type( sanitize_text_field( wp_unslash( $_GET['post'] ) ) );
        } elseif ( 'post-new.php' === $pagenow ) {
            $post_type = isset( $_GET['post_type'] )
                        ? sanitize_text_field( wp_unslash( $_GET['post_type'] ) )
                        : 'post';
        }

        return $post_type;
    }

    /**
     * Get current user
     *
     * @since 1.0.0
     * @return array
     */
    private static function _get_user()
    {
        $user = wp_get_current_user();

        $user_data = array(
            'id'    => $user->ID,
            'roles' => $user->roles,
        );

        return $user_data;
    }

    /**
     * Get rule map
     *
     * @since 1.0.0
     * @param  array  $rules      Added rule set by user.
     * @param  string $post_type  Current post type.
     * @param  int    $user_id    Current user id.
     * @return array  $rule_map   Valid Rule map
     */
    public static function rule_map( $rules, $post_type = '', $user_id = false )
    {
        $rule_map = array();
        $current_post_type = !empty($post_type) ? $post_type : self::_get_post_type();
        $user = self::_get_user();
        $user_id    = $user ? $user['id'] : false;
        $user_roles = $user ? $user['roles'] : false;
        $user_role  = isset($user_roles[0]) ? $user_roles[0] : false;

        if (empty($rules)) {
            return $rule_map;
        }
    
        foreach ($rules as $index => $rule) {
            if (!$rule['rule_status'] || !$rule['rule_set']) {
                continue;
            }
    
            foreach ($rule['rule_set'] as $rule_key => $ruleset) {
                $apply_value = self::get_apply_value($ruleset, $current_post_type, $user_role, $user_id);
    
                if (!self::can_apply($ruleset, $apply_value)) {
                    continue;
                }
    
                if (isset($ruleset['ands'])) {
                    if (self::can_apply_ands($ruleset, $current_post_type, $user_role, $user_id)) {
                        $rule_map[$index] = $rule;
                    }
                } else {
                    $rule_map[$index] = $rule;
                }
            }
        }
    
        return $rule_map;
    }

    /**
     * Get apply value
     *
     * @since 1.0.0
     * @param  array  $ruleset  Rule set.
     * @param  string $current_post_type Current post type.
     * @param  string $user_role Current user role.
     * @param  int    $user_id Current user id.
     * @return string $apply_value Apply value.
     */
    private static function get_apply_value($ruleset, $current_post_type, $user_role, $user_id)
    {
        switch ($ruleset['type']) {
            case 'post_type':
                return $current_post_type;
            case 'user_role':
                return $user_role;
            case 'user_name':
                return $user_id;
        }
    }

    /**
     * Check if rule can be applied
     *
     * @since  1.0.0
     * @param  array  $rule  Rule set.
     * @param  string $match_phrase Match value.
     * @return bool
     */
    public static function can_apply( $rule, $match_phrase )
    {
        if ( 'equal_to' === $rule['operand']
            && $match_phrase == $rule['ruleValues'][0]['id'] ) { // phpcs:ignore
            return true;
        } elseif ( 'not_equal_to' === $rule['operand']
            && $match_phrase != $rule['ruleValues'][0]['id'] ) { // phpcs:ignore
            return true;
        } elseif ( 'is_one_of' === $rule['operand']
            && in_array(
                $match_phrase,
                array_column( $rule['ruleValues'], 'id' )
            )
                ) {
            return true;
        } elseif ( 'is_not_one_of' === $rule['operand']
            && ! in_array(
                $match_phrase,
                array_column( $rule['ruleValues'], 'id' )
            )
                ) {
            return true;
        } else {
            return false;
        }

        return false;
    }

    /**
     * Check if `and` sub rules can be applied
     *
     * @since  1.0.0
     * @param  array  $ruleset  Rule set.
     * @param  string $current_post_type Current post type.
     * @param  string $user_role Current user role.
     * @param  int    $user_id Current user id.
     * @return bool
     */
    private static function can_apply_ands($ruleset, $current_post_type, $user_role, $user_id)
    {
        foreach ($ruleset['ands'] as $and_key => $rule_and) {
            $and_apply_value = self::get_apply_value($rule_and, $current_post_type, $user_role, $user_id);

            if (!self::can_apply($rule_and, $and_apply_value)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get action map
     *
     * @since 1.0.0
     * @param  array  $rule_map   Valid Rule map.
     * @param  string $type       Type of action map.
     * @param  array  $wp_blocks  WP Blocks.
     * @return array  $action_map Action map.
     */
    public static function action_map( $rule_map, $type = 'block', $wp_blocks = array() )
    {
        $action_map = array();

        if (empty($rule_map)) {
            return $action_map;
        }
    
        foreach ($rule_map as $rule) {
            if (!isset($rule['rule_action']) || !isset($rule['blocks'])) {
                continue;
            }
    
            $blocks = array_column($rule['blocks'], 'id');
            $categories = isset($rule['categories']) ? array_column($rule['categories'], 'id') : array();
    
            if ($type === 'block') {
                $action_map = self::handle_block_type($rule, $blocks, $categories, $wp_blocks, $action_map);
            } elseif ($type === 'setting') {
                $action_map = self::handle_setting_type($rule, $blocks, $action_map);
            }
        }
    
        return $action_map;
    }

    /**
     * Handle block type
     *
     * @since 1.0.0
     * @param  array  $rule        Rule set.
     * @param  array  $blocks      Blocks.
     * @param  array  $categories  Categories.
     * @param  array  $wp_blocks   WP Blocks.
     * @param  array  $action_map  Action map.
     * @return array  $action_map  Action map.
     */
    private static function handle_block_type($rule, $blocks, $categories, $wp_blocks, $action_map)
    {
        switch ($rule['rule_action']) {
            case 'enable_blocks':
            case 'disable_blocks':
                $value = $rule['rule_action'] === 'enable_blocks';
                foreach ($blocks as $block) {
                    // Unset and then set the block if it already exists, this helps to apply the order of blocks properly (specially if `all` block selected)
                    unset($action_map[$block]);
                    $action_map[$block] = $value;
                }
                break;
            case 'enable_blocks_by_category':
            case 'disable_blocks_by_category':
                $value = $rule['rule_action'] === 'enable_blocks_by_category';
                foreach ($categories as $category) {
                    foreach ($wp_blocks as $wp_block) {
                        if ($category === $wp_block->category) {
                            unset($action_map[$wp_block->name]);
                            $action_map[$wp_block->name] = $value;
                        }
                    }
                }
                break;
        }

        return $action_map;
    }

    /**
     * Handle setting type
     *
     * @since 1.0.0
     * @param  array  $rule       Rule set.
     * @param  array  $blocks     Blocks.
     * @param  array  $action_map Action map.
     * @return array  $action_map Action map.
     */
    private static function handle_setting_type($rule, $blocks, $action_map)
    {
        $supports = array_column($rule['supports'], 'id');

        switch ($rule['rule_action']) {
            case 'enable_settings':
            case 'disable_settings':
                $value = $rule['rule_action'] === 'enable_settings';
                foreach ($blocks as $block) {

                    // Count occurrences of block names that start with $block.'_'
                    $block_names = array_keys($action_map);
                    $block_count = 0;
                    foreach ($block_names as $name) {
                        if (strpos($name, $block . '_') === 0) {
                            $block_count++;
                        }
                    }
                    $block_new_name = $block . '_' . $block_count;

                    foreach ($supports as $support) {
                        $action_map[$block_new_name][$support] = $value;
                    }
                }
                break;
        }

        return $action_map;
    }

}
