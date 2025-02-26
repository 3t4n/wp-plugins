;(function ($) {
    var wppt_admin = new Vue({
        el: '#wpcontent',
        data: {
            d: {
                test: 'this is test',
                template: 'wppt_sonam',
                settings: {
                    s: {
                        spacing: 10,
                        col_width: 330
                    }
                },
                tables: {
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
                                properties: [
                                    {
                                        id: 'tbl-1-p-1',
                                        class : '',
                                        value: 'This is awesome product'
                                    },
                                    {
                                        id: 'tbl-1-p-2',
                                        class: '',
                                        value: 'You will love it'
                                    }
                                ]
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
                                    value: 'Standard'
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
                                properties: [
                                    {
                                        id: 'tbl-2-p-1',
                                        class: '',
                                        value: 'This is another awesome product'
                                    },
                                    {
                                        id: 'tbl-2-p-2',
                                        class: '',
                                        value: 'You will love it too'
                                    },
                                    {
                                        id: 'tbl-2-p-3',
                                        class: '',
                                        value: 'Wait for next table to be impressed'
                                    }
                                ]
                            }
                        },
                        footer: {
                            data: {
                                button: {
                                    id: 'tbl-2-f-1',
                                    class: '',
                                    value: 'Check out',
                                    url: 'www.facebook.com'
                                }
                            }
                        }
                    },
                }
            }
        },
        computed: {
            wppt_pricing_table_data: function () {
                return JSON.stringify(this.d);
            }
        },
        methods: {
        },
        created: function () {
            if( typeof $wppt_pricing_table_data == 'object' && Object.keys( $wppt_pricing_table_data ).length ) {
                this.d = $wppt_pricing_table_data;
            }

        }
    })
}(jQuery));