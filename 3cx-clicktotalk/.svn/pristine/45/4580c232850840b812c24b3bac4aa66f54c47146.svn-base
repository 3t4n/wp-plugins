/*
tslint:disable:no-var-requires
*/
const emojiMapping = require('./pipe-script-data.json');
// import emojiMapping from './pipe-script-data.json';

const MAX_EMOJI_LENGTH = 8;

export {convertAsciiToUnicode} from  './ascii-converter';

export function convertTextToEmoji(text: string | undefined, phoneSystemUrl?: string): string {
    if (!phoneSystemUrl) {
        phoneSystemUrl = '';
    }
    if (!text) { return ''; }
    const textArray = Array.from(text);
    for (let i = 0; i < textArray.length; i++) {
        let mappingNode = emojiMapping;
        const emojiFile = [];
        let intermediateEmojiFile = [];

        for (let k = i; k < Math.min(i + MAX_EMOJI_LENGTH, textArray.length); k++) {
            const codePoint = textArray[k].codePointAt(0); // .toString(16);
            let charCode = codePoint ? codePoint.toString(16) : '';
            while (charCode.length < 4) {charCode = '0' + charCode; }
            if (mappingNode.s.hasOwnProperty(charCode)) {
                intermediateEmojiFile.push(charCode);
                if (mappingNode.s[charCode] === 0 || mappingNode.s[charCode].e === 1) {
                    emojiFile.push(...intermediateEmojiFile);
                    intermediateEmojiFile = [];
                }

                if (mappingNode.s[charCode] !== 0 && mappingNode.s[charCode].hasOwnProperty('s')) {
                    // we found an end of the path
                    mappingNode = mappingNode.s[charCode];
                }  else{
                    break;
                }

            } else {
                break;
            }
        }

        if (emojiFile.length > 0) {
            let alt;
            if (emojiFile.length > 1) {
                alt = textArray.splice(i + 1, emojiFile.length - 1).join('');
            }
            else {
                alt = textArray[i];
            }
            textArray[i] = `<img src="${phoneSystemUrl}assets/emojione/32/${emojiFile.filter(x => x !== 'fe0f' && x !== '200d').join('-')}.png" alt="${alt}" class="emoji">`;
        }
    }

    return textArray.join('');

}
