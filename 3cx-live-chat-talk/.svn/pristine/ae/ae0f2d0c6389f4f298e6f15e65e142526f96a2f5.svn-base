<template>
    <div >
        <call-us-authenticate-form :start-minimized="authWindowMinimized" :config="config" v-if="type === ViewState.InputForm" :auth-type="authenticationType"
                                   @submit="showChat"></call-us-authenticate-form>
        <call-us-main-form v-else :start-minimized="mainWindowMinimized" :config="config" :auth="auth"></call-us-main-form>
    </div>
</template>

<script src="./call-us.ts"></script>
