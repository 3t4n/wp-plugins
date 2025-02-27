<?php global $lang; ?>
<script>
    var app = new Vue({
        el: '#contactsCreate',
        data () {
            return {
                urlContacts: 'admin.php?page=es-plugin-contacts',
                urlContactsEdit: 'admin.php?page=es-plugin-contacts-edit&id=',
                showToast: false,
                msgToast: '',
                loading:false,
                customfields: [],
                formData: {
                    email:'',
                    customFields: {}
                },
                customFieldsValues: {},
                contact_id: null,

                //maillists
                maillists: [],
                maillistSelected:null,
                paginationMaillist:[],
                currentPageMaillist:1,
                filterPageMaillist:'',
                requiredMailList: false,

                timer: null,

                showSuccess:false,
                msgSuccess: ''
            }
        },
        methods: {
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
            submitForm: function() {
                this.msgsService.hideErrorsForm(this.$refs);
                this.setValuesFields(this.customfields);
                if(this.validateForm()) {
                    this.loading = true;
                    this.contactsService.create(this.formData).then(response => {
                        let contactData = response.data.data;
                        this.contact_id = contactData.id;

                        this.contactsService.suscribe(contactData.id,this.maillistSelected.id).then(() => {
                        }).catch(() => {
                        }).then(() => {
                            this.loading = false;

                            //show msg
                            this.showSuccess = true;
                            this.msgSuccess = 'El contacto se creó con éxito.';
                        });
                    }).catch((error) => {
                        this.loading = false;
                        let response = error.response;
                        if(response.status == '422') {
                            this.msgsService.showErrorsForm(response.data.code,this.$refs);
                            this.showMsgToast('<?php echo esc_html($lang['globals']['error_form']); ?>');
                        } else {
                            this.showMsgToast(this.msgsService.getHtmlMgs(response.data.code));
                        }
                    });
                } else {
                    this.showMsgToast('<?php echo esc_html($lang['globals']['error_form']); ?>');
                }
                
            },
            validateForm() {
                this.requiredMailList = false;
                if(!this.maillistSelected) {
                    this.requiredMailList = true;
                    return false;
                }
                return true;
            },
            getCustomFields() {
                this.loading = true;
                this.customfieldsService.getAll({
                    page:1,
                    orderby:'id',
                    order:'asc',
                    limit:100,
                    filter: ''
                }).then((result) => {
                    let data = result.data.data.data;
                    this.checkTypesFields(data);
                    this.customfields = data;
                }).catch((error) => {
                    console.log('error:',error);
                }).then(() => {
                    this.loading = false;
                });
            },
            getValuesFields(customfield) {
                return customfield.options_values.split(',');
            },
            checkTypesFields(fields) {
                fields.forEach((field) => {
                    switch (field.type) {
                        case "Check box":
                            this.customFieldsValues[field.id] = [];
                            if(field.value_default) {
                                this.customFieldsValues[field.id].push(field.value_default);
                            }
                            break;
                        case "Drop list":
                            this.customFieldsValues[field.id] = '';
                            
                            break;
                        case "Anual Date":
                            this.customFieldsValues[field.id] = [];
                            this.customFieldsValues[field.id][0] = '';
                            if(field.date_value) {
                                let values = field.date_value.split("-");
                                this.customFieldsValues[field.id][0] = parseInt(values[0]);
                                this.customFieldsValues[field.id][1] = parseInt(values[1]);
                            }
                            break;
                        default:
                            if(field.value_default) {
                                this.customFieldsValues[field.id] = field.value_default;
                            }
                            break;
                    }
                });
            },
            setValuesFields(fields) {
                this.formData.customFields = JSON.parse(JSON.stringify(this.customFieldsValues));
                fields.forEach((field) => {
                    if(field.type == "Check box") {
                        this.formData.customFields[field.id] = this.customFieldsValues[field.id].toString();
                    }
                    if(field.type == "Anual Date") {
                        if(this.customFieldsValues[field.id][0] && this.customFieldsValues[field.id][1]) {
                            this.formData.customFields[field.id] = ('0' + this.customFieldsValues[field.id][0]).slice(-2)+"-"+('0' +this.customFieldsValues[field.id][1]).slice(-2);
                        } else {
                            this.formData.customFields[field.id] = '';
                        }   
                    }
                });
            },
            isNumber(e) {
                let char = String.fromCharCode(e.keyCode);
                if (/^[0-9]+$/.test(char)) return true;
                else e.preventDefault();
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
                this.maillistSelected = option;
            },
            removeMaillist() {
                this.maillistSelected = null;
            },

            //modalSuccess
            hideModalSuccess() {
                this.showSuccess = false;
                this.msgSuccess = '';

                window.location.replace(this.urlContactsEdit+this.contact_id);
            },
            actionBtnModalSuccess() {
                window.location.replace(this.urlContacts);
            }
        },
        mounted () {
            this.msgsService = new ESPluginMsgsService();
            this.customfieldsService = new ESPluginCustomfieldsService();
            this.listsService = new ESPluginListsService();
            this.contactsService = new ESPluginContactsService();

            this.getCustomFields();
            this.getMaillists();
        }
    })
</script>