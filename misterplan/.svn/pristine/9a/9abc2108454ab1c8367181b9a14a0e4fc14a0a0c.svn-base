
jQuery(function($) {



    jQuery('.MrPlanPlugin_SimpleSearch').each(function(){

        let picker = null;
        let disponibilidad = [];


        let ElementBtn = jQuery(this).find('.MrPlanPlugin_SimpleSearchBtnEvnt');
        let css = ElementBtn.attr('css');
        let version = ElementBtn.attr('version');

        let link = ElementBtn.attr('link');
        let id_elemento = ElementBtn.attr('id_elemento');
        let id_punto_venta = ElementBtn.attr('id_punto_venta');
        let id_operador = ElementBtn.attr('id_destino');
        let id_idioma = ElementBtn.attr('id_idioma');
        let motor_id = ElementBtn.attr('motor_id');

        let a = null;
        let b = null;

        jQuery(this).find('.MrPlanPlugin_SimpleSearchBtnEvnt').unbind('click').click(function(evnt){
            
            if(version==1){
                let tipo_elemento = 1;
                let start_date = picker.getStartDate();
                let end_date = picker.getEndDate();
                b = moment(start_date);
                a = moment(end_date);
                let n_noches = a.diff(b, 'days');
                let fecha_entrada   = b.format('DD/MM/Y');
                let fecha_salida    = a.format('DD/MM/Y');
            
                let url = new URL(link);
                url.searchParams.append('fecha_entrada', fecha_entrada);
                url.searchParams.append('fecha_salida', fecha_salida);
                url.searchParams.append('n_noches', n_noches);
                url.searchParams.append('autoload', 1);
                url.searchParams.append('id_idioma', id_idioma);
                url.searchParams.append('id_elemento', id_elemento);
                url.searchParams.append('tipo_elemento', tipo_elemento);
                url.searchParams.append('id_operador', id_operador);
                url.searchParams.append('id_punto_venta', id_punto_venta);
                window.location.href = url.toString();

            }else if (version==2){
                let tipo_elemento = 2;
                let start_date = picker.getDate();
                b = moment(start_date);
                let fecha_entrada =b.format('DD/MM/Y');
                let n_noches = 1;
                let url = new URL(link);
                url.searchParams.append('autoload', 1);
                url.searchParams.append('fecha_entrada', fecha_entrada);
                url.searchParams.append('fecha_salida', fecha_entrada);
                url.searchParams.append('n_noches', n_noches);
                url.searchParams.append('autoload', 1);
                url.searchParams.append('id_idioma', id_idioma);
                url.searchParams.append('id_elemento', id_elemento);
                url.searchParams.append('tipo_elemento', tipo_elemento);
                url.searchParams.append('id_operador', id_operador);
                url.searchParams.append('id_punto_venta', id_punto_venta);
                window.location.href = url.toString();
            }

        })

        let options = {
            element: document.getElementById('MrPlanPlugin_DateRangePicker_'+motor_id),
            css: [
                'https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.css',
                css
            ],
            zIndex: 10,
            format: "DD MMM YYYY",
            lang: "es-ES",
            AmpPlugin: {
                dropdown: {
                    months: true,
                    years: true,
                    minYear: 2023,
                    maxYear: 2025
                },
                darkMode: false
            },
            LockPlugin: {
                minDate: new Date(),
                inseparable: true,
            },
            date: moment().unix()*1000,
            RangePlugin: {
                tooltipNumber(num) {
                    return num - 1;
                },
                locale: {
                    one: 'noche',
                    other: 'noches',
                },
                startDate: moment().add(2, 'days').unix()*1000,
                endDate:  moment().add(4, 'days').unix()*1000,
            },
            plugins: [
                "AmpPlugin",
                'LockPlugin'
            ],
            setup(picker) {
                console.log('setup')
                picker.on('view', (evt) => {
                    const { view, date, target } = evt.detail;
                    const d = date ? moment(date.format('YYYY-MM-DD')).unix() * 1000 : null;
                    if(view === 'CalendarDay' && disponibilidad[d]!=null){
                        
                        target.classList.add('MrPlanPlugin_Calendar_Day_'+disponibilidad[d].Type);
                        console.log('ADD '+disponibilidad[d].Type)
                    }else{
                        console.log("NO esta "+d)
                    }
                });
            }
        };

        if(version==1){
            options.plugins.push('RangePlugin');
        }


        if(version==1){
            var request = jQuery.ajax({
                url: 'https://mrplan.io/experiencias/modulos/TExpCalendario/lib/accion.TExpCalendario.php?&id_casa='+id_elemento+'&id_elemento='+id_elemento+'&tipo=1&accion=1&ews_ruta_raiz=https://www.mrplan.es/scr/../experiencias/&id_idioma=0&id_operador='+id_operador+'&id_punto_venta='+id_punto_venta+'&source_plugin=MrPlanPlugin&jsoncallback=?'
                ,type: "GET"
                ,dataType: "jsonp"
                ,async:false
            }).done(function(Data){
                jQuery.each(Data.resultado, function( key, value ) {
                    let fecha = moment(value.Date, "DD/MM/YYYY").unix() *  1000;
                    disponibilidad[fecha] = value;
                });
                createCalendar();
            });
        }else if(version==2){
            var request = jQuery.ajax({
                url: 'https://mrplan.io/experiencias/modulos/TExpCalendario/lib/accion.TExpCalendario.php?&id_experiencia='+id_elemento+'&id_elemento='+id_elemento+'&tipo=2&accion=1&Filtros={"desdeTaquilla":0}&ews_ruta_raiz=https://www.mrplan.es/scr/../experiencias/&id_idioma=0&id_operador='+id_operador+'&id_punto_venta='+id_punto_venta+'&source_plugin=MrPlanPlugin&jsoncallback=?'
                ,type: "GET"
                ,dataType: "jsonp"
                ,async:false
            }).done(function(Data){
                jQuery.each(Data.resultado, function( key, value ) {
                    let fecha = moment(value.Date, "DD/MM/YYYY").unix() *  1000;
                    disponibilidad[fecha] = value;
                });
                createCalendar();
            });
        }

        function createCalendar(){
            jQuery('#MrPlanPlugin_DateRangePicker_'+motor_id).attr('type', 'text')
            picker = new easepick.create(options);
        }
    });
    
});