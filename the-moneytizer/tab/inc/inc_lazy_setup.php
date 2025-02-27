<div class="modal fade" id="lazyModalCenter" tabindex="-1" role="dialog" aria-labelledby="lazyModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="lazyModalLongTitle"><?php echo esc_html(__('Configuration Lazy-Loading', 'themoneytizer')); ?></h5>
        <button type="button" class="close btn-close-m" data-dismiss="modal" aria-label="Close" onClick="lazyDismiss()"></button>
      </div>
      <div class="modal-body">
        <div class="lazy-form themoneytizer_card">
          <input hidden id="lazyConfigId" type="text" value=""/>
          <input hidden id="lazyConfigTag" type="text" value=""/>
          <div class="mid-size themoneytizer_mb_20 themoneytizer_form_panel">
            <label class="themoneytizer_label"><?php echo esc_html(__("Activation lazy loading","themoneytizer"));?></label>
            <p class="mid-size">
              <i class="bi bi-info-circle"></i>&nbsp;&nbsp;<?php echo esc_html(__("Avant d'activer le lazy loading pour ce format,
              soyez sûr de l'avoir correctement configuré pour éviter tout problème d'affichage.","themoneytizer"));?>
            </p>
            <div>
              <span><?php echo esc_html(__("Status","themoneytizer"));?></span>
              <input class="themoneytizer_checkbox" id="lazyConfigStatus" type="checkbox" />
            </div>
          </div>
          <div class="mid-size themoneytizer_mb_20 themoneytizer_form_panel">
            <label class="themoneytizer_label"><?php echo esc_html(__("Ancre d'affichage","themoneytizer"));?></label>
            <p class="mid-size">
            <?php echo esc_html(__("Choisissez une balise sur laquelle ancrer le lazy loading.","themoneytizer"));?>
            </p>
            <select id="lazyConfigAnchor" class="form-select" aria-label="Default select example">
              <option value="p" selected><?php echo esc_html(__("Paragraphe","themoneytizer"));?></option>
              <option value="img"><?php echo esc_html(__("Image","themoneytizer"));?></option>
              <option value="h1"><?php echo esc_html(__("TRANSLATION_LAZY_SETUP_TITLE1","themoneytizer"));?></option>
              <option value="h2"><?php echo esc_html(__("TRANSLATION_LAZY_SETUP_TITLE2","themoneytizer"));?></option>
              <option value="h3"><?php echo esc_html(__("TRANSLATION_LAZY_SETUP_TITLE3","themoneytizer"));?></option>
              <option value="h4"><?php echo esc_html(__("TRANSLATION_LAZY_SETUP_TITLE4","themoneytizer"));?></option>
              <option value="h5"><?php echo esc_html(__("TRANSLATION_LAZY_SETUP_TITLE5","themoneytizer"));?></option>
              <option value="h6"><?php echo esc_html(__("TRANSLATION_LAZY_SETUP_TITLE6","themoneytizer"));?></option>
              <option value="section"><?php echo esc_html(__("TRANSLATION_LAZY_SETUP_SECTION","themoneytizer"));?></option>
              <option value="article"><?php echo esc_html(__("TRANSLATION_LAZY_SETUP_ARTICLE","themoneytizer"));?></option>
            </select>
          </div>
          <div class="mid-size themoneytizer_mb_20 themoneytizer_form_panel">
            <label class="themoneytizer_label"><?php echo esc_html(__("TRANSLATION_LAZY_SETUP_DISPLAY_ORDER","themoneytizer"));?></label>
            <p class="mid-size">
            <?php echo esc_html(__("Choisissez si le lazy loading doit s'afficher avant ou après l'ancre sélectionnée.","themoneytizer"));?>
            </p>
            <select id="lazyConfigOrder" class="themoneytizer_mb_20 form-select" aria-label="Default select example">
              <option selected value="before"><?php echo esc_html(__("TRANSLATION_LAZY_SETUP_DISPLAY_BEFORE","themoneytizer"));?></option>
              <option value="after"><?php echo esc_html(__("TRANSLATION_LAZY_SETUP_DISPLAY_AFTER","themoneytizer"));?></option>
            </select>
          </div>
          <div class="mid-size themoneytizer_mb_20 themoneytizer_form_panel">
            <label class="themoneytizer_label"><?php echo esc_html(__("Fréquence d'affichage","themoneytizer"));?></label>
            <p class="mid-size">
            <?php echo esc_html(__("Choisissez la fréquence d'affichage du lazy loading (1 signifie que le lazy loading s'affichera à chaque ancre, 2 signifie toutes les deux ancres...).","themoneytizer"));?>
            </p>
            <input id="lazyConfigFrequency" type="number" value="1" class="form-control"/>
          </div>
          <div class="mid-size themoneytizer_mb_20 themoneytizer_form_panel">
            <label class="themoneytizer_label"><?php echo esc_html(__("Position de début","themoneytizer"));?></label>
            <p class="mid-size">
            <?php echo esc_html(__("Choisissez la position du premier lazy loading.","themoneytizer"));?>
            </p>
            <input id="lazyConfigStart" type="number" value="1" class="form-control"/>
          </div>
          <div class="themoneytizer_form_panel mid-size themoneytizer_mb_20">
            <label class="themoneytizer_label"><?php echo esc_html(__("Hauteur d'affichage","themoneytizer"));?></label>
            <p class="mid-size">
            <?php echo esc_html(__("Il est déconseillé de changer la hauteur par défaut.","themoneytizer"));?>
            </p>
            <input id="lazyConfigHeight" type="number" value=""/>
          </div>
          <div class="mid-size themoneytizer_mb_20 themoneytizer_form_panel">
            <label class="themoneytizer_label"><?php echo esc_html(__("Largeur d'affichage","themoneytizer"));?></label>
            <p class="mid-size">
            <?php echo esc_html(__("Il est déconseillé de changer la largeur par défaut.","themoneytizer"));?>
            </p>
            <input id="lazyConfigWidth" type="number" value=""/>
          </div>
          <div class="mid-size themoneytizer_mb_20 themoneytizer_form_panel">
            <label class="themoneytizer_label"><?php echo esc_html(__("Alignement","themoneytizer"));?></label>
            <p class="mid-size">
            <?php echo esc_html(__("Choisissez l'alignement de la publicité","themoneytizer"));?>
            </p>
            <input id="lazyConfigAlign1" class="radio_item" name="lazyConfigAlign" type="radio" value="left" checked/>
            <label class="label_item" for="lazyConfigAlign1">
              <i class="bi bi-text-left"></i>
            </label>
            <input id="lazyConfigAlign2" class="radio_item" name="lazyConfigAlign" type="radio" value="center"/>
            <label class="label_item" for="lazyConfigAlign2">
              <i class="bi bi-text-center"></i>
            </label>
            <input id="lazyConfigAlign3" class="radio_item" name="lazyConfigAlign" type="radio" value="right"/>
            <label class="label_item" for="lazyConfigAlign3">
              <i class="bi bi-text-right"></i>
            </label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary themoneytizer_min_h_40" data-dismiss="modal" onClick="lazyDismiss()"><?php echo esc_html(__("Annuler","themoneytizer"));?></button>
        <button type="button" id="lazySaveButton" class="btn themoneytizer_button themoneytizer_min_h_40" onClick="lazySave()">
          <span id="lazySaveButtonLabel"><?php echo esc_html(__('Sauvegarder', 'themoneytizer')); ?></span>
          <div id="lazySaveButtonSpinner" style="display: none;" class="spinner-border spinner-alt" role="status">
            <span class="sr-only"></span>
          </div>
        </button>
      </div>
    </div>
  </div>
</div>