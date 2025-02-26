wp.customize.bind('ready', function () {
    let schema = window.ageGatorCustomizer.schema
    let options = window.ageGatorCustomizer.options
    let templates = window.ageGatorCustomizer.templates
    let templateImagesMap = Object.keys(templates.images)
        .map(key => templates.images[key])
        .reduce((acc, image) => {
            acc[image.url] = image.id
            return acc
        }, {})
    let templateSelect = document.getElementById('_customize-input-age_gator_template')


    let customizerOptions = {}
    for (let optionKey in schema) {
        customizerOptions[optionKey] = options[optionKey]
    }

    function handleTemplateChange () {
        templateSelect.addEventListener('change', event => {
            let option = event.target.value
            if (!templates.options[option]) {
                return
            }
            resetOptions()
            for (let optionKey in templates.options[option]) {
                wp.customize(optionKey, value => value.set(templates.options[option][optionKey]))
            }
        })
    }

    function resetOptions () {
        for (let optionKey in schema) {
            let optionSchema = schema[optionKey]
            wp.customize(optionKey, value => value.set(optionSchema.default))
        }
    }

    function syncImage (optionKey) {
        if (schema[optionKey].type !== 'image') {
            return
        }
        let control = wp.customize.control(optionKey)
        let value = wp.customize(optionKey).get()
        wp.media.attachment(templateImagesMap[value]).fetch().done(attributes => {
            control.params.attachment = attributes;
            control.renderContent()
            wp.customize.previewer.send(control.setting.id + '-attachment-data', attributes)
        })
    }

    function init () {
        for (let optionKey in customizerOptions) {
            syncImage(optionKey)
            wp.customize(optionKey, value => {
                value.bind(newValue => {
                    options[optionKey] = newValue
                    handleConditionalLogic()
                    syncImage(optionKey)
                })
            })
        }
        handleTemplateChange()
    }

    function handleConditionalLogic () {
        for (let optionKey in customizerOptions) {
            let option = schema[optionKey]
            let master = option.master
            let control = wp.customize.control(optionKey)
            if (!master) {
                control.active.set(true)
                continue
            }
            let match = master.values.reduce((match, value) => {
                if (value == options[master.name]) {
                    return true
                }
                return match
            }, false)
            if (master.not) {
                match = !match
            }
            control.active.set(match)
        }
    }

    init()
})

