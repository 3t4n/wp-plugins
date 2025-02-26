var eventBus = new Vue();
Vue.component( 'pricing_table_panel', {
   template: '#pricing_table_panel',
    props: ['settings_data'],
    data: function () {
        return {
            settings_alt: {
                s: {
                    spacing: 10,
                    col_width: 330
                }
            }
        }
    },
    computed: {
       settings: function () {
           if( this.settings_data ) {
               return this.settings_data;
           }
       }
    },
    methods: {
       change_settings: function () {
           eventBus.$emit( 'event_change_settings',  this.settings );
       },
        add_table: function () {
            eventBus.$emit( 'event_add_table', 1 );
        }
    },
    mounted: function () {
        this.change_settings();
    }
});

var template_data_1 = {
    settings: {

    },
    removable_table: '',
    editing_id: '',
    property_hover: false,
    editable_scope: '',//example:title
    editable_element: '',
    editable_data: '',
    tmp_editing_data: '',

    table_template: {
        header: {
            data: {
                title: {
                    id: 'tbl-' + (new Date()).getTime() + '-title-1',
                    class: '',
                    value: 'Standard'
                },
                subtitle: {
                    id: 'tbl-' + (new Date()).getTime() + '-subtitle-1',
                    class: '',
                    value: '$ 9.99'
                }
            }
        },
        body: {
            data: {
                description: {
                    id: 'tbl-' + (new Date()).getTime() + '-dsc-1',
                    class: '',
                    value: 'An awesome pricing table description is here'
                },
                properties: {
                    'p1' : {
                        class: '',
                        value: 'This is awesome product'
                    },
                    'p2' : {
                        class: '',
                        value: 'You will love it'
                    }
                }
            }
        },
        footer: {
            data: {
                button:{
                    id: '',
                    class: '',
                    value: 'Check out',
                    url: ''
                }
            }
        }
    },
    demo: {
        'id-1' : {
            header: {
                data: {
                    title: {
                        id: 'tbl-1-title-1',
                        class: '',
                        value: 'Standard'
                    },
                    subtitle: {
                        id: 'tbl-1-subtitle-1',
                        class: '',
                        value: '$ 9.99'
                    }
                }
            },
            body: {
                data: {
                    description: {
                        id: 'tbl-1-dsc-1',
                        class: '',
                        value: 'An awesome pricing table description is here'
                    },
                    properties: {
                        'p1' : {
                            class : '',
                            value: 'This is awesome product'
                        },
                        'p2' : {
                            class: '',
                            value: 'You will love it'
                        }
                    }
                }
            },
            footer: {
                data: {
                    button:{
                        id: 'tbl-1-f-1',
                        class: '',
                        value: 'Check out',
                        url: ''
                    }
                }
            }
        },
        'id-2' : {
            header: {
                data: {
                    title: {
                        id: 'tbl-2-title-1',
                        class: '',
                        value: 'a'
                    },
                    subtitle: {
                        id: 'tbl-2-subtitle-1',
                        class: '',
                        value: '$ 99.99'
                    },
                }
            },
            body: {
                data: {
                    description: {
                        id: 'tbl-2-dsc-1',
                        class: '',
                        value: 'Another awesome pricing table description is here'
                    },
                    properties: {
                        'p1' : {
                            class: '',
                            value: 'This is another awesome product'
                        },
                        'p2' : {
                            class: '',
                            value: 'You will love it too'
                        },
                        'p3' : {
                            class: '',
                            value: 'Wait for next table to be impressed'
                        }
                    }
                }
            },
            footer: {
                data: {
                    button: {
                        id: 'tbl-2-f-1',
                        class: '',
                        value: 'Buy',
                        url: 'www.facebook.com'
                    }
                }
            }
        },
    },
    tbl_data: {}
};

var template_methods_1 = {
    remove_table: function ( table_id ) {
        Vue.delete(  this.tbl_data, table_id );
    },
    edit_data: function () {

    },
    add_property: function ( table_id ) {
        var date = new Date();
        this.tbl_data[table_id].body.data.properties.push({
            id: 'tbl-' + table_id + '-p-' + date.getTime(),
            class: '',
            value: 'Lorem ipsum property'
        })
    },
    generate_table_template: function () {
        var uniq_number = (new Date()).getTime();
        return {
            header: {
                data: {
                    title: {
                        id: 'tbl-' + uniq_number + '-title-1',
                        class: '',
                        value: 'Standard'
                    },
                    subtitle: {
                        id: 'tbl-' + uniq_number + '-subtitle-1',
                        class: '',
                        value: '$ 9.99'
                    }
                }
            },
            body: {
                data: {
                    description: {
                        id: 'tbl-' + uniq_number + '-dsc-1',
                        class: '',
                        value: 'An awesome pricing table description is here'
                    },
                    properties: [
                        {
                            id: 'tbl-' + uniq_number + '-p-' + uniq_number + '-1',
                            class: '',
                            value: 'Lorem ipsum property'
                        },
                        {
                            id: 'tbl-' + uniq_number + '-p-' + uniq_number + '-2',
                            class: '',
                            value: 'Lorem ipsum property'
                        }
                    ]
                }
            },
            footer: {
                data: {
                    button:{
                        id: 'tbl-' + uniq_number + '-f-1',
                        class: '',
                        value: 'Check out',
                        url: ''
                    }
                }
            }
        };
    },
    edit_title: function ( table_data ) {
        this.editable_scope = 'value';
        this.tmp_editing_data = table_data.header.data.title.value;
        this.editing_id = table_data.header.data.title.id;
    },
    save_title: function ( table_data ) {
        this.editable_scope = '';
        table_data.header.data.title.value = this.tmp_editing_data;
        this.tmp_editing_data = '';
        this.editing_id = ''
    },
    cancel_title: function () {
        this.editable_scope = '';
        this.tmp_editing_data = '';
        this.editing_id = '';
    },
    //subtitle
    edit_subtitle: function (table_data) {
        this.editable_scope = 'value';
        this.tmp_editing_data = table_data.header.data.subtitle.value;
        this.editing_id = table_data.header.data.subtitle.id
    },
    save_subtitle: function (table_data) {
        this.editable_scope = '';
        table_data.header.data.subtitle.value = this.tmp_editing_data;
        this.tmp_editing_data = '';
        this.editing_id = '';
    },
    cancel_subtitle: function () {
        this.editable_scope = '';
        this.tmp_editing_data = '';
        this.editing_id = '';
    },
    //description
    edit_description: function (table_data) {
        this.editable_scope = 'value';
        this.tmp_editing_data = table_data.body.data.description.value;
        this.editing_id = table_data.body.data.description.id
    },
    save_description: function (table_data) {
        this.editable_scope = '';
        table_data.body.data.description.value = this.tmp_editing_data;
        this.tmp_editing_data = '';
        this.editing_id = '';
    },
    cancel_description: function () {
        this.editable_scope = '';
        this.tmp_editing_data = '';
        this.editing_id = '';
    },
    //property
    move_property: function ( direction, table_id, p_key ) {
        var temp_property = this.tbl_data[table_id].body.data.properties[p_key];
        if( direction == 'up' ) {
            if( p_key <= 0 ) return;
            this.tbl_data[table_id].body.data.properties.splice(p_key,1);
            this.tbl_data[table_id].body.data.properties.splice( (p_key-1),0,temp_property);
        } else if ( direction == 'down' ) {
            if( p_key >=  this.tbl_data[table_id].body.data.properties.length ) return;
            this.tbl_data[table_id].body.data.properties.splice(p_key,1);
            this.tbl_data[table_id].body.data.properties.splice( (p_key+1),0,temp_property);
        }
    },
    edit_property: function (table_data,property) {
        this.editable_scope = 'value';
        this.tmp_editing_data = property.value;
        this.editing_id = property.id
    },
    remove_property: function (table_id, key) {
        this.editable_scope = '';
        this.tmp_editing_data = '';
        this.editing_id = '';
        this.tbl_data[table_id].body.data.properties.splice(key,1);
    },
    save_property: function (property) {
        this.editable_scope = '';
        property.value = this.tmp_editing_data;
        this.tmp_editing_data = '';
        this.editing_id = '';
    },
    cancel_property: function () {
        this.editable_scope = '';
        this.tmp_editing_data = '';
        this.editing_id = '';
    },
    //button
    edit_button_label: function (table_data) {
        this.editable_scope = 'value';
        this.tmp_editing_data = table_data.footer.data.button.value;
        this.editing_id = table_data.footer.data.button.id
    },
    edit_button_url: function (table_data) {
        this.editable_scope = 'url';
        this.tmp_editing_data = table_data.footer.data.button.url;
        this.editing_id = table_data.footer.data.button.id
    },
    save_button_label: function (table_data) {
        this.editable_scope = '';
        table_data.footer.data.button.value = this.tmp_editing_data;
        console.log(table_data.footer.data.button.value);
        this.tmp_editing_data = '';
        this.editing_id = '';
    },
    cancel_button_label: function () {
        this.editable_scope = '';
        this.tmp_editing_data = '';
        this.editing_id = '';
    },
    save_button_url: function (table_data) {
        this.editable_scope = '';
        table_data.footer.data.button.url = this.tmp_editing_data;
        this.tmp_editing_data = '';
        this.editing_id = '';
    },
    cancel_button_url: function () {
        this.editable_scope = '';
        this.tmp_editing_data = '';
        this.editing_id = '';
    },
    //events
    add_table: function () {
        var date = new Date();
        var table_template = this.generate_table_template();
        Vue.set( this.tbl_data, 'id-' + date.getTime(), table_template );
    },
    change_settings: function ( settings ) {
        this.settings = settings;
    }
};

var template_computed_property_1 = {
    t_data: function () {
        if( this.tables ) {
            return this.tbl_data;
            //return this.tables;
        } else {
            return this.demo;
        }
    },
    pricing_item_style: function () {
      if( typeof this.settings.s != 'undefined' ) {
          return {
              'margin-right' : ( this.settings.s.spacing / 2 ) + 'px',
              'margin-left' : ( this.settings.s.spacing / 2 ) + 'px',
              'flex': '0 1 ' + this.settings.s.col_width + 'px',
              '-webkit-flex': '0 1 ' + this.settings.s.col_width + 'px'
          }
      }
    },
};

var functions_on_create = function(_this) {
    eventBus.$on( 'event_add_table', _this.add_table );
    eventBus.$on( 'event_change_settings', _this.change_settings );
}

Vue.component( 'wppt_sonam', {
    template: '#wppt_sonam',
    props: ['tables'],
    data: function () {
        return template_data_1;
    },
    computed: template_computed_property_1,
    methods: template_methods_1,
    created: function () {
        this.tbl_data = this.tables;
        functions_on_create(this);
    }
});

Vue.component( 'wppt_jinpa', {
    template: '#wppt_jinpa',
    props: ['tables'],
    data: function () {
        return template_data_1;
    },
    computed: template_computed_property_1,
    methods: template_methods_1,
    created: function () {
        this.tbl_data = this.tables;

        functions_on_create(this);
    }
});
Vue.component( 'wppt_tenzin', {
    template: '#wppt_tenzin',
    props: ['tables'],
    data: function () {
        return template_data_1;
    },
    computed: template_computed_property_1,
    methods: template_methods_1,
    created: function () {
        this.tbl_data = this.tables;

        functions_on_create(this);
    }
});
Vue.component( 'wppt_yama', {
    template: '#wppt_yama',
    props: ['tables'],
    data: function () {
        return template_data_1;
    },
    computed: template_computed_property_1,
    methods: template_methods_1,
    created: function () {
        this.tbl_data = this.tables;

        functions_on_create(this);
    }
});