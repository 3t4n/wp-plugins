<?php global $lang; ?>
<script>
    var app = new Vue({
        el: '#es-contactform7-list',
        data () {
            return {
                urlForms: 'admin.php?page=es-plugin-contactform7',

                form: null,
                formSelected: '',
                configForm:false,
                loading:false,
                config: {
                    mailList: null,
                    associatedFields: {}
                },
                contactFormFields:  {
                },
                customFields: {

                },
                //toast
                showToast: false,
                msgToast: '',
                loading:false,

                //maillists
                maillists: [],
                maillistSelected:null,
                paginationMaillist:[],
                currentPageMaillist:1,
                filterPageMaillist:'',
                requiredMailList: false,

                timer:null,

                //modal success
                showSuccess:false,
                msgSuccess: '',

                //not found
                notfound:false,
                msgBackList:'Volver al listado de formularios'
            }
        },
        methods: {
            //get all form contactform 7
            getFormById: function() {
                let urlParams = new URLSearchParams(window.location.search);
                this.idForm = urlParams.get('id');

                this.loading = true;
                this.contactsform7Service.getFormById({id:this.idForm}).then((response)=> {
                    this.form = response.data;
                    if(this.form) {
                        this.formSelected = this.form.id;
                        this.selectContactForm();
                    } else {
                        this.notfound = true;
                        this.loading = false;
                    }
                }).catch((error) => {
                    this.notfound = true;
                    this.loading = false;
                })
            },

            //get fields contactform 7
            getFieldsById: function() {
                this.loading = true;
                this.contactsform7Service.getFieldsById(this.formSelected).then((response)=> {
                    this.contactFormFields = response.data;
                    this.filterFieldsOlds();
                }).catch((error) => {
                    console.log('getFieldsById - error:',error);
                }).then(() => {
                    this.loading = false;
                });
            },
            //event after select contactform 7
            selectContactForm: async function(data) {
                if(this.formSelected) {
                    await this.getConfig();
                    this.getFieldsById();
                    this.getMaillists();
                }
            },

            //endpoints config wordpress
            getConfig: async function() {
                if(this.formSelected) {
                    this.loading = true;
                    let responseConfig = await this.contactsform7Service.getConfig(this.formSelected);
                    this.config.mailList = (responseConfig.data.mailList)?responseConfig.data.mailList:null;
                    this.config.associatedFields = (!Array.isArray(responseConfig.data.associatedFields))?responseConfig.data.associatedFields:{};
                    this.loading = false;
                }
            },
            setConfig: function() {
                if(this.formSelected) {
                    if(this.checkEmailField()) {
                        this.loading = true;
                        this.filterFieldsOlds();
                        this.contactsform7Service.setConfig(
                            this.formSelected,
                            this.config
                        ).then((response)=> {
                            //show msg
                            this.showSuccess = true;
                            this.msgSuccess = '<?php echo esc_html($lang['pages']['contactForm7']['save_ok']); ?>';
                            
                        }).catch((error) => {
                            console.log('setConfig - error:',error);
                        }).then(() => {
                            this.loading = false;
                        });
                    } else {
                        this.showMsgToast('<?php echo esc_html($lang['pages']['contactForm7']['required_email']); ?>');
                    }
                }
            },


            //toast
            hideToast: function() {
                this.showToast = '';
                window.clearTimeout(this.timer);
            },
            showMsgToast: function(msg) {
                this.msgToast = msg;
                this.showToast = true;
                this.timer = window.setTimeout(() => {
                    this.hideToast();
                },5000);
            },

            //maillists
            getMaillists(filter ='') {
                this.loading = true;
                if(filter !== this.filterPageMaillist) {
                    this.filterPageMaillist = filter;
                    this.currentPageMaillist = 1;
                }
                this.listsService.getAll({
                    page:this.currentPageMaillist,
                    orderby:'name',
                    order:'asc',
                    limit:100,
                    filter: this.filterPageMaillist
                }).then((result) => {
                    this.paginationMaillist = result.data.data;
                    this.maillists = result.data.data.data;
                }).catch(() => {

                }).then(() => {
                    this.loading = false;
                });
            },
            addMaillist(option) {
                this.config.mailList = option;
            },
            removeMaillist() {
                this.config.mailList = null;
                this.config.associatedFields = {};
            },

            //customfields
            getCustomFields() {
                this.customfieldsService.getAll({
                    page:1,
                    orderby:'id',
                    order:'asc',
                    limit:100,
                    filter: ''
                }).then((response) => {
                    this.customFields = response.data.data.data;
                }).catch((error) => {
                    console.log('getCustomFields - error:',error);
                });
            },
            checkEmailField() {
                let result = false;
                if(this.config.mailList !== null) {
                    Object.entries(this.config.associatedFields).forEach(([key, value]) => {
                        if(value == 'emailbase') {
                            result = true;
                        }
                    });
                    return result;
                } else {
                    return true;
                }
            },

            //modalSuccess
            hideModalSuccess() {
                this.showSuccess = false;
                this.msgSuccess = '';
            },
            actionBtnModalSuccess() {
                window.location.replace(this.urlForms);
            },

            //not found action
            backList() {
                window.location.replace(this.urlForms);
            },

            ifUsed(customField,name) {
                let selected = true;
                Object.keys(this.config.associatedFields).forEach(key => {
                    if(this.config.associatedFields[key] === customField.id && key !== name && this.config.associatedFields[name] !== customField.id) {
                        selected = false;
                    }
                });
                return selected;
            },
            ifUsedEmail(field) {
                let selected = true;
                Object.keys(this.config.associatedFields).forEach(key => {
                    if(this.config.associatedFields[key] === 'emailbase' && key !== field.name && this.config.associatedFields[name] !== 'emailbase') {
                        selected = false;
                    }
                });
                return selected;
            },
            filterFieldsOlds() {
                let remove = true;
                Object.keys(this.config.associatedFields).forEach(key => {
                    this.contactFormFields.forEach((contactFormField) => {
                        if(contactFormField.name == key) {
                            remove = false;
                        }
                    });
                    
                    if(remove) {
                        delete this.config.associatedFields[key];
                    }
                    remove = true;
                });
            }
        },
        mounted () {
            this.contactsform7Service = new ESPluginContactsform7Service();
            this.listsService = new ESPluginListsService();
            this.customfieldsService = new ESPluginCustomfieldsService();

            this.getFormById();
            this.getCustomFields();
        }
    })
</script>