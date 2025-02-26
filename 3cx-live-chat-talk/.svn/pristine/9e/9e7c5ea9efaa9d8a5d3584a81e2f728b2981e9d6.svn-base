import {Vue} from 'vue-property-decorator';

export default Vue.directive('srcObject', {
    bind: (el: any, binding: any, vnode: any) => {
        const myElement = el as HTMLMediaElement;
        myElement.srcObject = binding.value;
    },
    update: (el, binding, vnode) => {
        const myElement = el as HTMLMediaElement;
        if (myElement.srcObject !== binding.value)
            myElement.srcObject = binding.value;
    }
});
