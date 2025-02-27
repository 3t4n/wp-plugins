google.load("elements", "1", {
    packages: "transliteration"
});

google.setOnLoadCallback(onLoad);



function onLoad() {
    var options = {
        sourceLanguage: [google.elements.transliteration.LanguageCode.ENGLISH],
        destinationLanguage: ['ne'],
        shortcutKey: 'ctrl+g',
        transliterationEnabled: true
    };
    var control = new google.elements.transliteration.TransliterationControl(options);
    control.makeTransliteratable(['comment']);
}
