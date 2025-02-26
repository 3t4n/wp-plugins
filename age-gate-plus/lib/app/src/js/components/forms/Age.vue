<template>
    <div class="agp__ageType__container">
        <form
            class="agp__ageType__form"
            @submit.prevent="handleSubmit(selectedAge >= options.age_gator_age)"
        >

            <input
                class="agp__ageType__numberInput"
                v-model="selectedAge"
                min="0"
                max="200"
                type="number"
            >

            <input
                class="agp__ageType__button"
                type="submit"
                :value="options.age_gator_submit_button_text"
                :style="primaryButtonStyle"
            >

        </form>
    </div>
</template>
<script>
import { mapGetters, mapActions } from 'vuex'
export default {
    name: 'Age',
    data () {
        return {
            selectedAge: 21
        }
    },
    computed: {
        ...mapGetters({
            options: 'getOptions',
            primaryButtonStyle: 'primaryButtonStyle'
        })
    },
    methods: {
        ...mapActions([
            'handleSubmit'
        ])
    }
}
</script>