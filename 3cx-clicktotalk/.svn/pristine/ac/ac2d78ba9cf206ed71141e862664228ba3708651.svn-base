import {shallowMount} from '@vue/test-utils';
import {EventBus} from '../event-bus';
import CallUsMainForm from './main-form';

describe('Main form component', () => {
    it('should be initialized', () => {
        shallowMount(CallUsMainForm, {
            provide: {
                eventBus: new EventBus()
            },
            propsData: {
                config: {
                    phonesystemUrl: 'http://localhost',
                    party: 'party'
                },
                auth: {
                    name: 'nikolai',
                    email: 'no@3cx.com'
                }
            }
        });
    });
});
