import {expect} from 'chai';
import {convertTextToEmoji} from './emojione-light';

describe('Emoji to image converter', () => {
    it('should return empty', () => {
        expect(convertTextToEmoji(undefined)).equal('');
    });

    it('should remain intact', () => {
        expect(convertTextToEmoji('Hello, World!')).equal('Hello, World!');
    });

    it('should convert to emojii', () => {
        expect(convertTextToEmoji('Hello, \uD83D\uDE42 World!')).equal('Hello, <img src="assets/emojione/32/1f642.png" alt="\uD83D\uDE42" class="emoji"> World!');
    });

    it('should convert to emojii with pbx url', () => {
        expect(convertTextToEmoji('Hello, \uD83D\uDE42 World!', 'http://url/')).equal('Hello, <img src="http://url/assets/emojione/32/1f642.png" alt="\uD83D\uDE42" class="emoji"> World!');
    });

    it('should not convert numbers', () => {
        expect(convertTextToEmoji('0123456789')).equal('0123456789');
    });
});
