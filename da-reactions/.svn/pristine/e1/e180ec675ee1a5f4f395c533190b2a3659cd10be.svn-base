<?php
namespace DaReactions;
use Exception;
/**
 * For GDPR compliance, performs all Privacy related tasks
 * @since 3.20.0
 */
class Privacy {
    /**
     * Finds and anonymize personal data associated with an email address from the Reactions tables.
     *
     * @param string $email_address The users email address.
     *
     * @return array An array of personal data.
     * @throws Exception
     * @since 3.20.0
     *
     */
    public function eraseVotesByUserEmail( $email_address )
    {
        global $wpdb;
        $number         = 500;
        $count          = 0;
        $items_removed  = false;
        $items_retained = false;
        $messages       = array();
        if ( empty( $email_address ) ) {
            return array(
                'items_removed'  => false,
                'items_retained' => false,
                'messages'       => array(),
                'done'           => true,
            );
        }
        $page  = 1;
        $votes = Data::getAllVotesForUserByEmail( $email_address, $number, $page );
        foreach ( $votes as $vote ) {
            $count ++;
            $anonymized_reaction                  = array();
            $anonymized_reaction['resource_id']   = (int) $vote['resource_id'];
            $anonymized_reaction['resource_type'] = $vote['resource_type'];
            $anonymized_reaction['emotion_id']    = (int) $vote['emotion_id'];
            $anonymized_reaction['user_id']       = 0;
            $anonymized_reaction['user_token']    = Utils::hash(time().toString(), 16);
            $anonymized_reaction['user_ip']       = wp_privacy_anonymize_data( 'ip', $vote['user_ip'] );
            $args = array(
                'ID' => $vote['ID'],
            );
            $updated = $wpdb->update(
                Data::getVotesTable(),
                $anonymized_reaction,
                $args
            );
            if ( $updated ) {
                $items_removed = true;
                Cache::delete( [ "reaction{$vote['ID']}" ] );
            } else {
                $items_retained = true;
	            // translators: %d is the vote ID
	            $messages[] = sprintf( __( 'Error while erasing Vote #%d', 'da-reactions' ), $vote['ID'] );
            }
        }
        return array(
            'items_removed'  => $items_removed,
            'items_retained' => $items_retained,
            'messages'       => $messages,
            'done'           => $number > $count
        );
    }
    /**
     * Finds and exports personal data associated with an email address from the Reactions tables.
     *
     * @param string $email_address The users email address.
     * @param int $page Batch number.
     *
     * @return array An array of personal data.
     * @since 3.20.0
     *
     */
    public function exportVotesByUserEmail( $email_address, $page )
    {
        $number = 500;
        $export_items = [];
        $sorted_reactions = [];
        $reactions        = Data::getAllReactions();
        foreach ( $reactions as $reaction ) {
            $sorted_reactions[ $reaction->ID ]        = $reaction;
            $sorted_reactions[ $reaction->ID ]->image = FileSystem::getImageUrl( $reaction->file_name );
        }
        $votes = Data::getAllVotesForUserByEmail( $email_address, $number, $page );
        foreach ( $votes as $vote ) {
            $group_id    = 'da-reactions-votes-' . $vote['resource_type'];
	        // translators: %s: resource type
            $group_label = sprintf( _x( 'Reactions to %s', 'Group label in privacy exporter', 'da-reactions' ), $vote['resource_type'] );
            $item_id     = 'da-reactions-vote-' . $vote['ID'];
            $resource_string = $vote['resource_type'] . ' #' . $vote['resource_id'];
            $reaction_string = '#' . $vote['emotion_id'] . ' - ';
            if ( isset( $sorted_reactions[ $vote['emotion_id'] ] ) ) {
                $reaction_string .= $sorted_reactions[ $vote['emotion_id'] ]->label;
            }
            $data = array(
                array(
                    'name'  => _x( 'Resource', 'Property name in privacy exporter', 'da-reactions' ),
                    'value' => $resource_string
                ),
                array(
                    'name'  => _x( 'Reaction', 'Property name in privacy exporter', 'da-reactions' ),
                    'value' => $reaction_string
                ),
                array(
                    'name'  => _x( 'Reaction date', 'Property name in privacy exporter', 'da-reactions' ),
                    'value' => $vote['created_at']
                )
            );
            $export_items[] = [
                'group_id'    => $group_id,
                'group_label' => $group_label,
                'item_id'     => $item_id,
                'data'        => $data,
            ];
        }
        return array(
            'data' => $export_items,
            'done' => count( $export_items ) < $number,
        );
    }
    /**
     * Registers Reactions personal data exporter.
     *
     * @param array $exporters An array of personal data exporters.
     *
     * @return array An array of personal data exporters.
     * @since 3.20.0
     *
     */
    public function registerVotesExporters( $exporters )
    {
        $exporters['da-reactions'] = [
            'exporter_friendly_name' => __( 'Reactions', 'da-reactions' ),
            'callback'               => [ $this, 'exportVotesByUserEmail' ]
        ];
        return $exporters;
    }
    /**
     * Registers all data erasers.
     *
     * @param array $erasers An array of personal data erasers
     *
     * @return array An array of personal data erasers
     * @since 3.20.0
     */
    public function registerVotesErasers( $erasers )
    {
        $erasers['da-reactions'] = array(
            'eraser_friendly_name' => __( 'Reactions', 'da-reactions' ),
            'callback'             => [ $this, 'eraseVotesByUserEmail' ]
        );
        return $erasers;
    }
    public function addPrivacyPolicyContent()
    {
        if ( function_exists( 'wp_add_privacy_policy_content' ) ) {
            $general_options = Options::getInstance( 'general' );
            $cookies_enabled = $general_options->getOption( 'id_method_cookie', 'off' ) === 'on';
            $save_ip_address = $general_options->getOption( 'id_method_ip', 'off' ) === 'on';
            $anonymous_votes = $general_options->getOption( 'user_roles_restriction', 'off' ) !== 'on'
                               || $general_options->getOption( "user_role_unregistered", 'off' ) === 'on';
            $contents = [];
            $contents[] = '<p class="da-reactions-privacy">' . __( 'Privacy Policy for DaReactions plugin', 'da-reactions' ) . '</p> ';
            $contents[] = '<p class="da-reactions-privacy"> ';
            $contents[] = '<strong class="privacy-policy-tutorial">' . __( 'Suggested Text:', 'da-reactions' ) . '</strong> ';
            $contents[] = __( 'When you add a Reaction under a content on this site we save those informations: ', 'da-reactions' );
            $contents[] = '</p>';
            $contents[] = '<p>' . __( 'All logged-in users are saved as a numeric ID from the Users table. That ID can be used to link a vote record to a user.', 'da-reactions' ) . '</p>';
            if ( $anonymous_votes && $cookies_enabled ) {
                $contents[] = '<p>' . __( 'All unknown visitors receive a cookie on their browser.', 'da-reactions' ) . '</p>';
            }
            if ( $save_ip_address ) {
                $contents[] = '<p>' . __( 'Also, the public IP address is saved with the Reaction.', 'da-reactions' ) . '</p>';
            }
            wp_add_privacy_policy_content(
                __( 'DaReactions saves some information to keep track of voters.', 'da-reactions' ),
                wp_kses( wpautop( implode( '', $contents ), false ), 'post' )
            );
        }
    }
}
