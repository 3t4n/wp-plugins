jQuery(function($) {
    $(document).ready(function(){
            $('#insert-cdwp-media').click(open_media_window);
        });

function open_media_window() {
    if (this.window === undefined) {
        this.window = wp.media({
                title: 'Добавить файл',
                library: {type: 'application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-word.document.macroEnabled.12,application/vnd.ms-word.template.macroEnabled.12,application/vnd.oasis.opendocument.text,application/vnd.apple.pages,application/pdf,application/vnd.ms-xpsdocument,application/oxps,application/rtf,application/wordperfect,application/octet-stream'},
                multiple: false,
                button: {text: 'Вставить в страницу'}
            });

        var self = this;
        this.window.on('select', function() {
                var first = self.window.state().get('selection').first().toJSON();
                wp.media.editor.insert('[download id="' + first.id + '"]');
            });
    }

    this.window.open();
    return false;
}
});

