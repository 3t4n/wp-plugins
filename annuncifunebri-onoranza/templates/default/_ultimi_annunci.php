<?php $cols = floor(12 / ANNFU_CAROUSEL_RESULTS_SLIDE_PLACEHOLDER); ?>

<div x-data="ultimiAnnunci" class="widget-text wp_widget_plugin_box annfu annfu_widget annfu_ultimi_annunci">
    <div x-show="isLoading" class="annfu_text_center">Sto caricando gli annunci...</div>

    <div x-show="!isLoading" class="carousel slide multi-item-carousel" id="annfu_carousel_ultimi" data-ride="carousel">
        <div class="carousel-inner">
            <template
                    x-for="ci in Math.ceil(<?php echo ANNFU_CAROUSEL_RESULTS_PLACEHOLDER ?>/perPage)">
                <div class="carousel-item" :class="{'active': ci == 1}">
                    <div class="row">
                        <template x-for="(annuncio, i) in ultimiAnnunci" :key="annuncio.slug">
                            <template x-if="i >= (ci-1) * perPage && i < ci * perPage">
                                <div class="annfu_text_center col-md-<?php echo $cols ?>">
                                    <div class="annfu_ultimi_annunci_wrapper">
                                        <a :href="`<?php echo get_site_url() . '/' . ANNFU_PAGE_ANNUNCIO ?>/${annuncio.comune.slug}/${annuncio.slug}`">
                                            <template x-if="annuncio.tipoAnnuncio === 'anniversario'">
                                                <div class="annfu_ribbon_anniversario_wrapper">
                                                    <div class="annfu_ribbon_anniversario">anniversario</div>
                                                </div>
                                            </template>
                                            <template x-if="annuncio.tipoAnnuncio === 'ringraziamento'">
                                                <div class="annfu_ribbon_ringraziamento_wrapper">
                                                    <div class="annfu_ribbon_ringraziamento">ringraziamento</div>
                                                </div>
                                            </template>
                                            <img :src="annuncio.foto" class="img-responsive"
                                                 :title="annuncio.nominativo">
                                            <div class="annfu_nominativo annfu_text_center"
                                                 x-html="annuncio.nominativoCompleto"></div>
                                        </a>
                                    </div>
                                </div>
                            </template>
                        </template>
                    </div>
                </div>
            </template>
        </div>
        <a class="carousel-control-prev" href="#annfu_carousel_ultimi" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#annfu_carousel_ultimi" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
    </div>
</div>
