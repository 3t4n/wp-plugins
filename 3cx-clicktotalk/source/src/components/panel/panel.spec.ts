import {shallowMount} from '@vue/test-utils';
import {expect} from 'chai';
import Panel from './panel';

describe('Panel component', () => {
    it('should be initialized', () => {
        shallowMount(Panel);
    });
});
