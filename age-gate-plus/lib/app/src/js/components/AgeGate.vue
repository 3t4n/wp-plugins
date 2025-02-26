<template>
    <div
        v-if="isActive || isCustomizer"
        class="agp__wrapper"
        :class="{ 'agp__wrapper--note': !isActive && isCustomizer }"
    >

        <div
            v-if="isActive"
            class="agp__container"
        >

            <div
                class="agp__background agp__background--image"
                :style="backgroundImageStyle"
            ></div>

            <div
                class="agp__background agp__background--color"
                :style="backgroundColorStyle"
            ></div>

            <div
                id="agp_row"
                class="agp__row"
                :style="rowStyle"
            >

                <div class="agp__rowWrapper">

                    <div
                        class="agp__rowInner"
                        :style="modalStyle"
                    >

                        <a
                            v-if="showCancelButton"
                            class="agp__cancel"
                            @click="hide"
                        >
                            &times;
                        </a>

                        <div
                            v-if="options.age_gator_modal_image"
                            class="agp__logoContainer"
                        >
                            <img
                                class="agp__logo"
                                :style="imageStyle"
                                :src="options.age_gator_modal_image"
                            >
                        </div>

                        <h2
                            v-if="options.age_gator_heading"
                            :style="headingStyle"
                            class="agp__heading agp__normalMargin"
                            v-html="$options.filters.age(options.age_gator_heading)"
                        >
                        </h2>

                        <div
                            class="agp__message"
                            :class="status"
                            :style="messageStyle"
                            v-html="message"
                        >
                        </div>

                        <div
                            v-if="status === 'prompt'"
                            class="agp__inputContainer"
                        >
                            <keep-alive>
                                <component
                                    :is="inputComponent"
                                />
                            </keep-alive>
                        </div>

                        <div
                            v-if="showRetryButton"
                            class="agp__retryButtonContainer"
                        >
                            <form
                                class="agp__retryButtonForm"
                                @submit.prevent="handleRetry"
                            >
                                <input
                                    :style="primaryButtonStyle"
                                    class="agp__retryButton button"
                                    type="submit"
                                    :value="options.age_gator_retry_button_text"
                                >
                            </form>
                        </div>

                        <div
                            v-if="options.age_gator_disclaimer && status === 'prompt'"
                            class="agp__disclaimer"
                            v-html="disclaimer"
                        />

                    </div>

                </div>

                <div
                    v-if="modalImageStyle"
                    class="agp__modalImage"
                    :style="modalImageStyle"
                ></div>

            </div>

        </div>

        <button
            class="agp__customizerNote button btn"
            v-else-if="isCustomizer"
            @click="show"
        >
            Show Age Gate
        </button>

    </div>
</template>
<script>
import { mapGetters, mapMutations, mapActions } from 'vuex'
import { debounce } from 'debounce'
import Age from './forms/Age.vue'
import Birthday from './forms/Birthday.vue'
import Button from './forms/Button.vue'
import Checkbox from './forms/Checkbox.vue'
import Error from './forms/Error.vue'

export default {
    name: 'AgeGate',
    components: {
        Age,
        Birthday,
        Button,
        Error,
    },
    data () {
        return {
            isCustomizer: false
        }
    },
    computed: {
        ...mapGetters({
            options: 'getOptions',
            isActive: 'getIsActive',
            localData: 'getLocalData',
            status: 'getStatus',
            images: 'getImages',
            viewportWidth: 'getViewportWidth',
            isMobile: 'isMobile',
            primaryButtonStyle: 'primaryButtonStyle'
        }),
        headingStyle () {
            let style = { color: this.options.age_gator_heading_color }
            
            if (this.options.age_gator_heading_manual_fontfamily) {
                style.fontFamily = this.options.age_gator_heading_fontfamily
            }

            if (this.options.age_gator_heading_manual_fontsize) {
                let size = this.isMobile ?
                    this.options.age_gator_heading_fontsize_mobile :
                    this.options.age_gator_heading_fontsize_desktop
                
                style.fontSize = `${size}px`
            }

            return style
        },
        backgroundImageStyle () {
            return { backgroundImage: `url(${this.options.age_gator_background_image || 'none'})` }
        },
        backgroundColorStyle () {
            return {
                opacity: 0.01 * parseInt(this.options.age_gator_background_opacity),
                backgroundColor: this.options.age_gator_background_color,
            }
        },
        rowStyle () {
            return {
                maxWidth: `${this.options.age_gator_max_width}px`,
                backgroundColor: this.options.age_gator_modal_color,
            }
        },
        modalStyle () {
            let style = {}
            switch (this.options.age_gator_modal_padding_units) {
                case 'percentage':
                    style.padding = `${this.options.age_gator_modal_padding_percent}%`
                    break
                case 'pixels':
                    style.padding = `${this.options.age_gator_modal_padding_px}px`
                    break
            }
            if (this.options.age_gator_modal_text_color) {
                style.color = this.options.age_gator_modal_text_color
            }
            return style
        },
        imageStyle () {
            return {
                width: `${this.options.age_gator_modal_image_width}px`
            }
        },
        modalImageStyle () {
            if (!this.options.age_gator_modal_image2) {
                return
            }

            return {
                backgroundImage: `url(${this.options.age_gator_modal_image2})`
            }
        },
        message () {
            let key = `age_gator_${this.status}`
            if (this.options[key]) {
                let message = this.options[key]
                message = this.$options.filters.age(message)
                message = this.$options.filters.multiline(message)
                return message
            }

            return 'Whoops, it looks like an error occured. Please refresh the page and try again'
        },
        disclaimer () {
            let disclaimer = this.options.age_gator_disclaimer
            disclaimer = this.$options.filters.age(disclaimer)
            disclaimer = this.$options.filters.multiline(disclaimer)
            return disclaimer
        },
        messageStyle () {
            return { color: this.options.age_gator_message_color }
        },
        inputComponent () {
            const map = {
                age: Age,
                birthday: Birthday,
                button: Button,
                checkbox: Checkbox,
            }

            return map[this.options.age_gator_type] || Error
        },
        showRetryButton () {
            return !this.localData.isLocked
                && this.options.age_gator_retry_button
                && this.status === 'fail'
        },
        showCancelButton () {
            return window.ageGator && window.ageGator.can_cancel
        }
    },
    methods: {
        ...mapMutations([
            'hide',
            'show',
            'setStatus',
            'setOption',
            'setViewportWidth',
        ]),
        handleRetry () {
            this.setStatus('prompt')
        },
        handleCustomizer () {
            this.isCustomizer = true
            this.setStatus('prompt')
            
            for (let option in this.options) {
                wp.customize(option, value => {
                    value.bind(newValue => {
                        this.setOption({ option, value: newValue })
                    })
                })
            }
        },
        handleViewportWidth: debounce(function() {
            this.setViewportWidth(window.innerWidth)
        }, 300)
    },
    mounted () {        
        window.addEventListener('resize', this.handleViewportWidth)
        window.wp && wp.customize && wp.customize.bind('preview-ready', this.handleCustomizer)
    }
}
</script>