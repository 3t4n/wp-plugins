$(window).on("load", function() {
    var iMaxHeight;
    // Pour chaque diapo
    $('.slick-js').each(function(e) {
        // On parcourt toutes les images pour récupérer la plus petite hauteur
        iMaxHeight = 0;
        $(this).find('img').each(function(e) {
            // On initialise iMaxHeight avec la première hauteur trouvée
            if(iMaxHeight == 0){iMaxHeight = $(this).height();}
            // On compare chaque nouvelle hauteur pour ne conserver que la plus petite
            if(iMaxHeight>$(this).height()){iMaxHeight = $(this).height();}
        });
        // On a la plus petite hauteur : on tronque en hauteur le conteneur de la photo
        $(this).find('.slide-pic').css( 'height', iMaxHeight );
    });
});