import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const localData = window.getLocalData() || { success: [], fail: [] }
const rawOptions = window.ageGator.options

function getOptions (rawOptions) {
    return window.objectMap(rawOptions, (key, value) => {
        if (!isNaN(parseInt(value))) {
            return parseInt(value)
        }
    
        return value
    })
}

function getIsActive (options, localData) {
    if (!options.age_gator_remember_user || localData.success.length === 0) {
        return true
    }

    return window.timestampIsExpired(
        localData.success.slice(-1)[0],
        options.age_gator_remember_user_time
    )
}

function getStatus (options, localData) {
    let userLockIsActive
    if (!options.age_gator_limit_attempts || localData.fail.length === 0) {
        return 'prompt'
    }

    let lastFailIsExpired = window.timestampIsExpired(
        localData.fail.slice(-1)[0],
        options.age_gator_lock_time
    )

    userLockIsActive = !lastFailIsExpired && localData.fail.length >= options.age_gator_max_attempts
    return userLockIsActive ? 'fail' : 'prompt'
}
 
const store = new Vuex.Store({
    state: {
        rawOptions,
        localData,
        viewportWidth: window.innerWidth,
        isActive: getIsActive(rawOptions, localData),
        status: getStatus(rawOptions, localData),
    },
    getters: {
        getOptions: state => getOptions(state.rawOptions),
        getIsActive: state => state.isActive,
        getLocalData: state => state.localData,
        getStatus: state => state.status,
        getImages: () => window.ageGator.images || {},
        getViewportWidth: state => state.viewportWidth,
        isMobile: state => state.viewportWidth < 440,
        primaryButtonStyle (state, getters) {
            let options = getters.getOptions
            let style = {}
            if (options.age_gator_primary_button_text_color) {
                style.color = options.age_gator_primary_button_text_color
            }
            if (options.age_gator_primary_button_background_color) {
                style.backgroundColor = options.age_gator_primary_button_background_color
            }
            return style
        },
        secondaryButtonStyle (state, getters) {
            let options = getters.getOptions
            let style = {}
            if (options.age_gator_secondary_button_text_color) {
                style.color = options.age_gator_secondary_button_text_color
            }
            if (options.age_gator_secondary_button_background_color) {
                style.backgroundColor = options.age_gator_secondary_button_background_color
            }
            return style
        },
    },
    mutations: {
        hide (state) {
            state.isActive = false
        },
        show (state) {
            state.isActive = true
        },
        setStatus (state, status) {
            state.status = status
        },
        setOption (state, { option, value }) {
            state.rawOptions[option] = value
        },
        setViewportWidth (state, width) {
            state.viewportWidth = width
        },
        setLocalData (state, localData) {
            state.localData = localData
        }
    },
    actions: {
        handleSubmit ({ commit, state, getters }, isLegalAge) {
            let el = document.getElementById('agp_row')
            el.style.height = el.clientHeight + 'px'
            const options = getters.getOptions
            const status = isLegalAge ? 'success' : 'fail'
            let localData = state.localData
            localData[status].push(Date.now())
            commit('setLocalData', localData)

           if (!isLegalAge && options.age_gator_redirect_on_fail) {
               window.location = options.age_gator_redirect
           }

            setTimeout(() => {
                commit('setStatus', status)
            }, options.age_gator_prompt_delay_length)

            if (isLegalAge) {
                setTimeout(() => {
                    commit('hide')
                }, options.age_gator_prompt_delay_length + options.age_gator_success_delay_length)
            }
        }
    },
})

store.subscribe((mutation, state) => {
    if (mutation.type === 'setLocalData') {
        window.setLocalData(state.localData)
    }
})

export default store