<template>
    <panel :title="config.windowTitle" :start-minimized="startMinimized">
        <div :class="$style.root" slot="panel-content">
            <form @submit.prevent="submit">
                <template v-if="authType === AuthenticationType.Both || authType === AuthenticationType.Name">
                    <div :class="$style.formInput">
                        <input type="text" v-model="$v.name.$model" placeholder="Name"/>
                        <div v-if="$v.name.$dirty">
                            <div :class="$style.error" v-if="!$v.name.required">Name is required</div>
                            <div v-else :class="$style.errorPlaceholder">
                                &nbsp;
                            </div>
                        </div>
                        <div v-else :class="$style.errorPlaceholder">
                            &nbsp;
                        </div>
                    </div>
                </template>

                <template v-if="authType === AuthenticationType.Both || authType === AuthenticationType.Email">
                    <div :class="$style.formInput">
                        <input type="text" v-model="$v.email.$model" placeholder="Email"/>
                        <div v-if="$v.email.$dirty">
                            <div :class="$style.error" v-if="!$v.email.required">Email is required</div>
                            <div :class="$style.error" v-else-if="!$v.email.email">Please enter valid email</div>
                            <div v-else :class="$style.errorPlaceholder">
                                &nbsp;
                            </div>
                        </div>
                        <div v-else :class="$style.errorPlaceholder">
                            &nbsp;
                        </div>
                    </div>
                </template>

                <input type="submit" value="Start chat"/>
            </form>
        </div>
    </panel>
</template>

<script src="./authenticate-form.ts"></script>
<style module src="./authenticate-form.scss"></style>
