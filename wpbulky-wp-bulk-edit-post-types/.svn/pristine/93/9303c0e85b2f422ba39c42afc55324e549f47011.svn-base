<?php

namespace BULKYWP\Admin;

defined( 'ABSPATH' ) || exit;

class Filters {

	protected static $instance = null;
	protected $filter;

	public function __construct() {
		add_filter( 'posts_where', [ $this, 'add_filter_to_posts_where' ] );
	}

	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public function set_args( $args ) {
		global $wpbulky_post_type;
		$user_id = get_current_user_id();
		$filter  = get_transient( "vi_wpbulky_{$wpbulky_post_type}_filter_data_{$user_id}" );

		if ( empty( $filter ) ) {
			return $args;
		}

		$this->filter = $filter;

		if ( ! empty( $filter['id'] ) && strpos( $filter['id'], '-' ) === false ) {
			$args['post__in'] = explode( ',', str_replace( ' ', '', $filter['id'] ) );
		}

		if ( ! empty( $filter['post_status'] ) ) {
			$args['post_status'] = $filter['post_status'];
		}

		if ( ! empty( $filter['author'] ) ) {
			$args['author'] = $filter['author'];
		}

		$args = $this->set_tax_query( $args );

		return $args;
	}

	public function set_tax_query( $wp_query_args ) {
		if ( empty( $this->filter ) ) {
			return $wp_query_args;
		}

		$taxonomies = $this->filter['taxonomies'] ?? '';
		if ( empty( $taxonomies ) || ! is_array( $taxonomies ) ) {
			return $wp_query_args;
		}

		$operators = $this->filter['operator'] ?? [];
		foreach ( $taxonomies as $taxonomy => $terms ) {
			if ( empty( array_filter( $terms ) ) ) {
				continue;
			}

			$operator = ! empty( $operators[ $taxonomy ] ) ? $operators[ $taxonomy ] : 'IN';
			switch ( $operator ) {
				case 'or':
					$operator = 'IN';
					break;
				case 'and':
					$operator = 'AND';
					break;
				case 'not_in':
					$operator = 'NOT IN';
					break;
			}

			$wp_query_args['tax_query'][] = [
				'taxonomy'         => $taxonomy,
				'field'            => 'slug',
				'terms'            => $terms,
				'include_children' => true,
				'operator'         => $operator
			];
		}

		if ( ! empty( $wp_query_args['tax_query'] ) ) {
			$wp_query_args['tax_query']['relation'] = 'AND';
		}

		return $wp_query_args;
	}

	public function add_filter_to_posts_where( $where ) {
		if ( empty( $this->filter ) ) {
			return $where;
		}

		global $wpdb;

		$filter = $this->filter;

		if ( ! empty( $filter['id'] ) && strpos( $filter['id'], '-' ) !== false ) {
			$ids      = array_filter( explode( '-', str_replace( ' ', '', $filter['id'] ) ) );
			$count_id = count( $ids );
			if ( $count_id == 1 ) {
				$id    = absint( $ids[0] );
				$where .= " AND {$wpdb->posts}.ID = {$id} ";
			} elseif ( $count_id == 2 ) {
				$start_id = absint( $ids[0] );
				$end_id   = absint( $ids[1] );

				if ( $start_id < $end_id ) {
					$where .= " AND {$wpdb->posts}.ID > {$start_id} AND {$wpdb->posts}.ID < {$end_id} ";
				} elseif ( $start_id > $end_id ) {
					$where .= " AND {$wpdb->posts}.ID > {$end_id} AND {$wpdb->posts}.ID < {$start_id} ";
				} else {
					$where .= " AND {$wpdb->posts}.ID = {$start_id} ";
				}
			}
		}

		if ( ! empty( $filter['post_date_from'] ) ) {
			$where .= " AND post_date >= '{$filter['post_date_from']}' ";
		}

		if ( ! empty( $filter['post_date_to'] ) ) {
			$where .= " AND post_date <= '{$filter['post_date_to']}' ";
		}


		$where .= $this->text_search();

		unset( $this->filter );

		return $where;
	}

	public function text_search() {
		$items = array_map( function ( $key ) {
			return [
				'type'     => $key,
				'value'    => $this->filter[ $key ] ?? '',
				'behavior' => $this->filter['behavior'][ $key ] ?? '',
			];
		}, [ 'post_title', 'post_content', 'post_excerpt', 'post_name' ] );

		if ( empty( $items ) || ! is_array( $items ) ) {
			return '';
		}

		$where = '';

		foreach ( $items as $item ) {
			if ( ! $item['value'] && $item['behavior'] !== 'empty' ) {
				continue;
			}

			$type  = $item['type'];
			$value = sanitize_text_field( wp_specialchars_decode( trim( urldecode( $item['value'] ) ) ) );

			$query = '';
			switch ( $item['behavior'] ) {
				case 'empty':
					$query .= "{$type} =''";
					break;

				case 'exact':
					$query .= "{$type} ='{$value}'";
					break;

				case 'not':
					$query .= "{$type} NOT LIKE '%{$value}%'";
					break;

				case 'begin':
					$query .= "{$type} REGEXP '^{$value}'";
					break;

				case 'end':
					$query .= "{$type} REGEXP '{$value}$'";
					break;

				default:
					$query .= "{$type} LIKE '%{$value}%'";
					break;
			}

			if ( $query ) {
				$where .= " AND ($query)";
			}
		}

		return $where;
	}

}