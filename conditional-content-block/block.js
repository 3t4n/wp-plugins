var el = wp.element.createElement;
var registerBlockType = wp.blocks.registerBlockType;
var InspectorControls = wp.blockEditor.InspectorControls;
var InnerBlocks = wp.blockEditor.InnerBlocks;
var PanelBody = wp.components.PanelBody;
var RadioControl = wp.components.RadioControl;
var ToggleControl = wp.components.ToggleControl; // Added missing import
var TextControl = wp.components.TextControl;
var CheckboxControl = wp.components.CheckboxControl;
var DateTimePicker = wp.components.DateTimePicker;
var Dropdown = wp.components.Dropdown;

function formatDateTime(isoString) {
    if (!isoString) return '';
    return wp.date.dateI18n(
        conditionalContentBlock.dateFormat + ' ' + conditionalContentBlock.timeFormat,
        isoString,
        conditionalContentBlock.timezone
    );
}

registerBlockType('conditional-content-block/main', {
    title: 'Conditional Content',
    icon: 'visibility',
    category: 'common',

    attributes: {
        visibility: { type: 'string', default: 'all' },
        fallbackText: { type: 'string', default: '' },
        roles: { type: 'array', default: [] },
        deviceTypes: { type: 'array', default: [] },
        startDateTime: { type: 'string' },
        endDateTime: { type: 'string' },
        enableSchedule: { type: 'boolean', default: false }
    },

    // Add deprecation handling for old versions
    deprecated: [
        {
            attributes: {
                showLoggedIn: { type: 'boolean', default: false },
                // ... other old attributes ...
            },
            migrate(attributes) {
                return {
                    visibility: attributes.showLoggedIn ? 'logged_in' : 'logged_out',
                    fallbackText: attributes.fallbackText,
                    roles: attributes.roles,
                    deviceTypes: attributes.deviceTypes,
                    startDateTime: attributes.startDateTime,
                    endDateTime: attributes.endDateTime,
                    enableSchedule: attributes.enableSchedule
                };
            },
            save: function() {
                return el(InnerBlocks.Content);
            }
        }
    ],

    edit: function(props) {
        var roles = conditionalContentBlock.roles || [];
        var deviceOptions = [
            { label: 'Mobile', value: 'mobile' },
            { label: 'Tablet', value: 'tablet' },
            { label: 'Desktop', value: 'desktop' }
        ];

        return [
            el(InspectorControls, null,
                el(PanelBody, { title: 'Visibility Settings' },
                    el(RadioControl, {
                        label: 'Who can see this content?',
                        selected: props.attributes.visibility,
                        options: [
                            { label: 'Everyone', value: 'all' },
                            { label: 'Logged-in Users', value: 'logged_in' },
                            { label: 'Logged-out Users', value: 'logged_out' }
                        ],
                        onChange: function(value) {
                            props.setAttributes({ 
                                visibility: value,
                                roles: value === 'logged_in' ? props.attributes.roles : []
                            });
                        }
                    }),

                    props.attributes.visibility === 'logged_in' && el('div', { 
                        className: 'role-selection',
                        style: { 
                            marginTop: 16,
                            padding: 12,
                            backgroundColor: '#f6f7f7',
                            borderRadius: 4
                        }
                    },
                        el('p', { style: { marginBottom: 8, fontWeight: 600 } }, 'User Roles:'),
                        roles.map(function(role) {
                            return el(CheckboxControl, {
                                label: role.label,
                                checked: props.attributes.roles.includes(role.value),
                                onChange: function(isChecked) {
                                    var newRoles = [...props.attributes.roles];
                                    if (isChecked) {
                                        newRoles.push(role.value);
                                    } else {
                                        newRoles = newRoles.filter(r => r !== role.value);
                                    }
                                    props.setAttributes({ roles: newRoles });
                                }
                            });
                        })
                    ),

                    el('div', { 
                        className: 'device-selection',
                        style: { 
                            marginTop: 16,
                            padding: 12,
                            backgroundColor: '#f6f7f7',
                            borderRadius: 4
                        }
                    },
                        el('p', { style: { marginBottom: 8, fontWeight: 600 } }, 'Device Types:'),
                        deviceOptions.map(device => el(CheckboxControl, {
                            label: device.label,
                            checked: props.attributes.deviceTypes.includes(device.value),
                            onChange: (isChecked) => {
                                var newDevices = [...props.attributes.deviceTypes];
                                if (isChecked) {
                                    newDevices.push(device.value);
                                } else {
                                    newDevices = newDevices.filter(d => d !== device.value);
                                }
                                props.setAttributes({ deviceTypes: newDevices });
                            }
                        }))
                    ),

                    el(ToggleControl, {
                        label: 'Enable Schedule',
                        checked: props.attributes.enableSchedule,
                        onChange: (value) => props.setAttributes({ 
                            enableSchedule: value,
                            startDateTime: value && !props.attributes.startDateTime 
                                ? new Date().toISOString() 
                                : props.attributes.startDateTime,
                            endDateTime: value && !props.attributes.endDateTime 
                                ? new Date().toISOString() 
                                : props.attributes.endDateTime
                        }),
                        style: { marginTop: 16 }
                    }),

                    props.attributes.enableSchedule && el('div', {
                        className: 'conditional-schedule-container',
                        style: {
                            marginTop: 12,
                            padding: 12,
                            backgroundColor: '#f8f9f9',
                            border: '1px solid #dcdcde',
                            borderRadius: 4
                        }
                    },
                        el('div', { className: 'datetime-pickers' },
                            el('div', { className: 'datetime-picker-field' },
                                el(Dropdown, {
                                    position: 'bottom left',
                                    renderToggle: ({ isOpen, onToggle }) => (
                                        el(TextControl, {
                                            label: 'Start Date/Time',
                                            readOnly: true,
                                            value: props.attributes.startDateTime ? 
                                                formatDateTime(props.attributes.startDateTime) : 
                                                'Select Date/Time',
                                            onClick: onToggle,
                                            onChange: () => {}
                                        })
                                    ),
                                    renderContent: ({ onClose }) => el(DateTimePicker, {
                                        currentDate: props.attributes.startDateTime,
                                        onChange: (value) => {
                                            props.setAttributes({ startDateTime: value });
                                            onClose();
                                        },
                                        timezone: conditionalContentBlock.timezone,
                                        is12Hour: true
                                    })
                                })
                            ),
                            el('div', { className: 'datetime-picker-field' },
                                el(Dropdown, {
                                    position: 'bottom left',
                                    renderToggle: ({ isOpen, onToggle }) => (
                                        el(TextControl, {
                                            label: 'End Date/Time',
                                            readOnly: true,
                                            value: props.attributes.endDateTime ? 
                                                formatDateTime(props.attributes.endDateTime) : 
                                                'Select Date/Time',
                                            onClick: onToggle,
                                            onChange: () => {}
                                        })
                                    ),
                                    renderContent: ({ onClose }) => el(DateTimePicker, {
                                        currentDate: props.attributes.endDateTime,
                                        onChange: (value) => {
                                            props.setAttributes({ endDateTime: value });
                                            onClose();
                                        },
                                        timezone: conditionalContentBlock.timezone,
                                        is12Hour: true
                                    })
                                })
                            )
                        ),
                        el('p', { 
                            style: { 
                                fontSize: 12,
                                color: '#757575',
                                marginTop: 8,
                                fontStyle: 'italic'
                            }
                        }, 'Timezone: ' + conditionalContentBlock.timezone)
                    ),

                    el(TextControl, {
                        label: 'Fallback Content',
                        value: props.attributes.fallbackText,
                        onChange: (value) => props.setAttributes({ fallbackText: value }),
                        style: { marginTop: 16 },
                        placeholder: 'Text shown when conditions aren\'t met'
                    })
                )
            ),

            el('div', { className: 'conditional-content-editor' },
                el('div', { 
                    style: { 
                        padding: 20,
                        border: '1px dashed #ddd',
                        borderRadius: 4
                    }
                },
                    el('h3', { style: { margin: '0 0 15px 0' } }, 'Conditional Content'),
                    el(InnerBlocks, {
                        template: [
                            ['core/paragraph', { placeholder: 'Add your content here...' }]
                        ],
                        templateLock: false
                    })
                )
            )
        ];
    },

    save: function() {
        return el(InnerBlocks.Content);
    }
});