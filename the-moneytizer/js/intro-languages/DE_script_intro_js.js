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
      title: 'Willkommen beim TheMoneytizer-Plugin!',
      description: 'Vielen Dank, dass Sie das Moneytizer-Plugin heruntergeladen haben. Lassen Sie sich von uns durch eine kurze Anleitung führen, wie Sie das Plugin verwenden.',
      position: 'left',
      closeBtnText: 'Überspringen',
      nextBtnText: 'Weiter',
      prevBtnText: 'Zurück',
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
      title: 'Überprüfen Sie Ihre Statistiken',
      description: 'Mit einem Klick können Sie Ihre Statistiken für jedes Format über die letzten 30 Tage abrufen.',
      position: 'top',
      closeBtnText: 'Überspringen',
      nextBtnText: 'Weiter',
      prevBtnText: 'Zurück',
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
      title: 'Verwalten Sie Ihre Tags und Ihre Integration',
      description: 'Hier finden Sie alle verfügbaren Formate, Sie können jederzeit neue Tags anfordern oder generieren. Sie können wählen, ob Sie diese manuell über Tags oder Shortcodes einbinden oder die automatische Platzierung und Lazy Loading wählen.',
      position: 'bottom',
      closeBtnText: 'Überspringen',
      nextBtnText: 'Weiter',
      prevBtnText: 'Zurück',
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
      title: 'Verwalten Sie Ihre Profilinformationen',
      description: 'Sie können Ihre Profilinformationen direkt in diesem Bereich bearbeiten.',
      position: 'bottom',
      closeBtnText: 'Überspringen',
      nextBtnText: 'Weiter',
      prevBtnText: 'Zurück',
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
      title: 'Anzeigen Ihrer Gutschriften und Ändern Ihrer Zahlungsinformationen',
      description: 'Der Bereich Gutschriften und Zahlungen bietet Ihnen die Möglichkeit, Ihre Gutschriften einzusehen sowie Ihre Zahlungsinformationen zu ändern.',
      position: 'bottom',
      closeBtnText: 'Überspringen',
      nextBtnText: 'Weiter',
      prevBtnText: 'Zurück',
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
      title: 'Die FAQ hilft Ihnen weiter',
      description: 'In diesem Abschnitt können Sie die häufig gestellten Fragen durchsehen.',
      position: 'bottom',
      closeBtnText: 'Überspringen',
      nextBtnText: 'Weiter',
      prevBtnText: 'Zurück',
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
      title: 'Erhalten Sie Ihren Referal-Link',
      description: 'Verwenden Sie den Link in diesem Abschnitt, um neue Benutzer zu werben.',
      position: 'bottom',
      closeBtnText: 'Überspringen',
      nextBtnText: 'Weiter',
      prevBtnText: 'Zurück',
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
      title: 'Fügen Sie die Datei ads.txt hinzu',
      description: 'Wenn Sie unsere ads.txt auf einfachste Weise integrieren möchten, aktivieren Sie einfach die Option "Automatische Integration".',
      position: 'bottom',
      closeBtnText: 'Überspringen',
      nextBtnText: 'Weiter',
      prevBtnText: 'Zurück',
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
      title: 'Konfiguration des Cookie-Consent-Banners (CMP)',
      description: 'Wenn Sie das Consent Banner (CMP) einfach in Ihre Website einbinden möchten, können Sie die automatische Integrationsoption ausprobieren.',
      position: 'bottom',
      closeBtnText: 'Überspringen',
      nextBtnText: 'Weiter',
      prevBtnText: 'Zurück',
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
      title: 'Wiederholen Sie das Tutorial',
      description: 'Sie können die Einführung jederzeit wiederholen, indem Sie auf diese Schaltfläche klicken.',
      position: 'bottom',
      closeBtnText: 'Überspringen',
      nextBtnText: 'Weiter',
      prevBtnText: 'Zurück',
      doneBtnText: 'Abschließen'
    },
    onNext: () => {
      closeAll();
    },
    onHighlighted: () => {
      localCorrectionAndScroll()
    }
  },
]);