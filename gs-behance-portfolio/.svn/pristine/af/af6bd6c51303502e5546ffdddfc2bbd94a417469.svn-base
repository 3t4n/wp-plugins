<?php
namespace GSBEH;

// if direct access than exit the file.
defined('ABSPATH') || exit;

/**
 * Handle database utils
 * 
 * @since 2.0.12
 */
class DataLayer {

    /**
     * Saves Behance user id if it's already not in the options.
     * 
     * @since  2.0.12
     * @return void
     */
    public function maybeSaveUserId( $userId, $offsetClock = 1 ) {
        $savedUserIds = (array) get_option( 'be_meta', [] );
        $savedUserIds[ $userId ] = $offsetClock;
        update_option( 'be_meta', $savedUserIds );
    }

    /**
     * Delete saved user ids.
     * 
     * @since 2.0.12
     * 
     * @param string $userId The behance user id.
     */
    public function deleteSavedUserIds( $userId = null ) {

        $savedUserIds = (array) get_option( 'be_meta', [] );
    
        if ( ! empty( $savedUserIds ) ) {
            
            if ( ! empty( $userId ) ) {
                if ( array_key_exists( $userId, $savedUserIds ) ) {
                    $savedUserIds[ $userId ] = 0;
                }
            } else {
                foreach ( $savedUserIds as $user => $page ) {
                    $savedUserIds[ $user ] = 0;
                }
            }

        }
    
        update_option( 'be_meta', $savedUserIds );
    }

    /**
     * Get all the saved shots from DB by behance user ID and limit.
     * 
     * @since 2.0.12
     * 
     * @param string $userId Behance user id.
     * @param int    $count  Result limit.
     * 
     * @return string|array returns saved shots by the user id or the status if shots are empty.
     */
    public function getShots( $userId, $count = '', $orderby = '', $order = '' ) {
        global $wpdb;
        $table = gsbeh()->db->getDataTable();

        $query = sprintf( "SELECT * FROM `%s` WHERE beusername='%s' ", $table, $userId );

        if ( ! empty( $orderby ) ) {
            $query .= sprintf( "ORDER BY `%s` ", $orderby );
        }

        if ( ! empty( $order ) ) {
            $query .= "ASC ";
        }

        if ( ! empty( $count ) ) {
            $query .= sprintf( "LIMIT %d ", $count );
        }

        $shots = $wpdb->get_results( $query, ARRAY_A );

        return empty( $shots ) ? [] : $shots;
    }

    /**
     * Get all the saved shots from db.
     * 
     * @since 2.0.12
     * 
     * @param int    $count Result limit.
     * @return string|array Returns saved shots by the user id or the status if shots are empty.
     */
    public function getAll( $count = '' ) {
        global $wpdb;
		$table = gsbeh()->db->getDataTable();

        if ( empty( $limit ) ) {
            $query = "SELECT * FROM {$table}";
        } else {
            $query = $wpdb->prepare(
                "SELECT * FROM {$table} LIMIT %d ",
                $count
            );
        }

        $shots = $wpdb->get_results( $query, ARRAY_A );

        return empty( $shots ) ? [] : $shots;
    }

    /**
     * Saves given data to the database.
     * 
     * @since 2.0.12
     * 
     * @param mixed $userId Behance user id.
     * @param array $shots  Associate user behance shots.
     * 
     * @return void
     */
    public function save( $userId, $shots ) {

        global $wpdb;
        $table_name = gsbeh()->db->getDataTable();

        if ( is_array( $shots ) && count( $shots ) > 0 ) {

            // Delete everything with this username before saving new data
            $wpdb->delete(
                $table_name,
                array( 'beusername' => $userId ),
                array( '%s' )
            );

            foreach ( $shots as $shot ) {

                if( empty( $shot['id'] ) ) return;

                $beid       = $shot['id'];
                $b_name     = $shot['name'] ?? '';
                $b_fields   = serialize( $shot['fields'] );
                $b_url      = $shot['url'];
                $blike      = $shot['stats']['appreciations'];
                $bview      = $shot['stats']['views'];
                $bcomment   = $shot['stats']['comments'];
                $created_on = $shot['created_on'];

                if ( isset( $shot[ 'covers' ][404] ) ) {
                    $thum_image = $shot[ 'covers' ][404];
                } else {
                    $thum_image = $shot[ 'covers' ][ 'max_808' ];
                }

                if ( isset( $shot[ 'covers' ][ 'original' ] ) ) {
                    $big_img = $shot[ 'covers' ][ 'original' ];
                }

                $data = array(
                    'beid'       => $beid,
                    'beusername' => $userId,
                    'name'       => $b_name,
                    'url'        => $b_url,
                    'bview'      => $bview,
                    'blike'      => $blike,
                    'bcomment'   => $bcomment,
                    'bfields'    => $b_fields,
                    'big_img'    => $big_img,
                    'thum_image' => $thum_image,
                    'time'       => date( 'Y-m-d H:i:s', $created_on ),
                );

                // Insert to the db.
                $wpdb->insert( $table_name, $data );
            }

        }
    }

    /**
     * Saves or Updates data based on the user id.
     * 
     * @since 2.0.12
     * 
     * @author apurba
     * 
     * @param  string $gs_beh_user The behance user id.
     * @return void
     */
    public function updateData( $gs_beh_user ) {

        $behance_url   = "https://www.behance.net/";
        $be_meta   	   = (array) get_option( 'be_meta', [] );
    
        if ( empty( $be_meta ) || ! array_key_exists( $gs_beh_user, $be_meta ) ) {
            return;
        }

        $project_count = 12;
        $offset        = 0;
        $page          = absint( $be_meta[ $gs_beh_user ] );
        $offsetClock   = ceil( $page / $project_count );
        $counterClock  = 1;

        $gsbeh_baseurl   = $behance_url . $gs_beh_user;
        $collectedShots  = [];

        while ( $offsetClock >= $counterClock ) {
            // Update offset
            $gsbeh_url = $gsbeh_baseurl . "/projects?offset=$offset";

            // Scrape and filter projects
            $gs_behance_shots = gsbeh()->scrapper->scrape( $gsbeh_url );
            $gs_behance_shots = gsbeh()->scrapper->filterShots( $gs_behance_shots );

            $collectedShots = array_merge( $collectedShots, $gs_behance_shots );
            $offset = $offset === 1 ? $offset + 11 : $offset + 12;
            $counterClock++;
        }
        
        // Save data
        if ( $collectedShots ) {
            gsbeh()->data->save( $gs_beh_user, $collectedShots );
        }
    
    }
}