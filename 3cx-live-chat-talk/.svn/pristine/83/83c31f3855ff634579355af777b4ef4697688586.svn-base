import {expect} from 'chai';
import {Login} from '../generic';
import {errorSession} from './my-phone-empty-session';

describe('MyPhoneEmptySession', () => {
    it('should throw on get', () => {
        let error: any = {};
        errorSession('Test').get(new Login()).subscribe(() => {
        }, err => {
            error = err;
        });
        expect(error).equal('Test');
    });
});
