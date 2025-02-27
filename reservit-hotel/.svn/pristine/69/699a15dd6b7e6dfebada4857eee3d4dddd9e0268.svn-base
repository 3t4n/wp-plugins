<?php
    if (get_option('rsvit_hotel_bestprice_display') !== 'true') {
        $showprice = 'false';
    } else {
        $showprice = get_option('rsvit_hotel_bestprice_display');
    }

    if (get_option('rsvit_hotel_distributorpriceblock_display') !== 'true') {
        $distributorpriceblock_display = 'false';
    } else {
        $distributorpriceblock_display = get_option('rsvit_hotel_distributorpriceblock_display');
    }

    if (get_option('rsvit_hotel_distributorprice_display') !== 'true') {
        $distributorprice_display = 'false';
    } else {
        $distributorprice_display = get_option('rsvit_hotel_distributorprice_display');
    }

    $langue_widget = setRsvitLanguageDefault();
    $dyn_text_btn = 'rsvit_btn_txt_' . $langue_widget;
    $rsvit_box_borderwidth_get_option = get_option('rsvit_box_borderwidth');
    if (!empty($rsvit_box_borderwidth_get_option)) {
        $borderw = $rsvit_box_borderwidth_get_option;
    } else {
        $borderw = 4;
    }
?>
<script type="text/javascript">
    window.onload = function () {
        var rsvitCookieName = "rsvit_box_closed";
        var rsvitCookieVal;

        var reservitDivSize;
        var formOrientation;

        if (window.innerHeight >= "450") {
            reservitDivSize = "250px";
            formOrientation = "vertical";
        } else {
            reservitDivSize = "450px";
            formOrientation = "horizontal";
        }

        // Widget Configuration
        var paramsWidget = {
            'fromdate': '',
            'nbAdultMax': '<?php echo  esc_attr(get_option('rsvit_hotel_max_adlut')); ?>', // Nombre maximum d'adultes selectionnable par l'utilisateur
            'nbChildMax': '<?php echo  esc_attr(get_option('rsvit_hotel_max_child')); ?>', // Nombre maximum d'enfants selectionnable par l'utilisateur
            'bDisplayBestPrice': '<?php echo  esc_attr($showprice); ?>', // Determine l'affichage ou non du bloc présentant le meilleur tarif
            'langcode': '<?php echo  esc_attr($langue_widget); ?>', // Langue du widget
            'divContainerWidth': reservitDivSize, // Largeur (en px) du div contenant le widget, dans le cas d'une intégration en iframe (400px conseillé au minimum en largeur de l'iframe)
            'displayMode': formOrientation, // Affichage du Widget en mode horizontal ou vertical (valeurs à mettre : horizontal ou vertical)
            'partid': '<?php echo  esc_attr(get_option('rsvit_hotel_partner_id')); ?>', // Id du partenaire s'affichant a la place du tarif "site web hotel" (partid), ce parametre est optionnel, vous pouvez donc ne pas le remplir}}
            'bDisplayDistrib': '<?php echo  esc_attr($distributorpriceblock_display); ?>', // Determine l'affichage ou non du bloc présentant les distributeurs
            'partidDistrib': '<?php echo  esc_attr(get_option('rsvit_hotel_distributorpartner1_id')); ?>', // Id du partenaire avec lequel comparer vos tarifs (partidDistrib), ce parametre est optionnel, vous pouvez donc ne pas le remplir}}
            'partidDistrib01': '<?php echo  esc_attr(get_option('rsvit_hotel_distributorpartner2_id')); ?>', // Id du partenaire avec lequel comparer vos tarifs (partidDistrib), ce parametre est optionnel, vous pouvez donc ne pas le remplir}}
            'partidDistrib02': '<?php echo  esc_attr(get_option('rsvit_hotel_distributorpartner3_id')); ?>', // Id du partenaire avec lequel comparer vos tarifs (partidDistrib), ce parametre est optionnel, vous pouvez donc ne pas le remplir}}
            'showDistribEqual': '<?php echo  esc_attr($distributorprice_display); ?>',
            'version': '<?php echo  esc_attr(get_option('rsvit_hotel_design_version')); ?>' // Version du design
        };

        console.log('Content fully loaded!');
        fill_the_box('<?php echo  esc_attr(get_option('rsvit_hotel_id')); ?>', '<?php echo  esc_attr(get_option('rsvit_chaine_id')); ?>', paramsWidget);

        if (document.cookie.indexOf(rsvitCookieName + '=') != -1) {
        } else {
            creerCookie(rsvitCookieName, "no", 365);
            console.log('Cookie initialized');
        }
        ;
        rsvitCookieVal = getCookie(rsvitCookieName);
        show_the_btn(rsvitCookieVal);

        //Window size change
        jQuery(window).on('resize', function (event) {

            if (window.innerHeight >= "450") {
                paramsWidget.divContainerWidth = "250px";
                paramsWidget.displayMode = "vertical";
            } else {
                paramsWidget.divContainerWidth = "450px";
                paramsWidget.displayMode = "horizontal";
            }

            fill_the_box('<?php echo  esc_attr(get_option('rsvit_hotel_id')); ?>', '<?php echo  esc_attr(get_option('rsvit_chaine_id')); ?>', paramsWidget);
        });

    }
</script>

<button id="rsvit_btn"><i id="btn_bed_ico" class="fa fa-bed" aria-hidden="true"></i><?php echo esc_html(get_option($dyn_text_btn)); ?></button>
<div id="ReservitBestPriceWidgetbox1">
    <div id="box_btn">
        <i id="box_btn_close" class="fa fa-times" aria-hidden="true"></i>
    </div>
    <div id="ReservitBestPriceWidgetbox">
        <iframe id="ReservitBestPriceWidget"></iframe>
    </div>
</div>