<template>
    <div class="agp__checkboxType__container">

        <form
            class="agp__checkboxType__buttonContainer"
            @submit.prevent="handleSubmit(checkbox)"
        >

            <div class="agp__checkboxType__checkboxContainer">
            
                <input
                    id="checkbox"
                    class="agp__checkboxType__checkbox"
                    type="checkbox"
                    v-model="checkbox"
                >

                <label
                    v-if="options.age_gator_checkbox_text"
                    for="checkbox"
                    class="agp__checkboxType__text"
                >
                    {{ label }}
                </label>

            </div>

            <div class="agp__checkboxType__buttonContainer">
                <input
                    class="agp__checkboxType__button"
                    type="submit"
                    :value="options.age_gator_submit_button_text"
                    :style="primaryButtonStyle"
                >    
            </div>

        </form>

    </div>
</template>
<script>
import { mapGetters, mapActions } from 'vuex'
export default {
    name: 'Checkbox',
    data () {
        return {
            checkbox: window.ageGator.options.age_gator_precheck_checkbox
        }
    },
    computed: {
        ...mapGetters({
            options: 'getOptions',
            primaryButtonStyle: 'primaryButtonStyle'
        }),
        label () {
            let label = this.options.age_gator_checkbox_text
            label = this.$options.filters.age(label)
            return label
        },
    },
    methods: {
        ...mapActions([
            'handleSubmit'
        ])
    }
}
</script>