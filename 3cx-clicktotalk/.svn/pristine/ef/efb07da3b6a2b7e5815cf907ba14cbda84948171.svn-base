/// Polyfills part
// import "web-animations-js";
import wrap from '@vue/web-component-wrapper';
import '@webcomponents/custom-elements';
import '@webcomponents/shadydom';
import 'fullscreen-polyfill';
import {Vue} from 'vue-property-decorator';
import VueRx from 'vue-rx';
import 'webrtc-adapter';
import CallUsRootPhoneComponent from './components/call-us-phone/call-us-phone';
import CallUsRootComponent from './components/call-us/call-us.vue';

Vue.use(VueRx);

window.customElements.define('call-us', wrap(Vue, CallUsRootComponent));
window.customElements.define('call-us-phone', wrap(Vue, CallUsRootPhoneComponent));

if (module.hot) {
    module.hot.accept();
}
