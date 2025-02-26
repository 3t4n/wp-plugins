<?php
namespace ANoteAbove\Api;

use WP_REST_Controller;

/**
 * REST_API Handler
 */
class WPNAPI extends WP_REST_Controller {

    /**
     * initialize endpoints
     */
    public function __construct() {
        $this->namespace    = 'anoteaboves/v1';
        $this->rest_base    = 'notes';
        $this->save_note    = 'save_note';
        $this->new_note     = 'new_note';
        $this->delete_note  = 'delete_note';
    }

    /**
     * Register the routes
     *
     * @return void
     */
    public function register_routes() {
        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base,
            array(
                array(
                    'methods'             => \WP_REST_Server::READABLE,
                    'callback'            => array( $this, 'get_notes' ),
                    'permission_callback' => array( $this, 'get_items_permissions_check' )
                )
            )
        );

        register_rest_route(
            $this->namespace,
            '/' . $this->save_note,
            array(
                array(
                    'methods'             => \WP_REST_Server::EDITABLE,
                    'callback'            => array( $this, 'save_note' ),
                    'permission_callback' => array( $this, 'get_items_permissions_check' )
                )
            )
        );

        register_rest_route(
            $this->namespace,
            '/' . $this->new_note,
            array(
                array(
                    'methods'             => \WP_REST_Server::READABLE,
                    'callback'            => array( $this, 'new_note' ),
                    'permission_callback' => array( $this, 'get_items_permissions_check' )
                )
            )
        );

        register_rest_route(
            $this->namespace,
            '/' . $this->delete_note,
            array(
                array(
                    'methods'             => \WP_REST_Server::EDITABLE,
                    'callback'            => array( $this, 'delete_note' ),
                    'permission_callback' => array( $this, 'get_items_permissions_check' )
                )
            )
        );
    }

    /**
     * Retrieves a collection of items.
     *
     * @param WP_REST_Request $request Full details about the request.
     *
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function get_notes( $request ) {

        global $wpdb;
        $table = $wpdb->prefix . '_anoteabove';
        $results = $wpdb->get_results(
                    "SELECT * FROM {$table}"
                 );

        if (is_null( $results )) {
          return $results;
        }

        $formatted_notes = $this->format_notes($results);

        $response = rest_ensure_response( $formatted_notes );

        return $response;
    }


    /**
     * Process and escape notes appropriate for current user
     * @param  array $notes array of note objects raw from the database
     * @return array        array of appropriate note objects
     */
    private function format_notes( $notes ) {
      $return_array = array();
      $author = get_current_user_id();

      foreach ($notes as $key => $note) {
        $see_result = $this->can_user_see($note);

        if ( $see_result === false ) {
          continue;
        }
        $private_result = $this->is_private_note($note);
        if ( ($private_result === '1') && ($author != $note->author) ) {
            continue;
        }

        $formatted_note = (object) array(
          'content'           =>  wp_kses($note->content, 'post'),
          'id'                =>  intval($note->id),
          'ownerID'           =>  intval($note->author),
          'roleVisibility'    =>  wp_validate_boolean($note->role_visibility),
          'selectedRole'      =>  wp_kses($note->selected_role, 'strip'),
          'sharedVisibility'  =>  wp_validate_boolean($note->shared),
          'singleVisibility'  =>  wp_validate_boolean($note->single_visibility),
          'title'             =>  wp_kses($note->title, 'strip')
        );
        array_push( $return_array, $formatted_note );
      }

      return $return_array;
    }

    /**
     * Saves a note.
     *
     * @param WP_REST_Request $request New note to save.
     *
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function save_note( $request  ) {

      $body = (array) $request->get_body();

      $note = json_decode($body[0]);
      // Sanitize
      // Formalize for Database
      $sanitized_note = $this->sanitize_note($note);
      // Store in Database
      $file_status = $this->file_note( $sanitized_note );

      return rest_ensure_response( $file_status );
    }

    /**
     * Update or Insert new note by note->id
     * @param  object $note freshly sanitized note data
     * @return object      database response with the sanitized note data
     */
    private function file_note($note){
      global $wpdb;

      $table= $wpdb->prefix . '_anoteabove';
      $data = array(
        'id'  =>  $note->id,
        'title' =>  $note->title,
        'content' =>  $note->content,
        'shared'  =>  $note->sharedVisibility,
        'single_visibility' =>  $note->singleVisibility,
        'role_visibility' =>  $note->roleVisibility,
        'selected_role' =>  $note->selectedRole,
        'author'  =>  $note->ownerID,
        'meta'  =>  json_encode( array() )
      );
      $data_values = array(
        '%d', // id
        '%s', // title
        '%s', // content
        '%d', // shared
        '%d', // single_visibility
        '%s', // role_visibility
        '%s', // selected_role
        '%s', // author
        '%s', // meta
      );
      $wpdb->show_errors();
      $response = $wpdb->replace( $table, $data, $data_values );

      if($wpdb->last_error !== '') :
          $wpdb->print_error();
      endif;

      $response_parcel = (object) array(
        'response' => $response,
        'note'    => $note
      );
      return $response_parcel;

    }

    /**
     * Checks if a given request has access to read the items.
     *
     * @param  WP_REST_Request $request Full details about the request.
     *
     * @return true|false True if the request has read access, false otherwise.
     */
    public function get_items_permissions_check( $request ) {

        $headers = $request->get_headers();

        $anoteabove_nonce = $headers['x_wp_nonce'][0] ?? '';

        if ( ! wp_verify_nonce( $anoteabove_nonce, 'wp_rest' )) {
          die( 'Security Check' );
        }


        if (! is_user_logged_in() ) {
          return false;
        }


        if (! current_user_can( 'read' ) ) {
          return false;
        }

        return true;
    }

    /**
     * Prepare raw note data for database entry
     * @param  object $note raw user entry note
     * @return object       sanitized note ready for db insert
     */
    private function sanitize_note($note) {

      // sanitize_text_field
      $sanitized_note = (object) array(
        'id'                =>  intval($note->id) ?? '',
        'ownerID'           =>  intval($note->ownerID) ?? '',
        'title'             =>  sanitize_text_field($note->title),
        'content'           =>  sanitize_textarea_field($note->content),
        'roleVisibility'    =>  wp_validate_boolean($note->roleVisibility),
        'selectedRole'      =>  sanitize_text_field($note->selectedRole),
        'sharedVisibility'  =>  wp_validate_boolean($note->sharedVisibility),
        'singleVisibility'  =>  wp_validate_boolean($note->singleVisibility),
      );

      return $sanitized_note;
    }



    private function is_private_note( $note ) {

      $maybe_private_note = '0';

      $maybe_private_note = $note->single_visibility;

      return $maybe_private_note;
    }



    /**
     * test if note is hidden
     * @param  object $note The note object
     * @return boolean $maybe_see If user is able to view the note
     */
    private function can_user_see($note) {
      $maybe_see = '1';

      if ($note->role_visibility == '0') {
        return $maybe_see;
      }
      if ($note->selected_role == 'Subscribers') {
        $maybe_see = current_user_can( 'read' );
      }

      if ($note->selected_role == 'Contributor') {
        $maybe_see = current_user_can( 'delete_posts' );
      }

      if ($note->selected_role == 'Author') {
        $maybe_see = current_user_can( 'delete_published_posts' );
      }

      if ($note->selected_role == 'Editor') {
        $maybe_see = current_user_can( 'delete_pages' );
      }

      if ($note->selected_role == 'Admin') {
        $maybe_see = current_user_can( 'manage_options' );
      }

      return $maybe_see;

    }


    /**
     * New Note Controller
     * @return object A new note
     */
    public function new_note() {

      $note_number = intval( get_option( 'wp_note_stack' ) );
      $note_number++;
      $new_note = $this->create_new_note( $note_number );
      update_option( 'wp_note_stack', $note_number );

      return rest_ensure_response( $new_note );
    }

    /**
     * New Note object generator
     * @param  int $note_id New Note ID
     * @return object          New note object with note id & author id
     */
    private function create_new_note( $note_id ) {

      $new_note = (object) array(
        'id'                  =>  $note_id,
        'ownerID'             =>  get_current_user_id(),
        'title'               =>  '',
        'content'             =>  '',
        'roleVisibility'      =>  false,
        'selectedRole'        =>  '',
        'sharedVisibility'    =>  true,
        'singleVisibility'    =>  '',
        'newNote'             =>  true,
      );

      return $new_note;
    }


    // Delete note controller
    public function delete_note( $request  ) {

      $body = (array) $request->get_body();

      $note = json_decode($body[0]);

      $note_removal_status = $this->remove_note( $note );

      $return_parcel = (object) array(
        'note'    =>  $note,
        'status'  =>  $note_removal_status
      );

      return rest_ensure_response( $return_parcel );
    }


    /**
     * Remove note from database by id number
     * @param  object $note Note object to be removed from wpdb
     * @return int|false       The number of rows updated, or false
     */
    private function remove_note( $note ) {
      global $wpdb;

      $table = $wpdb->prefix . '_anoteabove';

      $removal_result = $wpdb->delete(
          $table, // table to delete from
          array(
              'id' => intval($note->id) // value in column to target for deletion
          ),
          array(
              '%d' // format of value being targeted for deletion
          )
      );

      return $removal_result;
    }

}
