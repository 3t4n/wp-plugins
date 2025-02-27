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
    <div class="notice notice-warning update-nag inline"><?php echo esc_html__('MisterPlan plugin update available'); ?>. <a href="<?php echo admin_url('plugins.php'); ?>"><?php echo esc_html__('Please update now'); ?></a>.</div>
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

    <?php if( is_null($motor) && count((array) $paginas_con_motor)<=0 ){?>
        <div style="background-color: white;border: 1px solid grey;padding: 20px;font-size: 15px;">
            <p style="font-size: 15px;"><span style="color:red;"><?php echo esc_html__('Error', 'misterplan'); ?></span>: <?php echo esc_html__('You cannot create a search engine without first creating a booking engine and integrating it into a page.', 'misterplan'); ?></p>
            <p><?php echo esc_html__('To create a search engine, you need', 'misterplan'); ?>:</p>
            <p>1. <?php echo esc_html__('Create an engine of activities or accommodations', 'misterplan'); ?></p>
            <p>2. <?php echo esc_html__('Create a page with that engine or integrate the shortcode of the booking engine in a page of your wordpress', 'misterplan'); ?> </p>
            <p><?php echo esc_html__('You can find more information in our documentation', 'misterplan'); ?>. <a target="_blank" href="https://docs.google.com/document/d/1T4buPXhC1wcgeH9a6JHEKMaAxV2uhkB5kbMtt9evwxw"><?php echo esc_html__('See documentation', 'misterplan'); ?></a></p>
        </div>

    <?php } ?>

        <h2><?php echo esc_html__('Search engine', 'misterplan'); ?></h2>
        <h3><?php echo esc_html__('Search engine data', 'misterplan'); ?></h3>

        <form method="POST" id="MrPlanMotorForm" action="admin.php?page=mrplan_admin&id_motor=<?php echo (int) (!is_null($motor) ? $motor->id_motor : 0); ?>&accion=guardar_motor">
            <div class="row">

                <div class="col-12">
                    <h4><?php echo esc_html__('Booking engine data', 'misterplan'); ?></h4>
                </div>


                <div class="col-12">
                    <label>
                        <div><?php echo esc_html__('Search engine name', 'misterplan'); ?></div>
                        <input type="text"  name="nombre_motor" placeholder="<?php echo esc_html__('Search engine name', 'misterplan'); ?>" value="<?php if(isset($motor->datos->nombre_motor)) echo esc_attr($motor->datos->nombre_motor); ?>" style="width:100%;" required>
                    </label>
                </div>
                <div class="col-6 col-md-4">                        
                    <label>
                        <div>
                            <?php echo esc_html__('Destination ID', 'misterplan'); ?>
                            <a tabindex="-1" href="#" title="<?php echo esc_html__('This information will be provided to you by MisterPlan', 'misterplan'); ?>"  class="TMrPlanPlugin_Help">?</a>
                        </div>
                        <input type="number"  name="id_destino" placeholder="<?php echo esc_html__('Destination ID', 'misterplan'); ?>" value="<?php if(isset($motor->datos->id_destino)) echo esc_attr($motor->datos->id_destino); ?>" style="width:100%;" required min="1" max="600000">
                        <span class="TMrPlanPlugin_Help"><?php echo esc_html__('MisterPlan destination identifier', 'misterplan'); ?></span>
                    </label>
                </div>
                <div class="col-6 col-md-4">                        
                    <label>
                        <div>
                            <?php echo esc_html__('Point of sale ID', 'misterplan'); ?>
                            <a tabindex="-1" href="#" title="<?php echo esc_html__('This information will be provided to you by MisterPlan', 'misterplan'); ?>"  class="TMrPlanPlugin_Help">?</a>
                        </div>
                        <input type="number"  name="id_punto_venta" placeholder="<?php echo esc_html__('Point of sale ID', 'misterplan'); ?>" value="<?php if(isset($motor->datos->id_punto_venta)) echo esc_attr($motor->datos->id_punto_venta); ?>" style="width:100%;" max="600000">
                        <span class="TMrPlanPlugin_Help"><?php echo esc_html__('MisterPlan point of sale identifier', 'misterplan'); ?></span>
                    </label>
                </div>
            </div>

            <div class="row">

                <div class="col-12">
                    <hr>
                    <h4><?php echo esc_html__('Booking engine options', 'misterplan'); ?></h4>
                </div>
                <div class="col-6 col-md-3">     
                    <label>
                        <div><?php echo esc_html__('Default language', 'misterplan'); ?></div>                    
                        <select name="id_idioma">
                            <?php foreach($idiomas as $idioma){?>                        
                                <option value="<?php echo (int) $idioma->id_idioma; ?>" <?php if(isset($motor->datos->id_idioma) && $motor->datos->id_idioma==$idioma->id_idioma) echo esc_attr('selected'); ?> ><?php echo esc_attr($idioma->nombre_idioma); ?></option>
                            <?php }?>
                            <option value="-1" <?php if(isset($motor->datos->id_idioma) && $motor->datos->id_idioma==-1) echo esc_attr('selected'); ?> ><?php echo esc_html__('Automatic, according to user settings', 'misterplan'); ?></option>
                        </select>
                    </label>
                    <span class="TMrPlanPlugin_Help"><?php echo esc_html__('Default language in which engine is displayed', 'misterplan'); ?></span>
                </div>
                <div class="col-4">     
                    <label>
                        <div><?php echo esc_html__('Modo Widget', 'misterplan'); ?></div>
                        <select name="modo_widget">
                            <option value="2" <?php if(isset($motor->datos->modo_widget) && $motor->datos->modo_widget==2) echo esc_attr('selected'); ?>><?php echo esc_html__('Normal', 'misterplan'); ?></option>
                            <option value="1" <?php if(isset($motor->datos->modo_widget) && $motor->datos->modo_widget==1) echo esc_attr('selected'); ?>><?php echo esc_html__('Carga separada', 'misterplan'); ?></option>
                        </select>
                    </label>
                </div>



                <div class="col-4">     
                    <label>
                        <div><?php echo esc_html__('Search by default', 'misterplan'); ?></div>
                        <select name="tipo_buscador">
                            <option value="1" <?php if(isset($motor->datos->tipo_buscador) && $motor->datos->tipo_buscador==1) echo esc_attr('selected'); ?>><?php echo esc_html__('Accomodations', 'misterplan'); ?></option>
                            <option value="2" <?php if(isset($motor->datos->tipo_buscador) && $motor->datos->tipo_buscador==2) echo esc_attr('selected'); ?>><?php echo esc_html__('Activities', 'misterplan'); ?></option>
                        </select>
                    </label>
                </div>


                <div class="col-4">     
                    <label>
                        <div><?php echo esc_html__('Default search', 'misterplan'); ?></div>
                        <select name="v_results">
                            <option value="1" <?php if(isset($motor->datos->v_results) && $motor->datos->v_results==1) echo esc_attr('selected'); ?>><?php echo esc_html__('Basic', 'misterplan'); ?></option>
                            <option value="2" <?php if(isset($motor->datos->v_results) && $motor->datos->v_results==2) echo esc_attr('selected'); ?>>V2</option>
                        </select>
                    </label>
                </div>

                <div class="col-6 col-md-3">     
                    <label>
                        <div><?php echo esc_html__('Search automatically on start-up', 'misterplan'); ?></div>
                        <select name="autosearch">
                            <option value="0" <?php if(isset($motor->datos->disableUbicacion) && $motor->datos->autosearch==0) echo esc_attr('selected'); ?>><?php echo esc_html__('No', 'misterplan'); ?></option>
                            <option value="1" <?php if(isset($motor->datos->disableUbicacion) && $motor->datos->autosearch==1) echo esc_attr('selected'); ?>><?php echo esc_html__('Yes', 'misterplan'); ?></option>
                        </select>
                    </label>
                    <span class="TMrPlanPlugin_Help"><?php echo esc_html__('The engine will do search when page is loading', 'misterplan'); ?></span>
                </div>


                <div class="col-6 col-md-3">     
                    <label>
                        <div><?php echo esc_html__('Show location selector', 'misterplan'); ?></div>
                        <select name="disableUbicacion">
                            <option value="1" <?php if(isset($motor->datos->disableUbicacion) && $motor->datos->disableUbicacion==1) echo esc_attr('selected'); ?>><?php echo esc_html__('No', 'misterplan'); ?></option>
                            <option value="0" <?php if(isset($motor->datos->disableUbicacion) && $motor->datos->disableUbicacion==0) echo esc_attr('selected'); ?>><?php echo esc_html__('Yes', 'misterplan'); ?></option>
                        </select>
                    </label>
                </div>

                <div class="col-6 col-md-3">     
                    <label>
                        <div><?php echo esc_html__('Show agency code selector', 'misterplan'); ?></div>
                        <select name="disableCodAgencia">
                            <option value="1" <?php if(isset($motor->datos->disableCodAgencia) && $motor->datos->disableCodAgencia==1) echo esc_attr('selected'); ?>><?php echo esc_html__('No', 'misterplan'); ?></option>
                            <option value="0" <?php if(isset($motor->datos->disableCodAgencia) && $motor->datos->disableCodAgencia==0) echo esc_attr('selected'); ?>><?php echo esc_html__('Yes', 'misterplan'); ?></option>
                        </select>
                    </label>
                </div>



                <div class="col-6 col-md-3">     
                    <label>
                        <div><?php echo esc_html__('Show language selector', 'misterplan'); ?></div>
                        <select name="barra_idiomas">
                            <option value="0" <?php if(isset($motor->datos->barra_idioma) && $motor->datos->barra_idiomas==0) echo esc_attr('selected'); ?>><?php echo esc_html__('No', 'misterplan'); ?></option>
                            <option value="1" <?php if(isset($motor->datos->barra_idioma) && $motor->datos->barra_idiomas==1) echo esc_attr('selected'); ?>><?php echo esc_html__('Yes', 'misterplan'); ?></option>
                        </select>
                    </label>
                    <span class="TMrPlanPlugin_Help"><?php echo esc_html__('The engine will d a search when page is loading', 'misterplan'); ?></span>
                </div>

                <div class="col-6 col-md-3">     
                    <label>
                        <div><?php echo esc_html__('Debug', 'misterplan'); ?></div>
                        <select name="debug">
                            <option value="0" <?php if(isset($motor->datos->debug) && $motor->datos->debug==0) echo esc_attr('selected'); ?> ><?php echo esc_html__('No', 'misterplan'); ?></option>
                            <option value="1" <?php if(isset($motor->datos->debug) && $motor->datos->debug==1) echo esc_attr('selected'); ?> ><?php echo esc_html__('Yes', 'misterplan'); ?></option>
                        </select>
                    </label>
                    <span class="TMrPlanPlugin_Help"><?php echo esc_html__('Displays engine information on the public side to help detect errors', 'misterplan'); ?></span>
                </div>
        
            </div>


            <div class="row">

                <div class="col-12">
                    <hr>
                    <h4><?php echo esc_html__('Type of the search engine', 'misterplan'); ?></h4>
                </div>
                <div class="col-2 text-center">
                    <label>
                        <img src="<?php echo esc_attr($dir_plugin); ?>assets/images/admin/tipo_3_4.png" style="width: 100%; max-width: 200px); display:block;">
                        <input type="radio" name="v_form" value="4" <?php if(isset($motor->datos->v_form) && $motor->datos->v_form=='4') echo esc_attr('checked'); ?>>
                        <?php echo esc_html__('Version', 'misterplan'); ?> 4
                        <div><?php echo esc_html__('Accomodations and Activities', 'misterplan'); ?></div>
                    </label>
                </div>
                <div class="col-2 text-center">
                    <label>
                        <img src="<?php echo esc_attr($dir_plugin); ?>assets/images/admin/tipo_3_5.png" style="width: 100%; max-width: 200px); display:block;">
                        <input type="radio" name="v_form" value="5" <?php if(isset($motor->datos->v_form) && $motor->datos->v_form=='5') echo esc_attr('checked'); ?>>
                        <?php echo esc_html__('Version', 'misterplan'); ?> 5
                        <div><?php echo esc_html__('Only Activities', 'misterplan'); ?></div>
                    </label>
                </div>
                <div class="col-2 text-center">
                    <label>
                        <img src="<?php echo esc_attr($dir_plugin); ?>assets/images/admin/tipo_3_7.png" style="width: 100%; max-width: 200px); display:block;">
                        <input type="radio" name="v_form" value="7" <?php if(isset($motor->datos->v_form) && $motor->datos->v_form=='7') echo esc_attr('checked'); ?>>
                        <?php echo esc_html__('Version', 'misterplan'); ?> 7
                        <div><?php echo esc_html__('Accomodations and Activities', 'misterplan'); ?></div>
                    </label>
                </div>
                <div class="col-2 text-center">
                    <label>
                        <img src="<?php echo esc_attr($dir_plugin); ?>assets/images/admin/tipo_3_8.png" style="width: 100%; max-width: 200px); display:block;">
                        <input type="radio" name="v_form" value="8" <?php if(isset($motor->datos->v_form) && $motor->datos->v_form=='8') echo esc_attr('checked'); ?>>
                        <?php echo esc_html__('Version', 'misterplan'); ?> 8
                        <div><?php echo esc_html__('Only Activities', 'misterplan'); ?></div>
                    </label>
                </div>
                <div class="col-2 text-center">
                    <label>
                        <img src="<?php echo esc_attr($dir_plugin); ?>assets/images/admin/tipo_3_9.png" style="width: 100%; max-width: 200px); display:block;">
                        <input type="radio" name="v_form" value="9" <?php if(isset($motor->datos->v_form) && $motor->datos->v_form=='9') echo esc_attr('checked'); ?>>
                        <?php echo esc_html__('Version', 'misterplan'); ?> 9
                        <div><?php echo esc_html__('Only Activities', 'misterplan'); ?></div>
                    </label>
                </div>
                <div class="col-2 text-center">
                    <label>
                        <img src="<?php echo esc_attr($dir_plugin); ?>assets/images/admin/tipo_3_10.png" style="width: 100%; max-width: 200px); display:block;">
                        <input type="radio" name="v_form" value="10" <?php if(isset($motor->datos->v_form) && $motor->datos->v_form=='10') echo esc_attr('checked'); ?>>
                        <?php echo esc_html__('Version', 'misterplan'); ?> 10
                        <div><?php echo esc_html__('Accomodations and Activities', 'misterplan'); ?></div>
                    </label>
                </div>
            </div>

            <div class="row">

                <div class="col-12">
                    <hr>
                    <h4><?php echo esc_html__('Destination pages', 'misterplan'); ?></h4>
                </div>
                <div class="col-6">
                    <label>
                        <div><?php echo esc_html__("Booking engine page", 'misterplan'); ?></div>
                        <select name="pagina_del_motor" required>
                            <option></option>
                            <?php foreach($paginas_con_motor as $p) { ?>
                            <option <?php if(isset($motor->datos->pagina_del_motor) && $motor->datos->pagina_del_motor==$p->ID) echo esc_attr('selected'); ?> value="<?php echo esc_attr($p->ID); ?>"><?php echo esc_attr($p->post_title); ?> - <?php echo esc_attr($p->post_status); ?></option>
                            <?php } ?>
                        </select>
                    </label>
                </div>



                <div class="col-6">
                    <label>
                        <div><?php echo esc_html__("Search result page", 'misterplan'); ?></div>
                        <select name="pagina_de_resultados">
                            <option></option>
                            <?php foreach($paginas_con_motor as $p) { ?>
                            <option <?php if(isset($motor->datos->pagina_de_resultados) && $motor->datos->pagina_de_resultados==$p->ID) echo esc_attr('selected'); ?> value="<?php echo esc_attr($p->ID); ?>"><?php echo esc_attr($p->post_title); ?></option>
                            <?php } ?>
                        </select>
                    </label>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <hr>
                    <h4><?php echo esc_html__('Styles', 'misterplan'); ?></h4>
                </div>
                <div class="col-6 col-md-2">                        
                    <label>
                        <div><?php echo esc_html__('Max width', 'misterplan'); ?> (<?php echo esc_html__('in pixels', 'misterplan'); ?>)</div>
                        <input type="number"  name="ancho_maximo" placeholder="<?php echo esc_html__('Max width', 'misterplan'); ?>" value="<?php if(isset($motor->datos->ancho_maximo) && $motor->datos->ancho_maximo>300 ) echo esc_attr($motor->datos->ancho_maximo); ?>"  style="width:100%;" min="400">
                    </label>
                </div>
                <div class="col-12">
                    <br>
                    <a href="#" class="TMrPlanPugin_ShowElementEvnt" target="TMrPlanPlugin_EstilosExtra"><?php echo esc_html__('Styles for conflicts with your theme', 'misterplan'); ?></a>
                    <div id="TMrPlanPlugin_EstilosExtra" style="display:none;">
                        <textarea  name="estilos_extra" placeholder="<?php echo esc_html__('Insert here CSS styles to solve engine conflicts with your theme', 'misterplan'); ?>"><?php if(isset($motor->datos->estilos_extra)) echo esc_attr($motor->datos->estilos_extra);?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
        
                <div class="col-4">
                    <input type="hidden" name="id_motor" value="<?php if(isset($motor->id_motor)) echo esc_attr($motor->id_motor); ?>">
                    <input type="hidden" name="tipo_elemento" value="<?php echo esc_attr($tipo_elemento); ?>">
                    <input type="hidden" name="accion" value="guardar_motor">
                    <?php echo wp_nonce_field('guardar_motor', 'nonce_motor'); ?>
                    <label>
                        <div>&nbsp;</div>
                        <button type="submit" class="button button-primary save">
                            <?php if (is_null($motor)) { ?>
                                <?php echo esc_html__('Create Booking Engine', 'misterplan'); ?>
                            <?php } else { ?>
                                <?php echo esc_html__('Update Booking Engine', 'misterplan'); ?>
                            <?php } ?>
                        </button>
                    </label>
                </div>
            </div>
        </form>


        <?php if (!is_null($motor)) { ?>

        <h3><?php echo esc_html__('Pages with this engine', 'misterplan'); ?></h3>

        <table class="wp-list-table widefat fixed striped table-view-list posts">
            <tbody id="the-list">
                <?php foreach($paginas_con_este_motor as $p){ ?>
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
                        <a class="row-title" target="_blank" href="<?php echo esc_attr(admin_url('post.php?post='.(int) ($p->ID).'&action=edit')); ?>"><?php echo esc_html__('Edit page', 'misterplan'); ?></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        
        <h3><?php echo esc_html__('Integration instructions', 'misterplan'); ?></h3>

        <div  id="MrPlanMotorForm">
            <div class="row">   
                <div class="col-12">
                    <h4><?php echo esc_html__('Option', 'misterplan'); ?> 1</h4>
                    <div><?php echo esc_html__('Create a page automatically with the booking engine. You can modify this page, as long as you do not remove the shortcode associated with the engine.', 'misterplan'); ?></div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <form method="POST" action="admin.php?page=mrplan_admin&id_motor=<?php echo (int) (isset($motor->id_motor) ? $motor->id_motor : 0); ?>&accion=crear_pagina_motor#paginas_motor">
                        <input type="hidden" name="id_motor" value="<?php echo (int) (isset($motor->id_motor) ? $motor->id_motor : 0); ?>">
                        <input type="hidden" name="accion" value="crear_pagina_motor">
                        <?php echo wp_nonce_field('crear_pagina_motor', 'crear_pagina_motor'); ?>
                        <label>
                            <div>&nbsp;</div>
                            <button type="submit" class="button button-primary save">
                                <?php echo esc_html__('Create page with booking engine', 'misterplan'); ?>
                            </button>
                        </label>
                    </form>
                </div>

                <div class="col-4">
                    <form method="POST" action="admin.php?page=mrplan_admin&id_motor=<?php echo (int) (isset($motor->id_motor) ? $motor->id_motor : 0); ?>&accion=crear_pagina_motor#paginas_motor">
                        <input type="hidden" name="id_motor" value="<?php echo (int) (isset($motor->id_motor) ? $motor->id_motor : 0); ?>">
                        <input type="hidden" name="accion" value="crear_pagina_motor">
                        <input type="hidden" name="full_width" value="1">
                        <?php echo wp_nonce_field('crear_pagina_motor', 'crear_pagina_motor'); ?>
                        <label>
                            <div>&nbsp;</div>
                            <button type="submit" class="button button-primary save">
                                <?php echo esc_html__('Create page with booking engine', 'misterplan'); ?> (<?php echo esc_html__('With full-width', 'misterplan'); ?>)
                            </button>
                        </label>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <br>


        <form method="POST" id="MrPlanMotorForm" target="_blank">
            <div class="row">   
                <div class="col-12">
                    <h4><?php echo esc_html__('Option', 'misterplan'); ?> 2</h4>
                    <div><?php echo esc_html__('You can add this booking engine anywhere on the site by including the following shortcode:', 'misterplan'); ?></div>
                </div>
                <div class="col-12">
                    <strong>[misterplan_motor id_motor="<?php if(isset($motor->id_motor)) echo esc_attr($motor->id_motor); ?>"]</strong>
                </div>
                <div class="col-12">
                    <a href="https://wordpress.com/es/support/editor-wordpress/bloques/bloque-de-shortcodes/" target="_blank"><?php echo esc_html__('More information about shortcodes', 'misterplan'); ?></a>
                </div>
                <div class="col-12 mt-4">
                    <div class="mt-4" style="margin-top: 20px;"><?php echo esc_html__('Engine shortcode in different languages', 'misterplan'); ?>:</div>
                    <?php foreach($idiomas as $idioma){?>      
                        <div style="margin-top: 5px;"><?php echo esc_attr($idioma->nombre_idioma); ?>:</div>
                        <strong>[misterplan_motor id_idioma="<?php echo (int) $idioma->id_idioma; ?>" id_motor="<?php if(isset($motor->id_motor)) echo esc_attr($motor->id_motor); ?>"]</strong>
                    <?php }?>
                </div>
            </div>
        </form>
        <br>
        <br>



        <div id="MrPlanMotorForm">
            <div class="row">   
                <div class="col-12">
                    <h4><?php echo esc_html__('Option', 'misterplan'); ?> 3</h4>
                    Buscador y resultados por separado
                </div>
                <div class="col-12">
                    <strong>[misterplan_motor id_motor="<?php if(isset($motor->id_motor)) echo esc_attr($motor->id_motor); ?>" tipo="buscador"]</strong>
                </div>

                <div class="col-12">
                    <strong>[misterplan_motor id_motor="<?php if(isset($motor->id_motor)) echo esc_attr($motor->id_motor); ?>" tipo="resultados"]</strong>
                </div>

                <div class="col-12">
                    <a href="https://wordpress.com/es/support/editor-wordpress/bloques/bloque-de-shortcodes/" target="_blank">Mas informacion sobre los shortcodes</a>
                </div>
            </div>
        </div>

        
        <?php } ?>

</div>