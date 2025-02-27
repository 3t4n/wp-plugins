<?php
// Affichage du menu d'administration
function cyberpretCalculettesAdminPage()
{
?>
<div class="wrap">
	<script type="text/javascript">
			
		(function( $ ) {
		 
			$(function() {
				
				// Add Color Picker to all inputs that have 'color-field' class

				var myOptions = {
					// you can declare a default color here,
					// or in the data-default-color attribute on the input
					defaultColor: false,
					// a callback to fire whenever the color changes to a valid color
					change: function(event, ui){},
					// a callback to fire when the input is emptied or an invalid color
					clear: function() {},
					// hide the color picker controls on load
					hide: true,
					// show a group of common colors beneath the square
					// or, supply an array of colors to customize further
					palettes: true
				};

				$('.color-field').wpColorPicker(myOptions);

				// Copier dans le presse-papier
				new Clipboard('.copyThis', {
					target: function(trigger) {
						return trigger.previousSibling;
					}
				});
								
			});
			 
		})( jQuery );
	</script>
    <h2><i class="fa fa-calculator" aria-hidden="true"></i> Cyberpret - Nos calculettes</h2>
    <p>Choisissez vos couleurs dans le formulaire ci-joint, puis copiez le code fourni ci dessous. Les couleurs se mettront à jour automatiquement sur votre calculette.<br/>
    En cliquant sur le bouton [Effacer], vous réinitialisez à la couleur par défaut.</p>
    
    <h3>Choisir une calculette, code à insérer</h3>
    <p>Copier le code avec les crochets, et collez-le dans votre page, votre article... là où vous voulez voir apparaitre la calculette de votre choix.
    <br/>
    Il suffit de cliquer sur le bouton <strong>Copier</strong> pour que le <em>shortcode</em> se <strong>copie dans votre presse-papier</strong>. Vous n'aurez plus qu'à le coller là où vous le voulez.</p>
    
    <?php $n = 1; ?>
    
    <ul id="listeCalc">
    	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calculette de bureau&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcBureau]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/> 
            <em class="petit">La plus simple et plus basique des calculettes, qui vous permet ce faire des additions, soustractions, multiplications, divisions... comme votre calculette de bureau.</em>
            <?php $n++; ?>
        </li>

    	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calcul de crédit immobilier <i class="fa fa-flag" aria-hidden="true"></i>
&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcCreditImmo]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Calculez la mensualité, le montant, de taux ou la durée de votre prêt immobilier, et obtenez son tableau d'amortissement complet.</em>
            <?php $n++; ?>
        </li>
        
    	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calcul de capacité de prêt immobilier&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcCapacite]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Calculez de combien vous disposez pour votre acquisition immobilière, en tenant compte des frais de notaire et du PTZ.</em>
            <?php $n++; ?>
        </li>
        
    	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calcul des frais de notaire&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcNotaire]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Comme son nom l'indique, calculez les frais de notaire en fonction du montant de votre prêt et de votre départment.</em>
            <?php $n++; ?>
        </li>
        
    	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calcul du PTZ+&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcPtz]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Calculez le montant du prêt à taux zéro auquel vous pouvez prétendre pour vous aider à financer votre acquisition.</em>
            <?php $n++; ?>
        </li>
        
    	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Rachat de crédit immobilier&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcRachat]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Mesurez par vous-même l’avantage ou non d’un rachat de prêt.</em>
            <?php $n++; ?>
        </li>
        
    	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calcul de l'hypothèque&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcHypotheque]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Calculez le coût des frais de garantie de votre hypothèque ou du privilège prêteur de deniers.</em>
             <?php $n++; ?>
       </li>

    	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calcul caution crédit logement&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcCautionCreditLogement]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Calculez le coût de la Caution Crédit Logement alternative à une hypothèque.</em>
            <?php $n++; ?>
        </li>
 
     	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calcul caution SACCEF&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcCautionSaccef]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/> 
            <em class="petit">Calculer le coût de la caution SACCEF alternative à une hypothèque.</em>
            <?php $n++; ?>
        </li>
 
      	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Comparatif taux fixe / taux révisable <i class="fa fa-flag" aria-hidden="true"></i>&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcTauxFixeRevisable]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Choisir un taux variable capé, c'est prendre le risque de le voir augmenter (dans certaines limites). Mais son taux de départ est aussi plus bas...</em>
            <?php $n++; ?>
        </li>

      	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Comparateur taux fixe / taux mixte <i class="fa fa-flag" aria-hidden="true"></i>&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcTauxFixeMixte]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Calculez la différence de coût entre un taux immobilier fixe et un taux immobilier variable mixte</em>
            <?php $n++; ?>
        </li>

       	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calculatrice de lissage de prêt <i class="fa fa-flag" aria-hidden="true"></i>&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcLissagePret]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Lissez vos prêts pour optimiser votre financement.</em>
            <?php $n++; ?>
        </li>

      	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calcul de prêt immobilier modulable <i class="fa fa-flag" aria-hidden="true"></i>&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcModulable]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Simulez la modulation de vos remboursements à la date de votre choix.</em>
            <?php $n++; ?>
        </li>
        
       	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calcul de prêt progressif <i class="fa fa-flag" aria-hidden="true"></i>&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcProgressif]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Calculer vos mensualités progressives tout au long du remboursement de votre prêt.</em>
            <?php $n++; ?>
        </li>
     
       	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calcul du taux effectif global&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcTeg]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Calculez le TEG, tenant compte des intérêts, du coût de l'assurance et des frais de garantie et de dossier.</em>
            <?php $n++; ?>
        </li>

       	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calculatrice de Prêt In Fine <i class="fa fa-flag" aria-hidden="true"></i>&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcInFine]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Effectuez une simulation pour calculer les intérêts de votre prêt in fine ainsi que le montant de l’épargne à verser pour rembourser le capital emprunté.</em>
            <?php $n++; ?>
        </li>


       	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Comparatif prêt amortissable / In Fine&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcAmortissableInFine]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Grâce à cet outil, déterminez l'option la plus intéressante entre un prêt in fine ou amortissable.</em>
            <?php $n++; ?>
        </li>
     
       	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calcul Prêt Parcours Résidentiel Paris&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcPPRParis]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Déterminez si vous avez droit au Prêt Parcours Résidentiel de Paris et pour quel montant.</em>
            <?php $n++; ?>
        </li>
     
       	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calcul prêt Paris Logement 0%&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcPretParisLogement0]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Déterminez si vous avez droit au Prêt Paris Logement 0% et pour quel montant.</em>
            <?php $n++; ?>
        </li>

       	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calcul du prêt à taux zéro de Caen&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcPtzCaen]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Déterminez si vous avez droit au Prêt Parcours Résidentiel de Caen et pour quel montant.</em>
            <?php $n++; ?>
        </li>
 
        <li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calcul du prêt à taux zéro de Marseille&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcPtzMarseille]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Déterminez si vous avez droit au Chèque Premier Logement de Marseille et pour quel montant.</em>
            <?php $n++; ?>
        </li>

        <li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calcul du prêt à taux zéro de Toulouse&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcPtzToulouse]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Déterminez si vous avez droit au PTZ de Toulouse et pour quel montant.</em>
            <?php $n++; ?>
        </li>
     
       	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calcul de l'imposition des plus-values&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcImpotPlusValue]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Calculer l'impôt que vous aurez à régler en cas de revente de votre bien immobilier.</em>
            <?php $n++; ?>
        </li>

       	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Optimisation de votre épargne <i class="fa fa-flag" aria-hidden="true"></i>&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcEpargne]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Calculez l’évolution de votre épargne en fonction du placement initial et du taux de rendement.</em>
            <?php $n++; ?>
        </li>

       	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calcul de défiscalisation Pinel&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcDefiscPinel]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Calculez le montant de la réduction d'impôt Pinel, les bilans foncier, la CSG CRDS,...</em>
            <?php $n++; ?>
        </li>

       	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calcul du capital restant dû <i class="fa fa-flag" aria-hidden="true"></i>&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcCapitalRestantDu]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Calculez le montant de votre emprunt (hors intérêts) qu’il vous reste à rembourser à votre banque.</em>
            <?php $n++; ?>
        </li>

       	<li>
            <strong><span class="numerotation"><?php echo $n; ?></span> Calculatrice de prêt Duo <i class="fa fa-flag" aria-hidden="true"></i>&nbsp;:</strong><br/>
            <input type="text" value="[cyberpretCalcDuo]" /><button type="button" class="copyThis" title="Copier le shortcode"><i class="fa fa-clipboard" aria-hidden="true"></i></button><br/>
            <em class="petit">Au lieu de souscrire un prêt unique de la durée désirée, il s'agit d'en souscrire deux&nbsp;: l'un sur une durée plus courte (et dont le taux sera donc plus bas), l'autre sur la durée désirée, qui sera lissé sur le premier.</em>
            <?php $n++; ?>
        </li>
    
    </ul>
    
    <form method="post" action="options.php" name="cyberpretCalculettesForm">
    <h3>Internationalisation</h3>
    <p>
    Certaines calculettes, qui sont marquées de ce logo <i class="fa fa-flag" aria-hidden="true"></i>, peuvent être accessibles dans d'autres langues et d'autres devises. Les choix ci-dessous permettront de les modifier.<br/>
    Nous n'avons internationalisé que les calculatrices dont la fonction le justifiait. Celles qui correspondent à une réglementation typiquement et exclusivement française ne disposent pas de cette option.
    </p>
    
    <div class="en2colonnes">
    
    	<div class="unElement">
            <table class="form-table">
                <tr valign="top">
                <th scope="row"><i class="fa fa-globe" aria-hidden="true"></i> Langue</th>
                <td>
                	<select name="localization" id="localization">
                    	<option value="fr">Français</option>
                        <option value="en"<?php echo (get_option('localization')=="en") ? " selected='selected'" : NULL; ?>>Anglais</option>
                    </select>
                
                </td>
                </tr>
            </table>
        
        </div>
    
    	<div class="unElement">
            <table class="form-table">
            
                <tr valign="top">
                <th scope="row"><i class="fa fa-money" aria-hidden="true"></i> Devise</th>
                <td>
                	<select name="devise" id="devise">
                    	<option value="euro">Euro</option>
                        <option value="dollar"<?php echo (get_option('devise')=="dollar") ? " selected='selected'" : NULL; ?>>Dollar</option>
                        <option value="sterling"<?php echo (get_option('devise')=="sterling") ? " selected='selected'" : NULL; ?>>Livre sterling</option>
                        <option value="yen"<?php echo (get_option('devise')=="yen") ? " selected='selected'" : NULL; ?>>Yen</option>
                        <option value="chf"<?php echo (get_option('devise')=="chf") ? " selected='selected'" : NULL; ?>>Franc suisse</option>
                        <option value="mad"<?php echo (get_option('devise')=="mad") ? " selected='selected'" : NULL; ?>>Dirham marocain</option>
                        <option value="dzd"<?php echo (get_option('devise')=="dzd") ? " selected='selected'" : NULL; ?>>Dinar algérien</option>
                        <option value="tnd"<?php echo (get_option('devise')=="tnd") ? " selected='selected'" : NULL; ?>>Dinar tunisien</option>
                        <option value="mru"<?php echo (get_option('devise')=="mru") ? " selected='selected'" : NULL; ?>>Ouguiya mauritanienne</option>
                        <option value="xof"<?php echo (get_option('devise')=="xof") ? " selected='selected'" : NULL; ?>>Franc CFA (XOF)</option>
                        <option value="xaf"<?php echo (get_option('devise')=="xaf") ? " selected='selected'" : NULL; ?>>Franc CFA (XAF)</option>
                        <option value="cad"<?php echo (get_option('devise')=="cad") ? " selected='selected'" : NULL; ?>>Dollar canadien</option>
                        <option value="kmf"<?php echo (get_option('devise')=="kmf") ? " selected='selected'" : NULL; ?>>Franc comorien</option>
                        <option value="djf"<?php echo (get_option('devise')=="djf") ? " selected='selected'" : NULL; ?>>Franc djibouti</option>
                        <option value="gnf"<?php echo (get_option('devise')=="gnf") ? " selected='selected'" : NULL; ?>>Franc guinéen</option>
                        <option value="htg"<?php echo (get_option('devise')=="htg") ? " selected='selected'" : NULL; ?>>Gourde</option>
                        <option value="mga"<?php echo (get_option('devise')=="mga") ? " selected='selected'" : NULL; ?>>Ariary</option>
                        <option value="rwf"<?php echo (get_option('devise')=="rwf") ? " selected='selected'" : NULL; ?>>Franc rwandais</option>
                        <option value="scr"<?php echo (get_option('devise')=="scr") ? " selected='selected'" : NULL; ?>>Roupie seychelloise</option>
                        <option value="vuv"<?php echo (get_option('devise')=="vuv") ? " selected='selected'" : NULL; ?>>Vatu</option>
                        <option value="lbp"<?php echo (get_option('devise')=="lbp") ? " selected='selected'" : NULL; ?>>Livre libanaise</option>
                        <option value="mur"<?php echo (get_option('devise')=="mur") ? " selected='selected'" : NULL; ?>>Roupie mauricienne</option>
                        <option value="bif"<?php echo (get_option('devise')=="bif") ? " selected='selected'" : NULL; ?>>Franc burundais</option>
                        <option value="xpf"<?php echo (get_option('devise')=="xpf") ? " selected='selected'" : NULL; ?>>Franc pacifique</option>
                    </select>
                </td>
                </tr>
            </table>
        </div>
                
    </div>
    

    <h3>Masquer / afficher des éléments </h3>
    <p>
    Cette option vous permet de masquer ou d'afficher le tableau d'amortissement dans le résultat de la calculatrice de crédit immmobilier. 
    </p>

    
    <div class="unElement">
        <table class="form-table">
            <tr valign="top">
            <th scope="row">Tableau d'amortissement</th>
            <td>
                	<select name="tableau_amortissement" id="tableau_amortissement">
                    	<option value="oui">Affiché</option>
                        <option value="non"<?php echo (get_option('tableau_amortissement')=="non") ? " selected='selected'" : NULL; ?>>Masqué</option>
                    </select>
                </td>
            </tr>
               
        </table>
    </div>


    <h3>Apparence des calculettes</h3>
    <p>Définissez votre thème de couleur. Ce thème sera appliqué à toutes les calculettes.</p>
    
    <?php
	settings_fields( 'cyberpretCalculettes-settings-group' );	
	do_settings_sections( 'cyberpretCalculettes-settings-group' );
	?>	

    <div class="en2colonnes">
    
        <div class="unElement">
        
            <h4><i class="fa fa-paragraph" aria-hidden="true"></i> Fond, paragraphes...</h4>
    
            <table class="form-table">
            
                <tr valign="top">
                <th scope="row">Couleur de fond de la page</th>
                <td><input type="text" name="couleurFond" id="couleurFond" value="<?php echo esc_attr( get_option('couleurfond') ); ?>" data-default-color="" class="color-field" /></td>
                </tr>
                 
                <tr valign="top">
                <th scope="row">Couleur des paragraphes, labels de formulaire...</th>
                <td><input type="text" name="couleurP" id="couleurP" value="<?php echo esc_attr( get_option('couleurp') ); ?>" data-default-color="" class="color-field" /></td>
                </tr>
                
            </table>
        
        </div>
    
        <div class="unElement">

            <h4><i class="fa fa-link" aria-hidden="true"></i> Liens hypertextes</h4>
        
            <table class="form-table">
            
                <tr valign="top">
                <th scope="row">Couleur des liens</th>
                <td><input type="text" name="couleurLien" id="couleurLien" value="<?php echo esc_attr( get_option('couleurlien') ); ?>" data-default-color="" class="color-field" /></td>
                </tr>
        
                <tr valign="top">
                <th scope="row">Couleur des liens au survol</th>
                <td><input type="text" name="couleurLienHover" id="couleurLienHover" value="<?php echo esc_attr( get_option('couleurlienhover') ); ?>" data-default-color="" class="color-field" /></td>
                </tr>
        
            </table>
        
        </div>

        <div class="unElement">
    
            <h4><i class="fa fa-header" aria-hidden="true"></i> Titres</h4>
            
            <table class="form-table">
        
                <tr valign="top">
                <th scope="row">Couleur des titres de niveau 2 <span class="petit">(le niveau 1 est réservé au titre général de la page)</span></th>
                <td><input type="text" name="couleurH2" id="couleurH2" value="<?php echo esc_attr( get_option('couleurh2') ); ?>" data-default-color="" class="color-field" /></td>
                </tr>
        
                <tr valign="top">
                <th scope="row">Couleur des titres de niveau 3</th>
                <td><input type="text" name="couleurH3" id="couleurH3" value="<?php echo esc_attr( get_option('couleurh3') ); ?>" data-default-color="" class="color-field" /></td>
                </tr>
        
                <tr valign="top">
                <th scope="row">Couleur des titres de niveau 4</th>
                <td><input type="text" name="couleurH4" id="couleurH4" value="<?php echo esc_attr( get_option('couleurh4') ); ?>" data-default-color="" class="color-field" /></td>
                </tr>
                
            </table>
        
        </div>
    
        <div class="unElement">

            <h4><i class="fa fa-check-square-o" aria-hidden="true"></i> Formulaire</h4>
        
            <table class="form-table">
        
                <tr valign="top">
                <th scope="row">Couleur de texte des champs de formulaire (input, select...)</th>
                <td><input type="text" name="couleurChamp" id="couleurChamp" value="<?php echo esc_attr( get_option('couleurchamp') ); ?>" data-default-color="" class="color-field" /></td>
                </tr>
                
            </table>
 
 		</div>
           
        <div class="unElement">

            <h4><i class="fa fa-square-o" aria-hidden="true"></i> Résultat, encadrement...</h4>
        
            <table class="form-table">
         
                <tr valign="top">
                <th scope="row">Couleur du résultat</th>
                <td><input type="text" name="couleurMiseValeur1" id="couleurMiseValeur1" value="<?php echo esc_attr( get_option('couleurmisevaleur1') ); ?>" data-default-color="" class="color-field" /></td>
                </tr>
        
                <tr valign="top">
                <th scope="row">Couleur des encadrements</th>
                <td><input type="text" name="couleurEncadrement" id="couleurEncadrement" value="<?php echo esc_attr( get_option('couleurencadrement') ); ?>" data-default-color="" class="color-field" /></td>
                </tr>
        
                <tr valign="top">
                <th scope="row">Couleur de fond des blocs encadrés</th>
                <td><input type="text" name="couleurEncadrementFond" id="couleurEncadrementFond" value="<?php echo esc_attr( get_option('couleurencadrementfond') ); ?>" data-default-color="" class="color-field" /></td>
                </tr>
               
            </table>
		
        </div>

        <div class="unElement">
        
            <h4><i class="fa fa-table" aria-hidden="true"></i> Tableaux</h4>
        
            <table class="form-table">
         
                <tr valign="top">
                <th scope="row">En-têtes, balise &lt;th&gt;</th>
                <td><input type="text" name="couleurTableTh" id="couleurTableTh" value="<?php echo esc_attr( get_option('couleurtableth') ); ?>" data-default-color="" class="color-field" /></td>
                </tr>
         
                <tr valign="top">
                <th scope="row">Fond des lignes par défaut, lignes impaires</th>
                <td><input type="text" name="couleurTableImpaires" id="couleurTableImpaires" value="<?php echo esc_attr( get_option('couleurtableimpaires') ); ?>" data-default-color="" class="color-field" /></td>
                </tr>
        
                <tr valign="top">
                <th scope="row">Fond des lignes paires</th>
                <td><input type="text" name="couleurTablePaires" id="couleurTablePaires" value="<?php echo esc_attr( get_option('couleurtablepaires') ); ?>" data-default-color="" class="color-field" /></td>
                </tr>
              
            </table>
		
        </div>
    
        <div class="unElement">

            <h4><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Divers</h4>
        
            <table class="form-table">
         
                <tr valign="top">
                <th scope="row">Couleur des messages d'erreur</th>
                <td><input type="text" name="couleurErreur" id="couleurErreur" value="<?php echo esc_attr( get_option('couleurerreur') ); ?>" data-default-color="" class="color-field" /></td>
                </tr>
               
            </table>
        
            <table class="form-table">
         
                <tr valign="top">
                <th scope="row">Titre de la calculette</th>
                <td>
                    <?php
                    $ok2 = get_option('noH2');
                    if (strlen($ok2)<1) $ok2 = '0';
                    ?>
                    <label><input type="radio" name="noH2" value="0"<?php echo (!$ok2) ? " checked='checked'": NULL; ?> />Titre d'origine, prévu dans la calculette</label><br/>
                    <label><input type="radio" name="noH2" value="1"<?php echo ($ok2=='1') ? " checked='checked'": NULL; ?> />Pas de titre, à vous de le gérer</label>
                </td>
                </tr>
                
                <tr><td colspan="2">Vous pouvez soit afficher le titre par défaut (option conseillée) ou ne rien mettre. Dans ce cas, ce sera à vous d'écrire votre propre titraille, au cas par cas.</td></tr>
               
            </table>

            <?php /*
            <table class="form-table">
         
                <tr valign="top">
                <th scope="row">Référence aux créateurs du plugin</th>
                <td>
                    <?php
                    $ok = get_option('liencyberpret');
                    if (strlen($ok)<1) $ok = '1';
                    ?>
                    <label><input type="radio" name="lienCyberpret" value="1"<?php echo ($ok=='1') ? " checked='checked'": NULL; ?> />Lien discret sous la calculette</label><br/>
                    <label><input type="radio" name="lienCyberpret" value="0"<?php echo ($ok=='0') ? " checked='checked'": NULL; ?> />Texte sans lien <em>"Par CyberPrêt.com"</em> sous le titre de la calculette</label>
                </td>
                </tr>
                
                <tr><td colspan="2">Vous avez le choix entre afficher un texte <em>"Par CyberPrêt.com"</em> sous le titre de la calculette, ou un texte discret avec un lien sous la calculette.</td></tr>
               
            </table>
			*/ ?>
		
        </div>

	</div>
    
	<?php submit_button() ?>
        
    </form>
    
    
</div>
	
<?php	
}
?>