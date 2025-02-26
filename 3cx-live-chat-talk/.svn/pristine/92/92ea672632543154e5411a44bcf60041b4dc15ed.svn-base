import {expect} from 'chai';
import * as fetchMock from 'fetch-mock';
import {constructUrl, fetch$} from './utils';

describe('Utils', () => {
    beforeEach(() => {
        fetchMock.get('http://sample:5000/404', {status: 404});
    });

    afterEach(() => {
        fetchMock.restore();
    });

    it('should add slash', () => {
        expect(constructUrl('blah')).equal('blah/');
    });

    it ('should propagate error', async () => {
        let error: any = {};
        await new Promise(resolve => fetch$('http://sample:5000/404').subscribe(() => {}, err => {
            error = err;
            resolve();
        }));
        expect(error.status).eq(404);
    });

});
