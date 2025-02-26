<?php $url = ANNFU_SITE_API . '/v2/annunci?limit=' . ANNFU_CAROUSEL_RESULTS_PLACEHOLDER . '&onoranza_funebre_id=' . get_option('annfu_onoranza_funebre_id'); ?>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('ultimiAnnunci', () => ({
            isLoading: false,
            perPage: window.innerWidth < 768 ? 1 : <?php echo ANNFU_CAROUSEL_RESULTS_SLIDE_PLACEHOLDER ?>,
            col: Math.floor(12/this.perPage),
            ultimiAnnunci: [],
            init() {
                this.isLoading = true;
                fetch('<?php echo $url ?>')
                    .then(response => response.json())
                    .then(data => {
                        this.isLoading = false
                        this.ultimiAnnunci = data.data
                    })
            },
        }))
    })
</script>

<?php
include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_ultimi_annunci.php');
?>

