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
      title: 'Benvenuto sul tuo plugin The Moneytizer',
      description: 'Grazie per aver scaricato il plugin The Moneytizer, lascia che ti guidiamo attraverso un breve tutorial su come utilizzare il plugin.',
      position: 'left',
      closeBtnText: 'Chiudere',
      nextBtnText: 'Seguente',
      prevBtnText: 'Precedente',
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
      title: 'Consultare le mie statistiche',
      description: 'Con un clic, accedi alle tue statistiche per ogni formato negli ultimi 30 giorni.',
      position: 'top',
      closeBtnText: 'Chiudere',
      nextBtnText: 'Seguente',
      prevBtnText: 'Precedente',
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
      title: 'Gestisci i tuoi tag e la loro integrazione',
      description: 'Qui troverai tutti i formati disponibili, puoi richiedere o generare nuovi tag in qualsiasi momento. Puoi scegliere di integrarli manualmente usando tag o shortcode o scegliere il posizionamento automatico e il Lazy Loading.',
      position: 'bottom',
      closeBtnText: 'Chiudere',
      nextBtnText: 'Seguente',
      prevBtnText: 'Precedente',
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
      title: 'Gestisci le tue informazioni di profilo',
      description: 'Puoi modificare le informazioni del tuo profilo direttamente da questa sezione.',
      position: 'bottom',
      closeBtnText: 'Chiudere',
      nextBtnText: 'Seguente',
      prevBtnText: 'Precedente',
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
      title: 'Consulta le tue fatture e le tue informazioni di pagamento',
      description: 'La sezione di pagamento e fatturazione ti dà la possibilità di consultare le tue fatture e di modificare le tue informazioni di pagamento.',
      position: 'bottom',
      closeBtnText: 'Chiudere',
      nextBtnText: 'Seguente',
      prevBtnText: 'Precedente',
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
      title: 'Una FAQ (Frequently Asked Questions) è disponibile per aiutarvi',
      description: 'Qui troverai tutti i formati disponibili, puoi richiedere o generare nuovi tag in qualsiasi momento. Puoi scegliere di integrarli manualmente usando tag o shortcode o scegliere il posizionamento automatico e il Lazy Loading.',
      position: 'bottom',
      closeBtnText: 'Chiudere',
      nextBtnText: 'Seguente',
      prevBtnText: 'Precedente',
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
      title: 'Ottieni il tuo link di riferimento',
      description: 'Usa il link in questa sezione per sponsorizzare nuovi utenti.',
      position: 'bottom',
      closeBtnText: 'Chiudere',
      nextBtnText: 'Seguente',
      prevBtnText: 'Precedente',
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
      title: 'Aggiungere il file ads.txt',
      description: 'Se vuoi integrare il nostro ads.txt nel modo più semplice possibile, basta selezionare l\'opzione di integrazione automatica.',
      position: 'bottom',
      closeBtnText: 'Chiudere',
      nextBtnText: 'Seguente',
      prevBtnText: 'Precedente',
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
      title: 'Configurazione della CMP',
      description: 'Se vuoi integrare facilmente il Consent Banner (CMP) nel tuo sito web, puoi controllare l\'opzione di integrazione automatica.',
      position: 'bottom',
      closeBtnText: 'Chiudere',
      nextBtnText: 'Seguente',
      prevBtnText: 'Precedente',
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
      title: 'Ritornare al tutorial iniziale',
      description: 'Puoi tornare al tutorial in qualsiasi momento',
      position: 'bottom',
      closeBtnText: 'Chiudere',
      nextBtnText: 'Seguente',
      prevBtnText: 'Precedente',
      doneBtnText: 'Fine'
    },
    onNext: () => {
      closeAll();
    },
    onHighlighted: () => {
      localCorrectionAndScroll()
    }
  },
]);