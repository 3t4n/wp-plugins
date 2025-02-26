import {shallowMount} from '@vue/test-utils';
import {expect} from 'chai';
import CallUsAuthenticateForm from './call-us-phone';

describe('Application phone button', () => {
    it('should be initialized', () => {
        shallowMount(CallUsAuthenticateForm);
    });
});
