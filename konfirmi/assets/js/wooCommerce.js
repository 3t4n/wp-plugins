document.addEventListener("DOMContentLoaded", konfirmi_wooCommerceOnReady);

var konfirmi_wooCommerceForm = {
  $message: document.createElement('h4'),
  $successContainer: document.createElement('div'),
  $form: document.querySelector('form.checkout.woocommerce-checkout'),
  $submitBtn: null,
  $stateSelector: null,
  wooCommerceWidgetHref: '',
  isCanSubmit: true,
  fields:{
    billing_first_name: {
      targetId: 'first_name',
    },
    billing_last_name: {
      targetId: 'last_name',
    },
    billing_phone: {
      targetId: 'phone',
    },
    billing_email: {
      targetId: 'email',
    },
    billing_company: {
      targetId: 'company',
    },
    billing_address_1: {
      targetId: 'street',
    },
    billing_address_2: {
      targetId: 'address_2',
    },
    billing_city: {
      targetId: 'city',
    },
    billing_state: {
      targetId: 'state',
    },
    billing_postcode: {
      targetId: 'zipcode',
    }
  },
  initialize: function() {
    konfirmi_wooCommerceForm.$form = document.querySelector('form.checkout.woocommerce-checkout');
    if(!konfirmi_wooCommerceForm.$form) return;
    if(!document.querySelectorAll('.woocommerce form [id^=konfirmi-container].konfirmi-container img')[0]) return;
    konfirmi_wooCommerceForm.$submitBtn = konfirmi_wooCommerceForm.$form && konfirmi_wooCommerceForm.$form.querySelector('form.checkout.woocommerce-checkout button');
    konfirmi_wooCommerceForm.$submitBtn.addEventListener('click', function(e){
      if(!konfirmi_wooCommerceForm.isVerifyStatusOk()){
        konfirmi_wooCommerceForm.$submitBtn.setAttribute('type', 'button');
      }
      if(konfirmi_wooCommerceForm.isCanSubmit) {
        if(konfirmi_wooCommerceForm.wooCommerceWidgetHref){
          if(konfirmi_wooCommerceForm.isVerifyStatusOk()){
            konfirmi_wooCommerceForm.$submitBtn.setAttribute('type', 'submit');
          } else {
            const left = (screen.width / 2)- 320;
            const top = (screen.height / 2)- 260;
            window.konfirmiPopup = window.open(konfirmi_wooCommerceForm.wooCommerceWidgetHref,'Konfirmi',`resizable,height=520,width=640,top=${top}, left=${left}`);
          }
        }
      }
    });
    konfirmi_wooCommerceForm.$submitBtn.setAttribute('type', 'button');
    $formFields = konfirmi_wooCommerceForm && konfirmi_wooCommerceForm.$form && konfirmi_wooCommerceForm.$form.getElementsByTagName('input');
    konfirmi_wooCommerceForm.$successContainer.style.visibility = 'hidden';
    konfirmi_wooCommerceForm.$successContainer.innerText = 'You were verified!';
    document.querySelectorAll('.woocommerce form .konfirmi-container')[0].appendChild(konfirmi_wooCommerceForm.$successContainer);
    var $countrySelect = document.getElementById("select2-billing_country-container"); // send default country
    
    $countrySelect && konfirmi_wooCommerceForm.sendData('country', $countrySelect.innerText);
    
    var $messageContainer = document.getElementsByClassName('woocommerce-terms-and-conditions-wrapper')[0];
    
    $countrySelect && $countrySelect.addEventListener('click', function(){
      var $options = document.querySelectorAll('.select2-results__option');
      $options && $options.forEach(function(el){
        el.addEventListener('mouseover', function(el){
          konfirmi_wooCommerceForm.sendData('country',el.target.innerText);
        });
      });
    });
    
    this.$message.style.color = 'red';
    $messageContainer && $messageContainer.appendChild(this.$message);
    
    $formFields && Array.from( $formFields).forEach(function(element) {
      if(konfirmi_wooCommerceForm.fields[element.id])
      element.addEventListener('change', konfirmi_wooCommerceForm.onElementChange);
    });
    
    konfirmi_wooCommerceForm.$submitBtn.addEventListener('mouseover', ()=>{
      konfirmi_wooCommerceForm.isCanSubmit = true;
    });
    konfirmi_wooCommerceForm.$submitBtn.addEventListener('mouseout', ()=>{
      konfirmi_wooCommerceForm.isCanSubmit = false;
      konfirmi_wooCommerceForm.$submitBtn.setAttribute('type', 'button');
    });
  },
  clearForm: function(){
    $formFields =  konfirmi_wooCommerceForm && konfirmi_wooCommerceForm.$form && konfirmi_wooCommerceForm.$form.getElementsByTagName('input');
    $formFields &&Array.from( $formFields).forEach(function(element) {
      if(konfirmi_wooCommerceForm.fields[element.id])element.value = "";
    });
  },
  onElementChange: function(el){
    const name = konfirmi_wooCommerceForm.fields[el.target.id].targetId;
    konfirmi_wooCommerceForm.sendData(name, el.target.value);
  },
  sendData: function(name, value){
    const $konfirmiDiv = document.querySelector('.woocommerce form .konfirmi-container div');
    if($konfirmiDiv){
      const konfirmiURL = konfirmi_wooCommerceForm.wooCommerceWidgetHref || $konfirmiDiv.getAttribute('data-url');
      if(!konfirmiURL) return;
      const params = new URL(konfirmiURL);
      params.searchParams.set(name, value);
      konfirmi_wooCommerceForm.wooCommerceWidgetHref = params.origin + params.pathname + '?' + params.searchParams.toString();
    }
  },
  isVerifyStatusOk: function(){
    const tokenField = document.querySelector('.woocommerce-checkout input[name="kf-widget-response"]');
    return tokenField && tokenField.value;
  },
  showMessage: function(message){
    this.$message.innerText = message;
  },
  hideMessage: function(){
    this.$message.innerText = '';
  },
  
  initStateSelector: function(){
    konfirmi_wooCommerceForm.$stateSelector = document.getElementById('select2-billing_state-container');
    if(konfirmi_wooCommerceForm.$stateSelector){ // country state init
      konfirmi_wooCommerceForm.sendData('state', konfirmi_wooCommerceForm.$stateSelector.innerText);
      konfirmi_wooCommerceForm.$stateSelector.addEventListener('click', function(){
        var $opt1 = document.querySelectorAll('.select2-results__option');
        $opt1 && $opt1.forEach(function(el){
          el.addEventListener('mouseover', function(el){
            konfirmi_wooCommerceForm.sendData('state', el.target.innerText);
          });
          el.addEventListener('mouseout', function(el){
            if(konfirmi_wooCommerceForm.$stateSelector.innerText) konfirmi_wooCommerceForm.sendData('state', konfirmi_wooCommerceForm.$stateSelector.innerText);
          });
        });
      });
      var states = document.getElementsByClassName('select2-selection select2-selection--single');
      if(states[1]){
        states[1].addEventListener('click', ()=> {
          var $opt1 = document.querySelectorAll('.select2-results__option');
          $opt1 && $opt1.forEach(function(el){
            el.addEventListener('mouseover', function(el){
              konfirmi_wooCommerceForm.sendData('state', el.target.innerText);
            });
            el.addEventListener('mouseout', function(el){
              if(konfirmi_wooCommerceForm.$stateSelector.innerText) konfirmi_wooCommerceForm.sendData('state', konfirmi_wooCommerceForm.$stateSelector.innerText);
            });
          });
        })
      }
    }
  }
};
function konfirmi_wooCommerceOnReady(){
  konfirmi_wooCommerceForm.clearForm();
  konfirmi_wooCommerceForm.initialize();
  setInterval(function(){
    if(!konfirmi_wooCommerceForm.$form) return;
    
    if(konfirmi_wooCommerceForm.$submitBtn !== konfirmi_wooCommerceForm.$form.querySelector('form.checkout.woocommerce-checkout button')){
      konfirmi_wooCommerceForm.initialize();
    }
    if(konfirmi_wooCommerceForm.$stateSelector != document.getElementById('select2-billing_state-container')){
      konfirmi_wooCommerceForm.initStateSelector();
    }
  }, 600);
}
