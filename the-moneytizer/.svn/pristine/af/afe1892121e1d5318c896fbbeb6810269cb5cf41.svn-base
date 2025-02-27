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
      title: 'Добро пожаловать в плагин The Moneytizer!',
      description: 'Благодарим за установку плагина The Moneytizer, в этой короткой инструкции мы раскажем, как пользоваться плагином.',
      position: 'left',
      closeBtnText: 'Закрыть',
      nextBtnText: 'Следующий',
      prevBtnText: 'Предидущий',
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
      title: 'Проверьте свою статистику',
      description: 'Получите доступ к статистике каждого формата за последние 30 дней.',
      position: 'top',
      ЗакрытьBtnText: 'Закрыть',
      СледующийBtnText: 'Следующий',
      prevBtnText: 'Предидущий',
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
      title: 'Управляйте своими тегами и их интеграцией',
      description: 'Здесь Вы можете просмотреть все доступные форматы, также Вы можете запросить или сгенерировать новые теги в любое время. Вы можете расположить форматы вручную используя таги или шорткоды, либо выбрать автоматическое размещение или Lazy Loading.',
      position: 'bottom',
      closeBtnText: 'Закрыть',
      nextBtnText: 'Следующий',
      prevBtnText: 'Предидущий',
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
      title: 'Управляйте данными учетной записи',
      description: 'В этой вкладке Вы можете напрямую управлять информацией своей учетной записи.',
      position: 'bottom',
      closeBtnText: 'Закрыть',
      nextBtnText: 'Следующий',
      prevBtnText: 'Предидущий',
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
      title: 'Просматривайте свои счета и управляйте реквизитами для оплаты',
      description: 'Во вкладке "Счета и Платежи" Вы можете просматривать свои счета, а так же управлять реквизитами для выплат.',
      position: 'bottom',
      closeBtnText: 'Закрыть',
      nextBtnText: 'Следующий',
      prevBtnText: 'Предидущий',
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
      title: 'FAQ поможет вам найти ответы на часто задаваемые вопросы',
      description: 'В этой вкладке Вы можете просмотреть часто задаваемые вопросы.',
      position: 'bottom',
      closeBtnText: 'Закрыть',
      nextBtnText: 'Следующий',
      prevBtnText: 'Предидущий',
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
      title: 'Получите свою реферальную ссылку',
      description: 'Воспользуйтесь ссылкой из этой вкладки что бы пригласить новых пользователей.',
      position: 'bottom',
      closeBtnText: 'Закрыть',
      nextBtnText: 'Следующий',
      prevBtnText: 'Предидущий',
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
      title: 'Установите файл ads.txt',
      description: 'Если Вы хотите интегрировать файл ads.txt самым простым способом - ознакомтесь с опцией автоматической интеграции.',
      position: 'bottom',
      closeBtnText: 'Закрыть',
      nextBtnText: 'Следующий',
      prevBtnText: 'Предидущий',
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
      title: 'Настройка CPM',
      description: 'Если Вы хотите интегрировать GDPR баннер самым простым способом - ознакомтесь с опцией автоматической интеграции.',
      position: 'bottom',
      closeBtnText: 'Закрыть',
      nextBtnText: 'Следующий',
      prevBtnText: 'Предидущий'
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
      title: 'Повторить инструкцию заново',
      description: 'Вы можете заново ознакомиться с инструкцией в любое время, нажав на эту конпку.',
      position: 'bottom',
      closeBtnText: 'Закрыть',
      nextBtnText: 'Следующий',
      prevBtnText: 'Предидущий',
      doneBtnText: 'Завершить'
    },
    onNext: () => {
      closeAll();
    },
    onHighlighted: () => {
      localCorrectionAndScroll()
    }
  },
]);