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
      title: 'Welcome to The Moneytizer plugin!',
      description: 'Thank you for downloading The Moneytizer plugin, let us guide you through a short tutorial on how to use the plugin.',
      position: 'left',
      closeBtnText: 'Close',
      nextBtnText: 'Next',
      prevBtnText: 'Previous',
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
      title: 'Check your statistics',
      description: 'With one click, access your statistics for each format during the last 30 days.',
      position: 'top',
      closeBtnText: 'Close',
      nextBtnText: 'Next',
      prevBtnText: 'Previous',
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
      title: 'Manage your tags and your integration',
      description: 'Here you will find all available formats, you can request or generate new tags at any time. You can choose to integrate them manually using tags or shortcodes, or choose automatic placement and Lazy Loading.',
      position: 'bottom',
      closeBtnText: 'Close',
      nextBtnText: 'Next',
      prevBtnText: 'Previous',
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
      title: 'Manage your profile information',
      description: 'You can edit your profile information directly from this section.',
      position: 'bottom',
      closeBtnText: 'Close',
      nextBtnText: 'Next',
      prevBtnText: 'Previous',
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
      title: 'View your invoices and change your payment information',
      description: 'The payment and billing section gives you the ability to view your invoices, as well as to change your payment information.',
      position: 'bottom',
      closeBtnText: 'Close',
      nextBtnText: 'Next',
      prevBtnText: 'Previous',
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
      title: 'An FAQ is available to help you',
      description: 'In this section, you can browse through the frequently asked questions.',
      position: 'bottom',
      closeBtnText: 'Close',
      nextBtnText: 'Next',
      prevBtnText: 'Previous',
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
      title: 'Get your referral link',
      description: 'Use the link in this section to sponsor new users.',
      position: 'bottom',
      closeBtnText: 'Close',
      nextBtnText: 'Next',
      prevBtnText: 'Previous',
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
      title: 'Add the ads.txt file',
      description: 'If you want to integrate our ads.txt in the simplest way possible, just check the automatic integration option.',
      position: 'bottom',
      closeBtnText: 'Close',
      nextBtnText: 'Next',
      prevBtnText: 'Previous',
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
      title: 'CMP Configuration',
      description: 'If you want to easily integrate the Consent Banner (CMP) into your website, you can check out the automatic integration option.',
      position: 'bottom',
      closeBtnText: 'Close',
      nextBtnText: 'Next',
      prevBtnText: 'Previous',
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
      title: 'Repeat the introduction',
      description: 'You can repeat the input at any time by clicking on this button.',
      position: 'bottom',
      closeBtnText: 'Close',
      nextBtnText: 'Next',
      prevBtnText: 'Previous',
      doneBtnText: 'Finish'
    },
    onNext: () => {
      closeAll();
    },
    onHighlighted: () => {
      localCorrectionAndScroll()
    }
  },
]);