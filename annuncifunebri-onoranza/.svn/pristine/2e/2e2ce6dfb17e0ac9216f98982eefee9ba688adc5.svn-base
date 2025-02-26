<?php $countFiori = count($annuncio['fiori']); ?>
<?php $countOpere = count($annuncio['opereBene']); ?>

<?php if ($annuncio['abilitatoFotoCordogli'] || $countFiori > 0 || $countOpere > 0): ?>
    <ul id="annfu_tabs" class="nav nav-tabs justify-content-center" role="tablist">
        <li role="presentation" class="nav-item annfu_li_cordoglio">
            <a href="#annfu_form_cordoglio" class="nav-link active" aria-controls="annfu_form_cordoglio" role="tab" data-tab="cordoglio"
               data-toggle="tab" aria-selected="true">Lascia un cordoglio</a>
        </li>
        <?php if ($annuncio['abilitatoFotoCordogli']): ?>
            <li role="presentation" class="nav-item annfu_li_foto">
                <a href="#annfu_form_foto" class="nav-link" aria-controls="annfu_form_foto" role="tab" data-tab="foto"
                   data-toggle="tab">Invia una foto</a>
            </li>
        <?php endif; ?>
        <?php if ($template != 'alternativo2' && $countFiori > 0): ?>
            <li role="presentation" class="nav-item annfu_li_fiori">
                <a href="#annfu_form_fiori" class="nav-link" aria-controls="annfu_form_fiori" role="tab" data-tab="fiori"
                   data-toggle="tab">Fiori</a>
            </li>
        <?php endif; ?>
        <?php if ($countOpere > 0): ?>
            <li role="presentation" class="nav-item annfu_li_donazioni">
                <a href="#annfu_donazioni" class="nav-link" aria-controls="annfu_donazioni" role="tab" data-tab="donazioni"
                   data-toggle="tab">Donazioni</a>
            </li>
        <?php endif; ?>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="annfu_form_cordoglio">
            <?php include_once(ANNFU_PLUGIN_PATH . '/templates/concordia/_partecipazioni-cordogli-form.php') ?>
        </div>
        <?php if ($annuncio['abilitatoFotoCordogli']): ?>
            <div role="tabpanel" class="tab-pane" id="annfu_form_foto">
                <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_foto-cordogli-form.php') ?>
            </div>
        <?php endif; ?>
        <?php if ($template != 'alternativo2' && $countFiori > 0): ?>
            <div role="tabpanel" class="tab-pane" id="annfu_form_fiori">
                <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_fiori.php') ?>
            </div>
        <?php endif; ?>
        <?php if ($countOpere > 0): ?>
            <div role="tabpanel" class="tab-pane" id="annfu_donazioni">
                <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_donazioni.php') ?>
            </div>
        <?php endif; ?>
    </div>
<?php else: ?>
    <?php include_once(ANNFU_PLUGIN_PATH . '/templates/concordia/_partecipazioni-cordogli-form.php') ?>
<?php endif; ?>
