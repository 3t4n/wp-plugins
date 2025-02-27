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
      title: 'Bem-vindo ao plugin TheMoneytizer!',
      description: 'Obrigado por baixar o plugin The Moneytizer, deixe-nos guiá-lo através de um pequeno tutorial sobre como usar o plugin.',
      position: 'left',
      closeBtnText: 'Fechar',
      nextBtnText: 'A seguir',
      prevBtnText: 'Anterior',
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
      title: 'Consulte suas estatísticas',
      description: 'Com um clique, acesse suas estatísticas para cada formato durante os últimos 30 dias.',
      position: 'top',
      closeBtnText: 'Fechar',
      nextBtnText: 'A seguir',
      prevBtnText: 'Anterior',
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
      title: 'Gerencie suas tags e sua integração',
      description: 'Aqui você encontrará todos os formatos disponíveis, você pode solicitar ou gerar novas tags a qualquer momento. Você pode optar por integrá-los manualmente usando tags ou atalhos ou escolher a colocação automática e o Lazy Loading.',
      position: 'bottom',
      closeBtnText: 'Fechar',
      nextBtnText: 'A seguir',
      prevBtnText: 'Anterior',
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
      title: 'Gerencie suas informações de perfil',
      description: 'Você pode editar suas informações de perfil diretamente desta seção.',
      position: 'bottom',
      closeBtnText: 'Fechar',
      nextBtnText: 'A seguir',
      prevBtnText: 'Anterior',
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
      title: 'Consulte suas faturas e altere suas informações de pagamento',
      description: 'A seção de pagamento e faturamento lhe dá a possibilidade de consultar suas faturas, assim como de modificar suas informações de pagamento.',
      position: 'bottom',
      closeBtnText: 'Fechar',
      nextBtnText: 'A seguir',
      prevBtnText: 'Anterior',
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
      title: 'Uma FAQ (Perguntas frequentes) está disponível para ajudar você',
      description: 'Nesta secção, pode navegar através das perguntas mais frequentes.',
      position: 'bottom',
      closeBtnText: 'Fechar',
      nextBtnText: 'A seguir',
      prevBtnText: 'Anterior',
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
      title: 'Obtenha seu link de indicação',
      description: 'Use o link desta seção para patrocinar novos usuários.',
      position: 'bottom',
      closeBtnText: 'Fechar',
      nextBtnText: 'A seguir',
      prevBtnText: 'Anterior',
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
      title: 'Adicionar o arquivo ads.txt',
      description: 'Se você quiser integrar nosso ads.txt da maneira mais simples possível, basta verificar a opção de integração automática.',
      position: 'bottom',
      closeBtnText: 'Fechar',
      nextBtnText: 'A seguir',
      prevBtnText: 'Anterior',
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
      title: 'Configuração do CMP',
      description: 'Se você quiser integrar facilmente o Banner de consentimento (CMP) em seu site, você pode verificar a opção de integração automática.',
      position: 'bottom',
      closeBtnText: 'Fechar',
      nextBtnText: 'A seguir',
      prevBtnText: 'Anterior',
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
      title: 'Repetir a introdução',
      description: 'Você pode repetir a introdução a qualquer momento, clicando neste botão.',
      position: 'bottom',
      closeBtnText: 'Fechar',
      nextBtnText: 'A seguir',
      prevBtnText: 'Anterior',
      doneBtnText: 'Terminar'
    },
    onNext: () => {
      closeAll();
    },
    onHighlighted: () => {
      localCorrectionAndScroll()
    }
  },
]);