<template>
    <div :class="$style.root">
        <overlay-message @submit="notificationMessage=''" v-if="!!notificationMessage" :message="notificationMessage"></overlay-message>
        <panel :title="config.windowTitle" :start-minimized="startMinimized" :show-close-button="hasSession" @close="onClose()">
            <div slot="panel-top" >
                <call-us-phone :class="$style['phone-toolbar']" v-if="config.allowCall" :allow-video="config.allowVideo"></call-us-phone>
            </div>
            <div slot="panel-content">
                <!--
                <loading :active.sync="myPhoneService.isLoading" :is-full-page="false"></loading>
                -->
                <call-us-chat :class="$style.chat" :config="config" ></call-us-chat>
            </div>
        </panel>
    </div>
</template>

<script src="./main-form.ts"></script>
<style module src="./main-form.scss"></style>
