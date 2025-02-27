<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<div id="MrPlanHeader"  class="wrap">
    <img src="<?php echo esc_attr($dir_plugin); ?>assets/images/logo.png">
    <h1>MisterPlan - <?php echo esc_html__('Booking Engine', 'misterplan'); ?> <?php echo esc_attr($MRPLAN_PLUGIN_VERSION); ?></h1>
    <small>
        <a target="_blank" href="https://misterplan.es">MisterPlan.es</a> 	&#124; 
        <a target="_blank" href="https://docs.google.com/document/d/1T4buPXhC1wcgeH9a6JHEKMaAxV2uhkB5kbMtt9evwxw"><?php echo esc_html__('See documentation', 'misterplan'); ?></a> 	&#124; 
        <a target="_blank" href="https://misterplan.es/contacta-con-misterplan"><?php echo esc_html__('Contact with MisterPlan support', 'misterplan'); ?></a> 	&#124; 
        <a target="_blank" href="https://wordpress.org/plugins/misterplan/"><?php echo esc_html__('See plugin at wordpress.org', 'misterplan'); ?></a>
    </small>
</div>
<div id="MrPlanAvisoActualizacion" style="display:none;" version="<?php echo esc_attr($MRPLAN_PLUGIN_VERSION); ?>" version_wordpress="<?php echo esc_attr(get_bloginfo('version')); ?>" >
    <div class="notice notice-warning update-nag inline"><?php echo esc_html__('MisterPlan plugin update available', 'misterplan'); ?>. <a href="<?php echo admin_url('plugins.php'); ?>"><?php echo esc_html__('Please update now', 'misterplan'); ?></a>.</div>
</div>
<?php if(!is_null($pagina_confirmacion) && $pagina_confirmacion->post_status!='publish'){ ?>
    <div >
        <div class="notice error" style="padding-top: 10px;padding-bottom: 10px;">
            <?php echo esc_html__('Wrongly configured confirmation page', 'misterplan'); ?>.
            <br>
            <?php echo esc_html__('Remember that the confirmation page must be public', 'misterplan'); ?>.
        </div>
    </div>
<?php } ?>

<?php foreach ($mensajes_ok as $m){ ?>
<div class="TMrPlanPlugin_MensajeOk">
    <?php echo esc_attr($m); ?>
</div>
<?php } ?>

<div id="MrPlanPlugin" class="wrap">


<?php if( is_null($pagina_confirmacion)) { ?>
<div class="updated notice">
    <div class=" clearfix">
        <div class="">
            <h2>
            <?php echo esc_html__('Welcome!', 'misterplan'); ?> <?php echo esc_html__('Thank you for choosing  MisterPlan', 'misterplan'); ?></h2>

            <p class="plugin-install-notice"><?php echo esc_html__('Remember that you must have a MisterPlan booking engine to be able to configure and use this plugin.', 'misterplan'); ?><?php echo esc_html__('Please, visit'); ?> <a target="_blank" href="https://misterplan.es">misterplan.es</a> <?php echo esc_html__('for more information'); ?>.</p>
            <p class="plugin-install-notice"><?php echo esc_attr__('You can find all the documentation of this plugin here: ', 'misterplan'); ?> <a href="https://bit.ly/mrplan-plugin" target="_blank">bit.ly/mrplan-plugin</a></p>

            <p class="plugin-install-notice"><?php echo esc_html__('In order for the plugin to work, you need to create a booking confirmation page. This page needs the shortcode [misterplan_confirmacion] to be able to finalise the booking. Please, once created, do not delete neither the page nor the shortcode inside it.', 'misterplan'); ?></p>

            <form method="POST"  action="admin.php?page=mrplan_admin&accion=editar_motor&accion=crear_confirmacion">
                    <input type="hidden" name="accion" value="crear_confirmacion">			        
                    <?php wp_nonce_field('crear_confirmacion', 'nonce_confirmacion'); ?>
                    <button type="submit" class="button button-primary button-hero">
                        <?php echo esc_html__('Create confirmation page automatically', 'misterplan'); ?>
                    </button>
            </form>
        </div>
    </div>
</div>
<?php }else{ ?>
    
    <!-- PAGINA DE CONFIRMACION-->
    <?php if( !is_null($pagina_confirmacion)) { ?>
    <div>
        <h2 class="wp-heading-inline"><?php echo esc_html__('Confirmation page', 'misterplan'); ?></h2>
        <a href="<?php echo admin_url('post.php?post='.$pagina_confirmacion->ID.'&action=edit'); ?>" target="_blank" class="page-title-action"  ><?php echo esc_html__('Edit confirmation page', 'misterplan'); ?></a>
        <a href="<?php echo esc_attr($pagina_confirmacion->link); ?>" target="_blank" class="page-title-action"  ><?php echo esc_html__('View confirmation page', 'misterplan'); ?></a>
        <hr class="misterplan-header-end">
    </div>
    <?php } ?>


    <!-- MOTORES DE CASAS-->
    <h2 class="wp-heading-inline"><?php echo esc_html__('Booking engines for accommodations', 'misterplan'); ?></h2>
    <a href="<?php echo admin_url('admin.php?page=mrplan_admin&accion=editar_motor&id_motor=0&tipo_elemento=1'); ?>" class="page-title-action"><?php echo esc_html__('Create a new booking engine for accommodation', 'misterplan'); ?></a>
    <hr class="misterplan-header-end">

    
    <?php if(count($motores_casas)<=0) { ?>
        <div class="MrPlanPlugin_Aviso">
            <div><?php echo esc_html__('You do not have an accommodation booking engine created', 'misterplan'); ?></div>
            <a href="<?php echo admin_url('admin.php?page=mrplan_admin&accion=editar_motor&id_motor=0&tipo_elemento=1'); ?>" class="page-title-action"  ><?php echo esc_html__('Create a new booking engine for accommodation', 'misterplan'); ?></a>
        </div>
    <?php } else { ?>
        <table class="wp-list-table widefat fixed striped table-view-list posts">
            <tbody id="the-list">
                <?php foreach($motores_casas as $motor){ ?>
                <tr>
                    <td class="title column-title has-row-actions column-primary page-title">
                        <strong>
                            <a class="row-title"  href="<?php echo admin_url('admin.php?page=mrplan_admin&accion=editar_motor&id_motor='.$motor->id_motor); ?>"><?php echo esc_attr($motor->id_motor); ?> - <?php echo esc_attr($motor->datos->nombre_motor); ?></a>
                        </strong>
                    </td>
                    <td style="width:10%; text-align:right;">
                        <form method="POST" onsubmit="return validate(this);"  action="admin.php?page=mrplan_admin&accion=delete_motor">       
                            <?php echo wp_nonce_field('delete_motor', 'delete_motor'); ?>
                            <input type="hidden" name="id_motor" value="<?php echo esc_attr($motor->id_motor); ?>">
                            <input type="hidden" name="accion" value="delete_motor">
                            <button class="TMrPlanPlugin_DeleteButton" type="submit"><?php echo esc_html__('Delete', 'misterplan'); ?></button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>

    <hr class="misterplan-header-end">
    <!-- MOTORES DE ACTIVIDADES-->
    <h2 class="wp-heading-inline"><?php echo esc_html__('Booking engines for activities', 'misterplan'); ?></h2>
    <a href="<?php echo admin_url('admin.php?page=mrplan_admin&accion=editar_motor&id_motor=0&tipo_elemento=2'); ?>" class="page-title-action"  ><?php echo esc_html__('Create new booking engine for activities', 'misterplan'); ?></a>
    <hr class="misterplan-header-end">

    <?php if(count($motores_actividades)<=0) { ?>
        <div class="MrPlanPlugin_Aviso">
            <div><?php echo esc_html__('You do not have an activites booking engine created', 'misterplan'); ?></div>
            <a href="<?php echo admin_url('admin.php?page=mrplan_admin&accion=editar_motor&id_motor=0&tipo_elemento=2'); ?>" class="page-title-action"  ><?php echo esc_html__('Create new booking engine for activities', 'misterplan'); ?></a>
        </div>
    <?php } else { ?>
        <table class="wp-list-table widefat fixed striped table-view-list posts">
            <tbody id="the-list">
                <?php foreach($motores_actividades as $motor){ ?>
                <tr>
                    <td class="title column-title has-row-actions column-primary page-title">
                        <strong>
                            <a class="row-title"  href="<?php echo admin_url('admin.php?page=mrplan_admin&accion=editar_motor&id_motor='.$motor->id_motor); ?>"><?php echo esc_attr($motor->id_motor); ?> - <?php echo esc_attr($motor->datos->nombre_motor); ?></a>
                        </strong>
                    </td>
                    <td style="width:10%; text-align:right;">
                        <form method="POST" onsubmit="return validate(this);" action="admin.php?page=mrplan_admin&accion=delete_motor">       
                            <?php echo wp_nonce_field('delete_motor', 'delete_motor'); ?>
                            <input type="hidden" name="id_motor" value="<?php echo esc_attr($motor->id_motor); ?>">
                            <input type="hidden" name="accion" value="delete_motor">
                            <button class="TMrPlanPlugin_DeleteButton" type="submit"><?php echo esc_html__('Delete', 'misterplan'); ?></button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>

    <hr class="misterplan-header-end">
    <!-- Buscadores-->
    <h2 class="wp-heading-inline"><?php echo esc_html__('Search engines', 'misterplan');?></h2>
    <a href="<?php echo admin_url('admin.php?page=mrplan_admin&accion=editar_motor&id_motor=0&tipo_elemento=3'); ?>" class="page-title-action"  ><?php echo esc_html__('Create new Search engines', 'misterplan'); ?></a>
    <hr class="misterplan-header-end">

    <?php if(count($motores_buscador)<=0) { ?>
        <div class="MrPlanPlugin_Aviso">
            <div><?php echo esc_html__('You do not have an search engine created', 'misterplan'); ?></div>
            <a href="<?php echo admin_url('admin.php?page=mrplan_admin&accion=editar_motor&id_motor=0&tipo_elemento=3'); ?>" class="page-title-action"  ><?php echo esc_html__('Create new Search engines', 'misterplan'); ?></a>
        </div>
    <?php } else { ?>
        <table class="wp-list-table widefat fixed striped table-view-list posts">
            <tbody id="the-list">
                <?php foreach($motores_buscador as $motor){ ?>
                <tr>
                    <td class="title column-title has-row-actions column-primary page-title">
                        <strong>
                            <a class="row-title"  href="<?php echo admin_url('admin.php?page=mrplan_admin&accion=editar_motor&id_motor='.$motor->id_motor); ?>"><?php echo esc_attr($motor->id_motor); ?> - <?php echo esc_attr($motor->datos->nombre_motor); ?></a>
                        </strong>
                    </td>
                    <td style="width:10%; text-align:right;">
                        <form method="POST" onsubmit="return validate(this);" action="admin.php?page=mrplan_admin&accion=delete_motor">       
                            <?php echo wp_nonce_field('delete_motor', 'delete_motor'); ?>
                            <input type="hidden" name="id_motor" value="<?php echo esc_attr($motor->id_motor); ?>">
                            <input type="hidden" name="accion" value="delete_motor">
                            <button class="TMrPlanPlugin_DeleteButton" type="submit"><?php echo esc_html__('Delete', 'misterplan'); ?></button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>

    <hr class="misterplan-header-end">
    <!-- Buscadores-->
    <h2 class="wp-heading-inline"><?php echo esc_html__('Date selectors', 'misterplan');?></h2>
    <a href="<?php echo admin_url('admin.php?page=mrplan_admin&accion=editar_motor&id_motor=0&tipo_elemento=5'); ?>" class="page-title-action"  ><?php echo esc_html__('Create new date selectors', 'misterplan'); ?></a>   
    <hr class="misterplan-header-end">

    <?php if(count($buscador_simple)<=0) { ?>
        <div class="MrPlanPlugin_Aviso">
            <div><?php echo esc_html__('You do not have a date selectors created', 'misterplan'); ?></div>
            <a href="<?php echo admin_url('admin.php?page=mrplan_admin&accion=editar_motor&id_motor=0&tipo_elemento=5'); ?>" class="page-title-action"  ><?php echo esc_html__('Create new date selector', 'misterplan'); ?></a>
        </div>
    <?php } else { ?>
        <table class="wp-list-table widefat fixed striped table-view-list posts">
            <tbody id="the-list">
                <?php foreach($buscador_simple as $motor){ ?>
                <tr>
                    <td class="title column-title has-row-actions column-primary page-title">
                        <strong>
                            <a class="row-title"  href="<?php echo admin_url('admin.php?page=mrplan_admin&accion=editar_motor&id_motor='.$motor->id_motor); ?>"><?php echo esc_attr($motor->id_motor); ?> - <?php echo esc_attr($motor->datos->nombre_motor); ?></a>
                        </strong>
                    </td>
                    <td style="width:10%; text-align:right;">
                        <form method="POST" onsubmit="return validate(this);" action="admin.php?page=mrplan_admin&accion=delete_motor">       
                            <?php echo wp_nonce_field('delete_motor', 'delete_motor'); ?>
                            <input type="hidden" name="id_motor" value="<?php echo esc_attr($motor->id_motor); ?>">
                            <input type="hidden" name="accion" value="delete_motor">
                            <button class="TMrPlanPlugin_DeleteButton" type="submit"><?php echo esc_html__('Delete', 'misterplan'); ?></button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>


    <hr class="misterplan-header-end">
    <!-- Buscadores-->
    <h2 class="wp-heading-inline"><?php echo esc_html__('Sales Panels', 'misterplan');?></h2>
    <a href="<?php echo admin_url('admin.php?page=mrplan_admin&accion=editar_motor&id_motor=0&tipo_elemento=4'); ?>" class="page-title-action"  ><?php echo esc_html__('Create new panel', 'misterplan'); ?></a>   
    <hr class="misterplan-header-end">

    <?php if(count($motores_paneles)<=0) { ?>
        <div class="MrPlanPlugin_Aviso">
            <div><?php echo esc_html__('You do not have a sales panel created', 'misterplan'); ?></div>
            <a href="<?php echo admin_url('admin.php?page=mrplan_admin&accion=editar_motor&id_motor=0&tipo_elemento=4'); ?>" class="page-title-action"  ><?php echo esc_html__('Create new panel', 'misterplan'); ?></a>
        </div>
    <?php } else { ?>
        <table class="wp-list-table widefat fixed striped table-view-list posts">
            <tbody id="the-list">
                <?php foreach($motores_paneles as $motor){ ?>
                <tr>
                    <td class="title column-title has-row-actions column-primary page-title">
                        <strong>
                            <a class="row-title"  href="<?php echo admin_url('admin.php?page=mrplan_admin&accion=editar_motor&id_motor='.$motor->id_motor); ?>"><?php echo esc_attr($motor->id_motor); ?> - <?php echo esc_attr($motor->datos->nombre_motor); ?></a>
                        </strong>
                    </td>
                    <td style="width:10%; text-align:right;">
                        <form method="POST" onsubmit="return validate(this);" action="admin.php?page=mrplan_admin&accion=delete_motor">       
                            <?php echo wp_nonce_field('delete_motor', 'delete_motor'); ?>
                            <input type="hidden" name="id_motor" value="<?php echo esc_attr($motor->id_motor); ?>">
                            <input type="hidden" name="accion" value="delete_motor">
                            <button class="TMrPlanPlugin_DeleteButton" type="submit"><?php echo esc_html__('Delete', 'misterplan'); ?></button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>

    <hr class="misterplan-header-end">
    <!-- Paginas-->
    <h2 class="wp-heading-inline"><?php echo esc_html__('Pages with an integrated booking engine or search engine', 'misterplan'); ?></h2>
    <hr class="misterplan-header-end">

    <table class="wp-list-table widefat fixed striped table-view-list posts">
        <tbody id="the-list">
            <?php foreach($paginas_con_motor as $p){ ?>
            <tr>
                <td class="title column-title has-row-actions column-primary page-title">
                    <strong>
                        <a class="row-title" target="_blank" href="<?php echo esc_attr($p->guid); ?>"><?php echo esc_attr($p->post_title); ?></a>
                    </strong>
                </td>
                <td class="title column-title has-row-actions column-primary page-title">
                <?php echo esc_attr($p->post_status); ?>
                </td>
    
                <td class="title column-title has-row-actions column-primary page-title">
                    <a class="row-title" target="_blank" href="<?php echo esc_attr($p->guid); ?>"><?php echo esc_html__('View page', 'misterplan'); ?></a>
                </td>
    
                <td class="title column-title has-row-actions column-primary page-title">
                    <a class="row-title" target="_blank" href="<?php echo esc_attr(admin_url('post.php?post='.$p->ID.'&action=edit')); ?>"><?php echo esc_html__('Edit page', 'misterplan'); ?></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>


    <h2 class="wp-heading-inline"><?php echo esc_html__('Debug Info', 'misterplan'); ?></h2>
    <hr class="misterplan-header-end">
    <div><?php echo esc_html__('In case of problems with the plugin, please send this information to the MisterPlan support team', 'misterplan'); ?></div>
    <div class="row">
        <div class="col-12" style="">
            <div class="TMrPlanPlugin_AdminDebug">
                <h3>MisterPlan Plugin</h3>
                <ul>
                    <li>Version: <?php echo esc_attr($MRPLAN_PLUGIN_VERSION); ?></li>
                    <li>Wordpress: <?php echo esc_attr($debug_info->version); ?></li>
                    <li>PHP: <?php echo esc_attr($debug_info->php); ?></li>
                    <li>Charset: <?php echo esc_attr($debug_info->charset); ?></li>
                    <li>Language: <?php echo esc_attr($debug_info->language); ?></li>
                </ul>
                <h3>Plugins</h3>
                <ul>
                    <?php foreach ($debug_info->activated_plugins as $p){ ?>
                    <li><?php echo esc_attr($p['Name']); ?> - Version <?php echo esc_attr($p['Version']); ?></li>
                    <?php } ?>
                </ul>
                <h3>Template</h3>
                <ul>
                    <li><?php echo esc_attr($debug_info->template); ?></li>
                </ul>

                <h3>Pages</h3>
                <ul>
                    <?php foreach($paginas_con_motor as $p){ ?>
                        <li><?php echo esc_attr($p->guid); ?> - <?php echo esc_attr($p->post_status); ?></li>
                    <?php } ?>
                </ul>

                <h3>Confirmation Page</h3>
                <ul>
                    <li><?php echo esc_attr($pagina_confirmacion->link); ?> - <?php echo esc_attr($pagina_confirmacion->post_status); ?></li>
                </ul>
                

            </div>    


            

        </div>
    </div>


    <h2 class="wp-heading-inline"><?php echo esc_html__('For advanced users only', 'misterplan'); ?></h2>
    <hr class="misterplan-header-end">
    <div class="row">
        <div class="col-12" style="">
            <div><?php echo esc_html__('This action will delete the reference to the confirmation page, but will not delete the page.', 'misterplan'); ?></div>
            <form method="POST" onsubmit="return validate(this);" action="admin.php?page=mrplan_admin&accion=delete_confirmation">       
                <?php echo wp_nonce_field('delete_confirmation', 'delete_confirmation'); ?>
                <input type="hidden" name="accion" value="delete_confirmation">
                <button class="TMrPlanPlugin_DeleteButton" type="submit"><?php echo esc_html__('Delete confirmation page reference', 'misterplan'); ?></button>
            </form>
        </div>
    </div>
    <?php } ?>
</div>