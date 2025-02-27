<?php
namespace DaReactions\Entities;
use DaReactions\Data;
use stdClass;
use wpdb;
/**
 *
 */
class Reaction
{
    /**
     * Reaction ID.
     *
     * @since 3.21.0
     * @var int
     */
    public $ID;
    /**
     * Reaction Label.
     *
     * @since 3.21.0
     * @var string
     */
    public $label = '';
    /**
     * Reaction File Name.
     *
     * @since 3.21.0
     * @var string
     */
    public $file_name;
    /**
     * Reaction Creation Time.
     *
     * @since 3.21.0
     * @var string
     */
    public $created_at = '0000-00-00 00:00:00';
    /**
     * Reaction Color.
     *
     * @since 3.21.0
     * @var string
     */
    public $color = '#006699';
    /**
     * Reaction is Active.
     *
     * @since 3.21.0
     * @var boolean
     */
    public $active = true;
    /**
     * Reaction Sort Order.
     *
     * @since 3.21.0
     * @var int
     */
    public $sort_order = 0;
    /**
     * Stores the reaction object's sanitization level.
     *
     * Does not correspond to a DB field.
     *
     * @since 3.21.0
     * @var string
     */
    public $filter;
    /**
     * Stores the reaction count.
     *
     * Does not correspond to a DB field.
     *
     * @since 4.0.0
     * @var int
     */
    public $total = 0;
    /**
     * Stores the reaction percentage.
     *
     * Does not correspond to a DB field.
     *
     * @since 4.0.0
     * @var float
     */
    public $percentage = 0;
    /**
     * Stores a flag that is true if the current user reaction is the same.
     *
     * Does not correspond to a DB field.
     *
     * @since 4.0.0
     * @var int
     */
    public $current = false;
    /**
     * Constructor.
     *
     * @param Reaction|null $reaction Reaction object.
     *
     * @since 3.21.0
     */
    public function __construct(Reaction $reaction = null)
    {
        foreach (get_object_vars((object) $reaction) as $key => $value) {
            $this->$key = $value;
        }
    }
	/**
	 * @param $reaction
	 * @param $output
	 *
	 * @return array|Reaction|null
	 */
    public static function get_reaction($reaction = null, $output = OBJECT)
    {
        if (empty($reaction) && isset($GLOBALS['reaction'])) {
            $reaction = $GLOBALS['reaction'];
        }
        if ($reaction instanceof self) {
            $_reaction = $reaction;
        } elseif ($reaction instanceof stdClass) {
            $_reaction = self::fromData($reaction);
        } elseif (is_object($reaction)) {
            $_reaction = self::get_instance($reaction->ID);
        } elseif (is_array($reaction) && isset($reaction['ID'])) {
            $_reaction = self::get_instance($reaction['ID']);
        } elseif (is_array($reaction) && !isset($reaction['ID'])) {
            $_reaction = self::fromData($reaction);
        } else {
            return null;
        }
        if (!$_reaction) {
            return null;
        }
        if (ARRAY_A === $output) {
            return $_reaction->to_array();
        }
        if (ARRAY_N === $output) {
            return array_values($_reaction->to_array());
        }
        return $_reaction;
    }
    /**
     * Retrieve Reaction instance.
     *
     * @param int $reaction_id Reaction ID.
     *
     * @return Reaction|false Reaction object, false otherwise.
     * @since 3.21.0
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     */
    public static function get_instance($reaction_id)
    {
        global $wpdb;
        if (!$reaction_id) {
            return false;
        }
        $_reaction = wp_cache_get($reaction_id, Data::getReactionsTable(true));
        if (!$_reaction) {
            $reactions_table_name = Data::getReactionsTable();
            $_reaction = $wpdb->get_row($wpdb->prepare("SELECT * FROM $reactions_table_name WHERE ID = %d LIMIT 1", $reaction_id));
            if (!$_reaction) {
                return false;
            }
            $_reaction = self::sanitize_reaction($_reaction, 'raw');
            wp_cache_add($_reaction->ID, $_reaction, Data::getReactionsTable(true));
        } elseif (empty($_reaction->filter)) {
            $_reaction = self::sanitize_reaction($_reaction, 'raw');
        }
        return Reaction::fromData($_reaction);
    }
    public function sameReaction($reaction)
    {
        if ($reaction instanceof self) {
            return (
                $this->ID === $reaction->ID &&
                $this->label === $reaction->label &&
                $this->file_name === $reaction->file_name &&
                $this->color === $reaction->color &&
                $this->sort_order === $reaction->sort_order
            );
        }
        return false;
    }
    /**
     * Sanitizes every reaction field.
     *
     * If the context is 'raw', then the reaction object or array will get minimal
     * sanitization of the integer fields.
     *
     * @param object|Reaction|array $reaction The post object or array
     * @param string $context Optional. How to sanitize reaction fields.
     *
     * @return object|Reaction|array The now sanitized reaction object or array (will be the
     *                              same type as `$reaction`).
     * @since 3.21.0
     *
     */
    public static function sanitize_reaction($reaction, $context = 'display')
    {
        if (is_object($reaction)) {
            // Check if post already filtered for this context.
            if (isset($reaction->filter) && $context === $reaction->filter) {
                return $reaction;
            }
            if (!isset($reaction->ID)) {
                $reaction->ID = 0;
            }
            foreach (array_keys(get_object_vars($reaction)) as $field) {
                $reaction->$field = self::sanitize_reaction_field($field, $reaction->$field);
            }
            $reaction->filter = $context;
        } elseif (is_array($reaction)) {
            // Check if post already filtered for this context.
            if (isset($reaction['filter']) && $context === $reaction['filter']) {
                return $reaction;
            }
            if (!isset($reaction['ID'])) {
                $reaction['ID'] = 0;
            }
            foreach (array_keys($reaction) as $field) {
                $reaction[$field] = self::sanitize_reaction_field($field, $reaction[$field]);
            }
            $reaction['filter'] = $context;
        }
        return $reaction;
    }
    /**
     * Sanitizes a reaction field.
     *
     * @param string $field The Reaction Object field name.
     * @param mixed $value The Reaction Object value.
     *
     * @return mixed Sanitized value.
     * @since 3.21.0
     *
     */
    public static function sanitize_reaction_field($field, $value)
    {
        $int_fields = array('ID', 'sort_order');
        $bool_fields = array('active');
        if (in_array($field, $int_fields, true)) {
            $value = (int) $value;
        }
        if (in_array($field, $bool_fields, true)) {
            $value = (bool) $value;
        }
        return $value;
    }
    public static function fromData($data)
    {
        $reaction = new self();
        foreach ($data as $key => $value) {
            // Verifica se la proprietà esiste nella classe
            if (property_exists($reaction, $key)) {
                $reaction->{$key} = $value;
            }
        }
        return $reaction;
    }
    /**
     * @return array
     */
    private function to_array()
    {
        return (array) $this;
    }
}
