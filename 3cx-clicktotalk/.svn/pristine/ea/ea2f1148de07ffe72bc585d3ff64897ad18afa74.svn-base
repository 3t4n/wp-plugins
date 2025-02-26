<template>
    <div :class="$style.root">
        <div v-if="!hasCall" class="call-us-toolbar">
            <toolbar-button :title="callTitle" @click="onMakeCall" :class="$style['button-main']">
                <glyphicon-call></glyphicon-call>
            </toolbar-button>
            <template v-if="!singleButtonPhone">
                <toolbar-button @click="onMakeVideoCall" :class="$style['button-main']" v-if="allowVideo" >
                    <glyphicon-video></glyphicon-video>
                </toolbar-button>
            </template>
        </div>
        <div v-else>
            <audio v-if="!!audioNotificationUrl" autoplay loop :src="audioNotificationUrl"></audio>
            <audio v-if="remoteStream"
                   v-srcObject="remoteStream"
                   autoplay></audio>
            <div v-if="media.isVideoCall && (media.isVideoSend || media.isVideoReceived)" style="position: relative" ref="videoOutput" @click="videoOutputClick()">
                <video v-if="videoOnlyRemoteStream && (media.isVideoReceived || !media.isVideoSend)"
                       v-srcObject="videoOnlyRemoteStream"
                       :class="$style.awayVideo"
                       autoplay></video>

                <video v-if="videoOnlyLocalStream && media.isVideoSend"
                       v-srcObject="videoOnlyLocalStream"
                       :class="{[$style.mirrorVideo]: true, [$style.homeVideo]: media.isVideoReceived, [$style.awayVideo]: !media.isVideoReceived}"
                       autoplay></video>
            </div>
            <div class="call-us-toolbar">
                <toolbar-button @click="dropCall" :class="$style['button-end-call']" :disabled="hasTryingCall">
                    <glyphicon-call></glyphicon-call>
                </toolbar-button>
                <template v-if="!singleButtonPhone">
                    <toolbar-button v-if="!media.isMuted" @click="toggleMute" :class="$style['button-default']" :disabled="hasTryingCall">
                        <glyphicon-micoff></glyphicon-micoff>
                    </toolbar-button>
                    <toolbar-button v-else @click="toggleMute" :class="$style['button-main']" :disabled="hasTryingCall">
                        <glyphicon-mic></glyphicon-mic>
                    </toolbar-button>
                    <toolbar-button v-if="media.isVideoCall && (media.isVideoSend || media.isVideoReceived)" @click="videoOutputClick()" :class="$style['button-default']">
                        <glyphicon-fullscreen></glyphicon-fullscreen>
                    </toolbar-button>
                </template>
                <!--
                <toolbar-button :class="$style['button-main']" :disabled="true">
                    <glyphicon-thumbnails></glyphicon-thumbnails>
                </toolbar-button>
                -->
            </div>
        </div>
    </div>
</template>

<script src="./phone.ts"></script>
<style module src="./phone.scss"></style>
