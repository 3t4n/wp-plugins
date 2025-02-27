<?php
/**
 * Class DV_Gravity
 *
 * This class add some ability into gravity
 */
class DV_Gravity
{

    // roles to which allow the Appearance menu
    private $allowed_roles = array('editor', 'shop_manager');

    public function initialize()
    {
        add_action( 'admin_init', array($this, 'add_gravity_cap') );
    }

    public function add_gravity_cap()
    {

        if (empty( $this->allowed_roles ))
            return;

        foreach ($this->allowed_roles as $role) {
            $this->add_gravity_cap_to_role($role);
        }

    }

    public function add_gravity_cap_to_role($role)
    {
        $role = get_role( $role );

        if ( empty($role) )
            return;

        $role->add_cap( 'gform_full_access' );
    }

}
