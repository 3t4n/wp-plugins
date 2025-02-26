jQuery(document).ready(function () {


    // console.log('RFA loaded 2 !');


    jQuery("#recaptcha_for_all_button").click(function () {


        var $button = jQuery(this);

        // Adicionar classe do spinner do WordPress ao botão
        $button.addClass('button-disabled'); // Desabilita o botão
        $button.append('<span class="spinner is-active" style="float:none;margin:0 0 0 10px;"></span>');


        const originalOpacity = jQuery(this).css('opacity'); // Acessar opacity usando o método css()
        //jQuery(this).css('opacity', 0.5); // Reduzir opacidade para 50%


        setTimeout(function () {
            jQuery(this).css('opacity', originalOpacity); // Retornar à opacidade original
        }, 500); // Tempo do efeito (em ms)
    });
});