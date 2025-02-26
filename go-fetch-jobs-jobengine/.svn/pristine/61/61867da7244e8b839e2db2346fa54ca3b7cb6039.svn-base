<?php

/**
 * Sets up the write panels used by the schedules (custom post types).
 *
 * @package GoFetch/Admin/Meta Boxes
 */
if ( !defined( 'ABSPATH' ) ) {
    die;
}
/**
 * Schedules meta boxes base class.
 */
class GoFetch_JobEngine_Schedule_Meta_Boxes
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        add_action( 'add_meta_boxes', array( $this, 'remove_meta_boxes' ), 10 );
        add_action( 'admin_init', array( $this, 'add_meta_boxes' ), 30 );
    }
    
    /**
     * Removes Meta boxes.
     */
    public function remove_meta_boxes()
    {
        $remove_boxes = array( 'authordiv' );
        foreach ( $remove_boxes as $id ) {
            remove_meta_box( $id, GoFetch_JobEngine()->post_type, 'normal' );
        }
    }
    
    /**
     * Add Meta boxes.
     */
    public function add_meta_boxes()
    {
        new GoFetch_JobEngine_Schedule_Import_Meta_Box();
        new GoFetch_JobEngine_Schedule_Cron_Meta_Box();
        new GoFetch_JobEngine_Schedule_Period_Meta_Box();
        new GoFetch_JobEngine_Schedule_Import_Author_Box();
    }

}
/**
 * The import settings meta box for the schedules.
 */
class GoFetch_JobEngine_Schedule_Import_Author_Box extends scbPostMetabox
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct( 'goft_je-author', __( 'Company', 'gofetch-je' ), array(
            'post_type' => GoFetch_JobEngine()->post_type,
            'context'   => 'side',
            'priority'  => 'low',
        ) );
    }
    
    public function before_form( $post )
    {
        global  $user_ID ;
        ?>
<label class="screen-reader-text" for="post_author_override2"><?php 
        _e( 'Company', 'gofetch-je' );
        ?>
</label><?php 
        $role_names = apply_filters( 'goft_je_user_roles', array() );
        $role_names[] = 'administrator';
        $roles = array();
        foreach ( $role_names as $name ) {
            $roles = array_merge( $roles, get_users( array(
                'role' => $name,
            ) ) );
        }
        $include = array();
        foreach ( $roles as $job_lister ) {
            $include[] = $job_lister->ID;
        }
        wp_dropdown_users( array(
            'include'  => implode( ',', $include ),
            'name'     => 'post_author_override',
            'id'       => 'post_author_override',
            'selected' => $post->post_author,
        ) );
    }
    
    public function after_form( $post )
    {
        echo  html( 'p', html( 'small style="text-align: justify;"', html( 'span class="dashicons-before dashicons-info"', ' ' ), __( 'Check the option above to let <em>Go Fetch Jobs</em> handle new companies by adding them to the DB or/and automatically assign them to their respective jobs, if the RSS feed provides that information.', 'gofetch-je' ) ) ) ;
    }
    
    public function form_fields()
    {
        return array( array(
            'title' => __( 'Create New/Auto Assign', 'gofetch-je' ),
            'type'  => 'checkbox',
            'name'  => '_goft_je_add_new_companies',
        ) );
    }

}
/**
 * The import settings meta box for the schedules.
 */
class GoFetch_JobEngine_Schedule_Import_Meta_Box extends scbPostMetabox
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct( 'goft_je-export', __( 'Import Template', 'gofetch-je' ), array(
            'post_type' => GoFetch_JobEngine()->post_type,
            'context'   => 'normal',
            'priority'  => 'high',
        ) );
    }
    
    public function before_form( $post )
    {
        echo  __( 'Select the pre-defined template to use in the import process. The process will use the selected template setup for importing jobs to your database.', 'gofetch-je' ) ;
    }
    
    /**
     * Meta box custom meta fields.
     */
    public function form_fields()
    {
        global  $goft_je_options ;
        
        if ( empty($goft_je_options->templates) ) {
            $templates = array(
                '' => __( 'No templates found', 'gofetch-je' ),
            );
        } else {
            $templates = array_keys( $goft_je_options->templates );
        }
        
        return array( array(
            'title'   => __( 'Template Name', 'gofetch-je' ),
            'type'    => 'select',
            'name'    => '_goft_je_template',
            'choices' => $templates,
            'desc'    => sprintf( __( '<a href="%s">Create Template</a>', 'gofetch-je' ), esc_url( add_query_arg( 'page', GoFetch_JobEngine()->slug, 'admin.php' ) ) ),
        ) );
    }

}
/**
 * The cron settings meta box for the schedules.
 */
class GoFetch_JobEngine_Schedule_Cron_Meta_Box extends scbPostMetabox
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct( 'goft_je-time', __( 'Schedule', 'gofetch-je' ), array(
            'post_type' => GoFetch_JobEngine()->post_type,
            'context'   => 'side',
        ) );
    }
    
    public function after_form( $post )
    {
        echo  __( '<strong>Daily:</strong> Runs every day / <strong>Weekly:</strong> Runs every monday / <strong>Monthly:</strong> Runs on the 1st of each month', 'gofetch-je' ) ;
    }
    
    /**
     * Meta box custom meta fields.
     */
    public function form_fields()
    {
        return array( array(
            'title'   => __( 'Run Once Every...', 'gofetch-je' ),
            'type'    => 'select',
            'name'    => '_goft_je_cron',
            'choices' => array(
            'daily'   => __( 'Day', 'gofetch-je' ),
            'weekly'  => __( 'Week', 'gofetch-je' ),
            'monthly' => __( 'Month', 'gofetch-je' ),
        ),
        ) );
    }

}
/**
 * The time period meta box for the schedules.
 */
class GoFetch_JobEngine_Schedule_Period_Meta_Box extends scbPostMetabox
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct( 'goft_je-content-period', __( 'Content', 'gofetch-je' ), array(
            'post_type' => GoFetch_JobEngine()->post_type,
            'context'   => 'normal',
        ) );
    }
    
    public function before_form( $post )
    {
        echo  __( 'Limit the content being imported by choosing the time period that should match the jobs being imported and the number of jobs to import every time this scheduled import runs.', 'gofetch-je' ) ;
    }
    
    /**
     * Meta box custom meta fields.
     */
    public function form_fields()
    {
        return array( array(
            'title'   => __( 'Jobs From...', 'gofetch-je' ),
            'type'    => 'select',
            'name'    => '_goft_je_period',
            'choices' => array(
            'today'  => __( 'Today', 'gofetch-je' ),
            'custom' => __( 'Custom', 'gofetch-je' ),
        ),
            'extra'   => array(
            'id' => '_goft_je_period',
        ),
        ), array(
            'title' => __( 'Last...', 'gofetch-je' ),
            'type'  => 'text',
            'name'  => '_goft_je_period_custom',
            'extra' => array(
            'id'    => '_goft_je_period_custom',
            'class' => 'small-text',
        ),
            'desc'  => __( 'days', 'gofetch-je' ),
        ), array(
            'title' => __( 'Limit', 'gofetch-je' ),
            'type'  => 'text',
            'name'  => '_goft_je_limit',
            'extra' => array(
            'class'     => 'small-text',
            'maxlength' => 5,
        ),
            'desc'  => __( 'job(s)', 'gofetch-je' ) . '<br/><br/>' . __( 'Leave empty to import all jobs found.', 'gofetch-je' ),
        ) );
    }

}
new GoFetch_JobEngine_Schedule_Meta_Boxes();