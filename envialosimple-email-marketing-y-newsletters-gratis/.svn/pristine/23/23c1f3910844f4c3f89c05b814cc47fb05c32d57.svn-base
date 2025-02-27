<?php global $lang; ?>
<script>
    Vue.component('btngroup-edit-delete-component', {
        data () {
            return {
                show:false
            }
        },
        created() {
            window.addEventListener('click', (e) => {
                let dropdown =  this.$el.querySelector('.btn-group');
                if (dropdown && !dropdown.contains(e.target) && this.show){
                    this.toggle();
                }
            })
        },
        methods: {
            toggle: function() {
                this.show = !this.show;
            },
            editAction: function() {
                this.edit(this.data);
                this.toggle();
            },
            deleteAction: function() {
                this.delete(this.data);
                this.toggle();
            },
            mainAction: function() {
                this.main(this.data);
            }
        },
        props: ['title','edit','delete','main','data'],
        template: `
            <div class="btn-group btngroupComponent" role="group" >
                <button type="button" v-on:click="mainAction" class="btn btn-white">{{this.title}}</button>
                <div class="btn-group " role="group" v-if="this.edit || this.delete">
                    <button type="button" v-on:click="toggle" class="btn btn-white dropdown-toggle"></button>
                    <div class="dropdown-menu"  v-bind:class="{ show: this.show}">
                        <a v-if="this.edit" class="dropdown-item" v-on:click="editAction"><?php echo esc_html($lang['globals']['edit']); ?></a>
                        <a v-if="this.delete" class="dropdown-item" v-on:click="deleteAction" ><?php echo esc_html($lang['globals']['delete']); ?></a>
                    </div>
                </div>
            </div>
        `
    })
</script>
