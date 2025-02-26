import {expect} from 'chai';
import {convertAsciiToUnicode} from './ascii-converter';

describe('Ascii emoji converter', () => {
    it('should remain intact', () => {
        expect(convertAsciiToUnicode('Hello, World!')).equal('Hello, World!');
    });

    it('should convert to emojii', () => {
        expect(convertAsciiToUnicode('Hello, :-) World!')).equal('Hello, \uD83D\uDE42 World!');
    });
});
