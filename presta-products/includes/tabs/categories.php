<div class="content mt-4 clr ppgbo-categories <?php echo (($page != 'categories') ? 'hide' : ''); ?>" <?php echo (($page != 'categories') ? 'style="display:none;"' : ''); ?>>
        
    <hr class="mt-4">
    <h3 class="mt-3"><?php echo __( 'Correspondances des catégories WP <> Prestashop', 'presta-products'); ?></h3>
    <hr>
    
    <form class="form-basic" method="post" action="#">
        <input type="hidden" name="type" value="categories" />
        
        <?php
            if ($message) {
                echo ' <div class="toast-container position-absolute top-0 end-0 p-3"><div class="toast" id="toast3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                          <div class="toast-header bg-primary text-white"><strong class="me-auto">' . __( 'Enregistrement', 'presta-products' ) . '</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="' . __( 'Fermeture', 'presta-products' ) . '"></button>
                          </div><div class="toast-body">' . $message . '</div></div></div>';
            }
        ?>
        
        <div class="row mt-4">   
            <label for="use_categories" class="col-form-label col-sm-4">  
                <span>
                    <?php echo __( 'Utiliser la correspondances des catégories ?', 'presta-products'); ?><br>
                    <i class="small"><?php echo __( 'Par défaut: Non.', 'presta-products'); ?></i>
                </span>    
            </label>  
            <div class="col-sm-6">
                <input type="checkbox" class="form-control" id="use_categories" name="use_categories" <?php echo (($use_categories == 1) ? 'checked="checked"' : ''); ?> <?php echo (($freemium == 0) ? 'disabled' : ''); ?> />    <br>
                    <i class="small"><?php echo __( 'Option disponible avec la version payante.', 'presta-products'); ?></i>                 
            </div>
        </div>

        <div class="row mt-4"> 
            <div class="col-12">
                <button type="submit" class="btn btn-primary"><?php echo __( 'Enregistrer', 'presta-products'); ?></button>
            </div>
        </div>  
    </form>
    
    <?php
        if ($use_categories) {
    ?>
    
        <hr class="mt-4">
        <h3 class="mt-3"><?php echo __( 'Actions', 'presta-products'); ?></h3>
        <hr>
        
        <div class="row mt-4">   
            <form class="form-basic" method="post" action="#">
                <input type="hidden" name="type" value="correspondances_cat" />
                <input type="hidden" name="id" value="<?php echo $correspondance[0]->id; ?>" />
                
                <div class="row mt-4">   
                    <label for="id_cat_wordpress" class="col-form-label col-sm-4">  
                        <span><?php echo __( 'Catégorie WordPress', 'presta-products'); ?></span>    
                    </label>  
                    <div class="col-sm-6">
                        <select class="form-control" id="id_cat_wordpress" name="id_cat_wordpress">
                            <option value="">-</option>
                            <?php
                                foreach ($categories as $element) {
                                    echo '<option value="' . esc_html($element->cat_ID) . '" ' . ((!empty($correspondance) && $correspondance[0]->id_cat_wordpress == $element->cat_ID) ? 'selected="selected"' : '') . '>' . esc_html($element->cat_name) . '</option>';
                                }
                            ?>
                        </select>         
                    </div>
                </div>
                
                <div class="row mt-4">   
                    <label for="id_cat_prestashop" class="col-form-label col-sm-4">  
                        <span>
                            <?php echo __( 'Catégorie PrestaShop', 'presta-products'); ?><br>
                            <i class="small"><?php echo __( 'ID de la catégorie sur PrestaShop.', 'presta-products'); ?></i>
                        </span>    
                    </label>  
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="id_cat_prestashop" name="id_cat_prestashop" value="<?php echo ((!empty($correspondance)) ? $correspondance[0]->id_cat_prestashop : ''); ?>" />         
                    </div>
                </div>

                <div class="row mt-4"> 
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary"><?php echo __( 'Enregistrer', 'presta-products'); ?></button>
                    </div>
                </div>  
            </form>
        </div>
    
        <hr class="mt-4">
        <h3 class="mt-3"><?php echo __( 'Données enregistrées', 'presta-products'); ?></h3>
        <hr>
        
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th><?php echo __( 'Catégorie WordPress', 'presta-products' ); ?></th>
                    <th><?php echo __( 'Catégorie PrestaShop', 'presta-products' ); ?></th>
                    <th><?php echo __( 'Actions', 'presta-products'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (!empty($correspondances)) {
                        foreach ($correspondances as $element) {
                            echo '<tr>';
                            echo '<td>' . esc_html(get_the_category_by_ID($element->id_cat_wordpress)) . '</td>';
                            echo '<td>' . esc_html($element->id_cat_prestashop) . '</td>';
                            echo '<td><a class="btn btn-primary btn-sm" href="?page=presta-products&tab=categories&id=' . $element->id . '"><span class="dashicons dashicons-edit"></span></a>&nbsp;<a class="btn btn-danger btn-sm deleteCorrespondance" href="javascript:;" data-id="' . $element->id . '"><span class="dashicons dashicons-trash"></span></a></td>';
                            echo '</tr>';
                        }
                    }
                    else {
                        echo '<tr><td colspan="3">' . __( 'Pas de données.', 'presta-products' ) . '</td></tr>';
                    }
                ?>
            </tbody>
        </table>
    
    <?php
        }
    ?>
        
</div>