/* tslint:disable:no-unused-expression no-empty */
import {shallowMount} from '@vue/test-utils';
import {expect} from 'chai';
import {AuthenticationType} from '../../model/config';
import CallUsAuthenticateForm from './authenticate-form';

describe('Authentication form', () => {
    it('should require both item', () => {
        const wrapper = shallowMount(CallUsAuthenticateForm, {
            propsData: {
                config: {},
                authType: AuthenticationType.Both
            }
        });
        const element = wrapper.vm;

        element.submit();
        expect(wrapper.emitted().submit).undefined;

        element.name = 'Nikolai';
        element.submit();
        expect(wrapper.emitted().submit).undefined;

        element.email = 'dxssfsff';
        element.submit();
        expect(wrapper.emitted().submit).undefined;

        element.email = 'no@3cx.com';
        element.submit();
        expect(wrapper.emitted().submit[0][0]).eql({name: 'Nikolai', email: 'no@3cx.com'});
    });

    it('should require name', () => {
        const wrapper = shallowMount(CallUsAuthenticateForm, {
            propsData: {
                config: {},
                authType: AuthenticationType.Name
            }
        });
        const element = wrapper.vm;

        element.submit();
        expect(wrapper.emitted().submit).undefined;

        element.name = 'Nikolai';
        element.submit();
        expect(wrapper.emitted().submit[0][0]).eql({name: 'Nikolai', email: ''});
    });

    it('should require email', () => {
        const wrapper = shallowMount(CallUsAuthenticateForm, {
            propsData: {
                config: {},
                authType: AuthenticationType.Email
            }
        });
        const element = wrapper.vm;

        element.submit();
        expect(wrapper.emitted().submit).undefined;

        element.email = 'no@3cx.com';
        element.submit();
        expect(wrapper.emitted().submit[0][0]).eql({email: 'no@3cx.com', name: ''});
    });

});
