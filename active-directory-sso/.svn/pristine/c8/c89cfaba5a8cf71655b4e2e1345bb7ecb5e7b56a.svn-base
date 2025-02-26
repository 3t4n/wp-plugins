
<div class="wrap">
    <?php    echo "<h2>" . __( 'Active Directory Single Sign On Settings', 'ad_sso' ) . "</h2>"; ?>
    <?php

    if($_POST['ad_sso_hidden'] == 'Y') {
        //Form data sent
        $fqdn = $_POST['ad_sso_fqdn'];
        update_option('ad_sso_fqdn', $fqdn);

        $ou = $_POST['ad_sso_ou'];
        update_option('ad_sso_ou', $ou);

        $username = $_POST['ad_sso_username'];
        update_option('ad_sso_username', $username);

        $password = $_POST['ad_sso_password'];
        update_option('ad_sso_password', $password);

        $domain = $_POST['ad_sso_domain'];
        update_option('ad_sso_domain', $domain);

        $default_role = $_POST['ad_sso_default_role'];
        update_option('ad_sso_default_role', $default_role);

        $show_toolbar = intval($_POST['ad_sso_show_toolbar']);
        update_option('ad_sso_show_toolbar', $show_toolbar);
        ?>
        <div class="updated"><p><strong><?php echo __( 'Options saved.', 'ad_sso' ); ?></strong></p></div>
        <?php
    } else {
        //Normal page display
        $fqdn = get_option('ad_sso_fqdn');
        $ou = get_option('ad_sso_ou');
        $username = get_option('ad_sso_username');
        $password = get_option('ad_sso_password');
        $domain = get_option('ad_sso_domain');
        $default_role = get_option('ad_sso_default_role');
        $show_toolbar = get_option('ad_sso_show_toolbar');
    }
?>
    <form name="ad_sso_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="ad_sso_hidden" value="Y" />
        <h4><?php echo __( 'Active Directory Search Settings', 'ad_sso' ); ?></h4>

        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row">
                        <label for="ad_sso_fqdn"><?php echo __( 'Fully Qualified Domain', 'ad_sso' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="ad_sso_fqdn" id="ad_sso_fqdn" value="<?php echo $fqdn; ?>" class="regular-text" />
                        <p class="description">ex: sub.domain.com</p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="ad_sso_ou"><?php echo __( 'Organizational Unit', 'ad_sso' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="ad_sso_ou" id="ad_sso_ou" value="<?php echo $ou; ?>" class="regular-text" />
                        <p class="description">ex: DC=sub,DC=domain,DC=com</p>
                    </td>
                </tr>
            </tbody>
        </table>

        <h4><?php echo __( 'Read-Only Service Account Settings', 'ad_sso' ); ?></h4>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row">
                        <label for="ad_sso_username"><?php echo __( 'Username', 'ad_sso' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="ad_sso_username" id="ad_sso_username" value="<?php echo $username; ?>" class="regular-text" />
                        <p class="description">ex: serviceaccount</p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="ad_sso_username"<?php echo __( '>Password', 'ad_sso' ); ?></label>
                    </th>
                    <td>
                        <input type="password" name="ad_sso_password" id="ad_sso_password" value="<?php echo $password; ?>" class="regular-text" />
                        <p class="description">ex: secretpassword</p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="ad_sso_domain"><?php echo __( 'Domain', 'ad_sso' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="ad_sso_domain" id="ad_sso_domain" value="<?php echo $domain; ?>" class="regular-text" />
                        <p class="description">ex: sub <?php echo __( 'from', 'ad_sso' ); ?> sub\serviceaccount</p>
                    </td>
                </tr>
            </tbody>
        </table>

        <h4><?php echo __( 'Default User Settings', 'ad_sso' ); ?></h4>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row">
                        <label for="ad_sso_default_role"><?php echo __( 'Default Role', 'ad_sso' ); ?></label>
                    </th>
                    <td>
                        <select name="ad_sso_default_role" id="ad_sso_default_role">
                            <option value="administrator"<?=$default_role === 'administrator' ? ' selected="selected"' : '';?>>Administrator</option>
                            <option value="editor"<?=$default_role === 'editor' ? ' selected="selected"' : '';?>>Editor</option>
                            <option value="author"<?=$default_role === 'author' ? ' selected="selected"' : '';?>>Author</option>
                            <option value="contributor"<?=$default_role === 'contributor' ? ' selected="selected"' : '';?>>Contributor</option>
                            <option value="subscriber"<?=$default_role === 'subscriber' ? ' selected="selected"' : '';?>>Subscriber</option>
                            <option value="pending"<?=$default_role === 'pending' ? ' selected="selected"' : '';?>>Pending</option>
                        </select>
                        <p class="description">Default role for users created by this plugin</p>
                    </td>
                </tr>
                <tr class="show-admin-bar">
                    <th scope="row">
                        Toolbar
                    </th>
                    <td>
                        <fieldset>
                            <legend class="screen-reader-text">
                                <span><?php echo __( 'Toolbar', 'ad_sso' ); ?></span>
                            </legend>
                            <label for="ad_sso_show_toolbar">
                                <input type="checkbox" name="ad_sso_show_toolbar" id="ad_sso_show_toolbar" value="1"<?=$show_toolbar == 1 ? ' checked="checked"' : '';?>>
                                <?php echo __( 'Show Toolbar when viewing site', 'ad_sso' ); ?>
                            </label>
                        </fieldset>
                    </td>
                </tr>
            </tbody>
        </table>

        <p class="submit">
            <input type="submit" name="Submit" value="Update Options" class="button button-primary" />
        </p>
    </form>
</div>