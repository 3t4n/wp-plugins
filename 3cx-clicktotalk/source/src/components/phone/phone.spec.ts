import {MyPhoneServiceStub} from '@tests/my-phone-service.stub';
import {MyPhoneSessionStub} from '@tests/my-phone-session.stub';
import {shallowMount} from '@vue/test-utils';
import {of} from 'rxjs';
import {EventBus} from '../event-bus';
import CallUsPhone from './phone';

describe('Phone component', () => {
    it('should be initialized', () => {
        const myPhoneSession = new MyPhoneSessionStub();
        shallowMount(CallUsPhone, {
            provide: {
                myPhoneService: new MyPhoneServiceStub(of(myPhoneSession)),
                eventBus: new EventBus()
            }
        });
    });
});
