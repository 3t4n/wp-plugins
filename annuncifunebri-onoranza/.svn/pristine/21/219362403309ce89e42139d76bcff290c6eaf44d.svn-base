<?php if (!defined('ABSPATH')) exit; ?>
<div id="annfu_annunci_filter" class="row">
    <div class="col-12">
        <div class="annfu_annunci_filter">
            <form action="<?php echo get_site_url() ?>/<?php echo ANNFU_PAGE_ANNUNCI ?>" method="get" role="search">
                <div class="row mb-2">
                    <div class="annfu_filter_field col-xs-12 col-sm-6 text-center">
                        <input type="text" class="form-control" name="nome" value="<?php echo isset($_COOKIE['annuncifunebri_nome']) ? annfu_decrypt($_COOKIE['annuncifunebri_nome']) : '' ?>">
                        <label for="nome">nome</label>
                    </div>
                    <div class="annfu_filter_field col-xs-12 col-sm-6 text-center">
                        <input type="text" class="form-control" name="cognome" value="<?php echo isset($_COOKIE['annuncifunebri_cognome']) ? annfu_decrypt($_COOKIE['annuncifunebri_cognome']) : '' ?>">
                        <label for="nome">cognome</label>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="annfu_filter_field col-xs-12 col-sm-6 text-center">
                        <input type="text" class="form-control datepicker" name="dal" value="<?php echo isset($_COOKIE['annuncifunebri_dal']) ? annfu_decrypt($_COOKIE['annuncifunebri_dal']) : '' ?>">
                        <label for="nome">data del decesso</label>
                    </div>
                    <div class="annfu_filter_field col-xs-12 col-sm-6 text-center">
                        <input type="text" class="form-control" name="paese" value="<?php echo isset($_COOKIE['annuncifunebri_paese']) ? annfu_decrypt($_COOKIE['annuncifunebri_paese']) : '' ?>">
                        <label for="nome">luogo del decesso</label>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3 text-center">
                        <input type="submit" value="Cerca" class="annfu_filter_submit btn btn-default"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
