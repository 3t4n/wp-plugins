<template>
    <div class="agp__birthdayType__container">
        <form
            @submit.prevent="handleSubmit(age >= options.age_gator_age)"
        >

            <div class="agp__birthdayType__dateContainer">

                <select
                    v-model="selectedMonth"
                >
                    <option
                        v-for="(month, index) in months"
                        :value="index + 1"
                        :key="index"
                    >
                        {{ month }}
                    </option>
                </select>

                <select
                    v-model="selectedDay"
                >
                    <option
                        v-for="day in daysInMonth"
                        :value="day"
                        :key="day"
                    >
                        {{ day }}
                    </option>
                </select>

                <select
                    v-model="selectedYear"
                >
                    <option
                        v-for="year in years"
                        :value="year"
                        :key="year"
                    >
                        {{ year }}
                    </option>
                </select>

            </div>

            <div class="agp__birthdayType__buttonContainer">
                <input
                    class="agp__birthdayType__button"
                    type="submit"
                    :style="primaryButtonStyle"
                    :value="options.age_gator_submit_button_text"
                >    
            </div>

        </form>
    </div>
</template>
<script>
import { mapGetters, mapActions } from 'vuex'
export default {
    name: 'Birthday',
    data () {
        return {
            selectedMonth: 1,
            selectedDay: 1,
            selectedYear: (new Date()).getFullYear()
        }
    },
    computed: {
        ...mapGetters({
            options: 'getOptions',
            primaryButtonStyle: 'primaryButtonStyle'
        }),
        months () {
            return [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December',
            ]
        },
        daysInMonth () {
            return (new Date(this.selectedYear, this.selectedMonth, 0)).getDate()
        },
        years () {
            const years = []
            for (let i = (new Date()).getFullYear(); i >= 1900; i--) {
                years.push(i)
            }

            return years
        },
        age () {
            const birthday = new Date(this.selectedYear, this.selectedMonth - 1, this.selectedDay)
            const ageDifMs = Date.now() - birthday.getTime()
            const ageDate = new Date(ageDifMs)

            return Math.abs(ageDate.getUTCFullYear() - 1970)
        }
    },
    watch: {
        age (calculatedAge) {
            if (this.options.age_gator_auto_submit && calculatedAge >= this.options.age_gator_age) {
                this.handleSubmit(true)
            }
        }
    },
    methods: {
        ...mapActions([
            'handleSubmit'
        ])
    }
}
</script>