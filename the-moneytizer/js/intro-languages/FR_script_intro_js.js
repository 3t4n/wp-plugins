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
      title: 'Bienvenue sur le plugin The Moneytizer!',
      description: 'Merci d\'avoir téléchargé le plugin The Moneytizer, laissez-vous guider dans un court tutoriel sur l\'utilisation du plugin.',
      position: 'left',
      closeBtnText: 'Fermer',
      nextBtnText: 'Suivant',
      prevBtnText: 'Précédent',
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
      title: 'Consultez vos statistiques',
      description: 'En un clic, accédez à vos statistiques pour chaque format sur les 30 derniers jours.',
      position: 'top',
      closeBtnText: 'Fermer',
      nextBtnText: 'Suivant',
      prevBtnText: 'Précédent',
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
      title: 'Gérez vos tags et leur intégration',
      description: 'Vous trouverez ici l\'ensemble des formats disponibles, vous pouvez à tout moment demander ou générer de nouveaux tags. Vous pourrez choisir de les intégrer manuellement à l\'aide des tags ou des shortcodes ou choisir le placement automatique et le lazy loading.',
      position: 'bottom',
      closeBtnText: 'Fermer',
      nextBtnText: 'Suivant',
      prevBtnText: 'Précédent',
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
      title: 'Gérez vos informations de profil',
      description: 'Vous pouvez modifier vos informations de profil directement depuis cette section.',
      position: 'bottom',
      closeBtnText: 'Fermer',
      nextBtnText: 'Suivant',
      prevBtnText: 'Précédent',
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
      title: 'Consultez vos factures et modifiez vos informations de paiement',
      description: 'La section paiement et facturation vous donne la possibilité de consulter vos factures ainsi que de modifier vos informations de paiement.',
      position: 'bottom',
      closeBtnText: 'Fermer',
      nextBtnText: 'Suivant',
      prevBtnText: 'Précédent',
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
      title: 'Une FAQ est disponible pour vous aider',
      description: 'Sur cette section, vous pourrez parcourir la foire aux questions.',
      position: 'bottom',
      closeBtnText: 'Fermer',
      nextBtnText: 'Suivant',
      prevBtnText: 'Précédent',
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
      title: 'Obtenez votre lien de parrainage',
      description: 'Utilisez le lien présent dans cette section pour parrainer de nouveaux utilisateurs.',
      position: 'bottom',
      closeBtnText: 'Fermer',
      nextBtnText: 'Suivant',
      prevBtnText: 'Précédent',
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
      title: 'Ajout du fichier ads.txt',
      description: 'Si vous souhaitez intégrer notre ads.txt le plus simplement possible, il suffit de cocher l'option d'intégration automatique.',
      position: 'bottom',
      closeBtnText: 'Fermer',
      nextBtnText: 'Suivant',
      prevBtnText: 'Précédent',
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
      title: 'Configuration de la CMP',
      description: 'Si vous souhaitez intégrer facilement la CMP sur votre site, vous pouvez cocher l'option d'intégration automatique.',
      position: 'bottom',
      closeBtnText: 'Fermer',
      nextBtnText: 'Suivant',
      prevBtnText: 'Précédent',
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
      title: 'Rejouer l\'introduction',
      description: 'Vous pouvez rejouer l\'introduction à tout moment en cliquant sur ce bouton.',
      position: 'bottom',
      closeBtnText: 'Fermer',
      nextBtnText: 'Suivant',
      prevBtnText: 'Précédent',
      doneBtnText: 'Terminer'
    },
    onNext: () => {
      closeAll();
    },
    onHighlighted: () => {
      localCorrectionAndScroll()
    }
  },
]);