import {shallowMount} from '@vue/test-utils';
import {expect} from 'chai';
import {AuthenticationType} from '../../model/config';
import CallUsApp, {ViewState} from './call-us';

describe('Application form', () => {
    it('follow name auth', () => {
        const wrapper = shallowMount(CallUsApp, {
            propsData: {
                authentication: 'name'
            }
        });
        const element = wrapper.vm;
        expect(element.authenticationType).eql(AuthenticationType.Name);
        expect(element.type).eql(ViewState.InputForm);
    });

    it('follow email auth', () => {
        const wrapper = shallowMount(CallUsApp, {
            propsData: {
                authentication: 'email'
            }
        });
        const element = wrapper.vm;
        expect(element.authenticationType).eql(AuthenticationType.Email);
        expect(element.type).eql(ViewState.InputForm);
    });

    it('follow both auth', () => {
        const wrapper = shallowMount(CallUsApp, {
            propsData: {
                authentication: 'both'
            }
        });
        const element = wrapper.vm;
        expect(element.authenticationType).eql(AuthenticationType.Both);
        expect(element.type).eql(ViewState.InputForm);
    });

    it('follow no auth', () => {
        const wrapper = shallowMount(CallUsApp, {
            propsData: {
            }
        });
        const element = wrapper.vm;
        expect(element.authenticationType).eql(AuthenticationType.None);
        expect(element.type).eql(ViewState.Chat);
    });
});
