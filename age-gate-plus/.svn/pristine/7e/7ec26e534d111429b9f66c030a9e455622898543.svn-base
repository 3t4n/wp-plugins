<template>
    <div class="agp__buttonType__container">

        <form
            class="agp__buttonType__buttonContainer"
            @submit.prevent="handleSubmit(true)"
        >
            <input
                class="agp__buttonType__button"
                type="submit"
                :value="options.age_gator_pass_button_text"
                :style="primaryButtonStyle"
            >
        </form>

        <form
            class="agp__buttonType__buttonContainer"
            @submit.prevent="handleSubmit(false)"
        >
            <input
                class="agp__buttonType__button"
                type="submit"
                :value="options.age_gator_fail_button_text"
                :style="secondaryButtonStyle"
            >
        </form>

    </div>
</template>
<script>
import { mapGetters, mapActions } from 'vuex'
export default {
    name: 'Button',
    computed: {
        ...mapGetters({
            options: 'getOptions',
            primaryButtonStyle: 'primaryButtonStyle',
            secondaryButtonStyle: 'secondaryButtonStyle',
        })
    },
    methods: {
        ...mapActions([
            'handleSubmit'
        ])
    }
}
</script>