<script>
    Vue.component('singlelist-segments-component', {
        data () {
            return {
                filterSelected:'',
                prevValueSearch: ''
            }
        },
        props: ['options','selected','add','remove','search','nextpage','prevpage','pagination','required','empty'],
        methods: {
            changeSearch(event) {
                if(this.prevValueSearch !== event.target.value) {
                    this.prevValueSearch = event.target.value;
                    this.search(event.target.value);
                }
            }
        },
        template: `
            <div class="singlelistComponent">
                <div class="row">
                    <div class="col optionsBlock">
                        <div class="selectedBlock" v-if="selected">
                            <div class="label mb0">Segmento seleccionado</div>
                            <div class="form-control searchInput" v-bind:class="{ 'is-invalid': empty }">{{selected.name}}<span class="action remove" v-on:click="remove()"></span></div>
                            <span v-if="empty" class="invalid-feedback">El segmento seleccionado está vacío.</span>
                        </div>
                        <div class="searchBlock" v-if="!selected">
                            <div class="label">Segmentos disponibles</div>
                            <input class="form-control searchInput mb20" placeholder="Buscar..." v-on:keydown.enter.prevent='changeSearch' @change="changeSearch" name="searchMailLists" />
                            <ul class="form-control searchInput listBlock" v-bind:class="{ 'is-invalid': required }">
                                <li v-for="option in options" v-if="option.members > 0">{{option.name}} <span class="action add" v-on:click="add(option)"></span></li>
                            </ul>
                            <span v-if="required" class="invalid-feedback">El campo es obligatorio.</span>
                            <div class="btnBlock" v-if="pagination.last_page > 1">
                                <span class="btn btn-sm btn-outline-primary" v-bind:class="{ disabled: !pagination.prev_page_url }" v-on:click="prevpage()">Volver</span>
                                <span class="btn btn-sm btn-outline-primary" v-bind:class="{ disabled: !pagination.next_page_url }" v-on:click="nextpage()">Ver más</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `
    })
</script>