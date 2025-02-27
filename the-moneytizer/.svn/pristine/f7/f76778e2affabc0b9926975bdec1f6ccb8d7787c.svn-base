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
      title: 'TRANSLATION_EXTRA_TOUR_1_TITLE',
      description: 'TRANSLATION_EXTRA_TOUR_1_DESCRIPTION',
      position: 'left',
      closeBtnText: 'TRANSLATION_EXTRA_TOUR_CLOSE',
      nextBtnText: 'TRANSLATION_EXTRA_TOUR_NEXT',
      prevBtnText: 'TRANSLATION_EXTRA_TOUR_PREVIOUS',
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
      title: 'TRANSLATION_EXTRA_TOUR_2_TITLE',
      description: 'TRANSLATION_EXTRA_TOUR_2_DESCRIPTION',
      position: 'top',
      closeBtnText: 'TRANSLATION_EXTRA_TOUR_CLOSE',
      nextBtnText: 'TRANSLATION_EXTRA_TOUR_NEXT',
      prevBtnText: 'TRANSLATION_EXTRA_TOUR_PREVIOUS',
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
      title: 'TRANSLATION_EXTRA_TOUR_3_TITLE',
      description: 'TRANSLATION_EXTRA_TOUR_3_DESCRIPTION',
      position: 'bottom',
      closeBtnText: 'TRANSLATION_EXTRA_TOUR_CLOSE',
      nextBtnText: 'TRANSLATION_EXTRA_TOUR_NEXT',
      prevBtnText: 'TRANSLATION_EXTRA_TOUR_PREVIOUS',
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
      title: 'TRANSLATION_EXTRA_TOUR_4_TITLE',
      description: 'TRANSLATION_EXTRA_TOUR_4_DESCRIPTION',
      position: 'bottom',
      closeBtnText: 'TRANSLATION_EXTRA_TOUR_CLOSE',
      nextBtnText: 'TRANSLATION_EXTRA_TOUR_NEXT',
      prevBtnText: 'TRANSLATION_EXTRA_TOUR_PREVIOUS',
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
      title: 'TRANSLATION_EXTRA_TOUR_5_TITLE',
      description: 'TRANSLATION_EXTRA_TOUR_5_DESCRIPTION',
      position: 'bottom',
      closeBtnText: 'TRANSLATION_EXTRA_TOUR_CLOSE',
      nextBtnText: 'TRANSLATION_EXTRA_TOUR_NEXT',
      prevBtnText: 'TRANSLATION_EXTRA_TOUR_PREVIOUS',
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
      title: 'TRANSLATION_EXTRA_TOUR_6_TITLE',
      description: 'TRANSLATION_EXTRA_TOUR_6_DESCRIPTION',
      position: 'bottom',
      closeBtnText: 'TRANSLATION_EXTRA_TOUR_CLOSE',
      nextBtnText: 'TRANSLATION_EXTRA_TOUR_NEXT',
      prevBtnText: 'TRANSLATION_EXTRA_TOUR_PREVIOUS',
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
      title: 'TRANSLATION_EXTRA_TOUR_7_TITLE',
      description: 'TRANSLATION_EXTRA_TOUR_7_DESCRIPTION',
      position: 'bottom',
      closeBtnText: 'TRANSLATION_EXTRA_TOUR_CLOSE',
      nextBtnText: 'TRANSLATION_EXTRA_TOUR_NEXT',
      prevBtnText: 'TRANSLATION_EXTRA_TOUR_PREVIOUS',
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
      title: 'TRANSLATION_EXTRA_TOUR_8_TITLE',
      description: 'TRANSLATION_EXTRA_TOUR_8_DESCRIPTION',
      position: 'bottom',
      closeBtnText: 'TRANSLATION_EXTRA_TOUR_CLOSE',
      nextBtnText: 'TRANSLATION_EXTRA_TOUR_NEXT',
      prevBtnText: 'TRANSLATION_EXTRA_TOUR_PREVIOUS',
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
      title: 'TRANSLATION_EXTRA_TOUR_9_TITLE',
      description: 'TRANSLATION_EXTRA_TOUR_9_DESCRIPTION',
      position: 'bottom',
      closeBtnText: 'TRANSLATION_EXTRA_TOUR_CLOSE',
      nextBtnText: 'TRANSLATION_EXTRA_TOUR_NEXT',
      prevBtnText: 'TRANSLATION_EXTRA_TOUR_PREVIOUS',
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
      title: 'TRANSLATION_EXTRA_TOUR_10_TITLE',
      description: 'TRANSLATION_EXTRA_TOUR_10_DESCRIPTION',
      position: 'bottom',
      closeBtnText: 'TRANSLATION_EXTRA_TOUR_CLOSE',
      nextBtnText: 'TRANSLATION_EXTRA_TOUR_NEXT',
      prevBtnText: 'TRANSLATION_EXTRA_TOUR_PREVIOUS',
      doneBtnText: 'TRANSLATION_EXTRA_TOUR_FINISH'
    },
    onNext: () => {
      closeAll();
    },
    onHighlighted: () => {
      localCorrectionAndScroll()
    }
  },
]);