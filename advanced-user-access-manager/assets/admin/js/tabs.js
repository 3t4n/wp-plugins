const tabBtns = document.querySelectorAll('.tabs-btn');
const tabContent = document.querySelector('.tabs-content');
this.tabPanels = document.querySelectorAll('.tab-content');

const tabPanel = null;

const tabBtn = null;

tabBtns.forEach((tabBtn) => {
	tabBtn.addEventListener('click', (e) => {
		e.preventDefault();

        tabBtn = tabBtn;

        const tabPanel = tabContent.querySelector(tabBtn.dataset.panelId);

        updateActiveClass(tabBtn, tabBtns);

        updateActiveClass(tabPanel, tabPanels);
	})
})

const updateActiveClass = (element, elements) => {
    if (!element.classList.contains('is-active')) {
      elements.forEach((ele) => {
        if (ele.classList.contains('is-active')) {
          ele.classList.remove('is-active');
        }
      });

      element.classList.add('is-active');
    }
}
