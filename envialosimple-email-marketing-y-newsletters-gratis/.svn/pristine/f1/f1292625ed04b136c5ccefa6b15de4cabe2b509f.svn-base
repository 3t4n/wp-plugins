<?php global $lang; ?>
<script>
    Vue.component('singlelist-maillists-component', {
        data () {
            return {
                filterSelected:'',
                prevValueSearch: ''
            }
        },
        props: ['options','selected','add','remove','search','nextpage','prevpage','pagination','required'],
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
                            <div class="label mb0"><?php echo esc_html($lang['components']['singlelist']['maillists_selected']); ?></div>
                            <div class="form-control searchInput">{{selected.name}}<span class="action remove" v-on:click="remove()"></span></div>
                        </div>
                        <div class="searchBlock" v-if="!selected">
                            <div class="label"><?php echo esc_html($lang['components']['singlelist']['maillists_options']); ?></div>
                            <input class="form-control searchInput mb20" placeholder="Buscar..." v-on:keydown.enter.prevent='changeSearch' @change="changeSearch" name="searchMailLists" />
                            <ul class="form-control searchInput listBlock"  v-bind:class="{ 'is-invalid' : required }" >
                                <li v-for="option in options" >{{option.name}} <span class="action add" v-on:click="add(option)"></span></li>
                            </ul>
                            <div class="btnBlock" v-if="pagination.last_page > 1">
                                <span class="btn btn-sm btn-outline-primary" v-bind:class="{ disabled: !pagination.prev_page_url }" v-on:click="prevpage()">Volver</span>
                                <span class="btn btn-sm btn-outline-primary" v-bind:class="{ disabled: !pagination.next_page_url }" v-on:click="nextpage()">Ver más</span>
                            </div>
                            <span v-if="required" class="invalid-feedback"><?php echo esc_html($lang['components']['singlelist']['required_maillist']); ?><br></span>
                        </div>
                    </div>
                </div>
            </div>
        `
    })
</script>