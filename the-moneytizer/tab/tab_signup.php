<div class="row" style="margin-top:40px;margin-bottom:20px;">
    <div class="col-4" >
      <h4><?php _e('Bienvenue sur votre MoneyBox','themoneytizer');?></h4>
      <p><?php _e("Gérer vos formats publicitaires, vos informations...",'themoneytizer');?></p>
      <p class="mid-size">
        <?php _e('Pour commencer à utiliser le plugin wordpress TheMoneytizer, commencez par vous authentifier ou vous créer un compte en utilisant une des méthodes ci-dessous.', 'themoneytizer'); ?>
      </p>
    </div>
    <div class="col-5" style="text-align:right;">
        <div style="width:50%; margin-left: auto;">
            <img style="width: 100%;" src="https://www.themoneytizer.com/global/img/logomoneytizer.png" alt="themoneytizer_logo"/><br/>
            <p style="text-align:center;margin-top:5px;">
                <?php include('inc/inc_language_list.php'); ?>
            </p>
        </div>
    </div>
</div>   
<div class="themoneytizer_card mid-size">
    <h5><?php _e('Votre site est déjà inscrit sur notre plateforme ?','themoneytizer');?></h5>
    <div style="display:flex; flex-wrap: wrap;justify-content:space-between">
        <div style="width:55%;margin-right:5%;">
            <p class="mid-size">
                <?php _e('Utilisez son ID WordPress','themoneytizer');?>
            </p>
            <form id="token_form" method="post" action="options-general.php?page=themoneytizer">
                <input type="hidden" name="themoneytizer_is_registered"  value="4">
                <input type="hidden" name="wplang" id="wplang" value="<?php echo get_option('WPLANG'); ?>">
                <table>
                    <tr>
                        <td><label for="themoneytizer_setting_token"><?php _e('Moneytizer ID*:','themoneytizer');?></label></td>
                        <td><input type="text" class="width_money" name="themoneytizer_setting_token" id="themoneytizer_setting_token"  value="<?php echo get_option('themoneytizer_setting_token'); ?>"></td>

                        <td><input type="submit"  id="submit" name="submit" class="themoneytizer_button" value="<?php _e('Enregistrer','themoneytizer');?>"></td>
                    </tr>
                </table>
            </form>
            <div>
                <h6 style="margin-top: 15px"><?php _e('Où trouver mon identifiant ?','themoneytizer');?></h6>
                <p class="mid-size"><?php _e('Votre identifiant est affiché sur la page dédiée à votre site de votre espace éditeur personnel. Pour y accéder, rendez-vous sur votre <a class="themoneytizer_link" href="http://www.themoneytizer.com/manager/main" target="_blank">Moneybox</a>','themoneytizer');?>.<br/>
                <i class="bi bi-info-circle"></i>&nbsp;<?php _e('Votre identifiant est une suite de lettres et chiffres par exemple.','themoneytizer');?>"<b>3b2b79d0667e6e43ee962fc3ff6349f6</b>"</p>
            </div>
        </div>
        <div style="width:40%;">
            <?php _e('<iframe style="margin: 3%;" src="https://player.vimeo.com/video/171747567" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" frameborder="0" height="220" width="400"></iframe>','themoneytizer');?>
        </div>
    </div>
</div>
<div class="themoneytizer_card mid-size" style="margin-top: 5px">
    <h5><?php _e('Votre site n\'est pas encore inscrit sur notre plateforme ou vous n\'avez pas de compte ?','themoneytizer');?></h5>
    <div style="display:flex; flex-wrap: wrap;justify-content:space-between">
        <div style="width:55%;margin-right:5%;">
            <p class="mid-size">
                <?php _e('Rendez-vous sur la page suivante pour inscrire votre site ou créer un compte, utilisez ensuite votre id wordpress pour vous connecter.','themoneytizer');?>
                <a class="themoneytizer_link" href="http://www.themoneytizer.com/manager/main" target="_blank"><?php _e('Inscrire un site ou créer un compte.', 'themoneytizer'); ?></a>
            </p>
    </div>
</div>