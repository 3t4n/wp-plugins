<?php global $lang; ?>
<script>
    Vue.component('btngroup-options-component', {
        data () {
            return {
                show:false
            }
        },
        created() {
            window.addEventListener('click', (e) => {
                let dropdown =  this.$el.querySelector('.btn-group');
                if (!dropdown.contains(e.target) && this.show){
                    this.toggle();
                }
            })
        },
        methods: {
            toggle: function() {
                this.show = !this.show;
            },
            selectAction: function(value) {
                this.toggle();
                this.select(value);
            }
        },
        props: ['icon','value','action','list','select'],
        template: `
            <div class="btn-group btngroupComponent listTop" >
                <button type="button" class="btn btn-white" v-html="icon+value"></button>
                <div class="btn-group " role="group">
                    <button type="button" v-on:click="toggle" class="btn btn-white dropdown-toggle"></button>
                    <div class="dropdown-menu" v-bind:class="{ show: this.show}" >
                        <span class="dropdown-item" v-for="(item, key) in list" v-bind:class="{ show: this.show}"  v-on:click="selectAction(item)">{{key}}</span>
                    </div>
                </div>
            </div>
        `
    })
</script>
