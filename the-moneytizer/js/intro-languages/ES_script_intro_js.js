var currentStep = 0;

var localCorrectionAndScroll = function(){
  setTimeout(function(){
    window.dispatchEvent(new Event('resize'));
  }, 600);
}

var closeAll = function(){
  /*jQuery_money('#collapse_menu_tags').collapse('hide')
  jQuery_money('#collapse_menu_chart').collapse('hide')
  jQuery_money('#collapse_menu_profil').collapse('hide')
  jQuery_money('#collapse_menu_bill').collapse('hide')*/
}

const driver = new Driver();

driver.defineSteps([
  {
    element: '#el-intro-0',
    popover: {
      title: '¡Bienvenido al plugin de The Moneytizer!',
      description: 'Gracias por descargar el plugin The Moneytizer, permítanos guiarte a través de un breve tutorial sobre cómo utilizar el plugin.',
      position: 'left',
      closeBtnText: 'Cerrar',
      nextBtnText: 'Siguiente',
      prevBtnText: 'Anteriormente',
    },
    onNext: () => {
      closeAll();
      jQuery_money('#collapse_menu_chart').collapse('show')
    },
    onHighlighted: () => {
        jQuery_money('html,body').animate({
          scrollTop: jQuery_money("#driver-popover-item").offset().top - jQuery_money(window).height()/2
       }, 300);
    }
  },
  {
    element: '#el-intro-1',
    popover: {
      title: 'Consulta tus estadísticas',
      description: 'Con un solo clic, accede a tus estadísticas para cada formato durante los últimos 30 días.',
      position: 'top',
      closeBtnText: 'Cerrar',
      nextBtnText: 'Siguiente',
      prevBtnText: 'Anteriormente',
    },
    onNext: () => {
      closeAll();
      jQuery_money('#collapse_menu_tags').collapse('show')
    },
    onHighlighted: () => {
      localCorrectionAndScroll()
    }
  },
  {
    element: '#el-intro-2',
    popover: {
      title: 'Gestiona tus tags y su integración',
      description: 'Aquí encontrarás todos los formatos disponibles, puede solicitar o generar nuevas etiquetas en cualquier momento. Puedes optar por integrarlos manualmente mediante etiquetas o shortcodes o elegir la colocación automática y el lazy loading.',
      position: 'bottom',
      closeBtnText: 'Cerrar',
      nextBtnText: 'Siguiente',
      prevBtnText: 'Anteriormente',
    },
    onPrevious: () => {
      closeAll();
      jQuery_money('#collapse_menu_chart').collapse('show')
    },
    onNext: () => {
      closeAll();
      jQuery_money('#collapse_menu_profil').collapse('show')
    },
    onHighlighted: () => {
      localCorrectionAndScroll()
    }
  },
  {
    element: '#el-intro-3',
    popover: {
      title: 'Gestiona la información de tu perfil',
      description: 'Puedes editar la información de tu perfil directamente desde esta sección.',
      position: 'bottom',
      closeBtnText: 'Cerrar',
      nextBtnText: 'Siguiente',
      prevBtnText: 'Anteriormente',
    },
    onPrevious: () => {
      closeAll();
      jQuery_money('#collapse_menu_tags').collapse('show')
      
    },
    onNext: () => {
      closeAll();
      jQuery_money('#collapse_menu_bill').collapse('show')
    },
    onHighlighted: () => {
      localCorrectionAndScroll()
    }
  },
  {
    element: '#el-intro-4',
    popover: {
      title: 'Ver tus facturas y modificar tus datos de pago',
      description: 'La sección de pago y facturación le da la posibilidad de ver sus facturas así como de modificar su información de pago.',
      position: 'bottom',
      closeBtnText: 'Cerrar',
      nextBtnText: 'Siguiente',
      prevBtnText: 'Anteriormente',
    },
    onNext: () => {
      closeAll();
      jQuery_money('#collapse_menu_faq').collapse('show')
    },
    onHighlighted: () => {
      localCorrectionAndScroll()
    }
  },
  {
    element: '#el-intro-5',
    popover: {
      title: 'Un FAQ está disponible para ayudarle',
      description: 'Aquí encontrarás todos los formatos disponibles, puedes solicitar o generar nuevos tags en cualquier momento. Puedes optar por integrarlos manualmente mediante etiquetas o shortcodes o elegir la colocación automática y el lazy loading.',
      position: 'bottom',
      closeBtnText: 'Cerrar',
      nextBtnText: 'Siguiente',
      prevBtnText: 'Anteriormente',
    },
    onNext: () => {
      closeAll();
      jQuery_money('#collapse_menu_sponsorship').collapse('show')
    },
    onHighlighted: () => {
      localCorrectionAndScroll()
    }
  },
  {
    element: '#el-intro-6',
    popover: {
      title: 'Obtén tu enlace de referencia',
      description: 'Utiliza el enlace de esta sección para patrocinar a nuevos usuarios.',
      position: 'bottom',
      closeBtnText: 'Cerrar',
      nextBtnText: 'Siguiente',
      prevBtnText: 'Anteriormente',
    },
    onNext: () => {
      closeAll();
      jQuery_money('#collapse_menu_settings').collapse('show')
    },
    onHighlighted: () => {
      localCorrectionAndScroll()
    }
  },
  {
    element: '#adstxt_panel',
    popover: {
      title: 'Añade el archivo ads.txt',
      description: 'Si quieres integrar nuestro ads.txt de la forma más sencilla posible, solo tienes que marcar la opción de integración automática.',
      position: 'bottom',
      closeBtnText: 'Cerrar',
      nextBtnText: 'Siguiente',
      prevBtnText: 'Anteriormente',
    },
    onNext: () => {
      closeAll();
      jQuery_money('#collapse_menu_settings').collapse('show')
    },
    onHighlighted: () => {
      localCorrectionAndScroll()
    }
  },
  {
    element: '#el-intro-8',
    popover: {
      title: 'Configura el CMP (Banner de consentimiento)',
      description: 'Si quiere integrar fácilmente el CMP en tu sitio, puedes marcar la opción de integración automática.',
      position: 'bottom',
      closeBtnText: 'Cerrar',
      nextBtnText: 'Siguiente',
      prevBtnText: 'Anteriormente',
    },
    onNext: () => {
      closeAll();
      jQuery_money('#collapse_menu_settings').collapse('show')
    },
    onHighlighted: () => {
      localCorrectionAndScroll()
    }
  },
  {
    element: '#el-intro-9',
    popover: {
      title: 'Reproducir la introducción de nuevo',
      description: 'Puedes repetir la introducción en cualquier momento haciendo clic en este botón.',
      position: 'bottom',
      closeBtnText: 'Cerrar',
      nextBtnText: 'Siguiente',
      prevBtnText: 'Anteriormente',
      doneBtnText: 'Acabado'
    },
    onNext: () => {
      closeAll();
    },
    onHighlighted: () => {
      localCorrectionAndScroll()
    }
  },
]);