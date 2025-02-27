<script>
    Vue.component('example-form-7-component', {
        data () {
            return {
                show: false,
                typeField: null,
                customFields: [],
                selected: null,
                notSupport:false
            }
        },
        created() {
            this.customfieldsService = new ESPluginCustomfieldsService();
        },
        methods: {
            showModal() {
                this.show = true;
                this.getCustomFields();
            },
            hideModal() {
                this.show = false;
            },
            getCustomFields() {
                this.customfieldsService.getAll({
                    page:1,
                    orderby:'id',
                    order:'asc',
                    filter:'',
                    limit:100,
                }).then((response) => {
                    this.customFields = response.data.data.data;
                    this.customFields['emailbase'] = {
                        name: 'Email',
                        type: 'emailbase'
                    };
                }).catch((error) => {

                });
            },
            getValues() {
                if(this.customFields[this.selected].options_values) {
                    let values = this.customFields[this.selected].options_values.split(',');
                    let result = '';
                    values.forEach(value => {
                        result += '"'+value+'" ';
                    });

                    return result;
                }
                return '';
            },
            getDefaultValue() {
                if(this.customFields[this.selected] && this.customFields[this.selected].value_default) {
                    return 'default:"'+this.customFields[this.selected].value_default+'"'
                }
                return '';
            },
            getName() {
                if(this.selected || this.selected === 0) {
                    let newName = this.customFields[this.selected].name.replace(/ /g, "-")
                    return newName.replace(/[^a-z0-9-]/gi,'');
                } else {
                    return 'email-field'
                }
            },
            getType() {
                return this.customFields[this.selected].type;
            },
            getCode() {
                let customSelected = this.customFields[this.selected];
                let type = customSelected.type;
                let html = '';
                let labelstart = '<label> ';
                let labelend = '</label>';
                switch (type) {
                    case 'Text field':
                        let typeInput = 'text';
                        let min = '';
                        if(customSelected.validation == 'Numeric Only') {
                            typeInput = 'number';
                            min = 'min:0';
                        }
                        if(customSelected.validation == 'Email Format Check') {
                            typeInput = 'email';
                        }
                        html += labelstart+customSelected.name+' <br/>['+typeInput+' '+this.getName()+' '+min+']'+labelend;
                        break;
                    case 'Hidden field':
                        html += '[hidden '+this.getName()+' '+this.getDefaultValue()+']';
                        break;
                    case 'emailbase':
                        html += labelstart+customSelected.name+' <br/>[email* '+this.getName()+']'+labelend;
                        break;
                    case 'Check box':
                        html += labelstart+customSelected.name+labelend+' <br/>[checkbox '+this.getName()+' use_label_element '+this.getValues()+']';
                        break;
                    case 'Radio button':
                        html += labelstart+customSelected.name+labelend+' <br/>[radio '+this.getName()+' use_label_element default:1 '+this.getValues()+']';
                        break;
                    case 'Drop list':
                        html += labelstart+customSelected.name+' <br/>[select '+this.getName()+' include_blank '+this.getValues()+']'+labelend;
                        break;
                    case 'Anual Date':
                        html += labelstart+customSelected.name+' <br/>[date '+this.getName()+' min:'+this.getCurrentYear()+'-01-01 max:'+this.getCurrentYear()+'-12-31 ]'+labelend;
                        break;
                    default:
                        break;
                }
                //html += ' </label>';
                return html;
            },
            copyText() {
                let textarea = document.querySelector('#codeContactForm');
                let value = textarea.value;
                textarea.removeAttribute('disabled');
                textarea.select();
                textarea.setAttribute('disabled','disabled');
                document.execCommand('copy');
                if (window.getSelection) {window.getSelection().removeAllRanges();}
                else if (document.selection) {document.selection.empty();}
            },
            getCurrentYear() {
                return new Date().getFullYear();
            },
            checkValidation() {
                if(this.selected) {
                    let customSelected = this.customFields[this.selected];

                    //check validation
                    switch (customSelected.validation) {
                        case 'Alpha Only':
                        case 'Alpha Numeric Only':
                        case 'Custom':
                            return true;
                            break;
                        default:
                            break;
                    }
                }
                
                return false;
            },
            checkTypeField() {
                this.notSupport = false;
                if(this.selected) {
                    let customSelected = this.customFields[this.selected];

                    //checksupport
                    switch (customSelected.type) {
                        case 'Anual Date':
                            this.notSupport = true;
                            break;
                        default:
                            break;
                    }
                }
            }
        },
        props: [],
        template: `
            <div class="exampleForm7" >
                <div class="infoBlock">
                    Si necesitas ayuda con la creacion del formulario de contacto de Contact Form 7, haz <button class="btn btn-link" v-on:click="showModal">click aqui</button>
                </div>
                <div class="exampleForm7Content" v-if="show">
                    <div class="contentBlock">
                        <span class="btnClose" v-on:click="hideModal"><i class="fa fa-times"></i></span>
                        <h6>Generador de código para Contact Form 7:</h6>
                        <div class="form-group">
                            <label class="form-label mt-4">Seleccione el campo personalizado que desea agregar al formulario:</label>
                            <select class="form-control" v-model="selected" @change="checkTypeField">
                                <option></option>
                                <option value="emailbase">Email</option>
                                <option v-for="customField,index in customFields" :value="index" >{{customField.name}}</option>
                            </select>
                        </div>
                        <div class="" v-if="customFields[selected] && !notSupport">
                            <label class="d-block">Codigo para copiar y pegar en Contact Form 7</label>
                            <textarea id="codeContactForm" class="form-control" disabled="disabled" v-html="getCode()"></textarea>
                            <input type="hidden" value="">
                        </div>
                        <div class="alert alert-dismissible alert-danger mt-4" v-if="checkValidation()">
                            <strong>Advertencia:</strong> Este campo contiene una validación que no se aplicará.
                        </div>
                        <div class="alert alert-dismissible alert-danger mt-4" v-if="notSupport">
                            <strong>Advertencia:</strong> Este campo no está soportado.
                        </div>
                        <div class="btnBlock" v-if="customFields[selected] && !notSupport">
                            <button class="btn btn-primary" v-on:click="copyText">Copiar al portapeles</button>
                        </div>
                    </div>
                </div>
            </div>
        `
    })
</script>