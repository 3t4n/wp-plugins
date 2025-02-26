<?php

extract($args);

$title = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : '';
$description = isset($instance['description']) ? $instance['description'] : '';
$results = isset($instance['results']) ? $instance['results'] : ANNFU_CAROUSEL_RESULTS;
$resultsPerPage = isset($instance['results_per_page']) ? $instance['results_per_page'] : ANNFU_CAROUSEL_RESULTS_PER_PAGE;
$cols = floor(12 / $resultsPerPage);

echo $before_widget;
?>
<div x-data="annunci" class="widget-text wp_widget_plugin_box annfu annfu_widget">
    <?php
    echo $title ? $before_title . $title . $after_title : "";
    echo $description ? '<p>' . $description . '</p>' : '';

    $url = ANNFU_SITE_API . '/v2/annunci?limit=' . $results . '&onoranza_funebre_id=' . get_option('annfu_onoranza_funebre_id');
    ?>
    <div x-show="isLoading" class="annfu_text_center">Sto caricando gli annunci...</div>

    <div x-show="!isLoading" class="carousel slide multi-item-carousel" id="annfu_carousel" data-ride="carousel">
        <div class="carousel-inner">
            <template x-for="ci in Math.ceil(<?php echo $results ?>/perPage)">
                <div class="carousel-item" :class="{'active': ci == 1}">
                    <div class="row">
                        <template x-for="(annuncio, i) in annunci" :key="annuncio.slug">
                            <template
                                    x-if="i >= (ci - 1) * perPage && i < ci * perPage">
                                <div class="annfu_text_center"
                                     :class="{'col-12': perPage == 1, 'col-md-<?php echo $cols ?>': perPage > 1 }">
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
                                                 :title="annuncio.nominativoCompleto">
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
        <a class="carousel-control-prev" href="#annfu_carousel" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#annfu_carousel" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
    </div>
</div>

<?php echo $after_widget; ?>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('annunci', () => ({
            isLoading: false,
            annunci: [],
            perPage: window.innerWidth < 768 ? 1 : <?php echo $resultsPerPage ?>,
            col: Math.floor(12 / this.perPage),
            init() {
                this.isLoading = true;
                fetch('<?php echo $url ?>')
                    .then(response => response.json())
                    .then(data => {
                        this.isLoading = false
                        this.annunci = data.data
                    });
            },
        }))
    })
</script>