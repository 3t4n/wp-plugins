/* tslint:disable:no-unused-expression no-empty */
import {shallowMount} from '@vue/test-utils';
import {expect} from 'chai';
import OverlayMessage from './overlay-message';

describe('Overlay message', () => {
    it('should emit', () => {
        const wrapper = shallowMount(OverlayMessage, {
        });
        const element = wrapper.vm;
        element.submit();
        expect(wrapper.emitted().submit).ok;
    });
});
