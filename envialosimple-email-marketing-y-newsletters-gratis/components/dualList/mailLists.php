<script>
    Vue.component('duallist-maillists-component', {
        data () {
            return {
                filterSelected:'',
                prevValueSearch: ''
            }
        },
        props: ['options','selected','add','remove','search','nextpage','prevpage','pagination','addall','removeall','required','empty'],
        methods: {
            changeSearch(event) {
                if(this.prevValueSearch !== event.target.value) {
                    this.prevValueSearch = event.target.value;
                    this.search(event.target.value);
                }
            },
            getSelected() {
                return this.selected.filter((select) => select.name.toLowerCase().includes(this.filterSelected.toLowerCase()));
            },
            removeallAction() {
                this.removeall(this.selected.filter((select) => select.name.includes(this.filterSelected)));
            }
        },
        template: `
            <div class="dualListComponent">
                <div class="row">
                    <div class="col optionsBlock">
                        <div class="label">Listas disponibles</div>
                        <input class="form-control searchInput" placeholder="Buscar..." v-on:keydown.enter.prevent='changeSearch' @change="changeSearch" name="searchMailLists" />
                        <div class="addBlock">
                            <span v-on:click="addall()">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                Agregar todos
                            </span>
                        </div>
                        <ul class="form-control searchInput listBlock" >
                            <li v-for="option in options" v-if="option.count > 0">{{option.name}} <span class="action add" v-on:click="add(option)"></span></li>
                        </ul>
                        <div class="btnBlock " v-if="pagination.last_page > 1">
                            <span class="btn btn-sm btn-outline-primary" v-bind:class="{ disabled: !pagination.prev_page_url }" v-on:click="prevpage()">Volver</span>
                            <span class="btn btn-sm btn-outline-primary" v-bind:class="{ disabled: !pagination.next_page_url }" v-on:click="nextpage()">Ver más</span>
                        </div>
                        
                    </div>
                    
                    <div class="col selectedBlock" >
                        <div class="label">Listas seleccionadas</div>
                        <input class="form-control searchInput" placeholder="Buscar..." v-model="filterSelected" />
                        <div class="removeBlock">
                            <span v-on:click="removeallAction()">
                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                Eliminar todos
                            </span>
                        </div>
                        <ul class="form-control searchInput listBlock" v-bind:class="{ 'is-invalid': (empty || required)  }">
                            <li v-for="select in this.getSelected()">{{select.name}} <span class="action remove" v-on:click="remove(select)"></span></li>
                        </ul>
                        <span v-if="required" class="invalid-feedback">El campo es obligatorio.</span>
                        <span v-if="empty" class="invalid-feedback">Una o más de las listas seleccionadas están vacías.</span>
                    </div>
                </div>
            </div>
        `
    })
</script>